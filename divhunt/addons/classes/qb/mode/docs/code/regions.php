// Set region to use
qb::setRegion('eu');

// If there are more regions, suggestion to detect region by user IP?
$user_region = getUserRegionByIP() // Function that returns region, *not-exist, just example

qb::setRegion($region); // Will return false if region does not exist.