<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIController extends Controller
{

    /**
     * Login a user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        try {
            if (!$token = JWTAuth::attempt($input)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Request',
            ], 400);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the current logged in user
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Invalid a user token (logout)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}
