<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    public function index(){

        $post = Post::all();

        return view('post.index', compact('posts'));

    }

    public function create(){

        $categories = Category::all();
        $tags = Tag::all();
      
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => 'required',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);
       
       

         return redirect()->route('post.index');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){

        $categories = Category::all();
        $tags = Tag::all();

         return view('post.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Post $post){

        $data = request()->validate([

            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',

        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete(){

        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

    public function restore(){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate(){

        

        $anotherPost = [
            'title'=>'some post',
            'content'=>'some content',
            'image'=>'some image',
            'likes'=>'1',
            'is_published'=>'1',
        ];

        $post = Post::firstOrCreate( ['title' => 'some post'],$anotherPost);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){

        $anotherPost = [
            'title'=>'updateorcreate some post',
            'content'=>'bla bla bla',
            'image'=>'bla image',
            'likes'=>0,
            'is_published'=>0,
        ];

        $post = Post::updateOrCreate(['title' => 'updateorcreate some post'],$anotherPost);

        dump($post->content);
        dd('end');
    }
}
