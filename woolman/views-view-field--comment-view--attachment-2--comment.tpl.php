<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */
?>
<?php 
	if (strlen($output) < 100) {
		print $output;
	}
	else {
		if (strlen($output) > 320)
			$output = substr($output, 0, 300).'...';
		$trimmed = substr($output, 0, 80);
		if (preg_match("/(.*)\b.+/us", $trimmed, $matches))
      $trimmed = $matches[1];
		print '<span title="'.$output.'">'.rtrim($trimmed).'</span><a href ="'.url('node/'.$row->node_comments_nid).'" title ="read more..." style="font-weight:bold">...</a>';
	}

?>