<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Poem\PoemStoreRequest;
use App\Repositories\PoemRepository;

class PoemController extends Controller
{
    public function store(PoemStoreRequest $request)
    {
        try {
            $this->PoemRepository->store($request);
            return response()->json(['error' => false, 'message' => 'Berhasil Insert Data'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
    
}
