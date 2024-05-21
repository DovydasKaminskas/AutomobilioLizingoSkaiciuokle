// Priklausomai nuo priceInout, keiciasi Down payment min ir max reiksmes.
// priceInput relation su priceInputsSlider
$(document).ready(function() {
    $("#priceInput").on('input', function() {
        var price = $(this).val();
        var minPrice = $("#priceInput").data('min');
        var maxPrice = $("#priceInput").data('max');
        var minDownPaymentRate = $("#down_payment").data('min');
        var maxDownPaymentRate = $("#down_payment").data('max');
        var minDownPayment = price * minDownPaymentRate;
        var maxDownPayment = price * maxDownPaymentRate;
        $("#down_payment").attr({
            "min": minDownPayment,
            "max": maxDownPayment
        });
        var downPayment = price * $("#down_payment_percent").val() / 100;
        $("#down_payment").val(downPayment);
        $("#priceInputSlider").val(price);
    }).trigger('input');

    // priceInputsSlider relation su priceInput
    $("#priceInputSlider").on('input', function() {
        var priceSlider = $(this).val();
        $("#priceInput").val(priceSlider).trigger('input');
    });

    // down_payment relation su down_payment_percent
    $("#down_payment, #priceInputSlider, #priceInput").on('input', function(e) {
        if (!e.originalEvent) return;
        var downPayment = $("#down_payment").val();
        var price = $("#priceInput").val();
        var downPaymentPercent = (downPayment / price) * 100;
        $("#down_payment_percent").val(downPaymentPercent.toFixed(0));
    }).trigger('input');

    // down_payment_percent relation su down_payment
    //                              ???             ???
    $("#down_payment_percent, #priceInputSlider, #priceInput").on('input', function(e) {
        if (!e.originalEvent) return;
        var downPaymentPercent = $("#down_payment_percent").val();
        var price = $("#priceInput").val();
        var downPayment = (downPaymentPercent / 100) * price;
        $("#down_payment").val(downPayment.toFixed(0));
    }).trigger('input');

    // timePeriod relation su timePeriodSlider
    $("#timePeriod").on('input', function() {
        var timePeriod = $("#timePeriod").val();
        $("#timePeriodSlider").val(timePeriod);
    }).trigger('input');

    // timePeriodSlider relation su timePeriod
    $("#timePeriodSlider").on('input', function() {
        var timePeriodSlider = $("#timePeriodSlider").val();
        $("#timePeriod").val(timePeriodSlider);
    }).trigger('input');

    // interestRate relation su interestRateSlider
    $("#interestRate").on('input', function() {
        var interestRate = $("#interestRate").val();
        $("#interestRateSlider").val(interestRate);
    }).trigger('input');

    // interestRateSlider relation su interestRate
    $("#interestRateSlider").on('input', function() {
        var interestRateSlider = $("#interestRateSlider").val();
        $("#interestRate").val(interestRateSlider);
    }).trigger('input');

    // Galutinis skaiciavimas
$("#priceInput, #priceInputSlider, #down_payment, #down_payment_percent, #timePeriod, #timePeriodSlider, #interestRate, #interestRateSlider, #administration_fee").on('input', function() {
    var priceInput = $("#priceInput").val();
    var downPayment = $("#down_payment").val();
    var downPaymentPercent = $("#down_payment_percent").val();
    var timePeriod = $("#timePeriod").val();
    var interestRate = $("#interestRate").val();
    var yearlyInterestRate = interestRate / 100;
    var administration_fee = parseFloat($("#administration_fee").val());
    var leasing = ((priceInput - downPayment + administration_fee) / timePeriod) * (interestRate / 100 + 1);
    $("#leasing").val(leasing.toFixed(0));
}).trigger('input');

    /*$(document).ready(function() {
        $("#priceInput").css("cssText", "width: 25% !important;");
    });*/

});
