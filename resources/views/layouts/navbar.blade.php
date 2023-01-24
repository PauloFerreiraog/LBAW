<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    
    crossorigin="anonymous" referrerpolicy="no-referrer"
/>

<div class="bg-white d-flex align-items-center fixed-top shadow"
  style="min-height: 56px; z-index: 5">
    
  <div class="container-fluid">

    <div class="row align-items-center">

      <!-- search -->
      <div class="col d-flex align-items-center" >

        <!-- logo -->
        <i type="button" class="fab fa-product-hunt color-blue"  href="{{ route('feed') }}" style="font-size: 3rem; color: rgb(0, 89, 255)"></i>
        <h2 class="m-2 fs-7 ">Postbook</h2>
        <!-- search bar -->
        <div class="input-group ms-2" type="button">
            
            
        </span>
          
            
          <!-- search menu -->
          <ul class="dropdown-menu overflow-auto border-0 shadow p-3" aria-labelledby="searchMenu" style="width: 20em; max-height: 600px">     

            <!-- search result -->
            <li class="my-4">
              <div class=" alert fade show dropdown-item p-1 m-0 d-flex 
                  align-items-center justify-content-between" role="alert">

                <div class="d-flex align-items-center">
                  <img src="https://source.unsplash.com/random/3"
                    alt="avatar" class="rounded-circle me-2"
                    style="width: 35px; height: 35px; object-fit: cover"
                  />
                  <p class="m-0">Lorem ipsum</p>
                </div>

              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="col d-flex align-items-center">
        <form action="{{ route('searchs') }}" method="GET">
             <input type="text" name="search" class="rounded-pill bg-gray pointer" required placeholder="Search for Users"/>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>

      <!-- nav -->
      <div class="col d-none d-xl-flex justify-content-center">
          
          <!-- feed -->
          <div class="container text-center">
            <a type="button" class="btn px-4" href="{{ route('feed') }}">
              <i class="fas fa-home text-muted fs-4"></i>
            </a>
          </div>

          <!-- groups -->
          <div class="container text-center">
            <a type="button" class="btn px-4" href="{{ route('groups') }}">
              <i type="button" class="position-relative fas fa-users text-muted fs-4"href="{{ route('groups') }}">
                
                 <!-- <span class="visually-hidden"></span>-->
                </span>
              </i>
            </a>
          </div>
          
          <!-- messages --> 
          
        
        </div>


        <!-- menus -->
        <div class="col d-flex align-items-center justify-content-end">

          <!-- avatar -->
          <a type="button" style="text-decoration:none; color: #000000" href="{{url('get_profile' . Auth::user()->id) }}">
            <div class="align-items-center justify-content-center d-none d-xl-flex">
              <img src="{{('/' . auth()->user()->image)}}"
                class="rounded-circle me-2" alt="avatar"
                style="width: 38px; height: 38px; object-fit: cover"/>
              <p class="m-0" style="text-decoration:none">{{auth()->user()->name}}</p>
            </div> 
          </a>   

          <!-- chat -->
          <!--<div class="rounded-circle p-1 bg-gray d-flex align-items-center 
            justify-content-center mx-2"
            style="width: 38px; height: 38px" type="button" id="chatMenu"
            data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            <i class="fas fa-comment"></i>
          </div>-->

          <!-- chat  dropdown -->
          <ul class="dropdown-menu border-0 shadow p-3 overflow-auto"
            aria-labelledby="chatMenu"
            style="width: 23em; max-height: 600px"
          >

            <!-- header -->
            <li class="p-1">
              <div class="d-flex justify-content-between">
                <h2>Message</h2>
                <div>

                  <!-- new message -->
                  <i class="fas fa-edit text-muted mx-2" type="button"
                    data-bs-toggle="modal" data-bs-target="#newChat">
                  </i>
                </div>
              </div>
            </li>

            <!-- search -->
            <li class="p-1">
              <div class="input-group-text bg-gray border-0 rounded-pill"
                style="min-height: 40px; min-width: 230px" >
                <i class="fas fa-search me-2 text-muted"></i>
                <input type="text" class="form-control rounded-pill border-0 bg-gray"
                  placeholder="Search Messenger"
                />
              </div>
            </li>

            <!-- message -->
            <!--<li class="my-2 p-1" type="button"
              data-bs-toggle="modal" data-bs-target="#singleChat1">
              <div class="d-flex align-items-center justify-content-between">

                <!-- big avatar -->
                <div class="d-flex align-items-center justify-content-evenly">
                  <div class="p-2">
                    <img src="https://source.unsplash.com/random/1" alt="avatar"
                      class="rounded-circle"
                      style="width: 58px; height: 58px; object-fit: cover"
                    />
                  </div>
                  <div>
                    <p class="fs-7 m-0">Mike</p>
                    <span class="fs-7 text-muted">Lorem ipsum &#8226; 7d</span>
                  </div>
                </div>

                <!-- small avatar 
                <div class="p-2">
                  <img src="https://source.unsplash.com/random/1" alt="avatar"
                    class="rounded-circle"
                    style="width: 15px; height: 15px; object-fit: cover"/>
                </div>
              </div>
            </li>-->

            <hr class="m-0" />

            <a href="#" class="text-decoration-none">
              <p class="fw-bold text-center pt-3 m-0">See All Messages</p>
            </a>
          </ul>

          <!-- notifications -->
         <!-- <div class=" rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center mx-2"
            style="width: 38px; height: 38px"
            type="button" id="notMenu" data-bs-toggle="dropdown" aria-expanded="false"
            data-bs-auto-close="outside">

            <i class="fas fa-bell"></i>
          </div>-->

          <!-- notifications dd -->
          <ul class="dropdown-menu border-0 shadow p-3"
            aria-labelledby="notMenu"
            style="width: 23em; max-height: 600px; overflow-y: auto">

            <!-- header -->
            <li class="p-1">
              <div class="d-flex justify-content-between">
                <h2>Notifications</h2>
              </div>
              <div class="d-flex" type="button">
                <p class="rounded-pill bg-gray p-2">All</p>
                <p class="ms-3 rounded-pill bg-primary p-2 text-white">
                  Unread
                </p>
              </div>
            </li>

            <!-- news -->
            <div class="d-flex justify-content-between mx-2">
              <h5>New</h5>
              <a href="#" class="text-decoration-none">See All</a>
            </div>

            <!-- news 1 -->
            <li class="my-2 p-1">
              <a href="#" class=" d-flex align-items-center
                justify-content-evenly text-decoration-none text-dark">
                <div class="d-flex align-items-center justify-content-evenly">
                  <div class="p-2">
                    <img src="https://source.unsplash.com/random/1" alt="avatar"
                      class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover"/>
                  </div>

                  <div>
                    <p class="fs-7 m-0">
                      Corpo na notificacao.
                    </p>
                    <span class="fs-7 text-primary">about an hour ago</span>
                  </div>

                </div>
                <i class="fas fa-circle fs-7 text-primary"></i>
              </a>
            </li>   
          </ul>

          <!-- secondary menu -->
          <div class=" rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center mx-2"
            style="width: 38px; height: 38px"
            type="button" id="secondMenu" data-bs-toggle="dropdown" aria-expanded="false"
            data-bs-auto-close="outside">

            <i class="fas fa-caret-down"></i>
          </div>

          <!-- secondary menu dd -->
          <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="secondMenu"
            style="width: 23em">
            
          
            <!-- avatar -->
            <li class="dropdown-item p-1 rounded d-flex" type="button">
              <img src="{{'/' . auth()->user()->image}}"  href="{{ url('/profile') }} alt="avatar"
                class="rounded-circle me-2" style="width: 45px; height: 45px; object-fit: cover"/>
              <div>
                <p class="m-0">{{Auth::user()->name}}</p>
                <p class="m-0 text-muted">See your profile</p>
              </div>
            </li>

            <hr />

            <!-- 2 -->
            <li class="dropdown-item p-1 my-3 rounded" type="button">
              <a href="{{ url('/logout') }}"
                class="d-flex text-decoration-none text-dark">
                <i class="fas fa-sign-out-alt bg-gray p-2 rounded-circle"></i>
                <div class=" ms-3 d-flex justify-content-between
                  align-items-center w-100">
                  <p class="m-0">Log Out</p>
                </div>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>


  </div>

  
</div>