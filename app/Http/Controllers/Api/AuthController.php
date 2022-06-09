<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'success'   => false,
                'message' => ['These credentials do not match our records.']
            ], 403);
        }
        $token = $user->createToken('ApiToken')->plainTextToken;

        $response = [
            'success'   => true,
            'user'      => $user,
            'token'     => $token
        ];

        return response($response, 201);
    }

    public function userAuth()
    {
        try {
            $data = auth()->user();
            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        } catch (NotFoundHttpException $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function logout()
    {
        try {
            $data = auth()->user();
            $data->tokens()->delete();
            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        } catch (NotFoundHttpException $e) {
            throw $e;
            report($e);
            return $e;
        }
    }
}
