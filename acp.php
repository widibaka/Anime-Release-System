<?php

session_start();

define('CORE_ACP', true);

require_once('libs/lib.php');

@include('config.php');

defined('CONFIG') or setup();

clean_token();

if (!isset($_GET['crk']))
{
	clean_add_token();
}
else
{
	if ($_GET['crk'] != 'addrelease')
	{
		clean_add_token();
	}
	else if ($_GET['crk'] != 'editrlz')
	{
		clean_edit_token();
	}
}

$wrong = '';

if (isset($_POST['pass']))
{
	if ($_POST['pass'] === $config['pass'])
	{
		$_SESSION['pass'] = $config['pass'];
	}
	else
	{
		$wrong = '<br><font color="red">Password Lu Salah Gan!</font>';
	}
}

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="design/default.css" media="screen,projection" />
	<link rel="alternate" type="application/rss+xml" title="<?php display($config['team']); ?> Releases RSS Feed" href="rss.xml" />
	<link rel="shortcut icon" href="design/favicon.ico" />
	<title>Portal Rilisan <?php echo $config['team']; ?></title>
	<script type="text/javascript" src="js/acp.js"></script>
</head>
<body>
<?php

if (isset($_SESSION['pass']) && $_SESSION['pass'] === $config['pass'])
{
	$page = 'acp/accueil.php';

	if (!empty($_GET['crk']))
	{
		$file = clean_var($_GET['crk']);

		if (file_exists('acp/' . $file . '.php'))
		{
			$page = 'acp/' . $file . '.php';
		}
		else
		{
			$page = 'bugslogger.php';
		}
	}
?>
	<div id="contentwrapper">
		<div id="banner"><img src="<?php echo(get_banner()); ?>" alt="banniere" /></div>
		<div id="menu">
			<ul>
				<li><a href="index.php?crk=releases">Rilisan</a></li>
				<li><a href="acp.php?crk=about">Tentang</a></li>
				<li><a href="acp.php?crk=modifabout"> Edit "Tentang" *</a></li>
				<li><a href="acp.php?crk=addrelease"> Buat Rilisan Baru *</a></li>
				<li><a href="acp.php?crk=modifrlz"> Edit Rilisan *</a></li>
				<li><a href="acp.php?crk=delrelease"> Delete Rilisan *</a></li>
				<li><a href="acp.php?crk=rss"> Update RSS feed *</a></li>
				<li><a href="acp.php?crk=editconfig"> Edit Config.php *</a></li>
				<li><a href="acp.php?crk=uninstall"> Uninstall XRS *</a></li>
				<li><a href="acp.php?crk=logout"> Logout *</a></li>
			</ul>
		</div>
		<div id="maincontent">
			<?php require_once($page); ?>
		</div>
		<div id="footer">
			<p>Portal Rilisan <?php display($config['team']); ?> v1.0.0</p>
			<p>&copy; <?php display(date('Y') . ' ' . $config['team']); ?></p>
		</div>
	</div>
<?php } else { ?>
	<div id="maincontent" style="float:none; margin:auto">
		<br /><br /><hr />
		<form action="acp.php" method="post">
			<center>Masukkan Password</center>
			<center><input type="password" name="pass" /></center>
			<center><input type="submit" value="Enter"/></center>
		</form>
		<center><?php echo($wrong); ?></center>
		<hr />
	</div>
<?php } ?>
</body>
</html>
<?php
	ob_end_flush();
