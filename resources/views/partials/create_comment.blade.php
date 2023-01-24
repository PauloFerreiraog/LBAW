<!-- create comment -->
<form class="d-flex my-1">
    <!-- avatar -->
    <div>
        <img src={{url('/' . auth()->user()->image)}}
            alt="avatar" class="rounded-circle me-2"
            style=" width: 38px; height: 38px; object-fit: cover;"
        />
    </div>
    <!-- input -->
    <textarea placeholder="Write a comment" type="text"  class="form-control border-0 rounded-pill bg-gray" name="text" id="addCommentArea_{{ $publication->id }}" rows="1"></textarea>          
    <button class="btn btn-primary ms-3" onclick="addComment({{ $publication->id }})">
        Comment
    </button>

                 
</form>