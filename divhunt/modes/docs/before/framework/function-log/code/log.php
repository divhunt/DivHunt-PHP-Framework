// Error
DivHunt::log('I am fatal, and I will close all modes, stop script and display error!')->type('fatal')->log();

// Error
DivHunt::log('I am error, and I will stop script and enter develop mode if possible!')->log();

// Warning
DivHunt::log('I am warning, and I will not stop script!')->type('warning')->log();

// Log warning and show on page
DivHunt::log('I am log that will be displayed on page!')->show(true)->type('warning')->log();

// Scheme & Log to file
DivHunt::log('I am log with additional informations!')->scheme('ip,time,uri,bt1')->file('logs')->log();