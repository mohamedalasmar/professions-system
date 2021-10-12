@extends('cms.parent')
@section('main-title', 'Edit')
@section('style')
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('page-title', 'Edit permissionss')
@section('sub-page-title', 'Edit permissionss')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">permissionss Create</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="create_form">
                            @csrf
                            <div class="card-body">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Select2 (Bootstrap4 Theme)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Minimal</label>
                                                    <select class="form-control select" style="width: 100%;" id="guard">
                                                        <option  value="web" @if ($permissions->guard_name == 'web')
                                                            selected
                                                        @endif>Admin</option>
                                                            <option value="professional" @if($permissons->guard_name == 'professional')@endif>Professional</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <!-- /.col -->

                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <div class="form-group">
                                    <label for="title_en">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter permissions permissionsn" value="{{$permissions->name}}">
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick= "performUpdate({{$permissions->id}})" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.guard').select2({
            theme: 'bootstrap4'
        })
    </script>
    <script>
         function performUpdate(id){
            let data = {
                name:document.getElementById('name').value,
                guard_name:document.getElementById('guard').value,

            };
            let redirectUrl = "/admin/cms/permissions"
            update("/admin/cms/permissions/"+id,data,redirectUrl);
        }
    </script>
@endsection
