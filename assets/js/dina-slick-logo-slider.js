(function($) {
    $('.dina_logo_slider-container').each(function() {
        const settings = $(this).data('settings');
        $(this).slick(settings);
    });
})(jQuery);
