<?php
ob_start();
define('API_KEY','API_TOKEN');
//----------------@uzcoder_news---------------------------------//
function mahdi($method,$datas=[]){
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
//-------------@uzcoder_news------------------------//
$Dev = array("ADMIN_ID");
$usernamebot = "[BOTNAME]";
$web = "https://lordmizban.ir/Mrbertbot";
$token = API_KEY;
//-----------------------------------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$channel = file_get_contents('kanal.txt');
$channelcode = file_get_contents('kanal.txt');
$firstname = $update->callback_query->from->first_name;
$usernames = $update->callback_query->from->username;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$membercall = $update->callback_query->id;
//------------------------------------------------------------------------
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$tc = $update->message->chat->type;
$gpname = $update->callback_query->message->chat->title;
//------------------------------------------------------------------------
$forward_from = $update->message->forward_from;
$forward_from_id = $forward_from->id;
$forward_from_username = $forward_from->username;
$forward_from_first_name = $forward_from->first_name;
$reply = $update->message->reply_to_message->forward_from->id;
$reply_username = $update->message->reply_to_message->forward_from->username;
$reply_first = $update->message->reply_to_message->forward_from->first_name;
// ============@uzcoder_news============================================================
$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$from_id));
$tch = $forchannel->result->status;
$forchannelq = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
$tchq = $forchannelq->result->status;
//=================================================@uzcoder_news================================================//
function SendMessage($chat_id, $text){
mahdi('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
 function Forward($berekoja,$azchejaei,$kodompayam)
{
mahdi('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function  getUserProfilePhotos($token,$from_id) {
  $url = 'https://api.telegram.org/bot'.$token.'/getUserProfilePhotos?user_id='.$from_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result;
  return $result;
}
function getChatMembersCount($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatMembersCount?chat_id=@'.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result;
  return $result;
}
function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id=@'.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}
//--------------------------------------------------------------
@$user = json_decode(file_get_contents("data/user.json"),true);
@$juser = json_decode(file_get_contents("data/$from_id.json"),true);
@$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
//===================================================================
if(!in_array($from_id, $user["userlist"]) == true) {
$user["userlist"][]="$from_id";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
$qid = $update->callback_query->id; 
$channel_mid = $channel->message_id; 
$chanel_doc = $channel->document; 
$chanel_vid = $channel->video; 
$chanel_mus = $channel->audio; 
$chanel_voi = $channel->voice; 
$chanel_gif = $channel->animation; 
$chanel_fot = $channel->photo; 
$caption=$channel->caption;
mkdir("baza");
mkdir("start");
mkdir("data");
mkdir("[**KANAL**]");
    }
//=============@uzcoder_news=====================================================
if(in_array($from_id, $user["blocklist"])) {
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"Sen botdan foydalanolmisan! Blockdasan!",
'reply_markup'=>json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true
])
    		]);
}
if($textmassage=="/static" && $tc == "private"){	
if(in_array($from_id, $user["userlist"]) == true) {
$all = count($user["userlist"]);
$order = count($user["channellist"]);
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"???? Statistika: 
		
????Hamma userlar $all ta

????Hamma kanallar: $order ta",
		]);
		}
}
$from_id = $message->from->id;
$Ch = "[**KANAL**]"; //  Kanalingiz Userini
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel&user_id=".$from_id);

if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
mahdi('sendmessage',[
'chat_id'=>$chat_id,
    'text'=>"???????Kechirasiz do'stim  ????????

???????Botdan foydalanish uchun Kanalimizga obuna bo'lishingiz kerak????????

???????Kanalimiz
@$channel

???????Obuna Bo'lgandan sung { /start } Buyurugini Bosing????????" ,
]);return false;}

if($textmassage=="/start" && $tc == "private"){	
if(in_array($from_id, $user["userlist"]) == true) {
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"$first_name Botning asosiy menyusi ga xush kelibsiz

???? Quyidagi tugmalardan foydalaning",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"????Tanga yig`ish",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"????Odam yig`ish",'callback_data'=>'takemember'],['text'=>"???? Profilim",'callback_data'=>'accont']
   ],
   [
   ['text'=>"???? Referal ssilka",'callback_data'=>'member'],['text'=>"???? Tanga sotib olish",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"?????? Tangani sovg`a qilish",'callback_data'=>'sendcoin'],['text'=>"????Buyurtmalar",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"???????????Adminga yozish",'callback_data'=>'sup'],['text'=>"????Tanga Kodi",'callback_data'=>'code']
   ],
   [
   ['text'=>"???? Qoidalar",'callback_data'=>'help'],['text'=>"Qo'shimcha???",'callback_data'=>'addfun']
   ],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"Salom $first_name botimizga xush kelibsiz ????
Bu bot orqali siz kanalingiz Uzbek Faol  foydalanuvchilar q??shib olishingiz mumkin????!
 Botdan t??liq foydalanish uchun @$channel kanalimizga a`zo b??ling va 100 tangaga ega bo'ling",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"????Tanga yig`ish",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"????Odam yig`ish",'callback_data'=>'takemember'],['text'=>"???? Profilim",'callback_data'=>'accont']
   ],
   [
   ['text'=>"???? Referal ssilka",'callback_data'=>'member'],['text'=>"???? Tanga sotib olish",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"?????? Tangani sovg`a qilish",'callback_data'=>'sendcoin'],['text'=>"????Buyurtmalar",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"???????????Adminga yozish",'callback_data'=>'sup'],['text'=>"????Tanga Kodi",'callback_data'=>'code']
   ],
   [
   ['text'=>"???? Qoidalar",'callback_data'=>'help'],['text'=>"Qo'shimcha???",'callback_data'=>'addfun']
   ],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);
$juser = json_decode(file_get_contents("data/$from_id.json"),true);	
$juser["userfild"]["$from_id"]["invite"]="0";
$juser["userfild"]["$from_id"]["coin"]="0";
$juser["userfild"]["$from_id"]["setchannel"]="Kiritilmagan!";
$juser["userfild"]["$from_id"]["setmember"]="Kiritilmagan!";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
}
elseif(strpos($textmassage , '/start ') !== false  ) {
$start = str_replace("/start ","",$textmassage);
if(in_array($from_id, $user["userlist"])) {
mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"$first_name G`irrom qila olmaysiz shu Hol takrorlansa Botdan Haydalasiz!

???? Quyidagi tugmalardan foydalaning",
	   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"????Tanga yig`ish",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"????Odam yig`ish",'callback_data'=>'takemember'],['text'=>"???? Profilim",'callback_data'=>'accont']
   ],
   [
   ['text'=>"???? Referal ssilka",'callback_data'=>'member'],['text'=>"???? Tanga sotib olish",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"?????? Tangani sovg`a qilish",'callback_data'=>'sendcoin'],['text'=>"????Buyurtmalar",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"???????????Adminga yozish",'callback_data'=>'sup'],['text'=>"????Tanga Kodi",'callback_data'=>'code']
   ],
   [
   ['text'=>"???? Qoidalar",'callback_data'=>'help'],['text'=>"Qo'shimcha???",'callback_data'=>'addfun']
   ],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);	
}
else 
{
$juser = json_decode(file_get_contents("data/$from_id.json"),true);	
$inuser = json_decode(file_get_contents("data/$start.json"),true);
$member = $inuser["userfild"]["$start"]["invite"];
$coin = $inuser["userfild"]["$start"]["coin"];
$memberplus = $member + 1;
$coinplus = $coin  + 5;
	mahdi('sendmessage',[
	'chat_id'=>$start,
	'text'=>"Siz botga taklif qildingiz va sizga 5 tanga berildi??????

 ???? Jami t??plagan referallaringiz: $memberplus ta
????  Jami t??plagan tangalaringiz: $coinplus tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
 mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"Salom $first_name botimizga xush kelibsiz ????
Bu bot orqali siz kanalingiz Uzbek Faol foydalanuvchilar foydalanuvchilar q??shib olishingiz mumkin????!
 Botdan t??liq foydalanish uchun @$channel kanalimizga a`zo b??ling ",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"????Tanga yig`ish",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"????Odam yig`ish",'callback_data'=>'takemember'],['text'=>"???? Profilim",'callback_data'=>'accont']
   ],
   [
   ['text'=>"???? Referal ssilka",'callback_data'=>'member'],['text'=>"???? Tanga sotib olish",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"?????? Tangani sovg`a qilish",'callback_data'=>'sendcoin'],['text'=>"????Buyurtmalar",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"???????????Adminga yozish",'callback_data'=>'sup'],['text'=>"????Tanga Kodi",'callback_data'=>'code']
   ],
   [
   ['text'=>"???? Qoidalar",'callback_data'=>'help'],['text'=>"Qo'shimcha???",'callback_data'=>'addfun']
   ],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);	
$inuser["userfild"]["$start"]["invite"]="$memberplus";
$inuser["userfild"]["$start"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$start.json",$inuser);
$juser["userfild"]["$from_id"]["invite"]="0";
$juser["userfild"]["$from_id"]["coin"]="0";
$juser["userfild"]["$from_id"]["setchannel"]="Kiritilmagan!";
$juser["userfild"]["$from_id"]["setmember"]="Kiritilmagan!";
$juser["userfild"]["$from_id"]["inviter"]="$start";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif($cuser["userfild"]["$fromid"]["channeljoin"] == true){
$allchannel = $cuser["userfild"]["$fromid"]["channeljoin"];
for($z = 0;$z <= count($allchannel) -1;$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if($allchannel[$z] == true){
     mahdi('answercallbackquery', [
              'callback_query_id' =>$membercall,
            'text' => "???? Siz @$allchannel[$z] Shu kanalidan chiqib ketdingiz va Sizga 25 tanga jarima solindi! ",
            'show_alert' =>false
         ]);  
unset($cuser["userfild"]["$fromid"]["channeljoin"][$z]);
$cuser["userfild"]["$fromid"]["channeljoin"]=array_values($cuser["userfild"]["$fromid"]["channeljoin"]);  
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin - 25;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);      
}
}
if($data=="panel"){
mahdi('editmessagetext',[
        'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"$firstname Botning asosiy menyusiga qaytdingiz!

???? Quyidagi tugmalardan foydalaning!",
   	'reply_markup'=>json_encode([
  	'inline_keyboard'=>[
   [
   ['text'=>"????Tanga yig`ish",'callback_data'=>'takecoin']
   ],
    [
   ['text'=>"????Odam yig`ish",'callback_data'=>'takemember'],['text'=>"???? Profilim",'callback_data'=>'accont']
   ],
   [
   ['text'=>"????Referal ssilka",'callback_data'=>'member'],['text'=>"???? Tanga sotib olish",'callback_data'=>'bycoin']
   ],
      [
   ['text'=>"??????Tangani sovg`a qilish",'callback_data'=>'sendcoin'],['text'=>"???? Buyurtmalar",'callback_data'=>'suporder']
   ],
      [
   ['text'=>"???????????Adminga yozish",'callback_data'=>'sup'],['text'=>"????Tanga Kodi",'callback_data'=>'code']
   ],
   [
   ['text'=>"???? Qoidalar",'callback_data'=>'help'],['text'=>"Qo'shimcha???",'callback_data'=>'addfun']
   ],
  	],
	  	'resize_keyboard'=>true,
  	])
  	]);	
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["file"]="none";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
elseif($data=="takecoin" ){
$rules = $cuser["userfild"]["$fromid"]["acceptrules"];
if($rules == false){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"Kanallarga q??shilib ????Tanga ishlashdan oldin qoidalarni ??qib chiqing! S??ng??? Tanga yigish ni bosib tanga yigishni boshlashingiz mumkin!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"??? Tanga yig`ish",'callback_data'=>"takecoin"],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
[
				   ['text'=>"???? Qoidalar",'callback_data'=>'help']
				   ],
                     ]
               ])
	]);	
$cuser["userfild"]["$fromid"]["acceptrules"]="true";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
		   }
else
{
if($tchq != 'member' && $tchq != 'creator' && $tchq != 'administrator'){
$join = $cuser["userfild"]["$fromid"]["canceljoin"];
if($join == false){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Ajoyib imkoniyat ????

Bot sizga taqdim qilgan kanallarga q??shilib tanga ishlashingiz mumkin, Kanallarga azo b??lib botdan ????Tekshirish tugmasi orqali azo b??lganingizni tekshirsangiz azo b??lgan b??lsangiz bot sizga avtomatik 10 tanga beradi!

?????? Diqqat agar kanalga azo b??lib tangani ham olib kanaldan chiqib ketsangiz sizga 25 tanga jarima solinadi!

 ???? Va bundan tashqari maxsus  kodni Kanalimizdan bepul olishingiz ham mumkin!

1 ta Tanga kodini takroran ishlatish mumkin emas,
Kanalni kuzatib borsangiz har kuni kod tashlanadi yana bir imkoniyat b??ladi!

E esdan k??tarilibdiku siz avval meni Yaratgan Insonlar kanaliga azo b??lishingiz kerak s??ng tanga ishlay olasiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Kanal",'url'=>"https://t.me/$channel"],['text'=>"????Mening kanalim",'callback_data'=>'mainchannel']
				   ],
				   [
				   ['text'=>"????Tekshirish",'callback_data'=>'takecoin'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["canceljoin"]="true";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);		   
}
else
{
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Kanal haqida
 ????Kanal nomi: $name
?? Kanal Useri: @$username
???? Kanal ID raqami : $id	
???? Kanal Ma`lumoti : $description

Ushbu kanalga azo b??ling! 
S??ng botga qaytib kelib ????Tekshirish tugmasini bosing!

Agarda Kanalni 18+ ga asoslangan yomon deb topsangiz ???? Yomon kanal tugmasini bosing va u kanal adminga yuboriladi! ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Kanal",'url'=>"https://t.me/$username"],['text'=>"???? T??g`ri kanal",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"?????? Keyingi kanal",'callback_data'=>'nextchannel'],['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
				   				   [
				   ['text'=>"???? Yomon kanal",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Boshqa kanal qolmadi! Birozdan qayta urunib k??ring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Qayta urunish",'callback_data'=>'takecoin'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
else
{
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Kanal haqida
 ????Kanal nomi: $name
???? Kanal Useri: @$username
???? Kanal ID raqami : $id	
???? Kanal Ma`lumoti : $description

Ushbu kanalga azo b??ling! 
S??ng botga qaytib kelib ????Tekshirish tugmasini bosing!

Agarda Kanalni 18+ yoki Teroristlik ga asoslangan yomon deb topsangiz ???? Yomon kanal tugmasini bosing va u kanal Adminlar tomonidan k??rib chiqiladi! Agar no ??rin  Yomon kanal deb topgan b??lsangiz Sizga 10 tanga jarima solinadi! Agar kanal asosli Yomon kanal b??lsa sizga 5 tanga Sovga qilinadi ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Kanal",'url'=>"https://t.me/$username"],['text'=>"???? Tekshirish",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"??????Boshqa Kanal",'callback_data'=>'nextchannel'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"???? Yomon kanal",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Hozircha kanal qolmadi! Birozdan s??ng qayta urunib k??ring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Qayta urunish",'callback_data'=>'takecoin'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
}
elseif($data=="truechannel" ){
$getjoinchannel = $cuser["userfild"]["$fromid"]["getjoin"];
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$getjoinchannel."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
        mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "???? A`zo b??lmay turib meni loh qilmoqchimisiz? Tanga y??q???",
            'show_alert' =>true
        ]);
} 
else
{
 mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "???? Tabriklaymiz sizga 10 tanga berildi????",
            'show_alert' =>false
				   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$arraychannel = $cuser["userfild"]["$fromid"]["arraychannel"];
$coinchannel = $user["setmemberlist"];
$channelincoin = $coinchannel[$arraychannel];
$downchannel = $channelincoin - 1;
$pluscoin = $coin + 10;
$cuser["userfild"]["$fromid"]["channeljoin"][]="$getjoinchannel";
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
if($downchannel > 0){
@$user = json_decode(file_get_contents("data/user.json"),true);
$user["setmemberlist"]["$arraychannel"]="$downchannel";
$user["setmemberlist"]=array_values($user["setmemberlist"]); 
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Kanal haqida
 ????Kanal nomi: $name
???? Kanal Useri: @$username
???? Kanal ID raqami : $id	
???? Kanal Ma`lumoti : $description

Ushbu kanalga azo b??ling! 
S??ng botga qaytib kelib ????Tekshirish tugmasini bosing!

Agarda Kanalni 18+ yoki Teroristlik ga asoslangan yomon deb topsangiz ???? Yomon kanal tugmasini bosing va u kanal Adminlar tomonidan k??rib chiqiladi! Agar no ??rin  Yomon kanal deb topgan b??lsangiz Sizga 10 tanga jarima solinadi! Agar kanal asosli Yomon kanal b??lsa sizga 5 tanga Sovga qilinadi ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Kanal",'url'=>"https://t.me/$username"],['text'=>"???? Tekshirish",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"??????Boshqa Kanal",'callback_data'=>'nextchannel'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"???? Yomon kanal",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Hozircha kanallar tugadi! Birozdan s??ng qayta urunib k??ring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Qayta urunish",'callback_data'=>'takecoin'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
else
{
unset($user["setmemberlist"]["$arraychannel"]);
unset($user["channellist"]["$arraychannel"]);
$user["channellist"]=array_values($user["channellist"]); 
$user["setmemberlist"]=array_values($user["setmemberlist"]);  
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Kanal haqida
 ????Kanal nomi: $name
???? Kanal Useri: @$username
???? Kanal ID raqami : $id	
???? Kanal Ma`lumoti : $description

Ushbu kanalga azo b??ling! 
S??ng botga qaytib kelib ????Tekshirish tugmasini bosing!

Agarda Kanalni 18+ yoki Teroristlik ga asoslangan yomon deb topsangiz ???? Yomon kanal tugmasini bosing va u kanal Adminlar tomonidan k??rib chiqiladi! Agar no ??rin Yomon kanal deb topgan b??lsangiz Sizga 25 tanga jarima solinadi! Agar kanal asosli Yomon kanal b??lsa sizga 15 tanga Sovga qilinadi !",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Kanal",'url'=>"https://t.me/$username"],['text'=>"???? Tekshirish",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"??????Boshqa Kanal",'callback_data'=>'nextchannel'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"???? Yomon kanal",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Hozircha kanallar tugadi! Birozdan s??ng qayta urunib k??ring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Qayta urunish",'callback_data'=>'takecoin'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
}
elseif($data=="nextchannel" ){
 mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "???? Kanal Keyingi kanalga ??zgartirildi...",
            'show_alert' =>false
        ]);
$arraychannel = $cuser["userfild"]["$fromid"]["arraychannel"];
$plusarraychannel = $arraychannel + 1 ;
$allchannel = $user["channellist"];
for($z = $plusarraychannel;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Kanal haqida
 ????Kanal nomi: $name
???? Kanal Useri: @$username
???? Kanal ID raqami : $id	
???? Kanal Ma`lumoti : $description

Ushbu kanalga azo b??ling! 
S??ng botga qaytib kelib ????Tekshirish tugmasini bosing!

Agarda Kanalni 18+ yoki Teroristlik ga asoslangan yomon deb topsangiz ???? Yomon kanal tugmasini bosing va u kanal Adminlar tomonidan k??rib chiqiladi! Agar no ??rin Yomon kanal deb topgan b??lsangiz Sizga 25 tanga jarima solinadi! Agar kanal asosli Yomon kanal b??lsa sizga 15 tanga Sovga qilinadi ! ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Kanal",'url'=>"https://t.me/$username"],['text'=>"???? Tekshirish",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"??????Boshqa Kanal",'callback_data'=>'nextchannel'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"???? Yomon kanal",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser["userfild"]["$fromid"]["arraychannel"]="$z";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Hozircha kanallar tugadi! Birozdan s??ng qayta urunib k??ring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Qayta urunish",'callback_data'=>'takecoin'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
elseif($data=="mainchannel" ){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
        mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "???? A`zo b??lmay turib meni loh qilmoqchimisiz? Tanga y??q???",
            'show_alert' =>true
        ]);
}
else
{
 mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' =>"???? Tabriklaymiz sizga 10 tanga berildi????",
            'show_alert' =>false
        ]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin + 10;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser["userfild"]["$fromid"]["channeljoin"][]="$channel";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
@$user = json_decode(file_get_contents("data/user.json"),true);
$allchannel = $user["channellist"];
for($z = 0;$z <= count($allchannel);$z++){
$getchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$allchannel[$z]."&user_id=".$fromid));
$okchannel = $getchannel->result->status;
if($okchannel != 'member' && $okchannel != 'creator' && $okchannel != 'administrator'){
$omm = $allchannel[$z];
break;
}
}
if ($allchannel[$z] == true){
$url = file_get_contents("https://api.telegram.org/bot$token/getChat?chat_id=$allchannel[$z]");
$getchat = json_decode($url, true);
$name = $getchat["result"]["title"]; 
$username = $getchat["result"]["username"]; 
$id = $getchat["result"]["id"]; 
$description = $getchat["result"]["description"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Kanal haqida
 ????Kanal nomi: $name
???? Kanal Useri: @$username
???? Kanal ID raqami : $id	
???? Kanal Ma`lumoti : $description

Ushbu kanalga azo b??ling! 
S??ng botga qaytib kelib ????Tekshirish tugmasini bosing!

Agarda Kanalni 18+ yoki Teroristlik ga asoslangan yomon deb topsangiz ???? Yomon kanal tugmasini bosing va u kanal Adminlar tomonidan k??rib chiqiladi! Agar no ??rin Yomon kanal deb topgan b??lsangiz Sizga 25 tanga jarima solinadi! Agar kanal asosli Yomon kanal b??lsa sizga 15 tanga Sovga qilinadi ! ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Kanal",'url'=>"https://t.me/$username"],['text'=>"???? Tekshirish",'callback_data'=>'truechannel']
				   ],
				   [
				   ['text'=>"??????Boshqa Kanal",'callback_data'=>'nextchannel'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   				   				   [
				   ['text'=>"???? Yomon kanal",'callback_data'=>'badchannel']
				   ],
                     ]
               ])
			   ]);
$cuser = json_decode(file_get_contents("data/$fromid.json"),true);
$cuser["userfild"]["$fromid"]["getjoin"]="$username";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Hozircha kanallar tugadi! Birozdan s??ng qayta urunib k??ring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
				   ['text'=>"???? Qayta urunish",'callback_data'=>'takecoin'],['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);
}
}
}
elseif($data=="badchannel"){
$getjoinchannel = $cuser["userfild"]["$fromid"]["getjoin"];
	 mahdi('answercallbackquery', [
	            'callback_query_id' =>$membercall,
            'text' => "???? Shikoyatingiz Adminga yuborildi! Admin k??rib chiqadi! Agar rostdanham Yomon kanal b??lsa Adminlar sizga 15 ta beradi! Agar Yomon kanal b??lmasa 25 tanga Jarima olasiz!",
            'show_alert' =>true
        ]);
	mahdi('sendmessage',[
	'chat_id'=>$Dev[0],
	'text'=>"??????Diqqat @$getjoinchannel ushbu kanal 
	@$usernames tomonidan Yomon kanal deb topildi!????Kanalni k??rib chiqing! Agar rostdanham Yomin kanal b??lsa 15 tanga berib quyingda no ??rin b??lsa 25 tanga jarima
ID raqami $from_id????",
  	]);		
}
elseif($data=="accont"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$setmember = $cuser["userfild"]["$fromid"]["setmember"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Siz haqingizdagi ma`lumot:
			   
???? Tangalaring: $coin tanga
????S??ngi saqlangan kanalingiz: $setchannel
????Oxirgi odamlarning soni: $setmember
???? Referallaringiz : $invite
???? Nickingiz: $firstname
???? Useringiz: @$usernames
???? ID raqamingiz: $fromid",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"?????? A'zo bo'lgan kanallarim",'callback_data'=>'mechannel'],['text'=>"???? Buyurtma",'callback_data'=>'order']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="mechannel"){
$allchannel = $cuser["userfild"]["$fromid"]["channeljoin"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."???? "."@".$allchannel[$z]."\n";
}
if($result == true){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"????Siz A'zo bo'lib tanga olgan kanallaringiz:
	
$result

Eslatma: Agar shu kanallardan chiqib ketsangiz 25 tanga jarima olasiz",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
}	
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"????Siz Hali hech qanday kanalga qo'shilganingiz yo'q !

Tanga tig'ishning eng oson yo'li  har bir kanalga q??shilib tanga olishdir.

Siz kanalingizga a'zolarni tanga evaziga qo'shasiz ?????? ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel'],['text'=>"???? Tanga yig`ish",'callback_data'=>'takecoin']
				   ],
				   ]
            ])           
  	]);		
}
}
elseif($data=="order"){
$allchannel = $cuser["userfild"]["$fromid"]["listorder"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."???? ".$allchannel[$z]." Tugallanmagan!"."\n";
}
if($result == true){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"???? A'zo qo'shish uchun berilgan buyurtmalaringiz :

$result

Bu bo'lim orqali buyurtm haqida ma'lumot olasiz????",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
}
else
{
$coin = $cuser["userfild"]["$fromid"]["coin"];
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"Siz hali kanalingizga a'zo qo'shish uchun buyurtma bermagansiz ???? 

???? Siz 100 dan ortiq tanga yigib kanalingizga a'zo qo'shish uchun buyurtma berishingiz mumkin! 
????Tangalar  soni : $coin tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel'],['text'=>"???? Odam yig`ish",'callback_data'=>'takemember']
				   ],
				   ]
            ])           
  	]);		
}
}
elseif($data=="member"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
		mahdi('sendphoto',[
	'chat_id'=>$chatid,
	'photo'=>"https://t.me/Aktiv_subcribers/3",
	'caption'=>"???? @$usernamebot

Bu bot orqali kanalingizga Aktiv Faol Uzbek foydalanuvchilar q??shib olishingiz mumkin 

Referal ssilkangiz :
https://t.me/$usernamebot?start=$fromid",
    		]);
	mahdi('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"???? Yuqoridagi ssilkani Kanallarga Guruhlarga Va D??stlaringizga yuboring!
	
???? Sizning referal ssilkangizdan kirgan va oldin bu botdan foydalanmagan har bir d??stingiz uchun 5 tangadan oling!

????T??plagan tangalarngiz : $coin tanga
????Taklif qilgan d??stlaringiz : $invite ta",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);			
}
elseif($data=="lotto"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
		mahdi('sendphoto',[
	'chat_id'=>$chatid,
	'photo'=>"https://t.me/Aktiv_subcribers/3",
	'caption'=>"???? Omad Lotto bo'limiga Hush Kelibsiz

Siz bu bo'lim orqali 20 tanga tikib 100 tanga yutib olishingiz mumkin

Qanday qilib deysizmi? 
Siz bizga 20 ta berasiz biz sizni qatnashchilar safiga qo'shib qo'yamiz

Qatnashchilar soni 10 tadan oshsa Random.org sayti orqali g'olibni aniqlab olamiz

Random.org sayti orqali tasodifiy raqamlar generatori bu ishni bajaradi

Eslatma
Kim g'olib bo'lishi bizga bog'liq emas",
    		]);
	mahdi('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"???? Yuqoridagilarni hammasini diqqat bilan o'qib chiqing!
	
???? Agar Maqul bo'lsa ??????Roziman tugmasini bosing!

????T??plagan tangalarngiz : $coin tanga

Eslatma
Siz ??????Roziman tugmasini bosishingiz bilan 20 tanga yechib olinadi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"??????Roziman",'callback_data'=>'lottoqat'],['text'=>"???? Ortga",'callback_data'=>'addfun']
				   ],
				   ]
            ])           
  	]);			
}
elseif($data=="lottoqat"){
$coin = $cuser["userfild"]["$fromid"]["coin"];
$qatnash = $user["Lottoqatnash"];
$qatna = $qatnash +1;	
$usernames = $update->callback_query->from->username;
$first_name = $message->from->first_name;
$name = $message->from->first_name;
if($coin >= 20){
 mahdi('editmessagetext',[
                'chat_id'=>$chatid,
                'message_id'=>$messageid,
               'text'=>"???? Sizni Tabriklaymiz ????

????Siz Omad Lottoning $qatna - Raqamli ishtirokchisiga aylandingiz!

??????Faqat Siz uchun yana bir imkoniyat siz uchun yana Omad Lottoda qatnashish imkonini beramiz",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh Menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
          mahdi('sendmessage',[
        	'chat_id'=>"@$channelcode",
        	'text'=>"??????Omad Lottodan yangi ishtirokchi

???? Siz ham ishtirok eting va 100 tanga egasi bo'ling

???? $qatna - Raqamli ishtirokchi 

????Username : @$usernames
????ID : $chatid

????  Botimiz : @$usernamebot",
 ]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin - 20;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
$user["Lottoqatnash"]="$qatna";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????  Omad Lottoda qatnashish uchun tanga yetarli emas!
			   
??????  Omad Lottoda qatnashish uchun eng kamida 20 tanga b??lishi kerak! 

????Tangalaringiz : $coin tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Ortga",'callback_data'=>'addfun'],['text'=>"???? Tanga yig`ish",'callback_data'=>'takecoin']
				   ],
                     ]
               ])
			   ]);	
}
}
elseif($data=="reklama"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
		mahdi('sendphoto',[
	'chat_id'=>$chatid,
	'photo'=>"https://t.me/Aktiv_subcribers/3",
	'caption'=>"???? Reklama bo'limiga Hush Kelibsiz

Siz bu bo'lim orqali 200 tanga tikib kanalingiz guruxingiz yoki botingizni shu bot(va botning kanali) orqali reklama qilib olishingiz mumkin

Qanday qilib deysizmi? 
Siz bizga 200 tanga berasiz 

So'ngra kanalingiz gruxingiz yoki botingiz reklamasini forward qilib botga tashlaysiz

Reklama terroristlikka diniy aqida parastlikka asoslangan yoki 18+ reklama bo'lmasligi kerak

Eslatma
Siz jo'natgan reklama avvalo adminlar tominidan ko'rib chiqiladi

Agar shartlarimizga tog'ri kelsa 24 soat ichida bot(va botning kanali)ga tashlanadi",
    		]);
	mahdi('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"???? Yuqoridagilarni hammasini diqqat bilan o'qib chiqing!
	
???? Agar Maqul bo'lsa ??????Roziman tugmasini bosing!

????T??plagan tangalarngiz : $coin tanga

Eslatma
Siz ??????Roziman tugmasini bosishingiz bilan 200 tanga yechib olinadi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"??????Roziman",'callback_data'=>'reklam'],['text'=>"???? Ortga",'callback_data'=>'addfun']
				   ],
				   ]
            ])           
  	]);			
}

elseif($data=="reklam"){
$coin = $cuser["userfild"]["$fromid"]["coin"];
if($coin >= 200){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
                'message_id'=>$messageid,
               'text'=>"????Reklamangizni Forward qilib jo'nating 
Sizning hisobingizdan 200 tanga yechib olindi!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh Menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
$cuser["userfild"]["$fromid"]["file"]="sendsup";
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin - 200;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendsup') {
         mahdi('editmessagetext',[
        	'chat_id'=>$chat_id,
        'message_id'=>$messageid,
        	'text'=>"????Reklamangiz Adminga Yuborildi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh Menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
mahdi('ForwardMessage',[
'chat_id'=>$Dev[0],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);	
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Reklama berish uchun tanga yetarli emas!
			   
??????  Reklama berish uchun eng kamida 200 tanga b??lishi kerak! 

????Tangalaringiz : $coin tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Ortga",'callback_data'=>'addfun'],['text'=>"???? Tanga yig`ish",'callback_data'=>'takecoin']
				   ],
                     ]
               ])
			   ]);	
}
}
elseif($data=="skrip"){
$invite = $cuser["userfild"]["$fromid"]["invite"];
$coin = $cuser["userfild"]["$fromid"]["coin"];
		mahdi('sendphoto',[
	'chat_id'=>$chatid,
	'photo'=>"https://t.me/Aktiv_subcribers/3",
	'caption'=>"???? Bot Skripti bo'limiga Hush Kelibsiz

Siz bu bo'lim orqali 500 tanga berib botimizning php kodi olish imkoniga ega bo'lasiz

Qanday qilib deysizmi? 
Siz bizga 500 tanga berasiz 

So'ngra sizga hozirda ishlab turgan php kodni beramiz

Hech havotir olmang biz bergan php kod hozirda botga ulangan ishlaydigan php koddir

Eslatma
Sizga kod berilgan taqdirda ham mualliflik huquqi saqlab qolinadi",
    		]);
	mahdi('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"???? Yuqoridagilarni hammasini diqqat bilan o'qib chiqing!
	
???? Agar Maqul bo'lsa ??????Roziman tugmasini bosing!

????T??plagan tangalarngiz : $coin tanga

Eslatma
Siz ??????Roziman tugmasini bosishingiz bilan 200 tanga yechib olinadi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"??????Roziman",'callback_data'=>'skript'],['text'=>"???? Ortga",'callback_data'=>'addfun']
				   ],
				   ]
            ])           
  	]);			
}
elseif($data=="skript"){
$coin = $cuser["userfild"]["$fromid"]["coin"];
if($coin >= 500){
mahdi('sendDocument',[
                'chat_id'=>$chatid,
                'reply_to_message_id'=>$mid,
 'document'=>"https://t.me/kallgxavalkajzhejhnc/3",
               'caption'=>"@$usernamebot kodi ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Ortga",'callback_data'=>'addfun']
				   ],
                     ]
               ])
			   ]);	
$coin = $cuser["userfild"]["$fromid"]["coin"];
$pluscoin = $coin - 500;
$cuser["userfild"]["$fromid"]["coin"]="$pluscoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? @$usernamebot kodini olish uchun tanga yetarli emas!
			   
??????  @$usernamebot kodini olish uchun eng kamida 500 tanga b??lishi kerak! 

????Tangalaringiz : $coin tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Ortga",'callback_data'=>'addfun'],['text'=>"???? Tanga yig`ish",'callback_data'=>'takecoin']
				   ],
                     ]
               ])
			   ]);	
}
}
elseif($data=="addfun"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???Qo'shimcha bo'limga hush kelibsiz",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"??????Omad Lotto",'callback_data'=>"lotto"],['text'=>"????Reklama",'callback_data'=>"reklama"]
				   ],
				[
['text'=>"???????Bot Kodi",'callback_data'=>'skrip']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="sendcoin"){	

mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"???? Siz ??z tangangizni yubormoqchi b??lgan d??stingizni Id raqamini yoki biror xabarini menga forward qilib yuboring!

Eslatma: Siz yubormoqchi bo'lgan tanga aniq tushadi lekin id raqamni noto'g'ri kiritsangiz biz bunga javob bermaymiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
$cuser["userfild"]["$fromid"]["file"]="sendcoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);		
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendcoin') {
$coin = $juser["userfild"]["$from_id"]["coin"];
if($forward_from == true){
if($forward_from_id != $from_id){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Qabul qilindi???
			
U haqida malumot:
???? Nicki : $forward_from_first_name
???? Usernamesi: @$forward_from_username
???? ID raqami: $forward_from_id

Endi unga ??tkaziladigon tanga sonini yuboring!
???? Sizda hozir: $coin tanga bor",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh Menyu
",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setsendcoin";
$juser["userfild"]["$from_id"]["sendcoinid"]="$forward_from_id";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? ??zingizga tanga yuborish mumkin emas !

Boshqa bir foydalanuvchiga tanga yuborish uchun uni xabarini forward qilib yuboring  yoki ID  doimiy faoliyat yurituvchi raqamini yuboring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
if($textmassage != $from_id){
if(is_numeric($textmassage)){
$stat = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$textmassage&user_id=".$textmassage);
$statjson = json_decode($stat, true);
$status = $statjson['ok'];
if($status == 1){
$name = $statjson['result']['user']['first_name'];
$username = $statjson['result']['user']['username'];
$id = $statjson['result']['user']['id'];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Qabul qilindi???
			
U haqida malumot:
???? Nicki : $name
????Usernamesi : @$username
????ID raqami : $id

Endi unga ??tkaziladigon tanga sonini yuboring!
???? Sizda hozir: $coin tanga bor",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setsendcoin";
$juser["userfild"]["$from_id"]["sendcoinid"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? ID raqam t??gri emas

???? Diqqat bilan etihor berib yuboring!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? ID kiritilmagan emas

???? Diqqat bilan tekshirish yuqori aniqlikda kiriting iltimos",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? ??zingizga tanga yuborish mumkin emas !

Boshqa bir foydalanuvchiga tanga yuborish uchun uni xabarini forward qilib yuboring  yoki ID  doimiy faoliyat yurituvchi raqamini yuboring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);	
}
}
}	
elseif($juser["userfild"]["$from_id"]["file"] == "setsendcoin"){
$coin = $juser["userfild"]["$from_id"]["coin"];
$userid = $juser["userfild"]["$from_id"]["sendcoinid"];
$inuser = json_decode(file_get_contents("data/$userid.json"),true);
$coinuser = $inuser["userfild"]["$userid"]["coin"];
if($textmassage <= $coin && $coin > 0){
$coinplus = $coin - $textmassage;
$sendcoinplus = $coinuser + $textmassage;
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"Tanga ??ktazish muvaffaqiyat yakunlandi!

???? Ma'lumotlar :
???? ID raqami: $userid
??tkazilgan tanga soni????: $textmassage tanga
Sizda qolgan tanga soni????: $coinplus tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
		mahdi('sendmessage',[
	'chat_id'=>$userid,
	'text'=>"????Sizga  $textmassage tanga ??tkazildi!

???? Tanga ??tkazgan odam :
???? ID raqami: $from_id
 ??????tkazuvchi: @$username",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
$juser["userfild"]["$from_id"]["file"]="none";
$juser["userfild"]["$from_id"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
$inuser["userfild"]["$userid"]["coin"]="$sendcoinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$userid.json",$inuser);	
}
else
{
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"??????tkazish uchun yetarli tangalar  y??q 

????Tangangiz $coin tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
}
}
elseif($data=="suporder"){
$allchannel = $cuser["userfild"]["$fromid"]["listorder"];
for($z = 0;$z <= count($allchannel)-1;$z++){
$result = $at.$result."???? ".$allchannel[$z]." Yakunlanmagan!"."\n";
}
if($result == true){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Buyutmalar xolati
      
????????????
????Sizning buyurtmalaringiz ro'yhati:

???? $result

Agar boshqa kanal ham qo'shgan bo'lsangiz @ belgisi bilan yozib yuboring:",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
$cuser["userfild"]["$fromid"]["file"]="setorder";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"Siz hali ham kanalizga a'zo qo'shish uchun buyutma bermadingiz???? 

???? A'zo qo'shish tugmasini bosing va buyurtma bering",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel'],['text'=>"????A'zo qo'shish",'callback_data'=>'takemember']
				   ],
                     ]
               ])
			   ]);	
}
}
elseif($juser["userfild"]["$from_id"]["file"] == "setorder"){
$searchchannel = array_search($textmassage,$user["channellist"]);
$setmember = $user["setmemberlist"][$searchchannel];
if(preg_match('/^(@)(.*)/s',$textmassage)){
if($searchchannel == true){
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"???? Bularning hammasi Azo t??plash maqsadida amalga oshirilmoqda 

Sizning ma'lumot  

???? ID channel : $textmassage
A'zolari qolgan soni????: $setmember

???? Agar birin bir muammo bo'lsa Admin bilan bog'laning!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
}
else
{
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"????Buyurtma bajarildi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);		
}
}
else
{
		mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"????Bunday yuborish notog`ri hisoblanadi 

???? T??gri tushunishga harakat qiling iltimos 
????Misol : @$channel",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
				   ]
            ])           
  	]);	
}
}
elseif($data=="takemember"){
$coin = $cuser["userfild"]["$fromid"]["coin"];
if($coin >= 100){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Kanalizga a'zo q??shishingiz mumkin! Kanalingiz @ username sini yuboring!
??? Namuna @$channel",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
$cuser["userfild"]["$fromid"]["file"]="setchannel";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Kanal q??shish uchun tanga yetarli emas!
			   
??????  Kanal q??shish uchun eng kamida 100 tanga b??lishi kerak! 

????Tangalaringiz : $coin tanga",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel'],['text'=>"???? Tanga yig`ish",'callback_data'=>'takecoin']
				   ],
                     ]
               ])
			   ]);	
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setchannel') {
if(preg_match('/^(@)(.*)/s',$textmassage)){
$coin = $juser["userfild"]["$from_id"]["coin"];
$max = $coin / 10;
$maxmember = floor($max);
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Kanal???
			
???? Kanal : $textmassage


?????? Kanalingizga $maxmember ta odam q??shgani tangangiz yetadi!
????Sizdagi tangalar : $coin tanga

???? 1 ta odam narxi = 10????Tanga

Kerakli odam sonini yuboring??? ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="setmember";
$juser["userfild"]["$from_id"]["setchannel"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"????Bunday yuborish not??g`ri hisoblanadi, 
??? Misol 
 @$channel Shunday",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setmember') {
$coin = $juser["userfild"]["$from_id"]["coin"];
$setchannel = $juser["userfild"]["$from_id"]["setchannel"];
$max = $coin / 10;
$maxmember = floor($max);
if($maxmember >= $textmassage){
$howmember = getChatMembersCount($setchannel,$token);
$endmember = $howmember + $textmassage;
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"?????? New : 

???? Kanal: $setchannel
???? Text: $textmassage
???? Hozirgi odamlari : $howmember
???? Q??shilgandan keyingi odamlar: $endmember 

Botni adminlikdan olmang! Agar adminlikdan olsangiz bot kanalingizga odam q??shmaydi!

Kanalingiz malumotlari t??gri b??lsa ???T??g`ri tugmasini bosing",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"??? T??g`ri",'callback_data'=>'trueorder']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel'],['text'=>"???? Buyurtmalar",'callback_data'=>'help']
				   ],
                     ]
               ])
 ]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser["userfild"]["$from_id"]["setmember"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? $maxmember soni yoki undan k??proq yoki k??p azo olishingiz mumkin emas,
 a'zo sonini bir qator bunday kiriting
??? Misol : 10",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif($data=="trueorder"){
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$admin = getChatstats(@$setchannel,$token);
if($admin != true){
	       mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "Bot kanalda adminlar r??yxatiga olinmagan! Admin qilib qayta uruning!",
            'show_alert' =>true
        ]);
}
else
{
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???Buyurtma muvaffaqiyatli r??yxatdan ??tdi

???? Eslatma Botni kanal adminlari qatoridan olmang!
Buyurtmangiz uzog'i bilan 5 kunda bajariladi albatta hozircha
??????Qoidalar ??qib chiqing bu keyinchalik qiyinchilikga duch kelganingizda sizga yordam beradi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel'],['text'=>"????Qoidalar",'callback_data'=>'help']
				   ],
                     ]
               ])
			   ]);	
$coin = $cuser["userfild"]["$fromid"]["coin"];
$setchannel = $cuser["userfild"]["$fromid"]["setchannel"];
$setmember = $cuser["userfild"]["$fromid"]["setmember"];
$pluscoin = $setmember * 10;
$coinplus = $coin - $pluscoin;
$cuser["userfild"]["$fromid"]["coin"]="$coinplus";
$cuser["userfild"]["$fromid"]["listorder"][]="$setchannel -> $setmember";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
$user["channellist"][]="$setchannel";
$user["setmemberlist"][]="$setmember";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
}
}
elseif($data=="bycoin"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"????Odam q??shish uchun tanga yetmayabdimi? ????Tanga sotib olishingiz mumkin!????Tanga sotib olish uchun ????Admin bilan bog`laning",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"???????????Dasturchi & ????Admin",'url'=>"t.me/[**ADMINUSER**]"],['text'=>"????Kanalimiz",'url'=>"t.me/$channel"]
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="help"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"?????? Bot haqida:
????????????
????  @$usernamebot bot komandaning @Muhammadali_coder tomonidan qayta dasturlashtirilgan

 Xabarlarning barcha huquqlari va matnlari va robotning dastlabki kodlari saqlanib qolinadi va har qanday nusxa olish jarayoni jinoiy javobgarlikka tortiladi.

???? @$channel  - Kanallarni rivojlantiruvchi loyiha!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="rules"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"?????? Botning buyruq va shartlari:
????????????
1???Agar siz robotga noma'qul bir kanalni r??yxatdan ??tkazsangiz, sizning buyurtmangiz ham robot tomonidan bloklanadi

2???Agar siz bir necha marta xabar yuborib, robotga spam yuborsangiz robotdan blokirovka qilinasiz

3??? Buyurtmani bajarish uchun  + bolishiga bot javobgar emas.

4??? Agar tanga not??g'ri uzatilgan bo'lsa, qo'llab-quvvatlash hech qanday javobgarlikni o'z zimmasiga olmaydi, shuning uchun tanga ko'chirishda ehtiyot bo'ling.

5??? Ulangan tangalar to'liq avtomatlashtirilsa, biron bir muammoga duch kelsangiz yordamga murojaat qiling",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="coinandmember"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"?????? ??? Ro'yxatdan:
????????????
1??? Har bir kanalga obuna bo'lish orqali tanga oling
2?????? Siz qoshilgan kanaldan chiqib ketsangiz -25 tanga yoqotasiz
3???Har bir a'zoni kanalizga qo'shish uchun 10 ta tanga to'lashingiz kerak",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="qu"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"?????? Kop beriladigam savollar:
????????????
???Buyurtmani qancha muddat ichida to'ldirasiz?
???Bot foydalanuvchilari qanchalik k??p b??lsa shunchalik buyurtma t??ldirilishi tezlashadi  shu tufayli buyurtma qanchada t??ldirilishiga aniq muddat q??ya olmaymiz! Chunki bu foydalanuvchilar Aktiv Uzbek b??ladi!

???Tanga qande sotib olsam boladi?
???Agar tanga sotib olmoqchi bolsangiz admin bilan boglaning

???Tangamni kimgadir topshirsam bo'ladimi?
???Xa, Faqat u odamni sozini  Forward qilib yoki ID raqam orqali amalga oshirilishi mumkin",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="whyadmin"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"?????????Nimaga bot adminlar qatoriga o'rnatish kerak?
????????????
???? Sizning kanalingizdagi boshqaruvchingiz kanali a'zolaringiz ro'yxatini ko'rish va tanga olishni yoki tanga pasayishini hisoblash uchun administrator bo'lishi kerak.

???Agar siz botni olib tashlasangiz, buyurtmani bot bekor qiladi va hisobingiz bloklanadi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="howadmin"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"?????? Botni adminstrator qilish

1?????? Birinchi Kanal Sozlamalarini bosing
2?????? Keyin adminstrators qatorini bosing
3?????? Keyin adminstrators q??shish belgisini bosing!
4?????? Keyin qidiruvni bosing bot manzilini kiriting [@$usernamebot]
5?????? Keyin botimiz chiqadi ustiga bosing hammasiga ruxsat berib Adminstrator qiling
???? Axborotlashtirish va telekommunikatsiya texnologiyalari davlat ro'yxatiga Bot nomi joylashgan ekanligini ko'rasiz 

@$channel Kanallar uchun foydali loyiha????",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="about"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"?????? Ushbu robotdan qanday foydalanishni bilib oling:
????????????
10 tanga oling
Tangalarni to'plash uchun asosiy robot menyusidagi Tanga yigish tugmasidan foydalaning.Har bir kanaldan keyin robotga qaytib, tanga tugmasidan foydalaning.
Agar muammo yuzaga kelsa va an'anaviy bo'lmagan kanal yoki kanallar obuna bo'lsa va tanga olmasangiz, hisobot tugmasini bosing va keyingi tugmani bosing.

Ro'yxatdan bo'lish 2??????
Tangani qabul qilib taqsimlangandan so'ng, sizning kanalingizga a'zo bo'lish vaqti keldi. Sizning a'zoligingizni qabul qilish uchun kamida 10 ta tanga bo'lishi kerak.
 Buyurtma qilingan kanaldagi robot to'g'ri ishlashi uchun administrator bo'lishi kerak, agar robot o'chirilsa, buyurtma bekor qilinadi.
???? Buyurtma beriladigan kanal umumiy kanal bo'lishi kerak

3-bo'lim
???? Do'stlaringizni robotga o'zlarining maxsus havolalari bilan taklif qilish orqali pullarni olishingiz mumkin
Siz taklif qilayotganlar tomonidan pul sotib olsangiz, 20% sizga Porsche-ni sotib olingan miqdorda beradi.

4- Pulning nomi:
Agar siz robotga kiritadigan birinchi shaxs bo'lsangiz, tanga kodi qiymatini olishingiz mumkin bo'lgan koddir.
???? Pul kodi @$channel kanalida joylashtirilgan va har bir tanga kodining qiymati administrator tomonidan o'rnatiladi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="howuser"){
		mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"Botning buyruq va shartlari:
????????????
1???Agar siz robotga noma'qul bir kanalni ro'yxatdan o'tkazsangiz, sizning buyurtmangiz ham robot tomonidan bloklanadi

2???Agar siz bir necha marta xabar yuborib, robotga spam yuborsangiz robotdan blokirovka qilinadi

3??? Buyurtmani bajarish uchun  + bolishiga bot javobgar emas.

4??? Agar tanga noto'g'ri uzatilgan bo'lsa, qo'llab-quvvatlash hech qanday javobgarlikni o'z zimmasiga olmaydi, shuning uchun tanga ko'chirishda ehtiyot bo'ling.

5??? Ulangan tangalar to'liq avtomatlashtirilsa, biron bir muammoga duch kelsangiz yordamga murojaat qiling! ",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   				   [
['text'=>"????Qonunlar Shartlar",'callback_data'=>'rules'],['text'=>"????Pul qutisi + Ro`yhatadan o`tish",'callback_data'=>'coinandmember']
				   ],
				   				   				   [
['text'=>"????Umumiy savollar",'callback_data'=>'qu'],['text'=>"????Administratsiya qilish",'callback_data'=>'whyadmin']
				   ],
				   			   				   				   [
['text'=>"????Bot haqida",'callback_data'=>'about'],['text'=>"????Ishlatish qo`llanmasi",'callback_data'=>'howuser']
				   ],
				   			   				   				   [
['text'=>"????Bot boshqaruvchi",'callback_data'=>'howadmin']
				   ],
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
}
elseif($data=="code"){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Tanga kodi bo'limiga xush kelibsiz

@$channelcode yuborilgan tanga kodini yuboring

Tanga kodini to'ldirish va o'chirish yoki biron narsa qo'shmasdan yuborishingiz mumkin

 Qo'llanmada tanga kodi haqida qo'shimcha ma'lumotni ko'ring",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh memyu",'callback_data'=>'panel'],['text'=>"????Qoidalar",'callback_data'=>'help']
				   ],
                     ]
               ])
			   ]);	
$cuser["userfild"]["$fromid"]["file"]="takecodecoin";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'takecodecoin') {
$code = $user["codecoin"];
$usernames = $update->callback_query->from->username;
if ($textmassage == $code) {
$coincode = $user["howcoincode"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? Sizni Tabriklaymiz ????

????Siz 1-b??lib kodni yubordingiz va  $coincode tanga yutib oldingiz!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh Menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>"@$channelcode",
        	'text'=>"????Tanga Kod ishlatildi

???? Va bu koddan qayta foydalanish mumkin emas 

???? 1-Foydalangan g'olib:

??Nick : $first_name
????ID : $from_id
????Username : $usernames
????  Bot : @$usernamebot",
 ]);
unset($user["codecoin"]);
unset($user["howcoincode"]);
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
$coin = $juser["userfild"]["$from_id"]["coin"];
$coinplus = $coin + $coincode;
$juser["userfild"]["$from_id"]["coin"]="$coinplus";
$juser["userfild"]["$fromid"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"????Kod notog`ri yoki uni sizdan oldin ishlatib b??lishgan!

???? @$channelcode kanalini doimo kuzatib boring va 1-b??lib kodni yuboring va Tangani oling!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh Menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
}
}
elseif($data=="sup"){
mahdi('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'text'=>"???? Adminga yozish b??limizga xush kelibsiz!
               
               Xabaringizni yozing men Adminga yuboraman!",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh Menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
			   ]);	
$cuser["userfild"]["$fromid"]["file"]="sendsup";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);	
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendsup') {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"????Xabaringiz Adminga Yuborildi",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh Menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
mahdi('ForwardMessage',[
'chat_id'=>$Dev[0],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
	elseif($update->message && $update->message->reply_to_message && in_array($from_id,$Dev) && $tc == "private"){
	mahdi('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"Sizning xabar yuborildi"
		]);
	mahdi('sendmessage',[
        "chat_id"=>$reply,
        "text"=>" ???? Admindan Xabar

`$textmassage`",
'parse_mode'=>'MarkDown'
		]);
}
if(file_get_contents("data/$fromid.txt") == "true"){
$pluscoin = file_get_contents("data/".$fromid."coin.txt");
$inviter = $cuser["userfild"]["$fromid"]["inviter"];
$invitercoin = $pluscoin / 100 * 20;
	       mahdi('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "???? Tangalar sotib q??shib bor ...",
            'show_alert' =>false
        ]);
		         mahdi('sendmessage',[
        	'chat_id'=>$inviter,
        	'text'=>"???? Soni : $invitercoin tangalar

???? Sifatida komissiyasi sotib olish sizdan qo'shilgan edi tangalar uchun",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"???? Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$coin = $cuser["userfild"]["$fromid"]["coin"];
$coinplus = $coin + $pluscoin;
$cuser["userfild"]["$fromid"]["coin"]="$coinplus";
$cuser = json_encode($cuser,true);
file_put_contents("data/$fromid.json",$cuser);
$inuser = json_decode(file_get_contents("data/$inviter.json"),true);
$coininviter = $inuser["userfild"]["$inviter"]["coin"];
$coinplusinviter = $coininviter + $invitercoin ;
$inuser["userfild"]["$inviter"]["coin"]="$coinplusinviter";;
$inuser = json_encode($inuser,true);
file_put_contents("data/$inviter.json",$inuser);
unlink("data/".$fromid."coin.txt");
unlink("data/$fromid.txt");
}
//==============================================================
//panel admin
elseif($textmassage=="/panel" or $textmassage=="panel" or $textmassage=="flils"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
mahdi('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"salom Admin b??limiga xush kelibsiz",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"????Stat"],['text'=>"????Qora r??yhat"]                  
		 ],
 	[
	  	['text'=>"????Send"],['text'=>"????For Send"]
	  ],
	   	[
['text'=>"????List kanal"],['text'=>"????Del kanal"]
	  ],
	  	   	[
['text'=>"????Tanga q??shish"],['text'=>"????Tanga ayrish"]
	  ],
	  	  	   	[
['text'=>"????Tanga kodi"],['text'=>"????Tanga tarqat"]
	  ],
	  	  	  	  	   	[
['text'=>"????Del Block"]
	  ]
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
}
}
elseif($textmassage=="???? Orqaga"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
mahdi('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"Assalomu alaykum Admin Asosiy b??limga qaydingiz",
         'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"????Stat"],['text'=>"????Qora r??yhat"]                  
		 ],
 	[
	  	['text'=>"????Send"],['text'=>"????For Send"]
	  ],
	   	[
['text'=>"????List kanal"],['text'=>"????Del kanal"]
	  ],
	  	   	[
['text'=>"????Tanga q??shish"],['text'=>"????Tanga ayrish"]
	  ],
	  	  	   	[
['text'=>"????Tanga kodi"],['text'=>"????Tanga tarqat"]
	  ],
	 	[
	  	['text'=>"????Kanal Qo'shish"],['text'=>"????Omad Lottodan G'olibni aniqlash"]
	  ],
	  	  	  	   	[
['text'=>"????Del Block"]
	  ]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
}
elseif($textmassage=="????Stat"){
if (in_array($from_id,$Dev)){
$all = count($user["userlist"]);
$order = count($user["channellist"]);
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"???? Statistika: 
		
????Hamma userlar $all ta

????Hamma kanallar: $order ta",
                'hide_keyboard'=>true,
		]);
		}
}
elseif($textmassage=="????Qora r??yhat"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"Qora r??yhatga q??shiladigon foydalanuvchi xabarini forward qilib yuboring",
   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="block";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'block') {
if ($textmassage != "???? Orqaga") {
if ($forward_from == true) {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Qabul qilindi??????

???? ID raqami: $forward_from_id
???? Usernamesi: @$forward_from_username

????Endi botdan foydalana olmaydi!",
	  'reply_to_message_id'=>$message_id,
 ]);
$juser["blocklist"][]="$forward_from_id";
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"U muvaffaqiyat bilan  bloklandi???

????ID : $textmassage",
	  'reply_to_message_id'=>$message_id,
 ]);
$juser["blocklist"][]="$textmassage";
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
}
elseif ($textmassage == '????Send' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Xabar matnini kiriting????",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="sendtoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendtoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
if ($textmassage != "???? Orqaga") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Xabar hammaga yuborildi??????",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
     mahdi('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"$textmassage",
        ]);
}
}
}
elseif ($textmassage == '????For Send' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Xabarni yuboring! Men uni Forward xabar qilib hammaga yuboraman",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="fortoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'fortoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$numbers = $user["userlist"];
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
if ($textmassage != "???? Orqaga") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Forward xabar hammaga yuborildi???",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
Forward($numbers[$z], $chat_id,$message_id);
}
}
}
elseif($textmassage=="????List kanal"){
if (in_array($from_id,$Dev)){
$order = $user["channellist"];
$ordercount = count($user["channellist"]);
for($z = 0;$z <= count($order)-1;$z++){
$result = $result.$order[$z]."\n";
}
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"????Botga hozir $ordercount ta kanal odam q??shish uchun zakaz bergan
		
Kanallar Username lari
$result",
                'hide_keyboard'=>true,
		]);
		}
}
elseif($textmassage=="????Del kanal"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"???? ??chiriladigon Kanal username sini yuboring 
Namuna : @$channel",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="remorder";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'remorder') {
if ($textmassage != "???? Orqaga") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"B??ldi bu kanal ??chirildi???",
	  'reply_to_message_id'=>$message_id,
 ]);
$how = array_search($textmassage,$user["channellist"]);
unset($user["setmemberlist"][$how]);
unset($user["channellist"][$how]);
$user["channellist"]=array_values($user["channellist"]); 
$user["setmemberlist"]=array_values($user["setmemberlist"]);
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);  
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif($textmassage=="????Tanga q??shish"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"Tanga q??shiladigon foydalanuvchi xabarini forward qilib yuboring????",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="adminsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'adminsendcoin') {
if ($textmassage != "???? Orqaga") {
if ($forward_from == true) {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Qabul qilindi??????

???? ID raqami: $forward_from_id
???? Usernamesi: @$forward_from_username

???Endi tanga sonini yuboring!",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$forward_from_id";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"????Qabul qilindi
????Ushbu foydalanuvchiga $textmassage tanga q??shildi",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$textmassage";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sethowsendcoin') {
if ($textmassage != "???? Orqaga") {
$id = $juser["idforsend"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"????Tanga soni $textmassage tanga!  ID raqami $id",
	  'reply_to_message_id'=>$message_id,
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>$id,
        	'text'=>"???? Sizga Admin tomonidan $textmassage tanga q??shildi",
			               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$inuser = json_decode(file_get_contents("data/$id.json"),true);
$coin = $inuser["userfild"]["$id"]["coin"];
$coinplus = $coin + $textmassage;
$inuser["userfild"]["$id"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$id.json",$inuser);
}
}
elseif($textmassage=="????Tanga ayrish"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"Tanga ayriladigon foydalanuvchini xabarini menga forward qilib yuboring????",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="adminsendcoin2";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'adminsendcoin2') {
if ($textmassage != "???? Orqaga") {
if ($forward_from == true) {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Qabul qilindi??????

???? ID raqami: $forward_from_id
???? Usernamesi: @$forward_from_username

????Endi tanga sonini yuboring!",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$forward_from_id";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin2";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
else
{
	         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? Qabul qilindi
????Ushbu foydalanuvchidan $textmassage tanga ayrildi",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["idforsend"]="$textmassage";
$juser["userfild"]["$from_id"]["file"]="sethowsendcoin2";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sethowsendcoin2') {
if ($textmassage != "???? Orqaga") {
$id = $juser["idforsend"];
         mahdiphp('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"????Tanga soni $textmassage tanga!  ID raqami $id ",
	  'reply_to_message_id'=>$message_id,
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>$id,
        	'text'=>"???? Sizdan Admin tomonidan $textmassage tanga olib tashlandi",
			               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
 ]);
$inuser = json_decode(file_get_contents("data/$id.json"),true);
$coin = $inuser["userfild"]["$id"]["coin"];
$coinplus = $coin - $textmassage;
$inuser["userfild"]["$id"]["coin"]="$coinplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$id.json",$inuser);
}
}
elseif($textmassage=="????Tanga kodi"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"Tanga kodini kiriting! Tanga kodi Harf Yoki Raqam b??lishi mumkin!????
Tanga kodi [@$channelcode] kanalida elon qilinadi! ",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="setcodecoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'setcodecoin') {
if ($textmassage != "???? Orqaga") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? Tanga kodi yaratildi endi tanga sonini kiriring!",
	  'reply_to_message_id'=>$message_id,
 ]);
$user["codecoin"]="$textmassage";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
$juser["userfild"]["$from_id"]["file"]="howcodecoin";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'howcodecoin') {
if ($textmassage != "???? Orqaga") {
$code = $user["codecoin"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? Tanga kodi @$channelcode ga yuborildi",
	  'reply_to_message_id'=>$message_id,
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>"@$channelcode",
        	'text'=>"???? Yangi tanga kodi yaratildi!????
??????
???? Kim birinchi bo'lib ushbu kodni botga kiritsa, xisobiga tanga tushadi:

???? Tanga kodi: $code

????  Tanga miqdori $textmassage tanga

???? Botga kirish????: $usernamebot",
 ]);
$user["howcoincode"]="$textmassage";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
}
}
elseif($textmassage=="????Omad Lottodan G'olibni aniqlash"){
if (in_array($from_id,$Dev)){
		$qatnash = $user["Lottoqatnash"];
		$soni = rand(1,$qatnash);
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
        	'text'=>" $soni - raqamli ishtirokchi g'olib bo'ldi. @$channel kanalga kirib o'sha ishtirokchini topib unga 100 tanga o'tkazib bering.Aytgancha Ishtirokchilar tarixi tozalandi.",
	  'reply_to_message_id'=>$message_id,
 ]);
          mahdi('sendmessage',[
        	'chat_id'=>"@$channelcode",
        	'text'=>"???? Omad Lottodan G'olib Aniqlandi!????
??????
???? $qatnash ta ishtirokchilar orasidan random orqali aniqlandi

???? Golib $soni - raqamli ishtirokchi

????  Yutib olgan Tanga miqdori 100 tanga

???? Botga kirish????: @$usernamebot",
		]);
$user["Lottoqatnash"]="0";
$user = json_encode($user,true);
file_put_contents("data/user.json",$user);
		}
}
elseif($textmassage=="????Kanal Qo'shish"){
if (in_array($from_id,$Dev)){
				mahdi('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"Maxsus kod yuborilarigan kanal usernamesini kiriting.!????
@ siz jo'nating. Misol: [**KANAL**] ,Yuborish kerak: [**KANAL**] ",
  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
		]);
$juser["userfild"]["$from_id"]["file"]="kanal";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
		}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'kanal') {
if ($textmassage != "???? Orqaga") {
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"???? Kanal kiritildi. Endi Maxsus Kod @$textmassage shu kanalga tashlanadi
Botini kanalga super admin qilib qo'ying",
	  'reply_to_message_id'=>$message_id,
 ]);
file_put_contents("kanal.txt",$textmassage);	
}
}
elseif ($textmassage == '????Tanga tarqat' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Tanga sonini kiriting! Hammaga tarqatiladi????",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"???? Orqaga"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["$from_id"]["file"]="sendcointoall";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["$from_id"]["file"] == 'sendcointoall') {
$juser["userfild"]["$from_id"]["file"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id.json",$juser);	
if ($textmassage != "???? Orqaga") {
$numbers = $user["userlist"];
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"$textmessage tanga hammaga tarqatildi???",
	  'reply_to_message_id'=>$message_id,
 ]);
for($z = 0;$z <= count($numbers)-1;$z++){
   mahdi('sendmessage',[
          'chat_id'=>$numbers[$z],        
		  'text'=>"???? Sovg`alani dodasi????

???? Sizning hisobingizga Admin tomonidan $textmassage tanga q??shildi!",
          'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"????Bosh menyu",'callback_data'=>'panel']
				   ],
                     ]
               ])
        ]);
$juser = json_decode(file_get_contents("data/$numbers[$z].json"),true);
$coin = $juser["userfild"]["$numbers[$z]"]["coin"];
$coinplus = $coin + $textmassage;
$juser["userfild"]["$numbers[$z]"]["coin"]="$coinplus";
$juser = json_encode($juser,true);
file_put_contents("data/$numbers[$z].json",$juser);	
}
}
}
elseif($update->message->text != true){ 
	mahdi('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"Bot guruhlarda ishlamaydi! Botni lichkasiga /start deb yuboring",
	  	]);
}
elseif ($textmassage == '????Del Block' ) {
if (in_array($from_id,$Dev)){
         mahdi('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"Block ichidagi foydalanuvchilar blockdan olindi",
	  'reply_to_message_id'=>$message_id,
 ]);
$user = (file_get_contents("data/user.json"));
file_put_contents("data/backup.json",$user);	
}
}
unlink("error_log");
/*
@uzcoder_news
????????????????????? a'zo bo'lila
@uzcoder_news 
*/
?>