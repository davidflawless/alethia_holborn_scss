$(document).ready(function () {

    //var width = $(window).width();

    // Add class to ALL imgages
    $("img").addClass("img-fluid");

    $(".front-page__outer-img img").removeClass("img-fluid");
    $(".front-page__inner-img img").removeClass("img-fluid");
    $(".front-page__centre-img img").removeClass("img-fluid");

    // $(".collapse").on('show.bs.collapse', function(){
    // 	$(".nav-closed").hide();
    // 	$(".nav-open").show();
    // });

    // $(".collapse").on('hide.bs.collapse', function(){
    // 	$(".nav-closed").show();
    // 	$(".nav-open").hide();
    // });


    // if ((width > 1024 )) {
    // 	$('.dropdown').hover(function() {
    // 		$(this).find('.dropdown-menu').stop(true, true).delay(250).slideDown();
    // 	}, function() {
    // 		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
    // 	});
    // }

    $(function () {
        $('.dropdown').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).show();
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).hide();
        });
    });



    $(function () {
        $('.related-slider').slick({
            autoplay: false,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><i class="fas fa-chevron-left slider-btn"></i></button>',
            nextArrow: '<img src="/wp-content/themes/rayner_peer2peer/img/nav-right.svg" width="35px" height="35px" class="slick-next slick-arrow" aria-label="Next" >',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    });



    $(function () {
        $('.video-select-slider').slick({
            autoplay: false,
            autoplaySpeed: 3000,
            slidesToShow: 4,
            slidesToScroll: 1,
            //prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><img src="/wp-content/themes/rayner_peer2peer/img/chevrons.svg" width="50" height="32" /></button>',
            //nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><img src="/wp-content/themes/rayner_peer2peer/img/chevrons.svg" width="50" height="32" /></button>',

            prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"></button>',
            nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"></button>',

            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    });






    // $(document).on('click', '#menu-main-menu a[href^="#"]', function (event) {
    //     event.preventDefault();

    //     $('html, body').animate({
    //         scrollTop: $($.attr(this, 'href')).offset().top - 50
    //     }, 2000, 'easeInOutQuad');
    // });



    // $(document).on('click', '#alphabet a[href^="#"]', function (event) {
    //     event.preventDefault();

    //     $('html, body').animate({
    //         scrollTop: $($.attr(this, 'href')).offset().top - 50
    //     }, 2000, 'easeInOutQuad');
    // });



    // $(document).on('click', '#header-link a[href^="#"]', function (event) {
    //     event.preventDefault();

    //     $('html, body').animate({
    //         scrollTop: $($.attr(this, 'href')).offset().top - 50
    //     }, 2000, 'easeInOutQuad');
    // });




    // $(function () {
    //     $("a.next").text("Next");
    //     $("a.prev").text("Previous");
    // });





    // $('.podcast-modal').on('hide.bs.modal', function () { //Change #myModal with your modal id
    //     $('audio').each(function () {
    //         this.pause(); // Stop playing
    //         this.currentTime = 0; // Reset time
    //     });
    // });






















    function podcast_modal_close(modalClass) {

        $(modalClass).on('hide.bs.modal', function () { //Change #myModal with your modal id
            $('audio').each(function () {
                this.pause(); // Stop playing
                this.currentTime = 0; // Reset time
            });
        });
    }


    function video_modal_close(modalClass) {

        $(modalClass).on('hidden.bs.modal', function () {

            var $this = $(this).find('iframe'), tempSrc = $this.attr('src');
            $this.attr('src', "");
            $this.attr('src', tempSrc);

            //callPlayer('yt-player', 'stopVideo');

            //console.log('IT IS HIDDEN!');

            //$(this).find('iframe').stopVideo();

            //$("#myModal iframe").attr("src", $("#myModal iframe").attr("src"));
        });
    }

    /*
    function modal_nav(modalClass, btnClass) {

        $(modalClass).on('click', btnClass, function () {

            var $this = $(this).find('iframe'), tempSrc = $this.attr('src');
            $this.attr('src', "");
            $this.attr('src', tempSrc);
        });
    }
    */

    $(function () {

        // Video Modals
        //modal_nav('.video-modal', 'btn-next');
        //modal_nav('.video-modal', 'btn-prev');
        video_modal_close('.video-modal');

        //Podcasts Modal
        //modal_nav('.featured-podcast-modal', 'btn-next');
        //modal_nav('.featured-podcast-modal', 'btn-prev');

        //modal_nav('.podcast-modal', 'btn-next');
        //modal_nav('.podcast-modal', 'btn-prev');

        podcast_modal_close('.featured-podcast-modal');
        podcast_modal_close('.podcast-modal');

        video_modal_close('.slider-modal');

        video_modal_close('.featured-video-modal');

    });



    // Match height of all the title sections





    $(function () {


        $('.video-block-outer-height').matchHeight({
            byRow: true,
            property: 'height'
        });

        $('.video-block-text-height').matchHeight({
            property: 'height'
        });


        $('.article-height').matchHeight({
            byRow: true,
            property: 'height'
        });


        // Gallery match heights

        $('.gallery-item-title').matchHeight({
            property: 'height'
        });


        $('.slide-text').matchHeight({
            property: 'height'
        });


    });

    // $("#share-444").jsSocials({
    $('[id*="share-"]').jsSocials({
        // showLabel: true,
        shares: ["twitter", "email", "whatsapp"],
        showCount: true
    });

});