<?php
// $Id: views-view-unformatted.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file: theme override for blog view block
 * 
 * Choose an article at random to display
 * 
 * @see views-view-unformatted.tpl.php
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<?php print $rows[array_rand($rows)]; ?>
