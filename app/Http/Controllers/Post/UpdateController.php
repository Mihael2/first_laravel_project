<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Resources\Post\PostResource;





class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, Post $post){

        $data = $request->validated();
        $post = $this->service->update($post, $data);


        return $post instanceof Post ? new PostResource($post) : $post;
        //return redirect()->route('post.show', $post->id);
 
    }


}
