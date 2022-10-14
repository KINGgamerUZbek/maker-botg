<?php
ob_start();
define('BEK_KODER','API_TOKEN');
$admin = "ADMIN_ID"; //admin id
$adminuser = "ADMIN_USER"; //admin user
$bot = "$bot"; //bot useri
$rek_channel = "$chanel_1"; //rek kanal
$pm_channel = "$chanel_1"; //post kanal
$hamkor = "https:"; //hamkor and namuna

echo file_get_contents("https://api.telegram.org/bot".BEK_KODER."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);

function SendMessage($id,$mrk,$text){
return bot('SendMessage',[
'chat_id'=>$id,
'parse_mode'=>$mrk,
'text'=>$text,
]);
}
function DeleteMessage($ch,$m){
return bot('deletemessage',[
'chat_id'=>$ch,
'message_id'=>$m,
]);
}
function name($ch){
$c = bot('getchat',['chat_id' => "@".$ch]);
return $c->result->title;
}

function getAdmin($chat){
$url = "https://api.telegram.org/bot".BEK_KODER."/getChatAdministrators?chat_id=@".$chat;
$result = file_get_contents($url);
$result = json_decode ($result);
return $result->ok;
}

function bot($method,$datas = []){
$url = "https://api.telegram.org/bot".BEK_KODER."/".$method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
$res = curl_exec($ch);
if (curl_error($ch)) {
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}

$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$message = $update->message;
$mid = $message->message_id;
$re = array("[","]","(",")","*","_","`");
$name = str_replace($re, "", $message->from->first_name);
$users = $message->from->username;
$tx = $message->text;
$idi = $message->from->id;
$type = $message->chat->type;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$mes_idi = $update->callback_query->message->message_id;  
$from_id = $update->callback_query->from->id;
$id = $update->callback_query->id;
}
if(!is_dir("coin") or !is_dir("step") or !is_dir("stat")){
mkdir("coin");
mkdir("step");
mkdir("soni");
mkdir("pmcoin");
mkdir("Otabek");
mkdir("Otabek/shikoyat");
mkdir("Otabek/pmshikoyati");
mkdir("Otabek/user");
mkdir("Otabek/pmuseri");
mkdir("stat");
}
$step = file_get_contents("step/$idi.step");
$fstep = file_get_contents("step/$from_id.step");
$ball = file_get_contents("coin/$idi.dat");
if(!$ball) $ball = 0;
$coin = file_get_contents("pmcoin/$idi.dat");
if(!$coin) $coin = 0;
$soni = file_get_contents("soni/$idi.soni");
if(!$soni) $soni = 0;
$from_ball = file_get_contents("coin/$from_id.dat");
if(!$from_ball) $from_ball = 0;
$lichka = file_get_contents("stat/lichka.db");

$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"💵 Pul Ishlash"],['text'=>"🔗 Takliflar"],],
[['text'=>"🗄 Buyurtma"],['text'=>"📱 Kabinet"],],
[['text'=>"📊 Statistika"],['text'=>"📚 Ma'lumot"],],
]]);

$orqaga = "🔙 Orqaga";
$key3 = json_encode([ 
'resize_keyboard'=>true, 
'keyboard'=>[ 
[['text'=>$orqaga]],
]]); 

if(stripos($tx,"/start")!==false){
$refid = explode(" ",$tx);
$refid = $refid[1];
if(strlen($refid)>0 and $refid>0){
if($refid==$idi){
SendMessage($idi,markdown,"*🖥 Bosh sahifaga qaytingiz*");
}else{
if(stripos($lichka,"$idi")!==false){
SendMessage($idi,markdown,"*🔎 Taklif qilgan do'stingiz botimizda avvaldan mavjud.*");
}else{
file_put_contents("soni/$refid.soni", file_get_contents("soni/$refid.soni") + 1);
$usr = file_get_contents("coin/$refid.dat");
$usr = $usr + 2;
file_put_contents("coin/$refid.dat", $usr);
$p = file_get_contents("pmcoin/$refid.dat");
$pm = $p + 2;
file_put_contents("pmcoin/$refid.dat", $pm);
SendMessage($refid,markdown,"*🔗 _Sizda yangi taklif bor. Hisobingizga 2 so'm qo'shildi_ 💵");
}
}
}
}

function joinchat($fid){
    global $message_id,$firstname;
$ch1 = file_get_contents("ch1.txt");
    $ret = bot("getChatMember",[
        "chat_id"=>"@".$ch1."",
        "user_id"=>$fid,
        ]);
$stat = $ret->result->status;
$ch2 = file_get_contents("ch2.txt");
$rets = bot("getChatMember",[
        "chat_id"=>"@".$ch2."",
        "user_id"=>$fid,
        ]);
$stats = $rets->result->status;
$ch3 = file_get_contents("ch3.txt");
$retus = bot("getChatMember",[
        "chat_id"=>"@".$ch3."",
        "user_id"=>$fid,
        ]);
$status = $retus->result->status;
        if((($stat=="creator" or $stat=="administrator" or $stat=="member") and ($stats=="creator" or $stats=="administrator" or $stats=="member") and ($status=="creator" or $status=="administrator" or $status=="member"))){
     return true;
        }else{
    bot("sendMessage",[
        "chat_id"=>$fid,
        "text"=>"<b>Quyidagi kanallarimizga obuna boʻling. Botni keyin toʻliq ishlatishingiz mumkin!</b>",
        "parse_mode"=>"html",
        "reply_to_message_id"=>$message_id,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"➕ A‘zo bo‘lish","url"=>"https://t.me/$ch1"],],
[["text"=>"➕ A‘zo bo‘lish","url"=>"https://t.me/$ch2"],],
[["text"=>"➕ A‘zo bo‘lish","url"=>"https://t.me/$ch3"],],
[["text"=>"✅ Tasdiqlash","callback_data"=>"result"],],
]
]),
]);
}
}  


   $kanala = file_put_contents("kanal/chatid.kanal1","$text");
   $kanalr = file_put_contents("kanal/chatid.kanal2","$text");
   $kanals = file_put_contents("kanal/chatid.kanal3","$text");

$salom = "*🖥 Bosh sahifaga qaytdingiz*";
if($data=="uz"){
$gett = bot('getChatMember',[
'chat_id'=>"@".$pm_channel,
'user_id'=>$from_id,
]);   
$get = $gett->result->status;
$geti = bot('getChatMember',[
'chat_id'=>"@".$rek_channel,
'user_id'=>$from_id,
]);   
$geto = $geti->result->status;
if(($get=="member" or $get=="adminstrator" or $get=="creator") and ($geto=="member" or $geto=="adminstrator" or $geto=="creator")){
DeleteMessage($from_id,$mes_idi);
bot('sendMessage',[
'chat_id'=>$from_id,
'parse_mode'=>'markdown',
'text'=>$salom,
'reply_markup'=>$key,
]);
}else{
bot('answercallbackquery',[
'callback_query_id'=>$id,
'text'=>"*🔐 https://t.me/$ch3 kanalga obuna bo'ling !!*",
'show_alert'=>true,
]);
}
}

//admin bo'limi
$bekor = "⬅️ Bekor qilish";
$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[["text"=>"🛠 Kanal parametrlari"],['text'=>"➕ Kanal Qo'shish"]],
[['text'=>"➕ Hammaga ball berish"],],
[['text'=>$orqaga]],[['text'=>"➕Rubl berish"],['text'=>"➖Rubl ayirish"]],
]]);

if($tx==$bekor){
unlink("step/$idi.step");
bot('sendMessage',[
"chat_id"=>$idi,
"text"=>"Ok",
"reply_markup"=>$panel,
]);
}

$bkey = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>$bekor]],
]]);

if($tx=="/admin" and $idi==$admin){
bot('sendMessage',[
"chat_id"=>$admin,
"text"=>"Salom, Siz bot administratorisiz. Kerakli boʻlimni tanlang:",
"reply_markup"=>$panel,
]);
}

if($tx=="➕ Hammaga ball berish" and $idi==$admin){
file_put_contents("step/$idi.step","scoreall");
bot('SendMessage',[
'chat_id'=>$idi,
'text'=>"Kerakli Summani Kiriting:",
'reply_markup'=>$bkey,
]);
}

if($step=="scoreall" and $idi==$admin and $tx != $bekor){
$pl = $tx;
$Member = explode("n",$lichka);
$count = substr_count($lichka,"n");
for($z = 0;$z <= $count;$z++){
$user = $Member[$z];
$dat = file_get_contents("coin/$user.dat");
$put = $dat + $pl;
file_put_contents("coin/$user.dat","$put");
$pdat = file_get_contents("pmcoin/$user.dat");
$pput = $pdat + $pl;
file_put_contents("pmcoin/$user.dat","$pput");
SendMessage($user,html,"<b>🤖 barchaga $tx so'm bonus tarqatildi</b>");
}
unlink("step/$admin.step");
SendMessage($idi,html,"Foydalanuvchilarga $tx Ball Berildi!");
}

if($tx=="🖼 Forward xabar yuborish" and $idi==$admin){
file_put_contents("step/$idi.step","send_post");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Forward xabar yuboring:",
"reply_markup"=>$bkey,
]);
}

if($step=="send_post" and $idi==$admin and $tx != $bekor){
file_put_contents("stat/az.txt", $lichka);
$lich = file_get_contents("stat/az.txt");
unlink("stat/lichka.db");
$im = explode("n",$lich);
$us = substr_count($lich,"n");
for($i = 0; $i < $us; $i++){
$id = $im[$i];
$yu = bot('forwardMessage',[
"chat_id"=>$id,
"from_chat_id"=>$idi,
"message_id"=>$mid,
]);
if($yu->ok){
file_put_contents("stat/lichka.db","n".$id,FILE_APPEND);
}else{
unlink("coin/$id.dat");
unlink("step/$id.step");
unlink("soni/$id.soni");
unlink("pmcoin/$id.dat");
}
}
unlink("step/$idi.step");
$ok = substr_count(file_get_contents("stat/lichka.db") ,"n");
$no = $us - $ok;
SendMessage($idi,markdown,"🆗 Xabaringiz $ok ta odamga yuborildi!nn$no ta odamga yuborilmadi!nn♻️ Bot statistikasi yangilandi!");
}
//rubl ber
$ss=file_get_contents("admin.txt");
if($text=="➕Rubl berish" and $cid==$admin){
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
if($text=="➖Rubl ayirish" and $cid==$admin){
file_put_contents("admin.txt","coin1");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Foydalanuvchi hisobidan qancha rubl ayirmoqchisiz:",
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
💰 Sizning hisobingizdan admin tomonidan $summa rubl ayirildi!

Hozirgi hisobingiz: $jami rubl",
]);
}
if($okminus){
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"✅ Foydalanuvchi balansidan $summa rubl ayirildi!",
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
'text'=>"ʙᴏᴛɪᴍɪᴢ ᴀᴢᴏʟᴀʀɪ $lich ta
",
]);
}
//majburiya azolik
 if($text=="➕ Kanal Qo'shish" and $cid==$admin){
        bot('sendMessage',[
        "chat_id"=>$cid,
        "text"=>"<b>Majburiy azolik kanallarni o'zgartirish uchun 
        /ch1-kanaluseri @ belgisini qoymasdan!
        /ch2-kanaluseri @ belgisini qoymasdan!
        /ch3-kanaluseri @ belgisini qoymasdan! 
        kanalingiz shaxsiy kanal bo'lmasin
        xamma /ch1 /ch2 /ch3 larni aloxida xabar qilib yuboring!</b>",
        "parse_mode"=>"html",
        "reply_markup"=>$panel,
        ]);
        }
//
if(mb_stripos($text, "/ch1-")!==false){
    $m1 = explode("-",$text);
   $m2 = $m1[1];
   file_put_contents("ch1.txt","$m2");
   bot('sendMessage',[
  'chat_id'=>$admin,
  'text'=>"1-kanal @$m2 ga o'zgardi.\n\n🛠️Botni kanalingizda admin qiling!",
   ]);
  }
  if(mb_stripos($text, "/ch2-")!==false){
    $m1 = explode("-",$text);
   $m2 = $m1[1];
   file_put_contents("ch2.txt","$m2");
   bot('sendMessage',[
  'chat_id'=>$admin,
  'text'=>"2-kanal @$m2 ga o'zgardi\n\n🛠️Botni kanalingizda admin qiling!",
   ]);
  }
  if(mb_stripos($text, "/ch3-")!==false){
    $m1 = explode("-",$text);
   $m2 = $m1[1];
   file_put_contents("ch3.txt","$m2");
   bot('sendMessage',[
  'chat_id'=>$admin,
  'text'=>"3-kanal @$m2 ga o'zgardi!\n\n🛠️Botni kanalingizda admin qiling!",
   ]);
  }
  
//
if($text=="🗑 Kanal O'chirish" and $cid==$admin){
    bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Kanalni uzish uchun ochirilgan kanal orniga boshqa kanal qoshish kerak!
        
        Kanal uzish uchun 
        /ch1
        /ch2
        /ch3
        larni o'zgartiring!"
    ]);
}
if($text=="📄 Kanal Ro'yhati" and $cid==$admin){
bot('sendMessage',[
'chat_id'=>$admin, 
'text'=>"<i>Bot kanallari:\n\n $kanals \n bot kanallari soni: 3 ta.</i>", 
'parse_mode'=>'HTML', 
]);
}
//kanal parametrlar
if($tx == "🛠 Kanal parametrlari" and $cid == $admin){
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"<i>Majburiy a‘zolik kanallarini sozlash uchun pastagi tugmalar orqali kanalingizni ulang.</i>

<b>Eslatma:</b> <i>Majburiy a‘zolikga kiritilgan kanallaringizda ushbu botingiz admin bo‘lishi kerak aks holda bot ishlamaydi.</i>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"🎯Rek Kanal"]],
    ]
    ])
    ]);
    }
     $step = file_get_contents("stat/$cid.step");
   if($tx=="🎯Rek Kanal" and $cid==$admin){ 
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
   if($tx=="❤️Api Sozlash" and $cid==$admin){ 
bot('sendMessage',[ 
'chat_id'=>$admin, 
'text'=>"<i>Api kalitni  sozlash uchun yuboring, <b>uni ushbu saytdan olasiz </b> ‼️.</i>", 
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
if($tx=="👤 Azo uchun ball qo'shish" and $idi==$admin){
file_put_contents("step/$idi.step","balplus");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Ball qo'shmoqchi bo'lgan odamingiz ID raqamini kiriting:",
"reply_markup"=>$bkey,
]);
}     
      
if($step=="balplus" and $idi==$admin and $tx==$bekor){
if(strpos($lichka,"$tx") !==false){
file_put_contents("step/Admin.text","$tx");
file_put_contents("step/$idi.step","balli");
SendMessage($admin,html,"Qancha ball qo'shmoqchisiz:");
}else{
SendMessage($idi,html,"Botda bunday foydalanuvchi mavjud emas!");
}
}

if($step=="balli" and $idi==$admin and $tx==$bekor){
$ID = file_get_contents("step/Admin.text");
$bal =  file_get_contents("coin/$ID.dat");
$jami = $bal + $tx;
file_put_contents("coin/$ID.dat","$jami");
SendMessage($ID,html,"<b>📱 Hisobingiz $tx so'mga to'ldirildi.</b>");
bot("sendMessage",[
"chat_id"=>$admin,
"parse_mode"=>'markdown',
"text"=>"[Foydalanuvchi](tg://user?id=$ID) balansi $tx ballga toʻldirildi!",
"reply_markup"=>$panel,
]);
unlink("step/$idi.step");
unlink("step/Admin.text");
}

if($tx=="👁‍🗨 Prasmotr uchun ball qo'shish" and $idi==$admin){
file_put_contents("step/$idi.step","pmbalplus");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Ball qo'shmoqchi bo'lgan odamingiz ID raqamini kiriting:",
"reply_markup"=>$bkey,
]);
}     
      
if($step=="pmbalplus" and $idi==$admin and $tx==$bekor){
if(strpos($lichka,"$tx") !==false){
file_put_contents("step/Admin.text","$tx");
file_put_contents("step/$idi.step","pmballi");
SendMessage($admin,html,"Qancha ball qo'shmoqchisiz:");
}else{
SendMessage($idi,html,"Botda bunday foydalanuvchi mavjud emas!");
}
}

if($step=="pmballi" and $idi==$admin and $tx==$bekor){
$ID = file_get_contents("step/Admin.text");
$bal =  file_get_contents("pmcoin/$ID.dat");
$jami = $bal + $tx;
file_put_contents("pmcoin/$ID.dat","$jami");
SendMessage($ID,html,"💰 Hisobingiz: $tx ballga to'ldirildi!
Hozirgi hisobingiz: $jami");
bot("sendMessage",[
"chat_id"=>$admin,
"parse_mode"=>'markdown',
"text"=>"[Foydalanuvchi](tg://user?id=$ID) balansi $tx ballga toʻldirildi!",
"reply_markup"=>$panel,
]);
unlink("step/$idi.step");
unlink("step/Admin.text");
}
      
if($tx=="✖️ Ball ayirish" and $idi==$admin){
file_put_contents("step/$idi.step","balminus");
bot("sendMessage",[
"chat_id"=>$admin,
"text"=>"Ball ayirmoqchi bo'lgan odamingiz ID raqamini kiriting:",
"reply_markup"=>$bkey,
]);
}     

if($step=="balminus" and $idi==$admin and $tx==$bekor){
if(strpos($lichka,"$tx") !==false){
file_put_contents("step/Admin.text","$tx");
file_put_contents("step/$idi.step","balm");
SendMessage($admin,html,"Qancha ball ayirmoqchisiz:");
}else{
SendMessage($idi,html,"Botda bunday foydalanuvchi mavjud emas!");
}
}

if($step=="balm" and $idi==$admin and $tx==$bekor){
$ID = file_get_contents("step/Admin.text");
$bal =  file_get_contents("coin/$ID.dat");
$jami = $bal - $tx;
file_put_contents("coin/$ID.dat","$jami");
$ball =  file_get_contents("pmcoin/$ID.dat");
$jam = $ball - $tx;
file_put_contents("pmcoin/$ID.dat","$jam");
SendMessage($ID,html,"<b>📱 Hisobingizda $tx so'm ayrildi.</b>");
bot("sendMessage",[
"chat_id"=>$admin,
"parse_mode"=>'markdown',
"text"=>"[Foydalanuvchi](tg://use?id=$ID) balansidan $tx ball ayrildi!",
"reply_markup"=>$panel,
]);
unlink("step/$idi.step");
unlink("step/Admin.text");
}

if(strpos($tx,"/start")!==false){
bot('sendMessage',[
'chat_id'=>$idi,
'parse_mode'=>'markdown',
'text'=>$salom,
'reply_markup'=>$key,
]);
}


$ex = explode("=",$data);
$by = $ex[1];
$adm = $ex[2];
$ch = $ex[3];
if(stripos($data,"rekball=")!==false && stripos($lichka,"$from_id")!==false){
$ue = file_get_contents("Otabek/user/$mes_idi.txt");
if(stripos($ue,"$from_id") !== false){
bot('answercallbackquery', [
'callback_query_id'=>$id,
'text'=>"⚠️ Vazifani oldinroq bajargansiz.",
'show_alert'=> true,
]);
}else{
$okch = json_decode(file_get_contents("https://api.telegram.org/bot".BEK_KODER."/getChatMember?chat_id=@".$ch."&user_id=".$from_id))->result->status;
if($okch=='member' || $okch=='creator' || $okch=='administrator'){
$user = substr_count(file_get_contents("Otabek/user/$mes_idi.txt"),"n");
if($user>=5){
$rball = 0;
}else{
$rball = 1;
}
file_put_contents("Otabek/user/$mes_idi.txt","n".$from_id,FILE_APPEND);
$dat = file_get_contents("coin/$from_id.dat");
$get = $dat + $rball;
file_put_contents("coin/$from_id.dat","$get");
bot('answercallbackquery',[
'callback_query_id'=>$id,
'text'=>"✅ Sizning hisobingizga 1 so'm qo'shildi.",
'show_alert'=> true,
]);     
}else{
bot('answercallbackquery', [
'callback_query_id'=>$id,
'text'=>"‼️Kanalga obuna bo'lmadingiz",
'show_alert'=> true,
]);
}
}
$okey = substr_count(file_get_contents("Otabek/user/$mes_idi.txt"),"n");
$sh = substr_count(file_get_contents("Otabek/shikoyat/$mes_idi.txt"),"n"); 
if($okey>=$by){
DeleteMessage("@".$rek_channel,$mes_idi);     
SendMessage($adm,markdown,"*⏳ Sizning $mes_idi - soni buyurtmangiz muvaffaqiyatli bajarildi ✅*");
unlink("Otabek/user/$mes_idi.txt");
unlink("Otabek/shikoyat/$mes_idi.txt");
}
if(getAdmin($ch) != true){
DeleteMessage("@".$rek_channel,$mes_idi);     
SendMessage($adm,markdown,"*🗑 Sizning $mes_idi - sonli buyurtmangiz bekor qilindi.
📋 Sabab : Botni adminlikdan olib tashladingiz.*"); 
unlink("Otabek/user/$mes_idi.txt");
unlink("Otabek/shikoyat/$mes_idi.txt");
}   
bot('editmessagetext',[
'chat_id'=>"@".$rek_channel,
'parse_mode'=>'markdown',
'text'=>"*✅ Quyidagi kanalga obuna bo'ling:*

➡️ [@$ch]
*💵 Botga qayting va tekshirish tugmasini bosing
🤖 @$bot*",
'message_id'=>$mes_idi,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⏩ Kanalga kirish",'url'=>"https://t.me/$ch"],],
[['text'=>"✅ Tekshirish",'callback_data'=>"rekball=$by=$adm=$ch"],],
[['text'=>"🗄 ",'callback_data'=>"info=$by=$adm=$ch"],['text'=>"⚠",'callback_data'=>"shikoyat=$by=$adm=$ch"],['text'=>"🗑",'callback_data'=>"delete"],],
[['text'=>"➡ Botga kirish",'url'=>"https://t.me/$bot"],],
]])
]);
}




if(stripos($data,"shikoyat=")!==false && stripos($lichka,"$from_id")!==false){
$s = file_get_contents("Otabek/shikoyat/$mes_idi.txt");
if(stripos($s,"$from_id") !== false){
bot('answercallbackquery', [
'callback_query_id'=>$id,
'text'=>"❌ Ilgari shikoyat qilgansiz.",
'show_alert'=> true,
]);
}else{
file_put_contents("Otabek/shikoyat/$mes_idi.txt","n".$from_id,FILE_APPEND);
bot('answercallbackquery',[
'callback_query_id'=>$id,
'text'=>"⚠️ Shikoyat qilindi.",
'show_alert'=> true,
]);
$sh = substr_count(file_get_contents("Otabek/shikoyat/$mes_idi.txt"),"n");     
bot('sendMessage',[
'chat_id'=>$adm,
'parse_mode'=>'markdown',
'text'=>"*⚠️Sizning* [$mes_idi](https://t.me/$rek_channel/$mes_idi) *sonli buyurtmangiz shikoyat qilindi.*",
'disable_web_page_preview'=>true,
]);
}
$sh = substr_count(file_get_contents("Otabek/shikoyat/$mes_idi.txt"),"n");     
$okey = substr_count(file_get_contents("Otabek/user/$mes_idi.txt"),"n");
bot('editmessagetext',[
'chat_id'=>"@".$rek_channel,
'parse_mode'=>'markdown',
'text'=>"*✅ Quyidagi kanalga obuna bo'ling:*

➡️ [@$ch]
*💵 Botga qayting va tekshirish tugmasini bosing
🤖 @$bot*",
'message_id'=>$mes_idi,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⏩ Kanalga kirish",'url'=>"https://t.me/$ch"],],
[['text'=>"✅ Tekshirish",'callback_data'=>"rekball=$by=$adm=$ch"],],
[['text'=>"🗄 ",'callback_data'=>"info=$by=$adm=$ch"],['text'=>"⚠",'callback_data'=>"shikoyat=$by=$adm=$ch"],['text'=>"🗑",'callback_data'=>"delete"],],
[['text'=>"➡ Botga kirish",'url'=>"https://t.me/$bot"],],
]])
]);
if($sh>=5){
DeleteMessage("@".$rek_channel,$mes_idi); 
SendMessage($adm,markdown,"*⚠️ Shikoytlar 5 taga yetdi va buyurtma bekor qilindi 🗑
🆔 Buyurtma raqami : $mes_idi*");
unlink("Otabek/user/$mes_idi.txt");
unlink("Otabek/shikoyat/$mes_idi.txt");
}
if(getAdmin($ch) != true){                     
DeleteMessage("@".$rek_channel,$mes_idi); 
SendMessage($adm,markdown,"*🤖 Bot kanalda adminlikdan olindi va buyurtma bekor qilindi 🗑
🆔 Buyurtma raqami : $mes_idi*");        
unlink("Otabek/user/$mes_idi.txt");
unlink("Otabek/shikoyat/$mes_idi.txt");
}
}

if(stripos($data,"info=")!==false){
$idi = bot('getchat',['chat_id'=>"@".$ch,])->result->id;
$azolar = bot('getChatMembersCount',['chat_id'=>"@".$ch,])->result;
$okey = substr_count(file_get_contents("Otabek/user/$mes_idi.txt"),"n");
$sh = substr_count(file_get_contents("Otabek/shikoyat/$mes_idi.txt"),"n");
bot('answercallbackquery',[
'callback_query_id'=>$id,
'text'=>"🗄 Buyurtma haqida :

📚 Nomi : ".name($ch)."
🔗 Manzili : @$ch
🆔 Id raqami : $idi
🗣 Buyurtma : $by ta
✅ Bajarildi : $okey ta",
'show_alert' => true,
]);
if(getAdmin($ch) != true){                     
DeleteMessage("@".$rek_channel,$mes_idi); 
SendMessage($adm,markdown,"*🤖 Bot kanalda adminlikdan olindi va buyurtma bekor qilindi 🗑
🆔 Buyurtma raqami : $mes_idi*");        
unlink("Otabek/user/$mes_idi.txt");
unlink("Otabek/shikoyat/$mes_idi.txt");
}
}

$ex = explode("=",$data);
$fid = $ex[1];
$pm = $ex[2];
$adm = $ex[3];
if(stripos($data,"ostib=")!==false && strpos($lichka,"$from_id")!==false){
$ue = file_get_contents("Otabek/pmuseri/$mes_idi.txt");
if(strpos($ue,"$from_id") !== false){
bot('answercallbackquery', [
'callback_query_id'=>$id,
'text'=>"⚠️ Vazifani oldinroq bajargansiz.",
'show_alert'=>false,
]);
}else{
$user = substr_count(file_get_contents("Otabek/pmuseri/$mes_idi.txt"),"n");
if($user>=5){
$pball = 30;
}else{
$pball = 40;
}
file_put_contents("Otabek/pmuseri/$mes_idi.txt","n".$from_id,FILE_APPEND);
$dat = file_get_contents("pmcoin/$from_id.dat");
$get = $dat + $pball;
file_put_contents("pmcoin/$from_id.dat","$get");
bot('answercallbackquery',[
'callback_query_id'=>$id,
'text'=>"💰 Siz $pball ball oldingiz! Jami $get",
'show_alert'=>false,
]);     
}
$kk = substr_count(file_get_contents("Otabek/pmuseri/$mes_idi.txt"),"n");
$sh = substr_count(file_get_contents("Otabek/pmshikoyati/$mes_idi.txt"),"n"); 
bot('editmessagetext',[
'chat_id'=>"@".$pm_channel,
'parse_mode'=>'markdown',
'text'=>"*•Buyurtma raqami: $fid*n—————————————n•Ko'rish soni: *$pm *ta!n•Ko'rildi: *$kk* ta!n•Shikoyatlar: *$sh* ta!",
'message_id'=>$mes_idi,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Tekshirish",'callback_data'=>"ostib=$fid=$pm=$adm"],['text'=>"⚠",'callback_data'=>"mjalb=$fid=$pm=$adm"],],
]])
]);
if($kk>=$pm){
$del = $mes_idi - 1;
DeleteMessage("@".$pm_channel,$del);
DeleteMessage("@".$pm_channel,$mes_idi);
SendMessage($adm,markdown,"*🎊Sizning $fid - raqamli prasmotr buyurtmangiz muaffaqiyatli yakunlandi!n🎉Bizning botdan foydalanganingiz uchun katta rahmat!*");
unlink("Otabek/pmuseri/$mes_idi.txt");
unlink("Otabek/pmshikoyati/$mes_idi.txt");
}   
}

if(stripos($data,"mjalb=")!==false && strpos($lichka,"$from_id")!==false){
$s = file_get_contents("Otabek/pmshikoyati/$mes_idi.txt");
if(strpos($s,"$from_id") !== false){
bot('answercallbackquery', [
'callback_query_id'=>$id,
'text'=>"Siz shikoyat qilib bo'lgansiz❗️",
'show_alert'=>false
]);
}else{
file_put_contents("Otabek/pmshikoyati/$mes_idi.txt","n".$from_id,FILE_APPEND);
bot('answercallbackquery',[
'callback_query_id'=>$id,
'text'=>"☑️Shikoyatingiz qabul qilindi!",
'show_alert'=>false
]);
$sh = substr_count(file_get_contents("Otabek/pmshikoyati/$mes_idi.txt"),"n");   
$m_id = $mes_idi - 1;  
bot('sendMessage',[
'chat_id'=>$adm,
'parse_mode'=>'markdown',
'text'=>"*⭕️Sizning* [$m_id](https://t.me/$pm_channel/$m_id) *- sonli prasmotr buyurtmangiz* [foydalanuvchi](tg://user?id=$from_id) *tomonidan shikoyat qilindi!nn♻️Hozirgi shikoyatlar soni: $sh ta!nn✅Agar shikoyatlar soni 5 taga yetsa buyurtmangiz avtomatik o'chiriladi!*",
'disable_web_page_preview'=>true,
]);
}
$ok = substr_count(file_get_contents("Otabek/pmuseri/$mes_idi.txt"),"n");
$sh = substr_count(file_get_contents("Otabek/pmshikoyati/$mes_idi.txt"),"n");
bot('editmessagetext',[
'chat_id'=>"@".$pm_channel,
'parse_mode'=>'markdown',
'text'=>"*•Buyurtma raqami: $fid*n—————————————n•Ko'rish soni: *$pm* ta!n•Ko'rildi: *$ok* ta!n•Shikoyatlar: *$sh* ta!",
'message_id'=>$mes_idi,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Tekshirish",'callback_data'=>"postib=$fid=$pm=$adm"],['text'=>"⚠",'callback_data'=>"mjalb=$fid=$pm=$adm"],],
]])
]);
if($sh>=5){
$del = $mes_idi - 1;
DeleteMessage("@".$pm_channel,$del); 
DeleteMessage("@".$pm_channel,$mes_idi); 
SendMessage($adm,markdown,"*❌Sizning $del - sonli buyurtmangiz yakunlandi!n⭕️Sabab: Shikoyatlar soni 5 taga yetdi!*");
unlink("Otabek/pmuseri/$mes_idi.txt");
unlink("Otabek/pmshikoyati/$mes_idi.txt");
}
}  

if($tx=="📊 Statistika"){
$odam = substr_count($lichka,"n");
$rek = file_get_contents("stat/reklar.soni");
$post = file_get_contents("stat/forlar.soni");
bot('sendMessage',[ 
'chat_id'=>$idi, 
'parse_mode'=>'markdown', 
'text'=>"*📊 Statistika

- Bot a'zolari : *$odam
*- Buyurtmalar : *$rek",
'reply_markup'=>$key, 
]);
}  

if($tx=="🔗 Takliflar"){
bot('sendmessage',[
'chat_id'=>$idi,
'text'=>"*🔗 Sizning taklif havolangiz :

[https://t.me/$bot?start=$idi]

🔗 Havola orqali kirgan har bir do'stingiz uchun 1 so'mga ega bo'ling.*",
'parse_mode'=>'markdown',
'reply_markup'=>$key,
]);
}
  
if($tx=="💵 Pul Ishlash"){
bot('sendmessage',[
'chat_id'=>$idi,
'text'=>"*💵 Pul ishlash uchun kanalga kiring va kanallarga obuna bo'lib, tekshirish tugmasini bosing ✅*",
'parse_mode'=>'markdown',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➡️ Kanalga kirish",'url'=>"https://t.me/$rek_channel"]],
]])
]);
}

if($tx=="📱 Kabinet"){
if($users){
$users = "@$users";
}else{
$users = "🚫Kiritilmagan";
}	     
bot('sendMessage',[
'chat_id'=>$idi,
'parse_mode'=>'markdown',
'text'=>"*📱 Kabinet*

*💵 Sizning hisobingiz : *$ball *so'm
🆔 Id raqamingiz : *$idi",
'reply_markup'=>$key,
]);
}
    
if($tx=="📚 Ma'lumot"){
bot('sendMessage',[ 
'chat_id'=>$idi,
'parse_mode'=>'markdown', 
'text'=>"_🤖 Bot orqali kanalingizga faol o'zbek obunachilar va ko'rishlar sonini ko'paytirib olishingiz mumkin ✅_",
'reply_markup'=>json_encode([
'inline_keyboard'=>[ 
[['text'=>"➡ Admin",'url'=>"https://telegram.me/$adminuser"],],
]]) 
]); 
} 

if($tx==$orqaga){
unlink("step/$idi.step");
unlink("step/Admin.text");
bot('sendMessage',[
'chat_id'=>$idi,
'parse_mode'=>'markdown',
'text'=>"*🖥 Bosh sahifaga qaytdingiz*",
'reply_markup'=>$key,
]);
}
if($data=="orqaga"){
DeleteMessage($from_id,$mes_idi);
unlink("step/$from_id.step");
bot('sendMessage',[
'chat_id'=>$from_id,
'parse_mode'=>'markdown',
'text'=>"*🖥 Bosh sahifaga qaytdingiz*",
'reply_markup'=>$key,
]);
}  

if($tx=="🗄 Buyurtma"){
if($ball>=20){
$koder = $ball / 1;
$otabek = floor($koder);
bot('sendmessage', [
'chat_id'=>$idi,
'text'=>"*🔢 Nechta a'zo buyurtma qilmoqchisiz ?

1 ta a'zo = 1 so'm

📱 Sizda $ball so'm mavjud

🗣 Sizda $otabek ta a'zo uchun yetarli mablag' mavjud.

🤖 Kerakli a'zolar sonini kiriting ...*",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$mid,
'reply_markup'=>$key3,
]);
file_put_contents("step/$idi.step","kerakli");
}else{
bot('sendMessage',[ 
'chat_id'=>$idi, 
'parse_mode'=>'markdown', 
'text'=>"*⚠️ Buyurtma uchun eng kamida 20 so'm pul bo'lishi kerak

➡️ Sizning hisobingiz : $ball so'm*",
'reply_markup'=>$key,
]);
}
}

if($step=="kerakli"){
if($tx==$orqaga or $tx=="/start"){
unlink("step/$idi.step");
}else{
$fsom = file_get_contents("coin/$idi.dat");
$a = $tx * 1;
if($fsom>=$a){
bot('sendMessage',[
'chat_id'=>$idi,
'parse_mode'=>'markdown',
'text'=>"*🔗 Endi kanalingiz manzilini yuboring :

✅ Namuna : @Net_Seen_News*",
'reply_to_message_id'=>$mid,
'reply_markup'=>$key3,
]);
file_put_contents("step/$idi.step","reklama=$tx");
}else{
send($idi,html,"🗄 Ushbu buyurtmani ro'yxatdan o'tkazish uchun hisobingizda mablag' yetarli emas ⚠️");
}
}
} 

if(stripos($step,"reklama=")!==false){
if($tx==$orqaga or $tx=="/start"){ 
unlink("step/$idi.step");
}else{
$som = file_get_contents("coin/$idi.dat");
$by = str_replace("reklama=","",$step);
$a = $by * 1;
if($som>=$a){
if(stripos($tx,"@")!==false){
$get = bot('getChat',['chat_id'=>$tx]);
$types = $get->result->type;
$ch_name = $get->result->title;
$ch_user = $get->result->username;
if($types != "supergroup" and $types != "group"){
if($types=="channel"){
bot('sendMessage',[
'chat_id'=>$idi,
'parse_mode'=>'markdown',
'text'=>"🗄 Buyurtma :

- Kanal nomi : [$ch_name]
- Kanal manzili : [@$ch_user]
- Buyurtma : $by ta a'zo

Agar hammasi to'g'ri bo'lsa
« ✅ Tasdiqlash » tugmasini bosing.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Tasdiqlash",'callback_data'=>"true=$ch_user=$by"]],
]])
]);
file_put_contents("step/$idi.step","trueresult");
}else{
SendMessage($idi,markdown,"*⚠️ Bunday kanal topilmadi.
Tekshirib ko'rib, qayta urining.*");
}
}else{
send($idi,markdown,"*⚠️ Guruh qo'shish mumkin emas.*");
}
}else{
SendMessage($idi,markdown,"*📚 Namunadagidek yuboring

✅ Namuna : @Net_Seen_News*");
}
}else{
send($idi,html,"🗄 Ushbu buyurtmani ro'yxatdan o'tkazish uchun hisobingizda mablag' yetarli emas ⚠️");
}
}
}

if($fstep=="trueresult"){
if(stripos($data,"true=")!==false){
$ex = explode("=",$data);
$ch = $ex[1];
$by = $ex[2];
if(getAdmin($ch) != true){
bot('answercallbackquery', [
'callback_query_id'=>$id,
'text'=>"*🤖 Bot kanalda admin emas.
Tog'irlab, qayta urining.*",
'show_alert'=>true,
]);
}else{
DeleteMessage($from_id,$mes_idi);
$msg_id = bot('sendmessage',[
'chat_id'=>"@".$rek_channel,
'parse_mode'=>'markdown',
'text'=>"*✅ Quyidagi kanalga obuna bo'ling:*

➡️ [@$ch]
*💵 Botga qayting va tekshirish tugmasini bosing
🤖 @$bot*",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⏩ Kanalga kirish",'url'=>"https://t.me/$ch"],],
[['text'=>"✅ Tekshirish",'callback_data'=>"rekball=$by=$from_id=$ch"],],
[['text'=>"🗄 ",'callback_data'=>"info=$by=$from_id=$ch"],['text'=>"⚠",'callback_data'=>"shikoyat=$by=$from_id=$ch"],['text'=>"🗑",'callback_data'=>"delete"],],
[['text'=>"➡ Botga kirish",'url'=>"https://t.me/$bot"],],
]])
])->result->message_id;
unlink("step/$from_id.step");
if($msg_id>1){
file_put_contents("stat/reklar.soni", file_get_contents("stat/reklar.soni") + 1);
$ball = file_get_contents("coin/$from_id.dat");
$put = $ball - $by; 
file_put_contents("coin/$from_id.dat","$put"); 
bot('sendMessage',[
'chat_id'=>$from_id,
'parse_mode'=>'markdown',
'text'=>"*🗄 Buyurtma muvaffaqiyatli ro'yxatdan o'tdi.

⁉️ Eslatma : botni adminlikdan olmang. Buyurtma bekor qilinadi.*", 
'reply_markup'=>$key,
]);
bot('sendMessage',[
'chat_id'=>$from_id,
'text'=>"🗄 Buyurtmangizni ko'rish uchun
« ✅ Ko'rish » tugmasini bosing.", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Ko'rish",'url'=>"https://t.me/$rek_channel/$msg_id"]],
]])
]);
}else{
SendMessage($from_id,html,"<b>❌ Xatolik yuz berdi.</b>");
}
}
}
}

if($tx=="👁‍🗨 Prasmotr +++"){
$pmball = file_get_contents("pmcoin/$idi.dat");
if($pmball>=1){
$otabek = $pmball / 50;
$maxsudov = floor($otabek);
bot('sendMessage',[
'chat_id'=>$idi,
'text'=>"*• Qancha ko'rish buyurtma qilmoqchisiz?nn• Bitta ko'rish narxi 50 ball!n• Sizda $pmball ball bor!nn• Sizda $maxsudov ta ko'rish uchun yetarli ball mavjud!nn• Kerakli ko'rish sonini son bilan kiriting:*",
'parse_mode'=>'markdown',
'reply_markup'=>$key3,
]);
file_put_contents("step/$idi.step","korish");
}else{
bot('sendMessage',[ 
'chat_id'=>$idi, 
'parse_mode'=>'markdown', 
'text'=>"*• Sizning hisobingiz prasmotr buyurtma uchun yetarli emas!nn• Eng kamida sizda 1 ball bo'lish kerak!nn• Sizda $pmball ball bor!*",
'reply_markup'=>$key,
]);
}
}

if($step=="korish"){
$pmball = file_get_contents("pmcoin/$idi.dat");
if($tx==$orqaga or $tx=="/start"){
unlink("step/$idi.step");
}else{
$a = $tx * 50;
if($pmball>=$a){
file_put_contents("step/$idi.step","otabek=$tx");
SendMessage($idi,markdown,"✅*Postingizni ommaviy kanaldan Forward qilib yuboring!*");
}else{
SendMessage($idi,html,"❗️Ushbu raqamni ro'yxatdan o'tkazish uchun hisobingizda yetarlicha ball mavjud emas.");
}
}
}

if(stripos($step,"otabek=")!==false){
$pm = str_replace("otabek=","",$step);
if($tx=="/start" or $tx==$orqaga){ 
unlink("step/$idi.step");
}else{
$forchat_msgid = $update->message->forward_from_message_id;
$step = file_get_contents("step/$idi.step"); 
if($forchat_msgid != null && $step != "xxxxxxxx"){
$fwd_id = bot('forwardmessage',[ 
'chat_id'=>"@".$pm_channel, 
'from_chat_id'=>$idi,
'message_id'=>$mid,
])->result->message_id;
file_put_contents("step/$idi.step","xxxxxxxx"); 
bot('sendMessage', [
'chat_id'=>"@".$pm_channel,
'parse_mode'=>'markdown',
'text'=>"‌*•Buyurtma raqami: $fwd_id*n—————————————n•Ko'rish soni: *$pm* ta!n•Ko'rildi: *0* ta!n•Shikoyatlar: *0* ta!",
'reply_to_message_id'=>$fwd_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Tekshirish",'callback_data'=>"ostib=$fwd_id=$pm=$idi"],['text'=>"⚠",'callback_data'=>"mjalb=$fwd_id=$pm=$idi"],],
]]),
]);
file_put_contents("stat/forlar.soni",file_get_contents("stat/forlar.soni") +1);
$bal = file_get_contents("pmcoin/$idi.dat");
$put = $bal - $pm;
file_put_contents("pmcoin/$idi.dat","$put"); 
bot('sendmessage',[
'chat_id'=>$idi,
'parse_mode'=>'markdown',
'text'=>"✅ Yaxshi, Postingiz bizning [@$pm_channel] kanalimizga muvaffaqiyatli joylandi!", 
'reply_to_message_id'=>$mid,
'reply_markup'=>$key,
]); 
bot('sendMessage',[
'chat_id'=>$idi,
'text'=>"Buyurtmangizni ko'rish uchun pastdagi «👁 KO'RISH» tugmasini bosing!", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👁 KO'RISH",'url'=>"https://t.me/$pm_channel/$fwd_id"],],
]]),
]);
}else{
SendMessage($idi,markdown,"Iltimos, xabarni *Forward* qilib yuboring❗");
}
}
unlink("step/$idi.step");
}

if($type=="private"){
$rd = explode("n",$lichka);
if(!in_array($idi,$rd)){
file_put_contents("stat/lichka.db","n".$idi,FILE_APPEND);
}
}
     
?>