@if (count($event->gallery)> 0)

    <div class="gallery">
        <div class="owl-carousel owl-theme">
            @foreach($event->gallery as $image)

                <div class="item">

                    <img src="{{asset($image->path)}}" alt="Gallery Image">

                </div>

            @endforeach
        </div>
    </div>
@endif

@section('scripts')
    <script>
        $(document).ready(function(){
            var owl = $('.gallery .owl-carousel');

            owl.owlCarousel({
                margin: 1,
                nav: true,
                loop: false,
                lazyContent: true,
                autoplay: true,
                autoplayHoverPause: true,
                navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    640: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });

        });
    </script>

    @parent

@stop