<?php
//Creates a Packages Partial for your Application with the specified packages in App.xml
// App.json requires JSON_Packager.php if you are using Start.php v.0.1, or Just upgrade to Start.php v.1 and continue using this Packager.php
if(file_exists('Application/Partials/Packages.php')){
	unlink('Application/Partials/Packages.php');
	Core::Log('Action','Removed Packages partial');
}
file_put_contents('Application/Partials/Packages.php', '<!--Generated Packages Partial by Packager.php-->');
Core::Log('Action','Created new Packages partial');
if(isset($App->Library)){
foreach($App->Library->Package as $Package){
	if(substr($Package, -4) == '.css'){
		$injection = '
<link rel="stylesheet" type="text/css" href="Library/'.$Package.'">';
		file_put_contents('Application/Partials/Packages.php', $injection, FILE_APPEND | LOCK_EX);
	}
	if(substr($Package, -3) == '.js'){
		$injection = '
<script src="Library/'.$Package.'"></script>';
		file_put_contents('Application/Partials/Packages.php', $injection, FILE_APPEND | LOCK_EX);
	}else{	
		Core::Log('Error','Packager detected an unknown file format in your App file Packages titled= '.$Package);
	}
Core::Log('Action','Modified packages partial');
}
}else{
	Core::Log('Error','Packager Could not find an App file to import Packages from');
}
?>