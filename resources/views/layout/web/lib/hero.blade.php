<section class="hero_single version_1">
    <div class="wrapper">
        <div class="container">
            <h3>Every Review is an Experience!</h3>
            <p>Check Ratings of Businesses, Read Reviews &amp; Buy</p>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <form method="get" action="{{ url('/search') }}">
                        <div class="row no-gutters custom-search-input-2">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <input class="form-control" name="keyword" type="text" placeholder="What are you looking for ..">
                                    <i class="icon_search"></i>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <select name="category_id" class="wide" required="">
                                    <option selected="" disabled="">All Categories</option>

                                    @foreach($categories as $category)

                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                    @endforeach

                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" value="Search">
                            </div>
                        </div>
                        <!-- /row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
