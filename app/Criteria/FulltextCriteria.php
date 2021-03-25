<?php

namespace App\Criteria;

use Illuminate\Database\Eloquent\Model;

class FulltextCriteria implements CriteriaInterface
{

    /**
     * @var string
     */
    protected $q;

    public function __construct($q)
    {
        $this->q = $q;
    }

    public function apply(Model $model)
    {
        return $model->where('title', 'like', '%' . $this->q . '%')->orWhere('description', 'like', '%' . $this->q . '%');
    }
}
