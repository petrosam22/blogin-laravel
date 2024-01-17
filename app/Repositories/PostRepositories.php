<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
 use Illuminate\Support\Facades\Auth;
use App\interfaces\PostRepositoryInterface;


class PostRepositories implements PostRepositoryInterface {
     public function posts(){
        $posts = Post::all();

         return response()->json([
            'data'=>$posts,

            'message'=>'Post Created Successfully'
        ]);
    }

    public function store(PostRequest $request){
        $user = Auth::user();
         $post = Post::create([
         'title'=>$request->title,
        'description'=>$request->description,
        'user_id'=>$user->id,
       ]);

       return response()->json([
        'data'=>$post,
        'message'=>'Post Created Successfully'
       ]);
    }

    public function edit(UpdatePostRequest $request,$id){

        $post = Post::findOrFail($id);
        if($post->user_id != auth()->user()->id){
            return response()->json([
                'message' => 'You are not authorized to edit this post.'
            ], 403);

        }


        $post->update($request->only([
            'title',
            'description',

        ]));

        $post->save();
        return response()->json([
            'data'=>$post,
            'message'=>'Post Updated Successfully'
        ]);


    }


    public function delete($id){
        $post = Post::findOrFail($id);
        if($post->user_id != auth()->user()->id){
            return response()->json([
                'message' => 'You are not authorized to edit this post.'
            ], 403);

        }
        $post->delete();

        return response()->json([
            'message'=>'Post Deleted Successfully'
        ]);


    }
    public function show($id){
        $post = Post::findOrFail($id);return response()->json([
            'data'=>$post,
         ]);

    }
}
