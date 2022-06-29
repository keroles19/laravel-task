<div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
        <i data-feather="more-vertical"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="{{route('admin.editFeature',$id)}}">
            <i data-feather="edit-2" class="me-50"></i>
            <span>Edit</span>
        </a>
        <form action="{{route('admin.deleteFeature',$id)}}" method="post">
            @csrf
            <a class="dropdown-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                <i data-feather="trash" class="me-50"></i>
                <span>Delete</span>
            </a>
        </form>
    </div>
</div>
