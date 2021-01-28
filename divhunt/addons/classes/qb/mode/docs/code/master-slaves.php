// Add Master for region "eu"
qb::database(function($database)
{
    $database->host('localhost_master_1');
    $database->user('user');
    $database->pass('pass');
    $database->region('eu');
    $database->type('master');
});

// Add Slave #1 for region "eu"
qb::database(function($database)
{
    $database->host('localhost_slave_1');
    $database->user('user');
    $database->pass('pass');
    $database->region('eu');
    $database->type('slave');
});

// Add Slave #2 for region "eu"
qb::database(function($database)
{
    $database->host('localhost_slave_2');
    $database->user('user');
    $database->pass('pass');
    $database->region('eu');
    $database->type('slave');
});