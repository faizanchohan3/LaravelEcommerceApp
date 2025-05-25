<template>

    <!-- preloader end -->


    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->

    <!-- header-area-end -->

    <!-- main-area -->
    <main >
<slot name="content"></slot>

    </main>
<!-- footer-area -->
<footer class="dark-bg pt-55 pb-80" style="padding-bottom: 0rem;">
          <slot name="footer"></slot>
        </footer>

        <div id="scripts"></div>
</template>
<script>
export default {

name: 'layout',


mounted() {
    var src = ['../front_assets/js/main.js',

    '../front_assets/js/popper.min.js',
    '../front_assets/js/bootstrap.min.js',
    '../front_assets/js/isotope.pkgd.min.js',
    '../front_assets/js/imagesloaded.pkgd.min.js',
    '../front_assets/js/jquery.magnific-popup.min.js',
    '../front_assets/js/jquery.mCustomScrollbar.concat.min.js',
    '../front_assets/js/bootstrap-datepicker.min.js',


]
    for(var i = 0; i < src.length; i++){
        var script = document.createElement('script');
        script.src = src[i];
        document.getElementById('scripts').appendChild(script);
    }
},
}
</script>
