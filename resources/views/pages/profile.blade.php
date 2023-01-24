@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-evenly">

        <!-- ================= Sidebar ================= -->
        
       

        <!-- ================= Timeline ================ -->
        <div>  

                <!-- create publication -->
                @auth
                    @include('partials.personal_profile')
                
                    @foreach($publications as $publication)
                          @if($publication->user_id==$profile_user->id)  
                        @include('partials.publication', ['publication' => $publication])
                       @endif
                    @endforeach

                @endauth
            
        </div>

      
    </div>
</div>


@endsection