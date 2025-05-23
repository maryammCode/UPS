<!DOCTYPE html>
<html lang="en">

<head>
@include('intranet.layouts.css')
</head>

<body>

    <div class="sign_in_up_bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center">
                <div class="col-lg-12">
                    <div class="main_logo2500" id="logo">
                        <a href="index.html"><img src="{{asset('theme2/images/logo_UPS.png')}}" alt="" style="width: 200px"></a>
                        <a href="index.html"><img class="{{asset('theme2/logo-inverse" src="images/ct_logo.svg')}}" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8">
                    @yield('content_auth') 
                 
                <div class="sign_footer">
                    
                    <img src="images/sign_logo.png" alt="">© {{ date('Y') }} <strong>UPS</strong>. Tous droits réservés. <br>
                    <a href="http://nachd-it.com"> Développé par .<strong> Nachd IT Team .</strong></a>
                </div>
                </div>
            </div>
        </div>
    </div>
    @include('intranet.layouts.script')
</body>

</html>


