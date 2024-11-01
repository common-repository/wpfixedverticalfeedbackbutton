(function ($) {
    'use strict';

    //adding nouislider
    function wpfixedverticalfeedbackbutton_create_slider(slider) {
        var start_value   = Number(slider.dataset.start);
        var step          = Number(slider.dataset.step);
        var linked_input  = slider.dataset.inputelement;
        var input_element = document.getElementById('' + linked_input);

        noUiSlider.create(slider, {
            start: [start_value],
            connect: [true, false],
            tooltips: true,
            step: step,
            range: {
                'min': 0,
                'max': 100
            },
            format: {
                to: function (value) {
                    return value + '';
                },
                from: function (value) {
                    return value.replace('', '');
                }
            }
        });

        //on slider update, change the input text field value
        slider.noUiSlider.on('update', function (values, handle) {
            var value           = values[handle];
            input_element.value = Number(Math.round(value));

        });

        //on change of input text field value, update the slider value
        input_element.addEventListener('change', function () {
            slider.noUiSlider.set([null, this.value]);
        });

    }

    $(document).ready(function () {
        $('.cbxcolor').wpColorPicker();

        Array.prototype.forEach.call(document.querySelectorAll('.wpfvfb_nuuislide'), wpfixedverticalfeedbackbutton_create_slider);


        $('.cbxfeedbackimage').on('click', function (e) {
            e.preventDefault();
            var $imagefiled = $(this);
            var image       = wp.media({
                title: wpfixedverticalfeedbackbutton.uploadtext,
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
                .on('select', function (e) {
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_image = image.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    //console.log(uploaded_image);
                    var image_url = uploaded_image.toJSON().url;
                    // Let's assign the url value to the input field
                    $imagefiled.val(image_url);
                });
        });//end on click

        $('#cbxfeedbackbuttontext').on('change', function () {
            //console.log('changed');
            var val = $(this).val();
            //var selnumber = $(this).attr('data-selnumber');
            //console.log(this);
            if (val == 'custom_img') {
                //console.log($(this).next('div.for_custom_image'));
                $('div.for_custom_image').show();
                $('div.for_custom_text').hide();
            } else if (val == 'custom_text') {
                //console.log(val);
                $('div.for_custom_image').hide();
                $('div.for_custom_text').show();
            } else {
                //console.log(val);
                //console.log($(this).next('div.for_custom_image'));
                $('div.for_custom_image').hide();
                $('div.for_custom_text').hide();
            }
        });//end on change

    });

})(jQuery);
