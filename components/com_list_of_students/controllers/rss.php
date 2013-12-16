<?php
/**
 * @version     1.0.0
 * @package     com_list_of_students
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuri <y-palii@mail.ru> - http://
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Ofstudentss list controller class.
 */
class List_of_studentsControllerRss extends List_of_studentsController
{

    public function &getModel($name = 'Rss', $prefix = 'List_of_studentsModel')
    {
    $model = parent::getModel($name, $prefix, array('ignore_request' => true));
    return $model;
    }

}