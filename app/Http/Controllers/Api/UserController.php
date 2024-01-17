<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\interfaces\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Jobs\SendEmailToUsersJob;

class UserController extends Controller
{


    private UserRepositoryInterface $UserRepositories;

      public function __construct(UserRepositoryInterface $UserRepositories) {
        $this->UserRepositories = $UserRepositories;
    }
    public function register(UserRequest $request){
        return  $this->UserRepositories->register($request);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
      return  $this->UserRepositories->login($request);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function getUser()
    {
        return  $this->UserRepositories->getUser();

    }

    /**
     * Display the specified resource.
     */

     public function sendWelcomeEmails()
     {
         $message = 'Welcome to our family!'; // Set the welcome message

         dispatch(new SendEmailToUsersJob($message));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
