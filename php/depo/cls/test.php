<?php
include('config.php');

// OMS test
$landing=array('fname'=>'Denis'
  ,'mname'=>'G'
  ,'sname'=>'Drake'
  ,'phone'=>'+79261234215'
  ,'email'=>'den@mobiplas.ru'
);

// GO GO
$landing['login']=$landing['phone'];
$landing['fio']=$landing['sname'].' '.$landing['fname'].' '.$landing['mname'];
$landing['nameOnCard']=strtoupper($landing['fname'].' '.$landing['sname']);
$landing['sex']='M';
$landing['pin']='1111';
try{
  $oms=new OMSAdapter('config.ini');
  $fimi=new FIMIAdapter('config.ini');
  $vtbi=new VTBIAdapter('config.ini');
  $user=array_merge($landing,$oms->UserRegistration($landing));
  $user=array_merge($user,$fimi->CreatePerson($user));
  $user=array_merge($user,$fimi->CreateAccount($user));
  $user=array_merge($user,$fimi->CreateVCard($user));
  $user=array_merge($user,$fimi->CNSCardConfig($user));
  $user=array_merge($user,$vtbi->CreateTBCustomer($user));
  $user=array_merge($user,$vtbi->Logon($user));
  var_dump($user);
}
catch(TymException $e){
  $logger->error($e->getMessage());
}
catch(Exception $e){
  $logger->error($e->getMessage());
}
//$vtbi->pinBlock('7159CBFF8D1C398A79B7D0542F046A73',$PAN,'1234');
//$vtbi->GetKey();
//$vtbi->PINChange('0000001125795409','1234');
//$vtbi->ChangePassword('1234');
//$vtbi->ChangeTextLogin('79265766710');
?>
