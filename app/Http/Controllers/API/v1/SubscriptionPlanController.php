<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SubscriptionPlanCreateRequest;
use App\Http\Resources\v1\SubscriptionPlanResource;
use App\Models\SubscriptionPlan;
use App\Services\v1\SubscriptionPlanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function __construct(private readonly SubscriptionPlanService $subscriptionPlanService)
    {
    }
    /***
     * Display a listing of resource
     */
    public function index(): JsonResponse
    {
        $subscription = $this->subscriptionPlanService->getAllSubscriptionPlans();
        return response()->json(['message' => 'Data fetch successfully', 'data' => SubscriptionPlanResource::collection($subscription)], 200);
    }
    /**
     * Store a newly created resource in storage
     */
    public function store(SubscriptionPlanCreateRequest $request): JsonResponse
    {
        $subscription = $this->subscriptionPlanService->createSubscriptionPlan($request->validated());
        return response()->json(['message' => 'Subscription plan created successfully', 'data' => new SubscriptionPlanResource($subscription)], 201);
    }
    /**
     * Display the specified resource in storage
     */
    public function show(int $id): JsonResponse
    {
        $subscription = $this->subscriptionPlanService->getSubscriptionPlanById($id);
        return response()->json(['message' => 'Data fetch successfully', 'data' => new SubscriptionPlanResource($subscription)], 200);
    }
    /**
     * Update the specified resource from storage
     */
    public function update(SubscriptionPlanCreateRequest $request, int $id): JsonResponse
    {
        $subscription = $this->subscriptionPlanService->updateSubscriptionPlan($id, $request->validated());
        return response()->json(['message' => 'Subscription plan updated successfully', 'data' => new SubscriptionPlanResource($subscription)], 200);
    }
    /**
     * Remove the specified resource from storage
     */
    public function destroy(int $id): JsonResponse
    {
        $this->subscriptionPlanService->deleteSubscriptionPlan($id);
        return response()->json(['message' => 'Subscription plan deleted successfully'], 200);
    }

}
