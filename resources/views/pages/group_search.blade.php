@extends('layouts.app')


@section('content')

<div class="container">
</div>
<div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                <div class="result-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="records">Showing: <b>{{sizeof($users)}}</b>  results</div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody>
                                                
                                                <tr>
                                                    <td>
                                                       <b> Profile Image</b>
                                                    </td>
                                                    <td>
                                                    <b> Username</b>
                                                    </td>
                                                    <td>
                                                    <b> Birthday</b>
                                                    </td>
                                                    
                                                    <td>
                                                    <b> Email</b>
                                                    </td>
                                                    
                                                </tr>

                                                @if($users->isNotEmpty())
                                                        @foreach ($users as $user)
                                                        
                                                        

                                                <tr>
                       
                                                    <td>
                                                        <div class="widget-26-job-emp-img avatar" >
                                                        <a type="button" href="{{url('get_profile' . $user->id) }}">  <img src="{{ url($user->image) }}"  alt="Profile image" width="300" height=auto style="width:140px ;height:140px ;object-fit: cover" class="bg-info rounded-circle" /></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-title">
                                                            <a>{{$user->name}}</a>
                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-info">
                                                            <p class="type m-0">{{$user->birthday}}</p>
                                                           
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        <div class="widget-26-job-category bg-soft-warning">
                                                            <i class="indicator bg-warning"></i>
                                                            <span>{{$user->email}} </span>
                                                        </div>
                                                    </td>
                                                    
                                                    @if($user->id!=Auth::id() )
                                                        
                                                        @if(!Auth::user()->friends_with($user->id,Auth::id()))

                                                            <td>
                                                                <a href="{{url('addMember'  . '/' . $group->id . '/' . $user->id) }}"><span class="btn btn-primary">Add Member</span></a>
                                                            </td>
                                                                   
                                                        @endif

                                                    @endif  
                                                </tr>
                                                        @endforeach
                                                @else 
                                                <td>
                                                    <h2>No users found</h2>
                                                </td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
