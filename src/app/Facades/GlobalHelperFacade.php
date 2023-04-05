<?php

namespace App\Facades;

use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\Facade;

/**
 * @see GlobalHelper
 *
 * @method static array getPhpFileFromDir(string $dir)
 * @method static array getGuardList()
 * @method static string getPermissionNameFromRoute(string $name)
 */
class GlobalHelperFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'globalHelper';
    }
}
