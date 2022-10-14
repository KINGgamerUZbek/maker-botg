<?php
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
const API = "API_TOKEN"; // bot tokeni

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API."/".$method;
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

/* Botni ishlatish uchun faqat gina token uzgartiring bot 100% ishlaydi @SmirkingBot */
mkdir("flood");
mkdir("ball");
$botname = bot('getme',['bot'])->result->username;
$admin = "ADMIN_ID";// admin id  
$adminuser = "ADMIN_USER";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message ?? null;
$callbackquery = $update->callback_query ?? null;
$text = $message->text ?? null;
$data = $update->callback_query->data ?? null;
$call_id = $update->callback_query->id ?? null;
$name = $message->from->first_name ?? null;

if(isset($callbackquery)){
    $text = 
    $cid = $update->callback_query->message->chat->id ?? null;  
    $type = $update->callback_query->message->chat->type ?? null;
    $mid = $update->callback_query->message->message_id ?? null;
    $from_id = $update->callback_query->from->id ?? null;
}
elseif(isset($message)){
    $from_id = $message->from->id ?? null;
    $cid = $message->chat->id ?? null;
    $type = $message->chat->type ?? null;
    $mid = $message->message_id ?? null;
}
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$userflood = file_get_contents("flood/$cid.txt") ?? null;
$userlar = file_get_contents("user.txt");
$users = substr_count($userlar,"\n"); 

$ball= file_get_contents("ball/$cid.txt");
if($type=="group" or $type == "supergroup"){
    exit();
}
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$key1=json_encode(['inline_keyboard' => [
  [['text'=>'☺️', 'callback_data' => "go"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]], 
]
]);
$key2=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "go"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  
]
]);
$key3=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "go"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
]
]);
$key4=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺️', 'callback_data' => "go"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],  
]
]);
$key5=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "go"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
]
]);
$key6=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "go"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]], 
]
]);
$key7=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺️', 'callback_data' => "go"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
]
]);
$key8=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "go"], ['text'=>'☹️', 'callback_data' => "no"]], 
]
]);
$key9=json_encode(['inline_keyboard'=>[
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "go"]],
]
]);
$key11=json_encode(['inline_keyboard' => [
  [['text'=>'☺️', 'callback_data' => "goo"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]], 
]
]);
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$key12=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "goo"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  
]
]);
$key13=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "goo"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
]
]);
$key14=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺️', 'callback_data' => "goo"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],  
]
]);
$key15=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "goo"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
]
]);
$key16=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "goo"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]], 
]
]);
$key17=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺️', 'callback_data' => "goo"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
]
]);
$key18=json_encode(['inline_keyboard' => [
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "goo"], ['text'=>'☹️', 'callback_data' => "no"]], 
]
]);
$key19=json_encode(['inline_keyboard'=>[
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "goo"]],
]
]);
/////level 2 ////////
$lvl21 =json_encode(['inline_keyboard' => [
  [['text'=>'☺️', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl22 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl23 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl24 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl2"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl25 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl26 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl27 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl2"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl28 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☺', 'callback_data' => "lvl2"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl29 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl210 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl211 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl212 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl2"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl213 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],      
  [['text'=>'☺️', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl214 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],      
  [['text'=>'☹️', 'callback_data' => "no"],  ['text'=>'☺️', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl215 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],      
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl2"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl216 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],    
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],  ['text'=>'☺️', 'callback_data' => "lvl2"]],       
]
]);
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$lvl221 =json_encode(['inline_keyboard' => [
  [['text'=>'☺️', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl222 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl223 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl224 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl22"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl225 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl226 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl227 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl22"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl228 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☺', 'callback_data' => "lvl22"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl229 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☺', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl2210 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl2211 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl2212 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl22"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl2213 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],      
  [['text'=>'☺️', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl2214 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],      
  [['text'=>'☹️', 'callback_data' => "no"],  ['text'=>'☺️', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl2215 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],      
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☺️', 'callback_data' => "lvl22"], ['text'=>'☹️', 'callback_data' => "no"]],                
]
]);
$lvl2216 =json_encode(['inline_keyboard' => [
  [['text'=>'☹️️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],['text'=>'☹️', 'callback_data' => "no"]],
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"]],    
  [['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"], ['text'=>'☹️', 'callback_data' => "no"],  ['text'=>'☺️', 'callback_data' => "lvl22"]],       
]
]);

$leve2 = array($lvl21, $lvl22, $lvl23, $lvl24, $lvl25, $lvl26, $lvl27,$lvl28,$lvl29,$lvl210,$lvl211,$lvl212,$lvl213,$lvl214, $lvl215,$lvl216);
$lev2 = array_rand($leve2);
$level2 = $leve2[$lev2];

$leve22 = array($lvl221, $lvl222, $lvl223, $lvl224, $lvl225, $lvl226, $lvl227,$lvl228,$lvl229,$lvl2210,$lvl2211,$lvl2212,$lvl2213,$lvl2214, $lvl2215,$lvl2216);
$lev22 = array_rand($leve22);
$level22 = $leve22[$lev22];

/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$main = json_encode(['inline_keyboard'=>[
  [['text'=>'Boshidan boshlash', 'callback_data' => "start"]], 
  [['text'=>'🔰 Bot haqida','callback_data'=>'about']],
  [['text'=>"Rekordchilar 🔝", 'callback_data' => "top"]],    
  [['text'=>"⤵️Do'stlarga yuborish", 'url' => "https://telegram.me/share/url?url=t.me/$botname da kulgili yuzni top o'yinini o'ynab ko'ring."]],   

  ]
]);
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$res = json_encode (['inline_keyboard'=>[
    [['text'=>"🎉 O'yinni boshlash",'callback_data'=>'start']], 
    [['text'=>'🔰 Bot haqida','callback_data'=>'about'], ['text'=>'⭐ Dasturchi','url'=>'https://t.me/$adminuser']],
    ]
]);
$rest = json_encode (['inline_keyboard'=>[
    [['text'=>"🎉 O'yinni boshlash",'callback_data'=>'start']], 
  [['text'=>"⤵️Do'stlarga yuborish", 'url' => "https://telegram.me/share/url?url=t.me/$botname da kulgili yuzni top o'yinini o'ynab ko'ring."],  ['text'=>'⭐ Dasturchi','url'=>'t.me/$adminuser']],
    ]
]);
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$help = "🔶  Men Kulib turgan yuzni top o'yiniman. Men sizga   xafa☹️ va kulib turgan☺️ emoji yuboraman siz esa kulib turgan☺️ emojini topasiz.
Ko'p ball yig'gan ishtirokchilar top 10 taligini bo'limi ham bor.

⁉️<b>O'yin qoidalari:</b>
O'yin boshlangandan so'ng sizga 5 soniya  beriladi. Shu 5  soniya ichida o'sha kulib turgan☺️ emojini topishingiz kerak. Kulib turgan☺️ emoji topsangiz, sizga 1 ball beriladi agar topolmasangiz o'yin tugaydi va ballingiz 0 dan boshlanadi. O'yinni boshlash uchun O'yinni boshlash tugmasini bosing.
👨‍💻 Bot dasturchisi: @$adminuser
🔰 Sizham o'z botingizni quring @VipBuilder_UzBot";
$keys = array($key1, $key2, $key3, $key4, $key5, $key6, $key7, $key8, $key9);
$rand = array_rand($keys);
$key = $keys[$rand];

$kays = array($key11, $key12, $key13, $key14, $key15, $key16, $key17, $key18, $key19);
$randd = array_rand($kays);
$kay = $kays[$randd];
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
$motivarray = array("Yaxshi 👍","Barakallo👏","Tasanno 🤗","Ofarin🤩","Ajoyib 🤓","Bravo 👍");
$randarray = array_rand($motivarray);
$motiv = $motivarray[$randarray];

   if(stripos($userlar,"$cid")!==false){
    }else{
    file_put_contents("user.txt","$userlar\n$cid");
   }
function edit($cid,$mid,$text,$menu){
    bot('editMessageText',[
    'chat_id'=>$cid,
     'message_id'=>$mid,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>$menu
  ]);
}
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
function send($cid,$text,$menu){
    bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>$menu
  ]);
  exit();
}

//////////loyiha boshlandi//////

$dir = 'ball'; 
$files = scandir($dir);
unset($files[0], $files[1]);
$result = [];

foreach($files as $file){
    $count = file_get_contents($dir.'/'.$file);  
    $userid = str_replace(".txt","",$file);//
    $result[$userid] = $count;
}
    arsort($result);
    $top = '';

$num = 1;
foreach($result as $userid => $count){
     if($num < 11){
        $top .= "$num) <a href='tg://user?id=$userid'>$userid</a> -- $count ta \n";
        $num++;
     }
     else{
         break;
     }
}

if(isset($message)){
if(stripos($userlar,"$cid")!==false){
}else{
    file_put_contents("statistika/user.txt","$userlar\n$cid");
}
if($text=="/start"){
    send($cid,"👋Salom $name  men kulib turgan yuzni top o'yiniman.\n❗O'ynashdan oldin bot haqida bo'limi orqali botning strukturasi bilan tanishib chiqing Sizham o'z botingizni quring @VipBuilder_UzBot",$res);
}
elseif($text=="/top"){
    send($cid,"➖➖➖🏆TOP 10🏆➖➖➖\n\n$top",$res);
}
elseif($text=="/help"){
   send($cid,$help,$res);
}
elseif($text=="/my"){
if($ball== ""){
    send($cid,"Sizda ball mavjud emas",$res);
    
}else{
    send($cid,"Siz botdan jami <b>$ball</b> ball ishlagansiz\nFaol foydalanuvchilar ro'yxati\n\n👉/top👈",$res);
}
}
elseif($text=="/stat" and $cid ==$admin){
    send($cid,"<b>👥 Botda $users ta azo bor</b>",null);
}else{
    send($cid,"Bunday buyruqga javob kiritilmagan!",$res);
}
}
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
if($data=="start"){
    $text = "Emoji topish uchun sizga 5 soniya beriladi. Vaqt qancha qolganini bot o'zi hisoblaydi va vaqtingiz tugamagan bo'lsa o'yin davom etadi agar vaqtingiz tugagan bo'lsa shu zahoti o'yin to'xtaydi.\nO'yinni boshlashga tayyormisiz?";
    $menu = json_encode (['inline_keyboard'=>[
    [['text'=>"Tayyorman 🔍",'callback_data'=>'startgo']], 
    ]
    ]);
    edit($cid,$mid,$text,$menu);
    exit();
}

if($data=="startgo"){
    unlink("ball/$cid.txt");
    edit($cid,$mid,"3️⃣...️",null);
    edit($cid,$mid,"2️⃣...",null);
    edit($cid,$mid,"1️⃣...️",null);
    edit($cid,$mid,"Boshladik✈️",null);
    edit($cid,$mid,"Emojilar ichidan kulibturganini toping.",$key);
    file_put_contents("flood/$cid.txt",time() + 5);
    exit();
}


if($data=="goo"){
    bot('answerCallbackQuery',[
    'callback_query_id'=>$call_id,
    'text'=>''
    ]);
    if($userflood == null or 0 <= (time() - $userflood)){  
        edit($cid,$mid,"😔Afsus vaqt tugadi",$main);
        exit();
    }else{
        file_put_contents("ball/$cid.txt",$ball + 1);
        edit($cid,$mid,"$motiv\n➖➖➖➖➖➖➖➖➖➖➖➖➖➖ \n<b>Sizga +1 ball berildi</b>",$key);
        unlink("flood/$cid.txt");
        file_put_contents("flood/$cid.txt",time() + 5);
        exit();
    }
}
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
if($data=="go"){
    bot('answerCallbackQuery',[
    'callback_query_id'=>$call_id,
    'text'=>''
    ]);
    if($userflood == null or 0 <= (time() - $userflood)){  
        edit($cid,$mid,"😔Afsus vaqt tugadi",$main);
        exit();
    }else{
    if($ball<25 or $ball==25){
        file_put_contents("ball/$cid.txt",$ball + 1);
        edit($cid,$mid,"<b>Sizga +1 ball berildi</b>\n➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n$motiv",$kay);
         unlink("flood/$cid.txt");
        file_put_contents("flood/$cid.txt",time() + 5);
        exit();
    }else{
        edit($cid,$mid,"$motiv \n➖➖➖➖➖➖➖➖➖➖➖➖➖➖ \n<b>Sizga +1 ball berildi</b>",$level2);
         unlink("flood/$cid.txt");
        file_put_contents("flood/$cid.txt",time() + 5);
        exit();
    }
    }
}
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
if($data=="lvl2"){
    bot('answerCallbackQuery',[
    'callback_query_id'=>$call_id,
    'text'=>''
]);
if($userflood == null or 0 <= (time() - $userflood)){  
    edit($cid,$mid,"😔Afsus vaqt tugadi",$main);
    exit();
}else{
    file_put_contents("ball/$cid.txt",$ball + 1);
    edit($cid,$mid,"<b>Sizga +1 ball berildi</b>\n➖➖➖➖➖➖➖➖➖➖➖➖➖➖ \n$motiv",$level22);
     unlink("flood/$cid.txt");
    file_put_contents("flood/$cid.txt",time() + 5);
    exit();

}
}
if($data=="lvl22"){
    bot('answerCallbackQuery',[
    'callback_query_id'=>$call_id,
    'text'=>''
    ]);
    if($userflood == null or 0 <= (time() - $userflood)){  
        edit($cid,$mid,"😔Afsus vaqt tugadi",$main);
        exit();
    }else{
        file_put_contents("ball/$cid.txt",$ball + 1);
        edit($cid,$mid,"$motiv\n➖➖➖➖➖➖➖➖➖➖➖➖➖➖ \n<b>Sizga +1 ball berildi</b>",$level2);
         unlink("flood/$cid.txt");
        file_put_contents("flood/$cid.txt",time() + 5);
        exit();
    }
}
/////php  coder   Abdukhalilov Azim   t.me/Abdukhalilov_Azim
if($data=="about"){
    edit($cid,$mid,$help,$rest);
    exit();
}if($data=="top"){
    edit($cid,$mid,$top,$rest);
}
if($data=="no"){
    edit($cid,$mid,"😔Afsus siz kulib turgan emojini topolmadingiz",$main);
     unlink("flood/$cid.txt");
    exit();
}