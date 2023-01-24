@extends('layouts.app')

@section('content')

    <div class="mt-lg-5 mt-3 container">

        <div class="bg-primary col-lg-6 col-md-8 col-12 mx-auto py-5 px-5 login_form">
            <div class="text-center mb-5 text-light pb-2">
                <h3>Login to <strong>Postbook</strong></h3>
            </div>

            @if (session('status'))
                <div class=".bg-danger text-danger text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group mb-3 mt-3 py-2">
                    
                    <label class="text-light" for="email">E-mail</label>
                    <input name="email" type="email" 
                        class="form-control @error('email') border border-danger @enderror" placeholder="E-mail"
                        id="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                </div>
                <div class="form-group mb-3 mt-3 py-2">
                    <label class="text-light" for="password">Password</label>
                    <input type="password" name="password"
                        class="form-control @error('password') border border-danger @enderror" placeholder="Your Password"
                        id="password" required>

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="submit" value="Login" class="btn btn-block btn-secondary">

                <div class="btn btn-block btn-secondary">
                    <a href="{{ route('register') }}"> Register</a>
                </div>
            </form>

            
            
        </div>

    </div>

@endsection
