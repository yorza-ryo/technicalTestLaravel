<?php
  namespace App\Services;

  use App\Repositories\AuthRepository;
  use Exception;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use App\Exceptions\CustomException;
  use Illuminate\Support\Facades\Log;

  class AuthService
  {
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
      $this->authRepository = $authRepository;
    }

    public function login($request)
    {
      DB::beginTransaction();

      try
      {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
          $user  = Auth::user();
          $token = $this->authRepository->saveToken($user);
          $userDetail = $this->authRepository->userDetail($user);
          
          DB::commit();
          return [
            'token' => $token->token,
            'user'  => $user,
            'userDetail' => $userDetail
          ];
        }
      }
      catch(Exception $e)
      {
        DB::rollBack();
        Log::error($e);
        throw new CustomException($e->getMessage(), $e->getCode());
      }
    }
  }