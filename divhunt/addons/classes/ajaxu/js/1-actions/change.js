/*
 * On ajaxu change
 */ 

$(document).on('change', '.A-ajaxu-change', function(event)
{
    ajaxu.send($(this).attr('ajaxu'), $(this).val());
});