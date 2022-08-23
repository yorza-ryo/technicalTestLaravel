<?php
  namespace App\Repositories;

  use App\Models\User;
  use Illuminate\Support\Str;

  class UserRepository
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

    public function product($request)
    {
      return User::from('users as u')
        ->join('user_details as ud', 'ud.user_id', '=', 'u.id')
        ->join('product_permissions as pp', 'u.id', '=', 'pp.user_id')
        ->join('products as p', 'pp.product_id', '=', 'p.id')
        ->join('product_details as pd', 'p.id', '=', 'pd.product_id')
        ->leftJoin('product_thumbnails as pt', 'p.id', '=', 'pt.product_id')
        ->where([
            'u.email' => $request->email,
            'p.name'  => $request->product
          ])
        ->select('u.id as user_id', 'u.email', 'ud.fname', 'ud.mname', 'ud.lname', 'p.name as product_name', 'pd.brand', 'pd.price', 'pd.stock', 'pt.image')
        ->get();
    }
  }