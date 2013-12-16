<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>

<?php


class ModArticlesHelper
{
    static  function getTitles($params)
{




    $limit=$params->get('myvalue');
$db=JFactory::getDbo();
$query=$db->getQuery(true);
$query->select($db->quoteName('title'));
$query->from($db->quoteName('#__content'));



    if ($params->get('showall')==0)
    {   $like=$params->get('mycategory');
    $query->where("catid LIKE '$like'" );
    }

$query->order("ordering ASC");
$db->setQuery($query,0,$limit);
$result=$db->loadColumn();
return (array) $result;
}


}


?>