<?php
#======("Ushbu kod @Bordoniy tomonidan yozildi va @Personal_coders kanalida tarqatildi")=========#

/*
Warning: koddagi Method lar ichidagi bizni manbalarimizni o'zgartirsangiz bot ishlamaydi
*/
ob_start();
define('Bordoniy',"API_TOKEN"); // tokeningizni kiriting
$admin = "ADMIN_ID"; 
function msg_bordoniy($method,$datas=[]){
    $url = "https://api.telegram.org/bot".Bordoniy."/".$method;
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
$Personal_Coders = json_decode(file_get_contents('php://input'));
$message = $Personal_Coders->message;
$bordoniy = $Personal_Coders->message->chat->id;
$personal_coders= $Personal_Coders->message->text;
$logo = file_get_contents("BOrdoniy/$bordoniy.step");
Mkdir("BOrdoniy");
$PERSONAL_CODERS = $message->photo[0]->file_id;
$BORDONIY = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🍃 Chiroyingizni aniqlang"],['text'=>"🌹 Sevgingizni aniqlang"],],
]
]);
$BordoniY = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⬅️ Orqaga qaytish"]],
]
]);
if($personal_coders == "⬅️ Orqaga qaytish"){
msg_bordoniy('sendMessage',[
'chat_id'=>$bordoniy,
'text'=>"Bosh menu",
'parse_mode'=>"markdown",
'reply_markup'=>"$BORDONIY",
]);
unlink("BOrdoniy/$bordoniy.get");
unlink("BOrdoniy/$bordoniy.step");
unlink("BOrdoniy/$bordoniy.yigit");
unlink("BOrdoniy/$bordoniy.qiz");
}
if($personal_coders == "/start"){
msg_bordoniy('sendMessage',[
'chat_id'=>$bordoniy,
'text'=>"*Assalomu alaykum botimizga xush kelibsiz.*",
'parse_mode'=>"markdown",
'reply_markup'=>"$BORDONIY",
]);
}
if($personal_coders == "🌹 Sevgingizni aniqlang" and $personal_coders != "⬅️ Orqaga qaytish"){
msg_bordoniy('sendMessage',[
'chat_id'=>$bordoniy,
'text'=>"*Ismingizni kiriting*",
'parse_mode'=>"markdown",
'reply_markup'=>"$BordoniY",
]);
file_put_contents("BOrdoniy/$bordoniy.step","yigit");
}
if($logo == "yigit" and $personal_coders != "⬅️ Orqaga qaytish"){
file_put_contents("BOrdoniy/$bordoniy.yigit","$personal_coders");
msg_bordoniy('sendMessage',[
'chat_id'=>$bordoniy,
'text'=>"*Juftingiz ismini kiriting:*",
'parse_mode'=>"markdown",
]);
file_put_contents("BOrdoniy/$bordoniy.step","qiz");
}
if($logo == "qiz" and $personal_coders != "⬅️ Orqaga qaytish"){
file_put_contents("BOrdoniy/$bordoniy.qiz","$personal_coders");
$yigit = file_get_contents("BOrdoniy/$bordoniy.yigit","$personal_coders");
$qiz = file_get_contents("BOrdoniy/$bordoniy.qiz","$personal_coders");
$tek = array("27","85","77","89","62","52","95","23","77","27","32","75","36","14","41","97","99","100","53","29","88","37","64");
$rand2=rand(0,10);
$daraja_personal_coders="$tek[$rand2]";
msg_bordoniy('sendMessage',[
'chat_id'=>$bordoniy,
'text'=>"*👤 Sizning ismingiz: $yigit
👥 Juftingizni ismi: $qiz
-------------
💞 Orangizdagi sevgi: $daraja_personal_coders%*",
'parse_mode'=>"markdown",
]);
unlink("BOrdoniy/$bordoniy.step");
unlink("BOrdoniy/$bordoniy.yigit");
unlink("BOrdoniy/$bordoniy.qiz");
}
if($personal_coders == "🍃 Chiroyingizni aniqlang"){
msg_bordoniy('sendMessage',[
'chat_id'=>$bordoniy,
'text'=>"*Rasmingizni yuboring:*",
'parse_mode'=>"markdown",
'reply_markup'=>"$BordoniY",
]);
file_put_contents("BOrdoniy/$bordoniy.step","info");
}
if($logo =="info"){
file_put_contents("BOrdoniy/$bordoniy.get","$PERSONAL_CODERS");
$PERSOnal_coders=file_get_contents("BOrdoniy/$bordoniy.get"); 
$tek = array("27","85","77","89","62","52","95","23","77","27","32","75","36","14","41","97","99","100","53","29","88","37","64");
$rand2=rand(0,10);
$daraja_personal_coders="$tek[$rand2]";
msg_bordoniy("sendPhoto",[
'chat_id'=>$bordoniy,
 'photo'=>"$PERSOnal_coders",
'caption'=>"🍃 *Chiroyingiz darajasi: $daraja_personal_coders%*",
'parse_mode'=>'markdown',
]);
}