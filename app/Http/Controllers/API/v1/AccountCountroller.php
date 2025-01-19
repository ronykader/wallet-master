<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\AccountCreateRequest;
use App\Http\Resources\v1\AccountResource;
use App\Models\Account;
use App\Services\v1\AccountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountCountroller extends Controller
{
    public function __construct(private readonly AccountService $accountService)
    {
    }
    /**
     * Display a listing of resource.
     */
    public function index(): JsonResponse
    {
        $accounts = $this->accountService->getAllAccounts();
        return response()->json(AccountResource::collection($accounts));
    }
    /**
     * Store a newly created resource in storage
     */
    public function store(AccountCreateRequest $request): JsonResponse
    {
        $account = $this->accountService->createAccount($request->validated());
        return response()->json(['message' => 'Account created successfully', 'data' => new AccountResource($account)], 201);
    }
    /**
     * Display the specified resource in storage
     */
    public function show(int $id): JsonResponse
    {
        $account = $this->accountService->getAccountById($id);
        return response()->json(['data' => new AccountResource($account)], 200);
    }
    /**
     * Update the specified resource from storage
     */
    public function update(AccountCreateRequest $request, int $id): JsonResponse
    {
        $account = $this->accountService->updateAccount($id, $request->validated());
        return response()->json(['message' => 'Account updated successfully', 'data' => new AccountResource($account)], 200);
    }
    /**
     * Remove the specified resource from storage
     */
    public function destroy(int $id): JsonResponse
    {
        $this->accountService->deleteAccount($id);
        return response()->json(['message' => 'Account deleted successfully']);
    }
}
