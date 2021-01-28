<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('get');
        $f->h1('get');
        $f->note('route::get(string $route, callable $callback = false) : string|bool');
        $f->p('Function will match route from URI only in GET request method.');

        $f->h3('Paremeters');
        $f->parameter('route', 'Provide any route for matching in format like "/user".');
        $f->parameter('callback', 'If not provided, function will return bool, otherwise string with file path.');

        $f->h3('Callback Options');
        $f->parameter('->load(string $file)', 'File path in format like "user/add".'); 

        $f->h3('Return Values');
        $f->p('Function returns string if route is matched with callback. Bool if callback is missing or string if callback is passed and route is not matched with empty file location.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/get.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('post');
        $f->h1('post');
        $f->note('route::post(string $route, callable $callback = false) : string|bool');
        $f->p('Function will match route from URI only in POST request method.');

        $f->h3('Paremeters');
        $f->parameter('route', 'Provide any route for matching in format like "/user".');
        $f->parameter('callback', 'If not provided, function will return bool, otherwise string with file path.');

        $f->h3('Callback Options');
        $f->parameter('->load(string $file)', 'File path in format like "user/add".'); 

        $f->h3('Return Values');
        $f->p('Function returns string if route is matched with callback. Bool if callback is missing or string if callback is passed and route is not matched with empty file location.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/post.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('put');
        $f->h1('put');
        $f->note('route::put(string $route, callable $callback = false) : string|bool');
        $f->p('Function will match route from URI only in PUT request method.');

        $f->h3('Paremeters');
        $f->parameter('route', 'Provide any route for matching in format like "/user".');
        $f->parameter('callback', 'If not provided, function will return bool, otherwise string with file path.');

        $f->h3('Callback Options');
        $f->parameter('->load(string $file)', 'File path in format like "user/add".'); 

        $f->h3('Return Values');
        $f->p('Function returns string if route is matched with callback. Bool if callback is missing or string if callback is passed and route is not matched with empty file location.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/put.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('delete');
        $f->h1('delete');
        $f->note('route::delete(string $route, callable $callback = false) : string|bool');
        $f->p('Function will match route from URI only in DELETE request method.');

        $f->h3('Paremeters');
        $f->parameter('route', 'Provide any route for matching in format like "/user".');
        $f->parameter('callback', 'If not provided, function will return bool, otherwise string with file path.');

        $f->h3('Callback Options');
        $f->parameter('->load(string $file)', 'File path in format like "user/add".'); 

        $f->h3('Return Values');
        $f->p('Function returns string if route is matched with callback. Bool if callback is missing or string if callback is passed and route is not matched with empty file location.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/delete.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('any');
        $f->h1('any');
        $f->note('route::any(string $route, callable $callback = false) : string|bool');
        $f->p('Function will match route from URI in every request methods.');

        $f->h3('Paremeters');
        $f->parameter('route', 'Provide any route for matching in format like "/user".');
        $f->parameter('callback', 'If not provided, function will return bool, otherwise string with file path.');

        $f->h3('Callback Options');
        $f->parameter('->load(string $file)', 'File path in format like "user/add".'); 

        $f->h3('Return Values');
        $f->p('Function returns string if route is matched with callback. Bool if callback is missing or string if callback is passed and route is not matched with empty file location.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/any.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('match');
        $f->h1('match');
        $f->note('route::match(array $match, string $route, callable $callback = false) : string|bool');
        $f->p('Function will match route from URI only in matched request methods.');

        $f->h3('Paremeters');
        $f->parameter('match', 'Array of request methods to match.');
        $f->parameter('route', 'Provide any route for matching in format like "/user".');
        $f->parameter('callback', 'If not provided, function will return bool, otherwise string with file path.');

        $f->h3('Callback Options');
        $f->parameter('->load(string $file)', 'File path in format like "user/add".'); 

        $f->h3('Return Values');
        $f->p('Function returns string if route is matched with callback. Bool if callback is missing or string if callback is passed and route is not matched with empty file location.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/match.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('ajax');
        $f->h1('ajax');
        $f->note('route::ajax(array $match, string $route, callable $callback = false) : void');
        $f->p('Function will match route from URI only in matched request methods and inject file into "Ajax" mode.');

        $f->h3('Paremeters');
        $f->parameter('match', 'Array of request methods to match.');
        $f->parameter('route', 'Provide any route for matching in format like "/user".');
        $f->parameter('callback', 'If not provided, function will return bool, otherwise string with file path.');

        $f->h3('Callback Options');
        $f->parameter('->load(string $file)', 'File path in format like "user/add".'); 

        $f->h3('Return Values');
        $f->p('Function does not have return value.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/ajax.php');
    });