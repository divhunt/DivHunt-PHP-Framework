var ANIMATIONS = class
{
    constructor()
    {
        this.gsap = gsap.timeline({ defaults: { ease: 'power1.out' } });
    }
    init()
    {
        $('.animation').each(function()
        {
            var animation = $(this).attr('animation');

            switch(animation)
            {
                case 'fadeIn':
                    animations.fadeIn($(this));
                    break;

                case 'fadeOut':
                    animations.fadeOut($(this));
                    break;

                case 'swipeLeftIn':
                    animations.swipeLeftIn($(this));
                    break;

                case 'swipeLeftOut':
                    animations.swipeLeftOut($(this));
                    break;

                case 'swipeRightIn':
                    animations.swipeRightIn($(this));
                    break;

                case 'swipeRightOut':
                    animations.swipeRightOut($(this));
                    break;

                case 'swipeUpIn':
                    animations.swipeUpIn($(this));
                    break;

                case 'swipeUpOut':
                    animations.swipeUpOut($(this));
                    break;

                case 'swipeDownIn':
                    animations.swipeDownIn($(this));
                    break;

                case 'swipeDownOut':
                    animations.swipeDownOut($(this));
                    break;
            }
        });
    }

    /* Fade */

        fadeIn(element)
        {
            this.gsap.fromTo(element, {opacity: 0}, {opacity: 1, duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);        
        }

        fadeOut(element)
        {
            this.gsap.fromTo(element, {opacity: 1}, {opacity: 0, duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);        
        }

    /* Swipe Left */

        swipeLeftIn(element)
        {
            this.gsap.fromTo(element, {opacity: 0, x: '100'}, {opacity: 1, x: 0, duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }

        swipeLeftOut(element)
        {
            this.gsap.fromTo(element, {opacity: 1, x: 0}, {opacity: 0, x: '100', duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }

    /* Swipe Right */

        swipeRightIn(element)
        {
            this.gsap.fromTo(element, {opacity: 0, x: '-100'}, {opacity: 1, x: 0, duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }

        swipeRightOut(element)
        {
            this.gsap.fromTo(element, {opacity: 1, x: 0}, {opacity: 0, x: '-100', duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }

    /* Swipe Uo */

        swipeUpIn(element)
        {
            this.gsap.fromTo(element, {opacity: 0, y: '100'}, {opacity: 1, y: 0, duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }

        swipeUpOut(element)
        {
            this.gsap.fromTo(element, {opacity: 1, y: 0}, {opacity: 0, y: '100', duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }

    /* Swipe Down */

        swipeDownIn(element)
        {
            this.gsap.fromTo(element, {opacity: 0, y: '-100'}, {opacity: 1, y: 0, duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }

        swipeDownOut(element)
        {
            this.gsap.fromTo(element, {opacity: 1, y: 0}, {opacity: 0, y: '-100', duration: 0.1});

            var t = setTimeout(() => 
            {
                element.removeClass('animation');
            }, 100);      
        }
};

if(typeof animations === 'undefined' || animations === null)
{
    animations = new ANIMATIONS();

    $('body').ready(function()
    {
        animations.init();
    });
}