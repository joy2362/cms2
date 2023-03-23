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

    public function getGuardList(): array
    {
        $guards = array_filter(config('auth.guards'), function ($value) {
            return $value['provider'];
        });
        return array_keys($guards);
    }
}
