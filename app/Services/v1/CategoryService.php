<?php

namespace App\Services\v1;

use App\Models\Category;
use App\Repositories\v1\interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(private readonly CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function getAllCategories(): Collection
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->categoryRepository->findById($id);
    }

    public function createCategory(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory(int $id, array $data): ?Category
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory(int $id): void
    {
        $this->categoryRepository->delete($id);
    }
}
