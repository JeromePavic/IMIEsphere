

$(function(){

    $('#btnMenu').on('click touch', function(e){
        $('#nav').slideToggle();
    });
});



//datepicker and timepicker


$( function() {
    $( "#start .date" ).datepicker(
        {
        dateFormat: "dd/mm/yy",
        'autoclose': true
    });
});

$( function() {
    $( "#start .time" ).timepicker(
        {
        'showDuration': true,
        'timeFormat': 'H:i'
    });
});

$( function() {
    $( "#end .date" ).datepicker(
        {
        dateFormat: "dd/mm/yy",
        'autoclose': true
    });
});

$( function() {
    $( "#end .time" ).timepicker(
        {
        'showDuration': true,
        'timeFormat': 'H:i'
    });
});

