<?php

  # read the xml document
$xml = simplexml_load_file('12-3_02-chat.xml');

  # add a message to the log
if (isset($_REQUEST['msg'])) {
    
    # parse the message and extra info
    $msg = filter_var($_REQUEST['msg'], FILTER_SANITIZE_STRING);
    $sender = filter_var($_REQUEST['sender'], FILTER_SANITIZE_STRING);
      
    # add the message to the XML document
    $mymsg = $xml->addChild('message', $msg);
    $mymsg->addAttribute('sender', $sender);
    $mymsg->addAttribute('time', date('G:i'));
      
    # save to the filesystem
    $fh = fopen('12-3_02-chat.xml', 'w');
    fwrite($fh, $xml->asXML());
    fclose($fh);

} else {

    Header('Content-type: text/xml');
    echo $xml->asXML();

}


?>