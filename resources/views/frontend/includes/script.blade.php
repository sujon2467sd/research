<!-- modernizr js -->
<script src="{{asset('/')}}frontend/assets/js/modernizr-2.8.3.min.js"></script>
<!-- jquery latest version -->
<script src="{{asset('/')}}frontend/assets/js/jquery.min.js"></script>
<!-- Bootstrap v4.4.1 js -->
<script src="{{asset('/')}}frontend/assets/js/bootstrap.min.js"></script>
<!-- Menu js -->
<script src="{{asset('/')}}frontend/assets/js/rsmenu-main.js"></script>
<!-- op nav js -->
<script src="{{asset('/')}}frontend/assets/js/jquery.nav.js"></script>
<!-- owl.carousel js -->
<script src="{{asset('/')}}frontend/assets/js/owl.carousel.min.js"></script>
<!-- Slick js -->
<script src="{{asset('/')}}frontend/assets/js/slick.min.js"></script>
<!-- isotope.pkgd.min js -->
<script src="{{asset('/')}}frontend/assets/js/isotope.pkgd.min.js"></script>
<!-- imagesloaded.pkgd.min js -->
<script src="{{asset('/')}}frontend/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- wow js -->
<script src="{{asset('/')}}frontend/assets/js/wow.min.js"></script>
<!-- Skill bar js -->
<script src="{{asset('/')}}frontend/assets/js/skill.bars.jquery.js"></script>
<script src="{{asset('/')}}frontend/assets/js/jquery.counterup.min.js"></script>
<!-- counter top js -->
<script src="{{asset('/')}}frontend/assets/js/waypoints.min.js"></script>
<!-- video js -->
<script src="{{asset('/')}}frontend/assets/js/jquery.mb.YTPlayer.min.js"></script>
<!-- magnific popup js -->
<script src="{{asset('/')}}frontend/assets/js/jquery.magnific-popup.min.js"></script>
<!-- plugins js -->
<script src="{{asset('/')}}frontend/assets/js/plugins.js"></script>
<!-- contact form js -->
<script src="{{asset('/')}}frontend/assets/js/contact.form.js"></script>
<!-- main js -->
<script src="{{asset('/')}}frontend/assets/js/main.js"></script>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#tinymce'
        });
    </script> --}}

{{-- <script src="{{asset('/')}}admin/assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
<script>
    $(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
        $(".click2edit").summernote()
    },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
</script> --}}


{{-- toastr start --}}

<script>
    $(document).ready(function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        "error": { "color": "red" }
    }
});

</script>




