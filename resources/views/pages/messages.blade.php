@extends('layouts.app')


@section('content')

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
           
            <div class="chat" >
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="{{$message_user->image}}" alt="avatar" style="width:100px ;height:100px ;object-fit: cover" class="bg-info rounded-circle">
                            </a>
                            <div class="chat-about">
                                <b class="m-b-0">{{$message_user->name}}</b>
                                
                            </div>
                        </div>
                       <!-- <div class="col-lg-6 hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div>-->
                    </div>
                </div>
                <div class="chat-history"  >
                    <ul class="m-b-0" >
                       <!-- <li class="clearfix">
                            <div class="message-data text-right">
                                <span class="message-data-time">10:10 AM, Today</span>
                                <img src="" alt="avatar">
                            </div>
                            <div class="message other-message float-right"> Lorem ipsum dolor sit, amet consectetur adipisicing. </div>
                        </li>
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">10:12 AM, Today</span>
                            </div>
                            <div class="message my-message">Lorem ipsum dolor sit.</div>                                    
                        </li>                               
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">10:15 AM, Today</span>
                            </div>
                            <div class="message my-message">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis</div>
                        </li> -->


                        @foreach($messages as $message)
                        
                        @if( ( ($message->receiver_id==Auth::id() && $message->sender_id==$message_user->id) || ($message->sender_id == Auth::id() && $message->receiver_id==$message_user->id ) ))
                            
                            @if($message->sender_id == Auth::id())
                            <li class="clearfix">
                                <div class="message-data ">
                                    <span class="message-data-time ">{{\Carbon\Carbon::parse($message->date)->diffForHumans()}}</span>
                                </div>
                                <div class="message my-message float-right">{{$message->content}}</div>                                    
                            </li>   
                            @else
                            <li class="clearfix">
                                <div class="message-data ">
                                    <span class="message-data-time">{{\Carbon\Carbon::parse($message->date)->diffForHumans()}}</span>
                                </div>
                                <div class="message my-message">{{$message->content}}</div>                                    
                            </li>   
                            @endif
                        @endif
                        @endforeach
                        

                    </ul>
                </div>
                <div class="chat-message clearfix">
                <form method="post" action="messages" {{$message_user}} enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" name="body" class="form-control rounded-pill bg-gray pointer" placeholder="Send Message">
                        
                        <input type="text" style="display: none" name="message_user_id" value={{$message_user_id}} >
                        <hr />
                        <!-- actions -->
                        <div class="d-flex flex-column flex-lg-row mt-3">
                            <div class=" dropdown-item rounded d-flex align-items-center 
                                justify-content-center " type="button" >

                                
                                

                                
                            </div>


                            <input type="submit" name="submit" class="btn btn-primary" value="Send Message">
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
