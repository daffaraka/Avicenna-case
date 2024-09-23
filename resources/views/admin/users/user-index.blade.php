@extends('admin.admin-layout')
@section('title', 'User Manajemen')
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="pull-right mb-3">
                    {{-- @can('user-create') --}}
                    <a class="btn btn-sm btn-primary" href="users/create"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                        User Baru</a>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>


        <table class="table table-hover table-striped" id="dataTable">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal ditambahkan</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>{{ $user->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                        <td>

                            <a class="btn btn-md btn-primary" href="users/{{ $user->id }}/edit">Edit</a>
                            <form action="users/{{ $user->id }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="alert('Apakah anda yakin ingin menghapus?')" class="btn btn-md btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
<script>
    // $(document).ready(function() {
    //     $('#dataTable').DataTable({
    //         language: {
    //             paginate: {
    //                 previous: '<span class="fa fa-chevron-left"></span>',
    //                 next: '<span class="fa fa-chevron-right"></span>' // or '→'

    //             }
    //         }
    //     });
    // });

    document.addEventListener("DOMContentLoaded", function() {
        var closeButtons = document.querySelectorAll(".alert .close");
        closeButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var alert = this.parentElement;
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(function() {
                    alert.style.display = "none";
                }, 500);
            });
        });
    });
</script>
