var BLOCK_REFRESH = 
{
    /*
     * Refresh block
     */

    refresh()
    {
        let blocks = [];
        let ajaxdo = ajax.do();

        return new class 
        { 
            add(id, name = false)
            {
                blocks.push(id)

                return this;
            }

            url(url)
            {
                ajaxdo.url(url);

                return this;
            }

            get(get)
            {
                ajaxdo.get(get);

                return this;
            }

            post(post)
            {
                ajaxdo.post(post);

                return this;
            }

            run(callback = false)
            {
                ajaxdo.run(function(data) 
                {
                    data['post']['mode']    = 'spa';
                    data['post']['include'] = blocks;
                },
                function(response)
                {
                    if(response.success)
                    {
                        $.each(response.spa.blocks, function(key, value)
                        {
                            $('.' + key).html(value);
                            $('.' + key).find('.animations').removeClass('animations');
                        });
                    }
                });
            }
        };
    }
};