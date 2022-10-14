<?php
/*
 * Dasturchi: Firdavs jurayev (https://t.me/firdavs_officall)
 */
define('API_KEY', "API_TOKEN"); 
$admin = "ADMIN_ID";///admin id raqami
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

$update_off = json_decode(file_get_contents('php://input'));
$message = $update_off->message;
$capt = $message->caption;
$reply = $message->reply_to_message;
$rfid = $reply->from->id;
$rfname = $reply->from->first_name;
$rmid = $reply->message_id;
$cid = $message->chat->id;
$tx = $message->text;
$text = $message->text;
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


$update_off = json_decode(file_get_contents('php://input'));
$data = $update_off->callback_query->data;
$cid2 = $update_off->callback_query->message->chat->id; 
$cqid = $update_off->callback_query->id;
$chat_id2 = $update_off->callback_query->message->chat->id;
$ch_user2 = $update_off->callback_query->message->chat->username;
$message_id2 = $update_off->callback_query->message->message_id;
$fadmin2 = $update_off->callback_query->from->id;
$chat_id = $update_off->callback_query->message->chat->id;
$message_id2 = $update_off->callback_query->message->message_id;


$adstep = file_get_contents("admin.step");
$soat = date('H:i:s', strtotime('4 hour'));
$sana = date('d-m-Y',strtotime('3 hour'));
mkdir("channel");

if($newid !== NULL and $newid == $botid){
    bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"👋*Salom men guruhingiz a'zolarini kanalingizga a'zo bo'lmagunlaricha yozishga qo'ymayman👍, 
Buning uchun menga supper admin berishingiz kerak😘! Sizham uz botingizni quring @EditUz_Bot*


Yordam => /qollanma*",
        'parse_mode'=>"markdown"
        ]);
}

if($cty == "group" or $cty == "supergroup"){
	$get = file_get_contents("grid.txt");
    if(mb_stripos($get, $cid)==false){
        file_put_contents("grid.txt", "$getn$cid");
    }
}else{
	$get = file_get_contents("usid.txt");
    if(mb_stripos($get, $fid)==false){
        file_put_contents("usid.txt", "$getn$fid");
    }
}

if ($tx == "/start" or $tx == "/start"){
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
    bot('sendPhoto',[
    'chat_id' => $cid,
'photo'=>"",
    'caption' => "✋Salom <b>$name</b> botimizga xush kelibsiz!

🏪Bu bot guruhingiz a'zolarini kanalingizga a'zo ,

🔴Bo'lmagunlaricha yozishga qo'ymaydi!

📄 Buyruqlar: /setchannel - kanalni ulash

📄 /delchannel - kanalni uzish

Yordam : =>  /qollanma ",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"➕ Guruhga qo'shish",'url'=>"https://t.me/$botname?startgroup=new"]],
        [['text'=>"Bot yasash",'url'=>"https://t.me/EditUz_Bot"]],
    ]
        ])
    ]);
}
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
    'text'=>"*⚠️ Ushbu buyruqdan foydalanish quyidagicha: 
✅Namuna:*`/setchannel @mayli_me`",
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
    'text'=>"✅ Kanal sozlandi.nnEndi, guruh a'zolari $kanal[1] kanaliga a'zo bo'lmaguncha guruhda yoza olishmaydi. Sizham uz botingizni quring @EditUz_Bot",
    'parse_mode'=>"markdown"
	]);
	 file_put_contents("channel/$cid.txt", $kanal[1]);
	} else {
	bot('sendMessage',[
    'chat_id'=>$cid, 
    'text'=>"*📛 Bot yoki siz kanalda admin emas!,

 Xatolikni to'g'irlab qayta urunib ko'ring!*

🌐Hozir soat $soat

🏪Bugun sana $sana",

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
  $minut = strtotime("+2 minutes");
  bot('deleteMessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid
        ]);
   bot('restrictChatMember', [
      'chat_id' => $cid,
      'user_id' => $fid,
      'until_date' => $minut,
      'can_send_messages' => false,
      'can_send_media_messages' => false,
      'can_send_other_messages' => false,
      'can_add_web_page_previews' => false
  ]);
			bot('sendMessage',[
			'chat_id'=>$cid,
			'text'=>"🔴Kechirasiz, [$name](tg://user?id=$fid)「*$title*」! guruhida yozish uchun,
「*@$user*」! Kanaliga a'zo bo'lishingiz kerak,
📄 Sizda!  2 daqiqa guruhda, yozish cheklandi! Sizham uz botingizni quring @EditUz_Bot ",
			'parse_mode'=>"markdown",
			'reply_markup'=>json_encode([
			'inline_keyboard'=>[
			[['text'=>"➺$titl A'zo bo'lish↻",'url'=>"https://t.me/".$user]],
			[['text'=>"📄Ma'lumot",'callback_data'=>"tasdiq"]],
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


///Aqqili\ntest 
if ($tx == "bot" or $tx == "+" or $tx == "Bot"){
bot('sendPhoto',[
    'chat_id' => $cid,
    'photo' => "https://t.me/VIP_BLOGERS/2810",
    'caption' => "​​#PSIXOLOGIK_TEST

🤓Telefoningizni qanday ushlashingizga qarab qanday fe’l-atvor sohibi ekanligingizni bilib oling✅

🔴O’zingizga mos suratni tanlang va guruhni tanlab natijalarni tekshiring✅😉",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"１",'url'=>"https://t.me/$botname?startgroup=new"],['text'=>"２",'url'=>"https://t.me/Edituz_bot"],['text'=>"３",'url'=>"https://t.me/edituz_bot"],['text'=>"４",'url'=>"https://t.me/edituz_bot"]],
    ]
        ])
    ]);
}

if ($tx == "/qollanma" or $tx == "/qollanma@$botname"){
bot('sendMessage',[
    'chat_id' => $cid,
    'text' => "Hurmatli  <b>$name</b> Qollanma bilan tanishing 


/setchannel Majburiy obunani sozlash;
Masalan : /setchannel @mayli_me

/delchannel Majburiy obunani toxtatish 

📊Yangiliklar  @mayli_me",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"➕ Guruhga qo'shish",'url'=>"https://t.me/$botname?startgroup=new"]],
        [['text'=>"Bot yasash",'url'=>"https://t.me/EditUz_bot"]],
    ]
        ])
    ]);
}

if($data=="tasdiq"){
  bot('answerCallbackQuery',[
    'callback_query_id'=>$cqid,
    'chat_id'=>$ccid,
    'text'=>" 📄Foydalanuvchi guruhida yozish uchun!
Bot ko'rsatadigan kanaliga az'o bo'lish shart !
Bo'lmasa bot sizni yozdirgani qo'ymaydi !
🌐Hozir soat $soat
🏪Bugun sana $sana
📄Yangiliklar @Mayli_me",
   'show_alert'=>true,
   'parse_mode'=>'html',

  ]);
}



$update = json_decode(file_get_contents('php://input'));
$admin = "ADMIN_ID";
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$type = $message->chat->type;
$tx = $message->text;
$text= $message->text;
$ism = file_get_contents("firdavs_officall/$cid.ism");
$sguruhlar = file_get_contents("Stat/sguruh.dat");
$guruhlar = file_get_contents("Stat/guruh.dat");
$kanallar = file_get_contents("Stat/kanallar.dat");
$step = file_get_contents("Bot/$cid.step");
$step2 = file_get_contents("Bot/2.step");
$step4 = file_get_contents("Bot/4.step");
$step3 = file_get_contents("Bot/3.step");
$step1 = file_get_contents("Bot/$chat_id2.step");
$name = $message->chat->first_name;
$user = $message->from->username;
mkdir("Bot");
mkdir("Stat");
mkdir("@Firdavs2004");
mkdir("@Update_off");
mkdir("@Kavsar_Coder");
mkdir("firdavs_officall");

$adminpanel = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📊 Robot Statistikasi 📊"]],
[['text'=>"📤A'zolarga Xabar Yuborish📤"]],
[['text'=>"📤Kanalarga Xabar Yuborish📤"]],
[['text'=>"📤Super Guruhlarga Xabar📤"]],
[['text'=>"📤Shaxsiy Guruhlarga Xabar📤"]],
[['text'=>"📂Bot kodi"],['text'=>"/start"]],
]
]);

if($tx=="/firdavs" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👨🏻‍💻Admin panelga xush kelibsiz xo'jayin!!",
'reply_markup'=>$adminpanel,
]);
}

$lichka = file_get_contents("Stat/lichka.dat");
if($type=="private"){
if(stripos($lichka,"$cid") !==false){
}else{
file_put_contents("Stat/lichka.dat","$lichkan$cid");
}
}
$sguruhlar = file_get_contents("Stat/sguruh.dat");
if($type=="group"){
if(stripos($sguruhlar,"$cid") !==false){
}else{
file_put_contents("Stat/sguruh.dat","$sguruhlarn$cid");
}
}


$guruhlar = file_get_contents("Stat/guruh.dat");
if($type=="supergroup"){
if(stripos($guruhlar,"$cid") !==false){
}else{
file_put_contents("Stat/guruh.dat","$guruhlarn$cid");
}
}

$kanallar = file_get_contents("Stat/kanallar.dat");
if($type=="channel"){
if(stripos($kanallar,"$cid") !==false){
}else{
file_put_contents("Stat/kanallar.dat","$kanallarn$cid");
}
}

if($tx=="Bot kodi"){
if($cid==$admin){
bot('sendDocument',[
'chat_id'=>$admin,
'document'=>new CURLfile(__FILE__),
'caption'=>"Robotni PHP kodi",
]);
}
}

if($tx=="📊 Robot Statistikasi 📊" and $cid==$admin){
$lich = substr_count($lichka,"n");
$gr = substr_count($guruhlar,"n");
$sgr = substr_count($sguruhlar,"n");
$umumiy = $lich + $gr;
       bot('deletemessage',[
        'chat_id'=>$cid,
        'message_id'=>$mid,
      ]);
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"*📊 ┌ Robot Statistikasi*

*🟦 ├ A'zolar Soni: $lich*

*🟨 ├Super Guruhlar Soni: $gr*

*🟨 ├ Shaxsiy Guruhlar Soni: $sgr*

*🟩 └ Umumiy Natija: $umumiy*

*⏰$soat*",
'parse_mode'=>'markdown',
'reply_markup'=>$adminpanel,
]);
}

///kanaga
if($tx=="📤Kanalarga Xabar Yuborish📤" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabaringizni Yozing.Men Uni Forward Qilib Hamma a'zolarga yuboraman!!
Bekor qilish uchun /cancel buyrugidan foydalaning",
]);
file_put_contents("Bot/$cid.step","forwardkm");
}


if($step=="forwardkm" and $cid==$admin){
  if($text=="/cancel"){
  file_put_contents("Bot/$cid.step","");
}else{
$kanalm = explode("n",$kanallar);
foreach($kanalm as $kine){
$xabarokkkk=bot('ForwardMessage',[
'chat_id'=>$kine,
'from_chat_id'=>$cid,
'message_id'=>$mid,
]);
}
}
}
if($xabarokkkk){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabar hamma bot a'zolariga yetkazildi",
]);
file_put_contents("Bot/$cid.step","");
}


if($tx=="📤A'zolarga Xabar Yuborish📤" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabaringizni Yozing.Men Uni Forward Qilib Hamma a'zolarga yuboraman!!
Bekor qilish uchun /cancel buyrugidan foydalaning",
]);
file_put_contents("Bot/$cid.step","forward");
}


if($step=="forward" and $cid==$admin){
  if($text=="/cancel"){
  file_put_contents("Bot/$cid.step","");
}else{
$userlar = explode("n",$lichka);
foreach($userlar as $users){
$xabarok=bot('ForwardMessage',[
'chat_id'=>$users,
'from_chat_id'=>$cid,
'message_id'=>$mid,
]);
}
}
}
if($xabarok){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabar hamma bot a'zolariga yetkazildi",
]);
file_put_contents("Bot/$cid.step","");
}

if($tx=="📤Super Guruhlarga Xabar📤" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabaringizni Yozing.Men Uni Forward Qilib Hamma guruhlarga yuboraman!!
Bekor qilish uchun /cancel buyrugidan foydalaning",
]);
file_put_contents("Bot/$cid.step","forwardg");
}

if($step=="forwardg" and $cid==$admin){
  if($text=="/cancel"){
  file_put_contents("Bot/$cid.step","");
}else{
$guruhlarim = explode("n",$guruhlar);
foreach($guruhlarim as $guruhs){
$xabarokkk=bot('ForwardMessage',[
'chat_id'=>$guruhs,
'from_chat_id'=>$cid,
'message_id'=>$mid,
]);
}
}
}
if($xabarokkk){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabar hamma super guruhlarga forward qilindi :)",
]);
file_put_contents("Bot/$cid.step","");
}

if($tx=="📤Shaxsiy Guruhlarga Xabar📤" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabaringizni Yozing.Men Uni Forward Qilib Hamma guruhlarga yuboraman!!
Bekor qilish uchun /cancel buyrugidan foydalaning",
]);
file_put_contents("Bot/$cid.step","forwardgr");
}

if($step=="forwardgr" and $cid==$admin){
  if($text=="/cancel"){
  file_put_contents("Bot/$cid.step","");
}else{
$sguruhlarim = explode("n",$sguruhlar);
foreach($sguruhlarim as $sguruhs){
$sxabarokkk=bot('ForwardMessage',[
'chat_id'=>$sguruhs,
'from_chat_id'=>$cid,
'message_id'=>$mid,
]);
}
}
}
if($sxabarokkk){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Xabar hamma shaxsiy guruhlarga forward qilindi :)",
]);
file_put_contents("Bot/$cid.step","");
}

if($tx=="/cancel" and $cid==$admin){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"*Xabar yuborish bekor qilindi✅*",
'parse_mode'=>'markdown',
'reply_markup'=>$adminpanel,
]);
}