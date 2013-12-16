<?php
/**
 * @version     1.0.0
 * @package     com_list_of_students
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuri <y-palii@mail.ru> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Ofstudents controller class.
 */
class List_of_studentsControllerOfstudents extends JControllerForm
{

    function __construct() {
        $this->view_list = 'ofstudentss';
        parent::__construct();
    }

}