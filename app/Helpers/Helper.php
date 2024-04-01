<?php

use Illuminate\Support\Facades\DB;

function user_permissions_counts($id)
{

    $permissionsCount = DB::table('users')
        ->join('permission_user', 'users.id', '=', 'permission_user.user_id')
        ->where('users.id', $id)
        ->count();

    return $permissionsCount;
}
