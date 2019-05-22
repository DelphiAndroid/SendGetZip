<?PHP
	/* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@ GRUPO   DELPHI   ANDROID @@@@@@@@@
	   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	   @@@ AUTOR: EULER MAGALHÃES JUNIOR (eulermagalhães@gmail.com) @@@
	   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	  
	   Vem fazer parte do maior grupo de programadores do Zap envie uma
	   mensagem para (37)99100-7768
	  
	   Informe seu nome, cidade e estado
	  
	   Desejo uma boa programação! (update by 09/03/2019)
	   
	   www.delphiandroid.com.br
	   
	 */

	session_start();

	if ($_REQUEST['phpinfo']){ phpinfo(); exit; }
	
	global $userLogin,$password, $outparam, $timeValidateToken,$table_user_name,$default_mail,$default_mail_name, $param, $files,$inzip_dir,$outzip_dir;

	// senha padrão do zip
	$userLogin 						= array();
	$default_mail 				= "suporte@delphiandroid.com.br";
	$default_mail_name		= "Delphi Android";
	$password 						= 	'123';
	$outparam 						= 	array('timestamp'=>date('Y-m-d H:i:s'));
	$timeValidateToken		=	"+30 minutes";
	$table_user_name 			= 	"_userLogin";

	// verifica se existe algum identificador
	if ($_REQUEST['id']) { $id = $_REQUEST['id']; } else { $id = 'global'; }
	if ($_REQUEST['section']) { $section = $_REQUEST['section']; } else { $section = 'nosection'; }
	
	// salva horario de agora
	$second = date('H-i-s-ss');

	// caso não exista o diretorio ele cria
	if (!is_dir(__DIR__.'/log')) { mkdir(__DIR__.'/log'); }
	if (!is_dir(__DIR__.'/log/'.$id)) { mkdir(__DIR__.'/log/'.$id); }
	if (!is_dir(__DIR__.'/log/'.$id.'/'.$section)) { mkdir(__DIR__.'/log/'.$id.'/'.$section); }
	if (!is_dir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d'))) { mkdir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d')); }
	if (!is_dir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d').'/'.$second)) { mkdir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d').'/'.$second); }
	if (!is_dir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d').'/'.$second.'/in')) { mkdir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d').'/'.$second.'/in'); }
	if (!is_dir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d').'/'.$second.'/out')) { mkdir(__DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d').'/'.$second.'/out'); }
	
	// monta diretorio do dia
	$base_dir = __DIR__.'/log/'.$id.'/'.$section.'/'.date('Y-m-d').'/'.$second;
	
	// cria diretorio base para organizar os pacotes enviados
	if (!is_dir($base_dir)) { mkdir($base_dir); }
		
	// e seus respectivos diretorios
	$inzip_dir = $base_dir.'/in';
	$outzip_dir = $base_dir.'/out';


	// configura os arquivos de recebimento e saida
	$inzip = $inzip_dir.'/in.zip';
	$outzip =$outzip_dir.'/out.zip';
	
	// move o pacote para o log
if ( ($_FILES['pacote']) && (file_exists($_FILES['pacote']['tmp_name']))) {

	if (move_uploaded_file($_FILES['pacote']['tmp_name'], $inzip)) {

		// vamos descompactar o pacote
		$zip = new ZipArchive;

		// verifica se vai ser possivel descoompactar
		if ($zip->open($inzip) === TRUE) {

			// define a senha padrão
			//if ($zip->setPassword($password)) {

				// extrai os arquivos para uma pasta
				$zip->extractTo($inzip_dir);

				// fecha o extrator zip
				$zip->close();

				// carrega os parametros enviados
				$in = explode("\n",file_get_contents($inzip_dir.'/param.txt')); 


				// monta parametros em array
				foreach($in as $l){ if (trim($l)!="") { $t = explode("=",$l,2); $param[$t[0]]=trim($t[1]); } }

				// lista arquivos
				$files = scandir($inzip_dir);
			
				foreach($files as $key=>$filename){

					if ($filename=='.') {
						unset($files[$key]);
					} else if ($filename=='..') {
						unset($files[$key]);
					} else if ($filename=='param.txt') {
						unset($files[$key]);
					} else {

					}

				}



				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@ LOGIN USER @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
				$chkLogin = false;
				$chkAutentication = false;
				$chkAutenticationNoErro = false;

				//print_r($param); exit;
			
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@ USER AUTHETICATION CODE @@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
				if ($param['_userRecoverAuthCode']!="") {

					// verifica se tem código de usuario
					if ($param['_userId']>0) {
						
						// busca os dados do usuário
						$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$param['_userId']."'");						
						
						// verifica se são validos as autenticações do usuário
						if ($userLogin['userRecoverMailCode']==$param['_userRecoverAuthCode']) {
							$m='Mail';
						} else if ($userLogin['userRecoverPhoneCode']==$param['_userRecoverAuthCode']) {
							$m='Phone';
						} else if ($userLogin['userRecoverDocCode']==$param['_userRecoverAuthCode']) {
							$m='Doc';
						} else {
							$m=false;
						}

						// encontro o registro de autenticação
						if (($m!=false)&&($userLogin['userId']>0)){

							// comparar as datas
							$date1 = date_create(date('Y-m-d H:i:s'));
							$date2 = date_create($userLogin['userRecover'.$m.'CodeValidate']);

							// pergunta se o código ainda e valido!
							if ($date2>$date1){

								// autoriza o login
								$chkLogin = true;

								// retorna que foi autenticado corretamente
								$userLogin['_userRecoverAuthCodeStatus'] = 'OK';

							}

							// programar limpeza da solicitação de autenticação por recuperação
							$fieldSet=array(
								'userId'=>$userLogin['userId'],
								'userRecover'.$m.'IP'=>null,
								'userRecover'.$m.'Code'=>null,
								'userRecover'.$m.'CodeValidate'=>null,
								'userRecover'.$m.'SendMsgCount'=>null,
								'userRecover'.$m.'SendMsgValidade'=>null
							);

							// executa limpeza
							mj("SQLUPDATE>$table_user_name",$fieldSet);

							// recarrega dados
							$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$userLogin['userId']."'");


						} else {
							$outparam['erro_code'] = "311";
							$outparam['erro_msg']  = "O código de autenticação não autorizado!";							
						}
						
					} else {
						$outparam['erro_code'] = "250";
						$outparam['erro_msg']  = "Erro ao tentar recuperar o acesso do usuário, id do usuário vazio!";
					}


				} else if ($param['_userRecover']!="") {

					// pega o metododo usado
					$m = $param['_userRecover'];

					// vamos verificar se existe o e-mail
					$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE user".$m."='".$param['_userRecover'.$m]."'");

					//print_r($userLogin); exit;

					$fieldSet = array();
					$fieldSet['userId'] = $userLogin['userId'];
					$fieldSet['userRecover'.$m.'IP'] = $_SERVER[REMOTE_ADDR];

					// verifica se existe o usuário
					if ($userLogin['userId']>0){

						// verifica se já tem um recuperação em andamento
						if (isset($userLogin['userRecover'.$m.'CodeValidate'])) {

							// comparar as datas
							$date1 = date_create(date('Y-m-d H:i:s'));
							$date2 = date_create($userLogin['userRecover'.$m.'CodeValidate']);

							// caso a data1 seja maior que a data2, indica que esta vencido
							if ($date1>$date2){
								$recoverCodeActive = false;
							} else {
								$recoverCodeActive = true;
							}
						} else {
							$recoverCodeActive = false;
						}

						// tratar titulo e texto a ser enviado
						$subject 	= "Código de Autenticação";
						$text 		= "[code] - Expira em 24 horas!";

						// caso esteja desativado
						if (!$recoverCodeActive){

							$CodeValidate = strtotime('+1 day');

							// recinicia contagem do envio
							$fieldSet['userRecover'.$m.'SendMsgCount'] = 1;
							$fieldSet['userRecover'.$m.'Code'] = strtoupper(mj("pwd",6,false,false,false));
							$fieldSet['userRecover'.$m.'CodeValidate'] = date("Y-m-d H:i:s", $CodeValidate);
							$fieldSet['userRecover'.$m.'SendMsgValidade'] = date("Y-m-d H:i:s", strtotime('+30 minutes'));

							// desativa erros da autenticação
							$chkAutenticationNoErro = true;

							if ($m='Mail') {

								// atualiza dados no texto
								$text = mj("r[",array(
									'code'=>$fieldSet['userRecover'.$m.'Code'],
									'validate'=>date('d/m/Y H:i:s',$CodeValidate)
											),$text);

								// envia mensagem
								sendMail($param['_userRecover'.$m],$subject,$text,false);
							}


						} else {

							// vamos verificar se ele já atingiu o limite de envio por dia
							if ($userLogin['userRecover'.$m.'SendMsgCount'] <= 3) {

								// comparar as datas
								$date1 = date_create(date('Y-m-d H:i:s'));
								$date2 = date_create($userLogin['userRecover'.$m.'SendMsgValidade']);

								// verfica se expirou a data
								if ($date1>$date2) {

									$CodeValidate = strtotime('+1 day');
									$fieldSet['userRecover'.$m.'CodeValidate'] = date("Y-m-d H:i:s", $CodeValidate);

									// incrementa mais um
									$fieldSet['userRecover'.$m.'SendMsgCount'] = 			$userLogin['userRecover'.$m.'SendMsgCount']+1;

									$fieldSet['userRecover'.$m.'Code'] = strtoupper(mj("pwd",6,false,false,false));										

									// atualiza a data de validade para evitar reenvios
									$fieldSet['userRecover'.$m.'SendMsgValidade'] = date("Y-m-d H:i:s", strtotime('+30 minutes'));

									// desativa erros da autenticação
									$chkAutenticationNoErro = true;

									if ($m='Mail') {

										// atualiza dados no texto
										$text = mj("r[",array(
											'code'=>$fieldSet['userRecover'.$m.'Code'],
											'validate'=>date('d/m/Y H:i:s',$CodeValidate)
													),$text);

										// envia mensagem
										sendMail($param['_userRecover'.$m],$subject,$text,false);

										//mail($param['_userRecover'.$m],'Código de Acesso','Use o código '.$fieldSet['userRecover'.$m.'Code'].' para autenticar seu acesso!');	
									}

								} else {
									$outparam['erro_code'] = "301";
									$outparam['erro_msg']  = "Você pode solicitar outra recuperação de acesso somente 30 minutos após a ultima, aguarde!";

								}

							} else {
								$outparam['erro_code'] = "302";
								$outparam['erro_msg']  = "Você atingiu o limite de solicitações de recuperação de acesso por dia!";
							}
						}


						// caso não tenha ocorrido nenhum erro
						if (!$outparam['erro_code']){

							// atualiza os dados
							mj("SQLUPDATE>$table_user_name",$fieldSet);

							// retorna o que foi gravado para o sistema tratar da forma que precisar
							$returnFielSet = array();
							foreach ($fieldSet as $n=>$v){ $returnFielSet['_'.$n] = $v; }
							$returnFielSet['_userTarget']=$m;
							$outparam = array_merge($outparam,$returnFielSet);

						}


					} else {
						$outparam['erro_code'] = "211";
						if ($m=='Mail') {
							$outparam['erro_msg']  = "Este e-mail não existe cadastrado";
						} else {
							$outparam['erro_msg']  = "Este telefone não existe cadastrado";
						}
					}

				}
			
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@ LOGIN E-MAIL @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

				// primmeira verificação e do login o da autenticação
				if ($param['_userLoginRun']!="") {

					// verifica se tabela existe e se os campos conferem
					if (exist_table($table_user_name)){

						if ($param['_userType']!=""){

								// monta o campo
								$field = 'user'.$param['_userType'];

								// caso seja um telefone vai retornar
								$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE $field='".$param['_userKey']."'");

						} else {

							// vamos verificar se existe o e-mail
							if ( is_numeric($param['_userKey']) ) {

								// caso seja um telefone vai retornar
								$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userPhone='".$param['_userKey']."'");
								$param['_userType'] = 'Phone';

								// verifica se e um documento
								if ($userLogin['userId']<=0){
									$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userDoc='".$param['_userKey']."'");
									$param['_userType'] = 'Doc';
								}

							} else {
								$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userMail='".$param['_userKey']."'");
								$param['_userType'] = 'Mail';
							}

							$field = 'user'.$param['_userType'];
						}
						
						//print_r($userLogin); exit;

						// verifica se existe o usuário
						if ($userLogin['userId']<=0){

							// verifica se podemos criar o usuário
							if ($param['_userCreate']==1){
								
								$fieldSet = array(
									$field=>$param['_userKey'],
									'userDocType'=>$param['_userType'],
									'userPassword'=>$param['_userPassword'],
								);
								
								// caso sim, ele já cria o usuário e salva seus dados enviados
								$userLogin['userId'] = mj("SQLINSERT>$table_user_name",$fieldSet);
								
								// atualiza dados do usuário login
								$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$userLogin['userId']."'");
								
								// desativa erros da autenticação
								$chkAutenticationNoErro = true;

							} else {								
								$outparam['erro_code'] = "211";
								$outparam['erro_msg']  = "Este ".$param['_userType']." não existe cadastrado";
							}

						}

						// verifica se a senha esta igual
						if ($userLogin['userPassword']==$param['_userPassword']) {

							
							// verfiica se esta ativo autenticação de usuário ao logar
							if ($userLogin['userLoginForceAuth']=='S') {
								
								$authCodeSource = strtoupper(mj("pwd",6,false,false,false));
								
								// cria a chave de autenticação para o logi
								$authCode = md5( $authCodeSource.$userLogin['userId'] );
								
								// retorna a chave
								$outparam['_userLoginAuthCode'] = $authCodeSource;
								$outparam['_userId'] 						= $userLogin['userId'];
								$outparam['_userAuthTempToken'] = $authCode;
								
								// desativa erros da autenticação
								$chkAutenticationNoErro = true;
								
								// salva no banco de dados
								mj("SQLUPDATE>".$table_user_name,array(
									'userId'=>$userLogin['userId'],
									'userLoginAuthCode'=>$authCode,
									'userPhone'=>$authCodeSource
								));
								
							} else {
								
								// autorizar o login sem autenticação
								$chkLogin = true;	
							}
							

						} else {

								if ($userLogin['userId']<=0) {
									$outparam['erro_code'] = "211";
									$outparam['erro_msg']  = "Este ".strtolower($param['_userType'])." não existe cadastrado";							
								} else {
									$outparam['erro_code'] = "213";
									$outparam['erro_msg']  = "Senha informada não e valida!";
								}

						}



					} else {
						// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						// @@@@@@@@@@@@@@@@@@@@@@@@@@@@ CREATE TABLE USER @@@@@@@@@@@@@@@@@@@@@@@@@
						// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@							
						$field = 'userMail';

						if ($param['_userType']!=""){
							$field = 'user'.$param['_userType'];
						}
						
						$script  = "CREATE TABLE $table_user_name (\n";
						$script .= "userId int(11) NOT NULL AUTO_INCREMENT,\n";
						$script .= "userIdOther int(11) DEFAULT -1,\n";
						$script .= "userName varchar(100) DEFAULT NULL,\n";
						$script .= "userMail varchar(100) DEFAULT NULL,\n";
						$script .= "userDoc varchar(100) DEFAULT NULL,\n";
						$script .= "userDocType varchar(100) DEFAULT NULL,\n";						
						$script .= "userPassword varchar(300) DEFAULT NULL,\n";
						$script .= "userPhone varchar(15) DEFAULT NULL,\n";
						$script .= "userVerifiedMail varchar(1) DEFAULT 'N',\n";
						$script .= "userVerifiedPhone varchar(1) DEFAULT 'N',\n";
						$script .= "userAdministrador varchar(1) DEFAULT 'N',\n";
						$script .= "userActive varchar(1) DEFAULT 'S',\n";
						$script .= "userSuspended varchar(1) DEFAULT 'N',\n";
						$script .= "userLoginForceAuth varchar(1) DEFAULT 'N',\n";
						$script .= "userLoginAuthCode varchar(100) DEFAULT NULL,\n";
						$script .= "userLastVisit timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),\n";
						$script .= "userRegistered timestamp NOT NULL DEFAULT current_timestamp(),\n";
						$script .= "userLastIP varchar(50) DEFAULT NULL,\n";

						$script .= "userToken varchar(300) DEFAULT NULL,\n";
						$script .= "userTokenValidate datetime DEFAULT NULL,\n";

						$script .= "userModifyField varchar(50) DEFAULT NULL,\n";
						$script .= "userModifyFieldValue varchar(300) DEFAULT NULL,\n";

						$script .= "userModifyIP varchar(50) DEFAULT NULL,\n";
						$script .= "userModifyCode varchar(10) DEFAULT NULL,\n";
						$script .= "userModifyCodeValidate datetime DEFAULT NULL,\n";
						$script .= "userModifySendMsgCount int(5) DEFAULT NULL,\n";
						$script .= "userModifySendMsgValidade datetime DEFAULT NULL,\n";

						$script .= "userRecoverMailIP varchar(50) DEFAULT NULL,\n";
						$script .= "userRecoverMailCode varchar(10) DEFAULT NULL,\n";
						$script .= "userRecoverMailCodeValidate datetime DEFAULT NULL,\n";
						$script .= "userRecoverMailSendMsgCount int(5) DEFAULT NULL,\n";
						$script .= "userRecoverMailSendMsgValidade datetime DEFAULT NULL,\n";

						$script .= "userRecoverPhoneIP varchar(50) DEFAULT NULL,\n";
						$script .= "userRecoverPhoneCode varchar(10) DEFAULT NULL,\n";
						$script .= "userRecoverPhoneCodeValidate datetime DEFAULT NULL,\n";
						$script .= "userRecoverPhoneSendMsgCount int(5) DEFAULT NULL,\n";
						$script .= "userRecoverPhoneSendMsgValidade datetime DEFAULT NULL,\n";
						$script .= "PRIMARY KEY (userId),\n";
						$script .= "KEY (userId) ) ";
						$script .= "ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

						// cria a tabela
						mj("SQL>".$script);

						// verifica se podemos criar o usuário
						if ($param['_userCreate']==1){


							$fieldSet = array(
								$field=>$param['_userKey'],
								'userDocType'=>$param['_userType'],
								'userPassword'=>$param['_userPassword'],
							);

							$fieldSet['userPassword'] = $param['_userPassword'];
							
							// caso sim, ele já cria o usuário e salva seus dados enviados
							$id_insert_user = mj("SQLINSERT>$table_user_name",$fieldSet);

							// confirma o login ativo
							$chkLogin = true;

							// salva os dados
							$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$id_insert_user."'");

						} else {
							$outparam['erro_code'] = "210";
							$outparam['erro_msg']  = "Tabela usuário não existe!";
						}

					}

				} 

				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@ LOGIN AUTENTICATION VALIDE @@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

				// primmeira verificação e do login o da autenticação
				if ($param['_userLoginAuthCode']!="") {
					
					if ($param['_userId']>0) {
						
						//
						$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$param['_userId']."'");
						
						// verifica se são validos as autenticações do usuário
						if ($userLogin['userLoginAuthCode']==md5($param['_userLoginAuthCode'].$userLogin['userId'])) {
							
							// autoriza o login
							$chkLogin = true;
							
							mj("SQLUPDATE>$table_user_name",array('userId'=>$userLogin['userId'],'userLoginAuthCode'=>null));
							
							// limpa instancia do autenticador
							$userLogin['userLoginAuthCode'] = "";
														
							// retorna informação que autenticação foi um sucesso!
							$outparam['_userLoginAuthCodeStatus'] = 'OK';
							
							
						} else {
							$outparam['erro_code'] = "251";
							$outparam['erro_msg']  = "Código de autenticação não confere!";	
						}
						
					} else {
						$outparam['erro_code'] = "250";
						$outparam['erro_msg']  = "Erro ao tentar autenticar o login do usuário, id do usuário vazio!";
					}
					
				}
			
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@ TOKEN AUTENTICATION @@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

				if (!$outparam['erro_code']) {

					if ($chkLogin){

						// toda vez que o login for autorizado vamos criar uma chave de acesso temporaria						
						$outparam['_userToken'] = setNewToken($userLogin['userId'],$timeValidateToken);

						// confirma que foi autenticado pela primeira vez
						$chkAutentication = true;

					} else {

						// checa o token e gera um novo token, voltando ele
						$outparam['_userToken'] = checkToken($param['_userToken'],$timeValidateToken);

						// caso não seja valido desativa o token e retorna que não foi autenticado
						if ($outparam['_userToken']!=false) {

							$chkAutentication = true;

						}

					}

					
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@ CHECK AUTENTICATION @@@@@@@@@@@@@@@@@@@@@@@@
				// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
					
					if ($chkAutentication) {

						// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						// @@@@@@@@@@@@@@@@@@@@@@@@@@@ USER MODIFY @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

						// solicitou uma modificação de e-mail
						if (trim($param['_userModify'])!=""){

							// desativa erros da autenticação
							$chkAutenticationNoErro = true;
							
							// pega o metododo usado
							$f = $param['_userField'];

							if ($f=='Password') {
								$fieldvalue = md5($param['_userModify']);
							} else {
								$fieldvalue = $param['_userModify'];
							}
							
							// vamos verificar se existe o e-mail
							if($userLogin['user'.$f]!=$fieldvalue){


								$fieldSet = array();
								$fieldSet['userId'] = $userLogin['userId'];
								$fieldSet['userModifyIP'] = $_SERVER[REMOTE_ADDR];

								// verifica se já tem uma modificação em andamento
								if (isset($userLogin['userModifyCodeValidate']) && ($userLogin['userModifyField']==$f)) {

									// comparar as datas
									$date1 = date_create(date('Y-m-d H:i:s'));
									$date2 = date_create($userLogin['userModifyCodeValidate']);

									// caso a data1 seja maior que a data2, indica que esta vencido
									if ($date1>$date2){
										$modifyCodeActive = false;
									} else {
										$modifyCodeActive = true;
									}
								} else {
									$modifyCodeActive = false;
								}

								// tratar titulo e texto a ser enviado
								if ($f=='Mail') {
									$subject 	= "Código de Modificação do E-mail";
									$text 		= "[code] - Expira em 24 horas!";
								} else if ($f=='Password') {
									$subject 	= "Código de Modificação da Senha";
									$text 		= "[code] - Expira em 24 horas!";
								}

								// caso esteja desativado
								if (!$modifyCodeActive){

									$CodeValidate = strtotime('+1 day');

									// recinicia contagem do envio
									$fieldSet['userModifyField'] 						= $f;
									$fieldSet['userModifyFieldValue'] 			= $param['_userModify'];
									$fieldSet['userModifySendMsgCount'] 		= 1;
									$fieldSet['userModifyCode'] 						= strtoupper(mj("pwd",6,false,false,false));
									$fieldSet['userModifyCodeValidate'] 		= date("Y-m-d H:i:s", $CodeValidate);
									$fieldSet['userModifySendMsgValidade'] 	= date("Y-m-d H:i:s", strtotime('+30 minutes'));

									// atualiza dados no texto
									$text = mj("r[",array(
										'code'=>$fieldSet['userModifyCode'],
										'validate'=>date('d/m/Y H:i:s',$CodeValidate)
												),$text);

									// verifica qual tipo de campo, para se comportar corretamente
									if ($f=='Mail') {
										sendMail($param['_userModify'],$subject,$text,false);
									} else if ($f=='Password') {
										sendMail($userLogin['userMail'],$subject,$text,false);
									}


								} else {

									// vamos verificar se ele já atingiu o limite de envio por dia
									if ($userLogin['userModifySendMsgCount'] <= 3) {

										// comparar as datas
										$date1 = date_create(date('Y-m-d H:i:s'));
										$date2 = date_create($userLogin['userModifySendMsgValidade']);

										// verfica se expirou a data
										if ($date1>$date2) {

											$CodeValidate 													= strtotime('+1 day');
											$fieldSet['userModifyField'] 						= $f;
											$fieldSet['userModifyFieldValue'] 			= $param['_userModify'];
											$fieldSet['userModifyCodeValidate'] 		= date("Y-m-d H:i:s", $CodeValidate);
											$fieldSet['userModifyCode'] 						= strtoupper(mj("pwd",6,false,false,false));
											$fieldSet['userModifySendMsgCount'] 		= $userLogin['userRecover'.$m.'SendMsgCount']+1;
											$fieldSet['userModifySendMsgValidade'] 	= date("Y-m-d H:i:s", strtotime('+30 minutes'));

											// atualiza dados no texto
											$text = mj("r[",array(
												'code'=>$fieldSet['userModifyCode'],
												'validate'=>date('d/m/Y H:i:s',$CodeValidate)
														),$text);

											// verifica qual tipo de campo, para se comportar corretamente
											if ($f=='Mail') {
												sendMail($param['_userModify'],$subject,$text,false);
											} else if ($f=='Password') {
												sendMail($userLogin['userMail'],$subject,$text,false);
											}


										} else {
											$outparam['erro_code'] = "503";
											$outparam['erro_msg']  = "Você pode solicitar outra recuperação de acesso somente 30 minutos após a ultima, aguarde!";

										}

									} else {
										$outparam['erro_code'] = "504";
										$outparam['erro_msg']  = "Você atingiu o limite de solicitações de recuperação de acesso por dia!";
									}
								}


								// caso não tenha ocorrido nenhum erro
								if (!$outparam['erro_code']){

									// atualiza os dados
									mj("SQLUPDATE>$table_user_name",$fieldSet);

									// retorna o que foi gravado para o sistema tratar da forma que precisar
									$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$userLogin['userId']."'");
								}




							} else {

								if(strtolower($userLogin['user'.$f])==strtolower($fieldvalue)){
									$outparam['erro_code'] = "502";
									$outparam['erro_msg']  = "Você precisa informar um valor diferente para modificação!";
								} else {
									$outparam['erro_code'] = "501";
									$outparam['erro_msg']  = "Sua solicitação de modificação, não foi atendida. Informe seu e-mail para continuar!";
								}
							}

						} else {


						// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
						// @@@@@@@@@@@@@@@@@@@@@@@@@@@ COMMANDS PREFABS @@@@@@@@@@@@@@@@@@@@@@@@@@@
						// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
							
						// verifica se o adminsitrator e valido
						if ($userLogin['userAdministrador']=='S') {
							$IsAdmin = ($userLogin['userAdministrador']==md5($userLogin['userId'].$userLogin['userRegistered']));
						}
							
						// caso desej atualizar dados do usuario
						if ($param['_userSet']>0){
							
							// verifica os ids do usuários para confirmar
							if ( ($IsAdmin) || ($userLogin['userId']==$param['_userSet']) ){
								
								// inicia tratamento de campos
								$fieldSet = array();
								$fieldSet['userId'] 			= $param['_userSet'];
								if ($param['_userIdOther']) $fieldSet['userIdOther'] 	= $param['_userIdOther'];
								if ($param['_userName']) 		$fieldSet['userName'] 		= $param['_userName'];
								if (($IsAdmin) || (!$userLogin['userMail'])) { $fieldSet['userMail'] = $param['_userMail']; }
								if (($IsAdmin) || (!$userLogin['userPassword'])) { $fieldSet['userPassword'] = $param['_userPassword']; }
								if (($IsAdmin) || (!$userLogin['userPhone'])) { $fieldSet['userPhone'] = $param['_userPhone']; }
								if (($IsAdmin) || ($param['_userAdministrador'])) { $fieldSet['userAdministrador'] = $param['_userAdministrador']; }
								if (($IsAdmin) || ($param['_userSuspended'])) { $fieldSet['userSuspended'] = $param['_userSuspended']; }
								
								// comandos que o usuario pode fazer
								if ($param['_userActive']) { $fieldSet['userActive'] = $param['_userActive']; }
								if ($param['_userLoginForceAuth']) { $fieldSet['userLoginForceAuth'] = $param['_userLoginForceAuth']; }
								
								
								// salvar dados
								mj("SQLUPDATE>$table_user_name",$fieldSet);
								
								$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$param['_userSet']."'");
								
								
							} else {
								$outparam['erro_code'] = "601";
								$outparam['erro_msg']  = "Você esta tentando modificar infromações de um usuário sendo que você não é este usuário!";
							}
							
							
						} else if ($param['_userModifyAuthCode']!=""){
							
							$chkSectionNoErro = false;
							
							//echo $userLogin['userModifyCode']."=".$param['_userModifyAuthCode']; exit;
							//echo $userLogin['userId']."==".$param['_userId']; exit;
							// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
							// @@@@@@@@@@@@@@@@@@@@@@@ USER MODIFY AUTHETICATION CODE @@@@@@@@@@@@@@@@@
							// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
							
							// verifica os ids do usuários para confirmar
							if ($userLogin['userId']==$param['_userId']){
								
								// agora confirma o código se realmente foi digitado corretamente
								if ($userLogin['userModifyCode']==$param['_userModifyAuthCode']) {
									
									// caso seja o campo da senha criptografa
									if ($userLogin['userModifyField']=='Password') {
										$fv = md5($userLogin['userModifyFieldValue']);
									} else {
										$fv = $userLogin['userModifyFieldValue'];
									}
									
									// identificar o campo de alteração
									mj("SQLUPDATE>$table_user_name",array(
										'userId'=>$userLogin['userId'],
										'user'.$userLogin['userModifyField']=>$fv,
										'userModifyField'=>null,
										'userModifyFieldValue'=>null,
										'userModifyIP'=>null,
										'userModifyCode'=>null,
										'userModifyCodeValidate'=>null,
										'userModifySendMsgCount'=>null,
										'userModifySendMsgValidade'=>null
									));
									
									// atualiza os dados
									$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$userLogin['userId']."'");
									
									// informar que já foi modificado
									$outparam['_userModifyAuthCodeStatus'] = 'OK';
									
									
								} else {									
									$outparam['erro_code'] = "507";
									$outparam['erro_msg']  = "Sua solicitação de modificação de e-mail, não foi atendida. Código de autenticação invalido!!";
								}
								
							} else {
								$outparam['erro_code'] = "506";
								$outparam['erro_msg']  = "Autenticação de modificação, usuario não encontrado!";
							}
							
						}

							
							foreach($param as $n=>$v) {

								// comandos padrões para o banco de dados via XML
								if (($n=='LoadTableDB') && ($v!="")){
									$table_name = $v;
									$where = $param['LoadTableDB_'.$table_name];
									
									if ($where!="") {
										$data_table = mj("l1:SQL>SELECT * FROM $table_name WHERE $where");
									} else {
										$data_table = mj("l1:SQL>SELECT * FROM $table_name");
									}
									
									$filename = 'ReturnDB_'.$table_name.'.xml';

									// agora vamos criar o arquivo de retorno de dados
									create_table_xml($table_name,$data_table,$outzip_dir."/".$filename);

									// adiciona arquivo ao retorno
									$outfile[$outzip_dir."/".$filename] = $filename;

								} else if (($n=='InsertDB') && ($v!="")){
									
									// pega nome da tabela
									$table_name = $v;
									$filename = 'InsertDB_'.$table_name.'.xml';
									$fieldkey = $param['InsertDB_KEY_'.$table_name];
									
									// verifica se tabela existe e se os campos conferem
									$data_table = check_table($table_name,$inzip_dir."/".$filename);
									
									// vamos incluir os dados
									$list_ids = insert_rows($table_name,$fieldkey,$inzip_dir."/".$filename);
									
									// retorna informações padrões da ultima execução
									$outparam['ReturnDB_KEYS_INSERT_'.$table_name] 			= ids_text($list_ids);
									$outparam['ReturnDB_KEY_'.$table_name] 	= $fieldkey;

									// vamos verifica se devemos recarregar os daos
									if ($param['InsertDB_RELOAD_'.$table_name]=='S') {
										
										//caso exista IDS inseridos ele retorna eles
										if (count($list_ids)>0){
											$data_table = mj("l1:SQL>SELECT * FROM $table_name WHERE $fieldkey in (".implode(",",$list_ids).")");
										} else {
											$data_table = array();
										}
										
										$filename = 'ReturnDB_'.$table_name.'.xml';
										
										// agora vamos criar o arquivo de retorno de dados
										create_table_xml($table_name,$data_table,$outzip_dir."/".$filename);
											
										// adiciona arquivo ao retorno
										$outfile[$outzip_dir."/".$filename] = $filename;
										
										$outparam['InsertDB_RELOAD_'.$table_name] 	= 'S';
									} else {
										$outparam['InsertDB_RELOAD_'.$table_name] 	= 'N';
									}
									

								} else if (($n=='UpdateDB') && ($v!="")){
									
									// pega nome da tabela
									$table_name = $v;
									$filename = 'UpdateDB_'.$table_name.'.xml';
									$fieldkey = $param['UpdateDB_KEY_'.$table_name];
									
									// verifica se tabela existe e se os campos conferem
									$data_table = check_table($table_name,$inzip_dir."/".$filename);
									
									// vamos incluir os dados
									$list_ids = update_rows($table_name,$fieldkey,$inzip_dir."/".$filename);
									
									// retorna informações padrões da ultima execução
									$outparam['ReturnDB_KEYS_UPDATE_'.$table_name] 			= ids_text($list_ids);
									$outparam['ReturnDB_KEY_'.$table_name] 	= $fieldkey;

									// vamos verifica se devemos recarregar os daos
									if ($param['UpdateDB_RELOAD_'.$table_name]=='S') {
										
										//caso exista IDS inseridos ele retorna eles
										if (count($list_ids)>0){
											$data_table = mj("l1:SQL>SELECT * FROM $table_name WHERE $fieldkey in (".implode(",",$list_ids).")");
										} else {
											$data_table = array();
										}
										
										$filename = 'ReturnDB_'.$table_name.'.xml';
										
										// agora vamos criar o arquivo de retorno de dados
										create_table_xml($table_name,$data_table,$outzip_dir."/".$filename);
											
										// adiciona arquivo ao retorno
										$outfile[$outzip_dir."/".$filename] = $filename;
										
										$outparam['UpdateDB_RELOAD_'.$table_name] 	= 'S';
									} else {
										$outparam['UpdateDB_RELOAD_'.$table_name] 	= 'N';
									}
									

								}
							}

							// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
							// @@@@@@@@@@@@@@@@@@@@@@@@@@@ SECTION @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
							// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

							// caso não tenha chamada em sessão
							if (trim($section)!="") {
									
								// realizada chamada da seção
								if (file_exists(__DIR__."/".$section.'.php')) {
									include(__DIR__."/".$section.'.php');
								} else {
									if ( (!$chkSectionNoErro) && ($section!='nosection') && (!$outparam['erro_code'])) {
										$outparam['erro_code'] = "105";
										$outparam['erro_msg']  = "Sessão informada não exite!";
									}
								}
							}

						}

						// tranporta variavel usuário para o retorno
						foreach($userLogin as $f=>$v){ 
							if ($f!='userPassword') { $outparam['_'.$f] = $v; }
						}

					} else {

						if ( (!$chkAutenticationNoErro) && (!$outparam['erro_code'])) {
							$outparam['erro_code'] = "201";
							$outparam['erro_msg']  = "Erro de autenticação!";
						}

					}
				}
		} else {
			$outparam['erro_code'] = "102";
			$outparam['erro_msg'] = "Pacote zip com problemas, não foi possivel abrir!";
		}			



	} else {
		$outparam['erro_code'] = "103";
		$outparam['erro_msg'] = "Pacote zip não foi enviado junto com a solicitação!";
	}	


} else {
   //echo "Pacote não foi enviado, processo foi interrompido!";
   $outparam['erro_code'] = "104";
   $outparam['erro_msg'] = "Pacote zip não foi enviado junto com a solicitação!";
}	

	
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@ START OUTZUP @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

	$zip = new ZipArchive();
	
	
	if ($zip->open($outzip, ZIPARCHIVE::CREATE)!==TRUE) {
	   $outparam['erro_code'] = "110";
	   $outparam['erro_msg'] = "Pacote zip não foi enviado junto com a solicitação!";
	}
	
	// adiciona os arquivos para o zip
	if (is_array($outfile)) foreach($outfile as $_filename=>$_newfilename){
		
		// verifica se existe o arquivo
		if (file_exists($_filename)) {
			
			// adiciona o arquivo
			$zip->addFile($_filename,$_newfilename);
			
			
				
		} else {
			
			$outparam['erro_code'] = "120";
	   		$outparam['erro_msg'] = "Um arquivo não foi enviado. _filename: ".$_filename.';_newfilename'.$_newfilename;
			
		}	
		
	}

	// preapara os parametros de retorno
	$fileparam = '';
	if (is_array($outparam)) foreach($outparam as $key=>$val){
		$fileparam .= $key.'='.$val.'\n\r';
	}
	
	// adiciona o arquivo de parametro via sream
	$zip->addFromString("param.txt" , base64_encode($fileparam)); // time()

	// fecha o zip
	$zip->close();

	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@ CLEAR FILES @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


	//verifica se diretriz esta ativa
	if ($enabled_delete_file_outfile){				
		
		// caso seja um array, vamos rodar por ele
		if (is_array($outfile)) foreach($outfile as $_filename=>$_newfilename){
			
			// remove o arquivo caso diretriz esteja ativa
			//unlink($_filename);			
			
		}
	}

//print_r($outparam); exit;

/*
	echo "<pre>"; print_r($outparam);
	echo "<hr>";
	print_r($outfile);
	echo "<hr>";
	echo filesize($outzip);
	exit;
*/

	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@ FINISH - OUT @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

	//print_r($files);
	header('Content-Type: image/jpeg');
	header("Content-Transfer-Encoding: Binary");
	header('Content-Length: '.filesize($outzip) );
	header('Content-Disposition: attachment; filename="get.zip"'); 
	readfile($outzip);

	// remove arquivo zip
	unlink($inzip);
	unlink($outzip);
	
	// para o código, isso mesmo, nem tudo tem que continuar na vida e o fim da pra uns...
	exit;

	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@ FUNCTIONS AND CLASS  @@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


	// ... aqui e começo para outros ...

	function sendMail($mail,$subject,$text,$reply=false){

		global $default_mail,$default_mail_name;
		
		// caso não tenha local para responder volta pro email original
		if (!$reply){ $reply = $default_mail; }
		
		// header
		$headers = array(			
				"Reply-To: ".$reply,
				"Return-Path: ".$reply,
				"From: \"".$default_mail_name."\" <".$default_mail.">",
				"Organization: ".$default_mail_name,
				"MIME-Version: 1.0",
				"Content-type: text/html; charset=utf-8",
				"Content-Transfer-Encoding: binary",
				"X-Priority: 3",
				"X-Mailer: PHP". phpversion() ,
			);
			
			$tmp = array(
				default_mail=>$default_mail,
				default_mail_name=>$default_mail_name
				);
		
			$text		= mj("r[",$tmp,$text);
			$subject	= mj("r[",$tmp,$subject);

			//foreach($headers as $k=>$v){ if (trim($v)=="") unset($headers[$k]); }
		
			// envia mensagem
			return mail($mail,'=?UTF-8?B?'.base64_encode($subject).'?=',$text,implode("\n", $headers), "-f". $default_mail);
			
			
		}
			


	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@ CHECK STRUCTURE TABLE @@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	function getNewToken($userId){
		return mj("pwd",20,true,true,true)."-".$userId;
	}

	function setNewToken($userId,$timeValidateToken){
		
		global $userLogin,$table_user_name;
		
		$newToken = getNewToken($userId);
		
		mj("SQLUPDATE>$table_user_name",array(
			userId=>$userId,
			userToken=>$newToken,
			userTokenValidate=>date("Y-m-d H:i:s", strtotime($timeValidateToken)),
			userLastIP=>$_SERVER[REMOTE_ADDR]
		));
		
		$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userId='".$userId."'");
		
		return $newToken;
	}

	function checkToken($Token,$timeValidateToken){
		
		global $userLogin,$table_user_name;
		
		// localiza o token
		$userLogin = mj("1:SQL>SELECT * FROM $table_user_name WHERE userToken like '".str_replace('%','%%',$Token)."'");
		
		//
		$date1 = date_create(date('Y-m-d H:i:s'));
		$date2 = date_create($userLogin['userTokenValidate']);
		
		// token ainda esta valido
		if ($date1<$date2){
			
			// vamos gerar um novo token
			return setNewToken($userLogin['userId'],$timeValidateToken);
			
		} else {
			
			// token não esta mais valido
			return false;
		}
		
		
		
	}

	function create_table($table_name,$fields){
			
		
		$mysql_script = "CREATE TABLE `$table_name` (\n";
		$mysql_script_fields = "";
		$mysql_script_fields_index = "";
		
		foreach($fields as $name=>$f){
			
			if ($mysql_script_fields!=""){ $mysql_script_fields .= ",\n"; }
			if ($f[Extra]=='auto_increment') {
				$mysql_script_fields .= $name." ".$f[Type]." NOT NULL AUTO_INCREMENT ";
				$mysql_script_fields_index .= " PRIMARY KEY (`".$name."`), \n";
				$mysql_script_fields_index .= " KEY `$name` (`".$name."`) \n";
			} else {
				

				if ($f[Type]=='timestamp') {
					$mysql_script_fields .= $name." ".$f[Type]." NOT NULL DEFAULT current_timestamp() ";	
				} else {
					$mysql_script_fields .= $name." ".$f[Type]." DEFAULT NULL ";	
				}
				
				
				
			}
		}
		
		if ($mysql_script_fields_index!=""){
			$mysql_script_fields .= ",\n".$mysql_script_fields_index;
		}
		
		$mysql_script .= $mysql_script_fields . ") ";
		
		$mysql_script .= " ENGINE=InnoDB ";
		$mysql_script .= " AUTO_INCREMENT=1 ";
		$mysql_script .= " DEFAULT CHARSET=latin1 ";
		
		mj("SQL>".$mysql_script);

	}


	function update_structure($table_name,$xml){
		
		// carrega campos do MYSQL
		$myFields = myFields(mj("l1:SQL>SHOW COLUMNS FROM ".$table_name));

		// carrega campos do XML
		$xmlFields = xmlFields($xml->METADATA->FIELDS->FIELD);

		//print_r($xmlFields);  print_r($myFields); exit;

		// roda todos os campso enviados pelo XML
		foreach($xmlFields as $xmlField){

			// start status
			$fieldNotFound 		= true;
			$fieldAlterTable 	= false;

			// roda os campos do mysql
			foreach($myFields as $myField){

				// localiza o campo
				if ($xmlField[Field]==$myField[Field]) {

					// localizado
					$fieldNotFound = false;

					// caso seja do tipo diferente
					if ($xmlField[Type]!=$myField[Type]) { $fieldAlterTable = true; }


					break;

				}

			}

			// adiciona o campo a tabela
			if ($fieldNotFound) {

				alterTable_Add($myFields,$table_name,$xmlField[Field],$xmlField[Type],($xmlField[Extra]=='auto_increment'));
			}

			if ($fieldAlterTable) {
				alterTable_Change($myFields,$table_name,$myField[Field],$xmlField[Field],$xmlField[Type],($xmlField[Extra]=='auto_increment'));
			}

		}

	}

	function exist_table($table_name){
		
		// busca todas as tabelas
		$show_tables = mj("l2:SQL>SHOW TABLES");
		
		// verifica se tabela existe
		return array_key_exists($table_name,$show_tables);
		
	}
		
	function create_table_xml($table_name,$data,$xmlfile){
		
		$myFields = myFields(mj("l1:SQL>SHOW COLUMNS FROM ".$table_name));
		
		$saida =  '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'."\n";
		$saida .= '<DATAPACKET Version="2.0">'."\n";
		$saida .= ' <METADATA>'."\n";
		$saida .= '  <FIELDS>'."\n";
		
		//print_r($myFields); exit;
		
		// vamos rodar os campos e preencher
		foreach($myFields as $f){
			
			
			$saida .= '   <FIELD attrname="'.$f[Field].'"';
			
			$tmpType = explode("(",$f[Type]);
			if (count($tmpType)>1){
				$size = str_replace(")","",$tmpType[1]);
				$type = $tmpType[0];
			} else {
				$type = $f[Type];
				$size = 0;
			}
			
			// caso seja autoincrement já trata ele
			if ($f[Extra]=='auto_increment') {
				
				//$saida .= ' fieldtype="i4" SUBTYPE="Autoinc" ';
				$saida .= ' fieldtype="i8" ';
				
			} else {
			
				// ajusta para outros tipos
				switch (strtolower($type)){
					case 'int': 
						if ($size < 12) {
							$saida .= ' fieldtype="i4" ';
						} else {
							$saida .= ' fieldtype="i8" ';
						}
					break;
						
					case 'varchar':		
						if ($size<7) {
							$saida .= ' fieldtype="ui2" '; 
						} else {
							$saida .= ' fieldtype="string" WIDTH="'.$size.'" '; 
						}
					break;
						
					case 'smallint':		$saida .= ' fieldtype="ui2" ';break;
						
					case 'float':	
						if ($size!=""){
							$saida .= ' fieldtype="r8" SUBTYPE="Money" ';
						} else {
							$saida .= ' fieldtype="r8" ';
						}
					break;
						
					case 'tinyint':		$saida .= ' fieldtype="boolean" ';break;
					case 'date':		$saida .= ' fieldtype="date" ';break;
					case 'datetime':		$saida .= ' fieldtype="dateTime" ';break;
					case 'timestamp':		$saida .= ' fieldtype="SQLdateTime" SUBTYPE="Formatted" ';break;
					case 'blob':		$saida .= ' fieldtype="bin.hex" SUBTYPE="Binary" ';break;
					case 'text':		$saida .= ' fieldtype="bin.hex" SUBTYPE="Text" ';break;
						
				}
			}
			$saida .= '/>'."\n";
		}

		$saida .= '  </FIELDS>'."\n";		
		$saida .= ' </METADATA>'."\n";
		
		// adiciona as linhas
		$saida .= ' <ROWDATA>'."\n";

		// adiciona registro
		foreach($data as $row){

			$saida .= '  <ROW ';
			// adiciona campo por campo
			foreach ($row as $n=>$v){
				$saida .= $n.'="'.$v.'" ';
			}

			$saida .= '  />'."\n";
		}

		$saida .= ' </ROWDATA>'."\n";

			
		
		
		$saida .= '</DATAPACKET>'."\n";
		
		file_put_contents($xmlfile,$saida);
		
		//mj("FILE>$xmlfile",$saida);
		
		return $saida;
		
	}

	function check_table($table_name,$xmlfile){
		
		// carrega a tabela XML
		
		$xml = simplexml_load_file($xmlfile);
		
		// verifica se tabela existe
		if (exist_table($table_name)) {
			
			update_structure($table_name,$xml);
			
		} else {
			
			$xmlFields = xmlFields($xml->METADATA->FIELDS->FIELD);
			
			create_table($table_name,$xmlFields);
			
		}
		
	}

	function insert_rows($table_name,$fieldkey,$xmlfile){
		
		global $param,$files,$inzip_dir,$outzip_dir;
		
		//print_r($param); print_r($files); exit;
		
		// carrega a tabela XML
		$xml = simplexml_load_file($xmlfile);
		
		$list_ids = array();
		
		// roda linha por linha para realizar inclusões
		foreach ($xml->ROWDATA as $row){
			
			// pega o array dos dados
			$datarow = reset($row->ROW);
			
			// remove campo de status local
			unset($datarow['RowState']);
			
			// pega id temporario
			$idtmp = $datarow[$fieldkey];
			
			// remove o campo chave
			unset($datarow[$fieldkey]);
			
			// inclui registro na respectiva tabela
			$id_insert = mj("SQLINSERT>$table_name",$datarow);
			
			// inclusão de arquivo na tabela
			if ($param['InsertDBFile_'.$table_name]!=""){

				$part = explode('|',$param['InsertDBFile_'.$table_name]);
				
				$listFile = array();
				
				foreach($part as $p){
					$t = explode(";",$p);
					
					// separa pelo ID enviado
					if (!is_array($listFile[$t[0]])) $listFile[$t[0]] = array();
					
					$listFile[$t[0]][$t[1]] = array('dir'=>$t[2]);
					
				}
				//echo $idtmp."<---";
				//print_r($listFile); exit;
				
				if (array_key_exists($idtmp,$listFile)) {

						foreach($listFile[$idtmp] as $filename => $configFile){

							// pega o diretorio e nome do arquivo
							$dir 			= $configFile['dir'];
							
							if ($configFile['new']!=""){
								$newFileName = $configFile['new'];
							} else {
								$newFileName = $filename;
							}

							if (!is_dir(__DIR__.'/data')) { mkdir(__DIR__.'/data'); }
							if (!is_dir(__DIR__.'/data/'.$table_name)) { mkdir(__DIR__.'/data/'.$table_name); }
							if (!is_dir(__DIR__.'/data/'.$table_name.'/'.$id_insert)) { mkdir(__DIR__.'/data/'.$table_name.'/'.$id_insert); }
							
							if ($dir!=""){
								$LocalDir = __DIR__.'/data/'.$table_name.'/'.$id_insert.'/'.$dir;
							} else {
								$LocalDir = __DIR__.'/data/'.$table_name.'/'.$id_insert;
							}
							
							if (!is_dir($LocalDir)) { mkdir($LocalDir); }
							
							copy($inzip_dir."/".$filename,$LocalDir."/".$newFileName);
							
						}
						
				}

			}			
			
			
			
			$list_ids[$idtmp]=$id_insert;
			
		}
		
		return $list_ids;
		
	}


	function update_rows($table_name,$fieldkey,$xmlfile){
		
		global $param,$files,$inzip_dir,$outzip_dir;
		
		//print_r($param); print_r($files); exit;
		
		// carrega a tabela XML
		$xml = simplexml_load_file($xmlfile);
		
		$list_ids = array();
		
		// roda linha por linha para realizar inclusões
		foreach ($xml->ROWDATA as $row){
			
			// pega o array dos dados
			$datarow = reset($row->ROW);
			
			// remove campo de status local
			unset($datarow['RowState']);
			
			// pega id temporario
			$idtmp = $datarow[$fieldkey];
			
			// remove o campo chave
			unset($datarow[$fieldkey]);
			
			$sql_check = "SELECT COUNT(*) as qtd FROM $table_name WHERE $fieldkey='".$idtmp."'";
			
			$existe = mj("SQL>".$sql_check);
			
			if ($existe>0){
				
				$datarow = array_merge(array($fieldkey=>$idtmp),$datarow);
				
				//echo "<pre>"; print_r($datarow); exit;
				
				// atualiza os dados do registro que foi localizado
				mj("SQLUPDATE>$table_name",$datarow);
				
			} else {
				
				if ($param['forceUpdateInsert']) {
					// atualiza os dados do registro que foi localizado
					$idtmp = mj("SQLINSERT>$table_name",$datarow);								
				} else {
					// atualiza os dados do registro que foi localizado
					//$list_ids[$idtmp]=$idtmp;
					continue;
				}
			}
			
			
			
			// inclusão de arquivo na tabela
			if ($param['UpdateDBFile_'.$table_name]!=""){

				$part = explode('|',$param['UpdateDBFile_'.$table_name]);
				
				$listFile = array();
				
				foreach($part as $p){
					$t = explode(";",$p);
					
					// separa pelo ID enviado
					if (!is_array($listFile[$t[0]])) $listFile[$t[0]] = array();
					
					$listFile[$t[0]][$t[1]] = array('dir'=>$t[2]);
					
				}
				//echo $idtmp."<---";
				//print_r($listFile); exit;
				
				if (array_key_exists($idtmp,$listFile)) {

						foreach($listFile[$idtmp] as $filename => $configFile){

							// pega o diretorio e nome do arquivo
							$dir 			= $configFile['dir'];
							
							if ($configFile['new']!=""){
								$newFileName = $configFile['new'];
							} else {
								$newFileName = $filename;
							}

							if (!is_dir(__DIR__.'/data')) { mkdir(__DIR__.'/data'); }
							if (!is_dir(__DIR__.'/data/'.$table_name)) { mkdir(__DIR__.'/data/'.$table_name); }
							if (!is_dir(__DIR__.'/data/'.$table_name.'/'.$idtmp)) { mkdir(__DIR__.'/data/'.$table_name.'/'.$idtmp); }
							
							if ($dir!=""){
								$LocalDir = __DIR__.'/data/'.$table_name.'/'.$idtmp.'/'.$dir;
							} else {
								$LocalDir = __DIR__.'/data/'.$table_name.'/'.$idtmp;
							}
							
							if (!is_dir($LocalDir)) { mkdir($LocalDir); }
							
							copy($inzip_dir."/".$filename,$LocalDir."/".$newFileName);
							
						}
						
				}

			}			
			
			$list_ids[$idtmp]=$idtmp;
			
		}
		
		return $list_ids;
		
	}



	function ids_text($list_ids){
		$saida = "";
		foreach ($list_ids as $k=>$v){
			if ($saida!="") { $saida .= "|";}
			$saida .= $k."=".$v;
		}
		return $saida;
		
	}



	function myFields($fields){
		
		// prepara saida
		$saida = array();
		
		// roda todos os campso enviados pelo XML
		foreach($fields as $myField){
			
			$saida[$myField[Field]] = $myField;
			
			if ($saida[$myField[Field]][Type]=='int') { $saida[$myField[Field]][Type] = 'int(11)'; }
			if ($saida[$myField[Field]][Type]=='smallint') { $saida[$myField[Field]][Type] = 'smallint(6)'; }
			
		}
		
		return $saida;
		
	}

	function xmlFields($fields){
		
		// prepara saida
		$saida = array();
		
		//print_r($fields); exit;
		
		// roda todos os campso enviados pelo XML
		foreach($fields as $xmlField){
			
			
			
			$xmlFieldName = reset($xmlField[attrname]);
			$saida[$xmlFieldName][Field] = $xmlFieldName;
			$xmlSize = 0;
			
			// tratando o type do XML
			if ($xmlField[fieldtype]=='i4'){
				$xmlType = 'int';
				$xmlSize = '11';
			} else if ($xmlField[fieldtype]=='i2'){
				$xmlType = 'int';
				$xmlSize = '11';
				if ($xmlField[SUBTYPE]=='Autoinc'){
					$saida[$xmlFieldName][Extra] = 'auto_increment';
				}
					
			} else if ($xmlField[fieldtype]=='i2'){
				$xmlType = 'smallint';
				$xmlSize = '6';
			} else if ($xmlField[fieldtype]=='i8'){
				$xmlType = 'int';
				$xmlSize = '11';
				$saida[$xmlFieldName][Extra] = 'auto_increment';				
			} else if ($xmlField[fieldtype]=='ui2'){
				$xmlType = 'smallint';
				$xmlSize = '6';
			} else if ($xmlField[fieldtype]=='r8'){
				$xmlType = 'float';
				if ($xmlField[SUBTYPE]=='Money'){
					$xmlSize = '15,2';
				}
			} else if ($xmlField[fieldtype]=='SQLdateTime'){
				$xmlType = 'timestamp';		
			} else if ($xmlField[fieldtype]=='bin.hex'){
				$xmlType = 'blob';	
				if ($xmlField[SUBTYPE]!='Binary'){
					$xmlType = 'text';
				}
			} else if ($xmlField[fieldtype]=='string'){
				$xmlType = 'varchar';				
			} else {
				$xmlType = strtolower( $xmlField[fieldtype] );
			}			
			
			// verifica se vamos usar o tamanho
			if ($xmlField[WIDTH]) {
				$xmlSize = $xmlField[WIDTH];
			}			
			
			if ($xmlSize) { $xmlType .= "(".$xmlSize.")"; }
			
			$saida[$xmlFieldName][Type] = $xmlType;
			
			
			
		}
		
		
		return $saida;
		
	}

	function check_auto_increment_unmark($myFields,$table_name){
		
		if (is_array($myFields)) foreach($myFields as $myField){
			
			// existe algum campo que tenha marcação com auto_increment?
			if ($myField[Extra]=='auto_increment'){
			
				alterTable_Change(false,$table_name,$myField[Name],$myField[Type],false);
			}
		}			
		
	}

	function alterTable_Add($myFields,$table_name,$name,$type,$auto_inc=false){
		if ($auto_inc){
			
			check_auto_increment_unmark($myFields,$table_name);
			
			mj("SQL>ALTER TABLE $table_name ADD COLUMN $name $type NOT NULL AUTO_INCREMENT,ADD KEY($name) , DROP PRIMARY KEY, ADD PRIMARY KEY ($name); ");
		} else {
			mj("SQL>ALTER TABLE $table_name ADD COLUMN $name $type NULL");
		}
	}

	function alterTable_Change($myFields,$table_name,$name,$newname,$type,$auto_inc=false){
		
		if (trim($name)=="") { return false; }
		if (trim($newname)=="") { return false; }
		
		if ($auto_inc){
			
			check_auto_increment_unmark($myFields,$table_name);
			
			$sql = "ALTER TABLE $table_name CHANGE $name $newname $type NOT NULL AUTO_INCREMENT,ADD KEY($name), DROP PRIMARY KEY, ADD PRIMARY KEY ($name);";
			
			mj("SQL>".$sql);
			
			
		} else {
			
			$sql = "ALTER TABLE $table_name CHANGE $name $newname $type NULL";
			
			mj("SQL>".$sql);
		}
		
	}

	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@ CLIENT DATA SET @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	function filecds($path,$table_name,$table,$fields=false){
		
		$filename = createcds(array(
			table_name=>$table_name,
			fields=>$fields,
			data=>$table,
			path =>$path
		));
		
		// vamos criar nosso banco de dados local
		if ($filename){
			return $filename;
		} else {
			return false;
		}
		
	}


	function createcds($param=array()){

		// ajusta duplicidade de barra
		$file_name = $param[path]."/".$param[table_name].'.xml';
		
		// exporta os dados e retorna o script
		$script = exportcds($param);

		//caso exista um banco remove
		if (file_exists($file_name)) { unlink($file_name); }
		
		file_put_contents($file_name,$script);
				
		// não existe retorno
		return $file_name;

	}


	function exportcds($param=array()){

		// inicia variavel de construção
		$create_sql  = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'."\n";
		$create_sql .= '    <DATAPACKET Version="2.0">'."\n";

		// inicia variavel de criação
		$line_fields = "";

		// inicia variavel de inclusão
		$line_fields_insert = "";

		// armazena localmente as colunas que vão ser exportadas
		$listaField = (!$param[fieds]?array():$param[fieds]);
		
		if (!$param[fieds]){
			
			// pega pelos dados
			$tmp = reset($param[data]);

			// preenche os campos da tabela $data
			foreach ($tmp as $field_name => $tmp_data){
				$listaField[$field_name] = 'string';
			}
		}

		// monta lista de campos que vão para tabela
		if (is_array($param[nofield])){
			// remove os campos que não fazem parte
			foreach($param[nofield] as $nf){ unset($listaField[$nf]); }				
		}
		
		// inicia metada dos fields
		$create_sql .= '      <METADATA>'."\n".'        <FIELDS>'."\n";
		
		// roda o loop de campos
		foreach($listaField as $name => $type) {

			$tmp = explode(":",$type);
			
			if (count($tmp)>1) {
				$_type = $tmp[0];
				$_size = ' WIDTH="'.$tmp[1].'"';
			} else {
				$_type = $type;
				$_size = ' WIDTH="250"';
			}
			
			$create_sql .= '          <FIELD attrname="'.$name.'" fieldtype="'.$type.'" '.$_size.' />'."\n";

		}
		$create_sql .= '        </FIELDS>'."\n";		
		//$create_sql .= '        <PARAMS DEFAULT_ORDER="1" PRIMARY_KEY="1" LCID="2057"/>'."\n";		
		$create_sql .= '      </METADATA>'."\n";

		$create_sql .= '      <ROWDATA>'."\n";
		
		// roda as linhas para iniciar inclusão
		foreach($param[data] as $row){

			$create_sql .= '        <ROW ';
			
			foreach($row as $f => $value) {


				//verifica se o campo existe na lista
				if (array_key_exists($f,$listaField)) { 

					$create_sql .= $f.'="'.$value.'" ';

				}
				

			}
			$create_sql .= ' />'."\n";
	
		}
		$create_sql .= '      </ROWDATA>'."\n";
		
		$create_sql .= '    </DATAPACKET>'."\n";		

		// retorna o script para usuário
		return $create_sql;

	}		




	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@ SQL LITE 3 @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



	
	function filesqlite3($path,$table_name,$table,$fields=false){
		
		$filename = createsqlite(array(
			table_name=>$table_name,
			fields=>$fields,
			data=>$table,
			path =>$path
		));
		
		// vamos criar nosso banco de dados local
		if ($filename){
			return $filename;
		} else {
			return false;
		}
		
	}

	function createsqlite($param=array()){

		// ajusta duplicidade de barra
		$file_name = $param[path]."/".$param[table_name].'.binlite';

		// exporta os dados e retorna o script
		$script = exportsqlite($param);

		//caso exista um banco remove
		if (file_exists($file_name)) { unlink($file_name); }
		
		$db = new SQLite3($file_name,$data);
			
		// instancia objeto do sqllite
		if ($db) {

			// executa script de criação
			$db->exec($script);

			// não existe retorno
			return $file_name;

		} else {
			return false;
		}						
	}

	function exportsqlite($param=array()){

		// inicia variavel de construção
		$create_sql = "CREATE TABLE `".$param[table_name]."` (";

		// inicia variavel de criação
		$line_fields = "";

		// inicia variavel de inclusão
		$line_fields_insert = "";

		// armazena localmente as colunas que vão ser exportadas
		$listaField = (!$param[fieds]?array():$param[fieds]);
		
		if (!$param[fieds]){
			
			// pega pelos dados
			$tmp = reset($param[data]);

			// preenche os campos da tabela $data
			foreach ($tmp as $field_name => $tmp_data){
				$listaField[$field_name] = 'string';
			}
		}

		// monta lista de campos que vão para tabela
		if (is_array($param[nofield])){
			// remove os campos que não fazem parte
			foreach($param[nofield] as $nf){ unset($listaField[$nf]); }				
		}

		// roda o loop de campos
		foreach($listaField as $name => $type) {

			// prepara separação de virgula nas variaveis
			if ($line_fields!="") { 
				$line_fields.=","; 
				$line_fields_insert.=",";
			}

			// realiza monagem da linha de criação
			if ($type=='varchar') {
				$line_fields .= $name." string";
			} else if ($type=='text') {
				$line_fields .= $name." string";
			} else {
				$line_fields .= $name." ".$type;
			}

			// prepara varivael de inclusão
			$line_fields_insert .= $name;

		}

		// encerra variavel de construção da tabela
		$create_sql .= $line_fields.");";

		// incia variavel de inclusão de dados
		$line_insert = "";

		// roda as linhas para iniciar inclusão
		foreach($param[data] as $row){

			if ($line_insert!=""){$line_insert.=";\n";}

			$tmp = "(";

			foreach($row as $f => $value) {

				//verifica se o campo existe na lista
				if (array_key_exists($f,$listaField)) { 

					// tratamento da virgula
					if ($tmp!="(") { $tmp .= ","; }

					$tmp .= "'".addslashes($value)."'";  

				}


			}
	

			// começa a fazer a inclusão dos dados
			$line_insert .= "INSERT INTO ".$param[table_name]." (".$line_fields_insert .") \nVALUES ".$tmp.");";
		}

		if ($param[modo]=='update') {
			// retorna o script para usuário
			return $line_insert;
		} else {
			// salva script no diretorio
			//mj("FILE>".$file_name,$create_sql.$line_insert);		

			// retorna o script para usuário
			return $create_sql.$line_insert;
		}

	}		


	
			
?>