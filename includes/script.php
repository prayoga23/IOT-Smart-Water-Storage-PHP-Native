 <!--====== Jquery js ======-->
 <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
 <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

 <!--====== Bootstrap js ======-->
 <script src="assets/js/popper.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>

 <!--====== Plugins js ======-->
 <script src="assets/js/plugins.js"></script>

 <!--====== Slick js ======-->
 <script src="assets/js/slick.min.js"></script>

 <!--====== Ajax Contact js ======-->
 <script src="assets/js/ajax-contact.js"></script>

 <!--====== Counter Up js ======-->
 <script src="assets/js/waypoints.min.js"></script>
 <script src="assets/js/jquery.counterup.min.js"></script>

 <!--====== Magnific Popup js ======-->
 <script src="assets/js/jquery.magnific-popup.min.js"></script>

 <!--====== Scrolling Nav js ======-->
 <script src="assets/js/jquery.easing.min.js"></script>
 <script src="assets/js/scrolling-nav.js"></script>

 <!--====== wow js ======-->
 <script src="assets/js/wow.min.js"></script>

 <!--====== Particles js ======-->
 <script src="assets/js/particles.min.js"></script>

 <!--====== Main js ======-->
 <script src="assets/js/main.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!-- jquery cdn -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!-- mdb js cdn -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
 <!-- bootstrap js cdn -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
 <!-- sweetalert js cdn -->
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <script>
   $('.logo-slider').slick({
     slidesToShow: 5,
     slidesToScroll: 1,
     dots: true,
     arrows: true,
     autoplay: true,
     autoplaySpeed: 2000,
     infinite: true
   });
   jQuery(document).ready(function($) {
     "use strict";
     //  TESTIMONIALS CAROUSEL HOOK
     $('#customers-testimonials').owlCarousel({
       loop: true,
       center: true,
       items: 3,
       margin: 0,
       autoplay: true,
       dots: true,
       autoplayTimeout: 8500,
       smartSpeed: 450,
       responsive: {
         0: {
           items: 1
         },
         768: {
           items: 2
         },
         1170: {
           items: 3
         }
       }
     });
   });
 </script>