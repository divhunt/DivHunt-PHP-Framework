DivHunt::class('block')->from('packages');

include block::use('heading')->title('Lets not repeat code?')->load();
include block::use('heading')->title('I have not repeated it!')->load();

// Or using callback function
include block::use('heading', function($block)
{
    $block->title('Lets not repeat code?');
});

// Check if block is loaded
if(DivHunt::loadExist('block', 'heading'))
{
    echo 'Loaded';
}