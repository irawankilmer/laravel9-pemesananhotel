@extends('backend.layouts.app')
@section('title', 'Admin Add')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Profile</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <form action="{{ url('backend/admin') }}" method="post" enctype="multipart/form-data">
                @csrf

          <div class="form-group">
            <label for="fullName">Nama Lengkap</label>
            <input type="text" id="fullName" class="form-control @error('fullName') is-invalid @enderror" name="fullName" value="{{ old('fullName') }}">
            @error('fullName')
             <span class="badge badge-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="address">Alamat</label>
            <textarea id="address" class="form-control @error('address') is-invalid @enderror" rows="4" name="address"> {{ old('address') }} </textarea>
            @error('address')
             <span class="badge badge-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select id="gender" class="form-control custom-select" name="gender">
              <option value="1">Laki - laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
            @error('phone')
             <span class="badge badge-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="avatar">Photo</label>
            <input type="file" id="avatar" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}">
            @error('avatar')
             <span class="badge badge-danger">{{ $message }}</span>
            @enderror
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-6">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">User</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                @error('username')
                 <span class="badge badge-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                 <span class="badge badge-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                @error('password')
                 <span class="badge badge-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password_confirmation">Konfirmasi password</label>
                <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                 <span class="badge badge-danger">{{ $message }}</span>
                @enderror
              </div>

            <div class="form-group">
                <label for="roles">Hak Akses</label>
                <select id="roles" class="form-control custom-select" name="roles">
                  @foreach ($roles as $role)
                      <option value="{{ $role->name }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <a href="{{ url('backend/admin') }}" class="btn btn-danger">Batal</a>
      <input type="submit" value="Add" class="btn btn-success float-right">
    </div>
  </div>
</form>
<br>
@endsection