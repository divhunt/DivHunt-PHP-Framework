var POPUP = class
{
    constructor(POPUP_INITIATE, POPUP_TEMPLATES, POPUP_CLOSE, POPUP_PUSH) 
    {
        this._initiate  = new POPUP_INITIATE();
        this._templates = new POPUP_TEMPLATES();
        this._close     = new POPUP_CLOSE();
        this._push      = POPUP_PUSH;
    }

    notification(success, info, options = false)
    {
        this.popup = this._templates.notification();

        this.popup.notification.success = success;
        this.popup.notification.info    = info;

        if(options)
        {
            return this;
        }

        new this._push(this.popup, false);
    }

    sidebar(content, options = false)
    {
        this.popup = this._templates.sidebar();

        if(options)
        {
            return this;
        }

        new this._push(this.popup, content);
    }

    big(content, options = false)
    {
        this.popup = this._templates.big();

        if(options)
        {
            return this;
        }

        new this._push(this.popup, content);
    }

    full(content, options = false)
    {
        this.popup = this._templates.full();

        if(options)
        {
            return this;
        }

        new this._push(this.popup, content);
    }

    medium(content, options = false)
    {
        this.popup = this._templates.medium();

        if(options)
        {
            return this;
        }

        new this._push(this.popup, content);
    }

    small(content, options = false)
    {
        this.popup = this._templates.small();

        if(options)
        {
            return this;
        }

        new this._push(this.popup, content);
    }


    toolbox(content, options = false)
    {
        this.popup = this._templates.toolbox();

        if(options)
        {
            return this;
        }

        new this._push(this.popup, content);
    }

    position(x, y)
    {
        this.popup.position.x = x;
        this.popup.position.y = y;

        return this;
    }

    action(name, data = {})
    {
        this.popup.action        = data;
        this.popup.action.action = name;

        return this;
    }

    class(class_name)
    {
        this.popup.class = ' ' + class_name;

        return this;
    }

    size(width, height)
    {
        this.popup.size.width = width;
        this.popup.size.height = height;

        return this;
    }

    click(x, y)
    {
        this.popup.click   = {};
        this.popup.click.x = x;
        this.popup.click.y = y;

        return this;
    }

    push(content = false, callback = false)
    {
        new this._push(this.popup, content, callback);
    }
};

if(typeof popup === 'undefined' || popup === null)
{
    var popup = new POPUP(
        POPUP_INITIATE,
        POPUP_TEMPLATES,
        POPUP_CLOSE,
        POPUP_PUSH
    );

    $(document).on('click', '.popup .overlay.close', function()
    {
        popup._close.popup($(this).closest('.popup'));
    });

    $(document).on('click', '.popup.close', function()
    {
        popup._close.popup($(this));
    });
}