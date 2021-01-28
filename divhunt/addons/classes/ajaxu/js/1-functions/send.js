var AJAXU_SEND = 
{
    /*
     * Send AjaxU
     */

    send(ajaxu_identifier, ajaxu_value)
    {
        ajax.do().post({ajaxu: ajaxu_identifier, value: ajaxu_value}).run(false, function(response)
        {
            if(!response.success)
            {
                popup.notification(response.info, response.success);
            }
        });
    }
};