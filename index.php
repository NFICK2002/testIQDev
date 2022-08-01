<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IQ Dev</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/air-datepicker/air-datepicker.css">
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>
<body>
<header>
    <img class="my_logo" src="images/logo.svg" width="87" height="23.94" alt="error">
    <p class="task_name_p">Deposit calculator</p>
</header>
<main>
    <p class="name_task">Депозитный калькулятор</p>
    <p class="p_description">Калькулятор депозитов позволяет рассчитать ваши доходы после внесения суммы на счет в
        банке по определенному тарифу.</p>
    <form class="action_form" action="" name="my_form" method="post" id="my_form">
        <div class="form_group">
            <input type="text" placeholder="Дата" required  class='airdatepicker input_form' id="airdatepicker"
                   name="airdatepicker">
            <label class="label_input" for="airdatepicker">Дата открытия</label>
        </div>

        <div class="form_group form_term">
            <input type="text" placeholder="Срок вклада" required class='airdatepicker input_form' id="term_input"
                   name="term_input">
            <label class="label_input label_term" for="term_input">Срок вклада</label>

            <label for="term_duration"></label>
            <select name="term_duration" id="term_duration">
                <option value="month">Месяц</option>
                <option value="year">Год</option>
            </select>
        </div>

        <div class="form_group">
            <input type="text"  placeholder="Сумма вклада" required class='airdatepicker input_form' id="amount_input"
                   name="amount_input">
            <label class="label_input label_amount" for="amount_input">Сумма вклада</label>
        </div>

        <div class="form_group">
            <input type="text" placeholder="Процентная ставка" required class='airdatepicker input_form ' id="percent_input"
                   name="percent_input">
            <label class="label_input label_percent" for="percent_input">Процентная ставка, % годовых</label>
        </div>

        <div class="form_group monthly_block ">
            <input type="checkbox" id="monthly_filing"  name="monthly_filing_input">
            <label for="monthly_filing">Ежемесячное пополнение</label>

        </div>

        <div class="form_group block_sum_deposit hide_block">
            <input type="text" placeholder="Сумма пополнения вклада"  class='airdatepicker input_form' id="deposit"
                   name="deposit_input">
            <label class="label_input label_deposit" for="deposit">Сумма пополнения вклада</label>
        </div>


        <button type="submit" id="btn_calculation">Рассчитать</button>

    </form>
    <hr>
    <p class="p_sum">Сумма к выплате</p>
    <br>
    <p class="total_sum hide_block ">₽ <span id="money"></span></p>
</main>
</body>
<script src="assets/air-datepicker/air-datepicker.js"></script>
<script src="script.js"></script>

</html>