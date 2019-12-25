@extends('layout.web.web')
@section('title','Blog')

@section('content')

<main>
	<section class="hero_single general">
		<div class="wrapper">
			<div class="container">
				<h1>ReviewStore Blog</h1>
				<p>ReviewStore helps grow your business using customer reviews</p>
			</div>
		</div>
	</section>
	<!-- /hero_single -->

	<div class="container margin_60_35">
		<div class="row">
			<div class="col-lg-9">
				<div class="row">

					@foreach($blogs as $blog )

					<div class="col-md-6">
						<article class="blog">
							<figure>
								<a href="{{ route('blog.show.slug',$blog->slug) }}"><img src="{{url('storage/uploads/blog/'.$blog->image)}}" alt="">
									<div class="preview"><span>Read more</span></div>
								</a>
							</figure>
							<div class="post_info">
								<small> {{ $blog->blog_category->name }}- {{  date('d M, Y',strtotime($blog->created_at)) }}</small>
								<h2><a href="{{ route('blog.show.slug',$blog->slug) }}">{{ $blog->title }} </a></h2>
								<p>{{ htmlspecialchars_decode(substr($blog->description, 0,100)) }}</p>
								<ul>
									<li>
										<div class="thumb"><img src="{{url('storage/uploads/blog/'.$blog->image)}}" alt=""></div> Admin
									</li>
									<li><i class="ti-comment"></i>20</li>
								</ul>
							</div>
						</article>
						<!-- /article -->
					</div>

					@endforeach



					<!-- /col -->
				</div>
				<!-- /row -->

				<div class="pagination__wrapper add_bottom_30">
					<ul class="pagination">

						@if ($blogs->lastPage() > 1)
						<ul class="pagination">
							<li class="{{ ($blogs->currentPage() == 1) ? ' disabled' : '' }}">
								<a href="{{ $blogs->url(1) }}" class="prev" title="previous page">&#10094;</a>
							</li>


							@for ($i = 1; $i <= $blogs->lastPage(); $i++)
							<li class="{{ ($blogs->currentPage() == $i) ? ' active' : '' }}">
								<a href="{{ $blogs->url($i) }}">{{ $i }}</a>
							</li>
							@endfor


							
							<li class="{{ ($blogs->currentPage() == $blogs->lastPage()) ? ' disabled' : '' }}">
								<a href="{{ $blogs->url($blogs->currentPage()+1) }}"  title="next page" class="next">&#10095;</a>
							</li>
						</ul>
						@endif
						
						
						{{-- <li><a href="#0" class="next" title="next page">&#10095;</a></li> --}}
					</ul>
				</div>
				<!-- /pagination -->

			</div>
			<!-- /col -->

			<aside class="col-lg-3">
				<div class="widget search_blog">
					<div class="form-group">
						<input type="text" name="search" id="search" class="form-control" placeholder="Search..">
						<span><input type="submit" value="Search"></span>
					</div>
				</div>
				<!-- /widget -->
				<div class="widget">
					<div class="widget-title">
						<h4>Latest Post</h4>
					</div>
					<ul class="comments-list">


						@foreach($latest_blogs as $blog )

						<li>
							<div class="alignleft">
								<a href="{{ route('blog.show.slug',$blog->slug) }}"><img src="{{asset('storage/uploads/blog/'.$blog->image)}}" alt="" ></a>
							</div>
							<small>{{ $blog->blog_category->name }}- {{  date('d-m-Y',strtotime($blog->created_at)) }}</small>
							<h3><a href="{{ route('blog.show.slug',$blog->slug) }}" title=""> {{ $blog->title }} </a></h3>
						</li>

						@endforeach
						

					</ul>
				</div>
				<!-- /widget -->
				<div class="widget">
					<div class="widget-title">
						<h4>Categories</h4>
					</div>
					@foreach($blog_categories as $blog_category )
					<ul class="cats">
						<li><a href="#">{{ $blog_category->name }} <span>({{ $blog_category->posts->count() }})</span></a></li>
					</ul>
					@endforeach
				</div>
				<!-- /widget -->
				<div class="widget">
					<div class="widget-title">
						<h4>Popular Tags</h4>
					</div>
					<div class="tags">
						<a href="#">Food</a>
						<a href="#">Bars</a>
						<a href="#">Cooktails</a>
						<a href="#">Shops</a>
						<a href="#">Best Offers</a>
						<a href="#">Transports</a>
						<a href="#">Restaurants</a>
					</div>
				</div>
				<!-- /widget -->
			</aside>
			<!-- /aside -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>
<!--/main-->

@push('extra-css')
<link rel="stylesheet" href="{{asset('asset/front/css/blog.css')}}">
@endpush
@endsection