@extends('frontend.layouts.app')

@section('content')


    <style>
        .aiz-main-wrapper {
            /* min-height: 100vh;
                                max-width: 100vw; */
            background-color: #fff;
        }

        .store-panel-img-wrapper {
            position: relative;
        }

        .store-panel-img-wrapper:after {
            content: '';
            background: #fff;
            height: 300px;
            width: 500px;
            position: absolute;
            right: 40px;
            bottom: 0;
            border-radius: 30px 30px 0px 0px;
        }

        img.panel-img {
            width: 249px;
            height: 261px;
            position: absolute;
            right: 55px;
            z-index: 3;
            bottom: 0;
        }

        div#store-panel-overlay {
            width: 400px;
            height: 260px;
            position: absolute;
            right: 106px;
            z-index: 4;
            bottom: 0;
        }

        div#store-panel-overlay p {
            font-size: 13px;
        }

        div#store-panel-overlay h1 {
            font-size: 47px;
            color: #e62e04;
        }

        div#store-panel-overlay h3 {
            color: #e62e04;
        }

        img.img-fit.mx-auto.h-140px.h-md-210px.ls-is-cached.lazyloaded {
            height: 350px;
        }

        img.img-fit.mx-auto.h-140px.h-md-210px.lazyloaded {
            height: 350px;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            display: inline-block;
            padding-right: .5rem;
            color: #6c757d;
            content: "";
        }

        @media(max-width:770px) {
            .store-panel-img-wrapper {
                position: static;
            }

            .store-panel-img-wrapper:after {
                content: '';
                
                position: static;
               
                /* border-radius: 30px 30px 0px 0px; */
            }

            img.panel-img {
               
                position: static;
                
            }

            div#store-panel-overlay {
               
                position: static;
               
            }

            div#store-panel-img {
                background: #fff;
                padding: 10px;
            }

            .store-panel-img-wrapper:after {
                right: 0;
                left: 0;
            }

            div#store-panel-overlay {
                margin: 5px 5px;
                width: 100%;
                padding: 0px 4px;
            }

            div#store-panel-overlay h1 {
                font-size: 30px;
                padding: 3px 11px;
            }

            div#store-panel-overlay h3 {
                font-size: 19px;
                padding: 3px 14px;
            }

            .shop-catagory-grid {
                display: none;
            }
        }
    </style>
    {{-- Categories , Sliders . Today's deal --}}



    {{-- Banner section 1 --}}
    @if (get_setting('home_banner1_images') != null)
        @php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
        @foreach ($banner_1_imags as $key => $value)
            <div class="store-panel-img-wrapper"
                style="background:url({{ uploaded_asset($banner_1_imags[$key]) }}); height:480px; background-repeat: no-repeat; background-size: cover; ">

                <div id="store-panel-img">
                    <img class="panel-img" src="{{ static_asset('assets/img/panel-img.png') }}">
                    <div id="store-panel-overlay">
                        <h1>When you're ready</h1>
                        <h3>Ask the Virtual Stylist</h3>
                        <div class="panel-overly-content">
                            <p>Shop our store freely. If you need advice on a product click "Ask Sophia" for realtime
                                help.</p>
                            <p>To get personalized advice and suggestions start on a chat with Sophia on your profile
                                page.</p>
                        </div>
                    </div>

                </div>
        @endforeach
        </div>
        <div class="container-fluid py-3 bg-primary text-white" id="code-banner" style="font-size:18px">
            <p>Early adopters save! | Use promo code <b>EarlyAdopter</b> to get 15% off</p>
        </div>
    @endif
    <div class="shop-catagory-grid">
        @include('frontend.partials.category_grid')
    </div>


    <!-- Product by Category Start-->
    <section class="mb-4 pt-3">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="" method="GET">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="p-3  d-none d-lg-block rounded-top all-category position-relative text-left">
                            <span class="fw-600 fs-16 mr-3">{{ translate('Categories') }}</span>
                            <!--<a href="{{ route('categories.all') }}" class="text-reset ">
                                        <span class="d-none d-lg-inline-block text-white">{{ translate('See All') }} ></span>

                                    </a>
                                    -->
                        </div>


                        @foreach (\App\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(11) as $key => $category)
                            <div class="dropdown show">


                                <a class="bg-white btn dropdown-toggle"
                                    href="{{ route('products.category', $category->slug) }}" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $category->getTranslation('name') }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $key => $second_level_id)
                                        <a class="dropdown-item"
                                            href="{{ route('products.category', \App\Category::find($second_level_id)->slug) }}">{{ \App\Category::find($second_level_id)->getTranslation('name') }}</a>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <div class="col-xl-9">
                        {{-- Featured Section --}}
                        <div id="section_featured">

                        </div>

                        {{-- Best Selling --}}
                        <div id="section_best_selling">

                        </div>

                        {{-- Best Selling --}}
                        <div id="section_home_categories">

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Product by Category End-->




@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.post('{{ route('home.section.featured') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });

            @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                $.post('{{ route('home.section.best_sellers') }}', {
                    _token: '{{ csrf_token() }}'
                }, function(data) {
                    $('#section_best_sellers').html(data);
                    AIZ.plugins.slickCarousel();
                });
            @endif
        });
    </script>
@endsection
