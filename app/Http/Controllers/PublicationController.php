<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use App\Models\User;
use App\Models\Group;
use App\Models\Publication;
use App\Models\Comment;
use App\Models\Friendship;
use Exception;

use Illuminate\Http\Request;

class PublicationController extends Controller{

	public function getPublications(){

		//if (!Auth::check()) return redirect('/login');
		//$this->authorize('list', Group::class);
		//$publications = Publication::all();
	

		$publications = Publication::all()->sortByDesc('date');

		return view('pages.publications', ['publications' => $publications]);
	  }



	//Shows a publication
	public function show($id){
        if (!ctype_digit($id)) {
			abort(404);
		}

		$publications = Publication::find($id);

		if ($publications == null) {
			return redirect('/');
		}

		return view('partials.publication', ['publication' => $publications]);
	}

	public function addPublication(Request $request) {
        

		// $this->authorize('create', FriendRequest::class);

		
		if($request->image != null){
			$imageName = time() . '.' . $request->image->extension();
			$request->image->move(public_path('img'), $imageName);

			if($request->group_id != null){
				$publication = Publication::create([
					'description' => $request->body,
					'user_id' => Auth::user()->id,
					'image' => 'img/' . $imageName,
					'group_id' => $request->group_id,
				]);
			}else{
				$publication = Publication::create([
					'description' => $request->body,
					'user_id' => Auth::user()->id,
					'image' => 'img/' . $imageName,
				]);
			}
			
		}else{
			if($request->group_id != null){
				$publication = Publication::create([
					'description' => $request->body,
					'user_id' => Auth::user()->id,
					'group_id' => $request->group_id,
				]);
			}else{
				$publication = Publication::create([
					'description' => $request->body,
					'user_id' => Auth::user()->id,
				]);
			}
		}

		$publication->save();

		return back();
	 }

	//Deletes a publication
	public function delete(Request $request, $publication_id)
	{
		if (!ctype_digit($publication_id)) {
			abort(404);
		}
		$r = Publication::find($publication_id);

		$this->authorize('delete', $r);

		$delete = DB::table('publication')->where('id', $publication_id)->delete();

		return back();
	}

	public function update(Request $request, $publication_id)
	{
		if (!ctype_digit($publication_id)) {
			abort(404);
		}
		$publication = Publication::find($publication_id);

		try {
			$this->validate($request, [
				'description' => 'required',
			]);
		} catch (Exception $publication) {
			return response('error', 200)->header('Content-Type', 'text/plain');
		}

		$this->authorize('edit', $publication);

		if ($publication != null) {
			$publication->description = $request->description;
			$publication->save();
		}
		return back();
	}


	/*
	static public function groupPublication(Group $group)
	{
		return Publication::where('group_id', $group->id)->orderBy('date', 'desc')->get();
	}

	public function create(Request $request){

		if ($request->group != -1) {
			$this->authorize('create', [Publication::class, $request->group]);
		} else {
			$this->authorize('create', [Publication::class, null]);
		}

		if ($request->group != -1) {
			if (!is_numeric($request->group)) {
				abort(404);
			}
			$r = Publication::where('user_id', $request->user()->id)->where('group_id', $request->group)->get();
		} else {
			$r = Publication::where('user_id', $request->user()->id)->where('group_id')->get();
		}

		if (count($r) != 0) {
			return response('alreadyExists', 200)->header('Content-Type', 'text/plain');
		}

		$this->validate($request, [
			'description' => 'required',
		]);

		$publication = $request->user()->publications()->create([
			'description' => $request->description,
			'date' => date('Y-m-d H:i:s'),
		]);

		if ($publication != null && $request->group != null && $request->group != -1) {

			$group = Group::find($request->group);

			$publication->group()->associate($group);

			$publication->save();
		}
		return view("partials.publication", ["publication" => $publication]);
	}

	

	public function getPublication($publication_id)
	{
		if (!ctype_digit($publication_id)) {
			abort(404);
		}
		return Publication::find($publication_id);
	}

	
	*/
}
