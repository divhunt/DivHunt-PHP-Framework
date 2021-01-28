// Default regions ['eu']
DivHunt::class('qb')->from('divhunt/packages/classes');

// Construct class with more regions ['eu', 'us']
DivHunt::class('qb', ['eu', 'us'])->from('divhunt/packages/classes');