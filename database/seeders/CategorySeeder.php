<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cate = [
            [
                "name" => "sports",
                "slug" => "sports",
            ],
            [
                "name" => "tech",
                "slug" => "tech",
            ],


        ];


        foreach ($cate as $key => $value) {
            Category::updateOrCreate(
                [
                    "name" => $value["name"],
                ],
                [
                    "name" => $value["name"],
                    "slug" => $value["slug"],
                ]
            );
        }
    }
}
