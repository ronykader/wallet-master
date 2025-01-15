<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class CategoryService
{

    /**
     * Returns all the categories and filter by type
     * @param string | null $type
     * @return Collection
     */
    public function getAllCategories(?string $type = null)
    {
        $query = Category::query();
        if ($type){
            $query->where('type', $type);
        }
        return $query->get();
    }


    /**
     * Get a single category by its ID.
     *
     * @param  Category  $category
     * @return Category
     */

    public function getCategoryById(Category $category)
    {
        return $category;
    }


    /**
     * Create a new category.
     *
     * @param array $data
     * @return Category
     */

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    /**
     * Update an existing category.
     *
     * @param  Category  $category
     * @param array $data
     * @return Category
     */

    public function updateCategory(Category $category, array $data)
    {
        $category->update($data);
        return $category;
    }

    /**
     * Delete a category.
     *
     * @param  Category  $category
     * @return bool
     */
    public function deleteCategory(Category $category)
    {
        return $category->delete();
    }

}
