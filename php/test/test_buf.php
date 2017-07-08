<?
require_once('phpbuf-master/lib/PhpBuf.php');
echo 'testbuf';

class PBmess extends PhpBuf_Message_Abstract {
	public function __construct() {
		$this->setField("id", PhpBuf_Type::INT, PhpBuf_Rule::REQUIRED, 1);
		$this->setField("balance", PhpBuf_Type::SINT, PhpBuf_Rule::REQUIRED, 2);
		$this->setField("isAdmin", PhpBuf_Type::BOOL, PhpBuf_Rule::REQUIRED, 3);
		$this->setField("status", PhpBuf_Type::ENUM, PhpBuf_Rule::REQUIRED, 4, array("active", "inactive", "deleted"));
		$this->setField("name", PhpBuf_Type::STRING, PhpBuf_Rule::REQUIRED, 5);
		$this->setField("bytes", PhpBuf_Type::BYTES, PhpBuf_Rule::REQUIRED, 6);
	}
	public static function name(){
        return __CLASS__;
    }
}

$pbm = new PBmess();
ech($form->formdata);
$pbm->read(new PhpBuf_IO_Reader($form->formdata));

$pbm->id = 1;
$pbm->balance = 15;
$pbm->isAdmin = TRUE;
$pbm->status = 'active';
$pbm->name = 'Den';
$pbm->bytes = '0';
ech($pbm);
?>