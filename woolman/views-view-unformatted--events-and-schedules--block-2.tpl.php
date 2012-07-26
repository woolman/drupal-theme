<?php
// $Id: views-view-unformatted.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="app-date first-date">
	<h4>Next application deadline:</h4>
	<?php print $rows[0]?>
</div>

<?php if ($rows[1]): ?>
	<div class="app-date second-date">
		<h4>Following Deadline:</h4>
		<?php print $rows[1]?>
	</div>
<?php endif; ?>