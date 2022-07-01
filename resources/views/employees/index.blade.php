@extends('layouts.layouts')

@section('content')
    <!-- Basic table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card p-1">
                    <div class="card-header">
                        <a class="dt-button d-flex justify-content-center btn btn-primary"
                           href="{{route('employee.create')}}"> Create Employee
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label><strong>Company :</strong></label>
                            <select id='user' class="form-control" style="width: 200px">
                                <option value="">--Select Company--</option>
                                @forelse($model as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered" id="category_table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>user</th>
                            <th>email</th>
                            <th>Company</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--/ Basic table -->

@endsection


@push('scripts')

    <script type="text/javascript">
        $(function () {

            var table = $('#category_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('employees') }}",
                    data: function (d) {
                        d.user = $('#user').val(),
                        d.search = $('input[type="search"]').val()
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'company.name', name: 'company.name'},
                    {data: 'action', name: 'action',searchable: false,orderable : false, exportable:false},
                ]
            });

            $('#user').change(function(){
                table.draw();
            });

        });
    </script>
@endpush
