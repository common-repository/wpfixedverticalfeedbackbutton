(function ($) {
    'use strict';

    CanvasRenderingContext2D.prototype.wpfvfbfillVerticalText = function (text, x, y, verticalSpacing) {
        for (var i = 0; i < text.length; i++) {
            this.fillText(text[i], x, y + i * verticalSpacing);
        }
    }


    $(document).ready(function () {

    });

})(jQuery);
