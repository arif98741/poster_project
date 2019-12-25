@extends('layout.web.web') @section('content')
<div id="contact">
    <div class="line">
        <h2 class="section-title">Contact Us</h2>
        <div class="margin">
            <div class="s-12 m-12 l-3 hide-m hide-s margin-bottom right-align">
                <img src="img/contact.jpg" alt="">
            </div>
            <div class="s-12 m-12 l-4 margin-bottom right-align">
                <h3>Vision Design - graphic zoo</h3>
                <address>
                    <p><strong>Adress:</strong> Gallayova 19, 841 02 Bratislava</p>
                    <p><strong>Country:</strong> Slovakia - Europe</p>
                    <p><strong>E-mail:</strong> info@visiondesign.sk</p>
                </address>
                <br />
                <h3>Social</h3>
                <p><i class="icon-facebook icon"></i> <a href="https://www.facebook.com/pages/Vision-Design-graphic-ZOO/154664684553091">Vision
                        Design - graphic zoo</a></p>
                <p><i class="icon-facebook icon"></i> <a href="https://www.facebook.com/myresponsee">Responsee</a></p>
                <p class="margin-bottom"><i class="icon-twitter icon"></i> <a href="https://twitter.com/MyResponsee">Responsee</a></p>
            </div>
            <div class="s-12 m-12 l-5">
                <h3>Example contact form (do not use)</h3>
                <form class="customform" action="">
                    <div class="s-12"><input name="" placeholder="Your e-mail" title="Your e-mail" type="text" /></div>
                    <div class="s-12"><input name="" placeholder="Your name" title="Your name" type="text" />
                    </div>
                    <div class="s-12"><textarea placeholder="Your message" name="" rows="5"></textarea></div>
                    <div class="s-12 m-12 l-4"><button class="color-btn" type="submit">Submit Button</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MAP -->
<div id="map-block">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1247814.3661917313!2d16.569872019090596!3d48.23131953825178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c8cbf758ecb9f%3A0xddeb1d26bce5eccf!2sGallayova+2150%2F19%2C+841+02+D%C3%BAbravka!5e0!3m2!1ssk!2ssk!4v1440344568394"
        width="100%" height="450" frameborder="0" style="border:0"></iframe>
</div>
@endsection