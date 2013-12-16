<?php



defined( '_JEXEC' ) or die( 'Restricted access' );?>
<?php

require_once dirname(__FILE__).'/helper.php';

$art_title=ModArticlesHelper::getTitles($params);






require JModuleHelper::getLayoutPath('mod_articles_title', $params->get('layout', 'default'));
?>
