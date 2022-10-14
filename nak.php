<?php
ob_start();
error_reporting(0);
define('API_KEY','API_TOKEN');  //bot tokeni
$key="api"; //api key partner.soc-proof.su saytidan olamz
$admin = "ADMIN_ID";
$adminuser = "ADMIN_USER";
$botname = bot('getme',['bot'])->result->username;
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

$rek = "";
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$chat_id = $message->chat->id;
$cid = $message->chat->id;
$mid = $message->message_id;
$text = $message->text;  
$tx = $message->text;  
$firstname = $message->chat->first_name;
$lastname = $message->chat->last_name;
$uid= $message->from->id;
$callcid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$callmid = $update->callback_query->message->message_id;  
$mes_idi = $update->callback_query->message->message_id;  
$from_id = $update->callback_query->from->id;
$step = file_get_contents('step/$chat_id.txt');
$type = $message->chat->type;



$lichka = file_get_contents("lichka.txt");
if($type=="private"){
if(stripos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.txt","$lichka\n$cid");
}
}

$asosiy = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🗂 Xizmatlarga buyurtma berish"]], 
 [['text'=>"💵 Hisob to'ldirish"],['text'=>"🔐 Mening hisobim"]],
[['text'=>"🔑Buyurtma xolati"],['text'=>"☎️  Administrator"]],
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
    'reply_markup'=>$asosiy,
    ]);
}

$pay = json_encode([
'inline_keyboard'=>[
[['text'=>"💳 Sotib olish",'callback_data'=>"buy"],['text'=>"🗣 Taklifnoma",'callback_data'=>"ref"]],
]
]);
$chanel_3 = file_get_contents("stat/chanel_3.txt");

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
<a href='tg://user?id=$ex'>$ex</a> referalingizga rubl berish uchun kanalimizga obuna boling</b>",
'parse_mode'=>'html',
]);
}
}

if (file_get_contents("pul/$chat_id.txt")){
    // code...
}else{
    file_put_contents("pul/$chat_id.txt","0");
}
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
$reklama
👨‍💻Dasturchi: @$adminuser",
'parse_mode'=>'html',
'reply_markup'=>$asosiy,
]);  
$kele = file_get_contents("ref/$cid.txt");
bot('sendmessage',[
'chat_id'=>$kele,
'text'=>"Siz 1- ta referal chaqirdingiz va sizga 50 so'mberildi",
]);
$refpuli = file_get_contents("pul/$kele.pul");
$ballplus = $refpuli + 50;
file_put_contents("pul/$kele.pul", "$ballplus");
unlink("ref/$cid.txt");
}
else{
     bot('sendmessage',[
'chat_id'=>$cid,
"text"=>"<b>Quyidagi kanalimizga obuna bo`lib qayta /start bosing⤵
1. @$chanel_1
2. @$chanel_2</b>",
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




mkdir("pul");
mkdir("step");
mkdir("nakrutka");
mkdir("kanal");
$ssilka=file_get_contents("nakrutka/$chat_id.txt");
$step=file_get_contents("step/$chat_id.txt");
$pul = file_get_contents("pul/$chat_id.txt");
$nakrutka=json_encode([
  'inline_keyboard'=>[
[['text'=>" ❄ Telegram",'callback_data'=>"nakrutka=Telegram"],['text'=>" ❄ Instagram",'callback_data'=>"nakrutka=Instagram"]],
[['text'=>" ❄ TikTok",'callback_data'=>"nakrutka=TikTok"],['text'=>" ❄ YouTube",'callback_data'=>"nakrutka=YouTube"]],
[['text'=>" ❄ Likee",'callback_data'=>"nakrutka=Likee"],['text'=>" ❄ Facebook",'callback_data'=>"nakrutka=Facebook"]],
[['text'=>"❄ Vkontakte",'callback_data'=>"nakrutka=VK"],['text'=>"❄ Yandex-Then",'callback_data'=>"nakrutka=YT"]],
[['text'=>"❄ Spotify",'callback_data'=>"nakrutka=SP"],['text'=>"❄ Odnoklassniki",'callback_data'=>"nakrutka=SH"]],
    ]
    ]);
$Telegram=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔰 Obunachi [Real members] 7000 so'm",'callback_data'=>"Telegram=Obuna=598=7000"]],
[['text'=>"🇮🇷 Obunachi [Eron members] 5000 so'm",'callback_data'=>"Telegram=Obuna=694=5000"]],
[['text'=>"🇺🇲Obunachi [Tezkor] 5500 so'm",'callback_data'=>"Telegram=Obuna=785=5500"]],
[['text'=>"🗂Obunachi [Aktiv obunachi] 50000 so'm",'callback_data'=>"Telegram=Obuna=705=50000"]],
[['text'=>"🇮🇷 Obunachi [Eron,Tezkor] 15000 so'm",'callback_data'=>"Telegram=Obuna=888=15000"]],
[['text'=>"❄Obunachi [Jonli obunachi] 15000 so'm",'callback_data'=>"Telegram=Obuna=709=15000"]],
[['text'=>"🚀Obunachi [Tezkor obunachi] 12000 so'm",'callback_data'=>"Telegram=Obuna=500=12000"]],
[['text'=>"✅Obunachi [Chiqishlarsiz] 13000 so'm",'callback_data'=>"Telegram=Obuna=540=13000"]],
 [['text'=>"👤 Arzon Obunachi [Real members] 6000 so'm",'callback_data'=>"Telegram=Obuna=695=6000"]],
[['text'=>"👍👎🔥Aralash reaksiyalar [Tezkor] 10000 so'm",'callback_data'=>"Telegram=REK=905=10000"]],
[['text'=>"👍❤🔥Ijobiy reaksiyalar [Tezkor] 8000 so'm",'callback_data'=>"Telegram=REK=881=8000"]],
[['text'=>"😢👎💩Salbiy reaksiyalar [avto] 9000 so'm",'callback_data'=>"Telegram=REK=882=9000"]],
[['text'=>"👍❤🔥Ijobiy reaksiyalar [Avto,Eng oxirgi 30ta post uchun] 180000 so'm",'callback_data'=>"Telegram=REK=884=180000"]],
[['text'=>"😢👎💩Salbiy reaksiyalar [avto,Eng oxirgi 30ta post uchun] 170000 so'm",'callback_data'=>"Telegram=REK=905=10000"]],
[['text'=>" 👁Ko'rishlar [20ta post uchun,AvtoProsmotr] 11000 so'm",'callback_data'=>"Telegram=PM=681=11000"]],
[['text'=>" 👁Ko'rishlar [10ta post uchun,AvtoProsmotr] 6000 so'm",'callback_data'=>"Telegram=PM=680=6000"]],
[['text'=>"🇺🇿 O'zbek Ko'rishlar [Kafolatlangan] 2000 so'm",'callback_data'=>"Telegram=PM=728=2000"]],
[['text'=>"👁Ko‘rish [Arzon] 250 so'm",'callback_data'=>"Telegram=PM=498=250"]],
[['text'=>"👁Ko‘rish [Tez] 450 so'm",'callback_data'=>"Telegram=PM=272=450"]],
  [['text'=>"👁Ko‘rish [Oxirgi 5 post uchun] 1500",'callback_data'=>"Telegram=PM=62=1500"]],
  [['text'=>"👁Ko‘rish [Cheksiz] 700 so'm",'callback_data'=>"Telegram=PM=602=700"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$TikTok=json_encode([
  'inline_keyboard'=>[
  [['text'=>"⚫ Obunachi [Arzon] 5000 so'm",'callback_data'=>"TikTok=Obuna=247=5000"]],
    [['text'=>"⚫ Obunachi [O'rtacha]  18000 so'm",'callback_data'=>"TikTok=Obuna=388=18000"]],
      [['text'=>"⚫ Obunachi [Chiqmaydigan] 24000 so'm",'callback_data'=>"TikTok=Obuna=356=24000"]],
        [['text'=>"❤Like [Tezkor] 10000 so'm",'callback_data'=>"TikTok=Like=430=10000"]],
          [['text'=>"❤Like [O'rtacha] 27000 so'm",'callback_data'=>"TikTok=Like=539=27000"]],
  [['text'=>"👁Ko‘rish [Real] 2700 so'm",'callback_data'=>"TikTok=PM=382=2700"]],
    [['text'=>"👁Ko‘rish [Arzon] 1000 so'm",'callback_data'=>"TikTok=PM=55=1000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$Instagram=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔒 Obunachi [O'rtacha] 5000 so'm",'callback_data'=>"Instagram=Obuna=864=5000"]],
  [['text'=>"✅ Obunachi [Kafolatlangan] 8000 so'm",'callback_data'=>"Instagram=Obuna=502=8000"]],
[['text'=>"👤 Obunachi [Kafolatlanmagan] 3000 so'm",'callback_data'=>"Instagram=PM=155=3000"]],
[['text'=>"🔒 Obunachi [Mix obunachilar,Tezkor] 10000 so'm",'callback_data'=>"Instagram=Obuna=419=10000"]],
[['text'=>"👤Obunachi  [Russia,Gold,Real Members] 28000 so'm",'callback_data'=>"Instagram=Obuna=218=28000"]],
[['text'=>"❤ Like [Arzon] 10
500 so'm",'callback_data'=>"Instagram=Like=14=1500"]],
[['text'=>"❤ Like [O'rtacha] 3500 so'm",'callback_data'=>"Instagram=Like=132=3500"]],
  [['text'=>"👁 Ko'rish [post] 500 so'm",'callback_data'=>"Instagram=PM=421=500"]],
    [['text'=>"👁 Ko'rish [Avto Prosmotr] 1500 so'm",'callback_data'=>"Instagram=PM=85=1500"]],
        [['text'=>"👁 Ko'rish [Gold] 1000 so'm",'callback_data'=>"Instagram=PM=495=1000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$YouTube=json_encode([
  'inline_keyboard'=>[
  [['text'=>"❤️ Obunachi [Kafolatlanmagan] 22000 so'm",'callback_data'=>"YouTube=Obuna=5=22000"]],
[['text'=>" 🚀Obunachi [Kafolatlangan] 85000
so'm",'callback_data'=>"YouTube=Obuna=249=85000"]],
  [['text'=>"👁 Ko'rish [video] 7000 so'm",'callback_data'=>"YouTube=PM=514=7000"]],
    [['text'=>"👁 Ko'rish [video] 10000 so'm",'callback_data'=>"YouTube=PM=39=10000"]],
        [['text'=>"❤Like [video] 9000 so'm",'callback_data'=>"YouTube=Like=125=9000"]],
                [['text'=>"❤Like [Gold] 15000 so'm",'callback_data'=>"YouTube=Like=587=15000"]],
                                [['text'=>"👎DizLike [Gold] 42000 so'm",'callback_data'=>"YouTube=Like=47=42000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$Likee=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔥Obunachi [Russia,Kafolatlangan] 56000 so'm",'callback_data'=>"Likee=Obuna=285=56000"]],
    [['text'=>"👁 Ko'rish [video] 17000 so'm",'callback_data'=>"Likee=PM=287=17000"]],
            [['text'=>"❤Like [video] 21000 so'm",'callback_data'=>"Likee=Like=286=21000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
$Facebook=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🚀Obunachi [O'rtacha] 16000 so'm",'callback_data'=>"Facebook=Obuna=428=16000"]],
    [['text'=>"🚀Obunachi [Arzon] 11000 so'm",'callback_data'=>"Facebook=Obuna=899=11000"]],
      [['text'=>"🚀Gruppa Obunachilari [O'rtacha] 16000 so'm",'callback_data'=>"Facebook=Obuna=78=16000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$VK=json_encode([
  'inline_keyboard'=>[
    [['text'=>"🚀VK obunachi [O'rtacha] 12500 so'm",'callback_data'=>"VK=Obuna=34=12500"]],
    [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$YT=json_encode([
  'inline_keyboard'=>[
    [['text'=>"🗂Obunachi [Jivoy] 83000 so'm",'callback_data'=>"YT=Obuna=152=83000"]],
    [['text'=>"❤Like [Jivoy] 73000 so'm",'callback_data'=>"YT=Like=491=73000"]],
    [['text'=>"$orqa",'callback_data'=>"back"]],
]
]);
$SP=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔥Obunachi [Kafolatlangan] 7000 so'm",'callback_data'=>"SP=Obuna=359=7000"]],
    [['text'=>"🗂Obunachi[Pleylist] 11000 so'm",'callback_data'=>"SP=Obuna=354=11000"]],
  [['text'=>"$orqa",'callback_data'=>"back"]],
  ]
  ]);
  $SH=json_encode([
  'inline_keyboard'=>[
  [['text'=>"🔥Obunachi [Russia,Real] 18000 so'm",'callback_data'=>"SH=Obuna=294=18000"]],
    [['text'=>"👁 Ko'rish [video] 6500 so'm",'callback_data'=>"SH=PM=276=6500"]],
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
 /* @qobilbek1 */

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
    $info=str_replace("$tarmoq","🌐 $tarmoq tarmog'i uchun $son buyurtmaga $rak soʻm hisobingizdan yechiladi ",$tarmoq);
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"
<b>⭕️Buyurtma haqida
🌐Tarmoq: $tarmoq
??Miqdor: $son
🔢Havola: $text

<b>💢$info 💢</b>

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
      'reply_markup'=>$asosiy,
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
   'text'=>"<b>❓Xatolik...
Buyurtma uchun sonlarni quyidagicha kiriting!👇</b>
<code>
1000
2000</code>",
      'parse_mode'=>"html",
      'reply_markup'=>$asosiy,
   ]);
}else{
bot('sendMessage',[
   'chat_id'=>$callcid,
   'text'=>"<b>🚫Ushbu manzil uchun buyurtma berilgan boshqa havola manzili kiriting yoki kuting</b>",
      'parse_mode'=>"html",
      'reply_markup'=>$asosiy,
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
'reply_markup'=>$asosiy,
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
    'text'=>"✅ Bizning xizmatlarimizni tanlaganingizdan xursandmiz!
👇 Quydagi Ijtimoiy tarmoqlardan birini tanlang.",
    'reply_markup'=>$nakrutka,
    ]);
}
 /* @qobilbek1 */


  
  if($text=="🗂 Xizmatlarga buyurtma berish"){
  unlink("step/$chat_id.txt");
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>✅ Bizning xizmatlarimizni tanlaganingizdan xursandmiz!
👇 Quydagi Ijtimoiy tarmoqlardan birini tanlang.</b>",
    'reply_markup'=>$nakrutka,
    ]);
}
  
  if($text == "💰Balans"){
    $balans = file_get_contents("pul/$chat_id.txt");
bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>👤 $firstname\n➳➳➳➳➳➳➳➳➳➳➳➳➳➳➳➳➳ \n👤Hisobingizda $balans so'm Mavjud.\n
➳➳➳➳➳➳➳➳➳➳➳➳➳➳➳➳➳</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$olish,
]);
}


if($text=="🪙API Balans" and $chat_id==$admin){
$api_balance = json_decode(file_get_contents("https://partner.soc-proof.su/api/v2?key=$chanel_3&action=balance"),true);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Sizning API Balansingizda
".$api_balance['balance']." ₽",
'reply_markup'=>$panel,
]);
}



if($text=="💰Sotib Olish"){
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>💵 Qanday to'lov usulida Rubl sotib olmoqchisiz?
Karta, Paynet va qiwi orqali toʻlovlar qilish tavsiya etiladi.
[1 ₽ = 100 soʻm] [10 ₽ = 100 soʻm]
QiWi orqali 
[2 ₽ = 1 ₽] [10 ₽ = 20 ₽]</b>
<b>Karta orqali:</b> <code>$adminuset lichga</code>
<b>QiWi orqali:</b> <code>$adminuser lichga</code>
<b>Paynet orqali:</b> <code>Lichkada</code>
<b>Tolov amalga oshiring va adminga murojaat qiling</b>",
'parse_mode'=>'html',
'reply_markup'=>$olish,
    ]);
}

if($text=="☎️"){
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"*🔰 Bizga savollaringiz yoki muammolaringiz bo'lsa, iltimos, bizning qo'llab-quvvatlash jamoamiz bilan bog'laning.
Admin: @$adminuser*",
'parse_mode'=>'markdown',
    ]);
}
$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📝Userga Xabar"],['text'=>"📋Userga Forward"]],
[['text'=>"➕Pul berish"],['text'=>"➖Pul ayirish"]],
[['text'=>"🪙API Balans"],['text'=>"📊Statistika"]],
[['text'=>"🛠 Sozlash"]],
[['text'=>"🔰 Minimal buyurtmani"]],
]
]);

$okstat=file_get_contents("status/$cid.status");
if($text=="🔑Buyurtma xolati"){
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




mkdir("stat");
if($tx == "🛠 Sozlash" and $cid == $admin){
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"<i>Majburiy a‘zolik kanallarini sozlash uchun pastagi tugmalar orqali kanalingizni ulang.</i>

<b>Eslatma:</b> <i>Majburiy a‘zolikga kiritilgan kanallaringizda ushbu botingiz admin bo‘lishi kerak aks holda bot ishlamaydi.</i>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"1⃣ - Kanal"],['text'=>"2⃣ - Kanal"]],
[['text'=>"❤️Api Sozlash"],['text'=>"/panel"]],
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
if($tx=="🔰 Referal narxni" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<b>Referal narxini kiriting</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
file_put_contents("stat/$cid.step","referalnar");
} 

if($step=="referalnar" and $cid==$admin){ 
file_put_contents("stat/referalsum.txt",$tx); 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>$tx ga o‘zgartirildi.</i>", 
'parse_mode'=>'html', 
'reply_markup'=>$panel, 
]); 
unlink("stat/$cid.step"); 
}
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




if($text == "/panel" and $cid==$admin ){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Assalamu alaykum <a href='tg://user?id=$uid'>Admin</a></b>\n\n<i>Kerakli boʻlimni tanlang!!</i>",
	'parse_mode'=>"html",
	'reply_markup'=>$panel,
]);
}

if($text=="📊Statistika" && $cid==$admin){
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
Salom admin aka botimizda a'zolar soni ko'paymoqda.
Bot azolari ".substr_count($lichka,"\n")." ta ",
'reply_markup'=>$panel,
]);
}

function send($c,$m,$p){
bot('sendMessage',[
'chat_id'=>$c,
'text'=>$m,
'parse_mode'=>$p,
]);
}
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
        $text.= "<b>{$order}</b>. <a href='tg://user?id={$id}'>{$id}</a> - "."<code>".$reversed[$i]."</code>"." <b>rubl</b>"."\n";
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

if($text=="🔐 Mening hisobim"){

$dost = file_get_contents("pul/$cid.ref");
$soat=date('H:i:s',strtotime('3 hour'));
$sana=date("d-M-20y",strtotime("3 hour"));
$hisob  = file_get_contents("pul/$chat_id.txt");
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
$dl = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
‍‍┌🏛 sizning hisobingiz haqida:
├Mijoz: ".$message->from->first_name."
├Xisob raqam <code>$cid</code>
├Botdagi vazifa: Foydalanuvchi
├Do'stlaringiz: $dost ta
├Asosiy xisob: $hisob So'm
└$botname Official 2022
⏰ $soat 
📆 $sana

$rek
",
'parse_mode'=>"HTML",
'reply_markup'=>$pay,
])->result->message_id;

}

if($text=="💵 Hisob to'ldirish"){
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
$dl = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"‍Marhamat, quyidagi menyudagi hisob to'ldirish usullardan birini tanlang: 

🗣 Taklifnoma: Siz ushbu bo'limdan foydalanib o'zingizning havolangizni olasiz va boshqalarga yuborish orqali pul yig'asiz.

💳 Sotib olish: Siz ushbu bo'limdan pullarni sotib olish va robotdan hech qanday muammosiz va ozgina pul to'lash orqali foydalanishingiz mumkin.‌‌

$rek
",
'reply_markup'=>$pay,
])->result->message_id;
}

if($data=="card"){
bot('editMessagetext',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"<b>⬇Quyidagi karta raqamiga tolov qiling va administratorga yozing</b>

💳Karta: <code>$adminuser lichga</code>
💸Minimal tolov: 3000 so'm

<b>📊 Botdagi rubl kursi: 1 ₽ - kursga qarap so'm</b>",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🧑‍💻Administrator",'url'=>"https://t.me/$adminuser"]],
]]),]);}

if($data=="qiwi"){
bot('editMessageText',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"<b>🥝 QIWI to'lov tizimi orqali yuborilgan pullaringiz bir necha daqiqada 
avtomatik ravishda hisobingizga tushadi.</b>

💳 QIWI: <code>$adminuser lichga</code>
📝 Izoh: <code>$callcid</code>

<b>Diqqat! izoh kiritishni unutsangiz yoki noto'g'ri kiritsangiz hisobingizga pul tushmaydi! 
Bu kabi holatlarda, biz bilan bog'lanishingiz mumkin.</b>",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🧑‍💻Administrator",'url'=>"https://t.me/$adminuser"]],
]]),]);}

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

$step = file_get_contents("step/$cid.step");
$hisob = file_get_contents("pul/$cid.pul");
$types = file_get_contents("step/$cid.turi");



if($text=="☎️  Administrator"){
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
$dl = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
🔰 Bizga savollaringiz yoki muammolaringiz bo'lsa, iltimos, bizning qo'llab-quvvatlash jamoamiz bilan bog'laning.
Admin: @$adminuser",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☎️  Administrator","url"=>"https://t.me/$adminuser"]],
]]),])->result->message_id;}

if($data=="ref"){
bot('editMessagetext',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
'text'=>"
🎉 @$botname
✅ Barcha tarmoqlarga obunachi qo'shish,
👥 Referal va sotib olish,
🔆 24/7 qo'llab-quvvatlash,
🔐 Qulay va 🚚Avto tolov(🥝QIWI),
💸 Tezkor o'tkazma qilish imkoniyati.
🇺🇿 O'zbek tilidagi boshqaruv.
✅ Ushbu bot orqali eng ommabop ijtimoiy tarmoqlar uchun obunachilar qo'shishingiz va ko'rishlar sonini ko'paytirishingiz mumkin!

Imkoniyatni qo'ldan boy bermang. Botga o'tish uchun quyidagi havolani ustiga bosing:

👉🏻 https://telegram.me/$botname?start=$callcid
👉🏻https://telegram.me/$botname?start=$callcid

$reklama",
]);
bot('sendMessage',[
'chat_id'=>$callcid,
'text'=>"⬆️ Yuqorida yuborilgan postdagi havola orqali kirgan va bot kanallariga obuna bo'lgan har bir foydalanuvchi uchun sizga 50 so'm pul beriladi ",
]);
}


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



$ss=file_get_contents("admin.txt");
if($text=="➕Pul berish" and $cid==$admin){
file_put_contents("admin.txt","coin");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Foydalanuvchi hisobini nechi pulga toʻldirmoqchisiz:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($ss=="coin" and $cid==$admin){
file_put_contents("adminpul.coin",$text);
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Foydalanuvchi ID raqamini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("admin.txt");
file_put_contents("admin.txt","pay");
 }


if($ss=="pay" and $cid==$admin){
$summa = file_get_contents("adminpul.coin");
$sum =  file_get_contents("pul/$text.txt");
$jami = $sum + $summa;
file_put_contents("pul/$text.txt","$jami");
bot("sendMessage",[
   "chat_id"=>$text,
          "text"=>"
💰 Sizning hisobingiz admin tomonidan $summa so'mga toʻldirildi!

Hozirgi hisobingiz: $jami rubl",
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
////////
$ss=file_get_contents("admin.txt");
if($text=="➖Pul ayirish" and $cid==$admin){
file_put_contents("admin.txt","coin1");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Foydalanuvchi hisobidan qancha so'm ayirmoqchisiz:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

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


if($ss=="pay1" and $cid==$admin){
$summa = file_get_contents("adminpul.coin");
$sum =  file_get_contents("pul/$text.txt");
$jami = $sum - $summa;
$okminus=file_put_contents("pul/$text.txt","$jami");
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


if($tx=="/stat"){
$lich = substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔥<b>Botimiz a'zolari $lich ta </b>
",
]);
}