(function ($) {
    'use strict';

    if ($.fn.owlCarousel) {
        // :: 1.0 Welcome Post Slider Active Code
        $(".welcome-post-sliders").owlCarousel({
            items: 4,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            margin: 10,
            nav: true,
            navText: ['', ''],
            responsive: {
                320: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        })
        // :: 2.0 Instagram Slider Active Code
        $(".instargram_area").owlCarousel({
            items: 6,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            nav: true,
            navText: ['', ''],
            responsive: {
                320: {
                    items: 1
                },
                480: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                992: {
                    items: 5
                },
                1200: {
                    items: 6
                }
            }
        })
        // :: 3.0 Related Post Slider Active Code
        $(".related-post-slider").owlCarousel({
            items: 3,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            nav: true,
            margin: 30,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive: {
                320: {
                    items: 1
                },
                480: {
                    items: 2
                },
                768: {
                    items: 3
                }
            }
        })
    }

    // :: 4.0 ScrollUp Active JS
    if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-arrow-up" aria-hidden="true"></i>'
        });
    }

    // :: 5.0 CounterUp Active JS
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: 6.0 PreventDefault a Click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

    // :: 7.0 Search Form Active Code
    $(".searchBtn").on('click', function () {
        $(".search-hidden-form").toggleClass("search-form-open");
    });

    // :: 8.0 Search Form Active Code
    $("#pattern-switcher").on('click', function () {
        $("body").toggleClass("bg-pattern");
    });
    $("#patter-close").on('click', function () {
        $(this).hide("slow");
        $("#pattern-switcher").addClass("pattern-remove");
    });

    // :: 9.0 wow Active Code
    if ($.fn.init) {
        new WOW().init();
    }

    // :: 10.0 matchHeight Active JS
    if ($.fn.matchHeight) {
        $('.item').matchHeight();
    }

    var $window = $(window);

    // :: 11.0 Preloader active code
    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    /*add category*/
    $(".wrap-popup form").click(function(e){
        e.stopPropagation();
    });
    $(".js-add-category").click(function(e){
        e.preventDefault();
        $(".wrap-popup").addClass("opened");
        $(".add-category").addClass("opened");
    });
    $(".close-popup").click(function(){
        $(".wrap-popup").removeClass("opened");
        $(".wrap-popup form").removeClass("opened");
    });
    $(".input-cancel").click(function(e){
        e.preventDefault();
        $(".wrap-popup").removeClass("opened");
        $(".wrap-popup form").removeClass("opened");
    });
    $(".wrap-popup").click(function(){
        $(this).removeClass("opened");
        $(".wrap-popup form").removeClass("opened");
    });

    /*remove category*/
    $(".js-remove-category").click(function(){
        $(".wrap-popup").addClass("opened");
        $(".remove-category").addClass("opened");

        var id = $(this).attr("data-id-category");
        $(".remove-category input[type='hidden']").attr('value', id);
    });
    /*edit category*/
    $(".js-edit-category").click(function(){
        $(".wrap-popup").addClass("opened");
        $(".edit-category").addClass("opened");

        var id = $(this).attr("data-id-category");
        $(".edit-category input[type='hidden']").attr('value', id);

        var name = $(this).attr("data-name-category");
        $(".edit-category input[type='text']").attr('value', name);
    });
    /*remove category*/
    $(".js-remove-comment").click(function(){
        $(".wrap-popup").addClass("opened");
        $(".remove-comment").addClass("opened");

        var id = $(this).attr("data-comment-id");
        $(".remove-comment input[type='hidden']").attr('value', id);
    });
    /*edit comment*/
    $(".js-edit-comment").click(function(){
        $(".wrap-popup").addClass("opened");
        $(".edit-comment").addClass("opened");

        var id = $(this).attr("data-comment-id");
        $(".edit-comment input[type='hidden']").attr('value', id);

        var text = $(this).attr("data-comment-text");
        $(".edit-comment textarea").html(text);
    });
    /*remove category*/
    $(".js-remove-article").click(function(){
        $(".wrap-popup").addClass("opened");
        $(".remove-article").addClass("opened");
    });

    /*init tiny*/
    tinymce.init({
    selector: '#add-article-tiny'
  });
})(jQuery);