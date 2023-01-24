<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use App\Models\Comment;
use Illuminate\Http\Request;

use Exception;

class CommentController extends Controller
{
    static public function getUser($author)
    {
        return User::find($author);
    }

    //Adds a comment in a publication
    public function create(Request $request, $publication_id)
    {
        if (!ctype_digit($publication_id)) {
            abort(404);
        }
        
        //$this->authorize('create', [Comment::class, $publication_id]);

        $publication = Publication::find($publication_id);

        try {
            $comment = $request->user()->comments()->create([
                'content' => $request->text,
                'date' => date('Y-m-d H:i:s'),
                'publication_id' => $publication_id
            ]);
        } catch (Exception $e) {
            return response('text too short', 500)->header('Content-Type', 'text/plain');
        }
        return response('', 200)->header('Content-Type', 'text/plain');
    }


    //Deletes a comment
	public function delete(Request $request, $comment_id)
	{
		if (!ctype_digit($comment_id)) {
			abort(404);
		}
		$comment = Comment::find($comment_id);

		$this->authorize('delete', $comment);

		$comment->delete();

		return back();
	}

    public function update(Request $request, $comment_id)
	{
		if (!ctype_digit($comment_id)) {
			abort(404);
		}
		$comment = Comment::find($comment_id);

		try {
			$this->validate($request, [
				'content' => 'required',
			]);
		} catch (Exception $publication) {
			return response('error', 200)->header('Content-Type', 'text/plain');
		}

		$this->authorize('edit', $comment);

		if ($comment != null) {
			$comment->content = $request->content;
			$comment->save();
		}
		return back();
	}

}
