<?PHP
	
	
	include('mestre_jedi.php');
	
		// verifica o modo de desenvolvimento
	if (file_exists('isDeveloperLocal')) {
		// homologação
		$mysql_config = "SQLCONNECT>localhost|bancodedados|root|";
		$system = SystemStart::getInstance($mysql_config);
	} else {
		// produção
		$mysql_config = "SQLCONNECT>localhost|bancodedados|usuario|senha";
		$system = SystemStart::getInstance($mysql_config);		
	}
			
?>