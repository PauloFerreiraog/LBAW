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
                                            <div class="records">You have <b>{{sizeof($members)}}</b> members</div>
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

                                            
                                                    @foreach ($members as $friend)
                                                        
                                                        
                                                   
                                                <tr>
                       
                                                        <td>
                                                            <div class="widget-26-job-emp-img">
                                                            <a type="button" href="{{url('get_profile' . $friend->id) }}">  <img src="{{'/' . $friend->image}}" style="width:120px; heigth:120px; width:140px ;height:140px ;object-fit: cover" class="bg-info rounded-circle" alt="Profile image" width="300" height=auto />
                                                            </a>    
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-26-job-title">
                                                              <a >{{$friend->name}}</a> 
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-26-job-info">
                                                                <p class="type m-0">{{$friend->birthday}}</p>
                                                            
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="widget-26-job-category bg-soft-warning">
                                                                <i class="indicator bg-warning"></i>
                                                                <span>{{$friend->email}} </span>
                                                            </div>
                                                        </td>

                                                    @can('remove', $group, $friend)
                                                        @if($friend->id != Auth::id())
                                                           
                                                            <td>
                                                                <a href="{{url('removeMember' .'/' . $group->id  .'/' .$friend->id) }}"><span class="btn btn-danger">Remove Member</span></a>
                                                            </td>

                                                        @endif
                                                    @endcan
                                                </tr>
                                                        @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!-- <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-base pagination-boxed pagination-square mb-0">
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                          
                            </li>
                        </ul>
                    </nav>-->
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
