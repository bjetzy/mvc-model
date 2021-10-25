<?php if (isset($_SESSION["id"])): ?>
	<div class="whitespace">
	</div>
	<?php foreach ($blogs as $blog):?>
		<div id="blogPageContent">
			<div class="blogBox">
				<div class="wrapper">
					<div class="profilewrapper">
						<div >
						<img class="blogProfilePicture" src="<?= $blog->profilePicturePath?>" alt="Profilbild">
						</div> <!--/*UserPicture*/-->
						<div>
					 <p id="blogUsername"><?= $blog->username ?></p><!--Username*/-->
				 </div>
					</div>
					<div>
						<p id="blogTitle"><?= $blog->blogTitle; ?></p><!--/*title*/-->
					</div>
				</div>

				<div id="blogContent">
					<img class="blogImage"src="<?= $blog->blogPicturePath; ?>" alt="Bild"> <!--/*BlogPicture*/-->
					<p id="blogText"><?= $blog->blogText; ?></p><!--/*BlogText*/-->
				</div>
			</div>
		</div>
		<div class="whitespace">
		</div>
	<?php endforeach; ?>
<?php endif; ?>
