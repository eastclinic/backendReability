<?php


namespace Modules\Content\Services\PreviewServices;


use App\DataStructures\Content\ContentFileInfoStructure;
use App\DataStructures\Content\CreatePreviewContentStructure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
//use Intervention\Image\Image;
//use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Content\Entities\Content;
use Modules\Content\Services\ContentService;
use function Symfony\Component\Finder\name;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class ImagePreviewsService extends PreviewsServiceAbstract
{


    public function generatePreviews():bool {

        if( !$this->originalContent || !$this->key)       return false;
        try {
            $contentService = new ContentService();
            $disk = $contentService->getStorageDisk();
            $fileOriginalFullPath = $disk->path($this->originalContent->file);
            if( !file_exists($fileOriginalFullPath) ) {
                throw new \Exception('Not exists original file');
            }
            $fileInfo= pathinfo($this->originalContent->file);
            $originalFileExtension = mb_strtolower($fileInfo['extension']);
            $originalFileFolder = $fileInfo['dirname'];
            if(!in_array($originalFileExtension, ["jpg", "png", "jpeg", 'webp'])) return false;
            $extension = ($this->extensionPreview && in_array($this->extensionPreview, ["jpg", "png", "jpeg", 'webp'])) ? $this->extensionPreview : $originalFileExtension;
            $previewFilename = md5_file($fileOriginalFullPath).'.'.$extension;

            $preview = Image::make($fileOriginalFullPath);

            if($this->width && $this->height) {
                $preview->fit($this->width, $this->height);
            }
            $preview ->encode($extension, $this->quality);

            $previewFile = $originalFileFolder.DIRECTORY_SEPARATOR.$previewFilename;
            $previewFileFullPath = $disk->path($previewFile);

            $preview->save( $previewFileFullPath );



            $previewFileInfo = new CreatePreviewContentStructure(
                [
                    'file' => $previewFile,
                    'url' => $disk->url($previewFile),
                    'type' =>$this->key,
                    'typeFile' => $contentService->getFileType($previewFile),
                    'confirm' => 1,
                    'published' => $this->originalContent->published,
                    'contentable_type' => $this->originalContent->contentable_type,
                    'contentable_id' => $this->originalContent->contentable_id,
                    'parent_id' => $this->originalContent->id,
                    'mime' => $contentService->getMime($previewFile),

                ]
            );
            $fwsdw = 1;

            Content::create($previewFileInfo->toArray());

//            $this->originalContent
//                ->fill([
//                    'file' => $previewFile,
//                    'url' => $disk->url($previewFile),
//                    ])
//                ->save();

        }catch (\Throwable $e){
            error_log($e->getMessage());
        }
        return true;
    }



    public function getPossibleOriginalType():string  {
        return 'image';
    }

}
