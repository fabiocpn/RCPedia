<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $uses = array('Retrogene');

	function contact() {

		$email_body = "\n".$this->data['Contact']['name']."(".$this->data['Contact']['email']."): ".$this->data['Contact']['title']."\n\n".$this->data['Contact']['suggestions']."\n\n\nURL Source:".$this->data['Contact']['c_url'];

		$fp = fopen("/tmp/".$this->Session->id().".mail", 'w');
        	fwrite($fp,$email_body);
		fclose($fp);

		$output = shell_exec('perl /home/users/fnavarro/public_html/retrogenesdb/app/mail.pl -f /tmp/'.$this->Session->id().'.mail &');
		#$this->set('email_body',$email_body."<br><br><br>".$output);

	}
}
?>
