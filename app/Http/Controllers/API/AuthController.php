<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Exceptions\CustomException;
use Exception;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Log;
use App\Services\AuthService;

class AuthController extends BaseController
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login(LoginRequest $request)
    {
        try
        {
            $data = $this->authService->login($request);
            return $this->sendResponse(new UserResource($data), 'Success.');  
        }
        catch(Exception $e)
        {
            Log::error($e);
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }
}
