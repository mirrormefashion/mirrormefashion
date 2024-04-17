
<style>
  .seller-nav .nav-item a {
    color: #000;
}

.seller-nav .nav-item a.active {
    color: #900;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-5">
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav seller-nav">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="{{ areActiveRoutes(['dashboard'])}}">
              
              <span class="ml-3 nav-text">{{ translate('Analytics') }}</span>
          </a>
      </li>
        <li class="nav-item">
        <a href="{{ route('seller.newsfeeds') }}" class="{{ areActiveRoutes(['seller.newsfeeds'])}}">
           
            <span class=" ml-3 nav-text">{{ translate('News Feed') }}</span>
        </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('seller.products') }}" class=" {{ areActiveRoutes(['seller.products', 'seller.products.upload', 'seller.products.edit'])}}">
                
                <span class=" ml-3 nav-text">{{ translate('Products') }}</span>
            </a>
        </li>
       
        <li class="nav-item">
          <a href="{{ route('my_uploads.all') }}" class=" {{ areActiveRoutes(['my_uploads.all'])}}">
              
            <span class=" ml-3 nav-text">{{ translate('Media') }}</span>
        </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('seller.blogs') }}" class="{{areActiveRoutes(['seller.blogs','seller.blogs.create'])}}">
                
              <span class=" ml-3 nav-text">{{ translate('Blog') }}</span>
          </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('seller.blogs') }}" class="{{areActiveRoutes(['seller.blogs','seller.blogs.create'])}}">
                  
                <span class=" ml-3 nav-text">{{ translate('About') }}</span>
            </a>
              </li>
          <li class="nav-item">
            <a href="{{ route('shops.index') }}" class=" {{ areActiveRoutes(['shops.index'])}}">
              
              <span class=" ml-3 nav-text">{{ translate('Shop Setting') }}</span>
          </a>
          </li>
        
          
      </ul>
    </div>
  </nav>


