var POPUP_CLOSE = class
{
    popup(element)
    {
        if(!element[0] ?? false)
        {
            return;
        }

        var animation = element.find('.area').attr('animation').replace('In', 'Out');

        element.find('.area').attr('animation', animation);
        element.find('.area').addClass('animation');

        if(element.find('.overlay')[0] ?? false)
        {
            var animation = element.find('.overlay').attr('animation').replace('In', 'Out');

            element.find('.overlay').attr('animation', animation);
            element.find('.overlay').addClass('animation');
        }

        animations.init();

        var t = setTimeout(() => 
        {
            element.remove();
        }, 200);
    }
};
