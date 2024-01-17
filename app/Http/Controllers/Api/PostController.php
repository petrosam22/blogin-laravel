<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use App\interfaces\PostRepositoryInterface;

class PostController extends Controller
{


    private PostRepositoryInterface $PostRepositories;
    public function __construct(PostRepositoryInterface $PostRepositories){
        $this->PostRepositories = $PostRepositories;
    }
    public function index()
    {
        return $this->PostRepositories->posts();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        return $this->PostRepositories->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->PostRepositories->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdatePostRequest $request,$id)
    {
        return $this->PostRepositories->edit($request,$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->PostRepositories->delete($id);
    }
}
