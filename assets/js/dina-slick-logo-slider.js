(function($) {
    $('.dina_logo_slider-container').each(function() {
        const settings = $(this).data('settings');

        $(this).slick(settings);
    });
})(jQuery);

(function($) {
    // mobile menu
    $('.mobile_nav .menu-item-has-children > a').after(
        '<span class="menu-closed"></span>'
    );
    $('.mobile_nav .menu-item-has-children > a').each(function() {
        $(this)
            .next()
            .next('.sub-menu')
            .toggleClass('hide', 1000);
    });
    $('.mobile_nav .menu-item-has-children > a + span').on('click', function(
        e
    ) {
        e.preventDefault();
        $(this).toggleClass('menu-open');
        $(this)
            .next('.sub-menu')
            .toggleClass('hide', 1000);
    });
})(jQuery);
