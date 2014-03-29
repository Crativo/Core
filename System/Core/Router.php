<?php
// Routing
// Re-Generate routes using App.xml onto .htaccess
// App.json requires JSON_Router.php if you are using Start.php v.0.1, or Just upgrade to Start.php v.1 and continue using this Packager.php
if(file_exists('App.xml')){
	if(file_exists('.htaccess')){
		unlink('.htaccess');
	}
	Core::Log('Action','Removed .htaccess');
$hthead = '
RewriteEngine On

#Activate this for remote servers
# RewriteBase /yes';
	file_put_contents('.htaccess', $hthead);
	Core::Log('Action','Created .htaccess');
	foreach ($App->Routes->Route as $Route) {
		$route = $Route->Input;
		$route_lwrcase = strtolower($route);
		$route_uprcase = ucfirst($route);
		$route_caps = strtoupper($route);
$route_edit = '

# Route /'.$route.'
RewriteRule '.$route_uprcase.' index.php?view='.$route.'
RewriteRule '.$route_caps.' index.php?view='.$route.'
RewriteRule '.$route_lwrcase.' index.php?view='.$route;

		file_put_contents('.htaccess', $route_edit, FILE_APPEND | LOCK_EX);
		Core::Log('Action','Modified .htaccess, New route '.$Route->Input.' for '.$Route->Output);
	}
}else{
	Core::Log('Error','Core Router Error: Could not find an App.xml');
}
?>