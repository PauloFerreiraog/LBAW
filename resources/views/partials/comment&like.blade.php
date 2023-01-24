<div class="publication_comment&like mt-3 position-relative" id="comment&like_{{ $publication->id }}">
    
    <!-- likes -->
    <div class=" d-flex align-items-center top-0 start-0 position-absolute"
        style="height: 50px; z-index: 5">

        <div class="me-2">
            <i class="text-primary fas fa-thumbs-up"></i>
        </div>
        <span class="my-auto mx-3 m-0 fs-7 text-muted" id="likes_{{ $publication->id }}">{{ $publication->likes->count()}} likes</span>
    </div>

    <!-- comments start-->
    <div class="accordion" id="accordionExample_{{ $publication->id }}">
        <div class="accordion-item border-0">
            <!-- comment collapse -->
            <h2 class="accordion-header" id="headingTwo">

                <div class=" accordion-button collapsed pointer d-flexjustify-content-end"
                data-bs-toggle="collapse" data-bs-target="#collapsePublication_{{ $publication->id }}" 
                aria-expanded="false" aria-controls="collapsePublication_{{ $publication->id }}">                    
                </div>
            </h2>
        </div>


        <hr/>

        <!-- comment & like bar -->
        <div class="d-flex justify-content-around">
           
            <div class=" dropdown-item rounded d-flex justify-content-center align-items-center
                pointer text-muted p-1 like_button button" id="like_button_{{ $publication->id }}">
                <i class="fas fa-thumbs-up me-3"></i>
                <p class="m-0 @if ($publication->likes()->where('user_id', Auth::user()->id)->where('publication_id', $publication->id)->count() != 0) {{ 'clicked' }} @endif" role="button">Like</p>
            </div>

            <div class=" dropdown-item rounded d-flex justify-content-center align-items-center
                pointer text-muted p-1" data-bs-toggle="collapse"
                data-bs-target="#collapsePublication_{{ $publication->id }}" aria-expanded="false" 
                aria-controls="collapsePublication_{{ $publication->id }}">
                    
                <i class="fas fa-comments me-3"></i>
                <p class="m-0">Comment</p>
            </div>
        </div>

        <!-- comments expand -->
        <div  id="collapsePublication_{{ $publication->id }}" class="accordion-collapse collapse"
            aria-labelledby="headingTwo" data-bs-parent="#accordionExample" >

            <hr/>

            <div class="accordion-body">
                <div>
                    
                    @if ($publication->comments->count() > 0)
                        @each('partials.comment', $publication->comments, 'comment')
                        
                    @endif

                    @include('partials.create_comment', $publication)
                </div>
            </div>

        </div>
    </div>
</div>

