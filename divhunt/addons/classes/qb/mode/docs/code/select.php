$user = qb::select('
    user_name
')
->from('users')
->join('INNER JOIN sessions ON sessions.session_user_id = users.user_id')
->where('user_id')->is('equal', $user->id)->or('user_id')->is('null')
->where('user_name')->is('equal', 'divhunt')->and('user_name')->is('notnull')
->limit(1)->order('user_id DESC');

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