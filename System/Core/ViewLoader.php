<?php
// Load Specific View
	if(isset($_GET['view'])){
		if(file_exists('Application/Views/'.$_GET['view'].'.php')){
			require_once('Application/Views/'.$_GET['view'].'.php');
		}else{
			Core::Log('Error','ViewLoader.php could not find the View you requested');
		}
	}
//Fallback View
	else{
		if(file_exists('Application/Views/Home.php')){
			require_once('Application/Views/Home.php');
		}else{
			Core::Log('Error','ViewLoader.php could not find the fallback View "Home.php", is file missing?');
		}
	}
?>