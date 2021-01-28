// On framework end
DivHunt::trigger('shutdown_after', ['any'], function()
{
    echo DivHunt::getTimingEnd(); // Show total time needed to execute script on end.
});

// Only if headers are sent, display message on framework end
DivHunt::trigger('shutdown_headers_sent_after', ['any'], function()
{
    echo '<h1>Powered by DivHunt</h1>';
});