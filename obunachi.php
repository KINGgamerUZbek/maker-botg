<?php
$admin = 'ADMIN_ID';
$token = 'API_TOKEN';
$adminuser = 'ADMIN_USER';
$botim = 'BOT_USER';

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
[['text'=>"🚀 Nakrutka"],['text'=>"💳 Hisobim"]],
[['text'=>"⚒ Dasturchi"],['text'=>"📊 Hisobot"]],
]
]);

$back = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⏪ Ortga qaytish"]],
]
]);

$key2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🆙 Nakrutka urdirish"]],
[['text'=>"⏪ Ortga qaytish"]],
]
]);

$key4 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅ OK"]],
]
]);

$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"♐ Hammaga xabar yuborish"]],
[['text'=>"➕ Hisob to'ldirish"],['text'=>"➖ Hisob ayrish"]],
[['text'=>"⏪ Ortga qaytish"]],
]
]);


if($text=="/start"){
$pul = file_get_contents("pul/$cid.txt");
$mm=$pul+0;
file_put_contents("pul/$cid.txt","$mm");
$odam = file_get_contents("odam/$cid.dat");
$kkd=$odam+0;
file_put_contents("odam/$cid.dat","$kkd");
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"👋Assalamu aleykum <a href='tg://user?id=$cid'>$name2</a>

🤖: Men orqali referal yig'ib kanalingizga nakrutka urdirishingiz mumkin bo'ladi

Buning uchun pastdagi bo‘limlarni birini tanlang👇",
    'parse_mode'=>'html',
    'reply_markup'=>$key
    ]);
}
if(mb_stripos($text,"/start $cid")!==false){
bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"📋 Bosh menu!",
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
$a=$pul+1;
file_put_contents("pul/$ex.txt","$a");
$odam = file_get_contents("odam/$ex.dat");
$b=$odam+1;
file_put_contents("odam/$ex.dat","$b");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Sizning Referalingiz Bilan Kirgan Har Bir Odam Uchun <b>1 ₽</b> Beriladi. Agar Siz  10 ₽ Yig'sangiz nakrutka urishiz mumkin

Agar Pul Ishlamoqchi Bolsangiz <b>🚀 Nakrutka</b> Tugmasiga Bosing",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
bot('sendmessage',[
'chat_id'=>$ex,
'text'=>"💥 <b>1 ₽</b> do'stingizni taklif qilganingiz uchun hamyoningizga qo'shildi.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}
if($text=="⏪ Ortga qaytish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🏡 Siz asosiy menyuga qaytdingiz!",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="✅ OK"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"🏡 Siz asosiy menyuga qaytdingiz!",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="🚀 Nakrutka"){
bot('sendphoto',[
'chat_id'=>$cid,
"photo"=>"https://t.me/vipkons/51",
'caption'=>"🖇 Sizning Referal Ssilkangiz : 

https://t.me/$botim?start=$cid

Agar foydalanuvchi sizning referalingiz bilan kirsa, sizga 1 ₽ beriladi.",
'parse_mode'=>'html',
'reply_markup'=>$key2,
]);
}
if($text=="💳 Hisobim"){
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
bot('sendphoto',[
'chat_id'=>$cid,
"photo"=>"https://t.me/vipkons/51",
'caption'=>"🆔 Id raqamingiz: <code>$cid</code>

🔹 Sizning Hisobingiz: <b>$pul ₽</b>

🔸 Siz Taklif Qilgan <b>$odam</b> foydalanuvchilar",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
if($text=="🆙 Nakrutka urdirish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"📡 Kanalingiz userini yuboring:

🧲 Namuna: @Username

🆗 Minemal nakrutka urdirish: <b>10 ₽</b>",   
'parse_mode'=>'html',
'reply_markup'=>$back,
]);
}
if(mb_stripos($text,"@")!==false){
file_put_contents("qiwi/$cid.txt","$text");
$qiwi=file_get_contents("qiwi/$cid.txt");
$pul = file_get_contents("pul/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($pul>=10){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"⏩ Kanalingiz: <b>$qiwi</b>

💸 Balansingiz: <b>$pul ₽</b>

🚀 Kanalingizga odam qo'shish boshlandi biroz muddat kuting.",
'parse_mode'=>'html',
'reply_markup'=>$key4
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"🆙 Nakrutka urmoqchi:

Kanali: <b>$qiwi</b>
Balansi: <b>$pul ₽</b>
ID raqami: <code>$cid</code>
Taklif qilgan odamlari: <b>$odam</b> ta

🚀 Kanalingizga odam qo'shish boshlandi biroz muddat kuting.",
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
'text'=>"Xato! Sizning hisobingizda mablag 'yetarli emas.",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}
}
if($text=="⚒ Dasturchi"){
bot('sendphoto',[
'chat_id'=>$cid,
"photo"=>"https://t.me/vipkons/51",
'caption'=>"🤖 Bot dasturchisi: @$adminuser

🆓 Construktor bot: $adminuser",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👨‍💻 Dasturchi",'url'=>"https://telegram.me/$adminuser"]],
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
'text'=>"❗Diqqat <b>$ex1</b> ga <b>$ex2 ₽</b> qo'shildi!

💰Balansi: <b>$pul ₽</b>
🆔 raqami: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$ex1,
'text'=>"⚙ Sizga admin tomonidan <b>$ex2 ₽</b> berildi.

💰 Hozirgi balans: <b>$pul ₽</b>",
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
'text'=>"❗Diqqat <b>$ex1</b> dan <b>$ex2 ₽</b> Olib Tashlandi!

💰Balansi: <b>$pul ₽</b>
🆔 raqami: <code>$ex1</code>",
'parse_mode'=>'html',
]);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"➖ Bot Admini Tomonidan <b>$ex1 ₽</b> Olib Tashlandi❗

Hozirgi Balans💰: <b>$pul ₽</b>",
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
if($text=="📊 Hisobot"){
$sum=file_get_contents("tolandi.txt");
$lich = substr_count($lichka,"\n");
bot('sendphoto',[
'chat_id'=>$cid,
"photo"=>"https://t.me/vipkons/51",
'caption'=>"📊 Umumiy foydalanuvchilar: <b>$lich</b>

🆗 Bajarilgan nakrutkalar: <b>$sum ta</b>",
'parse_mode'=>'html',
'reply_markup'=>$key,
]);
}