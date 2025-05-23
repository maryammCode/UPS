@extends('voyager::master')

@section('content')
    @include('voyager::partials.icons-styles')

    <h3 style="text-align: center; margin-top:30px">
        <i class="voyager-book"></i>
        {{ __('voyager::compass.resources.title') }}
    </h3>


    <div class="container">
        <div class="icon-list clearfix">
            <div class="icon-box ">
                <div class="icon" data-class="archive">
                    <div class="active-window"><i class="  icofont-archive"></i>
                        <h5 class="icon__name">archive</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="book">
                    <div class="active-window"><i class="  icofont-book"></i>
                        <h5 class="icon__name">book</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="briefcase">
                    <div class="active-window"><i class="  icofont-briefcase"></i>
                        <h5 class="icon__name">briefcase</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="brush">
                    <div class="active-window"><i class="  icofont-brush"></i>
                        <h5 class="icon__name">brush</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="bug">
                    <div class="active-window"><i class="  icofont-bug"></i>
                        <h5 class="icon__name">bug</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="calendar">
                    <div class="active-window"><i class="  icofont-calendar"></i>
                        <h5 class="icon__name">calendar</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="camera">
                    <div class="active-window"><i class="  icofont-camera"></i>
                        <h5 class="icon__name">camera</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="cart">
                    <div class="active-window"><i class="  icofont-cart"></i>
                        <h5 class="icon__name">cart</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="comment">
                    <div class="active-window"><i class="  icofont-comment"></i>
                        <h5 class="icon__name">comment</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="compass">
                    <div class="active-window"><i class="  icofont-compass"></i>
                        <h5 class="icon__name">compass</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="contacts">
                    <div class="active-window"><i class="  icofont-contacts"></i>
                        <h5 class="icon__name">contacts</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="cube">
                    <div class="active-window"><i class="  icofont-cube"></i>
                        <h5 class="icon__name">cube</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="dashboard">
                    <div class="active-window"><i class="  icofont-dashboard"></i>
                        <h5 class="icon__name">dashboard</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="database">
                    <div class="active-window"><i class="  icofont-database"></i>
                        <h5 class="icon__name">database</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="download">
                    <div class="active-window"><i class="  icofont-download"></i>
                        <h5 class="icon__name">download</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="envelope-open">
                    <div class="active-window"><i class="  icofont-envelope-open"></i>
                        <h5 class="icon__name">envelope-open</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="envelope">
                    <div class="active-window"><i class="  icofont-envelope"></i>
                        <h5 class="icon__name">envelope</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="exit">
                    <div class="active-window"><i class="  icofont-exit"></i>
                        <h5 class="icon__name">exit</h5>
                    </div>
                </div>
            </div>



            <div class="icon-box ">
                <div class="icon " data-class="eye-open">
                    <div class="active-window"><i class="  icofont-eye-open"></i>
                        <h5 class="icon__name">eye-open</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="flag">
                    <div class="active-window"><i class="  icofont-flag"></i>
                        <h5 class="icon__name">flag</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="folder-open">
                    <div class="active-window"><i class="  icofont-folder-open"></i>
                        <h5 class="icon__name">folder-open</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="gift">
                    <div class="active-window"><i class="  icofont-gift"></i>
                        <h5 class="icon__name">gift</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="home">
                    <div class="active-window"><i class="  icofont-home"></i>
                        <h5 class="icon__name">home</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="info-circle">
                    <div class="active-window"><i class="  icofont-info-circle"></i>
                        <h5 class="icon__name">info-circle</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="info">
                    <div class="active-window"><i class="  icofont-info"></i>
                        <h5 class="icon__name">info</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="lamp">
                    <div class="active-window"><i class="  icofont-lamp"></i>
                        <h5 class="icon__name">lamp</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="learn">
                    <div class="active-window"><i class="  icofont-learn"></i>
                        <h5 class="icon__name">learn</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="link">
                    <div class="active-window"><i class="  icofont-link"></i>
                        <h5 class="icon__name">link</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="list">
                    <div class="active-window"><i class="  icofont-list"></i>
                        <h5 class="icon__name">list</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="lock">
                    <div class="active-window"><i class="  icofont-lock"></i>
                        <h5 class="icon__name">lock</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="loop">
                    <div class="active-window"><i class="  icofont-loop"></i>
                        <h5 class="icon__name">loop</h5>
                    </div>
                </div>
            </div>


            <div class="icon-box ">
                <div class="icon " data-class="notification">
                    <div class="active-window"><i class="  icofont-notification"></i>
                        <h5 class="icon__name">notification</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="paint-brush">
                    <div class="active-window"><i class="  icofont-paint-brush"></i>
                        <h5 class="icon__name">paint-brush</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="pause">
                    <div class="active-window"><i class="  icofont-pause"></i>
                        <h5 class="icon__name">pause</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="pencil">
                    <div class="active-window"><i class="  icofont-pencil"></i>
                        <h5 class="icon__name">pencil</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="phone">
                    <div class="active-window"><i class="  icofont-phone"></i>
                        <h5 class="icon__name">phone</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="pie">
                    <div class="active-window"><i class="  icofont-pie"></i>
                        <h5 class="icon__name">pie</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="pin">
                    <div class="active-window"><i class="  icofont-pin"></i>
                        <h5 class="icon__name">pin</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="plus-circle">
                    <div class="active-window"><i class="  icofont-plus-circle"></i>
                        <h5 class="icon__name">plus-circle</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="print">
                    <div class="active-window"><i class="  icofont-print"></i>
                        <h5 class="icon__name">print</h5>
                    </div>
                </div>
            </div>




            <div class="icon-box ">
                <div class="icon " data-class="quote-left">
                    <div class="active-window"><i class="  icofont-quote-left"></i>
                        <h5 class="icon__name">quote-left</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="quote-right">
                    <div class="active-window"><i class="  icofont-quote-right"></i>
                        <h5 class="icon__name">quote-right</h5>
                    </div>
                </div>
            </div>


            <div class="icon-box ">
                <div class="icon " data-class="reply">
                    <div class="active-window"><i class="  icofont-reply"></i>
                        <h5 class="icon__name">reply</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="save">
                    <div class="active-window"><i class="  icofont-save"></i>
                        <h5 class="icon__name">save</h5>
                    </div>
                </div>
            </div>


            <div class="icon-box ">
                <div class="icon " data-class="share-alt">
                    <div class="active-window"><i class="  icofont-share-alt"></i>
                        <h5 class="icon__name">share-alt</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="shield">
                    <div class="active-window"><i class="  icofont-shield"></i>
                        <h5 class="icon__name">shield</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="sign-in">
                    <div class="active-window"><i class="  icofont-sign-in"></i>
                        <h5 class="icon__name">sign-in</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="sign-out">
                    <div class="active-window"><i class="  icofont-sign-out"></i>
                        <h5 class="icon__name">sign-out</h5>
                    </div>
                </div>
            </div>



            <div class="icon-box ">
                <div class="icon " data-class="stop">
                    <div class="active-window"><i class="  icofont-stop"></i>
                        <h5 class="icon__name">stop</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="support">
                    <div class="active-window"><i class="  icofont-support"></i>
                        <h5 class="icon__name">support</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="table">
                    <div class="active-window"><i class="  icofont-table"></i>
                        <h5 class="icon__name">table</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="thumbs-down">
                    <div class="active-window"><i class="  icofont-thumbs-down"></i>
                        <h5 class="icon__name">thumbs-down</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="thumbs-up">
                    <div class="active-window"><i class="  icofont-thumbs-up"></i>
                        <h5 class="icon__name">thumbs-up</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="toggle-off">
                    <div class="active-window"><i class="  icofont-toggle-off"></i>
                        <h5 class="icon__name">toggle-off</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="toggle-on">
                    <div class="active-window"><i class="  icofont-toggle-on"></i>
                        <h5 class="icon__name">toggle-on</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="unlock">
                    <div class="active-window"><i class="  icofont-unlock"></i>
                        <h5 class="icon__name">unlock</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="user">
                    <div class="active-window"><i class="  icofont-user"></i>
                        <h5 class="icon__name">user</h5>
                    </div>
                </div>
            </div>
            <div class="icon-box ">
                <div class="icon " data-class="users">
                    <div class="active-window"><i class="  icofont-users"></i>
                        <h5 class="icon__name">users</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="video">
                    <div class="active-window"><i class="  icofont-video"></i>
                        <h5 class="icon__name">video</h5>
                    </div>
                </div>
            </div>

            <div class="icon-box ">
                <div class="icon " data-class="wrench">
                    <div class="active-window"><i class="  icofont-wrench"></i>
                        <h5 class="icon__name">wrench</h5>
                    </div>
                </div>
            </div>
    </div>
    <script>
        document.querySelectorAll('.active-window').forEach(function(element) {
            // Hover event handler
            element.addEventListener('mouseenter', function() {
                this.closest('.icon').classList.add('active');
            });
            element.addEventListener('mouseleave', function() {
                this.closest('.icon').classList.remove('active');
            });
    
            // Click event handler
            element.addEventListener('click', function() {
                const value = this.querySelector('i').className.trim(); // Get the class name of the icon
            const el = document.createElement('textarea');
                el.value = value;
                document.body.appendChild(el);
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
                alert('Copied to clipboard: ' + value);
    
                // Remove "active" class from all icons
                document.querySelectorAll('.icon').forEach(function(icon) {
                    icon.classList.remove('active');
                });
    
                // Add "active" class to the clicked icon
                this.closest('.icon').classList.add('active');
            });
        });
    </script>
@endsection
