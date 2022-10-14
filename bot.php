<?php

define('API_KEY',"5666079820:AAHhpQ_BEu5Z4HqorwLfR1WZuja_jUIBRds"); 

$admin = "5012555808";


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

function joinchat($chatid){
    global $name, $cmid;
    $result = bot('getChatMember',[
    'chat_id'=>"-1001671977181",
    'user_id'=>$chatid
    ])->result->status;
    if($result == "creator" or $result == "administrator" or $result == "member"){
        return true;
    } else {
        bot('deleteMessage',[
        'chat_id'=>"-1001555853739",        'message_id'=>$cmid
        ]); 
        bot('sendMessage',[
        'chat_id'=>$chatid,
        'text'=>"❌Kechirasiz $name siz bizning kanalimizga a'zo bo'lmasangiz botdan foydalana olmaysiz!
         A'zo bo'lib tekshirish tugmasini bosing!",
        'parse_mode'=>"html",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [['text'=>"➕ A'zo bo'lish",'url'=>"https://t.me/uz_foydali_kanal_uz"]],
        [['text'=>"➕ A'zo bo'lish",'url'=>"https://t.me/Tgraph_uz_news"]],
        [['text'=>"✅ Tekshirish",'callback_data'=>"tekshir"]]
        ]
        ])
        ]);
        return false;
    }
}

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

$reply = $message->reply_to_message->text;
$nomer = $message->contact->phone_number;

$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
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
$cname = $calback->message->from->first_name;
$ccid = $callback->message->chat->id;
$cmid = $callback->message->message_id;
$cfid = $callback->message->from->id;
$user = $message->from->username;
$botname = bot('getme',['Uz_Makerbot'])->result->username; // @ belgisiz yozing
$inlinequery = $update->inline_query;
$inline_id = $inlinequery->id;
$inlineid = $inlinequery->from->id;
$inline_query = $inlinequery->query;
$adminuser = "@DJ_mux";
$time=date('H:i',strtotime('5 hour'));
$soat = date("H:i",strtotime("5 hour"));
$sana = date('d.m.Y',strtotime("5 hour"));
$user = file_get_contents("Unknown_Blogger.ids");
$guruh = file_get_contents("pul/guruh.db");
$blocklar = file_get_contents("block.dat");
mkdir("referal");
mkdir("stat");
mkdir("step");
mkdir("user");
mkdir("prouser");
mkdir("user/$fid");
mkdir("prouser/$fid");
mkdir("ban");
mkdir("bonus");
mkdir("pul");
mkdir("odam");
$son = file_get_contents("pul/$chat_id/$uid.db");
$chan = file_get_contents("pul/$chat_id.db");
$vaqt = date("d",strtotime("5 hour"));
if(!file_exists("referal/$fid.txt")){  
    file_put_contents("referal/$fid.txt","0");
}

if(file_get_contents("stat/stat.txt")){
} else{
file_put_contents("stat/stat.txt", "0");
}

$referalsum = file_get_contents("referal/$fid.txt");
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
    [['text'=>"📂 Skript"]],
    [['text'=>"❌ OFF"],['text'=>"✅ ON"]],
    [['text'=>"🔒 Bloklash"],['text'=>"🔓 Blokdan olish"]],
    [['text'=>"↗️ Xabar yuborish"],['text'=>"📋 Userga Xabar"]],
    [['text'=>"📊 Statistika"]],
    [['text'=>"🎫 Promokod yaratish"],['text'=>"🔙Ortga qaytish"]],
    ]
    ]);

$main_menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
          [['text'=>"🛠Botlarni boshqarish"],['text'=>"📱Kabinet"]],
          [['text'=>"💸 Pul ishlash"]],
[['text'=>"❓ Yordam"],['text'=>"📊 Statistika"]],
[['text'=>"📨 Bog‘lanish"],['text'=>"📦 Kunlik bonus"]],
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
[['text'=>"🆓️ Bepul bot"],['text'=>"💵 Pullik bot"]],
[['text'=>"🔥Yangi botlar"]],
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
    [['text'=>"➕ Bot qo'shish"]],
    [['text'=>"⚙️ Botni sozlash"]],
    [['text'=>"🔙Ortga qaytish"]],
    ]
    ]);
    
  $bots_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
     [['text'=>"👮‍♂️ Posbon bot"],['text'=>"❤️ Channel like"]],
    [['text'=>"🕋Quron bot"],['text'=>"⚡Webhook bot"]],
    [['text'=>"📽️Gif bot"],['text'=>"💰 Pul bot (som)"]],
    [['text'=>"🖼️Logo bot"],['text'=>"👨‍👨‍👧‍👦Go'zalik test bot"]],
    [['text'=>"🔙 Orqaga"]],
    ]
    ]);

$pro_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"🔐Zip Bot"],['text'=>"🎊Yandex bot"]],
    [['text'=>"💰Pul bot (rubl)"],['text'=>"💰Pul bot (so'm)"]],
    [['text'=>"📦Uc bot"],['text'=>"🇺🇸Usa bot"]],
    [['text'=>"📦BC bot"],['text'=>"📦MB bot"]],
    [['text'=>"🔙 Orqaga"]],
    ]
    ]);
$yangi_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"💰Pul bot (rubl) 4-Chanel"],['text'=>"💰Pul bot (so'm) 4-Chanel"]],
   [['text'=>"💫Nik Bot v.03"],['text'=>"💰Pul bot (rubl) 5-Chanel ❌❌❌"]],
[['text'=>"◀️Orqaga"]],
    ]
    ]);



$sozlash_menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
      [['text'=>"📋 Mening botim"],['text'=>"🗑️ Botni o'chirish"]],
      [['text'=>"⬅️Orqaga"]],
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
           [['text'=>"🔙 Orqaga"]],
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
          'chat_id'=>-"1001671977181",
          'text'=>"😄 Yangi aʼzo\n👤 Ismi: $name\n🆔 raqami: $fid\n✳️ Usernamesi: @$user\n💡 Lichka: <a href='tg://user?id=$fid'>$name</a>",
 'parse_mode'=>'html',
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/UZ_MAKERBOT"]],
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
     [['text'=>"➕ Botga kirish",'url'=>"https://t.me/UZ_MAKERBOT?start=$inlineid"]]
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


if($data == "tekshir"){
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

if($tx == "🔙 Orqaga" and joinchat($fid)=="true"){
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
    'reply_markup'=>$bots_menu
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
'reply_markup'=>$bots_menu
]);
}

if($tx == "💵 Pullik bot"){
bot('sendMessage',[
'chat_id'=>$cid,
   'text'=>"<b>📋 Quyidagilardan birini tanlang:</b>",
    'parse_mode'=>'html',
'reply_markup'=>$pro_menu
]);	
}
if($tx=="🔥Yangi botlar"){
	bot('sendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>📋 🏗 Demak siz bot yaratmoqchisiz!</b>

🔰 Bu botlarni yaratib siz quyidagilarga ega bo'lasiz 👇

• Qulay admin panel
• Botni sozlash /panel (o'zingizga moslab olasiz)
• A'zolarga sifatli xabar yuborish

<b>👇 Qanday turdagi bot yaratmoqchisiz bot turini tanlang:</b>",
    'parse_mode'=>'html',
	'reply_markup'=>$yangi_menu,
]);
}

if($tx == "⚙️ Botni sozlash" and joinchat($fid)=="true"){
$get = file_get_contents("stat/botlarim/$cid.bot");
if($get == ""){
bot("sendMessage",[
'chat_id'=>$fid,
'parse_mode'=>'html',
'text'=>"<b>Sizda hechqanday bot mavjud emas.</b>",
    ]);
}else{
file_get_contents("stat/botlarim/$fid.bot");
bot("sendMessage",[
'chat_id'=>$fid,
'parse_mode'=>'html',
'text'=>"<i><b>📂 Sizda bot mavjud.</b>

Botingiz: @$get

📁 <b>Tugmalar orqali botingizni sozlang, yoki o‘chiring.</b></i>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"🗑 O‘chirish",'callback_data'=>"delbot"],['text'=>"⚙ Sozlash",'callback_data'=>"nop"]],
    ]
    ])
    ]);
}
}

if($data == "delbot" and joinchat($ccid)=="true"){
    bot('editMessageText',[
    'chat_id'=>$ccid,
    'message_id'=>$cmid,
    'text'=>"<i>✅ Siz rostan ham botingizni o‘chirmoqchi bo‘lsangiz <b>Tasdiqlash</b> tugmasini bosing.

❌ Agar fikringizni o‘zgartirsangiz <b>Bekor qilish</b> tugmasini bosing.</i>",
    'parse_mode'=>"html",
    'reply_markup'=>$tandel
    ]);
}

if($data == "dell" and joinchat($ccid)=="true"){
    bot('editMessageText',[
    'chat_id'=>$ccid,
    'message_id'=>$cmid,
    'text'=>"<b>🗑 Botingiz o‘chirildi.</b>",
    'parse_mode'=>"html",
    ]);
unlink("botlarim/$ccid.txt"); 
unlink("user/$ccid/rublbot/rublbot.php"); 
unlink("user/$ccid/usabot/usabot.php"); 
unlink("prouse/$ccid/rublbot/rublbot.php"); 
unlink("prouse/$ccid/ucbot/ucbot.php"); 
unlink("prouse/$ccid/pulbot/pulbot.php"); 
unlink("prouse/$ccid/mbbot/mbbot.php"); 
    }

if($data == "no" and joinchat($ccid)=="true"){
    bot('editMessageText',[
    'chat_id'=>$ccid,
    'message_id'=>$cmid,
    'text'=>"<b>🚫 Siz o‘chirishni bekor qildingiz!</b>",
    'parse_mode'=>"html",
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
[['text'=>"💠 Click ",'callback_data'=>"qiwi"],['text'=>"🔥 Paynet",'callback_data'=>"paynet"]],
// [['text'=>"🥝 Qiwi",'callback_data'=>"click"]],
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
[['text'=>"💠 Click",'callback_data'=>"qiwi"],['text'=>"🔥 Paynet",'callback_data'=>"paynet"]],
// [['text'=>"🥝 Qiwi",'callback_data'=>"click"]],
]
])
]);
}


if($data == "qiwi"){
	bot('editMessageText',[
	'chat_id'=>$ccid,
	'message_id'=>$cmid,
	'text'=>"📋 To'lov tizimi: Click
💡 Avto to'lov holati: OFF

💳 8802001227805399
📝 Izoh: $ccid

Qo'shimcha: Diqqat! izoh kiritishni unutsangiz yoki noto'g'ri kiritsangiz hisobingizga pul tushmaydi! Bu kabi holatlarda, biz bilan bog'lanishingiz mumkin.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☎️ Tex. Yordam",'url'=>"https://t.me/DJ_mux"]],
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
💡 Avto to'lov holati: OFF

💳 +998995097006
📝 Izoh: $ccid
📊 B. V. Kursi: 155

Qo'shimcha: To'lovni amalga oshirgach biz bilan bog'laning.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☎️ Tex. Yordam",'url'=>"https://t.me/DJ_mux"]],
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

💳 Hamyon ( yoki karta ): Admin
📝 Izoh: $ccid

Qo'shimcha: Diqqat! izoh kiritishni unutsangiz yoki noto'g'ri kiritsangiz hisobingizga pul tushmaydi! Bu kabi holatlarda, biz bilan bog'lanishingiz mumkin.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"☎️ Tex. Yordam",'url'=>"https://t.me/DJ_mux"]],
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
// [['text'=>"🥝 Qiwi",'callback_data'=>"click"]],
]
])
]);
}

############# Free Bots #############
#############
if($tx == "📽️Gif bot" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","gifbot&token");
}

if($userstep == "gifbot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
    $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id; 
    $kod = file_get_contents("bots/gif.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
    $kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/gif");
    if(file_get_contents("user/$fid/gif/gif.php")){
        $files = glob("user/$fid/gif/channel/*");
        foreach ($files as $value) {
            unlink($value);
        }
        rmdir("user/$fid/gif/channel");
    }
    file_put_contents("user/$fid/gif/gif.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/gif/gif.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Gif bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Gif bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $getssss = file_get_contents("stat/stat.txt");
        $getssss += 1;
        file_put_contents("stat/stat.txt", $getssss);
    }else{        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]); 
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html"
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

if($tx == "🖼️Logo bot" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","logo&token");
}

if($userstep == "logo&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
    $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id; 
    $kod = file_get_contents("bots/logo.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/logo");
    if(file_get_contents("user/$fid/logo/logo.php")){
        $files = glob("user/$fid/logo/channel/*");
        foreach ($files as $value) {
            unlink($value);
        }
        rmdir("user/$fid/logo/channel");
    }
    file_put_contents("user/$fid/logo/logo.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/logo/logo.php"))->result;

    if($get){
         $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Logo bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Logo bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $getssss = file_get_contents("stat/stat.txt");
        $getssss += 1;
        file_put_contents("stat/stat.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]); 
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html"
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
//--
//---------
if($tx == "👮‍♂️ Posbon bot"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","posbon&token");
}

if($userstep == "posbon&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
    $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id; 
    $kod = file_get_contents("bots/posbon.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/posbon");
    if(file_get_contents("user/$fid/posbon/posbon.php")){
        $files = glob("user/$fid/posbon/warn/*");
        foreach ($files as $value) {
            $file = glob("$value/*");
            foreach ($file as $key) {
                unlink($key);
            }
            rmdir($value);
        }
        rmdir("user/$fid/posbon/warn");

        $files2 = glob("user/$fid/posbon/new/*");
        foreach ($files2 as $value2) {
            $file2 = glob("$value2/*");
            foreach ($file2 as $key2) {
                unlink($key2);
            }
            rmdir($value2);
        }
        rmdir("user/$fid/posbon/new");

        $files3 = glob("user/$fid/posbon/channel/*");
        foreach ($files3 as $value3) {
            unlink($value3);
        }
        rmdir("user/$fid/posbon/channel");

        $files4 = glob("user/$fid/posbon/sozlama/*");
        foreach ($files4 as $value4) {
            unlink($value4);
        }
        rmdir("user/$fid/posbon/sozlama");

        $files5 = glob("user/$fid/posbon/stat/*");
        foreach ($files5 as $value5) {
            unlink($value5);
        }
        rmdir("user/$fid/posbon/stat");

        
    }
    file_put_contents("user/$fid/posbon/posbon.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/posbon/posbon.php"))->result;

    if($get){
         $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Posbon bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Posbon bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $getssss = file_get_contents("stat/stat.txt");
        $getssss += 1;
        file_put_contents("stat/stat.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]); 
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html"
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

###

//---------
if($tx == "❤️ Channel like"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","channel&token");
}

if($userstep == "channel&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
    $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id; 
    $kod = file_get_contents("bots/like.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/like");
    if(file_get_contents("user/$fid/like/like.php")){
        $files = glob("user/$fid/like/like/*");
        foreach ($files as $value) {
            unlink($value);
        }
        rmdir("user/$fid/like/like");
        $files = glob("user/$fid/like/baza/*");
        foreach ($files as $value) {
            unlink($value);
        }
        rmdir("user/$fid/like/baza");
    }
    file_put_contents("user/$fid/like/like.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/like/like.php"))->result;

    if($get==true){
         $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Channel like bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Like bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $getssss = file_get_contents("stat/stat.txt");
        $getssss += 1;
        file_put_contents("stat/stat.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]); 
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html"
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

#######
if($tx == "⚡Webhook bot" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","webbot&token");
}

if($userstep == "webbot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"⚔️Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/web.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/web");
    if(file_get_contents("user/$fid/web/web.php")){
        unlink("user/$fid/web/web.php");
    }
    file_put_contents("user/$fid/web/web.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/web/web.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Webhook bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Webhook bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
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

if($tx == "👨‍👨‍👧‍👦Go'zalik test bot" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","testbot&token");
}

if($userstep == "testbot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"⚔️Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/test.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/test");
    if(file_get_contents("user/$fid/test/test.php")){
        unlink("user/$fid/test/test.php");
    }
    file_put_contents("user/$fid/test/test.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/test/test.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Go'zalik test bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Go'zallik testi bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
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

if($tx == "🕋Quron bot" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","quronbot&token");
}

if($userstep == "quronbot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"⚔️Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/quron.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
    $kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/quron");
    if(file_get_contents("user/$fid/quron/quron.php")){
        unlink("user/$fid/quron/quron.php");
    }
    file_put_contents("user/$fid/quron/quron.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/quron/quron.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Quron bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Quron bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
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

if($tx == "💰 Pul bot (som)" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$kar_menu
    ]);
    file_put_contents("step/$fid.txt","pulsom&token");
}

if($userstep == "pulsom&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"⚔️Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pulsom.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
    $kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("user/$fid/pulsom");
    if(file_get_contents("user/$fid/pulsom/pulsom.php")){
        unlink("user/$fid/pulsom/pulsom.php");
    }
    file_put_contents("user/$fid/pulsom/pulsom.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/user/$fid/pulsom/pulsom.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Pul bot (som)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel orqali botingizni sozlang!",
        'parse_mode'=>"html",
        'reply_markup'=>$kar_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Pul bot (sum)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
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

############# PRO_BOTS #############
//--------------------------------------
if($tx == "➕Nakrutka bot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 80){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Nakrutka bot yaratish uchun 80 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","nakrutka&token");
    }
}

if($userstep == "nakrutka&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"🛠️Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/nak.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/nak");
    if(file_get_contents("prouser/$fid/nak/nak.php")){
        unlink("prouser/$fid/nak/nak.php");
        unlink("prouser/$fid/nak/usid.txt");
        unlink("prouser/$fid/nak/grid.txt");
        $files = glob("prouser/$fid/nak/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/nak/baza");
    }
    file_put_contents("prouser/$fid/nak/nak.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/nak/nak.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Nakrutka pro\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Nakrutka (pro) bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 80;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
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

if($tx == "🎊Yandex bot"){
 $get = file_get_contents("referal/$fid.txt");
 if($get < 100){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🎊Yandex bot yaratish uchun 100 ta Olmos kerak. Nega endi 100 ta Olmos? Sababi siz bizga sodiqligingizni tekshirish va botda faol ekanligingizni bilish uchun Quyidagi havolani do'stlaringizga tarqatib Olmos yig'ing:\n<code>https://t.me/$botname?start=$callfrid</code>\n\nEslatib o'tamiz har bir do'stingiz botga azo bo'lsa  sizga <b>5</b> ta Olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki @$adminuser ga murojaat qilib olmos oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    
    ]
    ])
    ]);
 }else{
 bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$back_menu
    ]);
    file_put_contents("step/$fid.txt","yandexbot&token");
    }
}

if($userstep == "yandexbot&token" and $tx !== "◀️Orqaga" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/yandex.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/yandexbot");
    if(file_get_contents("prouser/$fid/yandexbot/yandexbot.php")){
        unlink("prouser/$fid/yandexbot/strtotime.php");
        unlink("prouser/$fid/yandexbot/usid.txt");
        unlink("prouser/$fid/yandexbot/grid.txt");
        $files = glob("prouser/$fid/yandexbot/baza/*");
        foreach ($files as $key) {
         unlink($key);
        }
        rmdir("prouser/$fid/yandexbot/baza");
    }
    file_put_contents("prouser/$fid/yandexbot/yandexbot.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/yandexbot/yandexbot.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Yandex bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Yandex bot(pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 100;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
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

if($tx == "🔐Zip Bot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 90){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"🔐Zip Bot yaratish uchun 90 ta Olmos kerak. Nega endi 90 ta Olmos? Sababi siz bizga sodiqligingizni tekshirish va botda faol ekanligingizni bilish uchun Quyidagi havolani do'stlaringizga tarqatib Olmos yig'ing:\n<code>https://t.me/$botname?start=$callfrid</code>\n\nEslatib o'tamiz har bir do'stingiz botga azo bo'lsa  sizga <b>5</b> Olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga Olmos berilmaydi!\nYoki @$adminuser ga murojaat qilib olmos oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @$mebot -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$back_menu
    ]);
    file_put_contents("step/$fid.txt","filebot&token");
    }
}

if($userstep == "filebot&token" and $tx !== "◀️Orqaga" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/file.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/filebot");
    if(file_get_contents("prouser/$fid/filebot/filebot.php")){
        unlink("prouser/$fid/filebot/strtotime.php");
        unlink("prouser/$fid/filebot/usid.txt");
        unlink("prouser/$fid/filebot/grid.txt");
        $files = glob("prouser/$fid/filebot/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/filebot/baza");
    }
    file_put_contents("prouser/$fid/filebot/filebot.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/filebot/filebot.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi:🔐Zip Bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n admin panel mavjud emas",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: 🔐Zip bot (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 90;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
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

if($tx == "aloqabot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 50){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"aloqa bot yaratish uchun 50 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","support&token");
    }
}

if($userstep == "support&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/support.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/support");
    if(file_get_contents("prouser/$fid/support/support.php")){
        unlink("prouser/$fid/support/support.php");
        unlink("prouser/$fid/support/usid.txt");
        unlink("prouser/$fid/support/grid.txt");
        $files = glob("prouser/$fid/support/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/support/baza");
    }
    file_put_contents("prouser/$fid/support/support.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/support/support.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Pul bot (support) pro\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 50;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
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


///////////////////
if($tx == "💰Pul bot (rubl)"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 50){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Pul bot (rubl) bot yaratish uchun 50 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @$mebot -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$back_menu
    ]);
    file_put_contents("step/$fid.txt","rubl&token");
    }
}

if($userstep == "rubl&token" and $tx !== "◀️Orqaga" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/rublpro.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/rubl");
    if(file_get_contents("prouser/$fid/rubl/rubl.php")){
        unlink("prouser/$fid/rubl/rubl.php");
        unlink("prouser/$fid/rubl/usid.txt");
        unlink("prouser/$fid/rubl/grid.txt");
        $files = glob("prouser/$fid/rubl/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/rubl/baza");
    }
    file_put_contents("prouser/$fid/rubl/rubl.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/rubl/rubl.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Pul bot (rubl) pro\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
        ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 50;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
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


////////////////

if($tx == "💰Pul bot (so'm)"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 50){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Pul bot (som) bot yaratish uchun 50 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","sombot&token");
    }
}

if($userstep == "sombot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/som.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/som");
    if(file_get_contents("prouser/$fid/som/som.php")){
        unlink("prouser/$fid/som/strtotime.php");
        unlink("prouser/$fid/som/usid.txt");
        unlink("prouser/$fid/som/grid.txt");
        $files = glob("prouser/$fid/som/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/som/baza");
    }
    file_put_contents("prouser/$fid/som/som.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/som/som.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Pul bot (so'm) pro\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Pul bot(so'm) (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 50;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
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
if($tx == "📦Uc bot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 60){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Uc bot yaratish uchun 60 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","ucpro&token");
    }
}

if($userstep == "ucpro&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/ucbot.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/ucbot");
    if(file_get_contents("prouser/$fid/ucbot/ucbot.php")){
        unlink("prouser/$fid/ucbot/strtotime.php");
        unlink("prouser/$fid/ucbot/usid.txt");
        unlink("prouser/$fid/ucbot/grid.txt");
        $files = glob("prouser/$fid/ucbot/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/ucbot/baza");
    }
    file_put_contents("prouser/$fid/ucbot/ucbot.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/ucbot/ucbot.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Uc bot pro\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: UC bot (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 60;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
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

if($tx == "📦BC bot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 65){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"BC bot yaratish uchun 65ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","bcbot&token");
    }
}

if($userstep == "bcbot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
    $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id; 
    $kod = file_get_contents("bots/pro/bcbot.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/bcbot");
    if(file_get_contents("prouser/$fid/bcbot/bcbot.php")){
    	unlink("prouser/$fid/bcbot/bcbot.php");
    	unlink("prouser/$fid/bcbot/usid.txt");
    	unlink("prouser/$fid/bcbot/grid.txt");    	
        $files = glob("prouser/$fid/bcbot/channel/*");
        foreach ($files as $value) {
            unlink($value);
        }
        rmdir("prouser/$fid/bcbot/channel");
    }
    file_put_contents("prouser/$fid/bcbot/bcbot.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/bcbot/bcbot.php"))->result;

    if($get){
         $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: BC bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: BC bot (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 65;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]); 
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html"
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

if($tx == "📦MB bot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 70){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Mb bot yaratish uchun 70 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","mbbot&token");
    }
}

if($userstep == "mbbot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
    $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id; 
    $kod = file_get_contents("bots/pro/mbbot.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/mbbot");
    if(file_get_contents("prouser/$fid/mbbot/mbbot.php")){
    	unlink("prouser/$fid/mbbot/mbbot.php");
    	unlink("prouser/$fid/mbbot/usid.txt");
    	unlink("prouser/$fid/mbbot/grid.txt");    	
        $files = glob("prouser/$fid/mbbot/channel/*");
        foreach ($files as $value) {
            unlink($value);
        }
        rmdir("prouser/$fid/mbbot/channel");
    }
    file_put_contents("prouser/$fid/mbbot/mbbot.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/mbbot/mbbot.php"))->result;

    if($get){
         $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
       file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: MB bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: MB bot (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 70;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]); 
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html"
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

if($tx == "🇺🇸Usa bot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 55){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Usa bot yaratish uchun 55ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","usabot&token");
    }
}

if($userstep == "usabot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/usa.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/usa");
    if(file_get_contents("prouser/$fid/usa/usa.php")){
        unlink("prouser/$fid/usa/usa.php");
        unlink("prouser/$fid/usa/usid.txt");
        unlink("prouser/$fid/usa/grid.txt");
        $files = glob("prouser/$fid/usa/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/usa/baza");
    }
    file_put_contents("prouser/$fid/usa/usa.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/usa/usa.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        file_put_contents("stat/botlarim/$cid.bot", $user);
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Usa bot  pro\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Usa bot (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 55;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
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


if($tx == "🕋Islomiy bot"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 100){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Islomiy bot yaratish uchun 100 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @UZ_MAKERBOT -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$ka_menu
    ]);
    file_put_contents("step/$fid.txt","islombot&token");
    }
}

if($userstep == "islombot&token" and $tx !== "⬅️ Bekor qilish" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/islom.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
    $kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/nakrutka");
    if(file_get_contents("prouser/$fid/islom/islom.php")){
        unlink("prouser/$fid/islom/islom.php");
        unlink("prouser/$fid/islom/usid.txt");
        unlink("prouser/$fid/islom/grid.txt");
        $files = glob("prouser/$fid/islom/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/islom/baza");
    }
    file_put_contents("prouser/$fid/islom/islom.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/islom/islom.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: Islomiy bot \n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: Islomiy bot (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 100;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$ka_menu
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



///

if($tx == "💰Pul bot (so'm) 4-Chanel"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 7000){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💰Pul bot (so'm) 4-Chanel bot yaratish uchun 7000 So'm kerak. Quyidagi havolani do'stlaringizga tarqatib So'm yig'ing:\n<code>https://t.me/$botname?start=$callfrid</code>\n\nEslatib o'tamiz har bir do'stingiz botga azo bo'lsa  sizga <b>2000</b>So'm beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga pul berilmaydi!\nYoki @$adminuser ga murojaat qilib pul oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @$mebot -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$back_menu
    ]);
    file_put_contents("step/$fid.txt","pulsum&token");
    }
}

if($userstep == "pulsum&token" and $tx !== "◀️Orqaga" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/pulsom.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/pulsum");
    if(file_get_contents("prouser/$fid/pulsum/pulsum.php")){
        unlink("prouser/$fid/pulsum/strtotime.php");
        unlink("prouser/$fid/pulsum/usid.txt");
        unlink("prouser/$fid/pulsum/grid.txt");
        $files = glob("prouser/$fid/pulsum/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/pulsum/baza");
    }
    file_put_contents("prouser/$fid/pulsum/pulsum.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/pulsum/pulsum.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: 💰Pul bot (so'm) 4-Chanel\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
        ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 7000;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
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

if($tx == "💫Nik Bot v.03"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 30){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💫Nik Bot v.03 bot yaratish uchun 30 ta olmos kerak. Quyidagi havolani do'stlaringizga tarqatib olmos yig'ing:\n<code>https://t.me/$botname?start=$cid</code>\n\nEslatib o'tamiz har bir do'stingiz sizga <b>5</b> ta olmos beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga olmos berilmaydi!\nYoki $adminuser'ga murojaat qilib olmos sotib oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
      [['text'=>"Referalni tarqatish",'switch_inline_query'=>"$fid"],['text'=>"💳Hisobni to'ldirish",'callback_data'=>"toldir"]],
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @$mebot -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$back_menu
    ]);
    file_put_contents("step/$fid.txt","udarnickbot&token");
    }
}

if($userstep == "udarnickbot&token" and $tx !== "◀️Orqaga" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/udarnick.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/udarnickbot");
    if(file_get_contents("prouser/$fid/udarnickbot/udarnickbot.php")){
        unlink("prouser/$fid/udarnickbot/strtotime.php");
        unlink("prouser/$fid/udarnickbot/usid.txt");
        unlink("prouser/$fid/udarnickbot/grid.txt");
        $files = glob("prouser/$fid/udarnickbot/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/udarnickbot/baza");
    }
    file_put_contents("prouser/$fid/udarnickbot/udarnickbot.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/udarnickbot/udarnickbot.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi:💫Nik Bot v.03 bot\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
        ]);
        bot('sendMessage',[
          'chat_id'=>-"1001671977181",
        'text'=>"Diqqat: $name yangi bot yaratdi!\n\n💡 Bot turi: 💫Nik Bot v.03 bot (pro)\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id",
       'parse_mode'=>"html",
           'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🛠️Bot ochish",'url'=>"https://t.me/Uz_MakerBot"]],
              ]
              ])
          ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 30;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
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


if($tx == "💰Pul bot (rubl) 4-Chanel"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 7000){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💰Pul bot (rubl) 4-Chanel bot yaratish uchun 7000 So'm kerak. Quyidagi havolani do'stlaringizga tarqatib So'm yig'ing:\n<code>https://t.me/$botname?start=$callfrid</code>\n\nEslatib o'tamiz har bir do'stingiz botga azo bo'lsa  sizga <b>2000</b>So'm beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga pul berilmaydi!\nYoki @$adminuser ga murojaat qilib pul oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @$mebot -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$back_menu
    ]);
    file_put_contents("step/$fid.txt","rubluz&token");
    }
}

if($userstep == "rubluz&token" and $tx !== "◀️Orqaga" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/rubluz.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
    
    mkdir("prouser/$fid/rubluz");
    if(file_get_contents("prouser/$fid/rubluz/rubluz.php")){
        unlink("prouser/$fid/rubluz/strtotime.php");
        unlink("prouser/$fid/rubluz/usid.txt");
        unlink("prouser/$fid/rubluz/grid.txt");
        $files = glob("prouser/$fid/rubluz/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/rubluz/baza");
    }
    file_put_contents("prouser/$fid/rubluz/rubluz.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/rubluz/rubluz.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: 💰Pul bot (rubl) 4-Chanel\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
        ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 7000;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
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
if($tx == "💰Pul bot (rubl) 5-Chanel"){
	$get = file_get_contents("referal/$fid.txt");
	if($get < 7000){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💰Pul bot (rubl) 5-Chanel bot yaratish uchun 7000 So'm kerak. Quyidagi havolani do'stlaringizga tarqatib So'm yig'ing:\n<code>https://t.me/$botname?start=$callfrid</code>\n\nEslatib o'tamiz har bir do'stingiz botga azo bo'lsa  sizga <b>2000</b>So'm beradi!\nDo'stingiz kanalimizga a'zo bo'lmasa sizga pul berilmaydi!\nYoki @$adminuser ga murojaat qilib pul oling!",
    'parse_mode'=>"html",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    
    ]
    ])
    ]);
	}else{
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"1️⃣ @BotFather-ga o'ting.  Buning uchun uning ismini bosing.
2️⃣ U bilan yangi bot yarating.  Buning uchun @BotFather ichidagi /newbot buyrug'idan foydalaning.
3️⃣ @BotFather sizga beradigan API tokenidan nusxa oling.
4️⃣ @$mebot -ga qaytib, nusxalangan API tokenini shu botga yuboring.
💥Taxminiy API Token:
 126521644:AAGlXut7dgde4jr94X8PNM1WXHhPwlLA",
    'reply_markup'=>$back_menu
    ]);
    file_put_contents("step/$fid.txt","rubl4&token");
    }
}

if($userstep == "rubl4&token" and $tx !== "◀️Orqaga" and joinchat($fid)=="true"){
    if(mb_stripos($tx, ":")!==false){
        $getid = bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"Tayyorlanmoqda..."
        ])->result->message_id;
    $kod = file_get_contents("bots/pro/5chanel/rubl4.php");
    $kod = str_replace("API_TOKEN", "$tx", $kod);
    $kod = str_replace("ADMIN_ID", "$fid", $kod);
$kod = str_replace("ADMIN_USER", "$user", $kod);
$kod = str_replace("KANAL",$name,$kod);    
    mkdir("prouser/$fid/rubl4");
    if(file_get_contents("prouser/$fid/rubl4/rubl4.php")){
        unlink("prouser/$fid/rubl4/strtotime.php");
        unlink("prouser/$fid/rubl4/usid.txt");
        unlink("prouser/$fid/rubl4/grid.txt");
        $files = glob("prouser/$fid/rubl4/baza/*");
        foreach ($files as $key) {
        	unlink($key);
        }
        rmdir("prouser/$fid/rubl4/baza");
    }
    file_put_contents("prouser/$fid/rubl4/rubl4.php", $kod);

    $get = json_decode(file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=https://".$_SERVER['SERVER_NAME']."/robot/prouser/$fid/rubl4/rubl4.php"))->result;

    if($get){
        $user = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->username;
        $nomi = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->first_name;
        $id = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getme"))->result->id;
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'message_id'=>$getid,
        'text'=>"✅ Bot tayyor!\n\n💡 Bot turi: 💰Pul bot (rubl) 5-Chanel\n👤 Bot nomi: $nomi\n✳️ Useri: @$user\n🆔 raqami: $id\n\n/panel - admin panel",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
        ]);
        $gett = file_get_contents("referal/$fid.txt");
        $gett -= 7000;
        file_put_contents("referal/$fid.txt", $gett);
        $getssss = file_get_contents("stat/statpro.txt");
        $getssss += 1;
        file_put_contents("stat/statpro.txt", $getssss);
    } else {        
        bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$getid]);        
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"📛 Noma'lum xatolik",
        'parse_mode'=>"html",
        'reply_markup'=>$back_menu
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






#######
#############################################-END-###########################

if($tx == "📚 Qo'llanma" and joinchat($fid)=="true"){
    bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"💡 <b>@UZ_MAKER_NEWS jamoasi:</b>
	
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
	'text'=>"💡 <b>@UZ_MAKER_NEWS jamoasi:</b>
	
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

if($text == "📨 Bog‘lanish"){
  bot('sendMessage',[
  'chat_id'=>$cid,
  'message_id'=>$mid,
  'text'=>"Xabaringizni kiriting!",
  'reply_markup'=>$rpl,
    ]);
    }
    if($reply=="Xabaringizni kiriting!"){
      bot('sendMessage',[
      'chat_id'=>$admin,
      'text'=>"🔏 Murojat kelib tushdi.

🔐 Murojatchi :  <a href = 'tg://user?id=$uid'>$name</a>
🔐 Id raqami : <a href = 'tg://user?id=$uid'>$uid</a>
➖➖➖➖➖➖➖➖
$text

➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
]);
sleep(2);
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"_📚 Murojatingiz adminga yuborildi. Noto'g'ri shikoyat uchun ban olishingiz mumkin 🔐_
*• 12 soat ichida javobni olasiz √*",
'parse_mode'=>"markdown",
'reply_markup'=>$main_menu,
]);
}


if($tx=="qol"){ 
      bot('sendVideo',[ 
        'chat_id'=>$cid,
        'video'=>"https://t.me/MakerUz_News/100",
        'caption'=>"🤖Botimizning qo'lash videosi bu video bizning yotube kanalimizga hamda botimmizga ham joylanadi.✅

🛠Bot : @UZ_MAKERBOT

🎥Video mualifi : @DJ_mux

🛠Qanday mumao bolsa : @DJ_mux murojaat qing!", 
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
    'reply_markup'=>$back_menu
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
@DJ_mux

📂 Texnik qoʻllab-quvvatlash uchun guruhimizga qoʻshiling:
@UZ_MAKER_CHAT",

	'parse_mode'=>'html',
	'reply_markup'=>$yordam_menu
	]);
}
if($tx=="⚡Tizim yangiliklari"and joinchat($fid)=="true"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"📂 Bot yuzasidagi barcha yangiliklar @UZ_MAKER_NEWS kanalida yetkazib boriladi.

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

🇺🇿 Hamma botlar soni: 10 ta

♻️ Bot versiyasi: 4.1

🛠 Dasturchi: Qahramonov Jahongir",

	'parse_mode'=>'html',
	'reply_markup'=>$yordam_menu,
	]);
}

if($tx=="📽️Video qoʻllanma"){ 
      bot('sendVideo',[ 
        'chat_id'=>$cid,
        'video'=>"https://t.me/MakerUz_News/100",
        'caption'=>"🤖Botimizning qo'lash videosi bu video bizning yotube kanalimizga hamda botimmizga ham joylanadi.✅

🛠Bot : @UZ_MAKERBOT

🎥Video mualifi : @DJ_mux

🛠Qanday mumao bolsa : @DJ_mux murojaat qing!", 
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
$aa = "-1001671977181";  //promokod yuboriladigan kanal id raqami
$ab = "-1001671977181"; //promokod ishlatilganligi haqida yuboriladigan kanalid raqami
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
[['text'=>"🎫 Promokodni ishlatish", "url"=>"https://t.me/$botname?start=$promo"]],
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
Promokoddan @$name foydalandi 
va unga $ball olmos taqdim etildi ✅</i>

<b>🎫 Promokod ishlatilgan vaqt: $soat</b>",
'parse_mode'=>'html',
]);
unlink("ch2.txt");
}



//<------- admin-------> 

if(($tx == "/panel") and $cid == $admin){
    bot('deleteMessage',['chat_id'=>$cid,'message_id'=>$mid]);
    bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"<b>👨‍💻Admin panelga xush kelibsiz.</b>",
    'parse_mode'=>"html",
    'reply_markup'=>$panel,
]);
}


if($tx == "⬅️ Bekor"){
    unlink("step/admin.txt");
    bot('sendMessage',[
        'text'=>"<b>👨‍💻Admin panelga qaytdingiz.</b>",
        'chat_id'=>$admin,
        'parse_mode'=>"html",
        'reply_markup'=>$panel,
]);
}
    
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
   [["text"=>'👨‍💻Asminstrator', 'url'=>"https://t.me/DJ_mux"]],
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
Siz  Botimizdan foydalana olmaysiz, chunki Bot sizni bloklagan!
Blokdan chiqish uchun 👨‍💻Admin ga yozing! Blokdan chiqmaguncha bot siz uchun ishlamaydi!🚫</b> " ,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Admin👨‍💻", "url"=>"https://t.me/DJ_mux"]],
]
])
]);return false;}

//Bitta userga xabar yuborish
if($text == "📋 Userga Xabar"){
if($cid == $admin){
bot('sendMessage', [
'chat_id'=>$admin,
'text'=>"✔ Userga Xabar yuborish uchun
/sms 🆔️ Xabar 
shu tarzda yuboring!

👨‍💻Admin: $adminuser",
'reply_markup'=>$back4_menu,
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

❄ @UZ_MAKERBOT*",
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
$lichka=file_get_contents("shekih.db");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("shekih.db","$lichka\n$cid");
}
}
//statistika
if($text == "📊 Sitatistika"){
if($cid == $admin){
$lichka=file_get_contents("shekih.db");
$lich=substr_count($lichka,"\n");
$time=date('H:i:s',strtotime('5 hour'));

bot('sendmessage',[
'chat_id'=>$cid,
    'text'=> "<b>Bot statistikasi:</b>    
├▶A'zolar: <b>$lich</b>",
'parse_mode'=>'html',
]);
}
}
//oddiy xabar yuborish
$xabar = file_get_contents("send.txt");
if($text == "↗️ Xabar yuborish"){
if($cid == $admin){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"*Userlarga yuboriladigan xabar matnini kiriting! Bekor qilish uchun /cancel ni bosing.*",
'parse_mode'=>"markdown",
'reply_markup'=>$back4_menu,
]); file_put_contents("send.txt","user");
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*🤪😂 Bu funksiyani Faqat men $adminuser ishlata olaman.*",
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
'parse_mode'=>'HTML'
]);
}
}
}
if($okuser){
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"<b>Hamma userlarga yuborildi</b>✅",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]); unlink("send.txt");
}

//Xabar
if((mb_stripos($text, "/xabar")!==false) and $cid == $admin){
$id = explode(" ",$text);
$id1 = $id[1];
$id2 = $id[2];
$finish = bot('SendMessage', [
'chat_id'=>$id1,
'parse_mode'=>"markdown",
'text'=>"$id2

By: [@$bot]",
'disable_web_page_preview'=>true,
]);
}
if($finish){
bot('SendMessage', [
'chat_id'=>$admin,
'parse_mode'=>"markdown",
'text'=>"✔️ [$id1](tg://user?id=$id1) *Ga Xabar Yuborildi!✅*",
'parse_mode'=>'html',
'reply_markup'=>$panel
]);
}

$on = file_get_contents("on.txt");
if ($on == "off" && $cid = "$admin"){
bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"⚠️<b>@$botname dam olish rejimida iltimos bezovta qilmang.\n\nHozir tamirda.📛</b>",
        'parse_mode'=>'html',
]);
}
//o'chirish
if($text == "❌ OFF" && $cid == $admin){
file_put_contents("on.txt","off");
bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"⚠️<b>Ofline.</b>",
  'parse_mode'=>'html',
]);
}
//yoqish
if($text == "✅ ON" && $cid == $admin){
file_put_contents("on.txt","on");
bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"⚠️<b>Online</b>",
  'parse_mode'=>'html',
]);
}

if($text == "📦 Kunlik bonus"){
$bonustime = file_get_contents("bonus/$cid.txt");
$bonusrand = rand(5,50);
if($bonustime == $vaqt){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"📛Siz kunlik bonusni olib bo‘lgansiz!",
'parse_mode'=>'markdown',
]);
}else{
    $get = file_get_contents("referal/$fid.txt");
$pul = file_get_contents("referal/$cid.txt");
$bonus=$pul+$bonusrand;
file_put_contents("referal/$cid.txt","$bonus");
file_put_contents("bonus/$cid.txt","$vaqt");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"👏Tabriklaymiz sizga $bonusrand ta olmos 🎁bonus taqdim etildi!",
'parse_mode'=>'markdown',
]);
}
}

//pul berish
if(mb_stripos($tx, "💸 Pul berish")!==false){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=> "<b>✅Pul berish uchun quyidagi buyruqni bajaring!
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

?>
