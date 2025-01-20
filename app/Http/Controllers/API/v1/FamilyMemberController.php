<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FamilyMemberCreateRequest;
use App\Http\Resources\v1\FamilyMemberResource;
use App\Services\v1\FamilyMemberService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    public function __construct(private readonly FamilyMemberService $familyMemberService)
    {
    }
    /***
     * Display a listing of resource
     */
    public function index(): JsonResponse
    {
        $familyMember = $this->familyMemberService->getAllFamilyMembers();
        return response()->json(['message' => 'Data fetch successfully', 'data' => FamilyMemberResource::collection($familyMember)], 200);
    }
    /**
     * Store a newly created resource in storage
     */
    public function store(FamilyMemberCreateRequest $request): JsonResponse
    {
        $familyMember = $this->familyMemberService->createFamilyMember($request->validated());
        return response()->json(['message' => 'Family member created successfully', 'data' => new FamilyMemberResource($familyMember)], 201);
    }
    /**
     * Display the specified resource in storage
     */
    public function show(int $id): JsonResponse
    {
        $familyMember = $this->familyMemberService->getFamilyMemberById($id);
        return response()->json(['message' => 'Data fetch successfully', 'data' => new FamilyMemberResource($familyMember)], 200);
    }
    /**
     * Update the specified resource from storage
     */
    public function update(FamilyMemberCreateRequest $request, int $id): JsonResponse
    {
        $familyMember = $this->familyMemberService->updateFamilyMember($id, $request->validated());
        return response()->json(['message' => 'Family member updated successfully', 'data' => new FamilyMemberResource($familyMember)], 200);
    }
    /**
     * Remove the specified resource from storage
     */
    public function destroy(int $id): JsonResponse
    {
        $this->familyMemberService->deleteFamilyMember($id);
        return response()->json(['message' => 'Family member deleted successfully'], 200);
    }
}
