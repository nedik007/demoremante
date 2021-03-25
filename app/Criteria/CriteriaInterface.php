<?php
namespace App\Criteria;

use Illuminate\Database\Eloquent\Model;

interface CriteriaInterface
{
    public function apply(Model $model);
}
