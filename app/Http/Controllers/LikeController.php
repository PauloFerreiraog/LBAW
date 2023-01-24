<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Like;

class LikeController extends Controller
{   
    public function create($publication_id)
    {
        if (!ctype_digit($publication_id)) {
            abort(404);
        }

        $r = Publication::find($publication_id);
        //$this->authorize('like', $r);

        if ($r != null) {
            $l = Like::where('user_id', '=', Auth()->user()->id)->where('publication_id', '=', $publication_id)->get();

            if (count($l) == 1) {
                $l[0]->delete();
            } else {
                $r->likes()->create([
                    'user_id' => Auth()->user()->id,
                    'publication_id' => $publication_id
                ]);
            }
        }
        return response('', 200)->header('Content-Type', 'text/plain');
    }
}
