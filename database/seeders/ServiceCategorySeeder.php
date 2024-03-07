<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('service_categories')->insert([
            [
                "name" => "AC",
                "slug" => 'ac',
                "image" => "1521969345.png"
            ],
            [
                "name" => "Plumbing",
                "slug" => 'plumbing',
                "image" => "1521969409.png"
            ],
            [
                "name" => "Electricity",
                "slug" => 'electricity',
                "image" => "1521969419.png"
            ],
            [
                "name" => "Shower-Filter",
                "slug" => 'shower-Filter',
                "image" => "1521969430.png"
            ],
            [
                "name" => "Carpentry",
                "slug" => 'carpentry',
                "image" => "1521969454.png"
            ],
            [
                "name" => "Pest Control",
                "slug" => 'pest-control',
                "image" => "1521969464.png"
            ],
            [
                "name" => "Car",
                "slug" => 'car',
                "image" => "1521969576.png"
            ],
            [
                "name" => "Laundry",
                "slug" => 'laundry',
                "image" => "1521972593.png"
            ],
            [
                "name" => "Painting",
                "slug" => 'painting',
                "image" => "1521972643.png"
            ],
            [
                "name" => "Refrigirator repair",
                "slug" => 'refrigirator_repair',
                "image" => "1521969536.png"
            ],
            [
                "name" => "Home Automation",
                "slug" => 'home-automation',
                "image" => "1521969622.png"
            ],
        ]);
    }
}
