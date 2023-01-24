@extends('layouts.app',['title'=>'Group Page'])

@section('content')

<!-- ================= Main ================= -->
<div class="container" id="group_{{$group->id}}">
    <div class="row justify-content-evenly">

        <!-- ================= Sidebar ================= -->
        
        @include('layouts.sidebar_group', ['group' => $group])

        <!-- ================= Timeline ================ -->
        <div>  

            <!-- create publication -->
            @auth
                @include('partials.create_publication_group', ['group' => $group])
            
                @foreach($publications as $publication)
                                
                    @include('partials.publication', ['publication' => $publication])
                    
                @endforeach

            @endauth
        
        </div>

        <!-- ================= Chatbar ================= -->

        @include('layouts.chatbar_group')

    </div>
</div>