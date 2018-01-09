(function ($) {
    /*add category*/
    $(".wrap-popup form").click(function(e){
        e.stopPropagation();
    });
    $(".js-add-category").click(function(e){
        e.preventDefault();
        $(".popup-category").addClass("opened");
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
        $(".popup-category").addClass("opened");
        $(".remove-category").addClass("opened");

        var id = $(this).attr("data-id-category");
        $(".remove-category input[type='hidden']").attr('value', id);
    });
    /*edit category*/
    $(".js-edit-category").click(function(){
        $(".popup-category").addClass("opened");
        $(".edit-category").addClass("opened");

        var id = $(this).attr("data-id-category");
        $(".edit-category input[type='hidden']").attr('value', id);

        var name = $(this).attr("data-name-category");
        $(".edit-category input[type='text']").attr('value', name);
    });
    /*remove comment*/
    $(".js-remove-comment").click(function(){
        $(".popup-single").addClass("opened");
        $(".remove-comment").addClass("opened");

        var id = $(this).attr("data-comment-id");
        $(".remove-comment input[type='hidden']").attr('value', id);
    });
    /*edit comment*/
    $(".js-edit-comment").click(function(){
        $(".popup-single").addClass("opened");
        $(".edit-comment").addClass("opened");

        var id = $(this).attr("data-comment-id");
        $(".edit-comment input[type='hidden']").attr('value', id);

        var text = $(this).attr("data-comment-text");
        $(".edit-comment textarea").html(text);
    });
    /*remove article*/
    $(".js-remove-article").click(function(){
        $(".popup-single").addClass("opened");
        $(".remove-article").addClass("opened");
    });

    /*init tiny*/
    if($('#add-article-tiny').length){
        tinymce.init({
            selector: '#add-article-tiny'
        });
    }
    if($('#edit-article-tiny').length){
        tinymce.init({
            selector: '#edit-article-tiny',
        });
    }
})(jQuery);