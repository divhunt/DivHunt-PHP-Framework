var AJAX_PROCESS = class
{
    constructor(type, data)
    {    
        this.type  = type;
        this.route = false;
        this.push  = false;
        this.get   = [];
        this.post  = [];

        var ajax = this;

        $.each(data, function(key, value)
        {
            if(ajax.type == 'POST')
            {
                ajax.post[key] = value;
            }
            else
            {
                ajax.get[key] = value;
            }
        });

        this.post['mode'] = 'ajax';
    }

    fetch(callback = false)
    {
        this.data = $.extend({}, [], this.post);

        $.ajax(
        {
           type: this.type,
           url:  this.route, 
           data: this.data
        })
        .done(function(response, headers, xhr)
        {
            if(callback)
            {
                callback(response, headers, xhr);
            }
        });
    }
};