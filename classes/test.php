<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include('assets/inc/header.inc.php'); ?>

<?php $test = "hello"; ?>

<?php if($test == "hello"): ?>
<p>HELLO!</p>
<?php else: ?>
<p>GO AWAY!</p>
<?php endif; ?>
<?php include('assets/inc/footer.inc.php'); ?>