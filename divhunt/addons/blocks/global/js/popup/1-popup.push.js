var POPUP_PUSH = class
{
    constructor(data, content, callback)
    {
        this.popup    = data;
        this.popup.id = Math.floor(Math.random() * 26) + Date.now();

        switch(this.popup.type)
        {
            case 'notification':
                content = this.contentNotification();
                break;

            case 'toolbox':
                $('#popup .toolbox').remove();
                break;
        }

        var style = this.style();
        var html  = this.html(style);
        var This  = this;

        if(this.popup.action)
        {
            ajax.post(this.popup.action, false, function(response)
            {
                if(!response.success)
                {
                    popup.notification(0, response.info); return;
                }

                html = html.replace('{STYLE}' , style);
                html = html.replace('{CONTENT}' , response.html);
            
                This.push(html, callback);
            });
        }
        else
        {
            html = html.replace('{STYLE}' , style);
            html = html.replace('{CONTENT}' , content);
        
            this.push(html, callback);
        }
    }

    contentNotification()
    {
        var html = '';

        if(this.popup.notification.success == 1)
        {
            html += '<div class="success"><div class="icon"><i class="fas fa-check"></i></div>';
        }
        else if(this.popup.notification.success == 0)
        {
            html += '<div class="danger"><div class="icon"><i class="fas fa-times"></i></div>';
        }
        else
        {
            html += '<div class="warning"><div class="icon"><i class="fas fa-info"></i></div>';
        }

        html += '<div class="info">' + this.popup.notification.info + '</div>';

        return html += '</div>';
    }

    style()
    {
        var style = '';

        /* Position: X */

            if(!this.popup.click)
            {
                if(this.popup.position.x == 'center')
                {
                    style += 'left:0;right:0;';
                }
                else if(this.popup.position.x == 'left')
                {
                    style += 'left:0;right:unset;';
                }
                else if(this.popup.position.x == 'right')
                {
                    style += 'left:unset;right:0';
                }
            }

        /* Position: Y */

            if(!this.popup.click)
            {
                if(this.popup.position.y == 'center')
                {
                    style += 'top:0;bottom:0;';
                }
                else if(this.popup.position.y == 'top')
                {
                    style += 'top:0;bottom:unset;';
                }
                else if(this.popup.position.y == 'bottom')
                {
                    style += 'top:unset;bottom:0';
                }
            }

        /* Click */

            if(this.popup.click)
            {
                style += 'position:fixed;bottom:unset;right:unset;';

                var width  = this.popup.size.width;
                var height = this.popup.size.height;

                width = width.replace('px', '');
                width = width.replace('vw', '');
                width = width.replace('%', '');

                height = height.replace('px', '');
                height = height.replace('vh', '');
                height = height.replace('%', '');

                width  = parseInt(width);
                height = parseInt(height);

                if(this.popup.position.y == 'center')
                {
                    var y  = this.popup.click.y - (height / 2);
                    style += 'top:'+y+'px;';
                }
                else if(this.popup.position.y == 'top')
                {
                    var y  = this.popup.click.y - height;
                    style += 'top:'+y+'px;';
                }
                else if(this.popup.position.y == 'bottom')
                {
                    var y  = this.popup.click.y;
                    style += 'top:'+y+'px;';
                }

                if(this.popup.position.x == 'center')
                {
                    var x  = this.popup.click.x - (width / 2);
                    style += 'left:'+x+'px;';
                }
                else if(this.popup.position.x == 'left')
                {
                    var x  = this.popup.click.x - width;
                    style += 'left:'+x+'px;';
                }
                else if(this.popup.position.x == 'right')
                {
                    var x  = this.popup.click.x;
                    style += 'left:'+x+'px;';
                }
            }

        /* Position: left, Right, Top, Bottom */

            if(this.popup.position.left)
            {
                style += 'left:' + this.popup.position.left + ';';
            }

            if(this.popup.position.right)
            {
                style += 'right:' + this.popup.position.right + ';';
            }

            if(this.popup.position.top)
            {
                style += 'top:' + this.popup.position.top + ';';
            }

            if(this.popup.position.bottom)
            {
                style += 'bottom:' + this.popup.position.bottom + ';';
            }

        /* Width, Height */

            if(this.popup.size.width)
            {
                style += 'max-width:' + this.popup.size.width + ';';
            }

            if(this.popup.size.height)
            {
                style += 'height:' + this.popup.size.height + ';';
            }

        return style;
    }

    html()
    {
        var html = '<div id="popup' + (this.popup.id) + '" class="popup ' + (this.popup.type) + (this.popup.class) + (this.popup.close) + '">';

        if(this.popup.overlay.enabled)
        {
            html += '<div class="animation overlay' + (this.popup.overlay.close) + '" animation="fadeIn"></div>';
        }

        if(this.popup.animation)
        {
            html += '<div style="{STYLE}" class="area animation" animation="' + this.popup.animation + '">{CONTENT}</div>';
        }
        else
        {
            html += '<div style="{STYLE}" class="area' + (this.popup.animation) + '">{CONTENT}</div>';
        }

        html += '</div>';

        return html;
    }

    push(html, callback)
    {
        $('window').find('#popup').append(html);

        if(this.popup.expire)
        {
            var element = $('#popup' + this.popup.id);

            var t = setTimeout(() => 
            {
                popup._close.popup(element);
                
            }, this.popup.expire);
        }

        animations.init();

        if(callback)
        {
            callback();
        }
    }
};
