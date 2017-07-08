<?
//echo 'TWCMS';
//phpinfo();
$fimi_client = new SoapClient('https://depo.myplatfon.ru/wsdl/fimi.wsdl');

$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <Header>
           <RequestHeader xmlns:ns2="http://schemas.compassplus.com/twcms/1.0/omsi.xsd">
               <RType>Do</RType>
               <Cpimode timeout="59">Sync</Cpimode>
               <Branch>1</Branch>
               <Station>50</Station>
           </RequestHeader>
   </Header>
   <Body>
       <Request xmlns:ns2="http://schemas.compassplus.com/twcms/1.0/omsi.xsd" >
        <Request>
            <PERSON>
                <Command Action="Create" ResObjectInfoType="FullInfo" />
                <NAME>Иванов Иван ИВанович</NAME><!-- ФИО -->
                <SEX>М</SEX><!-- Пол M/F-->
                <Phone>7(926)1234567</Phone><!-- Телефон -->
                <RESIDENT>TRUE</RESIDENT>
                <CUSTOMATTRIBUTES>
                    <ATTRIBUTE ID="IDENTITY">3</ATTRIBUTE> <!-- 3 - клиент полностью идентифицирован  -->
                </CUSTOMATTRIBUTES>
            </PERSON>
        </Request>
         </Request>
   </Body>
</Envelope>
XML;

$xmlstr1 = <<<XML
<?xml version='1.0' standalone='yes'?>
<Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <Header>
           <RequestHeader xmlns:ns2="http://schemas.compassplus.com/twcms/1.0/omsi.xsd">
               <RType>Do</RType>
               <Cpimode timeout="59">Sync</Cpimode>
               <Branch>1</Branch>
               <Station>50</Station>
           </RequestHeader>
   </Header>
   <Body>
       <Request xmlns:ns2="http://schemas.compassplus.com/twcms/1.0/omsi.xsd" >
        <Request>
            <PERSON>
                <Command Action="Create" ResObjectInfoType="FullInfo" />
                <NAME>Иванов Иван ИВанович</NAME><!-- ФИО -->
                <SEX>М</SEX><!-- Пол M/F-->
                <Phone>7(926)1234567</Phone><!-- Телефон -->
                <RESIDENT>TRUE</RESIDENT>
                <CUSTOMATTRIBUTES>
                    <ATTRIBUTE ID="IDENTITY">3</ATTRIBUTE> <!-- 3 - клиент полностью идентифицирован  -->
                </CUSTOMATTRIBUTES>
            </PERSON>
        </Request>
         </Request>
   </Body>
</Envelope>
XML;

$xmlstr2 = <<<XML
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <soap:Header>
           <ns2:RequestHeader xmlns:ns2="http://schemas.compassplus.com/twcms/1.0/omsi.xsd">
               <RType>Do</RType>
               <Cpimode timeout="59">Sync</Cpimode>
               <Branch>1</Branch>
               <Station>50</Station>
           </ns2:RequestHeader>
   </soap:Header>
   <soap:Body>
       <ns2:Request xmlns:ns2="http://schemas.compassplus.com/twcms/1.0/omsi.xsd" >
        <Request>
            <PERSON>
                <Command Action="Create" ResObjectInfoType="FullInfo" />
                <NAME>Иванов Иван ИВанович</NAME><!-- ФИО -->
                <SEX>М</SEX><!-- Пол M/F-->
                <Phone>7(926)1234567</Phone><!-- Телефон -->
                <RESIDENT>TRUE</RESIDENT>
                <CUSTOMATTRIBUTES>
                    <ATTRIBUTE ID="IDENTITY">3</ATTRIBUTE> <!-- 3 - клиент полностью идентифицирован  -->
                </CUSTOMATTRIBUTES>
            </PERSON>
        </Request>
         </ns2:Request>
   </soap:Body>
</soap:Envelope>

XML;

$person[0] = new SimpleXMLElement($xmlstr);
//$xml = simplexml_load_string($xmlstr2, 0, 0,'ns');
//ech($xml);
//print_r($person);

$client = new SoapClient(null, array('uri' => 'http://172.17.41.111:1238', 'location'=>'http://172.17.41.111:1238'));


									//'uri' => 'http://172.17.41.111:1238'));
									//'uri' => 'http://172.17.41.100:15003'));
									

$func = $fimi_client->__getFunctions();
//$types = $client->__getTypes();

$ch = curl_init();
$header[0]  = "POST HTTP/1.0";
$header[1] = "Content-type: application/xml";
$header[2] = "Content-length: ".strlen( $xmlstr );
curl_setopt($ch, CURLOPT_URL, "http://172.17.41.111:1238");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// Ожидание ответа сервера
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlstr); 
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
$result = curl_exec($ch);
curl_close($ch);
ech($result);




//$res = $client->CreatePersonRp($person);
//$res = $client->__soapCall(null, $person);
//$res = $client->__doRequest($person, 'http://172.17.41.111:1238', 1, 1);
ech($client);									
//ech($func);
//ech($types);
echo "++";
ech($res);
?>