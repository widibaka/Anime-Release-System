<?php

defined('CORE_ACP') or exit;

$filename = 'libs/about.txt';

if (isset($_POST['about']))
{
	if (is_writable($filename))
	{
		file_put_contents($filename, stripslashes($_POST['about']));

		echo('Pengubahan selesai.');
	}
	else {
		echo('<font color="red">File ' . $filename . ' tidak dapat diubah.</font>');
	}
}

?>
<h1>:: Ubah Halaman "Tentang"::</h1>
<form method="POST" action="acp.php?crk=modifabout">
	<p>HTML is allowed</p>
	<textarea name="about" style="width:100%; height: 230px;"><?php display(file_get_contents($filename)); ?></textarea>
	<hr />
	<input type="submit" value="Ubah" />
</form>
