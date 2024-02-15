<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheets/style.css" type="text/css">
	<title>Tattoo</title>
</head>
<?php
include 'inc/nav.php';
include 'inc/footer.php';
?>

<body>
	<div class="container">
		<div class="head">
			<h1 class="contacthead">contact us</h1>
		</div>
		<div class="shortHead">
			<h4>We'd love to hear from you!</h4>
		</div>
		<div class="flex">
			<div class="input-container">

			<form action="/action_page.php" class="contact">
  				<input type="text" class="name" name="name" placeholder="Name">
  				<input type="text" class="email" name="email" placeholder="Email">
				<input type="text" class="phone" name="phone" placeholder="Phone Number">
				<input type="text" class="message" name="message" placeholder="Message">
  				<button type="submit" class="submitBtn" name="submitbtn">Send Message</button>
			</form> 
				
			</div>

			<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2699.273808110028!2d15.007017077416187!3d47.426104100422954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4771e794ea272665%3A0x7cdca65f165af993!2sHauptstra%C3%9Fe%2060%2C%208793%20Trofaiach!5e0!3m2!1sde!2sat!4v1706613719138!5m2!1sde!2sat" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

		</div>
	</div>
	</div>

</body>

<?php
	include 'inc/footer.php';
?>

</html>