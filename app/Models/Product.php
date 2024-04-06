<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Product extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'image',
//         'name',
//         'reference',
//         'quantity',
//         'price',
//         'status',
//         'critical_stock',
//         'category_id',
//         'unit_id',
//         'tax_id',
//         'supplier_id',
//         'subcategory_id',
//         ];

//         public function categorie(){
//             return $this->hasOne(Category::class);
//         }

//         public function unit(){
//             return $this->hasOne(Unit::class);
//         }

//         public function tax(){
//             return $this->hasOne(Tax::class);
//         }

//         public function supplier(){
//             return $this->hasOne(Supplier::class);
//         }

//         public function subcategorie(){
//             return $this->hasOne(Subcategory::class);
//         }

// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'reference',
        'quantity',
        'price',
        'status',
        'critical_stock',
        'category_id',
        'unit_id',
        'tax_id',
        'supplier_id',
        'subcategory_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function tax(){
        return $this->belongsTo(Tax::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
