<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function getCategories()
    {
        return Category::orderBy('title')->get();
    }
}
