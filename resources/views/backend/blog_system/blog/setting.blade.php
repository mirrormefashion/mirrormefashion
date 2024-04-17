@extends('backend.layouts.app')
@section('content')
@php 
 $selected_category_1 = \App\BusinessSetting::where('type','blog_category_1')->first()->value;
 $selected_category_2 = \App\BusinessSetting::where('type','blog_category_2')->first()->value;
 $selected_category_3 = \App\BusinessSetting::where('type','blog_category_3')->first()->value;
@endphp
<div class="row">
	<div class="col-xl-10 mx-auto">
		<h6 class="fw-600">{{ translate('Blog Page Settings') }}</h6>



		{{-- Home categories--}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Blog Categories') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Categories  1') }}</label>
						<div class="home-categories-target">
							<input type="hidden" name="types[]" value="blog_category_1">
						
					
									<div class="row gutters-5">
										<div class="col">
											<div class="form-group">
												<select class="form-control aiz-selectpicker" name="blog_category_1" data-live-search="true"  required>
													@foreach (\App\BlogCategory::get() as $blog_category)
														<option 
													@if($selected_category_1==$blog_category->id)
													{{ 'selected'}}
													@endif
														value="{{ $blog_category->id }}">{{ $blog_category->category_name}}</option>
													
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
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Categories  2') }}</label>
						<div class="home-categories-target">
							<input type="hidden" name="types[]" value="blog_category_2">
						
					
									<div class="row gutters-5">
										<div class="col">
											<div class="form-group">
												<select class="form-control aiz-selectpicker" name="blog_category_2" data-live-search="true"  required>
													@foreach (\App\BlogCategory::get() as $blog_category)
														<option 
													@if($selected_category_2==$blog_category->id)
													{{ 'selected'}}
													@endif
														value="{{ $blog_category->id }}">{{ $blog_category->category_name}}</option>
													
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
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Categories  3') }}</label>
						<div class="home-categories-target">
							<input type="hidden" name="types[]" value="blog_category_3">
						
					
									<div class="row gutters-5">
										<div class="col">
											<div class="form-group">
												<select class="form-control aiz-selectpicker" name="blog_category_3" data-live-search="true"  required>
													@foreach (\App\BlogCategory::get() as $blog_category)
														<option 
													@if($selected_category_3==$blog_category->id)
													{{ 'selected'}}
													@endif
														value="{{ $blog_category->id }}">{{ $blog_category->category_name}}</option>
													
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
