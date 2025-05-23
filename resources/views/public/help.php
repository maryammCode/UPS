<script>
            $(document).ready(function() {
                // Event listener for click
                $('.menu-link').on('click', function(event) {
                    // Prevent default action if needed
                    var urlToNavigate = $(this).attr('href');
                    event.preventDefault();
                    var parentID = $(this).data('parent');
                    var title = $(this).data('title');
                    // Make AJAX request to the server
                    $.ajax({
                        url: '/processMenuClick',
                        method: 'GET',
                        data: {
                            parentID: parentID,
                            title: title
                        },
                        success: function(response) {
                            console.log(response);
                            window.location.href = urlToNavigate
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });


            });
</script>
<div class="ns-header-topbar ns-header-topbar-4  d-md-block">
                        <div class="container">
                            <div class="ns-header-topbar-costum justify-content-between">
                                <div class="flag">
                                    <div class="flag-img">
                                        <img src="{{ asset('/enis/img/flag.png') }}" alt="">
                                    </div>
                                    <span class="logo-wide">
                                        République Tunisienne <br>Ministère de l’Enseignement Supérieur et de
                                        la Recherche Scientifique<br>université de SFAX
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="ns-header-topbar-left">
                                        {{-- <span>visit our socials :</span> --}}
                                        <div class="ns-header-topbar-social px-2">
                                            @if (@$coordinates->facebook_link)
                                                <a href="{{ @$coordinates->facebook_link }}" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a>
                                            @endif
                                            @if (@$coordinates->twitter_link)
                                                <a href="{{ @$coordinates->twitter_link }}" target="_blank"><i
                                                        class="fab fa-twitter"></i></a>
                                            @endif
                                            @if (@$coordinates->linkedin_link)
                                                <a href="{{ @$coordinates->linkedin_link }}" target="_blank"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="ns-header-menu-action d-sm-block my-2">
                                        <a href="javascript:void(0)" class="ns-header-action-search"><i
                                                class="fal fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
