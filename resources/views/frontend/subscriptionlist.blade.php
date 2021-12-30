<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="container">
						@if(session('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>{{session('success')}}</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                        @endif
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Sl.No</th>											
											<th>Book Name</th>
											<th>Book Image</th>
											<th>Subscibed At</th>
											<th>Expired At</th>
                                            <th>Subscription Status</th>
										</tr>
									</thead>
									@php
										$i=1;
									@endphp
									<tbody>								
										@foreach($subs as $sub)
										<tr>
											<td>{{ $i++ }}</td>											
											<td>{{ $sub->book->name }}</td>
											<td><img src="{{ asset($sub->book->image) }}" width="70px" height="70px"></td>
											<td>{{ Carbon\Carbon::parse($sub->created_at)->format('d F Y') }}</td>
											<td>{{ Carbon\Carbon::parse($sub->expired_at)->format('d F Y') }}</td>
											
											<td>
												@if($sub->expired_at < Carbon\Carbon::now())
													<span class="badge badge-danger">Expired</span>
												@else
                                                <span class="badge badge-success">Subscibed</span>
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>        
							</div>
							<div class="col-md-4">
								
								
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
