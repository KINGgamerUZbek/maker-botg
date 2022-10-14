<?php
ini_set("display_errors", 1);
define('API_KEY',"API_TOKEN"); 

$admin = "ADMIN_ID";
$kid1 = "@$ch1";
$botla = "@$ch1";
$bot = "$bot";
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

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$cid = $message->chat->id;
$tx = $message->text;
$from_id = $update->message->from->id;
$mid = $message->message_id;
$name = $message->from->first_name;
$fid = $message->from->id;
$callback = $update->callback_query;
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
$data = $callback->data;
$callid = $callback->id;
$adstep = file_get_contents("admin/admin.step");
$cname = $calback->message->from->first_name;
$ccid = $callback->message->chat->id;
$cmid = $callback->message->message_id;
$cfid = $callback->message->from->id;
$user = $message->from->username;
$botname = bot('getme',['bot'])->result->username; // @ belgisiz yozing
$inlinequery = $update->inline_query;
$inline_id = $inlinequery->id;
$inlineid = $inlinequery->from->id;
$inline_query = $inlinequery->query;
$adminuser = "ADMIN_USER";
$time = date('H:i');
$soat = date("H:i");
$sana = date('d/m/Y');
$user = file_get_contents("Unknown_Blogger.ids");
$guruh = file_get_contents("pul/guruh.db");
$blocklar = file_get_contents("block.dat");
mkdir("referal");
mkdir("stat");
mkdir("step");
mkdir("data");
mkdir("data/$fid");
mkdir("user");
mkdir("prouser");
mkdir("user/$fid");
mkdir("prouser/$fid");
mkdir("ban");
mkdir("reklama");

mkdir("minus");
if(!file_exists("referal/$fid.txt")){  
    file_put_contents("referal/$fid.txt","0");
}

if(file_get_contents("stat/stat.txt")){
} else{
file_put_contents("stat/stat.txt", "0");
}
$getss= file_get_contents("admin/blocks.txt");

if(mb_stripos($getss, $fid)!==false){
	bot('sendMessage',[
	'chat_id' => $cid,
	'text' => "Kechirasiz <b>$name</b> siz botimizdan bloklangansiz!",
	'parse_mode'=>'html',
	]); 
	return false;
	}$referalsum = file_get_contents("referal/$fid.txt");
$referalid = file_get_contents("referal/$fid.referal");
$referalcid = file_get_contents("referal/$ccid.referal");
$userstep = file_get_contents("step/$fid.txt");

$soni = file_get_contents("soni/$idi.soni");
if(!$soni) $soni = 0;

$stat = file_get_contents("stat/usid.txt");

$panel = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"💸 Pul berish"],['text'=>"💸 Pul ayirish"]],
    [['text'=>"📊 Statistika"],['text'=>"↗️ Xabar yuborish"]], 
    [['text'=>"➕ Kanal Qo'shish"],['text'=>"➕ Admin Qo'shish"]], 
    [['text'=>"🗑 Kanal O'chirish"],['text'=>"🗑 Admin O'chirish"]],
    [['text'=>"📄 Kanal Ro'yhati"],['text'=>"📄 Admin Ro'yhati"]],
    [['text'=>"🖇 Reklama Berish"],['text'=>"🖇 Reklama O'chirish"],],
    [['text'=>"❌ O'chirish"],['text'=>"✅ Yoqish"]],
    [['text'=>"🔒 Bloklash"],['text'=>"🔓 Blokdan olish"]],
    [['text'=>"🔙Ortga qaytish"]],
    ]
    ]);

$main_menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
          [['text'=>"🛠Botlarni boshqarish"],],
          [['text'=>"💸 Pul ishlash"],['text'=>"📱Kabinet"]],
          [['text'=>"❓ Yordam"],['text'=>"📊 Statistika"]],
          [['text'=>"📨 Bog‘lanish"],['text'=>"📋 Ma'lumotlar"]],
]
]);

$botchalar = json_encode([
"inline_keyboard"=>[
[["text"=>"Bot Yaratish 🙋‍♂","url"=>"https://t.me/$bot"],],
]
]);



$pul_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"👥 Takliflar"],['text'=>"💰 Xarid qilish"]],
    [['text'=>"🔙Ortga qaytish"]],
]
]);

$bot_menu = json_encode([
    'resize_keyboard'=>true,
     'keyboard'=>[
[['text'=>"🆓️ Bepul bot"],['text'=>"💰 Pullik bot"]],
[['text'=>"👤 Guruhchi bot"],['text'=>"🔥Antiqa botlar"]],
[['text'=>"🔙Ortga qaytish"]]
]
]);

$yordam_menu = json_encode([
  'resize_keyboard'=>true,
  'keyboard'=>[
   [['text'=>"📞Murojaat"],['text'=>"⚡Tizim yangiliklari"]],
      [['text'=>"ℹ️Bot haqida"],['text'=>"📽️Video qoʻllanma"]],
      [['text'=>"🔙Ortga qaytish"]],
      ]
      ]);
      
$boshqar_menu = json_encode([
  'resize_keyboard'=>true,
  'keyboard'=>[
    [['text'=>"➕ Bot qo'shish"],['text'=>"⚙️ Botni sozlash"]],
    [['text'=>"🔙Ortga qaytish"]],
    ]
    ]);
    
  $Maxsus_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"😊Smile Games"],['text'=>"🇺🇿So'm bot v0.1"]],
[['text'=>"✅ Nik bot v0.3 bot"],['text'=>"🕋Quron bot"]],
    [['text'=>"🔙 Orqaga qayt"]],
    ]
    ]);

$pro_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"➕Nakrutka bot"],['text'=>"👤Obunachi v0.1"]],
[['text'=>"💰Pul bot (rubl)"],['text'=>"💰Pul bot (so'm)"]],
[['text'=>"📦Uc bot"],['text'=>"🇺🇸Usa bot"]],
[['text'=>"📦BC bot"],['text'=>"📦MB bot"]],
    [['text'=>"🔙 Orqaga qayt"]],
    ]
    ]);
   
$antiqa_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"😍 Smile"]],
[['text'=>"🖤MyGame"],['text'=>"💫Nik Bot v.03"]],
[['text'=>"🔐Zip Bot"],['text'=>"🔙 Orqaga qayt"]],
    ]
    ]);

$gr_menu = json_encode([
    'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔗 Join pro"],['text'=>"🖇 Joinhider pro"]],
[['text'=>"📈 Reyting pro"],['text'=>"🤓 Suhbatdosh pro"]],
[['text'=>"🛠 Sanovchi pro"],['text'=>"👮‍♂️ Posbon pro"]],
    [['text'=>"🔙 Orqaga qayt"]],
    ]
    ]);
$sozlash_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
      [['text'=>"📋 Mening botim"],['text'=>"🗑️ Botni o'chirish"]],
[['text'=>"🔙Ortga qaytish"]],
      ]
      ]);
      
$back_menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Ortga qaytish"]]
]
]);

$bek_menu = json_encode([
      'resize_keyboard'=>true,
      'keyboard'=>[
          [['text'=>"⬅️Orqaga"]],
          ]
          ]);
       
       $ketik_menu = json_encode([
         'resize_keyboard'=>true,
         'keyboard'=>[
           [['text'=>"🔙 Orqaga qayt"]],
           ]
           ]);
           
$chiq_menu = json_encode([
     'resize_keyboard'=>true,
     'keyboard'=>[
          [['text'=>"⬅️ ortga"]],
          ]
          ]);
          
  $kar_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
      [['text'=>"⬅️ Orqaga"]],
      ]
      ]);
      
  $kar_menu1 = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
      [['text'=>"⬅️Orqaga qaytish"]],
      ]
      ]);
      
  $ka_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
      [['text'=>"⬅️Orqaga"]],
      ]
      ]);
      
$bekor_menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙Ortga qaytish"]]
]
]);

$getss = file_get_contents("ban/banid.txt");
if(mb_stripos($getss, $tx)!==false){
bot('sendMessage',[
'chat_id' => $cid,
'text' => "Kechirasiz <b>$name</b> siz 🚫bloklangansiz!",
'parse_mode'=>'html',
]); 
return false;
}

if(isset($message)){
    $get = file_get_contents("stat/usid.txt");
    if(mb_stripos($get,$fid)==false){
        file_put_contents("stat/usid.txt", "$get\n$fid");
        bot('sendMessage',[
'chat_id'=>-"$admin1",
          'text'=>"😄 Yangi aʼzo\n👤 Ismi: $name\n🆔 raqami: $fid\n✳️ Usernamesi: @$username\n💡 Lichka: <a href='tg://user?id=$fid'>$name</a>",
'parse_mode'=>'html',
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/$bot"]],
              ]
              ])
          ]);
    }
}

if($inlineid !== NULL){
bot('answerInlineQuery',[
    'inline_query_id'=>$inline_id,
    'cache_time'=>1,
    'results'=>json_encode([
    ['type'=>'article',
    'id'=>1,
    'title'=>"✅Referal havolangizni yuborish uchun bosing",
    'input_message_content'=>[
    'disable_web_page_preview'=>true,
    'parse_mode'=>'MarkDown',
    'message_text'=>"⚡️ Bir necha daqiqada o'z Telegram botingizga ega bo'ling!

⬇️ Buning uchun quyidagi botga kirish tugmasi orqali botimizga otib bot yarating!",
    ],
    'reply_markup'=>[
     'inline_keyboard'=>[
     [['text'=>"➕ Botga kirish",'url'=>"https://t.me/$bot?start=$inlineid"]]
     ]
     ]
     ],
])
]);
}

if ($tx == "/start"){
    if(joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id' => $cid,
    'text' => "☇ Salom $name

Sizni botda ko‘rib turganimdan xursandman!
  @$botname  orqali siz o‘zingizning shaxsiy botlaringizni hech qanday qiyinchiliklarsiz yaratishingiz mumkin!

<b>⬇ Ishni boshlash uchun quyidagi tugmalardan foydalaning!</b>",
    'parse_mode'=>'html',
    'reply_markup'=>$main_menu
    ]);
}
} elseif (mb_stripos($tx, "/start")!==false) {
    if(joinchat($fid)=="true"){
        bot('sendMessage',[
        'chat_id' => $cid,
        'text' => "☇ Salom $name

Sizni botda ko‘rib turganimdan xursandman!
@$botname orqali siz o‘zingizning shaxsiy botlaringizni hech qanday qiyinchiliklarsiz yaratishingiz mumkin!

<b>⬇ Ishni boshlash uchun quyidagi tugmalardan foydalaning!</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$main_menu
        ]);
        
        if(mb_stripos($stat, $fid)==false){
        $ex = explode(" ", $tx);
        if($ex[1] == $cid){
        }else{
        $olmos = file_get_contents("referal/$ex[1].txt");
        $olmoslar = $olmos + 5;
        file_put_contents("referal/$ex[1].txt", $olmoslar);
        bot('sendMessage',[
        'chat_id'=>$ex[1],
        'text'=>"📡<i>Tabriklaymiz siz botimizga do'stingizni taklif qildingiz va do'stingiz kanalimizga a'zo bo'ldi buning uchun sizga 5 ta olmos berildi</i>!",
        'parse_mode'=>'html'
        ]);
        }
        }

    }else{
        if(mb_stripos($stat, $fid)==false){      
        $ex = explode(" ", $tx);
        if($ex[1] == $cid){
        }else{
        bot('sendMessage',[
        'chat_id'=>$ex[1],
        'text'=>"📡<i>Tabriklaymiz siz botimizga do'stingizni taklif qildingiz! Ammo do'stingiz kanalimizga hali a'zo bo'lmadi. Do'stingiz kanalimizga a'zo bo'lsa sizga 5 olmos beriladi!</i>",
        'parse_mode'=>'html'
        ]);
        file_put_contents("referal/$fid.referal", $ex[1]);
    }
    }else{
        unlink("referal/$fid.referal");
    }
    }
}


if($data == "result"){
    if(joinchat($ccid) == "true"){
        bot('deleteMessage',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid
        ]); 

        if($referalcid == true){
        $olmos = file_get_contents("referal/$referalcid.txt");
        $olmoslar = $olmos + 5;
        file_put_contents("referal/$referalcid.txt", $olmoslar);
         bot('sendMessage',[
        'chat_id'=>$referalcid,
        'text'=>"🔔<i>Tabriklaymiz do'stingiz kanalimizga a'zo bo'ldi va sizga 5 ta olmos berildi!</i> ",
        'parse_mode'=>'html'
        ]);
         unlink("referal/$ccid.referal");
     }

        bot('sendMessage',[
        'chat_id'=>$ccid,
        'text'=>"<b>Yaxshi siz bizning kanalimizga a'zo bo'ldingiz!</b>\n\n<b>⬇️Ishni boshlash uchun quyidagi tugmalardan foydalaning</b>",
        'parse_mode'=>"html",
        'reply_markup'=>$main_menu
        ]);
    }else{
        bot("answerCallbackQuery",[
        "callback_query_id"=>$callid,
        "text"=>"❌Siz hali kanalimizga aʼzo boʻlmadingiz!",
        "show_alert"=>true,
        ]);
    }
}

if($tx == "🔙Ortga qaytish" and joinchat($fid)=="true"){
    unlink("step/$fid.txt");
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"❌ <b>Bekor qilindi!</b>",
    'parse_mode'=>"html",
    'reply_markup'=>$main_menu
    ]);
}

if($tx == "⬅️Orqaga" and joinchat($fid)=="true"){
    bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Quyidagi menyudan foydalaning👇",
        'parse_mode'=>"html",
        'reply_markup'=>$boshqar_menu,
        ]);
}

if($tx == "🔙 Orqaga qayt" and joinchat($fid)=="true"){
    bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Quyidagi menyudan foydalaning👇",
        'parse_mode'=>"html",
        'reply_markup'=>$bot_menu,
        ]);
}


if($tx == "⬅️ ortga" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Quyidagi menyudan foydalaning 👇",
    'parse_mode'=>"html",
    'reply_markup'=>$boshqar_menu
    ]);
}

if($tx == "⬅️ Orqaga" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Quyidagi botlardan foydalaning 👇",
    'parse_mode'=>"html",
    'reply_markup'=>$Maxsus_menu
    ]);
}

if($tx == "⬅️Orqaga" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Quyidagi botlardan foydalaning 👇",
    'parse_mode'=>"html",
    'reply_markup'=>$pro_menu
    ]);
}
if($tx == "⬅️Orqaga qaytish" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Quyidagi botlardan foydalaning 👇",
    'parse_mode'=>"html",
    'reply_markup'=>$gr_menu
    ]);
}

if($tx == "🔙Ortga qaytish" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🖥 Bosh sahifaga qaytdingiz",
    'parse_mode'=>"html",
    'reply_markup'=>$main_menu
    ]);
}

if($tx == "🛠Botlarni boshqarish" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"ℹ️ Yangi bot yaratish uchun quyidagi tugmani bosing:
«➕ Bot qoʻshish»

ℹ️ Tayyor botni oʻchirish yoki sozlash uchun quyidagi tugmani bosing:
«⚙️Botni sozlash»",
    'parse_mode'=>'html',
    'reply_markup'=>$boshqar_menu
    ]);
}

if($tx == "➕ Bot qo'shish" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Qanday turdagi botlarni yaratamiz👇",
    'reply_markup'=>$bot_menu,
    ]);
}

if($tx == "🆓️ Bepul bot"){
bot('sendMessage',[
'chat_id'=>$cid,
   'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
'reply_markup'=>$Maxsus_menu
]);
}

if($tx == "💰 Pullik bot"){
bot('sendMessage',[
'chat_id'=>$cid,
   'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
'reply_markup'=>$pro_menu
]);	
}
if($tx=="🔥Antiqa botlar"){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"botlardan birini tanlang",
    'parse_mode'=>'html',
	'reply_markup'=>$antiqa_menu,
]);
}
if($tx == "👤 Guruhchi bot"){
bot('sendMessage',[
'chat_id'=>$cid,
   'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
'reply_markup'=>$gr_menu
]);	
}
if($tx == "⚙️ Botni sozlash" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"⚙️Botni sozlash panelidasiz..👇",
    'reply_markup'=>$sozlash_menu,
    ]);
}
if($tx == "📋 Mening botim" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Tez kunda....",
    'reply_markup'=>$chiq_menu,
    ]);
}

if($tx == "🗑️ Botni o'chirish" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Tez kunda....",
    'reply_markup'=>$chiq_menu,
    ]);
}


if($tx == "📱Kabinet" and joinchat($fid)=="true"){
    $get = file_get_contents("referal/$fid.txt");
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"<i>🗄 Kabinetingizga xush kelibsiz!

💵 Sizning balansingiz: $get olmos
👥 Sizning takliflaringiz: $soni ta

❗❗Bot hisobingizni Qiwi orqali to‘ldiryotgangizda izoh qoldirishni unutmang!</i>",
     'parse_mode'=>"html",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"],['text'=>"🔄 Almashish",'callback_data'=>"almashish"]],
            ]
        ])
]);
}

if($data == "almashish"){
	bot('deleteMessage',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
]);
bot('sendmessage',[
'chat_id'=>$ccid,
'text'=>"<i>⚠️ Yodingizda tuting, almashilgan pullaringizni avvalgi holatga qaytara olmaysiz!</i>

<b>🧮 Qancha pulingizni almashmoqchisiz?
Quyidagi tartibda yozing!</b>

<code>/almashish
$cfid
1000</code>

<b>@$botname</b>",
'parse_mode'=>'html',
'reply_markup'=>$back_menu,
]);
}

if(mb_stripos($tx,"/almashish")!==false){
$id = explode("\n", $text);
$id1 = $id[1]; $id2 = $id[2];
$olmos = file_get_contents("referal/$id1.txt");
$miqdor = $olmos+$id2;
file_put_contents("referal/$id1.txt","$miqdor");
$olmos = file_get_contents("referal/$cid.txt");
$odam = file_get_contents("odam/$cid.dat");
if($olmos>=$id2){
$olmos = file_get_contents("referal/$cid.txt");
$mm=$olmos-$id2;
file_put_contents("referal/$cid.txt","$mm");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"💳<b>Hisobingizdan $id2 olmos ayirildi!</b>.",
'parse_mode'=>'html',
'reply_markup'=>$main_menu,
]);
bot('sendmessage',[
'chat_id'=>$id1,
'text'=>"<b>📨 Yangi xabarnoma:
🎯Sizning hisobingiz to‘ldirildi!
💰Miqdor: $id2 olmos
♻️Holat: Muvaffaqiyatli 
🗓Vaqti: ⏰ $soat 📆$sana</b>.",
'parse_mode'=>'html',
'reply_markup'=>$main_menu,
]);
}else{
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>⚠️ Almashish uchun balansingizda ushbu summa mavjud emas! Qayta urinib ko'ring:</b>",
'parse_mode'=>'html',
]);
$olmos = file_get_contents("referal/$id1.txt");
$miqdor = $olmos+$id2;
file_put_contents("referal/$id1.txt","$miqdor");
bot('sendmessage',[
'chat_id'=>$cid,
]);
}
}

if($data == "toldir"){
        bot('deleteMessage',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
]);
     bot('SendMessage',[
        'chat_id'=>$ccid,
        'text'=>"📋 Quyidagilardan birini tanlang:",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"💳Karta so'm",'callback_data'=>"qiwi"],['text'=>"🔥 Paynet",'callback_data'=>"paynet"]],
[['text'=>"🥝 Qiwi rub",'callback_data'=>"click"]],
]
])
]);
}


if($data == "orqa"){
        bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
        'text'=>"📋 Quyidagilardan birini tanlang:",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"💳karta so'm",'callback_data'=>"qiwi"],['text'=>"🔥 Paynet",'callback_data'=>"paynet"]],
[['text'=>"🥝 Qiwi rub",'callback_data'=>"click"]],
]
])
]);
}


if($data == "qiwi"){
	bot('editMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"📋 To'lov tizimi: Click
💡 Avto to'lov holati: OF

💳 Hamyon ( yoki karta )
1 olmos narxi 140 so'm

Ushbu raqamga to'lov qilib to'lpv haqidagi chekni adminga yoboring",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☎️ Tex. Yordam",'url'=>"https://t.me/$adminuser"]],
[['text'=>"◀️Ortga",'callback_data'=>"orqa"]],
]
])
]);
}

if($data == "paynet"){
	bot('editMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"📋 To'lov tizimi: PAYNET
💡 Avto to'lov holati: OF

💳 telefon raqam - 
📊1 ta olmos 140 so'm

Qo'shimcha: To'lovni amalga oshirgach biz bilan bog'laning.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☎️ Tex. Yordam",'url'=>"https://t.me/$adminuser"]],
[['text'=>"◀️Ortga",'callback_data'=>"orqa"]],
]
])
]);
}

if($data == "click"){
	bot('editMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"📋 To'lov tizimi: Qiwi
💡 Avto to'lov holati: OF

💳 Hamyon Admin orqali
📝10 ta olmos 1 rubl

Ushbu raqamga qiwi orqali to'lov qilgach to'lov chekini adminga yuboring.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☎️ Tex. Yordam",'url'=>"https://t.me/$adminuser"]],
[['text'=>"◀️Ortga",'callback_data'=>"orqa"]],
]
])
]);
}

if($tx == "💸 Pul ishlash"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💸 Qanday usulda pul ishlashni hohlaysiz?

‼️ Bot orqali yig'gan pullaringizni yechib olomaysiz. Mablag'laringizni botimizdagi har qanday xaridlar uchun sarflashingiz mumkin.",
    'reply_markup'=>$pul_menu
   ]);
}
if($tx == "👥 Takliflar" and joinchat($fid)=="true"){ 
    bot('sendMessage',[ 
    'chat_id'=>$cid, 
    'text'=>"📌Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!✅", 
    'parse_mode'=>"html", 
    'disable_web_page_preview'=>true, 
    'reply_markup'=>$pul_menu
    ]); 
} 

if($tx == "💰 Xarid qilish" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💵 Hisobni toʻldirish usulini tanlang:",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
           [['text'=>"💠 Click ",'callback_data'=>"qiwi"],['text'=>"🔥 Paynet",'callback_data'=>"paynet"]],
[['text'=>"🥝 Qiwi",'callback_data'=>"click"]],
]
])
]);
}


if($tx == "📚 Qo'llanma" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💡 <b>@$bot jamoasi:</b>
	
<i>Telegram tarmog‘idagi eng yangi loyiha 
@$botname siz bu bot orqali php dasturlash tillarini bilmasdan turib ham bot yaratish imkoniyatiga egasiz!</i>

⚙<b> Tizim versiyasi: v0.8.0</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📋 Ma'lumot",'callback_data'=>"noma"],['text'=>"⚠️ Qoidalar",'callback_data'=>"qoida"]],
[['text'=>"📹 Video qo'llanma",'url'=>"qol"]],
]
])
]);
}


if($data == "malumot"){
	bot('editMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"💡 <b>@$bot jamoasi:</b>
	
<i>Telegram tarmog‘idagi eng yangi loyiha 
@$botname siz bu bot orqali php dasturlash tillarini bilmasdan turib ham bot yaratish imkoniyatiga egasiz!</i>

⚙<b>Tizim versiyasi: v0.8.0</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📋 Ma'lumot",'callback_data'=>"noma"],['text'=>"⚠️ Qoidalar",'callback_data'=>"qoida"]],
[['text'=>"📹 Video qo'llanma",'url'=>"qol"]],
]
])
]);
}


if($data=="noma"){
bot('editMessageText',[
'chat_id'=>$ccid,
'message_id'=>$cmid,
'text'=>"🤖 <b>Bot yaratish qo'llanmasi!

1. Telegram dasturingizdan @BotFather deb qidiring va START tugmasini bosing!

2. @BotFather ga /newbot buyrug'ini yozing.

3. Yaratmoqchi bo'lgan botingiz NOMINI yozing.

4. Botingiz BOTNAMEsini yozing (botname oxiri  bot  yoki robot bilan tugashi kerak).

5. Agar amallarni to'g'ri bajargan bo'lsangiz sizga @BotFather botingiz Tokenini yuboradi uni saqlab qo'ying!

6. Bot yaratayotganingizda botimiz Token so'raganida @BotFather yuborgan tokeni yuborasiz.

➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖

❗ESLATMA: </b>

⚠️<i>Qoidalarga rioya qilmagan foydalanuvchi botdan blocklarnishi mumkin.</i>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️ Ortga",'callback_data'=>"malumot"]],
]
])
]);
}

if($data == "qoida"){
	bot('EditMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"<b>⚠️ Qoidalar:</b>
    
<i>1. Ushbu robot maker bot adminstratorlari va bot  dasturchisi foydalanuvchilardan quydagilarni o'z zimmasiga olmasligi haqida sizga eslatib o'tadi:
1.1 ushbu botdan foydalangan holda ochilgan barcha botlar sizga pul to'lashi yoki to'lamasligj bu bizga bog'liq emas va biz sizga pul to'lamaymiz!
1.2 agar sizga ushbu botlar server orqali pul to'laydi deyishsa ishonmang yoki o'zingizda shunday xayol bo'lsa buni uniting chunki bu aqilsiz gap!
1.3 ushbu robot orqali bot ochgan zahotingiz barcha shart va qoidalar bilan tanishganingizni va rozi ekanligingizni o'z zimangizga olasiz!</i>

<b>2. ⚠️Ogohlantiramiz:</b>
<i>2.1 Taniqli shaxslar, mashxur savdo belgilari, kampaniya tashkilot nomlari, telegram kanal va veb-saytlar nomidan soxta bot ochib ish yuritish taqiqlanadi bunga ko'ra sizga tashkilot tomonidan ogohlantirish berilmaydi va ish sud tartibida ko'rib chiqiladi.
2.2 Foydalanuvchi tomonidan kiritilgan xar qanday ma'lumot va manbalar uchinchi shaxsga oshkor etilmaydi.
2.3 Foydalanuvchi tomonidan yasalagan botlarda quydagilar qatiyan taqiqlanadi!
+18 manba kanal va guruhlarga obunachi yig'ishda foydalanish.
Diniy aqidaparastlik kanalarda foydalanish.
Davlat siyosatiga zid yoki yolg'on manbalar tarqatuvchi kanalarga ulash va boshqlar...</i>

<b>3. ❗Eslatib o'tamiz:</b>
<i>√ botlar 100% xafsiz va faqat O'zbekistondagi telegram foydalanuvchilari foydalana oladi
√ barcha raqamlar barcha xisoblar o'chirilishidan avval sizni ogohlantiramiz.
√ qo'llab - quvvatlash xizmati sizga 24/7 soat davomida xizmat ko'rsatadi.
√ Sizning ma'lumotlaringiz xech kim tomonidan qayta ko'rib chiqilmaydi (2.1 dan tashqari hollarda)</i>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Ortga",'callback_data'=>"malumot"]],
]
])
]);
}

if($tx=="qol"){ 
      bot('sendVideo',[ 
        'chat_id'=>$cid,
        'video'=>"https://t.me/MakerUz_News/100",
        'caption'=>"🤖Botimizning qo'lash videosi bu video bizning yotube kanalimizga hamda botimmizga ham joylanadi.✅

🛠Bot : @$bot

🎥Video mualifi : @$adminuser

🛠Qanday mumao bolsa : @$adminuser ga yozing!", 
        'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Ortga",'callback_data'=>"malumot"]],
]
])
]); 
}

if($tx == "📊 Statistika" and joinchat($fid)=="true"){
    $us = file_get_contents("stat/usid.txt");
    $uscount = substr_count($us, "\n");
    $bot = file_get_contents("stat/stat.txt");
    $botpro = file_get_contents("stat/statpro.txt");
    $all = $bot + $botpro;
    bot('sendMessage',[
    'chat_id' => $cid,
    'text'=>"📊 Statistika\nBot a'zolari soni: *$uscount* ta\nJami yasalgan oddiy botlar: *$bot* ta\nJami yasalgan pro botlar: *$botpro* ta\nJami yasalgan botlar: *$all* ta\n\n⏰$time  📆$sana",
    'parse_mode'=>"markdown",
    'reply_markup'=>$main_menu
    ]);
}

if($tx == "❓ Yordam" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"❓Siz Yordam menusidasiz.\n\n📋 Yordam olish uchun buyruqlardan foydalaning:",
    'reply_markup'=>$yordam_menu
    ]);
}
if($tx=="📞Murojaat" and joinchat($fid)=="true"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"📞 Sizda biror gʻoya, taklif yoki murojaat boʻlsa bizga murojaat qiling:
@$adminuser

📂 Texnik qoʻllab-quvvatlash uchun guruhimizga qoʻshiling:
@VipBuilder_UzBot",

	'parse_mode'=>'html',
	'reply_markup'=>$yordam_menu
	]);
}
if($tx=="⚡Tizim yangiliklari"and joinchat($fid)=="true"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"📂 Bot yuzasidagi barcha yangiliklar @uz_makerbot__News kanalida yetkazib boriladi.

🗄 Kanalga obuna boʻlishingizni soʻraymiz! Bu siz uchun muhim!",

	'parse_mode'=>'html',
	'reply_markup'=>$yordam_menu
	]);
}
if($tx=="ℹ️Bot haqida"and joinchat($fid)=="true"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"ℹ️ Ushbu bot orqali siz hech qanday dasturlash tillarini bilmasdan turib va hech qanday hostinglarsiz oson bot yasay olasiz.

✅ Imkoniyatlar
👉 Bepul hostingdan bot yarating
👉 Do'stlarni taklif qiling
👉 Har kunlik bonus oling
👉 Dasturlangan bot yarating.

🇺🇿 Hamma botlar soni:  ta

♻️ Bot versiyasi: 4.1

🛠 Dasturchi: @$adminuser",

	'parse_mode'=>'html',
	'reply_markup'=>$yordam_menu,
	]);
}

if($tx=="📽️Video qoʻllanma"){ 
      bot('sendVideo',[ 
        'chat_id'=>$cid,
        'video'=>"https://t.me/MakerUz_News/100",
        'caption'=>"🤖Botimizning qo'lash videosi bu video bizning yotube kanalimizga hamda botimmizga ham joylanadi.✅

🛠Bot : @$bot

🎥Video mualifi : @$adminuser

🛠Qanday mumao bolsa : @MASTER_PHP_1!", 
        'reply_markup'=>$yordam_menu,
]); 
}

//panel

if($text=="🎫 Promokod yaratish"){
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>" 🎫 Promokod yasash uchun
/promo promokod
masalan
<code>/promo 79j585h67ht</code>",
'parse_mode'=>'html',
'reply_markup'=>$back4_menu,
]);
}
$promo = file_get_contents("ch1.txt");
$ball = file_get_contents("ch2.txt");
$aa = "$ch1";  //promokod yuboriladigan kanal id raqami
$ab = "$ch1"; //promokod ishlatilganligi haqida yuboriladigan kanalid raqami
if(mb_stripos($text, "/promo")!==false){
if($cid == $admin){
	$m1 = explode(" ",$text);
 $m2 = $m1[1];
 file_put_contents("ch1.txt","$m2");
 bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"🎫 Promokod $promo
qancha olmos berilsin
/ball olmos miqdori yozing
Masalan
<code>/ball 250</code>",
'parse_mode'=>'html',
]);
}
}

if(mb_stripos($text, "/ball")!==false){
if($cid == $admin){
	$m1 = explode(" ",$text);
 $m2 = $m1[1];
 file_put_contents("ch2.txt","$m2");
 bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"🎫<b> Promokod kanalga yuborildi ✅</b> ",
'parse_mode'=>'html',
'reply_markup'=>$panel,
 ]);
 bot("sendmessage",[
 'chat_id'=>$aa,
 'text'=>"<i>🎫 Yangi Promokod.

🤖 Botga kirish -> @$botname 
🔽 Ishlatish uchun pastdagi tugmani bosing.</i>

<b>🎫 Promokod tashlangan vaqt: $soat</b>",
 'parse_mode'=>'html',
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"🎫 Promokodni ishlatish", "url"=>"https://t.me/$bot?start=$promo"]],
]
])
]);
}
}

if($text=="/start $promo"){
$olmos = file_get_contents("referal/$cid.txt");
$miqdor = $olmos + $ball;
file_put_contents("referal/$cid.txt","$miqdor");
bot("sendmessage",[
'chat_id'=>$cid,
'text'=>"<i>✅ Promo kod to'g'ri sizga $ball olmos berildi!</i>",
'parse_mode'=>"html",
]);
unlink("ch1.txt");
bot('sendMessage',[
'chat_id'=>$ab,
'text'=>"<i>⚠️ Diqqat tepadagi promokod ishlatildi.
Endi undan qayta foydalanib bo'lmaydi!
Promokoddan @$username foydalandi 
va unga $ball olmos taqdim etildi ✅</i>

<b>🎫 Promokod ishlatilgan vaqt: $soat</b>",
'parse_mode'=>'html',
]);
unlink("ch2.txt");
}




$step1 = file_get_contents("minus/$fid.txt");
$glavniadmin = "ADMIN_ID"; //bosh admin ID raqami
$admins = file_get_contents("admins.txt");
$kanals = file_get_contents("kanals.txt");
//<------- admin-------> 

if(($tx == "/panel") and $cid==$admin){
    bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$mid]);
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"<b>👨‍💻Admin panelga xush kelibsiz.</b>",
    'parse_mode'=>"html",
    'reply_markup'=>$panel,
]);
}
if($tx == "/admin" and $cid == $admins){
    bot('sendMessage',[
    'chat_id'=>$admins,
    'text'=>"<b>👨‍💻Admin panelga xush kelibsiz.</b>",
    'parse_mode'=>"html",
    'reply_markup'=>$yordamchipanel,
    ]);
}
$yordamchipanel = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
        [['text'=>"❌ OFF"],['text'=>"✅ ON"]],
        [['text'=>"🔒 Ad Blok"],['text'=>"🔓 Remove Blok"]],
        [['text'=>"↗️ Forward"]],
        [['text'=>"↗️ Xabar Yozish"]],
        [['text'=>"↗️ Xabar Userga"]],
    ]
    ]);
    if($text == "❌ OFF" && $cid == $admins){
        file_put_contents("on.txt","off");
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"⚠️<b>Offline.</b>",
          'parse_mode'=>'html',
        ]);
        }
        //yoqish
        if($text == "✅ ON" && $cid == $admins){
        file_put_contents("on.txt","on");
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"⚠️<b>Online</b>",
          'parse_mode'=>'html',
        ]);
        }
    //
    $rpl = json_encode([
        'resize_keyboard'=>false,
        'force_reply'=>true,
        'selective'=>true,
      ]);
      //blockdan olish
       if($type=="private"){
      if($text == "🔓 Remove Blok" and $cid==$admins){
      bot('sendmessage', [
            'chat_id' =>$cid,
             'text' => "🚫Blockdan Olinadigan 🆔️ni Yozing!" ,
             'parse_mode'=>'markdown',  
             'reply_markup'=>$rpl,
             ]);
             }}
             if($reply == "🚫Blockdan Olinadigan 🆔️ni Yozing!"){  
      $fayl = file_get_contents("block.db");
      $fayl2 = "$text";
      $fayl3 = str_replace($fayl2," ",$fayl);
      file_put_contents("block.db","$fayl3");
      $fayl = file_get_contents("block.db");
      bot('sendmessage', [
            'chat_id' =>$cid,
             'text' => "[$text](tg://user?id=$text)  Bandan olindi" ,
             'parse_mode'=>'markdown', 
      'reply_markup'=>$yordamchipanel,
            ]); 
            bot('sendmessage', [
            'chat_id' =>$sd,
             'text' => "🖐*Salom*  [$name](tg://user?id=$uid)  
      😊Sizga Xush Xabar Bor!
      Siz [👨‍💻Adminimiz](tg://user?id=$admins) Tomonidan Bandan Olindingiz!
      Endi Botni Ishlatishingiz mumkin ✅
      🔃Qayta /start Bosing!" ,
             'parse_mode'=>'markdown', 
             ]);
      }
      
      //Blocklash
      if($text=="🔒 Ad Blok"){
      if($cid==$admins){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Ban Qilinadigan 🆔ni Yuboring!",
      'reply_markup'=>$rpl,
      ]);
      }
      }
      if($reply=="Ban Qilinadigan 🆔ni Yuboring!"){
      file_put_contents("block.db","$blocks\n$text");
      bot('SendMessage',[
         'chat_id'=>$admins,
              'text'=>"✅[$text](tg://user?id=$text) *Banlandi!*", 
              'parse_mode'=>'markdown', 
      'reply_markup'=>$yordamchipanel,
              ]);
              bot('SendMessage',[
         'chat_id'=>$text,
              'text'=>"<b>⚠️Sizni bu botda bloklashdi. 
      🚫Endi botimizdan foydalana olmaysiz!
      ❗ Agar bu anglashilmovchilik bo'lda admin bilan bog'laning</b>", 
              'parse_mode'=>'html', 
              'reply_markup'=>json_encode([
              'inline_keyboard'=>[
         [["text"=>'👨‍💻Asminstrator', 'url'=>"https://t.me/ProUzbekCoder"]],
      ]
      ]),
      ]);
      }
      
      
      $blocks=file_get_contents("block.db");
      if(mb_stripos($blocks,"$uid")!==false){
      bot('sendMessage', [
      'chat_id'=>$cid,
      'parse_mode'=>"html",
      'text'=>"<b>🖐Salom <a href='tg:user?id=$cid'>$name</a> 
      Siz  Botimizdan foydalana olmaysiz, chunki Bot sizni bloklangan!
      Blokdan chiqish uchun 👨‍💻Admin ga yozing! Blokdan chiqmaguncha bot siz uchun ishlamaydi!🚫</b> " ,
      'reply_markup'=>json_encode([
      'inline_keyboard'=>[
      [['text'=>"Admin👨‍💻", "url"=>"https://t.me/ProUzbekCoder"]],
      ]
      ])
      ]);return false;}

      $xabar1 = file_get_contents("send.txt");
if($text == "↗️ Xabar Yozish"){
if($cid == $admins){
bot('sendmessage',[
'chat_id'=>$admins,
'text'=>"*Foydalanuvchilarga yuboriladigan xabar matnini kiriting! Bekor qilish uchun /cancel ni bosing!*",
'parse_mode'=>"markdown",
]); file_put_contents("send.txt","user");
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*<b>Bu bo‘limni faqat bot administratori ishlata oladi!</b>*",
'parse_mode'=>'Markdown',
]);
}
}
if($xabar1=="user" and $cid==$admins){
if($text=="/cancel"){
bot('sendmessage',[
'chat_id'=>$admins,
'text'=>"Bekor qilindi!",
'parse_mode'=>"html",
]); unlink("send.txt");
}else{
 $lichk = file_get_contents("shekih.db");
$lichkak = explode("\n",$lichk);
foreach($lichkak as $lichkalark){
$okuserk=bot("sendmessage",[
'chat_id'=>$lichkalark,
'text'=>$text,
'parse_mode'=>'html'
]);
}
}
}
if($okuserk){
bot("sendmessage",[
'chat_id'=>$admins,
'text'=>"Xabaringiz barcha bot foydalanuvchilariga yuborildi!",
'parse_mode'=>'html',
]); unlink("send.txt");
}

$lichkak=file_get_contents("shekih.db");
if($type=="private"){
if(strpos($lichkak,"$cid") !==false){
}else{
file_put_contents("shekih.db","$lichkak\n$cid");
}
}
//
if($text=="↗️ Forward" and $cid==$admins){
    bot('sendmessage',[
    'chat_id'=>$admins,
    'text'=>"Xabaringizni Yozing. Men Uni Forward Qilib Hammaga yuboraman!!",
    ]);
    file_put_contents("step/$fid.txt","forw");
    }
    
    if($userstep=="forw" and $cid==$admina){
    $userlark = explode("\n",$lichka);
    foreach($userlark as $usersk){
    $xabarokk=bot('ForwardMessage',[
    'chat_id'=>$usersk,
    'from_chat_id'=>$cid,
    'message_id'=>$mid,
    ]);
    }
    if($xabarokk){
    bot('sendmessage',[
    'chat_id'=>$admins,
    'text'=>"Xabar yetkazildi",
    ]);
      file_put_contents("step/$fid.txt","");
    }
    }
//
if($text == "↗️ Xabar Userga"){
    if($cid == $admins){
    bot('sendMessage', [
    'chat_id'=>$admins,
    'text'=>"✔ Userga Xabar yuborish uchun
    /xabarcha 🆔️ Xabar 
    shu tarzda yuboring!
    
    👨‍💻Admin: $adminuser",
    'reply_markup'=>$back,
    ]);
    }else{
    bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=> "*🤪😂 Bu funksiyani Faqat men @$userR ishlata olaman.*",
    'parse_mode'=>'Markdown',
    ]);
    }
    }
    if(mb_stripos($text,"/xabarcha") !== false){
    if($cid == $admins){
    $exs = explode(" ",$text);
    $sms1 = str_replace("/xabarcha $exs[1]","",$text);
    $ismi1 = $message->from->first_name;
    
    if(mb_stripos($exs[1],"@") !== false){
    $ssl1 = str_replace("@","",$exs[1]);
    $egasi = "t.me/$ssl1";
    }else{
    $egasis = "tg://user?id=$ex[1]";
    $eegasis = "$exs[1]";
    }
    bot('sendmessage',[
    'chat_id'=>$ex[1],
    'text'=>"📨*Yangi Xabar*
    
    👤 [$ismi](tg://user?id=$uid)
    
    *📨 Xabar: $sms1
    
    ❄ @$bot*",
    'parse_mode'=>"markdown", 
    ]);
    bot('sendmessage',[
    'chat_id'=>$admins,
    'text'=>"👤[Foydalanuvchi]($egasis) ga Habaringiz Yuborildi📩",
    'parse_mode'=>"markdown", 
    'reply_markup'=>$yordamchipanel
    ]);
    }else{
    bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=> "*🤪😂 Bu funksiyani Faqat men $adminuser ishlata olaman.*",
    'parse_mode'=>'Markdown',
    ]);
    }
}
$back = json_encode([
    'resize-keyboard'=>true,
    'keyboard'=>[
        [['text'=>"🔙 Orqaga"]],
    ]
    ]);
if($text=="🔙 Orqaga"){
    bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Siz Admin panelidasiz",
        'parse_mode'=>"html",
        'reply_markup'=>$panel,
    ]);
}

if($text=="↗️ Xabar yuborish" and $cid==$admin){
    bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Admin qanday turdagi xabar yubormoqchisiz:?",
        'parse_mode'=>"html",
        'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
                [['text'=>"↗️ Forward (Hammaga)"]],
                [['text'=>"↗️ Xabar (Hammaga)"]],
                [['text'=>"↗️ Xabar (Userga)"]],
                [['text'=>"🔙 Orqaga"]],
            ]
        ])
    ]);
}

$xabar = file_get_contents("send.txt");
if($text == "↗️ Xabar (Hammaga)"){
if($cid == $admin){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"*Foydalanuvchilarga yuboriladigan xabar matnini kiriting! Bekor qilish uchun /cancel ni bosing!*",
'parse_mode'=>"markdown",
]); file_put_contents("send.txt","user");
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*<b>Bu bo‘limni faqat bot administratori ishlata oladi!</b>*",
'parse_mode'=>'Markdown',
]);
}
}
if($xabar=="user" and $cid==$admin){
if($text=="/cancel"){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"Bekor qilindi!",
'parse_mode'=>"html",
]); unlink("send.txt");
}else{
 $lich = file_get_contents("shekih.db");
$lichka = explode("\n",$lich);
foreach($lichka as $lichkalar){
$okuser=bot("sendmessage",[
'chat_id'=>$lichkalar,
'text'=>$text,
'parse_mode'=>'html'
]);
}
}
}
if($okuser){
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"Xabaringiz barcha bot foydalanuvchilariga yuborildi!",
'parse_mode'=>'html',
]); unlink("send.txt");
}

$lichka=file_get_contents("shekih.db");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("shekih.db","$lichka\n$cid");
}
}
//
if($text=="↗️ Forward (Hammaga)" and $cid==$admin){
    bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Xabaringizni Yozing. Men Uni Forward Qilib Hammaga yuboraman!!",
    ]);
    file_put_contents("step/$fid.txt","forward");
    }
    
    if($step=="forward" and $cid==$admin){
    $userlar = explode("\n",$lichka);
    foreach($userlar as $users){
    $xabarok=bot('ForwardMessage',[
    'chat_id'=>$users,
    'from_chat_id'=>$cid,
    'message_id'=>$mid,
    ]);
    }
    if($xabarok){
    bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Xabar yetkazildi",
    ]);
      file_put_contents("step/$fid.txt","");
    }
    }
//
if($text == "↗️ Xabar (Userga)"){
    if($cid == $admin){
    bot('sendMessage', [
    'chat_id'=>$admin,
    'text'=>"✔ Userga Xabar yuborish uchun
    /sms 🆔️ Xabar 
    shu tarzda yuboring!
    
    👨‍💻Admin: $adminuser",
    'reply_markup'=>$back,
    ]);
    }else{
    bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=> "*🤪😂 Bu funksiyani Faqat men @$userR ishlata olaman.*",
    'parse_mode'=>'Markdown',
    ]);
    }
    }
    if(mb_stripos($text,"/sms") !== false){
    if($cid == $admin){
    $ex = explode(" ",$text);
    $sms = str_replace("/sms $ex[1]","",$text);
    $ismi = $message->from->first_name;
    
    if(mb_stripos($ex[1],"@") !== false){
    $ssl = str_replace("@","",$ex[1]);
    $egasi = "t.me/$ssl";
    }else{
    $egasi = "tg://user?id=$ex[1]";
    $eegasi = "$ex[1]";
    }
    bot('sendmessage',[
    'chat_id'=>$ex[1],
    'text'=>"📨*Yangi Xabar*
    
    👤 [$ismi](tg://user?id=$uid)
    
    *📨 Xabar: $sms
    
    ❄ @$bot*",
    'parse_mode'=>"markdown", 
    ]);
    bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"👤[Foydalanuvchi]($egasi) ga Habaringiz Yuborildi📩",
    'parse_mode'=>"markdown", 
    'reply_markup'=>$panel
    ]);
    }else{
    bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=> "*🤪😂 Bu funksiyani Faqat men $adminuser ishlata olaman.*",
    'parse_mode'=>'Markdown',
    ]);
    }
    }
//
if($text=="🖇 Reklama O'chirish" and $cid==$admin){
    unlink("reklama/reklama.txt");
    bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Reklama o'chirildi",
    'reply_markup'=>$panel
    ]);
    }
    if($text=="🖇 Reklama Berish" and $cid==$admin){
    file_put_contents("step/$admin.txt","rek");
    bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Reklama matnini kiriting",
    'reply_markup'=>$panel,
    ]);
    }
    if($step=="rek"){
    file_put_contents("reklama/reklama.txt","$text");
    unlink("step/$admin.txt");
    bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Reklama Joylandi",
    'reply_markup'=>$panel,
    ]);
    }
//
$on = file_get_contents("on.txt");
if ($on == "off" && $cid = "$admin"){
bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"⚠️<b>@$botname dam olish rejimida iltimos bezovta qilmang.\n\nHozir tamirda.📛</b>",
        'parse_mode'=>'html',
]);
}
if($text == "❌ O'chirish" && $cid == $admin){
    file_put_contents("on.txt","off");
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"⚠️<b>Offline.</b>",
      'parse_mode'=>'html',
    ]);
    }
    //yoqish
    if($text == "✅ Yoqish" && $cid == $admin){
    file_put_contents("on.txt","on");
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"⚠️<b>Online</b>",
      'parse_mode'=>'html',
    ]);
    }
//
$rpl = json_encode([
    'resize_keyboard'=>false,
    'force_reply'=>true,
    'selective'=>true,
  ]);
  //blockdan olish
   if($type=="private"){
  if($text == "🔓 Blokdan olish" and $cid==$admin){
  bot('sendmessage', [
        'chat_id' =>$cid,
         'text' => "🚫Blockdan Olinadigan 🆔️ni Yozing!" ,
         'parse_mode'=>'markdown',  
         'reply_markup'=>$rpl,
         ]);
         }}
         if($reply == "🚫Blockdan Olinadigan 🆔️ni Yozing!"){  
  $fayl = file_get_contents("block.db");
  $fayl2 = "$text";
  $fayl3 = str_replace($fayl2," ",$fayl);
  file_put_contents("block.db","$fayl3");
  $fayl = file_get_contents("block.db");
  bot('sendmessage', [
        'chat_id' =>$cid,
         'text' => "[$text](tg://user?id=$text)  Bandan olindi" ,
         'parse_mode'=>'markdown', 
  'reply_markup'=>$panel,
        ]); 
        bot('sendmessage', [
        'chat_id' =>$sd,
         'text' => "🖐*Salom*  [$name](tg://user?id=$uid)  
  😊Sizga Xush Xabar Bor!
  Siz [👨‍💻Adminimiz](tg://user?id=$admin) Tomonidan Bandan Olindingiz!
  Endi Botni Ishlatishingiz mumkin ✅
  🔃Qayta /start Bosing!" ,
         'parse_mode'=>'markdown', 
         ]);
  }
  
  //Blocklash
  if($text=="🔒 Bloklash"){
  if($cid==$admin){
  bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>"Ban Qilinadigan 🆔ni Yuboring!",
  'reply_markup'=>$rpl,
  ]);
  }
  }
  if($reply=="Ban Qilinadigan 🆔ni Yuboring!"){
  file_put_contents("block.db","$blocks\n$text");
  bot('SendMessage',[
     'chat_id'=>$admin,
          'text'=>"✅[$text](tg://user?id=$text) *Banlandi!*", 
          'parse_mode'=>'markdown', 
  'reply_markup'=>$panel,
          ]);
          bot('SendMessage',[
     'chat_id'=>$text,
          'text'=>"<b>⚠️Sizni bu botda bloklashdi. 
  🚫Endi botimizdan foydalana olmaysiz!
  ❗ Agar bu anglashilmovchilik bo'lda admin bilan bog'laning</b>", 
          'parse_mode'=>'html', 
          'reply_markup'=>json_encode([
          'inline_keyboard'=>[
     [["text"=>'👨‍💻Asminstrator', 'url'=>"https://t.me/$adminuser"]],
  ]
  ]),
  ]);
  }
  
  
  $blocks=file_get_contents("block.db");
  if(mb_stripos($blocks,"$uid")!==false){
  bot('sendMessage', [
  'chat_id'=>$cid,
  'parse_mode'=>"html",
  'text'=>"<b>🖐Salom <a href='tg:user?id=$cid'>$name</a> 
  Siz  Botimizdan foydalana olmaysiz, chunki Bot sizni bloklangan!
  Blokdan chiqish uchun 👨‍💻Admin ga yozing! Blokdan chiqmaguncha bot siz uchun ishlamaydi!🚫</b> " ,
  'reply_markup'=>json_encode([
  'inline_keyboard'=>[
  [['text'=>"Admin👨‍💻", "url"=>"https://t.me/$adminuser"]],
  ]
  ])
  ]);return false;}
// kanal va admin
 

    //
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
//
if($text=="➕ Admin Qo'shish" and $cid==$admin){
    file_put_contents("step/$cid.txt","add");
    bot('sendMessage',[
    'chat_id'=>$admin, 
    'text'=>"<i>Marhamat Admin qilmochi bo`lgan id raqamni yuboring</i>", 
    'parse_mode'=>'HTML', 
    ]);
    } 
    
    if($text=="🗑 Admin O'chirish" and $cid==$admin){
    file_put_contents("minus/$cid.txt","remove");
    bot('sendMessage',[
    'chat_id'=>$admin, 
    'text'=>"<i>Marhamat Admindan olmoqchi bo`lgan id raqamni yuboring</i>", 
    'parse_mode'=>'HTML', 
    ]);
    } 
     
    $son = substr_count($admins,"\n");
    if($text=="📄 Admin Ro'yhati" and $cid==$admin){
    bot('sendMessage',[
    'chat_id'=>$admin, 
    'text'=>"<i>Bot adminlari idlari:\n\n $admins \n bot adminlari soni: $son ta.</i>", 
    'parse_mode'=>'HTML', 
    ]);
    }
    
    if($userstep=="add"){
    unlink("step/$cid.txt");
    file_put_contents("admins.txt","\n".$text,FILE_APPEND);
    bot('sendMessage',[
    'chat_id'=>$cid, 
    'text'=>"<a href='tg://user?id=$text'>$text</a><i>botga Adminstrator qilib tayinandi.</i>", 
    'parse_mode'=>'HTML', 
    ]);
    bot('sendMessage',[
    'chat_id'=>$text, 
    'text'=>"_Tabriklaymiz siz ushbu botga adminstrator qilib tayinlandingiz_
    Sizning admin panelingiz /admin ", 
    'parse_mode'=>'markdown', 
    ]);
    } 
    
    if($step1=="remove"){
    unlink("minus/$cid.txt");
    $str = str_replace("$text","",$admins);
    file_put_contents("admins.txt","$str");
    bot('sendMessage',[
    'chat_id'=>$cid, 
    'text'=>"<a href='tg://user?id=$text'>$text</a><i> botda Adminstratorlikdan olib tashlandi</i>", 
    'parse_mode'=>'HTML', 
    ]);
    bot('sendMessage',[
    'chat_id'=>$text, 
    'text'=>"*Salom siz botmizda adminstratorlikdan olib tashlandingiz*", 
    'parse_mode'=>'markdown', 
    ]);
    } 

//statistika
if($text == "📊 Sitatistika"){
if($cid == $admin){
$lichka=file_get_contents("shekih.db");
$lich=substr_count($lichka,"\n");
$time=date('H:i:s',strtotime('3 hour'));

bot('sendmessage',[
'chat_id'=>$cid,
    'text'=> "<b>Bot statatistikasi:</b>    
├▶A'zolar: <b>$lich</b>",
'parse_mode'=>'html',
]);
}
}

//pul berish
if(mb_stripos($tx, "💸 Pul berish")!==false){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=> "<b>✅Pul ayrish Uchun Quyidagi Buyruqni bajaring!
Bir qator pastga tushib id raqamni yozing, yana bir qator pastga tushib olmosni yozing!
Masalan:</b>
<code>/plus
$admin
1000</code>",
'parse_mode' => 'html',
'reply_markup'=>$back4_menu,
]);
}elseif(mb_stripos($tx, "/plus")!==false){
if($cid == $admin){
$id = explode("\n", $tx);
$id1 = $id[1]; $id2 = $id[2];
$olmos = file_get_contents("referal/$id1.txt");
$miqdor = $olmos+$id2;
file_put_contents("referal/$id1.txt","$miqdor");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=> "<b>🛠 Hisobi to'ldirildi.
🆔 Id raqami : $id1
💳 To'ldirildi : $id2 olmos</b>",
'parse_mode' => 'html',
'reply_markup'=>$panel,
]);
bot("sendmessage",[
'chat_id'=>$id1,
'text'=> "*🛠 Hisobingiz $id2 olmos ga to'ldirildi.*",
'parse_mode'=>'Markdown',
]);
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "<b>Bu bo‘limni faqat bot administratori ishlata oladi!</b>",
'parse_mode'=>'Markdown',
]);
}
}

//pul ayirish
if($text == "💸 Pul ayirish"){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=> "<b>✅Pul ayrish Uchun Quyidagi Buyruqni bajaring!
Bir qator pasga tushib id raqamni yozing, yana bur qator tushib pulni yozing!
Masalan:</b>
<code>/minus
$admin
1000</code>",
'parse_mode' => 'html',
'reply_markup'=>$back4_menu,
]);
}elseif(mb_stripos($text, "/minus")!==false){
if($cid == $admin){
$id = explode("\n", $tx);
$id1 = $id[1]; $id2 = $id[2];
$olmos = file_get_contents("referal/$id1.txt");
$miqdor = $olmos-$id2;
file_put_contents("referal/$id1.txt","$miqdor");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=> "<b>🛠 Hisobdan yechib olindi.
🆔 Id raqami : $id1
💳 Yechildi : $id2 olmos</b>",
'parse_mode' => 'html',
'reply_markup'=>$panel,
]);
bot("sendmessage",[
'chat_id'=>$id1,
'text'=> "*🛠 Hisobingizdan $id2 olmos ayirdi.*",
'parse_mode'=>'Markdown',
]);
}else{
	bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*🤪😂 Bu funksiyani Faqat men $adminuser ishlata olaman.*",
'parse_mode'=>'Markdown',
]);
}
}

//bot kodi
if($tx == "📂 Skript" and $cid == $admin){
bot('sendDocument',[
'chat_id'=>$admin,
'document'=>new CURLFile(__FILE__),
'caption'=>"$botname kodi",
]);
}



if($tx == "📋 Ma'lumotlar"){
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"💡 <b>@$bot jamoasi:</b>
	
<i>Telegram tarmog‘idagi eng yangi loyiha 
@$bot siz bu bot orqali php dasturlash tillarini bilmasdan turib ham bot yaratish imkoniyatiga egasiz!</i>

⚙<b> Tizim versiyasi: v1.2.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📚 Qo'llanma",'callback_data'=>"noma"],['text'=>"⚠️ Qoidalar",'callback_data'=>"qoida"]],
]
])
]);
}

if($data == "malumot"){
	bot('editMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"💡 <b>@$bot jamoasi:</b>
	
<i>Telegram tarmog‘idagi eng yangi loyiha 
@$bot siz bu bot orqali php dasturlash tillarini bilmasdan turib ham bot yaratish imkoniyatiga egasiz!</i>

⚙<b>Tizim versiyasi: v0.8.0</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"📚 Qo'llanma",'callback_data'=>"noma"],['text'=>"⚠️ Qoidalar",'callback_data'=>"qoida"]],
]
])
]);
}


if($data=="noma"){
bot('editMessageText',[
'chat_id'=>$ccid,
'message_id'=>$cmid,
'text'=>"🤖 <b>Bot yaratish qo'llanmasi!

1. Telegram dasturingizdan @BotFather deb qidiring va START tugmasini bosing!

2. @BotFather ga /newbot buyrug'ini yozing.

3. Yaratmoqchi bo'lgan botingiz NOMINI yozing.

4. Botingiz BOTNAMEsini yozing (botname oxiri  bot  yoki robot bilan tugashi kerak).

5. Agar amallarni to'g'ri bajargan bo'lsangiz sizga @BotFather botingiz Tokenini yuboradi uni saqlab qo'ying!

6. Bot yaratayotganingizda botimiz Token so'raganida @BotFather yuborgan tokeni yuborasiz.

➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖

❗ESLATMA: </b>

⚠️<i>Qoidalarga rioya qilmagan foydalanuvchi botdan blocklarnishi mumkin.

🛠 Dasturchi: <a href='tg://user?id=$admin'>Quvondiqov Doston</a></i>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"◀️Ortga",'callback_data'=>"malumot"]],
]
])
]);
}

if($data == "qoida"){
	bot('EditMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"<b>⚠️ Qoidalar:</b>\n\n<i>1. Ushbu robot maker bot adminstratorlari va bot  dasturchisi foydalanuvchilardan quydagilarni o'z zimmasiga olmasligi haqida sizga eslatib o'tadi:\n1.1 ushbu botdan foydalangan holda ochilgan barcha botlar sizga pul to'lashi yoki to'lamasligj bu bizga bog'liq emas va biz sizga pul to'lamaymiz!\n1.2 agar sizga ushbu botlar server orqali pul to'laydi deyishsa ishonmang yoki o'zingizda shunday xayol bo'lsa buni uniting chunki bu aqilsiz gap!\n🛠 Dasturchi: <a href='tg://user?id=$admin'>Quvondiqov Doston</a></i>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️Ortga",'callback_data'=>"malumot"]],
]
])
]);
}

//FREEBOTS
if($tx == "😊Smile Games" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @VipBuilder_UzBot -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","smile&token");
}

if($userstep == "smile&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"⚔️Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bepul/smile.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/smile");
    if(file_get_contents("user/$fid/smile/smile.php")){
        unlink("user/$fid/smile/smile.php");
    }
    file_put_contents("user/$fid/smile/smile.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/Maxsus/user/$fid/smile/smile.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: smile games bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        $getssss = file_get_contents("stat/stat.txt");
        $getssss += 1;
        file_put_contents("stat/stat.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
    }

    unlink("step/$fid.txt");
   }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Menimcha siz tokenni yuborishda xatolikk yo'l qo'ydingiz!\nToken to'g'riligiga ishonch hosil qilib, qayta yuboring!",
        'parse_mode'=>"html"
        ]);
   }
}


?>