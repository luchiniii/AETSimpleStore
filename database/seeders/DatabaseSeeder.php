<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductRating;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User types
        $vendorUserType = UserType::factory([
            'name' => UserType::VENDOR_TYPE
        ])->create();

        $buyerUserType = UserType::factory([
            'name' => UserType::BUYER_TYPE
        ])->create();


        // Vendor users
        $vendorAUser = User::factory([
            'name' => 'vendor A user AAA',
            'type_id' => $vendorUserType->id
        ])->create();

        $vendorBUser = User::factory([
            'name' => 'vendor B user BBB',
            'type_id' => $vendorUserType->id
        ])->create();


        // Buyer users
        $buyerAUser = User::factory([
            'name' => 'buyer A user AAA',
            'type_id' => $buyerUserType->id
        ])->create();

        $buyerBUser = User::factory([
            'name' => 'buyer B user BBB',
            'type_id' => $buyerUserType->id
        ])->create();


        // Product categories
        $computerCategory = ProductCategory::factory([
            'name' => 'Computers'
        ])->create();

        $cellCategory = ProductCategory::factory([
            'name' => 'Cell Phones'
        ])->create();


        //Products
        $productsVendorA = Product::factory([
            'user_id' => $vendorAUser->id,
            'category_id' => $computerCategory->id,
        ])->count(10)->create();

        $productsVendorB = Product::factory([
            'user_id' => $vendorBUser->id,
            'category_id' => $cellCategory->id
        ])->count(10)->create();


        // Product ratings
        $productsVendorA->each(function ($product) use ($buyerAUser, $buyerBUser){
            ProductRating::factory([
                'user_id' => $buyerAUser,
                'product_id' => $product->id
            ])->create();

            ProductRating::factory([
                'user_id' => $buyerBUser,
                'product_id' => $product->id
            ])->create();
        });
    }
}
