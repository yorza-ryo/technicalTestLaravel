<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserPermission;
use App\Services\UserService;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserRequest $request)
    {
        try
        {
            $data = $this->userService->product($request);
            return $this->sendResponse(new UserPermission($data), 'Success.');  
        }
        catch(Exception $e)
        {
            Log::error($e);
            throw new CustomException($e->getMessage(), $e->getCode());
        }
    }
}
