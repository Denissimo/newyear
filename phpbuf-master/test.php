<?php
/**
 * Use tests in folder tests
 */
require_once("./lib/PhpBuf.php");
require_once("./tests/Example.php");
require_once("./tests/ExampleRepeat.php");
require_once("./tests/Example/Test1.php");
require_once("./tests/Example/Test3.php");

echo "Test values less than 128 (encode/decode)<br />";
$result = PhpBuf_Base128::decodeFromReader(new PhpBuf_IO_Reader(PhpBuf_Base128::encode(120)));
echo "120 == " . $result ."<br /><br />"; 
echo "Test values more than 128 (only decode)<br />";
$result = PhpBuf_Base128::decodeFromReader(new PhpBuf_IO_Reader(pack("n", 44034)));
echo "300 == " . $result ."<br /><br />"; 
echo "Test values more than 128 (encode/decode)<br />";
$encode = PhpBuf_Base128::encode(300);
$result = PhpBuf_Base128::decodeFromReader(new PhpBuf_IO_Reader($encode));
echo "encoded: $encode<br /><br />";
echo "300 == " . $result ."<br /><br />"; 
echo "Test values more than 128 (encode/decode)<br />";
$encode = /*pack("n", 8891723);*/PhpBuf_Base128::encode(123456789);
$result = PhpBuf_Base128::decodeFromReader(new PhpBuf_IO_Reader($encode));
echo "encoded: $encode<br /><br />";
echo "123456789 == " . $result ."<br /><br />"; 
echo "Test ZigZag class<br />";
echo "value: 0<br />";
$encode = PhpBuf_ZigZag::encode(0);
echo "encoded: ". $encode ."<br />";
echo "decoded: " . PhpBuf_ZigZag::decode($encode) . "<br /><br />";

echo "value: 1<br />";
$encode = PhpBuf_ZigZag::encode(1);
echo "encoded: ". $encode ."<br />";
echo "decoded: " . PhpBuf_ZigZag::decode($encode) . "<br /><br />";

echo "value: -1<br />";
$encode = PhpBuf_ZigZag::encode(-1);
echo "encoded: ". $encode ."<br />";
echo "decoded: " . PhpBuf_ZigZag::decode($encode) . "<br /><br />";

echo "value: 123456789<br />";
$encode = PhpBuf_ZigZag::encode(123456789);
echo "encoded: ". $encode ."<br />";
echo "decoded: " . PhpBuf_ZigZag::decode($encode) . "<br /><br />";

echo "value: -123456789<br />";
$encode = PhpBuf_ZigZag::encode(-123456789);
echo "encoded: ". $encode ."<br />";
echo "decoded: " . PhpBuf_ZigZag::decode($encode) . "<br /><br />";

echo "Test Reader & Writer<br />";

$writer = new PhpBuf_IO_Writer();

$writer->writeBytes("test1");
echo "lenght: ". $writer->getLenght() ."<br />";
echo "test1 = ". $writer->getData() ."<br />";
$writer->writeBytes("test2");
echo "lenght: ". $writer->getLenght() ."<br />";
echo "test1test2 = ". $writer->getData() ."<br />";
$writer->redo();
echo "lenght: ". $writer->getLenght() ."<br />";
echo "test1 = ". $writer->getData() ."<br />";
$writer->writeByte("!");
echo "lenght: ". $writer->getLenght() ."<br />";
echo "test1! = ". $writer->getData() ."<br />";
$writer->redo();
echo "lenght: ". $writer->getLenght() ."<br />";
echo "test1 = ". $writer->getData() ."<br />";
$writer->writeBytes(" StringForReaders");
echo "lenght: ". $writer->getLenght() ."<br />";
echo "test1 StringForReaders = ". $writer->getData() ."<br />";

$reader = PhpBuf_IO_Reader::createFromWriter($writer);
echo "t = ". $reader->getByte() ."<br />";
echo "position: " .$reader->getPosition() . "<br />";
echo "e = ". $reader->getByte() ."<br />";
echo "position: " .$reader->getPosition() . "<br />";
echo "st1 = ". $reader->getBytes(3) ."<br />";
echo "position: " .$reader->getPosition() . "<br />";
$reader->setPosition(12);
echo "For = ". $reader->getBytes(3) ."<br />";
echo "position: " .$reader->getPosition() . "<br />";
$reader->redo();
echo "For = ". $reader->getBytes(3) ."<br />";
echo "position: " .$reader->getPosition() . "<br />";

echo "Test Messages<br />";
$message = new PhpBuf_Message_Example();

$writer = new PhpBuf_IO_Writer();
$message->id = 150;
$message->balance = -12345;
$message->isAdmin = true;
$message->status = "deleted";
$message->name = "Andrey Lepeshkin";
$message->write($writer);

echo $writer->getData() . "<br />";
foreach (str_split($writer->getData()) as $byte) {
	echo ord($byte) . "<br />";
}
$reader = PhpBuf_IO_Reader::createFromWriter($writer);
$message = new PhpBuf_Message_Example();
$message->read($reader);
echo "id: " . $message->id . "<br />";
echo "balance: " . $message->balance . "<br />";
if($message->isAdmin === true) {
echo "isAdmin: true<br />";
}
echo "status: " . $message->status . "<br />";
echo "name: " . $message->name . "<br />";


$messagesArray = array();
$main = new PhpBuf_Message_ExampleRepeat();
$writer = new PhpBuf_IO_Writer();
for ($i = 0; $i < 5; $i++) {
	$nested = new PhpBuf_Message_Example();
	$nested->id = $i;
	$nested->balance = -12345 + ($i * 10);
	$nested->isAdmin = false;
	$nested->status = "deleted";
	$nested->name = "name for $i";
	$nested->bytes = "Some bytes for $i";
	$messagesArray[] = $nested;
}
$main->messages = $messagesArray;
$main->write($writer);
		
$reader = PhpBuf_IO_Reader::createFromWriter($writer);
$main = new PhpBuf_Message_ExampleRepeat();
$main->read($reader);

print_r($main);
