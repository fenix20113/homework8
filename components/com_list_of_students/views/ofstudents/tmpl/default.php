<?php
/**
 * @version     1.0.0
 * @package     com_list_of_students
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuri <y-palii@mail.ru> - http://
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_list_of_students', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_list_of_students.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_list_of_students' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}


$document = JFactory::getDocument();
$document->addStyleSheet('administrator/components/com_list_of_students/assets/css/list_of_students.css');


?>

<?php if ($this->item) : ?>

    <div class="item_fields">

        <div id="names">
            <ul>
            <li class="a"> <?php echo $this->item->surename; ?></li>
            <li class="b"><?php echo $this->item->firstname; ?></li>
            <li class="c"><?php echo $this->item->lastname; ?></li>

            </ul>

        </div>


        <img src="<?php echo $this->item->photo; ?>" alt="photo">
      <ul class="fields_list">


			<li><?php echo JText::_('COM_LIST_OF_STUDENTS_FORM_LBL_OFSTUDENTS_YEAR'); ?>:
			<?php echo $this->item->year; ?></li>
           	<li><?php echo JText::_('COM_LIST_OF_STUDENTS_FORM_LBL_OFSTUDENTS_GROUP'); ?>:
			<?php echo $this->item->group; ?></li>
			<li><?php echo JText::_('COM_LIST_OF_STUDENTS_FORM_LBL_OFSTUDENTS_PHONE'); ?>:
			<?php echo $this->item->phone; ?></li>
			<li><?php echo JText::_('COM_LIST_OF_STUDENTS_FORM_LBL_OFSTUDENTS_SEX'); ?>:
      		<?php

            if ($this->item->sex==famale) {

                echo JText::_('COM_LIST_OF_STUDENTS_OFSTUDENTSS_SEX_FAMALE');

            }else {
                echo JText::_("COM_LIST_OF_STUDENTS_OFSTUDENTSS_SEX_MALE");
            }

            ?></li>
			<li><?php echo JText::_('COM_LIST_OF_STUDENTS_FORM_LBL_OFSTUDENTS_GRADEBOOK'); ?>:
			<?php echo $this->item->gradebook; ?></li>
            <li id="info"><?php echo JText::_('COM_LIST_OF_STUDENTS_FORM_LBL_OFSTUDENTS_INFO'); ?>:
              <?php echo $this->item->info; ?></li>

        </ul>

    </div>
    <?php if($canEdit): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_list_of_students&task=ofstudents.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_LIST_OF_STUDENTS_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_list_of_students.ofstudents.'.$this->item->id)):
								?>
									<a href="javascript:document.getElementById('form-ofstudents-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_LIST_OF_STUDENTS_DELETE_ITEM"); ?></a>
									<form id="form-ofstudents-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_list_of_students&task=ofstudents.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
										<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
										<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
										<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
										<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
										<input type="hidden" name="jform[surename]" value="<?php echo $this->item->surename; ?>" />
										<input type="hidden" name="jform[firstname]" value="<?php echo $this->item->firstname; ?>" />
										<input type="hidden" name="jform[lastname]" value="<?php echo $this->item->lastname; ?>" />
										<input type="hidden" name="jform[info]" value="<?php echo $this->item->info; ?>" />
										<input type="hidden" name="jform[year]" value="<?php echo $this->item->year; ?>" />
										<input type="hidden" name="jform[photo]" value="<?php echo $this->item->photo; ?>" />
										<input type="hidden" name="jform[group]" value="<?php echo $this->item->group; ?>" />
										<input type="hidden" name="jform[phone]" value="<?php echo $this->item->phone; ?>" />
										<input type="hidden" name="jform[sex]" value="<?php echo $this->item->sex; ?>" />
										<input type="hidden" name="jform[gradebook]" value="<?php echo $this->item->gradebook; ?>" />
										<input type="hidden" name="option" value="com_list_of_students" />
										<input type="hidden" name="task" value="ofstudents.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_LIST_OF_STUDENTS_ITEM_NOT_LOADED');
endif;
?>
