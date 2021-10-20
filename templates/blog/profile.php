<article class="hreview open special">
	<?php if (empty($blogs)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine Blogs gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($blogs as $blog): ?>
      <?php if ($blog->User_Id == 0): ?>
			<div id="blogPageContent">
			  <div class="blogBox">
			    <div class="wrapper">
			      <div class="profilewrapper">
			        <div >
			        <img class="blogProfilePicture"src="<?= $blog->blogProfilePicture; ?>" alt="Profilbild">
			        </div> <!--/*UserPicture*/-->
			        <div>
			       <p id="blogUsername"><?= $blog->blogUsername; ?></p><!--Username*/-->
			     </div>
			      </div>
			      <div>
			        <p id="blogTitle"><?= $blog->blogTitle; ?></p><!--/*title*/-->
			      </div>
			    </div>

			    <div id="blogContent">
			      <img class="blogImage"src="<?= $blog->blogImage; ?>" alt="Bild"> <!--/*BlogPicture*/-->
			      <p id="blogText"><?= $blog->blogText; ?></p><!--/*BlogText*/-->
			    </div>

			  </div>
			</div>
      <?php else: ?>
      <?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</article>
