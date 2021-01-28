// Initiate query (if databases are added). This will hit master by default
qb::query('START TRANSACTION');

// Hit slave
qb::query('SELECT * FROM ...', 'slave');
