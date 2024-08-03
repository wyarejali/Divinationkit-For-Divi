$(document).ready(function() {
    // Function to animate the progress bar
    function animateProgressBar() {
        $('.dina_progress_bar_child .dina_progress_bar-item').each(function() {
            const percent = $(this)
                .find('.dina_progress-level')
                .data('per');
            // Check if the element is in viewport
            const rect = $(this).offset();
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();

            if (
                rect.top + $(this).height() >= scrollTop &&
                rect.top <= scrollTop + windowHeight
            ) {
                $(this)
                    .find('.dina_progress-level')
                    .css({ width: percent }); // Animate width to the specified percentage
            }
        });
    }

    // Initial animation on page load
    animateProgressBar();

    // Trigger animation on scroll
    $(window).scroll(function() {
        animateProgressBar();
    });
});
