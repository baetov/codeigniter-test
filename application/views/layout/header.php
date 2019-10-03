<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="navbar navbar-light bg-light">
	<div class="container">
		<h3>Publications</h3>
		<div>
			<?php if ($this->ion_auth->is_admin()){?>
			<a href="/" class="btn btn-danger">админка</a>
			<?php }?>
				<a href="<?php echo base_url('/auth/logout')?>" class="btn btn-light">выйти</a>
		</div>
	</div>
</div>
<div class="container">

