@extends('layouts.app',['title'=>'FAQ'])

@section('content')

<div class="container">
    <h1 class="display-4 mt-3 ">
        FAQ's
    </h1>
    <div class="row mt-4">
        <h2 class="lead col-lg-8 center rounded-pill bg-primary">
            How do I login?
        </h2>
        <h4 class="lead col-lg-8 right">
            Insert email and password to login.
        </h4>
    </div>
    <div class="row mt-3">
        <h2 class="lead col-lg-8 center rounded-pill bg-primary">
            How do I Register?
        </h2>
        <h4 class="lead col-lg-8 left">
            Insert email and password and confirm password
        </h4>
    </div>
    <div class="row mt-3">
        <h2 class="lead col-lg-8 center rounded-pill bg-primary">
            What can I do with the app?
        </h2>
        <h4 class="lead col-lg-8 left">
            Send messages, Create publications, send friends requests, comment on publications
        </h4>
    </div>  
    
</div>

@endsection
