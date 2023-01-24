@extends('layouts.app',['title'=>'Home'])

@section('content')

    <div class="welcome-header px-3 py-auto pt-md-4 pb-md-4 mx-auto text-center mt-2 mt-md-2">
        <h1 class="display-3">
            Welcome
        </h1>
        <div>
            <p class="col-12 col-lg-6 mx-auto">Postbook is a Social network that allows people
                to talk, make friends and discuss and share their feelings.
            </p>
        </div>
    </div>

    <div class="container text-center">
        <a type="button" class="btn btn-lg btn-block btn-primary my-3 mx-auto wide w-50" href="{{ route('register') }}">
            Register
        </a>
    </div>

    <div class="container text-center">
        <a type="button" class="btn btn-lg btn-block btn-primary my-3 mx-auto wide w-50" href="{{ route('login') }}">
            Login
        </a>
    </div>


 
@endsection
