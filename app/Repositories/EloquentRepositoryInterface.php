<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface EloquentRepositoryInterface
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(FormRequest $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
}