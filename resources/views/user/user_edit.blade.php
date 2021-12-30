@extends('admin.admin_master')
@section('admin')
    <div class="content_wrapper">
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Edit User</span></div>
                    </div>
                    <div class="panel_body">
                        <form action="{{ route('user.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">User Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <button type="submit" name="update" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection