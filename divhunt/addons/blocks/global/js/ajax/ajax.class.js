var AJAX = class
{
    constructor(AJAX_PROCESS, AJAX_FUNCTIONS)
    {    
        this._prepare   = AJAX_PROCESS;
        this._functions = new AJAX_FUNCTIONS();
    }

    post(data = {}, pre_callback = false, post_callback = false)
    {
        var ajax = new AJAX_PROCESS('POST', data);

        if(pre_callback)
        {
            pre_callback(ajax);
        }

        ajax.fetch(function(response, headers, xhr)
        {
            if(post_callback) { post_callback(response, headers, xhr); }
        });
    }
};

if(typeof ajax === 'undefined' || ajax === null)
{
    var ajax = new AJAX(AJAX_PROCESS, AJAX_FUNCTIONS);

    function ajax_post(data = {}, pre_callback = false, post_callback = false)
    {
        return ajax.post(data, pre_callback, post_callback);
    }
}