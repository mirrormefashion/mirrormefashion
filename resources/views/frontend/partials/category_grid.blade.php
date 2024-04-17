<div class="aiz-category-menu bg-black rounded @if(Route::currentRouteName() == 'home') shadow-sm" @else shadow-lg" id="category-sidebar" @endif>
   
   <div class="container-fluid">
    <div class="row  py-5">
        @foreach (\App\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(11) as $key => $category)
           
           
        
            
            
            <div class="col-md-4"  data-id="{{ $category->id }}">
             <a href="{{ route('products.category', $category->slug) }}" class="text-truncate text-reset py-2 px-3 d-block">
                   
                  <h4 class="text-white">{{ $category->getTranslation('name') }}</h4>
                </a>
                 @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $key => $second_level_id)
                    <li class="mb-2" style="list-style:none">
                        <a class="text-white ml-4" href="{{ route('products.category', \App\Category::find($second_level_id)->slug) }}">{{ \App\Category::find($second_level_id)->getTranslation('name') }}</a>
                    </li>
                @endforeach
           </div>
            
              
               
            
        @endforeach
    </div>
   </div>
</div>
