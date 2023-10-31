<?php


namespace App\DataStructures;

class ContentFileInfoStructure extends AbstractDataStructure
{
    public ?string $file = null;
    public ?string $url = null;
    public string $type = '';
    public string $typeFile = '';
}
