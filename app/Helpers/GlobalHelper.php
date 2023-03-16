<?php

namespace App\Helpers;

class GlobalHelper
{
    public function getPhpFileFromDir($dir): array
    {
        $files = [];
        if (is_dir($dir)) {
            $files = array_filter(scandir($dir), function ($item) {
                return str_ends_with($item, '.php');
            });
        }
        return $files;
    }

}