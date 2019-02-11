<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'r3sxvkn3C6W/zGhhYJopXhWyv50STxlSPTsChXViPfhtGXkACyjSFpeg+XVnJikZnTiUXT7G/FXKPZQmU5Mo1A10hr6IhSLzsiT8M+V8nRBKH09GzG0cNlrIKvGP3w/0iPqzEvGFtqG7iE9PrFhBIwdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '1aafe6a16e658347129e845070736c66';//sesuaikan

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
