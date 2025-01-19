<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TransactionRequest;
use App\Http\Resources\v1\TransactionResource;
use App\Models\Transaction;
use App\Services\v1\TransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(private readonly TransactionService $transactionService)
    {
    }

    /**
     * Display a listing of resource.
     */
    public function index(): JsonResponse
    {
        $transactions = $this->transactionService->getAllTransactions();
        return response()->json(TransactionResource::collection($transactions));
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(TransactionRequest $request): JsonResponse
    {
        $transaction = $this->transactionService->createTransaction($request->validated());
        return response()->json(['message' => 'Transaction created successfully', 'data' => new TransactionResource($transaction)], 201);
    }

    /**
     * Display the specified resource
     */
    public function show(int $id): JsonResponse
    {
        $transaction = $this->transactionService->getTransactionById($id);
        return response()->json(['data' => new TransactionResource($transaction)]);
    }

    /**
     * Update the specified resource in storage
     */
    public function update(TransactionRequest $request, int $id): JsonResponse
    {
        $transaction = $this->transactionService->updateTransaction($id, $request->validated());
        return response()->json(['message' => 'Transaction updated successfully', 'data' => new TransactionResource($transaction)]);
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(int $id): JsonResponse
    {
        $this->transactionService->deleteTransaction($id);
        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}
