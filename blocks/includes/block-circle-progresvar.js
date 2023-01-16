jQuery(document).ready(function (jQuery) {
    function animateElements() {
        jQuery('.progressbar').each(function () {
            var elementPos = jQuery(this).offset().top;
            var topOfWindow = jQuery(window).scrollTop();
            var percent = jQuery(this).find('.circle').attr('data-percent');
            var percentage = parseInt(percent, 10) / parseInt(100, 10);
            var animate = jQuery(this).data('animate');
            if (elementPos < topOfWindow + jQuery(window).height() - 30 && !animate) {
                $(this).data('animate', true);
                $(this).find('.circle').circleProgress({
                    startAngle: -Math.PI / 2,
                    value: percent / 100,
                    size: 160,
                    thickness: 4,
                    emptyFill: "rgba(0,0,0, .2)",
                    fill: {
                        gradient: ["#f76b1c", "#fad961"]
                    }
                }).on('circle-animation-progress', function (event, progress, stepValue) {
                    jQuery(this).find('.pro').text((stepValue*100).toFixed());
                }).stop();
            }
        });
    }

    // Show animated elements
    animateElements();
    jQuery(window).scroll(animateElements);
    
    
    

}); //end document ready function