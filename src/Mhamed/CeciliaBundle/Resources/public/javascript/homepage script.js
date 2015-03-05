$(document).ready(function(){

$("#topPage").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

$("#navbarQA").click(function() {
    $('html, body').animate({
        scrollTop: $("#QA").offset().top
    }, 1000);
});

$("#navbarAppointment").click(function() {
    $('html, body').animate({
        scrollTop: $("#appointment").offset().top
    }, 1000);
});

$("#navbarQuiz").click(function() {
    $('html, body').animate({
        scrollTop: $("#Quiz").offset().top
    }, 1000);
});

$("#navbarTest").click(function() {
    $('html, body').animate({
        scrollTop: $("#Test").offset().top
    }, 1000);
});

$("#navbarAdvise").click(function() {
    $('html, body').animate({
        scrollTop: $("#advise").offset().top
    }, 1000);
});

$("#navbarContact").click(function() {
    $('html, body').animate({
        scrollTop: $("#contact").offset().top
    }, 1000);
});

});

