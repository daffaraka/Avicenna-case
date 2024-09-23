@extends('admin.admin-layout')
@section('title', 'Tambah User')
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between">
                <div class="pull-left">
                    <h2>Tambahkan User Baru</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Kembali</a>
                </div>
            </div>
        </div>
        {{-- @if (count($errors) > 0)

            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form method="POST" action="{{ route('users.store') }}" class="my-3">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" placeholder="Email" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Konfirmasi Password:</strong>
                        <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary" onclick="alert('Apakah anda yakin?')">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('.livesearch').select2();


        $('#dataTable').DataTable({
            language: {
                paginate: {
                    previous: '<span class="fa fa-chevron-left"></span>',
                    next: '<span class="fa fa-chevron-right"></span>' // or '→'

                }
            }
        });
    });
</script>
