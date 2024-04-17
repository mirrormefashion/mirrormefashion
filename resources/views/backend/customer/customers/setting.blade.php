@extends('backend.layouts.app')
@section('content')
@php
 $default_friend = \App\BusinessSetting::where('type','default_friend')->first()->value;

@endphp

<div class="row">
	<div class="col-xl-10 mx-auto">
		<h6 class="fw-600">{{ translate('Member Setting') }}</h6>



		{{-- Home categories--}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Add Default Friend') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Membres') }}</label>
						<div class="home-categories-target">
							<input type="hidden" name="types[]" value="default_friend">


									<div class="row gutters-5">
										<div class="col">
											<div class="form-group">
												<select class="form-control aiz-selectpicker" name="default_friend" data-live-search="true"  required>
													@foreach (\App\User::get() as $friend)
														<option
													@if($default_friend==$friend->id)
													{{ 'selected'}}
													@endif
														value="{{ $friend->id }}">{{ $friend->email}}</option>

													@endforeach
					                            </select>
											</div>
										</div>

									</div>

						</div>

					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>



		</div>


</div>

@endsection

@section('script')
    <script type="text/javascript">
		$(document).ready(function(){
		    AIZ.plugins.bootstrapSelect('refresh');
		});
    </script>
@endsection
