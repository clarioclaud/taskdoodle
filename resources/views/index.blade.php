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
             @if(Session::has('error')) 
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong> {{ session::get('error') }} </strong>  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
              @endif
        <h3 class="text-center">List of Books</h3><br>
    <div class="container">
      <div class="row w">
        @forelse($books as $book)
        <div class="col-md-4">
          <img src="{{ asset($book->image) }}" class="img-responsive aligncenter" alt="">
          <div class="date">
            <h4><bold>{{ Carbon\Carbon::parse($book->created_at)->format('d') }}</bold></h4>
            <h4>{{ Carbon\Carbon::parse($book->created_at)->format('M') }}</h4>
          </div>
          <h5>{{ $book->name }}</h5>
          
          <p>{{ $book->description }}</p><br>
        @auth
          @php
              $sub = App\Models\Subscription::where('book_id',$book->id)->where('user_id',auth()->user()->id)->latest()->limit(1)->first();
          @endphp
        @endauth 
          <form action="{{ route('subscribe.book') }}" method="post">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
          @auth
            @if(empty($sub))
            <button type="submit" class="btn btn-danger" name="submit">Subscribe</button>
            @else
              @if($sub->expired_at < Carbon\Carbon::now()->format('Y-m-d'))
              <button type="submit" class="btn btn-danger" name="submit">Subscribe</button>
              @else
              <button type="submit" class="btn btn-success" name="submit" disabled="">Subscribed</button>
              @endif
            
            @endif
          @else
          <button type="submit" class="btn btn-danger" name="submit">Subscribe</button>
          @endauth
         
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