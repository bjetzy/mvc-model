<article class="hreview open special">
	<div id="profileAlign">
		<img class="profilePicture" src="/images/pb.jpg" alt="Profilbild">
	</div>
	<a href="/blog/logout" class="centered"><p>Abmelden</p></a>
	<div id="profileUsername">
		<p> Benutzername: <?= $user->username; ?></p>
	</div>

		<p class="centered"> Ihre Posts:</p>
</div>
	<?php if (empty($blogs)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine Blogs gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($blogs as $blog):?>
			<div id="blogPageContent">
			  <div class="blogBox">
			    <div class="wrapper">
			      <div class="profilewrapper">
			        <div >
			        <img class="blogProfilePicture" src="<?= $user->profilePicturePath ?>" alt="Profilbild">
			        </div> <!--/*UserPicture*/-->
			        <div>
			       <p id="blogUsername"><?= $user->username; ?></p><!--Username*/-->
			     </div>
			      </div>
			      <div>
			        <p id="blogTitle"><?= $blog->blogTitle; ?></p><!--/*title*/-->
			      </div>
			    </div>

			    <div id="blogContent">
			      <img class="blogImage"src="<?= $blog->blogPicturePath ?>" alt="Bild"> <!--/*BlogPicture*/-->
			      <p id="blogText"><?= $blog->blogText; ?></p><!--/*BlogText*/-->
			    </div>
			  </div>
			</div>
			<div class="whitespace">
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</article>
