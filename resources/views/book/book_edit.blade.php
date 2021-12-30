@extends('admin.admin_master')
@section('admin')
    <div class="content_wrapper">
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Edit Book</span></div>
                    </div>
                    <div class="panel_body">
                        <form action="{{ route('book.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $book->id }}">
                            <input type="hidden" name="old_image" value="{{ $book->image }}">

                            <div class="form-group">
                                <label for="name">Book Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $book->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Book Description</label>
                                <input type="text" name="description" id="description" class="form-control" value="{{ $book->description }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Book Image</label>
                                <input type="file" name="image" id="image" class="form-control" ><br>
                                <img src="{{ asset($book->image) }}" width="100px" height="100px">
                            </div>
                            <button type="submit" name="update" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection