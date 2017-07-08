<?

$curdat[URL] =  'http://88.198.1.66:5555/api/auth/';
$curdat[RETURNTRANSFER] = true;
$curdat[POST] =  true;
$curdat[POSTFIELDS] =  "username=LOGIN&pswd=PASSWORD";
$curdat[USERAGENT] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 

//ech($curdat);
$a = CURLOPT_;
$b = RETURNTRANSFER;
$c = (int)($a+$b);
echo '<br />$c: ';
echo($c);
echo "<br /> gettype:";
echo(gettype($c));
echo "<br />";
$curl= new curl($curdat);

ech($curl);

echo '<br />kjvfkfv';


?>