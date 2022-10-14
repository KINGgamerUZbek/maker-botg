<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$token = "API_TOKEN";
define('API_KEY',$token); 

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$chat_id = $message->chat->id;
$dice = $message->dice;
$text = $message->text;
$nick = $message->from->first_name;
$fnick = $message->from->last_name;
$user_id = $message->from->id;
$valu = $message->dice->value;
$turi = $message->dice->emoji;
$poll = $update->poll;

$lmenu=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🇷🇺Русский"]],
[['text'=>"🇺🇿O'zbekcha"]],
]
]);

$uzgo=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"▶️O'yinni boshlash"]],
[['text'=>"👨‍💻Dasturchi"],['text'=>"📮Baholash"]],
]
]);

$uzgame=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🎲 kubik"],['text'=>"🏀 basketbol"]],
[['text'=>"🎯 nishon"],['text'=>"Dice"]],
]
]);

$rugo=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"▶️Начать игру"]],
[['text'=>"👨‍💻Программист"],['text'=>"📮Оценивать"]],
]
]);

$rugame=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🎲 кубик"],['text'=>"🏀 баскетбол"]],
[['text'=>"🎯 мишень"],['text'=>"Дайс"]],
]
]);


if(mb_stripos($text,"/start") !== false){
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"👋 Assalomu aleykum *$nick*  tilni tanlang!!!
Привет  *$nick* выберите язык!!! 

@$botname - 2022",
    'parse_mode'=>"markdown",
    'reply_to_message_id'=>$message_id,
    'reply_markup'=>$lmenu
 ]);
}

if(mb_stripos($text,"🎲 kubik")!==false){
 bot('sendDice',[
    'chat_id'=>$chat_id,
    'emoji'=>"🎲",
    'reply_to_message_id'=>$message_id
 ]);
}

if(mb_stripos($text,"🎯 nishon")!==false){
 bot('sendDice',[
    'chat_id'=>$chat_id,
    'emoji'=>"🎯",
    'reply_to_message_id'=>$message_id
 ]);
}

if(mb_stripos($text,"🏀 basketbol")!==false){
 bot('sendDice',[
    'chat_id'=>$chat_id,
    'emoji'=>"🏀",
    'reply_to_message_id'=>$message_id
 ]);
}

//---------

if(mb_stripos($text,"🎲 кубик")!==false){
 bot('sendDice',[
    'chat_id'=>$chat_id,
    'emoji'=>"🎲",
    'reply_to_message_id'=>$message_id
 ]);
}

if(mb_stripos($text,"🎯 мишень")!==false){
 bot('sendDice',[
    'chat_id'=>$chat_id,
    'emoji'=>"🎯",
    'reply_to_message_id'=>$message_id
 ]);
}

if(mb_stripos($text,"🏀 баскетбол")!==false){
 bot('sendDice',[
    'chat_id'=>$chat_id,
    'emoji'=>"🏀",
    'reply_to_message_id'=>$message_id
 ]);
}

//--------

if(isset($dice) and $turi == "🎲"){
 if($valu == 6){
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"✅ Tushgan son: $valu va siz g'olib bo'ldingiz!
 Siz ham uz botingizni quring @EditUz_Bot                    ➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@iSearchMe_Bot .php .apk .exe fayllar olami
                    ✅ Значение: $valu и ты выиграл!",
    'reply_to_message_id'=>$message_id
    ]);
    } else {
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❎ Tushgan son: $valu yana bir urunib ko'ring!
@iSearchMe_Bot .php .apk .exe fayllar olami                 ➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
Siz ham oʻz botingizni quring @EditUz_Bot
                    ❎ Значение: $valu попытайтесь ещё раз!",
    'reply_to_message_id'=>$message_id
    ]);
    }
}

if(isset($dice) and $turi == "🏀"){
 if($valu == 6 or $valu == 5 or $valu == 4){
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"✅ Tabriklaymiz, to'p savatga tushdi!
@iSearchMe_Bot .php .apk .exe fayllar olami                   ➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
Siz ham o'z botingizni quring @EditUz_Bot
                    ✅Поздравляем, мяч попадал в корзину!",
    'reply_to_message_id'=>$message_id
    ]);
    } else {
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❎ To'p savatga tushmadi, yana bir bor urunib ko'ring!
 Siz ham o'z botingizni quring @EditUz_Bot                  ➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@iSearchMe_Bot .php .apk .exe fayllar olami
                   ❎ Мяч не попадал в корзину, попытайтесь ещё раз!",
 'reply_to_message_id'=>$message_id
    ]);
    }
}

if(isset($dice) and $turi == "🎯"){
 if($valu == 6){
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"✅ Tabriklaymiz siz nishonning markaziga urdingiz 🎉
  Siz ham o'z botingizni quring @EditUz_Bot                ➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
@iSearchMe_Bot .php .apk .exe fayllar olami
                  ✅ Поздравляем,  вы попали  в центр мишени!🎉",
    'reply_to_message_id'=>$message_id
    ]);
    } else {
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❎ Siz nishonga ura olmadingiz!
                ➖➖➖➖➖➖➖➖➖➖➖➖➖
                   ❎ Вы не попали в мишень!
",
    'reply_to_message_id'=>$message_id
    ]);
    }
}

if(mb_stripos($text, "Дайс")!==false){
 bot('sendSticker',[
    'chat_id'=>$chat_id,
    'sticker'=>new CURLFile("stick.tgs"),
    'reply_to_message_id'=>$message_id
 ]);
}

if(mb_stripos($text, "Dice")!==false){
 bot('sendSticker',[
    'chat_id'=>$chat_id,
    'sticker'=>new CURLFile("stick.tgs"),
    'reply_to_message_id'=>$message_id
 ]);
}

if(mb_stripos($text,"📮 Оценивать")!==false){
 $arr = array("Да очень","Нет");
 $json = json_encode($arr);
 bot('sendPoll',[
    'chat_id'=>$chat_id,
    'question'=>"Вам понравилась этот бот?",
    'options'=>$json,
    'type'=>"quiz",
    'is_anonymous'=>true,
    'correct_option_id'=>0,
    'reply_to_message_id'=>$message_id
 ]);
}

if(mb_stripos($text,"📮 Baholash")!==false){
 $arr = array("Ha","Yo'q");
 $json = json_encode($arr);
 bot('sendPoll',[
    'chat_id'=>$chat_id,
    'question'=>"Botimiz sizga yoqdimi?",
    'options'=>$json,
    'type'=>"quiz",
    'is_anonymous'=>true,
    'correct_option_id'=>0,
    'reply_to_message_id'=>$message_id
 ]);
}

//-----------

if($text=="🇷🇺Русский"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"Русский язык выбран✅",

'reply_markup'=>$rugo,
]);
}

if($text=="🇺🇿O'zbekcha"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"O'zbek tili tanlandi✅",

'reply_markup'=>$uzgo,
]);
}

if($text=="▶️O'yinni boshlash"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"O'yin turini tanlang👇",

'reply_markup'=>$uzgame,
]);
}

if($text=="▶️Начать игру"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"Выберите тип игру👇",

'reply_markup'=>$rugame,
]);
}

if($text=="👨‍💻Dasturchi"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"Siz ham o'z botingizni quring @EditUz_Bot
@iSearchMe_Bot .php .apk .exe fayllar olami!",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"👨‍💻Dasturchi", 'url'=>"https://t.me/EditUz_Bot"]]
    
    ]
    ])
 ]);
}

if($text=="👨‍💻Программист"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"Создайте своего собственного бота @EditUz_Bot
@iSearchMe_Bot .php .apk .exe файловый мир!",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"👨‍💻Прогаммист",'url'=>"https://t.me/EditUz_Bot"]]
    ]
    ])
 ]);
}