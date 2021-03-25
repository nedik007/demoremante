<?php

namespace App\Criteria;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryCriteria implements CriteriaInterface
{

    /**
     * @var Category
     */
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function apply(Model $model)
    {
        return $model->whereHas('category', function($query) {
            $query->where('category_id', $this->category->id);
        });
    }
}
