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

if ($text == "/start" or $text == "π Main menu" and strpos($abood, '"status":"left"') != TRUE){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"
βββββββββββ
Assalomu Alaykum va 
rahmatullahi barakotuh
 βββββββββββ
Do'stlar ushbu Qur'on Oyatlari
Barchamizni dilimizni ochadi β
βββββββββββ
Ushbu Botni Barcha Musulmonlar Uchun Savob Yo'lida Tayyorladik! 
ushbu bot @VipBuilder_UzBot yordamida ochildi
βββββββββββ
πIymonimiz Mustahkam Bo'lsin!
βΊοΈQalbimiz Pok Bo'lsin Ilojim!
βββββββββββ
Marhamat Menyudan Sizga Kerakli Bo'limni Tanlang,!",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'keyboard'=>[
    [['text'=>'πΈOyatlarπΈ'],['text'=>'β¨Malumot']],[['text'=>'π€Buyuruqlar'],['text'=>'πΈRoza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @@Qitmirvoy#

if($text == "πΈOyatlarπΈ"){
bot('sendphoto',[
'photo'=>"https://t.me/hacker_progi/141",
'chat_id'=>$chat_id,
'caption'=>"πOyatlar Bo'limi
βββββββββββ
Barcha Suralar Mishari Rashid 
Tomonidan ijro qilingan
βββββββββββ
Suralarni Tanlang π
βββββββββββ",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"πFotiha surasi"]],
[['text'=>"πBaqara surasi"],['text'=>"πImron surasi"]],
[['text'=>"πNiso surasi"],['text'=>"πMaida surasi"]],
[['text'=>"πAnam surasi"],['text'=>"πArof surasi"]],
[['text'=>"πAnfol surasi"],['text'=>"πTavba surasi"]],
[['text'=>"πYunus surasi"],['text'=>"πHud surasi"]],
[['text'=>"πYusuf surasi"],['text'=>"πRad surasi"]],
[['text'=>"πIbrohim surasi"],['text'=>"πHijr surasi"]],
[['text'=>"πNahl surasi"],['text'=>"πIsro surasi"]],
[['text'=>"πKahf surasi"],['text'=>"πMaryam surasi"]],
[['text'=>"πToha surasi"],['text'=>"πAnbiyo suarsi"]],
[['text'=>"πMuminun surasi"],['text'=>"πNur surasi"]],
[['text'=>"πFurqon surasi"],['text'=>"πShuaro surasi"]],
[['text'=>"πNaml surasi"],['text'=>"πQasos surasi"]],
[['text'=>"πAnkabut surasi"],['text'=>"πRum Surasi"]],
[['text'=>"πLuqmon surasi"],['text'=>"πSajda surasi"]],
[['text'=>"πAhzob surasi"],['text'=>"πSaba surasi"]],
[['text'=>"πFotir surasi"],['text'=>"πYosin surasi"]],
[['text'=>"πSoffat surasi"],['text'=>"πSod surasi"]],
[['text'=>"πZumar surasi"],['text'=>"πGofir surasi"]],
[['text'=>"πFussilat surasi"],['text'=>"πShoro surasi"]],
[['text'=>"πZuxruf surasi"],['text'=>"πZuhan surasi"]],
[['text'=>"πJathiya surasi"],['text'=>"πAhqaf surasi"]],
[['text'=>"πMuhammad surasi"],['text'=>"πFath surasi"]],
[['text'=>"πHujurat surasi"],['text'=>"πQof surasi"]],
[['text'=>"πZuriyat surasi"],['text'=>"πTur surasi"]],
[['text'=>"πNajim surasi"],['text'=>"πQamar surasi"]],
[['text'=>"πRohman surasi"],['text'=>"πVoqiya surasi"]],
[['text'=>"πHadid surasi"],['text'=>"πMujadila surasi"]],
[['text'=>"πHashir surasi"],['text'=>"πMumtahina surasi"]],
[['text'=>"πSoff surasi"],['text'=>"πJuma surasi"]],
[['text'=>"πMunofiqun surasi"],['text'=>"πTaghabun surasi"]],
[['text'=>"πTaloq surasi"],['text'=>"πTahrim surasi"]],
[['text'=>"πMulk surasi"],['text'=>"πQalam surasi"]],
[['text'=>"πHaqqa surasi"],['text'=>"πMuorij surasi"]],
[['text'=>"πNuh surasi"],['text'=>"πjinn surasi"]],
[['text'=>"πMuzzammil surasi"],['text'=>"πMuddathir surasi"]],
[['text'=>"πQiyama surasi"],['text'=>"πInsan surasi"]],
[['text'=>"πMursalat surasi"],['text'=>"πNaba surasi"]],
[['text'=>"πNaziat surasi"],['text'=>"πAbasa surasi"]],
[['text'=>"πTakawir surasi"],['text'=>"πInfitar surasi"]],
[['text'=>"πMutaffifeen surasi"],['text'=>"πInshiqaq surasi"]],
[['text'=>"πBurooj surasi"],['text'=>"πTariq surasi"]],
[['text'=>"πAla surasi"],['text'=>"πGhashiya surasi"]],
[['text'=>"πFajir surasi"],['text'=>"πBalad surasi"]],
[['text'=>"πShams surasi"],['text'=>"πLail surasi"]],
[['text'=>"πDhuha surasi"],['text'=>"πSharh surasi"]],
[['text'=>"πTeen surasi"],['text'=>"πfalaq surasi"]],
[['text'=>"πQadr surasi"],['text'=>"πBayyina surasi"]],
[['text'=>"πZilzila surasi"],['text'=>"πAdiyat surasi"]],
[['text'=>"πQaria surasi"],['text'=>"πTakathur surasi"]],
[['text'=>"πAsr surasi"],['text'=>"πHamza surasi"]],
[['text'=>"πFil surasi"],['text'=>"πQuraysh surasi"]],
[['text'=>"πMoun surasi"],['text'=>"πKavsar surasi"]],
[['text'=>"πKofirun surasi"],['text'=>"πNosr surasi"]],
[['text'=>"πMasad surasi"],['text'=>"πIxlos surasi"]],
[['text'=>"πFalaq surasi"],['text'=>"πAl_nas surasi"]],
[['text'=>"πΈRoza duosi"],['text'=>"πQur'on"]],
[['text'=>"β¨Malumot"]],
[['text'=>"π Main menu"]],
]
])
]);
}
# DEV: [**ADMINUSER**]#
# Ch: @Qitmirvoy#


if($text == "β¨Malumot"){
bot('sendphoto',[
'photo'=>"https://t.me/hacker_progi/141",
'chat_id'=>$chat_id,
'caption'=>"πSalom {$name }
Ushbu Bot Barcha Botlar ichida eng Yaxshidir :  
β­οΈβ­οΈβ­οΈβ­οΈβ­οΈβ­οΈβ­οΈβ­οΈβ­οΈβ­οΈ
π€² Yaxshilikka Xizmat Qilsin
πͺ Hamkorimiz [*BOTNAME*]
π³ββοΈ Admin: [ADMINUSER]
π€²π€²π€²π€²π€²π€²π€²π€²π€²π€²",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'keyboard'=>[
    [['text'=>'πΈOyatlarπΈ'],['text'=>'β¨Malumot']],[['text'=>'π€Buyuruqlar'],['text'=>'πΈRoza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @@Qitmirvoy#


if($text == "π€Buyuruqlar"){
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
    [['text'=>'πΈOyatlarπΈ'],['text'=>'β¨Malumot']],[['text'=>'π€Buyuruqlar'],['text'=>'πΈRoza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @Qitmirvoy#

if($text == "πΈRoza duosi"){
bot('sendphoto',[
'photo'=>"https://t.me/hacker_progi/141",
'chat_id'=>$chat_id,
'caption'=>"ββββββββββββββββββββββββ
Π ΡΠ·Π°Π΄Π° ΠΎΠ³ΠΈΠ· ΠΎΡΠΈΡ Π²Π° ΠΉΠΎΠΏΠΈΡ Π΄ΡΠΎΠ»Π°ΡΠΈ

Π ΡΠ·Π° ΡΡΡΠΈΡ (ΠΎΠ³ΠΈΠ· Π΅ΠΏΠΈΡ)
Π΄ΡΠΎΡΠΈ. ΠΠ°Π²Π°ΠΉΡΡ Π°Π½ Π°ΡΡΠΌΠ°
ΡΠΎΠ²ΠΌΠ° ΡΠ°ΡΡΠΈ ΡΠΎΠΌΠ°Π·ΠΎΠ½Π°
ΠΌΠΈΠ½Π½Π°Π» ΡΠ°ΠΆΡΠΈ ΠΈΠ»Π»Π°Π»
ΠΌΠ°Π³ΡΠΈΠ±ΠΈ ΡΠΎΠ»ΠΈΡΠ°Π»
Π»ΠΈΠ»Π»ΠΎΡΡ ΡΠ°ΠΎΠ»Π»ΠΎ ΠΠ»Π»ΠΎΡΡ Π°ΠΊΠ±Π°Ρ. ΠΠΌΠΈΠ½.
Π Π£ΠΠ (ΠΎΠ³ΠΈΠ· ΠΎΡΠΈΡ) Π΄ΡΠΎΡΠΈ.
ΠΠ»Π»ΠΎΡΡΠΌΠ° Π»Π°ΠΊΠ° ΡΡΠΌΡΡ Π²Π°
Π±ΠΈΠΊΠ° Π°ΠΌΠ°Π½ΡΡ Π²Π°Π»Π°ΠΉΠΊΠ°
ΡΠ°Π²Π°ΠΊΠ°Π»ΡΡ Π²Π° Π°Π»Π»Π°
ΡΠΈΠ·ΠΈΠΊΠ° ΠΈΡΡΠΎΡΡ ΡΠ°Π³ΡΠΈΡΠ»ΠΈ Π»Π° Π³Π°ΡΡΡΡ ΠΌΠ°
ΠΊΠ°Π΄Π°ΠΌΡΡ Π²Π° ΠΌΠΎ Π°ΡΠ°ΡΡΡ.
ΠΠ»ΠΎΡΠΈΠΌ ΠΠ»Π»ΠΎΡΠΈΠΌ ΠΊΠ°Π±ΡΠ»
Π°ΠΉΠ»Π°ΡΠΈΠ½ ΡΡΠ·Π°Π½Π³ΠΈΠ·Π½ΠΈ.
ΠΠΌΠΈΠ½
ββββββββββββββββββββββββ",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'keyboard'=>[
    [['text'=>'πΈOyatlarπΈ'],['text'=>'β¨Malumot']],[['text'=>'π€Buyuruqlar'],['text'=>'πΈRoza duosi']],
   ],'resize_keyboard'=>true
  ])
 ]);
}
# DEV: [**ADMINUSER**]#
# Ch: @@Qitmirvoy#

if($text == "1" or $text == "πFotiha surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/3",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "2" or $text == "πBaqara surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/4",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "3" or $text == "πImron surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/5",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "4" or $text == "πNiso surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/6",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "5" or $text == "πMaida surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/7",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "6" or $text == "πAnam surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/8",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "7" or $text == "πArof surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/9",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "8" or $text == "πAnfol surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/10",
 reply_to_message_id =>$message->message_id, 
]);
} 
if($text == "9" or $text == "πTavba surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/11",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "10" or $text == "πYunus surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/12",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "11" or $text == "πHud surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/13",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "12" or $text == "πYusuf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/14",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "13" or $text == "πRad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/15",
 reply_to_message_id =>$message->message_id, 
]);
}


if($text == "14" or $text == "πIbrohim surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/16",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "15" or $text == "πHijr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/17",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "16" or $text == "πNahl surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/18",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "17" or $text == "πIsro surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/19",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "18" or $text == "πKahf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/20",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "19" or $text == "πMaryam surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/21",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "20" or $text == "πToha surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/22",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "21" or $text == "πAnbiyo suarsi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/23",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "22" or $text == "πHaj surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/24",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "23" or $text == "πMuminun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/25",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "24" or $text == "πNur surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/26",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "25" or $text == "πFurqon surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/27",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "26" or $text == "πShuaro surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/28",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "27" or $text == "πNaml surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/29",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "28" or $text == "πQasos surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/30",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "29" or $text == "πAnkabut surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/31",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "30" or $text == "πRum Surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/32",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "31" or $text == "πLuqmon surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/33",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "32" or $text == "πSajda surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/34",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "33" or $text == "πAhzob surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/35",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "34" or $text == "πSaba surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/36",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "35" or $text == "πFotir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/37",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "36" or $text == "πYosin surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/38",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "37" or $text == "πSoffat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/39",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "38" or $text == "πSod surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/40",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "39" or $text == "πZumar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/41",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "40" or $text == "πGofir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/42",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "41" or $text == "πFussilat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/43",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "42" or $text == "πShoro surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/44",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "43" or $text == "πZuxruf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/45",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "44" or $text == "πZuhan surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/46",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "45" or $text == "πJathiya surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/47",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "46" or $text == "πAhqaf surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/48",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "47" or $text == "πMuhammad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/49",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "48" or $text == "πFath surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/50",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "49" or $text == "πHujurat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/51",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "50" or $text == "πQof surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/52",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "51" or $text == "πZuriyat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/53",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "52" or $text == "πTur surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/54",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "53" or $text == "πNajim surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/55",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "54" or $text == "πQamar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/56",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "55" or $text == "πRohman surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/57",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "56" or $text == "πVoqiya surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/58",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "57" or $text == "πHadid surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/59",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "58" or $text == "πMujadila surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/60",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "59" or $text == "πHashir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/61",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "60" or $text == "πMumtahina surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/62",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "61" or $text == "πSoff surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/63",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "62" or $text == "πJuma surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/64",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "63" or $text == "πMunofiqun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/65",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "64" or $text == "πTaghabun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/66",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "65" or $text == "πTaloq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/67",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "66" or $text == "πTahrim surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/68",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "67" or $text == "πMulk surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/69",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "68" or $text == "πQalam surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/70",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "69" or $text == "πHaqqa surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/71",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "70" or $text == "πMuorij surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/72",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "71" or $text == "πNuh surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/73",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "72" or $text == "πjinn surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/74",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "73" or $text == "πMuzzammil surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/75",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "74" or $text == "πMuddathir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/76",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "75" or $text == "πQiyama surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/77",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "76" or $text == "πInsan surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/78",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "77" or $text == "πMursalat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/79",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "78" or $text == "πNaba surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/80",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "79" or $text == "πNaziat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/81",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "80" or $text == "πAbasa surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/82",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "81" or $text == "πTakawir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/83",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "82" or $text == "πInfitar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/84",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "83" or $text == "πMutaffifeen surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/85",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "84" or $text == "πInshiqaq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/86",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "85" or $text == "πBurooj surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/87",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "86" or $text == "πTariq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/88",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "87" or $text == "πAla surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/89",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "88" or $text == "πGhashiya surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/90",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "89" or $text == "πFajir surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/91",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "90" or $text == "πBalad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/92",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "91" or $text == "πShams surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/93",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "92" or $text == "πLail surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/94",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "93" or $text == "πDhuha surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/95",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "94" or $text == "πSharh surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/96",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "95" or $text == "πTeen surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/97",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "96" or $text == "πfalaq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/98",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "97" or $text == "πQadr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/99",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "98" or $text == "πBayyina surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/100",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "99" or $text == "πZilzila surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/101",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "100" or $text == "πAdiyat surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/102",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "101" or $text == "πQaria surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/103",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "102" or $text == "πTakathur surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/104",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "103" or $text == "πAsr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/105",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "104" or $text == "πHamza surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/106",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "105" or $text == "πFil surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/107",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "106" or $text == "πQuraysh surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/108",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "107" or $text == "πMoun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/109",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "108" or $text == "πKavsar surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/110",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "109" or $text == "πKofirun surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/111",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "110" or $text == "πNosr surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/112",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "111" or $text == "πMasad surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/113",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "112" or $text == "πIxlos surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/114",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "113" or $text == "πFalaq surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/115",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "114" or $text == "πAl_nas surasi"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/quran_u/116",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "115" or $text == "πQur'on"){
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
'text'=>"πΈπΈQuron haqidaπΈπΈ
ββββββββββββ
QurΚΌonΒ (arab.Β Ψ§ΩΩΨ±Ψ’ΩΒ oΚ»qimoq, qiroat qilmoq)Β βΒ musulmonlarningΒ asosiyΒ muqaddas kitobi.Β IslomΒ eΚΌtiqodiga koΚ»ra,
QurΚΌonΒ vahiyΒ orqaliΒ Muhammad paygΚ»ambargaΒ 610β632 yillar davomida nozil qilinganΒ AllohningΒ kalomi (Kalomulloh). QurΚΌon βKitobβ (yozuv), 
βFurqonβ (haq bilan botilning orasini ayiruvchi), 
βZikrβ (eslatma), βTanzilβ (nozil qilingan) kabi nomlar bilan atalib, βNurβ (yorugΚ»lik), 
βHudoβ (hidoyat), βMuborakβ (barakotli),
 βMubinβ (ochiq-ravshan), βBushroβ (xushxabar), 
βAzizβ (eΚΌzozlanuvchi), βMajidβ (ulugΚ»), 
βBashirβ (bashorat beruvchi), 
βNazirβ (ogohlantiruvchi) kabi soΚ»zlar bilan sifatlangan. 
Islom olamida QurΚΌon musΚΌhaf nomi bilan ham mashhur. 
Islom ulamolari QurΚΌonning 30 xil nom va sifatlarini sanab oΚ»tganlar.
ββββββββββββ
Quroning tuzulishi
ββββββββββββ
QurΚΌonning boΚ»limlariΒ suraΒ deyiladi,
uni shartli ravishda bob bilan taqqoslash mumkin.
Har suraΒ oyatlargaΒ boΚ»lingan. 
QurΚΌon 114 sura, 6236 oyatdan iborat.
Har bir suraning oΚ»z nomi bor. Oyatlar esa tartib raqami bilan berilgan. 
Suralarning nomlari uning boshida kelgan soΚ»zdan olingan yoki zikri koΚ»proq kelgan narsalar,
voqealar yohud asosiy qahramon nomi bilan atalgan. 
Keyinchalik oΚ»qish va yodlash oson boΚ»lishi uchun Iroq hokimi Hajjoj ibn Yusuf (hukmronlik yillari 694β714) koΚ»rsatmasiga binoan QurΚΌon 30 qism (arab.juz,Β fors.Β pora)ga boΚ»lingan.
QurΚΌonda birinchi kelganΒ βFotihaβΒ surasidan keyingi suralar katta, 
oΚ»rtacha va kichik suralar tartibida joylashgan. 2-Baqara surasiΒ 286 oyatdan, eng qisqaΒ Kavsar surasiΒ 3 oyatdan iborat. 
Eng qisqa oyatlar βTohoβ va βYosinβ, eng uzun oyat βBaqaraβ surasining 282-oyatidir. Suralar nozil boΚ»lish vaqti va joyiga koΚ»ra 2 ga: hijradan oldin nozil boΚ»lgan suralarΒ β
βMakka suralariβ (610β622 yillar, 90 sura) va hijradan keyin nozil boΚ»lgan suralarΒ β βMadina suralariβ (622-yildan, 24 sura) ga ajratiladi.
QurΚΌon matnining koΚ»p qismi Alloh bilan soΚ»zlashish, islom dushmanlari yoki undan ikkilanuvchilar bilan munozara qilish shaklida berilgan.
ββββββββββββ
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
      $tx = "<b>π‘ Bot Foydalanuvchilari
π₯ Super Group: $gr
π€ Userlar: $us
π¨βπ©βπ§βπ¦ Jami: $all
π¨βπ»</b> [*BOTNAME*]";
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'parse_mode'=>'html',
   'text'=>$tx,
  ]);
}