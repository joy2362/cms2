<?php

namespace App\Helpers;

class GlobalHelper
{
    /**
     * @param string $dir
     * @return array
     */
    public function getPhpFileFromDir(string $dir): array
    {
        $files = [];
        if (is_dir($dir)) {
            $files = array_filter(scandir($dir), function ($item) {
                return str_ends_with($item, '.php');
            });
        }
        return $files;
    }

    /**
     * @return array
     */
    public function getGuardList(): array
    {
        $guards = array_filter(config('auth.guards'), function ($value) {
            return $value['provider'];
        });
        return array_keys($guards);
    }

    public function getPermissionNameFromRoute(string $name): string
    {
        $separateMethodAndControlName = explode('@', $name);
        $methodName = $separateMethodAndControlName[1];
        $separateControllerName = class_basename($separateMethodAndControlName[0]);
        $controllerName = str_replace('Controller', '', $separateControllerName);
        return "{$controllerName}.{$methodName}";
    }
}
