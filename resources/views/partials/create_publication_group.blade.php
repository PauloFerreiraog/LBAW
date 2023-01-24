<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-10 col-lg-8 mt-4 align-items-stretch">

            <!-- create post -->
            <div class="d-flex align-items-stretch bg-white p-3 mt-4 rounded border shadow ">

                <!-- avatar -->
                <div class="d-flex align-items-stretch" >
                    <div class="p-1">
                        <img
                            src="{{url(auth()->user()->image)}}"
                            alt="avatar" class="rounded-circle me-2"
                            style="width: 38px; height: 38px; object-fit: cover"
                        />
                    </div>
                    
                    <form method="POST" action="createPublication/{{ $group->id }}">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="group_id" value="{{$group->id}}">
                        <input type="text" name="body" class="form-control rounded-pill bg-gray pointer" placeholder="Post Something">

                        <hr />
                        <!-- actions -->
                        <div class="d-flex flex-column flex-lg-row mt-3">
                            <div class=" dropdown-item rounded d-flex align-items-center 
                                justify-content-center " type="button" >
    
                                <i class="fas fa-photo-video me-2 text-success"></i>
                                <input type="file" name="image" class="custom-file-input">

                                
                            </div>

        
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>