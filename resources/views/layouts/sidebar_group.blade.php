<div class="col-4 col-lg-3">

    <div class="d-none d-xxl-block h-100 fixed-top overflow-hidden scrollbar"
        style="max-width: 360px; width: 100%; lenght: 100%; z-index: 4">
        
        <ul class="navbar-nav mt-4 ms-3 d-flex flex-column pb-5 mb-5"
                style="padding-top: 56px">

            <!-- avatar -->
            <li class="dropdown-item p-1 rounded">
                <a href="#" class=" d-flex align-items-center 
                    text-decoration-none text-dark ">

                    <a type="button" class="btn px-4" style="text-decoration:none; color: #000000" href="{{url('group' . '/'. $group->id) }}">
                        <div class="p-2">
                            <img src="{{url('/' . $group->image)}}" 
                                alt="avatar" class="rounded-circle me-2"
                                style="width: 38px; height: 38px; object-fit: cover"
                            />
                        </div>
                        
                        <div>
                            <p class="m-0">{{$group->name}}</p>
                        </div>
                        
                        </a>
                        
                    </a>
                </li>

            <!-- top 1 -->
            <li class="dropdown-item p-1 rounded">
            
                <a href="{{url('group/members/' . $group->id) }}" class=" d-flex align-items-center 
                    text-decoration-none text-dark">
                    <div class="p-2">
                    
                        <img
                            src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/tSXYIzZlfrS.png"
                            alt="from fb" class="rounded-circle"
                            style="width: 38px; height: 38px; object-fit: cover"
                        />
                    </div>
                    
                        <div>
                            <p class="m-0">Members</p>
                        </div>
                    
                </a>
            </li>
            <li>
                <div class="col d-flex align-items-center">
                <form action="{{ url('groupSearch') . '/' . $group->id }}" method="GET">
                     <input type="text" name="search" class="rounded-pill bg-gray pointer" required placeholder="Search for Users"/>
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
              </div>
            </li>


            
                    
        </ul>         
    </div>
</div>

