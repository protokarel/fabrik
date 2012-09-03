<?php
/*
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @since		1.6
* @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
* @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// No direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHTML::stylesheet('administrator/components/com_fabrik/views/fabrikadmin.css');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

JHtml::script('media/com_fabrik/js/mootools-ext.js');
$fbConfig = JComponentHelper::getParams('com_fabrik');

$document = JFactory::getDocument();

$srcs = FabrikHelperHTML::framework();
$srcs[] = 'administrator/components/com_fabrik/views/namespace.js';
$srcs[] = 'administrator/components/com_fabrik/views/pluginmanager.js';

FabrikHelperHTML::script($srcs, $this->js);
?>

<script type="text/javascript">

	Joomla.submitbutton = function(task) {
		if (task !== 'form.cancel'  && !controller.canSaveForm()) {
			alert('Please wait - still loading');
			return false;
		}
		if (task == 'form.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {

			Joomla.submitform(task, document.getElementById('adminForm'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php JRoute::_('index.php?option=com_fabrik'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<ul class="nav nav-tabs">
			<li class="active">
		    	<a data-toggle="tab" href="#tab-details">
		    		<?php echo JText::_('COM_FABRIK_DETAILS'); ?>
		    	</a>
		    </li>
		    <li>
		    	<a data-toggle="tab" href="#tab-process">
		    		<?php echo JText::_('COM_FABRIK_FORM_PROCESSING'); ?>
		    	</a>
		    </li>
		    <li>
		    	<a data-toggle="tab" href="#tab-publishing">
		    		<?php echo JText::_('COM_FABRIK_GROUP_LABEL_PUBLISHING_DETAILS')?>
		    	</a>
		    </li>
		    <li>
		    	<a data-toggle="tab" href="#tab-groups">
		    		<?php echo JText::_('COM_FABRIK_GROUPS')?>
		    	</a>
		    </li>
		    <li>
		    	<a data-toggle="tab" href="#tab-layout">
		    		<?php echo JText::_('COM_FABRIK_LAYOUT')?>
		    	</a>
		    </li>
		    <li>
		    	<a data-toggle="tab" href="#tab-options">
		    		<?php echo JText::_('COM_FABRIK_OPTIONS')?>
		    	</a>
		    </li>
		    <li>
		    	<a data-toggle="tab" href="#tab-plugins">
		    		<?php echo JText::_('COM_FABRIK_PLUGINS')?>
		    	</a>
		    </li>
		</ul>
	</div>
	<div class="tab-content">
		<?php
		echo $this->loadTemplate('bootstrap_details');
		echo $this->loadTemplate('bootstrap_process');
		echo $this->loadTemplate('bootstrap_publishing');
		echo $this->loadTemplate('bootstrap_groups');
		echo $this->loadTemplate('bootstrap_templates');
		echo $this->loadTemplate('bootstrap_options');
		echo $this->loadTemplate('bootstrap_plugins');
		?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
