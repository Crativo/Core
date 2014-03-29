<?php
class Core{
	function UsePartial($Partial){
		if(file_exists('Application/Partials/'.$Partial.'.php')){
			require_once('Application/Partials/'.$Partial.'.php');
		}
	}
	function Log($type,$message){
		if(file_exists('System/Storage/'.$type.'.log')){
			$date = date('m-D-Y h:i a');
			$message = 
$date . ' - ' .$message.'
';
			$message .= file_get_contents('System/Storage/'.$type.'.log');
			file_put_contents('System/Storage/'.$type.'.log', $message);
		}else{
			touch('System/Storage/'.$type.'.log');
			$date = date('m-D-Y h:i a');
			$message = 
$date . ' - ' .$message.'
';
			$message .= file_get_contents('System/Storage/'.$type.'.log');
			file_put_contents('System/Storage/'.$type.'.log', $message);
		}
	}
	function ReadLog($log){
		$log_contents = file_get_contents('System/Storage/'.$log.'.log');
		echo $log_contents;
	}
}
?>