<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<base href="<?php echo base_url(); ?>" />
	<!-- <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="image/png" sizes="16x16"> -->
	<title><?php echo $page_title; ?></title>

	<?php
	  /* getting this meta data from karyon_config.php file which is under application > config folder */
		foreach ($meta_data as $name => $content)
		{
			if (!empty($content))
				echo "<meta name='$name' content='$content'>";
		}

		/* getting this stylesheets from karyon_config.php file which is under application > config folder */
		foreach ($stylesheets as $media => $files)
		{
			foreach ($files as $file)
			{
				echo "<link href='$file' rel='stylesheet'>";
			}
		}

		/* getting this scripts from karyon_config.php file which is under application > config folder */
		foreach ($scripts['head'] as $file)
		{
			echo "<script src='$file'></script>";
		}
	?>
</head>
