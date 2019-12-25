@extends('layout.web.web')
@section('title','About')

@section('content')
<main>
	<section class="hero_single office">
		<div class="wrapper">
			<div class="container">
				<h1>About Review Store</h1>
				<p>Review Store helps grow your business using customer reviews</p>
			</div>
		</div>
	</section>
	<!-- /hero_single -->

	<div class="container margin_80">
		<div class="row d-flex align-items-center">
			<div class="col-lg-6">
				<img alt="" src="{{ asset('asset/front/img/office_2.jpg') }}" class="img-fluid rounded">
			</div>
			<div class="col-lg-6 pl-lg-5 pt-4">
				<h2>Passion Drive Us</h2>
				<p class="lead">“More than just a rating, Review Store stars signify that a company has nothing to hide, loves its customers and shares our mission to create ever-improving experiences for everyone”</p>
				<p class="lead">Mohammad Al-Fahad</p>
				<p class="lead"><em>Chief Executive Officer (CEO)</em></p>
			</div>
		</div>
	</div>
	<!-- /container -->

	<div class="bg_color_1">
		<div class="container margin_80">
			<div class="row d-flex align-items-center">
				<div class="col-lg-6 pl-lg-5 order-lg-last">
					<img alt="" src="{{ asset('asset/front/img/office_3.jpg') }}" class="img-fluid rounded">
				</div>
				<div class="col-lg-6 pt-4 order-lg-first">
					<h2>Write Reviews & Change the World</h2>
					<p class="lead">If the fancy restaurant you tried today gave you stomachache or if you feel your car is the smoothest thing you have ever driven, don’t fret or scream with joy yet. Hold on, take a deep breath and login to Review Store. Don’t go blindly by the name, in reality, this is the place to open your mouth and speak your mind. You can write reviews here. Help others!</p>
					{{-- <p class="lead">Quod exerci torquatos id sit, ne vix officiis consetetur. Te viris corpora voluptaria mea, hendrerit prodesset no cum.</p> --}}
				</div>
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /bg_color_1 -->

	<div class="values">
		<div class="wrapper">
			<div class="container">
				<div class="main_title_2">
					<h2>Our Values</h2>
					{{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
				</div>
				<div class="row justify-content-center" style="min-height: 210px">
					<div class="col-lg-5">
						<div class="nav flex-column" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-1-content" role="tab" aria-controls="tab-1-content" aria-selected="true">Helps consumers and companies</a>
							<a class="nav-link" id="tab-2" data-toggle="tab" href="#tab-2-content" role="tab" aria-controls="tab-2-content" aria-selected="false">Shoppers and retailers benefits</a>
							<a class="nav-link" id="tab-3" data-toggle="tab" href="#tab-3-content" role="tab" aria-controls="tab-3-content" aria-selected="false">Making e-commerce so divers</a>
							<a class="nav-link" id="tab-3" data-toggle="tab" href="#tab-4-content" role="tab" aria-controls="tab-4-content" aria-selected="false">Assess their service daily</a>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="tab-1-content" role="tabpanel" aria-labelledby="tab-1">
								<p class="lead">Tell the world what’s happening in your area. Share your experience, reviews and ratings. Express yourself to the core. Laugh, cry, sigh, exult, let the true you come alive in emotional, honest, funny anecdotes.The Review Store is community of reviews about products and services. This is a community where consumers connect with each other by adding each other in their Trusted Circle, send each other Virtual Gifts and maintain a photo gallery. </p>
							</div>
							<div class="tab-pane fade" id="tab-2-content" role="tabpanel" aria-labelledby="tab-2">
								<p class="lead">Sed ne prompta insolens mediocrem, omnium fierent sed an, quod vivendo mel in. Argumentum honestatis ad mel, cu vis quot utroque. Nemore percipit no has. Mollis tincidunt his ex, dolore inimicus no cum.</p>
							</div>
							<div class="tab-pane fade" id="tab-3-content" role="tabpanel" aria-labelledby="tab-3">
								<p class="lead">Quod exerci torquatos id sit, ne vix officiis consetetur. Te viris corpora voluptaria mea, hendrerit prodesset no cum. Has tota semper alterum ne, qui te suas sensibus. Duo persius sensibus ne, choro soluta adolescens vim te, sale scripta ex his.</p>
							</div>
							<div class="tab-pane fade" id="tab-4-content" role="tabpanel" aria-labelledby="tab-4">
								<p class="lead">Sumo periculis inciderint ius ex. Sit te fierent probatus delicata, id mel nonumy consul oporteat. Agam tractatos te eam, iisque vulputate moderatius cu sit. Oratio complectitur contentiones nam ut, at legere maiorum fierent duo. Mel ea vero aliquid.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /values -->

	<div class="container margin_80_55">
		<div class="main_title_2">
			<h2>Our founders</h2>
			{{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
		</div>
		<div id="carousel" class="owl-carousel owl-theme">
			@foreach($founders as $founder)
			<div class="item">
				<a href="#0">
					<div class="title">
						<h4>{{ $founder->name }}<em>{{ $founder->designation }}</em></h4>
					</div><img src="{{ url('storage/uploads/founder/'.$founder->image) }}" alt="">
				</a>
			</div>
			@endforeach

		</div>
		<!-- /carousel -->
	</div>
	<!--/container-->

</main>
<!--/main-->

@endsection