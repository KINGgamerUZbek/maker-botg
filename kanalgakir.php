<?php
ob_start();
define('API_KEY','API_TOKEN');
$admin = "ADMIN_ID"; //admin id
$kanalimz ="꯭😻꯭🪐𝐗𑲦𝐔𑲰𝐑𑲰𝐒𝐇𑲰𝐈𑲰𝐃🐻𝐃𑲰𝐄𑲰𝐒𝐈𑲰𝐍𑲰𝐆𑲰𝐄𑲰𝐑🌪️꯭🌿꯭➢꯭❭🦅"; //kanal useri

   function del($nomi){
   array_map('unlink', glob("$nomi"));
   }

   function ty($ch){ 
   return bot('sendChatAction', [
   'chat_id' => $ch,
   'action' => 'typing',
   ]);
   }

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


  
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$cty = $message->chat->type;
$tx = $message->text;
$name = $message->chat->first_name;
$user = $message->from->username;
$fadmin = $message->from->id;
$ismi = $update->message->from->first_name;
$ismi2 = $update->message->from->last_name;
$reklama ="@VipBuilder_UzBot sizham o'z botingizni quring";

$balinfo = "Diqqat! Endi Ushbu Guruhda Habar Yozish Uchun $kanalimz kanaliga a'zo bo'lish shart!";

if((mb_stripos($tx,"/start")!==false) or ($tx == "/start")) {
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>$balinfo,
    ]);
}
if($tx and ($cty == "private")) {
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"💡 Bot Yaratishni Hohlaysizmi?
🤖 @VipBuilder_UzBot ga tashrif buyuring,
📡 Kanalimiz: @MASTER_PHP_1",
    ]);
}

if(isset($tx)){
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $fadmin,
  ]);
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){

    }else{
    bot('deleteMessage',[
      'chat_id'=>$cid,
      'message_id'=>$mid,
          ]);
    bot('sendMessage',[
      'chat_id'=>$cid,
      'parse_mode'=>'html',
      'text'=>"⭕️<a href='tg://user?id=$fadmin'> $ismi $ismi2 </a> Siz $kanalimz ga a'zo bo'lsangizgina bu guruhda habar yoza olasiz
$reklama",
    ]);
  }
}
?>