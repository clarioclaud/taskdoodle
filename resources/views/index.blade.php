@extends('master')
@section('index')

<section id="home"></section>
  <div id="h">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h3 style="color:white">Book Libraries are here..Subscribe to get your favourite Book....</h3>
          <button class="btn btn-conf btn-green">Learn More</button>
        </div>
      </div>
    </div>
    <!-- /.container -->
  </div>
  <!--/H -->

  <!-- ********** GREY SECTION - BLOG ********** -->
 
  <section id="blog"></section>
  <div id="grey">
        <h3 class="text-center">List of Books</h3><br>
    <div class="container">
            @if(Session::has('error')) 
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong> {{ session::get('error') }} </strong>  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
              @endif
      <div class="row w">
        @forelse($books as $book)
        <div class="col-md-4">
          <img src="{{ asset($book->image) }}" class="img-responsive aligncenter" alt="">
          <div class="date">
            <h4><bold>{{ Carbon\Carbon::parse($book->created_at)->format('d') }}</bold></h4>
            <h4>{{ Carbon\Carbon::parse($book->created_at)->format('f') }}</h4>
          </div>
          <h5>{{ $book->name }}</h5>
          
          <p>{{ $book->description }}</p><br>
          <form action="{{ route('subscribe.book') }}" method="post">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
          <button type="submit" class="btn btn-danger" name="submit">Subscribe</button>
        </form>
        </div>
        <!--/col-md-4-->
        @empty
          <div class="text-danger">No Books Found</div>
        @endforelse
      </div>
      <!--/row -->
    </div>
  </div>
  <!--/GREY -->

  <!-- ********** WHITE SECTION - CTA ********** -->
  
@endsection