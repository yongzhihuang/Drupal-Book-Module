<?
/*page.tpl.php provides the overall page layout for the site, other
template files are inserted into page.tpl.php, for instance, the left sidebar are from block.tpl.php the content area is node.tpl.php

$content - contained the ouput of the node.tpl.php calls
$left - contained the output from the block.tpl.php

?>


<html>
<head>
<title><?php print $head_title ?></title>
	<?php print $styles ?>
	<? //Style needs to be used to include all styles from other enabled modules.  You must change your css style sheet's name to style.css so it will look for this automatically. Drupal also apply its CSS preprocess engine to remove all line breaks and spaces from CSS files. Drupal also adds ?f to the end of the sylesheet for cache control.
	// The following is the output from using $styles
	/*
	<head>
<title>Example | Drupal 6</title>
<link type="text/css" rel="stylesheet" media="all"
href="modules/node/node.css?f" />
<link type="text/css" rel="stylesheet" media="all"
href="modules/system/defaults.css?f" />
<link type="text/css" rel="stylesheet" media="all"
href="modules/system/system.css?f" />
<link type="text/css" rel="stylesheet" media="all"
href="modules/system/system-menus.css?f" />
<link type="text/css" rel="stylesheet" media="all"
href="modules/user/user.css?f" />
<link type="text/css" rel="stylesheet" media="all"
href="sites/all/themes/greyscale/style.css?f" />
</head>


You should be able to discern from the preceding list that the theme() function is very
important to Drupal. It is in charge of running preprocessing functions to set variables that
will be used in templates and dispatching a theme call to the correct function or finding
the appropriate template file. The result is HTML. The process is shown graphically in
Figure 8-5. We will take an in-depth look at how this function works later. Right now, it is
enough to understand that when Drupal wants to turn a node into HTML, theme('node')
is called. Depending on which theme is enabled, the theme_node() function will generate
the HTML or a template file named node.tpl.php will do it.
This process can be overridden at many levels. For example, themes can override builtin
theme functions, so when theme('node') is called a function called greyscale_node() might
handle it instead of theme_node(). Template files have naming conventions that we’ll explore
later too, so that a node-story.tpl.php template file would target only nodes of type Story.


*/ ?>
</head>

<body>
<div id="container">
<div id="header">
<h1><?php print $site_name ?></h1>
<?php print $header ?>
</div>

<?php if ($left): ?>
<div id="left">
	<?php print $left ?>
</div>
<?php endif; ?>

<div id="main">
	<?php print $breadcrumb ?>
<h2><?php print $title ?></h2>
<?php print $content ?>
</div>

<div id="footer">
	<?php print $footer_message ?>
	<?php print $footer ?>
</div>
</div>
<?php print $closure ?>
</body>
</html>