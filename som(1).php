  <?php
/*Ushbu kod: Xurrambek Obiddinov (https://t.me/uzfox) tomonidan yozilgan. Iltimos, mualliflik huquqi hurmat qilinsin!*/
ob_start();
define("uzfox","API_TOKEN");
$admin = "ADMIN_ID";
$adminuser = "ADMIN_USER";
$botname = uzfox('getme',['bot'])->result->username;
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

function typing($chatid){ 
return uzfox("sendChatAction",[
"chat_id"=>$chatid,
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
    $text = "🏆 <b>TOP 10 ta eng koʻp pul ishlagan foydalanuvchilar:</b>\n\n";
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
    for($i=0;$i<10;$i+=1){
        $order = $i+1;
        $id = $daten["$reversed[$i]"];
        $text.= "<b>{$order}</b>.{$id}- "."<code>".$reversed[$i]."</code>"." <b>soʻm</b>"."\n";
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
$ch4 = file_get_contents("ch4.txt");
$soat = date("H:i:s",strtotime("4 hour")); 
$sana = date("d/m/20y",strtotime("3 hour"));
$resultid = file_get_contents("uzfox.bot");
$ban = file_get_contents("uzfox/$chatid.ban");
$banid = file_get_contents("uzfox/$chat_id.ban");
$kanala = file_put_contents("kanal/chatid.kanal1","$text");
$kanalr = file_put_contents("kanal/chatid.kanal2","$text");
$kanals = file_put_contents("kanal/chatid.kanal3","$text");
$sabab = file_get_contents("uzfox/$chat_id.sabab");
$contact = file_get_contents("uzfox/$chatid.contact");
$minimalsumma = file_get_contents("uzfox/minimal.sum");
$sum = file_get_contents("uzfox/$chatid.pul");
$sumid = file_get_contents("uzfox/$chat_id.pul");
$jami = file_get_contents("uzfox/summa.text");
$referal = file_get_contents("uzfox/$chatid.referal");
$referalcallback = file_get_contents("uzfox/$chat_id.referal");
$click = file_get_contents("uzfox/$chatid.karta");
$paynet = file_get_contents("uzfox/$chatid.paynet");
$click = file_get_contents("uzfox/$chatid.click");
$referalsum = file_get_contents("uzfox/referal.sum");
if(file_get_contents("uzfox/minimal.sum")){
}else{    file_put_contents("uzfox/minimal.sum","1000");
}
if(file_get_contents("uzfox/$chatid.referal")){
}else{    file_put_contents("uzfox/$chatid.referal","0");
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
if(file_get_contents("uzfox/$chatid.pul")){
}else{    file_put_contents("uzfox/$chatid.pul","0");
}
if(file_get_contents("uzfox/$chat_id.pul")){
}else{    file_put_contents("uzfox/$chat_id.pul","0");
}
if(file_get_contents("uzfox/$chat_id.sabab")){
}else{    file_put_contents("uzfox/$chat_id.sabab","Botdan faqat O'zbekiston fuqarolari foydalanishi mumkin!");
}
$step = file_get_contents("uzfox/$chatid.step");
$step = file_get_contents("uzfoxbot/$chatid.step");
mkdir("kanal");
mkdir("uzfox");
mkdir("uzfoxbot");
if(!is_dir("uzfox")){
  mkdir("uzfox");
}

$admin_menu = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"💵 Pul Ishlash"],["text"=>"📱 Kabinet"],],
[["text"=>"🗒 Qo‘llanma"],["text"=>"🏆 Reyting"],],
[["text"=>"✉ Bog‘lanish"],["text"=>"📊 Statistika"],],
[["text"=>"🗄 Bosharuv paneli 🛠"],],
]
]);


$menu = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"💵 Pul Ishlash"],["text"=>"📱 Kabinet"],],
[["text"=>"🗒 Qo'llanma"],["text"=>"🏆 Reyting"],],
[["text"=>"✉ Bog'lanish"],["text"=>"📊 Statistika"],],
]
]);

$kanal = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"1-kanal"],["text"=>"2-kanal"],["text"=>"3-kanal"],],
[["text"=>"⬅ Back"],],
]
]);

$panel = json_encode([
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"📱 Hisob parametrlari"],],
[["text"=>"🛠 Kanal parametrlari"],["text"=>"💰 Pul parametrlari"],],
[["text"=>"🔐 Blok parametrlari"],["text"=>"📨 Barchaga xabar yuborish"],],
[["text"=>"⬅ Ortga"],],
]
]);

$hisob_panel = json_encode([
"resize_keyboard"=>true,
"keyboard"=>[
[["text"=>"📱 Hisobni tekshirish"],["text"=>"💳 Hisob to'ldirish"],],
[["text"=>"⬅ Back"],],
]
]);

$kanal_panel = json_encode([
"resize_keyboard"=>true,
"keyboard"=>[
[["text"=>"🛠 Majburiy obuna"],["text"=>"🛠 To'lovlar kanali"],],
[["text"=>"⬅ Back"],],
]
]);

$pul_panel = json_encode([
"resize_keyboard"=>true,
"keyboard"=>[
[["text"=>"🔗 Referal narxi"],["text"=>"🔐 Minimal pul yechish"],],
[["text"=>"⬅ Back"],],
]
]);

$blok_panel = json_encode([
"resize_keyboard"=>true,
"keyboard"=>[
[["text"=>"🔒 Bloklash"],["text"=>"🔐 Blokdan olish"],],
[["text"=>"⬅ Back"],],
]
]);

$back = json_encode([
 "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
[["text"=>"⬅ Ortga"],],
]
]);

if(($step=="request_contact") and ($ban==false) and (isset($phonenumber))){
$phonenumber = str_replace("+","","$phonenumber");
if(joinchat($fromid)=="true"){
if((strlen($phonenumber)==12) and (stripos($phonenumber,"998")!==false)){
if($contactid==$chatid){
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
"text"=>"<b>Bosh menyu</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
uzfox("sendMessage",[
"chat_id"=>$fromid,
"text"=>"",
"parse_mode"=>"html",
"reply_to_message_id"=>$reply,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"↗️ Doʻstlarga yuborish","switch_inline_query"=>$fromid],],
]
]),
]);
unlink("uzfoxbot/$chatid.step");
file_put_contents("uzfox/$chatid.contact","$phonenumber");
}else{
  addstat($chatid);
  uzfox("sendMessage",[
    "chat_id"=>$chatid,
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
  banstat($chatid);
  uzfox("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"<b>Kechirasiz! Botdan faqat O'zbekiston fuqarolari foydalanishi mumkin!</b>",
    "parse_mode"=>"html",
    "reply_to_message_id"=>$messageid,
    "reply_markup"=>json_encode([
    "remove_keyboard"=>true,
    ]),
  ]);
unlink("uzfoxbot/$chatid.step");
file_put_contents("uzfox/$chatid.ban","ban");
}
}
}

if($text=="/panel" and $chatid==$admin){
typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>Salom, Siz bot administratorisiz. Kerakli boʻlimni tanlang:</b>",
"parse_mode"=>"html",
"reply_markup"=>$admin_menu,
]);
}

if($text=="🗄 Bosharuv paneli 🛠" and $chatid==$admin){
typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>Salom, Siz bot administratorisiz. Kerakli boʻlimni tanlang:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($text=="📱 Hisob parametrlari" and $chatid==$admin){
typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>🛠 Hisob parametrlari</b>",
"parse_mode"=>"html",
"reply_markup"=>$hisob_panel,
]);
}

if($text=="⬅ Ortga" and $chatid==$admin){
typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>⬅ Ortga</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}

if($text=="⬅ Back" and $chatid==$admin){
typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>⬅ Orqaga qaytdingiz</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($text=="🛠 Kanal parametrlari" and $chatid==$admin){
	typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>🛠 Kanal parametrlari</b>",
"parse_mode"=>"html",
"reply_markup"=>$kanal_panel,
]);
}

if($text=="💰 Pul parametrlari" and $chatid==$admin){
	typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>💰 Pul parametrlari</b>",
"parse_mode"=>"html",
"reply_markup"=>$pul_panel,
]);
}

if($text=="🔐 Blok parametrlari" and $chatid==$admin){
	typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>🔐 Blok parametrlari</b>",
"parse_mode"=>"html",
"reply_markup"=>$blok_panel,
]);
}

if($text=="🛠 To'lovlar kanali" and $chatid==$admin){
typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
"text"=>"<b>To'lovlar kanalini o'zgartirish uchun 
kanal id raqamini yozing 
Masalan!
/set-1234567899</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($text=="🛠 Majburiy obuna" and $chatid==$admin){
typing($chatid);
uzfox('sendMessage',[
"chat_id"=>$chatid,
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

if($text=="📨 Barchaga xabar yuborish" and $chatid==$admin){
typing($chatid);
stepbot($chatid,"send_post");
      uzfox("sendMessage",[
      "chat_id"=>$chatid,
      "text"=>"<b>Rasmli xabar matnini kiriting. Xabar turi markdown:</b>",
      "parse_mode"=>"html",
          "reply_markup"=>$panel,
          ]);
            }

     if($step=="send_post" and $chatid==$admin){
        $file_id = $message->photo[0]->file_id;
        $caption = $message->caption;
                $ok = uzfox("sendPhoto",[
                  "chat_id"=>$chatid,
                  "photo"=>$file_id,
                  "caption"=>$caption,
                  "parse_mode"=>"markdown",
                ]);
                if($ok->ok){
                  uzfox("sendPhoto",[
                    "chat_id"=>$chatid,
                    "photo"=>$file_id,
                      "caption"=>"$caption\n\nYaxshi, rasmni qabul qildim!\nEndi tugmani na‘muna bo'yicha joylang.\n
<pre>[uzfox+https://t.me/NewBuilderUz]\n[Yangiliklar+https://t.me/By_Developers]</pre>",
"parse_mode"=>"html",
                      "disable_web_page_preview"=>true,
                    ]);
             file_put_contents("uzfoxbot/$chatid.text","$file_id{set}$caption");
             stepbot($chatid,"xabar_tugma");
         }
     }
     
    if($step=="xabar_tugma" and $chatid==$admin){
      $xabar = uzfox("sendMessage",[
        "chat_id"=>$chatid,
        "text"=>"Connections...",
      ])->result->message_id;
      uzfox("deleteMessage",[
        "chat_id"=>$chat_id,
        "message_id"=>$xabar,
      ]);
   $usertext = file_get_contents("uzfoxbot/$chatid.text");
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
"chat_id"=>$chatid,
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
unlink("uzfoxbot/$chatid.step");
}

if($clear){
$userlar = file_get_contents("uzfox.bot");
$count = substr_count($userlar,"\n");
$count_member = count(file("uzfox.bot"))-1;
  uzfox("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"Xabar <b>$count_member</b> userlarga yuborildi!",
    "parse_mode"=>"html",
  ]);
}
}else{
  uzfox("sendMessage",[
    "chat_id"=>$chatid,
    "text"=>"Tugmani kiritishda xato bor. Iltimos, qaytadan yuboring:",
  ]);
unlink("uzfoxbot/$chatid.step");  
}
}

if($text=="📱 Hisobni tekshirish" and $chatid==$admin){
typing($chatid);
stepbot($chatid,"result");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="result" and $chatid==$admin){
typing($chatid);
if($text=="📨 Barchaga xabar yuborish" or $text=="🔗 Referal narxi" or $text=="📱 Hisobni tekshirish" or $text=="💳 Hisob to'ldirish" or $text=="🔐 Blokdan olish" or $text=="🔒 Bloklash" or $text=="📤 Minimal pul yechish" or $text=="⬅ Orqaga"){
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

if($text=="💳 Hisob to'ldirish" and $chatid==$admin){
typing($chatid);
stepbot($chatid,"coin");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchi hisobini necha pulga toʻldirmoqchisiz:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="coin" and $chatid==$admin){
typing($chatid);
file_put_contents("uzfox/$chatid.coin",$text);
if($text=="📨 Barchaga xabar yuborish" or $text=="🔗 Referal narxi" or $text=="📱 Hisobni tekshirish" or $text=="💳 Hisob to'ldirish" or $text=="🔐 Blokdan olish" or $text=="🔒 Bloklash" or $text=="📤 Minimal pul yechish" or $text=="⬅ Orqaga"){
}else{
stepbot($chatid,"pay");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchi ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}
}

if($step=="pay" and $chatid==$admin){
typing($chatid);
if($text=="📨 Barchaga xabar yuborish" or $text=="🔗 Referal narxi" or $text=="📱 Hisobni tekshirish" or $text=="💳 Hisob to'ldirish" or $text=="🔐 Blokdan olish" or $text=="🔒 Bloklash" or $text=="📤 Minimal pul yechish" or $text=="⬅ Orqaga"){
}else{
$summa = file_get_contents("uzfox/$chatid.coin");
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
unlink("uzfoxbot/$chatid.step");
}
}

if($text=="🔗 Referal narxi" and $chatid==$admin){
typing($chatid);
stepbot($chatid,"referal");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Referal narxini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="referal" and $chatid==$admin){
typing($chatid);
if($text=="📨 Barchaga xabar yuborish" or $text=="🔗 Referal narxi" or $text=="📱 Hisobni tekshirish" or $text=="💳 Hisob to'ldirish" or $text=="🔐 Blokdan olish" or $text=="🔒 Bloklash" or $text=="📤 Minimal pul yechish" or $text=="⬅ Orqaga"){
}else{
file_put_contents("uzfox/referal.sum","$text");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Referal taklif qilish narxi: $text so'mga o'zgardi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$chatid.step");
}
}

if($text=="🔐 Blokdan olish" and $chatid==$admin){
stepbot($chatid,"unban");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="unban" and $chatid==$admin){
unlink("uzfox/$text.ban");
if($text=="📨 Barchaga xabar yuborish" or $text=="🔗 Referal narxi" or $text=="📱 Hisobni tekshirish" or $text=="💳 Hisob to'ldirish" or $text=="🔐 Blokdan olish" or $text=="🔒 Bloklash" or $text=="📤 Minimal pul yechish" or $text=="⬅ Orqaga"){
}else{
uzfox("sendMessage",[
"chat_id"=>$chatid,
"text"=>"<a href='tg://user?id=$text'>Foydalanuvchi</a> <b>bandan olindi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$chatid.step");
}
}

if($text=="🔒 Bloklash" and $chatid==$admin){
stepbot($chatid,"sabab");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini nima sababdan ban qilmoqchisiz:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="sabab" and $chatid==$admin){
file_put_contents("uzfox/$chatid.sabab","$text");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Foydalanuvchini ID raqamini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
stepbot($chatid,"ban");
}

if($step=="ban" and $chatid==$admin){
banstat($text);
$sabab = file_get_contents("uzfox/$chatid.sabab");
file_put_contents("uzfox/$text.sabab","$sabab");
file_put_contents("uzfox/$text.ban","ban");
if($text=="📨 Barchaga xabar yuborish" or $text=="🔗 Referal narxi" or $text=="📱 Hisobni tekshirish" or $text=="💳 Hisob to'ldirish" or $text=="🔐 Blokdan olish" or $text=="🔒 Bloklash" or $text=="📤 Minimal pul yechish" or $text=="⬅ Orqaga"){
}else{
uzfox("sendMessage",[
"chat_id"=>$chatid,
"text"=>"<a href='tg://user?id=$text'>Foydalanuvchi</a> <b>banlandi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$chatid.step");
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

if($text=="🔐 Minimal pul yechish" and $chatid==$admin){
typing($chatid);
stepbot($chatid,"minimalsumma");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Minimal pul yechish narxini kiriting:</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
}

if($step=="minimalsumma" and $chatid==$admin){
typing($chatid);
if($text=="📨 Barchaga xabar yuborish" or $text=="🔗 Referal narxi" or $text=="📱 Hisobni tekshirish" or $text=="💳 Hisob to'ldirish" or $text=="🔐 Blokdan olish" or $text=="🔒 Bloklash" or $text=="📤 Minimal pul yechish" or $text=="⬅ Orqaga"){
}else{
file_put_contents("uzfox/minimal.sum","$text");
uzfox("sendMessage",[
"chat_id"=>$admin,
"text"=>"<b>Minimal pul yechish narxi: $text so'mga o'zgardi!</b>",
"parse_mode"=>"html",
"reply_markup"=>$panel,
]);
unlink("uzfoxbot/$chatid.step");
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
if(mb_stripos($text, "/set-")!==false){
  $m1 = explode("-",$text);
 $m2 = $m1[1];
 file_put_contents("ch4.txt","$m2");
 uzfox('sendMessage',[
'chat_id'=>$admin,
'text'=>"To'lovlar kanali ID raqami -100$m2 ga o'zgardi!",
 ]);
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

if($text=="💵 Pul Ishlash" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
if($user){
$username = "@$user";
}else{
$username = "$firstname";
}
uzfox("sendMessage",[
    "chat_id"=>$chatid,
"photo"=>"",
    "text"=>"<b>Hurmatli $firstname botimizdan pul ishlash uchun pastdagi referal havolani do‘stlaringizga ulashing va pul ishlang!</b>

<i>Taklif havolangiz👇</i>

https://t.me/$botname?start=$chatid",
"parse_mode"=>"html",
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"💰Pul ishlashni boshlash","switch_inline_query"=>$chatid],],
]
]),
]);
}
}

if($text=="📱 Kabinet" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
uzfox("sendMessage",[
"chat_id"=>$chatid,
"photo"=>"",
"text"=>"<b>Sizning balansingiz:</b> $sum <b>so‘m</b>
<b>Taklif qilgan do‘stlaringiz:</b> $referal <b>ta</b>
<b>Sizning raqamingiz:</b> +$contact

<b>Pul yechib olish uchun minimal summa:</b> <code>$minimalsumma</code> <b>soʻm</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📤 Pul yechish","callback_data"=>"production"],],
]
]),
]);
}
}

if($text=="🏆 Reyting" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$reyting = reyting();
uzfox("sendMessage",[
"chat_id"=>$chatid,
"text"=>"$reyting

✅<b>Bot to‘lab bergan jami summa: $jami so‘m </b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($text=="⬅ Orqaga" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
addstat($chatid);
uzfox("sendMessage",[
"chat_id"=>$chatid,
"text"=>"<b>Kerakli boʻlimni tanlang</b> 👇",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
unlink("uzfox/$chatid.step");
unlink("uzfoxbot/$chatid.step");
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
"text"=>"<b>Bosh menyu</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
uzfox("sendMessage",[
"chat_id"=>$fromid,
"text"=>"",
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
if(!in_array($chatid,$explode)){
file_put_contents("uzfox.bot","\n".$chatid,FILE_APPEND);
}
if($refid==$chatid and $ban==false){
      uzfox("sendMessage",[
      "chat_id"=>$chatid,
      "text"=>"☝️ <b>Hurmatli foydalanuvchi!</b>\n<b>Botga o'zingizni taklif qila olmaysiz!</b>",
      "parse_mode"=>"html",
      "reply_to_message_id"=>$messageid,
      ]);
      }else{
    if((stripos($userlar,"$chatid")!==false) and ($ban==false)){
      uzfox("sendMessage",[
      "chat_id"=>$chatid,
      "text"=>"<b>Hurmatli foydalanuvchi!</b>\n<b>Siz do'stingizga referal bo'la olmaysiz, agar ushbu holat yana takrorlansa, siz botdan blocklanishingiz mumkin!</b>",
"parse_mode"=>"html",
"reply_to_message_id"=>$messageid,
]);
}else{
$id = "$chatid\n";
$handle = fopen("$idref","a+");
fwrite($handle,$id);
fclose($handle);
file_put_contents("uzfox/$fromid.referalid","$refid");
file_put_contents("uzfox/$fromid.channel","false");
file_put_contents("uzfox/$fromid.login","false");
      uzfox("sendMessage",[
      "chat_id"=>$refid,
"text"=>"<b>👏 Tabriklaymiz! Siz do'stingiz</b> <a href='tg://user?id=$chatid'>foydalanuvchi</a><b>ni botga taklif qildingiz!</b>\n<b>Do'stingiz kanalimizga a'zo bo'lmagunicha, biz sizga referal puli taqdim etmaymiz!</b>",
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
"text"=>"<b>Bosh menyu</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
])->result->message_id;
uzfox("sendMessage",[
    "chat_id"=>$from_id,
"photo"=>"",
    "caption"=>"",
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
"text"=>"<b>👏 Tabriklaymiz! Sizning do'stingiz</b> <a href='tg://user?id=".$from_id."'>".$first_name."</a> <b>kanallarga a'zo bo'ldi.</b>\n<b>Sizga ".$minimal." so'm taqdim etildi!</b>\n<b>Do'stingiz roʻyxatdan oʻtsa, sizga yana ".$minimal." so'm taqdim etiladi!</b>",
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
          "text"=>"💰 <b>Sizning hisobingizda: $sumid so'm mavjud!</b>\n<b>Pulingizni yechib olish uchun hamyonlarni birini tanlang!</b>",
          "parse_mode"=>"html",
          "reply_markup"=>json_encode([
              "inline_keyboard"=>[
                  [["text"=>"💳 Click","callback_data"=>"click"],["text"=>"™️ Paynet","callback_data"=>"paynet"],],
                  [["text"=>"⬅ Orqaga","callback_data"=>"back"],],
                  ]
                  ])
                  ]);
        }else{
          $som = $minimalsumma - $sumcallback;
          uzfox("answerCallbackquery",[
              "callback_query_id"=>$id,
              "text"=>"☝️ Sizning hisobingizda mablag' yetarli emas!\nSizga yana mablag'ni yechib olish uchun $som so'm kerak!\nSizning hisobingizda: $sumid so'm mavjud!",
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
              "text"=>"❗️ Paynet qilmoqchi bo'lgan telefon raqamingizni kiriting!\nNa'muna: 998xxxxxxxxx",
          "reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$paynet"],],
    [["text"=>"⬅ Orqaga"],],
                  ]
                  ])
                  ]);
stepbot($chat_id,"raqam");
        }else{
          $som = $minimalsumma - $sumcallback;
          uzfox("answerCallbackquery",[
              "callback_query_id"=>$id,
              "text"=>"☝️ Sizning hisobingizda mablag' yetarli emas!\nSizga yana mablag'ni yechib olish uchun $som so'm kerak!\nSizning hisobingizda: $sumid so'm mavjud!",
              "show_alert"=>true,
]);
}
}
}

if($step=="raqam" and $ban==false){
if(strlen($text)==4){
if($sum>=$minimalsumma){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$hisob = file_get_contents("uzfox/$chatid.pul");
stepbot($chatid,"summa");
              uzfox("sendMessage",[
                  "chat_id"=>$chatid,
                  "text"=>"💳 To'lov miqdorini kiriting.\n💰 Sizning hisobingizda: $hisob so'm mavud!",
"reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$sum"],],
    [["text"=>"⬅ Orqaga"],],
                  ]
                  ])
                  ]);
file_put_contents("uzfox/$chatid.paynet","$text");
file_put_contents("uzfox/$chatid.raqam","$text");
}
}
    }else{
          uzfox("sendMessage",[
              "chat_id"=>$chatid,
              "text"=>"❗️ Paynet qilmoqchi bo'lgan telefon raqamingizni kiriting!\nNa'muna: 998xxxxxxxxx",
              ]);
}
}

if($step=="summa" and $sum>=$minimalsumma and $step!="raqam" and $ban==false){
if($text=="/start" or $text=="⬅ Orqaga"){
unlink("uzfoxbot/$chatid.step");
}else{
if(stripos($text,"998")!==false){
}else{
$hisob = file_get_contents("uzfox/$chatid.pul");
if($text>=$minimalsumma and $hisob>=$text){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$puts = $hisob - $text;
file_put_contents("uzfox/$chatid.pul","$puts");
$jami = file_get_contents("uzfox/summa.text");
$jami = $jami + $text;
file_put_contents("uzfox/summa.text","$jami");
file_put_contents("uzfox/$chatid.textsum","$text");
       $first_name = str_replace(["[","]","|"],["","",""],$firstname);
       uzfox("sendMessage",[
           "chat_id"=>$chatid,
           "text"=>"⏰ So'rovlar yakunlandi!\nTo'lov 24 soat ichida amalga oshiriladi!\nTo'lov qilinganligi haqida sizga o'zimiz bot orqali xabar beramiz!",
"reply_markup"=>$menu,
]);
          uzfox("sendMessage",[
              "chat_id"=>"$admin",
              "text"=>"💳 Foydalanuvchi pul yechib olmoqchi!\nKimdan: $firstname\nRaqami: $paynet\nTo'lov miqdori: $text so'm",
          "parse_mode"=>"markdown",
          "reply_markup"=>json_encode([
                  "inline_keyboard"=>[
                      [["callback_data"=>"send|$chatid|$firstname","text"=>"💳 To'lov qabul qilindi"]],
[["callback_data"=>"no|$chatid|$firstname","text"=>"💳 To'lov bekor qilindi"]],
[["callback_data"=>"ban|$chatid|$firstname","text"=>"🔒 Bloklash"]],
                        ]
                       ])
                      ]);
unlink("uzfoxbot/$chatid.step");
        }
}else{
uzfox("sendmessage",[
"chat_id"=>$chatid,
            "text"=>"💵 Sizning hisobingizda siz yechib olmoqchi bo'lgan pul mavjud emas!\nSiz faqat $hisob so'm pulni yechib olishingiz mumkin!",
          ]);
unlink("uzfoxbot/$chatid.step");
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
                  [["text"=>"⬅ Orqaga"],],
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
if(strlen($text)==4){
if($sum>=$minimalsumma){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$hisob = file_get_contents("uzfox/$chatid.pul");
stepbot($chatid,"clicksumma");
              uzfox("sendMessage",[
                  "chat_id"=>$chatid,
                  "text"=>"💳 To'lov miqdorini kiriting.\n💰 Sizning hisobingizda: $hisob so'm mavud!",
"reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
"resize_keyboard"=>true,
    "keyboard"=>[
            [["text"=>"$sum"],],
    [["text"=>"⬅ Orqaga"],],
                  ]
                  ])
                  ]);
              file_put_contents("uzfox/$chatid.click","$text");
file_put_contents("uzfox/$chatid.raqam","$text");
}
}
}else{
uzfox("sendMessage",[
"chat_id"=>$chatid,
"text"=>"❗️ Click karta raqamingizni kiriting!\nNa'muna: 8600000000000000",
              ]);
      }
    }

if($step=="clicksumma" and $sum>=$minimalsumma and $step!="clickraqam" and $ban==false){
if($text=="/start" or $text=="⬅ Orqaga"){
uzfox("uzfoxbot/$chatid.step");
}else{
if(stripos($text,"8600")!==false){
}else{
$hisob = file_get_contents("uzfox/$chatid.pul");
if($text>=$minimalsumma and $hisob>=$text){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$puts = $hisob - $text;
file_put_contents("uzfox/$chatid.pul","$text");
file_put_contents("uzfox/$chatid.pul","$puts");
$jami = file_get_contents("uzfox/summa.text");
$jami = $jami + $text;
file_put_contents("uzfox/summa.text","$jami");
file_put_contents("uzfox/$chatid.textsum","$text");
       $firstname = str_replace(["[","]","|"],["","",""],$firstname);
       uzfox("sendMessage",[
           "chat_id"=>$chatid,
           "text"=>"⏰ So'rovlar yakunlandi!\nTo'lov 24 soat ichida amalga oshiriladi!\nTo'lov qilinganligi haqida sizga o'zimiz bot orqali xabar beramiz!",
"reply_markup"=>$menu,
]);
          uzfox("sendMessage",[
              "chat_id"=>"$admin",
              "text"=>"💳 Foydalanuvchi pul yechib olmoqchi!\nKimdan: $firstname\nRaqami: $click\nTo'lov miqdori: $text so'm",
          "parse_mode"=>"markdown",
          "reply_markup"=>json_encode([
                  "inline_keyboard"=>[
                      [["callback_data"=>"send|$chatid|$firstname","text"=>"💳 To'lov qabul qilindi"]],
[["callback_data"=>"no|$chatid|$firstname","text"=>"💳 To'lov bekor qilindi"]],
[["callback_data"=>"ban|$chatid|$firstname","text"=>"🔒 Bloklash"]],
                        ]
                       ])
                      ]);
                      unlink("uzfoxbot/$chatid.step");
                    }
                    }else{
          uzfox("sendMessage",[
              "chat_id"=>$chatid,
            "text"=>"💵 Sizning hisobingizda siz yechib olmoqchi bo'lgan pul mavjud emas!\nSiz faqat $hisob so'm pulni yechib olishingiz mumkin!",
              "reply_markup"=>$menu,
]);
unlink("uzfoxbot/$chatid.step");
}
}
}
}

if((stripos($callbackdata,"send|")!==false) and ($from_id=="ADMIN_ID")){
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
"chat_id"=>"-100$ch4",
"text"=>"*💳 Foydalanuvchi puli toʻlab berildi!*\n\n👤 *Foydalanuvchii*: $name\n🔢 *Raqami:* `$raqam`\n*👥 Taklif qilgan aʼzolari:* `$referal`\n💰 *To'lov miqdori:* `$miqdor` *so'm*\n\n✅ *Muvaffaqiyatli oʻtkazildi!*",
"parse_mode"=>"markdown",
]);
       uzfox("sendMessage",[
              "chat_id"=>$id,
              "text"=>"<b>Assalom-u alaykum, $name!</b>\n<b>Sizning botdan yechib olgan pulingiz to'lab berildi!\nIltimos, o'z fikringizni qoldiring!</b>",
              "parse_mode"=>"html",
               "reply_markup"=>json_encode([   
   "inline_keyboard"=>[
]
]),
]);
}

if((stripos($callbackdata,"no|")!==false) and ($from_id=="ADMIN_ID")){
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

if((stripos($callbackdata,"ban|")!==false) and ($from_id=="ADMIN_ID")){
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
"message_text"=>"✅ <b>$botname tizimining rasmiy boti</b> 🤖\n\n🎈 $username do'stingizdan unikal havola-taklifnoma.\n\n👇 Boshlash uchun bosing:
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
uzfox("sendMessage",[
"chat_id"=>$chatid,
"photo"=>"",
"text"=>"<b>Savol - botda qanday qilib pul ishlash mumkin?</b>\n\n<b>Javob - botda pul ishlash juda oson, pul ishlash tugmasini bosing. Sizga berilgan unikal-havolani doʻstlaringizga yuboring. Doʻstingiz siz tarqatgan havola orqali botga kirib, bot bergan kanallarga a'zo bo‘lsa, biz sizning bot hisobingizga $referalsum soʻm oʻtkazamiz.</b>\n\n<b>Qanday qilib pulni botdan chiqarish mumkin? Pullarni chiqarish to'g'ridan-to'g'ri sizning mobil telefoningizning hisobiga yoki kartangiz hisobiga amalga oshiriladi:
Beeline, Ucell, Uzmobile, MOBIUZ (UMS), 
Perfectum, Click.</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($text=="📊 Statistika" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
$userlar = file_get_contents("uzfox.bot");
$count = substr_count($userlar,"\n");
$member = count(file("uzfox.bot"))-1;
$banusers = file_get_contents("uzfox.ban");
$bancount = substr_count($userlar,"\n");
$banmember = count(file("uzfox.ban"))-1;
    uzfox("sendMessage",[
"chat_id"=>$chatid,
"text"=>"<b>📊BOT STATISTIKASI</b>

<b>Botdagi a‘zolar soni:</b> $member <b>ta</b>
<b>Botdan ban olganlar:</b> $banmember <b>ta</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"","callback_data"=>"upgrade"],],
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

if($text=="✉ Bog‘lanish" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
uzfox("sendMessage",[
   "chat_id"=>$chatid,
   "text"=>"<b>Admin bilan bog‘lanish!</b>

<i>Admin bilan bog‘lanish uchun pastagi 👤 Admin tugmasini bosing biz bilan faqat to‘lovlar haqida yozishingiz mumkin botdan tashqari savollar berish bloklanishga olib keladi!</i>

<b>Murojaat qilish: @$adminuser</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"👤 Admin","url"=>"https://t.me/$adminuser"],['text'=>"🛠️Bot yaratish","url"=>"https://t.me/MakerUz_konstruktor_bot"],],
]
]),
]);
}
}

if($text=="👨‍💻 Dasturchi" and $ban==false){
if((joinchat($fromid)=="true") and (phonenumber($fromid)=="true") and ($ban==false)){
uzfox("sendPhoto",[
"chat_id"=>$chatid,
"photo"=>"https://t.me/Tillo_Statuslar/1559",
"caption"=>"<b>Bot dasturchisi:</b> <a href='tg://user?id=ADMIN_ID'>Admin</a>\n\n<b>Ish vaqti: 07:00 dan 23:00 gacha</b>\n\n<b>Diqqat! Bot pul to'lab berish yoki to'lab bermasligiga dasturchi javobgar emas!</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"♻️ Bogʻlanish","url"=>"https://t.me/$ADMIM_USER"],],
]
]),
]);
}
}

if($ban==true){
uzfox("deleteMessage",[
"chat_id"=>$chatid,
"message_id"=>$messageid,
]);
uzfox("sendMessage",[
"chat_id"=>$chatid,
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