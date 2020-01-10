import $ from "jquery";

tinymce.init({
    selector: '.editor',
    menubar: false,
});

$(function () {
    $('form').submit(function(e) {
        e.preventDefault();
        let formSerialize = $(this).serialize();
        $.post($(this).attr('action'), formSerialize, function(response) {
            console.log(response)
        }, 'json');
    });
});