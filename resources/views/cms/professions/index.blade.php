@extends('cms.parent')
@section('main-title', 'Professios')
@section('style')

@endsection
@section('page-title', 'Index')
@section('sub-page-title', 'Professions Index')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Professions</h3>

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
                                        <th>Title EN</th>
                                        <th>Title AR</th>
                                        <th>Specailites</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($professions as $profession)
                                        <tr>
                                            <td>{{ $profession->id }}</td>
                                            <td>{{ $profession->title_en }}</td>
                                            <td>{{ $profession->title_ar }}</td>
                                            <td><span
                                                    class="badge bg-success">{{ $profession->specaility->title_en }}</span>
                                            </td>

                                            <td>{{ $profession->created_at }}</td>
                                            <td>{{ $profession->updated_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('professions.edit', $profession->id) }}"
                                                        type="button" class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- Form Submit --}}
                                                    {{-- <form method="POST"  action="{{route('professios.destroy', $profession->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form> --}}

                                                    {{-- Js --}}

                                                    <a href="#" type="button" class="btn btn-danger"
                                                        onclick="performDestroy({{ $profession->id }} , this)">
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


    <script>
        function performDestroy(id, ref) {
            confirmDestroy("/admin/cms/professions/"+id , ref)
        }
    </script>
@endsection
