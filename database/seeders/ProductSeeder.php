<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'LG Mobile',
            'price' => '200',
            'description' => '$ camera mobile',
            'category' => 'Mobiles',
            'gallery' => 'https://www.whatmobile.com.pk/admin/images/LG/LGV30Plus-b.jpg',
        ]);
    }
}
