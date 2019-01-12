<?php

defined('CORE_ACP') or exit;

if (isset($_POST['releasename'], $_POST['url'], $_POST['cracker']))
{
	if (!empty($_POST['releasename']) AND !empty($_POST['url']) AND !empty($_POST['cracker']))
	{
		if (check_token('add', 600, false))
		{
			$releasename = $_POST['releasename'];
			$url         = $_POST['url'];
			$cracker     = $_POST['cracker'];

			$query = $db_link->prepare('INSERT INTO releases (name, url, cracker) VALUES (?, ?, ?);');

			$query->execute([
				$releasename,
				$url,
				$cracker
			]);

			echo('<font color="green">Rilisan berhasil ditambahkan.</font>');

			include('rss.php');
		}
		else
		{
			echo('<font color="red">Token salah!<br>Silakan coba lagi.</font>');
		}
	}
}

?>
<h1>:: Penambahan Rilisan Baru ::</h1>
<hr />
<form action="<?php echo($_SERVER['SCRIPT_NAME']); ?>?crk=addrelease" method="POST">
	<table cellpadding="4" cellspacing="0">
		<tr>
			<td><div align="right">Nama file:</div></td>
			<td><input type="text" name="releasename" size="60" /></td>
		</tr>
		<tr>
			<td><div align="right">Tautan Unduh: </div></td>
			<td><input type="text" name="url" size="60" /></td>
		</tr>
		<tr>
			<td><div align="right">Subber : </div></td>
			<td><input type="text" name="cracker" /></td>
		</tr>
		<tr>
			<td><div align="right"><input type="submit" value="Tambahkan" /></div></td>
			<td></td>
		</tr>
	</table>
	<input type="hidden" name="token" value="<?php echo(generate_token('add')); ?>"/>
</form>
