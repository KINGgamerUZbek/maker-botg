<?php
ob_start();
define('API_KEY',"API_TOKEN");
$admin = 'ADMIN_ID';
$key=""; //api key partner.soc-proof.su saytidan olamz
$qiwi = file_get_contents("stat/channel_4.txt");
$cilick = file_get_contents("stat/channel_5.txt");
$minimal = file_get_contents("stat/channel_6.txt");
$maksimal = file_get_contents("stat/channel_7.txt");
$obuna = file_get_contents("stat/channel_8.txt");
$minima = file_get_contents("stat/channel_9.txt");
$maksima = file_get_contents("stat/channel_10.txt");
$obun = file_get_contents("stat/channel_11.txt");
$referalim = file_get_contents("stat/channel_12.txt");
$kanalim = 'obunachi_1';
$adminuser = 'ADMIN_USER';
$rek = "@VipBuilder_UzBot siz ham o'z avto nakrutka botingizni quring";
$botname = bot('getme',['bot'])->result->username;
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/$method";
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
$mid = $message->message_id;
$data = $update->callback_query->data;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$message = $update->message;
$cid = $message->chat->id;
$cidtyp = $message->chat->type;
$miid = $message->message_id;
$name = $message->chat->first_name;
$user1 = $message->from->username;
$tx = $message->text;
$callback = $update->callback_query;
$mmid = $callback->inline_message_id;
$mes = $callback->message;
$mid = $mes->message_id;
$cmtx = $mes->text;
$mmid = $callback->inline_message_id;
$idd = $callback->message->chat->id;
$cbid = $callback->from->id;
$cbuser = $callback->from->username;
$data = $callback->data;
$ida = $callback->id;
$cqid = $update->callback_query->id;
$cbins = $callback->chat_instance;
$cbchtyp = $callback->message->chat->type;
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$msgs = json_decode(file_get_contents('msgs.json'),true);
$data = $update->callback_query->data;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$gname = $message->chat->title;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$name = $message->from->first_name;
$bio = $messenge->from->about;
$repid = $message->reply_to_message->from->id;
$repname = $message->reply_to_message->from->first_name;
$newid = $message->new_chat_member->id;
$leftid = $message->left_chat_member->id;
$newname = $message->new_chat_member->first_name;
$leftname = $message->left_chat_member->first_name;
$username = $message->from->username;
$callmid = $update->callback_query->message->message_id;
$cusername = $message->chat->username;
$repmid = $message->reply_to_message->message_id; 
$callcid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$tx = $message->text;
$text= $message->text;
$name = $message->from->first_name;
$user = $message->from->username;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$edname = $editm ->from->first_name;
$message = $update->message;
$mesid = $message->message_id;
$mid = $message->message_id;
$chat_id = $message->chat->id;
if(file_get_contents("pul/$cid.pul")){
}else{file_put_contents("pul/$cid.pul","0");
}
if(file_get_contents("pul/$cid.ref")){
}else{file_put_contents("pul/$cid.ref","0");
}
$cid = $message->chat->id;
$chat_id = $message->chat->id;
$text1 = $message->text;
$name = $message->from->first_name;
$username = $message->from->username;
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id; 
$cqid = $update->callback_query->id;
$clcid = $update->callback_query->message->chat->id;
$ch_user2 = $update->callback_query->message->chat->username;
$msgid = $update->callback_query->message->message_id;
$fadmin2 = $update->callback_query->from->id;
$fadmin = $message->from->id;
$cty = $message->chat->type;
$step = file_get_contents("step/$cid.step");
$mid = $message->message_id;
$tx = $message->text;
$id1 = $message->reply_to_message->from->id;   
$repmid = $message->reply_to_message->message_id; 
$repname = $message->reply_to_message->from->first_name;
$repuser = $message->reply_to_message->from->username;
$reply = $message->reply_to_message;
$sreply = $message->reply_to_message->text;
$name2 = $update->callback_query->from->first_name;
$username2 = $update->callback_query->from->username;
$about2 = $update->callback_query->from->about;
$lname2 = $update->callback_query->from->last_name;




$data = $update->callback_query->data;
$qid = $update->callback_query->id;
$callcid = $update->callback_query->message->chat->id;
$calltext = $update->callback_query->message->text;
$clid = $update->callback_query->from->id;
$callmid = $update->callback_query->message->message_id;
$gid = $update->callback_query->message->chat->id;
$cqid = $update->callback_query->id;
$chpost = $update->channel_post;
$chuser = $chpost->chat->username;
$chpmesid = $chpost->message_id;
$chcaption = $chpost->caption;
$orqa = '⬅️ Orqaga';
$orqam = '⬅️ Ortga qaytish';
$step = file_get_contents("step/$cid.step");
$userlar = file_get_contents("stat/users.txt");
mkdir("bot");
mkdir("step");
mkdir("stat");
mkdir("pul") ;



$menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"➕ Buyurtma berish"]], 
 [['text'=>"💰 Pul ishlash"],['text'=>"💳 Hisobim"]],
[['text'=>"📊 Buyurtmani kuzatish"]],
[['text'=>"📨 Yordam"],['text'=>"📚 Bot haqida"]],
]
]);
$orqa="◀️Orqaga";

$back = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"◀️Orqaga"]]
]
]);
if($text=="◀️Orqaga"){
  unlink("step/$chat_id.txt");
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"*Asosiy menyuga qaytdingiz.*",
    'parse_mode'=>'markdown',
    'reply_markup'=>$menu,
    ]);
}

$haqida = json_encode([
'inline_keyboard'=>[
[['text'=>"📊 Statistika",'callback_data'=>"stat"]],
[['text'=>"📚 Qo'llanma",'callback_data'=>"qol"]],
[['text'=>"📝 Qoida",'callback_data'=>"qoid"]],
]
]);


$pay = json_encode([
'inline_keyboard'=>[
[['text'=>"💳 Sotib olish",'callback_data'=>"buy"],['text'=>"🗣 Taklifnoma",'callback_data'=>"ref"]],
]
]);
$chanel_3 = file_get_contents("stat/chanel_3.txt");

if($text=="$orqa"){
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$dl,
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"$orqa qaytdik $dl",
'reply_markup'=>$menu,
])->result->message_id;
}


if(mb_stripos($text,"/start $cid")!==false){
mkdir("pul");
mkdir("ref");
bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Siz botga o'zingizni taklif qila olmaysiz!",
      'parse_mode'=>'html',
      'reply_markup'=>$menu,
      ]);
}else{
$idref = "pul/$ex.db";
$idref2 = file_get_contents($idref);
$id = "$cid\n";
$handle = fopen($idref, 'a+');
fwrite($handle, $id);
fclose($handle);
if(mb_stripos($idref2,$cid) !== false ){
}else{
$pub=explode(" ",$text);
$ex=$pub[1];
file_put_contents("ref/$cid.txt", "$ex");
$pul = file_get_contents("pul/$ex.pul");
$a=$pul+0;
file_put_contents("pul/$ex.pul","$a");
$odam = file_get_contents("pul/$ex.ref");
$b=$odam+1;
file_put_contents("pul/$ex.ref","$b");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Salom qaytadan /start bosing
<a href='tg://user?id=$ex'>$ex</a> referalingizga so'mberish uchun kanalimizga obuna boling</b>",
'parse_mode'=>'html',
]);
}
}
mkdir("pul");
mkdir("step");
mkdir("nakrutka");
mkdir("kanal");
$ssilka=file_get_contents("nakrutka/$chat_id.txt");
$step=file_get_contents("step/$chat_id.txt");
$pul = file_get_contents("pul/$chat_id.txt");
$nakrutka=json_encode([
  'inline_keyboard'=>[
[['text'=>" 🔵 Telegram",'callback_data'=>"nakrutka=Telegram"],['text'=>" ♥‍️ Instagram",'callback_data'=>"nakrutka=Instagram"]],
[['text'=>" ⚫ TikTok",'callback_data'=>"nakrutka=TikTok"],['text'=>" 🔴 YouTube",'callback_data'=>"nakrutka=YouTube"]],
[['text'=>" 🏳️‍🌈 Likee",'callback_data'=>"nakrutka=Likee"],['text'=>" 🔷 Facebook",'callback_data'=>"nakrutka=Facebook"]],
[['text'=>" 💠 Vkontakte",'callback_data'=>"nakrutka=VK"],['text'=>" ⭕ Yandex-Then",'callback_data'=>"nakrutka=YT"]],
[['text'=>" 🎵 Spotify",'callback_data'=>"nakrutka=SP"],['text'=>" 🔶 Odnoklassniki",'callback_data'=>"nakrutka=SH"]],
    ]
    ]);
$Telegram=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔰 Obunachi [Real members] 6000 so'm",'callback_data'=>"Telegram=Obuna=598=6000"]],
    [['text'=>"🚀Obunachi [Juda Tezkor] 5000 so'm",'callback_data'=>"Telegram=Obuna=700=5000"]],
        [['text'=>"🇺🇲🇮🇷Obunachi [o'rtacha] 4000 so'm",'callback_data'=>"Telegram=Obuna=695=4000"]],
                [['text'=>"🚀Obunachi [Tezkor] 6000 so'm",'callback_data'=>"Telegram=Obuna=599=6000"]],
[['text'=>"🇮🇷 Obunachi [Eron members] 3500 so'm",'callback_data'=>"Telegram=Obuna=694=3500"]],
[['text'=>"🇺🇲Obunachi [Tezkor] 4000 so'm",'callback_data'=>"Telegram=Obuna=785=4000"]],
[['text'=>"🗂Obunachi [Kafolatlangan] 47000 so'm",'callback_data'=>"Telegram=Obuna=705=47000"]],
[['text'=>"🇮🇷 Obunachi [Eron,Tezkor] 13000 so'm",'callback_data'=>"Telegram=Obuna=888=13000"]],
[['text'=>"❄Obunachi [Jonli obunachi] 14000 so'm",'callback_data'=>"Telegram=Obuna=709=14000"]],
[['text'=>"🚀Obunachi [Tezkor obunachi] 11000 so'm",'callback_data'=>"Telegram=Obuna=500=11000"]],
[['text'=>"✅Obunachi [Chiqishlarsiz] 12000 so'm",'callback_data'=>"Telegram=Obuna=540=12000"]],
 [['text'=>"👤 Arzon Obunachi [Real members] 6000 so'm",'callback_data'=>"Telegram=Obuna=695=3500"]],
[['text'=>"👍👎🔥Aralash reaksiyalar [Tezkor] 10000 so'm",'callback_data'=>"Telegram=REK=905=10000"]],
[['text'=>"👍❤🔥Ijobiy reaksiyalar [Tezkor] 8000 so'm",'callback_data'=>"Telegram=REK=881=8000"]],
[['text'=>"😢👎💩Salbiy reaksiyalar [avto] 9000 so'm",'callback_data'=>"Telegram=REK=882=9000"]],
[['text'=>"👍Reaksiyalar [avto] 5000 so'm",'callback_data'=>"Telegram=REK=868=5000"]],
[['text'=>"👎Reaksiyalar [avto] 5000 so'm",'callback_data'=>"Telegram=REK=869=5000"]],
[['text'=>"👍❤🔥Ijobiy reaksiyalar [Avto,Eng oxirgi 30ta post uchun] 180000 so'm",'callback_data'=>"Telegram=REK=884=180000"]],
[['text'=>"😢👎💩Salbiy reaksiyalar [avto,Eng oxirgi 30ta post uchun] 170000 so'm",'callback_data'=>"Telegram=REK=905=10000"]],
[['text'=>" 👁Ko'rishlar [20ta post uchun,AvtoProsmotr] 10000 so'm",'callback_data'=>"Telegram=PM=681=10000"]],
[['text'=>" 👁Ko'rishlar [10ta post uchun,AvtoProsmotr] 5000 so'm",'callback_data'=>"Telegram=PM=680=5000"]],
[['text'=>"🇺🇿 O'zbek Ko'rishlar [Kafolatlangan] 1000 so'm",'callback_data'=>"Telegram=PM=728=1000"]],
[['text'=>"👁Ko‘rish [Arzon] 220 so'm",'callback_data'=>"Telegram=PM=498=220"]],
[['text'=>"👁Ko‘rish [Tez] 350 so'm",'callback_data'=>"Telegram=PM=272=350"]],
  [['text'=>"👁Ko‘rish [Oxirgi 5 post uchun] 1000",'callback_data'=>"Telegram=PM=62=1000"]],
  [['text'=>"👁Ko‘rish [Cheksiz] 500 so'm",'callback_data'=>"Telegram=PM=602=500"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$TikTok=json_encode([
  'inline_keyboard'=>[
  [['text'=>"⚫ Obunachi [Arzon] 4000 so'm",'callback_data'=>"TikTok=Obuna=247=4000"]],
    [['text'=>"⚫ Obunachi [O'rtacha]  17000 so'm",'callback_data'=>"TikTok=Obuna=388=17000"]],
      [['text'=>"⚫ Obunachi [Chiqmaydigan] 22000 so'm",'callback_data'=>"TikTok=Obuna=356=22000"]],
        [['text'=>"❤Like [Tezkor] 7000 so'm",'callback_data'=>"TikTok=Like=430=7000"]],
          [['text'=>"❤Like [O'rtacha] 25000 so'm",'callback_data'=>"TikTok=Like=539=25000"]],
  [['text'=>"👁Ko‘rish [Real] 2400 so'm",'callback_data'=>"TikTok=PM=382=2400"]],
    [['text'=>"👁Ko‘rish [Arzon] 500 so'm",'callback_data'=>"TikTok=PM=55=500"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$Instagram=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔒 Obunachi [O'rtacha] 4500 so'm",'callback_data'=>"Instagram=Obuna=864=4500"]],
  [['text'=>"✅ Obunachi [Kafolatlangan] 7000 so'm",'callback_data'=>"Instagram=Obuna=502=7000"]],
[['text'=>"👤 Obunachi [Kafolatlanmagan] 2500 so'm",'callback_data'=>"Instagram=PM=155=2500"]],
[['text'=>"🔒 Obunachi [Mix obunachilar,Tezkor] 9000 so'm",'callback_data'=>"Instagram=Obuna=419=9000"]],
[['text'=>"👤Obunachi  [Russia,Gold,Real Members] 26000 so'm",'callback_data'=>"Instagram=Obuna=218=26000"]],
[['text'=>"❤ Like [Arzon] 1000 so'm",'callback_data'=>"Instagram=Like=14=1000"]],
[['text'=>"❤ Like [O'rtacha] 3000 so'm",'callback_data'=>"Instagram=Like=132=3000"]],
  [['text'=>"👁 Ko'rish [post] 400 so'm",'callback_data'=>"Instagram=PM=421=400"]],
    [['text'=>"👁 Ko'rish [Avto Prosmotr] 1300 so'm",'callback_data'=>"Instagram=PM=85=1300"]],
        [['text'=>"👁 Ko'rish [Gold] 700 so'm",'callback_data'=>"Instagram=PM=495=700"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$YouTube=json_encode([
  'inline_keyboard'=>[
  [['text'=>"❤️ Obunachi [Kafolatlanmagan] 20000 so'm",'callback_data'=>"YouTube=Obuna=5=20000"]],
[['text'=>" 🚀Obunachi [Kafolatlangan] 80000
so'm",'callback_data'=>"YouTube=Obuna=249=80000"]],
  [['text'=>"👁 Ko'rish [video] 6000 so'm",'callback_data'=>"YouTube=PM=514=6000"]],
    [['text'=>"👁 Ko'rish [video] 9000 so'm",'callback_data'=>"YouTube=PM=39=9000"]],
        [['text'=>"❤Like [video] 8000 so'm",'callback_data'=>"YouTube=Like=125=8000"]],
                [['text'=>"❤Like [Gold] 13000 so'm",'callback_data'=>"YouTube=Like=587=13000"]],
                                [['text'=>"👎DizLike [Gold] 40000 so'm",'callback_data'=>"YouTube=Like=47=40000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$Likee=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔥Obunachi [Russia,Kafolatlangan] 55000 so'm",'callback_data'=>"Likee=Obuna=285=55000"]],
    [['text'=>"👁 Ko'rish [video] 16000 so'm",'callback_data'=>"Likee=PM=287=16000"]],
            [['text'=>"❤Like [video] 20000 so'm",'callback_data'=>"Likee=Like=286=20000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$Facebook=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🚀Obunachi [O'rtacha] 15000 so'm",'callback_data'=>"Facebook=Obuna=428=15000"]],
    [['text'=>"🚀Obunachi [Arzon] 10000 so'm",'callback_data'=>"Facebook=Obuna=899=10000"]],
      [['text'=>"🚀Gruppa Obunachilari [O'rtacha] 15000 so'm",'callback_data'=>"Facebook=Obuna=78=15000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$VK=json_encode([
  'inline_keyboard'=>[
    [['text'=>"🚀VK obunachi [O'rtacha] 12000 so'm",'callback_data'=>"VK=Obuna=34=12000"]],
    [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$YT=json_encode([
  'inline_keyboard'=>[
    [['text'=>"🗂Obunachi [Jivoy] 80000 so'm",'callback_data'=>"YT=Obuna=152=80000"]],
    [['text'=>"❤Like [Jivoy] 70000 so'm",'callback_data'=>"YT=Like=491=70000"]],
    [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$SP=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔥Obunachi [Kafolatlangan] 6000 so'm",'callback_data'=>"SP=Obuna=359=6000"]],
    [['text'=>"🗂Obunachi[Pleylist] 10000 so'm",'callback_data'=>"SP=Obuna=354=10000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
  $SH=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔥Obunachi [Russia,Real] 17000 so'm",'callback_data'=>"SH=Obuna=294=17000"]],
    [['text'=>"👁 Ko'rish [video] 6000 so'm",'callback_data'=>"SH=PM=276=6000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
if(mb_stripos($data,"nakrutka")!==false){
  bot('DeleteMessage',[
    'chat_id'=>$callcid,
    'message_id'=>$update->callback_query->message->message_id,
    ]);
    $ex=explode("=",$data)[1];
   if($ex=="Telegram"){
   $key=$Telegram;
}
   if($ex=="TikTok"){
   $key=$TikTok;
}
   if($ex=="Instagram"){
   $key=$Instagram;
}
   if($ex=="YouTube"){
   $key=$YouTube;
}
   if($ex=="Likee"){
   $key=$Likee;
}
   if($ex=="Facebook"){
   $key=$Facebook;
}
   if($ex=="VK"){
   $key=$VK;
}
   if($ex=="YT"){
   $key=$YT;
}
if($ex=="SP"){
   $key=$SP;
}
if($ex=="SH"){
   $key=$SH;
}
  bot('sendmessage',[
    'chat_id'=>$callcid,
    'text'=>"$ex nakrutka uchun kerakli turini tanlang \n💰Narxlar 1000ta Buyurtma Hisobida Ko'rsatilayapti.",
    'parse_mode'=>'markdown',
    'reply_markup'=>$key,
    ]);
}
 

if(mb_stripos($data,"=Like")!==false or mb_stripos($data,"=PM")!==false or mb_stripos($data,
"=Obuna")!==false or mb_stripos($data,"=REK")!==false){
  bot('DeleteMessage',[
    'chat_id'=>$callcid,
    'message_id'=>$update->callback_query->message->message_id,
    ]);
  $tarmoq=explode("=",$data)[0];
   $tur=explode("=",$data)[1];
  $id=explode("=",$data)[2];
  $qb=explode("=",$data)[3];
file_put_contents("step/$callcid.txt","nak=$tarmoq=$tur=$id=$qb");
  bot('sendmessage',[
    'chat_id'=>$callcid,
    'text'=>"Kerakli miqdorni kirting",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[       
        [['text'=>"$orqa",'callback_data'=>"back"],],
        ]
      ])
    ]);
}
$minimalnar = file_get_contents("stat/minimal.txt");
if(mb_stripos($step,"nak=")!==false){
  if(is_numeric($text) and $text>0){
  $ex=explode("=",$step);
  $tarmoq=$ex[1];
   $tur=$ex[2];
if($tarmoq=="Telegram"){
$min=$minimalnar;
$max=15000;
}
if($tarmoq=="YouTube"){
$min=$minimalnar;
$max=25000;
}
if($tarmoq=="TikTok"){
$min=$minimalnar;
$max=50000;
}

if($tarmoq=="Instagram"){
$min=$minimalnar;
$max=15000;
}
if($tarmoq=="Likee"){
$min=$minimalnar;
$max=20000;
}
if($tarmoq=="Facebook"){
$min=$minimalnar;
$max=20000;
}
if($tarmoq=="VK"){
$min=$minimalnar;
$max=20000;
}
if($tarmoq=="YT"){
$min=$minimalnar;
$max=20000;
}
if($tarmoq=="SP"){
$min=$minimalnar;
$max=20000;
}
if($tarmoq=="SH"){
$min=$minimalnar;
$max=20000;
}
  $tur=$ex[2];
  $id=$ex[3];
  $qb=$ex[4];
  $son=$text;
if($text>=$min and $text<=$max){
  unlink("step/$chat_id.txt");
file_put_contents("step/$chat_id.txt","havola=$tarmoq=$id=$son=$tur=$qb");
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"$tarmoq havolangizni yuboring(https:// bo'lishi shart)",
    'reply_markup'=>$back,
    ]);
}else{
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"Minimal: $min Maximal: $max son oralig‘ida kiriting",
    'reply_markup'=>$back,
    ]);
}
}else{
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"Faqat raqamdan tashkil topgan bo‘lsin",
    'reply_markup'=>$back,
    ]);
}
}
if(mb_stripos($step,"havola")!==false and $text!=$orqa){
  if(mb_stripos($text,"https:")!==false){
    $ex=explode("=",$step);
    $tarmoq=$ex[1];
    $id=$ex[2];
    $son=$ex[3];
    $tur=$ex[4];
    $qb=$ex[5];
    if($tarmoq=="TikTok"){
      $rak=$son/1000*$qb;
    }elseif($tarmoq=="YouTube"){
      $rak=$son/1000*$qb;
    }elseif($tarmoq=="Telegram"){
      $rak=$son/1000*$qb;
    }elseif($tarmoq=="Instagram"){
      $rak=$son/1000*$qb;
    }elseif($tarmoq=="Likee"){
      $rak=$son/1000*$qb;
}elseif($tarmoq=="Facebook"){
      $rak=$son/1000*$qb;
      }elseif($tarmoq=="VK"){
      $rak=$son/1000*$qb;
    }elseif($tarmoq=="YT"){
      $rak=$son/1000*$qb;
          }elseif($tarmoq=="SP"){
      $rak=$son/1000*$qb;
          }elseif($tarmoq=="SH"){
      $rak=$son/1000*$qb;
    }
    if($pul>$rak){
    $info=str_replace("$tarmoq","🌐 $tarmoq tarmog'i uchun $son buyurtmaga $rak ₽ hisobingizdan yechiladi ",$tarmoq);
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"
<b>⭕️Buyurtma haqida
🌐Tarmoq: $tarmoq
🔤Miqdor: $son
🔢Havola: $text

<b>💢$info 💢</b>

$rek

❗Iltimos ko'rib chiqing hamma malumot to'g'ri bo'lsa ✅Tasdiqlang...!</b>",
      'parse_mode'=>"html",
          'disable_web_page_preview'=>true,
      'reply_markup'=>json_encode([
        'inline_keyboard'=>[          
          [['text'=>"✅Tasdiqlash",'callback_data'=>"tasdiq"],],
          [['text'=>"$orqa",'callback_data'=>"back"],],
          ]
        ])
      ]);
      unlink("step/$chat_id.txt");
file_put_contents("step/$chat_id.txt","uz=$tarmoq=$son=$rak=$id=$tur=$qb");
file_put_contents("nakrutka/$chat_id.txt","$text");
  }else{
    unlink("step/$chat_id.txt");
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"<b>💸Mablag' yetarli emas....!</b>",
           'parse_mode'=>"html",
      'reply_markup'=>$menu,
      ]);
  }
  }else{
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"<b>☹️Havola noto'g'ri.... To'g'rilab qayta yuboring!</b>",
      'parse_mode'=>"html",
      'reply_markup'=>$back,
      ]);
  }
}

if(mb_stripos($data,"tasdiq")!==false){
$step=file_get_contents("step/$callcid.txt");
 $ex=explode("=",$step);
 $tarmoq=$ex[1];
 $son=$ex[2];
 $rak=$ex[3];
 $id=$ex[4];
$url=file_get_contents("nakrutka/$callcid.txt");
$tur=$ex[5];
bot('DeleteMessage',[
    'chat_id'=>$callcid,
    'message_id'=>$update->callback_query->message->message_id,
    ]);
$urll=json_decode(file_get_contents("https://partner.soc-proof.su/api/v2?key=$chanel_3&action=add&link=$url&quantity=$son&service=$id"),true);
$order=$urll['order'];
$error=$urll['error'];
file_put_contents("nakrutka/$callcid.dat",file_get_contents('nakrutka/$callcid.dat')."\n".$order);
if(isset($error)){
if($error=="Quantity must be multiple of 1000"){
bot('sendMessage',[
   'chat_id'=>$callcid,
   'text'=>"<b>⛔️Xatolik...
Buyurtma uchun sonlarni quyidagicha kiriting!👇</b>
<code>
1000
2000</code>",
      'parse_mode'=>"html",
      'reply_markup'=>$menu,
   ]);
}else{
bot('sendMessage',[
   'chat_id'=>$callcid,
   'text'=>"<b>🚫Ushbu manzil uchun buyurtma berilgan boshqa havola manzili kiriting yoki kuting</b>",
      'parse_mode'=>"html",
      'reply_markup'=>$menu,
   ]);
}
}else{
$balans= file_get_contents("pul/$callcid.txt");
     $plus=$balans-$rak;
  $b = file_put_contents("pul/$callcid.txt","$plus");
 $info=str_replace("$tarmoq","🌐 $tarmoq tarmog'i uchun $son buyurtmaga $rak so'm hisobingizdan yechildi✅",$tarmoq);
 bot('sendMessage',[
   'chat_id'=>$callcid,
   'text'=>"
🔒<b>Buyurtma qabul qilindi!</b>
🆔<b>Buyurtma ID: $order</b>
✅<b>Holati: Bajarilmoqda...</b>
🌐<b>Tarmoq $tarmoq</b>
🔢<b>Buyurtma soni:</b> <b>$son</b>

<b>💢$info 💢</b>",
      'parse_mode'=>"html",
'disable_web_page_preview'=>true,
'reply_markup'=>$menu,
   ]);
unlink("step/$callcid.txt");
unlink("nakrutka/$callcid.txt");
}
}


if($data=="back"){
  bot('DeleteMessage',[
    'chat_id'=>$callcid,
    'message_id'=>$update->callback_query->message->message_id,
    ]);
  bot('sendmessage',[
    'chat_id'=>$callcid,
    'text'=>"✅ <b>Bizning xizmatlarimizni tanlaganingizdan xursandmiz</b>!
👇 <b>Quydagi Ijtimoiy tarmoqlardan birini tanlang</b>.",
'parse_mode'=>"HTML",
    'reply_markup'=>$nakrutka,
    ]);
}

if($tx == "🛠 Kanalni sozlash" and $cid == $admin){
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"<i>Majburiy a‘zolik kanallarini sozlash uchun pastagi tugmalar orqali kanalingizni ulang.

<b>Eslatma:</b> Majburiy a‘zolikga kiritilgan kanallaringizda ushbu botingiz admin bo‘lishi kerak aks holda bot ishlamaydi.</i>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"1⃣ - Kanal"],['text'=>"2⃣ - Kanal"]],
[['text'=>"$orqa"],['text'=>"$orqam"]],
    ]
    ])
    ]);
    }
     $step = file_get_contents("stat/$cid.step");
   if($tx=="1⃣ - Kanal" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>1-kanalni sozlash uchun kanalingiz usernamesini yuboring, <b>e‘tibor bering kanalingiz useriga @ belgisini</b> qo‘shmasdan yuboring.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","chanel_1");
} 

if($step=="chanel_1" and $cid==$admin){ 
file_put_contents("stat/chanel_1.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Sizning birinchi kanalingiz @$tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}
$step = file_get_contents("stat/$cid.step");
if($tx=="2⃣ - Kanal" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>2-kanalni sozlash uchun kanalingiz usernamesini yuboring, <b>e‘tibor bering kanalingiz useriga @ belgisini</b> qo‘shmasdan yuboring.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","chanel_2");
} 
 
if($step=="chanel_2" and $cid==$admin){ 
file_put_contents("stat/chanel_2.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Sizning ikkinchi kanalingiz @$tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}
  $step = file_get_contents("stat/$cid.step");


if($tx=="/start" and $type=="private"){
$userlar = file_get_contents("stat/users.txt");
if(mb_stripos($userlar,"$cid")!==false){
}else{
file_put_contents("stat/users.txt","\n".$cid,FILE_APPEND);
}

$chanel_1 = file_get_contents("stat/chanel_1.txt");
$ret = bot("getChatMember",[
         "chat_id"=>"@$chanel_1",
         "user_id"=>$cid,
         ]);
$chanel_2 = file_get_contents("stat/chanel_2.txt");
$ret1 = bot("getChatMember",[
         "chat_id"=>"@$chanel_2",
         "user_id"=>$cid,
         ]);
$stat = $ret->result->status;
$stat1 = $ret1->result->status;
 if(($stat=="creator" or $stat=="administrator" or $stat=="member") and ($stat1=="creator" or $stat1=="administrator" or $stat1=="member")){
bot("sendMessage",[
         "chat_id"=>$cid,
'text'=>"
✋ Assalomu alaykum, @$botname Official-botiga xush kelibsiz!
🚀 Biz sizga Telegram, Instagram xizmatlarini taklif etamiz!
🌟 Sizning sahifalaringizni obunachilari professional darajada ko'paytirish uchun @$botname Official siz bilan birga!
🔽 Davom etish uchun quyidagi tugmalardan birini tanlang:
$rek
👨‍💻Dasturchi:  <a href='tg://user?id=$admin'>ADMIN</a>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);  
$kele = file_get_contents("ref/$cid.txt");
bot('sendmessage',[
'chat_id'=>$kele,
'text'=>"Siz 1- ta referal chaqirdingiz va sizga $referalim so'm berildi",
]);
$refpuli = file_get_contents("pul/$kele.pul");
$referalim = $referalim / 1;
$ballplus = $refpuli + $referalim;
file_put_contents("pul/$kele.pul", "$ballplus");
unlink("ref/$cid.txt");
}
else{
     bot('sendmessage',[
'chat_id'=>$cid,
"text"=>"<b>Quyidagi kanalimizga obuna bo`lib qayta /start bosing⤵
1. @$chanel_1
2. @$chanel_2</b>

$rek",
"parse_mode"=>"html",
"reply_to_message_id"=>$message_id,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
'remove_keyboard'=>true,
]),
]);
return false;
}
}


$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🚀 Xabar Yuborish"],['text'=>"💸 Pul berish | Ayirish"],],
[['text'=>"🛠 Kanalni sozlash"],['text'=>"⚙ Tugmalarni sozlash"],],
[['text'=>"🛠 Asosiy sozlamalar"],['text'=>"Video qo'llanma"]],
[['text'=>"❤️Api Sozlash"],['text'=>"🪙API Balans"]],
[['text'=>"🔰 Minimal buyurtmani"]],
[['text'=>"/start"],],
]
]);

$xabar = json_encode([
  'resize_keyboard'=>true,
  'keyboard'=>[
    [['text'=>"📝Userga Xabar"],['text'=>"📋Userga Forward"]],
    [['text'=>"/panel"],],
    ]
  ]);

$boshqa = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
      [['text'=>"📱 Hisob sozlamalari"],],
      [['text'=>"/panel"]],
      ]
    ]);

    
      $tanla = json_encode([
      'resize_keyboard'=>true,
      'keyboard'=>[
        [["text"=>"🔗 Referal narxi"],],
        ]
        ]);
    $tugma = json_encode([
     'resize_keyboard'=>true,
     'keyboard'=>[
       [['text'=>"🛠 Qiwi nomer kiritish"],['text'=>"🛠 Click nomer kiritish"],],
       [['text'=>"/panel"],],
       ]
      ]);
    
 $pullar = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
      [['text'=>"➕Pul berish"],['text'=>"➖Pul ayirish"]],
      [['text'=>"/panel"]],
      ]
    ]);
    


if($text == "/panel" and $cid==$admin ){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Assalamu alaykum <a href='tg://user?id=$uid'>Admin</a></b>\n\n<i>Kerakli boʻlimni tanlang!!</i>",
	'parse_mode'=>"html",
	'reply_markup'=>$panel,
]);
}
if($text=="📚 Bot haqida"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>$text."<b>Malumot olish uchun quyidagi menyulardan birini tanlang-Bo'limi</b>",
      'parse_mode'=>"html",
'reply_markup'=>$haqida,
]);
}
if($data=="qoid"){
bot('editMessageText',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"<b>@$botname Qoidalari❗️
• Adminga yolgʻon xabar yubormang. Bu uchun botda ban olishingiz mumkin
• Yordam boʻlimidan foydalanayotganda adminga haqiratli soʻz yozmang. Bu uchun botda ban olishingiz mumkin.
• Buyurtma berilgan linkning buyurtmasi bajarilmasdan oʻsha link uchun yana buyurtma bermang. Bu holdagi xatolik uchun sizga pul qaytarilmaydi.
• Admindan tekinga yoki savob uchun hisobingizni toʻldirishni soʻramang.

$rek

Qoʻshimcha maʼlumotlar olish uchun @$adminuser bilan bogʻlaning.</b>  ",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎛Bot Yaratish",'url'=>"https://t.me/VipBuilder_UzBot"]],
]]),]);}
if($data=="qol"){
bot('editMessagetext',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"<b>@$botname dan foydalanish.
•Qanday buyurtma berish mumkin ?
Buyurtma berish boʻlimiga kiring. Oʻzingizga kerakli Ijtimoiy tarmoqni tanlang. Soʻng xizmatni tanlang. Kerakli obunachi miqdorini yozing va kerrakli linkni kiriting. 
•Hisobni qanday toʻldirish mumkin ?
Hisobim boʻlimiga kiring. U yerdan hisobni toʻldirish boʻlimini tanlang. Oʻzizga kerakli toʻlov usulini tanlang va bot bergan qoʻllanma boʻyicha ish tuting.

Sizda boshqacharoq savol va murojaatlar boʻlsa @$adminuser bilan bogʻlaning.</b> ",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎛Bot Yaratish",'url'=>"https://t.me/VipBuilder_UzBot"]],
]]),]);}
if($data=="stat"){
bot('editMessageText',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>" 📊 <b>Bot foydalanuvchilari soni</b>:".substr_count($userlar,"\n")." ta",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎛Bot Yaratish",'url'=>"https://t.me/VipBuilder_UzBot"]],
]]),]);}
if($text == "Video qo'llanma"){
  bot('sendVideo',[
    'chat_id'=>$cid,
    'video'=>"https://t.me/MASTER_PHP_1",
    'caption'=>"Bu video siz yaratgan avto nakrutka botni sozlash videosi albatta koring!
    
    Video mualifi: @SODIQOV_SHOXRUX
    Kanalimiz: @MASTER_PHP_1",
    'reply_markup'=>$panel,
    ]);
}
   if($tx=="❤️Api Sozlash" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Api kalitni  sozlash uchun yuboring, <b>uni ushbu saytdan olasiz https://partner.soc-proof.su</b> ‼️.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","chanel_3");
} 

if($step=="chanel_3" and $cid==$admin){ 
file_put_contents("stat/chanel_3.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Sizning api kalitingiz $tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}

if($text=="🪙API Balans" and $chat_id==$admin){
$api_balance = json_decode(file_get_contents("https://partner.soc-proof.su/api/v2?key=$chanel_3&action=balance"),true);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Sizning API Balansingizda
".$api_balance['balance']." Rubl",
'reply_markup'=>$panel,
]);
}
if($text == "🚀 Xabar Yuborish" and $cid==$admin ){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Qanday usulda xabar yubormoqchisiz</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$xabar,
]);
}
if($text == "⚙ Tugmalarni sozlash" and $cid==$admin ){
  bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"⚙ Qanday tugmani sozlamoqchisiz",
'reply_markup'=>$tugma,
    ]);
}

  $step = file_get_contents("stat/$cid.step");
if($tx=="🛠 Qiwi nomer kiritish" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Qiwi nomeringizni kiriting iltimos togri xatosiz kiriting.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","channel_4");
} 

if($step=="channel_4" and $cid==$admin){ 
file_put_contents("stat/channel_4.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Sizning Qiwi nomeringiz $tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}

  $step = file_get_contents("stat/$cid.step");
if($tx=="🛠 Click nomer kiritish" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Ozingizni Click (Uzcard, Humo) raqamingizni tog'ri xatosiz kiriting.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","channel_5");
} 

if($step=="channel_5" and $cid==$admin){ 
file_put_contents("stat/channel_5.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Sizning Click raqamingiz $tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}

if($text == "🛠 Asosiy sozlamalar" and $cid==$admin ){
  bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"⚙ Asosiy  sozlanmalar bo'limidasiz.",
'reply_markup'=>$boshqa,
    ]);
}
if($text == "📱 Hisob sozlamalari" and $cid==$admin ){
  bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"⚙ Hisob sozlamalar bo'limidasiz.",
'reply_markup'=>$tanla,
    ]);
}
$step = file_get_contents("stat/$cid.step");
if($tx=="🔗 Referal narxi" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Referal narxini kiriting.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","channel_12");
} 

if($step=="channel_12" and $cid==$admin){ 
file_put_contents("stat/channel_12.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Referal narxi $tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}
  /*@itmaktabi1*/
if($step=="channel_11" and $cid==$admin){ 
file_put_contents("stat/channel_11.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Obuna narxi $tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}

if($text == "💸 Pul berish | Ayirish" and $cid==$admin ){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>🛠 Pul bermochimisiz yoki ayirmoqchimiz tanlang!</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$pullar,
]);
}

  /*@itmaktabi1*/
if($tx=="🔰 Minimal buyurtmani" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<b>Minimal buyurtmani yuboring!</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","minmalna");
} 

if($step=="minmalna" and $cid==$admin){ 
file_put_contents("stat/minimal.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>$tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}

$step = file_get_contents("step/$cid.step");
if($text == "📝Userga Xabar" and $cid == $admin){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"<b>Userlarga yuboriladigan habarni kiriting!!</b>",
      'parse_mode'=>"html",
      'reply_markup'=>$panel,
      ]);
      file_put_contents("step/$cid.step","user");
    }

    if($step == "user" and $cid == $admin){
      if($text == "/cancel"){
      unlink("step/$chat_id.step");
      }else{ 
      $idszs=explode("\n",$lichka);
      foreach($idszs as $idlat){
     $userr = bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>"<b>$text</b>",
      'parse_mode'=>'html',
      'disable_web_page_preview' => true,
      ]);  unlink("step/$cid.step");
      }
        if($userr){
          bot('sendmessage',[
          'chat_id'=>$admin,
          'text'=>"Habar Barcha Userlarga yuborildi!",
          ]);      
      unlink("step/$cid.step");
        }
      }
    }
     

  /*@itmaktabi1*/
if($text == "📋Userga Forward" and $cid == $admin){
 bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"✅ *Userlarga forward qilinadigan xabarni kiriting!
Bakor qilish uchun /cancel ni bosing*",
'parse_mode'=>'markdown',
]);
file_put_contents("step/$cid.step","forward");
}

if($step == "forward" and $cid == $admin){
if($text == "/cancel"){
unlink("stat/$chat_id.step");
}else{ 
$ids=explode("\n",$lichka);
foreach($ids as $id){
$user = bot('forwardMessage', [
'chat_id'=>$id,
'from_chat_id'=>$admin,
'message_id'=>$mid,
]);unlink("step/$cid.step");
}

if($user){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"✅ Xabar yetkazildi!",
'parse_mode'=>"markdown",
]);     
unlink("step/$cid.step");
}
}
}
  /*@itmaktabi1*/
if($text=="💳 Hisobim"){
$dost = file_get_contents("pul/$cid.ref");
$soat=date('H:i:s',strtotime('2 hour'));
$sana=date("d-M-y",strtotime("2 hour"));
$hisob  = file_get_contents("pul/$cid.pul");
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
$dl = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
‍‍┌<b>Sizning hisobingiz haqida</b>:
├<b>Mijoz</b>: ".$message->from->first_name."
├<b>Xisob raqam</b> <code>$cid</code>
├<b>Botdagi vazifa</b>: <b>Foydalanuvchi</b>
├<b>Do'stlaringiz : $dost ta</b>
├<b>Asosiy xisob: $hisob So'm </b>

$rek",
'parse_mode'=>"HTML",
'reply_markup'=>$pay,
])->result->message_id;

}
$okstat=file_get_contents("status/$cid.status");
if($text=="📊 Buyurtmani kuzatish"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Buyurtma ID-raqamini kiriting",
]);
mkdir("status");
file_put_contents("status/$cid.status","1");
}
if($okstat==1){
if(is_numeric($text)){
$orderstat=json_decode(file_get_contents("https://partner.soc-proof.su/api/v2?key=$chanel_3&action=status&order=$text"),true);
$miqdor=$orderstat['charge'];
if($orderstat['status'] !=null or $orderstat['remains'] !=null){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
Buyurtma xolati: ".$orderstat['status']."
Buyurtma miqdori: ".$orderstat['remains']."",
]);unlink("status/$cid.status");
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>" Mavjud emas" ,
]);
unlink("status/$cid.status");
}
}
}
  /*@itmaktabi1*/
if($text=="💰 Pul ishlash"){
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
$dl = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"‍<b>Marhamat, quyidagi menyudagi hisob to'ldirish usullardan birini tanlang: 

🗣 Taklifnoma: Siz ushbu bo'limdan foydalanib o'zingizning havolangizni olasiz va boshqalarga yuborish orqali pul yig'asiz.

💳 Sotib olish: Siz ushbu bo'limdan pul sotib olish va robotdan hech qanday muammosiz va ozgina pul to'lash orqali foydalanishingiz mumkin.‌‌</b>

$rek
",
    'parse_mode'=>"html",
'reply_markup'=>$pay,
])->result->message_id;
}

if($data=="card"){
bot('editMessagetext',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"<b>⬇Quyidagi karta raqamiga tolov qiling va administratorga yozing</b>

💳Karta: <code>$cilick</code>
💸Minimal tolov: 1000 so'm

<b>📊 Botdagi so'mkursi: 1 ₽ - Kursga qarab

Murojaat uchun:  <a href='tg://user?id=$admin'>ADMIN</a></b>",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Botimiz",'url'=>"https://t.me/$botname"]],
]]),]);}

  /*@itmaktabi1*/
if($data=="card"){
bot('editMessagetext',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"<b>⬇Quyidagi karta raqamiga tolov qiling va administratorga yozing</b>

💳Karta: <code>$cilick</code>
💸Minimal tolov: 1000 so'm

<b>📊 Botdagi so'mkursi: 1 ₽ - Kursga qarab

Murojaat uchun:  <a href='tg://user?id=$admin'>ADMIN</a></b>",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Botimiz",'url'=>"https://t.me/$botname"]],
]]),]);}
  /*@itmaktabi1*/
if($data=="qiwi"){
bot('editMessageText',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"<b>🥝 QIWI to'lov tizimi orqali yuborilgan pullaringiz bir necha daqiqada 
avtomatik ravishda hisobingizga tushadi.</b>

💳 QIWI: <code>$qiwi</code>
📝 Izoh: <code>$callcid</code>

<b>Diqqat! izoh kiritishni unutsangiz yoki noto'g'ri kiritsangiz hisobingizga pul tushmaydi! 
Bu kabi holatlarda, biz bilan bog'lanishingiz mumkin.</b>",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Administrator",'url'=>"https://t.me/$adminuser"]],
]]),]);}
  /*@itmaktabi1*/
if($text=="⬅Orqaga"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"Bekor qilindi!",
    'parse_mode'=>"html",
'reply_markup'=>$mem,
]);
unlink("step/$cid.step");
exit();
}
  /*@itmaktabi1*/

if($text=="📨 Yordam"){
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
$dl = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
<b>🔰 Bizga savollaringiz yoki muammolaringiz bo'lsa, iltimos, bizning qo'llab-quvvatlash jamoamiz bilan bog'laning.
Admin: <a href='tg://user?id=$admin'>ADMIN</a></b>",
"parse_mode"=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🛠 Administrator","url"=>"https://t.me/$adminuser"]],
]]),])->result->message_id;}

if($data=="ref"){
bot('editMessagetext',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"
🎉 @$botname
✅ Telegram  va  Instagram sahifalarga obunachi qo'shish,
👥 Referal va sotib olish,
🔆 24/7 qo'llab-quvvatlash,
🔐 Qulay va 🚚Avto tolov(🥝QIWI),
💸 Tezkor o'tkazma qilish imkoniyati.
🇺🇿 O'zbek tilidagi boshqaruv.
👇 Hoziroq sinab ko'ring! Linkni bosing!

👉🏻 https://telegram.me/$botname?start=$callcid
👉🏻 tg://resolve?domain=$botname&start=$callcid
$rek",
]);
bot('sendMessage',[
'chat_id'=>$callcid,
'text'=>"Yuqoridagi xabarni tarqating va xar bir referalingiz uchun $referalim oling ",
]);
}

  /*@itmaktabi1*/
if($data=="buy"){
bot('editMessageText',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"
💵 Qaysi to'lov usulida hisobingizni toldirmoqchisiz?
Karta va qiwi orqali toʻlovlar qilish tavsiya etiladi.
👇 Tugmalardan tanlang:",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💴Karta orqali",'callback_data'=>"card"],['text'=>"🥝QIWI Orqali(avto)",'callback_data'=>"qiwi"]],
]
]),
]);
}                            
  /*@itmaktabi1*/
if($text=="➕ Buyurtma berish"){
  unlink("step/$chat_id.txt");
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>✅ Bizning xizmatlarimizni tanlaganingizdan xursandmiz!
👇 Quydagi Ijtimoiy tarmoqlardan birini tanlang.</b>",
    'reply_markup'=>$nakrutka,
    ]);
}
$ss=file_get_contents("admin.txt");
if($text=="➕Pul berish" and $cid==$admin){
  file_put_contents("admin.txt","coin");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchi hisobidan qancha so'mqoshmoqchisiz:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
if($ss=="coin" and $cid==$admin){
file_put_contents("adminpul.coin",$text);
bot("sendMessage",[
"chat_id"=>$admin,
'text'=>"Foydalanuvchi ID raqamini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("admin.txt");
file_put_contents("admin.txt","pay");
 }

  /*@itmaktabi1*/
if($ss=="pay" and $cid==$admin){
$summa = file_get_contents("adminpul.coin");
$sum =  file_get_contents("pul/$text.pul");
$jami = $sum + $summa;
file_put_contents("pul/$text.pul","$jami");
bot("sendMessage",[
   "chat_id"=>$text,
          "text"=>"
💰 Sizning hisobingiz admin tomonidan $summa so'mga toʻldirildi!

Hozirgi hisobingiz: $jami so'm",
]);
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"✅ Foydalanuvchi balansi toʻldirildi!",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("admin.txt");
unlink("adminpul.txt");
}
////////  /*@itmaktabi1*/
$ss=file_get_contents("admin.txt");
if($text=="➖Pul ayirish" and $cid==$admin){
file_put_contents("admin.txt","coin1");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Foydalanuvchi hisobidan qancha so'mayirmoqchisiz:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
  /*@itmaktabi1*/
if($ss=="coin1" and $cid==$admin){
file_put_contents("adminpul.coin",$text);
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Foydalanuvchi ID raqamini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("admin.txt");
file_put_contents("admin.txt","pay1");
 }
  /*@itmaktabi1*/

if($ss=="pay1" and $cid==$admin){
$summa = file_get_contents("adminpul.coin");
$sum =  file_get_contents("pul/$text.pul");
$jami = $sum - $summa;
$okminus=file_put_contents("pul/$text.pul","$jami");
bot("sendMessage",[
   "chat_id"=>$text,
          "text"=>"
💰 Sizning hisobingizdan admin tomonidan $summa so'm ayirildi!

Hozirgi hisobingiz: $jami rubl",
]);
}
if($okminus){
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"✅ Foydalanuvchi balansidan $summa so'm ayirildi!",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("admin.txt");
unlink("adminpul.txt");
}
function send($c,$m,$p){
bot('sendMessage',[
'chat_id'=>$c,
'text'=>$m,
'parse_mode'=>$p,
]);
}
  /*@itmaktabi1*/
function reyting(){
    $text = "🏆 <b>TOP 5 ta eng koʻp pul ishlagan foydalanuvchilar:</b>\n\n";
    $daten = [];
    $rev = [];
    $fayllar = glob("./pul/*.*");
    foreach($fayllar as $file){
        if(mb_stripos($file,".pul")!==false){
        $value = file_get_contents($file);
        $id = str_replace(["./pul/",".pul"],["",""],$file);
        $daten[$value] = $id;
        $rev[$id] = $value;
        }
        echo $file;
    }

    asort($rev);
    $reversed = array_reverse($rev);
    for($i=0;$i<5;$i+=1){
        $order = $i+1;
        $id = $daten["$reversed[$i]"];
        $text.= "<b>{$order}</b>. <a href='tg://user?id={$id}'>{$id}</a> - "."<code>".$reversed[$i]."</code>"." <b>som/b>"."\n";
    }
    return $text;
}
if($text=="/reyting"){
$y = reyting();
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>$y,
'parse_mode'=>html,
]);
}
$step = file_get_contents("step/$chat_id.step");
     
     
     	
  /*@itmaktabi1*/

if($tx=="/stat"){
$lich = substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔥<b>Botimiz a'zolari $lich ta </b>
",
]);
}
  /*@itmaktabi1*/