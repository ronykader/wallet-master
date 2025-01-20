<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\BudgetCreateRequest;
use App\Http\Resources\v1\BudgetResource;
use App\Services\v1\BudgetService;
use Illuminate\Http\JsonResponse;

class BudgetController extends Controller
{
    public function __construct(private readonly BudgetService $budgetService)
    {
    }
    /***
     * Display a listing of resource
     */
    public function index(): JsonResponse
    {
        $budget = $this->budgetService->getAllBudgets();
        return response()->json(['message' => 'Data fetch successfully', 'data' => BudgetResource::collection($budget)], 200);
    }
    /**
     * Store a newly created resource in storage
     */
    public function store(BudgetCreateRequest $request): JsonResponse
    {
        $budget = $this->budgetService->createBudget($request->validated());
        return response()->json(['message' => 'Budget created successfully', 'data' => new BudgetResource($budget)], 201);
    }
    /**
     * Display the specified resource in storage
     */
    public function show(int $id): JsonResponse
    {
        $budget = $this->budgetService->getBudgetById($id);
        return response()->json(['message' => 'Data fetch successfully', 'data' => new BudgetResource($budget)], 200);
    }
    /**
     * Update the specified resource from storage
     */
    public function update(BudgetCreateRequest $request, int $id): JsonResponse
    {
        $budget = $this->budgetService->updateBudget($id, $request->validated());
        return response()->json(['message' => 'Budget updated successfully', 'data' => new BudgetResource($budget)], 200);
    }
    /**
     * Remove the specified resource from storage
     */
    public function destroy(int $id): JsonResponse
    {
        $this->budgetService->deleteBudget($id);
        return response()->json(['message' => 'Budget deleted successfully'], 200);
    }
}
