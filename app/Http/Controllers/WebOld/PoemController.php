<?php

namespace App\Http\Controllers\WebOld;

use App\Http\Controllers\Controller;
use App\Models\Poem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PoemController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'description' => 'required',
        ]);
        try {
            $user_id = Auth::id();
            $count = Poem::where('date', date("Y-m-d"))
                ->where('user_id', $user_id)
                ->where('deleted_at', null)
                ->count();
            if ($count > 0) {
                return response()->json(['error' => true, 'message' => 'Sudah membuat puisi hari ini'], 200);
            } else {

                Poem::create([
                    'user_id' => $user_id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'date' => date("Y-m-d"),
                ]);
                return response()->json(['error' => false, 'message' => 'Berhasil Insert Data'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
