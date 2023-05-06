<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getPhpFileFromDir')) {
    /**
     * @param string $dir
     * @return array
     */
    function getPhpFileFromDir(string $dir): array
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

if (!function_exists('getPermissionNameFromRoute')) {
    function getPermissionNameFromRoute(string $name): string
    {
        $separateMethodAndControlName = explode('@', $name);
        $methodName = $separateMethodAndControlName[1];
        $separateControllerName = class_basename($separateMethodAndControlName[0]);
        $controllerName = str_replace('Controller', '', $separateControllerName);
        return "{$controllerName}.{$methodName}";
    }
}

if (!function_exists('getGuardList')) {
    function getGuardList(): array
    {
        $guards = array_filter(config('auth.guards'), function ($value) {
            return $value['provider'];
        });
        return array_keys($guards);
    }
}

if (!function_exists('apiResponse')) {
    /**
     * @param $response
     * @return JsonResponse
     */
    function apiResponse($response): JsonResponse
    {
        return response()->json($response->except(['status']), $response['status']);
    }
}
if (!function_exists('upload')) {
    function upload($file, $path, $old = null)
    {
        $code = date('ymdhis') . '-' . rand(1111, 9999);

        if (!empty($old)) {
            $oldFile = oldFile($old);
            if (Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }
        }
        //FILE UPLOAD
        if (!empty($file)) {
            $fileName = $code . "." . $file->getClientOriginalExtension();
            makeDir($path);
            return Storage::disk('public')->putFileAs('upload/' . $path, $file, $fileName);
        }
    }
}
if (!function_exists('makeDir')) {
    function makeDir($folder): void
    {
        $main_dir = storage_path("app/public/upload/{$folder}");
        if (!file_exists($main_dir)) {
            mkdir($main_dir, 0777, true);
        }
    }
}
if (!function_exists('oldFile')) {
    function oldFile($file): string
    {
        $ex = explode('storage/', $file);
        return $ex[1] ?? "";
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile($file): void
    {
        if (Storage::disk('public')->exists($file)):
            Storage::delete($file);
        endif;
    }
}