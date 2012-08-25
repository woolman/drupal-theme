<h2><?php print $output; ?></h2>

<?php
// Append edit links
if (user_access('edit any blog_entry content')): ?>
  <ul class="tabs primary">
    <li>
      <a href="<?php print url('node/' . $row->nid) ?>"><span class="tab">View</span></a>
    </li>
    <li>
      <a href="<?php print url('node/' . $row->nid . '/edit') ?>"><span class="tab">Edit</span></a>
    </li>
  </ul>
<?php endif ?>
