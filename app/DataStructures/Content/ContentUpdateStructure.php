<?php


namespace App\DataStructures\Content;

class ContentUpdateStructure extends \App\DataStructures\AbstractDataStructure
{
    public ?string $id= null;
    public ?string $contentable_type = null;
    public ?int $contentable_id = null;

    public string $file = '';
    public string $url = '';
    public string $is_preview_for = '';
//    public string $original_banner_id = '';
    public string $type = '';
    public string $typeFile = '';
    public int $confirm = 0;
    public bool $published = false;
    public int $isDeleted = 0;


}
