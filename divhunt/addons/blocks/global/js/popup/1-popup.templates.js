var POPUP_TEMPLATES = class
{
    sidebar()
    {
        var template = {};

        template.type            = 'sidebar';
        template.animation       = 'swipeRightIn';
        template.target          = false;
        template.click           = false;
        template.action          = false;
        template.close           = ' ';
        template.class           = ' sidebar';
        template.expire          = false;

        template.position        = {};
        template.position.x      = 'left';
        template.position.y      = 'top';
        template.position.left   = '60px';
        template.position.top    = false;
        template.position.right  = false;
        template.position.bottom = false;

        template.size            = {};
        template.size.width      = '300px';
        template.size.height     = '100vh';

        template.overlay         = {};
        template.overlay.enabled = false;
        template.overlay.close   = ' ';

        return template;
    }

    big()
    {
        var template = {};

        template.type            = 'big';
        template.animation       = 'swipeUpIn';
        template.target          = false;
        template.click           = false;
        template.action          = false;
        template.close           = ' ';
        template.class           = ' big';
        template.expire          = false;

        template.position        = {};
        template.position.x      = 'center';
        template.position.y      = 'center';
        template.position.left   = false;
        template.position.top    = false;
        template.position.right  = false;
        template.position.bottom = false;

        template.size            = {};
        template.size.width      = '1140px';
        template.size.height     = '80vh';

        template.overlay         = {};
        template.overlay.enabled = true;
        template.overlay.close   = ' ';

        return template;
    }

    full()
    {
        var template = {};

        template.type            = 'full';
        template.animation       = 'fadeIn';
        template.target          = false;
        template.click           = false;
        template.action          = false;
        template.close           = ' ';
        template.class           = ' full';
        template.expire          = false;

        template.position        = {};
        template.position.x      = 'center';
        template.position.y      = 'center';
        template.position.left   = false;
        template.position.top    = false;
        template.position.right  = false;
        template.position.bottom = false;

        template.size            = {};
        template.size.width      = '100vw';
        template.size.height     = '100vh';

        template.overlay         = {};
        template.overlay.enabled = false;
        template.overlay.close   = ' ';

        return template;
    }

    medium()
    {
        var template = {};

        template.type            = 'medium';
        template.animation       = 'swipeUpIn';
        template.target          = false;
        template.click           = false;
        template.action          = false;
        template.close           = ' ';
        template.class           = ' medium';
        template.expire          = false;

        template.position        = {};
        template.position.x      = 'center';
        template.position.y      = 'center';
        template.position.left   = false;
        template.position.top    = false;
        template.position.right  = false;
        template.position.bottom = false;

        template.size            = {};
        template.size.width      = '991px';
        template.size.height     = '70vh';

        template.overlay         = {};
        template.overlay.enabled = true;
        template.overlay.close   = ' ';

        return template;
    }

    small()
    {
        var template = {};

        template.type            = 'small';
        template.animation       = 'swipeUpIn';
        template.target          = false;
        template.click           = false;
        template.action          = false;
        template.close           = ' ';
        template.class           = ' small';
        template.expire          = false;

        template.position        = {};
        template.position.x      = 'center';
        template.position.y      = 'center';
        template.position.left   = false;
        template.position.top    = false;
        template.position.right  = false;
        template.position.bottom = false;

        template.size            = {};
        template.size.width      = '300px';
        template.size.height     = '200px';

        template.overlay         = {};
        template.overlay.enabled = true;
        template.overlay.close   = ' ';

        return template;
    }

    notification()
    {
        var template = {};

        template.type            = 'notification';
        template.animation       = 'swipeDownIn';
        template.target          = false;
        template.click           = false;
        template.action          = false;
        template.close           = ' close';
        template.class           = ' notification';
        template.expire          = 6000;

        template.position        = {};
        template.position.x      = 'center';
        template.position.y      = 'top';
        template.position.left   = false;
        template.position.top    = '50px';
        template.position.right  = false;
        template.position.bottom = false;

        template.size            = {};
        template.size.width      = '300px';
        template.size.height     = 'auto';

        template.overlay         = {};
        template.overlay.enabled = false;
        template.overlay.close   = '';

        template.notification         = {};
        template.notification.success = false;
        template.notification.info    = false;

        return template;
    }

    toolbox()
    {
        var template = {};

        template.type            = 'toolbox';
        template.animation       = 'swipeUpIn';
        template.target          = false;
        template.click           = false;
        template.action          = false;
        template.close           = ' ';
        template.class           = ' toolbox';
        template.expire          = false;

        template.position        = {};
        template.position.x      = 'center';
        template.position.y      = 'center';
        template.position.left   = false;
        template.position.top    = false;
        template.position.right  = false;
        template.position.bottom = false;

        template.size            = {};
        template.size.width      = '200px';
        template.size.height     = '100px';

        template.overlay         = {};
        template.overlay.enabled = false;
        template.overlay.close   = '';

        return template;
    }
};
