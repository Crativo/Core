<?php
// Start.php v.0.1
//Load special functions from the Core class
	require_once('System/Core/Core.php');
// Make App file into an object
if(file_exists('App.json')){
	$App = json_decode(file_get_contents('App.json'));
	Core::Log('Action','Running '.$App->Title.' app from App.json');
	$AppCheck = 'Positive';
}
if(file_exists('App.xml')){
	$App = simplexml_load_file('App.xml');
	Core::Log('Action','Running '.$App->Title.' app from App.xml');
	$AppCheck = 'Positive';
}
//If no App file is found, then shoot an error
if($AppCheck!=='Positive'){
	Core::Log('Error','Please make sure you have an App file, either JSON or XML');
	echo '<style type="text/css">body{font-family:verdana;background-color:#ff9696;}</style>';
	echo '<h6>Error Log:</h6>';
	echo '<textarea style="width:100%;height:100%;background:#ff9696;">';
		Core::ReadLog('Error');
	echo '</textarea>';
	die;
}


	if(isset($App->Mode)){
		if($App->Mode == 'Compile'){
			// Generate Routes using the App.xml information
			if(file_exists('System/Core/Router.php')){
				require_once('System/Core/Router.php');
			}else{
				Core::Log('Error','Start.php could not detect a Router file installed');
			}
			// Generate Packages File
			if(file_exists('System/Core/Packager.php')){
				require_once('System/Core/Packager.php');
			}else{
				Core::Log('Error','Start.php could not detect a Packager file installed');
			}
			echo '<style type="text/css">body{font-family:verdana;background-color:#eee;}</style>';
			echo '<h1>'.$App->Title.' app is now re-compiled!</h1>';
			echo '<h6>Action Log:</h6>';
			echo '<textarea style="width:100%;height:200px;background:#a4f2a6;">';
				Core::ReadLog('Action');
			echo '</textarea>';
			echo '<h6>Error Log:</h6>';
			echo '<textarea style="width:100%;height:200px;background:#ff9696;">';
				Core::ReadLog('Error');
			echo '</textarea>';
			Core::Log('Error','Templates are blocked during compiling mode');
			die;
		}
	}
// Application Bootstrapper
require_once('System/Core/BootStrapper.php');
?>