<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        factory(Admin::class, 1)->create();
        factory(BlogCategory::class, 8)->create();
        factory(BlogPost::class, 8)->create();
        factory(Comment::class, 10)->create();
        factory(BlogTag::class, 8)->create();

        factory(Setting::class, 1)->create();
    }
}