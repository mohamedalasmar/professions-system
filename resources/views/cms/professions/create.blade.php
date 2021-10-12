@extends('cms.parent')
@section('main-title', 'Create')
@section('style')
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('page-title', 'Create Profession')
@section('sub-page-title', 'Create Profession')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Professions Create</h3>
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
                                                    <select class="form-control select" style="width: 100%;"  id="specailities">
                                                        @foreach ($specailities as $speciality)
                                                        <option selected="selected" value="{{$speciality->id}}">{{$speciality->title_en}}</option>
                                                        @endforeach
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
                                    <label for="title_en">Title En</label>
                                    <input type="text" name="title_en" class="form-control" id="title_en"
                                        placeholder="Enter English Title">
                                </div>
                                <div class="form-group">
                                    <label for="title_ar">Title Ar</label>
                                    <input type="text" name="title_ar" class="form-control" id="title_ar"
                                        placeholder="Enter Arabic Title">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="active" class="form-check-input" id="active">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick= "performStore()" class="btn btn-primary">Create</button>
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
        $('.select').select2({
            theme: 'bootstrap4'
        })
    </script>
    <script>
         function performStore(){
            let data = {
                title_en:document.getElementById('title_en').value,
                title_ar:document.getElementById('title_ar').value,
                specaility_id:document.getElementById('specailities').value

            };
            store ("/admin/cms/professions",data);
        }
    </script>
@endsection
