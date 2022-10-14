<?php
define('URL_API',"API_TOKEN");
$admin="ADMIN_ID";

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".URL_API."/".$method;
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

$update = json_decode(file_get_contents("php://input"));
#--------------oddiy------------#
$message = $update->message;
$text = $message->text;
$cid = $message->chat->id;
$mid = $message->message_id;
$uid = $message->from->id;
$fname = $message->from->first_name;
$user = $message->from->username;
##------------inline-----------#
$query = $update->callback_query;
$data = $update->callback_query->data;
$cid2 = $query->message->chat->id;
$mid2 = $update->callback_query->message->message_id;
mkdir("message");
mkdir("glob");
mkdir("key");
$step=file_get_contents("glob/$cid.step");
$start=file_get_contents("message/start.txt");
if(file_get_contents("message/start.txt")) {
	}else{file_put_contents("message/start.txt","Salom xush kelibsiz") ;
	}
if(file_get_contents("key/1.txt")) {
	}else{file_put_contents("key/1.txt","tugma kiritilmagan") ;
	}
if(file_get_contents("key/2.txt")) {
	}else{file_put_contents("key/2.txt","tugma kiritilmagan") ;
	}
if(file_get_contents("key/3.txt")) {
	}else{file_put_contents("key/3.txt","tugma kiritilmagan") ;
	}
$tugma1=file_get_contents("key/1.txt");
$tugma2=file_get_contents("key/2.txt");
$tugma3=file_get_contents("key/3.txt");

if(file_get_contents("key/t1m.txt")) {
	}else{file_put_contents("key/t1m.txt","tugma kiritilmagan") ;
	}
if(file_get_contents("key/t1m.txt")) {
	}else{file_put_contents("key/t2m.txt","xabar kiritilmagan") ;
	}
if(file_get_contents("key/t1m.txt")) {
	}else{file_put_contents("key/t3m.txt","xabar kiritilmagan") ;
	}
$t1m=file_get_contents("key/t1m.txt");
$t2m=file_get_contents("key/t2m.txt");
$t3m=file_get_contents("key/t2m.txt");




	

	if($text == "➕ Tugma qo‘shish" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"🖥️ Sizning limitingiz 3 ta tugmga qo'shishga yetadi. ",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"1️⃣-tugma"],["text"=>"2️⃣-tugma"]], 
	[["text"=>"3️⃣-tugma"]], 
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
}

if($text == "1️⃣-tugma" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"1️⃣ Birinchi tugmaga nom bering.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
file_put_contents("glob/$cid.step",1);
}


if($text == "2️⃣-tugma" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"2️⃣ Ikkinchi tugmaga nom bering.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
file_put_contents("glob/$cid.step",2);
}

if($text == "3️⃣-tugma" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"3️⃣ Uchunchi tugmaga nom bering.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
file_put_contents("glob/$cid.step",3);
}


if($step == 1) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"✔️ Nom qo‘shildi.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
unlink("glob/$cid.step");
file_put_contents("key/1.txt",$text);
}


if($step == 2) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"✔️ Nom qo‘shildi.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
unlink("glob/$cid.step");
file_put_contents("key/2.txt",$text);
}



if($step == 3) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"✔️ Nom qo‘shildi.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
unlink("glob/$cid.step");
file_put_contents("key/3.txt",$text);
}


if($text == "🏁 Start uchun xabar" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"🔘 Start xabarini kiriting.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
file_put_contents("glob/$cid.step","start");
}


if($step == "start") {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"✔️ Xabar qo‘shildi.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
unlink("glob/$cid.step");
file_put_contents("message/start.txt",$text);
}

if($text == "➕ Xabar qo‘shish" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>" Sizning limitingiz 3 ta tugmga qo'shishga yetadi. ",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"1️⃣-tugmaga xabar"],["text"=>"2️⃣-tugmaga xabar"]], 
	[["text"=>"3️⃣-tugmaga xabar"]], 
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
}




if($text == "1️⃣-tugmaga xabar" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"1️⃣-tugmaga xabar yuboring.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
file_put_contents("glob/$cid.step",10);
}


if($text == "2️⃣-tugmaga xabar" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"2️⃣ ikkinchi tugmaga xabar kiriting.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
file_put_contents("glob/$cid.step",20);
}

if($text == "3️⃣-tugmaga xabar" and $cid==$admin) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"3️⃣ Uchunchi tugmaga nom bering.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
file_put_contents("glob/$cid.step",30);
}


if($step == 10) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"✔️ Xabar qo‘shildi.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
unlink("glob/$cid.step");
file_put_contents("key/t1m.txt",$text);
}


if($step == 20) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"✔️ Xabar qo‘shildi.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
unlink("glob/$cid.step");
file_put_contents("key/t2m.txt",$text);
}



if($step == 30) {
	bot("sendmessage", [
		"chat_id"=>$admin, 
		"text"=>"✔️ Xabar qo‘shildi.",
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"↩️ Orqaga"]], 
	]]), 
]);
unlink("glob/$cid.step");
file_put_contents("key/t3m.txt",$text);
}








if($text == "$tugma1") {
	bot("sendmessage", [
		"chat_id"=>$cid, 
		"text"=>$t1m,
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"$tugma1"],["text"=>"$tugma2"]], 
	[["text"=>"$tugma3"]], 
	]]), 
]);
}

if($text == "$tugma2") {
	bot("sendmessage", [
		"chat_id"=>$cid, 
		"text"=>$t2m,
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"$tugma1"],["text"=>"$tugma2"]], 
	[["text"=>"$tugma3"]], 
	]]), 
]);
}

if($text == "$tugma3") {
	bot("sendmessage", [
		"chat_id"=>$cid, 
		"text"=>$t3m,
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"$tugma1"],["text"=>"$tugma2"]], 
	[["text"=>"$tugma3"]], 
	]]), 
]);
}


if($text=="/start") {
	if($cid !==$admin) {
bot("sendmessage", [
		"chat_id"=>$cid, 
		"text"=>$start, 
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"$tugma1"],["text"=>"$tugma2"]], 
	[["text"=>"$tugma3"]], 
	]]), 
]);
}}



if($text == "/start" and $cid==$admin or $text=="↩️ Orqaga") {
	if($cid==$admin) {
		bot("sendmessage", [
		"chat_id"=>$cid, 
		"text"=>"🤗 Salom adminstrator", 
		'reply_markup'=>json_encode([
	"resize_keyboard"=>true, 
	"keyboard"=>[
	[["text"=>"➕ Tugma qo‘shish"]], 
	[["text"=>"🏁 Start uchun xabar"]], 
	[["text"=>"➕ Xabar qo‘shish"]], 
	]]), 
]);
}
}