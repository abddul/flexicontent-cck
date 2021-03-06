<?php
$form_style = JRequest::getCmd('print') ? 'display:none' : '';
ob_start();

// Body of form for (a) Text search, Field Filters, Alpha-Index, Items Total Statistics, Selectors(e.g. per page, orderby)
// If customizing via CSS rules or JS scripts is not enough, then please copy the following file here to customize the HTML too
include(JPATH_SITE.DS.'components'.DS.'com_flexicontent'.DS.'tmpl_common'.DS.'listings_filter_form_body_html5.php');

$filter_form_body = trim(ob_get_contents());
ob_end_clean();
if ( empty($filter_form_body) ) return;
?>

<form action="<?php echo $this->action; ?>" method="post" id="adminForm" onsubmit="" class="group" style="<?php echo $form_style;?>">

<?php echo $filter_form_body; ?>

<?php if ( JRequest::getVar('clayout') == $this->params->get('clayout', 'blog') ) :?>
	<input type="hidden" name="clayout" value="<?php echo JRequest::getVar('clayout'); ?>" />
<?php endif; ?>

	<input type="hidden" name="option" value="com_flexicontent" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['filter_order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['filter_order_Dir']; ?>" />
	<input type="hidden" name="view" value="category" />
	<input type="hidden" name="letter" value="<?php echo JRequest::getVar('letter');?>" id="alpha_index" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="cid" value="<?php echo $this->category->id; ?>" />
	<input type="hidden" name="layout" value="<?php echo JRequest::getCmd('layout',''); ?>" />
</form>