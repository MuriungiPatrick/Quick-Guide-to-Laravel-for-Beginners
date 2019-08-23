@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session()->get('message'))
    <div class="alert alert-success" role="alert">
      <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
      <strong>SUCCESS:</strong>&nbsp;{{ session()->get('message')}}
    </div>
  @endif
    <div class="row justify-content-center">
      <!-- PROFILE SIDEBAR -->
      @include('includes.profile_sidebar')
<!-- END PROFILE SIDEBAR -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <form action="{!! route('profileupdate') !!}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="current_password"><strong>Current Password:</strong></label>
                      <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    <!-- end Name Input -->
                    <div class="form-group">
                      <label for="new_password"><strong>New Password:</strong></label>
                      <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <!-- end Name Input -->
                    <div class="form-group">
                      <label for="new_password_confirmation"><strong>Confirm New Password:</strong></label>
                      <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                    <!-- end Name Input -->

                    <button class="btn btn-primary" type="submit">Change Password</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
