<?php
  namespace App\Services;

  use App\Repositories\UserRepository;
  use Exception;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use App\Exceptions\CustomException;
  use Illuminate\Support\Facades\Log;

  class UserService
  {
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

    public function product($request)
    {
      try
      {
        return $this->userRepository->product($request);
      }
      catch(Exception $e)
      {
        Log::error($e);
        throw new CustomException($e->getMessage(), $e->getCode());
      }
    }
  }