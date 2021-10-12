@extends('cms.parent')
@section('main-title', 'Edit')
@section('style')

@endsection
@section('page-title', 'Edit Speciality')
@section('sub-page-title', 'Edit Speciality')
@section('content')
<section class="content">
<div class="container-fluid">
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Specailities Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action={{ route('specialities.update' , $speciality->id) }}>
                @method('PUT')
                @csrf
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            @foreach ($errors->all() as $error)
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                            @endforeach
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success</h5>
                            {{session('message')}}
                        </div>
                    @endif


                    <div class="form-group">
                        <label for="title_en">Title En</label>
                        <input type="text" name="title_en" class="form-control" id="title_en"
                            placeholder="Enter English Title" value= "{{$speciality->title_en}}">
                    </div>
                    <div class="form-group">
                        <label for="title_ar">Title Ar</label>
                        <input type="text" name="title_ar" class="form-control" id="title_ar"
                            placeholder="Enter Arabic Title"  value= "{{$speciality->title_ar}}">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name = "active" class="form-check-input" id = "active"
                        @if ($speciality->active)
                            checked
                        @endif
                        >
                        <label class="form-check-label"  for = "active">Active</label>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection
