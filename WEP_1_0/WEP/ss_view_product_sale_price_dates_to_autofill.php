<?php
// This script and data application were generated by AppGini 5.30
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");

	header("Content-type: text/javascript; charset=UTF-8");

	$mfk=$_GET['mfk'];
	$id=makeSafe($_GET['id']);
	$rnd1=intval($_GET['rnd1']); if(!$rnd1) $rnd1='';

	if(!$mfk){
		die('// no js code available!');
	}

	switch($mfk){


	}

?>