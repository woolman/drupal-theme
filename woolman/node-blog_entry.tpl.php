
<div id="blog-date-tags">
    <span class="field-item"><?php print $node->field_journal_date[0]['view'] ?></span>
      <?php print views_embed_view('blog','attachment_1',$node->nid); ?>
</div>

<div id="blog-author" class="field">
  

      <div class="field-item"><em>by <?php print $node->field_journal_author[0]['view'] ?></em></div>

</div>

<div class="field field-type-filefield imagefield-field_journal_image">
      <div class="field-item"><?php print $node->field_journal_image[0]['view'] ?></div>
</div>

<div class="field field-type-text field-field-journal-entry">
      <div class="field-item"><?php print $node->content['body']['#value'] ?></div>
</div>

