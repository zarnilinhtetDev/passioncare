{{-- bootstrap script --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- Core JavaScript Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
<script src="{{ asset('js/jquery.appear.js') }}"></script>
<script src="{{ asset('js/stellar.js') }}"></script>
<script src="{{ asset('plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/nivo-lightbox.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 10,
        loop: true,
        autoplay: {
            delay: 5000, // Delay in milliseconds between slides
            disableOnInteraction: false, // Enable/disable autoplay on slide interaction
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    var swiper = new Swiper(".mySwiper1", {
        slidesPerView: 5,
        spaceBetween: 10,
        loop: true,
        autoplay: {
            delay: 5000, // Delay in milliseconds between slides
            disableOnInteraction: false, // Enable/disable autoplay on slide interaction
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });


    // map
    $(document).ready(function() {
        // Smooth scroll to #location when #map is clicked
        $('#map').click(function() {
            $('html, body').animate({
                scrollTop: $('#location').offset().top
            }, 0000);
        });
    });

    // scroll up
    document.addEventListener("DOMContentLoaded", function() {
        const scrollup = document.querySelector(".scrollup");

        scrollup.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    });
</script>
{{-- <script>
  $(document).ready(function() {
      $('#example1').DataTable();
  });
</script> --}}


</body>

</html>
