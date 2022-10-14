<?php
ob_start();
define('API_KEY','5038679102:AAFB1IO3P3I4i0wC2epMPO36ndtA252A92A');
$admin = "1919193948";
$host_folder = "https://u7995.thedc.ru/VipBuilder/Maxsus";
$ver = "11.7";
function ty($ch){
return bot('sendChatAction', [
'chat_id' => $ch,
'action' => 'typing',
]);
}
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;    $ch = curl_init();
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
function send($sid, $txt){
  bot('sendMessage',[
    'chat_id'=>$sid,
    'text'=>$txt,
    'parse_mode'=>"html"
    ]);
}
$chanel = "@";
$koder = "$koder";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $update->callback_query->message->message_id;
$tx = $message->text;
$photo_id=$message->photo[1]->file_id;
$doc=$message->document;
$doc_id=$doc->file_id;
$data = $update->callback_query->data;
$botf = $id.'/bot$slot/'.$id.'.code.php';
$id = $message->from->id;
$user = $message->from->username;
$chatid = $update->callback_query->message->chat->id;
$step = file_get_contents("$id/$id.step");
$zashita = 'php_value open_basedir "/home/m/mirchat/mirchatuzbekistan2021/public_html/u4753.xvest5.ru/'.$id.'/bots/"';
$token1 = file_get_contents("$id/token1.txt");
$token2 = file_get_contents("$id/token2.txt");
$token3 = file_get_contents("$id/token3.txt");
$token4 = file_get_contents("$id/token4.txt");
$token5 =
file_get_contents("$id/token5.txt");
$token6 =
file_get_contents("$id/token6.txt");
$token7 =
file_get_contents("$id/token7.txt");
$token8 =
file_get_contents("$id/token8.txt");
$token9 =
file_get_contents("$id/token9.txt");
$token10 = file_get_contents("$id/token10.txt");
$name = $message->from->first_name;
$caption = $message->caption;
$video_id=$message->video->file_id;
$langue = file_get_contents("$id/langue.txt");
$slot = file_get_contents("$id/slot.txt");
$balance = file_get_contents("$id/balance.txt");
$time = date('H:i:s', strtotime('2 hour'));
$on = file_get_contents("bot.dat");
if ($on == "off") {

bot('sendmessage',[
    'chat_id'=>$id,
    'text'=>"⚠️<b>Sevgilim  botimiz  tamirlanmoqda....
❌so'ngi bir necha soat yopiq.
⚠️Iltimos biroz o'tib harakat qilib ko'ring.</b>",
        'parse_mode'=>'html',
    ]);
    }else{
$ru = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📔Инструкция🧾"],['text'=>"♻️Добавить бота♻️"],],[['text'=>"🗑Удалить бота🗑"],
['text'=>"👨‍💻Разработчик👨‍💻"],],[['text'=>'👤Кабинет👤'],['text'=>"📊Статистика📈"],],
[['text'=>'💲Магазин💲'],['text'=>'ℹ️Инфо о Хостингеℹ️'],],
]
]);

//Kodni @$adminuser qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling

$adminb = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📔Qo'llanma🧾"],['text'=>"♻️Bot qo'shish♻️"],],[['text'=>"🗑Botni o'chirish🗑"],
['text'=>"👨‍💻Admin👨‍💻"],],[['text'=>"👤Kabinet👤"],['text'=>"📊Stastika📈"],],
[['text'=>"💲Bot sotib olish💲"],['text'=>'ℹ️Host infoℹ️'],],[['text'=>"🤓Panel🤓"],],
]
]);
$uz = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📔Qo'lanma🧾"],['text'=>"♻️Bot qo'shish♻️"],],[['text'=>"🗑Botni o'chirish🗑"],
['text'=>"👨‍💻Admin👨‍💻"],],[['text'=>'👤Kabinet👤'],['text'=>"📊Statistika📈"],],
[['text'=>'🔗Webhook slot🔗'],['text'=>'ℹ️Host infoℹ️']],
[['text'=>"💲Bot sotib olish💲"]],
]
]);
$adminb2 = json_encode([
  'resize_keyboard'=>true,
  'keyboard'=>[
[['text'=>"l📨Xabar yuborish"],['text'=>"🗑Fayl"],],
[['text'=>"🌐Bot on"],['text'=>"🌐Bot off"],],
[['text'=>"↩️Orqaga qaytish"],],
    ]
  ]);
$admo = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 Назад"]],
]
]);
$slot10 = json_encode([
  'resize_keyboard'=>true,
  'keyboard'=>[
    [['text'=>"1"],['text'=>"2"],['text'=>"3"],['text'=>'4'],['text'=>'5']],[['text'=>'6'],['text'=>'7'],['text'=>'8'],['text'=>'9'],['text'=>'10']],[['text'=>"🔙 Назад"]]
    ]
  ]);
$slot10_uz = json_encode([
  'resize_keyboard'=>true,
  'keyboard'=>[
    [['text'=>"1"],['text'=>"2"],['text'=>"3"],['text'=>'4'],['text'=>'5']],[['text'=>'6'],['text'=>'7'],['text'=>'8'],['text'=>'9'],['text'=>'10']],[['text'=>"🔙 Orqaga"]]
    ]
  ]);
$del = json_encode([
'remove_keyboard'=>true,
]);
$kanal = bot('getChatmember',[
  'chat_id'=>$chanel,
  'user_id'=>$id,
  ]);
$kanals = bot('getChatmember',[
  'chat_id'=>$chanel,
  'user_id'=>$chatid,
  ]);
$status = $kanal->result->status;
$status2 = $kanals->result->status;
if($data == "kanal" and $status2 != "left"){
mkdir("$id");
  bot('deleteMessage',[
    'chat_id'=>$chatid,
    'message_id'=>$mid
    ]);
$baza = file_get_contents("id.dat");
if(mb_stripos($baza, $id) !== false){
}else{
file_put_contents("id.dat", "\n".$id,FILE_APPEND);
file_put_contents("$id/balance.txt", 1);
}
       bot('sendmessage',[
    'chat_id'=>$id,
     'parse_mode'=>'markdown',
   'text'=>"🇷🇺Выберите язык:
--------------------------
🇺🇿Tilni tanlang:",
  'reply_markup'=>json_encode([
   'inline_keyboard'=>[
     [['text'=>'🇷🇺Русский', 'callback_data' => "ru"],['text'=>'🇺🇿O`zbek', 'callback_data' => "uz"]],

]
])
]);
    file_put_contents("$chatid/$chatid.step", 'logo');
    mkdir("$id");

}elseif($data == "kanal" and $status2 == "left"){
         bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Вы не присоединились в каналnKanalga obuna bolmagan siz",
            'show_alert' => true
        ]);
}
if($status == "left"){
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"Чтобы использовать бота нужно присоединиться к этим каналам n\Botni ishlatish uchun quydagi kanallarga obuna boling",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>'Присоединиться ➕', 'url'=>'https://t.me/Web_Hosting_Uzb']],
[['text'=>'Присоединиться ➕', 'url'=>'https://t.me/UzbekMakerBott']],
[['text'=>"Проверить✅", 'callback_data'=>"kanal"]],
      ]])
    ]);
}else{
$ban = file_get_contents("ban.txt");
if(mb_stripos($ban, $id) !== false){
send($id, "У вас бан!");
}else{
if($tx == "♻️Добавить бота♻️"){
if($balance >= "200"){
mkdir("$id");
mkdir("$id/bots");
mkdir("$id/bots/bot1");
mkdir("$id/bots/bot2");
mkdir("$id/bots/bot3");
mkdir("$id/bots/bot4");
mkdir("$id/bots/bot5");
mkdir("$id/bots/bot6");
mkdir("$id/bots/bot7");
mkdir("$id/bots/bot8");
mkdir("$id/bots/bot9");
mkdir("$id/bots/bot10");
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"*Выберите слот*",
'reply_markup'=> $slot10,
'parse_mode'=>'markdown',
]);
file_put_contents("$id/.htaccess", $zashita);
file_put_contents("$id/$id.step", "slot");
}else{
  bot('sendMessage',[
   'chat_id'=>$id,
   'text'=>"Недостаточна средств на счёту",
   'reply_markup'=>json_encode([
  'inline_keyboard'=>[
    [['text'=>"🔄Пополнить", 'callback_data'=>"oplata"]]
    ]
  ])

   ]);
}
}
if($tx >=1 and $tx <=10 and $tx !="🔙 Назад" and $step == "slot" and $langue == "ru"){
  bot('sendMessage',[
'chat_id'=>$id,
'text'=>"*Отправьте файл бота должен закончиваться на php*",
'reply_markup'=> $admo,
'parse_mode'=>'markdown',
]);
file_put_contents("$id/slot.txt", $tx);
file_put_contents("$id/$id.step", "load");
}

//Kodni @$adminuser qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling


if(isset($message->document) and $step == "load" and $langue == "ru"){
file_put_contents("$id/arxiv.txt", $doc_id);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$tester = file_get_contents($file);
$type = strtolower(strrchr($file,'.'));
$type=str_replace('.','',$type);
if($type == "php"){
if(!mb_stripos($tester, 'system(') !==false and !mb_stripos($tester, 'shell_exec(') !==false and !mb_stripos($tester,'$_POST')!==false and !mb_stripos($tester,'madeline')!==false and !mb_stripos($tester,'file_path')!==false and
!mb_stripos($tester,'$_GET')!==false and
!mb_stripos($tester,'$f+=1')!==false and !mb_stripos($tester,'tenxost')!==false and
!mb_stripos($tester,'$size/1024)/1024')!==false and !mb_stripos($tester,'file_get_contents("https')!==false and
!mb_stripos($tester,'setwebhook')!==false and
!mb_stripos($tester,'Unable to open file!')!==false  and
!mb_stripos($tester,'$res = $res')!==false  and !mb_stripos($tester,'$_SERVER')!==false and !mb_stripos($tester,'smartxost')!==false and !mb_stripos($tester,'fastxost')!==false and !mb_stripos($tester,'redxost')!==false and !mb_stripos($tester,'proc_popen')!==false and !mb_stripos($tester,'xvest')!==false and !mb_stripos($tester,'vbyte')!==false and !mb_stripos($tester,'<script>')!==false and !mb_stripos($tester,'<html')!==false and  !mb_stripos($tester,'exec("function.php')!==false ){
$okey = file_put_contents("$id/bots/bot$slot/$id.code.$type",file_get_contents($file));
}else{
  send($id, "В файле есть самые запрешеные коди, файл отправлен админу а пока в регистратся");

unlink("$id/bots/bot$slot/$id.code.$type");
  send($admin, "Ban $id");
  bot("sendDocument",[
    'chat_id'=>$admin,
    'document'=>$doc_id,
    'caption'=>"ur $id $id/bots/bot$slot/$id.code.$type $slot",
    ]);
}
}else{
  send($id, "Файл не php!");
}
if($okey and filesize("$id/bots/bot$slot/$id.code.$type") < "1278943652"){
bot('sendMessage',[
'chat_id'=>$id,
'text'=>" *Файл загружен теперь отправте токен*",
'parse_mode'=>'markdown',
]);
file_put_contents("$id/$id.step", "token");
}elseif(filesize("$id/bots/bot$slot/$id.code.php") > "1278943652"){
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"Ошибка: Размер файла перевишает 2мб",
'parse_mode'=>"markdown",
]);
unlink("$id/bots/bot$slot/$id.code.$type");
}
}
if($tx == $tx and $step == 'token' and $langue == "ru"){
$b = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getMe"));
$bn = $b->result->username;
if(!empty($bn) and strpos(file_get_contents("$id/bots/bot$slot/$id.code.php"), "$tx")){
file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=$host_folder/$id/bots/bot$slot/$id.code.php");

$ayir = $balance-200;
file_put_contents("$id/balance.txt", $ayir);

    bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*Бот @$bn успешно добавлен*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $ru,
     ]);
exec("php -l $id/bots/bot$slot/$id.code.php", $ress);
$ress = $ress[0];
if($ress[0] == "E"){
  send($id, "<b>В коде ошибка!nИсправьте код иначе бот не будет работать</b>");
}

     file_put_contents("$id/$id.step", "logo");
     file_put_contents("$id/token$slot.txt", $tx);

bot('sendDocument',[
  'chat_id'=>"-1001534627238",
  'document'=>file_get_contents("$id/arxiv.txt"),
  'caption'=>"BOT @$bn\nQOʻSHUVCHI ".'<a href="tg://user?id='.$id.'">'.$name."</a>\nO'ZBEKISTON vaqti BILAN $time",
  'parse_mode'=>"html"
  ]);
$ayir = $balance-200;
file_put_contents("$id/balance.txt", $ayir);

     bot('sendMessage',[
       'chat_id' => $admin,
       'text' => '<a href="tg://user?id='.$id.'">'.$name.'</a> (#'.$id.')('.$slot.') \nДобавил бота @'.$bn,
       'parse_mode' => 'html'
       ]);
       unlink("$id/arxiv.txt");
}
  elseif(empty($bn) and $tx != "🔙 Назад"){
    send($id, "Токен не рабочий");}else
  if(!strpos(file_get_contents("$id/bots/bot$slot/$id.code.php"), "$tx") and $tx != "🔙 Назад"){
    bot("sendMessage",[
      'chat_id'=>$id,
      'text'=>"В файле нету токена!",
      'reply_markup'=>$ru
      ]);
      unlink("$id/bots/bot$slot/$id.code.php");
      file_put_contents("$id/$id.step", "logo");

  }
}
if($tx == "/start" and $id == $admin){
     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*Добро пожаловать мой создатель*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $adminb,
     ]);
     file_put_contents("$id/$id.step", 'logo');
}
if($tx =="/start" and $id != $admin or $tx == "/lang"){
mkdir("$id");
$baza = file_get_contents("id.dat");
if(mb_stripos($baza, $id) !== false){
}else{
file_put_contents("id.dat", "\n".$id,FILE_APPEND);
file_put_contents("$id/balance.txt", 1);
}
if(!file_exists("$id/ref")){
  file_put_contents("$id/ref","");
}
       bot('sendmessage',[
    'chat_id'=>$id,
     'parse_mode'=>'markdown',
   'text'=>"🇷🇺Выберите язык:
--------------------------
🇺🇿Tilni tanlang:",
  'reply_markup'=>json_encode([
   'inline_keyboard'=>[
     [['text'=>'🇷🇺Русский', 'callback_data' => "ru"],['text'=>'🇺🇿O`zbek', 'callback_data' => "uz"]],

]
])
]);

file_put_contents("$id/$id.step", 'logo');
}
if(mb_stripos($tx, '/start')!==false and $tx != "/start"){
$tx = explode(" ", $tx);
       bot('sendmessage',[
    'chat_id'=>$id,
     'parse_mode'=>'markdown',
   'text'=>"🇷🇺Выберите язык:
--------------------------
🇺🇿Tilni tanlang:",
  'reply_markup'=>json_encode([
   'inline_keyboard'=>[
     [['text'=>'🇷🇺Русский', 'callback_data' => "ru"],['text'=>'🇺🇿O`zbek', 'callback_data' => "uz"]],

]
])
]);
if(!file_exists("$id/ref")){
bot('sendMessage',[
    'chat_id'=>$tx[1],
    'text'=>"Yangi referal. Sizni balansingizga 100 berildi"
    ]);
file_put_contents("$id/ref",$tx[1]);
$balance = file_get_contents("$tx[1]/balance.txt");
$put = $balance + 100;
file_put_contents("$tx[1]/balance.txt",$put);
}else{
send($id, "Siz foydalanuvchiga referal bo'lolmaysiz");}
}
if($data == 'ru'){
        bot('deleteMessage', [
       'chat_id'=> $chatid
       ,
       'message_id'=> $mid
       ]);
       bot('sendMessage',[
     'chat_id'=>$chatid,
     'text'=>"*Добро пожаловать в наш бот это бот для хостинга ваших ботов написаных на php*!! nn ",
     'parse_mode'=>'markdown',
       'reply_markup'=> $ru,
     ]);
     file_put_contents("$chatid/langue.txt", 'ru');
}
if($tx == "🤓Panel🤓" and $id == $admin){
  file_put_contents("$id/$id.step","admin");


  bot('sendMessage', [
    'chat_id' => $id,
    'text' => "Привет мой админ ",
    'parse_mode' => "markdown",
    'reply_markup' => $adminb2
    ]);
}
if($tx == "📊Статистика📈"){
$baza = file_get_contents("id.dat");
$obsh = substr_count($baza,"\n");

     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*👤Пользователи бота: $obsh\n✅Версия бота: $ver*",
     'parse_mode'=>'markdown',
     ]);

}

if($tx == "🗑Удалить бота🗑"){
     bot('sendMessage',[
     'chat_id'=>$id,
'text'=>"Выберите слот",
     'parse_mode'=>'html',
     'reply_markup'=>$slot10
     ]);
file_put_contents("$id/$id.step", "del");

}
if($tx >=1 and $tx <=10 and $step == "del" and $langue == "ru"){
file_put_contents("$id/slot.txt", $tx);
$slot = file_get_contents("$id/slot.txt");
if(file_exists("$id/token$slot.txt")){
$mied = bot('sendMessage',[
  'chat_id'=>$id,
  'text'=>".",
  'reply_markup'=>$del
  ]);
$mied = $mied->result->message_id;
bot('deleteMessage', [
'chat_id'=> $id,
'message_id'=> $mied
       ]);
bot('sendMessage',[
     'chat_id'=>$id,
'text'=>"Вы точна хотите удалить бота?",
     'parse_mode'=>'html',
     'reply_markup' => json_encode([
       'inline_keyboard' => [
         [['text'=> "Нет", 'callback_data'=>"net"],['text'=> "Да", 'callback_data'=>"da"]],
         ]])
     ]);
}else{
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>'Слот пустой'
    ]);
}

//Kodni @$adminuser  qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling


}
if($tx == "📔Инструкция🧾"){
     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*♻️Чтобы добавить бота, нажмите кнопку «Добавить»,
 ♻️Затем отправьте файл и дождитесь загрузки файла, затем отправьте токен, ♻️

 ♻️Нажмите кнопку «Добавить бота», чтобы обновить файл бота.
 Затем отправьте жетон ♻️

 ♻️Нажмите кнопку «Добавить бота», чтобы добавить нового бота.
 Затем отправьте новый токен ♻️

 ♻️Чтобы удалить бота, нажмите кнопку удаления бота и нажмите Да♻️

 ♻️Если вы хотите перевести деньги на свой бот-аккаунт, напишите первому админу♻️

 🔰НОВЫЙ ЗАКАЗ🔰
 ♻️ /lang - ВЫ МОЖЕТЕ УСТАНОВИТЬ ОБЕ ЯЗЫКИ С ПОМОЩЬЮ КОМАНДЫ ♻️

 👮Админ: @$koder*",
     'parse_mode'=>'markdown',
     ]);
}
if($tx == "👨‍💻Разработчик👨‍💻"){
     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"👨‍💻Разработчик:  @$koder ✅ \n🖊Отправте мне текст я отправлю админу😉",
     'parse_mode'=>'markdown',
     'reply_markup'=> $admo
     ]);
     file_put_contents("$id/$id.step", "senda");
}
if(!empty($tx) and $tx != "🔙 Назад" and $langue == "ru" and $step == "senda"){
  bot('sendMessage', [
  'chat_id'=>$admin,
  'text'=>'<a href="tg://user?id='.$id.'">'.$name.'</a> (#'.$id.') Отправил собшение:'."\n$tx",
  'parse_mode'=> 'html',
  'entities' => [
    'type'=>'text_mention',
    ],
  ]);
    send($id, "Текст отправлен😊");
}
  if(empty($tx) and $tx != "🔙 Назад" and $langue == "ru" and $step == "senda"){
   bot('copyMessage', [
  'chat_id'=>$admin,
  'from_chat_id'=>$id,
  'message_id'=>$message->message_id,
  'caption'=>$caption."n".'<a href="tg://user?id='.$id.'">'.$name.'</a> (#'.$id.')',
  'parse_mode'=>'html'
  ]);

  send($id, "Файл отправлен😊");
}
if(isset($message->reply_to_message) and $id == $admin){
  $senda = $message->reply_to_message->entities[0]->user->id;
 $sendas = bot('copyMessage',[
    'chat_id'=>$senda,
    'from_chat_id'=>$admin,
    'message_id'=>$message->message_id
    ]);
$sendas = $sendas->ok;
if($sendas == 'true'){
    send($admin, "Ответ отправлен!");
}else{
  send($admin, "Ответ не отправлен!!!");
}
}
if(isset($message->reply_to_message) and $id == $admin){
  $senda = $message->reply_to_message->caption_entities[0]->user->id;
    bot('copyMessage',[
    'chat_id'=>$senda,
    'from_chat_id'=>$admin,
    'message_id'=>$message->message_id
    ]);
}

if($tx == "🔙 Назад" and $step =="senda"){
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>'Главный панел',
    'reply_markup'=>$ru
    ]);
    file_put_contents("$id/$id.step", "logo");
}
if($tx == "👤Кабинет👤"){
$b = json_decode(file_get_contents("https://api.telegram.org/bot$token1/getMe"));
$bid = $b->result->id;
$botname = $b->result->first_name;
$c = $b->result->username;
$b2 = json_decode(file_get_contents("https://api.telegram.org/bot$token2/getMe"));
$bid2 = $b2->result->id;
$botname2 = $b2->result->first_name;
$c2 = $b2->result->username;
$b3 = json_decode(file_get_contents("https://api.telegram.org/bot$token3/getMe"));
$bid3 = $b3->result->id;
$botname3 = $b3->result->first_name;
$c3 = $b3->result->username;
$b4 = json_decode(file_get_contents("https://api.telegram.org/bot$token4/getMe"));
$bid4 = $b4->result->id;
$botname4 = $b4->result->first_name;
$c4 = $b4->result->username;
$b5 =
json_decode(file_get_contents("https://api.telegram.org/bot$token5/getMe"));
$bid5 = $b5->result->id;
$botname5 = $b5->result->first_name;
$c5 = $b4->result->username;
$b6 =
json_decode(file_get_contents("https://api.telegram.org/bot$token6/getMe"));
$bid6 = $b6->result->id;
$botname6 = $b6->result->first_name;
$c6 = $b6->result->username;
$b7 =
json_decode(file_get_contents("https://api.telegram.org/bot$token7/getMe"));
$bid7 = $b7->result->id;
$botname7 = $b7->result->first_name;
$c7 = $b7->result->username;
$b8 =
json_decode(file_get_contents("https://api.telegram.org/bot$token8/getMe"));
$bid8 = $b8->result->id;
$botname8 = $b8->result->first_name;
$c8 = $b8->result->username;
$b9 =
json_decode(file_get_contents("https://api.telegram.org/bot$token9/getMe"));
$bid9 = $b9->result->id;
$botname9 = $b9->result->first_name;
$c9 = $b9->result->username;
$b10 = json_decode(file_get_contents("https://api.telegram.org/bot$token10/getMe"));
$bid10 = $b10->result->id;
$botname10 = $b10->result->first_name;
$c10 = $b10->result->username;
$balance = file_get_contents("$id/balance.txt");
$den = $balance / 1;
      bot('sendMessage',[
        'chat_id' => $id,
        'text' => "👤Ваш ID: $id
💰Баланс: $balance"."₽
💵В день: 1₽
💲В месяць: 30₽
✔️Осталось: ".round($den)." дней
--------1-------
🆔ID бота: $bid
🤖Имя бота: $botname
®USER бота: @$c
--------2-------
🆔ID бота: $bid2
🤖Имя бота: $botname2
®USER бота: @$c2
--------3-------
🆔ID бота: $bid3
🤖Имя бота: $botname3
®USER бота: @$c3
--------4-------
🆔ID бота: $bid4
🤖Имя бота: $botname4
®USER бота: @$c4
--------5-------
🆔ID бота: $bid5
🤖Имя бота: $botname5
®USER бота: @$c5
--------6-------
🆔ID бота: $bid6
🤖Имя бота: $botname6
®USER бота: @$c6
--------7-------
🆔ID бота: $bid7
🤖Имя бота: $botname7
®USER бота: @$c7
--------8-------
🆔ID бота: $bid8
🤖Имя бота: $botname8
®USER бота: @$c8
--------9-------
🆔ID бота: $bid9
🤖Имя бота: $botname9
®USER бота: @$c9
--------10-------
🆔ID бота: $bid10
🤖Имя бота: $botname10
®USER бота: @$c10",
'reply_markup'=>json_encode([
  'inline_keyboard'=>[
    [['text'=>"🔄Пополнить", 'callback_data'=>"oplata"]]
    ]
  ])
        ]);

}
if($tx == "ℹ️Инфо о Хостингеℹ️"){
  send($id, "Хостинг: Beget.uz
Модуль: Apache
Макс размер одного файла 2мб(это не память)
Макс время для выполнения одного скрипта 60сек

Правила хостинга🔰
Запрешено🚫
🔴Хостинг боты
🔴Использовать как сайт
Разрешено✅
🟢Все кроме ранее перечесленых😊");
}
if($tx == "Отправить пост" and $id == $admin){
      bot('sendMessage',[
      'chat_id'=>$id,
      'text'=> 'Отправте текст',
      'reply_markup'=>$admo,
      ]);
      file_put_contents("$id/$id.step","send");
    }
if($id == $admin and $step == "send" and $tx != "🔙 Назад"){
    file_put_contents("$id/$id.step","");
     $idss=file_get_contents("id.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
   $send =  bot('copyMessage',[
      'chat_id'=>$idlat,
      'from_chat_id'=>$admin,
      'message_id'=> $message->message_id
      ]);
$res = $send->ok;
if($res == 'true'){
    $i++;
}
}
  send($admin, "Пост отправлен $i человекам");
}

if($tx == "💱Statistika" and $id == $admin){
  $res = "";
   $a = scandir("./");
      foreach($a as $ids){
        if(is_dir($ids) and $ids !="." and $ids !=".."){
        $bal = file_get_contents("$ids/balance.txt");
        $res = "$res\n$ids - $bal Рубл💰";
      }}


      send($admin, $res);
}
if(mb_stripos($tx, "/ban") !== false and $id == $admin){
  $tx = explode(" ",$tx);
if($tx[1] > 1){
  file_put_contents("ban.txt","$tx[1]n", FILE_APPEND);
  exec("rm -rf $tx[1]");
  send($admin, "Ban $tx[1]");
}
}
if(mb_stripos($tx, "/del") !== false and $id == $admin){
  $tx = explode(" ",$tx);
if($tx[1] > 1 and $tx[2] >= 1){
  exec("rm -rf $tx[1]/bots/bot$tx[2]");
  send($admin, "Del $tx[1] ($tx[2])");
}
}
if(mb_stripos($tx, "/coin") !== false and $id == $admin){
  $tx = explode(" ",$tx);
if($tx[1] > 1 and $tx[2] >= 1){
$balance = file_get_contents("$tx[1]/balance.txt");
$put = $balance + $tx[2];
  file_put_contents("$tx[1]/balance.txt", $put);
  send($tx[1], "💰Ваш баланс пополнен на $tx[2] \nВаш баланс $put  \n💰Sizning balans $tx[2]  ga to'ldirildi\nBalans: $put ");
  send($admin, "Баланс пополнен <a href='tg://user?id=$tx[1]'>$tx[1]</a> на сумму $tx[2]nБаланс: $put ");
}
}
if(mb_stripos($tx, "/get") !== false and $id == $admin){
  $tx = explode(" ",$tx);
  $balance = file_get_contents("$tx[1]/balance.txt");
$token1 = file_get_contents("$tx[1]/token1.txt");
$token2 = file_get_contents("$tx[1]/token2.txt");
$token3 = file_get_contents("$tx[1]/token3.txt");
$token4 = file_get_contents("$tx[1]/token4.txt");
$token5 =
file_get_contents("$tx[1]/token5.txt");
$token6 =
file_get_contents("$tx[1]/token6.txt");
$token7 =
file_get_contents("$tx[1]/token7.txt");
$token8 =
file_get_contents("$tx[1]/token8.txt");
$token9 =
file_get_contents("$tx[1]/token9.txt");
$token10 = file_get_contents("$tx[1]/token10.txt");
$b = json_decode(file_get_contents("https://api.telegram.org/bot$token1/getMe"));
$bid = $b->result->id;
$botname = $b->result->first_name;
$c = $b->result->username;
$b2 = json_decode(file_get_contents("https://api.telegram.org/bot$token2/getMe"));
$bid2 = $b2->result->id;
$botname2 = $b2->result->first_name;
$c2 = $b2->result->username;
$b3 = json_decode(file_get_contents("https://api.telegram.org/bot$token3/getMe"));
$bid3 = $b3->result->id;
$botname3 = $b3->result->first_name;
$c3 = $b3->result->username;
$b4 = json_decode(file_get_contents("https://api.telegram.org/bot$token4/getMe"));
$bid4 = $b4->result->id;
$botname4 = $b4->result->first_name;
$c4 = $b4->result->username;
$b5 =
json_decode(file_get_contents("https://api.telegram.org/bot$token5/getMe"));
$bid5 = $b5->result->id;
$botname5 = $b5->result->first_name;
$c5 = $b5->result->username;
$b6 =
json_decode(file_get_contents("https://api.telegram.org/bot$token6/getMe"));
$bid6 = $b6->result->id;
$botname6 = $b6->result->first_name;
$c6 = $b6->result->username;
$b7 =
json_decode(file_get_contents("https://api.telegram.org/bot$token7/getMe"));
$bid7 = $b7->result->id;
$botname7 = $b7->result->first_name;
$c7 = $b7->result->username;
$b8 =
json_decode(file_get_contents("https://api.telegram.org/bot$token8/getMe"));
$bid8 = $b8->result->id;
$botname8 = $b8->result->first_name;
$c8 = $b8->result->username;
$b9 =
json_decode(file_get_contents("https://api.telegram.org/bot$token9/getMe"));
$bid9 = $b9->result->id;
$botname9 = $b9->result->first_name;
$c9 = $b9->result->username;
$b10 =  json_decode(file_get_contents("https://api.telegram.org/bot$token10/getMe"));
$bid10 = $b10->result->id;
$botname10 = $b10->result->first_name;
$c10 = $b10->result->username;
$res = "
--------1-------
🆔ID бота: $bid
🤖Имя бота: $botname
®USER бота: @$c
--------2-------
🆔ID бота: $bid2
🤖Имя бота: $botname2
®USER бота: @$c2
--------3-------
🆔ID бота: $bid3
🤖Имя бота: $botname3
®USER бота: @$c3
--------4-------
🆔ID бота: $bid4
🤖Имя бота: $botname4
®USER бота: @$c4
--------5-------
🆔ID бота: $bid5
🤖Имя бота: $botname5
®USER бота: @$c5
--------6-------
🆔ID бота: $bid6
🤖Имя бота: $botname6
®USER бота: @$c6
--------7-------
🆔ID бота: $bid7
🤖Имя бота: $botname7
®USER бота: @$c7
--------8-------
🆔ID бота: $bid8
🤖Имя бота: $botname8
®USER бота: @$c8
--------9-------
🆔ID бота: $bid9
🤖Имя бота: $botname9
®USER бота: @$c9
--------10-------
🆔ID бота: $bid10
🤖Имя бота: $botname10
®USER бота: @$c10";
  send($admin, "Id: <a href='tg://user?id=$tx[1]'>$tx[1]</a>\n Баланс: $balance\n$res");
}
if($tx == "🔙 Назад" and $id == $admin){
  if($step == "admin"){
      file_put_contents("$id/$id.step","logo");
      bot('sendMessage',[
      'chat_id'=> $id,
      'text'=>"Главный панел",
      'reply_markup'=>$adminb,
      ]);
}elseif($step == ""){
    file_put_contents("$id/$id.step","admin");
      bot('sendMessage',[
      'chat_id'=>$admin,
      'text'=>"Админ панел",
      'reply_markup'=>$adminb2,
      ]);
}}
if ($data == "da") {
$slot2 = file_get_contents("$chatid/slot.txt");
$tokend = file_get_contents("$chatid/token$slot2.txt");
exec("rm -rf $chatid/bots/bot$slot2/");
fopen("https://api.telegram.org/bot$tokend/deleteWebhook", "r");
unlink("$chatid/token$slot2.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => 'Бот успешно удален',
            'show_alert' => true
        ]);
        bot('deleteMessage', [
       'chat_id'=> $chatid,
       'message_id'=> $mid
       ]);
$lang = file_get_contents("$chatid/langue.txt");
if($lang == "ru"){
  bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>"Меню",
'reply_markup'=>$ru
    ]);
}
if($lang == "uz"){
  bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>"Menu",
'reply_markup'=>$uz
    ]);
}
}
if ($data == "net") {
     bot('deleteMessage', [
       'chat_id'=> $chatid,
       'message_id'=> $mid
       ]);
$lang = file_get_contents("$chatid/langue.txt");
if($lang == "ru"){
  bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>"Меню",
'reply_markup'=>$ru
    ]);
}
if($lang == "uz"){
  bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>"Menu",
'reply_markup'=>$uz
    ]);
}
}
if($tx == "🔙 Назад" and $id != $admin){
if($step == "load" or $step == "token" or $step == "slot" or $step == "del"){
file_put_contents("$id/$id.step","logo");
file_put_contents("$id/slot.txt","");
      bot('sendMessage',[
      'chat_id'=> $id,
      'text'=>"Главный панел",
      'reply_markup'=>$ru,
      ]);
}}
if($tx == "🔙 Назад" and $id == $admin){
if($step == "load" or $step == "token" or $step == "slot" or $step == "del" or $step == "del") {
file_put_contents("$id/$id.step","logo");
file_put_contents("$id/slot.txt","");
      bot('sendMessage',[
      'chat_id'=>$id,
      'text'=>"Главный панел",
      'reply_markup'=>$adminb,
      ]);
}
}
if($tx == '💲Bot sotib olish💲'){
     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*Assalomualaykom hurmatli yurtdoshim;
     👋Sizga qanaqa bot kerak Sizga qisqacha tõplam bilan tanishtiraman;
     📢Kanal va gruhni ulaydigan bot ochib berish 15 000 sõm kodi 5 000 som ;
     📁Hosting qiladugan bot kodi 10 ming ochib berish 20 ming;
     ⬇️yutub tiktok video yuklovchi bot kodi 20 ming sõm ochib berish 30 ming sõm
     ⏯️Va boshqalar
     👮Admin: @$koder*",
     'parse_mode'=>'markdown',
     ]);
}
if($data == "oplata"){
  bot("sendMessage",[
    'chat_id'=>$chatid,
    'text'=>"На данный момент мы принимаем только на *qiwi*\n\nДля оплати\nОплата по номеруь: * +admin orqali *\nКомментарий: *$chatid*\n\n*--------------------------\nВажно обезателно ставте коментарий иначе деньги не переведуться!*\n-----------------------------\nПосле удачной оплати деньги моментално переведуться в ваш баланс\n\n*Также можете воспользоваться кнопкой ниже для удобства*",
    'parse_mode'=>"markdown",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"👨🏻‍💻Admin",'url'=>"https://t.me/$adminuser"]]
        ]
      ])
    ]);
}




//Kodni @$adminuser qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling



#Uzbek#

if($data == 'uz'){
        bot('deleteMessage', [
       'chat_id'=> $chatid,
       'message_id'=> $mid
       ]);
       bot('sendMessage',[
     'chat_id'=>$chatid,
     'text'=>"*Botimizga xush kelibsiz, bu bot sizning php da yozilgan botlarizni xost qilish uchun*",
     'parse_mode'=>'markdown',
       'reply_markup'=> $uz,
     ]);
     file_put_contents("$chatid/langue.txt", "uz");
}
if($tx == "♻️Bot qo'shish♻️"){
if($balance >= "200"){
mkdir("$id");
mkdir("$id/bots");
mkdir("$id/bots/bot1");
mkdir("$id/bots/bot2");
mkdir("$id/bots/bot3");
mkdir("$id/bots/bot4");
mkdir("$id/bots/bot5");
mkdir("$id/bots/bot6");
mkdir("$id/bots/bot7");
mkdir("$id/bots/bot8");
mkdir("$id/bots/bot9");
mkdir("$id/bots/bot10");
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"*Slotni tanlang*",
'reply_markup'=>$slot10_uz,
'parse_mode'=>'markdown',
]);
file_put_contents("$id/.htaccess", $zashita);
file_put_contents("$id/$id.step", "slot");
$baza = file_get_contents("id.dat");
if(mb_stripos($baza, $id)!== false){
}else{
file_put_contents("id.dat", "\n".$id,FILE_APPEND);
}
}else{
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"Mablaģ yetarli mas!",
    'reply_markup'=>json_encode([
  'inline_keyboard'=>[
    [['text'=>"🔄Hisobni toldirish", 'callback_data'=>"oplata_uzb"]]
    ]
  ])
    ]);
}
}
if($tx >=1 and $tx <=10 and $tx !="🔙 Orqaga" and $step == "slot" and $langue == "uz"){
  bot('sendMessage',[
'chat_id'=>$id,
'text'=>"*Faylni yuboring, fayl php ga tugashi kerak*",
'reply_markup'=>  json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 Orqaga"]],
]
]),
'parse_mode'=>'markdown',
]);
file_put_contents("$id/slot.txt", $tx);
file_put_contents("$id/$id.step", "load");
}
if(isset($message->document) and $step == "load" and $langue == "uz"){
file_put_contents("$id/arxiv.txt", $doc_id);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$tester = file_get_contents($file);
$type = strtolower(strrchr($file,'.'));
$type=str_replace('.','',$type);
if($type == "php"){
if(!mb_stripos($tester, 'system(') !==false and !mb_stripos($tester, 'shell_exec(') !==false and !mb_stripos($tester,'$_POST')!==false and !mb_stripos($tester,'madeline')!==false and !mb_stripos($tester,'file_path')!==false and
!mb_stripos($tester,'$_GET')!==false and
!mb_stripos($tester,'$f+=1')!==false and !mb_stripos($tester,'tenxost')!==false and
!mb_stripos($tester,'$size/1024)/1024')!==false and !mb_stripos($tester,'file_get_contents("https')!==false and
!mb_stripos($tester,'setwebhook')!==false and
!mb_stripos($tester,'Unable to open file!')!==false  and
!mb_stripos($tester,'$res = $res')!==false  and !mb_stripos($tester,'$_SERVER')!==false and !mb_stripos($tester,'smartxost')!==false and !mb_stripos($tester,'fastxost')!==false and !mb_stripos($tester,'redxost')!==false and !mb_stripos($tester,'proc_popen')!==false and !mb_stripos($tester,'xvest')!==false and !mb_stripos($tester,'vbyte')!==false and !mb_stripos($tester,'<script>')!==false and !mb_stripos($tester,'<html')!==false and  !mb_stripos($tester,'exec("function.php')!==false ){
$okey = file_put_contents("$id/bots/bot$slot/$id.code.$type",file_get_contents($file));

}else{
  send($id, "Faylda eng taqiqlangan kodlar bor, Kod admin tamonidan tekshirilib chiqadi ungacha $slot - slotga file yuklamang!");

unlink("$id/bots/bot$slot/$id.code.$type");
  send($admin, "Ban $id uz");
  bot('sendDocument',[
    'chat_id'=>$admin,
    'document'=>$doc_id,
    'caption'=>"uz $id $id/bots/bot$slot/$id.code.$type $slot",
    ]);
}
}else{
  send($id, "Fayl PHP mas");
}

if($okey and filesize("$id/bots/bot$slot/$id.code.$type") < "1408071095"){
bot('sendMessage',[
'chat_id'=>$id,
'text'=>" *Fayl yuklandi endi token yuboring*",
'parse_mode'=>'markdown',
]);
file_put_contents("$id/$id.step", "token");
}elseif(filesize("$id/bots/bot$slot/$id.code.php") > "1408071095"){
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"Xato fayl 2mb dan ko'p",
'parse_mode'=>"markdown",
]);
unlink("$id/bots/bot$slot/$id.code.$type");
}

}
if($tx == $tx and $step == 'token' and $langue == "uz"){
$b = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getMe"));
$bn = $b->result->username;
if(!empty($bn)){
file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=$host_folder/$id/bots/bot$slot/$id.code.php");
$ayir = $balance-200;
file_put_contents("$id/balance.txt", $ayir);


    bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*Bot @$bn qoshildi*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $uz,
     ]);
exec("php -l $id/bots/bot$slot/$id.code.php", $ress);
  if(!strpos(file_get_contents("$id/bots/bot$slot/$id.code.php"), "$tx") and $tx != "🔙 Orqaga"){
    bot("sendMessage",[
      'chat_id'=>$id,
      'text'=>"Faylda siz yuborgan token bo'lmasligi munkun!"
      ]);
  }

$ress = $ress[0];
if($ress[0] == "E"){
  send($id, "<b>Kodizda xato bor !nKodizni toģrlang bo'masa bot ishlamaydi !</b>");
}


     file_put_contents("$id/$id.step", "logo");
     file_put_contents("$id/token$slot.txt", $tx);
       bot('sendDocument',[
  'chat_id'=>"-1001534627238",
  'document'=>file_get_contents("$id/arxiv.txt"),
  'caption'=>"BOT @$bn\nQOʻSHUVCHI ".'<a href="tg://user?id='.$id.'">'.$name."</a>\nO'ZBEKISTON VAQTI BILAN $time",
  'parse_mode'=>"html"
  ]);
     unlink("$id/arxiv.txt");


     bot('sendMessage',[
       'chat_id' => $admin,
       'text' => '<a href="tg://user?id='.$id.'">'.$name.'</a> (#'.$id.')(uz)('.$slot.') Добавил бота @'.$bn,
       'parse_mode' => 'html'
       ]);
}
  elseif(empty($bn) and $tx != "🔙 Orqaga"){
    send($id, "Xato: ishlamaydigan token");
  }


}
if($tx == "📊Statistika📈"){
$baza = file_get_contents("id.dat");
$obsh = substr_count($baza,"\n");

     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*👤Botdagi odamlar soni: $obsh*\n✅Bot versiyasi: $ver",
     'parse_mode'=>'markdown',
     ]);

}
if($tx == "🗑Botni o'chirish🗑"){
       bot('sendMessage',[
     'chat_id'=>$id,
'text'=>"Slotni tanlang",
     'parse_mode'=>'html',
     'reply_markup'=>$slot10_uz
     ]);
file_put_contents("$id/$id.step", "del");

}
if($tx >=1 and $tx <=10 and $step == "del" and $langue == "uz"){
file_put_contents("$id/slot.txt", $tx);
$slot = file_get_contents("$id/slot.txt");
if(file_exists("$id/token$slot.txt")){
$mied = bot('sendMessage',[
  'chat_id'=>$id,
  'text'=>".",
  'reply_markup'=>$del
  ]);
$mied = $mied->result->message_id;
bot('deleteMessage', [
'chat_id'=> $id,
'message_id'=> $mied
       ]);
bot('sendMessage',[
     'chat_id'=>$id,
'text'=>"Siz botni o'chirishni istaysizmi?",
     'parse_mode'=>'html',
     'reply_markup' => json_encode([
       'inline_keyboard' => [
         [['text'=> "Yoq", 'callback_data'=>"net"],['text'=> "Ha", 'callback_data'=>"da"]],
         ]])
     ]);
}else{
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"Stol bo'sh"
    ]);
}

//Kodni @$adminuser qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling


}
if($tx == "📔Qo'lanma🧾"){
     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*♻️Botni qo'shish uchun bot Qo'shish tugmasini bosing,♻️
♻️Keyin faylni yuboring va faylni yuklashni kuting, keyin tokenni yu.boring,♻️

♻️Bot faylini yangilash uchun bot Qo'shish tugmasini bosing
Keyin tokenni yuboring,♻️

♻️Yangi bot qo'shish uchun bot Qo'shish tugmasini bosing
Keyin yangi tokenni yuboring,♻️

♻️Botni olib tashlash uchun botni o'chirish tugmasini bosing va ha ni bosing♻️

♻️Agar bot hisobingizga mablagʻ oʻkazmoqchi boʻlsangiz birinchi adminga yozing♻️

🔰YANGI BUYRUQ🔰
♻️  /lang - BUYRUGʻI ORQALI BOT TILINI SOZLAY OLASIZ♻️

👮Admin: @$koder*",
     'parse_mode'=>'markdown',
     ]);
}
if($tx == "👨‍💻Admin👨‍💻"){
     bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"👨‍💻Admin: *@$koder*✅ \n🖊Menga xabar yuboring men adminga yetkazaman😉",
     'parse_mode'=>'markdown',
     'reply_markup'=> json_encode(['resize_keyboard'=>true,'keyboard'=>[[['text'=>"🔙 Orqaga"]],
]
])
     ]);
     file_put_contents("$id/$id.step", "senda");
}
if(!empty($tx) and $tx != "🔙 Orqaga" and $langue == "uz" and $step == "senda"){
  send($admin, '<a href="tg://user?id='.$id.'">'.$name.'</a> (#'.$id.')(uz) Отправил собшение:'."\n$tx");
  send($id, "Xabar yuborildi😊");
}
  if(empty($tx) and $tx != "🔙 Orqaga" and $langue == "uz" and $step == "senda"){
   bot('copyMessage', [
  'chat_id'=>$admin,
  'from_chat_id'=>$id,
  'message_id'=>$message->message_id,
  'caption'=>$caption."n".'<a href="tg://user?id='.$id.'">'.$name.'</a> (#'.$id.')(uz)',
  'parse_mode'=>'html'
  ]);

  send($id, "Fayl yuborildi😊");
}
if($tx == "🔙 Orqaga"){
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>'Bosh menu',
    'reply_markup'=>$uz
    ]);
    file_put_contents("$id/$id.step", "logo");
}
if($tx == "👤Kabinet👤"){
$b = json_decode(file_get_contents("https://api.telegram.org/bot$token1/getMe"));
$bid = $b->result->id;
$botname = $b->result->first_name;
$c = $b->result->username;
$b2 = json_decode(file_get_contents("https://api.telegram.org/bot$token2/getMe"));
$bid2 = $b2->result->id;
$botname2 = $b2->result->first_name;
$c2 = $b2->result->username;
$b3 = json_decode(file_get_contents("https://api.telegram.org/bot$token3/getMe"));
$bid3 = $b3->result->id;
$botname3 = $b3->result->first_name;
$c3 = $b3->result->username;
$b4 = json_decode(file_get_contents("https://api.telegram.org/bot$token4/getMe"));
$bid4 = $b4->result->id;
$botname4 = $b4->result->first_name;
$c4 = $b4->result->username;
$b5 =
json_decode(file_get_contents("https://api.telegram.org/bot$token5/getMe"));
$bid5 = $b5->result->id;
$botname5 = $b5->result->first_name;
$c5 = $b5->result->username;
$b6 =
json_decode(file_get_contents("https://api.telegram.org/bot$token6/getMe"));
$bid6 = $b6->result->id;
$botname6 = $b6->result->first_name;
$c6 = $b6->result->username;
$b7 =
json_decode(file_get_contents("https://api.telegram.org/bot$token7/getMe"));
$bid7 = $b7->result->id;
$botname7 = $b7->result->first_name;
$c7 = $b7->result->username;
$b8 =
json_decode(file_get_contents("https://api.telegram.org/bot$token8/getMe"));
$bid8 = $b8->result->id;
$botname8 = $b8->result->first_name;
$c8 = $b8->result->username;
$b9 =
json_decode(file_get_contents("https://api.telegram.org/bot$token9/getMe"));
$bid9 = $b9->result->id;
$botname9 = $b9->result->first_name;
$c9 = $b9->result->username;
$b10 = json_decode(file_get_contents("https://api.telegram.org/bot$token10/getMe"));
$bid10 = $b10->result->id;
$botname10 = $b10->result->first_name;
$c10 = $b10->result->username;
$den = $balance / 1;
bot('sendMessage',[
        'chat_id' => $id,
        'text' => "👤<b>Sizning ID:</b> $id
💰<b>Hisob:</b> $balance"."
💵<b>Bitta bot ulash:</b> 200 
🤑 <b>Botga Dòstingizni Taklif Qiling🇺🇿</b>

<b>https://t.me/$bot?start=$id</b>

--------1-------
🆔BOT ID: $bid
🤖Bot ismi: $botname
®Bot useri: @$c
--------2-------
🆔BOT ID: $bid2
🤖Bot ismi: $botname2
®Bot useri: @$c2
--------3-------
🆔BOT ID: $bid3
🤖Bot ismi: $botname3
®Bot useri: @$c3
--------4-------
🆔BOT ID: $bid4
🤖Bot ismi: $botname4
®Bot useri: @$c4
--------5-------
🆔BOT ID: $bid5
🤖Bot ismi: $botname5
®Bot useri: @$c5
--------6-------
🆔BOT ID: $bid6
🤖Bot ismi: $botname6
®Bot useri: @$c6
--------7-------
🆔ID бота: $bid7
🤖Имя бота: $botname7
®USER бота: @$c7
--------8-------
🆔ID бота: $bid8
🤖Имя бота: $botname8
®USER бота: @$c8
--------9-------
🆔ID бота: $bid9
🤖Имя бота: $botname9
®USER бота: @$c9
--------10-------
🆔ID бота: $bid10
🤖Имя бота: $botname10
®USER бота: @$c10",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
  'inline_keyboard'=>[
    [['text'=>"🔄Hisobni toldirish", 'callback_data'=>"oplata_uzb"]]
    ]
  ])
        ]);
}

//Kodni @$adminuser qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling

if($tx == "ℹ️Host infoℹ️"){
  send($id, " Hosting: xvest.ru
Modul: FastCGI+
Max bitta fayl hajmi 2mb(bu xotira emas)
Maks 60 sekundlik bitta skriptni bajarish vaqti

Hosting qoidalari🔰
Taqiqlangan🚫
🔴Hosting Botlar
🔴Sayt sifatida foydalaning
Ruxsat etilgan✅
🟢Avval aytilgandan boshqa hama narsa munkin😊");
}
if ($data == "ha") {
        $tokend = file_get_contents("$chatid/token.dat");
        unlink("$chatid/bot$slot/$chatid.code.php");
        exec("rm -rf $id/bot$slot/$chatid.code.php");
        fopen("https://api.telegram.org/bot$tokend/deleteWebhook", "r");
        unlink("$chatid/token.dat");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Bot o'chirib tashlandi!",
            'show_alert' => true
        ]);
        bot('deleteMessage', [
       'chat_id'=> $chatid,
       'message_id'=> $mid
       ]);

}
if ($data == "yoq") {
     bot('deleteMessage', [
       'chat_id'=> $chatid,
       'message_id'=> $mid
       ]);
}
if($tx == "🔙 Orqaga"){
if($step == "load" or $step == "token" or $step == "slot" or $step == "del"){
      file_put_contents("$id/$id.step","logo");
      bot('sendMessage',[
      'chat_id'=> $id,
      'text'=>"Bosh menu",
      'reply_markup'=>$uz,
      ]);
}}
if($tx == '💲Magazin💲'){
   bot('sendPhoto',[
    'chat_id' => $chatid,
    'photo' => 'https://t.me/filebazamoy/10',
    'text'=>"*Odiy Bot*\n- - - - - - - - -\n*Narxi:* FREEn*Useri*: Yoq",
    'parse_mode'=>"markdown",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"FREE",'callback_data'=>"FREE"]]
        ]
      ])
    ]);
       bot('sendPhoto',[
    'chat_id' => $chatid,
    'photo' => 'https://t.me/filebazamoy/6',
    'text'=>"*Pul ishlash bot*\n- - - - - - - - -\n*Narxi:* 50₽\n*Useri*: *@$bot*",
    'parse_mode'=>"markdown",
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"50₽",'callback_data'=>"50"]]
        ]
      ])
    ]);
}}}
if($data == "oplata_uzb"){
    bot("editMessagetext",[
    'chat_id'=>$chatid,
    'message_id'=>$mid,
    'text'=>"*qiwi * qabul qilamiz
CLiCK: * +admin orqali *

Tulov qilgach adminga bog'laning

Qulaylik uchun quyidagi tugmalarni ham ishlatishingiz mumkin",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
  'inline_keyboard'=>[
    [['text'=>"👨🏻‍💻Admin", "url"=>"https://t.me/$adminuser"]]
    ]
  ])]);
}
if($data == "FREE"){
  bot('sendDocument',[
    'chat_id'=>$chatid,
    'document'=>""
    ]);
}
if($data == "50"){
  $balance = file_get_contents("$chatid/balance.txt");
  $langue = file_get_contents("$chatid/langue.txt");

  if($balance > 50){
     bot('sendDocument',[
    'chat_id'=>$chatid,
    'document'=>""
    ]);
  $put = $balance - 50;
  file_put_contents("$chatid/balance.txt", $put);
  }else{
    if($langue == "ru"){
      bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => 'Недостаточна средств для покупки',
            'show_alert' => true
        ]);
    }
    if($langue == "uz"){
      bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => 'Mablaģ yetarli mas',
            'show_alert' => true
        ]);
    }
  }

}
}

if($tx == "🔗Webhook slot🔗"){
bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*Webhook qilmoqchi bo'lgan slotni tanlang*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $slot10_uz,
     ]);
file_put_contents("$id/$id.step", "webhs");
}

if($tx >=1 and $tx <=10 and $step == "webhs"){
  bot('sendMessage',[
'chat_id'=>$id,
'text'=>"*Tokenni yuboring*",
'reply_markup'=>  json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 Orqaga"]],
]
]),
'parse_mode'=>'markdown',
]);
file_put_contents("$id/slot.txt", $tx);
file_put_contents("$id/$id.step", "webh");
}

if($tx == $tx and $step == 'webh'){
$b = json_decode(file_get_contents("https://api.telegram.org/bot$tx/getMe"));
$bn = $b->result->username;
if(!empty($bn)){
file_get_contents("https://api.telegram.org/bot$tx/setwebhook?url=$host_folder/$id/bots/bot$slot/$id.code.php");

    bot('sendMessage',[
     'chat_id'=>$id,
     'text'=>"*Bot @$bn qoshildi*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $uz,
     ]);
file_put_contents("$id/token$slot.txt", $tx);
unlink("$id/$id.step");
}else{
 bot('sendMessage',[
      'chat_id'=>$id,
     'text'=>"*Token xato*",
  'parse_mode'=>'markdown',
     'reply_markup'=> $uz,
     ]);
unlink("$id/$id.step");
}
}


//Kodni @$adminuser qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling


if($tx == "Скорость"){
  $init_time = microtime(true);
  bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"Тест скорость"
    ]);
  $time = (microtime(true) - $init_time);
  send($id, $time);
}
if($tx == "dasd"){
if(!file_exists("$id/newbonus")){
file_put_contents("$id/newbonus", "");
$put = $balance + 100;
file_put_contents("$id/balance.txt", $put);
send($id, "🤓Balansingiz  100 somga to'ldirildi😘");
}}
//---------------------------admin-------------------------------
$admin = "ADMIN_ID";
$text = $update->message->text;
$chat_id = $update->message->chat->id;

if($text == '/file' and $chat_id == $admin){
bot('sendDocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile(__FILE__)
]);
}

if($tx == "🌐Bot on" and $id == $admin){
      bot('sendMessage',[
      'chat_id'=>$admin,
      'text'=>"Bot holati On",
      ]);
   file_put_contents("bot.dat", "on");
    }

if($tx == "🌐Bot off" and $id == $admin){
      bot('sendMessage',[
      'chat_id'=>$admin,
      'text'=>"Bot holati off",
      ]);
    file_put_contents("bot.dat", "off");
    }

$tx = explode(" ",$caption);
$doc=$message->document;
$doc_id=$doc->file_id;
if(isset($message->document) and $chat_id == $admin){
file_put_contents("$id/arxiv.txt", $doc_id);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$tester = file_get_contents($file);
$type = strtolower(strrchr($file,'.'));
$type=str_replace('.','',$type);
$caption = $message->caption;
$tx = explode(" ",$caption);
$urlman = $tx[2];
$okey = file_put_contents($urlman,file_get_contents($file));
if($okey){
bot('sendMessage',[
'chat_id'=>$tx[1],
'text'=>"*Botingiz muvaffaqiyatli yuklandi\nEndi $tx[3] slotni webhook qiling*",
'parse_mode'=>'Markdown',
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"*Bot yuklandi*",
'parse_mode'=>'Markdown',
]);
}
}

//Kodni @$adminuser qaytadan tikladi. Bot kodi @Web_Hosting_Uzb kanalida tarqatildi.  ILTIMOS Manba bilan oling. 

?><br />
<b>Warning</b>:  file_get_contents(https://api.telegram.org/bot746468369:AAFWAKXMXYPFOBW1LxKIeap-9ED-JLIAal8/sendmessage?chat_id=435187708&amp;text=u4753.xvest5.ru/1973951719/index.php): failed to open stream: HTTP request failed! HTTP/1.1 401 Unauthorized
 in <b>/var/www/x_u_4753/data/www/u4753.xvest5.ru/1973951719/index.php</b> on line <b>519</b><br />