<?php


namespace App\DataStructures\Content;

class ContentUpdateStructure extends \App\DataStructures\AbstractDataStructure
{
    public ?string $id= null;
    public ?string $contentable_type = null;
    public ?int $contentable_id = null;

    public string $file = '';
    public string $url = '';
    public string $type = '';
    public string $typeFile = '';
    public bool $confirm = false;
    public bool $published = false;


}
