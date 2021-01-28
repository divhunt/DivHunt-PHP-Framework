$('body').ready(function()
{
    $('.dh-docs-page-browse .grid').each(function()
    {
        var animation = gsap.timeline({ defaults: { ease: 'power1.out' } });

        $(this).find('.page').each(function()
        {
            animation.to($(this), { opacity: '1', x: '0%', duration: 0.20 });
        });
    });

    var animation = gsap.timeline({ defaults: { ease: 'power1.out' } });

    $('.dh-docs-page-blocks .block').each(function()
    {
        animation.to($(this), { opacity: '1', y: '0%', duration: 0.20 });
    });
});