$(function() {

    //jQuery UI Sliders 
    //------------------------

    // range min
    $("#slider-range-min").slider({
        range: "min",
        value: 0.96,
        min: 0.96,
        max: 1.08,
        step: 0.01,
        slide: function (event, ui) {
            $("#slider-range-min-amount").text(ui.value);
        }
    });

    $("#slider-range-min-amount").text($("#slider-range-min").slider("value"));

    $("#slider-range-min-2").slider({
        range: "min",
        value: 0.97,
        min: 0.97,
        max: 1.07,
        step: 0.01,
        slide: function (event, ui) {
            $("#slider-range-min-amount-2").text(ui.value);
        }
    });

    $("#slider-range-min-amount-2").text($("#slider-range-min-2").slider("value"));

    $("#slider-range-min-3").slider({
        range: "min",
        value: 0.99,
        min: 0.99,
        max: 1.05,
        step: 0.01,
        slide: function (event, ui) {
            $("#slider-range-min-amount-3").text(ui.value);
        }
    });

    $("#slider-range-min-amount-3").text($("#slider-range-min-3").slider("value"));

    $("#slider-range-min-4").slider({
        range: "min",
        value: 0.99,
        min: 0.99,
        max: 1.05,
        step: 0.01,
        slide: function (event, ui) {
            $("#slider-range-min-amount-4").text(ui.value);
        }
    });

    $("#slider-range-min-amount-4").text($("#slider-range-min-4").slider("value"));

    $("#slider-range-min-5").slider({
        range: "min",
        value: 0.99,
        min: 0.99,
        max: 1.03,
        step: 0.01,
        slide: function (event, ui) {
            $("#slider-range-min-amount-5").text(ui.value);
        }
    });

    $("#slider-range-min-amount-5").text($("#slider-range-min-5").slider("value"));

    $("#slider-range-min-6").slider({
        range: "min",
        value: 1,
        min: 1,
        max: 1.02,
        step: 0.01,
        slide: function (event, ui) {
            $("#slider-range-min-amount-6").text(ui.value);
        }
    });

    $("#slider-range-min-amount-6").text($("#slider-range-min-6").slider("value"));

});