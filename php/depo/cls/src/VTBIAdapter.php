<?php
class VTBIAdapter extends Tym{
  public function __construct($cfg="config.ini"){
      $this->logger=Logger::getLogger(__CLASS__);
      $ini=parse_ini_file($cfg,true);
      $this->options['host']=isset($ini['VTBI']['host'])?$ini['VTBI']['host']:'http://127.0.0.1:15003';
      $this->options['station']=isset($ini['VTBI']['station'])?$ini['VTBI']['station']:'50';
      $this->options['encrypt']=isset($ini['VTBI']['encrypt'])?$ini['VTBI']['encrypt']:0;
      $this->options['schemans']=isset($ini['VTBI']['schemans'])?$ini['VTBI']['schemans']:'http://schemas.compassplus.com/two/1.0/telebank.xsd';
      $this->requestHeaders=array(
    		"Ver"=>"4"
    		,"Product"=>"TB"
    		,'STAN'=>0
        //,'RetAddress'=>'172.17.31.25'
    	);
  }
  public function GetKey(){
    $p=$this->makeVTBIRequest(__FUNCTION__);
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    //var_dump($response->getElementsByTagNameNS($this->options['schemans'],'Key')->item(0));
    $this->sessionKey=$response->getElementsByTagNameNS($this->options['schemans'],'Key')->item(0)->nodeValue;
    $this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    $this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
    $this->requestHeaders['KeyId']=$this->sessionKeyId;
  }
  public function CreateSession(){
    $p=$this->makeVTBIRequest(__FUNCTION__);
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    $this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    $this->requestHeaders['KeyId']=$this->sessionKeyId;
  }
  public function GetPAN($arq){
    $this->checkRequestParameters($arq,array('login'),__METHOD__);
    $p=$this->makeVTBIRequest(__FUNCTION__,array('TextLogin'=>$arq['login']));
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    $this->requestHeaders['PAN']=$response->getElementsByTagNameNS($this->options['schemans'],'PAN')->item(0)->nodeValue;
    $this->requestHeaders['MBR']="0";
    $this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
	return $this->requestHeaders['PAN'];
  }
  public function ChangeTextLogin($arq){
    $this->checkRequestParameters($arq,array('login'),__METHOD__);
    $this->checkSession();
    $this->login=$arq['login'];
    $p=$this->makeVTBIRequest(__FUNCTION__,array('TextLogin'=>$login));
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    //$this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    $this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
  }
  public function Logon($arq){
    $this->checkRequestParameters($arq,array('pin','telebank'),__METHOD__);
    $this->checkSession($arq);
    $this->requestHeaders['PIN']=$arq['pin'];
    $this->requestHeaders['PAN']=$arq['telebank'];
    //$p=$this->makeVTBIRequest(__FUNCTION__,array('TextLogin'=>$login));
    $p=$this->makeVTBIRequest(__FUNCTION__,array());
    $responseStr=$this->postData($p);
	//echo '<pre>'; print_r(htmlspecialchars($responseStr)); echo '</pre>';
	//echo '<pre>'; print_r($p); echo '</pre>';
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    //$this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    //$this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
    //$res=array();
	$res['response'] = $responseStr;
	$res['KeyId'] = $this->sessionKeyId;
    return $res;
  }
	public $resxml, $reqxml;
  public function sendData(){ //первый аргумент - соап метод (без rq), второй заголовки, третий - данные
	//echo 'TEST<br />'.__METHOD__;
	$args = func_get_args();
    //$this->checkRequestParameters($args[1],array('KeyId'),$args[0]);
    $this->checkSession($args[1]);
	//print_r($this->requestHeaders);
	$def_head = $this->requestHeaders;
    $this->requestHeaders=array_merge($def_head, $args[1]);
	//print_r($this->requestHeaders);
	$this->requestHeaders['STAN']=$_SESSION['STAN'];
	if(!$args[2]){
		$args[2] = array();
	}
	
    $p=$this->makeVTBIRequest($args[0], $args[2]);
	$this->reqxml = htmlspecialchars($p['data']);
	
	//echo '<pre>';
	//print_r('<!--'.$this->reqxml.'-->');
	//print_r($this->reqxml);
	//echo '</pre>';
	
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    //$this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    //$this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
    //$res=array();
	$resxml = htmlspecialchars($responseStr);
	$this->resxml = $resxml;
	//echo '<pre>';
	//print_r('<!--'.$resxml.'-->');
	//print_r($resxml);
	//echo '</pre>';
	
	$res = $responseStr;
    return $res;
  }
  
  public function Accts($arq){
    $this->checkRequestParameters($arq,array('telebank'),__METHOD__);
    $this->checkSession($arq);
    //$this->requestHeaders['PIN']=$arq['pin'];
    $this->requestHeaders['PAN']=$arq['telebank'];
	$this->requestHeaders['PIN']=$_SESSION['PIN'];
	$this->requestHeaders['KeyId']=$_SESSION['KeyId'];
	//print_r($this->requestHeaders);
	//unset($this->requestHeaders['STAN']);
	//var_dump(__FUNCTION__);
    $p=$this->makeVTBIRequest(__FUNCTION__, array());

	//echo $_SESSION["STAN"];
	//print_r(htmlspecialchars($p['data']));
	/*
	echo '<pre>';
	print_r(htmlspecialchars($p['data']));
	echo '</pre>';
	*/
	
	//print_r($this->getArray($p['data']));
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    //$this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    //$this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
    //$res=array();
	$res = $responseStr;
    return $res;
  }
  
  public function GetBackOfficeInfo(){
    $args = func_get_args();
	$arq = $args[0];
    //$this->requestHeaders['PIN']=$arq['pin'];
    $this->requestHeaders['PAN']=$arq['telebank'];
	$this->requestHeaders['PIN']=$_SESSION['PIN'];
	$this->requestHeaders['KeyId']=$_SESSION['KeyId'];
	$this->requestHeaders['STAN']=$_SESSION['STAN'];
	
	$this->checkSession($arq);
	//echo $_SESSION["STAN"];
	$this->checkRequestParameters($arq,array('Ident'),__METHOD__);
	//print_r($this->requestHeaders);
	//unset($this->requestHeaders['STAN']);
    $p=$this->makeVTBIRequest(__FUNCTION__, $arq);
	//echo $_SESSION["STAN"];
	//print_r(htmlspecialchars($p['data']));
	/*
	echo '<pre>';
	print_r($p);
	echo '</pre>';
	*/
	
	//print_r($this->getArray($p['data']));
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    //$this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    //$this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
    //$res=array();
	$res = $responseStr;
    return $res;
  }
  
  public function prg_repl(){
	  $args = func_get_args();
	  
	}
  public function getArray(){
	  $args = func_get_args();
	  $act_txt = htmlspecialchars($args[0]);
	  $act_txt = preg_replace('/\&lt;/', '<', $act_txt);
	  $act_txt = preg_replace('/\&gt;/', '>', $act_txt);
	  $act_txt = preg_replace('/&quot;/', '"', $act_txt);
	  $act_txt = preg_replace('/<[0-9A-Za-z-]*:/', '<', $act_txt);
	  $act_txt = preg_replace('/<\/[0-9A-Za-z-]*:/', '</', $act_txt);
	  //print_r(htmlspecialchars($act_txt));
	  $act_xml = new SimpleXMLElement($act_txt);
	  /*
	  echo '<pre>';
	  print_r($act_xml);
	  echo '</pre>';
	  */
	  //$act_list = $act_xml->Body->AcctsRp->Response->List->Row;
	  $act_list = $act_xml;
	  if($args[1]){
		  $elem = explode(' ', $args[1]);
		  
		  foreach($elem as $key=>$val){
				$act_list = $act_list->$val;
				//echo '<br />'.$val.'<br />';
				//print_r($act_list);
		  }
	  }
	  //print_r($act_list);
	  //echo gettype($act_list);
	  //if(is_array($act_list)){
		  foreach($act_list as $key=>$val){
			  //echo '<br />++>'; print_r($val);echo '<++<br />';
			  $res[] = (array)$val;
			  /*
			  echo $key.'>>>'.gettype($val).'<pre>';
			  print_r($val);
			  echo '</pre>';
			  */
			  
		  }
	  //}
	  
	  //$res = $act_list;
	  return $res;
  }
  
  public function CreateTBCustomer($arq){
    $this->checkRequestParameters($arq,array('pin','login','phone','pan'),__METHOD__);
    $this->checkSession($arq);
    $this->requestHeaders['AuthPAN']=$arq['pan'];
    $this->requestHeaders['AuthMBR']='0';
    $this->requestHeaders['PIN']=substr($arq['pan'],strlen($arq['pan'])-13,12);
    //$p=$this->makeVTBIRequest(__FUNCTION__,array('TextLogin'=>$login));
    $p=$this->makeVTBIRequest(__FUNCTION__,array(
      'TBCustomerPIN'=>$arq['pin']
      ,'TextLogin'=>preg_replace('/\+/i','',$arq['login'])
      ,'Address'=>preg_replace('/\+/i','',$arq['phone'])
    ));
    try{
      $responseStr=$this->postData($p);
    }catch(TymException $e){
      if(preg_match('/text login "'.$arq['login'].'" already exists in institution .*/i',$e->getMessage())){
        $this->warn('Already client');
      }else throw $e;
    }
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    $res=array('telebank'=>$this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'PAN')->item(0)->nodeValue);
    return $res;
  }
  public function PINChange($lastpan,$pin){
    $this->checkSession();
    $pan=$this->requestHeaders['PAN'];
    $newPin=$pin;
    $oldPin=substr($lastpan,strlen($lastpan)-13,12);
    //$oldPin=substr($pan,0,12);
    //$newPin=$this->pinBlock($this->sessionKey,$pan,$newPin);
    $this->requestHeaders['PIN']=$newPin;
    $this->requestHeaders['AuthPAN']=$lastpan;
    $this->requestHeaders['AuthMBR']="0";
    $this->debug('newPIN='.$newPin);
    $p=$this->makeVTBIRequest(__FUNCTION__,array('NewPIN'=>$newPin));
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
  }
  public function ChangePassword($pass){
    $this->checkSession();
    $newPin=$pass;
    $pan=$this->requestHeaders['PAN'];
    $newPin=$this->passowrdHash($pan,$newPin);
    $this->requestHeaders['PIN']="";
    $this->debug('newPIN='.$newPin);
    $p=$this->makeVTBIRequest(__FUNCTION__,array('NewPassword'=>$newPin));
    $responseStr=$this->postData($p);
    $response=new DOMDocument('1.0','utf-8');
    $response->loadXML($responseStr);
    //var_dump($response->getElementsByTagNameNS($this->options['schemans'],'Key')->item(0));
    //$this->sessionKey=$response->getElementsByTagNameNS($this->options['schemans'],'Key')->item(0)->nodeValue;
    //$this->sessionKeyId=$response->getElementsByTagNameNS($this->options['schemans'],'KeyId')->item(0)->nodeValue;
    //$this->debug('KeyId='.$this->sessionKeyId.' Key='.$this->sessionKey);
  }
  protected $sessionKey="";
	protected $sessionKeyId="";
  protected $login="test";
	
	
	//$p=$this->makeVTBIRequest(__FUNCTION__, array())
  protected function makeVTBIRequest($f,$p=null){
    $res=array('func'=>$f,'data'=>'<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tel="http://schemas.compassplus.com/two/1.0/telebank.xsd">
      <soap:Header/>
      <soap:Body>
        <tel:'.$f.'Rq>');
    $res['data'].='<tel:Request'.$this->arrayToAttrString($this->requestHeaders);
	
    if(!is_null($p)&&count($p)){
	  $res['data'].='>';
      foreach($p as $k=>$v){
        $res['data'].='<tel:'.$k.'>'.$v.'</tel:'.$k.'>';
      }
      $res['data'].='</tel:Request>';
    }else $res['data'].='/>';
    $res['data'].='</tel:'.$f.'Rq>
      </soap:Body>
    </soap:Envelope>';
    return $res;
  }
  protected function passowrdHash($pan,$pin){
    $res=$pan.$pin;
    $res=sha1($res);
    $res=substr($res,0,16);
    $res=strtoupper($res);
    return $res;
  }
  protected function pinBlock($key,$pan,$pin){
    $this->debug('PIN block start.');
    if(!$this->options['encrypt']){
      return Tym::StrToHex($pin);
    }
    $pinLen=strlen($pin);
    $pinStr=((strlen($pin)<10)?'0':'').$pinLen.$pin.str_repeat('F',14-strlen($pin));
    $this->debug('PIN['.$pin.']str='.$pinStr);
    $panStr='0000'.substr($pan,strlen($pan)-13,12);
    $this->debug('PAN['.$pan.']str='.$panStr);
    $xored=$this->xorStr($pinStr,$panStr);
    $this->debug('XORed='.$xored);
    $this->debug('XORedHEX='.Tym::StrToHex($xored));
    $res=$this->desEncrypt($key,$xored);
    $this->debug('PINBlock='.$res);
    $this->debug('PIN block end.');
    return $res;
  }
  protected function xorStr($str1,$str2){
    // Let's define our key here
     $key =pack('H*',$str1);
     // Our plaintext/ciphertext
     $text = pack('H*',$str2);
     // Our output text
     $outText = '';
     // Iterate through each character
     for($i=0;$i<strlen($text);){
         for($j=0;($j<strlen($key) && $i<strlen($text));$j++,$i++){
             $outText .= $text{$i} ^ $key{$j};
         }
     }
     $outText=strtoupper($outText);
     return $outText;
  }
  protected function desEncrypt($key,$data){
    $res="";
    $iv_size=mcrypt_get_iv_size("tripledes","cbc");
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    //$key=Tym::HexToStr($key);
    $key=pack('H*',$key);
    $key=$key.substr($key,0,(24-strlen($key)));
    $this->debug('keyStr='.$key);
    $res=mcrypt_encrypt(MCRYPT_3DES, $key, $data, MCRYPT_MODE_ECB);
    $res=strtoupper(Tym::StrToHex($res));
    return $res;
  }
  protected function checkSession($arq){
    if(!isset($this->requestHeaders['KeyId'])||!strlen($this->requestHeaders['KeyId'])){
      $this->options['encrypt']?
        $this->GetKey()
        :$this->CreateSession();
    }
    //if(!isset($this->requestHeaders['PAN'])||!strlen($this->requestHeaders['PAN']))$this->GetPan($arq);
  }
}
?>
