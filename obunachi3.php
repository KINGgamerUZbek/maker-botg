<?php

$admin = 'ADMIN_ID';
$token = 'API_TOKEN';
$botim = 'BOT_NAME';
$botname = bot('getme',['bot'])->result->username;

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
$mid = $message->message_id;
$data = $update->callback_query->data;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$gname = $message->chat->title;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$name = $message->from->first_name;
$repid = $message->reply_to_message->from->id;
$repname = $message->reply_to_message->from->first_name;
$newid = $message->new_chat_member->id;
$leftid = $message->left_chat_member->id;
$newname = $message->new_chat_member->first_name;
$leftname = $message->left_chat_member->first_name;
$username = $message->from->username;
$cmid = $update->callback_query->message->message_id;
$cusername = $message->chat->username;
$repmid = $message->reply_to_message->message_id; 
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$cqid = $update->callback_query->id;

$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$document = $update->message->document;
$for = $message->forward_from;
$forc = $message->forward_from_chat;
mkdir("pul");
mkdir("odam");
mkdir("qiwi");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❤️ Nakrutka"]],
[['text'=>"🎟️ PR larim"],['text'=>"🎟️ PR ishlash"]],
[['text'=>"🏆 Reyting"],['text'=>"💬 Fikr mulohaza"]],
]
]);

$key3 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⏪ Orqaga qaytish"]],
]
]);

$key2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⏪ Orqaga qaytish"]],
]
]);

$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"♐ Hammaga xabar yuborish"]],
[['text'=>"➕ Hisob to'ldirish"],['text'=>"➖ Hisob ayrish"]],
[['text'=>"🚀 Statistika"],['text'=>"⏪ Orqaga qaytish"]],
]
]);

$key4 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅OK"]],
]
]);

if(mb_stripos($text,"/start $cid")!==false){
    bot('sendMessage',[
          'chat_id'=>$cid,
          'text'=>"▶ Bosh menyudasiz kerakli bo'limni tanlang 👇",
          'parse_mode'=>'html',
          'reply_markup'=>$key,
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
    $pul = file_get_contents("pul/$ex.txt");
    $a=$pul+5;
    file_put_contents("pul/$ex.txt","$a");
    $odam = file_get_contents("odam/$ex.dat");
    $b=$odam+1;
    file_put_contents("odam/$ex.dat","$b");
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💥 Do'stlaringizni bizning botga taklif qilib PR ishlang
     Har bir taklif qilgan do'stingiz uchun 5 PR olasiz💸",
    'parse_mode'=>'html',
    'reply_markup'=>$key,
    ]);
    bot('sendmessage',[
    'chat_id'=>$ex,
    'text'=>"👏 Tabriklaymiz! Sizning do'stingiz botimizdan ro'yxatdan o'tdi va sizga 5PR taqdim etildi.",
    'parse_mode'=>'html',
    'reply_markup'=>$key,
    ]);
    }
    }

if($text=="/start"){
$pul = file_get_contents("pul/$cid.txt");
$mm=$pul+0;
file_put_contents("pul/$cid.txt","$mm");
$odam = file_get_contents("odam/$cid.dat");
$kkd=$odam+0;
file_put_contents("odam/$cid.dat","$kkd");
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"👋Salom hurmatli $name
🤖Botimizga xush kelibsiz.

Bizning botimizdan Telegram, Tiktok va Instagram messengerlariga nakrutka, like va prismotr kopayturishingiz mumkin.
Hamda boshqa foydali xizmatlarimizdan foydalaning🤩


Marhamat kerakli bo'lgan tugmani tanlang:",
    'parse_mode'=>'html',
    'reply_markup'=>$key
    ]);
}
if($text=="⏪ Orqaga qaytish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔝Bosh sahifaga xush kelibsiz",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="✅OK"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"💳 Buyurtma kuchga kirishini kuting\n\n 🔝Bosh sahifa",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="🎟️ PR ishlash"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Referalingiz 🔳: $odam ta
🎟️ Balansingiz: $pul RP

👫Harbir do'stingiz uchun 4 PR.
🌐Sizning referal ssilkangiz:\nhttps://t.me/$botname?start=$cid",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="🎟️ PR larim"){
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🆔 ID raqamiz: <code>$cid</code>

🔸 Do'stlaringiz: <b>$odam</b> ta
🔹 Hisobingiz: <b>$pul PR</b>",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}

if($text==""){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Kanalingiz ( guruhingiz ) havolasini yuboring...

Na'muna: https://t.me/VipKons

💸 Minimal nakrutka qilish uchun 100 PR kerak.

🔸100 PR -- 100 ta nakrutka",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}
if(mb_stripos($text,"https://t.me/")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=100){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Kanal ( guruh ) havolasi: <b>$qiwi</b>
💸 Nakrutka uchun: <b>$pul PR</b>

🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"Diqqat <b>$cid</b> dan buyurtma keldi!

Kanal ( guruh ) havolasi: <b>$qiwi</b>
Balansi: <b>$pul PR</b>
Taklif qilgan odamlari: <b>$odam</b> ta
ID raqami: <code>$cid</code>",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"☝️ Sizning hisobingizda PR yetarli emas!\nSizning balansingizda: $pul PR mavjud!.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}
if($text=="💬 Fikr mulohaza"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🆘 Yordam chatimizga kiring, u erda siz tez-tez beriladigan savollarga javob topishingiz mumkin.

🧾 Mukofotlar va boshqalar haqidagi dolzarb ma'lumotlar, faqat botda!

⚠️ Bot shartlariga rioya qilmasangiz - botdan ban olasiz! 👇",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Dasturchi",'url'=>"https://t.me/VipKonsbot"]],
]
])
]);
}

if((mb_stripos($text,"/panel")!==false) and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"⚙ <b>Hush kelibsiz admin panelga:</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
if($text=="➕ Hisob to'ldirish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👤 Foydalanuvchi hisobini to'ldirish uchun:

/plus id raqam miqdor

👉 Masalan: /plus $admin 100",   
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
if($text=="➖ Hisob ayrish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👤 Foydalanuvchi hisobini ayrish uchun:

/minus id raqam miqdor

👉 Masalan: /minus $admin 100",   
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}

if((mb_stripos($text,"/plus")!==false) and $cid==$admin){
$exx=explode(" ",$text);
$ex1=$exx[1];
$ex2=$exx[2];
$pul = file_get_contents("pul/$ex1.txt");
$rr=$pul+$ex2;
file_put_contents("pul/$ex1.txt","$rr");
$pul = file_get_contents("pul/$ex1.txt");
$odam = file_get_contents("odam/$ex1.dat");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Diqqat <b>$ex1</b> ga <b>$ex2 PR</b> qo'shildi!

Balansi: <b>$pul PR</b>
ID raqami: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$ex1,
'text'=>"✅ Assalomu alaykum! <b>$ex2 PR</b> sizning bot hisobingizga qo'shildi.

Hozirgi balans: <b>$pul PRb>",
'parse_mode'=>'html',
]);
}
if((mb_stripos($text,"/minus")!==false) and $cid==$admin){
$exxx=explode(" ",$text);
$ex3=$exxx[1];
$ex4=$exxx[2];
$pul = file_get_contents("pul/$ex3.txt");
$rr=$pul-$ex4;
file_put_contents("pul/$ex3.txt","$rr");
$pul = file_get_contents("pul/$ex3.txt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Diqqat <b>$ex1</b> dan <b>$ex2 PR</b> olib tashlandi!

Balansi: <b>$pul PR</b>
ID raqami: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"✅ Assalomu alaykum! <b>$ex2 PR</b> sizning bot hisobingizdan olib tashlandi.

Hozirgi balans: <b>$pul PR</b>",
'parse_mode'=>'html',
]);
}
$lichka = file_get_contents("lichka.db");
$xabar = file_get_contents("xabarlar.txt");

if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.db","$lichka\n$cid");
}
} 
$reply = $message->reply_to_message->text;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
if($text=="♐ Hammaga xabar yuborish" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Yuboriladigan xabar matnini kiriting!",
    'parse_mode'=>"html",
]);
    file_put_contents("xabarlar.txt","user");
}
if($xabar=="user" and $cid==$admin){
if($text=="/cancel"){
	file_put_contents("xabarlar.txt","");
}else{
  $lich = file_get_contents("lichka.db");
  $lichka = explode("\n",$lich);
  foreach($lichka as $lichkalar){
  $okuser=bot("sendmessage",[
    'chat_id'=>$lichkalar,
    'text'=>$text,
    'parse_mode'=>'html'
]);
}
if($okuser){
  bot("sendmessage",[
    'chat_id'=>$admin,
    'text'=>"Hamma userlarga yuborildi!",
    'parse_mode'=>'html',
]);
  file_put_contents("xabarlar.txt","");
}
}
}



$sum=file_get_contents("tolandi.txt");
if($text=="🚀 Statistika"){
$sum=file_get_contents("tolandi.txt");
$lich = substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"📶 Botimiz a'zolari: <b>$lich ta</b>

💳 Nakrutka uchun ishlatildi: <b>$sum PR</b>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}
if(mb_stripos($text,"/pul")!==false){
$him=explode(" ",$text);
$hm=$him[1];
file_put_contents("tolandi.txt","$hm");
$sum=file_get_contents("tolandi.txt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"$sum PR qo'shildi!",
'parse_mode'=>'html',
]);
}
if($text=="❤️ Nakrutka"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
Что будем накручивать?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"❤️ 𝐈𝐧𝐬𝐭𝐚𝐠𝐫𝐚𝐦"],], 
[['text'=>"👤 𝐓𝐢𝐤 𝐭𝐨𝐤"],['text'=>"👤 𝐓𝐞𝐥𝐞𝐠𝐫𝐚𝐦"],],  

 [['text'=>"⏪ Orqaga qaytish"]]
   ]
   ]), 
   ]);
  
}

if($text=="❤️ 𝐈𝐧𝐬𝐭𝐚𝐠𝐫𝐚𝐦"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
Что будем накручивать?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"❤️ 𝐋𝐚𝐲𝐤"],], [['text'=>"👁 𝐏𝐫𝐨𝐬𝐦𝐨𝐭𝐫"],['text'=>"👥 𝐨𝐛𝐮𝐧𝐚𝐜𝐡𝐢"],],  

 [['text'=>"⏪ Orqaga qaytish"]]
   ]
   ]), 
   ]);
  
}

if($text=="👤 𝐓𝐢𝐤 𝐭𝐨𝐤"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
Что будем накручивать?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"👁 𝐩𝐫𝐚𝐬𝐦𝐨𝐭𝐫"],['text'=>"👥𝐎𝐛𝐮𝐧𝐚𝐜𝐡𝐢"],],  

 [['text'=>"⏪ Orqaga qaytish"]]
   ]
   ]), 
   ]);
  
}

if($text=="👤 𝐓𝐞𝐥𝐞𝐠𝐫𝐚𝐦"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>
Что будем накручивать?</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
 'keyboard'=>[
  [['text'=>"👁𝐏𝐫𝐨𝐬𝐦𝐨𝐭𝐫"],['text'=>"👥𝐨𝐛𝐮𝐧𝐚𝐜𝐡𝐢"],],  
 [['text'=>"⏪ Orqaga qaytish"]]
   ]
   ]), 
   ]);
  
}



if($text=="👥𝐨𝐛𝐮𝐧𝐚𝐜𝐡𝐢"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 Menga Telegram kanalingiz yoki guruhingiz havolasini yuboring.
Namuna: @VipKons


🏁 Boshlanishi: 5-10 daqiqa
🚴 Tezlik: kuniga 30000
🔥 Sifat: Rus va Uzb hisob raqamlari
✅ Maksimal: har bir havola uchun 100000
⚠️ Havolani yaxshilab tekshiring, biz noto'g'ri havola uchun RPni qaytarib bermaymiz.

🎟️ 3 ta RP - 1 ta obunachi
🎟️ Sizning balansingiz: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"@")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=150){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 Foydalanuvchi buyurtmasi bajarildi!
♐️ ID: $cid
🔎 Link: $qiwi
🔢 PR miqdori: 150
♎️ Soni: 50
 Muvaffaqiyatli bajarildi!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"☝️ Minimal buyurtma 50 ta!\nSizning balansingizda: $pul PR mavjud!
50 ta = 150 PR.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}



if($text=="👁𝐏𝐫𝐨𝐬𝐦𝐨𝐭𝐫"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 Menga Telegramdagi postingiz linkni yuboring.
Namuna:
https://t.me/vipkons/51


🏁 Boshlanishi: 5-10 daqiqa
🚴 Tezlik: kuniga 5000 ta
🔥 Sifat: Botlar
✅ Maksimal: har bir havola uchun 10000
🔴Siz postga havola yuborishingiz kerak, biz noto'g'ri havolalar uchun RPni qaytarib bermaymiz, ushbu xizmat uchun hech qanday shikoyat qabul qilinmaydi. E'tiborli bo'ling.


🎟 1 RP - 10 ta prosmotr
🎟️ Sizning balansingiz: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=5){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 Foydalanuvchi buyurtmasi bajarildi!
♐️ ID: $cid
🔎 Link: $qiwi
🔢 PR miqdori: 5
♎️ Soni: 50
 Muvaffaqiyatli bajarildi!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}



if($text=="👥𝐎𝐛𝐮𝐧𝐚𝐜𝐡𝐢"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 Menga Tiktokdagi usernamengizni yuboring.
Namuna:
tiktok.com/@Davrmuz



🏁 Boshlanishi: 5-10 daqiqa
🚴 Tezlik: kuniga 30000
🔥 Sifat: Rus va Uzb hisob raqamlari 
✅ Maksimal: har bir havola uchun 100000
⚠️ Usernamengizni yaxshilab tekshiring, biz noto'g'ri username uchun PRni qaytarib bermaymiz.

🎟️ 3 ta PR - 1 ta obunachi
🎟️ Sizning balansingiz: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"@")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=150){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 Foydalanuvchi buyurtmasi bajarildi!
🌐Tik Obunachi
♐️ ID: $cid
🔎 Tik Tok: $qiwi
🔢 PR miqdori: 150
♎️ Soni: 50
 Muvaffaqiyatli bajarildi!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="👁 𝐩𝐫𝐚𝐬𝐦𝐨𝐭𝐫"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 Menga Tiktokdagi postingiz linkini yuboring.
Namuna:
https://vm.tiktok.com/link/


🏁 Boshlanishi: 5-10 daqiqa
🚴 Tezlik: kuniga 30000
🔥 Sifat: Rus va Uzb
✅ Maksimal: har bir havola uchun 100000
⚠️ Linkni yaxshilab tekshiring, biz noto'g'ri link uchun RPni qaytarib bermaymiz.

🎟️ 1 ta RP - 5 ta prosmotr
🎟️ Sizning balansingiz: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=10){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 Foydalanuvchi buyurtmasi bajarildi!
🌐Tik Prosmotr
♐️ ID: $cid
🔎 Link: $qiwi
🔢 PR miqdori: 10
♎️ Soni: 50
 Muvaffaqiyatli bajarildi!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="❤️ 𝐋𝐚𝐲𝐤"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 Menga  Instagramdagi postingiz linkini yuboring.
Namuna:
https://www.instagram.com/p/CC4Ha4pJqC-/?utm_medum=copy_link


🏁 Boshlanishi: 5-10 daqiqa
🚴 Tezlik: kuniga 30000
🔥 Sifat: Rus va Uzb followers
✅ Maksimal: har bir havola uchun 100000
⚠️ Linkni yaxshilab tekshiring, biz noto'g'ri link uchun PRni qaytarib bermaymiz.

🎟️ 1 ta PR - 5 ta layk
🎟️ Sizning balansingiz: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=10){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 Foydalanuvchi buyurtmasi bajarildi Layk!
♐️ ID: $cid
🔎 Link: $qiwi
🔢 PR miqdori: 10
♎️ Soni: 50
 Muvaffaqiyatli bajarildi!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="👥 𝐨𝐛𝐮𝐧𝐚𝐜𝐡𝐢"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 Menga  Instagramdagi usernamengizni yuboring.
Namuna:
Instagram.com/user


🏁 Boshlanishi: 5-10 daqiqa
🚴 Tezlik: kuniga 30000
🔥 Sifat: Rus va Uzb followers
✅ Maksimal: har bir havola uchun 100000
⚠️ Usernamengizni yaxshilab tekshiring, biz noto'g'ri username uchun RPni qaytarib bermaymiz.

🎟️ 3 ta PR - 1 ta follower
🎟️ Sizning balansingiz: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"@")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=150){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
💳 Foydalanuvchi buyurtmasi bajarildi!
🎶Insta Obunachi
♐️ ID: $cid
🔎 Link: $qiwi
🔢 PR miqdori: 150
♎️ Soni: 50
 Muvaffaqiyatli bajarildi!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}

if($text=="👁 𝐏𝐫𝐨𝐬𝐦𝐨𝐭𝐫"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🔗 Menga  Instagramdagi postingiz linkini yuboring.
Namuna:
https://www.instagram.com/p/CS0o802i7fD/?utm_meium=copy_link


🏁 Boshlanishi: 5-10 daqiqa
🚴 Tezlik: kuniga 30000
🔥 Sifat: Rus va Uzb 
✅ Maksimal: har bir havola uchun 100000
⚠️ Linkni yaxshilab tekshiring, biz noto'g'ri link uchun PRni qaytarib bermaymiz.

🎟️ 1 ta PR - 10 ta prosmotr
🎟️ Sizning balansingiz: $pul",   
'parse_mode'=>'html',
'reply_markup'=>$key3,
]);
}

if(mb_stripos($text,"https://")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=5){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🎫 Buyurtma qabul qilindi!
🏷️ Buyurtma holat: Bajarilmoqda...!
✊Buyurtma bajarilganligi haqida sizga o'zimiz bot orqali habar beramiz",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$kanal,
'text'=>"
💳 Foydalanuvchi buyurtmasi bajarildi Prosmotr!
♐️ ID: $cid
🔎link: $qiwi
🔢 PR miqdori: 5
♎️ Soni: 50
 Muvaffaqiyatli bajarildi!",
'parse_mode'=>'html',
]);
$pul = file_get_contents("pul/$cid.txt");
$k=$pul-$pul;
file_put_contents("pul/$cid.txt","$k");
$sum=file_get_contents("tolandi.txt");
$uio=$pul+$sum;
file_put_contents("tolandi.txt","$uio");
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}


if($text=="🏆 𝐑𝐞𝐲𝐭𝐢𝐧𝐠"){
$reyting = reyting();
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"$reyting",
'parse_mode'=>'html',
]);
}

function reyting(){
$tx = $message->text;
$ex=explode("_",$tx);
$text = "<b>🛡TOP 10 ta RP ega foydalanuvchilar:</b>\n\n";
$daten = [];
$rev = [];
$fayllar = glob("*pul/$ex[1]/*.*");
foreach($fayllar as $file){
if(mb_stripos($file,".txt")!==false){
$value = file_get_contents($file);
$id = str_replace(["pul/$ex[1]/",".txt"],["",""],$file);
$daten[$value] = $id;
$rev[$id] = $value;
}
echo $file;
}

asort($rev);
$reversed = array_reverse($rev);
for($i=0;$i<10;$i+=1){
$order = $i+1;
$id = $daten["$reversed[$i]"];
$text.= "<b>{$order}</b>. <a href='tg://user?id={$id}'>{$id}</a> - "."<b>".$reversed[$i]."</b>"." <i>ta!</i>"."\n";
}
return $text;
}