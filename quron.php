<?php 

//=====================//
# DEV: [**ADMINUSER**]#
# Ch: @Qitmirvoy#
#bu kodni tarqatsang manba bilan tarqat #
//====================//
ob_start();
define('API_KEY','API_TOKEN');
$admin = "ADMIN_ID";
function bot($method,$datas=[]){$BOT_SYRIA = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$BOT_SYRIA";
$BOTS_SYR1A = file_get_contents($url); return json_decode($BOTS_SYR1A);}


$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$re_msgid  = $update->message->reply_to_message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$chat_id  = $message->chat->id;
$user  = $update->message->from->username;
$from_user = $message->from->username;
$chat_id2 = $update->callback_query->message->chat->id;
$info  = json_decode($get, true);

  $kun =date('d-m-Y', strtotime('0 hour')); 
      $soat=date('H:i:s', strtotime('0 hour')); 
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");

$name = $update->message->from->first_name;
$bot = bot('getme',['bot'])->result->username;
echo "<br><a  href='https://t.me/$bot'>@$bot</a>";

if ($text == "/start" or $text == "🔝 Main menu" and strpos($abood, '"status":"left"') != TRUE){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"
➖➖➖➖➖➖➖➖➖➖➖
Assalomu Alaykum va 
rahmatullahi barakotuh
 ➖➖➖➖➖➖➖➖➖➖➖
Do'stlar ushbu Qur'on Oyatlari
Barchamizni dilimizni ochadi ❀
➖➖➖➖➖➖➖➖➖➖➖
Ushbu Botni Barcha Musulmonlar Uchun Savob Yo'lida Tayyorladik!
➖➖➖➖➖➖➖➖➖➖➖
🙏Iymonimiz Mustahkam Bo'lsin!
☺️Qalbimiz Pok Bo'lsin Ilojim!
➖➖➖➖➖➖➖➖➖➖➖
Marhamat Menyudan Sizga Kerakli Bo'limni Tanlang,!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'keyboard'=>[
    [['text'=>'🌸Oyatlar🌸'],['text'=>'✨Malumot']],[['text'=>'🤖Buyuruqlar'],['text'=>'🌸Roza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @@Qitmirvoy#

if($text == "🌸Oyatlar🌸"){
bot('sendphoto',[
'photo'=>"https://t.me/hacker_progi/141",
'chat_id'=>$chat_id,
'caption'=>"🌚Oyatlar Bo'limi
➖➖➖➖➖➖➖➖➖➖➖
Barcha Suralar Mishari Rashid 
Tomonidan ijro qilingan
➖➖➖➖➖➖➖➖➖➖➖
Suralarni Tanlang 🌞
➖➖➖➖➖➖➖➖➖➖➖",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"📖Fotiha surasi"]],
[['text'=>"📖Baqara surasi"],['text'=>"📖Imron surasi"]],
[['text'=>"📖Niso surasi"],['text'=>"📖Maida surasi"]],
[['text'=>"📖Anam surasi"],['text'=>"📖Arof surasi"]],
[['text'=>"📖Anfol surasi"],['text'=>"📖Tavba surasi"]],
[['text'=>"📖Yunus surasi"],['text'=>"📖Hud surasi"]],
[['text'=>"📖Yusuf surasi"],['text'=>"📖Rad surasi"]],
[['text'=>"📖Ibrohim surasi"],['text'=>"📖Hijr surasi"]],
[['text'=>"📖Nahl surasi"],['text'=>"📖Isro surasi"]],
[['text'=>"📖Kahf surasi"],['text'=>"📖Maryam surasi"]],
[['text'=>"📖Toha surasi"],['text'=>"📖Anbiyo suarsi"]],
[['text'=>"📖Muminun surasi"],['text'=>"📖Nur surasi"]],
[['text'=>"📖Furqon surasi"],['text'=>"📖Shuaro surasi"]],
[['text'=>"📖Naml surasi"],['text'=>"📖Qasos surasi"]],
[['text'=>"📖Ankabut surasi"],['text'=>"📖Rum Surasi"]],
[['text'=>"📖Luqmon surasi"],['text'=>"📖Sajda surasi"]],
[['text'=>"📖Ahzob surasi"],['text'=>"📖Saba surasi"]],
[['text'=>"📖Fotir surasi"],['text'=>"📖Yosin surasi"]],
[['text'=>"📖Soffat surasi"],['text'=>"📖Sod surasi"]],
[['text'=>"📖Zumar surasi"],['text'=>"📖Gofir surasi"]],
[['text'=>"📖Fussilat surasi"],['text'=>"📖Shoro surasi"]],
[['text'=>"📖Zuxruf surasi"],['text'=>"📖Zuhan surasi"]],
[['text'=>"📖Jathiya surasi"],['text'=>"📖Ahqaf surasi"]],
[['text'=>"📖Muhammad surasi"],['text'=>"📖Fath surasi"]],
[['text'=>"📖Hujurat surasi"],['text'=>"📖Qof surasi"]],
[['text'=>"📖Zuriyat surasi"],['text'=>"📖Tur surasi"]],
[['text'=>"📖Najim surasi"],['text'=>"📖Qamar surasi"]],
[['text'=>"📖Rohman surasi"],['text'=>"📖Voqiya surasi"]],
[['text'=>"📖Hadid surasi"],['text'=>"📖Mujadila surasi"]],
[['text'=>"📖Hashir surasi"],['text'=>"📖Mumtahina surasi"]],
[['text'=>"📖Soff surasi"],['text'=>"📖Juma surasi"]],
[['text'=>"📖Munofiqun surasi"],['text'=>"📖Taghabun surasi"]],
[['text'=>"📖Taloq surasi"],['text'=>"📖Tahrim surasi"]],
[['text'=>"📖Mulk surasi"],['text'=>"📖Qalam surasi"]],
[['text'=>"📖Haqqa surasi"],['text'=>"📖Muorij surasi"]],
[['text'=>"📖Nuh surasi"],['text'=>"📖jinn surasi"]],
[['text'=>"📖Muzzammil surasi"],['text'=>"📖Muddathir surasi"]],
[['text'=>"📖Qiyama surasi"],['text'=>"📖Insan surasi"]],
[['text'=>"📖Mursalat surasi"],['text'=>"📖Naba surasi"]],
[['text'=>"📖Naziat surasi"],['text'=>"📖Abasa surasi"]],
[['text'=>"📖Takawir surasi"],['text'=>"📖Infitar surasi"]],
[['text'=>"📖Mutaffifeen surasi"],['text'=>"📖Inshiqaq surasi"]],
[['text'=>"📖Burooj surasi"],['text'=>"📖Tariq surasi"]],
[['text'=>"📖Ala surasi"],['text'=>"📖Ghashiya surasi"]],
[['text'=>"📖Fajir surasi"],['text'=>"📖Balad surasi"]],
[['text'=>"📖Shams surasi"],['text'=>"📖Lail surasi"]],
[['text'=>"📖Dhuha surasi"],['text'=>"📖Sharh surasi"]],
[['text'=>"📖Teen surasi"],['text'=>"📖falaq surasi"]],
[['text'=>"📖Qadr surasi"],['text'=>"📖Bayyina surasi"]],
[['text'=>"📖Zilzila surasi"],['text'=>"📖Adiyat surasi"]],
[['text'=>"📖Qaria surasi"],['text'=>"📖Takathur surasi"]],
[['text'=>"📖Asr surasi"],['text'=>"📖Hamza surasi"]],
[['text'=>"📖Fil surasi"],['text'=>"📖Quraysh surasi"]],
[['text'=>"📖Moun surasi"],['text'=>"📖Kavsar surasi"]],
[['text'=>"📖Kofirun surasi"],['text'=>"📖Nosr surasi"]],
[['text'=>"📖Masad surasi"],['text'=>"📖Ixlos surasi"]],
[['text'=>"📖Falaq surasi"],['text'=>"📖Al_nas surasi"]],
[['text'=>"🌸Roza duosi"],['text'=>"📖Qur'on"]],
[['text'=>"✨Malumot"]],
[['text'=>"🔝 Main menu"]],
]
])
]);
}
# DEV: [**ADMINUSER**]#
# Ch: @Qitmirvoy#


if($text == "✨Malumot"){
bot('sendphoto',[
'photo'=>"https://t.me/hacker_progi/141",
'chat_id'=>$chat_id,
'caption'=>"😎Salom {$name }
Ushbu Bot Barcha Botlar ichida eng Yaxshidir :  
⭐️⭐️⭐️⭐️⭐️⭐️⭐️⭐️⭐️⭐️
🤲 Yaxshilikka Xizmat Qilsin
💪 Hamkorimiz [*BOTNAME*]
👳‍♀️ Admin: [ADMINUSER]
🤲🤲🤲🤲🤲🤲🤲🤲🤲🤲",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'keyboard'=>[
    [['text'=>'🌸Oyatlar🌸'],['text'=>'✨Malumot']],[['text'=>'🤖Buyuruqlar'],['text'=>'🌸Roza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @@Qitmirvoy#


if($text == "🤖Buyuruqlar"){
bot('sendphoto',[
'photo'=>"https://t.me/hacker_progi/141",
'chat_id'=>$chat_id,
'caption'=>"Assalomu alaykum va rahmatullohi barakotuh

Azizlar sizlar buyuruqlar bo'limidasiz

/Quron Qur'on haqida
",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'keyboard'=>[
    [['text'=>'🌸Oyatlar🌸'],['text'=>'✨Malumot']],[['text'=>'🤖Buyuruqlar'],['text'=>'🌸Roza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @Qitmirvoy#

if($text == "🌸Roza duosi"){
bot('sendphoto',[
'photo'=>"https://t.me/hacker_progi/141",
'chat_id'=>$chat_id,
'caption'=>"————————————————————————
Рузада огиз очиш ва йопиш дуолари

Руза тутиш (огиз епиш)
дуоси. Навайту ан асума
совма шахри ромазона
миннал фажри иллал
магриби холисал
лиллоху таолло Аллоху акбар. Амин.
РУЗА (огиз очиш) дуоси.
Аллохума лака сумту ва
бика аманту валайка
тавакалту ва алла
ризика ифтору фагфирли ла гафуру ма
кадамту ва мо ахарту.
Илохим Аллохим кабул
айласин рузангизни.
Амин
————————————————————————",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'keyboard'=>[
    [['text'=>'🌸Oyatlar🌸'],['text'=>'✨Malumot']],[['text'=>'🤖Buyuruqlar'],['text'=>'🌸Roza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @@Qitmirvoy#

if($text == "1" or $text == "📖Fotiha surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/3",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "2" or $text == "📖Baqara surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/4",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "3" or $text == "📖Imron surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/5",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "4" or $text == "📖Niso surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/6",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "5" or $text == "📖Maida surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/7",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "6" or $text == "📖Anam surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/8",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "7" or $text == "📖Arof surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/9",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "8" or $text == "📖Anfol surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/10",
 reply_to_message_id =>$message->message_id, 
]);
} 
if($text == "9" or $text == "📖Tavba surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/11",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "10" or $text == "📖Yunus surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/12",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "11" or $text == "📖Hud surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/13",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "12" or $text == "📖Yusuf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/14",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "13" or $text == "📖Rad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/15",
 reply_to_message_id =>$message->message_id, 
]);
}


if($text == "14" or $text == "📖Ibrohim surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/16",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "15" or $text == "📖Hijr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/17",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "16" or $text == "📖Nahl surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/18",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "17" or $text == "📖Isro surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/19",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "18" or $text == "📖Kahf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/20",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "19" or $text == "📖Maryam surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/21",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "20" or $text == "📖Toha surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/22",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "21" or $text == "📖Anbiyo suarsi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/23",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "22" or $text == "📖Haj surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/24",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "23" or $text == "📖Muminun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/25",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "24" or $text == "📖Nur surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/26",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "25" or $text == "📖Furqon surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/27",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "26" or $text == "📖Shuaro surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/28",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "27" or $text == "📖Naml surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/29",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "28" or $text == "📖Qasos surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/30",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "29" or $text == "📖Ankabut surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/31",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "30" or $text == "📖Rum Surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/32",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "31" or $text == "📖Luqmon surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/33",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "32" or $text == "📖Sajda surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/34",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "33" or $text == "📖Ahzob surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/35",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "34" or $text == "📖Saba surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/36",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "35" or $text == "📖Fotir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/37",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "36" or $text == "📖Yosin surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/38",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "37" or $text == "📖Soffat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/39",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "38" or $text == "📖Sod surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/40",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "39" or $text == "📖Zumar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/41",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "40" or $text == "📖Gofir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/42",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "41" or $text == "📖Fussilat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/43",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "42" or $text == "📖Shoro surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/44",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "43" or $text == "📖Zuxruf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/45",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "44" or $text == "📖Zuhan surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/46",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "45" or $text == "📖Jathiya surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/47",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "46" or $text == "📖Ahqaf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/48",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "47" or $text == "📖Muhammad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/49",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "48" or $text == "📖Fath surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/50",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "49" or $text == "📖Hujurat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/51",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "50" or $text == "📖Qof surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/52",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "51" or $text == "📖Zuriyat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/53",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "52" or $text == "📖Tur surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/54",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "53" or $text == "📖Najim surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/55",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "54" or $text == "📖Qamar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/56",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "55" or $text == "📖Rohman surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/57",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "56" or $text == "📖Voqiya surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/58",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "57" or $text == "📖Hadid surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/59",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "58" or $text == "📖Mujadila surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/60",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "59" or $text == "📖Hashir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/61",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "60" or $text == "📖Mumtahina surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/62",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "61" or $text == "📖Soff surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/63",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "62" or $text == "📖Juma surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/64",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "63" or $text == "📖Munofiqun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/65",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "64" or $text == "📖Taghabun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/66",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "65" or $text == "📖Taloq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/67",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "66" or $text == "📖Tahrim surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/68",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "67" or $text == "📖Mulk surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/69",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "68" or $text == "📖Qalam surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/70",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "69" or $text == "📖Haqqa surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/71",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "70" or $text == "📖Muorij surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/72",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "71" or $text == "📖Nuh surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/73",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "72" or $text == "📖jinn surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/74",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "73" or $text == "📖Muzzammil surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/75",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "74" or $text == "📖Muddathir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/76",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "75" or $text == "📖Qiyama surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/77",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "76" or $text == "📖Insan surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/78",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "77" or $text == "📖Mursalat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/79",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "78" or $text == "📖Naba surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/80",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "79" or $text == "📖Naziat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/81",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "80" or $text == "📖Abasa surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/82",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "81" or $text == "📖Takawir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/83",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "82" or $text == "📖Infitar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/84",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "83" or $text == "📖Mutaffifeen surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/85",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "84" or $text == "📖Inshiqaq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/86",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "85" or $text == "📖Burooj surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/87",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "86" or $text == "📖Tariq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/88",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "87" or $text == "📖Ala surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/89",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "88" or $text == "📖Ghashiya surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/90",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "89" or $text == "📖Fajir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/91",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "90" or $text == "📖Balad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/92",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "91" or $text == "📖Shams surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/93",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "92" or $text == "📖Lail surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/94",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "93" or $text == "📖Dhuha surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/95",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "94" or $text == "📖Sharh surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/96",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "95" or $text == "📖Teen surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/97",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "96" or $text == "📖falaq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/98",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "97" or $text == "📖Qadr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/99",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "98" or $text == "📖Bayyina surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/100",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "99" or $text == "📖Zilzila surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/101",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "100" or $text == "📖Adiyat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/102",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "101" or $text == "📖Qaria surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/103",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "102" or $text == "📖Takathur surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/104",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "103" or $text == "📖Asr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/105",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "104" or $text == "📖Hamza surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/106",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "105" or $text == "📖Fil surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/107",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "106" or $text == "📖Quraysh surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/108",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "107" or $text == "📖Moun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/109",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "108" or $text == "📖Kavsar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/110",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "109" or $text == "📖Kofirun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/111",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "110" or $text == "📖Nosr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/112",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "111" or $text == "📖Masad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/113",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "112" or $text == "📖Ixlos surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/114",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "113" or $text == "📖Falaq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/115",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "114" or $text == "📖Al_nas surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/116",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "115" or $text == "📖Qur'on"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/118",
 reply_to_message_id =>$message->message_id, 
]);
}

# DEV: [**ADMINUSER**]#
# Ch: @@Qitmirvoy#

if($text == '/Quron'){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>"https://t.me/hacker_progi/141",
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🌸🌸Quron haqida🌸🌸
➖➖➖➖➖➖➖➖➖➖➖➖
Qurʼon (arab. القرآن oʻqimoq, qiroat qilmoq) — musulmonlarning asosiy muqaddas kitobi. Islom eʼtiqodiga koʻra,
Qurʼon vahiy orqali Muhammad paygʻambarga 610—632 yillar davomida nozil qilingan Allohning kalomi (Kalomulloh). Qurʼon „Kitob“ (yozuv), 
„Furqon“ (haq bilan botilning orasini ayiruvchi), 
„Zikr“ (eslatma), „Tanzil“ (nozil qilingan) kabi nomlar bilan atalib, „Nur“ (yorugʻlik), 
„Hudo“ (hidoyat), „Muborak“ (barakotli),
 „Mubin“ (ochiq-ravshan), „Bushro“ (xushxabar), 
„Aziz“ (eʼzozlanuvchi), „Majid“ (ulugʻ), 
„Bashir“ (bashorat beruvchi), 
„Nazir“ (ogohlantiruvchi) kabi soʻzlar bilan sifatlangan. 
Islom olamida Qurʼon musʼhaf nomi bilan ham mashhur. 
Islom ulamolari Qurʼonning 30 xil nom va sifatlarini sanab oʻtganlar.
➖➖➖➖➖➖➖➖➖➖➖➖
Quroning tuzulishi
➖➖➖➖➖➖➖➖➖➖➖➖
Qurʼonning boʻlimlari sura deyiladi,
uni shartli ravishda bob bilan taqqoslash mumkin.
Har sura oyatlarga boʻlingan. 
Qurʼon 114 sura, 6236 oyatdan iborat.
Har bir suraning oʻz nomi bor. Oyatlar esa tartib raqami bilan berilgan. 
Suralarning nomlari uning boshida kelgan soʻzdan olingan yoki zikri koʻproq kelgan narsalar,
voqealar yohud asosiy qahramon nomi bilan atalgan. 
Keyinchalik oʻqish va yodlash oson boʻlishi uchun Iroq hokimi Hajjoj ibn Yusuf (hukmronlik yillari 694—714) koʻrsatmasiga binoan Qurʼon 30 qism (arab.juz, fors. pora)ga boʻlingan.
Qurʼonda birinchi kelgan „Fotiha“ surasidan keyingi suralar katta, 
oʻrtacha va kichik suralar tartibida joylashgan. 2-Baqara surasi 286 oyatdan, eng qisqa Kavsar surasi 3 oyatdan iborat. 
Eng qisqa oyatlar „Toho“ va „Yosin“, eng uzun oyat „Baqara“ surasining 282-oyatidir. Suralar nozil boʻlish vaqti va joyiga koʻra 2 ga: hijradan oldin nozil boʻlgan suralar —
„Makka suralari“ (610—622 yillar, 90 sura) va hijradan keyin nozil boʻlgan suralar — „Madina suralari“ (622-yildan, 24 sura) ga ajratiladi.
Qurʼon matnining koʻp qismi Alloh bilan soʻzlashish, islom dushmanlari yoki undan ikkilanuvchilar bilan munozara qilish shaklida berilgan.
➖➖➖➖➖➖➖➖➖➖➖➖
Bugun: $kun Soat: $soat
"
]);
}



# DEV: [**ADMINUSER**]
# Ch: @Qitmirvoy
if(mb_stripos($text,"/start")!==false){

   $baza=file_get_contents("azo.dat");
   if(mb_stripos($baza,$chat_id) !==false){
   }else{
   $txt="\n$chat_id";
   $file=fopen("azo.dat","a");
   fwrite($file,$txt);
   fclose($file);
   }
}
if(mb_stripos($text,"stat")!==false){
      $baza=file_get_contents("azo.dat");
      $all=substr_count($baza,"\n");
      $gr=substr_count($baza,"-");
      $us=$all-$gr;
      $tx = "<b>📡 Bot Foydalanuvchilari
👥 Super Group: $gr
👤 Userlar: $us
👨‍👩‍👧‍👦 Jami: $all
👨‍💻</b> [*BOTNAME*]";
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'parse_mode'=>'html',
   'text'=>$tx,
  ]);
}