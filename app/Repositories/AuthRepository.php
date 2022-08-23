<?php
  namespace App\Repositories;

  use App\Models\User;
  use Illuminate\Support\Str;

  class AuthRepository
  {
    public function userDetail($user)
    {
      return $user->userDetail;
    }

    public function saveToken($user)
    {
      return $user->userToken()->create([
        'name'  => 'API_Token',
        'token' => Str::uuid()
      ]);
    }
  }