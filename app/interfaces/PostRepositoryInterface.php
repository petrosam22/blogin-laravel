<?php

namespace App\interfaces;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;


interface PostRepositoryInterface {
    public function store(PostRequest $request);
     public function posts();
     public function edit(UpdatePostRequest $request,$id);
     public function delete($id);
     public function show($id);

}
