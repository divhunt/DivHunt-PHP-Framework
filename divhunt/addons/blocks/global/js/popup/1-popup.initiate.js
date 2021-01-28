var POPUP_INITIATE = class
{
    constructor()
    {
        if($('window').find('#popup').length < 1)
        {
            $('window').append('<div id="popup"></div>');
        }
    }
};
