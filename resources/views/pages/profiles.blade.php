@extends('layouts.app')

@section('content')
<div style = "position:absolute; left: 350px; top: 100px;">
  <div class="square">
    <div class="square2">
    <div style="position: absolute; left: 100px; top: 70px;"><img src= "{{auth()->user()->image}}" width="200" height=auto /></div>
      <div style="position: absolute; left: 900px; top: 150px;">
        <h1>{{$profile_user->name}}</h1>  
       <a href="javascript:void(0);" class="lol">Add Friend</a>
      </div>
    </div>
  </div>

@endsection