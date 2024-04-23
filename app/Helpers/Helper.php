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


// Get the number of the customers

function get_customers_count()
{
    $customersCount = DB::table('customers')
        ->count();

    return $customersCount;
}


// Get the number of sales in last 24h

function get_sales_count()
{
    $salesCount = DB::table('orders')
        ->where('created_at', '>=', now()->subDay())
        ->whereNull('deleted_at')
        ->count();

    return $salesCount;
}


// Get the transaction value in the last 30 days

function get_transaction_value()
{
    $transactionValue = DB::table('orders')
        ->where('created_at', '>=', now()->subDays(30))
        ->whereNull('deleted_at')
        ->sum('total');

    return $transactionValue;
}


// Get the number of the products that have the status 'active'

function get_active_products_count()
{
    $activeProductsCount = DB::table('products')
        ->where('status', 'active')
        ->count();

    return $activeProductsCount;
}


// Get the created orders created by a Order Manager 

function get_orders_by_order_manager()
{
    $orders = DB::table('orders')
        ->count();
    return $orders;
}


// Get the number of the products that have the status 'out of stock'

function get_products_out_of_stock_count()
{
    $inactiveProductsCount = DB::table('products')
        ->where('status', 'out of stock')
        ->count();

    return $inactiveProductsCount;
}


// Get the number of invoices

function get_invoices_count()
{
    $invoicesCount = DB::table('invoices')
        ->count();

    return $invoicesCount;
}


// Get the total of suppliers

function get_active_suppliers_count()
{
    $suppliersCount = DB::table('suppliers')
        ->where('status', 'active')
        ->count();

    return $suppliersCount;
}
