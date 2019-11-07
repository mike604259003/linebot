<?php
//$flex = '{"type":"bubble","styles":{"footer":{"separator":true}},"body":{"type":"box","layout":"vertical","contents":[{"type":"text","text":"ใบเสร็จ","weight":"bold","color":"#1DB446","size":"sm"},{"type":"text","text":"ชื่อร้าน","weight":"bold","size":"xxl","margin":"md"},{"type":"text","text":"คำอธิบายร้าน","size":"xs","color":"#aaaaaa","wrap":true},{"type":"separator","margin":"xxl"},{"type":"box","layout":"vertical","margin":"xxl","spacing":"sm","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"รายการที่1","size":"sm","color":"#555555","flex":0},{"type":"text","text":"$2.99","size":"sm","color":"#111111","align":"end"}]},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"รายการที่2","size":"sm","color":"#555555","flex":0},{"type":"text","text":"$0.99","size":"sm","color":"#111111","align":"end"}]},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"รายการที่3","size":"sm","color":"#555555","flex":0},{"type":"text","text":"$3.33","size":"sm","color":"#111111","align":"end"}]},{"type":"separator","margin":"xxl"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"TOTAL","size":"sm","color":"#555555"},{"type":"text","text":"$7.31","size":"sm","color":"#111111","align":"end"}]}]},{"type":"separator","margin":"xxl"},{"type":"box","layout":"horizontal","margin":"md","contents":[{"type":"text","text":"PAYMENT ID","size":"xs","color":"#aaaaaa","flex":0},{"type":"text","text":"#743289384279","color":"#aaaaaa","size":"xs","align":"end"}]}]}}';    


$flex = '{
  "type": "bubble",
  "header": {
    "type": "box",
    "layout": "horizontal",
    "contents": [
    {
        "type": "text",
        "text": "NEWS DIGEST",
        "weight": "bold",
        "color": "#aaaaaa",
        "size": "sm"
    }
    ]
    },
    "hero": {
        "type": "image",
        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_4_news.png",
        "size": "full",
        "aspectRatio": "20:13",
        "aspectMode": "cover",
        "action": {
          "type": "uri",
          "uri": "http://linecorp.com/"
      }
      },
      "body": {
        "type": "box",
        "layout": "horizontal",
        "spacing": "md",
        "contents": [
        {
            "type": "box",
            "layout": "vertical",
            "flex": 1,
            "contents": [
            {
                "type": "image",
                "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/02_1_news_thumbnail_1.png",
                "aspectMode": "cover",
                "aspectRatio": "4:3",
                "size": "sm",
                "gravity": "bottom"
                },
                {
                    "type": "image",
                    "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/02_1_news_thumbnail_2.png",
                    "aspectMode": "cover",
                    "aspectRatio": "4:3",
                    "margin": "md",
                    "size": "sm"
                }
                ]
                },
                {
                    "type": "box",
                    "layout": "vertical",
                    "flex": 2,
                    "contents": [
                    {
                        "type": "text",
                        "text": "7 Things to Know for Today",
                        "gravity": "top",
                        "size": "xs",
                        "flex": 1
                        },
                        {
                            "type": "separator"
                            },
                            {
                                "type": "text",
                                "text": "Hay fever goes wild",
                                "gravity": "center",
                                "size": "xs",
                                "flex": 2
                                },
                                {
                                    "type": "separator"
                                    },
                                    {
                                        "type": "text",
                                        "text": "LINE Pay Begins Barcode Payment Service",
                                        "gravity": "center",
                                        "size": "xs",
                                        "flex": 2
                                        },
                                        {
                                            "type": "separator"
                                            },
                                            {
                                                "type": "text",
                                                "text": "LINE Adds LINE Wallet",
                                                "gravity": "bottom",
                                                "size": "xs",
                                                "flex": 1
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
                                                  "uri": "https://linecorp.com"
                                              }
                                          }
                                          ]
                                      }
                                  }';


$flex_rc = '{
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
                        {
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
                                },
                                {
                                    "type": "box",
                                    "layout": "horizontal",
                                    "contents": [
                                    {
                                        "type": "text",
                                        "text": "รายการที่2",
                                        "size": "sm",
                                        "color": "#555555",
                                        "flex": 0
                                        },
                                        {
                                            "type": "text",
                                            "text": "$0.99",
                                            "size": "sm",
                                            "color": "#111111",
                                            "align": "end"
                                        }
                                        ]
                                        },
                                        {
                                            "type": "box",
                                            "layout": "horizontal",
                                            "contents": [
                                            {
                                                "type": "text",
                                                "text": "รายการที่3",
                                                "size": "sm",
                                                "color": "#555555",
                                                "flex": 0
                                                },
                                                {
                                                    "type": "text",
                                                    "text": "$3.33",
                                                    "size": "sm",
                                                    "color": "#111111",
                                                    "align": "end"
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
$flex_cs = '{
  "type": "carousel",
  "contents": [
    {
      "type": "bubble",
      "hero": {
        "type": "image",
        "size": "full",
        "aspectRatio": "20:13",
        "aspectMode": "cover",
        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png"
      },
      "body": {
        "type": "box",
        "layout": "vertical",
        "spacing": "sm",
        "contents": [
          {
            "type": "text",
            "text": "Arm Chair, White",
            "wrap": true,
            "weight": "bold",
            "size": "xl"
          },
          {
            "type": "box",
            "layout": "baseline",
            "contents": [
              {
                "type": "text",
                "text": "$49",
                "wrap": true,
                "weight": "bold",
                "size": "xl",
                "flex": 0
              },
              {
                "type": "text",
                "text": ".99",
                "wrap": true,
                "weight": "bold",
                "size": "sm",
                "flex": 0
              }
            ]
          }
        ]
      },
      "footer": {
        "type": "box",
        "layout": "vertical",
        "spacing": "sm",
        "contents": [
          {
            "type": "button",
            "style": "primary",
            "action": {
              "type": "uri",
              "label": "Add to Cart",
              "uri": "https://linecorp.com"
            }
          },
          {
            "type": "button",
            "action": {
              "type": "uri",
              "label": "Add to wishlist",
              "uri": "https://linecorp.com"
            }
          }
        ]
      }
    },
    {
      "type": "bubble",
      "hero": {
        "type": "image",
        "size": "full",
        "aspectRatio": "20:13",
        "aspectMode": "cover",
        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png"
      },
      "body": {
        "type": "box",
        "layout": "vertical",
        "spacing": "sm",
        "contents": [
          {
            "type": "text",
            "text": "Metal Desk Lamp",
            "wrap": true,
            "weight": "bold",
            "size": "xl"
          },
          {
            "type": "box",
            "layout": "baseline",
            "flex": 1,
            "contents": [
              {
                "type": "text",
                "text": "$11",
                "wrap": true,
                "weight": "bold",
                "size": "xl",
                "flex": 0
              },
              {
                "type": "text",
                "text": ".99",
                "wrap": true,
                "weight": "bold",
                "size": "sm",
                "flex": 0
              }
            ]
          },
          {
            "type": "text",
            "text": "Temporarily out of stock",
            "wrap": true,
            "size": "xxs",
            "margin": "md",
            "color": "#ff5551",
            "flex": 0
          }
        ]
      },
      "footer": {
        "type": "box",
        "layout": "vertical",
        "spacing": "sm",
        "contents": [
          {
            "type": "button",
            "flex": 2,
            "style": "primary",
            "color": "#aaaaaa",
            "action": {
              "type": "uri",
              "label": "Add to Cart",
              "uri": "https://linecorp.com"
            }
          },
          {
            "type": "button",
            "action": {
              "type": "uri",
              "label": "Add to wish list",
              "uri": "https://linecorp.com"
            }
          }
        ]
      }
    },
    {
      "type": "bubble",
      "body": {
        "type": "box",
        "layout": "vertical",
        "spacing": "sm",
        "contents": [
          {
            "type": "button",
            "flex": 1,
            "gravity": "center",
            "action": {
              "type": "uri",
              "label": "See more",
              "uri": "https://linecorp.com"
            }
          }
        ]
      }
    }
  ]
}';
?>