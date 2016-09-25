

$(function(){

    $('#btnMenu').on('click touch', function(e){
        $('#nav').slideToggle();
    });



    $('#modif').change(function() {
        $(this).parents('form').submit();
    });

	//datepicker and timepicker

    $( "#start .date" ).datepicker(
        {
        dateFormat: "dd/mm/yy",
        'autoclose': true
    });



    $( "#start .time" ).timepicker(
        {
        'showDuration': true,
        'timeFormat': 'H:i'
    });



    $( "#end .date" ).datepicker(
        {
        dateFormat: "dd/mm/yy",
        'autoclose': true
    });



    $( "#end .time" ).timepicker(
        {
        'showDuration': true,
        'timeFormat': 'H:i'
    });
    
    
//    	if (("#availability").data == 0) {
//    		$('#register').prop("disabled",true);
//    	}

});

