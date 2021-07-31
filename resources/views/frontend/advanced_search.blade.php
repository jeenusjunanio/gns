@extends('frontend.layout.header')
@section('content')
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");' alt="auction search" title="search auctions and lot">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="search_form_section">
	<div class="container">
	  <div class="row adv_header">
	    <div class="col-md-12">
	    		<h6>Advanced Search</h6>
	    		<form class="form-inline" id="adv_form" method="get">
	    			@csrf
					<div class="form-group">
						<label for="Name2">Keywords:</label>
						<input type="text" class="form-control" id="key" placeholder="Enter key" required>
					</div>
					
					<div class="form-group">
						<label for="price_range">Price Range:</label>
						<input type="number" class="form-control" name="price_range" id="price_range">
						<select class="form-control" name="price_range_order" id="price_range_order">
              <option value="Hight-Low">Hight-Low</option>
              <option value="Low-Hight">Low-Hight</option>
						</select>
					</div>
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" name="category" id="category">
							<option value="">---No Preference---</option>
							@foreach(all_category() as $category)
							<option value="{{$category->id}}">{{$category->cat_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="auction">Auction</label>
						<select class="form-control" name="auction" id="auction">
							<option value="">---No Preference---</option>
							@foreach(all_auction() as $auction)
							<option value="{{$auction->id}}">Auction number {{$auction->auction_number}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-danger">Search</button>
				</form>
	    </div>
	  </div>
	  <div class="row adv_paginate">
	  	<div class="col-md-8">
	  		@php
            $pages = App\Models\category::paginate(1);
            @endphp
           <div class="search_pagination">{{ $pages->links('frontend.pagination.custom_pagination') }}</div>
         
	  	</div>
	  </div>
	  @for($i=0;$i<=20;$i++)
      <div class="row adv_result_row">
        <div class="col-lg-12">
          <div class="container auction-container">
            <div class="row">
              <div class="width_20 singleauction-left">
                <div class="singleauctionswipper">
                  <div class="swiper-container" >
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img data-toggle="magnify" src="{{asset('frontend/megamenu.png')}}" width="100%" height="100%" alt="filter-result" title="auction filter" />
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="auction-detail">
                  <ul>
                    <li><a href=""><i class="fa fa-chart-line"></i>Increment Slab</a></li>
                    <li><a href=""><i class="fa fa-heart"></i>Wishlist</a></li>
                    <li><a href=""><i class="">2</i>Bids</a></li>
                  </ul>
                </div> --}}
              </div>
              {{-- bid description section starts here --}}
              <div class="width_50 singleauction-right">
                <div class="row">
                    <div class="col-sm-3"><label>Auc:</label>&nbsp;<span>89</span></div>
                    <div class="col-sm-3"><label>Lot:</label>&nbsp;<span>89</span></div>
                    <div class="col-sm-6"><label>Category:</label>&nbsp;<span class="">Silver</span></div>
                </div>
                <div class="row">
                  <p class="auction_description">Punch Marked, Attributed to Shakya Janapada, Silver, Double Karshapna, 6.34g, Uniface,“Lumbine Hoard” type, Main punch of circle surrounded by five crescents on obverse (Rajgor series 33). Extremely fine, very rare.</p>
                </div>
                <div class="row">
                  <div class="col-md-12 pt-3">
                    <button id="single_auc_bid_btn"><i class="fa fa-gavel pr-2"></i>Bid Now</button>                
                  </div>
                </div>
              </div>
              <div class="wid_30">
              	<a href="">Auction #134 13-Dec-2020 Mumbai '</a>

                <div class="row single_auc_bg">
                  <div class="col-md-12 p-2">
                    <div class="row">
                        <div class="col">
                            <label class="auc_blue">Estimate :</label>
                        </div>
                        <div class="col">
                            <p class="auc_blue">Rs 8000 to Rs 9000</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="auc_blue">Current Bid :</label>
                        </div>
                        <div class="col">
                            <p class="auc_blue">Rs 9000</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="auc_red">Asking Bid :</label>
                        </div>
                        <div class="col">
                            <p class="auc_red">Rs 9000</p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- bid description section ends here --}}
            </div>
          </div>
        </div>
      </div>
      @endfor
	</div>
</section>
@endsection