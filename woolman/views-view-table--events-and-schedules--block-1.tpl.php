<?php
// $Id: views-view-table.tpl.php,v 1.8 2009/01/28 00:43:43 merlinofchaos Exp $
/**
 * @file views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $class: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * @ingroup views_templates
 */
?>

  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  
    <?php foreach ($rows as $count => $row): ?>
    
	    <?php
				    if ($row['field_event_type_value'])
					    $row_classes[$count][] = strtolower(str_replace(' ', '-', $row['field_event_type_value']));
					    
				    if ($row['type'] == 'Semester Calendar'||$row['type']=="Admissions Outreach Trip")
					    $row_classes[$count][] = 'woolman-semester';
	    
				    $row_classes[$count][] = strtolower(str_replace(' ', '-', $row['type']));
				    ?>
    
      <div class="<?php print implode(' ', $row_classes[$count]); ?>">

	    <div class="event-name">
		  <?php
		  if ($row['type']=="CiviCRM Event" && ($row['field_event_type_value'] == 'Sierra Friends Camp' || $row['field_event_type_value'] == 'Teen Leadership Camp') )
				print l($row['title'],'~camp'); 
		  
		  elseif ($row['type']=="CiviCRM Event"||$row['type']=="Event"||$row['type']=="Admissions Outreach Trip")
			  print str_replace('view</a>', $row['title'].'</a>', $row['view_node']);

		  elseif ($row['type']=="Semester Calendar")
				print l($row['title'],'~semester');
			?>
	    </div> 
	    <div class="event-type">
		  <?php if ($row['type']=="CiviCRM Event"||$row['type']=="Event"){
			  print $row['field_event_type_value'];	  
		  }
		  elseif ($row['type']=="Semester Calendar"){
			  print 'The Woolman Semester';
		  }
		  elseif ($row['type']=="Admissions Outreach Trip"){
			  print 'Woolman Semester Outreach';
		  } ?>
	    </div>
	    <div class="date">
		  <?php print $row['field_event_date_value']; ?>
	    </div> 
			
			<?php if (!in_array('views-row-last', $row_classes[$count]) ) : ?>
				<div class="separator">
					<img src="/sites/all/themes/woolman/images/sidebar-separator.png" alt="--" />
				</div>
			<?php endif; ?>

</div>        
        <?php endforeach; ?>

  