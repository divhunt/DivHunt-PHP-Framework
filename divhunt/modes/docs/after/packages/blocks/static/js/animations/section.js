$('body').ready(function()
{
    var animation = gsap.timeline({ defaults: { ease: 'power1.out' } });

    $('.dh-docs-page-section').each(function()
    {
        animation.to($(this), { opacity: '1', y: '0%', duration: 0.20 });
    });
});