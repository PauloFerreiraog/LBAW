z@extends('layouts.app',['title'=>'Publications'])

@section('content')

    @auth
        @foreach($publications as $publication)
            
                @include('partials.publication', ['publication' => $publication])
           
        @endforeach
    @endauth

@endsection
