@extends('layout.web.web') @section('title','Search Results') @section('content')
<main>
    <div id="results" style="margin-top: 60px;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-4 col-10">
                    <h1><strong>{{ $companies->count() }} </strong> results found</h1>
                </div>
                <div class="col-xl-5 col-md-6 col-2">
                    <form action="{{ url('/search') }}">
                        <a href="#0" class="search_mob btn_search_mobile"></a>
                        <!-- /open search panel -->
                        <div class="row no-gutters custom-search-input-2 inner">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <input class="form-control" name="keyword" type="text" placeholder="Search reviews for a company">
                                    <i class="icon_search"></i>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <select class="wide" name="category_id">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-1 col-lg-1">
                                <input type="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
            <div class="search_mob_wp">
                <div class="custom-search-input-2">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Search reviews...">
                        <i class="icon_search"></i>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Where">
                        <i class="icon_pin_alt"></i>
                    </div>
                    <select class="wide">
                        <option>All Categories</option>
                        <option>Shops</option>
                        <option>Hotels</option>
                        <option>Restaurants</option>
                        <option>Bars</option>
                        <option>Events</option>
                        <option>Fitness</option>
                    </select>
                    <input type="submit" value="Search">
                </div>
            </div>
            <!-- /search_mobile -->
        </div>
        <!-- /container -->
    </div>
    <!-- /results -->
    <!-- /filters -->

    <div class="container margin_60_35">

        <div class="isotope-wrapper">


            @foreach($companies as $company)

            <div class="company_listing isotope-item high">
                <div class="row">
                    <div class="col-md-9">
                        <div class="company_info">
                            <figure><a href="reviews-page.html"><img
                                        src="{{url('storage/uploads/company/'.$company->image)}}" alt=""></a></figure>
                            <h3>{{ $company->company_name }}</h3>
                            <p>{{ $company->description }}</p>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="text-center float-lg-right">
                            <span class="rating"><strong>Based on {{ $company->total_rating }} reviews</strong>
                                @php
                                $total_rating = 1;

                                @endphp


                                @if($company->company_rating > 1)

                                @php $total_rating = $company->company_rating/$company->total_rating@endphp
                                @else

                                @php


                                $total_rating = $company_rating/1 @endphp


                                @endif


                                @for($i=1; $i<= round($total_rating) ; $i++) <i class="icon_star"></i>
                                    @endfor

                                    @for($j=1; $j<=5 - round($total_rating); $j++) <i class="icon_star empty"></i>
                                        @endfor


                            </span>
                            <a href="{{ url('company/profile/'.$company->id.'/'.strtolower(str_replace(' ','-',$company->company_name))) }}" class="btn_1 small">Read more</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            <p class="text-center"><a href="#0" class="btn_1 rounded add_top_15">Load more</a></p>

        </div>
        <!-- /container -->

</main>
<!--/main-->

@endsection
