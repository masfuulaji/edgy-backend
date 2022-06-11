<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Repositories\CategoryRepository;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function find($id)
    {
        try {
            $data = $this->categoryRepository->find($id);
            return response()->json(['error' => false, 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['error' > true, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(CategoryStoreRequest $request)
    {
        try {
            $this->categoryRepository->store($request);
            return response()->json(['error' => false, 'message' => 'Successfully insert data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' > true, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        try {
            $this->categoryRepository->update($request, $id);
            return response()->json(['error' => false, 'message' => 'Successfully update data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' > true, 'message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $this->categoryRepository->delete($id);
            return response()->json(['error' => false, 'message' => 'Successfully deleted data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' > true, 'message' => $e->getMessage()], 500);
        }
    }

    public function all(Request $request)
    {
        try {
            $data = $this->categoryRepository->all($request->only("sort", "sort_by", "search"), $request->limit ?? 10, $request->offset ?? null);
            return response()->json(['error' => false, 'data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['error' > true, 'message' => $e->getMessage()], 500);
        }
    }
}
