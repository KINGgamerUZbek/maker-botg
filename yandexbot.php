<?php
/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
ob_start();
define('Update_off','API_TOKEN');//Token yozing
$admin = "ADMIN_ID";///admin id raqami
$adminuser = "ADMIN_USER";
$botname = bot('getme',['bot'])->result->username;
function bot($firdavs_officall,$Kavsar_Coder=[]){
    $Vip_blogers = "https://api.telegram.org/bot".Update_off."/".$firdavs_officall;
    $update_off = curl_init();
    curl_setopt($update_off,CURLOPT_URL,$Vip_blogers);
    curl_setopt($update_off,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($update_off,CURLOPT_POSTFIELDS,$Kavsar_Coder);
    $Yiban_tv = curl_exec($update_off);
    if(curl_error($update_off)){
        var_dump(curl_error($update_off));
    }else{
        return json_decode($Yiban_tv);
    }
}
/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$cid = $message->chat->id;
$mid = $message->message_id;
$text = $message->text;
$tx = $message->text;
$uid= $message->from->id;
$ism = $message->from->first_name;
$familya = $message->from->last_name;
$username = $message->from->username;
$name = "<a href='tg://user?id=$uid'>$ism $familya</a>";

$Uzb = file_get_contents("data/uzb.txt");
$Uzb1 = file_get_contents("data/uzb1.txt");
$Uzb3 = file_get_contents("data/uzb3.txt");
$Uzb4 = file_get_contents("data/uzb4.txt");
$to =  file_get_contents("data/$uid/token.txt");
mkdir("data/$uid");
mkdir("azo.dat");
mkdir("@Vip_blogers");
mkdir("@Update_off");
/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
///*Time *///
$timeuzb = date("H:i",strtotime("4 hour")); 
$timeusa = date("H:i",strtotime("-6 hour")); 
$timerus=date("H:i",strtotime("1 hour"));
$timebra=date("H:i",strtotime("-5 hour"));
$timepor=date("H:i",strtotime("-1 hour"));
$timedub=date("H:i",strtotime("2 hour"));
$timearb=date("H:i",strtotime("0 hour"));
$timeisp=date("H:i",strtotime("0 hour"));
$timeger=date("H:i",strtotime("0 hour"));
$timeqir=date("H:i",strtotime("4 hour"));
$timeyap=date("H:i",strtotime("+7 hour"));
/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
$BassMusic_Bukhara = json_decode(file_get_contents('php://input'));
$Buxoro = $BassMusic_Bukhara->message;
$cid = $Buxoro->chat->id;
$text=$Buxoro->text;
$type = $Buxoro->chat->type;
$reply = $Buxoro->reply_to_message->text;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);

$boshm = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[["text"=>'🔍Rasm izlash'],["text"=>'🔍Maqola izlash']],
[["text"=>'🔍Hayoti']],
[['text'=>"✅Bu Qiziq"],["text"=>'⬛QR-Code']],
]
]);

$bosh2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[["text"=>'📝Xabar yozish'],["text"=>'📊Statistika']],
[["text"=>'❎Orqaga']],
]
]);

$qz = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[["text"=>'📣Yangiliklar'],["text"=>'🗞Futbol']],
[["text"=>'🇺🇿Dasturchi'],["text"=>'🌎Dunyo soatlari']],
[["text"=>'❌Orqaga']],
]
]);
/////https://yandex.uz/search/touch/?tasix=1&text=$text,
/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
if($text=="/start"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>😌Assalom aleykum  $name !
💡Ushbu bot @Mayli_me -ning Rasmiy boti!
✅ Vazifalari: ⏬
1- Rasm, Qidirish!📥
2- Mashhur odamlar haqida, Qidirish!📥
3- Maqolla,Qidirish!📥
4- Qiziqarli, Bo'lim!📝
🏠Kerakli menuni tanlang❗👇,
 Sizham o'z botingizni quring @EditUz_Bot</b> ",
    'parse_mode'=>'html',
    'reply_markup'=>$boshm,
    ]);
}




//////}}} mashurlar.  https://newssearch.yandex.uz/news/search?text=$text


if($text=="/start"){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"<b>Admin aka yangi foydalanuvchi -> Ismi $name ,
🧒Malumot : <a href = 'tg://user?id=$uid'>$name</a>
🔷Usernamesi: @$username
🆔️Raqami: <a href = 'tg://user?id=$uid'>$uid</a>
📱$nomer
 </b> ",
    'parse_mode'=>'html',
    ]);
}

if($text == "📝Xabar yozish"){
  bot('sendMessage',[
  'chat_id'=>$cid,
  'message_id'=>$mid,
  'text'=>"Xabaringizni kiriting!",
  'reply_markup'=>$rpl,
    ]);
    }
    if($reply=="Xabaringizni kiriting!"){
      bot('sendMessage',[
      'chat_id'=>$admin,
      'text'=>"Xabar keldi!
➖➖➖➖➖➖➖➖➖➖➖➖➖➖
🧒Yuboruvchi: <a href = 'tg://user?id=$uid'>$name</a>
🔷Usernamesi: @$username
🆔️Raqami: <a href = 'tg://user?id=$uid'>$uid</a>
📱$nomer
➖➖➖➖➖➖➖➖➖➖➖➖➖➖

🗒️Xabar: $text

➖➖➖➖➖➖➖➖➖➖➖➖➖➖

Javob yozish uchun  /sms 🆔️
Shu tarzda yozing!✅
⌚Soat: $timeuzb ",
'parse_mode'=>'html',
]);
sleep(2);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Yaxshi adminlarga xabaringiz yetkazildi!✅
👨‍💻Adminlar sizga 24 soat ichida javob yozadi!",
'parse_mode'=>"markdown",
'reply_markup'=>$bosh2,
]);
}
/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////


if(mb_stripos($text,"/sms") !== false){
if($cid == $admin){
$ex = explode(" ",$text);
$sms = str_replace("/sms $ex[1]","",$text);
$ismi = $message->from->first_name;
/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
if(mb_stripos($ex[1],"@") !== false){
$ssl = str_replace("@","",$ex[1]);
$egasi = "t.me/$ssl";
}else{
$egasi = "tg://user?id=$ex[1]";
$eegasi = "$ex[1]";
}
bot('sendMessage',[
'chat_id'=>$ex[1],
'text'=>"[👨‍💻Admin👨‍💻](tg://user?id=$admin) dan javob keldi!✅


💌Javob: $sms

⏰Soat: $timeuzb ",
'parse_mode'=>"markdown", 
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"[👤Savol bergan odam👤]($egasi)ga xabaringiz yuborildi📩",
'parse_mode'=>"markdown", 
]);
}else{
bot("sendMessage",[
'chat_id'=>$cid,
'text'=> "<b>Bu bo‘limni faqat bot administratori ishlata oladi!</b>",
'parse_mode'=>'Markdown',
]);
}
}

if($text=="❎Orqaga"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>♻  Orqa menyuga xush kelibsiz  [[Bosh menu => /start</b>",
'parse_mode'=>'html',
  'reply_markup'=>$qz,
]);
}


if($text=="✅Bu Qiziq"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>♻ Qiziqarli menyuga xush kelibsiz  [[Bosh menu => /start</b>",
'parse_mode'=>'html',
  'reply_markup'=>$qz,
]);
}/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////

if($text=="❌Orqaga"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>♻ Bosh menyuga xush kelibsiz  [[Bosh menu => /start</b>",
'parse_mode'=>'html',
  'reply_markup'=>$boshm,
]);
}

if($text=="🇺🇿Dasturchi"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>@$botname - 🇺🇿 Dasturchisi @mayli_me ✅
🎁Sizga xam xoxlagandaqa bot yaratib beramiz:!
😊Dasturchi  bilan bog'laning! 
Sizham o'z botingizni quring @EditUz_Bot</b>",
'parse_mode'=>'html',
  'reply_markup'=>$bosh2,
]);
}

if($text=="🌎Dunyo soatlari"){
bot('sendMessage',[
'message_id'=>$mid,
'chat_id'=>$cid,
'text'=>"*
🇺🇿 O'zbekiston: $timeuzb
➖➖➖➖➖➖➖➖
🇺🇸 AQSH: $timeusa
➖➖➖➖➖➖➖➖
🇧🇷 Braziliya: $timebra
➖➖➖➖➖➖➖➖
🇵🇹 Portugaliya: $timepor
➖➖➖➖➖➖➖➖
🇸🇦 Saudiya Arabistoni: $timearb
➖➖➖➖➖➖➖➖
🇪🇸 Ispaniya: $timeisp
➖➖➖➖➖➖➖➖
🇦🇪 Dubay: $timedub
➖➖➖➖➖➖➖➖
🇯🇵 Yaponiya: $timeyap
➖➖➖➖➖➖➖➖
🇷🇺 Rossiya: $timerus
➖➖➖➖➖➖➖➖
🇩🇪 Germaniya: $timeger

By - @$botname *",
'parse_mode'=>'markdown',
]);
}


$url = 'https://daryo.uz/feed/';
$rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item) {
$line = $item->title;
 $link = $item->link;
break;
}
if($text == "📣Yangiliklar"){
$url = "https://daryo.uz/feed/";
$rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item) {
$line = $item->title;
$link = $item->link;
}  
bot ('sendmessage', [
'chat_id'=> $cid,
'text'=>"

🔔Eng so‘ngi 📰yangiliklar

🆕️[$line]($link)

📍Xabarni o'qish uchun pastdagi tugmani bosing!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"🔍Xabarni o'qish ! ", 'url'=>"$link"]],
[['text'=>"● Admin ", 'url'=>"https://t.me/$adminuser"]],
]
])
]);
}

if($text == "🗞Futbol"){
$url = "https://m.stadion.uz/news/rss";
$rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item) {
$firdavs = $item->title;
$jurayev = $item->link;
}  
bot ('sendmessage', [
'chat_id'=> $cid,
'text'=>"🔔Eng so‘ngi 📰futbol yangiliklari

🆕️[$firdavs]($jurayev)

📍Xabarni o'qish uchun pastdagi tugmani bosing!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"🔍Xabarni o'qish ", 'url'=>"$jurayev"]],
[['text'=>"● Admin ", 'url'=>"https://t.me/$adminuser"]],
]
])
]);
}

if($text=="⬛QR-Code"){
file_put_contents("data/uzb.txt", 'to');
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🥀<b>Menga biror so'z yoki matn jonating

(Menga soz yoki matn yozing men Qr-Code Photo shaklda yetkazaman❗️)</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>false,
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌Orqaga"]],

]
])
]);
}
elseif($Uzb == "to"){
bot('sendMessage',[
 'chat_id'=>$cid,
 'text'=>"
 ☇<b>🔍</b>",
 'parse_mode'=>"HTML"
 ]);
 sleep(0.3);
bot('editMessageText',[
 'chat_id'=>$cid,
 'text'=>'🔍'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid +1,
 'text'=>'Loading!.'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!..'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!...'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!....'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'✅'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'□□□□□ 0%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■□□□□ 20%'
 ]);/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■□□□ 40%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■□□ 60%'
]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■□ 80%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■■ 100%'
 ]); 
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'📣Qr-code tayyor'
 ]); 
  bot('deletemessage',[
    'chat_id'=>$cid,
    'message_id'=>$mid + 1,
    ]);
 sleep(0.1);
bot('sendPhoto',[
'chat_id'=>$cid,
'reply_to_message_id'=>$mid,
'photo'=>"http://api.qrserver.com/v1/create-qr-code/?data=$text",
'caption'=>" <b>Bizning Botdan foydalanganingiz uchun minnatdormiz!</b>
<i>
⬛QR-Code tayyor !!!

☞ Siz yozgan soz: $text

🖤 Dasturchi : @EditUz_Bot

❤️ Tayorlovchi : @$botname 

 </i>",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>false,
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌Orqaga"]],
]/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
])
]);
unlink("data/uzb.txt");
exit();
}
/////https://yandex.uz/video/touch/search/?text=Bahor//////

if($text=="🔍Hayoti"){
file_put_contents("data/uzb3.txt", 'to');
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🥀<b>Menga Mashhur odam ismi familyasini yozing!

(Menga Ismi yoki familyasini yozing men Global qidiruvdan foydalanman❗️)

❎Eslatma -> Botda video  qidirayotganizda 18+ Narsalarni yozmang!!!
😌Aks holda bot tomondan! bloklanasiz!!!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>false,
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌Orqaga"]],
]
])
]);
}
elseif($Uzb3 == "to"){
bot('sendMessage',[
 'chat_id'=>$cid,
 'text'=>"
 ☇<b>🔍</b>",
 'parse_mode'=>"HTML"
 ]);
 sleep(0.3);
bot('editMessageText',[
 'chat_id'=>$cid,
 'text'=>'🔍'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid +1,
 'text'=>'Loading!.'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!..'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!...'
 ]);/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!....'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'✅'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'□□□□□ 0%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■□□□□ 20%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■□□□ 40%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■□□ 60%'
]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■□ 80%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■■ 100%'
 ]); 
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'📣Malumot  topildi!'
 ]); 
  bot('deletemessage',[
    'chat_id'=>$cid,
    'message_id'=>$mid + 1,
  ]);
 sleep(0.1);
bot('sendMessage',[
'chat_id'=>$cid,
'reply_to_message_id'=>$mid,
'text'=>" <b>Bizning Botdan foydalanganingiz uchun minnatdormiz!</b>
<i>☞ Siz yozgan Mashhur odam: $text

🖤 Dasturchi : @EditUz_Bot

❤️ Tayorlovchi : @$botname 

$text Haqida malumot olish uchun pastdagi tugmani bosing!
 </i>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"$text haqida❗", 'url'=>"https://newssearch.yandex.uz/news/search?text=$text"]],
[['text'=>"● Admin ", 'url'=>"https://t.me/$adminuser"]],
]
])
]);
unlink("data/uzb3.txt");
exit();
}


if($text=="🔍Rasm izlash"){
file_put_contents("data/uzb1.txt", 'to');
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🥀<b>Menga biror so'z yoki matn jonating

(Menga soz yoki matn yozing men Global qidiruvdan foydalanman❗️)

❎Eslatma -> Botda Rasm qidirayotganizda 18+ Narsalarni yozmang!!!
😌Aks holda bot tomondan! bloklanasiz!!!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>false,
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌Orqaga"]],
]
])
]);
}
elseif($Uzb1 == "to"){
bot('sendMessage',[
 'chat_id'=>$cid,
 'text'=>"
 ☇<b>🔍</b>",
 'parse_mode'=>"HTML"
 ]);
 sleep(0.3);
bot('editMessageText',[
 'chat_id'=>$cid,
 'text'=>'🔍'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid +1,
 'text'=>'Loading!.'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!..'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!...'
 ]);/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!....'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'✅'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'□□□□□ 0%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■□□□□ 20%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■□□□ 40%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■□□ 60%'
]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■□ 80%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■■ 100%'
 ]); 
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'📣Rasm topildi!'
 ]); 
  bot('deletemessage',[
    'chat_id'=>$cid,
    'message_id'=>$mid + 1,
  ]);
 sleep(0.1);
bot('sendPhoto',[
'chat_id'=>$cid,
'reply_to_message_id'=>$mid,
'photo'=>"https://yandex.uz/images/touch/search/?text=$text",
'caption'=>" <b>Bizning Botdan foydalanganingiz uchun minnatdormiz!</b>
<i>☞ Siz yozgan so'z: $text

🖤 Dasturchi : @EditUz_Bot

❤️ Tayorlovchi : @$botname 

 </i>",
'parse_mode'=>'HTML',
'reply_markup'=>json_encode([
'resize_keyboard'=>false,
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌Orqaga"]],
]
])
]);
unlink("data/uzb1.txt");
exit();
}


if($text=="🔍Maqola izlash"){
file_put_contents("data/uzb4.txt", 'to');
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🥀<b>Menga biror so'z yoki matn jonating

(Menga soz yoki matn yozing men Global qidiruvdan foydalanman❗️)

❎Eslatma -> Botda Maqola qidirayotganizda 18+ Narsalarni yozmang!!!
😌Aks holda bot tomondan! bloklanasiz!!!</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>false,
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌Orqaga"]],
]
])
]);
}
elseif($Uzb4 == "to"){
bot('sendMessage',[
 'chat_id'=>$cid,
 'text'=>"
 ☇<b>🔍</b>",
 'parse_mode'=>"HTML"
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'text'=>'🔍'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid +1,
 'text'=>'Loading!.'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!..'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!...'
 ]);/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'Loading!....'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'✅'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'□□□□□ 0%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■□□□□ 20%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■□□□ 40%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■□□ 60%'
]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■□ 80%'
 ]);
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'■■■■■ 100%'
 ]); 
 sleep(0.1);
bot('editMessageText',[
 'chat_id'=>$cid,
 'message_id'=>$mid + 1,
 'text'=>'📣Maqola topildi!'
 ]); 
  bot('deletemessage',[
    'chat_id'=>$cid,
    'message_id'=>$mid + 1,
  ]);
 sleep(0.1);
bot('sendMessage',[
'chat_id'=>$cid,
'reply_to_message_id'=>$mid,
'text'=>" <b>🔍Maqola muofaqyatli topldi! !</b>

<i>☞ Siz qidirgan maqola: $text

🖤 Dasturchi : @EditUz_Bot

❤️ Tayorlovchi : @$botname 

📝Maqolani o'qish uchun pastagi tugmani bosing!!

 </i>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"$text Maqolasini  o'qish ! ", 'url'=>"https://yandex.uz/search/touch/?tasix=1&text=$text"]],
[['text'=>"● Admin ", 'url'=>"https://t.me/$adminuser"]],
]
])
]);
unlink("data/uzb4.txt");
exit();
}

///panel boshlandi


$Update_oFf = json_decode(file_get_contents('php://input'));
$admin = "ADMIN_ID";
$message = $Update_oFf->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$type = $message->chat->type;
$tx = $message->text;
$text= $message->text;
$ism = file_get_contents("firdavs_officall/$cid.ism");
$sguruhlar = file_get_contents("Stat/sguruh.dat");
$guruhlar = file_get_contents("Stat/guruh.dat");
$kanallar = file_get_contents("Stat/kanallar.dat");
$step = file_get_contents("Bot/$cid.step");
$step2 = file_get_contents("Bot/2.step");
$step3 = file_get_contents("Bot/3.step");
$step1 = file_get_contents("Bot/$chat_id2.step");
$name = $message->chat->first_name;
$user = $message->from->username;
$soat = date('H•i', strtotime('2 hour'));
mkdir("Bot");
mkdir("Stat");
mkdir("firdavs_officall");

$adminpanel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📊 Robot Statistikasi 📊"]],
[['text'=>"📤A'zolarga Xabar Yuborish📤"]],
[['text'=>"📤Super Guruhlarga Xabar📤"]],
[['text'=>"📤Shaxsiy Guruhlarga Xabar📤"]],
[['text'=>"/start"]],
]
]);

if($tx=="/panel" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👨🏻‍💻Admin panelga xush kelibsiz xo'jayin!!",
'reply_markup'=>$adminpanel,
]);
}

$lichka = file_get_contents("Stat/lichka.dat");
if($type=="private"){
if(stripos($lichka,"$cid") !==false){
}else{
file_put_contents("Stat/lichka.dat","$lichka\n$cid");
}
}

$sguruhlar = file_get_contents("Stat/sguruh.dat");
if($type=="group"){
if(stripos($sguruhlar,"$cid") !==false){
}else{
file_put_contents("Stat/sguruh.dat","$sguruhlar\n$cid");
}
}

$guruhlar = file_get_contents("Stat/guruh.dat");
if($type=="supergroup"){
if(stripos($guruhlar,"$cid") !==false){
}else{
file_put_contents("Stat/guruh.dat","$guruhlar\n$cid");
}
}

$kanallar = file_get_contents("Stat/kanallar.dat");
if($type=="channel"){
if(stripos($kanallar,"$cid") !==false){
}else{
file_put_contents("Stat/kanallar.dat","$kanallar\n$cid");
}
}

if($tx=="📂Bot kodi"){
if($cid==$admin){
bot('sendDocument',[
'chat_id'=>$admin,
'document'=>new CURLfile(__FILE__),
'caption'=>"Robotni PHP kodi",
]);
}
}

if($tx=="📊 Robot Statistikasi 📊" and $cid==$admin){
$lich = substr_count($lichka,"\n");
$gr = substr_count($guruhlar,"\n");
$sgr = substr_count($sguruhlar,"\n");
$umumiy = $lich + $gr;
       bot('deletemessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid,
      ]);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"*📊 ┌ Robot Statistikasi*

*🟦 ├ A'zolar Soni: $lich*

*🟨 ├Super Guruhlar Soni: $gr*

*🟨 ├ Shaxsiy Guruhlar Soni: $sgr*

*🟩 └ Umumiy Natija: $umumiy*

*⏰$soat*",
'parse_mode'=>'markdown',
'reply_markup'=>$adminpanel,
]);
}

if($tx=="📤A'zolarga Xabar Yuborish📤" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabaringizni Yozing.Men Uni Forward Qilib Hamma a'zolarga yuboraman!!
Bekor qilish uchun /cancel buyrugidan foydalaning",
]);
file_put_contents("Bot/$cid.step","forward");
}

if($step=="forward" and $cid==$admin){
  if($text=="/cancel"){
  file_put_contents("Bot/$cid.step","");
}else{
$userlar = explode("\n",$lichka);
foreach($userlar as $users){
$xabarok=bot('ForwardMessage',[
'chat_id'=>$users,
'from_chat_id'=>$cid,
'message_id'=>$mid,
]);
}
}
}
if($xabarok){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabar hamma bot a'zolariga yetkazildi",
]);
file_put_contents("Bot/$cid.step","");
}

if($tx=="📤Super Guruhlarga Xabar📤" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabaringizni Yozing.Men Uni Forward Qilib Hamma guruhlarga yuboraman!!
Bekor qilish uchun /cancel buyrugidan foydalaning",
]);
file_put_contents("Bot/$cid.step","forwardg");
}

if($step=="forwardg" and $cid==$admin){
  if($text=="/cancel"){
  file_put_contents("Bot/$cid.step","");
}else{
$guruhlarim = explode("\n",$guruhlar);
foreach($guruhlarim as $guruhs){
$xabarokkk=bot('ForwardMessage',[
'chat_id'=>$guruhs,
'from_chat_id'=>$cid,
'message_id'=>$mid,
]);
}
}
}
if($xabarokkk){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabar hamma super guruhlarga forward qilindi :)",
]);
file_put_contents("Bot/$cid.step","");
}

if($tx=="📤Shaxsiy Guruhlarga Xabar📤" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabaringizni Yozing.Men Uni Forward Qilib Hamma guruhlarga yuboraman!!
Bekor qilish uchun /cancel buyrugidan foydalaning",
]);
file_put_contents("Bot/$cid.step","forwardgr");
}

if($step=="forwardgr" and $cid==$admin){
  if($text=="/cancel"){
  file_put_contents("Bot/$cid.step","");
}else{
$sguruhlarim = explode("\n",$sguruhlar);
foreach($sguruhlarim as $sguruhs){
$sxabarokkk=bot('ForwardMessage',[
'chat_id'=>$sguruhs,
'from_chat_id'=>$cid,
'message_id'=>$mid,
]);
}
}
}
if($sxabarokkk){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabar hamma shaxsiy guruhlarga forward qilindi :)",
]);
file_put_contents("Bot/$cid.step","");
}

if($tx=="/cancel" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"*Xabar yuborish bekor qilindi✅*",
'parse_mode'=>'markdown',
'reply_markup'=>$adminpanel,
]);
}

/////*Ushbu kod unversal dasturchi _Firdavs_@Firdavs2004 va @Kavsar_Coder or @Update_Off ga tegishli manba bilan oling bizni kanal @Vip_blogers *////
?>