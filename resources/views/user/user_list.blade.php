@extends('admin.admin_master')
@section('admin')

<div class="content_wrapper">
    <!--middle content wrapper-->
      <!-- table area -->
      <section class="table_area">
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title"><span>Users List</span></div>
                </div>
                <div class="panel_body">
                @if(Session::has('error')) 
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session::get('error') }} </strong>  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Started At</th>
                                  <th>Action</th>                                 
                              </tr>
                          </thead>
                          @php
                            $i = 1;
                          @endphp
                          <tbody>
                              @foreach($users as $user)
                              <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ Carbon\Carbon::parse($user->created_at)->format('d F Y') }}</td>
                                  <td>
                                      <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info" title="Edit User">Edit</i></a>
                                      <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger" title="Delete User" id="delete">Delete</a>
                                  </td>
                              </tr>
                             @endforeach
                          </tbody>
                        </table>
                        
                    </div>
                </div>
            </div> <!-- /table -->
    </section>
</div>

@endsection