<?php     

namespace App\interfaces;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;


interface UserRepositoryInterface {
    public function register(UserRequest $request);
    public function login(Request $request);
    public function getUser();

}