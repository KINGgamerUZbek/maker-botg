<?php

$token = 'API_TOKEN';
$bot = bot('getme',['bot'])->result->username;
$admin ="ADMIN_ID";
$adminuser="ADMIN_USER";
function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
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
$text = $message->text;
$cid = $message->chat->id;
$name = $message->from->first_name;
$mid = $message->message_id;
$type = $message->chat->type;

if($text=="/start"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"Salom <a href = 'tg://user?id=$cid'>$name</a> @$adminuser  ning botiga xush kelibsiz.Bu bot sizga Tik tokdan va instagramdan video yuklash imkonini beradi. Instagramdan faqat video istoriya va rasm yuklamidi.Muammo chiqasa @OmonboyevShahzod ga murojaat qiling",
    'parse_mode'=>'html',
    ]);
}
$videou=file_get_contents("https://api.uzxost.ru/down_allbot/tiktok.php?url=".$text);
if(mb_stripos($text,"tiktok.com/")!==false){
bot('sendMessage',[
'chat_id'=>$cid , 
'text'=>"Iltimos kuting",
]);
bot('deletemessage',[
'chat_id'=>$cid , 
'message_id'=>$mid+1,
]);
bot('sendVideo',[
'chat_id'=>$cid , 
'video'=>$videou,
'caption'=>"$text
 @$bot Videoni yulab berdi ",
]);
}
$videou1=file_get_contents("https://u5131.xvest5.ru/api/Insta.php?url=".$text);
if(mb_stripos($text,"instagram.com/")!==false){
bot('sendMessage',[
'chat_id'=>$cid , 
'text'=>"Iltimos kuting",
]);
bot('deletemessage',[
'chat_id'=>$cid , 
'message_id'=>$mid+1,
]);
bot('sendVideo',[
'chat_id'=>$cid , 
'video'=>$videou1,
'caption'=>"$text
 @$bot Videoni yulab berdi ",
]);
}
if($text == "/stat"){

if($cid == $admin){

$lichka=file_get_contents("shekih.db");

$lich=substr_count($lichka,"\n");
$sana = date('d.m.Y',strtotime("0 hour"));

$time=date('H:i:s',strtotime(' 0 hour'));

bot('sendmessage',[

'chat_id'=>$cid, 
'text'=>"📊 Statistika
🧍Botimiz azolari soni : $lich 🔊ta
⏰$time  📆$sana",
   
'parse_mode'=>'html',

   ]);

   }
   
}
   $xabar = file_get_contents("send.txt");
if($text == "/send"){
if($cid == $admin){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"*Userlarga yuboriladigan xabar matnini kiriting! Bekor qilish uchun /cancel ni bosing.*",
'parse_mode'=>"markdown",
'reply_markup'=>$back4_menu,
]); file_put_contents("send.txt","user");
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*🤪😂 Bu funksiyani Faqat men $adminuser ishlata olaman.*",
'parse_mode'=>'Markdown',
]);
}
}
if($xabar=="user" and $cid==$admin){
if($text=="/cancel"){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"Bekor qilindi!",
'parse_mode'=>"html",
]); unlink("send.txt");
}else{
$lich = file_get_contents("shekih.db");
$lichka = explode("\n",$lich);
foreach($lichka as $lichkalar){
$okuser=bot("sendmessage",[
'chat_id'=>$lichkalar,
'text'=>$text,
'parse_mode'=>'HTML'
]);
}
}
}
if($okuser){
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"<b>Hamma userlarga yuborildi</b>✅",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]); unlink("send.txt");
}
   
   
   $lichka=file_get_contents("shekih.db");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("shekih.db","$lichka\n$cid");
}
}
   
   
   
   if(($text == "/panel") and $cid == $admin){

       bot('deleteMessage',[
       'chat_id'=>$cid,
       'message_id'=>$mid
       ]);
  
         bot('sendMessage',[
 
            'chat_id'=>$admin,
  
              'text'=>"<b>👨‍💻Admin panelga xush kelibsiz./stat-statistika /send habar yuborish</b>",
 
                 'parse_mode'=>"html",
  
   
                   
]);

                   }


   
   

