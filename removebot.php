<?php
ob_start();
define('API_KEY',"API_TOKEN");
$admin = "ADMIN_ID";
$adminuser = "ADMIN_USER";
//echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
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
}}
//=========================================================================//
$update     = json_decode(file_get_contents('php://input'));
$message    = $update->message;
$text       = $message->text;
$chat_id    = $message->chat->id;
$data       = $update->callback_query->data;
$chat_id2   = $update->callback_query->message->chat->id;
$message_id = $message->message_id;
$message_id2= $update->callback_query->message->message_id;
$name       = $message->from->first_name;
$name2      = $update->callback_query->message->chat->first_name;
$user       = $update->callback_query->message->chat->username;
$from_id    = $message->from->id;
$from_id2 = $update->callback_query->message->chat->id;
$ban        = explode("\n",file_get_contents("data/blocklist.txt"));
$member     = explode("\n",file_get_contents("data/member.txt"));
$members    = count($member)-1;
$botsmake   = count($bots_make)-1;
$banduser   = count($ban)-1;
mkdir("data");
//==========================================================================//
if($data == "infopanel" and $from_id2 == $admin){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
----------------------------------------------
Botdagi a'zolar soni:  ~>  ($members)         
----------------------------------------------
 By: @VipBuilder_UzBot @$adminuser
----------------------------------------------

",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⬅️ Orqaga qaytish','callback_data'=>'home']],
]])]);
}
//==========================================================================//
if($text == "/start" and !in_array($chat_id,$ban)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
Assalom aleykum xurmatli foydalanuvchi botimizga xush kelibsiz😊
➖➖➖➖➖➖ 
🖇 Botning vazifasi: Rasming orqa fonini qirqib tashlash
➖➖➖➖➖➖
Ishlatish uchun qo'llanma: Botga shunchaki rasm yuborasiz va tayyor! ✅
➖➖➖➖➖➖
👨‍💻Dasturchi: @$adminuser
Sizham o'z botingizni quring @VipBuilder_UzBot",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🙎‍♂️ Admin','url'=>'T.me/$adminuser']],
]])]);}
//==============================================================================//
if($message->photo){
    $data = json_decode(json_encode($message),true);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.telegram.org/bot'. API_KEY .'/getfile?file_id='.$data["photo"][count($data["photo"]) -1]["file_id"] ,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = json_decode(curl_exec($curl), true);
    curl_close($curl);
    if($response["ok"]){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sdk.photoroom.com/v1/segment',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('image_url'=> $url,
            'size' => 'auto'),
            CURLOPT_HTTPHEADER => array('x-api-key:c02fdb2035c911ee5bf94fed6842fd0425963281'),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('image_url'=> "https://api.telegram.org/file/bot". API_KEY ."/".$response["result"]["file_path"],
            'size' => 'auto'),
            CURLOPT_HTTPHEADER => array('X-Api-Key:c02fdb2035c911ee5bf94fed6842fd0425963281')),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if(json_decode($response, true)["errors"]){
            bot("sendmessage",["chat_id"=>$chat_id,"text"=>json_decode($response, true)["errors"][0]["title"]]);
        }else{
            file_put_contents("no-bg.png", $response);
            bot("senddocument", [
                "chat_id"=>$from_id,
                "document"=>new CURLFILE('./no-bg.png')
            ]);
            unlink("./no-bg.png");
        }
    }
}

//===============================================================================//
$YASEN = $update->message;
$YASEN2 = $YASEN->from->first_name;
$YASEN3 = $YASEN->from->username;
$YASEN4 = $YASEN->from->id;
if($text == "/start" and !in_array($chat_id,$member)){
file_put_contents("data/member.txt",$from_id."\n",FILE_APPEND);
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"
👨‍💻Xurmatli: Admin | @$adminuser
Foydalanuvchi nomi: $YASEN2
Foydalanuvchi logini: @$YASEN3
Foydalanuvchi 🆔: $YASEN4
",
]);
}
//===============================================================================//
if($text == "/start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
Assalom Aleykum [$name](tg://user?id=$admin)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📊Statistika','callback_data'=>'infopanel']],

]])]);}
//===============================================================================//
if($data == "home" and $from_id2 == $admin){
    bot('editmessagetext',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id2,
    'text'=>"
    Assalom Aleykum [$name2](tg://user?id=$admin)
    ",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'📊Statistika','callback_data'=>'infopanel']],
    ]])]);
}
//==========================================================================================//
echo "
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>

<p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>
";
//==========================================================================================//
# يعني تفضل الملف كامل مابيه اي اخطاء
# خلي ايديك سطر 4 و توكنك سطر 3
# المطور @P6XXX ياسين العاني 
#- - - - - - - - - - - - - - - - - - - - -  -
# Hello This File No Have Any Erorr
# Set You Token In Line 3 And Your Id In Line 4
# Devloper @P6XXX Yasen Alani
//==========================================================================================//