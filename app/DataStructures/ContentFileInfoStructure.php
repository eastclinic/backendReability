<?php


namespace App\DataStructures;

class ContentFileInfoStructure extends AbstractDataStructure
{
    public ?string $file = null;
    public ?string $url = null;
    public ?string $type = null;
    public string $typeFile = '';
    public bool $confirm = false;
    public bool $published = false;



}
