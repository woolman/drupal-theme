<?php
// $Id: page.tpl.php,v 1.14.2.10 2009/11/05 14:26:26 johnalbin Exp $
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title>Site Offline | Woolman.org</title>

	<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/woolman/css/html-elements.css" />
	<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/woolman/css/offline.css" />


</head>
<body class="<?php print $body_classes; ?>">

  <div id="page"><div id="page-inner">

	<div id="top-links">
		<span>The Woolman Semester</span>|<span>Sierra Friends Camp</span>|<span>Family Work Camp</span>|<span>Woolman Intensives</span>|<span>Retreats &amp; Workshops</span>
	</div>

    <div id="header"><div id="header-inner" class="clear-block">



        <div id="header-blocks" class="region region-header">
						
						
						
        </div> <!-- /#header-blocks -->
      

    </div><!--/#header-inner-->
		

		
		</div> <!--/#header -->

    <div id="main"><div id="main-inner" class="clear-block">

      <div id="content"><div id="content-inner">
      
      
      <?php if ($breadcrumb || $messages): ?>
		      <div id="breadcrumb-message">
            <?php print $messages; ?>
						<?php print $breadcrumb; ?>
					</div>
					<?php endif; ?>

        <?php if ($title || $tabs): ?>
          <div id="content-header">

            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>
            
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            
          </div> <!-- /#content-header -->
        <?php endif; ?>
        
				<?php if ($content_top): ?>
          <div id="content-top" class="region region-content_top">
            <?php print $content_top; ?>
          </div> <!-- /#content-top -->
        <?php endif; ?>

				<?php print $help; ?>

				<div>
				<p>Thanks for visiting Woolman.org. We apologize that our site is temporarily unavailable due to technical problems. We should be back up in a few minutes, so please try again later.</p>
				<hr>
				<p>Woolman is a nonprofit educational community dedicated to the principles of peace, justice and sustainability. Originally founded in 1963 as a Quaker high school, today Woolman offers educational programs for teens, retreats for adults, and summer camps for children and families.</p>
				</div>

        <div id="content-area">
          <?php print $content; ?>
        </div>

      </div></div> <!-- /#content-inner, /#content -->

 

    </div></div> <!-- /#main-inner, /#main -->


      <div id="footer"><div id="footer-inner" class="region region-footer">

        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>

        <div class="block">
    <span>13075 Woolman Ln, Nevada City, CA 95959</span>|
<span>530.273.3183</span></div>

      </div></div> <!-- /#footer-inner, /#footer -->


  </div></div> <!-- /#page-inner, /#page -->

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>

  <?php print $closure; ?>

</body>
</html>
