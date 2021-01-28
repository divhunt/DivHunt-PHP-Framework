$user = qb::update('
    users
')
->key('user_name')->value('John')
->key('user_email')->value('john@email.com')
->where('user_id')->is('equal', $user->id);

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