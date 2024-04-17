<style>
    .text-primary {
        color: #900 !important
    }
</style>
@extends('frontend.layouts.app') @section('content')
    @include('frontend.inc.blog_header')
    <section class="pt-4 mb-4" style="font-size:20px">
        <div class="container text-center">
            <div class="row">

                <div class="col-lg-12">
                    <ul class=" text-left list-inline">
                        <li class=" opacity-50 list-inline-item">
                            <a class="text-reset " href="{{ route('home') }}">
                                {{ translate('Home') }}
                            </a>
                        </li>
                        >
                        <li class="text-dark fw-400 list-inline-item opacity-80">
                            <a class="text-reset " href="{{ route('blog') }}">
                                {{ translate('Blog') }}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-post-section">
        @php
            
            $blog_category_1 = \App\BlogCategory::where('id', get_setting('blog_category_1'))->first();
            $blog_category_1_blogs = \App\Blog::where('category_id', $blog_category_1->id)
                ->get()
                ->take(2);
            $blog_category_2 = \App\BlogCategory::where('id', get_setting('blog_category_2'))->first();
            $blog_category_2_blogs = \App\Blog::where('category_id', $blog_category_2->id)
                ->get()
                ->take(2);
            $blog_category_3 = \App\BlogCategory::where('id', get_setting('blog_category_3'))->first();
            $blog_category_3_blogs = \App\Blog::where('category_id', $blog_category_3->id)
                ->get()
                ->take(2);
            $blog_category_4 = \App\BlogCategory::where('id', get_setting('blog_category_4'))->first();
            
            $blog_category_4_blogs = \App\Blog::where('category_id', $blog_category_4->id)
                ->get()
                ->take(2);
            
        @endphp
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <h2 class="card-title text-primary my-3 ml-2 text-center"><a
                                href="{{ route('blog.category', $blog_category_1->slug) }}" class="text-primary">
                                {{ $blog_category_1->category_name }}
                            </a></h2>


                        <div class="">
                            @foreach ($blog_category_1_blogs as $blog)
                                <div class="card-body">

                                    <p class="card-text">Posted on :
                                        {{ \Carbon\Carbon::parse($blog->updated_at)->isoFormat('MMM Do YYYY') }}
                                    </p>
                                </div>
                                <a href="{{ url('blog') . '/' . $blog->slug }}" class="text-reset d-block">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                        data-src="{{ uploaded_asset($blog->banner) }}" alt="{{ $blog->title }}"
                                        class="img-fluid lazyload " width="100%">
                                </a>
                                <div class="blog-text pl-2 my-3">
                                    <h2 class="card-title text-primary"><a href="{{ url('blog') . '/' . $blog->slug }}"
                                            style="color:#900">
                                            {{ $blog->title }}
                                        </a></h2>

                                    <h4 class="card-title text-primary"><a href="{{ url('blog') . '/' . $blog->slug }}"
                                            style="color:#900">
                                            {{ $blog->title }}
                                        </a></h4>
                                    <div>
                                        <ul class="list-inline my-3 my-md-0 social colored pb-3">
                                            <li class="list-inline-item"> <a class="facebook"
                                                    href="https://www.facebook.com/mirrormefashion"><i
                                                        class="lab la-facebook-f"></i></a> </li>
                                            <li class="list-inline-item"> <a class="twitter"
                                                    href="https://www.twitter.com/mirrormefashion"><i
                                                        class="lab la-twitter"></i></a> </li>
                                            <li class="list-inline-item"> <a class="linkedin"
                                                    href="https://www.linkedin.com/company/mirrormefashion"><i
                                                        class="lab la-linkedin-in"></i></a> </li>
                                            <li class="list-inline-item"> <a class="instagram"
                                                    href="https://www.instagram.com/mirrormefashion/"><i
                                                        class="lab la-instagram"></i></a> </li>
                                        </ul>
                                    </div>

                                    <p>
                                        {{ $blog->short_description }}<a href="{{ url('blog') . '/' . $blog->slug }}"
                                            class="ml-1 text-primary">Read More</a>
                                    </p>

                                </div>
                            @endforeach

                            <a href="{{ route('blog.category', $blog_category_1->slug) }}"
                                class="btn btn-primary float-md-right mr-2 mb-2 mt-2" style="background:#900">
                                View All Post >
                            </a>
                        </div>



                    </div>
                    <hr class="mt-5 mb-5">
                    <div class="card">
                        <h2 class="card-title text-primary my-3 ml-2 text-center"><a
                                href="{{ route('blog.category', $blog_category_2->slug) }}" class="text-primary">
                                {{ $blog_category_2->category_name }}
                            </a></h2>


                        <div class="">
                            @foreach ($blog_category_2_blogs as $blog)
                                <div class="card-body">

                                    <p class="card-text">Posted on :
                                        
                                        {{ \Carbon\Carbon::parse($blog->updated_at)->isoFormat('MMM Do YYYY') }}
                                    </p>
                                </div>
                                <a href="{{ url('blog') . '/' . $blog->slug }}" class="text-reset d-block">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                        data-src="{{ uploaded_asset($blog->banner) }}" alt="{{ $blog->title }}"
                                        class="img-fluid lazyload " width="100%">
                                </a>
                                <div class="blog-text pl-2 my-3">


                                    <h2 class="card-title text-primary"><a href="{{ url('blog') . '/' . $blog->slug }}"
                                            style="color:#900">
                                            {{ $blog->title }}
                                        </a></h2>

                                    <h4 class="card-title text-primary"><a href="{{ url('blog') . '/' . $blog->slug }}"
                                            style="color:#900">
                                            {{ $blog->title }}
                                        </a></h4>
                                    <div>
                                        <ul class="list-inline my-3 my-md-0 social colored pb-3">
                                            <li class="list-inline-item"> <a class="facebook"
                                                    href="https://www.facebook.com/mirrormefashion"><i
                                                        class="lab la-facebook-f"></i></a> </li>
                                            <li class="list-inline-item"> <a class="twitter"
                                                    href="https://www.twitter.com/mirrormefashion"><i
                                                        class="lab la-twitter"></i></a> </li>
                                            <li class="list-inline-item"> <a class="linkedin"
                                                    href="https://www.linkedin.com/company/mirrormefashion"><i
                                                        class="lab la-linkedin-in"></i></a> </li>
                                            <li class="list-inline-item"> <a class="instagram"
                                                    href="https://www.instagram.com/mirrormefashion/"><i
                                                        class="lab la-instagram"></i></a> </li>
                                        </ul>
                                    </div>
                                    <p>
                                        {{ $blog->short_description }}
                                        <a href="{{ url('blog') . '/' . $blog->slug }}" class="ml-1 text-primary">Read
                                            More</a>
                                    </p>

                                </div>
                            @endforeach

                            <a href="{{ route('blog.category', $blog_category_2->slug) }}"
                                class="btn btn-primary float-md-right mr-2 mb-2 mt-2" style="background:#900">
                                View All Post >
                            </a>
                        </div>



                    </div>
                    <hr class="mt-5 mb-5">
                    <div class="card">
                        <h2 class="card-title text-primary my-3 ml-2 text-center"><a
                                href="{{ route('blog.category', $blog_category_3->slug) }}"
                                class="text-primary text-center">
                                {{ $blog_category_3->category_name }}
                            </a></h2>


                        <div class="">
                            @foreach ($blog_category_3_blogs as $blog)
                                <div class="card-body">

                                    <p class="card-text"> Posted on :
                                        {{ \Carbon\Carbon::parse($blog->updated_at)->isoFormat('MMM Do YYYY') }}
                                    </p>
                                </div>

                                <div class="blog-text pl-2 my-3">

                                    <h2 class="card-title text-primary"><a href="{{ url('blog') . '/' . $blog->slug }}"
                                            style="color:#900">
                                            {{ $blog->title }}
                                        </a></h2>

                                    <h4 class="card-title text-primary"><a href="{{ url('blog') . '/' . $blog->slug }}"
                                            style="color:#900">
                                            {{ $blog->title }}
                                        </a></h4>
                                    <div>
                                        <ul class="list-inline my-3 my-md-0 social colored pb-3">
                                            <li class="list-inline-item"> <a class="facebook"
                                                    href="https://www.facebook.com/mirrormefashion"><i
                                                        class="lab la-facebook-f"></i></a> </li>
                                            <li class="list-inline-item"> <a class="twitter"
                                                    href="https://www.twitter.com/mirrormefashion"><i
                                                        class="lab la-twitter"></i></a> </li>
                                            <li class="list-inline-item"> <a class="linkedin"
                                                    href="https://www.linkedin.com/company/mirrormefashion"><i
                                                        class="lab la-linkedin-in"></i></a> </li>
                                            <li class="list-inline-item"> <a class="instagram"
                                                    href="https://www.instagram.com/mirrormefashion/"><i
                                                        class="lab la-instagram"></i></a> </li>
                                        </ul>
                                    </div>
                                    <p>
                                        {{ $blog->short_description }}<a href="{{ url('blog') . '/' . $blog->slug }}"
                                            class="ml-1 text-primary">Read More</a>
                                    </p>

                                </div>
                            @endforeach
                            <a href="{{ route('blog.category', $blog_category_3->slug) }}"
                                class="btn btn-primary float-md-right mr-2 mb-2 mt-2" style="background:#900">
                                View All Post >
                            </a>
                        </div>




                    </div>
                    <hr class="mt-5 mb-5">

                </div>
                <!------- right side content for Styling Your Body Shape --------->
                <div class="col-md-4 pl-2 pr-2">
                    <div class="well pr-4 pl-4 pt-4 ">
                       <div class="styling_your_body">
                        <h1 class="text-center">{{ $blog_category_4->category_name }}</h1>
                        <h4 class="text-center text-primary">Featured Body Shapes</h4>
                        <img class="panel-img" width="100%"
                            src="{{ static_asset('assets/img/blog/featured-shapes-3D.png') }}">
                       </div>
                        @foreach ($blog_category_4_blogs as $blog)
                            <div class="well styling_your_body">
                                <h4>{{ $blog->title }}</h4>
                                <ul class="list-inline my-3 my-md-0 social colored pb-3">
                                    <li class="list-inline-item"> <a class="facebook"
                                            href="https://www.facebook.com/mirrormefashion"><i
                                                class="lab la-facebook-f"></i></a> </li>
                                    <li class="list-inline-item"> <a class="twitter"
                                            href="https://www.twitter.com/mirrormefashion"><i
                                                class="lab la-twitter"></i></a> </li>
                                    <li class="list-inline-item"> <a class="linkedin"
                                            href="https://www.linkedin.com/company/mirrormefashion"><i
                                                class="lab la-linkedin-in"></i></a> </li>
                                    <li class="list-inline-item"> <a class="instagram"
                                            href="https://www.instagram.com/mirrormefashion/"><i
                                                class="lab la-instagram"></i></a> </li>
                                </ul>
                                <p class="shape-blurb ">
                                    {{ $blog->short_description }}<a href="{{ url('blog') . '/' . $blog->slug }}"
                                        class="ml-1 text-primary">Read More</a>
                                </p>

                            </div>
                            {{--  <div class="ad-space center"></div> --}}

                            {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5729524151548155"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-5729524151548155"
     data-ad-slot="3990832548"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> --}}
                        @endforeach

                        {{-- 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5729524151548155"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-5729524151548155"
     data-ad-slot="3990832548"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> --}}

                    </div>
                </div>
    </section>
@endsection
