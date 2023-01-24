<!-- short 1 -->
<li class="dropdown-item p-1">
    <a href="{{url('group' . '/'. $group->id) }}" class=" d-flex
        align-items-center text-decoration-none text-dark"
    >
    <div class="p-2">
        <img src="{{$group->image}}" alt="from fb"
            class="rounded border border-1 border-secondary"
            style="width: 38px; height: 38px; object-fit: cover"
        />
    </div>
        <div>
            <p class="m-0">{{$group->name}}</p>
        </div>
    </a>
</li> 