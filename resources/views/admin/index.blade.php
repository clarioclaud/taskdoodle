@extends('admin.admin_master')
@section('admin')



<div class="content_wrapper">
    <!--middle content wrapper-->




        @if(Session::has('error')) 
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong> {{ session::get('error') }} </strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        @endif

    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                             <span><i class="fa fa-code"></i></span>
                              <h2 class="timer count-number" data-to="{{ count($user) }}" data-speed="1500"></h2>
                        </div>
                     
                       <p class="count-text ">Total Users</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                             <span><i class="fa fa-code"></i></span>
                              <h2 class="timer count-number" data-to="{{ count($book) }}" data-speed="1500"></h2>
                        </div>
                     
                       <p class="count-text ">Total Books</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fa fa-code"></i></span>
                             <h2 class="timer count-number" data-to="{{ count($sub) }}" data-speed="1500"></h2>
                        </div>
                        <p class="count-text ">Total Subscriptions</p>
                    </div>
                </div>
                
                
            </div>
        </section>
        <!--/ counter_area -->
        
                        
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->

@endsection