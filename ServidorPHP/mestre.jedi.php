<?
/*
	######################################################################################################
	Olá programadores! Sejam bem vindos a função Mestre Jedi, que tem por objetivo auxiliar os
	programdores de php na otimização de comandos. Utilize com moderação!
	
	Este arquivo esta sendo lançamento como versão 1.0
	Qualquer dúvida envie e-mail para junior@kupsoft.com
	
	PS: Esta função e um exemplo do que sou capaz de fazer, mas exisem diversas outras como esta. Mas são
	exclusivas para associados. Visite mestejedi.kupsoft.com
	######################################################################################################
	
*/
/*
error_reporting(-1);
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_BAIL, 0);
assert_options(ASSERT_QUIET_EVAL, 0);
assert_options(ASSERT_CALLBACK, 'assert_callcack');
set_error_handler('error_handler');
set_exception_handler('exception_handler');
register_shutdown_function('shutdown_handler');

function assert_callcack($file, $line, $message) {
    throw new Customizable_Exception($message, null, $file, $line);
}

function error_handler($errno, $error, $file, $line, $vars) {
    if ($errno === 0 || ($errno & error_reporting()) === 0) {
        return;
    }

    throw new Customizable_Exception($error, $errno, $file, $line);
}

function exception_handler(Exception $e) {
    // Do what ever!
    echo '<pre>', print_r($e, true), '</pre>';
    exit;
}

function shutdown_handler() {
    try {
        if (null !== $error = error_get_last()) {
            throw new Customizable_Exception($error['message'], $error['type'], $error['file'], $error['line']);
        }
    } catch (Exception $e) {
        exception_handler($e);
    }
}

class Customizable_Exception extends Exception {
    public function __construct($message = null, $code = null, $file = null, $line = null) {
        if ($code === null) {
            parent::__construct($message);
        } else {
            parent::__construct($message, $code);
        }
        if ($file !== null) {
            $this->file = $file;
        }
        if ($line !== null) {
            $this->line = $line;
        }
    }
}
*/

if (!$mestre_jedi) {
	
	eval(base64_decode("JGtleV9zeXN0ZW0gPSAiMjE0ZWNhMGJmNjk3OTkwMDg5YTNiOTIwMDVlMTFiZjMiOw=="));
	
	$global_end_time = 0;
	
	function microtime_float() { 
		list($usec, $sec) = explode(" ", microtime()); 
		return ((float)$usec + (float)$sec); 
	} 
	
		
	GLOBAL $mestre_jedi;
	
	$mestre_jedi = true;	
	
	function mj($key,$param1='',$param2='',$param3='',$param4='',$param5='',$param6='',$param7=''){
	
		GLOBAL $relatorio_mysql;
		GLOBAL $global_end_time;
		
		// inicia lista de retornos
		$_value 		= array();
		$_id 			= array();
		$_id_value		= array();
		$_list			= array();	
			
		// indica se vamos retornar um array
		$return_is_array 			= false;
		$return_is_array_index		= false;
		$return_is_array_assoc		= false;
		$return_is_array_id_value	= false;
		$return_is_first_array 		= false;
		$return_is_first_array_index = false;
		$return_is_first_array_assoc = false;
		$return_is_first_array_id_value = false;
		
		// detecta comandos primarios
		$primary_command = explode(":",$key,2); 
	
		// verifica quantos atributos existem
		if (count($primary_command) > 1) { 	
	
			// atualiza a key
			$key = $primary_command[1];
			
			if ($primary_command[1]) { $secondary_command = explode(">",$primary_command[1],2);	}
			
			// neste caso trabalha o retorno como array
			// ############ TUDO EM MAIUSCULO
			switch ( $primary_command[0] ) {
				
				case "xml":$action = "LOAD_XML"; break;			
				case "gia":$action = "GET_INTERVALO_ARRAY"; break;			
				case "gis":$action = "GET_INTERVALO_SQL"; break;
				case "color":$action = "COLOR"; break;
				case "zip":$action = "ZIP"; break;
				case "unzip":$action = "UNZIP"; break;
				case "youtube":$action = "GET_YOUTUBE"; break;
				case "dext":$action = "DATA_POR_EXTENSO"; break;
				case "pwd":$action = "CREATE_PASSWORD"; break;
				case 'moeda': $action = "MOEDA"; break;
				case 'ascii': $action = "toAscii";  break;						
				case 't': $action = "TEXT_TO_LANGUAGE";  break;			
				case 'WB': $action = "WINDOWS_BARRA";  break;
				case 'dev': $action = "MODE_DEVELOPER";  break;						
				case 'dp': $action = "DUPLICATE_DIR_FILE";  break;			
				case 'rn': $action = "RENAME_DIR_FILE";  break;			
				case 'rm': $action = "REMOVE_DIR_FILE";  break;
				case 'sb': $action = "LIMIT_STRING";  break;
				case 'ls': $action = "LIST_DIR";  break;						
				case 'lsall': $action = "LIST_DIR_ALL";  break;
				case 'mf': $action = "MOVE_UPLOAD_FILE";  break;						
				case 'mk': $action = "MK_DIR";  break;						
				case 'rm': $action = "RM_DIR";  break;									
				case 'gc': $action = "GET_CONTROL";  $key = $secondary_command[0]; $line_command = $secondary_command[1]; break;						
				case 'dde': $action = "DIFF_DATE_EXT";  break;			
				case 'dd': $action = "DIFF_DATE";  break;
				case 'dm': $action = "DATA_MYSQL"; $key = $primary_command[1]; break;						
				case 'md': $action = "MYSQL_DATA"; $key = $primary_command[1]; break;	
				case 'ud': $action = "ULTIMO_DIA";  break;	
															
				case 'js': $action = "JAVASCRIPT";  break;			
				case 'css': $action = "STYLESCRIPT";  break;			
				case 'v': $action = "VALID_FIELD_TYPE";  break;
				case 'a': $return_is_first_array = true;  break;
				case '0': $return_is_first_array_index = true; break;
				case '1': $return_is_first_array_assoc = true; break;
				case '2': $return_is_first_array_id_value = true;	break;
				case 'la': $return_is_array = true; break;
				case 'l0': $return_is_array_index = true; break;
				case 'l0a': $return_is_array_index = true; $return_is_array_index_assoc = true; break;			
				case 'l1': $return_is_array_assoc = true; break;
				case 'l2': $return_is_array_id_value = true;	break;
				case 'l3': $return_is_array_list = true;	break;
				
			}
			
			
		} else {
		
			// comando direto
			switch ( $key ) {
				case "xml":$action = "LOAD_XML"; break;
				case "gia":$action = "GET_INTERVALO_ARRAY"; break;			
				
				case "gis":$action = "GET_INTERVALO_SQL"; break;			
				case "color":$action = "COLOR"; break;
				case "zip":$action = "ZIP"; break;			
				case "unzip":$action = "UNZIP"; break;						
				case "youtube":$action = "GET_YOUTUBE"; break;			
				case "dext":$action = "DATA_POR_EXTENSO"; break;
				case "pwd":$action = "CREATE_PASSWORD"; break;			
				case 'moeda': $action = "MOEDA"; break;
				case 'ascii': $action = "toAscii";  break;							
				case 't': $action = "TEXT_TO_LANGUAGE";  break;						
				case '"': $action = "INSERT_ASPAS_DUPLA";  break;	
				case "'": $action = "INSERT_ASPAS_SIMPLES";  break;			
				case 'color': $action = "COLOR";  break;					
				case 'dev': $action = "MODE_DEVELOPER";  break;						
				case 'dp': $action = "DUPLICATE_DIR_FILE";  break;						
				case 'r': $action = "REPLACE";  break;
				case 'r{$': $action = "REPLACE_CHAVE_DOLAR";  break;
				case 'r{': $action = "REPLACE_CHAVE";  break;
				case 'r[': $action = "REPLACE_COCHETE";  break;			
				case 'dde': $action = "DIFF_DATE_EXT";  break;			
				case 'dd': $action = "DIFF_DATE";  break;
				case 'dm': $action = "DATA_MYSQL"; $key = $param1; break;						
				case 'md': $action = "MYSQL_DATA" ;$key = $param1; break;												
				case 'gc': $action = "GET_CONTROL";	$key = $secondary_command[0]; $line_command = $secondary_command[1]; break;						
				case 'ud': $action = "ULTIMO_DIA";  break;	  
				case 'mk': $action = "MK_DIR";  break;
				case 'rm': $action = "RM_DIR";  break;							
				case 'mf': $action = "MOVE_UPLOAD_FILE";  break;						
				case 'ls': $action = "LIST_DIR";  break;
				case 'lsall': $action = "LIST_DIR_ALL";  break;
				case 'sb': $action = "LIMIT_STRING";  break;
				case 'rm': $action = "REMOVE_DIR_FILE";  break;			
				case 'WB': $action = "WINDOWS_BARRA";  break;
				case 'rn': $action = "RENAME_DIR_FILE";  break;			
				
			
			}
			
			$secondary_command = explode(">",$key,2);
		}
		
		// inclusão de aspas duplas
		if (strtoupper($action)=='INSERT_ASPAS_DUPLA'){	
			return '"'.$param1.'"';
		} 
	
		// inclusão de aspas duplas
		if (strtoupper($action)=='INSERT_ASPAS_SIMPLES'){	
			return "'".$param1."'";
		} 
		
		// verifica qual o nivel do control
		if (strtoupper($action)=='WINDOWS_BARRA'){	
			
			
			if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
				// pega a raiz  identifica qua
				$WB = "\\";
			} else {
				$WB = "/";
			}		
			
			// caso não tenha repassado tratamento retrna a barra		
			if (!$param1) return $WB;
			
			// muda todas as barras para o padrão do servidor
			$param1 = str_replace("/",$WB,str_replace("\\",$WB,$param1)); 
	
			// busca referencia do arquivo
			$info_arquivo = pathinfo($param1);		
			$info_arquivo[dir] = $info_arquivo[dirname].$WB;
			if ((substr($info_arquivo[dir],0,1)=="\\") or (substr($info_arquivo[dir],0,1)=="/")){
				$info_arquivo[dirnoraiz] = substr($info_arquivo[dir],1,strlen($info_arquivo[dir]));
			}else  {
				$info_arquivo[dirnoraiz] = $info_arquivo[dir];
			}
			$info_arquivo[file] = $info_arquivo[filename];
			$info_arquivo[filename] = $info_arquivo[basename];
			if ((substr($info_arquivo[dir],0,1)=="\\") or (substr($info_arquivo[dir],0,1)=="/")){
				$info_arquivo[noraiz] = substr($info_arquivo[dir],1,strlen($info_arquivo[dir])).$info_arquivo[filename];
			}else {
				$info_arquivo[noraiz] = $info_arquivo[dir].$info_arquivo[filename];			
			}
			$info_arquivo[full] = getcwd().$info_arquivo[dir].$info_arquivo[filename];
	
			// ajusta param1
			$param1 = $info_arquivo[dir].$info_arquivo[filename];
			$param1 = str_replace("\\\\",$WB,str_replace("//",$WB,$param1));
			$param1 = str_replace("\\\\",$WB,str_replace("//",$WB,$param1));
	
			// caso seja informado algum tratamento na busca
			if ($param2) { return $info_arquivo[$param2]; } else {
				return $param1;
			}
	
	
		}
	
	
		// existe comando secundario
		if (count($secondary_command)>1) {
	
			// verifica qual o nivel do control
			if (strtoupper($action)=='LIMIT_STRING'){
	
				// definie o tipo de ação
				$key = $secondary_command[0];
				
				// grava linha de comando		
				$line_command = $secondary_command[1];
	
			
			// neste caso trabalha o retorno como array
			} else if (strtoupper($secondary_command[0])=='REFILE'){
				// definie o tipo de ação
				$action = 'REFILE';
	
				// grava linha de comando		
				$line_command = $secondary_command[1];
			
			// neste caso trabalha o retorno como array
			} else if (strtoupper($secondary_command[0])=='FILEEXT'){
				// definie o tipo de ação
				$action = 'FILEEXT';
	
				// grava linha de comando		
				$line_command = $secondary_command[1];
	
			// neste caso trabalha o retorno como array
			} else if (strtoupper($secondary_command[0])=='FILE'){
	
				// definie o tipo de ação
				$action = 'FILE';
	
				// grava linha de comando		
				$line_command = $secondary_command[1];
	
	
			// neste caso trabalha o retorno como array
			} else if (strtoupper($secondary_command[0])=='SQL'){

				// definie o tipo de ação
				$action = 'SQL';		
	
				// grava linha de comando		
				$line_command = $secondary_command[1];
	
				// coloquei um tratamento pra substituir valores do parametro
				$line_command = @sprintf($line_command,$param1,$param2,$param3,$param4,$param5,$param6,$param7);
	
				if (!$line_command){
					$line_command = $secondary_command[1];
				}
	//			echo $line_command."<hr>";			
	
			// neste caso executa inclusão dos dados	
			} else if (strtoupper($secondary_command[0])=='SQLCONNECT'){		
				// definie o tipo de ação
				$action = 'SQLCONNECT';		
	
				// grava linha de comando		
				$line_command = $secondary_command[1];		
			
			} else if (strtoupper($secondary_command[0])=='SQLINSERT'){
	
				// definie o tipo de ação
				$action = 'SQLINSERT';		
				
				// inicializa variaveis
				$fieldname = '';
				$fieldvalue = '';
	
				// montagem do insert
				foreach($param1 as $fieldname => $fieldvalue) {
					if ($line_field!='') { $line_field .= ',';}
					if ($line_value!='') { $line_value .= ',';}
					$line_field .= $fieldname;
					if ($fieldvalue==NULL) {
						$line_value .= "NULL";
					} else {
						$line_value .= "'".$fieldvalue."'";				
					}
				}
				
				// retorna linha de comando para sql
				$line_command = "INSERT INTO ".$secondary_command[1]." (".$line_field.") VALUES (".$line_value.")";
	
			// neste caso executa inclusão dos dados	
			} else if (strtoupper($secondary_command[0])=='SQLUPDATE'){
	
				// definie o tipo de ação
				$action = 'SQLUPDATE';		
				
				// verifica se existe where
				$where = explode(">",$secondary_command[1],2);
				
				// indica que existe filtro
				if ( count($where) > 1 ) {
					$secondary_command[1] 	= $where[0];
					$where 					= $where[1];
				} else {
					
					// caso não tenha informado o where, verifica o primeiro campo
					foreach($param1 as $fname => $fvalue) {
	
						// monta filtro
						if ($fvalue==NULL) {
							$where = $fname."=NULL";
						} else {
							$where = $fname."='".$fvalue."'";
						}
	
						// caso primeiro campo seja meno que 0 limpa o where, não e campo ID
						if ($fvalue <= 0) {
							// limpa o filtro
							$where = '';
						} else {
							// remove o primeiro campo da atualização
							array_shift($param1);	
						}
	
						break;
					}
					
				}
				
				// inicializa variaveis
				$fieldupdate = '';
	
				// montagem do insert
				foreach($param1 as $fieldname => $fieldvalue) {
					if ($fieldupdate!='') { $fieldupdate .= ',';}
					if ($fieldvalue==NULL) {
						$fieldupdate .= $fieldname."=NULL";
					} else {
						$fieldupdate .= $fieldname."='". $fieldvalue ."'";
					}
				}
				
				// retorna linha de comando para sql
				if ($where==''){
					$line_command = "UPDATE ".$secondary_command[1]." SET ".$fieldupdate."";
				} else {
					$line_command = "UPDATE ".$secondary_command[1]." SET ".$fieldupdate." WHERE ".$where;
				}
				
			// neste caso executa inclusão dos dados	
			} else if (strtoupper($secondary_command[0])=='SQLDELETE'){
	
				// definie o tipo de ação
				$action = 'SQLDELETE';		
	
				// verifica se existe where
				$where = explode(">",$secondary_command[1],2);
				
				// indica que existe filtro
				if ( count($where) > 1 ) {
					$secondary_command[1] 	= $where[0];
					$where 					= $where[1];
				} else {
					
					// caso não tenha informado o where, verifica o primeiro campo
					foreach($param1 as $fname => $fvalue) {
	
						// monta filtro
						$where = $fname."='".$fvalue."'";
	
						// caso primeiro campo seja meno que 0 limpa o where, não e campo ID
						if ($fvalue <= 0) {
							// limpa o filtro
							$where = '';
						} else {
							// remove o primeiro campo da atualização
							array_shift($param1);	
						}
	
						break;
					}
					
				}
							
				// retorna linha de comando para sql
				if ($where==''){
					//$line_command = "DELETE FROM ".$secondary_command[1]; REMOVE TUDO
				} else {
					$line_command = "DELETE FROM ".$secondary_command[1]." WHERE ".$where;
				}
				
			} else if (strtoupper($secondary_command[0])=='MOEDA'){
	
				$line_command = $secondary_command[1];
				$action = 'MOEDA';
	
			} else if (strtoupper($secondary_command[0])=='ULTIMO_DIA'){
				
				$line_command = $secondary_command[1];
				$action = 'ULTIMO_DIA';				
				
			} else if (strtoupper($secondary_command[0])=='MK_DIR'){
				$line_command = $secondary_command[1];
				$action = 'MK_DIR';							
			} else if (strtoupper($secondary_command[0])=='RM_DIR'){
				$line_command = $secondary_command[1];
				$action = 'RM_DIR';							
	
			} else if (strtoupper($secondary_command[0])=='GET_INTERVALO_SQL'){
				$line_command = $secondary_command[1];
				$action = 'GET_INTERVALO_SQL';
			} else if (strtoupper($secondary_command[0])=='LOAD_XML'){
				$line_command = $secondary_command[1];
				$action = 'LOAD_XML';			
			} else if (strtoupper($secondary_command[0])=='GET_INTERVALO_ARRAY'){
				$line_command = $secondary_command[1];
				$action = 'GET_INTERVALO_ARRAY';			
			} else if (strtoupper($secondary_command[0])=='GET_YOUTUBE'){
				
				$line_command = $secondary_command[1];
				$action = 'GET_YOUTUBE';				
				
			}
			
		} else {
			
			// atualiza a linha de comando
			$line_command = $primary_command[1];
	
			
		}
		
		
	//######################################################################################################################################################
	//######################################################################################################################################################
	//######################################################################################################################################################
	//######################################################################################################################################################
	//######################################################################################################################################################
	//######################################################################################################################################################
	// IMPLEMENTAÇÂO
	
	
		// executa ação demandada
		switch ($action) {
			case "GET_INTERVALO_SQL":
	
				$field = $param1;			
				$str = $param2;
				
				// carrega lita de intervalo
				$li = explode(';',$str);		
				
				$return = '';
				
				foreach($li as $i){
					
					$part = explode('-',$i);
					
					if ($return!='') { $return .= " and "; }
					
					if (count($part)>1) {
						$return .= " (".$field.">='".$part[0]."' and ".$field."<='".$part[1]."') ";
					} else {
						$return .= " ".$field."='".$i."' ";
					}
				}
				return $return;
				
			break;
			/*
			case "LOAD_XML":
				echo $key; exit;
				if (is_dir($key)){
					echo "Você esta tentando carregar um xml, informou somente o diretorio \"$key\"!";
					exit;
				}
	
				// informações do arquivo e do diretorio
				$xml_info_file = pathinfo($key);
	
				#versao do encoding xml
				$dom = new DOMDocument("1.0", "ISO-8859-1");
				$dom->preserveWhiteSpace = false;			
				$dom->formatOutput = true;
				
				//echo "<pre>";
				//echo $key;
				//echo "<hr>";			
				//echo "<textarea style='width:100%' rows=30>".mj("FILE>".$key)."</textarea>";
				//echo "<hr>";
				
				
				// verifica se existe
				if (file_exists($key)) {
					
					// carrega o xml
					$dom->load($key);
					
					// editar algum item
					foreach($dom->documentElement->childNodes as $index => $item) {
						
						// prepara para receber valores do node
						$fields_temp = array();
						$id = 0;
						
						// captura os campos do xml
						foreach($item->childNodes as $node) {
							if ($node->nodeName!='id') {
								$fields_temp[$node->nodeName] = $node->nodeValue;
							} else {
								$id = $node->nodeValue;
							}
						}
						
					}
					
					// pega ultimo id
					$last_id = $id;
	
					# raiz				
					$root = $dom->documentElement;
	
					if ( (is_array($param1)) && is_array(reset($param1))) {
						
						foreach($param1 as $item){
							
							#localizar node
							if ($item[id] > 0) {
								
								$element = false;
								
								#carrega o elemento
								foreach($root->childNodes  as $localize_item){
									
									// verifica se o ID e igual
									if ($localize_item->childNodes->item(0)->nodeValue==$item[id]) {
										$element = $localize_item;
										break;
									}
								}
								
								if (!$element) continue;
								
								# remover ou editar							
								if ($item[delete]) {
									if ($element->getElementsByTagName('id')->item(0)->nodeValue == $item[id]) {
										$element->parentNode->removeChild($element);
									}
								} else {
									foreach($item as $fieldName=>$fieldValue) {
										$ItemElement = $element->getElementsByTagName($fieldName)->item(0);
										$ItemElement->nodeValue = $fieldValue;
										$element->replaceChild($ItemElement,$ItemElement);
									}
								}
							} else {
								$last_id += 1;
										
								# add multiple item 
								$newItem = $dom->createElement("item","");
								$newItem->appendChild($dom->createElement("id",$last_id));
								
								foreach($item as $fieldName=>$fieldValue) {
									$newItem->appendChild($dom->createElement($fieldName,$fieldValue));
								}
								$root->appendChild($newItem);
							}
							
						}
	
						#add root to xml
						$dom->appendChild($root);
	
						
					} else {
						
						#localizar node
						if ($param1[id] > 0) {
	
	
							$element = false;
							
							#carrega o elemento
							foreach($root->childNodes  as $localize_item){
								
								// verifica se o ID e igual
								if ($localize_item->childNodes->item(0)->nodeValue==$param1[id]) {
									$element = $localize_item;
									break;
								}
							}
							
							if (!$element) continue;
							
							# remover ou editar
							if ($param1[delete]) {
								
								# removendo o id correto
								if ($element->getElementsByTagName('id')->item(0)->nodeValue == $param1[id]) {
									$element->parentNode->removeChild($element);
								}
							} else {
								foreach($param1 as $fieldName=>$fieldValue) {
									$ItemElement = $element->getElementsByTagName($fieldName)->item(0);
									$ItemElement->nodeValue = $fieldValue;
									$element->replaceChild($ItemElement,$ItemElement);
								}
							}
	
							#add root to xml
							$dom->appendChild($root);							
							
						} else {
							
							$last_id += 1;
							
							if ($param1) {
								# add item unique
								$newItem = $dom->createElement("item","");
								$newItem->appendChild($dom->createElement("id",$last_id));
	
								foreach($param1 as $fieldName=>$fieldValue) {
									$newItem->appendChild($dom->createElement($fieldName,$fieldValue));
								}				
								#add item to root
								$root->appendChild($newItem); 
	
								#add root to xml
								$dom->appendChild($root);							
							}
						}
						
					}
					
					# Para salvar o arquivo, descomente a linha
					if ($param1) $dom->save($key);
				} else {
					
					# criar raiz
					$root = $dom->createElement("root");
					
					$last_id = 1;
					
					if ( (is_array($param1)) && is_array(reset($param1))) {
						
						# inclusão da lista completa
						foreach($param1 as $item){
							
							# add item unique
							$newItem = $dom->createElement("item","");
							$newItem->appendChild($dom->createElement("id",$last_id));
							
							foreach($item as $fieldName=>$fieldValue) {
								$newItem->appendChild($dom->createElement($fieldName,$fieldValue));
							}
							#add item to root
							$root->appendChild($newItem);			
							$last_id +=1;
						}
						
					} else {
						
						if ($param1) {
							# add item unique
							$newItem = $dom->createElement("item","");
							$newItem->appendChild($dom->createElement("id",$last_id ));
							
							print_r($param1); echo "<hr>";
							
							# inclusão de um unico registro
							foreach($param1 as $fieldName=>$fieldValue) {
								$newItem->appendChild($dom->createElement($fieldName,$fieldValue));
							}					
							#add item to root
							$root->appendChild($newItem);			
						}
						
					}
										
					#add root to xml
					$dom->appendChild($root);
					
					# Para salvar o arquivo, descomente a linha
					$dom->save($key);
					
				}
	
				// monta retorno
				$return_xml_in_array = array();
	
				// editar algum item
				foreach($dom->documentElement->childNodes as $index => $item) {
					
					// prepara para receber valores do node
					$fields_temp = array();
					$id = 0;
	
					// captura os campos do xml
					foreach($item->childNodes as $node) {
						
						if ($node->nodeName!='id') {
							$fields_temp[$node->nodeName] = $node->nodeValue;
						} else {
							$id = $node->nodeValue;
						}
					}
	
					// informar os campos no array indexando pelo ID
					$return_xml_in_array[$id] = $fields_temp;
					
				}
				
				// envia para saida			
				return $return_xml_in_array;
			
			break;
			*/
			case "GET_INTERVALO_ARRAY":
	
				$str = $param1;		
				
				// carrega lita de intervalo
				$li = explode(';',$str);		
				
				$return = '';
				
				foreach($li as $i){
					
					$part = explode('-',$i);
					
					if (count($part)>1) {
						
						for($x=$part[0];$x<=$part[1];$x++){
							if ($return!='') { $return .= ","; }
							$return .= $x;
						}
					} else {
						if ($return!='') { $return .= ","; }
						$return .= $i;
					}
				}
				return $return;
				
			break;		
			
			case "ZIP":
				
				$outZipPath = $key;
				$z = new ZipArchive();
				$z->open($key, ZIPARCHIVE::CREATE);
				folderToZip($param1, $z);
				$z->close();
				
				return true;			
				
			break;
			case "UNZIP":
				
				$za = new ZipArchive();
				
				$zipfile = $param1;
	
				$za->open($zipfile);
				
				if ((!trim($key)) or ($key=="unzip")) {
					$todir = mj("WB",$zipfile,"dir");
				} else {
					if (!is_dir($key)) {
						mj("mk:".$key);
					}
					$todir = $key; 
				}

				$za->extractTo($todir);
				
				$return_array = array();
							
				for ($i=0; $i<$za->numFiles;$i++) {
					array_push($return_array, $za->statIndex($i) );
				}
				return $return_array;
			break;		
			case "GET_YOUTUBE":
			if (is_array($param2)) {
				$h = $param2[height];
				$w = $param2[width];
			} else {
				$h = 480;
				$w = 853;
			}
			return '<iframe width="'.$w.'" height="'.$h.'" src="'.$param1.'" frameborder="0" allowfullscreen></iframe>';
			
			break;
			case "DATA_POR_EXTENSO":
				
				$time = strtotime($param1);
				
				// leitura das datas
				$dia = date('j',$time);
				$mes = date('m',$time);
				$ano = date('Y',$time);
				$semana = date('w',$time);
				
				
				// configuração mes
				switch ($mes){
				
					case 1: $mes = "JANEIRO"; break;
					case 2: $mes = "FEVEREIRO"; break;
					case 3: $mes = "MARÇO"; break;
					case 4: $mes = "ABRIL"; break;
					case 5: $mes = "MAIO"; break;
					case 6: $mes = "JUNHO"; break;
					case 7: $mes = "JULHO"; break;
					case 8: $mes = "AGOSTO"; break;
					case 9: $mes = "SETEMBRO"; break;
					case 10: $mes = "OUTUBRO"; break;
					case 11: $mes = "NOVEMBRO"; break;
					case 12: $mes = "DEZEMBRO"; break;
				
				}
				
				
				// configuração semana
				
				switch ($semana) {
				
					case 0: $semana = "DOMINGO"; break;
					case 1: $semana = "SEGUNDA FEIRA"; break;
					case 2: $semana = "TERÇA-FEIRA"; break;
					case 3: $semana = "QUARTA-FEIRA"; break;
					case 4: $semana = "QUINTA-FEIRA"; break;
					case 5: $semana = "SEXTA-FEIRA"; break;
					case 6: $semana = "SÁBADO"; break;
				
				}
				//Agora basta imprimir na tela...
				return ucwords(mb_strtolower($semana,'UTF-8')).", $dia de ".ucwords(mb_strtolower($mes,'UTF-8'))." de $ano";
			
			break;
			case "CREATE_PASSWORD":
				
				// carrega parametros iniciais
				$tamanho = (!$param1)?8:$param1;
				$maiusculas = (!$param2)?true:$param2;
				$numeros = (!$param3)?true:$param3;
				$simbolos = (!$param4)?false:$param4;
				
				$lmin = 'abcdefghijklmnopqrstuvwxyz';
				$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$num = '1234567890';
				$simb = '!@#$%*-';
				$retorno = '';
				$caracteres = '';
				 
				$caracteres .= $lmin;
				if ($maiusculas) $caracteres .= $lmai;
				if ($numeros) $caracteres .= $num;
				if ($simbolos) $caracteres .= $simb;
				 
				$len = strlen($caracteres);
				for ($n = 1; $n <= $tamanho; $n++) {
				$rand = mt_rand(1, $len);
				$retorno .= $caracteres[$rand-1];
				}
				return $retorno;
				
			break;
			case "ULTIMO_DIA":
				
				$data = $param1;
				
				if (!$data) {
				   $dia = date("d");
				   $mes = date("m");
				   $ano = date("Y");
				} else {
				   $dia = date("d",strtotime($data));
				   $mes = date("m",strtotime($data));
				   $ano = date("Y",strtotime($data));
				}
	
				$data = mktime(0, 0, 0, $mes, 1, $ano);
	
				return date("d",$data-1);
			
			break;
			case "MOEDA":					
	
					// base de conversão
					$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
					$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
		
					
					// base de texto dos numeros
					$c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
					$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
					$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
					$u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
				
					// zera nao sei o que
					$z=0;
					
					$valor = $param1;
					
					$valor = number_format($param1, 2, ".", ".");
	
					$inteiro = explode(".", $valor);
					
					for($i=0;$i<count($inteiro);$i++)
						for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
							$inteiro[$i] = "0".$inteiro[$i];
	
					// $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
					$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
	
					for ($i=0;$i<count($inteiro);$i++) {
						
						$valor = $inteiro[$i];
						
						// leitura do primeiro grupo (centenas, milhares, milhões, etc..)
						$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
						$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
						$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
						
						// estou aplicando o valor natural
						if ($line_command=='r') {
							$aux = '';
							if ( ltrim($inteiro[$i+1], '0') > 0 ) {
								$aux .= ".".$inteiro[$i+1];
							} 
							
							$r =  ltrim($valor , '0');
						} else {
							$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;						
						}
						
						$t = count($inteiro)-1-$i;
	
						$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
						
						if ($valor == "000")$z++; elseif ($z > 0) $z--;
						// deixa adiciona os reias ao final
						if ($line_command!='r') {
							if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
						}
						if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
					}			
					
					if ($line_command=='r') {
						$tmp = explode(" milhões, ",$rt);
						if (count($tmp) > 1) {
							$rt = $tmp[0].".".$tmp[1];
							$rt = str_replace("mil","\nmilhões",$rt);
						}
						
					}
	
					return($rt ? $rt : "zero");
			
			break;
			case "toAscii":
				$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $param1);
				$clean = strtolower(trim($clean, '-'));
				$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
			
				return $clean;
				
			break;
			case "COLOR":
			
					return generateColor($param1,$param2,$param3);
					
			break;
	
			case "COLOR_ANTERIOR":
					$chars = "ABCDEF0123456789";   
					$size = strlen( $chars );
					$str = array();
					for( $i = 0; $i < $param1; $i++ ) {
						for( $j = 0; $j < 6; $j++ ) {
							$str[$i] .= $chars[ rand( 0, $size - 1 ) ];
						}
					}
					return $str;
			
			break;
	
			case "MODE_DEVELOPER":
			
			// identifica o tipo
			if (is_array($param1)){ 
				$string_files = str_replace("\\","/",implode(",",$param1));
				$firstFile = str_replace("\\","/",$param1[0]);
				$dir = str_replace("\\","/",mj("WB",$param1[0],"dir"));
			} else {
				$string_files = str_replace("\\","/",$param1);
				$firstFile = str_replace("\\","/",$string_files);
				$dir = str_replace("\\","/",mj("WB",$string_files,"dir"));
			}		
	
			
			$panel = "
					<script>
						function getDetectParent(frameName){
							
							if (parent.name=='master') {
								return parent;
							} else if (parent.parent.name=='master') {
								return parent.parent;
							} else if (parent.parent.parent.name=='master') {
								return parent.parent.parent;
							} else if (parent.parent.parent.parent.name=='master') {
								return parent.parent.parent.parent;
							} else if (parent.parent.parent.parent.parent.parent.name=='master') {
								return parent.parent.parent.parent.parent.parent;
							} else if (parent.parent.parent.parent.parent.parent.parent.name=='master') {
								return parent.parent.parent.parent.parent.parent.parent;
							} else if (parent.parent.parent.parent.parent.parent.parent.parent.name=='master') {
								return parent.parent.parent.parent.parent.parent.parent.parent;
							} else {
								alert('Entre no arquivo mestre.jedi.php e almente a capacidade da função getDetetParent!!! ');	
							}
							
						}
					</script>
			";
			$panel .= "<div onclick='getDetectParent(\"master\").openFrameDebug(\"$string_files\",\"$dir\",\"$firstFile\");' style='background-image:url(ksystem/imagens/linkdebug.png);margin:5px;width:30px;height:57px;cursor:pointer;z-index:100000;position:absolute;$param2' title='Abrir este arquivo no editor de código fonte' onmouseover='this.style.backgroundColor=\"\";' onmouseout='this.style.backgroundColor=\"\";'></div>";
						
					if (is_array($param1)) {
						
						foreach($param1 as $file) {
	
						//	$panel .= "<div >".mj("WB",$file,"filename:")."</div>";					
						
						}
					} else {
	//					$panel .= "<input type='button' value='$param1'>";
					}
				
				if ($_SESSION[DEVELOPER]=='yes'){
					return $panel;
				} else {
					return false;	
				}
				
			break;
	
			case "RENAME_DIR_FILE":
				
				//			echo $param1."|".$param2;
				
				if (!file_exists($param1)) {
					if (file_exists(getcwd().mj("WB").$param1)) {
						return rename(getcwd().mj("WB").$param1, getcwd().mj("WB").$param2);					
					} else {
						return false;
					}
				} else {
					return rename($param1, $param2);
				}
	
	
	
				echo $raiz.mj("WB").$renamefile_older;
				exit;
				echo mj("WB",$raiz.mj("WB").$renamefile_older,"full");
				exit;
			  
			  if(rename($de, $para))
				echo "Arquivo renomeado com sucesso.";
			  else
				echo "Não foi possível renomear o arquivo.";		
			
			break;
	
			// remover diretori ou arquivo
			case 'REMOVE_DIR_FILE':
				
				// trabalha com variavl key
				$key = $line_command;
				
				if ($key=='') { $key = $param1; }
				
				// tratamento para servidores WINDOWS e LINUX
				$WB = mj("WB");
				
				// muda todas as barras para o padrão do servidor
				$key = mj("WB",$key);
				
				// junta diretorio e arquivo
				if ( is_dir($key) ) {
					$dir = $key;
				} else {
					if (file_exists($key)) {
						return unlink($key);
					}
				}
				
				// caso não informe nada, indica que ele quer remover um diretorio			
				if (is_array($param1)) {
					
					// remove uma lista de arquvios
					foreach($param1 as $file) {
						unlink($dir.$WB.$file);
					}
					
				} else if (file_exists( ($dir ? $dir.$WB : "") . $param1)) {
					// remove o arquivo informado
					return unlink( ($dir ? $dir.$WB : "") . $param1 );
				} else {
					// não informou arquivo remove diretorio
					if (!is_dir($dir)) {
						if (is_dir($param1)) {
						$dir = $param1;
						}
					}
					return rmdir($dir);
				}
			
			
			break;
			
			case 'LIST_DIR_ALL':
				
				
				
				// tratamento para servidores WINDOWS e LINUX
				$WB = mj("WB");
				
				// muda todas as barras para o padrão do servidor
				$key = mj("WB",$key);
	
				// pega o endereço do diretório
				$dir = $key; 
				
				return scanDir::scan($dir, $param1, true);
				
				return listFolderFiles($dir);
			break;
	
			// inicializa fase de busca de controles
			case 'LIST_DIR':
	
				// tratamento para servidores WINDOWS e LINUX
				$WB = mj("WB");
				
				// muda todas as barras para o padrão do servidor
				$key = mj("WB",$key);
	
				// pega o endereço do diretório
				$dir = getcwd().$WB.$key; 
	//			echo $dir;
				// abre o diretório
				$point  = opendir($dir);
	
				// monta arrays de retorno			
				$itens = array();
				$dirs = array();
				$dirs_fullpath = array();
				$dirs_smallpath = array();
				
				$files = array();
				$files_fullpath = array();
				$files_smallpath = array();
				
				// monta os vetores com os itens encontrados na pasta
				while ($nome_itens = readdir($point)) {
					array_push($itens, $nome_itens);
				}			
				
				// ordena
				sort($itens);
				
				foreach ($itens as $item) { 
					if ( ($item!='.') && ($item!='..') ) {			
						if (is_dir($dir.$WB.$item)) {
							array_push($dirs,$item);
							array_push($dirs_smallpath,( $key ? $key.$WB.$item : $item));
							array_push($dirs_fullpath,$dir.$WB.$item);
						} else {
							array_push($files,$item);
							array_push($files_smallpath,( $key ? $key.$WB.$item : $item));
							array_push($files_fullpath,$dir.$WB.$item);
						}
	
					}
				}
				
				if ((is_array($param1)) && ($param1[dir]==1)) {
					if ($param1[smallpath]){
						return array_merge($dirs_smallpath,$files_smallpath);	
					} else if ($param1[fullpath]){
						return array_merge($dirs_fullpath,$files_fullpath);	
					} else {
						return array_merge($dirs,$files);	
					}
				} else if ((is_array($param1)) && ($param1[dir]==2)) {
					if ($param1[smallpath]){
						return array($dirs_smallpath,$files_smallpath);	
					} else if ($param1[fullpath]){
						return array($dirs_fullpath,$files_fullpath);	
					} else {
						return array($dirs,$files);	
					}				
				} else {
					if ((is_array($param1)) && ($param1[smallpath])){
						return $files_smallpath;	
					} else if ((is_array($param1)) && ($param1[fullpath])){
						return $files_fullpath;	
					} else {
						return $files;	
					}
	
				}
			break;
	
			// inicializa fase de busca de controles
			case 'MOVE_UPLOAD_FILE':
	
				// tratamento para servidores WINDOWS e LINUX
				$WB = mj("WB");
				
				// muda todas as barras para o padrão do servidor
				$key = mj("WB",$key);
				
				// cria o diretorio antes de salvar			
				if (!is_dir($key)) { mj("mk:$key"); }
				
				//print_r($param1);
			
				//echo getcwd().$WB.$key.$WB.$param1[name];
				
				$tmp = explode(".",$param1[name]);
				if (in_array(strtolower(end($tmp)),array('php','c','sh','exe','com','pl','cmd','bat','scr','vbs','ws'))) {	
					
					return false;
					
				} else {				

					// move o arquivo do campo informado
					move_uploaded_file($param1[tmp_name],getcwd().$WB.$key.$WB.$param1[name] );	
					
					// caso tenha alguma configuração de permissão ja executa
					if ($param2 > 0) {chmod($key.$WB.$param1[name], $param2);}

					return mj("FILE>".$key.$WB.$param1[name]);
					
				}
				//echo getcwd().$WB.$key.$WB.$param1[name];
				
			break;
			// remove diretorio ou arquivo
			case 'RM_DIR':
	
				if (!is_array($param1)) { $param1 = array($param1); }
				
				foreach($param1 as $dir) { deleteDirectory($dir); }
				
				
			break;
			// cria diretorio
			case 'MK_DIR':
	
				// tratamento para servidores WINDOWS e LINUX
				$WB = mj("WB");
	
	//			echo $key."<hr>";
	//			echo $param1;
	//			exit;
				
				$line_command = str_replace('.','',$line_command);
				
				// ja cancela
	//			if ((!$key) && (!$param1) ) return false;
				if (($key==$WB) && (!$param1==$WB) ) return false;
	
				// verifica se esta vazio
				if ($line_command!='') {
					if ($param1!='') {
						if ($line_command == $WB) {
							$list_dir = explode($WB,mj("WB",$line_command.$param1)); 
						} else  {
							$list_dir = explode($WB,mj("WB",$line_command.$WB.$param1));
						}
					} else {
						$list_dir = explode($WB,mj("WB",$line_command));
	
					}
	
				} else if ($param1) {
					$list_dir = explode($WB,$param1);
	
				} else {
					return false;
				}
				
				$dirtmp = '';
						
				// roda lista de diretorios e sai criando todos
				foreach($list_dir as $dirname){
	
					$tDIR =  mj("WB",getcwd().$WB.$dirtmp.$dirname) ;
					
					// verifica se já existe o diretorio
					if(!is_dir($tDIR)) { 
						if ( (trim($tDIR)!='') && ($tDIR!=$WB) ) {
							mkdir( $tDIR ); 
						}
					}
					$dirtmp .= $dirname.$WB;
				}
	
				return true;
			
			break;
			
			// inicializa fase de busca de controles
			case 'GET_CONTROL':
				
				if ($line_command!=''){
					// pega atributos
					$a = explode(":",$line_command);
				} else {
					
					if ($key==''){
						// pega atributos
						$a = explode(":",$param1);		
					} else {
						// pega atributos
						$a = explode(":",$key);		
					}
				}
				
				
	
				// verifica qual controle sera tratado
				switch (strtoupper($key)) {
	
					case 'SELECTEXTERNA':
	
						$a = explode(':',$line_command,3);					
						$banco = mj("l1:SQL>SELECT * FROM conta WHERE conta_idgrupo='1'");
						$return = '<select id="'.$a[0].'" name="'.$a[0].'" '.$a[2].'>';					
						foreach($banco as $item){
							$return .= 	'<option value="'.$item[conta_id].'" '.(($item[conta_id]==$a[1]) ? ' selected="selected"' : '').'>'.$item[conta_nome].'</option>';
						}
						$return .= '</select>';
						
						return $return;
						
					break;				
	
					case 'SELECTONLINE':
	
						$a = explode(':',$line_command,3);					
						$banco = mj("l1:SQL>SELECT * FROM conta WHERE conta_idgrupo='2'");
						$return = '<select id="'.$a[0].'" name="'.$a[0].'" '.$a[2].'>';					
						foreach($banco as $item){
							$return .= 	'<option value="'.$item[conta_id].'" '.(($item[conta_id]==$a[1]) ? ' selected="selected"' : '').'>'.$item[conta_nome].'</option>';
						}
						$return .= '</select>';
						return $return;
						
					break;				
	
					case 'SELECTBANCO':
	
						$a = explode(':',$line_command,3);					
						$banco = mj("l1:SQL>SELECT * FROM conta WHERE conta_idgrupo='3'");
						$return = '<select id="'.$a[0].'" name="'.$a[0].'" '.$a[2].'>';					
						foreach($banco as $item){
							$return .= 	'<option value="'.$item[conta_id].'" '.(($item[conta_id]==$a[1]) ? ' selected="selected"' : '').'>'.$item[conta_nome].'</option>';
						}
						$return .= '</select>';					
						return $return;
						
					break;				
					
					case 'SELECTUF':
	
						// Selecionando o Estado
						return "<select id=\"".$a[0]."\" name=\"".$a[0]."\" ".$a[2].">
							  <option value=\"AC\" ".(($estado=="AC") ? " selected=\"selected\"" : "").">AC</option>
							  <option value=\"AL\" ".(($estado=="AL") ? " selected=\"selected\"" : "").">AL</option>
							  <option value=\"AM\" ".(($estado=="AM") ? " selected=\"selected\"" : "").">AM</option>
							  <option value=\"AP\" ".(($estado=="AP") ? " selected=\"selected\"" : "").">AP</option>
							  <option value=\"BA\" ".(($estado=="BA") ? " selected=\"selected\"" : "").">BA</option>
							  <option value=\"CE\" ".(($estado=="CE") ? " selected=\"selected\"" : "").">CE</option>
							  <option value=\"DF\" ".(($estado=="DF") ? " selected=\"selected\"" : "").">DF</option>
							  <option value=\"ES\" ".(($estado=="ES") ? " selected=\"selected\"" : "").">ES</option>
							  <option value=\"GO\" ".(($estado=="GO") ? " selected=\"selected\"" : "").">GO</option>
							  <option value=\"MA\" ".(($estado=="MA") ? " selected=\"selected\"" : "").">MA</option>
							  <option value=\"MG\" ".(($estado=="MG") ? " selected=\"selected\"" : "").">MG</option>
							  <option value=\"MS\" ".(($estado=="MS") ? " selected=\"selected\"" : "").">MS</option>
							  <option value=\"MT\" ".(($estado=="MT") ? " selected=\"selected\"" : "").">MT</option>
							  <option value=\"PA\" ".(($estado=="PA") ? " selected=\"selected\"" : "").">PA</option>
							  <option value=\"PB\" ".(($estado=="PB") ? " selected=\"selected\"" : "").">PB</option>
							  <option value=\"PE\" ".(($estado=="PE") ? " selected=\"selected\"" : "").">PE</option>
							  <option value=\"PI\" ".(($estado=="PI") ? " selected=\"selected\"" : "").">PI</option>
							  <option value=\"PR\" ".(($estado=="PR") ? " selected=\"selected\"" : "").">PR</option>
							  <option value=\"RJ\" ".(($estado=="RJ") ? " selected=\"selected\"" : "").">RJ</option>
							  <option value=\"RN\" ".(($estado=="RN") ? " selected=\"selected\"" : "").">RN</option>
							  <option value=\"RO\" ".(($estado=="RO") ? " selected=\"selected\"" : "").">RO</option>
							  <option value=\"RR\" ".(($estado=="RR") ? " selected=\"selected\"" : "").">RR</option>
							  <option value=\"RS\" ".(($estado=="RS") ? " selected=\"selected\"" : "").">RS</option>
							  <option value=\"SC\" ".(($estado=="SC") ? " selected=\"selected\"" : "").">SC</option>
							  <option value=\"SE\" ".(($estado=="SE") ? " selected=\"selected\"" : "").">SE</option>
							  <option value=\"SP\" ".(($estado=="SP") ? " selected=\"selected\"" : "").">SP</option>
							  <option value=\"TO\" ".(($estado=="TO") ? " selected=\"selected\"" : "").">TO</option>
							  <option value=\"EX\" ".(($estado=="EX") ? " selected=\"selected\"" : "").">EX</option>	
							  
							</select>"; 
	
					break;
					case 'SELECTUFFULL':
	
						// Selecionando o Estado
						if ($param2!='no') {
							$retorno = "<select id=\"".$a[0]."\" name=\"".$a[0]."\" ".$a[2].">";
						} else {
							$retorno = "";
						}
						$estado=$param1;
	
						$retorno .= "<option value=\"AC\" ".(($estado=="AC") ? " selected=\"selected\"" : "").">Acre</option>
							  <option value=\"AL\" ".(($estado=="AL") ? " selected=\"selected\"" : "").">Alagoas</option>
							  <option value=\"AM\" ".(($estado=="AM") ? " selected=\"selected\"" : "").">Amazonas</option>
							  <option value=\"AP\" ".(($estado=="AP") ? " selected=\"selected\"" : "").">Amapá</option>
							  <option value=\"BA\" ".(($estado=="BA") ? " selected=\"selected\"" : "").">Bahia</option>
							  <option value=\"CE\" ".(($estado=="CE") ? " selected=\"selected\"" : "").">Ceará</option>
							  <option value=\"DF\" ".(($estado=="DF") ? " selected=\"selected\"" : "").">Distrito Federal</option>
							  <option value=\"ES\" ".(($estado=="ES") ? " selected=\"selected\"" : "").">Espírito Santo</option>
							  <option value=\"GO\" ".(($estado=="GO") ? " selected=\"selected\"" : "").">Goiás</option>
							  <option value=\"MA\" ".(($estado=="MA") ? " selected=\"selected\"" : "").">Maranhão</option>
							  <option value=\"MG\" ".(($estado=="MG") ? " selected=\"selected\"" : "").">Minas Gerais</option>
							  <option value=\"MS\" ".(($estado=="MS") ? " selected=\"selected\"" : "").">Mato Grosso do Sul</option>
							  <option value=\"MT\" ".(($estado=="MT") ? " selected=\"selected\"" : "").">Mato Grosso</option>
							  <option value=\"PA\" ".(($estado=="PA") ? " selected=\"selected\"" : "").">Pará</option>
							  <option value=\"PB\" ".(($estado=="PB") ? " selected=\"selected\"" : "").">Paraíba</option>
							  <option value=\"PE\" ".(($estado=="PE") ? " selected=\"selected\"" : "").">Pernambuco</option>
							  <option value=\"PI\" ".(($estado=="PI") ? " selected=\"selected\"" : "").">Piauí</option>
							  <option value=\"PR\" ".(($estado=="PR") ? " selected=\"selected\"" : "").">Paraná</option>
							  <option value=\"RJ\" ".(($estado=="RJ") ? " selected=\"selected\"" : "").">Rio de Janeiro</option>
							  <option value=\"RN\" ".(($estado=="RN") ? " selected=\"selected\"" : "").">Rio Grande do Norte</option>
							  <option value=\"RO\" ".(($estado=="RO") ? " selected=\"selected\"" : "").">Rondonia</option>
							  <option value=\"RR\" ".(($estado=="RR") ? " selected=\"selected\"" : "").">Roraima</option>
							  <option value=\"RS\" ".(($estado=="RS") ? " selected=\"selected\"" : "").">Rio Grande do Sul</option>
							  <option value=\"SC\" ".(($estado=="SC") ? " selected=\"selected\"" : "").">Santa Catarina</option>
							  <option value=\"SE\" ".(($estado=="SE") ? " selected=\"selected\"" : "").">Sergipe</option>
							  <option value=\"SP\" ".(($estado=="SP") ? " selected=\"selected\"" : "").">São Paulo</option>
							  <option value=\"TO\" ".(($estado=="TO") ? " selected=\"selected\"" : "").">Tocantins</option>";
						if ($param3!='no') { $retorno .= "<option value=\"EX\" ".(($estado=="EX") ? " selected=\"selected\"" : "").">Exterior</option>	"; }
						if ($param2!='no') { $retorno .= "</select>"; }
						return	$retorno;
					break;				
	
					case 'SELECTCITYFULL':
	
						// Selecionando o Estado
						if ($param3!='no') {
							$retorno = "<select id=\"".$a[0]."\" name=\"".$a[0]."\" ".$a[2].">";
						} else {
							$retorno = "";
						}
						
						$estado=$param1;
						$id_cidade=$param2;
	
						// carrega xml
						$xml = simplexml_load_file("localidade/".$estado."/data.xml");
	
						foreach($xml->cidade as $cidade){
	
							if ($cidade->numero==$id_cidade){ $selected = " selected='selected' ";} else { $selected='';}
							$retorno .= "<option value='".$cidade->numero."' $selected>".$cidade->nome."</option>\n";
						}
						
						if ($param3!='no') { $retorno .= "</select>"; }
						return	$retorno;
					break;								
					
					
					
				}
			
			
			break;
	
			case 'DIFF_DATE_EXT':
				 if ( $param2 == '' ) { $param2 = date("Y-m-d H:i:s"); }
	
				 $d1 = str_replace(":","-", str_replace(" ","-",$param1));
				 $d2 = str_replace(":","-", str_replace(" ","-",$param2));
				 
				 $d1 = explode("-", $d1);
	
				 $d2 = explode("-", $d2);	 		
			
				 if ( mj( "dd:D" ,$param1, $param2) > 1) {
					 return mj( "dd:D" ,$param1, $param2)." dias";
				 } else if (mj( "dd:D" ,$param1, $param2) == 1) {
					 return "Amanha";
				 } else {
					 if (mj( "dd:H" ,$param1, $param2) > 1) {
						 return mj( "dd:H" ,$param1, $param2)." horas";
					 } else if  (mj( "dd:H" , $param1, $param2) == 1) {
						 return "1 hora";
					 } else {
						 if (mj( "dd:MI" ,$param1, $param2) > 0) {
							 return mj( "dd:MI" ,$param1, $param2)." minutos";
						 } else {
							 
							$negativo = mj( "dd:false" ,$param1, $param2);
	
							if ($negativo > -60) {
							 $retorno = mj( "dd" ,$param1, $param2)." segundo(s)";							
							} else if ($negativo > -3600) {
							 $retorno = mj( "dd:MI" ,$param1, $param2)." minuto(s)";
							} else if ($negativo > -86400) {
							 $retorno = mj( "dd:H" ,$param1, $param2)." hora(s)";
							} else if ($negativo > -2592000) {
							 $retorno = mj( "dd:D" ,$param1, $param2)." dia(s)";
							} else if ($negativo > -31536000) {
							 $retorno = mj( "dd:M" ,$param1, $param2)." meses";
							} else {
							 $retorno = mj( "dd:Y" ,$param1, $param2)." anos";
							}
							return $retorno;
							
						 }
					 }
				 }				
			
			break;
	
			case 'DIFF_DATE':
				 if ( $param2 == '' ) { $param2 = date("Y-m-d H:i:s"); }
	
				 $d1 = str_replace(":","-", str_replace(" ","-",$param1));
				 $d2 = str_replace(":","-", str_replace(" ","-",$param2));
	
				 $d1 = explode("-", $d1);
				 $d2 = explode("-", $d2);
				 
				 switch ($key){
					 case 'A':
					 $X = 31536000;
					 break;
					 case 'Y':
					 $X = 31536000;
					 break;
					 case 'M':
					 $X = 2592000;
					 break;
					 case 'D':
					 $X = 86400;
					 break;
					 case 'H':
					 $X = 3600;
					 break;
					 case 'MI':
					 $X = 60;
					 break;
					 default:
					 $X = 1;
				 }
				return @floor( ( (  mktime($d1[3], $d1[4], $d1[5], $d1[1], $d1[2], $d1[0]) - mktime($d2[3], $d2[4], $d2[5], $d2[1], $d2[2], $d2[0]) ) / $X ) );
			
			break;
	
			// função DM retorna data no formato mysql		
			case 'MYSQL_DATA':
					
				if ( trim($key) ) {
					$tmp = explode(" ", $key);
					if (count($tmp) > 1) {
						$time = $tmp[1];
						$key = $tmp[0];
					}
				
					$key =  explode("-",$key);
					$key = sprintf('%s/%s/%s',$key[2],$key[1],$key[0]);
					if (($time)&&(!$param2)) {
						return $key." ".$time;
					} else {
						return $key;
					}
				} else {
					return false;
				}		
			break;
			// função DM retorna data no formato mysql		
			case 'DATA_MYSQL':
	
				if ( trim($key) ) {
					$tmp = explode(" ", $key);
					if (count($tmp) > 1) {
						$time = $tmp[1];
						$key = $tmp[0];
					}
					$key =  explode("/",$key);
					$key = sprintf('%s-%s-%s',$key[2],$key[1],$key[0]);
					if ($time) {
						return $key." ".$time;
					} else {
						return $key;
					}
				} else {
					return false;
				}				
			break;
	
			case 'LIMIT_STRING':
					
					$limite = $key;
					
					if ($param1) {
						$texto = $param1;	
					} else {
						$texto = $line_command;
					}
					
					while ( $i < strlen($texto) ) { $text_return .= substr($texto,$i,$limite)." "; $i = $i + $limite;}
					
					
					// Retorna o valor formatado
					return $text_return;
			
			break;
	
			// replace em string e array
			case 'REPLACE_COCHETE':
					
					if (is_array($param1)) {
						foreach($param1 as $_key => $_value)	 {
							if (is_array($param2)) {
								foreach($param2 as $key2 => $value2){
									$param2[$key2] = str_replace("[".$_key."]",$_value,$value2);
								}
							} else {
								$param2 = str_replace("[".$_key."]",$_value,$param2);	
							}
						}
					} else {
						$tmp = explode('=>',$param1);
						$param2 = str_replace("[".$tmp[0]."]",$tmp[1],$param2);	
					}
					return $param2;
	
				
			// replace em string e array
			case 'REPLACE_CHAVE_DOLAR':
					
					if (is_array($param1)) {
						foreach($param1 as $_key => $_value)	 {
							if (is_array($param2)) {
								foreach($param2 as $key2 => $value2){
									$param2[$key2] = str_replace('{$'.$_key."}",$_value,$value2);
								}
							} else {
								$param2 = str_replace('{$'.$_key."}",$_value,$param2);	
							}
						}
					} else {
						$tmp = explode('=>',$param1);
						$param2 = str_replace('{$'.$tmp[0]."}",$tmp[1],$param2);	
					}
					return $param2;
	
			
				
			// replace em string e array
			case 'REPLACE_CHAVE':
					
					if (is_array($param1)) {
						foreach($param1 as $_key => $_value)	 {
							if (is_array($param2)) {
								foreach($param2 as $key2 => $value2){
									$param2[$key2] = str_replace("{".$_key."}",$_value,$value2);
								}
							} else {
								$param2 = str_replace("{".$_key."}",$_value,$param2);	
							}
						}
					} else {
						$tmp = explode('=>',$param1);
						$param2 = str_replace("{".$tmp[0]."}",$tmp[1],$param2);	
					}
					return $param2;
	
			
			// replace em string e array
			case 'REPLACE':
					
					if (is_array($param1)) {
						foreach($param1 as $_key => $_value)	 {
							if (is_array($param2)) {
								foreach($param2 as $key2 => $value2){
									$param2[$key2] = str_replace($_key,$_value,$value2);
								}
							} else {
								$param2 = str_replace($_key,$_value,$param2);	
							}
						}
					} else {
						$tmp = explode('=>',$param1);
						$param2 = str_replace($tmp[0],$tmp[1],$param2);	
					}
					return $param2;
	
			// manipula arquivos
			case 'FILEEXT':
				$tam = strlen($line_command);
				
				//ext de 3 chars
				if( $line_command[($tam)-4] == '.' )
				{ $extensao = substr($line_command,-3); }
				
				//ext de 4 chars
				elseif( $line_command[($tam)-5] == '.' )
				{ $extensao = substr($line_command,-4); }
				
				//ext de 2 chars
				elseif( $line_command[($tam)-3] == '.' )
				{ $extensao = substr($line_command,-2); }
				
				//Caso a extensão não tenha 2, 3 ou 4 chars ele não aceita e retorna Nulo.
				else { $extensao = NULL; }
				
				return $extensao;
			
			break;
			
			case 'DUPLICATE_DIR_FILE':
	
				// cria novo nome e verifica se existe
				$new_filename = $param1;			
				$existe = true;
				
				while ($existe) {
	
					if (file_exists($new_filename)) {
						$b = explode(".",$new_filename);
						if (count($b)>1) {
							$new_filename = $b[0]."_copia.".$b[1];
						} else {
							$new_filename = $new_filename."_copia";
						}
						
					} else if (file_exists(getcwd().mj("WB").$new_filename)) {
						$param1 = getcwd().mj("WB").$param1;
						$new_filename = getcwd().mj("WB").$new_filename;					
						
						$b = explode(".",$new_filename);
						if (count($b)>1) {
							$new_filename = $b[0]."_copia.".$b[1];
						} else {
							$new_filename = $new_filename."_copia";
						}	
						
					} else if (is_file($new_filename)) {
						$b = explode(".",$new_filename);
						if (count($b)>1) {
							$new_filename = $b[0]."_copia.".$b[1];
						} else {
							$new_filename = $new_filename."_copia";
						}
						
					} else if (is_file(getcwd().mj("WB").$new_filename)) {
						$param1 = getcwd().mj("WB").$param1;
						$new_filename = getcwd().mj("WB").$new_filename;					
						
						$b = explode(".",$new_filename);
						if (count($b)>1) {
							$new_filename = $b[0]."_copia.".$b[1];
						} else {
							$new_filename = $new_filename."_copia";
						}	
						
					}
	
					if (!file_exists($new_filename)) $existe = false;
				}
				
				// caso tenha enviando o local para onde deseja copiar
				if ($param2) {
					if (!file_exists($param2)) {
						$new_filename = getcwd().mj("WB").$param2;
					} else {
						$new_filename = $param2;					
					}
				}
	//			echo "MJ:". $param1."|".$new_filename;
	
				if (is_dir(mj("WB",$param1))) {
					
					// copia tudo				
					full_copy( mj("WB",$param1), mj("WB",$new_filename)) ;
	
					return true;		
				}
				
				return copy( mj("WB",$param1), mj("WB",$new_filename));
	
			break;
			
			case 'REFILE':
				
				// inicializa parametros
				$WB = mj("WB");
				$base = "";
				$existe = false;
	
				// limite para até 15 diretorios - EVITAR erros
				for ($x0;$x < 15; $x++) {
	
					// muito util
					//echo getcwd().$WB.$base.$line_command."\n";
	
					// verifica se existe
					if (file_exists(getcwd().$WB.$base.$line_command)){
						$base .= $line_command;
						$existe = true;
						break;	
					}
					$base .= "..".$WB;
				}
				
				// retorna arquivo ou false
				if ($existe) {
				switch ($param1) {
					case "filename": return file_exists($base) ? str_replace("\\","/",$base) : false; break;
					default: return $existe ? mj("FILE>$base") : false; break;
				}
				} else { return false; }
			
			break;
			
			// manipula arquivos
			case "FILE":
				
				// configura barra universal
				$WB = mj("WB");
	
				// este casio e so um tratamento não muda o padrão
				$pathRaiz = mj("WB",getcwd().$WB.$line_command);
				
				// visualiza comandos recebidos
	//			echo $pathRaiz."----->";
				
				if (file_exists($line_command) && (!$param1)) {
	//				echo $line_command."-EXISTE<hr>";				
					$fd = fopen ($line_command, "rb");
					$conteudo = @fread ($fd, filesize ($line_command));
					fclose ($fd);
					return $conteudo;
				} else if (file_exists($pathRaiz)&& (!$param1)) {
	//				echo $pathRaiz."-PATHRAIZ<hr>";								
					$fd = fopen($pathRaiz, "rb");
					$conteudo = fread ($fd, filesize($pathRaiz));
					fclose ($fd);
					return $conteudo;
				} else {
	//				echo $line_command."-ELSE<hr>";			
					if ($param2) {
		
						$f = fopen ($pathRaiz, $param2);
						fwrite($f, $param1,strlen($param1));
						fclose ($f);						
						return true;
											
					} else if ($param1) {
						$f = fopen ($pathRaiz, "w");
						fwrite($f, $param1);
						fclose ($f);
						return true;
						
					} else {
						return false;
					}
				}
			break;
			// validação de dados
			case 'JAVASCRIPT':
				
				$source = "<script>\n";
				$source .= $key."\n";			
				$source .= "</script>\n";			
				
				return $source;
				
			break;
			
			// validação de dados
			case 'STYLESCRIPT':
				
				$source = "<style>\n";
				$source .= $key."\n";			
				$source .= "</style>\n";			
				
				return $source;
				
			break;		
			
			
			// validação de dados
			case 'VALID_FIELD_TYPE':
	
				// verifica se foi informado um tipo			
				$type_valid = explode(":",$key,2);
				if (count($type_valid) > 1) {
					$key = $type_valid[1];
					$type_valid = $type_valid[0];
				} else {
					$type_valid = $key;
					$key = $param1;
				}
				
				// depedendo do tipo ele executa o comando de validação
				switch ($type_valid) {
					case "e":
						// valida e-mail
						return preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(\.[[:lower:]]{2,3})(\.[[:lower:]]{2})?$/", $key);
					break;
					case "@":
						// valida e-mail
						return preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(\.[[:lower:]]{2,3})(\.[[:lower:]]{2})?$/", $key);
					break;
					case "cpf":
				
								// inicia o tratamento
								$cpf = str_pad(preg_replace('/[^0-9]/', '', $key), 11, '0', STR_PAD_LEFT);
								
								// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
								if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {								
									return false;
								} else {   // Calcula os números para verificar se o CPF é verdadeiro
	
									for ($t = 9; $t < 11; $t++) {
										for ($d = 0, $c = 0; $c < $t; $c++) {
											$d += $cpf{$c} * (($t + 1) - $c);
										}
							
										$d = ((10 * $d) % 11) % 10;
							
										if ($cpf{$c} != $d) {
											return false;
										}
									}
							
									return true;
								}
							
					break;
					default:
						return ($key);
					break;
				}
				
				
			break;
			// caso seja uma inclusão
			case 'SQLCONNECT':
		
				// separa dados
				$t = explode("|",$line_command);
	
				// busca conexão
				$db = mysql_connect($t[0], $t[2], $t[3]) or die("Não foi possível conectar à base de dados: ".mysql_error());
				
				// seleciona banco
				mysql_select_db($t[1]) or die("Não foi possível selecionar a base de dados<hr>".$t[1]."<hr>".print_r(error_get_last()));		
				
				// charset UTF-8
				mysql_set_charset('utf8');
				
				// retorna o resourc
				return $db;
			
			break;
			// caso seja uma inclusão
			case 'SQL':
				if (!$line_command) { return false; }
				$time_start = microtime_float();
	
				$relatorio_mysql .= "SQL: ".$line_command."\r\n";
				
				// retorna o parametros solicitado	
				$dataset = mysql_query($line_command) or die (mysql_error()."<hr>".$line_command."<hr>".print_r(error_get_last()));
	
				$time_end = microtime_float();
				$time = (float)$time_end - (float)$time_start;
				
				$global_end_time += (float)$time;
				
				$relatorio_mysql .= "TEMPO: ".(float)$time."\r\n";
				$relatorio_mysql .= "-------------------------------------------------\r\n";
	
				// caso não exista ja retorna false
				if (!is_resource($dataset)) { return false;}
	
				// quantidade de registros
				$_value['count'] = mysql_num_rows($dataset);
				
				if($_value['count']<=0){ 
					if ( ($return_is_array) or ($return_is_first_array) or
						 ($return_is_array_index) or ($return_is_first_array_index) or
						 ($return_is_array_assoc) or ($return_is_first_array_assoc) or
						 ($return_is_array_id_value) or ($return_is_first_array_id_value) 
						 ) { 
	
						return array();
					}else {					
						return false; 
					}
				}
	
				// trata o retorno, pode ser valor de um campo, lista de registros ou lista de arquivos
				if ( ($return_is_array) or ($return_is_first_array)) { 
					
					// roda lista de retorno e preenche nosso padrão de retorno por lista
					if($_value['count']>0) while ($row = mysql_fetch_array($dataset)){
						
						// caso seja somente o primeiro ja retorna
						if ($return_is_first_array) { return $row; }
						
						// formato gera
						array_push($_value, $row);
						$_value['G'.$row[0]] = $row;
						
						// por indice
						array_push($_id, $row);
						
						// por id
						$_id_value[$row[0]] = $row;
						
					}				
	
					return array($_value,$_id);
					
				} else if ( ($return_is_array_index) or ($return_is_first_array_index) ) {
		
					// dependendo do modo seleciona os retornos da colua modificam
					if ($return_is_array_index_assoc) {
	
						// roda lista de retorno e preenche nosso padrão de retorno por lista
						while ($row = mysql_fetch_assoc($dataset)){
							
							// caso seja somente o primeiro ja retorna
							if ($return_is_first_array_index) { return $row; }
							
							// por indice
							array_push($_id, $row);
							
						}				
	
						
					} else {
		
						// roda lista de retorno e preenche nosso padrão de retorno por lista
						while ($row = mysql_fetch_row($dataset)){
							
							// caso seja somente o primeiro ja retorna
							if ($return_is_first_array_index) { return $row; }
							
							// por indice
							array_push($_id, $row);
							
						}				
					}
					return $_id;
				}else if ( ($return_is_array_assoc) or ($return_is_first_array_assoc) ) {
	
					// roda lista de retorno e preenche nosso padrão de retorno por lista
					while ($row = mysql_fetch_assoc($dataset)){
	
						// caso seja somente o primeiro ja retorna
						if ($return_is_first_array_assoc) { return $row; }
						
						// por id
						foreach( $row as $k => $v ) {
							$_id_value[$v] = $row;
							break;
						}
						
					}						
					
					return $_id_value;
				}else if ( ($return_is_array_id_value) or ($return_is_first_array_id_value) ) {
	
					// roda lista de retorno e preenche nosso padrão de retorno por lista
					while ($row = mysql_fetch_row($dataset)){
					
						
						// primeiro campo chave, segundo valor
						$_id_value[$row[0]] = $row[1];
	
						// caso seja somente o primeiro ja retorna
						if ($return_is_first_array_assoc) { return $_id_value; }
											
					}						
					
					return $_id_value;
							
				} else { 
				
					// retorna o primeiro campo
					while ($row = mysql_fetch_row($dataset)){
						
						return $row[0];
					}						
					
				}
			
				break;
	
			// caso seja uma inclusão
			case 'SQLINSERT':
				if (!$line_command) { return false; }
			
				// retorna o parametros solicitado	
				$dataset = mysql_query($line_command) or die (mysql_error()."<hr>".$line_command."<hr>".print_r(error_get_last()));
	
				//retorn id da inclusão
				return mysql_insert_id();
				
				break;
			// caso seja uma inclusão
			case 'SQLUPDATE':
				if (!$line_command) { return false; }
				
				mj("FILE>sqltest.txt",date('d/m/Y H:i:s')." :: ".$line_command."\n");
				
				// retorna o parametros solicitado	
				$dataset = mysql_query($line_command) or die (mysql_error()."<hr>".$line_command."<hr>".print_r(error_get_last()));
				
				//retorn id da inclusão
				return true;
				
				break;
	
			// caso seja uma inclusão
			case 'SQLDELETE':
				if (!$line_command) { return false; }
				
				// retorna o parametros solicitado	
				$dataset = mysql_query($line_command) or die (mysql_error()."<hr>".$line_command."<hr>".print_r(error_get_last()));
				
				//retorn id da inclusão
				return true;
				
				break;
	
			// caso seja uma inclusão
			case 'TEXT_TO_LANGUAGE':
				
				// retorna o parametros solicitado	
				$dataset = mysql_query("SELECT * FROM var WHERE name='".$key."' and language='".$param1."'");
	
				// roda lista de retorno e preenche nosso padrão de retorno por lista
				while ($row = mysql_fetch_assoc($dataset)){
					
					// esse padrão consiste em retornar os dados em todos os formatos, por id, por index, so valor e so id
					array_push($_value, $row[value]);
					array_push($_id, $row[id]);
					$_id_value[$row[id]] = $row[value];
					array_push($_list, $row);
				}		
				
		
				// trata o retorno, pode ser valor de um campo, lista de registros ou lista de arquivos
				if ($return_is_array) { 
					return array(0=>$_value,1=>$_id,2=>$_id_value);
				}else if ($return_is_array_index) {
					return $_value;
				}else if ($return_is_array_assoc) {
					return $_id;
				}else if ($return_is_array_id_value) {
					return $_id_value;
				}else if ($return_is_array_list) {				
					return $_list;
				} else { return $_value[0]; }
	
				break;
							
			default:
			
				if ($param1) {
					$getID = mj("SQL>SELECT * FROM var WHERE name='".$key."'");
					if($getID>0) {
						mj("SQLUPDATE>var",array(id=>$getID,value=>$param1));
					} else {
						mj("SQLINSERT>var",array(name=>$key,value=>$param1));
					}
				}
			
				// retorna o parametros solicitado	
				$dataset = mysql_query("SELECT * FROM var WHERE name='".$key."'");
	
				// roda lista de retorno e preenche nosso padrão de retorno por lista
				while ($row = mysql_fetch_assoc($dataset)){
					
					// esse padrão consiste em retornar os dados em todos os formatos, por id, por index, so valor e so id
					array_push($_value, $row[value]);
					array_push($_id, $row[id]);
					$_id_value[$row[id]] = $row[value];
					array_push($_list, $row);
				}		
				
		
				// trata o retorno, pode ser valor de um campo, lista de registros ou lista de arquivos
				if ($return_is_array) { 
					return array(0=>$_value,1=>$_id,2=>$_id_value);
				}else if ($return_is_array_index) {
					return $_value;
				}else if ($return_is_array_assoc) {
					return $_id;
				}else if ($return_is_array_id_value) {
					return $_id_value;
				}else if ($return_is_array_list) {				
					return $_list;
				} else { return $_value[0]; }
				break;
		}
	}
	
	function iff($condition,$true,$false=null){
		return $condition ? $true : $false;
	}
	
	
	function full_copy( $source, $target ) {
	
				  if ( is_dir( $source ) ) {
						@mkdir( $target );
						$d = dir( $source );
						while ( FALSE !== ( $entry = $d->read() ) ) {
							if ( $entry == '.' || $entry == '..' ) {
								continue;
							}
							$Entry = $source . '/' . $entry; 
							if ( is_dir( $Entry ) ) {
								full_copy( $Entry, $target . '/' . $entry );
								continue;
							}
							copy( $Entry, $target . '/' . $entry );
						}
				
						$d->close();
					}else {
						copy( $source, $target );
					}
	
	
	}
	
	
	function var_dump_to_string($var){
		$output = "<pre>";
		_var_dump_to_string($var,$output);
		$output .= "</pre>";
		return $output;
	}
	
	function _var_dump_to_string($var,&$output,$prefix=""){
		foreach($var as $key=>$value){
			if(is_array($value)){
				$output.= $prefix.$key.": \n";
				_var_dump_to_string($value,$output,"  ".$prefix);
			} else{
				$output.= $prefix."<b>".$key."</b>: ".$value."\n";
			}
		}
	}
	
	
	function htmlvardump(){ob_start(); $var = func_get_args(); call_user_func_array('var_dump', $var); return htmentities(ob_get_clean());} 
	
	
	function generateDebugReport($method,$defined_vars,$email="undefined"){
		// Function to create a debug report to display or email.
		// Usage: generateDebugReport(method,get_defined_vars(),email[optional]);
		// Where method is "browser" or "email".
	
		// Create an ignore list for keys returned by 'get_defined_vars'.
		// For example, HTTP_POST_VARS, HTTP_GET_VARS and others are 
		// redundant (same as _POST, _GET)
		// Also include vars you want ignored for security reasons - i.e. PHPSESSID.
		$ignorelist=array("HTTP_POST_VARS","HTTP_GET_VARS",
		"HTTP_COOKIE_VARS","HTTP_SERVER_VARS",
		"HTTP_ENV_VARS","HTTP_SESSION_VARS",
		"_ENV","PHPSESSID","SESS_DBUSER",
		"SESS_DBPASS","HTTP_COOKIE");
	
		$timestamp=date("m/d/y h:m:s");
	   
	
		// Get the last SQL error for good measure, where $link is the resource identifier
		// for mysql_connect. Comment out or modify for your database or abstraction setup.
		global $db;
		
		$sql_error=mysql_error($db);
		
		if($sql_error){
		  $message.="\nErros do Mysql:\n".mysql_error($link);
		}
		// End MySQL
	
		// Could use a recursive function here. You get the idea ;-)
		foreach($defined_vars as $key=>$val){
			
		  if(is_array($val) && !in_array($key,$ignorelist) && count($val) > 0){
			  
			$message.="\n<div style='cursor:pointer;' onclick='if (document.getElementById(\"$key\").style.display == \"block\") {document.getElementById(\"$key\").style.display=\"none\";} else {document.getElementById(\"$key\").style.display=\"block\";}'> <b>$key</b></div>";
			$message.="<div id='$key' style='display:none;margin-left:30px;background:#CCC;padding:10px'>";
			
			foreach($val as $subkey=>$subval){
			  if(!in_array($subkey,$ignorelist) && !is_array($subval)){
				$message.= "<b>".$subkey."</b> : <code>".@htmlentities($subval)."</code>\n";
			  }elseif(!in_array($subkey,$ignorelist) && is_array($subval)){
				foreach($subval as $subsubkey=>$subsubval){
				  if(!in_array($subsubkey,$ignorelist)){
					$message.= "<b>".$subsubkey."</b> : <code>".@htmlentities($subsubval)."</code>\n";
				  }
				}
			  }
			}		
			
			$message.="</div>";
	
			
		  }elseif(!is_array($val) && !in_array($key,$ignorelist) && $val){
			$variaveis.="<b>".$key."</b> : <code>".@htmlentities($val)."</code>\n ";
		  }
		  
		}
		
		$tmp="<div style='cursor:pointer;' title='Clique para visualizar este grupo de informações!' onclick='if (document.getElementById(\"variaveis\").style.display == \"block\") {document.getElementById(\"variaveis\").style.display=\"none\";} else {document.getElementById(\"variaveis\").style.display=\"block\";}'> <b>VARIAVEIS</b></div>";	
		$message = $tmp."<div id='variaveis' style='display:none;margin-left:30px;background:#CCC;padding:10px'>$variaveis</div>".$message;
		$message="Debug criado  $timestamp<br><br>".$message;
		
		if($method=="browser"){
		  echo nl2br($message);
		}elseif($method=="var"){
		  return nl2br($message);		
		}elseif($method=="email"){
		  if($email=="undefined"){
			$email=$_SERVER["SERVER_ADMIN"];
		  }
	
		  $mresult=mail($email,"Debug Report for ".$_ENV["HOSTNAME"]."",$message);
		  if($mresult==1){
			echo "Debug Report sent successfully.\n";
		  }
		  else{
			echo "Failed to send Debug Report.\n";      
		  }
		}
	}
	
	  /**
	   * Add files and sub-directories in a folder to zip file.
	   * @param string $folder
	   * @param ZipArchive $zipFile
	   * @param int $exclusiveLength Number of text to be exclusived from the file path.
	   */
	  function folderToZip($listfolder, &$zipFile) {
	
		if (!is_array($listfolder)) {
			$listfolder = array($listfolder);
		}
	
		foreach($listfolder as $folder){
	
			if (is_dir($folder)) {
	
				$handle = opendir($folder);
				
				while ($f = readdir($handle)) {
	
				  if ($f != '.' && $f != '..') {
	
					$filePath = "$folder/$f";
	
					// Remove prefix from file path before add to zip.
					$localPath = mj("WB",$filePath,"filename");
	
					if (is_file($filePath)) {
					  $zipFile->addFile($filePath);
					} elseif (is_dir($filePath)) {
					  // Add sub-directory.
					  //$zipFile->addEmptyDir($localPath);
					  folderToZip($filePath, $zipFile);
					}
				  }
				}
				closedir($handle);
	
			} else {
				//echo $folder;					
				if (file_exists($folder)) {
	
	//				echo mj("WB",$folder,"filename");
	//				echo mj("WB",$folder,"dir");
	//				exit;
					$zipFile->addFile(mj("WB",$filePath,"filename"), mj("WB",$filePath,"dir"));
				}
			}
		 }
		 
	  }
	
	  /**
	   * Zip a folder (include itself).
	   * Usage:
	   *   HZip::zipDir('/path/to/sourceDir', '/path/to/out.zip');
	   *
	   * @param string $sourcePath Path of directory to be zip.
	   * @param string $outZipPath Path of output zip file.
	   */
	  function zipDir($sourcePath, $outZipPath)
	  {
		$pathInfo = pathInfo($sourcePath);
		$parentPath = $pathInfo['dirname'];
		$dirName = $pathInfo['basename'];
	
		$z = new ZipArchive();
		$z->open($outZipPath, ZIPARCHIVE::CREATE);
		$z->addEmptyDir($dirName);
		self::folderToZip($sourcePath, $z);
		$z->close();
	  }
	
	
	   function ExportPage($pag_id,$download) {
			
			global $dir_system_base;
			
			// busca pagina
			$pagina = mj("1:SQL>SELECT * FROM pagina WHERE pag_id='$pag_id'");
			
			// caso exista processa
			if ($pagina[pag_id] > 0) {
			
				// checar se existe extensão do arquivo
				$paginas_extensao = mj("l1:SQL>SELECT * FROM pagina WHERE pag_idup='".$pagina[pag_id]."' and pag_control='EXTENSAO' and pag_remove<>'S' order by pag_order asc");
			
				// carrega arquivos de extensão infinitos, resolvendo o problema do armazenamento fisico
				if (count($paginas_extensao)>0) {
					foreach($paginas_extensao as $pe) {
						$pagina[pag_texto] .= $pe[pag_texto];
						$pagina[pag_texto1] .= $pe[pag_texto1];
						$pagina[pag_texto2] .= $pe[pag_texto2];
						$pagina[pag_texto3] .= $pe[pag_texto3];
						$pagina[pag_texto4] .= $pe[pag_texto4];
						$pagina[pag_texto5] .= $pe[pag_texto5];
						$pagina[pag_param] .= $pe[pag_param];			
					}
				}	
				$dir = "backup/export/page/";
				
				$pagina[pag_texto] = mj("r",array("\n"=>"\r\n"),$pagina[pag_texto]);
				$pagina[pag_texto1] = mj("r",array("\n"=>"\r\n"),$pagina[pag_texto1]);
				$pagina[pag_texto2] = mj("r",array("\n"=>"\r\n"),$pagina[pag_texto2]);
				$pagina[pag_texto3] = mj("r",array("\n"=>"\r\n"),$pagina[pag_texto3]);
				$pagina[pag_texto4] = mj("r",array("\n"=>"\r\n"),$pagina[pag_texto4]);
				$pagina[pag_texto5] = mj("r",array("\n"=>"\r\n"),$pagina[pag_texto5]);
				$pagina[pag_param] = mj("r",array("\n"=>"\r\n"),$pagina[pag_param]);
				
				// definições de saida			
				if ($pagina[pag_control]=='KK_WIZARD') {
	
					if ($pagina[pag_titulo]) { 
						mj("mk:$dir",$pagina[pag_titulo]); 
						$subpath = $pagina[pag_titulo];
					} else { 
						mj("mk:$dir",$pag_id); 
						$subpath = $pag_id;
					}
	
					$name_zip = "wizard--".date("Y-m-d_H-i-s").".zip";
					
					if (file_exists($dir_system_base."imagens/conteudo/".$pagina[pag_imagem])) {
						copy( $dir_system_base."imagens/conteudo/".$pagina[pag_imagem], $dir.$pag_id."/".$pagina[pag_imagem]);
					}
				} else if ($pagina[pag_control]=='KK_PAGE') {
					mj("mk:$dir",$pag_id);
					$subpath = $pag_id;
					$name_zip = "page--".date("Y-m-d_H-i-s").".zip";
				}
	
				// verifica os arquivos anexados
				if ($pagina[pag_listpages]) {
					
					// monta lista de arquivos a serem incluidos na exportação
					$listfiles = explode("\n",$pagina[pag_listpages]);
					
					foreach($listfiles as $fout){
						
						// remove espaços
						$fout = trim(mj("WB",$fout));
						
						// verifica se o diretorio existe
						if (!is_dir("backup/export/".mj("WB",$fout,'dir')))  { mj("mk:backup/export",mj("WB",$fout,"dir")); }
						
						// verifica se o arquivo existe
						if (file_exists($fout)) {
							copy(
								mj("WB",$fout),
								mj("WB","backup/export/".$fout)
							);
						}
					}
				}
				
				// exporta conteúdo grande
				mj("FILE>".$dir."/".$$subpath."/texto.txt",$pagina['pag_texto']);
				mj("FILE>".$dir."/".$$subpath."/texto1.txt",$pagina['pag_texto1']);
				mj("FILE>".$dir."/".$$subpath."/texto2.txt",$pagina['pag_texto2']);
				mj("FILE>".$dir."/".$$subpath."/texto3.txt",$pagina['pag_texto3']);
				mj("FILE>".$dir."/".$$subpath."/texto4.txt",$pagina['pag_texto4']);
				mj("FILE>".$dir."/".$$subpath."/texto5.txt",$pagina['pag_texto5']);
				mj("FILE>".$dir."/".$$subpath."/param.txt",$pagina['pag_param']);		
	
				// remove conteúdo grande do array
				unset($pagina[pag_texto]);
				unset($pagina[pag_texto1]);
				unset($pagina[pag_texto2]);
				unset($pagina[pag_texto3]);
				unset($pagina[pag_texto4]);
				unset($pagina[pag_texto5]);
				unset($pagina[pag_param]);
	
				// exporta conteúdos pequenos		
				mj("FILE>".$dir."/".$$subpath."/fields.txt",serialize( $pagina ) );
			
				// cria arquivo de saida
				if (is_dir($dir.$subpath)) { mj("zip:backup/".$name_zip,"backup/export"); }
			
				$mm_type="application/octet-stream";
							
				if ($download) {
					header("Cache-Control: public, must-revalidate");
					header("Pragma: hack");
					header("Content-Type: " . $mm_type);
					header("Content-Length: " .(string)(filesize(getcwd().$name_zip)) );
					header('Content-Disposition: attachment; filename="'.$name_zip.'"');
					header("Content-Transfer-Encoding: binary\n");
				}
	
				//mj("rm","backup/export");
				
				return $dir.$name_zip;
	
			} else { return false; }
		}
	
	
	
	
	   function ImportPage($request) {
	   }
	
	
		function deleteDirectory($dir) { 
			if (!file_exists($dir)) return true; 
			if (!is_dir($dir) || is_link($dir)) return unlink($dir); 
				foreach (scandir($dir) as $item) { 
					if ($item == '.' || $item == '..') continue; 
					if (!deleteDirectory($dir . "/" . $item)) { 
						chmod($dir . "/" . $item, 0777); 
						if (!deleteDirectory($dir . "/" . $item)) return false; 
					}; 
				} 
			return rmdir($dir); 
		} 		
	
	// return the interpolated value between pBegin and pEnd
		function interpolate($pBegin, $pEnd, $pStep, $pMax) {
			if ($pBegin < $pEnd) {
				return (($pEnd - $pBegin) * ($pStep / $pMax)) + $pBegin;
			} else {
				return (($pBegin - $pEnd) * (1 - ($pStep / $pMax))) + $pEnd;
			}
		}
	
		function generateColor($theColorBegin,$theColorEnd,$theNumSteps){
		
			// configuração
			$theColorBegin = (isset($theColorBegin)) ? hexdec($theColorBegin) : 0x000000;
			$theColorEnd = (isset($theColorEnd)) ? hexdec($theColorEnd) : 0xffffff;
			$theNumSteps = (isset($theNumSteps)) ? intval($theNumSteps) : 16;
			
			// configura o hex
			$theColorBegin = (($theColorBegin >= 0x000000) && ($theColorBegin <= 0xffffff)) ? $theColorBegin : 0x000000;
			$theColorEnd = (($theColorEnd >= 0x000000) && ($theColorEnd <= 0xffffff)) ? $theColorEnd : 0xffffff;
			$theNumSteps = (($theNumSteps > 0) && ($theNumSteps < 256)) ? $theNumSteps : 16;
			
			// configura color
			$theR0 = ($theColorBegin & 0xff0000) >> 16;
			$theG0 = ($theColorBegin & 0x00ff00) >> 8;
			$theB0 = ($theColorBegin & 0x0000ff) >> 0;
			
			$theR1 = ($theColorEnd & 0xff0000) >> 16;
			$theG1 = ($theColorEnd & 0x00ff00) >> 8;
			$theB1 = ($theColorEnd & 0x0000ff) >> 0;
			
			$result = array();
			
			for ($i = 0; $i <= $theNumSteps; $i++) {
			  
				$theR = interpolate($theR0, $theR1, $i, $theNumSteps);
				$theG = interpolate($theG0, $theG1, $i, $theNumSteps);
				$theB = interpolate($theB0, $theB1, $i, $theNumSteps);
				
				$theVal = ((($theR << 8) | $theG) << 8) | $theB;
				
				$color = sprintf("#%06X", $theVal);
				
				array_push($result,$color);
			
			}
			
			return $result;
		}
	
	// ########################################################################################
	// ########################################################################################
	// ########################################################################################
	// ########################################################################################
	//                                         END LIBRARY
	// ########################################################################################
	// ########################################################################################
	// ########################################################################################
	// ########################################################################################
	
	
	function getPlayerMP3($nameplayer,$sessionId,$userId,$numMP3,$autoplay=''){
		
			GLOBAL $http_base; GLOBAL $dir_system_base;
		
		return '
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="160" height="28" id="$nameplayer_pplayer-user" align="middle">
									<param name="movie" value="'.$http_base.$dir_system_base.'plugin/playeraudio_chat/mp3_player.swf" /> 
									<param name="quality" value="high" />            
									<param name="bgcolor" value="#FFFFFF" />      
	
									<param name="play" value="true" />            
									<param name="loop" value="true" />            
									<param name="wmode" value="transparent" />            
									<param name="scale" value="showall" />            
									<param name="menu" value="true" />            
									<param name="devicefont" value="false" />            
									<param name="salign" value="" />            
									<param name="FlashVars" value="xmlfile='.$http_base.'downloadvoice/'.$sessionId.'/'.$userId.'/'.$numMP3.'/&autoplaysound='.$autoplay.'" />
									<param name="allowScriptAccess" value="sameDomain" />            
									<!--[if !IE]>-->            
									<object type="application/x-shockwave-flash" data="'.$http_base.$dir_system_base.'plugin/playeraudio_chat/mp3_player.swf" width="160" height="28">            
										<param name="movie" value="'.$http_base.$dir_system_base.'plugin/playeraudio_chat/mp3_player.swf" />            
										<param name="quality" value="high" />            
										<param name="bgcolor" value="#FFFFF" />            
										<param name="play" value="true" />            
										<param name="loop" value="true" />            
										<param name="wmode" value="transparent" />            
										<param name="scale" value="showall" />            
										<param name="menu" value="true" />            
										<param name="devicefont" value="false" />            
										<param name="salign" value="" />            
										<param name="allowScriptAccess" value="sameDomain" />            
										<param name="FlashVars" value="xmlfile='.$http_base.'downloadvoice/'.$sessionId.'/'.$userId.'/'.$numMP3.'/&autoplaysound='.$autoplay.'" />
									<!--<![endif]-->            
										<a href="http://www.adobe.com/go/getflash">            
											<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash Player" />            
										</a>            
									<!--[if !IE]>-->            
									</object>            
									<!--<![endif]-->            
								</object>    				
		
		';
		}
	
	
	
	
	function getPlayerMP3_xml($nameplayer,$xml,$autoplay=''){
		
		GLOBAL $http_base; GLOBAL $dir_system_base;
		
		return '
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="160" height="28" id="$nameplayer_pplayer-user" align="middle">
									<param name="movie" value="'.$http_base.$dir_system_base.'plugin/playeraudio_lista/mp3_player.swf" /> 
									<param name="quality" value="high" />            
									<param name="bgcolor" value="#FFFFFF" />      
	
									<param name="play" value="true" />            
									<param name="loop" value="true" />            
									<param name="wmode" value="transparent" />            
									<param name="scale" value="showall" />            
									<param name="menu" value="true" />            
									<param name="devicefont" value="false" />            
									<param name="salign" value="" />            
									<param name="FlashVars" value="xmlfile='.$xml.'&autoplaysound='.$autoplay.'" />
									<param name="allowScriptAccess" value="sameDomain" />            
									<!--[if !IE]>-->            
									<object type="application/x-shockwave-flash" data="'.$http_base.$dir_system_base.'plugin/playeraudio_lista/mp3_player.swf" width="160" height="28">            
										<param name="movie" value="'.$http_base.$dir_system_base.'plugin/playeraudio_lista/mp3_player.swf" />            
										<param name="quality" value="high" />            
										<param name="bgcolor" value="#FFFFF" />            
										<param name="play" value="true" />            
										<param name="loop" value="true" />            
										<param name="wmode" value="transparent" />            
										<param name="scale" value="showall" />            
										<param name="menu" value="true" />            
										<param name="devicefont" value="false" />            
										<param name="salign" value="" />            
										<param name="allowScriptAccess" value="sameDomain" />            
										<param name="FlashVars" value="xmlfile='.$xml.'&autoplaysound='.$autoplay.'" />
									<!--<![endif]-->            
										<a href="http://www.adobe.com/go/getflash">            
											<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash Player" />            
										</a>            
									<!--[if !IE]>-->            
									</object>            
									<!--<![endif]-->            
								</object>    				
		
		';
		}
	
	
	
	
		
	function numeroDeCombinacoes($k,$n){
			$dif = $n - $k;
		 
			if ($k < $dif) {
				$dif = $k;
				$k = $n - $dif;
			} 
			
			$combinacoes = $k + 1;
		 
			if ($dif == 0) {
				$combinacoes = 1;
			} else if ($dif >= 2) {
				for ($i = 2; $i <= $dif; $i++){
					$combinacoes = ($combinacoes * ($k + $i)) / $i;
				}
			}
			return $combinacoes;
	}
	
	function numeroDeCombinacoes2($k,$n){
		$n = intval($n);
		$k = intval($k);
		bcscale(60);
		if ($k > $n){
			return 0;
		} elseif ($n == $k) {
			return 1;
		} else {
			if ($k >= $n - $k){
				$l = $k+1;
				for ($i = $l+1 ; $i <= $n ; $i++)
					$l = bcmul($l,$i,60);
				$m = 1;
				for ($i = 2 ; $i <= $n-$k ; $i++)
					$m = bcmul($m,$i,60);
			} else {
				$l = ($n-$k) + 1;
				for ($i = $l+1 ; $i <= $n ; $i++)
					$l = bcmul($l,$i,60);
				$m = 1;
				for ($i = 2 ; $i <= $k ; $i++)
					$m = bcmul($m,$i,60);
			}
		}
	//	echo $l."<br>".$m."<br>";
	//	echo  bcdiv($l,$m,0)."<hr>";
		return bcdiv($l,$m,0);
	}
	
	
	function GerarNumeroDeCombinacoes($combinacao,$kkk){
	
		$lk = numeroDeCombinacoes($kkk,count($combinacao));
		$ret = array_fill(0, $lk, array_fill(0, $kkk, '') );
	
		$temp = array();
		for ($i = 0 ; $i < $kkk ; $i++)
			$temp[$i] = $i;
	
		$ret[0] = $temp;
	
		for ($i = 1 ; $i < $lk ; $i++){
			if ($temp[$kkk-1] != count($combinacao)-1){
				$temp[$kkk-1]++;
			} else {
				$od = -1;
				for ($j = $kkk-2 ; $j >= 0 ; $j--)
					if ($temp[$j]+1 != $temp[$j+1]){
						$od = $j;
						break;
					}
				if ($od == -1)
					break;
				$temp[$od]++;
				for ($j = $od+1 ; $j < $kkk ; $j++)    
					$temp[$j] = $temp[$od]+$j-$od;
			}
			$ret[$i] = $temp;
		}
		for ($i = 0 ; $i < $lk ; $i++)
			for ($j = 0 ; $j < $kkk ; $j++)
				$ret[$i][$j] = $combinacao[$ret[$i][$j]];   
	
		return $ret;
	}
	
	
	
	function csnParaCombinacao($csn, $n, $k) {

		$limite_inferior = 0;
		$r = 0;
		$combinacao = array();
	  	
		echo "<hr>CSN:".$csn."<hr>";
		
		for($i=0; $i < ($k - 1); $i++){

			$combinacao[$i] = 0;
			
			if($i != 0) { $combinacao[$i] = $combinacao[$i - 1]; }

			do{
				$combinacao[$i] =  $combinacao[$i] + 1;

				$r = numeroDeCombinacoes(($k - 1) - $i,$n - $combinacao[$i]); // lembram-se desta função?

				$limite_inferior = $limite_inferior+$r;
				
			} while ($limite_inferior < $csn);
			
			$limite_inferior = $limite_inferior - $r;
		}
	  
		$combinacao[$k - 1] = $combinacao[$k - 2] + $csn - $limite_inferior;
	  
		return $combinacao;
	}
	
	function combinacaoParaCsn($combinacao, $n){
		$k = count($combinacao);
		$limite_inferior = 0;
		$r= 0;
	  
		for ($i = 1; $i <= $k; $i++){
			$r = $n - $combinacao[$k - $i];
			
			if ($r >= $i) {
				$limite_inferior = bcadd($limite_inferior,numeroDeCombinacoes($i,$r),0);
			}
		}
	
		return bcsub(numeroDeCombinacoes($k,$n),$limite_inferior,0);
	}
	
	function cdata($str){
		
		return "//<![CDATA[
	$str
	//]]";
	}
	
	function nocdata($str){
		$tmp = str_replace("//<![CDATA[","",$str);
		$tmp = str_replace("//]]","",$tmp);
		return trim($tmp);
	
	}
	
	
	
	
	
	
	function getBrowser() 
	{ 
		$u_agent = $_SERVER['HTTP_USER_AGENT']; 
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version= "";
	
		//First get the platform?
		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		}
		elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		}
		elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		}
		
		// Next get the name of the useragent yes seperately and for good reason
		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
		{ 
			$bname = 'Internet Explorer'; 
			$ub = "MSIE"; 
		} 
		elseif(preg_match('/Firefox/i',$u_agent)) 
		{ 
			$bname = 'Mozilla Firefox'; 
			$ub = "Firefox"; 
		} 
		elseif(preg_match('/Chrome/i',$u_agent)) 
		{ 
			$bname = 'Google Chrome'; 
			$ub = "Chrome"; 
		} 
		elseif(preg_match('/Safari/i',$u_agent)) 
		{ 
			$bname = 'Apple Safari'; 
			$ub = "Safari"; 
		} 
		elseif(preg_match('/Opera/i',$u_agent)) 
		{ 
			$bname = 'Opera'; 
			$ub = "Opera"; 
		} 
		elseif(preg_match('/Netscape/i',$u_agent)) 
		{ 
			$bname = 'Netscape'; 
			$ub = "Netscape"; 
		} 
		
		// finally get the correct version number
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}
		
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
				$version= $matches['version'][0];
			}
			else {
				$version= $matches['version'][1];
			}
		}
		else {
			$version= $matches['version'][0];
		}
		
		// check if we have a number
		if ($version==null || $version=="") {$version="?";}
		
		return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		);
	} 
	
	
	
	
	
	
	class Browser {
		private $_agent = '';
		private $_browser_name = '';
		private $_version = '';
		private $_platform = '';
		private $_os = '';
		private $_is_aol = false;
		private $_is_mobile = false;
		private $_is_robot = false;
		private $_aol_version = '';
	
		const BROWSER_UNKNOWN = 'unknown';
		const VERSION_UNKNOWN = 'unknown';
	
		const BROWSER_OPERA = 'Opera'; 
		const BROWSER_OPERA_MINI = 'Opera Mini';
		const BROWSER_WEBTV = 'WebTV';
		const BROWSER_IE = 'Internet Explorer'; 
		const BROWSER_POCKET_IE = 'Pocket Internet Explorer';
		const BROWSER_KONQUEROR = 'Konqueror';
		const BROWSER_ICAB = 'iCab';
		const BROWSER_OMNIWEB = 'OmniWeb';
		const BROWSER_FIREBIRD = 'Firebird';
		const BROWSER_FIREFOX = 'Firefox';
		const BROWSER_ICEWEASEL = 'Iceweasel';
		const BROWSER_SHIRETOKO = 'Shiretoko';
		const BROWSER_MOZILLA = 'Mozilla';
		const BROWSER_AMAYA = 'Amaya';
		const BROWSER_LYNX = 'Lynx';
		const BROWSER_SAFARI = 'Safari';
		const BROWSER_IPHONE = 'iPhone';
		const BROWSER_IPOD = 'iPod';
		const BROWSER_IPAD = 'iPad';
		const BROWSER_CHROME = 'Chrome';
		const BROWSER_ANDROID = 'Android';
		const BROWSER_GOOGLEBOT = 'GoogleBot';
		const BROWSER_SLURP = 'Yahoo! Slurp';
		const BROWSER_W3CVALIDATOR = 'W3C Validator';
		const BROWSER_BLACKBERRY = 'BlackBerry';
		const BROWSER_ICECAT = 'IceCat';
		const BROWSER_NOKIA_S60 = 'Nokia S60 OSS Browser';
		const BROWSER_NOKIA = 'Nokia Browser';
		const BROWSER_MSN = 'MSN Browser';
		const BROWSER_MSNBOT = 'MSN Bot';
	
		const BROWSER_NETSCAPE_NAVIGATOR = 'Netscape Navigator';
		const BROWSER_GALEON = 'Galeon';
		const BROWSER_NETPOSITIVE = 'NetPositive';
		const BROWSER_PHOENIX = 'Phoenix';
	
		const PLATFORM_UNKNOWN = 'unknown';
		const PLATFORM_WINDOWS = 'Windows';
		const PLATFORM_WINDOWS_CE = 'Windows CE';
		const PLATFORM_APPLE = 'Apple';
		const PLATFORM_LINUX = 'Linux';
		const PLATFORM_OS2 = 'OS/2';
		const PLATFORM_BEOS = 'BeOS';
		const PLATFORM_IPHONE = 'iPhone';
		const PLATFORM_IPOD = 'iPod';
		const PLATFORM_IPAD = 'iPad';
		const PLATFORM_BLACKBERRY = 'BlackBerry';
		const PLATFORM_NOKIA = 'Nokia';
		const PLATFORM_FREEBSD = 'FreeBSD';
		const PLATFORM_OPENBSD = 'OpenBSD';
		const PLATFORM_NETBSD = 'NetBSD';
		const PLATFORM_SUNOS = 'SunOS';
		const PLATFORM_OPENSOLARIS = 'OpenSolaris';
		const PLATFORM_ANDROID = 'Android';
	
		const OPERATING_SYSTEM_UNKNOWN = 'unknown';
	
		public function Browser($useragent="") {
			$this->reset();
			if( $useragent != "" ) {
				$this->setUserAgent($useragent);
			}
			else {
				$this->determine();
			}
		}
	
		/**
		* Reset all properties
		*/
		public function reset() {
			$this->_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
			$this->_browser_name = self::BROWSER_UNKNOWN;
			$this->_version = self::VERSION_UNKNOWN;
			$this->_platform = self::PLATFORM_UNKNOWN;
			$this->_os = self::OPERATING_SYSTEM_UNKNOWN;
			$this->_is_aol = false;
			$this->_is_mobile = false;
			$this->_is_robot = false;
			$this->_aol_version = self::VERSION_UNKNOWN;
		}
	
		/**
		* Check to see if the specific browser is valid
		* @param string $browserName
		* @return boolean
		*/
		function isBrowser($browserName) { return( 0 == strcasecmp($this->_browser_name, trim($browserName))); }
	
		/**
		* The name of the browser.  All return types are from the class contants
		* @return string Name of the browser
		*/
		public function getBrowser() { return $this->_browser_name; }
		/**
		* Set the name of the browser
		* @param $browser The name of the Browser
		*/
		public function setBrowser($browser) { return $this->_browser_name = $browser; }
		/**
		* The name of the platform.  All return types are from the class contants
		* @return string Name of the browser
		*/
		public function getPlatform() { return $this->_platform; }
		/**
		* Set the name of the platform
		* @param $platform The name of the Platform
		*/
		public function setPlatform($platform) { return $this->_platform = $platform; }
		/**
		* The version of the browser.
		* @return string Version of the browser (will only contain alpha-numeric characters and a period)
		*/
		public function getVersion() { return $this->_version; }
		/**
		* Set the version of the browser
		* @param $version The version of the Browser
		*/
		public function setVersion($version) { $this->_version = preg_replace('/[^0-9,.,a-z,A-Z-]/','',$version); }
		/**
		* The version of AOL.
		* @return string Version of AOL (will only contain alpha-numeric characters and a period)
		*/
		public function getAolVersion() { return $this->_aol_version; }
		/**
		* Set the version of AOL
		* @param $version The version of AOL
		*/
		public function setAolVersion($version) { $this->_aol_version = preg_replace('/[^0-9,.,a-z,A-Z]/','',$version); }
		/**
		* Is the browser from AOL?
		* @return boolean
		*/
		public function isAol() { return $this->_is_aol; }
		/**
		* Is the browser from a mobile device?
		* @return boolean
		*/
		public function isMobile() { return $this->_is_mobile; }
		/**
		* Is the browser from a robot (ex Slurp,GoogleBot)?
		* @return boolean
		*/
		public function isRobot() { return $this->_is_robot; }
		/**
		* Set the browser to be from AOL
		* @param $isAol
		*/
		public function setAol($isAol) { $this->_is_aol = $isAol; }
		/**
		 * Set the Browser to be mobile
		 * @param boolean
		 */
		protected function setMobile($value=true) { $this->_is_mobile = $value; }
		/**
		 * Set the Browser to be a robot
		 * @param boolean
		 */
		protected function setRobot($value=true) { $this->_is_robot = $value; }
		/**
		* Get the user agent value in use to determine the browser
		* @return string The user agent from the HTTP header
		*/
		public function getUserAgent() { return $this->_agent; }
		/**
		* Set the user agent value (the construction will use the HTTP header value - this will overwrite it)
		* @param $agent_string The value for the User Agent
		*/
		public function setUserAgent($agent_string) {
			$this->reset();
			$this->_agent = $agent_string;
			$this->determine();
		}
		/**
		 * Used to determine if the browser is actually "chromeframe"
		 * @return boolean
		 */
		public function isChromeFrame() {
			return( strpos($this->_agent,"chromeframe") !== false );
		}
		/**
		* Returns a formatted string with a summary of the details of the browser.
		* @return string formatted string with a summary of the browser
		*/
		public function __toString() {
			return "<strong>Browser Name:</strong>{$this->getBrowser()}<br/>\n" .
				   "<strong>Browser Version:</strong>{$this->getVersion()}<br/>\n" .
				   "<strong>Browser User Agent String:</strong>{$this->getUserAgent()}<br/>\n" .
				   "<strong>Platform:</strong>{$this->getPlatform()}<br/>";
		}
		/**
		 * Protected routine to calculate and determine what the browser is in use (including platform)
		 */
		protected function determine() {
			$this->checkPlatform();
			$this->checkBrowsers();
			$this->checkForAol();
		}
		/**
		 * Protected routine to determine the browser type
		 * @return boolean
		 */
		 protected function checkBrowsers() {
			return (
				$this->checkBrowserWebTv() ||
				$this->checkBrowserInternetExplorer() ||
				$this->checkBrowserOpera() ||
				$this->checkBrowserGaleon() ||
				$this->checkBrowserNetscapeNavigator9Plus() ||
				$this->checkBrowserFirefox() ||
				$this->checkBrowserChrome() ||
				$this->checkBrowserOmniWeb() ||
	
				// common mobile
				$this->checkBrowserAndroid() ||
				$this->checkBrowseriPad() ||
				$this->checkBrowseriPod() ||
				$this->checkBrowseriPhone() ||
				$this->checkBrowserBlackBerry() ||
				$this->checkBrowserNokia() ||
	
				// common bots
				$this->checkBrowserGoogleBot() ||
				$this->checkBrowserMSNBot() ||
				$this->checkBrowserSlurp() ||
	
				// WebKit base check (post mobile and others)
				$this->checkBrowserSafari() ||
	
				// everyone else
				$this->checkBrowserNetPositive() ||
				$this->checkBrowserFirebird() ||
				$this->checkBrowserKonqueror() ||
				$this->checkBrowserIcab() ||
				$this->checkBrowserPhoenix() ||
				$this->checkBrowserAmaya() ||
				$this->checkBrowserLynx() ||
				$this->checkBrowserShiretoko() ||
				$this->checkBrowserIceCat() ||
				$this->checkBrowserW3CValidator() ||
				$this->checkBrowserMozilla() /* Mozilla is such an open standard that you must check it last */
			);
		}
	
		protected function checkBrowserBlackBerry() {
			if( stripos($this->_agent,'blackberry') !== false ) {
				$aresult = explode("/",stristr($this->_agent,"BlackBerry"));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
				$this->_browser_name = self::BROWSER_BLACKBERRY;
				$this->setMobile(true);
				return true;
			}
			return false;
		}
	
		protected function checkForAol() {
			$this->setAol(false);
			$this->setAolVersion(self::VERSION_UNKNOWN);
	
			if( stripos($this->_agent,'aol') !== false ) {
				$aversion = explode(' ',stristr($this->_agent, 'AOL'));
				$this->setAol(true);
				$this->setAolVersion(preg_replace('/[^0-9\.a-z]/i', '', $aversion[1]));
				return true;
			}
			return false;
		}
	
	
		protected function checkBrowserGoogleBot() {
			if( stripos($this->_agent,'googlebot') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'googlebot'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion(str_replace(';','',$aversion[0]));
				$this->_browser_name = self::BROWSER_GOOGLEBOT;
				$this->setRobot(true);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserMSNBot() {
			if( stripos($this->_agent,"msnbot") !== false ) {
				$aresult = explode("/",stristr($this->_agent,"msnbot"));
				$aversion = explode(" ",$aresult[1]);
				$this->setVersion(str_replace(";","",$aversion[0]));
				$this->_browser_name = self::BROWSER_MSNBOT;
				$this->setRobot(true);
				return true;
			}
			return false;
		}       
	
		protected function checkBrowserW3CValidator() {
			if( stripos($this->_agent,'W3C-checklink') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'W3C-checklink'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
				$this->_browser_name = self::BROWSER_W3CVALIDATOR;
				return true;
			}
			else if( stripos($this->_agent,'W3C_Validator') !== false ) {
				// Some of the Validator versions do not delineate w/ a slash - add it back in
				$ua = str_replace("W3C_Validator ", "W3C_Validator/", $this->_agent);
				$aresult = explode('/',stristr($ua,'W3C_Validator'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
				$this->_browser_name = self::BROWSER_W3CVALIDATOR;
				return true;
			}
			return false;
		}
	
		protected function checkBrowserSlurp() {
			if( stripos($this->_agent,'slurp') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Slurp'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
				$this->_browser_name = self::BROWSER_SLURP;
				$this->setRobot(true);
				$this->setMobile(false);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserInternetExplorer() {
	
			// Test for v1 - v1.5 IE
			if( stripos($this->_agent,'microsoft internet explorer') !== false ) {
				$this->setBrowser(self::BROWSER_IE);
				$this->setVersion('1.0');
				$aresult = stristr($this->_agent, '/');
				if( preg_match('/308|425|426|474|0b1/i', $aresult) ) {
					$this->setVersion('1.5');
				}
				return true;
			}
			// Test for versions > 1.5
			else if( stripos($this->_agent,'msie') !== false && stripos($this->_agent,'opera') === false ) {
				// See if the browser is the odd MSN Explorer
				if( stripos($this->_agent,'msnb') !== false ) {
					$aresult = explode(' ',stristr(str_replace(';','; ',$this->_agent),'MSN'));
					$this->setBrowser( self::BROWSER_MSN );
					$this->setVersion(str_replace(array('(',')',';'),'',$aresult[1]));
					return true;
				}
				$aresult = explode(' ',stristr(str_replace(';','; ',$this->_agent),'msie'));
				$this->setBrowser( self::BROWSER_IE );
				$this->setVersion(str_replace(array('(',')',';'),'',$aresult[1]));
				return true;
			}
			// Test for Pocket IE
			else if( stripos($this->_agent,'mspie') !== false || stripos($this->_agent,'pocket') !== false ) {
				$aresult = explode(' ',stristr($this->_agent,'mspie'));
				$this->setPlatform( self::PLATFORM_WINDOWS_CE );
				$this->setBrowser( self::BROWSER_POCKET_IE );
				$this->setMobile(true);
	
				if( stripos($this->_agent,'mspie') !== false ) {
					$this->setVersion($aresult[1]);
				}
				else {
					$aversion = explode('/',$this->_agent);
					$this->setVersion($aversion[1]);
				}
				return true;
			}
			return false;
		}
	
		protected function checkBrowserOpera() {
			if( stripos($this->_agent,'opera mini') !== false ) {
				$resultant = stristr($this->_agent, 'opera mini');
				if( preg_match('/\//',$resultant) ) {
					$aresult = explode('/',$resultant);
					$aversion = explode(' ',$aresult[1]);
					$this->setVersion($aversion[0]);
				}
				else {
					$aversion = explode(' ',stristr($resultant,'opera mini'));
					$this->setVersion($aversion[1]);
				}
				$this->_browser_name = self::BROWSER_OPERA_MINI;
				$this->setMobile(true);
				return true;
			}
			else if( stripos($this->_agent,'opera') !== false ) {
				$resultant = stristr($this->_agent, 'opera');
				if( preg_match('/Version\/(10.*)$/',$resultant,$matches) ) {
					$this->setVersion($matches[1]);
				}
				else if( preg_match('/\//',$resultant) ) {
					$aresult = explode('/',str_replace("("," ",$resultant));
					$aversion = explode(' ',$aresult[1]);
					$this->setVersion($aversion[0]);
				}
				else {
					$aversion = explode(' ',stristr($resultant,'opera'));
					$this->setVersion(isset($aversion[1])?$aversion[1]:"");
				}
				$this->_browser_name = self::BROWSER_OPERA;
				return true;
			}
			return false;
		}
	
	
		protected function checkBrowserChrome() {
			if( stripos($this->_agent,'Chrome') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Chrome'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
	
				$this->setBrowser(self::BROWSER_CHROME);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserWebTv() {
			if( stripos($this->_agent,'webtv') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'webtv'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
				$this->setBrowser(self::BROWSER_WEBTV);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserNetPositive() {
			if( stripos($this->_agent,'NetPositive') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'NetPositive'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion(str_replace(array('(',')',';'),'',$aversion[0]));
				$this->setBrowser(self::BROWSER_NETPOSITIVE);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserGaleon() {
			if( stripos($this->_agent,'galeon') !== false ) {
				$aresult = explode(' ',stristr($this->_agent,'galeon'));
				$aversion = explode('/',$aresult[0]);
				$this->setVersion($aversion[1]);
				$this->setBrowser(self::BROWSER_GALEON);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserKonqueror() {
			if( stripos($this->_agent,'Konqueror') !== false ) {
				$aresult = explode(' ',stristr($this->_agent,'Konqueror'));
				$aversion = explode('/',$aresult[0]);
				$this->setVersion($aversion[1]);
				$this->setBrowser(self::BROWSER_KONQUEROR);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserIcab() {
			if( stripos($this->_agent,'icab') !== false ) {
				$aversion = explode(' ',stristr(str_replace('/',' ',$this->_agent),'icab'));
				$this->setVersion($aversion[1]);
				$this->setBrowser(self::BROWSER_ICAB);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserOmniWeb() {
			if( stripos($this->_agent,'omniweb') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'omniweb'));
				$aversion = explode(' ',isset($aresult[1])?$aresult[1]:"");
				$this->setVersion($aversion[0]);
				$this->setBrowser(self::BROWSER_OMNIWEB);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserPhoenix() {
			if( stripos($this->_agent,'Phoenix') !== false ) {
				$aversion = explode('/',stristr($this->_agent,'Phoenix'));
				$this->setVersion($aversion[1]);
				$this->setBrowser(self::BROWSER_PHOENIX);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserFirebird() {
			if( stripos($this->_agent,'Firebird') !== false ) {
				$aversion = explode('/',stristr($this->_agent,'Firebird'));
				$this->setVersion($aversion[1]);
				$this->setBrowser(self::BROWSER_FIREBIRD);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserNetscapeNavigator9Plus() {
			if( stripos($this->_agent,'Firefox') !== false && preg_match('/Navigator\/([^ ]*)/i',$this->_agent,$matches) ) {
				$this->setVersion($matches[1]);
				$this->setBrowser(self::BROWSER_NETSCAPE_NAVIGATOR);
				return true;
			}
			else if( stripos($this->_agent,'Firefox') === false && preg_match('/Netscape6?\/([^ ]*)/i',$this->_agent,$matches) ) {
				$this->setVersion($matches[1]);
				$this->setBrowser(self::BROWSER_NETSCAPE_NAVIGATOR);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserShiretoko() {
			if( stripos($this->_agent,'Mozilla') !== false && preg_match('/Shiretoko\/([^ ]*)/i',$this->_agent,$matches) ) {
				$this->setVersion($matches[1]);
				$this->setBrowser(self::BROWSER_SHIRETOKO);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserIceCat() {
			if( stripos($this->_agent,'Mozilla') !== false && preg_match('/IceCat\/([^ ]*)/i',$this->_agent,$matches) ) {
				$this->setVersion($matches[1]);
				$this->setBrowser(self::BROWSER_ICECAT);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserNokia() {
			if( preg_match("/Nokia([^\/]+)\/([^ SP]+)/i",$this->_agent,$matches) ) {
				$this->setVersion($matches[2]);
				if( stripos($this->_agent,'Series60') !== false || strpos($this->_agent,'S60') !== false ) {
					$this->setBrowser(self::BROWSER_NOKIA_S60);
				}
				else {
					$this->setBrowser( self::BROWSER_NOKIA );
				}
				$this->setMobile(true);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserFirefox() {
			if( stripos($this->_agent,'safari') === false ) {
				if( preg_match("/Firefox[\/ \(]([^ ;\)]+)/i",$this->_agent,$matches) ) {
					$this->setVersion($matches[1]);
					$this->setBrowser(self::BROWSER_FIREFOX);
					return true;
				}
				else if( preg_match("/Firefox$/i",$this->_agent,$matches) ) {
					$this->setVersion("");
					$this->setBrowser(self::BROWSER_FIREFOX);
					return true;
				}
			}
			return false;
		}
	
		protected function checkBrowserIceweasel() {
			if( stripos($this->_agent,'Iceweasel') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Iceweasel'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
				$this->setBrowser(self::BROWSER_ICEWEASEL);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserMozilla() {
			if( stripos($this->_agent,'mozilla') !== false  && preg_match('/rv:[0-9].[0-9][a-b]?/i',$this->_agent) && stripos($this->_agent,'netscape') === false) {
				$aversion = explode(' ',stristr($this->_agent,'rv:'));
				preg_match('/rv:[0-9].[0-9][a-b]?/i',$this->_agent,$aversion);
				$this->setVersion(str_replace('rv:','',$aversion[0]));
				$this->setBrowser(self::BROWSER_MOZILLA);
				return true;
			}
			else if( stripos($this->_agent,'mozilla') !== false && preg_match('/rv:[0-9]\.[0-9]/i',$this->_agent) && stripos($this->_agent,'netscape') === false ) {
				$aversion = explode('',stristr($this->_agent,'rv:'));
				$this->setVersion(str_replace('rv:','',$aversion[0]));
				$this->setBrowser(self::BROWSER_MOZILLA);
				return true;
			}
			else if( stripos($this->_agent,'mozilla') !== false  && preg_match('/mozilla\/([^ ]*)/i',$this->_agent,$matches) && stripos($this->_agent,'netscape') === false ) {
				$this->setVersion($matches[1]);
				$this->setBrowser(self::BROWSER_MOZILLA);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserLynx() {
			if( stripos($this->_agent,'lynx') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Lynx'));
				$aversion = explode(' ',(isset($aresult[1])?$aresult[1]:""));
				$this->setVersion($aversion[0]);
				$this->setBrowser(self::BROWSER_LYNX);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserAmaya() {
			if( stripos($this->_agent,'amaya') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Amaya'));
				$aversion = explode(' ',$aresult[1]);
				$this->setVersion($aversion[0]);
				$this->setBrowser(self::BROWSER_AMAYA);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserSafari() {
			if( stripos($this->_agent,'Safari') !== false && stripos($this->_agent,'iPhone') === false && stripos($this->_agent,'iPod') === false ) {
				$aresult = explode('/',stristr($this->_agent,'Version'));
				if( isset($aresult[1]) ) {
					$aversion = explode(' ',$aresult[1]);
					$this->setVersion($aversion[0]);
				}
				else {
					$this->setVersion(self::VERSION_UNKNOWN);
				}
				$this->setBrowser(self::BROWSER_SAFARI);
				return true;
			}
			return false;
		}
	
		protected function checkBrowseriPhone() {
			if( stripos($this->_agent,'iPhone') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Version'));
				if( isset($aresult[1]) ) {
					$aversion = explode(' ',$aresult[1]);
					$this->setVersion($aversion[0]);
				}
				else {
					$this->setVersion(self::VERSION_UNKNOWN);
				}
				$this->setMobile(true);
				$this->setBrowser(self::BROWSER_IPHONE);
				return true;
			}
			return false;
		}
	
		protected function checkBrowseriPad() {
			if( stripos($this->_agent,'iPad') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Version'));
				if( isset($aresult[1]) ) {
					$aversion = explode(' ',$aresult[1]);
					$this->setVersion($aversion[0]);
				}
				else {
					$this->setVersion(self::VERSION_UNKNOWN);
				}
				$this->setMobile(true);
				$this->setBrowser(self::BROWSER_IPAD);
				return true;
			}
			return false;
		}
	
		protected function checkBrowseriPod() {
			if( stripos($this->_agent,'iPod') !== false ) {
				$aresult = explode('/',stristr($this->_agent,'Version'));
				if( isset($aresult[1]) ) {
					$aversion = explode(' ',$aresult[1]);
					$this->setVersion($aversion[0]);
				}
				else {
					$this->setVersion(self::VERSION_UNKNOWN);
				}
				$this->setMobile(true);
				$this->setBrowser(self::BROWSER_IPOD);
				return true;
			}
			return false;
		}
	
		protected function checkBrowserAndroid() {
			if( stripos($this->_agent,'Android') !== false ) {
				$aresult = explode(' ',stristr($this->_agent,'Android'));
				if( isset($aresult[1]) ) {
					$aversion = explode(' ',$aresult[1]);
					$this->setVersion($aversion[0]);
				}
				else {
					$this->setVersion(self::VERSION_UNKNOWN);
				}
				$this->setMobile(true);
				$this->setBrowser(self::BROWSER_ANDROID);
				return true;
			}
			return false;
		}
	
		/**
		 * Determine the user's platform
		 */
		protected function checkPlatform() {
			if( stripos($this->_agent, 'windows') !== false ) {
				$this->_platform = self::PLATFORM_WINDOWS;
			}
			else if( stripos($this->_agent, 'iPad') !== false ) {
				$this->_platform = self::PLATFORM_IPAD;
			}
			else if( stripos($this->_agent, 'iPod') !== false ) {
				$this->_platform = self::PLATFORM_IPOD;
			}
			else if( stripos($this->_agent, 'iPhone') !== false ) {
				$this->_platform = self::PLATFORM_IPHONE;
			}
			elseif( stripos($this->_agent, 'mac') !== false ) {
				$this->_platform = self::PLATFORM_APPLE;
			}
			elseif( stripos($this->_agent, 'android') !== false ) {
				$this->_platform = self::PLATFORM_ANDROID;
			}
			elseif( stripos($this->_agent, 'linux') !== false ) {
				$this->_platform = self::PLATFORM_LINUX;
			}
			else if( stripos($this->_agent, 'Nokia') !== false ) {
				$this->_platform = self::PLATFORM_NOKIA;
			}
			else if( stripos($this->_agent, 'BlackBerry') !== false ) {
				$this->_platform = self::PLATFORM_BLACKBERRY;
			}
			elseif( stripos($this->_agent,'FreeBSD') !== false ) {
				$this->_platform = self::PLATFORM_FREEBSD;
			}
			elseif( stripos($this->_agent,'OpenBSD') !== false ) {
				$this->_platform = self::PLATFORM_OPENBSD;
			}
			elseif( stripos($this->_agent,'NetBSD') !== false ) {
				$this->_platform = self::PLATFORM_NETBSD;
			}
			elseif( stripos($this->_agent, 'OpenSolaris') !== false ) {
				$this->_platform = self::PLATFORM_OPENSOLARIS;
			}
			elseif( stripos($this->_agent, 'SunOS') !== false ) {
				$this->_platform = self::PLATFORM_SUNOS;
			}
			elseif( stripos($this->_agent, 'OS\/2') !== false ) {
				$this->_platform = self::PLATFORM_OS2;
			}
			elseif( stripos($this->_agent, 'BeOS') !== false ) {
				$this->_platform = self::PLATFORM_BEOS;
			}
			elseif( stripos($this->_agent, 'win') !== false ) {
				$this->_platform = self::PLATFORM_WINDOWS;
			}
	
		}
	}
	
	
	
	function getSigla($hostname){
		
		if ($sigla == 'org') { $pais = "Estados Unidos";}
		if ($sigla == 'net') { $pais = "Estados Unidos";}
		if ($sigla == 'com') { $pais = "Estados Unidos";}
		
		$sigla = substr($hostname, -3);
		if ($sigla == '.aw') { $pais = "ARUBA";}
		if ($sigla == '.af') { $pais = "AFEGANISTÃO";}
		if ($sigla == '.ao') { $pais = "ANGOLA";}
		if ($sigla == '.al') { $pais = "ALBÂNIA";}
		if ($sigla == '.ad') { $pais = "ANDORRA";}
		if ($sigla == '.an') { $pais = "PAÍSES BAIXOS ANTILHAS";}
		if ($sigla == '.ae') { $pais = "EMIRADOS ÁRABES UNIDOS";}
		if ($sigla == '.ar') { $pais = "ARGENTINA";}
		if ($sigla == '.am') { $pais = "ARMÊNIA";}
		if ($sigla == '.as') { $pais = "SAMOA AMERICANAS";}
		if ($sigla == '.aq') { $pais = "ANTARTICA";}
		if ($sigla == '.tf') { $pais = "TERRITÓRIOS FRANCESES  DO SUL ";}
		if ($sigla == '.ag') { $pais = "ANTIGUA E BARBUDA";}
		if ($sigla == '.au') { $pais = "AUSTRÁLIA";}
		if ($sigla == '.at') { $pais = "ÁUSTRIA";}
		if ($sigla == '.az') { $pais = "AZERBAIJÃO";}
		if ($sigla == '.bi') { $pais = "BURUNDI";}
		if ($sigla == '.be') { $pais = "BÉLGICA";}
		if ($sigla == '.bj') { $pais = "BENIM";}
		if ($sigla == '.bd') { $pais = "BANGLADECHE";}
		if ($sigla == '.bg') { $pais = "BULGÁRIA";}
		if ($sigla == '.bh') { $pais = "BARÉM";}
		if ($sigla == '.bs') { $pais = "BAHAMAS";}
		if ($sigla == '.ba') { $pais = "BÓSNIA E HERZEGOVINA";}
		if ($sigla == '.by') { $pais = "BELARÚSSIA";}
		if ($sigla == '.bz') { $pais = "BELIZE";}
		if ($sigla == '.bm') { $pais = "BERMUDAS";}
		if ($sigla == '.bo') { $pais = "BOLIVIA";}
		if ($sigla == '.br') { $pais = "BRASIL";}
		if ($sigla == '.bb') { $pais = "BARBADOS";}
		if ($sigla == '.bn') { $pais = "DARUSSALAM DE BRUNEI";}
		if ($sigla == '.bt') { $pais = "BUTÃO";}
		if ($sigla == '.bw') { $pais = "BOTSUANA";}
		if ($sigla == '.cf') { $pais = "REPÚBLICA AFRICANA CENTRAL";}
		if ($sigla == '.ca') { $pais = "CANADÁ";}
		if ($sigla == '.ch') { $pais = "SUIÇA";}
		if ($sigla == '.cl') { $pais = "CHILE";}
		if ($sigla == '.cn') { $pais = "CHINA";}
		if ($sigla == '.ci') { $pais = "COTE D'IVOIRE";}
		if ($sigla == '.cm') { $pais = "CAMARÕES";}
		if ($sigla == '.cd') { $pais = "O REPÚBLICA DEMOCRÁTICA DO CONGO";}
		if ($sigla == '.cg') { $pais = "CONGO";}
		if ($sigla == '.ck') { $pais = "ILHAS COOK";}
		if ($sigla == '.co') { $pais = "COLÔMBIA";}
		if ($sigla == '.km') { $pais = "COMOROS";}
		if ($sigla == '.cv') { $pais = "CAPE VERDE";}
		if ($sigla == '.cr') { $pais = "COSTA RICA";}
		if ($sigla == '.cu') { $pais = "CUBA";}
		if ($sigla == '.ky') { $pais = "ILHAS CAYMAN";}
		if ($sigla == '.cy') { $pais = "CHIPRE";}
		if ($sigla == '.cz') { $pais = "REPÚBLICA TCHECA";}
		if ($sigla == '.de') { $pais = "ALEMANHA";}
		if ($sigla == '.dj') { $pais = "DJIBOUTI";}
		if ($sigla == '.dm') { $pais = "DOMÍNICA";}
		if ($sigla == '.dk') { $pais = "DINAMARCA";}
		if ($sigla == '.do') { $pais = "REPÚBLICA DOMINICANA";}
		if ($sigla == '.dz') { $pais = "ARGÉLIA";}
		if ($sigla == '.ec') { $pais = "EQUADOR";}
		if ($sigla == '.eg') { $pais = "EGITO";}
		if ($sigla == '.er') { $pais = "ERITREA";}
		if ($sigla == '.es') { $pais = "ESPANHA";}
		if ($sigla == '.ee') { $pais = "ESTÔNIA";}
		if ($sigla == '.et') { $pais = "ETIÓPIA";}
		if ($sigla == '.fi') { $pais = "FINLÂNDIA";}
		if ($sigla == '.fj') { $pais = "FIJI";}
		if ($sigla == '.fk') { $pais = "ILHAS MALVINAS (MALVINAS)";}
		if ($sigla == '.fr') { $pais = "FRANÇA";}
		if ($sigla == '.fo') { $pais = "ILHAS DE FAROE";}
		if ($sigla == '.fm') { $pais = "ESTADOS FEDERADOS DE MICRONESIA";}
		if ($sigla == '.ga') { $pais = "GABÃO";}
		if ($sigla == '.gb') { $pais = "REINO UNIDO";}
		if ($sigla == '.ge') { $pais = "GEÓRGIA";}
		if ($sigla == '.gh') { $pais = "GHANA";}
		if ($sigla == '.gi') { $pais = "GIBRALTAR";}
		if ($sigla == '.gn') { $pais = "GUINÉ";}
		if ($sigla == '.gp') { $pais = "GUADALUPE";}
		if ($sigla == '.gm') { $pais = "GAMBIA";}
		if ($sigla == '.gw') { $pais = "GUINÉ BISSAU";}
		if ($sigla == '.gq') { $pais = "GUINÉ EQUATORIAL";}
		if ($sigla == '.gr') { $pais = "GRÉCIA";}
		if ($sigla == '.gd') { $pais = "GRENADA";}
		if ($sigla == '.gl') { $pais = "GROELÂNDIA";}
		if ($sigla == '.gt') { $pais = "GUATEMALA";}
		if ($sigla == '.gf') { $pais = "GUIANA FRANCESA";}
		if ($sigla == '.gu') { $pais = "GUAM";}
		if ($sigla == '.gy') { $pais = "GUIANA";}
		if ($sigla == '.hk') { $pais = "HONG KONG";}
		if ($sigla == '.hn') { $pais = "HONDURAS";}
		if ($sigla == '.hr') { $pais = "CROÁCIA";}
		if ($sigla == '.ht') { $pais = "HAITI";}
		if ($sigla == '.hu') { $pais = "HUNGRIA";}
		if ($sigla == '.id') { $pais = "INDONÉSIA";}
		if ($sigla == '.in') { $pais = "ÍNDIA";}
		if ($sigla == '.io') { $pais = "TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO";}
		if ($sigla == '.ie') { $pais = "IRLANDA";}
		if ($sigla == '.ir') { $pais = "REPÚBLICA ISLÂMICA DO IRÃ";}
		if ($sigla == '.iq') { $pais = "IRAQUE";}
		if ($sigla == '.is') { $pais = "ISLÂNDIA";}
		if ($sigla == '.il') { $pais = "ISRAEL";}
		if ($sigla == '.it') { $pais = "ITÁLIA";}
		if ($sigla == '.jm') { $pais = "JAMAICA";}
		if ($sigla == '.jo') { $pais = "JORDÂNIA";}
		if ($sigla == '.jp') { $pais = "JAPÃO";}
		if ($sigla == '.kz') { $pais = "KAZAKHSTÃO";}
		if ($sigla == '.ke') { $pais = "QUÊNIA";}
		if ($sigla == '.kg') { $pais = "KYRGYZSTÃO";}
		if ($sigla == '.kh') { $pais = "CAMBOJA";}
		if ($sigla == '.ki') { $pais = "KIRIBATI";}
		if ($sigla == '.kn') { $pais = "SÃO KITTS E NEVIS";}
		if ($sigla == '.kr') { $pais = "A REPÚBLICA DA CORÉIA";}
		if ($sigla == '.kw') { $pais = "KUWAIT";}
		if ($sigla == '.la') { $pais = "REPÚBLICA DEMOCRÁTICA DAS PESSOAS DE LAO";}
		if ($sigla == '.lb') { $pais = "LÍBANO";}
		if ($sigla == '.lr') { $pais = "LIBÉRIA";}
		if ($sigla == '.ly') { $pais = "JAMAHIRIYA LÍBIO ÁRABE";}
		if ($sigla == '.lc') { $pais = "SANTA LÚCIA";}
		if ($sigla == '.li') { $pais = "LIECHTENSTEIN";}
		if ($sigla == '.lk') { $pais = "SRI LANKA";}
		if ($sigla == '.ls') { $pais = "LESOTHO";}
		if ($sigla == '.lt') { $pais = "LITUÂNIA";}
		if ($sigla == '.lu') { $pais = "LUXEMBURGO";}
		if ($sigla == '.lv') { $pais = "LETÔNIA";}
		if ($sigla == '.mo') { $pais = "MACAU";}
		if ($sigla == '.ma') { $pais = "MARROCOS";}
		if ($sigla == '.mc') { $pais = "MÔNACO";}
		if ($sigla == '.md') { $pais = "REPÚBLICA DE MOLDOVA";}
		if ($sigla == '.mg') { $pais = "MADAGÁSCAR";}
		if ($sigla == '.mv') { $pais = "MALDIVES";}
		if ($sigla == '.mx') { $pais = "MÉXICO";}
		if ($sigla == '.mh') { $pais = "ILHAS MARSHALL";}
		if ($sigla == '.mk') { $pais = "A REPÚBLICA JUGOSLAVA ANTERIOR DE MACEDONIA";}
		if ($sigla == '.ml') { $pais = "MALI";}
		if ($sigla == '.mt') { $pais = "MALTA";}
		if ($sigla == '.mm') { $pais = "MYANMAR";}
		if ($sigla == '.mn') { $pais = "MONGÓLIA";}
		if ($sigla == '.mp') { $pais = "ILHAS DO NORTE DE MARIANA";}
		if ($sigla == '.mz') { $pais = "MOÇAMBIQUE";}
		if ($sigla == '.mr') { $pais = "MAURITÂNIA";}
		if ($sigla == '.mq') { $pais = "MARTINIQUE";}
		if ($sigla == '.mu') { $pais = "MAURITIUS";}
		if ($sigla == '.mw') { $pais = "MALAWI";}
		if ($sigla == '.my') { $pais = "MALÁSIA";}
		if ($sigla == '.yt') { $pais = "MAYOTTE";}
		if ($sigla == '.na') { $pais = "NAMÍBIA";}
		if ($sigla == '.nc') { $pais = "NOVA CALEDONIA";}
		if ($sigla == '.ne') { $pais = "NÍGER";}
		if ($sigla == '.nf') { $pais = "ILHA DE NORFOLK";}
		if ($sigla == '.ng') { $pais = "NIGÉRIA";}
		if ($sigla == '.ni') { $pais = "NICARÁGUA";}
		if ($sigla == '.nl') { $pais = "PAÍSES BAIXOS ANTILHAS";}
		if ($sigla == '.no') { $pais = "NORUEGA";}
		if ($sigla == '.np') { $pais = "NEPAL";}
		if ($sigla == '.nr') { $pais = "NAURU";}
		if ($sigla == '.nz') { $pais = "NOVA ZELÂNDIA";}
		if ($sigla == '.om') { $pais = "OMAN";}
		if ($sigla == '.pk') { $pais = "PAQUISTÃO";}
		if ($sigla == '.pa') { $pais = "PANAMÁ";}
		if ($sigla == '.pe') { $pais = "PERÚ";}
		if ($sigla == '.ph') { $pais = "FILIPINAS";}
		if ($sigla == '.pw') { $pais = "PALAU";}
		if ($sigla == '.pg') { $pais = "PAPUA NOVA GUINÉ";}
		if ($sigla == '.pl') { $pais = "POLÔNIA";}
		if ($sigla == '.pr') { $pais = "PORTO RICO";}
		if ($sigla == '.pt') { $pais = "PORTUGAL";}
		if ($sigla == '.py') { $pais = "PARAGUAI";}
		if ($sigla == '.ps') { $pais = "TERRITÓRIO PALESTINO OCUPADO";}
		if ($sigla == '.pf') { $pais = "POLINÉSIA FRANCESA";}
		if ($sigla == '.qa') { $pais = "QATAR";}
		if ($sigla == '.re') { $pais = "REUNION";}
		if ($sigla == '.ro') { $pais = "ROMÊNIA";}
		if ($sigla == '.ru') { $pais = "FEDERAÇÃO RUSSA";}
		if ($sigla == '.rw') { $pais = "RUANDA";}
		if ($sigla == '.sa') { $pais = "ARÁBIA SAUDITA";}
		if ($sigla == '.cs') { $pais = "A SÉRVIA E MONTENEGRO";}
		if ($sigla == '.sd') { $pais = "SUDÃO";}
		if ($sigla == '.sn') { $pais = "SENEGAL";}
		if ($sigla == '.sg') { $pais = "SINGAPURA";}
		if ($sigla == '.sb') { $pais = "ILHAS DE SOLOMÃO";}
		if ($sigla == '.sl') { $pais = "SERRA LEÃO";}
		if ($sigla == '.sv') { $pais = "EL SALVADOR";}
		if ($sigla == '.sm') { $pais = "SAN MARINO";}
		if ($sigla == '.so') { $pais = "SOMÁLIA";}
		if ($sigla == '.st') { $pais = "SÃO TOME E PRINCIPE";}
		if ($sigla == '.sr') { $pais = "SURINAME";}
		if ($sigla == '.sk') { $pais = "ESLOVÁQUIA";}
		if ($sigla == '.si') { $pais = "ESLOVÉNIA";}
		if ($sigla == '.se') { $pais = "SUÉCIA";}
		if ($sigla == '.sz') { $pais = "SUAZILÂNDIA";}
		if ($sigla == '.sc') { $pais = "SEYCHELLES";}
		if ($sigla == '.sy') { $pais = "REPÚBLICA SÍRIA ÁRABE";}
		if ($sigla == '.td') { $pais = "CHAD";}
		if ($sigla == '.tg') { $pais = "TOGO";}
		if ($sigla == '.th') { $pais = "TAILÂNDIA";}
		if ($sigla == '.tj') { $pais = "TAJIKISTÃO";}
		if ($sigla == '.tk') { $pais = "TOKELAU";}
		if ($sigla == '.tm') { $pais = "TURQUEMENISTÃO";}
		if ($sigla == '.tl') { $pais = "TIMOR-LESTE";}
		if ($sigla == '.to') { $pais = "TONGA";}
		if ($sigla == '.tt') { $pais = "TRINDADE E TOBAGO";}
		if ($sigla == '.tn') { $pais = "TUNÍSIA";}
		if ($sigla == '.tr') { $pais = "TURQUIA";}
		if ($sigla == '.tv') { $pais = "TUVALU";}
		if ($sigla == '.tw') { $pais = "TAIWAN";}
		if ($sigla == '.tz') { $pais = "REPÚBLICA UNIDA DE TANZÂNIA";}
		if ($sigla == '.ug') { $pais = "UGANDA";}
		if ($sigla == '.ua') { $pais = "UCRÂNIA";}
		if ($sigla == '.uy') { $pais = "URUGUAI";}
		if ($sigla == '.us') { $pais = "ESTADOS UNIDOS";}
		if ($sigla == '.uz') { $pais = "USBEQUISTÃO";}
		if ($sigla == '.va') { $pais = "VATICANO";}
		if ($sigla == '.vc') { $pais = "SÃO VICENTE E GRENADINES";}
		if ($sigla == '.ve') { $pais = "VENEZUELA";}
		if ($sigla == '.vg') { $pais = "ILHAS VIRGENS BRITÂNICAS";}
		if ($sigla == '.vi') { $pais = "ILHAS VIRGENS DOS EUA";}
		if ($sigla == '.vn') { $pais = "VIETNAM";}
		if ($sigla == '.vu') { $pais = "VANUATU";}
		if ($sigla == '.ws') { $pais = "SAMOA";}
		if ($sigla == '.ye') { $pais = "IÉMEN";}
		if ($sigla == '.za') { $pais = "ÁFRICA DO SUL";}
		if ($sigla == '.zm') { $pais = "ZÂMBIA";}
		if ($sigla == '.zw') { $pais = "ZIMBABUÉ";}
		
		// Verifica domínios .org .net .com
		if ($sigla == 'org') { $pais = "Estados Unidos";}
		if ($sigla == 'net') { $pais = "Estados Unidos";}
		if ($sigla == 'com') { $pais = "Estados Unidos";}
		
		return $sigla;
	}
	


} 



class scanDir {
    static private $directories, $files, $ext_filter, $recursive;

// ----------------------------------------------------------------------------------------------
    // scan(dirpath::string|array, extensions::string|array, recursive::true|false)
    static public function scan(){
        // Initialize defaults
        self::$recursive = false;
        self::$directories = array();
        self::$files = array();
        self::$ext_filter = false;

        // Check we have minimum parameters
        if(!$args = func_get_args()){
            die("Must provide a path string or array of path strings");
        }
        if(gettype($args[0]) != "string" && gettype($args[0]) != "array"){
            die("Must provide a path string or array of path strings");
        }

        // Check if recursive scan | default action: no sub-directories
        if(isset($args[2]) && $args[2] == true){self::$recursive = true;}

        // Was a filter on file extensions included? | default action: return all file types
        if(isset($args[1])){
            if(gettype($args[1]) == "array"){self::$ext_filter = array_map('strtolower', $args[1]);}
            else
            if(gettype($args[1]) == "string"){self::$ext_filter[] = strtolower($args[1]);}
        }

        // Grab path(s)
        self::verifyPaths($args[0]);
        return self::$files;
    }

    static private function verifyPaths($paths){
        $path_errors = array();
        if(gettype($paths) == "string"){$paths = array($paths);}

        foreach($paths as $path){
            if(is_dir($path)){
                self::$directories[] = $path;
                $dirContents = self::find_contents($path);
            } else {
                $path_errors[] = $path;
            }
        }

        if($path_errors){echo "The following directories do not exists<br />";die(var_dump($path_errors));}
    }

    // This is how we scan directories
    static private function find_contents($dir){
        $result = array();
        $root = scandir($dir);
        foreach($root as $value){
            if($value === '.' || $value === '..') {continue;}
            if(is_file($dir.DIRECTORY_SEPARATOR.$value)){
                if(!self::$ext_filter || in_array(strtolower(pathinfo($dir.DIRECTORY_SEPARATOR.$value, PATHINFO_EXTENSION)), self::$ext_filter)){
                    self::$files[] = $result[] = $dir.DIRECTORY_SEPARATOR.$value;
                }
                continue;
            }
            if(self::$recursive){
                foreach(self::find_contents($dir.DIRECTORY_SEPARATOR.$value) as $value) {
                    self::$files[] = $result[] = $value;
                }
            }
        }
        // Return required for recursive search
        return $result;
    }
}


?>