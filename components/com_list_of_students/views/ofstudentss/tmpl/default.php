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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_LIST_OF_STUDENTS_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-ofstudents-delete-' + item_id).submit();
        }
    }
</script>
<div class="items">

    <ol class="items_list">


        <?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_list_of_students.ofstudents.'.$item->id))):
						$show = true;
						?>
							<li> <a href="<?php echo JRoute::_('index.php?option=com_list_of_students&view=ofstudents&id=' . (int)$item->id); ?>"><?php echo $item->surename,'&nbsp', $item->firstname,'&nbsp', $item->lastname ; ?></a>
								<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_list_of_students.ofstudents.'.$item->id)):
									?>
										<a href="javascript:document.getElementById('form-ofstudents-state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_LIST_OF_STUDENTS_UNPUBLISH_ITEM"); else: echo JText::_("COM_LIST_OF_STUDENTS_PUBLISH_ITEM"); endif; ?></a>
										<form id="form-ofstudents-state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_list_of_students&task=ofstudents.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[surename]" value="<?php echo $item->surename; ?>" />
											<input type="hidden" name="jform[firstname]" value="<?php echo $item->firstname; ?>" />
											<input type="hidden" name="jform[lastname]" value="<?php echo $item->lastname; ?>" />
											<input type="hidden" name="jform[info]" value="<?php echo $item->info; ?>" />
											<input type="hidden" name="jform[year]" value="<?php echo $item->year; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[phone]" value="<?php echo $item->phone; ?>" />
											<input type="hidden" name="jform[sex]" value="<?php echo $item->sex; ?>" />
											<input type="hidden" name="jform[gradebook]" value="<?php echo $item->gradebook; ?>" />
											<input type="hidden" name="option" value="com_list_of_students" />
											<input type="hidden" name="task" value="ofstudents.save" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_list_of_students.ofstudents.'.$item->id)):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_LIST_OF_STUDENTS_DELETE_ITEM"); ?></a>
										<form id="form-ofstudents-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_list_of_students&task=ofstudents.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo $item->state; ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[created_by]" value="<?php echo $item->created_by; ?>" />
											<input type="hidden" name="jform[surename]" value="<?php echo $item->surename; ?>" />
											<input type="hidden" name="jform[firstname]" value="<?php echo $item->firstname; ?>" />
											<input type="hidden" name="jform[lastname]" value="<?php echo $item->lastname; ?>" />
											<input type="hidden" name="jform[info]" value="<?php echo $item->info; ?>" />
											<input type="hidden" name="jform[year]" value="<?php echo $item->year; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[phone]" value="<?php echo $item->phone; ?>" />
											<input type="hidden" name="jform[sex]" value="<?php echo $item->sex; ?>" />
											<input type="hidden" name="jform[gradebook]" value="<?php echo $item->gradebook; ?>" />
											<input type="hidden" name="option" value="com_list_of_students" />
											<input type="hidden" name="task" value="ofstudents.remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
							</li>
						<?php endif; ?>

<?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_LIST_OF_STUDENTS_NO_ITEMS');
        endif;
        ?>
    </ol>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_list_of_students')): ?><a href="<?php echo JRoute::_('index.php?option=com_list_of_students&task=ofstudents.edit&id=0'); ?>"><?php echo JText::_("COM_LIST_OF_STUDENTS_ADD_ITEM"); ?></a>
	<?php endif; ?>