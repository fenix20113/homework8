<?php

/**
 * @version     1.0.0
 * @package     com_list_of_students
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuri <y-palii@mail.ru> - http://
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of List_of_students records.
 */
class List_of_studentsModelRss extends JModelList {


    function getDb() {
        // Create a new query object.
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select($db->quoteName(array("surename","info","id","firstname","lastname","photo")));
        $query->from($db->quoteName('#__list_of_students_'));
        $query->order("ordering ASC");
        $db->setQuery($query);
        $result=$db->loadAssocList();
        return (array) $result;
           }
}
