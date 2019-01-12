<?php

defined('CORE_ACP') or exit;

if (isset($_POST['DBpasswd']))
{
	if ($_POST['DBpasswd'] === $dbpass)
	{
		$filename = 'config.php';

		if (isset($_POST['config']))
		{
			if (is_writable($filename))
			{
				file_put_contents($filename, stripslashes($_POST['config']));

				echo('Tindakan pengubahan berhasil.');
			}
			else
			{
				echo('<font color="red">File bernama ' . $filename . ' tidak dapat diubah.</font>');
			}

		}
		else
		{
?>
<form method="post" action="acp.php?crk=editconfig">
	<input type="hidden" name="DBpasswd" value="<?php display($dbpass); ?>"/>
	<textarea name="config" style="width:100%; height: 230px;"><?php display(file_get_contents($filename)); ?></textarea><hr />
	<input type="submit" value="Edit" />
</form>
<?php
		}
	}
	else
	{
		echo('<font color="red">Password Salah!</font>');
	}
}
?>
<h1>:: Pengubahan File Konfigurasi ::</h1>
Untuk memastikan bahwa Anda memang admin yang berotoritas, Anda perlu meng-input password dari database.<br><br>
<form method="POST">
	<input name="DBpasswd" type="password"/> - <input type="submit" value="Input">
</form>
