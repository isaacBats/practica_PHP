<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog in PHP</title>
</head>
<body>
	<ul>
		<?php /** @type \PlatziPHP\Post[] $posts */ 
		foreach ($posts as $post): ?>
		<li>
			<h2><?= $post->getTitle() ?>
				<small><?= $post->getAuthor() ?></small>
			</h2>
			<?php if ($post == $firstPost): ?>
			<p><?=  $post->getBody()  ?></p>
			<?php else: ?>
			<p>Summary...</p>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
</body>
</html>