<?php

defined('CORE') or exit;

$releases      = null;
$releasesCount = 0;

$searchtype = 'byname';

if (isset($_POST['searchtype']) && $_POST['searchtype'] === 'bycracker')
{
	$searchtype = 'bycracker';
}

if (isset($_POST['q']) && is_string($_POST['q']) && strlen($_POST['q']) > 0)
{
	$q = $_POST['q'];

	if ($searchtype === 'bycracker')
	{
		$releases = $db_link->prepare('SELECT * FROM releases WHERE cracker LIKE ? ORDER BY date DESC;');
	}
	else
	{
		$releases = $db_link->prepare('SELECT * FROM releases WHERE name LIKE ? ORDER BY date DESC;');
	}

	$releases->execute([ '%' . $q . '%' ]);

	$releasesCount = $releases->rowCount();
}

?>
<h1>:: Search Rilisan Dari <?php display($config['team']); ?> ::</h1>
<?php if (!is_null($releases)) {
?>
<p>Query: "<font color="<?php display(($releasesCount > 0) ? 'green' : 'red'); ?>"><b><?php display($q); ?></b></font>" ini <?php display($releasesCount . ($releasesCount > 1) ? ' cocok dengan database!' : ' tidak cocok dengan rilisan apapun.'); ?>
<br /><br />
<?php
	if ($releasesCount != 0)
	{
		while ($release = $releases->fetch(PDO::FETCH_OBJ))
		{ 
			echo('<a href="' . htmlentities($release->url) . '" target="_blank">' . htmlentities ($release->name) . '</a> ( Pelaku : <font color="red">' . htmlentities($release->cracker) . '</font> )<br/>');
		}
?>
<br />
<a href="index.php?crk=search">Reset pencarian</a>
<?php
	} else {
?>
<a href="index.php?crk=search">Klik di sini, kalau ingin reset</a>
<?php
	}
?>
</p>
<?php } else { ?>
<p>Rilisan kami ditampung di dalam database. Gunakan kotak pencarian di bawah ini untuk memulai pencarian.</p>
<form action="index.php?crk=search" method="post">
	<input id="textinput" class="textinput" name="q" placeholder="Pencarian..." type="text">
	<input class="submitbutton" name="submit" value="Cari" type="submit">
	<p><i><input type="radio" name="searchtype" value="byname" checked="checked"> Cari menurut nama file</i></p>
	<p><i><input type="radio" name="searchtype" value="bycracker"> Cari menurut nama Subber</i></p>
</form>
<?php } ?>
