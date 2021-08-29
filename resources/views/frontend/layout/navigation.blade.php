  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index" class="logo mobile_logo"><img src="{{asset('/frontend/logo/logo_small.png')}}" height="75px" alt="logo" title="logo" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
        <div class="search_left">
          <form action="{{route('advanced_search/search')}}" method="get">
            <div class="searchContainer">
              <i class="bi bi-search searchIcon"></i>
              <input class="searchBox" type="search" name="keyword" value="{{request()->get('keyword')?request()->get('keyword'):''}}" placeholder="Search..." >
              <input type="hidden" class="form-control" value="{{request()->get('price_range')?request()->get('price_range'):''}}" name="price_range" id="price_range">
              <input type="hidden" class="form-control" value="Hight-Low" name="price_range_order" id="price_range_order">
              <input type="hidden" class="form-control" value="{{all_category()?all_category()[0]['id']:''}}" name="category" id="category">
              <input type="hidden" class="form-control" value="{{all_auction()?all_auction()[0]['id']:''}}" name="auction" id="auction">
            </div>
          </form>

        </div>
        <div class="advanced_search_menu"><a href="/advanced_search" class="nav-link">advanced search</a></div>
        <!-- <li><a class="nav-link scrollto" href="#about">Category</a></li> -->
        <div class="logo_centered">
          <a href="{{url('index')}}"><img src="{{asset('/frontend/logo/logo.png')}}" alt="logo-desktop" title="logo home page"></a>
          
        </div>
          <li><a class="nav-link  {{(Request::is('about-us')) ? 'active' : ''}}" href="{{route('about-us')}}">About Us</a></li>
          <li class="dropdown"><a class="nav-link scrollto  dropdown-toggle  {{
            (Request::is('latest-auction*'))||(Request::is('auction-archives*'))||(Request::is('upcoming-auction*')) ? 'active' : ''}}" href="javascript:void(0)"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Auction</a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" id="auc_menu_dropdown">
              <ul>
                <li>
                  <a class="dropdown-item nav-link {{(Request::is('latest-auction*')) ? 'active' : ''}}" href="{{route('latest-auction')}}">
                    Latest Auction
                  </a>
                </li>
                <li>
                  <a class="dropdown-item {{(Request::is('auction-archives*')) ? 'active' : ''}}" href="{{route('auction-archives')}}">
                    Auction Archive
                  </a>
                </li>
                <li>
                  <a class="dropdown-item {{(Request::is('upcoming-auction*')) ? 'active' : ''}}" href="{{route('upcoming-auction')}}">
                    Upcoming Auction
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="dropdown"><a class="nav-link dropdown-toggle {{(Request::is('category-auction*')) ? 'active' : ''}}" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            {{-- <div class="container"> --}}
              <div class="row menu_width100">
                {{-- <div class="width-50 cat-left">
                  <a href="javascript:void(0)">
                    <img src="{{asset('/frontend/megamenu.png')}}" alt="home-menu" title="home category menu" class="img-fluid cat_image">
                  </a>
                </div> --}}
                <div class="menu_width100">
                  <div class="row">
                    @php
                        $categories = App\Models\category::get();
                    @endphp
                    @foreach($categories as $category)
                      <div class="width-25 tiles">
                        <a class=" {{(Request::is('category-auction/'.$category->id)) ? 'active' : ''}}" href="{{route('category-auction',$category->id)}}">
                          <figure>
                           {{--  <img class="pt-2 rounded-circle" src="{{getimg($category->cat_image)}}" alt="{{str_replace('.jpg', '', $category->cat_image)}}" title="{{$category->cat_name}}" height="90"> --}}
                           <img class="pt-2 " src="{{getimg($category->cat_image)}}" alt="{{str_replace('.jpg', '', $category->cat_image)}}" title="{{$category->cat_name}}" height="75">
                            <figcaption>{{$category->cat_name}}</figcaption>
                          </figure>
                        </a>
                      </div>
                    @endforeach
                  </div>
                </div>
                <!-- /.col-md-4  -->
              </div>
            {{-- </div> --}}
          <!--  /.container  -->
          </li>
          <li><a class="nav-link {{(Request::is('know-your-coin*')) ? 'active' : ''}}" href="{{route('know-your-coin.create')}}">Know Your Coins</a></li>
          {{-- <li><a class="nav-link  {{(Request::is('about-us')) ? 'active' : ''}}" href="{{route('about-us')}}">About Us</a></li> --}}
          <li><a clas="nav-link {{(Request::is('terms-and-conditions')) ? 'active' : ''}}" href="{{route('terms-and-conditions')}}">Terms & Conditions</i></a>
          </li>
          <li><a class="nav-link {{(Request::is('contact-us')) ? 'active' : ''}}" href="{{route('contact-us')}}">Contact Us</a></li>
          @guest
            @if (Route::has('login'))
              <li class="mobile_right_menu"><a class="nav-link {{(Request::is('login')) ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
            @endif
              <li class="mobile_right_menu"><a class="nav-link  {{(Request::is('register')) ? 'active' : ''}}" href="{{url('register')}}">Register</a></li>
          @else
                <li class="nav-item dropdown mobile_right_menu" id="loggednavbarDropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('home') }}">
                          {{ __('My Dashboard') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('profile.index') }}">
                          {{ __('My Profile') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form1').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                </li>
              @endguest
          <li class="mobile_right_menu">
            <form class="" action="" id="lng" method="">
              {{-- @csrf --}}
            <select name="locale" onchange="document.getElementById('lng').submit();" id="lang_dropdown">
              <option value="" selected>Select Language</option>
              <option value="en" >English</option>
              <option value="hi">Hindi</option>
            </select>
          </form>
          </li>

          <div class="right_menu">
            <ul>
              @guest
                @if (Route::has('login'))
                  <li class="padding_0"><a class="{{(Request::is('login')) ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
                @endif
                  <li class="padding_0"><a class="nav-link">|</a></li>
                  <li class="padding_0"><a class="{{(Request::is('register')) ? 'active' : ''}}" href="{{url('register')}}">Register</a></li>
              @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('home') }}">
                          {{ __('My Dashboard') }}
                      </a>
                      @if(auth()->user()->role !== 'admin')
                      <a class="dropdown-item" href="{{ route('profile.index') }}">
                          {{ __('My Profile') }}
                      </a>
                      @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                </li>
              @endguest
              <li class="lang">
                <form class="" action="" id="lng" method="">
                 {{--  @csrf --}}
                  <select name="locale" onchange="document.getElementById('lng').submit();" id="lang_dropdown">
                    <option value="" selected>Select Language</option>
                    <option value="en" >English</option>
                    <option value="hin">Hindi</option>
                  </select>
                </form>
              </li>
            </ul>
          </div>
        </ul>

      <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <i class="bi bi-search search_icon"></i>
    </div>

  <div class="search-bar">
    <i class="bi bi-x search_x"></i>
    <form class="d-flex w-100 justify-content-center" action="{{route('advanced_search/search')}}" method="GET">
      <input class="align-self-center search-input form-control" type="text" name="keyword" value="{{request()->get('keyword')?request()->get('keyword'):''}}" placeholder="Search">
      <input type="hidden" class="form-control" value="{{request()->get('price_range')?request()->get('price_range'):''}}" name="price_range" id="price_range">
      <input type="hidden" class="form-control" value="Hight-Low" name="price_range_order" id="price_range_order">
      <input type="hidden" class="form-control" value="{{all_category()?all_category()[0]['id']:''}}" name="category" id="category">
      <input type="hidden" class="form-control" value="{{all_auction()?all_auction()[0]['id']:''}}" name="auction" id="auction">
      <button type="submit" class="align-self-center"><i class="bi bi-search"></i>
      </button>
    </form>
  </div>
  </header><!-- End Header -->