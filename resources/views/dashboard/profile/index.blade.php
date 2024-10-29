@extends('dashboard.layouts.main')

@section('container')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Profil Pengguna</h4>
        </div>
    </div>
</div>
<!-- end page title -->

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="dripicons-align-left"></i> Data Diri</h5>
            <div class="card-body">
                <h1 class="fs-4 mb-0">{{ $user->name }}</h1>
                <p class="fs-5 my-0">
                    @if ($user->division)
                        {{ $user->division->name }}
                    @else
                        <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> DIVISI TIDAK ADA! SILAHKAN HUBUNGI ADMIN!</p>
                    @endif
                    | {{ $user->email }}<br>
                    {{ $user->phonenumber }}<br>
                    {{ $user->address }}
                </p>
            </div>
        </div>
        <a href="/dashboard/profile/{{ $user->id }}/edit" class="btn btn-primary mt-3">Edit Profil</a>
    </div>
</div>

@endsection
