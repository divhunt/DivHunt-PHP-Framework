var COOKIES = class
{
    get(key = false)
    {
        var object  = false;
        var cookies = decodeURIComponent(document.cookie);
            cookies = cookies.split(';');

        for(var i = 0; i <cookies.length; i++) 
        {
            var cookie = cookies[i];

            while (cookie.charAt(0) == ' ') 
            {
                cookie = cookie.substring(1);
            }

            if(cookie.indexOf('divhunt=') == 0) 
            {
                object = cookie.substring(8, cookie.length);
            }
        }
        
        if(!object)
        {
            return false;
        }

        if(!key)
        {
            return JSON.parse(object);
        }

        return sanitize(JSON.parse(object)[key] ?? false);
    }

    set(name, value)
    {
        var date    = new Date(); date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
        var expires = 'expires=' + date.toUTCString();
        var object  = this.get();

        if(!object)
        {
            object = {};
        }

        if(value)
        {
            object[name] = value;
        }
        else
        {
            delete object[name];
        }

        document.cookie = 'divhunt=' + JSON.stringify(object) + ';' + expires + ';path=/';
    }
};

if(typeof cookies === 'undefined' || cookies === null)
{
    var cookies = new COOKIES()
}