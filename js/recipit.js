(function ($) {

    function validateNumber(element)
    {
        var value = element.val();
        if (/[\d.]/.test(value)) {
            var min = element.attr('min'),
                    max = element.attr('max');
            value = parseFloat(value);
            if (min !== undefined && parseFloat(min) > value) {
                return false;
            } else if (max !== undefined && parseFloat(max) < value) {
                return false;
            }
            return true;
        }
        return false;
    }

    function validateEmail(element)
    {
        return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(element.val());
    }

    function validatePhone(element)
    {
        return /^\d{9}$/.test(element.val());
    }

    function validateDevice(element)
    {
        return /^[A-Z]{2,3}\d{8,10}$/.test(element.val());
    }

    function clear(element)
    {
        element.removeClass('valid');
        element.removeClass('invalid');
    }

    $('.no-white-space').on('keyup', function () {
        var element = $(this);
        element.val(element.val().replace(' ', ''));
    });

    $('.uppercase').on('keyup', function () {
        var element = $(this);
        element.val(element.val().toUpperCase());
    });

    $('.number').on('keyup', function (event) {
        var element = $(this), value = element.val();
        element.val(value.replace(/[^\d\.,]/, '').replace(',', '.'));
    });

    $('.number').on('keydown', function (event) {
        var element = $(this), value = element.val();
        value.replace(/[^\d\.,]/, '').replace(',', '.');
        switch (event.keyCode) {
            case 38: // UP
            case 40: // DOWN
                var min = element.attr('min'),
                        max = element.attr('max'),
                        step = element.attr('step') || 1;

                event.preventDefault();
                value = !value ? 0 : parseFloat(value);
                value += parseFloat(step) * (event.keyCode === 38 ? 1 : -1);
                if (step < 1) {
                    var power = Math.pow(10, Math.abs(Math.floor(Math.log10(step))));
                    value = Math.round(power * value) / power;
                }
                if (min !== undefined && min > value) {
                    value = min;
                } else if (max !== undefined && max < value) {
                    value = max;
                }
                break;
        }
        element.val(value);
    });

    $('.validate.number').on('keyup', function (event) {
        var element = $(this);
        clear(element);
        if (validateNumber(element)) {
            element.addClass('valid');
        }
    });

    $('.validate.number').on('focusout', function (event) {
        var element = $(this);
        clear(element);
        if (validateNumber(element)) {
            element.addClass('valid');
        } else {
            element.addClass('invalid');
        }
    });


    $('input[type="email"].validate').on('keyup', function (event) {
        var element = $(this);
        clear(element);
        if (validateEmail(element)) {
            element.addClass('valid');
        }
    });

    $('input[type="email"].validate').on('focusout', function (event) {
        var element = $(this);
        clear(element);
        if (validateEmail(element)) {
            element.addClass('valid');
        } else {
            element.addClass('invalid');
        }
    });

    $('.phone .validate').on('keyup', function (event) {
        var element = $(this);
        clear(element);
        if (validatePhone(element)) {
            element.addClass('valid');
        }
    });

    $('.phone .validate').on('focusout', function (event) {
        var element = $(this);
        clear(element);
        if (validatePhone(element)) {
            element.addClass('valid');
        } else {
            element.addClass('invalid');
        }
    });

    $('#device-number').on('keyup', function (event) {
        var element = $(this);
        clear(element);
        if (validateDevice(element)) {
            element.addClass('valid');
        }
    });

    $('#device-number').on('focusout', function (event) {
        var element = $(this);
        clear(element);
        if (validateDevice(element)) {
            element.addClass('valid');
        } else {
            element.addClass('invalid');
        }
    });
})($);