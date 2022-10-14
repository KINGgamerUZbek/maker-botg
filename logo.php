<?php
ob_start();
define('API_KEY','API_TOKEN');
//tokenni yozing
$admin = "ADMIN_ID";

//ozizni id raqamizni yozing
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
function put($fayl,$nima){  
file_put_contents("$fayl","$nima");  
}  
function get($fayl){  
$get = file_get_contents("$fayl");  
return $get;  
}  
          $replyc= json_encode([
           'resize_keyboard'=>false,
                'force_reply' => true,
                'selective' => true
            ]);

$update = json_decode(file_get_contents('php://input'));
$efede = json_decode(file_get_contents('php://input'), true);
$message = $update->message;
$ism = $message->new_chat_member->first_name;
$rasm = $message->chat->photo;
//files 
$text = $message->text;
$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$message    = $update->message;
$message_id = $update->callback_query->message->message_id;
$document = $update->message->document;
$fadmin = $message->from->id;
$first_name = $message->from->first_name;
$ctitle = $update->message->chat->title;
$cuname = $update->message->chat->username;
$chat_id = $update->message->chat->id;
$cid = $update->message->chat->id;
$turi = $update->message->chat->type;
$text = $update->message->text;
$data = $update->callback_query->data;
$qid = $update->callback_query->id;
$callcid = $update->callback_query->message->chat->id;
$calltext = $update->callback_query->message->text;
$clid = $update->callback_query->from->id;
$callmid = $update->callback_query->message->message_id;
$gid = $update->callback_query->message->chat->id;
$cid2 = $update->callback_query->message->chat->id;  
$ufname = $update->message->from->first_name;
$uname = $update->message->from->last_name;
$ulogin = $update->message->from->username;
$user_id = $update->message->from->id;
$cid3 = $message->chat->id;
$id = $message->reply_to_message->from->id;   
$repmid = $message->reply_to_message->message_id; 
$rasm = $message->chat->photo;
$repname = $message->reply_to_message->from->first_name;
$repulogin = $message->reply_to_message->from->username;
$reply = $message->reply_to_message;
$sreply = $message->reply_to_message->text;
$mid = $message->message_id;
$forward = $update->message->forward_from->message_id;
$edname = $editm ->from->first_name;
$forward2 = $update->message->forward_from;
$editm = $update->edited_message;
$new_user = $message->new_chat_member;
$new_user_id = $message->new_chat_member->id;
$new_user_fname= $message->new_chat_member->first_name;
$username = $message->from->username;
$fname= $message->from->first_name;
$is_bot = $message->new_chat_member->is_bot;
$guruhlar = file_get_contents("stat/group.list");
$userlar = file_get_contents("stat/user.list");
mkdir("del");
mkdir("panel");

$iwonc=get("del/$chat_id.txt");

//<----------------------ADMIN TEKSHIRISH--------------------------->
     $gett = bot('getChatMember', ['chat_id' => $chat_id,'user_id' => $user_id,]);
     $get = $gett->result->status;

     $gett1 = bot('getChatMember', ['chat_id' => $chat_id,'user_id' => $id,]);
     $get1 = $gett1->result->status;

     $gett2 = bot('getChatMember', ['chat_id' => $callcid,'user_id' => $clid,]);
     $get2 = $gett2->result->status;
     


$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$u = explode("\n",file_get_contents("memb.txt"));
$c = count($u)-1;
$modxe = file_get_contents("usr.txt");
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("memb.txt", $chat_id."\n",FILE_APPEND);
  }
//колво
if ($text == "/admin" and $chat_id == $admin ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"
☑️ Уважаемые | -разработчик.▫️ 
 | заказы теперь выберите то, что вы хотите 📩
-
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسالة للكل ','callback_data'=>'ce']],
[['text'=>'عدد الاعضاء ','callback_data'=>'co']],
            ]
            ])
        ]);
}
if($data == 'off'){
bot('editMessageText',[
'chat_id'=>$callcid,
'message_id'=>$message_id,
      'text'=>"
Назад
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'رسБог для каждого тела ','callback_data'=>'ce']],
[['text'=>'Число членов ','callback_data'=>'co']],
            ]
            ])
]);
file_put_contents('usr.txt', '');
}
#                   Участников                   #
if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        Количество подписчиков бота📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}
#                   رسالة للكل                   #
if($data == "ce" and $update->callback_query->message->chat->id == $admin){ 
    file_put_contents("usr.txt","yas");
    bot('EditMessageText',[
    'chat_id'=>$update->callback_query->message->chat->id,
    'message_id'=>$update->callback_query->message->message_id,
    'text'=>"На пишите 
   ",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>'Отмена🚫','callback_data'=>'off']]    
        ]
    ])
    ]);
}
if($text and $modxe == "yas" and $chat_id == $admin ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("usr.txt","no");

} 
}
//klaviatura
$soat = date('H:i', strtotime('5 hour'));
          $soat3 = date('H:i', strtotime('3 hour'));
          $soat4 = date('H:i', strtotime('4 hour'));
          $soat5 = date('H:i', strtotime('7 hour'));
          $soat6 = date('H:i', strtotime('9 hour'));
   		$kun = date ('d.m.Y', strtotime('5 hour'));
if($text =="🔰Statistika🔰" ){
      bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ef89e50c-2d4e-42da-a6bb-90af099b66fa/logo?v=4&text= $c $ex[2] $ex[3] ",
'caption'=>"UZB🇺🇿: $soat 
 Moscow🇷🇺: $soat3
 NewYork🇺🇸: $soat4
 Los A🇺🇸: $soat5
 Tokio🇻🇳: $soat6
🌀Today🌙: $kun",
    ]);
}
if($text =="🔰Static🔰" ){
     bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ef89e50c-2d4e-42da-a6bb-90af099b66fa/logo?v=4&text= $c $ex[2] $ex[3] ",
'caption'=>"UZB🇺🇿: $soat 
 Moscow🇷🇺: $soat3
 NewYork🇺🇸: $soat4
 Los A🇺🇸: $soat5
 Tokio🇻🇳: $soat6
🌀Today🌙: $kun",
    ]);
}
if($text =="🔰Статистика🔰" ){
    bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ef89e50c-2d4e-42da-a6bb-90af099b66fa/logo?v=4&text= $c $ex[2] $ex[3] ",
'caption'=>"UZB🇺🇿: $soat 
 Moscow🇷🇺: $soat3
 NewYork🇺🇸: $soat4
 Los A🇺🇸: $soat5
 Tokio🇻🇳: $soat6
🌀Today🌙: $kun",
]);
}
//<----------------------START--------------------------------->
if($text=="/ru"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"Привет $first_name добро пожаловать к боту!\nВ боте вы можете создать много различных логотипов! 
$first_name Удачи ....",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎨Логотип✨"], ['text'=>"📄Редактор текста📄"]], 
[['text'=>"🔰Статистика🔰"],['text' =>"⚒️️Настройки⚒️"]], 
]
])
]);
}
if($text=="🔰Главное Меню🔰"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"Привет $first_name добро пожаловать к боту!\nВ боте вы можете создать много различных логотипов! 
$first_name Удачи ....",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎨Логотип✨"], ['text'=>"📄Редактор текста📄"]], 
[['text'=>"🔰Статистика🔰"],['text' =>"⚒️Настройки⚒️️"]], 
]
])
]);
}

if((mb_stripos($text,"/start")!==false)) { 
  bot('sendmessage',[   
   'chat_id'=>$cid,   
     'parse_mode'=>'markdown',   
   'text'=>"$first_name 
———————————————

 Выберите язык:
🇷🇺RUssian /ru
🇺🇿Tilni tanlang /uz
🇺🇸Choose your language /en",   
]); 
} 
if($text=="/uz") { 
  bot('sendmessage',[   
   'chat_id'=>$chat_id,   
     'parse_mode'=>'markdown',   
   'text'=>"Salom $first_name botga xush kelibsiz! 
Botda kop logo yarata olasiz! 
$first_name Omad ...",   
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎨Logotip✨"],['text'=>"📄 Text Editor📄"]],
[['text'=>"🔰Statistika🔰"],['text' =>"⚒️Ozgariwla⚒️" ]],
]
])
]); 
} 
if($text=="🔰Bow Menu🔰") { 
  bot('sendmessage',[   
   'chat_id'=>$chat_id,   
     'parse_mode'=>'markdown',   
   'text'=>"Salom $first_name botga xush kelibsiz! 
Botda kop logo yarata olasiz! 
$first_name Omad ...",   
'reply_markup'=>json_encode([
 'keyboard'=>[
[['text'=>"🎨Logotip✨"],['text'=>"📄 Text Editor📄"]],
[['text'=>"🔰Statistika🔰"],['text' =>"⚒️Ozgariwla⚒️" ]],
]
])
]); 
} 
if($text=="/en") { 
  bot('sendmessage',[   
   'chat_id'=>$chat_id,   
     'parse_mode'=>'markdown',   
   'text'=>"Hello $first_name welcome to Bot! 
In the bot you can create many logos 
$first_name Good luck ...",   
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎨Logos✨"],['text'=>"📄Text Editor📄"]],
[['text'=>"🔰Statik🔰"],['text' =>"⚒️Settings⚒️" ]],
]
])
]);
} 
if($text=="🔰Main🔰") { 
  bot('sendmessage',[   
   'chat_id'=>$chat_id,   
     'parse_mode'=>'markdown',   
   'text'=>"Hello $first_name welcome to Bot! 
In the bot you can create many logos 
$first_name Good luck ...",   
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🎨Logos✨"],['text'=>"📄Text Editor📄"]],
[['text'=>"🔰Statik🔰"],['text' =>"⚒️Settings⚒️️"]],
]
])
]);
} 
if($text =="⚒️Settings⚒️" ){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"Logotip bulimini tanglang ...",
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🚩Language🚩"],['text' =>"📄Erors and offers📄" ]],
[['text'=>"🔰Main🔰"]], 
]
])
 ]);
}
if($text =="⚒️Ozgariwla⚒️" ){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"Ozgariwla ...",
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🚩Tillar🚩"],['text' =>"📄Hatolar va fikirlar📄" ]],
[['text'=>"🔰Bow Menu🔰"]], 
]
])
 ]);
}

if($text =="⚒️Настройки⚒️" ){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"Настройки ...",
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🚩Языки🚩"],['text' =>"📄Ошибки и предложения📄" ]],
[['text'=>"🔰Главное Меню🔰"]], 
]
])
 ]);
}
//конец менюхи
if($text =="🎨Logotip✨" ){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"Logotip bulimini tanglang ...",
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚽Sport logotip🏆"],['text' =>"🌀QR Cod🌀" ]],
[['text'=>"🔥Epic logotip🔥"],['text'=>"🎻Music logotip🎺"]], 
[['text'=>"✨Erkak & Ayol✨"],['text'=>"🔆Crazy logotip✨"]],
[['text'=>"🚗Moshin logotip🚖"],['text'=>"🎤DJ logotip🎤"]], 
[['text'=>"🎉Best logotip🎉"],['text'=>"🔰Bow Menu🔰"]],
]
])
 ]);
}
if($text =="🎨Логотип✨" ){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"Выберите раздел видов логотипа ...",
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚽Спортивный логотип🏆"],['text' =>"🌀QR Код🌀" ]],
[['text'=>"🔥Эпичный логотип🔥"],['text'=>"🎻Музыкальный логотип🎺"]],
[['text'=>"✨Мужское и Женское✨"],['text'=>"🔆Crazy логотип✨"]],
[['text'=>"🚗Автомобильный логотип🚖"],['text'=>"🎤DJ логотип🎤"]], 
[['text'=>"🎉Лучшие логотипы🎉"],['text'=>"🔰Главное Меню🔰"]],
]
])
  ]);
}
if($text =="🎨Logos✨" ){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"Select Logos Section  ...",
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"⚽Sport logo🏆"],['text' =>"🌀QR Code🌀" ]],
[['text'=>"🔥Epic logo🔥"],['text'=>"🎻Music logo🎺"]],
[['text'=>"✨Mans & Girls✨"],['text'=>"🔆Crazy logo✨"]],
[['text'=>"🚗Cars logo🚖"],['text'=>"🎤DJ logo🎤"]], 
[['text'=>"🎉Best logo🎉"],['text'=>"🔰Main🔰"]],
]
])
  ]);
}
if($text =="🌀QR Code🌀" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"You can create your own QR Code.. Type the command
`QR` and text", 
    ]);
}
if($text =="🌀QR Cod🌀" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Siz ozingiz QR code yasawingiz mumkin
`QR` va text", 
    ]);
}
if($text =="🌀QR Код🌀" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Вы можете создать свой собственный QR код для этого напишите команду
`QR` и текст ", 
    ]);
}
if($text =="🚩Language🚩" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Choose your language 
🇷🇺Russian /ru
🇺🇿Uzb /uz
🇺🇸English /en 
We will soon add more languages... ", 
    ]);
}
if($text =="🚩Языки🚩" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Выберите свой язык 
🇷🇺Russian /ru
🇺🇿Uzb /uz
🇺🇸English /en
В скором времени мы добавим больше языков... ", 
    ]);
}
if($text =="🚩Tillar🚩" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"O'z tilingizni tanglang 
🇷🇺Russian /ru
🇺🇿Uzb /uz
🇺🇸English /en
Tez orada ena koproq tillar kowamiz... ", 
    ]);
}
if($text =="📄Hatolar va fikirlar📄" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Botga fikirlariz yo xatolarini topgan bosangiz [**ADMINUSER**] bilan bog'laning ga murojat qiling", 
    ]);
}
if($text =="📄Erors and offers📄" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Hello here you can send us bugs or improvements that you want to see in our bot! 
 [**ADMINUSER**] ", 
    ]);
}
if($text =="📄Ошибки и предложения📄" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Здрасте здесь вы можете отправить нам ошибки бота либо улучшения которые вы хотелибы увидеть в нашем боте! 
Для этого отправьте [**ADMINUSER**] ваши пожелания", 
    ]);
}
//fest
if($text =="✨Mans & Girls✨" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create festive logos, type the command
`men1` and text
`8martch` and text
`men2` and text
`girl1` and text
`girl2` and text
`girl3` and text
`girl4` and text ", 
    ]);
}
if($text =="🎉Best logo🎉" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create best logos, type the command
`rok` and text
`cars1` and text
`cars2` and text
`idea` and text
`game1` and text
`game2` and text
`moto` and text 
`st1` and text
`st2` and text
`para` and text
`btf` and text", 
    ]);
}
if($text=="📄Text Editor📄") { 
  bot('sendmessage',[   
   'chat_id'=>$chat_id,   
     'parse_mode'=>'markdown',   
   'text'=>"Hello $first_name welcome to Text editor! 
In the bot you can create many crazy text 
$first_name Good luck ...",   
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔌Emoji🔌"],['text'=>"🎆Crazy Text🎆"]],
[['text'=>"♻️Reply♻️"],['text'=>"🔰Main🔰"]], 
]
])
]);
} 
if($text=="📄Редактор текста📄"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"Привет $first_name добро пожаловать к боту!\nВ боте вы можете создать много различных текстов! 
$first_name Удачи ....",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔌Эмодзи🔌"],['text'=>"🎆Классный текст🎆"]],
[['text'=>"♻️Повтор♻️"],['text'=>"🔰Главное Меню🔰"]], 
]
])
]);
}
if($text=="📄 Text Editor📄") { 
  bot('sendmessage',[   
   'chat_id'=>$chat_id,   
     'parse_mode'=>'markdown',   
   'text'=>"Salom $first_name botga xush kelibsiz! 
Botda kop crazy text yarata olasiz! 
$first_name Omad ...",   
 'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔌Emojila🔌"],['text'=>"🎆Crazy Textla🎆"]],
[['text'=>"♻️Reply Text♻️"],['text'=>"🔰Bow Menu🔰"]], 
]
])
]); 
} 
if($text =="🔌Эмодзи🔌" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания эмодзи наберите команду
`hpweek` и текст
`svveek` и текст
`catty` и text
`lovep` и текст
 ", 
    ]);
}
if($text =="🎆Классный текст🎆" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания текста наберите команду
`EN` и текст
 ", 
    ]);
}
if($text =="♻️Повтор♻️" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания повторного текста наберите команду
`rep` и текст - 10 раз повторяет
`rep50`  и текст - 50 раз повторяет
`rep100` и текст - 100 раз повторяет
`rep150` и текст - 150 раз повторяет
`rep200` и текст - 200 раз повторяет
 ", 
    ]);
}
if($text =="🔌Emojila🔌" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Emoji  yasaw uchun comandalarni yozing
`hpweek` va text
`svveek` va text
`catty` va text
`lovep` va text ", 
    ]);
}
if($text =="🎆Crazy Textla🎆" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Text  yasaw uchun comandani yozing
`EN` va text", 
    ]);
}
if($text =="♻️Reply Text♻️" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Reply text  yasaw uchun comandani yozing
`rep` va text - 10 ta takror qiadi
`rep50` va text - 50 ta takror qiladi
`rep100` va text - 100 ta takror qiladi
`rep150` va text - 150 ta takror qiladi
`rep200` va text - 200 ta takror qiladi", 
    ]);
}
if($text =="🔌Emoji🔌" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create emoji, type the command
`hpweek` and text
`svveek` and text
`catty` and text
`lovep` and text ", 
    ]);
}
if($text =="🎆Crazy Text🎆" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create crazy rext, type the command
`EN` and text ", 
    ]);
}
if($text =="♻️Reply♻️" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create reply text , type the command
`rep` and text - 10 reply text
`rep50` and text - 50 reply text
`rep100` and text - 100 reply text
`rep150` and text - 150 reply text
`rep200` and text - 200 reply text", 
    ]);
}
if($text =="✨Мужское и Женское✨" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания праздничных логотипов наберите команду
`men1` и текст
`8martch` и текст
`men2` и text
`girl1` и текст
`girl2` и текст
`girl3` и текст
`girl4` и текст ", 
    ]);
}
if($text =="🎉Лучшие логотипы🎉" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания лучших логотипов наберите команду
`cars1` и текст
`cars2` и текст 
`rok` и текст
`moto` и текст
`idea` и текст
`game1` и текст
`game2` и текст
`st1` и текст
`st2` и текст
`para` и текст
`btf` и текст  ", 
    ]);
}
if($text =="🚗Cars logo🚖" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create cars logos, type the command
`tach1` and text
`tach2` and text
`tach3` and text
`tach4` and text
`tach5` and text
`tach6` and text
`tach7` and text 
`tach8` and text
`tach9` and text
`tachX` and text", 
    ]);
}
if($text =="✨Erkak & Ayol✨" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Bayramlar  logolar  yasaw uchun comandalarni yozing
`girl1` va text
`8martch` va text
`girl2` va text
`girl3` va text
`girl4` va text 
`men1` va text
`men2` va text", 
    ]);
}
if($text =="🎉Best logotip🎉" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Bayram logotiplar yasaw uchun comandalarni yozing
`rok` va text
`idea` va text
`cars2` va text
`cars1` va text
`moto` va text
`game1` va text
`game2` va text
`st1` va text
`st2` va text
`para` va text
`btf` va text ", 
    ]);
}
    //logotip
if($text =="🔆Crazy логотип✨" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания крэйзи логотипов наберите команду
`crazy1` и текст
`crazy2` и текст
`crazy3` и текст
`crazy4` и текст
`crazy5` и текст
`crazy6` и текст
`crazy7` и текст
`crazy8` и текст
`crazy9` и текст
`crazyX` и текст ", 
    ]);
}
if($text =="🚗Автомобильный логотип🚖" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания автомобильных логотипов наберите команду
`tach1` и текст
`tach2` и текст
`tach3` и текст
`tach4` и текст
`tach5` и текст
`tach6` и текст
`tach7` и текст
`tach8` и текст
`tach9` и текст
`tachX` и текст ", 
    ]);
}
if($text =="🔆Crazy logotip✨" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Crazy logotiplar yasaw uchun comandalarni yozing
`crazy1` va text
`crazy2` va text
`crazy3` va text
`crazy4` va text
`crazy5` va text
`crazy6` va text
`crazy7` va text
`crazy8` va text
`crazy9` vatext
`crazyX` va text ", 
    ]);
}
if($text =="🚗Moshin logotip🚖" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Moshin logotiplar yasaw uchun comandalarni yozing
`tach1` va text
`tach2` va text
`tach3` va text
`tach4` va text
`tach5` va text
`tach6` va text
`tach7` va text
`tach8` va text
`tach9` vatext
`tachX` va text ", 
    ]);
}
if($text =="🎤DJ logotip🎤" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"DJ logotiplar yasaw uchun comandalarni yozing
`dj1` va text
`dj2` va text
`dj3` va text
`dj4` va text
`dj5` va text
`dj6` va text
`dj7` va text
`dj8` va text
`dj9` vatext
`djX` va text ", 
    ]);
}
if($text =="🎤DJ логотип🎤" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания DJ  логотипов наберите команду
`dj1` и текст
`dj2` и текст
`dj3` и текст
`dj4` и текст
`dj5` и текст
`dj6` и текст
`dj7` и текст
`dj8` и текст
`dj9` и текст
`djX` и текст ", 
    ]);
}
if($text =="🎤DJ logo🎤" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create DJ logos, type the command
`dj1` and text
`dj2` and text
`dj3` and text
`dj4` and text
`dj5` and text
`dj6` and text
`dj7` and text 
`dj8` and text
`dj9` and text
`djX` and text", 
    ]);
}
if($text =="🔆Crazy logo✨" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create the craze logos, click
`crazy1` and text
`crazy2` and text
`crazy3` and text
`crazy4` and text
`crazy5` and text
`crazy6` and text
`crazy7` and text
`crazy8` and text
`crazy9` and text
`crazyX` and text ", 
    ]);
}
if($text =="⚽Sport logotip🏆" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Sport logotiplar yasaw uchun comandalarni yozing
`sport1` va text
`sport2` va text
`sport3` va text
`sport4` va text
`sport5` va text
`sport6` va text
`sport7` va text
`sport8` va text
`sport9` vatext
`sportX` va text ", 
    ]);
}
if($text =="⚽Sport logo🏆" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create the sport logos, click
`sport1` and text
`sport2` and text
`sport3` and text
`sport4` and text
`sport5` and text
`sport6` and text
`sport7` and text
`sport8` and text
`sport9` and text
`sportX` and text ", 
    ]);
}
if($text =="⚽Спортивный логотип🏆" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания спортивных логотипов наберите команду
`sport1` и текст
`sport2` и текст
`sport3` и текст
`sport4` и текст
`sport5` и текст
`sport6` и текст
`sport7` и текст
`sport8` и текст
`sport9` и текст
`sportX` и текст ", 
    ]);
}
if($text =="🎻Music logo🎺" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create the music logos, click
`msc1` and text
`msc2` and text
`msc3` and text
`msc4` and text
`msc5` and text
`msc6` and text
`msc7` and text
`msc8` and text
`msc9` and text
`mscX` and text ", 
    ]);
}
if($text =="🎻Music logotip🎺" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Musics logotiplar yasaw uchun comandalarni yozing
`msc1` va text
`msc2` va text
`msc3` va text
`msc4` va text
`msc5` va text
`msc6` va text
`msc7` va text
`msc8` va text
`msc9` va text
`mscX` va text ", 
    ]);
}
if($text =="🎻Музыкальный логотип🎺" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания музыкального фона логотипов наберите команду
`msc1` и текст
`msc2` и текст
`msc3` и текст
`msc4` и текст
`msc5` и текст
`msc6` и текст
`msc7` и текст
`msc8` и текст
`msc9` и текст
`mscX` и текст ", 
    ]);
}
if($text =="🔥Epic logotip🔥" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Epic logotiplar yasaw uchun comandalarni yozing
`epic1` va text
`epic2` va text
`epic3` va text
`epic4` va text
`epic5` va text
`epic6` va text
`epic7` va text
`epic8` va text
`epic9` vatext
`epicX` va text ", 
    ]);
}
if($text =="🔥Epic logo🔥" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"To create the epic logos, click
`epic1` and text
`epic2` and text
`epic3` and text
`epic4` and text
`epic5` and text
`epic6` and text
`epic7` and text
`epic8` and text
`epic9` and text
`epicX` and text ", 
    ]);
}
if($text =="🔥Эпичный логотип🔥" ){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'parse_mode'=>'markdown',
        'text'=>"Для создания эпичных логотипов наберите команду
`epic1` и текст
`epic2` и текст
`epic3` и текст
`epic4` и текст
`epic5` и текст
`epic6` и текст
`epic7` и текст
`epic8` и текст
`epic9` и текст
`epicX` и текст ", 
    ]);
}
if(mb_stripos($text,"sport1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/4b4b23e4-f3d3-42b1-9c5d-615ac62ef5ac/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
} 
if(mb_stripos($text,"sport2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/08e30364-b0cf-48df-80f2-964bfe5547e4/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sport3") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/2aeefb25-2d78-4058-8cc7-74e2b4083e50/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sport4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/fc3c8bc5-a48c-47f0-b034-b258b3abce68/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sport5") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/79ff2b19-667e-43c4-9164-332330dc6f1b/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sport6") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/e33c12b4-1128-4129-b31f-2c31cb0878c7/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"st1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/d1d5e766-8cd8-424f-aa4d-fbc07908a8d2/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Best logotip 
You write $ex[1]",
]);
} 
if(mb_stripos($text,"st2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/99e9e246-fca4-4fbb-a7b2-a2ff497d85b3/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Best logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"QR") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"http://qr-code.ir/api/qr-code?s=5&e=M&t=P&d=$ex[1] ",
'caption'=>"QR CODE 
You write $ex[1]",
]);
}
if(mb_stripos($text,"para") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/fa5b9460-2773-4c4d-a3d6-1f733bc42dba/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Best logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"test4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"http://away-dev.000webhostapp.com/api/api.php?type=356&text1=$ex[1]&text2=dhurgham ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sport7") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/bd00f834-d5f9-475a-ad48-0c6126f077c6/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sport8") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/1b1869b4-e487-474b-b0e3-7f3bf8194194/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sport9") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/48125ab7-a743-4f54-8da8-b2c6230e710f/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Sport logotip 
You write $ex[1]",
]);
}

if(mb_stripos($text,"crazy1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/2a23b1f8-1793-46ee-993b-d6c83b8df0dd/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/87ea7fe8-4e10-4819-8814-60d63ce8f9b8/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy3") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/f8d2306a-8987-40a0-9de8-d448a6f2b048/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/5e47943d-4857-474d-b7ca-009652b9e52d/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy5") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/55829798-84dd-428f-871f-0a83955e2d49/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy6") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ef89e50c-2d4e-42da-a6bb-90af099b66fa/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy7") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ab03a446-9f79-4278-aebf-141d6baa5e79/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy8") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/bf0b8391-41e4-4f60-ace9-a18a114306e1/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazy9") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/cddaf4c3-5ab9-4957-9da0-437cd56d7a6c/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"crazyX") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/297c288d-4c21-4f1d-958b-e617feaef9be/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Crazy logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/2368b276-9678-4611-8d9f-232f858ffc5a/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/95e81a44-d412-49cf-a492-bf9530c0bcf2/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc3") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ea44541f-995f-4525-89d4-17739b855a2e/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/1bfbead8-fd97-43f7-8e10-020578e6c349/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip by 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc5") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/85c09ff0-40bb-40c3-8c0c-802cc19a2297/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc6") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/2a97a62b-9851-42c0-96c8-8afe40f57e0a/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc7") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/b43f1777-660c-482c-bacd-2e1642baf003/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc8") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/11a70f98-24bf-41ff-8470-b9b096af31dd/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"msc9") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ae3a80f0-5fd7-4fe6-bde8-a1ae017e33c1/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"mscX") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/f05edb5b-c016-4d31-955f-73a3e082e1c2/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Music logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/8d70e3bd-71b3-46e0-9dc8-7dfe3389e7e5/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/72b97da3-2e87-4e4b-889d-04c8711e805d/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic3") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/0b55f069-103e-459b-bd33-6dbdfc7ca811/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/93857f38-1788-47e3-9560-0220b88ac94e/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic5") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/b1c634dd-aacc-4190-986c-7ace14ed3ec6/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic6") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/e18e8c65-b2aa-49e6-8a07-ef2464ff25ae/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic7") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/e0e7aaf6-f3e6-457f-99ed-dc3487e29912/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic8") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/23eaaf26-a0f8-41f4-9ef5-468dc8b5bde3/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epic9") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/45218131-8405-40a4-bb04-24d1710eff0d/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"epicX") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/b6d2d7ef-e4cb-44cd-9979-12068b09ec47/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Epic logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"rok") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/4a2ea46d-5501-48a5-9d8d-8110f9420b85/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Best logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"sp") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/2de6d448-afc7-425a-b51f-903fb0bc9340/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"sport logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"game1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/b54cb74a-f0c5-4071-934b-019257430e4b/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"game logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"game2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/a9a8ca01-e658-4339-917d-0010ddeaa0b6/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"game logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"men1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/163f89d3-60a5-40ac-9325-0299844d5d67/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"men logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"men2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/983dc163-be5a-406d-848e-9cc4e2b60109/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"men logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"girl1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"http://away-dev.000webhostapp.com/api/api.php?type=372&text1=$ex[1]&text2=dhurgham ",
'caption'=>"girl logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"girl2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/8d3db074-52eb-4888-8a35-f683ec1cef0f/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"girl logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"girl3") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/9988e891-579c-47f5-bfaf-959c3a2d8e25/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"girl logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"girl4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/dff12af1-28d3-4645-aba0-b209b6ee8ed7/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"girl logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"idea") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/2085a114-720f-4f81-bfeb-778ea5ac2052/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Fest logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"cars1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/1d774b95-f479-4380-a92b-51fe4c821129/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Fest logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"8martch") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/fbff98fe-0132-4346-aa2b-af4488ebb4fd/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Fest logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"cars2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/b3236a76-dc4b-4605-a7a3-6649fb2da488/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Best logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"moto") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/45c72bf1-5935-4eee-a65e-e8dd850e37b8/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"moto logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"btf") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/a3defcce-fb2e-4a44-b654-4e3246141f94/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Best logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/707a772e-87ac-4225-be00-5715df731443/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/be26c778-4cbd-4a14-b8b1-4b8b1fe07952/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach3") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/4e78e518-91c8-40ea-bbc9-eba385c6d796/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/28ebcaf7-2371-43e9-8e1a-da980a834b1a/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach5") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/0a676c20-7b98-4bea-8652-dc0ad06f6c54/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach6") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/0d556a87-9ade-426a-b60a-e7575aa3edeb/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach7") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/e05bef29-964a-4a57-b6c2-128266b9c2c3/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach8") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/5223e7c6-3cc7-41b2-bb43-9ca4fc8b2d99/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tach9") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/7d1a812d-9e8b-4451-a38c-d384ab1ed98e/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"tachX") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/127564ac-8114-43ce-9686-2f6befb8b14a/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"Cars logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj1") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/9bd9f7b0-971d-460b-9f35-b30091cc32f6/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj2") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/dde89710-82d1-4d2a-8752-42bebc9b9a05/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj3") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/7229c0d6-cc4f-4e47-87b2-3b01285f502d/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj4") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ad38bcc8-b76b-483c-88cb-41af5218d9ac/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj5") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/3f607d24-e269-4fd0-8ad1-34d315a51558/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj6") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/5275891b-6017-49a1-86cf-def79699e926/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj7") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/27a7162f-f00f-4d64-82aa-d77561298f14/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj8") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ce7f825f-150c-46a0-842a-7235bc0442af/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"dj9") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/7c8b9cd6-4636-4230-bd82-d083b414c141/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
if(mb_stripos($text,"djX") !== false){ 
$ex = explode(" ",$text);
bot('SendPhoto',[
'chat_id'=>$chat_id, 
'reply_to_message_id'=>$mid,
'photo'=>"https://bcassetcdn.com/asset/logo/ea509e1b-89eb-457b-810b-2f3d42cc6841/logo?v=4&text= $ex[1] $ex[2] $ex[3] ",
'caption'=>"DJ logotip 
You write $ex[1]",
]);
}
  $bio = explode("lovep",$text);
    if($bio[1]){
    $array = array(
"♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥ 
♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥
▄█▓█████▄　　　　　　　　　　▄█████ 
██　██████　　　　　　　　　　██████　 
██　██████　　　　　　　　　　██████　 
██　　█████　　　　　　▒▒▒　█████　 
▄█　　　██　　　　▒▒▒　███　　　██　　 
　　　　████　　　███　███　　▓▓▓ 
　　　　██████████　　__██▓▓▓▓▓ 
　　　　▓▓▓▓　　　_█　　　█　　▓▓▓▓ 
　　　█████　　　　█　　¯¯¯　　▓▓▓▓▓ 
　　██████　　　¯¯¯　　　　　　█████ 
　▓▓▓▓▓▓▓　　　　　　　　　　　█████ 
　　　　██　　　　　　　　　　　　　██ 
　　　　██　　　　　　　　　　　　　██ 
　　　　███　$bio[1]　　　　　　　███  
╔╗╔╦═╦═╦═╦╦╗╔╦╦╦═╦═╦╦╦═╦═╦═╗ 
║╚╝║║║║║║║║║║║║║═╣═╣╔╣═╣║║║║ 
║╔╗║╦║╔╣╔╣╗║║║║║═╣═╣╚╣═╣║║║║ 
╚╝╚╩╩╩╩╩╝╚═╝╚══╩═╩═╩╩╩═╩╩╩═╝ 
♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥ 
♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥♥ "
);
    $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$bio = explode("catty",$text);
    if($bio[1]){
    $array = array(
". 
───▄───────────────────▄██▄ 
──▐██▄────────────────▄█░░█▌ 
──▐█░██▄─────────────██░░░█▌ 
──▐█░░░██───────────██░░░░█ 
───█░░░░██▄████████▄███░░░█ 
───██░░█░░░░░░░░░░░░░░░█░██ 
────███░░░░░░░░░░░░░░░░░██ 
────██░░░░░░░░░░░░░░░░░░░█ 
───▐█░░░░░░▄▄█░░█▄▄░░░░░░█▌ 
───▐█░░░██████░░██████░░░█▌ 
───██░░███████░░███████░░██ 
───██░░█▄▐█▌▐█░░█▌▐█▌▄█░░██ 
───██░░██▄▄▄██░░██▄▄▄██░░██▌ 
──▐█▌░░▀█████▀░░▀█████▀░░▐█▌ 
──▐█▌░░░░▀█▀░░░░░░▀█▀░░░░▐█▌ 
──██░░░░░░░░░▀▄▄▀░░░░░░░░░██ 
──██░░░░░░░▀▄░▐▌░▄▀░░░░░░░██ 
──█▌░░░░░░░░░▀▀▀▀░░░░░░░░░▐█ 
─██░░░░░░░░░░░░░░░░░░░░░░░▐█▌ 
██░░░░░░░░░░░░░░░░░░░░░░░░░██ 
█▌░░░░░░░░░░░░░░░░░░░░░░░░░▐█ 
█▌░░░░░░░░░░░░░░░░░░░░░░░░░▐█ 
█▌░░░░░░░░░░░░░░░░░░░░░░░░░▐█ 

█▌░░░░░░░░░░░░░░░░░░░░░░░░░▐█ 
█▌░░░░░░░░░░░░░░░░░░░░░░░░░▐█ 
█▌░░░░░░░░░░░░░░░░░░░░░░░░░▐█
Hi.....$bio[1]"
);
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$bio = explode("hpweek",$text);
    if($bio[1]){
    $array = array(
"───────────────────▓▓▓
───────────────────███
───────────────────███
───────────────────███
───────────────────███
──────────────────█████
─────────────────███████
─────────────────███████
─────────███████─█▒▒▒▒▒█─███████
─────────█▒▒▒▒▒█─█▒▒▒▒▒█─█▒▒▒▒▒█
─────────█▒▒▒▒▒█─█▒▒▒▒▒█─█▒▒▒▒▒█
──────────█▒▒▒█──█▒▒▒▒▒█──█▒▒▒█
───────────███───█▒▒▒▒▒█───███
────────────█────█▒▒▒▒▒█────█
────────────█────█▒▒▒▒▒█────█
────────────█────███████────█
─▓▓▓▓▓▓▓▓▓▓▓▓▓▓$bio[1]▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
─────▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
──────────────███──_____ ─████
───────────────██████───█████
─────────────────██████████████
───────────────────█████████████
─────────────────────████████████
██─█╔══╗██▀▄╔═╗██─█─────██████████
▌▐▀█║╔╗║▌▐▀▀║╬║▌▐─█─────────██████
██─█║╠╣║██──║╔╝─██───────────██████
────╚╝╚╝────╚╝────────────────██████
██─█─█╔═╗██▀╔╦╗██▀╔═╦╗██▀▄─────██████
▌▐─█─█║╦╝▌▐▀║╔╝▌▐▀║║║║▌▐─█──────██████
─██─█─║╩╗███║╚╗███║║║║███▀──────███████ 



______________________________________________________");
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$bio = explode("svveek",$text);
    if($bio[1]){
    $array = array(
"▄■▀■▄▄■■▄▄■▀■▄████▄▀██▄██▀▄████
░░░░░░░░░░░░░██▄▀█▀░░░░░▀█▀▄██
░║║╔╗╗╔╔╗░╔╗░█▀▀▀▌░─░░░─░▐▀▀▀█
░╠╣╔╣║║╠╝░╔╣░███▀█▄└───┘▄█▀███
░║║╚╝╚╝╚╝░╚╝░██▄█▀▄██▀██▄▀█▄██
░░░░░░░░░░░░░░░░░░░░░░░░░░░░║░
░░╔╗╗╦╔╔╗╔╗╬░░║║║╔╗╔╗║╔╔╗╔╗╔╣░
░░╚╗║║║╠╝╠╝║░░║║║╠╝╠╝╠╣╠╝║║║║░
░░╚╝╚╩╝╚╝╚╝╚░░╚╩╝╚╝╚╝║╚╚╝║║╚╝░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
▀▀■▄■▀▀■▄■▀▀■■▀▀■▄■▀▀■▄■▀▀■▄■▀▀  






$bio[1]









░░░░░░░░░░░░░░░░░░░░░░░░░ ░░░░░ 
░║║╔╗╗╔╔╗░╔╗ ░ ░ ░ ▒▒▒▒ ▒ ▒ ▒▒▒▒▒▒ ░░ ░ 
░╠╣╔╣║║╠╝░╔╣ ░ ░ ░ ▒▒▒▒▓▒▒▓▒▒▒▒ ░░ ░ 
░║║╚╝╚╝╚╝░╚╝ ░ ░ ░ ▒▒▒▒▒▒▒▒▒▒▒▒ ░░░ 
░░░░░░░░░░░░ ░ ░ ░ ▒▓▒▒▒▒▒▒▒▒▓▒ ░░░ 
░░░░░░░░░░░░ ░ ░ ░ ▒▒▓▓▓▓▓▓▓▓▒▒ ░░░ 
░░░░░░░░░░░░░░░░░░░░░░░░░░░░║░ 
░░╔╗╗╦╔╔╗╔╗╬░░║║║╔╗╔╗║╔╔╗╔╗╔╣░ 
░░╚╗║║║╠╝╠╝║░░║║║╠╝╠╝╠╣╠╝║║║║░ 
░░╚╝╚╩╝╚╝╚╝╚░░╚╩╝╚╝╚╝║╚╚╝║║╚╝░ 
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 






█████████████████████
██░░░░░░░░░░░░░░░░░██
██░░░║║╔╗╗╔╔╗░╔╗░░░██
██░░░╠╣╔╣║║╠╝░╔╣░░░██
██░░░║║╚╝╚╝╚╝░╚╝░░░██
██░░░░░░░░░░░░░░░░░██
██░░░░╔╗╗╦╔╔╗╔╗╬░░░██
██░░░░╚╗║║║╠╝╠╝║░░░██
██░░░░╚╝╚╩╝╚╝╚╝╚░░░██
██░░░░░░░░░░░░░░░║░██
██░║║║╔╗╔╗║╔╔╗╔╗╔╣░██
██░║║║╠╝╠╝╠╣╠╝║║║║░██
██░╚╩╝╚╝╚╝║╚╚╝║║╚╝░██
██░░░░░░░░░░░░░░░░░██
█████$bio[1]████████████"
) ;
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$EN = explode("EN", $text);
   if($EN[1]){
   $EN = str_replace('q', '•🇶', $EN);
   $EN = str_replace('w', '•🇼', $EN);
   $EN = str_replace('e', '•🇪', $EN);
   $EN = str_replace('r', '•🇷', $EN);
   $EN = str_replace('t', '•🇹', $EN);
   $EN = str_replace('y', '•🇾', $EN);
   $EN = str_replace('u', '•🇻', $EN);
   $EN = str_replace('i', '•🇮', $EN);
   $EN = str_replace('o', '•🇴', $EN);
   $EN = str_replace('p', '•🇵', $EN);
   $EN = str_replace('a', '•🇦', $EN);
   $EN = str_replace('s', '•🇸', $EN);
   $EN = str_replace('d', '•🇩', $EN);
   $EN = str_replace('f', '•🇫', $EN);
   $EN = str_replace('g', '•🇬', $EN);
   $EN = str_replace('h', '•🇭', $EN);
   $EN = str_replace('j', '•🇯', $EN);
   $EN = str_replace('k', '•🇰', $EN);
   $EN = str_replace('l', '•🇱', $EN);
   $EN = str_replace('z', '•🇿', $EN);
   $EN = str_replace('x', '•🇽', $EN);
   $EN = str_replace('c', '•🇨', $EN);
   $EN = str_replace('v', '•🇺', $EN);
   $EN = str_replace('b', '•🇧', $EN);
   $EN = str_replace('n', '•🇳', $EN);
   $EN = str_replace('m', '•🇲', $EN);
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$EN[1],
 
    ]);
    }
    $EN0 = explode("EN", $text);
    if($EN0[1]){
	 $EN0 = str_replace('q', 'Ⴓ' , $EN0);
  	 $EN0 = str_replace('w', 'ᗯ' , $EN0);
	 $EN0 = str_replace('e', 'ᕮ' , $EN0);
  	 $EN0 = str_replace('r', 'ᖇ' , $EN0);
	 $EN0 = str_replace('t', 'ͳ' , $EN0);
  	 $EN0 = str_replace('y', 'ϒ' , $EN0);
	 $EN0 = str_replace('u', 'ᘮ' , $EN0);
  	 $EN0 = str_replace('i', 'ᓰ' , $EN0);
	 $EN0 = str_replace('o', '〇' , $EN0);
  	 $EN0 = str_replace('p', 'ᖘ' , $EN0);
	 $EN0 = str_replace('a', 'ᗩ' , $EN0);
  	 $EN0 = str_replace('s', 'ᔕ' , $EN0);
	 $EN0 = str_replace('d', 'ᗪ' , $EN0);
  	 $EN0 = str_replace('f', 'Բ' , $EN0);
	 $EN0 = str_replace('g', 'ᘐ' , $EN0);
  	 $EN0 = str_replace('h', 'ᕼ' , $EN0);
	 $EN0 = str_replace('j', 'ᒎ' , $EN0);
  	 $EN0 = str_replace('k', 'Ḱ' , $EN0);
	 $EN0 = str_replace('l', 'ᒪ' , $EN0);
  	 $EN0 = str_replace('z', 'Ꙁ' , $EN0);
	 $EN0 = str_replace('x', 'Ꮖ' , $EN0);
  	 $EN0 = str_replace('c', 'ᑕ' , $EN0);
	 $EN0 = str_replace('v', 'ᐯ' , $EN0);
  	 $EN0 = str_replace('b', 'ᙖ' , $EN0);
  	 $EN0 = str_replace('n', 'ᘉ' , $EN0);
	 $EN0 = str_replace('m', 'ᙢ' , $EN0);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$y[1],
 
    ]);
    }
    $EN1 = explode("EN", $text);
    if($EN1[1]){
	 $EN1 = str_replace('q', 'q' , $EN1);
  	 $EN1 = str_replace('w', 'ω' , $EN1);
	 $EN1 = str_replace('e', 'ε' , $EN1);
  	 $EN1 = str_replace('r', 'я' , $EN1);
	 $EN1 = str_replace('t', 'т' , $EN1);
  	 $EN1 = str_replace('y', 'ү' , $EN1);
	 $EN1 = str_replace('u', 'υ' , $EN1);
  	 $EN1 = str_replace('i', 'ι' , $EN1);
	 $EN1 = str_replace('o', 'σ' , $EN1);
  	 $EN1 = str_replace('p', 'ρ' , $EN1);
	 $EN1 = str_replace('a', 'α' , $EN1);
  	 $EN1 = str_replace('s', 's' , $EN1);
	 $EN1 = str_replace('d', '∂' , $EN1);
  	 $EN1 = str_replace('f', 'ғ' , $EN1);
	 $EN1 = str_replace('g', 'g' , $EN1);
  	 $EN1 = str_replace('h', 'н' , $EN1);
	 $EN1 = str_replace('j', 'נ' , $EN1);
  	 $EN1 = str_replace('k', 'к' , $EN1);
	 $EN1 = str_replace('l', 'ℓ' , $EN1);
  	 $EN1 = str_replace('z', 'z' , $EN1);
	 $EN1 = str_replace('x', 'x' , $EN1);
  	 $EN1 = str_replace('c', 'c' , $EN1);
	 $EN1 = str_replace('v', 'v' , $EN1);
  	 $EN1 = str_replace('b', 'в' , $EN1);
  	 $EN1 = str_replace('n', 'η' , $EN1);
	 $EN1 = str_replace('m', 'м' , $EN1);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN1[1],
 
    ]);
    }
    $EN2 = explode("EN", $text);
    if($EN2[1]){
	 $EN2 = str_replace('q', 'ᵠ' , $EN2);
  	 $EN2 = str_replace('w', 'ʷ' , $EN2);
	 $EN2 = str_replace('e', 'ᵉ' , $EN2);
  	 $EN2 = str_replace('r', 'ʳ' , $EN2);
	 $EN2 = str_replace('t', 'ᵗ' , $EN2);
  	 $EN2 = str_replace('y', 'ʸ' , $EN2);
	 $EN2 = str_replace('u', 'ᵘ' , $EN2);
  	 $EN2 = str_replace('i', 'ᶤ' , $EN2);
	 $EN2 = str_replace('o', 'ᵒ' , $EN2);
  	 $EN2 = str_replace('p', 'ᵖ' , $EN2);
	 $EN2 = str_replace('a', 'ᵃ' , $EN2);
  	 $EN2 = str_replace('s', 'ˢ' , $EN2);
	 $EN2 = str_replace('d', 'ᵈ' , $EN2);
  	 $EN2 = str_replace('f', 'ᶠ' , $EN2);
	 $EN2 = str_replace('g', 'ᵍ' , $EN2);
  	 $EN2 = str_replace('h', 'ʰ' , $EN2);
	 $EN2 = str_replace('j', 'ʲ' , $EN2);
  	 $EN2 = str_replace('k', 'ᵏ' , $EN2);
	 $EN2 = str_replace('l', 'ˡ' , $EN2);
  	 $EN2 = str_replace('z', 'ᶻ' , $EN2);
	 $EN2 = str_replace('x', 'ˣ' , $EN2);
  	 $EN2 = str_replace('c', 'ᶜ' , $EN2);
	 $EN2 = str_replace('v', 'ᵛ' , $EN2);
  	 $EN2 = str_replace('b', 'ᵇ' , $EN2);
  	 $EN2 = str_replace('n', 'ᶰ' , $EN2);
	 $EN2 = str_replace('m', 'ᵐ' , $EN2);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN2[1],
  
    ]);
    }
$EN3 = explode("EN", $text);
    if($EN3[1]){
	 $EN3 = str_replace('q', 'Θ' , $EN3);
  	 $EN3 = str_replace('w', 'ẁ' , $EN3);
	 $EN3 = str_replace('e', 'ë' , $EN3);
  	 $EN3 = str_replace('r', 'я' , $EN3);
	 $EN3 = str_replace('t', 'ť' , $EN3);
  	 $EN3 = str_replace('y', 'y' , $EN3);
	 $EN3 = str_replace('u', 'ע' , $EN3);
  	 $EN3 = str_replace('i', 'į' , $EN3);
	 $EN3 = str_replace('o', 'ð' , $EN3);
  	 $EN3 = str_replace('p', 'ρ' , $EN3);
	 $EN3 = str_replace('a', 'à' , $EN3);
  	 $EN3 = str_replace('s', 'ś' , $EN3);
	 $EN3 = str_replace('d', 'ď' , $EN3);
  	 $EN3 = str_replace('f', '∫' , $EN3);
	 $EN3 = str_replace('g', 'ĝ' , $EN3);
  	 $EN3 = str_replace('h', 'ŋ' , $EN3);
	 $EN3 = str_replace('j', 'Ј' , $EN3);
  	 $EN3 = str_replace('k', 'қ' , $EN3);
	 $EN3 = str_replace('l', 'Ŀ' , $EN3);
  	 $EN3 = str_replace('z', 'ź' , $EN3);
	 $EN3 = str_replace('x', 'א' , $EN3);
  	 $EN3 = str_replace('c', 'ć' , $EN3);
	 $EN3 = str_replace('v', 'V' , $EN3);
  	 $EN3 = str_replace('b', 'Ђ' , $EN3);
  	 $EN3 = str_replace('n', 'ŋ' , $EN3);
	 $EN3 = str_replace('m', 'm' , $EN3);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN3[1],
  
    ]);
    }
$EN3 = explode("EN", $text);
    if($EN3[1]){
	 $EN3 = str_replace('q', 'Ҩ' , $EN3);
  	 $EN3 = str_replace('w', 'Щ' , $EN3);
	 $EN3 = str_replace('e', 'Є' , $EN3);
  	 $EN3 = str_replace('r', 'R' , $EN3);
	 $EN3 = str_replace('t', 'ƚ' , $EN3);
  	 $EN3 = str_replace('y', '￥' , $EN3);
	 $EN3 = str_replace('u', 'Ц' , $EN3);
  	 $EN3 = str_replace('i', 'Ī' , $EN3);
	 $EN3 = str_replace('o', 'Ø' , $EN3);
  	 $EN3 = str_replace('p', 'P' , $EN3);
	 $EN3 = str_replace('a', 'Â' , $EN3);
  	 $EN3 = str_replace('s', '$' , $EN3);
	 $EN3 = str_replace('d', 'Ð' , $EN3);
  	 $EN3 = str_replace('f', 'Ŧ' , $EN3);
	 $EN3 = str_replace('g', 'Ǥ' , $EN3);
  	 $EN3 = str_replace('h', 'Ħ' , $EN3);
	 $EN3 = str_replace('j', 'ʖ' , $EN3);
  	 $EN3 = str_replace('k', 'Қ' , $EN3);
	 $EN3 = str_replace('l', 'Ŀ' , $EN3);
  	 $EN3 = str_replace('z', 'Ẕ' , $EN3);
	 $EN3 = str_replace('x', 'X' , $EN3);
  	 $EN3 = str_replace('c', 'Ĉ' , $EN3);
	 $EN3 = str_replace('v', 'V' , $EN3);
  	 $EN3 = str_replace('b', 'ß' , $EN3);
  	 $EN3 = str_replace('n', 'И' , $EN3);
	 $EN3 = str_replace('m', 'ⴅ' , $EN3);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN3[1],
 
    ]);
    }
 $EN5 = explode("EN", $text);
    if($EN5[1]){
	 $EN5 = str_replace('q', 'Ҩ' , $EN5);
  	 $EN5 = str_replace('w', 'Ɯ' , $EN5);
	 $EN5 = str_replace('e', 'Ɛ' , $EN5);
  	 $EN5 = str_replace('r', '尺' , $EN5);
	 $EN5 = str_replace('t', 'Ť' , $EN5);
  	 $EN5 = str_replace('y', 'Ϥ' , $EN5);
	 $EN5 = str_replace('u', 'Ц' , $EN5);
  	 $EN5 = str_replace('i', 'ɪ' , $EN5);
	 $EN5 = str_replace('o', 'Ø' , $EN5);
  	 $EN5 = str_replace('p', 'þ' , $EN5);
	 $EN5 = str_replace('a', 'Λ' , $EN5);
  	 $EN5 = str_replace('s', 'ら' , $EN5);
	 $EN5 = str_replace('d', 'Ð' , $EN5);
  	 $EN5 = str_replace('f', 'F' , $EN5);
	 $EN5 = str_replace('g', 'Ɠ' , $EN5);
  	 $EN5 = str_replace('h', 'н' , $EN5);
	 $EN5 = str_replace('j', 'ﾌ' , $EN5);
  	 $EN5 = str_replace('k', 'Қ' , $EN5);
	 $EN5 = str_replace('l', 'Ł' , $EN5);
  	 $EN5 = str_replace('z', 'Ẕ' , $EN5);
	 $EN5 = str_replace('x', 'χ' , $EN5);
  	 $EN5 = str_replace('c', 'ㄈ' , $EN5);
	 $EN5 = str_replace('v', 'Ɣ' , $EN5);
  	 $EN5 = str_replace('b', 'Ϧ' , $EN5);
  	 $EN5 = str_replace('n', 'Л' , $EN5);
	 $EN5 = str_replace('m', '௱' , $EN5);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN5[1],
 
    ]);
    }
   $EN6 = explode("EN", $text);
    if($EN6[1]){
	 $EN6 = str_replace('q', 'Ⴓ' , $EN6);
  	 $EN6 = str_replace('w', 'Ш' , $EN6);
	 $EN6 = str_replace('e', 'Σ' , $EN6);
  	 $EN6 = str_replace('r', 'Γ' , $EN6);
	 $EN6 = str_replace('t', 'Ƭ' , $EN6);
  	 $EN6 = str_replace('y', 'Ψ' , $EN6);
	 $EN6 = str_replace('u', 'Ʊ' , $EN6);
  	 $EN6 = str_replace('i', 'I' , $EN6);
	 $EN6 = str_replace('o', 'Θ' , $EN6);
  	 $EN6 = str_replace('p', 'Ƥ' , $EN6);
	 $EN6 = str_replace('a', 'Δ' , $EN6);
  	 $EN6 = str_replace('s', 'Ѕ' , $EN6);
	 $EN6 = str_replace('d', 'D' , $EN6);
  	 $EN6 = str_replace('f', 'F' , $EN6);
	 $EN6 = str_replace('g', 'G' , $EN6);
  	 $EN6 = str_replace('h', 'H' , $EN6);
	 $EN6 = str_replace('j', 'J' , $EN6);
  	 $EN6 = str_replace('k', 'Ƙ' , $EN6);
	 $EN6 = str_replace('l', 'L' , $EN6);
  	 $EN6 = str_replace('z', 'Z' , $EN6);
	 $EN6 = str_replace('x', 'Ж' , $EN6);
  	 $EN6 = str_replace('c', 'C' , $EN6);
	 $EN6 = str_replace('v', 'Ʋ' , $EN6);
  	 $EN6 = str_replace('b', 'Ɓ' , $EN6);
  	 $EN6 = str_replace('n', '∏' , $EN6);
	 $EN6 = str_replace('m', 'Μ' , $EN6);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN6[1],
   
    ]);
    }
$EN7 = explode("EN", $text);
    if($EN7[1]){
	 $EN7 = str_replace('q', 'Q' , $EN7);
  	 $EN7 = str_replace('w', 'Щ' , $EN7);
	 $EN7 = str_replace('e', '乇' , $EN7);
  	 $EN7 = str_replace('r', '尺' , $EN7);
	 $EN7 = str_replace('t', 'ｲ' , $EN7);
  	 $EN7 = str_replace('y', 'ﾘ' , $EN7);
	 $EN7 = str_replace('u', 'Ц' , $EN7);
  	 $EN7 = str_replace('i', 'ﾉ' , $EN7);
	 $EN7 = str_replace('o', 'Ծ' , $EN7);
  	 $EN7 = str_replace('p', 'ｱ' , $EN7);
	 $EN7 = str_replace('a', 'ﾑ' , $EN7);
  	 $EN7 = str_replace('s', '丂' , $EN7);
	 $EN7 = str_replace('d', 'Ð' , $EN7);
  	 $EN7 = str_replace('f', 'ｷ' , $EN7);
	 $EN7 = str_replace('g', 'Ǥ' , $EN7);
  	 $EN7 = str_replace('h', 'ん' , $EN7);
	 $EN7 = str_replace('j', 'ﾌ' , $EN7);
  	 $EN7 = str_replace('k', 'ズ' , $EN7);
	 $EN7 = str_replace('l', 'ﾚ' , $EN7);
  	 $EN7 = str_replace('z', '乙' , $EN7);
	 $EN7 = str_replace('x', 'ﾒ' , $EN7);
  	 $EN7 = str_replace('c', 'ζ' , $EN7);
	 $EN7 = str_replace('v', 'Џ' , $EN7);
  	 $EN7 = str_replace('b', '乃' , $EN7);
  	 $EN7 = str_replace('n', '刀' , $EN7);
	 $EN7 = str_replace('m', 'ᄊ' , $EN7);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN7[1],
  
    ]);
    }
    $EN8 = explode("EN", $text);
    if($EN8[1]){
	 $EN8 = str_replace('q', 'ợ' , $EN8);
  	 $EN8 = str_replace('w', 'ฬ' , $EN8);
	 $EN8 = str_replace('e', 'є' , $EN8);
  	 $EN8 = str_replace('r', 'г' , $EN8);
	 $EN8 = str_replace('t', 't' , $EN8);
  	 $EN8 = str_replace('y', 'ץ' , $EN8);
	 $EN8 = str_replace('u', 'ย' , $EN8);
  	 $EN8 = str_replace('i', 'เ' , $EN8);
	 $EN8 = str_replace('o', '๏' , $EN8);
  	 $EN8 = str_replace('p', 'թ' , $EN8);
	 $EN8 = str_replace('a', 'ค' , $EN8);
  	 $EN8 = str_replace('s', 'ร' , $EN8);
	 $EN8 = str_replace('d', '๔' , $EN8);
  	 $EN8 = str_replace('f', 'Ŧ' , $EN8);
	 $EN8 = str_replace('g', 'ɠ' , $EN8);
  	 $EN8 = str_replace('h', 'ђ' , $EN8);
	 $EN8 = str_replace('j', 'ן' , $EN8);
  	 $EN8 = str_replace('k', 'к' , $EN8);
	 $EN8 = str_replace('l', 'l' , $EN8);
  	 $EN8 = str_replace('z', 'z' , $EN8);
	 $EN8 = str_replace('x', 'א' , $EN8);
  	 $EN8 = str_replace('c', 'ς' , $EN8);
	 $EN8 = str_replace('v', 'ⱴ' , $EN8);
  	 $EN8 = str_replace('b', '๒' , $EN8);
  	 $EN8 = str_replace('n', 'ภ' , $EN8);
	 $EN8 = str_replace('m', '๓' , $EN8);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN8[1],
    ]);
    }
$EN9 = explode("EN", $text);
    if($EN9[1]){
	 $EN9 = str_replace('q', 'ҩ' , $EN9);
  	 $EN9 = str_replace('w', 'ω' , $EN9);
	 $EN9 = str_replace('e', '૯' , $EN9);
  	 $EN9 = str_replace('r', 'Ր' , $EN9);
	 $EN9 = str_replace('t', '੮' , $EN9);
  	 $EN9 = str_replace('y', 'ע' , $EN9);
	 $EN9 = str_replace('u', 'υ' , $EN9);
  	 $EN9 = str_replace('i', 'ɿ' , $EN9);
	 $EN9 = str_replace('o', '૦' , $EN9);
  	 $EN9 = str_replace('p', 'ƿ' , $EN9);
	 $EN9 = str_replace('a', 'ค' , $EN9);
  	 $EN9 = str_replace('s', 'ς' , $EN9);
	 $EN9 = str_replace('d', 'ძ' , $EN9);
  	 $EN9 = str_replace('f', 'Բ' , $EN9);
	 $EN9 = str_replace('g', '૭' , $EN9);
  	 $EN9 = str_replace('h', 'Һ' , $EN9);
	 $EN9 = str_replace('j', 'ʆ' , $EN9);
  	 $EN9 = str_replace('k', 'қ' , $EN9);
	 $EN9 = str_replace('l', 'Ն' , $EN9);
  	 $EN9 = str_replace('z', 'ઽ' , $EN9);
	 $EN9 = str_replace('x', '૪' , $EN9);
  	 $EN9 = str_replace('c', '८' , $EN9);
	 $EN9 = str_replace('v', '౮' , $EN9);
  	 $EN9 = str_replace('b', 'ც' , $EN9);
  	 $EN9 = str_replace('n', 'Ո' , $EN9);
	 $EN9 = str_replace('m', 'ɱ' , $EN9);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN9[1], 
    ]);
    }
 $EN10 = explode("EN", $text);
    if($EN10[1]){
	 $EN10 = str_replace('q', 'Ꝙ' ,$EN10);
  	 $EN10 = str_replace('w', 'Ѡ' ,$EN10);
	 $EN10 = str_replace('e', 'Ɛ' ,$EN10);
  	 $EN10 = str_replace('r', 'Ɽ' ,$EN10);
	 $EN10 = str_replace('t', 'Ͳ' ,$EN10);
  	 $EN10 = str_replace('y', 'Ỿ' ,$EN10);
	 $EN10 = str_replace('u', 'Ʊ' ,$EN10);
  	 $EN10 = str_replace('i', 'ị' ,$EN10);
	 $EN10 = str_replace('o', 'Ỗ' ,$EN10);
  	 $EN10 = str_replace('p', 'Ꝓ' ,$EN10);
	 $EN10 = str_replace('a', 'Λ' ,$EN10);
  	 $EN10 = str_replace('s', 'Ṥ' ,$EN10);
	 $EN10 = str_replace('d', 'δ' ,$EN10);
  	 $EN10 = str_replace('f', 'Բ' ,$EN10);
	 $EN10 = str_replace('g', '₲' ,$EN10);
  	 $EN10 = str_replace('h', 'Ḩ' ,$EN10);
	 $EN10 = str_replace('j', 'Ĵ' ,$EN10);
  	 $EN10 = str_replace('k', 'Ҡ' ,$EN10);
	 $EN10 = str_replace('l', 'Ⱡ' ,$EN10);
  	 $EN10 = str_replace('z', 'Ꙃ' ,$EN10);
	 $EN10 = str_replace('x', 'Ӿ' ,$EN10);
  	 $EN10 = str_replace('c', 'Ƈ' ,$EN10);
	 $EN10 = str_replace('v', 'Ѵ' ,$EN10);
  	 $EN10 = str_replace('b', 'ß' ,$EN10);
  	 $EN10 = str_replace('n', 'ⴂ' ,$EN10);
	 $EN10 = str_replace('m', 'ⴅ' ,$EN10);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN10[1],
    ]);
    }
 $EN11 = explode("EN", $text);
    if($EN11[1]){
	 $EN11 = str_replace('q', 'ǫ' , $EN11);
  	 $EN11 = str_replace('w', 'ᴡ' , $EN11);
	 $EN11 = str_replace('e', 'ᴇ' , $EN11);
  	 $EN11 = str_replace('r', 'ʀ' , $EN11);
	 $EN11 = str_replace('t', 'ᴛ' , $EN11);
  	 $EN11 = str_replace('y', 'ʏ' , $EN11);
	 $EN11 = str_replace('u', 'ᴜ' , $EN11);
  	 $EN11 = str_replace('i', 'ɪ' , $EN11);
	 $EN11 = str_replace('o', 'ᴏ' , $EN11);
  	 $EN11 = str_replace('p', 'ᴘ' , $EN11);
	 $EN11 = str_replace('a', 'ᴀ' , $EN11);
  	 $EN11 = str_replace('s', 'ѕ' , $EN11);
	 $EN11 = str_replace('d', 'ᴅ' , $EN11);
  	 $EN11 = str_replace('f', 'ғ' , $EN11);
	 $EN11 = str_replace('g', 'ɢ' , $EN11);
  	 $EN11 = str_replace('h', 'ʜ' , $EN11);
	 $EN11 = str_replace('j', 'ᴊ' , $EN11);
  	 $EN11 = str_replace('k', 'ᴋ' , $EN11);
	 $EN11 = str_replace('l', 'ʟ' , $EN11);
  	 $EN11 = str_replace('z', 'ᴢ' , $EN11);
	 $EN11 = str_replace('x', 'х' , $EN11);
  	 $EN11 = str_replace('c', 'ᴄ' , $EN11);
	 $EN11 = str_replace('v', 'ᴠ' , $EN11);
  	 $EN11 = str_replace('b', 'ʙ' , $EN11);
  	 $EN11 = str_replace('n', 'ɴ' , $EN11);
	 $EN11 = str_replace('m', 'ᴍ' , $EN11);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN11[1],
     ]);
    }
 $EN12 = explode("EN", $text);
    if($EN12[1]){
	 $EN12 = str_replace('q', 'Ｑ' , $EN12);
  	 $EN12 = str_replace('w', 'Ｗ' , $EN12);
	 $EN12 = str_replace('e', 'Ｅ' , $EN12);
  	 $EN12 = str_replace('r', 'Ｒ' , $EN12);
	 $EN12 = str_replace('t', 'Ｔ' , $EN12);
  	 $EN12 = str_replace('y', 'Ｙ' , $EN12);
	 $EN12 = str_replace('u', 'Ｕ' , $EN12);
  	 $EN12 = str_replace('i', 'Ｉ' , $EN12);
	 $EN12 = str_replace('o', 'Ｏ' , $EN12);
  	 $EN12 = str_replace('p', 'Ｐ' , $EN12);
	 $EN12 = str_replace('a', 'Ａ' , $EN12);
  	 $EN12 = str_replace('s', 'Ｓ' , $EN12);
	 $EN12 = str_replace('d', 'Ｄ' , $EN12);
  	 $EN12 = str_replace('f', 'Բ' , $EN12);
	 $EN12 = str_replace('g', 'Ｇ' , $EN12);
  	 $EN12 = str_replace('h', 'Ｈ' , $EN12);
	 $EN12 = str_replace('j', 'Ｊ' , $EN12);
  	 $EN12 = str_replace('k', 'Ｋ' , $EN12);
	 $EN12 = str_replace('l', 'Ｌ' , $EN12);
  	 $EN12 = str_replace('z', 'Ｚ' , $EN12);
	 $EN12 = str_replace('x', 'Ｘ' , $EN12);
  	 $EN12 = str_replace('c', 'С' , $EN12);
	 $EN12 = str_replace('v', 'Ｖ' , $EN12);
  	 $EN12 = str_replace('b', 'Ｂ' , $EN12);
  	 $EN12 = str_replace('n', 'Ｎ' , $EN12);
	 $EN12 = str_replace('m', 'Ⅿ' , $EN12);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN12[1],
    ]);
    }
 $EN13 = explode("EN", $text);
    if($EN13[1]){
	 $EN13 = str_replace('q', 'Ǫ' , $EN13);
  	 $EN13 = str_replace('w', 'Ш' , $EN13);
	 $EN13 = str_replace('e', 'Ξ' , $EN13);
  	 $EN13 = str_replace('r', 'Я' , $EN13);
	 $EN13 = str_replace('t', '₮' , $EN13);
  	 $EN13 = str_replace('y', 'Џ' , $EN13);
	 $EN13 = str_replace('u', 'Ǚ' , $EN13);
  	 $EN13 = str_replace('i', 'ł' , $EN13);
	 $EN13 = str_replace('o', 'Ф' , $EN13);
  	 $EN13 = str_replace('p', 'ק' , $EN13);
	 $EN13 = str_replace('a', 'Λ' , $EN13);
  	 $EN13 = str_replace('s', 'Ŝ' , $EN13);
	 $EN13 = str_replace('d', 'Ð' , $EN13);
  	 $EN13 = str_replace('f', 'Ŧ' , $EN13);
	 $EN13 = str_replace('g', '₲' , $EN13);
  	 $EN13 = str_replace('h', 'Ḧ' , $EN13);
	 $EN13 = str_replace('j', 'J' , $EN13);
  	 $EN13 = str_replace('k', 'К' , $EN13);
	 $EN13 = str_replace('l', 'Ł' , $EN13);
  	 $EN13 = str_replace('z', 'Ꙃ' , $EN13);
	 $EN13 = str_replace('x', 'Ж' , $EN13);
  	 $EN13 = str_replace('c', 'Ͼ' , $EN13);
	 $EN13 = str_replace('v', 'Ṽ' , $EN13);
  	 $EN13 = str_replace('b', 'Б' , $EN13);
  	 $EN13 = str_replace('n', 'Л' , $EN13);
	 $EN13 = str_replace('m', 'Ɱ' , $EN13);
	 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$EN13[1], 
    ]);
	  }
$bio = explode("rep100",$text);
    if($bio[1]){
$a = str_repeat("$bio[1]\n",100);
    $array = array(
"$a
") ;
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$bio = explode("rep50",$text);
    if($bio[1]){
$a = str_repeat("$bio[1]\n",50);
    $array = array(
"$a
") ;
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$bio = explode("rep",$text);
    if($bio[1]){
$a = str_repeat("$bio[1]\n",10);
    $array = array(
"$a
") ;
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$bio = explode("rep150",$text);
    if($bio[1]){
$a = str_repeat("$bio[1]\n",150);
    $array = array(
"$a
") ;
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }
$bio = explode("rep200",$text);
    if($bio[1]){
$a = str_repeat("$bio[1]\n",200);
    $array = array(
"$a
") ;
 $rand = array_rand($array, 1);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$array[$rand],
    ]);
    }