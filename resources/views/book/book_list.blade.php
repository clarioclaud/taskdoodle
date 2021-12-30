@extends('admin.admin_master')
@section('admin')

<div class="content_wrapper">
    <!--middle content wrapper-->
      <!-- table area -->
      <section class="table_area">
          <div class="row">
              <div class="col-md-8">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Books List</span></div>
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>                                 
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ asset($book->image) }}" width="50px" height="50px"></td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>
                                        @if($book->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                    @if($book->status == 1)
                                        <a href="{{ route('book.status',$book->id) }}" class="btn btn-danger" >Inactive</i></a>
                                    @else
                                        <a href="{{ route('book.status',$book->id) }}" class="btn btn-primary" >Active</i></a>
                                    @endif
                                        <a href="{{ route('book.edit',$book->id) }}" class="btn btn-info" title="Edit Book">Edit</i></a>
                                        <a href="{{ route('book.delete',$book->id) }}" class="btn btn-danger" title="Delete Book" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                    <div class="text-danger">No Books Found</div>
                                @endforelse
                            </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div> <!-- /table -->
              </div>

              <div class="col-md-4">
              <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add Book</span></div>
                    </div>
                    <div class="panel_body">
                        <form action="{{ route('book.add') }}" method="post" enctype="multipart/form-data">
                            @csrf                            
                            <div class="form-group">
                                <label for="name">Book Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Book Name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Book Description</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Book Description" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Book Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                            <button type="submit" name="create" class="btn btn-info">Add Book</button>
                        </form>
                        
                    </div>
                </div> <!-- /table -->
              </div>
              </div>
          </div>
            
    </section>
</div>

@endsection