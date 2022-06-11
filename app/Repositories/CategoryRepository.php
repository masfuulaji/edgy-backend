<?php

namespace App\Repositories;

use Exception;
use App\Models\Category;
use App\Traits\CollectionTrait;

class CategoryRepository
{
    use CollectionTrait;
    public function find($id, $relation = null)
    {
        try {
            $query = Category::where('id', $id);
            if ($relation) {
                $query->with($relation);
            }
            return $query->first();
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function store($request)
    {
        try {
            return Category::create($request);
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function update($request, $id)
    {
        try {
            return Category::find($id)->update($request);
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function delete($id){
        try {
            return Category::find($id)->delete();
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function all($request, $limit = null, $offset = null) {
        try {
            $sort = $request['sort'] ?? 'id';
            $sortBy = $request['sort_by'] ?? 'desc';
            $column = ["name", "description"];
            $search = $request['search'] ?? '';

            $query = $this->model->query();
            $query = $this->pagination($query, $column, $search, $sort, $sortBy);
            if($limit && $offset === null) return $query->paginate($limit);
            elseif($limit > 0 && $offset != null) $query->skip($offset)->take($limit);
            return $query->get();
        } catch(\Exception $e) {
            throw $e; report($e); return $e;
        }
    }
}
