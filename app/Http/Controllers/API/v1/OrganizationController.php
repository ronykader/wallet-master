<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\OrganizationCreateRequest;
use App\Http\Resources\v1\OrganizationResource;
use App\Services\v1\OrganizationService;
use Illuminate\Http\JsonResponse;

class OrganizationController extends Controller
{
    public function __construct(private readonly OrganizationService $organizationService)
    {
    }
    /**
     * Display a list of resource
     */
    public function index(): JsonResponse
    {
        $organization = $this->organizationService->getAllOrganizations();
        return response()->json(OrganizationResource::collection($organization));
    }
    /**
     * Store a newly created resource in storage
     */
    public function store(OrganizationCreateRequest $request): JsonResponse
    {
        $organization = $this->organizationService->createOrganization($request->validated());
        return response()->json(['message' => 'Organization created successfully', 'data' => new OrganizationResource($organization)], 201);
    }
    /**
     * Display the specified resource
     */
    public function show(int $id): JsonResponse
    {
        $organization = $this->organizationService->getOrganizationById($id);
        return response()->json(['data' => new OrganizationResource($organization)], 200);
    }
    /**
     * Update the specified resource in storage
     */
    public function update(OrganizationCreateRequest $request, int $id): JsonResponse
    {
        $organization = $this->organizationService->updateOrganization($id, $request->validated());
        return response()->json(['message' => 'Organization updated successfully', 'data' => new OrganizationResource($organization)], 200);
    }
    /**
     * Remove the specified resource from storage
     */
    public function destroy(int $id): JsonResponse
    {
        $this->organizationService->deleteOrganization($id);
        return response()->json(['message' => 'Organization deleted successfully'], 204);
    }
}
