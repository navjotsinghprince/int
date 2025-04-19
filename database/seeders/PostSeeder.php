<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $category_sports_id = Category::where("name", "sports")->pluck("id")->first();
        $category_tech_id = Category::where("name", "tech")->pluck("id")->first();
        $user_id = User::where("email", "test@user.com")->pluck("id")->first();

        $posts = [
            [
                "user_id"  =>  $user_id,
                "category_id" =>  $category_sports_id,
                "title" => "Sports",
                "slug" => "sports_related",
                "content" => "this is sports related post",
                "status" => "draft",
                "published_at" => Carbon::now(),
            ],
            [
                "user_id"  =>  $user_id,
                "category_id" =>  $category_sports_id,
                "title" => "Sports",
                "slug" => "sports_related 2",
                "content" => "this is sports related 2 post",
                "status" => "published",
                "published_at" => Carbon::now(),
            ],
            [
                "user_id"  =>  $user_id,
                "category_id" =>  $category_tech_id,
                "title" => "Tech",
                "slug" => "tech_related",
                "content" => "this is tech related post",
                "status" => "draft",
                "published_at" => Carbon::now(),
            ],
            [
                "user_id"  =>  $user_id,
                "category_id" =>  $category_tech_id,
                "title" => "Tech",
                "slug" => "tech_related2",
                "content" => "this is tech related 2 post",
                "status" => "published",
                "published_at" => Carbon::now(),
            ],

        ];

        foreach ($posts as $key => $value) {

            Post::updateOrCreate(
                [
                    "slug" => $value["slug"],
                ],
                [
                    "user_id" => $value["user_id"],
                    "category_id" => $value["category_id"],
                    "title" => $value["title"],
                    "slug" => $value["slug"],
                    "content" => $value["content"],
                    "status" => $value["status"],
                    "published_at" => $value["published_at"],
                ]
            );
        }
    }
}
