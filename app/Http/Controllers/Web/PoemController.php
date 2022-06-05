<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Poem\PoemStoreRequest;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    public function store(PoemStoreRequest $request)
    {
        try {
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
