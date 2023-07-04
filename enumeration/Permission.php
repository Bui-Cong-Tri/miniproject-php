<?php

enum Permission: string
{
    case PRODUCT_READ = 'product:detail';
    case PRODUCT_LIST = 'product:list';
    case PRODUCT_CREATE = 'product:create';
    case PRODUCT_DELETE = 'product:delete';
    case PRODUCT_UPDATE = 'product:update';

    static function isNeedAuthenticate($mod, $act): bool
    {
        $permission = self::cases();
        $case = $mod . ":" . $act;
        if (in_array($case, array_column($permission, "value"))) {
            return true;
        }
        return false;
    }
}