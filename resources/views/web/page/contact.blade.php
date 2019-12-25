@extends('layout.web.web')
@section('title','Contact')
	
@section('content')
	
	<main>
        <section class="hero_single general">
            <div class="wrapper">
                <div class="container">
                    <h1>Get in Touch with Vanno</h1>
                    <p>Vanno helps grow your business using customer reviews</p>
                </div>
            </div>
        </section>
        <!-- /hero_single -->
        
        <div class="bg_color_1">
        <div class="container margin_tabs">
            <div id="tabs" class="tabs">
                <nav>
                    <ul>
                        <li><a href="#section-1"><i class="pe-7s-help1"></i>Questions<em>Omnis justo gloriatur et sit</em></a></li>
                        <li><a href="#section-2"><i class="pe-7s-help2"></i>Support<em>Quo corrumpit euripidis</em></a></li>
                    </ul>
                </nav>
                <div class="content">
                    <section id="section-1">
                        <div class="row justify-content-center">
                           <div class="col-lg-8">
                              <div id="message-contact"></div>
                                    <form method="post" action="http://www.ansonika.com/vanno/assets/contact.php" id="contactform" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input class="form-control" type="text" id="name_contact" name="name_contact" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input class="form-control" type="text" id="lastname_contact" name="lastname_contact" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input class="form-control" type="email" id="email_contact" name="email_contact" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input class="form-control" type="text" id="phone_contact" name="phone_contact" placeholder="Telephone">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="form-group required">
                                        <textarea class="form-control" id="message_contact" name="message_contact" style="height:150px;" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group required">
                                        <input class="form-control" type="text" id="verify_contact" name="verify_contact" placeholder="Are you human? 3 + 1 =">
                                    </div>
                                    <div class="form-group add_top_30 text-center">
                                        <input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact">
                                    </div>
                                </form>
                           </div>
                       </div>
                       <!-- /row -->                      
                    </section>
                    <!-- /section -->
                    <section id="section-2">
                        <div class="row justify-content-center">
                           <div class="col-lg-8">
                             <a href="help.html" class="btn_support">Please first visit our Support Center!</a>
                              <div id="message-support"></div>
                                    <form method="post" action="http://www.ansonika.com/vanno/assets/support.php" id="support" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                                <input class="form-control" type="text" id="name_support" name="name_support" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group required">
                                               <input class="form-control" type="email" id="email_support" name="email_support" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="form-group required">
                                        <textarea class="form-control" id="message_support" name="message_support" style="height:150px;" placeholder="Support request"></textarea>
                                    </div>
                                    <div class="form-group required">
                                        <input class="form-control" type="text" id="verify_support" name="verify_support" placeholder="Are you human? 3 + 1 =">
                                    </div>
                                    <div class="form-group add_top_30 text-center">
                                        <input type="submit" value="Submit" class="btn_1 rounded" id="submit-support">
                                    </div>
                                </form>
                           </div>
                       </div>
                       <!-- /row --> 
                    </section>
                    <!-- /section -->
                </div>
                <!-- /content -->
            </div>
            <!-- /tabs -->
        </div>
        <!-- /container -->
        </div>
        <!-- /bg_color -->
        <div class="container margin_60_35">
				<div class="row">
					<div class="col-md-6">
						<div class="box_faq">
							<i class="icon_info_alt"></i>
							<h4>Porro soleat pri ex, at has lorem accusamus?</h4>
							<p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale virtute legimus ne. Mea dicta facilisis eu.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box_faq">
							<i class="icon_info_alt"></i>
							<h4>Ut quo inani dolorem mediocritatem?</h4>
							<p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale virtute legimus ne. Mea dicta facilisis eu.</p>
						</div>
					</div>
				</div>
				<!-- /row  -->
				<div class="row">
					<div class="col-md-6">
						<div class="box_faq">
							<i class="icon_info_alt"></i>
							<h4>Per sale virtute legimus ne?</h4>
							<p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale virtute legimus ne. Mea dicta facilisis eu.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box_faq">
							<i class="icon_info_alt"></i>
							<h4>Mea in justo posidonium necessitatibus?</h4>
							<p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale virtute legimus ne. Mea dicta facilisis eu.</p>
						</div>
					</div>
				</div>
				<!-- /row  -->
			</div>
    </main>
    <!-- /main -->
    @push('extra-js')
     <script src="{{asset('asset/front/js/tabs.js')}}"></script>
        <script>new CBPFWTabs( document.getElementById( 'tabs' ) );</script>
@endpush
@endsection
	