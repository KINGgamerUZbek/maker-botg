<?php
/*Ushbu kod: @Sunnatbek_bloger (https://t.me/uzfox) tomonidan yozilgan. Iltimos, mualliflik huquqi hurmat qilinsin!*/
ob_start();
define("uzfox","API_TOKEN");
$admin = "ADMIN_ID";
$botname = "BOTNAME";
$arays = array($arays,$admin);

function addstat($id){
    $check = file_get_contents("uzfox.bot");
    $rd = explode("\n",$check);
    if(!in_array($id,$rd)){
        file_put_contents("uzfox.bot","\n".$id,FILE_APPEND);
    }
}

function banstat($id){
    $check = file_get_contents("uzfox.ban");
    $rd = explode("\n",$check);
    if(!in_array($id,$rd)){
        file_put_contents("uzfox.ban","\n".$id,FILE_APPEND);
    }
}

function step($id,$value){
file_put_contents("uzfox/$id.step","$value");
}

function stepbot($id,$value){
file_put_contents("uzfoxbot/$id.step","$value");
}

function typing($cid){ 
return uzfox("sendChatAction",[
"chat_id"=>$cid,
"action"=>"typing",
]);
}

function joinchat($id){
     global $message_id,$referalsum,$firstname;
$ch1 = file_get_contents("ch1.txt");
     $ret = uzfox("getChatMember",[
         "chat_id"=>"@".$ch1."",
         "user_id"=>$id,
         ]);
$stat = $ret->result->status;
$ch2 = file_get_contents("ch2.txt");
$rets = uzfox("getChatMember",[
         "chat_id"=>"@".$ch2."",
         "user_id"=>$id,
         ]);
$stats = $rets->result->status;
$ch3 = file_get_contents("ch3.txt");
$retus = uzfox("getChatMember",[
         "chat_id"=>"@".$ch3."",
         "user_id"=>$id,
         ]);
$status = $retus->result->status;
         if((($stat=="creator" or $stat=="administrator" or $stat=="member") and ($stats=="creator" or $stats=="administrator" or $stats=="member") and ($status=="creator" or $status=="administrator" or $status=="member"))){
      return true;
         }else{
     uzfox("sendMessage",[
         "chat_id"=>$id,
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
sleep(2);
     if(file_exists("uzfox/".$id.".referalid")){
           $file =  file_get_contents("uzfox/".$id.".referalid");
           $get =  file_get_contents("uzfox/".$id.".channel");
           if($get=="true"){
            file_put_contents("uzfox/".$id.".channel","failed");
            $minimal = $referalsum / 2;
            $user = file_get_contents("uzfox/".$file.".pul");
            $user = $user - $minimal;
            file_put_contents("uzfox/".$file.".pul","$user");
             uzfox("sendMessage",[
             "chat_id"=>$file,
             "text"=>"<b>Sizning do'stingiz</b>, <a href='tg://user?id=".$id."'>".$firstname."</a> <b>bizning kanallarimizdan chiqib ketgani uchun sizga ".$minimal." so'm jarima berildi.</b>",
             "parse_mode"=>"html",
             "reply_markup"=>$menu,
             ]);
           }
         }  
return false;
}
}

function phonenumber($id){
     $phonenumber = file_get_contents("uzfox/$id.contact");
      if($phonenumber==true){
      return true;
         }else{
     stepbot($id,"request_contact");
     uzfox("sendMessage",[
    "chat_id"=>$id,
"photo"=>"",
    "text"=>"<b>Salom, hurmatli foydalanuvchi!</b>\n<b>Pul ishlash ishonchli bo'lishi uchun, pastdagi «📲 Telefon raqamni yuborish» tugmasini bosing:</b>",
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
    $text = "🏆 <b>TOP 20 ta eng koʻp ball ishlagan foydalanuvchilar:</b>\n\n";
    $daten = [];
    $rev = [];
    $fayllar = glob("./uzfox/*.*");
    foreach($fayllar as $file){
        if(mb_stripos($file,".pul")!==false){
        $value = file_get_contents($file);
        $id = str_replace(["./uzfox/",".pul"],["",""],$file);
        $daten[$value] = $id;
        $rev[$id] = $value;
        }
        echo $file;
    }

    asort($rev);
    $reversed = array_reverse($rev);
    for($i=0;$i<20;$i+=1){
        $order = $i+1;
        $id = $daten["$reversed[$i]"];
        $text.= "<b>{$order}</b>. <a href='tg://user?id={$id}'>{$id}</a> - "."<code>".$reversed[$i]."</code>"." <b>ball</b>"."\n";
    }
    return $text;
}

function uzfox($method,$datas=[]){
    $url = "https://api.telegram.org/bot".uzfox."/".$method;
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
$cid = $message->chat->id;
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
$soat = date("H:i:s",strtotime("hour")); 
$sana = date("d-M Y",strtotime(" hour"));
$resultid = file_get_contents("uzfox.bot");
$ban = file_get_contents("uzfox/$cid.ban");
$banid = file_get_contents("uzfox/$chat_id.ban");
$sabab = file_get_contents("uzfox/$chat_id.sabab");
$contact = file_get_contents("uzfox/$cid.contact");
$minimalsumma = file_get_contents("uzfox/minimal.sum");
$sum = file_get_contents("uzfox/$cid.pul");
$sumid = file_get_contents("uzfox/$chat_id.pul");
$jami = file_get_contents("uzfox/summa.text");
$referal = file_get_contents("uzfox/$cid.referal");
$referalcallback = file_get_contents("uzfox/$chat_id.referal");
$click = file_get_contents("uzfox/$cid.karta");
$paynet = file_get_contents("uzfox/$cid.paynet");
$click = file_get_contents("uzfox/$cid.click");
$referalsum = file_get_contents("uzfox/referal.sum");
if(file_get_contents("uzfox/minimal.sum")){
}else{    file_put_contents("uzfox/minimal.sum","10000");
}
if(file_get_contents("uzfox/$cid.referal")){
}else{    file_put_contents("uzfox/$cid.referal","0");
}
if(file_get_contents("uzfox/$chat_id.referal")){
}else{    file_put_contents("uzfox/$chat_id.referal","0");
}
if(file_get_contents("uzfox/summa.text")){
}else{    file_put_contents("uzfox/summa.text","0");
}
if(file_get_contents("uzfox/referal.sum")){
}else{    file_put_contents("uzfox/referal.sum","0");
}
if(file_get_contents("uzfox/$cid.pul")){
}else{    file_put_contents("uzfox/$cid.pul","0");
}
if(file_get_contents("uzfox/$chat_id.pul")){
}else{    file_put_contents("uzfox/$chat_id.pul","0");
}
if(file_get_contents("uzfox/$chat_id.sabab")){
}else{    file_put_contents("uzfox/$chat_id.sabab","Botdan faqat O'zbekiston fuqarolari foydalanishi mumkin!");
}
$step = file_get_contents("uzfox/$cid.step");
$step = file_get_contents("uzfoxbot/$cid.step");
mkdir("uzfox");
mkdir("uzfoxbot");
if(!is_dir("uzfox")){
  mkdir("uzfox");
}

$menu = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"🇺🇿BALL ISHLASH"],],
[["text"=>"💎BALLARIM💎"],["text"=>"🏆 Reyting"],],
[["text"=>"🗒 Qo‘llanma"],["text"=>"📊 Hisobot"],],
[["text"=>"💌 Reklama Va Homiylik"],],
]
]);

$panel = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"🗣 Userlarga xabar yuborish"],['text'=>"📤 majburiy azolik"],],
[["text"=>"💳 Hisob tekshirish"],["text"=>"💰 Hisob toʻldirish"],],
[["text"=>"👥 Referal narxini o'zgartirish"],],
[["text"=>"✅ Bandan olish"],["text"=>"🚫 Ban berish"],],
[["text"=>"📤 Minimal bal yechish"],],
[["text"=>"⬅️ Ortga"],],
]
]);

$back = json_encode([
 "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"⬅️ Ortga"],],
]
]);

if(($step=="request_contact") and ($ban==false) and (isset($phonenumber))){
$phonenumber = str_replace("+","","$phonenumber");
if(joinchat($fromid)=="true"){
if((strlen($phonenumber)==12) and (stripos($phonenumber,"9989")!==false)){
if($contactid==$cid){
addstat($fromid);
if($user){
$username = "@$user";
}else{
$username = "$firstname";
}
if(file_exists("uzfox/".$fromid.".referalid")){
$referalid = file_get_contents("uzfox/".$fromid.".referalid"); 
$channel = file_get_contents("uzfox/".$fromid.".channel");
$conts = file_get_contents("uzfox/".$fromid.".login");
if($channel=="true" and $conts=="false"){
if(joinchat($referalid)=="true"){
file_put_contents("uzfox/".$fromid.".login","true");
uzfox("deleteMessage",[
"chat_id"=>$chat_id,
"message_id"=>$message_id,
]);
$user = file_get_contents("uzfox/".$referalid.".pul");
$referalsum = $referalsum / 2;
$user = $user + $referalsum;
file_put_contents("uzfox/".$referalid.".pul","$user");
$firstname = str_replace(["<",">","/"],["","",""],$firstname);
uzfox("sendMessage",[
"chat_id"=>$referalid,
"text"=>"<b>👏 Tabriklaymiz! Sizni do'stingiz</b> <a href='tg://user?id=$fromid'>$firstname</a> <b>botimizdan ro'yxatdan o'tdi va sizga $referalsum so'm taqdim etildi.</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}
}
$reply = uzfox("sendMessage",[
"chat_id"=>$fromid,
"text"=>"<b>Quyidagi havolani doʻstlaringizga tarqatib ball ishlang!</b> 👇",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
uzfox("sendMessage",[
"chat_id"=>$fromid,
"text"=>"✅ <b>Raqam ishlash tizminingrasmiy boti</b> 🤖\n\n🎈 $username do'stingizdan unikal havola-taklifnoma.\n\n👇 Boshlash uchun bosing:\nhttps://t.me/$botname?start=$fromid",
"parse_mode"=>"html",
"reply_to_message_id"=>$reply,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"↗️ Doʻstlarga yuborish","switch_inline_query"=>$fromid],],
]
]),
]);
unlink("uzfoxbot/$cid.step");
file_put_contents("uzfox/$cid.contact","$phonenumber");
}else{
  addstat($cid);
  uzfox("sendMessage",[
    "chat_id"=>$cid,
    "text"=>"<b>Faqat o'zingizni kontaktingizni yuboring:</b>",
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
  banstat($cid);
  uzfox("sendMessage",[
    "chat_id"=>$cid,
    "text"=>"<b>Kechirasiz! Botdan faqat O'zbekiston fuqarolari foydalanishi mumkin!</b>",
    "parse_mode"=>"html",
    "reply_to_message_id"=>$messageid,
    "reply_markup"=>json_encode([
    "remove_keyboard"=>true,
    ]),
  ]);
unlink("uzfoxbot/$cid.step");
file_put_contents("uzfox/$cid.ban","ban");
}
}
}

if($text=="/panel" and $cid==$admin){
typing($cid);
uzfox('sendMessage',[
"chat_id"=>$cid,
"text"=>"<b>Salom, Siz bot administratorisiz. Kerakli boʻlimni tanlang:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($text=="🗣 Userlarga xabar yuborish" and $cid==$admin){
typing($cid);
stepbot($cid,"send_post");
      uzfox("sendMessage",[
      "chat_id"=>$cid,
      "text"=>"<b>Rasmli xabar matnini kiriting. Xabar turi markdown:</b>",
      "parse_mode"=>"html",
          "reply_markup"=>$panel,
          ]);
            }

     if($step=="send_post" and $cid==$admin){
        $file_id = $message->photo[0]->file_id;
        $caption = $message->caption;
                $ok = uzfox("sendPhoto",[
                  "chat_id"=>$cid,
                  "photo"=>$file_id,
                  "caption"=>$caption,
                  "parse_mode"=>"markdown",
                ]);
                if($ok->ok){
                  uzfox("sendPhoto",[
                    "chat_id"=>$cid,
                    "photo"=>$file_id,
                      "caption"=>"$caption\n\nYaxshi, rasmni qabul qildim!\nEndi tugmani na‘muna bo'yicha joylang.\n
<pre>[uzfox+https://t.me/Alimbek_Blogger]\n[Yangiliklar+https://t.me/Bloggers_School]</pre>",
"parse_mode"=>"html",
                      "disable_web_page_preview"=>true,
                    ]);
             file_put_contents("uzfoxbot/$cid.text","$file_id{set}$caption");
             stepbot($cid,"xabar_tugma");
         }
     }
     
    if($step=="xabar_tugma" and $cid==$admin){
      $xabar = uzfox("sendMessage",[
        "chat_id"=>$cid,
        "text"=>"Connections...",
      ])->result->message_id;
      uzfox("deleteMessage",[
        "chat_id"=>$chat_id,
        "message_id"=>$xabar,
      ]);
   $usertext = file_get_contents("uzfoxbot/$cid.text");
   $fileid = explode("{set}",$usertext);
   $file_id = $fileid[0];
   $caption = $fileid[1];
       preg_match_all("|\[(.*)\]|U",$text,$ouvt);
$keyboard = [];
foreach($ouvt[1] as $ouut){
$ot = explode("+",$ouut);
array_push($keyboard,[["url"=>"$ot[1]", "text"=>"$ot[0]"],]);
}
$ok = uzfox("sendPhoto",[
"chat_id"=>$cid,
"photo"=>$file_id,
"caption"=>"Sizning rasmingiz ko‘rinishi:\n\n".$caption,
"parse_mode"=>"html",
"reply_markup"=>json_encode(
["inline_keyboard"=>
$keyboard
]),
]);
if($ok->ok){
$userlar = file_get_contents("uzfox.bot");
$count = substr_count($userlar,"\n");
$count_member = count(file("uzfox.bot"))-1;
  $ids = explode("\n",$userlar);
  foreach ($ids as $line => $id) {
    $clear = uzfox("sendPhoto",[
"chat_id"=>$id,
"photo"=>$file_id,
"caption"=>$caption,
"parse_mode"=>"markdown",
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode(
["inline_keyboard"=>
$keyboard
]),
]);
unlink("uzfoxbot/$cid.step");
}

if($clear){
$userlar = file_get_contents("uzfox.bot");
$count = substr_count($userlar,"\n");
$count_member = count(file("uzfox.bot"))-1;
  uzfox("sendMessage",[
    "chat_id"=>$cid,
    "text"=>"Xabar <b>$count_member</b> userlarga yuborildi!",
    "parse_mode"=>"html",
  ]);
}
}else{
  uzfox("sendMessage",[
    "chat_id"=>$cid,
    "text"=>"Tugmani kiritishda xato bor. Iltimos, qaytadan yuboring:",
  ]);
unlink("uzfoxbot/$cid.step");  
}
}

if($text=="📤 majburiy azolik" and $cid==$admin){
typing($cid);
uzfox('sendMessage',[
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

if($text=="💳 Hisob tekshirish" and $cid==$admin){
typing($cid);
stepbot($cid,"result");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="result" and $cid==$admin){
typing($cid);
if($text=="🗣 Userlarga xabar yuborish" or $text=="👥 Referal narxini o'zgartirish" or $text=="💳 Hisob tekshirish" or $text=="💰 Hisob toʻldirish" or $text=="✅ Bandan olish" or $text=="🚫 Ban berish" or $text=="📤 Minimal pul yechish" or $text=="⬅️ Ortga"){
}else{
$sum = file_get_contents("uzfox/$text.pul");
$referal = file_get_contents("uzfox/$text.referal");
$raqam = file_get_contents("uzfox/$text.contact");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchi hisobi:</b> <code>$sum</code>\n<b>Foydalanuvchi referali:</b> <code>$referal</code>\n<b>Foydalanuvchi raqami:</b> <code>$raqam</code>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}

if($text=="💰 Hisob toʻldirish" and $cid==$admin){
typing($cid);
stepbot($cid,"coin");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchi hisobini necha pulga toʻldirmoqchisiz:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="coin" and $cid==$admin){
typing($cid);
file_put_contents("uzfox/$cid.coin",$text);
if($text=="🗣 Userlarga xabar yuborish" or $text=="👥 Referal narxini o'zgartirish" or $text=="💳 Hisob tekshirish" or $text=="💰 Hisob toʻldirish" or $text=="✅ Bandan olish" or $text=="?? Ban berish" or $text=="📤 Minimal pul yechish" or $text=="⬅️ Ortga"){
}else{
stepbot($cid,"pay");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchi ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}

if($step=="pay" and $cid==$admin){
typing($cid);
if($text=="🗣 Userlarga xabar yuborish" or $text=="👥 Referal narxini o'zgartirish" or $text=="💳 Hisob tekshirish" or $text=="💰 Hisob toʻldirish" or $text=="✅ Bandan olish" or $text=="🚫 Ban berish" or $text=="📤 Minimal pul yechish" or $text=="⬅️ Ortga"){
}else{
$summa = file_get_contents("uzfox/$cid.coin");
$sum =  file_get_contents("uzfox/$text.pul");
$jami = $sum + $summa;
file_put_contents("uzfox/$text.pul","$jami");
uzfox("sendMessage",[
   "chat_id"=>$text,
          "text"=>"💰 Hisobingiz: $summa so'mga to'ldirildi!\nHozirgi hisobingiz: $jami",
]);
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchi balansi toʻldirildi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$cid.step");
}
}

if($text=="👥 Referal narxini o'zgartirish" and $cid==$admin){
typing($cid);
stepbot($cid,"referal");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Referal narxini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="referal" and $cid==$admin){
typing($cid);
if($text=="🗣 Userlarga xabar yuborish" or $text=="👥 Referal narxini o'zgartirish" or $text=="💳 Hisob tekshirish" or $text=="💰 Hisob toʻldirish" or $text=="✅ Bandan olish" or $text=="🚫 Ban berish" or $text=="📤 Minimal pul yechish" or $text=="⬅️ Ortga"){
}else{
file_put_contents("uzfox/referal.sum","$text");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Referal taklif qilish narxi: $text so'mga o'zgardi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$cid.step");
}
}

if($text=="✅ Bandan olish" and $cid==$admin){
stepbot($cid,"unban");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="unban" and $cid==$admin){
unlink("uzfox/$text.ban");
if($text=="🗣 Userlarga xabar yuborish" or $text=="👥 Referal narxini o'zgartirish" or $text=="💳 Hisob tekshirish" or $text=="💰 Hisob toʻldirish" or $text=="✅ Bandan olish" or $text=="🚫 Ban berish" or $text=="📤 Minimal pul yechish" or $text=="⬅️ Ortga"){
}else{
uzfox("sendMessage",[
"chat_id"=>$cid,
"text"=>"<a href='tg://user?id=$text'>Foydalanuvchi</a> <b>bandan olindi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$cid.step");
}
}

if($text=="🚫 Ban berish" and $cid==$admin){
stepbot($cid,"sabab");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini nima sababdan ban qilmoqchisiz:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="sabab" and $cid==$admin){
file_put_contents("uzfox/$cid.sabab","$text");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
stepbot($cid,"ban");
}

if($step=="ban" and $cid==$admin){
banstat($text);
$sabab = file_get_contents("uzfox/$cid.sabab");
file_put_contents("uzfox/$text.sabab","$sabab");
file_put_contents("uzfox/$text.ban","ban");
if($text=="🗣 Userlarga xabar yuborish" or $text=="👥 Referal narxini o'zgartirish" or $text=="💳 Hisob tekshirish" or $text=="💰 Hisob toʻldirish" or $text=="✅ Bandan olish" or $text=="🚫 Ban berish" or $text=="📤 Minimal pul yechish" or $text=="⬅️ Ortga"){
}else{
uzfox("sendMessage",[
"chat_id"=>$cid,
"text"=>"<a href='tg://user?id=$text'>Foydalanuvchi</a> <b>banlandi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$cid.step");
uzfox("sendMessage",[
"chat_id"=>$text,
"text"=>"<b>Hurmatli foydalanuvchi!</b>\n<b>Siz botdan banlandingiz. Shuning uchun botni ishlata olmaysiz!</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📃 Batafsil maʼlumot","callback_data"=>"sabab"],],
]
]),
]);
}
}

if($text=="📤 Minimal bal yechish" and $cid==$admin){
typing($cid);
stepbot($cid,"minimalsumma");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Minimal bal yechish narxini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="minimalsumma" and $cid==$admin){
typing($cid);
if($text=="🗣 Userlarga xabar yuborish" or $text=="👥 Referal narxini o'zgartirish" or $text=="💳 Hisob tekshirish" or $text=="💰 Hisob toʻldirish" or $text=="✅ Bandan olish" or $text=="🚫 Ban berish" or $text=="📤 Minimal pul yechish" or $text=="⬅️ Ortga"){
}else{
file_put_contents("uzfox/minimal.sum","$text");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Minimal bal yechish narxi: $text bal o'zgardi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$cid.step");
}
}

if($callbackdata=="back" and $banid==false){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
uzfox("deleteMessage",[
"chat_id"=>$chat_id,
"message_id"=>$message_id,
]);
uzfox("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"<b>Kerakli boʻlimni tanlang</b> 👇",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($text=="🇺🇿BALL ISHLASH" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
if($user){
$username = "@$user";
}else{
$username = "$firstname";
}
uzfox("sendPhoto",[
    "chat_id"=>$cid,
"photo"=>"https://t.me/Bot_news_bot_yangilik/26",
    "caption"=>"✅ <b>Raqam ishlash tizminingrasmiy boti</b> 🤖\n\n🎈 $username do'stingizdan unikal havola-taklifnoma.\n\n👇 Boshlash uchun bosing:
https://t.me/$botname?start=$cid",
"parse_mode"=>"html",
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"↗️ Doʻstlarga yuborish","switch_inline_query"=>$cid],],
]
]),
]);
}
}

if($text=="💎BALLARIM💎" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
uzfox("sendPhoto",[
"chat_id"=>$cid,
"photo"=>"https://t.me/Bot_news_bot_yangilik/26",
"caption"=>"<b>Sizning hisobingiz:</b> <code>$sum</code>\n\n<b>Siz botga taklif qilgan a'zolar soni:</b> <code>$referal</code>\n\n<b>Bot toʻlab bergan jami raqam:</b> <code>$jami</code>\n\n<b>Raqam olish uchun minimal ball:</b> <code>$minimalsumma</code> <b>ball</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📤 Raqam olish","callback_data"=>"production"],],
]
]),
]);
}
}

if($text=="🏆 Reyting" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$reyting = reyting();
uzfox("sendMessage",[
"chat_id"=>$cid,
"text"=>"$reyting",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($text=="⬅️ Ortga" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
addstat($cid);
uzfox("sendMessage",[
"chat_id"=>$cid,
"text"=>"<b>Kerakli boʻlimni tanlang</b> 👇",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
unlink("uzfox/$cid.step");
unlink("uzfoxbot/$cid.step");
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
$reply = uzfox("sendMessage",[
"chat_id"=>$fromid,
"text"=>"<b>Quyidagi havolani doʻstlaringizga tarqatib ball ishlang!</b> 👇",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
uzfox("sendMessage",[
"chat_id"=>$fromid,
"text"=>"✅ <b>Raqam ishlash tizmining rasmiy boti</b> 🤖\n\n🎈 $username do'stingizdan unikal havola-taklifnoma.\n\n👇 Boshlash uchun bosing:\nhttps://t.me/$botname?start=$fromid",
"parse_mode"=>"html",
"reply_to_message_id"=>$reply,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"↗️ Doʻstlarga yuborish","switch_inline_query"=>$fromid],],
]
]),
]);
}
}

if((stripos($text,"/start")!==false) && ($ban==false)){
$public = explode("*",$text);
$refid = explode(" ",$text);
$refid = $refid[1];
if(strlen($refid)>0){
$idref = "uzfox/$refid.id";
$idrefs = file_get_contents($idref);
$userlar = file_get_contents("uzfox.bot");
$explode = explode("\n",$userlar);
if(!in_array($cid,$explode)){
file_put_contents("uzfox.bot","\n".$cid,FILE_APPEND);
}
if($refid==$cid and $ban==false){
      uzfox("sendMessage",[
      "chat_id"=>$cid,
      "text"=>"☝️ <b>Hurmatli foydalanuvchi!</b>\n<b>Botga o'zingizni taklif qila olmaysiz!</b>",
      "parse_mode"=>"html",
      "reply_to_message_id"=>$messageid,
      ]);
      }else{
    if((stripos($userlar,"$cid")!==false) and ($ban==false)){
      uzfox("sendMessage",[
      "chat_id"=>$cid,
      "text"=>"<b>Hurmatli foydalanuvchi!</b>\n<b>Siz do'stingizga referal bo'la olmaysiz, agar ushbu holat yana takrorlansa, siz botdan blocklanishingiz mumkin!</b>",
"parse_mode"=>"html",
"reply_to_message_id"=>$messageid,
]);
}else{
$id = "$cid\n";
$handle = fopen("$idref","a+");
fwrite($handle,$id);
fclose($handle);
file_put_contents("uzfox/$fromid.referalid","$refid");
file_put_contents("uzfox/$fromid.channel","false");
file_put_contents("uzfox/$fromid.login","false");
      uzfox("sendMessage",[
      "chat_id"=>$refid,
"text"=>"<b>👏 Tabriklaymiz! Siz do'stingiz</b> <a href='tg://user?id=$cid'>foydalanuvchi</a><b>ni botga taklif qildingiz!</b>\n<b>Do'stingiz kanalimizga a'zo bo'lmagunicha, biz sizga referal bali taqdim etmaymiz!</b>",
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
uzfox("deleteMessage",[
"chat_id"=>$from_id,
"message_id"=>$message_id,
]);
$reply = uzfox("sendMessage",[
"chat_id"=>$from_id,
"text"=>"<b>Quyidagi havolani doʻstlaringizga tarqatib ball ishlang!</b> 👇",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
uzfox("sendPhoto",[
    "chat_id"=>$from_id,
"photo"=>"https://t.me/Bot_news_bot_yangilik/26",
    "caption"=>"✅ <b>Raqam ishlash tizminingrasmiy boti</b> 🤖\n\n🎈 $result do'stingizdan unikal havola-taklifnoma.\n\n👇 Boshlash uchun bosing:\nhttps://t.me/$botname?start=$from_id",
"parse_mode"=>"html",
"reply_to_message_id"=>$reply,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"↗️ Doʻstlarga yuborish","switch_inline_query"=>$from_id],],
]
]),
]);
}
$time =  microtime(true);
$random  = rand(999999,3456789);
usleep($random);
$current  = microtime(true)-$time;
usleep($current);
if($referalsum==true){
if(file_exists("uzfox/".$from_id.".referalid")){
$referalid = file_get_contents("uzfox/".$from_id.".referalid");
if(joinchat($referalid)=="true"){
$is_user = file_get_contents("uzfox/".$from_id.".channel");
$login = file_get_contents("uzfox/".$from_id.".login");
if($is_user=="false" and $login=="false"){
$minimal = $referalsum / 2;
$user = file_get_contents("uzfox/".$referalid.".pul");
$user = $user + $minimal;
file_put_contents("uzfox/".$referalid.".pul","$user");
$referal = file_get_contents("uzfox/".$referalid.".referal");
$referal = $referal + 1;
file_put_contents("uzfox/".$referalid.".referal",$referal);
file_put_contents("uzfox/".$from_id.".channel","true");
$firstname = str_replace(["<",">","/"],["","",""],$firstname);
uzfox("sendMessage",[
"chat_id"=>$referalid,
"text"=>"<b>👏 Tabriklaymiz! Sizning do'stingiz</b> <a href='tg://user?id=".$from_id."'>".$first_name."</a> <b>kanallarga a'zo bo'ldi.</b>\n<b>Do'stingiz roʻyxatdan oʻtsa, sizga ".$minimal." so'm taqdim etiladi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}
}
}
}else{
uzfox("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Siz hali kanallarga aʼzo boʻlmadingiz!",
"show_alert"=>false,
]);
}
}

if($callbackdata=="production" and $banid==false){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
if($sumid>=$minimalsumma){
    uzfox("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]);
 uzfox("sendMessage",[
    "chat_id"=>$chat_id,
          "text"=>"💰 <b>Sizning hisobingizda: $sumid so'm mavjud!</b>\n<b>Raqam  olish uchun quyidagi tugmani bosing!</b>",
          "parse_mode"=>"html",
          "reply_markup"=>json_encode([
              "inline_keyboard"=>[
                  [["text"=>"Raqam olish","callback_data"=>"paynet"],],
                  [["text"=>"⬅️ Ortga","callback_data"=>"back"],],
                  ]
                  ])
                  ]);
        }else{
          $som = $minimalsumma - $sumcallback;
          uzfox("answerCallbackquery",[
              "callback_query_id"=>$id,
              "text"=>"☝️ Sizning hisobingizda mablag' yetarli emas!\nSizga yana mablag'ni yechib olish uchun $som ball kerak!\nSizning hisobingizda: $sumid ball mavjud!",
              "show_alert"=>true,
]);
}
}
}

if($callbackdata=="paynet" and $banid==false){ 
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
if($sumid>=$minimalsumma){
  $paynet = file_get_contents("uzfox/$chat_id.paynet");
          uzfox("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]);
 uzfox("sendMessage",[
    "chat_id"=>$chat_id,
              "text"=>"❗️ Paynet qilmoqchi bo'lgan telefon raqamingizni kiriting!\nNa'muna: 998901234567",
          "reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$paynet"],],
    [["text"=>"⬅️ Ortga"],],
                  ]
                  ])
                  ]);
stepbot($chat_id,"raqam");
        }else{
          $som = $minimalsumma - $sumcallback;
          uzfox("answerCallbackquery",[
              "callback_query_id"=>$id,
              "text"=>"☝️ Sizning hisobingizda mablag' yetarli emas!\nSizga yana mablag'ni yechib olish uchun $som ball kerak!\nSizning hisobingizda: $sumid ball mavjud!",
              "show_alert"=>true,
]);
}
}
}

if($step=="raqam" and $ban==false){
if(strlen($text)==12){
if($sum>=$minimalsumma){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$hisob = file_get_contents("uzfox/$cid.pul");
stepbot($cid,"summa");
              uzfox("sendMessage",[
                  "chat_id"=>$cid,
                  "text"=>"💳 Ball miqdorini kiriting.\n💰 Sizning hisobingizda: $hisob ball mavud!",
"reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$sum"],],
    [["text"=>"⬅️ Ortga"],],
                  ]
                  ])
                  ]);
file_put_contents("uzfox/$cid.paynet","$text");
file_put_contents("uzfox/$cid.raqam","$text");
}
}
    }else{
          uzfox("sendMessage",[
              "chat_id"=>$cid,
              "text"=>"❗️ Raqam olmoqchi bo‘lgan telefon raqamingizni kiriting!\nNa'muna: 998901234567",
              ]);
}
}

if($step=="summa" and $sum>=$minimalsumma and $step!="raqam" and $ban==false){
if($text=="/start" or $text=="⬅️ Ortga"){
unlink("uzfoxbot/$cid.step");
}else{
if(stripos($text,"998")!==false){
}else{
$hisob = file_get_contents("uzfox/$cid.pul");
if($text>=$minimalsumma and $hisob>=$text){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$puts = $hisob - $text;
file_put_contents("uzfox/$cid.pul","$puts");
$jami = file_get_contents("uzfox/summa.text");
$jami = $jami + $text;
file_put_contents("uzfox/summa.text","$jami");
file_put_contents("uzfox/$cid.textsum","$text");
       $first_name = str_replace(["[","]","|"],["","",""],$firstname);
       uzfox("sendMessage",[
           "chat_id"=>$cid,
           "text"=>"⏰ So'rovlar yakunlandi!\nRaqam 24 soat sizga beriladii!\Raqam berilgani  haqida sizga o'zimiz bot orqali xabar beramiz!",
"reply_markup"=>$menu,
]);
          uzfox("sendMessage",[
              "chat_id"=>"-100$admin",
              "text"=>"💳 Foydalanuvchi raqam olmoqchi!\nKimdan: [$firstname](tg://user?id=$cid)\nRaqami: $paynet\nBall miqdori: $text ball",
          "parse_mode"=>"markdown",
          "reply_markup"=>json_encode([
                  "inline_keyboard"=>[
                      [["callback_data"=>"send|$cid|$firstname","text"=>"💳 Raqam berish qabul qilindi"]],
[["callback_data"=>"no|$cid|$firstname","text"=>"💳 Raqam berish bekor qilindi"]],
[["callback_data"=>"ban|$cid|$firstname","text"=>"🚫 Ban berish"]],
                        ]
                       ])
                      ]);
unlink("uzfoxbot/$cid.step");
        }
}else{
uzfox("sendmessage",[
"chat_id"=>$cid,
            "text"=>"💵 Sizning hisobingizda siz raqam olmoqchi bo'lgan ball mavjud emas!\nSiz faqat $hisob ball bo‘lgandagina usa  olishingiz mumkin!",
          ]);
unlink("uzfoxbot/$cid.step");
}
}
}
}

if($callbackdata=="click" and $banid==false){
if($sumid>=$minimalsumma){
if((joinchat($from_id)=="true") and (phonenumber($from_id)=="true") and ($banid==false)){
$clickraqam = file_get_contents("uzfox/$chat_id.click");
     uzfox("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]);
 uzfox("sendMessage",[
    "chat_id"=>$chat_id,
              "text"=>"❗️ Click karta raqamingizni kiriting!\nNa'muna: 8600000000000000",
          "reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$clickraqam"],],
                  [["text"=>"⬅️ Ortga"],],
                  ]
                  ])
                  ]);
stepbot($chat_id,"clickraqam");
        }else{
          $som = $minimalsumma - $sum;
          uzfox("answerCallbackquery",[
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
$hisob = file_get_contents("uzfox/$cid.pul");
stepbot($cid,"clicksumma");
              uzfox("sendMessage",[
                  "chat_id"=>$cid,
                  "text"=>"💳 To'lov miqdorini kiriting.\n💰 Sizning hisobingizda: $hisob so'm mavud!",
"reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$sum"],],
    [["text"=>"⬅️ Ortga"],],
                  ]
                  ])
                  ]);
              file_put_contents("uzfox/$cid.click","$text");
file_put_contents("uzfox/$cid.raqam","$text");
}
}
}else{
uzfox("sendMessage",[
"chat_id"=>$cid,
"text"=>"❗️ Click karta raqamingizni kiriting!\nNa'muna: 8600000000000000",
              ]);
      }
    }

if($step=="clicksumma" and $sum>=$minimalsumma and $step!="clickraqam" and $ban==false){
if($text=="/start" or $text=="⬅️ Ortga"){
uzfox("uzfoxbot/$cid.step");
}else{
if(stripos($text,"8600")!==false){
}else{
$hisob = file_get_contents("uzfox/$cid.pul");
if($text>=$minimalsumma and $hisob>=$text){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$puts = $hisob - $text;
file_put_contents("uzfox/$cid.pul","$text");
file_put_contents("uzfox/$cid.pul","$puts");
$jami = file_get_contents("uzfox/summa.text");
$jami = $jami + $text;
file_put_contents("uzfox/summa.text","$jami");
file_put_contents("uzfox/$cid.textsum","$text");
       $firstname = str_replace(["[","]","|"],["","",""],$firstname);
       uzfox("sendMessage",[
           "chat_id"=>$cid,
           "text"=>"⏰ So'rovlar yakunlandi!\Raqam 24 soat sizga beriladii!\Raqam berilgani  haqida sizga o'zimiz bot orqali xabar beramiz!",
"reply_markup"=>$menu,
]);
          uzfox("sendMessage",[
              "chat_id"=>"-100$admin",
              "text"=>"💳 Foydalanuvchi pul yechib olmoqchi!\nKimdan: [$firstname](tg://user?id=$cid)\nRaqami: $click\nTo'lov miqdori: $text so'm",
          "parse_mode"=>"markdown",
          "reply_markup"=>json_encode([
                  "inline_keyboard"=>[
                      [["callback_data"=>"send|$cid|$firstname","text"=>"💳 To'lov qabul qilindi"]],
[["callback_data"=>"no|$cid|$firstname","text"=>"💳 To'lov bekor qilindi"]],
[["callback_data"=>"ban|$cid|$firstname","text"=>"🚫 Ban berish"]],
                        ]
                       ])
                      ]);
                      unlink("uzfoxbot/$cid.step");
                    }
                    }else{
          uzfox("sendMessage",[
              "chat_id"=>$cid,
            "text"=>"💵 Sizning hisobingizda siz yechib olmoqchi bo'lgan pul mavjud emas!\nSiz faqat $hisob so'm pulni yechib olishingiz mumkin!",
              "reply_markup"=>$menu,
]);
unlink("uzfoxbot/$cid.step");
}
}
}
}

if(mb_stripos($text, "/ch1-")!==false){
  $m1 = explode("-",$text);
 $m2 = $m1[1];
 file_put_contents("ch1.txt","$m2");
 uzfox('sendMessage',[
'chat_id'=>$admin,
'text'=>"1-kanal @$m2 ga o'zgardi!",
 ]);
}
if(mb_stripos($text, "/ch2-")!==false){
  $m1 = explode("-",$text);
 $m2 = $m1[1];
 file_put_contents("ch2.txt","$m2");
 uzfox('sendMessage',[
'chat_id'=>$admin,
'text'=>"2-kanal @$m2 ga o'zgardi!",
 ]);
}
if(mb_stripos($text, "/ch3-")!==false){
  $m1 = explode("-",$text);
 $m2 = $m1[1];
 file_put_contents("ch3.txt","$m2");
 uzfox('sendMessage',[
'chat_id'=>$admin,
'text'=>"3-kanal @$m2 ga o'zgardi!",
 ]);
}

if((stripos($callbackdata,"send|")!==false) and ($from_id=="882147140")){
    uzfox("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]); 
       $ex = explode("|",$callbackdata);
       $id = $ex[1];
       $name = $ex[2];
$raqam = file_get_contents("uzfox/$id.raqam");
$referal = file_get_contents("uzfox/$id.referal");
$miqdor = file_get_contents("uzfox/$id.textsum");
uzfox("sendMessage",[
"chat_id"=>"-100$admin",
"text"=>"*💳 Foydalanuvchi puli toʻlab berildi!*\n\n🗣 *Ismi*: [$name](tg://user?id=$id)\n🔢 *Raqami:* `$raqam`\n*👥 Taklif qilgan aʼzolari:* `$referal`\n💰 *To'lov miqdori:* `$miqdor` *so'm*\n\n✅ *Muvaffaqiyatli oʻtkazildi!*",
"parse_mode"=>"markdown",
]);
       uzfox("sendMessage",[
              "chat_id"=>$id,
              "text"=>"<b>Assalom-u alaykum, $name!</b>\n<b>Sizning botdan yechib olgan pulingiz to'lab berildi!\nIltimos, o'z fikringizni qoldiring!</b>",
              "parse_mode"=>"html",
               "reply_markup"=>json_encode([   
   "inline_keyboard"=>[
[["text"=>"👨‍💻 Admin","url"=>"https://t.me/$ADMIN_USER"],["text"=>"👥 Kanalimiz","url"=>"https://t.me/MakerUz_News"],],
]
]),
]);
}

if((stripos($callbackdata,"no|")!==false) and ($from_id=="882147140")){
        uzfox("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]); 
       $ex = explode("|",$callbackdata);
       $id = $ex[1];
       $name = $ex[2];
       uzfox("sendMessage",[
              "chat_id"=>$id,
              "text"=>"<b>Assalom-u alaykum, $name!</b>\n<b>Sizning botdan yechib olgan pulingiz bekor qilindi!</b>",
              "parse_mode"=>"html",
               "reply_markup"=>$menu,
]);
}

if((stripos($callbackdata,"ban|")!==false) and ($from_id=="882147140")){
        uzfox("deleteMessage",[
    "chat_id"=>$chat_id,
    "message_id"=>$message_id,
]); 
       $ex = explode("|",$callbackdata);
       $id = $ex[1];
       $name = $ex[2];
file_put_contents("uzfox/$id.ban","ban");
uzfox("sendMessage",[
"chat_id"=>$id,
"text"=>"<b>Hurmatli foydalanuvchi!</b>\n<b>Siz botdan blocklandingiz. Shuning uchun botni ishlata olmaysiz!</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📃 Batafsil maʼlumot","callback_data"=>"sabab"],],
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
uzfox("answerInlineQuery",[
"inline_query_id"=>$update->inline_query->id,
"cache_time"=>1,
"results"=>json_encode([[
"type"=>"article",
"id"=>base64_encode(1),
"title"=>"🎈 Unikal havola-taklifnoma",
"description"=>"$username doʻstingizdan unikal havola-taklifnoma",
"thumb_url"=>"https://yearling-truck.000webhostapp.com/demo/download.png",
"input_message_content"=>[
"disable_web_page_preview"=>true,
"parse_mode"=>"html",
"message_text"=>"✅ <b>Raqam ishlash tizminingrasmiy boti</b> 🤖\n\n🎈 $username do'stingizdan unikal havola-taklifnoma.\n\n👇 Boshlash uchun bosing:
https://t.me/$botname?start=$inlineid"],
"reply_markup"=>[
"inline_keyboard"=>[
[["text"=>"🚀 Boshlash","url"=> "https://t.me/$botname?start=$inlineid"],],
]]
],
])
]);
}

if($text=="🗒 Qo‘llanma" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
uzfox("sendPhoto",[
"chat_id"=>$cid,
"photo"=>"https://t.me/Bot_news_bot_yangilik/26",
"caption"=>"<b>Savol - botda qanday qilib ball ishlash mumkin?</b>\n\n<b>Javob - botda ball ishlash juda oson, ball ishlash tugmasini bosing. Sizga berilgan unikal-havolani doʻstlaringizga yuboring. Doʻstingiz siz tarqatgan havola orqali botga kirib, bot bergan kanallarga a'zo bo‘lsa, biz sizning bot hisobingizga $referalsum ball oʻtkazamiz.</b>\n\n<b>Qanday qilib raqamni olish mumkin. RAQAM siz zayafka bergan akauntingizga bog‘lanib o‘zimiz beramiz!</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($text=="📊 Hisobot" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$userlar = file_get_contents("uzfox.bot");
$count = substr_count($userlar,"\n");
$member = count(file("uzfox.bot"))-1;
$banusers = file_get_contents("uzfox.ban");
$bancount = substr_count($userlar,"\n");
$banmember = count(file("uzfox.ban"))-1;
    uzfox("sendMessage",[
"chat_id"=>$cid,
"text"=>"<b>Botimiz a'zolari soni:</b> <code>$member</code>\n<b>Qora roʻyxatdagi a'zolar soni:</b> <code>$banmember</code>\n<b>Siz botga taklif qilgan aʼzolar soni:</b> <code>$referal</code>\n\n$sana-$soat",
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
$referal = file_get_contents("uzfox/$chat_id.referal");
$userlar = file_get_contents("uzfox.bot");
$count = substr_count($userlar,"\n");
$member = count(file("uzfox.bot"))-1;
$banusers = file_get_contents("uzfox.ban");
$bancount = substr_count($userlar,"\n");
$banmember = count(file("uzfox.ban"))-1;
uzfox("editMessageText",[
"chat_id"=>$chat_id,
"message_id"=>$message_id,
"text"=>"<b>Botimiz a'zolari soni:</b> <code>$member</code>\n<b>Qora roʻyxatdagi a'zolar soni:</b> <code>$banmember</code>\n<b>Siz botga taklif qilgan aʼzolar soni:</b> <code>$referal</code>\n\n$sana-$soat",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"♻️ Yangilash","callback_data"=>"upgrade"],],
]
]),
]);
uzfox("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>"Botimiz a'zolari soni: $member\nQora roʻyxatdagi a'zolar soni: $banmember\nSiz botga taklif qilgan aʼzolar soni: $referal\n\n$sana-$soat",
"show_alert"=>true,
]);
}
}

if($text=="💌 Reklama Va Homiylik" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
uzfox("sendMessage",[
   "chat_id"=>$cid,
   "text"=>"Nima haqida yozmoqchisiz? 😊\n\n<b>📞 Aloqa markazi: Agar sizga 24 soat ichida raqam berilmasa shu adminga yozishingiz mumkin</b> @Vertualprorobot",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"🗣 Bog'lanish","url"=>"https://t.me/$ADMIN_USER"],],
[["text"=>"👨‍💻Bot yasash xizmati📞","url"=>"https://t.me/MakerUz_Konstruktor_bot"],],
[["text"=>"🔔SUPER BOT🤖","url"=>"https://t.me/MakerUz_Konstruktor_bot"],],
]
]),
]);
}
}

if($text=="👨‍💻 Dasturchi" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
uzfox("sendPhoto",[
"chat_id"=>$cid,
"photo"=>"https://t.me/MakerUz_Konstruktor_bot",
"caption"=>"<b>Bot dasturchisi:</b> <a href='tg://user?id=869811640'>Jamoliddinov Umidjon</a>\n\n<b>Ish vaqti: 07:00 dan 22:00 gacha</b>\n\n<b>Diqqat! Bot raqam berish yoki bermasligiga dasturchi javobgar emas!</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"🛠️Bot ochish","url"=>"https://t.me/MakerUz_Konstruktor_bot"],],
]
]),
]);
}
}

if($ban==true){
uzfox("deleteMessage",[
"chat_id"=>$cid,
"message_id"=>$messageid,
]);
uzfox("sendMessage",[
"chat_id"=>$cid,
"text"=>"<b>Hurmatli foydalanuvchi!</b>\n<b>Siz botdan banlangansiz. Shuning uchun botni ishlata olmaysiz!</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📃 Batafsil maʼlumot","callback_data"=>"sabab"],],
]
]),
]);
}

if($banid==true){
uzfox("deleteMessage",[
"chat_id"=>$chat_id,
"message_id"=>$message_id,
]);
uzfox("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"<b>Hurmatli foydalanuvchi!</b>\n<b>Siz botdan banlangansiz. Shuning uchun botni ishlata olmaysiz!</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📃 Batafsil maʼlumot","callback_data"=>"sabab"],],
]
]),
]);
}

if($callbackdata=="sabab"){
uzfox("answerCallbackQuery",[
"callback_query_id"=>$id,
"text"=>$sabab,
"show_alert"=>true,
]);
}