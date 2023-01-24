@extends('layouts.app')

@section('content')

  <div class="mt-lg-5 mt-3 container d-flex flex-column">

    <div class="bg-primary col-lg-6 col-md-8 col-12 mx-auto py-5 px-5 login_form">
      <div class="text-center mb-5 text-light pb-2">
        <h3>Register in <strong>Postbook</strong></h3>
      </div>

      <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group mb-3 text-light">

          <label for="name">Name *</label>
          <input type="text" name="name" class="form-control @error('name') border border-danger @enderror"
                  placeholder="Name" id="name" value="{{old('name')}}" required>

          @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
          @endif
        </div>

        <div class="form-group mb-3  text-light">
          <label for="email">E-Mail Address *</label>
          <input type="text" name="email" class="form-control @error('email') border border-danger @enderror"
                  placeholder="e-mail" id="email" value="{{old('email')}}" required>

          @error('email')
            <div class="text-danger">
              {{ $message }}
            </div>
          @enderror
        </div>
    
        <div class="form-group mb-3  text-light">
          <label for="password">Password *</label>
          <input type="password" name="password"
          class="form-control @error('password') border border-danger @enderror" id="password" required>

          @error('password')
            <div class="text-danger">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group mb-3  text-light">
          <label for="cpass">Confirm Password *</label>
          <input type="password" name="password_confirmation"
              class="form-control @error('password_confirmation') border border-danger @enderror"
              id="cpassword" required>
          @error('password_confirmation')
              <div class="text-danger">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <input type="submit" value="Submit" class="btn btn-block btn-secondary wide mt-5">

      </form>

      <div class="mt-2 d-flex justify-content-between">
        <a href="{{ route('login') }}"> Register</a>
      </div>

    </div>

  </div>

@endsection
