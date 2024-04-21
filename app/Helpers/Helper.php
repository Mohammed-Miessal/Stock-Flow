<?php

use Illuminate\Support\Facades\DB;

// Get the number of permissions for a user
function user_permissions_counts($id)
{

    $permissionsCount = DB::table('users')
        ->join('permission_user', 'users.id', '=', 'permission_user.user_id')
        ->where('users.id', $id)
        ->count();

    return $permissionsCount;
}


// Search for products

function search($search)
{
    $query = DB::table('products');

    // Si le paramètre de recherche est spécifié, appliquer les filtres de recherche
    if ($search != '') {
        $query->where('name', 'like', '%' . $search . '%' )->orWhere('reference', 'like', '%' . $search .'%' );
    }

    // Exécuter la requête et récupérer les résultats
    $products = $query->get();

    // Retourner les résultats de la recherche
    return $products;
}


// Get the product that have the status 'active'

function get_active_products()
{
    $products = DB::table('products')
        ->where('status', 'active')
        ->get();

    return $products;
}