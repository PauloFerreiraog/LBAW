<div class="publication_comment d-flex align-items-center my-1 " id="comment_{{ $comment->id }}">

    <!-- avatar -->

    <img src={{url('/' . $comment->user->image)  }}
        alt="avatar" class="rounded-circle me-2"
        style=" width: 38px; height: 38px; object-fit: cover; "
    />

    <!-- comment text -->
    <div class="p-3 rounded comment__input w-100">
    <!-- comment menu of author -->
        
        @can('delete', $comment)                
            <div class="d-flex justify-content-end">
       

                <!-- icon -->
                <i class="fas fa-ellipsis-h text-blue pointer"
                    id="publication1CommentMenuButton" data-bs-toggle="dropdown"
                    aria-expanded="false">
                </i>
                
                <!-- menu -->
                <ul class="dropdown-menu border-0 shadow" aria-labelledby="publication1CommentMenuButton">

                    <li class="d-flex align-items-center">
                        <form method="post" action="updateComment/{{ $comment->id }}">
                            @csrf
                            <input type="text" name="content" class="form-control rounded-pill bg-gray pointer" placeholder="Content">
                            <button class="dropdown-item">Edit Comment</button>
                        </form>
                    </li>
                    <hr>
                    <li class="d-flex align-items-center">
                        <form method="post" action="{{url('deleteComment/' . $comment->id) }}">
                            @method('delete')
                            @csrf
                            <button class="dropdown-item">Delete Comment</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endcan

        <div class="d-flex justify-content-start">
            <p class="fw-bold m-0">{{ $comment->user->name }}</p>
            
        </div>

        <div class="d-flex justify-content-start">
            <p class="m-0 fs-7 bg-gray p-2 rounded">
                {{ $comment->content }}
            </p>  
        </div>
        <hr>

    </div>

</div>

