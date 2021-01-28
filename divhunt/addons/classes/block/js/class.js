var BLOCK = class
{    
    constructor()
    {
        /*
         * Extend functions
         */

        $.extend(
            this,
            BLOCK_REFRESH
        );
    }
};

if(typeof block === 'undefined' || block === null)
{
    var block = new BLOCK();
}