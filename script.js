$(document).ready(function () {

    //AirDatePicker
    let air_date_picker = new AirDatepicker('#airdatepicker', {
        dateFormat: 'MM/dd/yyyy'
    })

    //Checkbox
    let monthly_checkbox = $('#monthly_filing')

    $(monthly_checkbox).click(function () {
        if ($(this).is(':checked')) {
            $('.monthly_block').addClass('hide_block_margin');
            $('.block_sum_deposit').show();
        } else {
            $('#deposit').val(0);
            $('#deposit').removeClass('valid');
            $('.monthly_block').removeClass('hide_block_margin')
            $('.block_sum_deposit').hide()
        }
    })

    //Validation And AJAX
    $('#my_form').validate({
        rules: {
            airdatepicker: {
                //Дата открытия
                required: true,
                date: true,
            },
            term_input: {
                //Срок вклада в цифрах
                required: true,
                number: true,
                min: 1,
                max: function (element) {
                    if ($('#term_duration').val() === 'month') {
                        return 60
                    } else {
                        return 5
                    }
                }
            },
            term_duration: {
                //Срок вклада в месяцах/годах
            },
            amount_input: {
                //Сумма вклада
                required: true,
                min: 1000,
                max: 3000000,
            },
            percent_input: {
                //Процентная ставка
                required: true,
                digits: true,
                min: 3,
                max: 100,
            },
            deposit_input: {
                //Сумма пополнения вклада
                number: true,
                min: 0,
                max: 3000000,
                required: "#monthly_filing:checked"
            }

        },
        messages: {
            airdatepicker: {
                required: 'Это поле обязательно для заполнения',
                date: 'Выберите дату'
            },
            term_input: {
                required: 'Это поле обязательно для заполнения',
                number: 'Требуется числовое значение',
                min: jQuery.validator.format('Не менее {0} года'),
                max: jQuery.validator.format('Не более {0}-ти ')
            },
            term_duration: {},
            amount_input: {
                required: 'Это поле обязательно для заполнения',
                number: 'Требуется числовое значение',
                min: jQuery.validator.format('Минимальное число : {0}'),
                max: jQuery.validator.format('Максимальное число : {0}'),
            },
            percent_input: {
                required: 'Это поле обязательно для заполнения',
                digits: 'Требуется целое значение',
                min: jQuery.validator.format("Не менее {0}%"),
                max: jQuery.validator.format("Не более {0}%"),
            },
            deposit_input: {
                required: 'Это поле обязательно для заполнения',
                number: 'Требуется числовое значение',
                min: jQuery.validator.format('Минимальное число : {0}'),
                max: jQuery.validator.format('Максимальное число : {0}'),
            }
        },

        submitHandler: function (e) {
            e.preventDefault;

            let term;
            let sumAdd;

            let dataForm = {
                'startData': $('#airdatepicker').val(),
                'sum': parseInt($('#amount_input').val()),
                'term': term = $('#term_duration').val() === 'month'
                    ? parseInt($('#term_input').val())
                    : parseInt($('#term_input').val()) * 12,
                'percent': parseInt($('#percent_input').val()),
                'sumAdd': sumAdd = $('#deposit').val().length === 0 ? 0 : parseInt($('#deposit').val())
            }


            let jsonStr = JSON.stringify(dataForm);
            let my_data;
            $.ajax({
                url: '/calc.php',
                method: 'post',
                dataType: 'html',
                data: {"dataQuery": jsonStr},
            })
                .done(function (data) {
                    console.log(data)
                    my_data = JSON.parse(data)
                    $('.total_sum').show(500);
                    $('#money').text(my_data.sum);
                })
                .fail(function () {
                    console.log('error');
                    $('.total_sum').show(500);
                    $('#money').text('ERROR');
                })

        }

    })


})