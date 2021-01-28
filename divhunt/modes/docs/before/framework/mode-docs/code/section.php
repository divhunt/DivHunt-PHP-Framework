DivHunt::docsSection($page, function($s)
{
    $s->title('Sections');
    $s->h1('Sections');
    $s->p('Sections are dynamic blocks that can be structured in more different ways. They are last step for writting documentation.');
    $s->note('In order to create page sections, page object must be provided.');
    $s->code(__DIR__ . '/samples/section.php');
    $s->p('Congratulation! We have successfully created our first documentation project, page and section, you can now keep adding more sections, and even functions, methods and blocks or create new pages, and even new projects.');
});