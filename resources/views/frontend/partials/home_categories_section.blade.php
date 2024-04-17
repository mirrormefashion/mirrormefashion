@if(get_setting('home_categories') != null)
    @php $home_categories = json_decode(get_setting('home_categories')); @endphp
    @foreach ($home_categories as $key => $value)
        @php $category = \App\Category::find($value);
          $parent_category = \App\Category::find($category->parent_id);
        @endphp
        <section class="mb-4">
            <div class="container-fluid">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="d-flex mb-3 align-items-baseline border-bottom">
                        <h3 class="h2 fw-500 mb-0">
                            <span class=" pb-3 d-inline-block opacity-50">{{ $parent_category->getTranslation('name') }}</span>
                            <span class=" pb-3 d-inline-block">{{ $category->getTranslation('name') }}</span>
                        </h3>
                        <a href="{{ route('products.category', $category->slug) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                    </div>
                    <div class="row">
                        @foreach (get_cached_products($category->id) as $key => $product)
                        <div class=" gutters-10 half-outside-arrow col-md-4 py-2" data-items="4" data-xl-items="3" data-lg-items="3"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>

                                <div class="carousel-box">
                                    @include('frontend.partials.product_box_1',['product' => $product])
                                </div>

                        </div>
                         @endforeach
                        </div>
                </div>
            </div>
        </section>
    @endforeach
@endif

