<?php

require_once('navmenu.inc.php');
$server = $_SERVER['SERVER_NAME'];
$path = "<%= lessonPath %>";

//Get the page requested. 
$page = $_REQUEST['page'];
$tab = $_REQUEST['tab'];
$type = $_REQUEST['type'];

if($page == null)
{
	$page = "1-0-0";
}
if($tab == null)
{
	$tab = "1";
}
if($type == null)
{
	$type = "flash";
}

if($type == "flash")
{
	$typeBoolean = "false";
} else {
	$typeBoolean = "true";
}

$navmenu = new Navmenu($server, $path, $tab, $type );
$page = $navmenu->checkPage($page);

$templateTitle = $navmenu->getTitle();
$pageTitle = $navmenu->getPageTitle($page);
$tabMenu = $navmenu->getTabMenu($tab);
$templateMenu = $navmenu->getMenu($page);
$templateContent = $navmenu->getContent($page);
$typeLink = $navmenu->getTypeToggleLink($page);
$printLink = $navmenu->getPrintLink($tab);
$titleTag = $navmenu->getTabTitle();
$pageTemplate = addSlashes( file_get_contents('pageTemplate.php'));
$pageOutput = "";


eval("\$pageOutput = \"$pageTemplate\";");
echo $pageOutput;
?>