<div class="col-12 col-lg-3">
    <div class=" d-none d-xxl-block h-100 fixed-top end-0 overflow-hidden scrollbar"
        style=" max-width: 360px; width: 100%; z-index: 4;
        padding-top: 56px; left: initial !important;">

        <div class="my-3 d-flex justify-content-between align-items-center">
            <p class="text-muted fs-5 m-0">Contacts</p>
            
            <div class="text-muted">

                <!-- new chat -->
               
            </div>
        </div>

        @foreach($friends as $friend)
        <a type="button" href="{{url('get_userMessages' . $friend->id)}}" style="text-decoration: none;">
            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal" data-bs-target="#singleChat1">
                

                <!-- avatar -->
                <div class="d-flex align-items-center mx-2 chat-avatar" >
            

                    <div class="position-relative">
                        <img src="{{$friend->image}}" alt="avatar"
                            class="rounded-circle me-2"
                            style="width: 38px; height: 38px; object-fit: cover"
                        />
                    <!-- <span class=" position-absolute bottom-0
                            translate-middle border border-light rounded-circle
                            bg-success p-1 " style="left: 75%">
                            
                            <span class="visually-hidden"></span>
                        </span>-->
                    </div>
                    <p class="m-0" >{{$friend->name}}</p>
                </div>
            </li> 
        </a>
        @endforeach 
                              
    </div> 
</div>