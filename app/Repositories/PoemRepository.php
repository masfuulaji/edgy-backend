<?php

namespace App\Repositories;

use App\Models\Poem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PoemRepository
{
    public function checkTodayPoem()
    {
        try {
            return Poem::where('date', date("Y-m-d"))
                ->where('user_id',  Auth::id())
                ->where('deleted_at', null)
                ->count();
        } catch (ModelNotFoundException $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function store($request)
    {
        try {
            $count = $this->checkTodayPoem();
            if ($count > 0) {
                return response()->json(['error' => true, 'message' => 'Sudah membuat puisi hari ini'], 200);
            }
            $request['user_id'] = Auth::id();
            $request['date'] = date("Y-m-d");
            return Poem::created($request);
        } catch (ModelNotFoundException $e) {
            throw $e;
            report($e);
            return $e;
        }
    }
}
