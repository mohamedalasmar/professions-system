@extends('cms.parent')
@section('main-title', 'permission Permissions')
@section('style')
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('page-title', 'Index')
@section('sub-page-title', 'permission Permissions Index')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">permission Permissions </h3>

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
                                        <th>Guard Name</th>
                                        <th>Assigned</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td><span class="badge bg-success">{{ $permission->guard_name }}</span></td>
                                            <td>
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="permission_{{ $permission->id }}"
                                                        onchange="performStore({{ $role_id }},{{ $permission->id }})"
                                                        @if ($permission->assigned)
                                                    checked
                                    @endif>
                                    <label for="permission_{{ $permission->id }}"></label>
                        </div>
                        </td>
                        {{-- Form Submit --}}
                        {{-- <form method="POST"  action="{{route('professios.destroy', $permission->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form> --}}

                        {{-- Js --}}
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


    <script>
        function performStore(roleId, permissionId) {
            let data = {
                permission_id: permissionId
            }
            store('/admin/cms/roles/' + roleId + '/permissions', data)
        }
    </script>
@endsection
