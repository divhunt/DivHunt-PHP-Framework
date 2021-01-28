<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('database');
        $f->h1('database');
        $f->note('qb::database(callable $callback) : void');
        $f->p('Using qb::database() you can add as many database connections masters or slaves, as well multiple regions. This database connection will not be initiated until first query is launched.');

        $f->h3('Paremeters');
        $f->parameter('callback', 'Required.');

        $f->h3('Callback Options');
        $f->parameter('->host(string $host)', 'MySQL host.');
        $f->parameter('->user(string $user)', 'MySQL user.');
        $f->parameter('->pass(string $pass)', 'MySQL pass.');
        $f->parameter('->base(string $base = false)', 'MySQL base. Can be ignored.');
        $f->parameter('->region(string $region)', 'Region.');
        $f->parameter('->type(string $type)', 'Master or slave.');
        $f->parameter('->persistant(bool $persistant)', 'True or false.');

        $f->h3('Return Values');
        $f->p('This function does not have any return value.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/master-slaves.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('connection');
        $f->h1('connection');
        $f->note('qb::connection(string $type) : object');
        $f->p('Using bind::connection() returns connection for provided type (master or slave) if connected, otherwise creates new connection. This method is automatically called when using qb::query() or any of crud functions like qb::select(), qb::update(), qb::insert(), qb::delete().');

        $f->h3('Paremeters');
        $f->parameter('type', 'Master or slave.');

        $f->h3('Return Values');
        $f->p('Returns MySQL connection object or false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('query');
        $f->h1('query');
        $f->note('qb::query(string $query, string $type) : mixed');
        $f->p('Executes query for master or slave.');

        $f->h3('Paremeters');
        $f->parameter('query', 'Query.');
        $f->parameter('type', 'Master or slave.');

        $f->h3('Return Values');
        $f->p('Returns mysqli_result object on success or false on fail.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/query.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('select');
        $f->h1('select');
        $f->note('qb::select(string $select, string $type = "slave") : mixed');
        $f->p('Fetch data from database easy way.');

        $f->h3('Paremeters');
        $f->parameter('select', 'Field names or "*".');
        $f->parameter('type', 'Master or Slave');

        $f->h3('Additional Options');
        $f->parameter('->from(string $from)', 'Database.table or just table.');
        $f->parameter('->join(string $join)', 'Full join like "INNER JOIN payments ON ...".');
        $f->parameter('->where(string $where)', 'Key for search like "user_name".');
        $f->parameter('->is(string $type, string $value)', 'Allowed types: "equal", "notequal", "regexp", "lessthan", "lessequalthan", "greaterthan", "greaterequalthan", "greaterlessthan", "notnull", "null", "like", "notlike", "in", "notin".');
        $f->parameter('->custom(string $custom)', 'Set custom where.');
        $f->parameter('->and(string $and)', 'Key for search like "user_name"');
        $f->parameter('->or(string $or)', 'Key for search like "user_name"');
        $f->parameter('->order(string $order)', 'Order');
        $f->parameter('->limit(int $limit)', 'Limit');
        $f->parameter('->offset(int $offset)', 'Offset');
        $f->parameter('->group(string $group)', 'Group');
        $f->parameter('->run(callable $success_callback = false, callable $fail_callablck = false)', 'Callback will be runned if query was successfull or not successfull. Returns object.');

        $f->h3('Return Values');
        $f->p('Returns array, object or false.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/select.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('update');
        $f->h1('update');
        $f->note('qb::update(string $table) : array');
        $f->p('Update data in database easy way.');

        $f->h3('Paremeters');
        $f->parameter('table', 'Database.table or just table.');

        $f->h3('Additional Options');
        $f->parameter('->key(string $key)', 'Key to update.');
        $f->parameter('->value(string $value, bool $sanitize = true)', 'Value to add. Set $sanitize = false to skip sanitizing.');
        $f->parameter('->set(string $set)', 'Custom update. Example: "user_updated = now()".');
        $f->parameter('->where(string $where)', 'Key for search like "user_name".');
        $f->parameter('->is(string $type, string $value)', 'Allowed types: "equal", "notequal", "regexp", "lessthan", "lessequalthan", "greaterthan", "greaterequalthan", "greaterlessthan", "notnull", "null", "like", "notlike", "in", "notin".');
        $f->parameter('->custom(string $custom)', 'Set custom where.');
        $f->parameter('->and(string $and)', 'Key for search like "user_name"');
        $f->parameter('->or(string $or)', 'Key for search like "user_name"');
        $f->parameter('->order(string $order)', 'Order');
        $f->parameter('->limit(int $limit)', 'Limit');
        $f->parameter('->offset(int $offset)', 'Offset');
        $f->parameter('->group(string $group)', 'Group');
        $f->parameter('->run(callable $success_callback = false, callable $fail_callablck = false)', 'Callback will be runned if query was successfull or not successfull. Returns object.');

        $f->h3('Return Values');
        $f->p('Returns array.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/update.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('insert');
        $f->h1('insert');
        $f->note('qb::insert(string $table) : array');
        $f->p('Inserts data in database easy way.');

        $f->h3('Paremeters');
        $f->parameter('table', 'Database.table or just table.');

        $f->h3('Additional Options');
        $f->parameter('->key(string $key)', 'Key to update.');
        $f->parameter('->value(string $value, bool $sanitize = true)', 'Value to add. Set $sanitize = false to skip sanitizing.');
        $f->parameter('->add()', 'Adds new row for insert.');
        $f->parameter('->run(callable $success_callback = false, callable $fail_callablck = false)', 'Callback will be runned if query was successfull or not successfull. Returns object.');

        $f->h3('Return Values');
        $f->p('Returns array.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/insert.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('delete');
        $f->h1('delete');
        $f->note('qb::delete(string $table) : array');
        $f->p('Delete data from database easy way.');

        $f->h3('Paremeters');
        $f->parameter('table', 'Database.table or just table.');

        $f->h3('Additional Options');
        $f->parameter('->where(string $where)', 'Key for search like "user_name".');
        $f->parameter('->is(string $type, string $value)', 'Allowed types: "equal", "notequal", "regexp", "lessthan", "lessequalthan", "greaterthan", "greaterequalthan", "greaterlessthan", "notnull", "null", "like", "notlike", "in", "notin".');
        $f->parameter('->custom(string $custom)', 'Set custom where.');
        $f->parameter('->and(string $and)', 'Key for search like "user_name"');
        $f->parameter('->or(string $or)', 'Key for search like "user_name"');
        $f->parameter('->order(string $order)', 'Order');
        $f->parameter('->limit(int $limit)', 'Limit');
        $f->parameter('->offset(int $offset)', 'Offset');
        $f->parameter('->group(string $group)', 'Group');
        $f->parameter('->run(callable $success_callback = false, callable $fail_callablck = false)', 'Callback will be runned if query was successfull or not successfull. Returns object.');

        $f->h3('Return Values');
        $f->p('Returns array.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/delete.php');
    });