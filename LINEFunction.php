<?php

function sendFlex($client,$uid,$flex,$alttext){

	$client->pushMessage([
        'to' => $uid,
        'messages' => array(
            array(
                'type' => 'flex', 
                'altText' => $alttext, 
                'contents' => json_decode ($flex,true)
            )
        )

    ]);
	return "OK";
}


function sendPush($client,$userId,$text){
    $client->pushMessage([
        'to' => $userId,
        'messages' => [
            [
                'type' => 'text',
                'text' => $text
            ]
        ]
    ]);
}

function sendFlexBill($client,$uid,$flex,$alttext){

  $flex_fullfill = '';  
  $flex_fill ='{
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "รายการที่1",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "$2.99",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          }';

  for($i=1;$i<=10;$i++){
    if($i==1){
        $flex_fullfill = '{
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "รายการที่'.$i.'",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "$2.99",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          }';
    }else{
        $flex_fullfill .= ',{
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "รายการที่'.$i.'",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "$2.99",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          }';
    }

  }        


  $flex_body = '{
  "type": "bubble",
  "styles": {
    "footer": {
      "separator": true
    }
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "ใบเสร็จ",
        "weight": "bold",
        "color": "#1DB446",
        "size": "sm"
      },
      {
        "type": "text",
        "text": "ชื่อร้าน",
        "weight": "bold",
        "size": "xxl",
        "margin": "md"
      },
      {
        "type": "text",
        "text": "คำอธิบายร้าน",
        "size": "xs",
        "color": "#aaaaaa",
        "wrap": true
      },
      {
        "type": "separator",
        "margin": "xxl"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "xxl",
        "spacing": "sm",
        "contents": [
          '.$flex_fullfill.'
          ,
          {
            "type": "separator",
            "margin": "xxl"
          },
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "TOTAL",
                "size": "sm",
                "color": "#555555"
              },
              {
                "type": "text",
                "text": "$7.31",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          }
        ]
      },
      {
        "type": "separator",
        "margin": "xxl"
      },
      {
        "type": "box",
        "layout": "horizontal",
        "margin": "md",
        "contents": [
          {
            "type": "text",
            "text": "PAYMENT ID",
            "size": "xs",
            "color": "#aaaaaa",
            "flex": 0
          },
          {
            "type": "text",
            "text": "#743289384279",
            "color": "#aaaaaa",
            "size": "xs",
            "align": "end"
          }
        ]
      }
    ]
  }
}';

    $client->pushMessage([
        'to' => $uid,
        'messages' => array(
            array(
                'type' => 'flex', 
                'altText' => $alttext, 
                'contents' => json_decode ($flex_body,true)
            )
        )

    ]);
    return "OK";
}




function getDB($client,$userId,$search){
  include "dbconnect.php";
  
  $sql =   "SELECT * FROM new where detail  LIKE '%".$search."%' LIMIT 10";
  //$sql =   "SELECT * FROM news";

  $query= mysqli_query($DBConnect, $sql, MYSQLI_STORE_RESULT) or die('query Error');

  $resp = "";
  $count = 0;

 if (mysqli_num_rows ($query)>0) {
          while($row = mysqli_fetch_assoc($query))   {
            if($count===0){
              $resp .= $row['university']."\n".$row['faculty']."\n".$row['major']."\n".$row['detail']."\n".$row['contact'];
            }else{
              $resp .= "\n<-------------------->\n".$row['university']."\n".$row['faculty']."\n".$row['major']."\n".$row['detail']."\n".$row['contact'];
            }
            $count++;
          }
          sendPush($client,$userId,$resp);

  }

  
}

function insertDB($path){
  include "dbconnect.php";
  
  $sql =   "INSERT INTO `testpic` (`pic`) values ('".$path."')";
  //$sql =   "SELECT * FROM news";

  $query= mysqli_query($DBConnect, $sql, MYSQLI_STORE_RESULT) or die('query Error');

  

  
}

function getDbFlexMessage($client,$userId,$search,$flex,$alttext){
  include "dbconnect.php";
  
  //$sql =   "SELECT * FROM new where detail  LIKE '%".$search."%' LIMIT 10";
  $sql =   "SELECT * FROM news";
  $flex_fill = '';


  $query= mysqli_query($DBConnect, $sql, MYSQLI_STORE_RESULT) or die('query Error');

 
  $count = 0;

 if (mysqli_num_rows ($query)>0) {
          while($row = mysqli_fetch_assoc($query))   {
            if($count===0){
              $flex_fill .='{
                "type": "bubble",
                "header": {
                  "type": "box",
                  "layout": "horizontal",
                  "contents": [
                    {
                      "type": "text",
                      "text": "'.$row['university'].'",
                      "weight": "bold",
                      "color": "#aaaaaa",
                      "size": "sm"
                    }
                  ]
                },
                "body": {
                  "type": "box",
                  "layout": "vertical",
                  "contents": [
                    {
                      "type": "box",
                      "layout": "vertical",
                      "margin": "lg",
                      "spacing": "sm",
                      "contents": [
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "คณะ :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['faculty'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        },
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "สาขา :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['major'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        },
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "ข้อมูล :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['detail'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        },
                         {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "โทร :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['contact'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        }
                      ]
                    }
                  ]
                },
                "footer": {
                  "type": "box",
                  "layout": "horizontal",
                  "contents": [
                    {
                      "type": "button",
                      "action": {
                        "type": "uri",
                        "label": "More",
                        "uri": "tel:'.$row['contact'].'"
                      }
                    }
                  ]
                }
              }';
          
           
             
            
                  
            }else{
              $flex_fill .=',{
                "type": "bubble",
                "header": {
                  "type": "box",
                  "layout": "horizontal",
                  "contents": [
                    {
                      "type": "text",
                      "text": "'.$row['university'].'",
                      "weight": "bold",
                      "color": "#aaaaaa",
                      "size": "sm"
                    }
                  ]
                },
                "body": {
                  "type": "box",
                  "layout": "vertical",
                  "contents": [
                    {
                      "type": "box",
                      "layout": "vertical",
                      "margin": "lg",
                      "spacing": "sm",
                      "contents": [
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "คณะ :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['faculty'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        },
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "สาขา :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['major'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        },
                        {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "ข้อมูล :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['detail'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        },
                         {
                          "type": "box",
                          "layout": "baseline",
                          "spacing": "sm",
                          "contents": [
                            {
                              "type": "text",
                              "text": "โทร :",
                              "color": "#aaaaaa",
                              "size": "sm",
                              "flex": 2
                            },
                            {
                              "type": "text",
                              "text": "'.$row['contact'].'",
                              "wrap": true,
                              "color": "#666666",
                              "size": "sm",
                              "flex": 5
                            }
                          ]
                        }
                      ]
                    }
                  ]
                },
                "footer": {
                  "type": "box",
                  "layout": "horizontal",
                  "contents": [
                    {
                      "type": "button",
                      "action": {
                        "type": "uri",
                        "label": "More",
                        "uri": "tel:'.$row['contact'].'"
                      }
                    }
                  ]
                }
              }';
                                                                                                                                                    

            }
            $count++;
          }
          

  }

  $flex_body = '{
    "type": "carousel",
    "contents": [
      ' . $flex_fill . '
    ]
  }';
  
    $client->pushMessage([
      'to' => $userId,
      'messages' => array(
        array(
          'type' => 'flex',
          'altText' => "University Flex",
          'contents' => json_decode($flex_body, true)
        )
      )
  
    ]);
    return "OK";
  }
 





?>