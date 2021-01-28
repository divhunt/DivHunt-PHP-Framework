$('body').ready(function()
{
    var animation = gsap.timeline({ defaults: { ease: 'power1.out' } });

    $('.dh-docs-project-browse .project').each(function()
    {
        animation.to($(this), { opacity: '1', x: '0%', duration: 0.20 });
    });
});