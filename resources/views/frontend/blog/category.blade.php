@extends('frontend.layouts.app') @section('content')
   @include('frontend.inc.blog_header')

<section class="pt-4 mb-4" style="font-size:20px">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <ul class=" text-left list-inline">
                    <li class=" opacity-50 list-inline-item">
                        <a class="text-reset " href="{{ route('home') }}">
                            {{ translate('Home')}}
                        </a>
                    </li>
                    >
                    <li class="text-dark fw-400 list-inline-item opacity-80">
                        <a class="text-reset " href="{{ route('blog') }}">
                            {{ translate('Blog') }}
                        </a>
                    </li>
                    >
                      <li class="text-dark fw-600 list-inline-item">
                        <a class="text-reset " href="{{url('blog/category/'.$blog_category->slug)}}">
                          {{$blog_category->category_name}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section>
	<div class="container-fluid">
	    <div class="row">
	        	<div class="col-md-12">
	        	    <h1 class="text-center py-3 text-primary">{{$blog_category->category_name}}</h1>
	        	</div>
	        </div>
		<div class="row">
		  @if($blogs->isEmpty())
		  	<div class="col-md-8 my-3">
		  	   <h1>There is no content in this category</h1>
		  	   </div>
		  @else


			<div class="col-md-8 my-3">
				@foreach($blogs as $blog)
				<div class="card">

								<p class="card-text py-2 pl-2">Posted on : {{ \Carbon\Carbon::parse($blog->updated_at)->isoFormat('MMM Do YYYY')}}
								</p>
                    </p>
				    <a href="{{ url('blog').'/'. $blog->slug }}" class="text-reset d-block">
					  <img
                            src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                            data-src="{{ uploaded_asset($blog->banner) }}"
                            alt="{{ $blog->title }}"
                            class="img-fluid lazyload "
                            width="100%"
                        >
                        </a>
					<div class="card-body">

							    <h2 class="card-title text-primary"><a href="{{ url("blog").'/'. $blog->slug }}"  style="color:#900">
                                {{ $blog->title }}
                            </a></h2>

                            <h4 class="card-title text-primary"><a href="{{ url("blog").'/'. $blog->slug }}" style="color:#900">
                                {{ $blog->title }}
                            </a></h4>
                         <div>
                                <ul class="list-inline my-3 my-md-0 social colored pb-3">
                    <li class="list-inline-item"> <a class="facebook" href="https://www.facebook.com/mirrormefashion"><i class="lab la-facebook-f"></i></a> </li>
                    <li class="list-inline-item"> <a class="twitter" href="https://www.twitter.com/mirrormefashion"><i class="lab la-twitter"></i></a> </li>
                    <li class="list-inline-item"> <a class="linkedin" href="https://www.linkedin.com/company/mirrormefashion"><i class="lab la-linkedin-in"></i></a> </li>
                    <li class="list-inline-item"> <a class="instagram" href="https://www.instagram.com/mirrormefashion/"><i class="lab la-instagram"></i></a> </li>
                </ul>
                         </div>
                        <p>
                            {{ $blog->short_description }}<a href="{{ url("blog").'/'. $blog->slug }}" class="ml-1 text-primary">Read More</a>
                            </p>
					</div>
				</div>
					@endforeach
			</div>

			@endif
			<div class="col-md-4">
			<div class="card py-3">



					    	<h4 class="card-title  text-center text-primary py-2">Latest Blogs</h4>

				    	@foreach(\App\Blog::get()->take(5) as $latest_blog)
				    	<div class="pl-3 pr-3">
 <h4 class="card-title text-primary"><a href="{{ url("blog").'/'. $blog->slug }}" style="color:#900">
                                {{ $blog->title }}
                            </a></h4>

                                <ul class="list-inline my-3 my-md-0 social colored pb-3">
                    <li class="list-inline-item"> <a class="facebook" href="https://www.facebook.com/mirrormefashion"><i class="lab la-facebook-f"></i></a> </li>
                    <li class="list-inline-item"> <a class="twitter" href="https://www.twitter.com/mirrormefashion"><i class="lab la-twitter"></i></a> </li>
                    <li class="list-inline-item"> <a class="linkedin" href="https://www.linkedin.com/company/mirrormefashion"><i class="lab la-linkedin-in"></i></a> </li>
                    <li class="list-inline-item"> <a class="instagram" href="https://www.instagram.com/mirrormefashion/"><i class="lab la-instagram"></i></a> </li>
                </ul>


                        <p>
                            {{ $latest_blog->short_description }}<a href="{{ url("blog").'/'. $latest_blog->slug }}" class="ml-1 text-primary">Read More</a>
                            </p>
 </div>
<hr class="mt-5 mb-5">


						@endforeach



			</div>
		</div>
	</div>
</section>


@endsection
