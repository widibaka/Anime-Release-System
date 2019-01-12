<?php

defined('CORE_ACP') or exit;

if (isset($_POST['DBpasswd']))
{
	if ($_POST['DBpasswd'] === $dbpass)
	{
		$sql = 'DROP TABLE releases';

		$about  = '<h1>:: About Our team ::</h1>';
		$about .= '<p>Our team are made up of a group of friends and reversers from around the world. We are here to have fun and make some quality releases.</p>';
		$about .= '<p>You cant contact us and we probably wont contact you. Have fun and keep on learning.</p>';
		$about .= '<p>"Life isnt about waiting for the storms to pass, its about learning how to dance in the rain."</p>';
		$about .= '<p>KorekSubs cuman numpang lewat Om... :v</p>';

		mysqli_query($db_link, $sql);

		require('rss.php');

		unlink('config.php');
		chdir('libs');
		unlink('about.txt');

		file_put_contents('about.txt', $about);

		echo '<font color="green">XRS telah Uninstalled...</font>';
	}
	else
	{
		echo '<font color="red">Password Salah!</font>';
	}
}

?>
<h1>:: Uninstall XRS ::</h1>
<h4><font color="red">Yakin ingin Uninstall XRS ?</font></h4>
Untuk memastikan bahwa Anda memang admin yang berotoritas, Anda perlu meng-input password dari database.<br>
<form method="POST">
	<input name="DBpasswd" type="password"/> - <input type="submit" value="Uninstall">
</form>
