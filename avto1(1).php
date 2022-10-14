<?php
/*Bu avto rubl bot kodi kod @itmaktabi1 tominidan tarqatildi mualliflik huquqi buzilmasin*/
ob_start();
define("itmaktabi1","bot tokeni");
$aaa = "Adminuser";
$botname = itmaktabi1('getme',['bot'])->result->username;
$arays = array($arays,$admin);

function addstat($id){
    $check = file_get_contents("itmaktabi1.bot");
    $rd = explode("\n",$check);
    if(!in_array($id,$rd)){
        file_put_contents("itmaktabi1.bot","\n".$id,FILE_APPEND);
    }
}

function banstat($id){
    $check = file_get_contents("itmaktabi1.ban");
    $rd = explode("\n",$check);
    if(!in_array($id,$rd)){
        file_put_contents("itmaktabi1.ban","\n".$id,FILE_APPEND);
    }
}

function step($id,$value){
file_put_contents("itmaktabi1/$id.step","$value");
}

function stepbot($id,$value){
file_put_contents("itmaktabi1bot/$id.step","$value");
}

function typing($chatid){ 
return itmaktabi1("sendChatAction",[
"chat_id"=>$chatid,
"action"=>"typing",
]);
}

function joinchat($id){
     global $message_id,$referalsum,$firstname;
     $ch1 = file_get_contents("ch1.txt");
     $ret = itmaktabi1("getChatMember",[
         "chat_id"=>"@".$ch1."",
         "user_id"=>$id,
         ]);
$stat = $ret->result->status;
$ch2 = file_get_contents("ch2.txt");
$rets = itmaktabi1("getChatMember",[
         "chat_id"=>"@".$ch2."",
         "user_id"=>$id,
         ]);
$stats = $rets->result->status;
$ch3 = file_get_contents("ch3.txt");
$retus = itmaktabi1("getChatMember",[
         "chat_id"=>"@".$ch3."",
         "user_id"=>$id,
         ]);
$status = $retus->result->status;
         if((($stat=="creator" or $stat=="administrator" or $stat=="member") and ($stats=="creator" or $stats=="administrator" or $stats=="member") and ($status=="creator" or $status=="administrator" or $status=="member"))){
      return true;
         }else{
     itmaktabi1("sendMessage",[
         "chat_id"=>$id,
         "text"=>"<b>Botni ishlatish uchun quyidagi kanallarimizga obuna boʻling. Obuna boʻlgach Tasdiqlash tugmasini bosing.</b>",
         "parse_mode"=>"html",
         "reply_to_message_id"=>$message_id,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"➕ Obuna boʻlish","url"=>"https://t.me/".$ch1.""],],
[["text"=>"➕ Obuna boʻlish","url"=>"https://t.me/".$ch2.""],],
[["text"=>"➕ Obuna boʻlish","url"=>"https://t.me/".$ch3.""],],
[["text"=>"✅ Tasdiqlash","callback_data"=>"result"],],
]
]),
]);  
sleep(0);
     if(file_exists("itmaktabi1/".$id.".referalid")){
           $file =  file_get_contents("itmaktabi1/".$id.".referalid");
           $get =  file_get_contents("itmaktabi1/".$id.".channel");
           if($get=="true"){
            file_put_contents("itmaktabi1/".$id.".channel","failed");
            $minimal = $referalsum / 2;
            $user = file_get_contents("itmaktabi1/".$file.".pul");
            $user = $user - $minimal;
            file_put_contents("itmaktabi1/".$file.".pul","$user");
             itmaktabi1("sendMessage",[
             "chat_id"=>$file,
             "text"=>"<b>Sizning doʻstingiz</b>, <a href='tg://user?id=".$id."'>".$firstname."</a> <b>kanallarimizdam chiqib ketgani uchun ".$minimal."  ₽ jarimaga tortildingiz.</b>",
             "parse_mode"=>"html",
             "reply_markup"=>$menu,
             ]);
           }
         }  
return false;
}
}

function phonenumber($id){
     $phonenumber = file_get_contents("itmaktabi1/$id.contact");
      if($phonenumber==true){
      return true;
         }else{
     stepbot($id,"request_contact");
     itmaktabi1("sendPhoto",[
    "chat_id"=>$id,
"photo"=>"https://t.me/UzbSoat_UzBotNews/49113",
    "caption"=>"Iltimos, telefon raqamingizni kiriting:",
    "parse_mode"=>"html",
    "reply_markup"=>json_encode([
      "resize_keyboard"=>true,
      "one_time_keyboard"=>true,
      "keyboard"=>[
        [["text"=>"📲 Telefon raqamni yuborish","request_contact"=>true],],
]
]),
]);  
return false;
}
}

function reyting(){
    $text = "🏆 Eng koʻp ₱ ishlaganlar reytingi:
";
    $daten = [];
    $rev = [];
    $fayllar = glob("./itmaktabi1/*.*");
    foreach($fayllar as $file){
        if(mb_stripos($file,".pul")!==false){
        $value = file_get_contents($file);
        $id = str_replace(["./itmaktabi1/",".pul"],["",""],$file);
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
        $text.= "<b>{$order}</b>. <a href='tg://user?id={$id}'>{$id}</a> - "."<code>".$reversed[$i]."</code>"." <b>₽</b>"."\n";
    }
    return $text;
}

function itmaktabi1($method,$datas=[]){
    $url = "https://api.telegram.org/bot".itmaktabi1."/".$method;
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
$callbackdata = $update->callback_query->data;
$chatid = $message->chat->id;
$chat_id = $update->callback_query->message->chat->id;
$messageid = $message->message_id;
$id = $update->callback_query->id;
$fromid = $message->from->id;
$from_id = $update->callback_query->from->id;
$firstname = $message->from->first_name;
$first_name = $update->callback_query->from->first_name;
$lastname = $message->from->last_name;
$message_id = $update->callback_query->message->message_id;
$text = $message->text;
$contact = $message->contact;
$contactid = $contact->user_id;
$contactuser = $contact->username;
$contactname = $contact->first_name;
$phonenumber = $contact->phone_number;
$messagereply = $message->reply_to_message->message_id;
$user = $message->from->username;
$userid = $update->callback_query->from->username;
$query = $update->inline_query->query;
$inlineid = $update->inline_query->from->id;
$messagereply = $message->reply_to_message->message_id;
$soat = date("H:i:s",strtotime("2 hour")); 
$sana = date("d-M Y",strtotime("2 hour"));
$resultid = file_get_contents("itmaktabi1.bot");
$ban = file_get_contents("itmaktabi1/$chatid.ban");
$banid = file_get_contents("itmaktabi1/$chat_id.ban");
$sabab = file_get_contents("itmaktabi1/$chat_id.sabab");
$contact = file_get_contents("itmaktabi1/$chatid.contact");
$minimalsumma = file_get_contents("itmaktabi1/minimal.sum");
$sum = file_get_contents("itmaktabi1/$chatid.pul");
$sumid = file_get_contents("itmaktabi1/$chat_id.pul");
$jami = file_get_contents("itmaktabi1/summa.text");
$referal = file_get_contents("itmaktabi1/$chatid.referal");
$referalcallback = file_get_contents("itmaktabi1/$chat_id.referal");
$click = file_get_contents("itmaktabi1/$chatid.karta");
$paynet = file_get_contents("itmaktabi1/$chatid.paynet");
$click = file_get_contents("itmaktabi1/$chatid.click");
$referalsum = file_get_contents("itmaktabi1/referal.sum");
if(file_get_contents("itmaktabi1/minimal.sum")){
}else{    file_put_contents("itmaktabi1/minimal.sum","10000");
}
if(file_get_contents("itmaktabi1/$chatid.referal")){
}else{    file_put_contents("itmaktabi1/$chatid.referal","0");
}
if(file_get_contents("itmaktabi1/$chat_id.referal")){
}else{    file_put_contents("itmaktabi1/$chat_id.referal","0");
}
if(file_get_contents("itmaktabi1/summa.text")){
}else{    file_put_contents("itmaktabi1/summa.text","0");
}
if(file_get_contents("itmaktabi1/referal.sum")){
}else{    file_put_contents("itmaktabi1/referal.sum","0");
}
if(file_get_contents("itmaktabi1/$chatid.pul")){
}else{    file_put_contents("itmaktabi1/$chatid.pul","0");
}
if(file_get_contents("itmaktabi1/$chat_id.pul")){
}else{    file_put_contents("itmaktabi1/$chat_id.pul","0");
}
if(file_get_contents("itmaktabi1/$chat_id.sabab")){
}else{    file_put_contents("itmaktabi1/$chat_id.sabab","Botdan faqat O'zbekiston fuqarolari foydalanishi mumkin!");
}
$step = file_get_contents("itmaktabi1/$chatid.step");
$step = file_get_contents("itmaktabi1bot/$chatid.step");
mkdir("itmaktabi1");
mkdir("itmaktabi1bot");
if(!is_dir("itmaktabi1")){
  mkdir("itmaktabi1");
}

$menu = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"💵 ₽ ishlash"],],
[["text"=>"👔 Kabinet"],],
[["text"=>"🏆 Reyting",]],
]
]);

$panel = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"📊 Statistika"],],
[["text"=>"📤 Pochta tizimi"],['text'=>"📢 Kanallar boshqaruvi"],],
[["text"=>"💳 Balans boshqaruvi"],["text"=>"🔧 Narxlarni sozlash"],],
[["text"=>"🚫 Taqiqlar muharriri"],['text'=>"🔧 Adminlar boshqaruvi"],],
[['text'=>"🥝 Hamyonni boshqarish"],["text"=>"🔙 Orqaga"],],
]
]);

$pochta = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"📢 Xabar tarqatish"],],
[["text"=>"🔙 Admin paneli"],],
]
]);

$balans_manager = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"💳 Hisob tekshirish"],["text"=>"💳 Hisob toʻldirish"],],
[["text"=>"🔙 Admin paneli"],],
]
]);

$channel_manager = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"🗄 Majburiy obuna"],],
[["text"=>"🔙 Admin paneli"],],
]
]);

$narx_manager = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"👥 Taklif narxi"],["text"=>"📤 Minimal narx"],],
[["text"=>"🔙 Admin paneli"],],
]
]);

$ban_manager = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"🚫 Taqiq qoʻyish"],["text"=>"➖ Taqiqdan olish"],],
[["text"=>"🔙 Admin paneli"],],
]
]);

$admin_manager = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
        [['text'=>"➕ Admin qoʻshish"],['text'=>"🛑 Adminlikdan olish"],],
        [["text"=>"🔙 Admin paneli"],],
]
]);

$back = json_encode([
 "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"🔙 Orqaga"],],
]
]);



if(($step=="request_contact") and ($ban==false) and (isset($phonenumber))){
$phonenumber = str_replace("+","","$phonenumber");
if(joinchat($fromid)=="true"){
if((stripos($phonenumber,"998")!==false) or (stripos($phonenumber,"1")!==false)){
if($contactid==$chatid){
addstat($fromid);
if($user){
$username = "@$user";
}else{
$username = "$firstname";
}
if(file_exists("itmaktabi1/".$fromid.".referalid")){
$referalid = file_get_contents("itmaktabi1/".$fromid.".referalid"); 
$channel = file_get_contents("itmaktabi1/".$fromid.".channel");
$conts = file_get_contents("itmaktabi1/".$fromid.".login");
if($channel=="true" and $conts=="false"){
if(joinchat($referalid)=="true"){
file_put_contents("itmaktabi1/".$fromid.".login","true");
itmaktabi1("deleteMessage",[
"chat_id"=>$chat_id,
"message_id"=>$message_id,
]);
$user = file_get_contents("itmaktabi1/".$referalid.".pul");
$referalsum = $referalsum / 2;
$user = $user + $referalsum;
file_put_contents("itmaktabi1/".$referalid.".pul","$user");
$firstname = str_replace(["<",">","/"],["","",""],$firstname);
itmaktabi1("sendMessage",[
"chat_id"=>$referalid,
"text"=>"🎉 Sizning doʻstingiz <a href='tg://user?id=$fromid'>$firstname</a> botimizdan roʻyhatdan oʻtdi va sizga $referalsum ₽ taqdim etildi!",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}
}
$reply = itmaktabi1("sendMessage",[
"chat_id"=>$fromid,
"text"=>"🤑 Bot platformasidan ₱ ishlang va uni yechib oling!",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
itmaktabi1("sendMessage",[
"chat_id"=>$fromid,
"text"=>"🗄 Kerakli panelni tanlang:",
"parse_mode"=>"html",
"reply_to_message_id"=>$reply,
"disable_web_page_preview"=>true,
]);
$user = file_get_contents("itmaktabi1/".$referalid.".pul");
$referalsum = $referalsum / 2;
$user = $user + $referalsum;
file_put_contents("itmaktabi1/".$referalid.".pul","$user");
itmaktabi1("sendMessage",[
"chat_id"=>$referalid,
"text"=>"🎉 Sizning doʻstingiz <a href='tg://user?id=$fromid'>$firstname</a> roʻyhatdan oʻtishni yakunladi va sizga $referalsum ₽ taqdim etildi!",
"parse_mode"=>"html",
]);
unlink("itmaktabi1bot/$chatid.step");
file_put_contents("itmaktabi1/$chatid.contact","$phonenumber");
}else{
  addstat($chatid);
  itmaktabi1("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"🗄 Faqat oʻzingizni raqamingizni kiriting:",
    "parse_mode"=>"html",
    "reply_markup"=>json_encode([
      "resize_keyboard"=>true,
      "one_time_keyboard"=>true,
      "keyboard"=>[
        [["text"=>"📲 Telefon raqamni yuborish","request_contact"=>true],],
]
]),
]);
}
}else{
  banstat($chatid);
  itmaktabi1("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"❗ Kechirasiz, ushbu botdan faqag Oʻzbekoston fuqarolari foydalanishi mumkin!

Iltimos, Oʻzbekistondagi hisobingizdan foydalaning!",
    "parse_mode"=>"html",
    "reply_to_message_id"=>$messageid,
    "reply_markup"=>json_encode([
    "remove_keyboard"=>true,
    ]),
  ]);
unlink("itmaktabi1bot/$chatid.step");
file_put_contents("itmaktabi1/$chatid.ban","ban");
}
}
}

$admins=file_get_contents("admins.txt");

$admin = array("1948897525",$admins,"1948897525","1948897525");

$setadmin=file_get_contents("setadmin.txt");

if(in_array($chatid,$admin)){
    if($text=="🔧 Adminlar boshqaruvi"){
    itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"🔧 Siz 1 ta bot uchun 1 ta adminni bepul qoʻshishingiz mumkin.

Qoʻshilgan Adminlar Boshqaruv panelidan foydalanishi mumkin boʻladi.

Admin qoʻshing yoki olib tashlang:",
'reply_markup'=>$admin_manager,
    ]);unlink("setqiwi.txt");
}
}

if(in_array($chatid,$admin)){
    if($text=="➕ Admin qoʻshish"){
    if($admins==null){
    itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"👨‍💻 Admin qoʻshish uchun foydalanuvchi ID raqamini kiriting:
        ",
    ]);unlink("setqiwi.txt");
    file_put_contents("setadmin.txt","true");
    }else{
    itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"❗️Sizning Botingizda allaqachon Admin mavjud.
    
ℹ️ Yangi Admin qoʻshish uchun oldingi Adminni oʻchirishingiz zarur.",
    ]);unlink("setqiwi.txt");
    }
    }
    }

if($text=="🥝 Mening hisobim" and in_array($chatid,$admin)){
$mytoken=file_get_contents("qiwitoken.txt");
if($mytoken==null){
itmaktabi1('sendMessage',[
'chat_id'=>$chatid,
'text'=>"❗ Siz roʻyhatdan oʻtmagansiz!",
]);
}else{
$qiwiapi=file_get_contents("http://photo-edit.ml/test/QiwiBalance/index.php?token=$mytoken");
itmaktabi1('sendMessage',[
'chat_id'=>$chatid,
'text'=>$qiwiapi,
]);unlink("setqiwi.txt");
}
}


if($setadmin=="true"){
    $getext = file_get_contents("itmaktabi1.bot");
    if(is_numeric($text)){
    if(mb_stripos($getext,$text)!==false){
    itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"✅ Foydalanuvchi Adminlar roʻyhatiga qoʻshildi.
    
Yangi Admin uchun Botni Boshqarish imkoniyati ochiq. Hoxlasangiz, foydalanuvchini Adminlar roʻyhatidan oʻchirib tashlashingiz mumkin.
        
◾ Admin imkoniyatlari:
• Boshqaruv panelidan foydalanish.
• Toʻlovlarni amalga oshirish va bekor qilish.
• Foydalanuvchilarni taqiqlash.
• Balans va kanallarni oʻzgartirish.
• Foydalanuvchilarga xabar tarqatish.",
    ]);unlink("setadmin.txt");
    file_put_contents("admins.txt",$text);
    }else{
   itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"❇️ Ushbu foydalanuvchi Bot foydalanuvchilari orasida topilmadi.
    
Qayta urinib koʻring:
        ",
    ]);unlink("setadmin.txt");
    }
    }else{
    itmaktabi1('sendMessage',[
    'chat_id'=>$chatid,
    'text'=>"❗️Kechirasiz, faqat raqam kiritish lozim.
    
ℹ️ Siz kiritgan buyruqda harf va belgilar ishtirok etgan!
        
Iltimos, qaytadan urining:",
    ]);unlink("setadmin.txt");
    }
    }

    if(in_array($chatid,$admin)){
        if($text=="🛑 Adminlikdan olish"){
            if($admins==null){
                itmaktabi1('sendMessage',[
                    'chat_id'=>$chatid,
                    'text'=>"❗️Kechirasiz, sizning botingizda Admin mavjud emas.

Oʻchirish uchun oldin Admin qoʻshishingiz zarur.
                    ",
                ]);
            }else{
        itmaktabi1('sendMessage',[
            'chat_id'=>$chatid,
            'text'=>"🛑 Foydalanuvchi endi Bot Admini emas.

Foydalanuvchi uchun Botni Boshqarish imkoniyati oʻchirildi.",
        ]);unlink("admins.txt");
    }
}
    }

    if($text=="🥝 Hamyonni boshqarish" and in_array($chatid,$admin)){
        itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"Используйте настройки:",
        'reply_markup'=>json_encode([
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"🥝 Hamyonni ulash"],['text'=>"❌ Hamyonni oʻchirish"]],
        [['text'=>"🥝 Mening hisobim"],['text'=>"🔙 Admin paneli"]],
        ]
        ]),
        ]);
        }


        $setqiwi=file_get_contents("setqiwi.txt");
        if($text=="🥝 Hamyonni ulash" and in_array($chatid,$admin)){
        itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"Menga qiwi.com/api saytidagi Tokenni yuboring."
        ]);
        file_put_contents("setqiwi.txt",1);
        }
        
        if($setqiwi == "1"){
            $qiwiapi=file_get_contents("http://photo-edit.ml/test/QiwiBalance/index.php?token=$text");
            if(mb_stripos($qiwiapi,"неверный")!==false){
                itmaktabi1('sendMessage',[
                    'chat_id'=>$chatid,
                    'text'=>"❗Yaroqsiz token yoki maʼlumotlarni qidirish oʻchirilgan boʻlishi mumkin!",
                ]);
        unlink("setqiwi.txt");
        return false;
            }else{
             itmaktabi1('sendmessage',[
             'chat_id'=>$chatid,
             'text'=>"Qiwi hisobingiz muvaffaqiyatli ulandi.

$qiwiapi
",
        'parse_mode'=>"html",
        'reply_markup'=>$panel,
        ]);
        file_put_contents("qiwitoken.txt","$text");unlink("setqiwi.txt");
        }
        }

if($text=="❌ Hamyonni oʻchirish" and in_array($chatid,$admin)){
$mytoken=file_get_contents("qiwitoken.txt");
if($mytoken==null){
itmaktabi1('sendMessage',[
'chat_id'=>$chatid,
'text'=>"Siz roʻyhatdan oʻtmagansiz.",
'reply_markup'=>$panel,
]);
}else{
itmaktabi1('sendMessage',[
'chat_id'=>$chatid,
'text'=>"Hisobingiz botdan uzildi.",
]);
unlink("qiwitoken.txt");
}
}

if(in_array($chatid,$admin)){
if($text=="/admin"){
typing($chatid);
itmaktabi1('sendMessage',[
"chat_id"=>$chatid,
"text"=>"🔧 Siz admin panelidasiz.

✅ Barcha uskunalar sizni kutmoqda:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}
if(in_array($chatid,$admin)){
if($text=="🔙 Admin paneli"){
    typing($chatid);
    itmaktabi1("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"🗄 Admin paneli",
    "parse_mode"=>"html",
    "reply_markup"=>$panel,
    ]);
unlink("setkanal.txt");
unlink("itmaktabi1bot/$chatid.step");
    }
}

$setkanal=file_get_contents("setkanal.txt");
if(in_array($chatid,$admin)){
if($text == "1️⃣-Kanal"){
    itmaktabi1('sendMessage',[
    'chat_id'=>$chatid,
    'text'=>"🗄 Koʻrsatma boʻyicha kanalingizni kiriting:
Masalan: @itmaktab7
 
❕Ushbu xabar botga yuborilsa 1-kanalga @itmaktabi1 kanali ulanadi.
    "
        ]);
        file_put_contents("setkanal.txt","1");
    }
}
if(in_array($chatid,$admin)){
    if($text == "2️⃣-Kanal"){
        itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"🗄 Koʻrsatma boʻyicha kanalingizni kiriting:
Masalan: @itmaktabi1
 
❕Ushbu xabar botga yuborilsa 2-kanalga @itmaktabi1 kanali ulanadi.
        "
            ]);
            file_put_contents("setkanal.txt","2");
        }
    }

    if(in_array($chatid,$admin)){
        if($text=="🗄 Majburiy obuna"){
    itmaktabi1('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"📌 Foydalanuvchilarning Botga tashrifi 3 ta majburiy obuna kanaliga qoʻshilishiga olib keladi.

Bot ishga tushishi uchun 3 ta majburiy obuna kanalini ulashingiz lozim.

Ulamoqchi kanalni tanlang:",
        'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
                [['text'=>"1️⃣-Kanal"],['text'=>"2️⃣-Kanal"],['text'=>"3️⃣-Kanal"],],
                [['text'=>"🔙 Admin paneli"],],
            ]]),
    ]);
}
    }

    if(in_array($chatid,$admin)){
            if($text == "3️⃣-Kanal"){
                itmaktabi1('sendMessage',[
                'chat_id'=>$chatid,
                'text'=>"🗄 Koʻrsatma boʻyicha kanalingizni kiriting:
Masalan: @itmaktabi1
 
❕Ushbu xabar botga yuborilsa 1-kanalga @itmaktabi1 kanali ulanadi.
                "
                    ]);
                    file_put_contents("setkanal.txt","3");
                }
            }

            if(in_array($chatid,$admin)){
if(mb_stripos($text, "@")!==false and $setkanal=="1"){
	$m1 = explode("@",$text);
 $m2 = $m1[1];
 file_put_contents("ch1.txt","$m2");
 itmaktabi1('sendMessage',[
'chat_id'=>$chatid,
'text'=>"✅ 1-kanal @$m2 kanaliga oʻzgardi!

Botni kanalingizga Admin qilishni unutmang.",
 ]); unlink("setkanal.txt");
}
}
if(in_array($chatid,$admin)){
if(mb_stripos($text, "@")!==false and $setkanal=="2"){
	$m1 = explode("@",$text);
 $m2 = $m1[1];
 file_put_contents("ch2.txt","$m2");
 itmaktabi1('sendMessage',[
'chat_id'=>$chatid,
'text'=>"✅ 2-kanal @$m2 kanaliga oʻzgardi!

Botni kanalingizga Admin qilishni unutmang.",
 ]); unlink("setkanal.txt");
}
}
if(in_array($chatid,$admin)){
if(mb_stripos($text, "@")!==false and $setkanal=="3"){
	$m1 = explode("@",$text);
 $m2 = $m1[1];
 file_put_contents("ch3.txt","$m2");
 itmaktabi1('sendMessage',[
'chat_id'=>$chatid,
'text'=>"✅ 3-kanal @$m2 kanaliga oʻzgardi!

Botni kanalingizga Admin qilishni unutmang.",
 ]); unlink("setkanal.txt");
}
}

if(in_array($chatid,$admin)){
if($text=="💳 Balans boshqaruvi"){
typing($chatid);
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"💳 Balansni boshqarish rejimi:",
"parse_mode"=>"html",
"reply_markup"=>$balans_manager,
]);
}
}

if(in_array($chatid,$admin)){
if($text=="📤 Pochta tizimi"){
typing($chatid);
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"📤 Pochta tizimi sizga foydalanuvchilarga pochta tarqatishga yordam beradi.

Pochta tizimi orqali xabarlarni tarqating:",
"parse_mode"=>"html",
"reply_markup"=>$pochta,
]);
}
}

if(in_array($chatid,$admin)){
if($text=="📢 Kanallar boshqaruvi"){
typing($chatid);
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"📢 Ushbu boʻlim sizga botning shaxsiy kanallarini qoʻshishga yordam beradi.

Kanallarni targʻib qiling:",
"parse_mode"=>"html",
"reply_markup"=>$channel_manager,
]);
}
}

if(in_array($chatid,$admin)){
if($text=="🔧 Narxlarni sozlash"){
typing($chatid);
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"🔧 Ushbu uskuna botdagi daromad narxlarini targʻib qiladi.

Narxlarni sozlash uchun buyruqlardan foydalaning:",
"parse_mode"=>"html",
"reply_markup"=>$narx_manager,
]);
}
}

if(in_array($chatid,$admin)){
if($text=="🚫 Taqiqlar muharriri"){
typing($chatid);
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"🚫 Taqiqlar muharriri orqali foydalanuvchilarga taqiq qoʻying va qoʻyilgan taqiqdan ozod eting.

Taqiqni boshqarish uchun buyruqlardan foydalaning:",
"parse_mode"=>"html",
"reply_markup"=>$ban_manager,
]);
}
}

if(in_array($chatid,$admin)){
if($text=="📢 Xabar tarqatish"){
    stepbot($chatid,"send_post");
typing($chatid);
      itmaktabi1("sendMessage",[
      "chat_id"=>$chatid,
      "text"=>"📝 Rasmli xabar matnini kiriting:",
      "parse_mode"=>"html",
          "reply_markup"=>$orqaga,
          ]);
            }
        }
     if($step=="send_post"){
        $file_id = $message->photo[0]->file_id;
        $caption = $message->caption;
                $ok = itmaktabi1("sendPhoto",[
                  "chat_id"=>$chatid,
                  "photo"=>$file_id,
                  "caption"=>$caption,
                  "parse_mode"=>"markdown",
                ]);
                if($ok->ok){
                  itmaktabi1("sendPhoto",[
                    "chat_id"=>$chatid,
                    "photo"=>$file_id,
                      "caption"=>"$caption

Yaxshi, rasmni qabul qildim!
Endi tugmani na‘muna bo'yicha joylang.

<pre>[@itmaktabi1 + https://t.me/itmaktabi1]\n[@itmaktabi1 + https://t.me/itmaktabi1]</pre>",
"parse_mode"=>"html",
                      "disable_web_page_preview"=>true,
                    ]);
             file_put_contents("itmaktabi1bot/$chatid.text","$file_id{set}$caption");
             stepbot($chatid,"xabar_tugma");
         }
     }
     
    if($step=="xabar_tugma"){
      $xabar = itmaktabi1("sendMessage",[
        "chat_id"=>$chatid,
        "text"=>"Tayyorlanmoqda...",
      ])->result->message_id;
      itmaktabi1("deleteMessage",[
        "chat_id"=>$chat_id,
        "message_id"=>$xabar,
      ]);
   $usertext = file_get_contents("itmaktabi1bot/$chatid.text");
   $fileid = explode("{set}",$usertext);
   $file_id = $fileid[0];
   $caption = $fileid[1];
       preg_match_all("|\[(.*)\]|U",$text,$ouvt);
$keyboard = [];
foreach($ouvt[1] as $ouut){
$ot = explode("+",$ouut);
array_push($keyboard,[["url"=>"$ot[1]", "text"=>"$ot[0]"],]);
}
$ok = itmaktabi1("sendPhoto",[
"chat_id"=>$chatid,
"photo"=>$file_id,
"caption"=>"Sizning rasmingiz koʻrinishi:\n\n".$caption,
"parse_mode"=>"html",
"reply_markup"=>json_encode(
["inline_keyboard"=>
$keyboard
]),
]);
if($ok->ok){
$userlar = file_get_contents("itmaktabi1.bot");
$count = substr_count($userlar,"\n");
$count_member = count(file("itmaktabi1.bot"))-1;
  $ids = explode("\n",$userlar);
  foreach ($ids as $line => $id) {
    $clear = itmaktabi1("sendPhoto",[
"chat_id"=>$id,
"photo"=>$file_id,
"caption"=>$caption,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode(
["inline_keyboard"=>
$keyboard
]),
]);
unlink("itmaktabi1bot/$chatid.step");
}

if($clear){
$userlar = file_get_contents("itmaktabi1.bot");
$count = substr_count($userlar,"\n");
$count_member = count(file("itmaktabi1.bot"))-1;
  itmaktabi1("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"Xabar <b>$count_member</b> foydalanuvchilarga yuborildi!",
    "parse_mode"=>"html",
  ]);
}
}else{
  itmaktabi1("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"Tugmani kiritishda xato bor. Iltimos, qaytadan yuboring:",
  ]);
unlink("itmaktabi1bot/$chatid.step");  
}
}

if(in_array($chatid,$admin)){
if($text=="💳 Hisob tekshirish"){
typing($chatid);
stepbot($chatid,"result");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"Foydalanuvchi ID raqamini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$narx_manager,
]);
}
}

if($step=="result"){
typing($chatid);
if($text=="🔙 Admin paneli" or $text=="💳 Hisob tekshirish" or $text=="💳 Hisob toʻldirish"){
}else{
$sum = file_get_contents("itmaktabi1/$text.pul");
$referal = file_get_contents("itmaktabi1/$text.referal");
$raqam = file_get_contents("itmaktabi1/$text.contact");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"<b>Учетная запись пользователя:</b> <code>$sum</code>\n<b>Реферал пользователя:</b> <code>$referal</code>/n<b>Номер пользователя:</b><code>$raqam</code>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);unlink("itmaktabi1bot/$chatid.step");
}
}
if(in_array($chatid,$admin)){
if($text=="💳 Hisob toʻldirish"){
typing($chatid);
stepbot($chatid,"coin");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"Foydalanuvchi hisobini necha Rublga toʻldirmoqchisiz:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}

if($step=="coin"){
typing($chatid);
file_put_contents("itmaktabi1/$chatid.coin",$text);
if($text=="🔙 Admin pаneli" or $text=="💳 Hisob tekshirish" or $text=="💳 Hisob toʻldirish"){
}else{
stepbot($chatid,"pay");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"Foydalanuvchi ID raqamini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}

if($step=="pay"){
typing($chatid);
if($text=="🔙 Admin paneli" or $text=="💳 Hisob tekshirish" or $text=="💳 Hisob toʻldirish"){
}else{
$summa = file_get_contents("itmaktabi1/$chatid.coin");
$sum =  file_get_contents("itmaktabi1/$text.pul");
$jami = $sum + $summa;
file_put_contents("itmaktabi1/$text.pul","$jami");
itmaktabi1("sendMessage",[
   "chat_id"=>$text,
          "text"=>"💰 Sizning hisobingiz admin tomonidan $summa ₱-ga toʻldirildi!

Hozirgi hisobingiz: $jami ₱",
]);
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"✅ Foydalanuvchi balansi toʻldirildi!",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("itmaktabi1bot/$chatid.step");
}
}

if(in_array($chatid,$admin)){
if($text=="👥 Taklif narxi"){
typing($chatid);
stepbot($chatid,"referal");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"Yangi taklif narxini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}

if($step=="referal"){
typing($chatid);
if($text=="🔙 Admin paneli" or $text=="👥 Taklif narxi" or $text=="📤 Minimal narx"){
}else{
file_put_contents("itmaktabi1/referal.sum","$text");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"✅ Taklif narxi $text ₽-ga oʻzgardi!",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("itmaktabi1bot/$chatid.step");
}
}

if(in_array($chatid,$admin)){
if($text=="➖ Taqiqdan olish"){
stepbot($chatid,"unban");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"Foydalanuvchini ID raqamini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}


if($step=="unban"){
unlink("itmaktabi1/$text.ban");
if($text=="🔙 Admin paneli" or $text=="🚫 Taqiq qoʻyish" or $text=="➖ Taqiqdan olish"){
}else{
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"<a href='tg://user?id=$text'>Foydalanuvchi</a> <b>bandan olindi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("itmaktabi1bot/$chatid.step");
}
}

if(in_array($chatid,$admin)){
if($text=="🚫 Taqiq qoʻyish"){
stepbot($chatid,"sabab");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"🚫 Foydalanuvchiga nima sababdan taqiq qoʻymoqchisiz:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}

if($step=="sabab"){
file_put_contents("itmaktabi1/$chatid.sabab","$text");
itmaktabi1("sendMessage",[
"chat_id"=>$admin,
"text"=>"Foydalanuvchini ID raqamini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
stepbot($chatid,"ban");
}

if($step=="ban"){
banstat($text);
$sabab = file_get_contents("itmaktabi1/$chatid.sabab");
file_put_contents("itmaktabi1/$text.sabab","$sabab");
file_put_contents("itmaktabi1/$text.ban","ban");
if($text=="🔙 Admin paneli" or $text=="🚫 Taqiq qoʻyish" or $text=="➖ Taqiqdan olish"){
}else{
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"<a href='tg://user?id=$text'>Foydalanuvchiga</a> taqiq qoʻyildi.",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("itmaktabi1bot/$chatid.step");
itmaktabi1("sendMessage",[
"chat_id"=>$text,
"text"=>"❗ Hurmatli foydalanuvchi! Sizga botda taqiq qoʻyildi. Shu sababdan bot siz uchun yopiq!",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📃 Batafsil ma'lumot","callback_data"=>"sabab"],],
]
]),
]);
}
}

if(in_array($chatid,$admin)){
if($text=="📤 Minimal narx"){
typing($chatid);
stepbot($chatid,"minimalsumma");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"Minimal pul yechish narxini kiriting:",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}


if($step=="minimalsumma"){
typing($chatid);
if($text=="🔙 Admin paneli" or $text=="👥 Taklif narxi" or $text=="📤 Minimal narx"){
}else{
file_put_contents("itmaktabi1/minimal.sum","$text");
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"✅ Minimal pul yechish narxi $text ₱-ga oʻzgardi!",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("itmaktabi1bot/$chatid.step");
}
}

if($callbackdata=="back" and $banid==false){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
itmaktabi1("deleteMessage",[
"chat_id"=>$chat_id,
"message_id"=>$message_id,
]);
itmaktabi1("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"🏠 Bosh sahifa",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}



if($text=="💵 ₽ ishlash" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
if($user){
$username = "@$user";
}else{
$username = "$firstname";
}
itmaktabi1("sendPhoto",[
    "chat_id"=>$chatid,
"photo"=>"https://t.me/UzbSoat_UzBotNews/49113",
    "caption"=>"✅ ₱ ishlash uchun moʻljallangan Bot!

$username doʻstingizdan taklif havolasi! Boshlash uchun bosing:
https://t.me/$botname?start=$chatid",
"parse_mode"=>"html",
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"↗️ Doʻstlarga yuborish","switch_inline_query"=>$chatid],],
]
]),
]);
}
}

if($text=="👔 Kabinet" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
itmaktabi1("sendPhoto",[
"chat_id"=>$chatid,
"photo"=>"https://t.me/UzbSoat_UzBotNews/49113",
"caption"=>"Sizning hisobingiz: <code>$sum</code> ₱
Taklifingiz: <code>$referal</code> ta
Bot toʻladi: <code>$jami</code> ₱
Minimal narx: <code>$minimalsumma</code> ₽",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📤 ₽ yechish","callback_data"=>"production"],],
]
]),
]);
}
}


if($text=="🏆 Reyting" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$reyting = reyting();
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"$reyting",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($text=="🔙 Orqaga" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
addstat($chatid);
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"🏠 Bosh sahifa",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
unlink("itmaktabi1/$chatid.step");
unlink("itmaktabi1bot/$chatid.step");
}
}

if((stripos($text,"/start")!==false) && ($ban==false)){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
addstat($fromid);
if($user){
$username = "@$user";
}else{
$username = "$firstname";
}
$reply = itmaktabi1("sendMessage",[
"chat_id"=>$fromid,
"text"=>"🤑 Bot platformasida ₱ ishlang va tezkor yechib oling!

Ushbu Bot @Vertualprorobot yordamida yaratilgan.",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
itmaktabi1("sendMessage",[
"chat_id"=>$fromid,
"text"=>"✅ Kerakli panelni tanlang:",
"parse_mode"=>"html",
"reply_to_message_id"=>$reply,
"disable_web_page_preview"=>true,
]);
}
}

if((stripos($text,"/start")!==false) && ($ban==false)){
$public = explode("*",$text);
$refid = explode(" ",$text);
$refid = $refid[1];
if(strlen($refid)>0){
$idref = "itmaktabi1/$refid.id";
$idrefs = file_get_contents($idref);
$userlar = file_get_contents("itmaktabi1.bot");
$explode = explode("\n",$userlar);
if(!in_array($chatid,$explode)){
file_put_contents("itmaktabi1.bot","\n".$chatid,FILE_APPEND);
}
if($refid==$chatid and $ban==false){
      itmaktabi1("sendMessage",[
      "chat_id"=>$chatid,
      "text"=>"☝️ <b>Hurmatli foydalanuvchi!</b>

Botga o'zingizni taklif qila olmaysiz!",
      "parse_mode"=>"html",
      "reply_to_message_id"=>$messageid,
      ]);
      }else{
    if((stripos($userlar,"$chatid")!==false) and ($ban==false)){
      itmaktabi1("sendMessage",[
      "chat_id"=>$chatid,
      "text"=>"<b>Hurmatli foydalanuvchi!</b>

Doʻstingiz sizni taklif qila olmaydi!",
"parse_mode"=>"html",
"reply_to_message_id"=>$messageid,
]);
}else{
$id = "$chatid\n";
$handle = fopen("$idref","a+");
fwrite($handle,$id);
fclose($handle);
file_put_contents("itmaktabi1/$fromid.referalid","$refid");
file_put_contents("itmaktabi1/$fromid.channel","false");
file_put_contents("itmaktabi1/$fromid.login","false");
      itmaktabi1("sendMessage",[
      "chat_id"=>$refid,
"text"=>"👏 Siz taklif qilgan <a href='tg://user?id=$fromid'>$firstname</a> botimizga qoʻshildi. Doʻstingiz kanallarimizga qoʻshilgandan soʻng sizga taklif puli taqdim etiladi!",
"parse_mode"=>"html",
]);
}
}
}
}

if($callbackdata=="result" and ($banid==false)){
addstat($from_id);
if((joinchat($from_id)=="true")  and ($banid==false)){
if(phonenumber($from_id)=="true"){
if($userid==true){
$result = "@$userid";
}else{
$result = "$first_name";
}
itmaktabi1("deleteMessage",[
"chat_id"=>$from_id,
"message_id"=>$message_id,
]);
$reply = itmaktabi1("sendMessage",[
"chat_id"=>$from_id,
"text"=>"🤑 Bot platformasida ₱ ishlang va tezkor yechib oling!

Ushbu Bot @Vertualprorobot yordamida yaratilgan.",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
itmaktabi1("sendPhoto",[
    "chat_id"=>$from_id,
"photo"=>"https://t.me/UzbSoat_UzBotNews/49113",
    "caption"=>"✅ Kerakli panelni tanlang:",
"parse_mode"=>"html",
"reply_to_message_id"=>$reply,
"disable_web_page_preview"=>true,
]);
}
$time =  microtime(true);
$random  = rand(999999,3456789);
usleep($random);
$current  = microtime(true)-$time;
usleep($current);
if($referalsum==true){
if(file_exists("itmaktabi1/".$from_id.".referalid")){
$referalid = file_get_contents("itmaktabi1/".$from_id.".referalid");
if(joinchat($referalid)=="true"){
$is_user = file_get_contents("itmaktabi1/".$from_id.".channel");
$login = file_get_contents("itmaktabi1/".$from_id.".login");
if($is_user=="false" and $login=="false"){
$minimal = $referalsum / 2;
$user = file_get_contents("itmaktabi1/".$referalid.".pul");
$user = $user + $minimal;
file_put_contents("itmaktabi1/".$referalid.".pul","$user");
$referal = file_get_contents("itmaktabi1/".$referalid.".referal");
$referal = $referal + 1;
file_put_contents("itmaktabi1/".$referalid.".referal",$referal);
file_put_contents("itmaktabi1/".$from_id.".channel","true");
$firstname = str_replace(["<",">","/"],["","",""],$firstname);
itmaktabi1("sendMessage",[
"chat_id"=>$referalid,
"text"=>"
👏 Tabriklaymiz! Sizning doʻstingiz <a href='tg://user?id=".$from_id."'>".$first_name."</a> kanallarga obuna boʻldi va sizga ".$minimal." soʻm taqdim etildi!
Doʻstingiz roʻyxatdan oʻtsa sizga yana ".$minimal." soʻm taqdim etiladi!
",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
file_put_contents("itmaktabi1/".$from_id.".referalid",$referalid);
}
}
}
}
}else{
itmaktabi1("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Siz hali kanallarga obuna boʻlmadingiz!",
"show_alert"=>false,
]);
}
}

if($callbackdata=="production" and $banid==false){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
if($sumid>=$minimalsumma){
    itmaktabi1("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]);
 itmaktabi1("sendMessage",[
    "chat_id"=>$chat_id,
          "text"=>"💰 Sizning hisobingizda $sumid soʻm mavjud!

Pulingizni yechib olish uchun hamyonlarni birini tanlang:",
          "parse_mode"=>"html",
          "reply_markup"=>json_encode([
              "inline_keyboard"=>[
                  [["text"=>"💳 Qiwi","callback_data"=>"qiwi"],],
                  [["text"=>"🔙 Orqaga","callback_data"=>"back"],],
                  ]
                  ])
                  ]);
        }else{
          $som = $minimalsumma - $sumcallback;
          itmaktabi1("answerCallbackquery",[
              "callback_query_id"=>$id,
              "text"=>"☝️ Sizning hisobingizda mablag' yetarli emas!\nSizga yana mablag'ni yechib olish uchun $som ₱ kerak!\nSizning hisobingizda: $sumid ₱ mavjud!",
              "show_alert"=>true,
]);
}
}
}

if($callbackdata=="qiwi" and $banid==false){ 
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
if($sumid>=$minimalsumma){
  $paynet = file_get_contents("itmaktabi1/$chat_id.paynet");
          itmaktabi1("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]);
 itmaktabi1("sendMessage",[
    "chat_id"=>$chat_id,
              "text"=>"Yechib olmoqchi boʻlgan Qiwi raqamingizni kiriting!\nNa'muna: 998901234567",
          "reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
    [["text"=>"🔙 Orqaga"],],
                  ]
                  ])
                  ]);
stepbot($chat_id,"raqam");
        }else{
          $som = $minimalsumma - $sumcallback;
          itmaktabi1("answerCallbackquery",[
              "callback_query_id"=>$id,
              "text"=>"☝️ Sizning hisobingizda mablagʻ yetarli emas!\nSizga yana mablagʻni yechib olish uchun $som ₱ kerak!\nSizning hisobingizda: $sumid ₱ mavjud!",
              "show_alert"=>true,
]);
}
}
}

if($step=="raqam" and $ban==false){
if($sum>=$minimalsumma){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$hisob = file_get_contents("itmaktabi1/$chatid.pul");
stepbot($chatid,"summa");
              itmaktabi1("sendMessage",[
                  "chat_id"=>$chatid,
                  "text"=>"💳 Toʻlov miqdorini kiriting.\n💰 Sizning hisobingizda: $hisob ₱ mavud!",
"reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$sum"],],
    [["text"=>"🔙 Orqaga"],],
                  ]
                  ])
                  ]);
file_put_contents("itmaktabi1/$chatid.paynet","$text");
file_put_contents("itmaktabi1/$chatid.raqam","$text");
}
}else{
          itmaktabi1("sendMessage",[
              "chat_id"=>$chatid,
              "text"=>"❗️Qiwi hamyon raqamingizni kiriting!\nNa'muna: 998901234567",
              ]);
}
}

if($step=="summa" and $sum>=$minimalsumma and $step!="raqam" and $ban==false){
if($text=="/start" or $text=="🔙 Orqaga"){
unlink("itmaktabi1bot/$chatid.step");
}else{
if(stripos($text,"+")!==false){
}else{
$hisob = file_get_contents("itmaktabi1/$chatid.pul");
if($text>=$minimalsumma and $hisob>=$text){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$admins=file_get_contents("admins.txt");
$adminstr = ['[*ADMIN*]',$admins];
foreach($adminstr as $adminstrator){
$puts = $hisob - $text;
file_put_contents("itmaktabi1/$chatid.pul","$puts");
$jami = file_get_contents("itmaktabi1/summa.text");
$ch4 = file_get_contents("ch4.txt");
$jami = $jami + $text;
file_put_contents("itmaktabi1/summa.text","$jami");
file_put_contents("itmaktabi1/$chatid.textsum","$text");
       $first_name = str_replace(["[","]","|"],["","",""],$firstname);
       itmaktabi1("sendMessage",[
           "chat_id"=>$chatid,
           "text"=>"So'rovlar yakunlandi!\nToʻlov Bir necha daqiqa ichida amalga oshiriladi!\nToʻlov qilinganligi haqida sizga oʻzimiz bot orqali xabar beramiz!",
"reply_markup"=>$menu,
]);
$raqam = file_get_contents("itmaktabi1/$chatid.raqam");
$referal = file_get_contents("itmaktabi1/$chatid.referal");
$miqdor = file_get_contents("itmaktabi1/$chatid.textsum");
$to=file_get_contents("qiwitoken.txt");
sleep(3);
itmaktabi1('sendMessage',[
    "chat_id"=>"-1001550704449",
    'text'=>"Rubl miqdori: $text
Raqam: $raqam

✅ Muvaffaqiyatli toʻlandi.
    ",
]);
itmaktabi1('sendMessage',[
    'chat_id'=>$chatid,
    'text'=>"Rubl miqdori: $text
Raqam: $raqam

✅ Muvaffaqiyatli toʻlandi.
    ",
]);
$xolat=file_get_contents("http://u4500.xvest5.ru/qiwi/script.php?summa=$miqdor&number=$raqam&token=$to&comment=$botname");
unlink("itmaktabi1/$chatid.raqam");
unlink("itmaktabi1/$chatid.textsum");
return false;
itmaktabi1("sendMessage",[
              "chat_id"=>"-1001550704449",
              "text"=>"Foydalanuvchiga ₽ toʻlandi!

🔢 Rubl miqdori: $raqam
👥 Takliflar soni: $referal
💰 To'lov miqdori: $text ₱

✅ To'landi!",
                      ]);
unlink("itmaktabi1bot/$chatid.step");
        }
    }
}else{
itmaktabi1("sendmessage",[
"chat_id"=>$chatid,
            "text"=>"💵 Sizning hisobingizda siz yechib olmoqchi boʻlgan pul mavjud emas!\nSiz faqat $hisob soʻm pulni yechib olishingiz mumkin!",
          ]);
unlink("itmaktabi1bot/$chatid.step");
}
}
}
}

if($callbackdata=="click" and $banid==false){
if($sumid>=$minimalsumma){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$clickraqam = file_get_contents("itmaktabi1/$chat_id.click");
     itmaktabi1("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]);
 itmaktabi1("sendMessage",[
    "chat_id"=>$chat_id,
              "text"=>"❗️ Click karta raqamingizni kiriting!\nNa'muna: 8600000000000000",
          "reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$clickraqam"],],
                  [["text"=>"🔙 Orqaga"],],
                  ]
                  ])
                  ]);
stepbot($chat_id,"clickraqam");
        }else{
          $som = $minimalsumma - $sum;
          itmaktabi1("answerCallbackquery",[
              "callback_query_id"=>$id,
              "text"=>"☝️ Sizning hisobingizda mablag' yetarli emas!\nSizga yana mablag'ni yechib olish uchun $som so'm kerak!\nSizning hisobingizda: $sumid so'm mavjud!",
              "show_alert"=>true,
]);
}
}
}

if($step=="clickraqam" and $ban==false){
if(strlen($text)==16){
if($sum>=$minimalsumma){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$hisob = file_get_contents("itmaktabi1/$chatid.pul");
stepbot($chatid,"clicksumma");
              itmaktabi1("sendMessage",[
                  "chat_id"=>$chatid,
                  "text"=>"💳 To'lov miqdorini kiriting.\n💰 Sizning hisobingizda: $hisob so'm mavud!",
"reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$sum"],],
    [["text"=>"🔙 Orqaga"],],
                  ]
                  ])
                  ]);
              file_put_contents("itmaktabi1/$chatid.click","$text");
file_put_contents("itmaktabi1/$chatid.raqam","$text");
}
}
}else{
itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"❗️ Click karta raqamingizni kiriting!\nNa'muna: 8600000000000000",
              ]);
      }
    }

if($step=="clicksumma" and $sum>=$minimalsumma and $step!="clickraqam" and $ban==false){
if($text=="/start" or $text=="🔙 Orqaga"){
itmaktabi1("itmaktabi1bot/$chatid.step");
}else{
if(stripos($text,"8600")!==false){
}else{
$hisob = file_get_contents("itmaktabi1/$chatid.pul");
if($text>=$minimalsumma and $hisob>=$text){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$adminstr = ['[*ADMIN*]','$admins'];
foreach($adminstr as $adminstrator){
$puts = $hisob - $text;
file_put_contents("itmaktabi1/$chatid.pul","$text");
file_put_contents("itmaktabi1/$chatid.pul","$puts");
$jami = file_get_contents("itmaktabi1/summa.text");
$ch4 = file_get_contents("ch4.txt");
$jami = $jami + $text;
file_put_contents("itmaktabi1/summa.text","$jami");
file_put_contents("itmaktabi1/$chatid.textsum","$text");
       $firstname = str_replace(["[","]","|"],["","",""],$firstname);
       itmaktabi1("sendMessage",[
           "chat_id"=>$chatid,
           "text"=>"⏰ So'rovlar yakunlandi!\nTo'lov Bir necha daqiqa ichida amalga oshiriladi!\nTo'lov qilinganligi haqida sizga o'zimiz bot orqali xabar beramiz!",
"reply_markup"=>$menu,
]);
itmaktabi1("sendMessage",[
              "chat_id"=>$adminstrator,
              "text"=>"💳 Foydalanuvchi pul yechib olmoqchi!\nKimdan: $firstname\nRaqami: $click\nTolov miqdori: $text som",
          "parse_mode"=>"HTML",
          "reply_markup"=>json_encode([
                  "inline_keyboard"=>[
[["callback_data"=>"send|$chatid|$firstname","text"=>"💳 Tolov qabul qilindi"]],
[["callback_data"=>"no|$chatid|$firstname","text"=>"💳 Tolov bekor qilindi"]],
[["callback_data"=>"ban|$chatid|$firstname","text"=>"🚫 Taqiq qoyish"]],
                        ]
                       ])
                      ]);
                      unlink("itmaktabi1bot/$chatid.step");
                    }
                    }
                }else{
          itmaktabi1("sendMessage",[
              "chat_id"=>$chatid,
            "text"=>"💵 Sizning hisobingizda siz yechib olmoqchi bo'lgan pul mavjud emas!\nSiz faqat $hisob so'm pulni yechib olishingiz mumkin!",
              "reply_markup"=>$menu,
]);
unlink("itmaktabi1bot/$chatid.step");
}
}
}
}

if((stripos($callbackdata,"send|")!==false)){
    $admins=file_get_contents("admins.txt");
$adminstr = ['[*ADMIN*]',$admins];
foreach($adminstr as $adminstrator){
    itmaktabi1("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]); 
       $ex = explode("|",$callbackdata);
       $id = $ex[1];
       $name = $ex[2];
$raqam = file_get_contents("itmaktabi1/$id.raqam");
$referal = file_get_contents("itmaktabi1/$id.referal");
$miqdor = file_get_contents("itmaktabi1/$id.textsum");
$ch4 = file_get_contents("ch4.txt");
itmaktabi1("sendMessage",[
"chat_id"=>$adminstrator,
"text"=>"Rubl toʻlandi!\n\n🗣 Foydalanuvchi: $name\n🔢 Qiwi raqam: $number\n👥 Takliflar soni: $referral\n💰 Toʻlov miqdori: $sum ₽\n\n✅ Muvaffaqiyatli!",
"parse_mode"=>"HTML",
]);
       itmaktabi1("sendMessage",[
              "chat_id"=>$chatid,
              "text"=>"<b>Hurmatli $name!</b>\n<b>Botdan yechib olgan pulingiz toʻlab berildi.\Iltimos, fikringizni qoldiring!</b>",
              "parse_mode"=>"html",
               "reply_markup"=>json_encode([   
   "inline_keyboard"=>[
[["text"=>"👨‍💻 Admin","url"=>"https://telegram.me/$aaa"],],
]
]),
]);
}
}

if((stripos($callbackdata,"no|")!==false)){
        itmaktabi1("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]); 
       $ex = explode("|",$callbackdata);
       $id = $ex[1];
       $name = $ex[2];
       itmaktabi1("sendMessage",[
              "chat_id"=>$id,
              "text"=>"<b>Hurmatli $name!</b>\n<b>Botdan yechib olgan pulingiz bekor qilindi!</b>",
              "parse_mode"=>"html",
               "reply_markup"=>$menu,
]);
}
/*Bu avto rubl bot kodi kod @itmaktabi1 tominidan tarqatildi mualliflik huquqi buzilmasin*/
if((stripos($callbackdata,"ban|")!==false)){
        itmaktabi1("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]); 
       $ex = explode("|",$callbackdata);
       $id = $ex[1];
       $name = $ex[2];
file_put_contents("itmaktabi1/$id.ban","ban");
itmaktabi1("sendMessage",[
"chat_id"=>$id,
"text"=>"Hurmatli foydalanuvchi!\nSiz botdagi administrator tomonidan bloklangansiz. Shunday qilib, siz botdan foydalana olmaysiz!",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📃 Batafsil ma'lumot","callback_data"=>"sabab"],],
]
]),
]);
}

if(mb_stripos($query,"$inlineid")!==false){
$user = $update->inline_query->from->username;
$firstname = $update->inline_query->from->first_name;
if($user){
$username = "@$user";
}else{
$username = "$firstname";
}
itmaktabi1("answerInlineQuery",[
"inline_query_id"=>$update->inline_query->id,
"cache_time"=>1,
"results"=>json_encode([[
"type"=>"article",
"id"=>base64_encode(1),
"title"=>"🎈 Taklif havolasi",
"description"=>"$username doʻstingizdan taklif havolasi.",
"thumb_url"=>"https://yearling-truck.000webhostapp.com/demo/download.png",
"input_message_content"=>[
"disable_web_page_preview"=>true,
"parse_mode"=>"html",
"message_text"=>"✅ ₱ ishlash uchun moʻljallangan Bot!

$username doʻstingizdan taklif havolasi! Boshlash uchun bosing:
https://t.me/$botname?start=$inlineid"],
"reply_markup"=>[
"inline_keyboard"=>[
[["text"=>"🚀 Boshlash","url"=> "https://t.me/$botname?start=$inlineid"],],
]]
],
])
]);
}
/*Bu avto rubl bot kodi kod @itmaktabi1 tominidan tarqatildi mualliflik huquqi buzilmasin*/
if($text=="🗒 Qoʻllanma" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
itmaktabi1("sendPhoto",[
"chat_id"=>$chatid,
"photo"=>"https://t.me/UzbSoat_UzBotNews/49113",
"caption"=>"<b>Savol - botda qanday qilib pul ishlash mumkin?</b>\n\n<b>Javob - botda pul ishlash juda oson, pul ishlash tugmasini bosing. Sizga berilgan unikal-havolani doʻstlaringizga yuboring. Doʻstingiz siz tarqatgan havola orqali botga kirib, bot bergan kanallarga a'zo bo‘lsa, biz sizning bot hisobingizga $referalsum soʻm oʻtkazamiz.</b>\n\n<b>Qanday qilib pulni botdan chiqarish mumkin? Pullarni chiqarish to'g'ridan-to'g'ri sizning qiwi kartangiz hisobiga amalga oshiriladi.
",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($text=="📊 Statistika" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$userlar = file_get_contents("itmaktabi1.bot");
$count = substr_count($userlar,"\n");
$member = count(file("itmaktabi1.bot"))-1;
$banusers = file_get_contents("itmaktabi1.ban");
$bancount = substr_count($userlar,"\n");
$banmember = count(file("itmaktabi1.ban"))-1;
    itmaktabi1("sendMessage",[
"chat_id"=>$chatid,
"text"=>"Bot foydalanuvchilari: <code>$member</code> ta
Taqiq olganlar: <code>$banmember</code> ta
Taklifingiz: <code>$referal</code> ta

$sana-$soat",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"♻️ Yangilash","callback_data"=>"upgrade"],],
]
]),
]);
}
}

if($callbackdata=="upgrade" and $banid==false){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$referal = file_get_contents("itmaktabi1/$chat_id.referal");
$userlar = file_get_contents("itmaktabi1.bot");
$count = substr_count($userlar,"\n");
$member = count(file("itmaktabi1.bot"))-1;
$banusers = file_get_contents("itmaktabi1.ban");
$bancount = substr_count($userlar,"\n");
$banmember = count(file("itmaktabi1.ban"))-1;
itmaktabi1("editMessageText",[
"chat_id"=>$chat_id,
"message_id"=>$message_id,
"text"=>"Bot foydalanuvchilari: $member ta
Taqiq olganlar: $banmember ta
Taklifingiz: $referal ta

$sana-$soat",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"♻️ Yangilash","callback_data"=>"upgrade"],],
]
]),
]);
itmaktabi1("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Bot foydalanuvchilari: $member ta
Taqiq olganlar: $banmember ta
Taklifingiz: $referal ta

$sana-$soat",
"show_alert"=>true,
]);
}
}
/*Bu avto rubl bot kodi kod @itmaktabi1 tominidan tarqatildi mualliflik huquqi buzilmasin*/