@extends('layouts.app',['title'=>'Feed'])

@section('content')

<!-- ================= Main ================= -->
<div class="container">
    <div class="row justify-content-evenly">

        <!-- ================= Sidebar ================= -->
        
        @include('layouts.sidebar_user', ['groups' => $groups])

        <!-- ================= Timeline ================ -->
        <div>  

                <!-- create publication -->
                @auth
                    @include('partials.create_publication')
                
                    @foreach($publications as $publication)
                                  
                        @include('partials.publication', ['publication' => $publication])
                       
                    @endforeach

                @endauth
            
        </div>

        <!-- ================= Chatbar ================= -->
        @include('layouts.chatbar')

    </div>
</div>



@endsection