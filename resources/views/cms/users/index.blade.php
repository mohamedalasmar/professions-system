@extends('cms.parent')
@section('main-title', 'users')
@section('style')

@endsection
@section('page-title', 'Index')
@section('sub-page-title', 'users Index')
@section('content')
<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Permissions</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="#" class="badge btn-info">{{$user->permissions_count}} permission/s</a></td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            type="button" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- Form Submit --}}
                                        {{-- <form method="POST"  action="{{route('specialities.destroy', $user->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form> --}}

                                        {{-- Js --}}

                                        <a href="#" type="button" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $user->id }} , this)">
                                            <i class="fas fa-trash"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
</div>
</section>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function confirmDestroy(id,ref) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // showMessage();
                destroy(id,ref);
            }
        })
    }

    function destroy(id,ref) {
        axios.delete('/admin/cms/specialities/'+id)
            .then(function(response) {
                // handle success 2xx
                console.log(response);
                showMessage(response.data);
                ref.closest('tr').remove();
            })
            .catch(function(error) {
                // handle error 4xx - 5xx
                console.log(error);
                showMessage(error.response.data);
            })
            .then(function() {
                // always executed
            });
    }

    function showMessage(data) {
        Swal.fire({
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
@endsection


