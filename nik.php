//Salom Barchaga Ushbu Nick  Kodi  Tarqalmagan Va eng Zo'ri Yordam uchun @DoniyorSoft Bilan Bog'laning @API_KOD Jamosidan Sovg'a 
<?php
ob_start();
define('API_KEY',"API_TOKEN");
$admin = 'ADMIN_ID';

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
$cid = $message->chat->id;
$chat_id = $message->chat->id;
$text1 = $message->text;
$name = $message->from->first_name;
$username = $message->from->username;
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id; 
$cqid = $update->callback_query->id;
$chat_id2 = $update->callback_query->message->chat->id;
$ch_user2 = $update->callback_query->message->chat->username;
$message_id2 = $update->callback_query->message->message_id;
$fadmin2 = $update->callback_query->from->id;
$fadmin = $message->from->id;
$cty = $message->chat->type;
$ism = file_get_contents("Bot/$cid.ism");
$step = file_get_contents("Bot/$cid.step");
$step2 = file_get_contents("Bot/2.step");
$step3 = file_get_contents("Bot/3.step");
$step1 = file_get_contents("Bot/$chat_id2.step");
$mid = $message->message_id;
$tx = $message->text;
$id1 = $message->reply_to_message->from->id;   
$repmid = $message->reply_to_message->message_id; 
$repname = $message->reply_to_message->from->first_name;
$repuser = $message->reply_to_message->from->username;
$reply = $message->reply_to_message;
$sreply = $message->reply_to_message->text;
mkdir("Bot");
$name2 = $update->callback_query->from->first_name;
$username2 = $update->callback_query->from->username;
$about2 = $update->callback_query->from->about;
$lname2 = $update->callback_query->from->last_name;
$title = $message->chat->title;
$description = $message->chat->description;

$new_chat_members = $message->new_chat_member->id;
$lan = $message->new_chat_member->language_code;
$ismi = $message->new_chat_member->first_name;
$is_bot = $message->new_chat_member->is_bot;

$sticker = $message->sticker;
$audio = $message->audio;
$voice = $message->voice;
$video = $message->video;
$caption = $message->caption;
$performer = $message->performer;
$gif = $message->animation;
$doc = $message->document;
$contact = $message->contact;
$game = $message->game;
$location = $message->location;
$forward_ch = $message->forward_from_chat;
$forward = $message->forward_from;
$selfi1 = $message->video_note;
$lichka = file_get_contents("lichka.db");
$chan  = $update->channel_post;
$ch_text = $chan->text;
$ch_photo = $chan->photo;
$ch_mid = $chan->message_id;
$ch_cid = $chan->chat->id;
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
$orqa = '?????? Orqaga';
$step = file_get_contents("bot/$cid.step");
$stepa = file_get_contents("step/$cid.step");
mkdir("bot");
mkdir("step");
mkdir("stat");

$adminpanel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"??????Foydalanuvchilarga Xabar Yuborish"]],
[['text'=>"??????Foydalanuvchilarga Forward Yuborish"]]
]
]);

if($tx=="/start" and $type=="private"){
bot("sendMessage",[
         "chat_id"=>$cid,
'text'=>"<b>????Assalamu aleykum <a href='tg://user?id=$cid'>$name2</a>
Ushbu bot orqali ajoyib nik yozishingiz mumkin
sIZHAM o'z botingizni quring @VipkonsBot
Buning uchun pastdagi bo???limlardan birini tanlang ????</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>'??? Nik Yasash','callback_data'=>"nik"],],
   [['text'=>'???? Statistika','callback_data'=>"stat"],],
]
])
]);  
}

	
	
	
  if($tx=="/start" and $type=="supergroup" or $type=="group"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Bot lichkasiga yozing!!",
]);
}
   
  if($tx=="/admin" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"???????????????Admin panelga xush kelibsiz!!",
'reply_markup'=>$adminpanel,
]);
} 
   
if($data=="bosh"){
bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
'text'=>"Bosh Menuga Qaytdik",
'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>'??? Nik Yasash','callback_data'=>"nik"],],
   [['text'=>'???? Statistika','callback_data'=>"stat"],],
]
])
]);
}   
   
   $lichka=file_get_contents("stat/user.list");
$gruppa=file_get_contents("stat/group.list");
if($type=="group" or $type=="supergroup"){
if(strpos($gruppa,"$cid") !==false){
}else{
file_put_contents("stat/group.list","$gruppa\n$cid");
}
}
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("stat/user.list","$lichka\n$cid");
}
}
if($data =="stat"){
$lichka=file_get_contents("stat/user.list");
$lich=substr_count($lichka,"\n");
$gruppa=file_get_contents("stat/group.list");
$gro=substr_count($gruppa,"\n");
$um=$lich+$gro;
bot('editmessagetext',[
'chat_id'=>$callcid,
'message_id'=>$callmid,
    'text'=> "<b>Bot statatistikasi:</b>    
??????A'zolar: <b>$lich</b>
??????Guruxlar: <b>$gro</b>
?????????Umumuy: <b>$um</b>

<i>???????????Dasturchi: @VipKonsBot</i>",
'parse_mode' => 'html',
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"???? Bosh menu",'callback_data'=>"bosh"]],
]
]),
]);
}

//Admin @DoniyorSoft Siz kutgan Xosting @API_KOD

if($data == "yangiyil") {   
$kun1 = date('z ',strtotime('2 hour')); 
$a = 364;
$c2 = $a-$kun1;
$d = date('L ',strtotime('2 hour'));
$b = $c2+$d;
$f = $b+81;
$e = $b+240;
$kun2 = date('H ',strtotime('2 hour')); 
$a2 = 23;
$b2 = $a2-$kun2;
$kun3 = date('i ',strtotime('2 hour')); 
$a3 = 59;
$b3 = $a3-$kun3;
$kun4 = date('s ',strtotime('2 hour')); 
$a4 = 60;
$b4 = $a4-$kun4;
  bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
   'text'=>"
???? Yangi Yilga $b kun, $b2 soat, $b3 minut, $b4 sekund qoldi!
?????? *Kirib kelayotgan Yangi Yil muborak bo'lsin.*", 
'parse_mode'=>'markdown', 
'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text'=>'???? Bosh menu','callback_data'=>"bosh"],],
    
 ]
])
]);   
}


 
//Admin Panella

$panel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"????Userga Xabar"],['text'=>"????Guruhga Xabar"]],
[['text'=>"????Userga Forward"],['text'=>"????Guruhga Forward"]],
[['text'=>"????Userlar"],['text'=>"????Guruhlar"]],
[['text'=>"???? Bekor qilish"]],
]
]);

if(isset($text)){
  if($cty == "group" or $cty == "supergroup"){
    if(stripos($guruhlar,"$chat_id")!==false){
    }else{
    file_put_contents("stat/group.list","$guruhlar\n$chat_id");
    }
  }else{
   $userlar = file_get_contents("stat/user.list");
   if(stripos($userlar,"$chat_id")!==false){
    }else{
    file_put_contents("stat/user.list","$userlar\n$chat_id");
   }
  }
 }

if($cid == "private" or $cid == $admin){
if($text == "/panel" or $text == "/admin"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>Assalamu alaykum <a href='tg://user?id=$uid'>$name</a>!</b>\n\n<i>Kerakli bo??limni tanlang!!</i>",
	'parse_mode'=>"html",
	'reply_markup'=>$panel,
]);
}
}


    if($text == "????Userga Xabar" and $cid == $admin){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"<b>Userlarga yuboriladigan habarni kiriting!!</b>",
      'parse_mode'=>"html",
      'reply_markup'=>$panel,
      ]);
      file_put_contents("stat/$chat_id.step","user");
    }

    if($step == "user" and $cid == $admin){
      if($text == "???? Bekor qilish"){
      file_put_contents("stat/$chat_id.step","");
      }else{ 
      $idszs=explode("\n",$userlar);
      foreach($idszs as $idlat){
     $userr = bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>"<b>$text</b>",
      'parse_mode'=>'html',
      'disable_web_page_preview' => true,
      ]);
      }
        if($userr){
          bot('sendmessage',[
          'chat_id'=>$admin,
          'text'=>"Habar Barcha Userlarga yuborildi!",
          ]);      
      file_put_contents("stat/$chat_id.step","");
        }
      }
    }
      
       if($text == "????Guruhga Xabar" and $cid == $admin){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"<b>Guruhlarga yuboriladigan habar matnini kiriting!!</b>",
      'parse_mode'=>"html",
      'reply_markup'=>$panel,
      ]);
      file_put_contents("stat/$chat_id.step","guruh");
    }

    if($step == "guruh" and $cid == $admin){
      if($text == "???? Bekor qilish"){
      file_put_contents("stat/$chat_id.step","");
      }else{ 
      $idszs=explode("\n",$guruhlar);
      foreach($idszs as $idlat){
    $guruu =  bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>"<b>$text</b>",
      'parse_mode'=>'html',
      'disable_web_page_preview' => true,
      ]);
      }
        if($guruu){
          bot('sendmessage',[
          'chat_id'=>$admin,
          'text'=>"Guruhlarga yuborildi!",
          ]);      
      file_put_contents("stat/$chat_id.step","");
        }
      }
    }

if($tx == "???? Bekor qilish" and $cid==$admin){
 bot('sendMessage',[
'chat_id'=>$admin,
'parse_mode'=>'markdown',
'text'=>"*Bekor qilindi!*",
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
]),
]);
sleep(0.7);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"*Assalomu alaykum! \nBotimizga Xush Kelibsiz!*\n\n_O??zingizga Kerakli Bo??limni Tanlang!!_",
      'parse_mode'=>"markdown",
      'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'??? Nik Yasash','callback_data'=>"nik"],],
[['text'=>'???? Statistika','callback_data'=>"stat"],],
]
]),
]);
unlink("stat/$chat_id.step");
}

//Forward Yuborish

if($text == "????Userga Forward" and $cid == $admin){
 bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"??? *Userlarga forward qilinadigan xabarni kiriting!*",
'parse_mode'=>'markdown',
]);
file_put_contents("stat/$chat_id.step","forward");
}

if($step == "forward" and $cid == $admin){
if($text == "???? Bekor qilish"){
unlink("stat/$chat_id.step");
}else{ 
$soni=substr_count($userlar,"\n")-1;
$ids=explode("\n",$userlar);
foreach($ids as $id){
$user = bot('forwardMessage', [
'chat_id'=>$id,
'from_chat_id'=>$admin,
'message_id'=>$mid,
]);
unlink("stat/$chat_id.step");
}
if($user){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"??? Xabar *$soni* userga yetkazildi!",
'parse_mode'=>"markdown",
]);     
unlink("stat/$cid.step");
}
}
}   

if($text == "????Guruhga Forward" and $cid == $admin){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"??? *Guruhlarga forward qilinadigan xabarni kiriting!*",
'parse_mode'=>'markdown',
]);
file_put_contents("stat/$cid.step","sendfor");
}

if($step == "sendfor" and $cid == $admin){
if($text == "???? Bekor qilish"){
unlink("stat/$cid.step");
}else{ 
$soni=substr_count($guruhlar,"\n")-1;
$ids=explode("\n",$guruhlar);
foreach($ids as $id){
$guruh = bot('forwardMessage', [
'chat_id'=>$id,
'from_chat_id'=>$admin,
'message_id'=>$mid,
]);
unlink("stat/$cid.step");
}
if($guruh){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"??? Xabar *$soni* guruhga yetkazildi!",
'parse_mode'=>"markdown",
]);     
unlink("stat/$cid.step");
}
}
}     

if($text == "????Guruhlar" and $cid==$admin){
bot('sendDocument',[
'document'=>new CURLFile("stat/group.list"),
'chat_id'=>$admin,
'caption'=>"???? *ID To???plam Guruhlar!*",
'parse_mode'=>'markdown',
'reply_to_message_id'=>$mid,
]);
}

if($text == "????Userlar" and $cid==$admin){
bot('sendDocument',[
'document'=>new CURLFile("stat/user.list"),
'chat_id'=>$admin,
'caption'=>"???? *ID To???plam Userlar!*",
'parse_mode'=>'markdown',
'reply_to_message_id'=> $mid,
]);
}


$ism = file_get_contents("Bot/$cid.ism");
$step = file_get_contents("Bot/$cid.step");
$step2 = file_get_contents("Bot/2.step");
$step3 = file_get_contents("Bot/3.step");
$step1 = file_get_contents("Bot/$chat_id2.step");
mkdir("Bot");

if($data=="nik"){
bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
'text'=>"<b><u>Iltimos Ismingizni kiriting</u></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"?????? Orqaga",'callback_data'=>"bosh"]],
]
]), 
]);
file_put_contents("Bot/$callcid.step","nik");
}
if($step=="nik"){
 if($text){
 	if($text != "/start"){
$nik1 = $text;
$nik1 = str_replace('a', '??', $nik1);
$nik1 = str_replace('b', '??', $nik1);
$nik1 = str_replace('c', '??', $nik1);
$nik1 = str_replace('d', '??', $nik1);
$nik1 = str_replace('e', '??', $nik1);
$nik1 = str_replace('f', '??', $nik1);
$nik1 = str_replace('g', '??', $nik1);
$nik1 = str_replace('h', '??', $nik1);
$nik1 = str_replace('i', '??', $nik1);
$nik1 = str_replace('j', '??', $nik1);
$nik1 = str_replace('k', '??', $nik1);
$nik1 = str_replace('l', '??', $nik1);
$nik1 = str_replace('m', 'M', $nik1);
$nik1 = str_replace('n', '??', $nik1);
$nik1 = str_replace('o', '??', $nik1);
$nik1 = str_replace('p', 'P', $nik1);
$nik1 = str_replace('q', 'Q', $nik1);
$nik1 = str_replace('r', '??', $nik1);
$nik1 = str_replace('s', '??', $nik1);
$nik1 = str_replace('t', '??', $nik1);
$nik1 = str_replace('u', '??', $nik1);
$nik1 = str_replace('v', 'V', $nik1);
$nik1 = str_replace('w', '??', $nik1);
$nik1 = str_replace('x', '??', $nik1);
$nik1 = str_replace('y', '??', $nik1);
$nik1 = str_replace('z', '??', $nik1);
$nik1 = str_replace('A', '??', $nik1);
$nik1 = str_replace('B', '??', $nik1);
$nik1 = str_replace('C', '??', $nik1);
$nik1 = str_replace('D', '??', $nik1);
$nik1 = str_replace('E', '??', $nik1);
$nik1 = str_replace('F', '??', $nik1);
$nik1 = str_replace('G', '??', $nik1);
$nik1 = str_replace('H', '??', $nik1);
$nik1 = str_replace('I', '??', $nik1);
$nik1 = str_replace('J', '??', $nik1);
$nik1 = str_replace('K', '??', $nik1);
$nik1 = str_replace('L', '??', $nik1);
$nik1 = str_replace('M', 'M', $nik1);
$nik1 = str_replace('N', '??', $nik1);
$nik1 = str_replace('O', '??', $nik1);
$nik1 = str_replace('P', 'P', $nik1);
$nik1 = str_replace('Q', 'Q', $nik1);
$nik1 = str_replace('R', '??', $nik1);
$nik1 = str_replace('S', '??', $nik1);
$nik1 = str_replace('T', '??', $nik1);
$nik1 = str_replace('U', '??', $nik1);
$nik1 = str_replace('V', 'V', $nik1);
$nik1 = str_replace('W', '??', $nik1);
$nik1 = str_replace('X', '??', $nik1);
$nik1 = str_replace('Y', '??', $nik1);
$nik1 = str_replace('Z', '??', $nik1);

 	$nik2 = $text;
$nik2 = str_replace('q', '?????', $nik2);
   $nik2 = str_replace('w', '??????', $nik2);
   $nik2 = str_replace('e', '??????', $nik2);
   $nik2 = str_replace('r', '?????', $nik2);
   $nik2 = str_replace('t', '?????', $nik2);
   $nik2 = str_replace('y', '?????', $nik2);
   $nik2 = str_replace('u', '?????', $nik2);
   $nik2 = str_replace('i', '????', $nik2);
   $nik2 = str_replace('o', '??????', $nik2);
   $nik2 = str_replace('p', '??????', $nik2);
   $nik2 = str_replace('a', '??????', $nik2);
   $nik2 = str_replace('s', 's???', $nik2);
   $nik2 = str_replace('d', '?????', $nik2);
   $nik2 = str_replace('f', '?????', $nik2);
   $nik2 = str_replace('g', '?????', $nik2);
   $nik2 = str_replace('h', '?????', $nik2);
   $nik2 = str_replace('j', '??????', $nik2);
   $nik2 = str_replace('k', '??????', $nik2);
   $nik2 = str_replace('l', '?????', $nik2);
   $nik2 = str_replace('z', '??????', $nik2);
   $nik2 = str_replace('x', 'x??', $nik2);
   $nik2 = str_replace('c', '??????', $nik2);
   $nik2 = str_replace('v', '?????', $nik2);
   $nik2 = str_replace('b', '?????', $nik2);
   $nik2 = str_replace('n', '?????', $nik2);
   $nik2 = str_replace('m', '??????', $nik2);
   $nik2 = str_replace('Q', '?????', $nik2);
   $nik2 = str_replace('W', '??????', $nik2);
   $nik2 = str_replace('E', '??????', $nik2);
   $nik2 = str_replace('R', '?????', $nik2);
   $nik2 = str_replace('T', '?????', $nik2);
   $nik2 = str_replace('Y', '?????', $nik2);
   $nik2 = str_replace('U', '?????', $nik2);
   $nik2 = str_replace('I', '????', $nik2);
   $nik2 = str_replace('O', '??????', $nik2);
   $nik2 = str_replace('P', '??????', $nik2);
   $nik2 = str_replace('A', '??????', $nik2);
   $nik2 = str_replace('S', 's???', $nik2);
   $nik2 = str_replace('D', '?????', $nik2);
   $nik2 = str_replace('F', '?????', $nik2);
   $nik2 = str_replace('G', '?????', $nik2);
   $nik2 = str_replace('H', '?????', $nik2);
   $nik2 = str_replace('J', '??????', $nik2);
   $nik2 = str_replace('K', '??????', $nik2);
   $nik2 = str_replace('L', '?????', $nik2);
   $nik2 = str_replace('Z', '??????', $nik2);
   $nik2 = str_replace('X', 'x??', $nik2);
   $nik2 = str_replace('C', '??????', $nik2);
   $nik2 = str_replace('V', '?????', $nik2);
   $nik2 = str_replace('B', '?????', $nik2);
   $nik2 = str_replace('N', '?????', $nik2);
   $nik2 = str_replace('M', '??????', $nik2);

$nik3 = $text;
$nik3 = str_replace('a', '??', $nik3);
$nik3 = str_replace('b', '??', $nik3);
$nik3 = str_replace('c', '??', $nik3);
$nik3 = str_replace('d', '???', $nik3);
$nik3 = str_replace('e', '??', $nik3);
$nik3 = str_replace('f', '??', $nik3);
$nik3 = str_replace('g', 'g', $nik3);
$nik3 = str_replace('h', '??', $nik3);
$nik3 = str_replace('i', '??', $nik3);
$nik3 = str_replace('j', '??', $nik3);
$nik3 = str_replace('k', '??', $nik3);
$nik3 = str_replace('l', '???', $nik3);
$nik3 = str_replace('m', '??', $nik3);
$nik3 = str_replace('n', '??', $nik3);
$nik3 = str_replace('o', '??', $nik3);
$nik3 = str_replace('p', '??', $nik3);
$nik3 = str_replace('q', 'q', $nik3);
$nik3 = str_replace('r', '??', $nik3);
$nik3 = str_replace('s', '??', $nik3);
$nik3 = str_replace('t', '??', $nik3);
$nik3 = str_replace('u', '??', $nik3);
$nik3 = str_replace('v', '??', $nik3);
$nik3 = str_replace('w', '??', $nik3);
$nik3 = str_replace('x', '??', $nik3);
$nik3 = str_replace('y', '??', $nik3);
$nik3 = str_replace('z', 'z', $nik3);
$nik3 = str_replace('A', '??', $nik3);
$nik3 = str_replace('B', '??', $nik3);
$nik3 = str_replace('C', '??', $nik3);
$nik3 = str_replace('D', '???', $nik3);
$nik3 = str_replace('E', '??', $nik3);
$nik3 = str_replace('F', '??', $nik3);
$nik3 = str_replace('G', 'g', $nik3);
$nik3 = str_replace('H', '??', $nik3);
$nik3 = str_replace('I', '??', $nik3);
$nik3 = str_replace('J', '??', $nik3);
$nik3 = str_replace('K', '??', $nik3);
$nik3 = str_replace('L', '???', $nik3);
$nik3 = str_replace('M', '??', $nik3);
$nik3 = str_replace('N', '??', $nik3);
$nik3 = str_replace('O', '??', $nik3);
$nik3 = str_replace('P', '??', $nik3);
$nik3 = str_replace('Q', 'q', $nik3);
$nik3 = str_replace('R', '??', $nik3);
$nik3 = str_replace('S', '??', $nik3);
$nik3 = str_replace('T', '??', $nik3);
$nik3 = str_replace('U', '??', $nik3);
$nik3 = str_replace('V', '??', $nik3);
$nik3 = str_replace('W', '??', $nik3);
$nik3 = str_replace('X', '??', $nik3);
$nik3 = str_replace('Y', '??', $nik3);
$nik3 = str_replace('Z', 'z', $nik3);

$nik4 = $text;
$nik4 = str_replace('a', '???', $nik4);
$nik4 = str_replace('b', '???', $nik4);
$nik4 = str_replace('c', '??', $nik4);
$nik4 = str_replace('d', '???', $nik4);
$nik4 = str_replace('e', '??', $nik4);
$nik4 = str_replace('f', '??', $nik4);
$nik4 = str_replace('g', 'g', $nik4);
$nik4 = str_replace('h', '??', $nik4);
$nik4 = str_replace('i', '???', $nik4);
$nik4 = str_replace('j', '??', $nik4);
$nik4 = str_replace('k', '??', $nik4);
$nik4 = str_replace('l', 'l', $nik4);
$nik4 = str_replace('m', '???', $nik4);
$nik4 = str_replace('n', '???', $nik4);
$nik4 = str_replace('o', '???', $nik4);
$nik4 = str_replace('p', '??', $nik4);
$nik4 = str_replace('q', '???', $nik4);
$nik4 = str_replace('r', '??', $nik4);
$nik4 = str_replace('s', '???', $nik4);
$nik4 = str_replace('t', 't', $nik4);
$nik4 = str_replace('u', '???', $nik4);
$nik4 = str_replace('v', '??', $nik4);
$nik4 = str_replace('w', '???', $nik4);
$nik4 = str_replace('x', '??', $nik4);
$nik4 = str_replace('y', '??', $nik4);
$nik4 = str_replace('z', 'z', $nik4);

$nik4 = str_replace('A', '???', $nik4);
$nik4 = str_replace('B', '???', $nik4);
$nik4 = str_replace('C', '??', $nik4);
$nik4 = str_replace('D', '???', $nik4);
$nik4 = str_replace('E', '??', $nik4);
$nik4 = str_replace('F', '??', $nik4);
$nik4 = str_replace('G', 'g', $nik4);
$nik4 = str_replace('H', '??', $nik4);
$nik4 = str_replace('I', '???', $nik4);
$nik4 = str_replace('J', '??', $nik4);
$nik4 = str_replace('K', '??', $nik4);
$nik4 = str_replace('L', 'l', $nik4);
$nik4 = str_replace('M', '???', $nik4);
$nik4 = str_replace('N', '???', $nik4);
$nik4 = str_replace('O', '???', $nik4);
$nik4 = str_replace('P', '??', $nik4);
$nik4 = str_replace('Q', '???', $nik4);
$nik4 = str_replace('R', '??', $nik4);
$nik4 = str_replace('S', '???', $nik4);
$nik4 = str_replace('T', 't', $nik4);
$nik4 = str_replace('U', '???', $nik4);
$nik4 = str_replace('V', '??', $nik4);
$nik4 = str_replace('W', '???', $nik4);
$nik4 = str_replace('X', '??', $nik4);
$nik4 = str_replace('Y', '??', $nik4);
$nik4 = str_replace('Z', 'z', $nik4);

$nik5 = $text;
$nik5 = str_replace('a', '??', $nik5);
$nik5 = str_replace('b', 'b', $nik5);
$nik5 = str_replace('c', '??', $nik5);
$nik5 = str_replace('d', 'd', $nik5);
$nik5 = str_replace('e', '??', $nik5);
$nik5 = str_replace('f', 'f', $nik5);
$nik5 = str_replace('g', '??', $nik5);
$nik5 = str_replace('h', 'h', $nik5);
$nik5 = str_replace('i', '??', $nik5);
$nik5 = str_replace('j', 'j', $nik5);
$nik5 = str_replace('k', 'k', $nik5);
$nik5 = str_replace('l', 'l', $nik5);
$nik5 = str_replace('m', 'm', $nik5);
$nik5 = str_replace('n', 'n', $nik5);
$nik5 = str_replace('o', '??', $nik5);
$nik5 = str_replace('p', 'p', $nik5);
$nik5 = str_replace('q', 'q', $nik5);
$nik5 = str_replace('r', 'r', $nik5);
$nik5 = str_replace('s', 's', $nik5);
$nik5 = str_replace('t', 't', $nik5);
$nik5 = str_replace('u', '??', $nik5);
$nik5 = str_replace('v', 'v', $nik5);
$nik5 = str_replace('w', 'w', $nik5);
$nik5 = str_replace('x', 'x', $nik5);
$nik5 = str_replace('y', '??', $nik5);
$nik5 = str_replace('z', '??', $nik5);

$nik5 = str_replace('A', '??', $nik5);
$nik5 = str_replace('B', 'b', $nik5);
$nik5 = str_replace('C', '??', $nik5);
$nik5 = str_replace('D', 'd', $nik5);
$nik5 = str_replace('E', '??', $nik5);
$nik5 = str_replace('F', 'f', $nik5);
$nik5 = str_replace('G', '??', $nik5);
$nik5 = str_replace('H', 'h', $nik5);
$nik5 = str_replace('I', '??', $nik5);
$nik5 = str_replace('J', 'j', $nik5);
$nik5 = str_replace('K', 'k', $nik5);
$nik5 = str_replace('L', 'l', $nik5);
$nik5 = str_replace('M', 'm', $nik5);
$nik5 = str_replace('N', 'n', $nik5);
$nik5 = str_replace('O', '??', $nik5);
$nik5 = str_replace('P', 'p', $nik5);
$nik5 = str_replace('Q', 'q', $nik5);
$nik5 = str_replace('R', 'r', $nik5);
$nik5 = str_replace('S', 's', $nik5);
$nik5 = str_replace('T', 't', $nik5);
$nik5 = str_replace('U', '??', $nik5);
$nik5 = str_replace('V', 'v', $nik5);
$nik5 = str_replace('W', 'w', $nik5);
$nik5 = str_replace('X', 'x', $nik5);
$nik5 = str_replace('Y', '??', $nik5);
$nik5 = str_replace('Z', '??', $nik5);

$nik6 = $text;
$nik6 = str_replace('a', '???', $nik6);
$nik6 = str_replace('b', '???', $nik6);
$nik6 = str_replace('c', '???', $nik6);
$nik6 = str_replace('d', '???', $nik6);
$nik6 = str_replace('e', '???', $nik6);
$nik6 = str_replace('f', '???', $nik6);
$nik6 = str_replace('g', '???', $nik6);
$nik6 = str_replace('h', '???', $nik6);
$nik6 = str_replace('i', '???', $nik6);
$nik6 = str_replace('j', '???', $nik6);
$nik6 = str_replace('k', '???', $nik6);
$nik6 = str_replace('l', '???', $nik6);
$nik6 = str_replace('m', '???', $nik6);
$nik6 = str_replace('n', '???', $nik6);
$nik6 = str_replace('o', '???', $nik6);
$nik6 = str_replace('p', '???', $nik6);
$nik6 = str_replace('q', '???', $nik6);
$nik6 = str_replace('r', '???', $nik6);
$nik6 = str_replace('s', '???', $nik6);
$nik6 = str_replace('t', '???', $nik6);
$nik6 = str_replace('u', '???', $nik6);
$nik6 = str_replace('v', '???', $nik6);
$nik6 = str_replace('w', '???', $nik6);
$nik6 = str_replace('x', '???', $nik6);
$nik6 = str_replace('y', '???', $nik6);
$nik6 = str_replace('z', '???', $nik6);

$nik6 = str_replace('A', '???', $nik6);
$nik6 = str_replace('B', '???', $nik6);
$nik6 = str_replace('C', '???', $nik6);
$nik6 = str_replace('D', '???', $nik6);
$nik6 = str_replace('E', '???', $nik6);
$nik6 = str_replace('F', '???', $nik6);
$nik6 = str_replace('G', '???', $nik6);
$nik6 = str_replace('H', '???', $nik6);
$nik6 = str_replace('I', '???', $nik6);
$nik6 = str_replace('J', '???', $nik6);
$nik6 = str_replace('K', '???', $nik6);
$nik6 = str_replace('L', '???', $nik6);
$nik6 = str_replace('M', '???', $nik6);
$nik6 = str_replace('N', '???', $nik6);
$nik6 = str_replace('O', '???', $nik6);
$nik6 = str_replace('P', '???', $nik6);
$nik6 = str_replace('Q', '???', $nik6);
$nik6 = str_replace('R', '???', $nik6);
$nik6 = str_replace('S', '???', $nik6);
$nik6 = str_replace('T', '???', $nik6);
$nik6 = str_replace('U', '???', $nik6);
$nik6 = str_replace('V', '???', $nik6);
$nik6 = str_replace('W', '???', $nik6);
$nik6 = str_replace('X', '???', $nik6);
$nik6 = str_replace('Y', '???', $nik6);
$nik6 = str_replace('Z', '???', $nik6);

$nik7 = $text;
$nik7 = str_replace('a', '???', $nik7);
$nik7 = str_replace('b', '???', $nik7);
$nik7 = str_replace('c', '???', $nik7);
$nik7 = str_replace('d', '???', $nik7);
$nik7 = str_replace('e', '???', $nik7);
$nik7 = str_replace('f', '???', $nik7);
$nik7 = str_replace('g', '???', $nik7);
$nik7 = str_replace('h', '???', $nik7);
$nik7 = str_replace('i', '???', $nik7);
$nik7 = str_replace('j', '???', $nik7);
$nik7 = str_replace('k', '???', $nik7);
$nik7 = str_replace('l', '???', $nik7);
$nik7 = str_replace('m', '???', $nik7);
$nik7 = str_replace('n', '???', $nik7);
$nik7 = str_replace('o', '???', $nik7);
$nik7 = str_replace('p', '???', $nik7);
$nik7 = str_replace('q', '???', $nik7);
$nik7 = str_replace('r', '???', $nik7);
$nik7 = str_replace('s', '??', $nik7);
$nik7 = str_replace('t', '???', $nik7);
$nik7 = str_replace('u', '???', $nik7);
$nik7 = str_replace('v', '???', $nik7);
$nik7 = str_replace('w', '???', $nik7);
$nik7 = str_replace('x', '??', $nik7);
$nik7 = str_replace('y', '??', $nik7);
$nik7 = str_replace('z', '???', $nik7);
$nik7 = str_replace('A', '???', $nik7);
$nik7 = str_replace('B', '???', $nik7);
$nik7 = str_replace('C', '???', $nik7);
$nik7 = str_replace('D', '???', $nik7);
$nik7 = str_replace('E', '???', $nik7);
$nik7 = str_replace('F', '???', $nik7);
$nik7 = str_replace('G', '???', $nik7);
$nik7 = str_replace('H', '???', $nik7);
$nik7 = str_replace('I', '???', $nik7);
$nik7 = str_replace('J', '???', $nik7);
$nik7 = str_replace('K', '???', $nik7);
$nik7 = str_replace('L', '???', $nik7);
$nik7 = str_replace('M', '???', $nik7);
$nik7 = str_replace('N', '???', $nik7);
$nik7 = str_replace('O', '???', $nik7);
$nik7 = str_replace('P', '???', $nik7);
$nik7 = str_replace('Q', '???', $nik7);
$nik7 = str_replace('R', '???', $nik7);
$nik7 = str_replace('S', '??', $nik7);
$nik7 = str_replace('T', '???', $nik7);
$nik7 = str_replace('U', '???', $nik7);
$nik7 = str_replace('V', '???', $nik7);
$nik7 = str_replace('W', '???', $nik7);
$nik7 = str_replace('X', '??', $nik7);
$nik7 = str_replace('Y', '??', $nik7);
$nik7 = str_replace('Z', '???', $nik7);

$nik8 = $text;
$nik8 = str_replace('a', 'a??', $nik8);
$nik8 = str_replace('b', 'b??', $nik8);
$nik8 = str_replace('c', 'c??', $nik8);
$nik8 = str_replace('d', 'd??', $nik8);
$nik8 = str_replace('e', 'e??', $nik8);
$nik8 = str_replace('f', 'f??', $nik8);
$nik8 = str_replace('g', 'g??', $nik8);
$nik8 = str_replace('h', 'h??', $nik8);
$nik8 = str_replace('i', 'i??', $nik8);
$nik8 = str_replace('j', 'j??', $nik8);
$nik8 = str_replace('k', 'k??', $nik8);
$nik8 = str_replace('l', 'l??', $nik8);
$nik8 = str_replace('m', 'm??', $nik8);
$nik8 = str_replace('n', 'n??', $nik8);
$nik8 = str_replace('o', 'o??', $nik8);
$nik8 = str_replace('p', 'p??', $nik8);
$nik8 = str_replace('q', 'q??', $nik8);
$nik8 = str_replace('r', 'r??', $nik8);
$nik8 = str_replace('s', 's??', $nik8);
$nik8 = str_replace('t', 't??', $nik8);
$nik8 = str_replace('u', 'u??', $nik8);
$nik8 = str_replace('v', 'v??', $nik8);
$nik8 = str_replace('w', 'w??', $nik8);
$nik8 = str_replace('x', 'x??', $nik8);
$nik8 = str_replace('y', 'y??', $nik8);
$nik8 = str_replace('z', 'z??', $nik8);
$nik8 = str_replace('A', 'a??', $nik8);
$nik8 = str_replace('B', 'b??', $nik8);
$nik8 = str_replace('C', 'c??', $nik8);
$nik8 = str_replace('D', 'd??', $nik8);
$nik8 = str_replace('E', 'e??', $nik8);
$nik8 = str_replace('F', 'f??', $nik8);
$nik8 = str_replace('G', 'g??', $nik8);
$nik8 = str_replace('H', 'h??', $nik8);
$nik8 = str_replace('I', 'i??', $nik8);
$nik8 = str_replace('J', 'j??', $nik8);
$nik8 = str_replace('K', 'k??', $nik8);
$nik8 = str_replace('L', 'l??', $nik8);
$nik8 = str_replace('M', 'm??', $nik8);
$nik8 = str_replace('N', 'n??', $nik8);
$nik8 = str_replace('O', 'o??', $nik8);
$nik8 = str_replace('P', 'p??', $nik8);
$nik8 = str_replace('Q', 'q??', $nik8);
$nik8 = str_replace('R', 'r??', $nik8);
$nik8 = str_replace('S', 's??', $nik8);
$nik8 = str_replace('T', 't??', $nik8);
$nik8 = str_replace('U', 'u??', $nik8);
$nik8 = str_replace('V', 'v??', $nik8);
$nik8 = str_replace('W', 'w??', $nik8);
$nik8 = str_replace('X', 'x??', $nik8);
$nik8 = str_replace('Y', 'y??', $nik8);
$nik8 = str_replace('Z', 'z??', $nik8);

$nik9 = $text;
$nik9 = str_replace('q', '??' , $nik9);
  	 $nik9 = str_replace('w', '??' , $nik9);
	 $nik9 = str_replace('e', '??' , $nik9);
  	 $nik9 = str_replace('r', '??' , $nik9);
	 $nik9 = str_replace('t', '???' , $nik9);
  	 $nik9 = str_replace('y', '??' , $nik9);
	 $nik9 = str_replace('u', '??' , $nik9);
  	 $nik9 = str_replace('i', '??' , $nik9);
	 $nik9 = str_replace('o', '??' , $nik9);
  	 $nik9 = str_replace('p', '??' , $nik9);
	 $nik9 = str_replace('a', '??' , $nik9);
  	 $nik9 = str_replace('s', '??' , $nik9);
	 $nik9 = str_replace('d', '??' , $nik9);
  	 $nik9 = str_replace('f', '??' , $nik9);
	 $nik9 = str_replace('g', '???' , $nik9);
  	 $nik9 = str_replace('h', '???' , $nik9);
	 $nik9 = str_replace('j', 'J' , $nik9);
  	 $nik9 = str_replace('k', '??' , $nik9);
	 $nik9 = str_replace('l', '??' , $nik9);
  	 $nik9 = str_replace('z', '???' , $nik9);
	 $nik9 = str_replace('x', '??' , $nik9);
  	 $nik9 = str_replace('c', '??' , $nik9);
	 $nik9 = str_replace('v', '???' , $nik9);
  	 $nik9 = str_replace('b', '??' , $nik9);
  	 $nik9 = str_replace('n', '??' , $nik9);
	 $nik9 = str_replace('m', '???' , $nik9);
	
	$nik9 = str_replace('Q', '??' , $nik9);
  	 $nik9 = str_replace('W', '??' , $nik9);
	 $nik9 = str_replace('E', '??' , $nik9);
  	 $nik9 = str_replace('R', '??' , $nik9);
	 $nik9 = str_replace('T', '???' , $nik9);
  	 $nik9 = str_replace('Y', '??' , $nik9);
	 $nik9 = str_replace('U', '??' , $nik9);
  	 $nik9 = str_replace('I', '??' , $nik9);
	 $nik9 = str_replace('O', '??' , $nik9);
  	 $nik9 = str_replace('P', '??' , $nik9);
	 $nik9 = str_replace('A', '??' , $nik9);
  	 $nik9 = str_replace('S', '??' , $nik9);
	 $nik9 = str_replace('D', '??' , $nik9);
  	 $nik9 = str_replace('F', '??' , $nik9);
	 $nik9 = str_replace('G', '???' , $nik9);
  	 $nik9 = str_replace('H', '???' , $nik9);
	 $nik9 = str_replace('J', 'J' , $nik9);
  	 $nik9 = str_replace('K', '??' , $nik9);
	 $nik9 = str_replace('L', '??' , $nik9);
  	 $nik9 = str_replace('Z', '???' , $nik9);
	 $nik9 = str_replace('X', '??' , $nik9);
  	 $nik9 = str_replace('C', '??' , $nik9);
	 $nik9 = str_replace('V', '???' , $nik9);
  	 $nik9 = str_replace('B', '??' , $nik9);
  	 $nik9 = str_replace('N', '??' , $nik9);
	 $nik9 = str_replace('M', '???' , $nik9);
	
$nik10 = $text;
 $nik10 = str_replace('q', '???' , $nik10);
  	 $nik10 = str_replace('w', '???' , $nik10);
	 $nik10 = str_replace('e', '???' , $nik10);
  	 $nik10 = str_replace('r', '???' , $nik10);
	 $nik10 = str_replace('t', '???' , $nik10);
  	 $nik10 = str_replace('y', '???' , $nik10);
	 $nik10 = str_replace('u', '???' , $nik10);
  	 $nik10 = str_replace('i', '???' , $nik10);
	 $nik10 = str_replace('o', '???' , $nik10);
  	 $nik10 = str_replace('p', '???' , $nik10);
	 $nik10 = str_replace('a', '???' , $nik10);
  	 $nik10 = str_replace('s', '???' , $nik10);
	 $nik10 = str_replace('d', '???' , $nik10);
  	 $nik10 = str_replace('f', '??' , $nik10);
	 $nik10 = str_replace('g', '???' , $nik10);
  	 $nik10 = str_replace('h', '???' , $nik10);
	 $nik10 = str_replace('j', '???' , $nik10);
  	 $nik10 = str_replace('k', '???' , $nik10);
	 $nik10 = str_replace('l', '???' , $nik10);
  	 $nik10 = str_replace('z', '???' , $nik10);
	 $nik10 = str_replace('x', '???' , $nik10);
  	 $nik10 = str_replace('c', '??' , $nik10);
	 $nik10 = str_replace('v', '???' , $nik10);
  	 $nik10 = str_replace('b', '???' , $nik10);
  	 $nik10 = str_replace('n', '???' , $nik10);
	 $nik10 = str_replace('m', '???' , $nik10);
	
	$nik10 = str_replace('Q', '???' , $nik10);
  	 $nik10 = str_replace('W', '???' , $nik10);
	 $nik10 = str_replace('E', '???' , $nik10);
  	 $nik10 = str_replace('R', '???' , $nik10);
	 $nik10 = str_replace('T', '???' , $nik10);
  	 $nik10 = str_replace('Y', '???' , $nik10);
	 $nik10 = str_replace('U', '???' , $nik10);
  	 $nik10 = str_replace('I', '???' , $nik10);
	 $nik10 = str_replace('O', '???' , $nik10);
  	 $nik10 = str_replace('P', '???' , $nik10);
	 $nik10 = str_replace('A', '???' , $nik10);
  	 $nik10 = str_replace('S', '???' , $nik10);
	 $nik10 = str_replace('D', '???' , $nik10);
  	 $nik10 = str_replace('F', '??' , $nik10);
	 $nik10 = str_replace('G', '???' , $nik10);
  	 $nik10 = str_replace('H', '???' , $nik10);
	 $nik10 = str_replace('J', '???' , $nik10);
  	 $nik10 = str_replace('K', '???' , $nik10);
	 $nik10 = str_replace('L', '???' , $nik10);
  	 $nik10 = str_replace('Z', '???' , $nik10);
	 $nik10 = str_replace('X', '???' , $nik10);
  	 $nik10 = str_replace('C', '??' , $nik10);
	 $nik10 = str_replace('V', '???' , $nik10);
  	 $nik10 = str_replace('B', '???' , $nik10);
  	 $nik10 = str_replace('N', '???' , $nik10);
	 $nik10 = str_replace('M', '???' , $nik10);
	
$nik11 = $text;
$nik11 = str_replace('a', '??????', $nik11);
$nik11 = str_replace('b', '??????', $nik11);
$nik11 = str_replace('c', 'c????', $nik11);
$nik11 = str_replace('d', 'd????', $nik11);
$nik11 = str_replace('e', '??????', $nik11);
$nik11 = str_replace('f', '??????', $nik11);
$nik11 = str_replace('g', 'G????', $nik11);
$nik11 = str_replace('h', '??????', $nik11);
$nik11 = str_replace('i', '??????', $nik11);
$nik11 = str_replace('j', '??', $nik11);
$nik11 = str_replace('k', '????', $nik11);
$nik11 = str_replace('l', 'l????', $nik11);
$nik11 = str_replace('m', '??????', $nik11);
$nik11 = str_replace('n', '??????', $nik11);
$nik11 = str_replace('o', '??????', $nik11);
$nik11 = str_replace('p', '??????', $nik11);
$nik11 = str_replace('q', 'Q????', $nik11);
$nik11 = str_replace('r', '??????', $nik11);
$nik11 = str_replace('s', '??????', $nik11);
$nik11 = str_replace('t', '??????', $nik11);
$nik11 = str_replace('u', '??????', $nik11);
$nik11 = str_replace('v', '??????', $nik11);
$nik11 = str_replace('w', '??????', $nik11);
$nik11 = str_replace('x', 'x????', $nik11);
$nik11 = str_replace('y', '??????', $nik11);
$nik11 = str_replace('z', 'z????', $nik11);

$nik11 = str_replace('A', '??????', $nik11);
$nik11 = str_replace('B', '??????', $nik11);
$nik11 = str_replace('C', 'c????', $nik11);
$nik11 = str_replace('D', 'd????', $nik11);
$nik11 = str_replace('E', '??????', $nik11);
$nik11 = str_replace('F', '??????', $nik11);
$nik11 = str_replace('G', 'G????', $nik11);
$nik11 = str_replace('H', '??????', $nik11);
$nik11 = str_replace('I', '??????', $nik11);
$nik11 = str_replace('J', '??', $nik11);
$nik11 = str_replace('K', '????', $nik11);
$nik11 = str_replace('L', 'l????', $nik11);
$nik11 = str_replace('M', '??????', $nik11);
$nik11 = str_replace('N', '??????', $nik11);
$nik11 = str_replace('O', '??????', $nik11);
$nik11 = str_replace('P', '??????', $nik11);
$nik11 = str_replace('Q', 'Q????', $nik11);
$nik11 = str_replace('R', '??????', $nik11);
$nik11 = str_replace('S', '??????', $nik11);
$nik11 = str_replace('T', '??????', $nik11);
$nik11 = str_replace('U', '??????', $nik11);
$nik11 = str_replace('V', '??????', $nik11);
$nik11 = str_replace('W', '??????', $nik11);
$nik11 = str_replace('X', 'x????', $nik11);
$nik11 = str_replace('Y', '??????', $nik11);
$nik11 = str_replace('Z', 'z????', $nik11);


$nik12 = $text;
$nik12 = str_replace('a', '??????', $nik12);
$nik12 = str_replace('b', '??????', $nik12);
$nik12 = str_replace('c', 'c????', $nik12);
$nik12 = str_replace('d', 'd????', $nik12);
$nik12 = str_replace('e', '??????', $nik12);
$nik12 = str_replace('f', '??????', $nik12);
$nik12 = str_replace('g', 'G????', $nik12);
$nik12 = str_replace('h', '??????', $nik12);
$nik12 = str_replace('i', '??????', $nik12);
$nik12 = str_replace('j', '??????', $nik12);
$nik12 = str_replace('k', '??????', $nik12);
$nik12 = str_replace('l', 'l????', $nik12);
$nik12 = str_replace('m', '??????', $nik12);
$nik12 = str_replace('n', '??????', $nik12);
$nik12 = str_replace('o', '??????', $nik12);
$nik12 = str_replace('p', '??????', $nik12);
$nik12 = str_replace('q', 'Q????', $nik12);
$nik12 = str_replace('r', '??????', $nik12);
$nik12 = str_replace('s', '??????', $nik12);
$nik12 = str_replace('t', '??????', $nik12);
$nik12 = str_replace('u', '??????', $nik12);
$nik12 = str_replace('v', '??????', $nik12);
$nik12 = str_replace('w', '??????', $nik12);
$nik12 = str_replace('x', 'x????', $nik12);
$nik12 = str_replace('y', '??????', $nik12);
$nik12 = str_replace('z', 'z????', $nik12);

$nik12 = str_replace('A', '??????', $nik12);
$nik12 = str_replace('B', '??????', $nik12);
$nik12 = str_replace('C', 'c????', $nik12);
$nik12 = str_replace('D', 'd????', $nik12);
$nik12 = str_replace('E', '??????', $nik12);
$nik12 = str_replace('F', '??????', $nik12);
$nik12 = str_replace('G', 'G????', $nik12);
$nik12 = str_replace('H', '??????', $nik12);
$nik12 = str_replace('I', '??????', $nik12);
$nik12 = str_replace('J', '??????', $nik12);
$nik12 = str_replace('K', '??????', $nik12);
$nik12 = str_replace('L', 'l????', $nik12);
$nik12 = str_replace('M', '??????', $nik12);
$nik12 = str_replace('N', '??????', $nik12);
$nik12 = str_replace('O', '??????', $nik12);
$nik12 = str_replace('P', '??????', $nik12);
$nik12 = str_replace('Q', 'Q????', $nik12);
$nik12 = str_replace('R', '??????', $nik12);
$nik12 = str_replace('S', '??????', $nik12);
$nik12 = str_replace('T', '??????', $nik12);
$nik12 = str_replace('U', '??????', $nik12);
$nik12 = str_replace('V', '??????', $nik12);
$nik12 = str_replace('W', '??????', $nik12);
$nik12 = str_replace('X', 'x????', $nik12);
$nik12 = str_replace('Y', '??????', $nik12);
$nik12 = str_replace('Z', 'z????', $nik12);


$nik13 = $text;
$nik13 = str_replace('a', '????', $nik13);
$nik13 = str_replace('b', '????', $nik13);
$nik13 = str_replace('c', '??c', $nik13);
$nik13 = str_replace('d', '????', $nik13);
$nik13 = str_replace('e', '????', $nik13);
$nik13 = str_replace('f', '??f', $nik13);
$nik13 = str_replace('g', '????', $nik13);
$nik13 = str_replace('h', '????', $nik13);
$nik13 = str_replace('i', '????', $nik13);
$nik13 = str_replace('j', '?????', $nik13);
$nik13 = str_replace('k', '????', $nik13);
$nik13 = str_replace('l', '?????', $nik13);
$nik13 = str_replace('m', '????', $nik13);
$nik13 = str_replace('n', '????', $nik13);
$nik13 = str_replace('o', '????', $nik13);
$nik13 = str_replace('p', '????', $nik13);
$nik13 = str_replace('q', '??q', $nik13);
$nik13 = str_replace('r', '????', $nik13);
$nik13 = str_replace('s', '??s', $nik13);
$nik13 = str_replace('t', '????', $nik13);
$nik13 = str_replace('u', '????', $nik13);
$nik13 = str_replace('v', '??v', $nik13);
$nik13 = str_replace('w', '????', $nik13);
$nik13 = str_replace('x', '??x', $nik13);
$nik13 = str_replace('y', '??y', $nik13);
$nik13 = str_replace('z', '??z', $nik13);
$nik13 = str_replace('A', '????', $nik13);
$nik13 = str_replace('B', '????', $nik13);
$nik13 = str_replace('C', '??c', $nik13);
$nik13 = str_replace('D', '????', $nik13);
$nik13 = str_replace('E', '????', $nik13);
$nik13 = str_replace('F', '??f', $nik13);
$nik13 = str_replace('G', '????', $nik13);
$nik13 = str_replace('H', '????', $nik13);
$nik13 = str_replace('I', '????', $nik13);
$nik13 = str_replace('J', '?????', $nik13);
$nik13 = str_replace('K', '????', $nik13);
$nik13 = str_replace('L', '?????', $nik13);
$nik13 = str_replace('M', '????', $nik13);
$nik13 = str_replace('N', '????', $nik13);
$nik13 = str_replace('O', '????', $nik13);
$nik13 = str_replace('P', '????', $nik13);
$nik13 = str_replace('Q', '??q', $nik13);
$nik13 = str_replace('R', '????', $nik13);
$nik13 = str_replace('S', '??s', $nik13);
$nik13 = str_replace('T', '????', $nik13);
$nik13 = str_replace('U', '????', $nik13);
$nik13 = str_replace('V', '??v', $nik13);
$nik13 = str_replace('W', '????', $nik13);
$nik13 = str_replace('X', '??x', $nik13);
$nik13 = str_replace('Y', '??y', $nik13);
$nik13 = str_replace('Z', '??z', $nik13);


$nik14 = $text;
$nik14 = str_replace('a', '??', $nik14);
$nik14 = str_replace('b', 'q', $nik14);
$nik14 = str_replace('c', '??', $nik14);
$nik14 = str_replace('d', 'p', $nik14);
$nik14 = str_replace('e', '??', $nik14);
$nik14 = str_replace('f', '??', $nik14);
$nik14 = str_replace('g', '??', $nik14);
$nik14 = str_replace('h', '??', $nik14);
$nik14 = str_replace('i', '??', $nik14);
$nik14 = str_replace('j', '??', $nik14);
$nik14 = str_replace('k', '??', $nik14);
$nik14 = str_replace('l', '??', $nik14);
$nik14 = str_replace('m', '??', $nik14);
$nik14 = str_replace('n', 'u', $nik14);
$nik14 = str_replace('o', 'o', $nik14);
$nik14 = str_replace('p', 'd', $nik14);
$nik14 = str_replace('q', 'b', $nik14);
$nik14 = str_replace('r', '??', $nik14);
$nik14 = str_replace('s', 's', $nik14);
$nik14 = str_replace('t', '??', $nik14);
$nik14 = str_replace('u', 'n', $nik14);
$nik14 = str_replace('v', '??', $nik14);
$nik14 = str_replace('w', '??', $nik14);
$nik14 = str_replace('x', 'x', $nik14);
$nik14 = str_replace('y', '??', $nik14);
$nik14 = str_replace('z', 'z', $nik14);

$nik14 = str_replace('A', '??', $nik14);
$nik14 = str_replace('B', 'q', $nik14);
$nik14 = str_replace('C', '??', $nik14);
$nik14 = str_replace('D', 'p', $nik14);
$nik14 = str_replace('E', '??', $nik14);
$nik14 = str_replace('F', '??', $nik14);
$nik14 = str_replace('G', '??', $nik14);
$nik14 = str_replace('H', '??', $nik14);
$nik14 = str_replace('I', '??', $nik14);
$nik14 = str_replace('J', '??', $nik14);
$nik14 = str_replace('K', '??', $nik14);
$nik14 = str_replace('L', '??', $nik14);
$nik14 = str_replace('M', '??', $nik14);
$nik14 = str_replace('N', 'u', $nik14);
$nik14 = str_replace('O', 'o', $nik14);
$nik14 = str_replace('P', 'd', $nik14);
$nik14 = str_replace('Q', 'b', $nik14);
$nik14 = str_replace('R', '??', $nik14);
$nik14 = str_replace('S', 's', $nik14);
$nik14 = str_replace('T', '??', $nik14);
$nik14 = str_replace('U', 'n', $nik14);
$nik14 = str_replace('V', '??', $nik14);
$nik14 = str_replace('W', '??', $nik14);
$nik14 = str_replace('X', 'x', $nik14);
$nik14 = str_replace('Y', '??', $nik14);
$nik14 = str_replace('Z', 'z', $nik14);


$nik15 = $text;
$nik15 = str_replace('a', '??', $nik15);
$nik15 = str_replace('b', '???', $nik15);
$nik15 = str_replace('c', '??', $nik15);
$nik15 = str_replace('d', '??', $nik15);
$nik15 = str_replace('e', '??', $nik15);
$nik15 = str_replace('f', '???', $nik15);
$nik15 = str_replace('g', '??', $nik15);
$nik15 = str_replace('h', '??', $nik15);
$nik15 = str_replace('i', '??', $nik15);
$nik15 = str_replace('j', 'J', $nik15);
$nik15 = str_replace('k', '???', $nik15);
$nik15 = str_replace('l', '??', $nik15);
$nik15 = str_replace('m', 'M', $nik15);
$nik15 = str_replace('n', '???', $nik15);
$nik15 = str_replace('o', '??', $nik15);
$nik15 = str_replace('p', 'P', $nik15);
$nik15 = str_replace('q', '??', $nik15);
$nik15 = str_replace('r', '???', $nik15);
$nik15 = str_replace('s', '??', $nik15);
$nik15 = str_replace('t', '??', $nik15);
$nik15 = str_replace('u', '??', $nik15);
$nik15 = str_replace('v', '???', $nik15);
$nik15 = str_replace('w', '???', $nik15);
$nik15 = str_replace('x', '??', $nik15);
$nik15 = str_replace('y', '??', $nik15);
$nik15 = str_replace('z', '??', $nik15);

$nik15 = str_replace('A', '??', $nik15);
$nik15 = str_replace('B', '???', $nik15);
$nik15 = str_replace('C', '??', $nik15);
$nik15 = str_replace('D', '??', $nik15);
$nik15 = str_replace('E', '??', $nik15);
$nik15 = str_replace('F', '???', $nik15);
$nik15 = str_replace('G', '??', $nik15);
$nik15 = str_replace('H', '??', $nik15);
$nik15 = str_replace('I', '??', $nik15);
$nik15 = str_replace('J', 'J', $nik15);
$nik15 = str_replace('K', '???', $nik15);
$nik15 = str_replace('L', '??', $nik15);
$nik15 = str_replace('M', 'M', $nik15);
$nik15 = str_replace('N', '???', $nik15);
$nik15 = str_replace('O', '??', $nik15);
$nik15 = str_replace('P', 'P', $nik15);
$nik15 = str_replace('Q', '??', $nik15);
$nik15 = str_replace('R', '???', $nik15);
$nik15 = str_replace('S', '??', $nik15);
$nik15 = str_replace('T', '??', $nik15);
$nik15 = str_replace('U', '??', $nik15);
$nik15 = str_replace('V', '???', $nik15);
$nik15 = str_replace('W', '???', $nik15);
$nik15 = str_replace('X', '??', $nik15);
$nik15 = str_replace('Y', '??', $nik15);
$nik15 = str_replace('Z', '??', $nik15);


$nik16 = $text;
$nik16 = str_replace('a', '???', $nik16);
$nik16 = str_replace('b', '??', $nik16);
$nik16 = str_replace('c', '??', $nik16);
$nik16 = str_replace('d', '??', $nik16);
$nik16 = str_replace('e', '???', $nik16);
$nik16 = str_replace('f', '??', $nik16);
$nik16 = str_replace('g', '??', $nik16);
$nik16 = str_replace('h', '???', $nik16);
$nik16 = str_replace('i', '???', $nik16);
$nik16 = str_replace('j', '??', $nik16);
$nik16 = str_replace('k', '???', $nik16);
$nik16 = str_replace('l', '??', $nik16);
$nik16 = str_replace('m', '???', $nik16);
$nik16 = str_replace('n', '??', $nik16);
$nik16 = str_replace('o', '???', $nik16);
$nik16 = str_replace('p', '??', $nik16);
$nik16 = str_replace('q', 'Q', $nik16);
$nik16 = str_replace('r', '??', $nik16);
$nik16 = str_replace('s', '???', $nik16);
$nik16 = str_replace('t', '??', $nik16);
$nik16 = str_replace('u', '??', $nik16);
$nik16 = str_replace('v', 'V', $nik16);
$nik16 = str_replace('w', '???', $nik16);
$nik16 = str_replace('x', '???', $nik16);
$nik16 = str_replace('y', '???', $nik16);
$nik16 = str_replace('z', '???', $nik16);

$nik16 = str_replace('A', '???', $nik16);
$nik16 = str_replace('B', '??', $nik16);
$nik16 = str_replace('C', '??', $nik16);
$nik16 = str_replace('D', '??', $nik16);
$nik16 = str_replace('E', '???', $nik16);
$nik16 = str_replace('F', '??', $nik16);
$nik16 = str_replace('G', '??', $nik16);
$nik16 = str_replace('H', '???', $nik16);
$nik16 = str_replace('I', '???', $nik16);
$nik16 = str_replace('J', '??', $nik16);
$nik16 = str_replace('K', '???', $nik16);
$nik16 = str_replace('L', '??', $nik16);
$nik16 = str_replace('M', '???', $nik16);
$nik16 = str_replace('N', '??', $nik16);
$nik16 = str_replace('O', '???', $nik16);
$nik16 = str_replace('P', '??', $nik16);
$nik16 = str_replace('Q', 'Q', $nik16);
$nik16 = str_replace('R', '??', $nik16);
$nik16 = str_replace('S', '???', $nik16);
$nik16 = str_replace('T', '??', $nik16);
$nik16 = str_replace('U', '??', $nik16);
$nik16 = str_replace('V', 'V', $nik16);
$nik16 = str_replace('W', '???', $nik16);
$nik16 = str_replace('X', '???', $nik16);
$nik16 = str_replace('Y', '???', $nik16);
$nik16 = str_replace('Z', '???', $nik16);


$nik17 = $text;
$nik17 = str_replace('a', '???', $nik17);
$nik17 = str_replace('b', '???', $nik17);
$nik17 = str_replace('c', '??', $nik17);
$nik17 = str_replace('d', '???', $nik17);
$nik17 = str_replace('e', '??', $nik17);
$nik17 = str_replace('f', '??', $nik17);
$nik17 = str_replace('g', '??', $nik17);
$nik17 = str_replace('h', '??', $nik17);
$nik17 = str_replace('i', '???', $nik17);
$nik17 = str_replace('j', '??', $nik17);
$nik17 = str_replace('k', '??', $nik17);
$nik17 = str_replace('l', 'l', $nik17);
$nik17 = str_replace('m', '???', $nik17);
$nik17 = str_replace('n', '??', $nik17);
$nik17 = str_replace('o', '??', $nik17);
$nik17 = str_replace('p', '??', $nik17);
$nik17 = str_replace('q', '??', $nik17);
$nik17 = str_replace('r', '??', $nik17);
$nik17 = str_replace('s', '??', $nik17);
$nik17 = str_replace('t', '??', $nik17);
$nik17 = str_replace('u', '??', $nik17);
$nik17 = str_replace('v', '??', $nik17);
$nik17 = str_replace('w', '??', $nik17);
$nik17 = str_replace('x', '???', $nik17);
$nik17 = str_replace('y', '???', $nik17);
$nik17 = str_replace('z', 'z', $nik17);

$nik17 = str_replace('A', '???', $nik17);
$nik17 = str_replace('B', '???', $nik17);
$nik17 = str_replace('C', '??', $nik17);
$nik17 = str_replace('D', '???', $nik17);
$nik17 = str_replace('E', '??', $nik17);
$nik17 = str_replace('F', '??', $nik17);
$nik17 = str_replace('G', '??', $nik17);
$nik17 = str_replace('H', '??', $nik17);
$nik17 = str_replace('I', '???', $nik17);
$nik17 = str_replace('J', '??', $nik17);
$nik17 = str_replace('K', '??', $nik17);
$nik17 = str_replace('L', 'l', $nik17);
$nik17 = str_replace('M', '???', $nik17);
$nik17 = str_replace('N', '??', $nik17);
$nik17 = str_replace('O', '??', $nik17);
$nik17 = str_replace('P', '??', $nik17);
$nik17 = str_replace('Q', '??', $nik17);
$nik17 = str_replace('R', '??', $nik17);
$nik17 = str_replace('S', '??', $nik17);
$nik17 = str_replace('T', '??', $nik17);
$nik17 = str_replace('U', '??', $nik17);
$nik17 = str_replace('V', '??', $nik17);
$nik17 = str_replace('W', '??', $nik17);
$nik17 = str_replace('X', '???', $nik17);
$nik17 = str_replace('Y', '???', $nik17);
$nik17 = str_replace('Z', 'z', $nik17);


$nik18 = $text;
$nik18 = str_replace('a', '??', $nik18);
$nik18 = str_replace('b', '??', $nik18);
$nik18 = str_replace('c', '??', $nik18);
$nik18 = str_replace('d', '??', $nik18);
$nik18 = str_replace('e', '??', $nik18);
$nik18 = str_replace('f', '??', $nik18);
$nik18 = str_replace('g', '??', $nik18);
$nik18 = str_replace('h', '??', $nik18);
$nik18 = str_replace('i', '??', $nik18);
$nik18 = str_replace('j', '??', $nik18);
$nik18 = str_replace('k', '??', $nik18);
$nik18 = str_replace('l', '??', $nik18);
$nik18 = str_replace('m', '??', $nik18);
$nik18 = str_replace('n', '??', $nik18);
$nik18 = str_replace('o', '??', $nik18);
$nik18 = str_replace('p', '??', $nik18);
$nik18 = str_replace('q', '??', $nik18);
$nik18 = str_replace('r', '???', $nik18);
$nik18 = str_replace('s', '??', $nik18);
$nik18 = str_replace('t', '??', $nik18);
$nik18 = str_replace('u', '??', $nik18);
$nik18 = str_replace('v', '??', $nik18);
$nik18 = str_replace('w', '??', $nik18);
$nik18 = str_replace('x', '??', $nik18);
$nik18 = str_replace('y', '??', $nik18);
$nik18 = str_replace('z', '??', $nik18);

$nik18 = str_replace('A', '??', $nik18);
$nik18 = str_replace('B', '??', $nik18);
$nik18 = str_replace('C', '??', $nik18);
$nik18 = str_replace('D', '??', $nik18);
$nik18 = str_replace('E', '??', $nik18);
$nik18 = str_replace('F', '??', $nik18);
$nik18 = str_replace('G', '??', $nik18);
$nik18 = str_replace('H', '??', $nik18);
$nik18 = str_replace('I', '??', $nik18);
$nik18 = str_replace('J', '??', $nik18);
$nik18 = str_replace('K', '??', $nik18);
$nik18 = str_replace('L', '??', $nik18);
$nik18 = str_replace('M', '??', $nik18);
$nik18 = str_replace('N', '??', $nik18);
$nik18 = str_replace('O', '??', $nik18);
$nik18 = str_replace('P', '??', $nik18);
$nik18 = str_replace('Q', '??', $nik18);
$nik18 = str_replace('R', '???', $nik18);
$nik18 = str_replace('S', '??', $nik18);
$nik18 = str_replace('T', '??', $nik18);
$nik18 = str_replace('U', '??', $nik18);
$nik18 = str_replace('V', '??', $nik18);
$nik18 = str_replace('W', '??', $nik18);
$nik18 = str_replace('X', '??', $nik18);
$nik18 = str_replace('Y', '??', $nik18);
$nik18 = str_replace('Z', '??', $nik18);


$nik19 = $text;
$nik19 = str_replace('a', '????', $nik19);
$nik19 = str_replace('b', '????', $nik19);
$nik19 = str_replace('c', '????', $nik19);
$nik19 = str_replace('d', '????', $nik19);
$nik19 = str_replace('e', '????', $nik19);
$nik19 = str_replace('f', '????', $nik19);
$nik19 = str_replace('g', '????', $nik19);
$nik19 = str_replace('h', '????', $nik19);
$nik19 = str_replace('i', '????', $nik19);
$nik19 = str_replace('j', '????', $nik19);
$nik19 = str_replace('k', '????', $nik19);
$nik19 = str_replace('l', '????', $nik19);
$nik19 = str_replace('m', '????', $nik19);
$nik19 = str_replace('n', '????', $nik19);
$nik19 = str_replace('o', '????', $nik19);
$nik19 = str_replace('p', '????', $nik19);
$nik19 = str_replace('q', '????', $nik19);
$nik19 = str_replace('r', '????', $nik19);
$nik19 = str_replace('s', '????', $nik19);
$nik19 = str_replace('t', '????', $nik19);
$nik19 = str_replace('u', '????', $nik19);
$nik19 = str_replace('v', '????', $nik19);
$nik19 = str_replace('w', '????', $nik19);
$nik19 = str_replace('x', '????', $nik19);
$nik19 = str_replace('y', '????', $nik19);
$nik19 = str_replace('z', '????', $nik19);

$nik19 = str_replace('A', '????', $nik19);
$nik19 = str_replace('B', '????', $nik19);
$nik19 = str_replace('C', '????', $nik19);
$nik19 = str_replace('D', '????', $nik19);
$nik19 = str_replace('E', '????', $nik19);
$nik19 = str_replace('F', '????', $nik19);
$nik19 = str_replace('G', '????', $nik19);
$nik19 = str_replace('H', '????', $nik19);
$nik19 = str_replace('I', '????', $nik19);
$nik19 = str_replace('J', '????', $nik19);
$nik19 = str_replace('K', '????', $nik19);
$nik19 = str_replace('L', '????', $nik19);
$nik19 = str_replace('M', '????', $nik19);
$nik19 = str_replace('N', '????', $nik19);
$nik19 = str_replace('O', '????', $nik19);
$nik19 = str_replace('P', '????', $nik19);
$nik19 = str_replace('Q', '????', $nik19);
$nik19 = str_replace('R', '????', $nik19);
$nik19 = str_replace('S', '????', $nik19);
$nik19 = str_replace('T', '????', $nik19);
$nik19 = str_replace('U', '????', $nik19);
$nik19 = str_replace('V', '????', $nik19);
$nik19 = str_replace('W', '????', $nik19);
$nik19 = str_replace('X', '????', $nik19);
$nik19 = str_replace('Y', '????', $nik19);
$nik19 = str_replace('Z', '????', $nik19);


$nik20 = $text;
$nik20 = str_replace('a', '??????A??????', $nik20);
$nik20 = str_replace('b', '??????B??????', $nik20);
$nik20 = str_replace('c', '??????C??????', $nik20);
$nik20 = str_replace('d', '??????D??????', $nik20);
$nik20 = str_replace('e', '??????E??????', $nik20);
$nik20 = str_replace('f', '??????F??????', $nik20);
$nik20 = str_replace('g', '??????G??????', $nik20);
$nik20 = str_replace('h', '??????H??????', $nik20);
$nik20 = str_replace('i', '??????I??????', $nik20);
$nik20 = str_replace('j', '??????J??????', $nik20);
$nik20 = str_replace('k', '??????K??????', $nik20);
$nik20 = str_replace('l', '??????L??????', $nik20);
$nik20 = str_replace('m', '??????M??????', $nik20);
$nik20 = str_replace('n', '??????N??????', $nik20);
$nik20 = str_replace('o', '??????O??????', $nik20);
$nik20 = str_replace('p', '??????P??????', $nik20);
$nik20 = str_replace('q', '??????Q??????', $nik20);
$nik20 = str_replace('r', '??????R??????', $nik20);
$nik20 = str_replace('s', '??????S??????', $nik20);
$nik20 = str_replace('t', '??????T??????', $nik20);
$nik20 = str_replace('u', '??????U??????', $nik20);
$nik20 = str_replace('v', '??????V??????', $nik20);
$nik20 = str_replace('w', '??????W??????', $nik20);
$nik20 = str_replace('x', '??????X??????', $nik20);
$nik20 = str_replace('y', '??????Y??????', $nik20);
$nik20 = str_replace('z', '??????Z??????', $nik20);
$nik20 = str_replace('A', '??????A??????', $nik20);
$nik20 = str_replace('B', '??????B??????', $nik20);
$nik20 = str_replace('C', '??????C??????', $nik20);
$nik20 = str_replace('D', '??????D??????', $nik20);
$nik20 = str_replace('E', '??????E??????', $nik20);
$nik20 = str_replace('F', '??????F??????', $nik20);
$nik20 = str_replace('G', '??????G??????', $nik20);
$nik20 = str_replace('H', '??????H??????', $nik20);
$nik20 = str_replace('I', '??????I??????', $nik20);
$nik20 = str_replace('J', '??????J??????', $nik20);
$nik20 = str_replace('K', '??????K??????', $nik20);
$nik20 = str_replace('L', '??????L??????', $nik20);
$nik20 = str_replace('M', '??????M??????', $nik20);
$nik20 = str_replace('N', '??????N??????', $nik20);
$nik20 = str_replace('O', '??????O??????', $nik20);
$nik20 = str_replace('P', '??????P??????', $nik20);
$nik20 = str_replace('Q', '??????Q??????', $nik20);
$nik20 = str_replace('R', '??????R??????', $nik20);
$nik20 = str_replace('S', '??????S??????', $nik20);
$nik20 = str_replace('T', '??????T??????', $nik20);
$nik20 = str_replace('U', '??????U??????', $nik20);
$nik20 = str_replace('V', '??????V??????', $nik20);
$nik20 = str_replace('W', '??????W??????', $nik20);
$nik20 = str_replace('X', '??????X??????', $nik20);
$nik20 = str_replace('Y', '??????Y??????', $nik20);
$nik20 = str_replace('Z', '??????Z??????', $nik20);

file_put_contents("Bot/$cid.ism34","$nik34"); 
file_put_contents("Bot/$cid.ism33","$nik33"); 
file_put_contents("Bot/$cid.ism32","$nik32"); 
file_put_contents("Bot/$cid.ism31","$nik31"); 
file_put_contents("Bot/$cid.ism30","$nik30"); 
file_put_contents("Bot/$cid.ism29","$nik29"); 
file_put_contents("Bot/$cid.ism28","$nik28"); 
file_put_contents("Bot/$cid.ism27","$nik27"); 
file_put_contents("Bot/$cid.ism26","$nik26"); 
file_put_contents("Bot/$cid.ism25","$nik25"); 
file_put_contents("Bot/$cid.ism24","$nik24"); 
file_put_contents("Bot/$cid.ism23","$nik23"); 
file_put_contents("Bot/$cid.ism22","$nik22"); 
file_put_contents("Bot/$cid.ism21","$nik21"); 
file_put_contents("Bot/$cid.ism20","$nik20"); 
file_put_contents("Bot/$cid.ism19","$nik19"); 
file_put_contents("Bot/$cid.ism18","$nik18"); 
file_put_contents("Bot/$cid.ism17","$nik17"); 
file_put_contents("Bot/$cid.ism16","$nik16"); 
file_put_contents("Bot/$cid.ism15","$nik15"); 
file_put_contents("Bot/$cid.ism14","$nik14"); 
file_put_contents("Bot/$cid.ism13","$nik13"); 
file_put_contents("Bot/$cid.ism12","$nik12"); 
file_put_contents("Bot/$cid.ism11","$nik11"); 
file_put_contents("Bot/$cid.ism10","$nik10"); 
file_put_contents("Bot/$cid.ism9","$nik9"); 
file_put_contents("Bot/$cid.ism8","$nik8"); 
file_put_contents("Bot/$cid.ism7","$nik7"); 
file_put_contents("Bot/$cid.ism6","$nik6"); 
file_put_contents("Bot/$cid.ism5","$nik5"); 
file_put_contents("Bot/$cid.ism4","$nik4"); 
file_put_contents("Bot/$cid.ism3","$nik3"); 
file_put_contents("Bot/$cid.ism2","$nik1"); 
file_put_contents("Bot/$cid.ism","$nik2"); 
file_put_contents("Bot/$cid.step","");

bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nik1\n\nNusxalash uchun bosing: <code>$nik1</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"no"],['text'=>"1/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik2"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}
}
}

if($data == "no"){
      bot('answerCallbackQuery',[
       'callback_query_id'=>$cqid,
       'text'=> "Ushbu tugma o`zgarmaydi",
       'show_alert'=>false,
        ]);
    }

if($data=="nik1"){
	$nikim1=file_get_contents("Bot/$callcid.ism2"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim1\n\nNusxalash uchun bosing: <code>$nikim1</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"no"],['text'=>"1/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik2"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik2"){
	$nikim2=file_get_contents("Bot/$callcid.ism"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim2\n\nNusxalash uchun bosing: <code>$nikim2</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik1"],['text'=>"2/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik3"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}     

if($data=="nik3"){
	$nikim3=file_get_contents("Bot/$callcid.ism3"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim3\n\nNusxalash uchun bosing: <code>$nikim3</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik2"],['text'=>"3/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik4"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik4"){
	$nikim4=file_get_contents("Bot/$callcid.ism4"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim4\n\nNusxalash uchun bosing: <code>$nikim4</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik3"],['text'=>"4/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik5"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik5"){
	$nikim5=file_get_contents("Bot/$callcid.ism5"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim5\n\nNusxalash uchun bosing: <code>$nikim5</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik4"],['text'=>"5/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik6"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik6"){
	$nikim6=file_get_contents("Bot/$callcid.ism6"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim6\n\nNusxalash uchun bosing: <code>$nikim6</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik5"],['text'=>"6/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik7"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik7"){
	$nikim7=file_get_contents("Bot/$callcid.ism7"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim7\n\nNusxalash uchun bosing: <code>$nikim7</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik6"],['text'=>"7/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik8"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik8"){
	$nikim8=file_get_contents("Bot/$callcid.ism8"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim8\n\nNusxalash uchun bosing: <code>$nikim8</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik7"],['text'=>"8/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik9"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik9"){
	$nikim9=file_get_contents("Bot/$callcid.ism9"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim9\n\nNusxalash uchun bosing: <code>$nikim9</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik8"],['text'=>"9/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik10"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik10"){
	$nikim10=file_get_contents("Bot/$callcid.ism10"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim10\n\nNusxalash uchun bosing: <code>$nikim10</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik9"],['text'=>"10/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik11"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}


if($data=="nik11"){
	$nikim11=file_get_contents("Bot/$callcid.ism11"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim11\n\nNusxalash uchun bosing: <code>$nikim11</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik10"],['text'=>"11/11",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik12"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik12"){
	$nikim12=file_get_contents("Bot/$callcid.ism12"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim12\n\nNusxalash uchun bosing: <code>$nikim12</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik11"],['text'=>"12/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik13"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik13"){
	$nikim13=file_get_contents("Bot/$callcid.ism13"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim13\n\nNusxalash uchun bosing: <code>$nikim13</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik12"],['text'=>"13/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik14"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik14"){
	$nikim14=file_get_contents("Bot/$callcid.ism14"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim14\n\nNusxalash uchun bosing: <code>$nikim14</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik13"],['text'=>"14/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik15"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik15"){
	$nikim15=file_get_contents("Bot/$callcid.ism15"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim15\n\nNusxalash uchun bosing: <code>$nikim15</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik14"],['text'=>"15/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik16"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik16"){
	$nikim16=file_get_contents("Bot/$callcid.ism16"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim16\n\nNusxalash uchun bosing: <code>$nikim16</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik15"],['text'=>"16/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik17"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik17"){
	$nikim17=file_get_contents("Bot/$callcid.ism17"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim17\n\nNusxalash uchun bosing: <code>$nikim17</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik16"],['text'=>"17/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik18"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik18"){
	$nikim18=file_get_contents("Bot/$callcid.ism18"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim18\n\nNusxalash uchun bosing: <code>$nikim18</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik17"],['text'=>"18/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik19"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik19"){
	$nikim19=file_get_contents("Bot/$callcid.ism19"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim19\n\nNusxalash uchun bosing: <code>$nikim19</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik18"],['text'=>"19/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"nik20"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}

if($data=="nik20"){
	$nikim20=file_get_contents("Bot/$callcid.ism20"); 
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b><u><a href='tg://user?id=$uid'>$name</a></u>\n\n<i>Sizning nikingiz tayyor bo??ldi!!</i>\n\nSizning nikingiz: $nikim20\n\nNusxalash uchun bosing: <code>$nikim20</code></b>",
'parse_mode'=>"html",
'reply_markup'=> json_encode([
'inline_keyboard'=>[
[['text'=>"??????Avvalgi",'callback_data'=>"nik19"],['text'=>"20/20",'callback_data'=>"noo"],['text'=>"Keyingi??????",'callback_data'=>"no"]],
[['text'=>"???????Bosh Menu",'callback_data'=>"bosh"]],
]
]),
]);
}