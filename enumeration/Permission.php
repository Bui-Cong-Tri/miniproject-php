<?php

enum Permission: string
{
    case PRODUCT_CREATE = 'products:create';
    case PRODUCT_DELETE = 'product:delete';
    case PRODUCT_UPDATE = 'product:update';
    static function isNeedAuthenticate($mod, $act): bool
    {
        $permission = Permission::cases();
        $matchingPermissionIndex = array_search($permission, array_column($permission, "name"));
        if ($matchingPermissionIndex) {
            return true;
        }
        return false;
    }
}