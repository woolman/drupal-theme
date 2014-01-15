<?php
/**
 * @file views-view-table.tpl.php
 * Choose a student project at random to display
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

<div class="block-student-project">
<?php $row = $rows[array_rand($rows)]; ?>
       <?php foreach ($row as $field => $content): ?>
          <?php if ($fields[$field] == 'field-inline-images-fid') continue; ?>
          <div class="views-field views-field-<?php print $fields[$field]; ?>">
          <?php if($content) print $content;
          elseif($fields[$field] == 'field-documentary-embed')
            print $row['field_inline_images_fid'];
          ?>
          </div>
        <?php endforeach; ?>
      </div>
