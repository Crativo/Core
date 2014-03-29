<?
if(file_exists('Application/Partials/Header.php')){
		require_once('Application/Partials/Header.php');
}else{
	Core::Log('Error','Start.php could not find load your Header partial, is file missing?');
}
if(file_exists('System/Core/ViewLoader.php')){
	require_once('System/Core/ViewLoader.php');
}else{
	Core::Log('Error','Start.php could not find load your ViewLoader from System Core tools, is file missing?');
}
if(file_exists('Application/Partials/Footer.php')){
	require_once('Application/Partials/Footer.php');
}else{
	Core::Log('Error','Start.php could not find load your Footer partial, is file missing?');
}
?>