<?php
require_once('LINEBotTiny.php');
require_once('LINEFunction.php');
require_once('dialogflow.php');
require_once('flex.php');
require 'src/TesseractOCR.php';
require 'src/FriendlyErrors.php';
require 'src/Option.php';
require 'src/Command.php';
use thiagoalessio\TesseractOCR\TesseractOCR;



$channelAccessToken = 'zRbEGHClfreKxlcxZ/adCxhEuRRSnf0lfp3B/K9bvnzhC+VsbH5f0P3eqVskhPfw1XW/ZZSul7uEmb7PtWyO3h2MTsAifneys8b6SRiQntjgn3wy/U6OTUU3wpY0Ns9GD+/tSfpJNsy9iuuAGOcS5gdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '265ac4b28a50be5a01764520dd1a626a';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$dialogflow = new dialogFlow();


foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => $message['text']
                            ]
                        ]
                    ]);
                    break;
                
                case 'image':
                    $url = $_SERVER['HTTP_HOST'];
                    $webdir = '/linebot/';
                    $imagepath = 'img/';
                    $imagename = 'image_'.date('Ymdhis').'.jpg';
                    $imageData = $client->getImage($message['id']);
                    $save_result = file_put_contents($imagepath.$imagename,$imageData);

                    $rs ="";
                    if($save_result!=""){
                        $im = imagecreatefromjpeg($imagepath.$imagename);
                        if($im && imagefilter($im, IMG_FILTER_GRAYSCALE)){
                            imagejpeg($im,$imagepath.$imagename);
                            imagedestroy($im);
                             $rs = (new TesseractOCR($imagepath.$imagename))->lang('eng',)->run();
                        }
                       
                    }else{
                        $rs = "n\a";
                    }
            
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => 'SAVE IMAGE>>'.$rs
                            ],
                            [
                                'type' => 'text',
                                'text' => 'id >>'.$imageData
                            ],
                            [
                                "type"=> "image",
                                "originalContentUrl"=> "https://".$url.$webdir.$imagepath.$imagename,
                                "previewImageUrl"=> "https://".$url.$webdir.$imagepath.$imagename
                            ]
                        ]
                    ]);
                    break;
                
                    case 'location':
                   
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => ">> \n".$message['title']."\n".$message['address']."\n".$message['latitude']."\n".$message['longitude']
                            ]
                           
                        ]
                    ]);
                    break;


                    case 'sticker':
                   
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                "type"=> "text",
                                'text' => $message['packageId']."\n".$message['stickerId']
                            ],
                            [
                                "type"=> "sticker",
                                "packageId"=> $message['packageId'],
                                "stickerId"=> $message['stickerId']
                            ]
                           
                        ]
                    ]);
                    break;


                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
?>