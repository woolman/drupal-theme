<?php
// $Id: views-view-table.tpl.php,v 1.8 2009/01/28 00:43:43 merlinofchaos Exp $
/**
 * This template includes logic to print EITHER the video thumbnail OR the image thumbnail
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
<table class="<?php print $class; ?>">
  <?php if (!empty($title)) : ?>
    <caption><?php print $title; ?></caption>
  <?php endif; ?>
  <thead>
    <tr>
      <?php foreach ($header as $field => $label): ?>
				<?php if ($fields[$field] == 'field-project-image-fid') continue; ?>
        <th class="views-field views-field-<?php print $fields[$field]; ?>">
          <?php print $label; ?>
        </th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $count => $row): ?>
    
      <tr class="<?php print implode(' ', $row_classes[$count]); ?>">
      
        <?php foreach ($row as $field => $content): ?>
        
					<?php if ($fields[$field] == 'field-project-image-fid') continue; ?>
          <td class="views-field views-field-<?php print $fields[$field]; ?>">

            <?php if($content) print $content;
									 elseif($fields[$field] == 'field-documentary-embed')
											print $row['field_project_image_fid'];
							?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
