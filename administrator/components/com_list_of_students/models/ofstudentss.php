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
class List_of_studentsModelofstudentss extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                                'id', 'a.id',
                'ordering', 'a.ordering',
                'state', 'a.state',
                'created_by', 'a.created_by',
                'surename', 'a.surename',
                'firstname', 'a.firstname',
                'lastname', 'a.lastname',
                'info', 'a.info',
                'photo', 'a.photo',
                'group', 'a.group',
                'phone', 'a.phone',
                'sex', 'a.sex',
                'gradebook', 'a.gradebook',

            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     */
    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        $this->setState('filter.state', $published);

        
		//Filtering year
		$this->setState('filter.year.from', $app->getUserStateFromRequest($this->context.'.filter.year.from', 'filter_from_year', '', 'string'));
		$this->setState('filter.year.to', $app->getUserStateFromRequest($this->context.'.filter.year.to', 'filter_to_year', '', 'string'));

		//Filtering sex
		$this->setState('filter.sex', $app->getUserStateFromRequest($this->context.'.filter.sex', 'filter_sex', '', 'string'));


        // Load the parameters.
        $params = JComponentHelper::getParams('com_list_of_students');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.surename', 'asc');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     * @return	string		A store id.
     * @since	1.6
     */
    protected function getStoreId($id = '') {
        // Compile the store id.
        $id.= ':' . $this->getState('filter.search');
        $id.= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'a.*'
                )
        );
        $query->from('`#__list_of_students_` AS a');

        
    // Join over the users for the checked out user.
    $query->select('uc.name AS editor');
    $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
    
		// Join over the user field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

        
    // Filter by published state
    $published = $this->getState('filter.state');
    if (is_numeric($published)) {
        $query->where('a.state = '.(int) $published);
    } else if ($published === '') {
        $query->where('(a.state IN (0, 1))');
    }
    

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.surename LIKE '.$search.'  OR  a.firstname LIKE '.$search.'  OR  a.lastname LIKE '.$search.'  OR  a.info LIKE '.$search.' OR  a.group LIKE '.$search.'  OR  a.phone LIKE '.$search.'  OR  a.sex LIKE '.$search.'  OR  a.gradebook LIKE '.$search.' )');
            }
        }

        

		//Filtering year
		$filter_year_from = $this->state->get("filter.year.from");
		if ($filter_year_from) {
			$query->where("a.year >= '".$db->escape($filter_year_from)."'");
		}
		$filter_year_to = $this->state->get("filter.year.to");
		if ($filter_year_to) {
			$query->where("a.year <= '".$db->escape($filter_year_to)."'");
		}

		//Filtering sex
		$filter_sex = $this->state->get("filter.sex");
		if ($filter_sex != '') {
			$query->where("a.sex = '".$db->escape($filter_sex)."'");
		}


        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }

    public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }

}
