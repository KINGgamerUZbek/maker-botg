<?php

define('API_KEY', "API_TOKEN"); 

$admin = "ADMIN_ID";

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

function top($chatid){
$text = "👥 <b>TOP 20'ta eng ko'p odam qo'shgan foydalanuvchilar:</b>\n\n";
$files = glob("new/$chatid/*.txt");
foreach ($files as $user) {
$id = str_replace(["new/$chatid/", ".txt"], ["",""],$user);
$data[$id] = file_get_contents($user);
}
arsort($data);
$ar = array_reverse($data);
$i = 1;
foreach ($data as $id=>$pul) {
if ($i > 20)break;
$us = bot ('getChatMember', [
'chat_id'=> $chatid,
'user_id'=> $id,
]);
$res = $us->result->user->first_name;
$text .= "<b>$i)</b> <a href='tg://user?id=$id'>$res</a> <b>- [$pul]</b>\n";
$i++;
}
return $text;
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$editmessage = $update->edited_message;
$editx = $editmessage->text;
$editcapt = $editmessage->caption;
$capt = $message->caption;
$reply = $message->reply_to_message;
$rfid = $reply->from->id;
$rfname = $reply->from->first_name;
$rmid = $reply->message_id;
$cid = $message->chat->id;
$tx = $message->text;
$name = $message->from->first_name;
$fid = $message->from->id;
$botname = bot('getme',['bot'])->result->username;
$botid = bot('getme',['bot'])->result->id;
$callback = $update->callback_query;
$imid = $callback->inline_message_id;
$data = $callback->data;
$ccid = $callback->message->chat->id;
$cmid = $callback->message->message_id;
$cty = $message->chat->type;
$mid = $message->message_id;
$new = $message->new_chat_member;
$newid = $new->id;
$is_bot = $new->is_bot;
$newlng = $new->language_code;
$lng = $message->from->language_code;
$left = $message->left_chat_member;
$leftid = $left->id;
$title = $message->chat->title;
mkdir("warn");
mkdir("new");
mkdir("channel");
mkdir("sozlama");
mkdir("stat");
if($cty == "group" or $cty == "supergroup"){
mkdir("warn/$cid");
mkdir("new/$cid");
}
$adstep = file_get_contents("$admin.step");

if(isset($tx)){
if(($cty == "group" or $cty == "supergroup")){
$gett = file_get_contents("stat/grid.txt");
if(mb_stripos($gett, $cid)!==false){}else{
	file_put_contents("stat/grid.txt","$gett\n$cid");
}
$get = file_get_contents("sozlama/$cid");
if($get){}else{
$baza = [
"chats"=>"true",
"sticker"=>"true",
"link"=>"true",
"audio"=>"true",
"video"=>"true",
"doc"=>"true",
"rasm"=>"true",
"forward"=>"true",
"gif"=>"true",
"golos"=>"true",
"contact"=>" true",
"user"=>" true",
"hashtag"=>" true",
"location"=>"true",
"video_note"=>"true",
"is_animated"=>"true",
"reply_to_message"=>"true",
"game"=>"true",
"kirish"=>"true",
"komand"=>"true",
];
file_put_contents("sozlama/$cid",json_encode($baza));
}
} else {
$gett = file_get_contents("stat/usid.txt");
if(mb_stripos($gett, $cid)!==false){}else{
	file_put_contents("stat/usid.txt","$gett\n$cid");
}
}
}

$baza = json_decode(file_get_contents("sozlama/$cid"),true);
$Ssticker = $baza["sticker"];
$Slink = $baza["link"];
$Saudio = $baza["audio"];
$Svideo = $baza["video"];
$Sdoc = $baza["doc"];
$Sforward_from = $baza["forward_from"];
$Sgif = $baza["gif"];
$Srasm = $baza["rasm"];
$Sgolos = $baza["golos"];
$Scontact = $baza["contact"];
$Suser = $baza["user"];
$Shashtag = $baza["hashtag"];
$Slocation = $baza["location"];
$Svideo_note = $baza["video_note"];
$Sis_animated = $baza["is_animated"];
$Sreply_to_message = $baza["reply_to_message"];
$Sgame = $baza["game"];
$Skirish = $baza["kirish"];
$Skomand = $baza["komand"];

if($newid !== NULL){
	if($is_bot !== false){
		if($newid !== $botid){
		$get = bot('getChatMember', [
		'chat_id' => $cid,
		'user_id' => $fid,
		])->result->status;
        if($get =="member"){
		$vaqti = strtotime("+999999999999 minutes");
		  bot('kickChatMember', [
		      'chat_id' => $cid,
		      'user_id' => $newid,
		      'until_date'=> $vaqti,
		  ]);
		bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"*Guruhga faqat adminlar bot qo'shishlari mumkin*",
        'parse_mode'=>"markdown"
        ]);
	 }
	 } else {
	 	bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"*Salom men guruhingizni boshqarishga ko'maklashaman va arablarni yo'q qilaman, buning uchun menga admin berishingiz kerak!*",
        'parse_mode'=>"markdown"
        ]);
	}
	} elseif ((stripos($newlng,"fa")!== false) or (stripos($newlng,"ar")!==false)){
		$vaqti = strtotime("+999999999999 minutes");
		  bot('kickChatMember', [
		      'chat_id' => $cid,
		      'user_id' => $newid,
		      'until_date'=> $vaqti,
		  ]);
	}
}

if((stripos($lng,"fa")!== false) or (stripos($lng,"ar")!==false)){
		$vaqti = strtotime("+999999999999 minutes");
		  bot('kickChatMember', [
		      'chat_id' => $cid,
		      'user_id' => $fid,
		      'until_date'=> $vaqti,
		  ]);
}

if(stristr($tx,"ض") or stristr($tx, 'ص') or stristr($tx, 'ث') or stristr($tx, 'ق') or stristr($tx, 'ف') or stristr($tx, 'غ') or stristr($tx, 'ع') or stristr($tx, 'ه') or stristr($tx, 'خ') or stristr($tx, 'ح') or stristr($tx, 'ج') or stristr($tx, 'ش') or stristr($tx, 'س') or stristr($tx, 'ي') or stristr($tx, 'ب') or stristr($tx, 'ل') or stristr($tx, 'ا') or stristr($tx, 'ت') or stristr($tx, 'ن') or stristr($tx, 'م') or stristr($tx, 'ك') or stristr($tx, 'ط') or stristr($tx, 'ذ') or stristr($tx, 'ء') or stristr($tx, 'ؤ') or stristr($tx, 'ر') or stristr($tx, 'ى') or stristr($tx, 'ئ') or stristr($tx, 'ة') or stristr($tx, 'و') or stristr($tx, 'ز') or stristr($tx, 'ظ') or stristr($tx, 'د') or stristr($tx, 'أ') or stristr($tx, 'إ') or stristr($tx, 'آ')){
    $get = bot('getChatMember', [
	'chat_id' => $cid,
	'user_id' => $fid,
	])->result->status;

if($get =="member"){
   $vaqti = strtotime("+999999999999 minutes");
  bot('kickChatMember', [
      'chat_id' => $cid,
      'user_id' => $fid,
      'until_date'=> $vaqti,
  ]);
}
}

if ($tx == "/start" or $tx == "/start@$botname"){
    if($cty == "group" or $cty == "supergroup"){
        bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid
        ]);
        $st = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"*Bot lichkasiga yozing*",
        'parse_mode'=>"markdown"
        ]);
        sleep(1);
        $stt = $st->result->message_id;
        bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$stt
        ]);
    } else {
    bot('sendMessage',[
    'chat_id' => $cid,
    'text' => "Salom <b>$name</b> botimizga xush kelibsiz!\nGuruhingiz bor lekin uni nazorat qila olmayapsizmi?\nTashvishlanmang <b>@$botname</b> sizga guruhingizni nazorat qilishingizda ko'maklashadi! Shu bilan birga botimiz guruhingizdagi arablarni yo'q qiladi. Bot buyruqlari bilan tanishib chiqishni tafsiya etamiz 👇",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"👮🏻‍♂️ Buyruqlar",'callback_data'=>'buyruq']],
    [['text'=>"➕ Guruhga qo'shish",'url'=>"https://t.me/$botname?startgroup=new"]],
    ]
        ])
    ]);
}
}

if($data == "buyruq"){
    bot('editMessageText',[
    'chat_id'=>$ccid,
    'message_id'=>$cmid,
    'text'=>"<b>@$botname</b>'ning buyruqlari:\n
<b>/admin</b> - guruh a'zosini admin qiladi;
<b>/admin text</b> - guruh a'zosini admin qiladi va admin nomiga <b>text</b> so'zi o'rnidagi so'zni qo'yadi;
<b>/deladmin</b> - guruh a'zosini adminlikdan oladi;
<b>/warn</b> - guruh a'zosiga ogohlantirish beradi va ogohlantirishlar soni 3 taga yetganida guruh a'zosini guruhdan chiqaradi;
<b>/unwarn</b> - guruh a'zosidagi ogohlantirishlar sonini 0 ga tenglaydi;
<b>/kick</b> - guruh a'zosini guruhdan chiqaradi;
<b>/ban</b> - guruh a'zosini guruhdan chiqaradi va guruh a'zosi guruhga qaytib kira olmaydi;
<b>/unban</b> - bandan oladi;
<b>/ro</b> - guruh a'zosini faqat o'qish rejimiga tushiradi;
<b>/unro</b> - guruh a'zosidan cheklovni oladi;
<b>/del</b> - reply qilingan xabarni o'chiradi;
<b>/pin</b> - xabarni yuqoriga qistiradi;
<b>/mymembers</b> - siz qo'shgan odamlar sonini aytadi;
<b>/youmembers</b> - reply qilingan odam qo'shgan odamlari sonini aytadi;
<b>/top</b> - eng ko'p odam qo'shgan foydalanuvchilar reytingini chiqaradi;
<b>/setchannel</b> - guruhga kanalni bog'laydi, ya'ni bog'langan kanalga a'zo bo'lmaguncha guruhga guruh a'zolari yozolmaydigan bo'ladi;
<b>/delchannel</b> - kanalni uzadi;
<b>/sozlama</b> - guruhingiz sozlamasi;
    ",
    'parse_mode'=>"html",
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"➕ Guruhga qo'shish",'url'=>"https://t.me/$botname?startgroup=new"]],
    [['text'=>"⬅️ Bosh menyuga qaytish",'callback_data'=>"bosh"]]
    ]
    ])
    ]);
}

if($data == "bosh"){
    bot('editMessageText',[
    'chat_id'=>$ccid,
    'message_id'=>$cmid,
    'text' => "Guruhingiz bor lekin uni nazorat qila olmayapsizmi?\nTashvishlanmang <b>@$botname</b> sizga guruhingizni nazorat qilishingizda ko'maklashadi! Shu bilan birga botimiz guruhingizdagi arablarni yo'q qiladi. Bot buyruqlari bilan tanishib chiqishni tafsiya etamiz 👇",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"👮🏻‍♂️ Buyruqlar",'callback_data'=>'buyruq']],
    [['text'=>"➕ Guruhga qo'shish",'url'=>"https://t.me/$botname?startgroup=new"]],
    [['text'=>"👨🏻‍💻 Admin",'url'=>"https://t.me/FirstDeveloper"],['text'=>"📲 Kanal",'url'=>"https://t.me/ESoftUz"]]
    ]
    ])
    ]);
}


if($tx == "/admin" and isset($reply)){
   $get = bot('getChatMember',[
     'chat_id'=>$cid,
     'user_id'=>$fid
    ]);
   $result = $get->result->status;
   if($result == "creator" or $result == "administrator"){
       bot('promoteChatMember',[
        'chat_id'=>$cid,
        'user_id'=>$rfid,
        'can_change_info'=>true,
        'can_post_messages'=>false,
        'can_edit_messages'=>false,
        'can_delete_messages'=>true,
        'can_invite_users'=>true,
        'can_restrict_members'=>true,
        'can_pin_messages'=>true,
        'can_promote_members'=>false
      ]);
        bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔹 <a href='tg://user?id=$rfid'>$rfname</a><b> tabriklayman. Siz endi guruh adminstratorisiz.</b>",
              'parse_mode' => 'html'
         ]);
   }
}elseif (mb_stripos($tx, "/admin")!==false and isset($reply)){
       $ex = explode(" ", $tx);
       $txt = $ex[1]." ".$ex[2]." ".$ex[3];
       if(strlen($txt)<=16){
       $get = bot('getChatMember',[
	     'chat_id'=>$cid,
	     'user_id'=>$fid
	    ]);
	   $result = $get->result->status;
	   if($result == "creator" or $result == "administrator"){
	       bot('promoteChatMember',[
	        'chat_id'=>$cid,
	        'user_id'=>$rfid,
	        'can_change_info'=>true,
	        'can_post_messages'=>false,
	        'can_edit_messages'=>false,
	        'can_delete_messages'=>true,
	        'can_invite_users'=>true,
	        'can_restrict_members'=>true,
	        'can_pin_messages'=>true,
	        'can_promote_members'=>false
	      ]);
	       bot('setChatAdministratorCustomTitle',[
		     'chat_id'=>$cid,
		     'user_id'=>$rfid,
		     'custom_title'=>$txt
		  ]);

	      bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔹 <a href='tg://user?id=$rfid'>$rfname</a><b> tabriklayman. Siz endi guruh adminstratorisiz. Sizning guruhdagi pagoningiz <i>$txt</i></b>",
              'parse_mode' => 'html'
         ]);
	    }
	   } else {
	   	bot('sendMessage', [
		      'chat_id' => $cid,
		      'text' => "<b>Admin pagoni 16 ta yoki undan kamroq belgidan iborat bo'lishi kerak</b>",
		      'parse_mode' => 'html'
		  ]);
	   }
}

if($tx == "/deladmin" and isset($reply)){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get == "administrator" or $get == "creator"){
bot('promoteChatMember',[
    'chat_id'=>$cid,
    'user_id'=>$rfid,
    'can_change_info'=>false,
    'can_post_messages'=>false,
    'can_edit_messages'=>false,
    'can_delete_messages'=>false,
    'can_invite_users'=>false,
    'can_restrict_members'=>false,
    'can_pin_messages'=>false,
    'can_promote_members'=>false
  ]);
bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔸 <a href='tg://user?id=$rfid'>$rfname</a><b>. Siz endi guruh adminstratori emassiz.</b>",
              'parse_mode' => 'html'
         ]);
}
}

if($tx == "/warn" and isset($reply)){
$ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$fid
])->result->status;
if($ifadmin == "creator" or $ifadmin == "administrator"){
$radmin = $ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$rfid
])->result->status;
if($radmin == "member"){
if(file_exists("warn/$cid/$rfid.txt")){
	$get = file_get_contents("warn/$cid/$rfid.txt");
	$get += 1;
	file_put_contents("warn/$cid/$rfid.txt", $get);
	if($get != 3){
	bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔸 <a href='tg://user?id=$rfid'>$rfname</a><b>. Siz ogohlantirish oldingiz. Sizdagi ogohlantirishlar soni: $get ta. Ogohlantirishlar soni 3 taga yetganida siz guruhdan chiqarilib yuborilasiz!</b>",
              'parse_mode' => 'html'
         ]);
	} else {
	bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔸 <a href='tg://user?id=$rfid'>$rfname</a><b> shuncha ogohlantirishlarga befarq bo'ldi va jazo sifatida guruhdan chetlatildi.</b>",
              'parse_mode' => 'html'
    ]);	
    $vaqti = strtotime("+10800000 minutes");
	  bot('kickChatMember', [
	        'chat_id' => $cid,
	        'user_id' => $rfid,
	        'until_date' => $vaqti,
	      ]);
	 $warn = 0;
	 file_put_contents("warn/$cid/$rfid.txt", $warn);
	}
} else {
	$warn = 1;
	file_put_contents("warn/$cid/$rfid.txt", $warn);
	bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔸 <a href='tg://user?id=$rfid'>$rfname</a><b>. Siz ogohlantirish oldingiz. Sizdagi ogohlantirishlar soni: 1 ta. Ogohlantirishlar soni 3 taga yetganida siz guruhdan chiqarilib yuborilasiz!</b>",
              'parse_mode' => 'html'
         ]);
}
}
}
}

if($tx == "/unwarn" and isset($reply)){
$ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$fid
])->result->status;
if($ifadmin == "creator" or $ifadmin == "administrator"){
	$warn = 0;
	file_put_contents("warn/$cid/$rfid.txt",$warn);
	bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔹 <a href='tg://user?id=$rfid'>$rfname</a><b>. Sizdagi ogohlantirishlar 0 ga tenglashtirildi!</b>",
              'parse_mode' => 'html'
    ]);
}
}

if($tx == "/kick" and isset($reply)){
$ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$fid
])->result->status;
if($ifadmin == "creator" or $ifadmin == "administrator"){
$radmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$rfid
])->result->status;
if($radmin == "member"){
$vaqti = strtotime("+1 minutes");
  bot('kickChatMember', [
      'chat_id' => $cid,
      'user_id' => $rfid,
      'until_date'=> $vaqti,
  ]);
  bot('unbanChatMember', [
        'chat_id' => $cid,
        'user_id' => $rfid,
    ]);

  bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔸 <a href='tg://user?id=$rfid'>$rfname</a><b> guruhdan chiqarib yuborildi!</b>",
              'parse_mode' => 'html'
    ]);
}
}
}

if($tx == "/ban" and isset($reply))
{
$ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$fid
])->result->status;
if($ifadmin == "creator" or $ifadmin == "administrator"){
$radmin = $ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$rfid
])->result->status;
if($radmin == "member"){
$vaqti = strtotime("+108000000 minutes");
      bot('kickChatMember', [
        'chat_id' => $cid,
        'user_id' => $rfid,
        'until_date' => $vaqti,
      ]);
       bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔸 <a href='tg://user?id=$rfid'>$rfname</a><b> guruhdan ban bo'ldi!</b>",
              'parse_mode' => 'html'
    	]);
}
}
}

if($tx == "/unban" and isset($reply))
{
$ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$fid
])->result->status;
if($ifadmin == "creator" or $ifadmin == "administrator"){
	bot('unbanChatMember', [
        'chat_id' => $cid,
        'user_id' => $rfid,
    ]);
   bot('sendMessage', [
      'chat_id' => $cid,
      'text' => "🔹 <a href='tg://user?id=$rfid'>$rfname</a><b> guruhga yana kirishi mumkin!</b>",
      'parse_mode' => 'html'
    ]);
}
}

if($tx == "/ro" and isset($reply)){
$ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$fid
])->result->status;
if($ifadmin == "creator" or $ifadmin == "administrator"){
$radmin = $ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$rfid
])->result->status;
if($radmin == "member"){
$minut = strtotime("+99999999999999 minutes");
  bot('restrictChatMember', [
      'chat_id' => $cid,
      'user_id' => $rfid,
      'until_date' => $minut,
      'can_send_messages' => false,
      'can_send_media_messages' => false,
      'can_send_other_messages' => false,
      'can_add_web_page_previews' => false
  ]);
 bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔸 <a href='tg://user?id=$rfid'>$rfname</a><b> guruhda faqat o'qish rejimiga tushirildi!</b>",
              'parse_mode' => 'html'
    ]);
}
}	
}

if($tx == "/unro" and isset($reply)){
$ifadmin = bot('getChatMember',[
'chat_id'=>$cid,
'user_id'=>$fid
])->result->status;
if($ifadmin == "creator" or $ifadmin == "administrator"){
$minut = strtotime("+99999999999999 minutes");
  bot('restrictChatMember', [
      'chat_id' => $cid,
      'user_id' => $rfid,
      'until_date' => $minut,
      'can_send_messages' => true,
      'can_send_media_messages' => true,
      'can_send_other_messages' => true,
      'can_add_web_page_previews' => true
  ]);
 bot('sendMessage', [
              'chat_id' => $cid,
              'text' => "🔹 <a href='tg://user?id=$rfid'>$rfname</a><b> sizdan cheklov olib tashlandi, endi guruhda yoza olasiz!</b>",
              'parse_mode' => 'html'
    ]);
}	
}

if($tx == "/del" and isset($reply)){
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$rmid
]);
bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid
]);
}

if($tx == "/pin" and isset($reply)){
$get = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
])->result->status;
if($get =="administrator" or $get == "creator"){
  bot('pinChatMessage',[
    'chat_id'=>$cid,
    'message_id'=>$rmid
  ]);
}
}

if(isset($update->message->new_chat_photo) or isset($update->message->new_chat_title) or isset($update->message->pinned_message)){
    bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid,
    ]);
}

if(isset($new) and $is_bot == false){
    if($newid !== $fid){
	if(file_exists("new/$cid/$fid.txt")){
    $get = file_get_contents("new/$cid/$fid.txt");
    $get += 1;
    file_put_contents("new/$cid/$fid.txt", $get);
	} else {
		$ok = 1;
   file_put_contents("new/$cid/$fid.txt", $ok);
}
}
}

if(isset($left)){
    unlink("new/$cid/$leftid.txt");
     bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid,
    ]);
}

if($tx == "/mymembers"){
	$get = file_get_contents("new/$cid/$fid.txt");
    
    if($get==true){
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"<a href='tg://user?id=$fid'>$name</a>\n\nSiz <b>$get</b> ta odam qo'shgansiz!",
    'parse_mode'=>"html"
	]);
	} else {
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"<a href='tg://user?id=$fid'>$name</a>\n\nSiz odam qo'shmagansiz!",
    'parse_mode'=>"html"
	]);
	}
}

if($tx == "/youmembers" and isset($reply)){
	$get = file_get_contents("new/$cid/$rfid.txt");
    
    if($get==true){
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"<a href='tg://user?id=$rfid'>$rfname</a>\n\<b>$get</b> ta odam qo'shgan!",
    'parse_mode'=>"html"
	]);
	} else {
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"<a href='tg://user?id=$rfid'>$rfname</a>\n\nOdam qo'shmagan!",
    'parse_mode'=>"html"
	]);
	}
}

if($tx == "/top" and ($cty == "group" or $cty == "supergroup")){
$rey = top($cid);
bot ('sendMessage', [
'chat_id'=> $cid,
'parse_mode'=>"html",
'text'=> $rey
]);
}

if($cty == "group" or $cty == "supergroup"){
if($tx == "/setchannel"){
	$get = bot('getChatMember', [
	'chat_id' => $cid,
	'user_id' => $fid,
	])->result->status;
	if($get =="administrator" or $get == "creator"){
  bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"*⚠️ Ushbu buyruqdan foydalanish quyidagicha:\n\n✅Namuna:*\n`/setchannel @username`",
    'parse_mode'=>"markdown",
    'reply_to_message_id'=>$mid
	]);
}
} elseif (mb_stripos($tx, "/setchannel")!== false){
	$kanal = explode(" ", $tx);
	$get = bot('getChatMember',[
    'chat_id'=>$cid,
    'user_id'=>$fid
	])->result->status;
	if($get == "creator" or $get == "administrator"){
	$kanaltekshir = bot('getChatMember',[
    'chat_id'=>$kanal[1],
    'user_id'=>$fid
	])->result->status;
	if($kanaltekshir == "creator" or $kanaltekshir == "administrator"){
	 bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"✅ Kanal sozlandi.\n\nEndi guruh a'zolari $kanal[1] kanaliga a'zo bo'lmaguncha guruhda yoza olishmaydi.",
    'parse_mode'=>"markdown"
	]);
	 file_put_contents("channel/$cid.txt", $kanal[1]);
	} else {
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"*📛 Bot yoki siz kanalda admin emas. Xatolikni to'g'irlab qayta urunib ko'ring!*",
    'parse_mode'=>"markdown",
    'reply_to_message_id'=>$mid
	]);
	}
	}
}
}

$chan = file_get_contents("channel/$cid.txt");

if($chan){
	if((isset($message->text) or isset($message->audio) or isset($message->animation) or isset($message->audio) or isset($message->document) or isset($message->photo) or isset($message->sticker) or isset($message->video) or isset($message->video_note) or isset($message->voice) or isset($message->contact) or isset($message->dice) or isset($message->game) or isset($message->poll) or isset($message->location)) and ($cty == "group" or $cty == "supergroup")){
	if($fid !== 777000){
		$res = bot('getchat', [
		'chat_id'=>$chan
		]);
		$user = $res->result->username;
		$titl = $res->result->title;
		$get = bot('getChatMember',[
        'chat_id'=>$chan,
        'user_id'=>$fid
		])->result->status;

		if($get == "creator" or $get == "administrator" or $get == "member"){}else{
			bot('deleteMessage',[
            'chat_id'=>$cid,
            'message_id'=>$mid
			]);
			bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"🔴 Kechirasiz, [$name](tg://user?id=$fid) *$title* guruhida yozish uchun *@$user* kanaliga a'zo bo'lishingiz kerak!",
			'parse_mode'=>"markdown",
			'reply_markup'=>json_encode([
			'inline_keyboard'=>[
			[['text'=>$titl, 'url'=>"https://t.me/".$user]],
			]
			])
			]);
		}
	}
}
}

if($tx == "/delchannel"){
if($cty == "group" or $cty == "supergroup"){
	$us = bot ('getChatMember', [
	'chat_id'=> $cid,
	'user_id'=> $fid,
	])->result->status;
	if ($us == "administrator" or $us == "creator"){
	bot ('sendmessage', [
	'chat_id'=> $cid,
	'parse_mode'=>"markdown",
	'text'=>"🗑Kanal o‘chirib tashlandi!",
	]);

	unlink("channel/$cid.txt");
}
}
}

if($tx == "/sozlama" and ($cty == "group" or $cty == "supergroup")){
$get = bot('getChatMember',[
        'chat_id'=>$cid,
        'user_id'=>$fid
        ]);
        $sts = $get->result->status;
        
        if($sts == "creator" or $sts == "administrator"){
            $baza = json_decode(file_get_contents("sozlama/$cid"),true);
            $sticker = $baza["sticker"];
            if($sticker == "false"){
            $sticker = "❎ Taqiqlangan";
            }else{
            $sticker = "✅ Ruhsat etilgan";
            }
            $link = $baza["link"];
            if($link == "false"){
            $link = "❎ Taqiqlangan";
            }else{
            $link = "✅ Ruhsat etilgan";
            }
            $audio = $baza["audio"];
            if($audio == "false"){
            $audio = "❎ Taqiqlangan";
            }else{
            $audio = "✅ Ruhsat etilgan";
            }
            $video = $baza["video"];
            if($video == "false"){
            $video  = "❎ Taqiqlangan";
            }else{
            $video = "✅ Ruhsat etilgan";
            }
            $doc = $baza["doc"];
            if($doc == "false"){
            $doc = "❎ Taqiqlangan";
            }else{
            $doc = "✅ Ruhsat etilgan";
            }
            $forward_from = $baza["forward_from"];
            if($forward_from == "false"){
            $forward_from  = "❎ Taqiqlangan";
            }else{
            $forward_from = "✅ Ruhsat etilgan";
            }
            $gif = $baza["gif"];
            if($gif == "false"){
            $gif  = "❎ Taqiqlangan";
            }else{
            $gif = "✅ Ruhsat etilgan";
            }
            $rasm = $baza["rasm"];
            if($rasm == "false"){
            $rasm  = "❎ Taqiqlangan";
            }else{
            $rasm = "✅ Ruhsat etilgan";
            }
            $golos = $baza["golos"];
            if($golos == "false"){
            $golos  = "❎ Taqiqlangan";
            }else{
            $golos = "✅ Ruhsat etilgan";
            }
            $contact = $baza["contact"];
            if($contact == "false"){
            $contact = "❎ Taqiqlangan";
            }else{
            $contact = "✅ Ruhsat etilgan";
            }
            $user = $baza["user"];
            if($user == "false"){
            $user = "❎ Taqiqlangan";
            }else{
            $user = "✅ Ruhsat etilgan";
            }
            $hashtag = $baza["hashtag"];
            if($hashtag == "false"){
            $hashtag = "❎ Taqiqlangan";
            }else{
            $hashtag = "✅ Ruhsat etilgan";
            }
             $location = $baza["location"];
            if($location == "false"){
            $location = "❎ Taqiqlangan";
            }else{
            $location = "✅ Ruhsat etilgan";
            }
            $video_note = $baza["video_note"];
            if($video_note == "false"){
            $video_note  = "❎ Taqiqlangan";
            }else{
            $video_note = "✅ Ruhsat etilgan";
            }
            $is_animated = $baza["is_animated"];
            if($is_animated == "false"){
            $is_animated = "❎ Taqiqlangan";
            }else{
            $is_animated = "✅ Ruhsat etilgan";
            }
            $reply_to_message = $baza["reply_to_message"];
            if($reply_to_message == "false"){
            $reply_to_message = "❎ Taqiqlangan";
            }else{
            $reply_to_message = "✅ Ruhsat etilgan";
            }
            $game = $baza["game"];
            if($game == "false"){
            $game = "❎ Taqiqlangan";
            }else{
            $game = "✅ Ruhsat etilgan";
            }
            $kirish = $baza["kirish"];
			if($kirish == "false"){
			$kirish = "❎ O'chirilgan";
			}else{
			$kirish = "✅ Yoqilgan";
			}
            $komand = $baza["komand"];
            if($komand == "false"){
            $komand = "❎ O'chirilgan";
            }else{
            $komand = "✅ Yoqilgan";
            }
            
            file_put_contents("sozlama/$fid.lch","$cid");
            $st = bot('sendMessage', [
            'chat_id'=>$cid,
            'text'=>"<b>Lichkangizga yubordim!</b>",
            'parse_mode'=>'html',
            ]);
        
            bot('DeleteMessage',[
            'chat_id'=>$cid,
            'message_id'=>$mid,
            ]);
            
            sleep(1);
            
            $stt = $st->result->message_id;
            
            bot('DeleteMessage',[
            'chat_id'=>$cid,
            'message_id'=>$stt,
            ]);

            bot('sendMessage', [
            'chat_id'=>$fid,
            'text'=>"$title <b>Guruh sozlamalari!</b>\n\n<b>✅ Ruhsat etilgan fayllar</b>\n<b>❎ Taqiqlangan fayllar</b>",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [["callback_data"=>"rasm","text"=>"📷 Rasm"],["callback_data"=>"M()rasm","text"=>"$rasm"],],
            [["callback_data"=>"link","text"=>"📡 Link"],["callback_data"=>"M()link","text"=>"$link"],],
            [["callback_data"=>"sticker","text"=>"🎭 Sticker"],["callback_data"=>"M()sticker","text"=>"$sticker"],],
            [["callback_data"=>"doc","text"=>"📁 Fayl"],["callback_data"=>"M()doc","text"=>"$doc"],],
            [["callback_data"=>"video","text"=>"🎬 Video"],["callback_data"=>"M()video","text"=>"$video"],],
            [["callback_data"=>"audio","text"=>"🎶 Musiqa"],["callback_data"=>"M()audio","text"=>"$audio"],],
            [["callback_data"=>"forward_from","text"=>"➡ Forward"],["callback_data"=>"M()forward_from","text"=>"$forward_from"],],
            [["callback_data"=>"gif","text"=>"💾 Gif"],["callback_data"=>"M()gif","text"=>"$gif"],],
            [["callback_data"=>"golos","text"=>"🎤 Golos"],["callback_data"=>"M()golos","text"=>"$golos"],],
            [["callback_data"=>"contact","text"=>"👤 Kontakt"],["callback_data"=>"M()contact","text"=>"$contact"],],
            [["callback_data"=>"user","text"=>"📧 Userlar"],["callback_data"=>"M()user","text"=>"$user"],],
            [["callback_data"=>"hashtag","text"=>"#⃣ HashTag"],["callback_data"=>"M()hashtag","text"=>"$hashtag"],],
            [["callback_data"=>"location","text"=>"🏠 Manzil"],["callback_data"=>"M()location","text"=>"$location"],],
            [["callback_data"=>"video_note","text"=>"📹 Yumoloq video"],["callback_data"=>"M()video_note","text"=>"$video_note"],],
            [["callback_data"=>"is_animated","text"=>"🎭 Animation sticker"],["callback_data"=>"M()is_animated","text"=>"$is_animated"],],
            [["callback_data"=>"reply_to_message","text"=>"↩ Reply"],["callback_data"=>"M()reply_to_message","text"=>"$reply_to_message"],],
            [["callback_data"=>"game","text"=>"🖲 Game"],["callback_data"=>"M()game","text"=>"$game"],],
            [["callback_data"=>"kirish","text"=>"🗑 Kirdi chiqdilarni tozalash"],["callback_data"=>"M()kirish","text"=>"$kirish"],],
            [["callback_data"=>"komand","text"=>"🚸 Buyruqlarni O'chirish 🚸"],["callback_data"=>"M()komand","text"=>"$komand"],],
            ]
            ]),
            ]);
        }
}

$callback = $update->callback_query;
$dataa = $callback->data;
$dataa = explode("()",$dataa);
if($dataa[0] == "M"){
$cid = $callback->from->id;
$mid = $callback->message->message_id;
$imid = $callback->inline_message_id;
$idd = file_get_contents("sozlama/$cid.lch");
$gets = bot("getChat",[
"chat_id"=>"$idd",
]);
$title = $gets->result->title;
$baza = json_decode(file_get_contents("sozlama/$idd"),true);
if($baza["$dataa[1]"] == "true"){
$input = "false";
}else{
$input = "true";
}
$baza["$dataa[1]"] = $input;
file_put_contents("sozlama/$idd",json_encode($baza));
$baza = json_decode(file_get_contents("sozlama/$idd"),true);
$sticker = $baza["sticker"];
if($sticker == "false"){
$sticker = "❎ Taqiqlangan";
}else{
$sticker = "✅ Ruhsat etilgan";
}
$link = $baza["link"];
if($link == "false"){
$link = "❎ Taqiqlangan";
}else{
$link = "✅ Ruhsat etilgan";
}
$audio = $baza["audio"];
if($audio == "false"){
$audio = "❎ Taqiqlangan";
}else{
$audio = "✅ Ruhsat etilgan";
}
$video = $baza["video"];
if($video == "false"){
$video  = "❎ Taqiqlangan";
}else{
$video = "✅ Ruhsat etilgan";
}
$doc = $baza["doc"];
if($doc == "false"){
$doc  = "❎ Taqiqlangan";
}else{
$doc = "✅ Ruhsat etilgan";
}
$forward_from = $baza["forward_from"];
if($forward_from == "false"){
$forward_from  = "❎ Taqiqlangan";
}else{
$forward_from = "✅ Ruhsat etilgan";
}
$gif = $baza["gif"];
if($gif == "false"){
$gif  = "❎ Taqiqlangan";
}else{
$gif = "✅ Ruhsat etilgan";
}
$rasm = $baza["rasm"];
if($rasm == "false"){
$rasm  = "❎ Taqiqlangan";
}else{
$rasm = "✅ Ruhsat etilgan";
}
$golos = $baza["golos"];
if($golos == "false"){
$golos  = "❎ Taqiqlangan";
}else{
$golos = "✅ Ruhsat etilgan";
}
$contact = $baza["contact"];
if($contact == "false"){
$contact = "❎ Taqiqlangan";
}else{
$contact = "✅ Ruhsat etilgan";
}
$user = $baza["user"];
if($user == "false"){
$user = "❎ Taqiqlangan";
}else{
$user = "✅ Ruhsat etilgan";
}
$hashtag = $baza["hashtag"];
if($hashtag == "false"){
$hashtag = "❎ Taqiqlangan";
}else{
$hashtag = "✅ Ruhsat etilgan";
}
 $location = $baza["location"];
if($location == "false"){
$location = "❎ Taqiqlangan";
}else{
$location = "✅ Ruhsat etilgan";
}
$video_note = $baza["video_note"];
if($video_note == "false"){
$video_note  = "❎ Taqiqlangan";
}else{
$video_note = "✅ Ruhsat etilgan";
}
$is_animated = $baza["is_animated"];
if($is_animated == "false"){
$is_animated = "❎ Taqiqlangan";
}else{
$is_animated = "✅ Ruhsat etilgan";
}
$reply_to_message = $baza["reply_to_message"];
if($reply_to_message == "false"){
$reply_to_message = "❎ Taqiqlangan";
}else{
$reply_to_message = "✅ Ruhsat etilgan";
}
$game = $baza["game"];
if($game == "false"){
$game = "❎ Taqiqlangan";
}else{
$game = "✅ Ruhsat etilgan";
}
$kirish = $baza["kirish"];
if($kirish == "false"){
$kirish = "❎ O'chirilgan";
}else{
$kirish = "✅ Yoqilgan";
}
$komand = $baza["komand"];
if($komand == "false"){
$komand = "❎ O'chirilgan";
}else{
$komand = "✅ Yoqilgan";
}
bot('editMessageText', [
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"$title <b>Guruh sozlamalari!</b>\n\n<b>✅ Ruhsat etilgan fayllar</b>\n<b>❎ Taqiqlangan fayllar</b>",
'parse_mode'=>'html',
'inline_message_id'=>$imid,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["callback_data"=>"rasm","text"=>"📷 Rasm"],["callback_data"=>"M()rasm","text"=>"$rasm"],],
[["callback_data"=>"link","text"=>"📡 Link"],["callback_data"=>"M()link","text"=>"$link"],],
[["callback_data"=>"sticker","text"=>"🎭 Sticker"],["callback_data"=>"M()sticker","text"=>"$sticker"],],
[["callback_data"=>"doc","text"=>"📁 Fayl"],["callback_data"=>"M()doc","text"=>"$doc"],],
[["callback_data"=>"video","text"=>"🎬 Video"],["callback_data"=>"M()video","text"=>"$video"],],
[["callback_data"=>"audio","text"=>"🎶 Musiqa"],["callback_data"=>"M()audio","text"=>"$audio"],],
[["callback_data"=>"forward_from","text"=>"➡ Forward"],["callback_data"=>"M()forward_from","text"=>"$forward_from"],],
[["callback_data"=>"gif","text"=>"💾 Gif"],["callback_data"=>"M()gif","text"=>"$gif"],],
[["callback_data"=>"golos","text"=>"🎤 Golos"],["callback_data"=>"M()golos","text"=>"$golos"],],
[["callback_data"=>"contact","text"=>"👤 Kontakt"],["callback_data"=>"M()contact","text"=>"$contact"],],
[["callback_data"=>"user","text"=>"📧 Userlar"],["callback_data"=>"M()user","text"=>"$user"],],
[["callback_data"=>"hashtag","text"=>"#⃣ HashTag"],["callback_data"=>"M()hashtag","text"=>"$hashtag"],],
[["callback_data"=>"location","text"=>"🏠 Manzil"],["callback_data"=>"M()location","text"=>"$location"],],
[["callback_data"=>"video_note","text"=>"📹 Yumoloq video"],["callback_data"=>"M()video_note","text"=>"$video_note"],],
[["callback_data"=>"is_animated","text"=>"🎭 Animation sticker"],["callback_data"=>"M()is_animated","text"=>"$is_animated"],],
[["callback_data"=>"reply_to_message","text"=>"↩ Reply"],["callback_data"=>"M()reply_to_message","text"=>"$reply_to_message"],],
[["callback_data"=>"game","text"=>"🖲 Game"],["callback_data"=>"M()game","text"=>"$game"],],
[["callback_data"=>"kirish","text"=>"🗑 Kirdi chiqdilarni tozalash"],["callback_data"=>"M()kirish","text"=>"$kirish"],],
[["callback_data"=>"komand","text"=>"🚸 Buyruqlarni O'chirish 🚸"],["callback_data"=>"M()komand","text"=>"$komand"],],
]
]),
]);
}

if(isset($update) and $Sgif == "false"){
if(isset($message->animation)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Scontact == "false"){
if(isset($message->contact)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Srasm == "false"){
if(isset($message->photo)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Ssticker == "false"){
if(isset($message->sticker)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Svideo == "false"){
if(isset($message->video)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Saudio == "false"){
if(isset($message->audio)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Sdoc == "false"){
if(isset($message->document)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Sforward_from == "false"){
if(isset($message->forward_from) or isset($message->forward_from_chat)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Sgolos == "false"){
if(isset($message->voice)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}


if(isset($update) and $Slink == "false"){
if((mb_stripos($tx,"http") !==false) or (stripos($capt,"http://")!==false) or (stripos($capt,"bot?start=")!==false) or (stripos($tx,"bot?start=")!==false) or (stripos($tx,"https://")!==false) or (mb_stripos($editx,"http") !==false) or (stripos($editcapt,"http://")!==false) or (stripos($editcapt,"bot?start=")!==false) or (stripos($editx,"bot?start=")!==false) or (stripos($editx,"https://")!==false)){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Suser == "false"){
if((mb_stripos($tx,"@") !==false) or (stripos($capt,"@")!==false) or (stripos($capt,"@")!==false) or (stripos($tx,"@")!==false) or (mb_stripos($editx,"@") !==false) or (stripos($editcapt,"@")!==false) or (stripos($editcapt,"@")!==false) or (stripos($editx,"@")!==false)){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Shashtag == "false"){
if((mb_stripos($tx,"#") !==false) or (stripos($capt,"#")!==false) or (stripos($capt,"#")!==false) or (stripos($tx,"#")!==false)){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Slocation == "false"){
if(isset($message->location)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Svideo_note == "false"){
if(isset($message->video_note)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Sis_animated == "false"){
if(isset($message->is_animated)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot ('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Sreply_to_message == "false"){
if(isset($message->reply_to_message)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Sgame == "false"){
if(isset($message->game)!==false){
$gett = bot('getChatMember', [
'chat_id' => $cid,
'user_id' => $fid,
]);
$get = $gett->result->status;
if($get =="member"){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}
}

if(isset($update) and $Skomand == "true"){
if(mb_stripos($tx,"/start")!==false or mb_stripos($tx,"/ro")!==false or mb_stripos($tx,"/unro")!==false or mb_stripos($tx,"/kick")!==false or mb_stripos($tx,"/warn")!==false or mb_stripos($tx,"/unwarn")!==false or mb_stripos($tx,"/ban")!==false or mb_stripos($tx,"/unban")!==false or mb_stripos($tx,"/pin")!==false or mb_stripos($tx,"/del")!==false or mb_stripos($tx,"/admin")!==false or mb_stripos($tx,"/deladmin")!==false or mb_stripos($tx,"/mymembers")!==false or mb_stripos($tx,"/youmembers")!==false or mb_stripos($tx,"/top")!==false or mb_stripos($tx,"/sozlama")!==false){
bot('deleteMessage', [
'chat_id'=>$cid,
'message_id'=> $mid,
]);
}
}

if($Skirish == "true" and (isset($update->message->new_chat_member) or isset($update->message->left_chat_member))){
    bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid,
    ]);
}

if($tx == "/panel" and $cid == $admin){
	bot('deleteMessage',[
	'chat_id' => $cid,
	'message_id' => $mid
	]);
	bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"Salom <b>$name</b> admin panelga xush kelibsiz! Quyidagi menyudan foydalaning 👇",
    'parse_mode'=>"html",
    'reply_markup'=>json_encode([
    	'resize_keyboard'=>true,
    	'keyboard'=>[
    		[['text'=>"📤 Userlarga xabar yo'llash"],['text'=>"📤 Guruhlarga xabar yo'llash"]],
    		[['text'=>"📊 Statistika"]],
    	]
    ])
	]);
}

if($tx == "📤 Userlarga xabar yo'llash" and $cid == $admin){
	bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"Userlarga yuboriladigan xabarni yuboring"
	]);

	file_put_contents("$admin.step", "us");
}

if($tx == "📤 Guruhlarga xabar yo'llash" and $cid == $admin){
	bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"Guruhlarga yuboriladigan xabarni yuboring"
	]);

	file_put_contents("$admin.step", "gr");
}

if($adstep == "us" and $cid == $admin){
	if($tx == "/cancel"){
		unlink("$admin.step");
		bot('sendMessage',[
         'chat_id'=>$admin,
         'text'=>"Bekor qilindi"
		]);
	} else {
		$userlar = file_get_contents("stat/usid.txt");
		 $idszs=explode("\n",$userlar);
	      foreach($idszs as $idlat){
	    $users = bot('forwardMessage',[
	      'chat_id'=>$idlat,
	      'from_chat_id'=>$admin,
	      'message_id'=>$mid
	      ]);
	 }
	 if($users){
	 	bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Barcha userlarga yuborildi."
	 	]);
	 	unlink("$admin.step");
	 	}
	 }
}


if($adstep == "gr" and $cid == $admin){
	if($tx == "/cancel"){
		unlink("$admin.step");
		bot('sendMessage',[
         'chat_id'=>$admin,
         'text'=>"Bekor qilindi"
		]);
	} else {
		$guruhlar = file_get_contents("stat/grid.txt");
		 $idszs=explode("\n",$guruhlar);
	      foreach($idszs as $idlat){
	      $guruhs = bot('forwardMessage',[
	      'chat_id'=>$idlat,
	      'from_chat_id'=>$admin,
	      'message_id'=>$mid
	      ]);
	 }
	 if($guruhs){
	 	bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Barcha guruhlarga yuborildi."
	 	]);
	 	unlink("$admin.step");
      }	
	}
}

if($tx == "📊 Statistika" and $cid == $admin){
	$us = file_get_contents("stat/usid.txt");
	$gr = file_get_contents("stat/grid.txt");

	$uscount = substr_count($us, "\n");
	$grcount = substr_count($gr, "\n");
	$count = $uscount + $grcount;

	bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"📊 Statistika\n\nUserlar: *$uscount* ta\nGuruhlar: *$grcount* ta\nJami: *$count* ta",
    'parse_mode'=>"markdown"
	]);
}