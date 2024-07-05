<?php

namespace App\Http\Controllers;

use App\Constants\ResponseConstant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:128',
            'password' => 'required|min:6|max:28',
        ]);
        if ($validator->fails()) {
            return $this->generateResponse(ResponseConstant::INVALID);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->generateResponse(ResponseConstant::CREDENTIAL_FAIL);
        }

        $token = $user->createToken('ApiToken')->plainTextToken;
        $permissions = $user->getPermissionsViaRoles();
        return $this->generateResponse(ResponseConstant::AUTH_SUCCESS, compact('user', 'token', 'permissions'));
    }

    public function me()
    {
        return $this->generateResponse(ResponseConstant::READ, ['is_auth' => auth()->check(), 'me' => auth()->user()]);
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens()
            ->delete();
        return $this->generateResponse(ResponseConstant::LOGOUT_SUCCESS);
    }
}
