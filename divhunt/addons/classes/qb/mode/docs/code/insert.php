$user = qb::insert('
    users
')
->key('user_name')->value('John')
->key('user_email')->value('john@email.com')
->add()
->key('user_name')->value('John 2')
->key('user_email')->value('john2@email.com')

// Returns object with success, sql, data and query information.
print_r($user->run());

// Success and faill callback
$user->run(function($data)
{
    echo 'Success';
}), 
function($data)
{
    echo "Fail";
});