<?php

namespace App\Repositories\v1;

use App\Models\Category;
use App\Repositories\v1\interfaces\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
    * Get all categories.
    */
    public function getAll(): Collection
    {
        return Category::all();
    }

    /**
     * Find a category by ID.
     */
    public function findById(int $id): ?Category
    {
        return Category::find($id);
    }

    /**
     * Create a new category.
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * Update a category by ID.
     */
    public function update(int $id, array $data): ?Category
    {
        $category = $this->findById($id);
        if ($category) {
            $category->update($data);
        }
        return $category;
    }

    /**
     * Delete a category by ID.
     */
    public function delete(int $id): void
    {
        $category = $this->findById($id);
        if ($category) {
            $category->delete();
        }
    }
}
