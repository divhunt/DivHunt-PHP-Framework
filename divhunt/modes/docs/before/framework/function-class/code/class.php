// Without instance class
DivHunt::class('route')->from(DivHunt::getClassesPath(), true); // Absolute path.

include route::get('/', function($r)
{
    $r->load('pages/home');
});

// With instance class
$user = DivHunt::class('user')->instance(true)->from('classes'); // Relative path.

echo $user->getName();

// With constructs
$sendgrid = DivHunt::class('sendgrid', 'api_key', 'api_token')->instance(true)->from('classes/email');

$sendgrid->send(function($mail)
{
    $mail->title('DivHunt');
    $mail->body('Thanks for using DivHunt - PHP Web Framework!');
    $main->to('to@all.interested');
});