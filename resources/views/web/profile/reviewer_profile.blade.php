@extends('layout.web.web') @section('title', $profile->fullname.' - Reviewer Profile') @section('content')

<main class="margin_main_container">
    <div class="user_summary">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <figure>
                            <img src="{{url('storage/uploads/reviewer/'.$profile->image)}}" alt="">
                        </figure>
                        <h1>{{ $profile->fullname }}</h1>
                        <span>{{ $profile->country->name }}</span>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>
                                <strong>{{ $profile->review->count() }}</strong>
                                <a href="#0" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="Reviews written by you"><i class="icon_star"></i> Reviews</a>
                            </li>
                            <li>
                                <strong>12</strong>
                                <a href="#0" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="Number of people who have read your reviews"><i class="icon-user-1"></i>
                                    Reads</a>
                            </li>
                            <!-- <li>
                                <strong>36</strong>
                                <a href="#0" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="Number of people who found your review useful"><i class="icon_like_alt"></i>
                                    Useful</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /container -->
        </div>
    </div>
    <!-- /user_summary -->
    <div class="container margin_60_35">
        @if(Session::has('success'))
        <p class="alert alert-success message">{{ Session::get('success') }}</p>
        @endif @if(Session::has('error'))
        <p class="alert alert-warning message">{{ Session::get('error') }}</p>
        @endif
        <div class="row">
            <div class="col-lg-8">

                @foreach($reviews_data as $review_data)
                <div class="review_card">
                    <div class="row">
                        <div class="col-md-2 user_info">
                            <figure><img src="{{url('storage/uploads/company/'.$review_data->company->image)}}" alt="">
                            </figure>
                            <h5>Review: "{{ $review_data->company->company_name }}"</h5>
                        </div>
                        <div class="col-md-10 review_content">
                            <div class="clearfix add_bottom_15">
                                <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i
                                        class="icon_star"></i><i class="icon_star"></i><i
                                        class="icon_star"></i><em>5.00/5.00</em></span>
                                <em>Published: {{ time_elapsed_string($review_data->created_at)  }}</em>
                            </div>
                            <h4>"{{ $review_data->title }}"</h4>
                            <p>{{ $review_data->review_text }}</p>
                            <ul>
                                <li><a href="{{ url('reviewer/delete_review/'.$review_data->id) }}" onclick="return(confirm('are you sure to delete?'))" class="btn_delete"><i
                                            class="icon-trash"></i>Delete</a></li>
                                <li>
                                    <!-- <a href="#0"><i class="icon-edit-3"></i> Edit</a> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>

                @endforeach
                <!-- /review_card -->


                <!-- /review_card -->

            </div>
            <!-- /col -->
            <div class="col-lg-4">
                <div class="box_general general_info">
                    <h3>Delete a review<i class="pe-7s-help1"></i></h3>
                    <p><strong>Mucius doctus constituto pri at.</strong> At vix utinam corpora, ea oblique moderatius usu. Vix id viris consul honestatis, an constituto deterruisset consectetuer pro quo corrumpit euripidis...
                        <br><strong><a href="faq.html">Rear more</a></strong></p>
                    <hr>
                    <h3>Post a review<i class="pe-7s-help1"></i></h3>
                    <p>Dolor detraxit duo in, ei sea dicit reformidans. Mel te accumsan patrioque referrentur. Has causae perfecto ut, ex choro assueverit eum...<br><strong><a href="faq.html">Rear
                                more</a></strong></p>
                    <hr>
                    <h3>Approve a review<i class="pe-7s-help1"></i></h3>
                    <p>Sed ne prompta insolens mediocrem, omnium fierent sed an, quod vivendo mel in. Argumentum honestatis ad mel, cu vis quot utroque...<br><strong><a href="faq.html">Rear more</a></strong>
                    </p>
                    <hr>
                    <div class="text-center"><a href="faq.html" class="btn_1 small">View al Faq</a></div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->

@endsection @php function time_elapsed_string($datetime, $full = false) { $now = new DateTime; $ago = new DateTime($datetime); $diff = $now->diff($ago); $diff->w = floor($diff->d / 7); $diff->d -= $diff->w * 7; $string = array( 'y' => 'year', 'm' => 'month',
'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second', ); foreach ($string as $k => &$v) { if ($diff->$k) { $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : ''); } else { unset($string[$k]); } } if (!$full) $string = array_slice($string,
0, 1); return $string ? implode(', ', $string) . ' ago' : 'just now'; } @endphp