<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'rFM8M8BDX6OEPSz2cxGqeRgd4kn7BMSmmCeUj+6ymfV7xNP2CK5FyyIRc3PUpRjgJ1jJTIciTuJcn3pjmMiXET+M6KZpJiOd/UIVaw6n8O3PCL+adSMMkRoHDONQ0Zp0RCs6UXnJsUhkkttOATr5TQdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '02482562d537a32c85b38d7d14847dd1';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Hi')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}

}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>
