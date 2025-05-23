@php
    $BuzzVideo = App\BuzzVideo::first();
    // Input string containing URLs
    $inputString = @$BuzzVideo->link;
    // Use preg_match_all to extract URLs
    preg_match_all('/(?:(?:https?|ftp):\/\/[^\s;]+)/', $inputString, $matches);
    $urls = $matches[0];
@endphp
@if (@$BuzzVideo)
    <div class="photo-gallery d-none">
        <div class="container">
            <div class="intro">
                <h3 class="text-center">
                    @include('public.layouts.includes.langs', [
                        'field' => $BuzzVideo,
                        'param' => 'designation',
                    ])
                </h3>
                <p class="text-center">
                    @include('public.layouts.includes.langs', [
                        'field' => $BuzzVideo,
                        'param' => 'description',
                    ])                   
                </p>
            </div>

            <div class="row photos ">
                @foreach ($urls as $url)
                    @php
                        preg_match('/[?&]v=([^&]+)/', $url, $matches);
                        $videoId = isset($matches[1]) ? $matches[1] : null;
                    @endphp
                    <!-- Create links -->
                    @if (is_string($url))
                        <div class="col-sm-6 col-md-4 col-lg-3 item">
                            <a data-fslightbox="gallery" href="{{ $url }}"
                                data-timer="{{ @$BuzzVideo->timer ?? 1 }}">
                                <img src="https://i1.ytimg.com/vi/{{ $videoId }}/mqdefault.jpg" class="img-fluid">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
<script>
    // Check if the video has already been shown in this session
    if (!sessionStorage.getItem('videoShown')) {
        // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Get all the anchor elements with data-fslightbox="gallery"
            var lightboxLinks = document.querySelectorAll('a[data-fslightbox="gallery"]');

            // Loop through each link and trigger a click event after the specified delay
            lightboxLinks.forEach(function(link) {
                // Get the timer value from the data-timer attribute
                var timer = parseInt(link.getAttribute('data-timer'));

                // Check if the timer value is a valid number and greater than 0
                if (!isNaN(timer) && timer > 0) {
                    // Use setTimeout to delay execution based on the timer value
                    setTimeout(function() {
                        link.click();
                    }, timer *
                    60000); // Convert minutes to milliseconds (1 minute = 60000 milliseconds)
                } else {
                    // Use default timer value of 1 minute
                    setTimeout(function() {
                        link.click();
                    }, 60000); // Convert minutes to milliseconds (1 minute = 60000 milliseconds)
                }
            });
        });

        // Set a flag in session storage to indicate that the video has been shown
        sessionStorage.setItem('videoShown', 'true');
    }
</script>
