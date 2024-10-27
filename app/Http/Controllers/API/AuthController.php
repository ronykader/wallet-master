<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param UserService $userService
     * @param ResponseFactory $responseFactory
     * @param AuthService $authService
     */
    public function __construct(
        private readonly UserService $userService,
        private readonly ResponseFactory $responseFactory,
        private readonly AuthService $authService
    )
    {
    }

    /**
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->createUser($request->validated());
            return $this->responseFactory->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ],201);
        } catch (\Exception $e) {
            return $this->responseFactory->json([
                'success' => false,
                'message' => 'User registration failed',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param LoginUserRequest $request
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        try {
            $token = $this->authService->login($request->validated());
            return $this->responseFactory->json([
                'success' => true,
                'message' => 'User logged in successfully',
                'token' => $token
            ],200);
        } catch (ValidationException $exception) {
            return $this->responseFactory->json([
                'success' => false,
                'message' => $exception->getMessage(),
                'error' => $exception->errors(),
            ], 422);
        } catch (\Exception $exception) {
            return $this->responseFactory->json([
                'success' => false,
                'message' => 'An error occurred during login.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $this->authService->logout($request->user());
            return $this->responseFactory->json([
                'success' => true,
                'message' => 'User logged out successfully',
            ], 200);
        } catch (\Exception $exception) {
            return $this->responseFactory->json([
                'success' => false,
                'message' => 'An error occurred during logout.',
                'error' => $exception->getMessage(),
            ]);
        }
    }


}
