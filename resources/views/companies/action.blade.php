<div class="btn-group">
    <a class="btn btn-sm btn-success" href="{{route('company.edit',$id)}}">
        <span>Edit</span>
    </a>
    <form action="{{route('company.destroy',$id)}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm mx-1 btn-danger " id="delete_employee">
            <span>delete</span>
        </button>
    </form>
</div>
