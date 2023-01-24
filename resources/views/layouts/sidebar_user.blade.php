<div class="col-2 col-lg-2">

    <div class="d-none d-xxl-block h-100 fixed-top overflow-hidden scrollbar"
        style="max-width: 360px; width: 100%; lenght: 100%; z-index: 4">
        
        <ul class="navbar-nav mt-4 ms-3 d-flex flex-column pb-5 mb-5"
                style="padding-top: 56px">

            <!-- avatar -->
            <li class="dropdown-item p-1 rounded">
                <a href="#" class=" d-flex align-items-left 
                    text-decoration-none text-dark ">

                    <a type="button" class="btn px-4" style="text-decoration:none; color: #000000" href="{{url('get_profile' . Auth::user()->id) }}">
                        <div class="p-2">
                            <img src="{{auth()->user()->image}}"
                                alt="avatar" class="rounded-circle me-2"
                                style="width: 38px; height: 38px; object-fit: cover"
                            />
                        </div>
                        
                        <div>
                            <p class="m-0">{{auth()->user()->name}}</p>
                        </div>
                    </a>
                        
                </a>
            </li>

            <!-- top 1 -->
            <li class="dropdown-item p-1 rounded">
            
                <a href="{{ route('friends') }}" class=" d-flex align-items-center 
                    text-decoration-none text-dark">
                    <div class="p-2">
                    
                        <img
                            src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/tSXYIzZlfrS.png"
                            alt="from fb" class="rounded-circle"
                            style="width: 38px; height: 38px; object-fit: cover"
                        />
                    </div>
                    
                        <div>
                            <p class="m-0">Friends</p>
                        </div>
                    
                </a>
            </li>

            <hr class="m-0" />
        
            <!-- heading -->
            <div class=" d-flex justify-content-between
                align-items-center mt-2 text-muted edit-heading">
                <h4 class="m-0 pointer">Your Groups</h4>     
            </div>

            @foreach ($groups as $group)
                @include('partials.group_side', ['group' => $group])
            @endforeach

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Create Group
                    </button>
                  </h2>
                  
                  <form method="post" action="createGroup" enctype="multipart/form-data">
                    <div id="flush-collapseOne" class="accordion-collapse collapse mt-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" name="name" class="form-control rounded-pill bg-gray pointer" placeholder="Name">                       
                        <input type="file" name="image" class="custom-file-input btn">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                  </form>
                  
                </div>
            </div>
                        
        </ul>         
    </div>
</div>

