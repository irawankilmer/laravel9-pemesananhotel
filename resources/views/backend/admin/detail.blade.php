@extends('backend.layouts.app')
@section('title', 'Admin Detail')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ asset('uploads/'.$admin->avatar) }}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $admin->fullName }}</h3>

            @foreach ($admin->user->getRoleNames() as $roles)
                <p class="text-muted text-center">{{ $roles }}</p>
            @endforeach

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
              <a href="{{ url('backend/admin') }}" class="btn btn-danger">Kembali</a>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#Profile" data-toggle="tab">Profile</a></li>
              <li class="nav-item"><a class="nav-link" href="#User" data-toggle="tab">User</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="Profile">
                <h1>Heho</h1>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="User">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <h1>Helo helo heo</h1>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection