include block::name('heading')->title('Welcome')->bg('red')->color('white')->load();

// heading/block.php file
echo $_block->get('title'); 
echo $_block->get('bg');
echo $_block->get('color');

// Also it is possible to get path, name and more info.
echo $_block->getPath();
echo $_block->getName();
