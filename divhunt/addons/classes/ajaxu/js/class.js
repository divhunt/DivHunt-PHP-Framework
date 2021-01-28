var AJAXU = class
{    
    constructor()
    {
        /*
         * Include function classes
         */ 

        $.extend(
            this, 
            AJAXU_SEND
        );
    }
};

if(typeof ajaxu === 'undefined' || ajaxu === null)
{
    var ajaxu = new AJAXU();
}