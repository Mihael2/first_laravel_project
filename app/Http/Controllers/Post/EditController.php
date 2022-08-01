<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;



class EditController extends BaseController
{

    public function __invoke(Post $post){
        $categories = Category::all();
        $tags = Tag::all();

         return view('post.edit', compact('post', 'categories', 'tags'));
    }


}
