<!DOCTYPE html>
    <html lang="en">
        <head>
            <?php if($title = $_block->get('title')) { ?>
                <title><?=$title?></title>
                <meta name="apple-mobile-web-app-title" content="<?=$title?>">
                <meta property="og:title" content="<?=$title?>" />
            <?php } ?>

            <?php if($description = $_block->get('description')) { ?>
                <meta name="description" content="<?=$description?>">
                <meta property="og:description" content="<?=$description?>" />
            <?php } ?>

            <?php if($name = $_block->get('name')) { ?>
                <meta name="application-name" content="<?=$name?>">
                <meta property="og:site_name" content="<?=$name?>" />
            <?php } ?>
            
            <?php if($_block->get('noindex')) { ?> 
                <meta name="robots" content="noindex">
            <?php } ?>

            <?php if($type = $_block->get('type')) { ?> 
                <meta property="og:type" content="<?=$type?>">
            <?php } ?>

            <?php if($url = $_block->get('url')) { ?> 
                <meta property="og:url" content="<?=$url?>" />
            <?php } ?>

            <?php if($updated = $_block->get('updated')) { ?> 
                <meta property="og:updated_time" content="<?=$updated?>" />
            <?php } ?>

            <?php if($image = $_block->get('image')) { ?>
                <meta property="og:image" content="<?=$image[0] ?? false?>" />
                <meta property="og:image:width"  content="<?=$image[1] ?? false?>" />
                <meta property="og:image:height" content="<?=$image[2] ?? false?>" />
            <?php } ?>

            <?php foreach($_block->get('fonts', 'array') as $font) { ?>
                <link href="<?=$font?>" rel="stylesheet">
            <?php } ?>

            <?php foreach($_block->get('favicons', 'array') as $icon) { ?>
                <link rel="icon" type="image/<?=$icon[1] ?? false?>" href="<?=$icon[0] ?? false?>" sizes="<?=$icon[2] ?? false?>x<?=$icon[2] ?? false?>">
            <?php } ?>

            <?php if($icon = $_block->get('apple_icon')) { ?>
                <link rel="apple-touch-icon" type="image/<?=$icon[1] ?? false?>" href="<?=$icon[0] ?? false?>" sizes="<?=$icon[2] ?? false?>x<?=$icon[2] ?? false?>">
            <?php } ?>

            <?php if($icon = $_block->get('shortcut_icon')) { ?>
                <link rel="shortcut_icon" type="image/<?=$icon[1] ?? false?>" href="<?=$icon[0] ?? false?>" sizes="<?=$icon[2] ?? false?>x<?=$icon[2] ?? false?>">
            <?php } ?>

            <?php if($file = $_block->get('file')) { if(file_exists($file)) { ?> 
                <?php include $file?>
            <?php } } ?>

            <?php if($_block->get('fontawesome')) { ?> 
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" />
            <?php } ?>

            <?=load::cssRender(site::get('id'))?>
            <?=load::jsRender(site::get('id'))?>

            <meta charset="utf-8" />
            <meta name="referrer" content="origin">
            <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1.0, user-scalable=no">
            <meta http-equiv="content-language" content="en" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            
            <!--[if lt IE 9]>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"</script>
            <![endif]-->
        </head>

        <body>
            <window></window>
            <main id="body">