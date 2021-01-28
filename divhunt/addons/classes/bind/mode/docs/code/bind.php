// Initiate class
DivHunt::class('bind')->from(DivHunt::getClassesPath());

// Initiate class with more supported TDLs
DivHunt::class('bind', ['net', 'org', 'club', 'ai', 'etc'])->from(DivHunt::getClassesPath());
