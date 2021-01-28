function sanitize(string)
{    
    if(!string)
    {
        return false;
    }
    
    if(typeof string === 'string')
    {
        return string = string.replace(/[\u00A0-\u9999<>\&]/gim, function(i)
        {
           return '&#'+i.charCodeAt(0)+';';
        });
    }
    else
    {
        return parseInt(string);
    }
}

function reload(url)
{
    window.location.replace(url);
}

function objectEmpty(object)
{
    for(var property in object) 
    {
        if(Object.prototype.hasOwnProperty.call(object, property)) 
        {
            return false;
        }
    }

    return true;
}