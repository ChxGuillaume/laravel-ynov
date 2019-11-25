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
     * @return array
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        try {
            if (!$token = auth('api')->attempt($input)) {
                return [
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Invalid Request',
            ];
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
        return (auth('api')->user());
    }

    /**
     * Invalid a user token (logout)
     *
     * @param Request $request
     * @return array
     */
    public function logout(Request $request)
    {
        try {
            auth('api')->logout();

            return [
                'success' => true,
                'message' => 'User logged out successfully'
            ];
        } catch (JWTException $exception) {
            return [
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ];
        }
    }

    /**
     * Refresh a token.
     *
     * @return array
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @return array
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }

}
