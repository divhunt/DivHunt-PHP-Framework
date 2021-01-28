var AJAX_FUNCTIONS = class
{
    route(route)
    {
        return route;



        var url = ''; 

        if(route)
        {
            if(route.indexOf('http') < 0)
            {
                for(var key in this.get) 
                {
                    this.push = true;

                    if(~route.indexOf('?'))
                    {
                        var url = url + '&' + key + '=' + this.get[key];
                    }
                    else
                    {
                        var url = url + '?' + key + '=' + this.get[key];
                    }
                }

                return route + url.replace('//', '/');
            }
            else
            {
                return route;
            }
        }   
        else
        {
            var url = '';
            
            for(var key in this.get) 
            {
                this.push = true;

                if(~url.indexOf('?'))
                {
                    url = url + '&' + key + '=' + this.get[key];
                }
                else
                {
                    url = url + '?' + key + '=' + this.get[key];
                }
            }

            return url.replace('//', '/');
        }

        return '';
    }
};