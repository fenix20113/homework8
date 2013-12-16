<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
header('Content-Type: application/rss+xml');


echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
    <channel>
        <title>List of Students</title>
        <link>http://joomla.home/</link>
        <description>List of students</description>';
foreach ($this->db as $row) {

       ?>
        <item>
            <title><?php echo $row['surename']." ".$row['firstname']." ".$row['lastname'];?>></title>
            <link>http://joomla.home/index.php/component/list_of_students/<?php echo $row['id']?>?view=ofstudents</link>
            <description><![CDATA[<img src="http://joomla.home/<?php echo $row['photo'];?>" width="50" height="70" border="0" alt="info" align="left" /><?php echo substr($row['info'],0,200)."..." ; ?>]]>
            </description>
            </item>

       <?php   }
   echo '</channel>
</rss>';
?>