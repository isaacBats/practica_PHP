<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog in PHP</title>
</head>
<body>
	<h1><?php echo $post->getTitle() ?> <small><?php echo $post->getAuthor() ?></small>
	</h1>
	<p><?php echo $post->getBody() ?></p>
</body>
</html>