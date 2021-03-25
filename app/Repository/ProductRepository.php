<?php

namespace App\Repository;

use App\Criteria\CategoryCriteria;
use App\Criteria\CriteriaInterface;
use App\Criteria\FulltextCriteria;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;

class ProductRepository
{
    /**
     * @var Application
     */
    protected $app;
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var array
     */
    protected $criteriaList = [];
    protected $orderBy;
    /**
     * @var mixed
     */
    protected $desc = 'asc';


    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->createModel();
    }

    public function applyFulltext($q)
    {
        $this->addCriteria(new FulltextCriteria($q));

        return $this;
    }

    public function applyCategory(Category $category): self
    {
        $this->addCriteria(new CategoryCriteria($category));

        return $this;
    }

    public function get()
    {
        $this->applyCriteria();
        $this->applyOrderBy();
        $results = $this->model->get();
        $this->createModel();

        return $results;
    }

    public function paginate($count = 3)
    {
        $this->applyCriteria();
        $this->applyOrderBy();
        $results = $this->model->paginate($count);
        $this->createModel();

        return $results;
    }

    private function createModel(): void
    {
        $this->model = $this->app->make($this->model());
    }

    protected function model(): string
    {
        return Product::class;
    }

    public function setOrderBy($orderBy, $desc = null): self
    {
        $this->orderBy = $orderBy;
        if ($desc) {
            $this->desc = $desc;
        }
        return $this;
    }

    /**
     * @return Model
     */
    protected function getModel(): Model
    {
        return $this->model;
    }

    protected function addCriteria(CriteriaInterface $criteria): self
    {
        $this->criteriaList[] = $criteria;

        return $this;
    }


    private function applyCriteria(): void
    {
        foreach ($this->criteriaList as $criteria) {
            if (is_string($criteria)) {
                $criteria = new $criteria;
            }
            $this->model = $criteria->apply($this->model);
        }
    }

    private function applyOrderBy()
    {
        if ($this->orderBy) {
            $this->model->orderBy($this->orderBy, $this->desc);
        }
    }


}
