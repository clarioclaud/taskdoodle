@extends('admin.admin_master')
@section('admin')

<div class="content_wrapper">
    <!--middle content wrapper-->
      <!-- table area -->
      <section class="table_area">
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title"><span>Subscription List</span></div>
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
                                  <th>Book Name</th>
                                  <th>Book Image</th>
                                  <th>Subscribed At</th>
                                  <th>Expired At</th>                                 
                              </tr>
                          </thead>
                          @php
                            $i = 1;
                          @endphp
                          <tbody>
                              @foreach($all as $user)
                              <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $user->user->name }}</td>
                                  <td>{{ $user->book->name }}</td>
                                  <td><img src="{{ asset($user->book->image) }}" width="70px" height="70px"></td>
                                  <td>{{ Carbon\Carbon::parse($user->created_at)->format('d F Y') }}</td>
                                  <td>
                                     @if($user->expired_at < Carbon\Carbon::now()) 
                                        <span class="badge badge-danger">Expired</span>
                                     @else
                                        <span class="badge badge-success">Subscribed</span>
                                     @endif
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