@extends('cms.parent')
@section('main-title', 'Specialities')
@section('style')

@endsection
@section('page-title', 'Index')
@section('sub-page-title', 'Specialities Index')
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
                                        <th>Title EN</th>
                                        <th>Title AR</th>
                                        <th>Professions</th>
                                        <th>Active</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($specialities as $speciality)
                                        <tr>
                                            <td>{{ $speciality->id }}</td>
                                            <td>{{ $speciality->title_en }}</td>
                                            <td>{{ $speciality->title_ar }}</td>
                                            <td>
                                                <span class="badge bg-success">{{ $speciality->professions_count }}
                                                    Profession/s</span>
                                            </td>
                                            <td>
                                                @if ($speciality->active)
                                                    <span
                                                        class="badge bg-success">{{ $speciality->activity_status }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-danger">{{ $speciality->activity_status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $speciality->created_at }}</td>
                                            <td>{{ $speciality->updated_at }}</td>
                                            <td>
                                                <div class="btn-group">

                                                        <a href="{{ route('specialities.edit', $speciality->id) }}"
                                                            type="button" class="btn btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>


                                                    {{-- Form Submit --}}
                                                    {{-- <form method="POST"  action="{{route('specialities.destroy', $speciality->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form> --}}

                                                    {{-- Js --}}

                                                        <a href="#" type="button" class="btn btn-danger"
                                                            onclick="confirmDestroy({{ $speciality->id }} , this)">
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
        function confirmDestroy(id, ref) {
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
                    destroy(id, ref);
                }
            })
        }

        function destroy(id, ref) {
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
