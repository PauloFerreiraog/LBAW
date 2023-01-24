<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-8 pb-2">

            <div class="bg-white p-3 mt-3 rounded border shadow" id="publication_{{ $publication->id }}">

                <!-- author -->
                <div class="d-flex justify-content-between">
                    <!-- avatar -->
                    <div  class="d-flex">
                        <a type="button" href="{{url('get_profile' . $publication->user_id) }}">             
                            <img src={{ url('/' . $publication->user->image) }}
                                alt="avatar" class="rounded-circle me-2"
                                style="width: 38px; height: 38px; object-fit: cover">
                        </a>
                        <div>
                        <a type="button" style="text-decoration:none ;color:#000000 " href="{{url('get_profile' . $publication->user_id) }}">
                            <p class="m-0 fw-bold txt">{{ $publication->user->name }}</p> 
                        </a>
                            <span class="text-muted fs-7"> {{ \Carbon\Carbon::parse($publication->date)->diffForHumans() }}

                            </span>
                        </div>
                    </div>

                    @can('delete', $publication)

                        <!-- edit -->
                        <i  class="fas fa-ellipsis-h" type="button" id="publication1Menu"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </i>

                        <!-- edit menu -->
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="publication1Menu">
                            
                            <li class="d-flex align-items-center">
                                <form method="post" action="updatePublication/{{ $publication->id }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="text" name="description" class="form-control rounded-pill bg-gray pointer" placeholder="Description">
                                    <input type="submit" name="Submit" value="Update" class="dropdown-item d-flex justify-content-around 
                                    align-items-center fs-7 mt-3" > 
                                </form>
                            </li>

                            <hr />

                            <li class="d-flex align-items-center">
                                <a  class=" dropdown-item d-flex justify-content-around 
                                align-items-center fs-7" href="{{url('deletePublication/' . $publication->id) }}"> Delete Post</a>
                            </li>
                        </ul>
                    
                    @endcan
                    
                </div>        
                
                <!-- publication content -->
                <div class="mt-3">

                    <!-- content -->
                    <div>
                        <p>
                            {{ $publication->description }}
                        </p>
                        @if ($publication->image != null)
                            <img
                                src={{url($publication->image)}} alt="publication image" class="img-fluid rounded" 
                            />
                        @endif  
                        
                    </div>

                    <!-- likes & comments -->
                    @auth
                        @include('partials.comment&like', $publication)
                    @endauth

                </div>
            </div>

        </div>
    </div>
</div>
