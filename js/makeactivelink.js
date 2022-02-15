jQuery(document).ready(function ($) {
    var path = window.location.pathname;
    var target = $('#menu a[href = "' + path + '" ]');
    target.addClass('active');
});