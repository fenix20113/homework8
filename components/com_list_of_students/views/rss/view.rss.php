<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component

 */





class List_of_studentsViewRss extends JViewLegacy
{



    // Overwriting JView display method
    function display($tpl = null)
    {
        $this->db = $this->get('Db');
        // Display the view
        parent::display($tpl);
    }
}