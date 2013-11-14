(function ($) {

    $.fn.ibox = function () {
        var enterTimeout;
        // set zoom ratio //
        resize = 20;
        ////////////////////
        var img = this;
        img.parent().append('<div id="ibox" />');
        var ibox = $('#ibox');
        var elX = 0;
        var elY = 0;

        img.each(function () {
            var el = $(this);

            el.mouseenter(function () {
                if (enterTimeout) {
                    clearTimeout(enterTimeout);
                }
                enterTimeout = setTimeout(fullImage, 500, el);
            });

            ibox.mouseleave(function () {
                if (enterTimeout) {
                    clearTimeout(enterTimeout);
                }
                ibox.html('').hide();
            });
        });

        var fullImage = function (el) {
            ibox.html('');
            var clone = el.clone();
            clone.attr("src", clone.data("full-src")).prependTo(ibox);
            var h = clone.height();
            var w = clone.width();
            elX = el.offset().left - (w / 2); // 6 = CSS#ibox padding+border
            elY = el.offset().top - (h / 2);
            var wh;
            checkwh = (h < w) ? (wh = (w / h * resize) / 2) : (wh = (w * resize / h) / 2);

            ibox.css({
                top: elY + 'px',
                left: elX + 'px'
            });

            ibox.stop().fadeTo(200, 1, function () {
                el.animate({
                    top: '-=' + (resize / 2),
                    left: '-=' + wh
                }, 400).children('img').animate({
                    height: '+=' + resize
                }, 400);
            });
        };
    };
})(jQuery);