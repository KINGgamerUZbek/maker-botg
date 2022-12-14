<?php
//Bu bot kodi @UzkingCoder tomonidan yozilgan va @Bots_Cods Kanali orqali tarqatilgan
//Manbaga tegma
error_reporting(0);

define('API_KEY', 'API_TOKEN'); //TOKEN
//-------------------------
function bot($method,$datas=[]){
	$url = "https://api.telegram.org/bot".API_KEY."/".$method;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
	$res = curl_exec($ch);
		if(curl_error($ch)){
			var_dump(curl_error($ch));
			} 
			else 
			{
					return json_decode($res);
			}
}
function CrZip($folder_to_zip_path, $destination_zip_file_path){
        $rootPath = realpath($folder_to_zip_path);
        
        $zip = new ZipArchive();
        $zip->open($destination_zip_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath),
                RecursiveIteratorIterator::LEAVES_ONLY
        );
       
            foreach($files as $name => $file){
            if(!$file->isDir()){
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
}
function deleteFolder($path){
    if (is_dir($path) === true) {
        $files = array_diff(scandir($path), array('.', '..'));
        foreach ($files as $file)
            deleteFolder(realpath($path) . '/' . $file);
            
        return rmdir($path);
    } else if (is_file($path) === true)
        return unlink($path);
 
    return false;
}
//Bu bot kodi @UzkingCoder tomonidan yozilgan va @Bots_Cods Kanali orqali tarqatilgan
$update = file_get_contents('php://input');
$update = json_decode($update);
$message = $update->message;
$text = $message->text;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$type = $message->chat->type;
$name = $message->from->first_name;
//-------------------------
$list = file_get_contents('data/data.json');
$list = json_decode($list, true);
$step = $list['data'][$from_id]['step'];
$folder = $list['data'][$from_id]['folder'];
$users = $list['bot']['users'];
//Bu bot kodi @UzkingCoder tomonidan yozilgan va @Bots_Cods Kanali orqali tarqatilgan
$channel = "MASTER_PHP_1"; //Channel ID
@mkdir('data');
//-------------------------
if($text == "/start"){
	if(! in_array($from_id, $users)){
		$list['bot']['users'][] = $from_id;
		$list['data'][$from_id]['step'] = 'none';
		file_put_contents("data/data.json", json_encode($list));
		}
		bot('sendMessage',[
		'chat_id' => $from_id,
		'text' => "??????Salom aziz $name  ????Mening vazifam .zip fayl yaratish.
???????.zip fayl yaratish uchun quyidagi menudan foydalaning.
????Bizning kanalimiz @$channel -ga ham obuna bo'ling",
		'parse_mode' => "html",
		'reply_markup' => json_encode(['keyboard' => [
		[['text' => "????Fayl yaratish"],['text'=>"????Statistika"]],
		], 'resize_keyboard' => true
		])
		]);
	}
	//Bu bot kodi @UzkingCoder tomonidan yozilgan va @Bots_Cods Kanali orqali tarqatilgan
	elseif($text == "????Fayl yaratish"){
		$list['data'][$from_id]['step'] = "name";
		file_put_contents("data/data.json", json_encode($list));
		bot('sendMessage', [
		'chat_id' => $from_id,
		'text' => "???????.zip fayl yaratish uchun faylga nom bering ohiriga .zip kengaytmasini qo'shgan xolda.
??????asalan: VIPBUILDER.Zip",
		'parse_mode'=>"html",
'reply_markup' => json_encode(['keyboard' => [
		[['text' => "????"]]
		], 'resize_keyboard' => true,
		])
		]);
		}
		elseif($step == "name"){
			$list['data'][$from_id]['step'] = "files";
			$list['data'][$from_id]['folder'] = $text;
			file_put_contents("data/data.json", json_encode($list));
			bot('sendMessage', [
			'chat_id' => $from_id,
			'text' => "????????Zip uchun bir nechta fayl jo'natib oxirida (yani fayllarni joylab bo'lgandan so'ng).
????Tayyor tugmasini bosing",
			'reply_markup' => json_encode(['keyboard' => [
			[['text' => "????Tayyor"]],
			[['text' => "????"]]
			], 'resize_keyboard' => true,
			])
			]);
		}
		elseif($text == "????"){
			$list['data'][$from_id]['step'] = "none";
			file_put_contents("data/data.json", json_encode($list));
			bot('sendMessage',[
			'chat_id' => $from_id,
			'text' => "????Bosh menudasiz",
			'reply_markup' => json_encode(['keyboard' => [
			[['text' => "????Fayl yaratish"],['text'=>"????Statistika"]],
			], 'resize_keyboard' => true
			])
			]);
		}//Bu bot kodi @UzkingCoder tomonidan yozilgan va @Bots_Cods Kanali orqali tarqatilgan
		elseif($step == "files"){
			if($text == "????Tayyor"){
			$list['data'][$from_id]['step'] = "none";
			file_put_contents("data/data.json", json_encode($list));
			CrZip('data/'.$folder, "data/".$folder.".zip");
			bot('sendMessage', [
			'chat_id' => $from_id,
			'text' => "???? Tayyorlanmoqda... 
 ???? bir oz kuting..." 
			]);
			sleep(3);
			bot('senddocument', [
			'chat_id' => $from_id,
			'document' => new CURLFILE('data/'.$folder.'.zip'),
			'caption' => "??????Fayl tayyor bo'ldi.
????Music Kanal: @MASTER_PHP_1 .
???????Php kodlar kanali @VipBuilder_UzBot",
			'reply_markup' => json_encode(['keyboard' => [
			[['text' => "????Fayl yaratish"]]
			], 'resize_keyboard' => true
			])
			]);
			unlink("data/".$folder.".zip");
			deleteFolder("data/".$folder);
			}
			//Bu bot kodi @UzkingCoder tomonidan yozilgan va @Bots_Cods Kanali orqali tarqatilgan
			if($update->message->document){
				$file_name = $update->message->document->file_name;
				$file_id = $update->message->document->file_id;
				$pach = bot('getfile',['file_id' => $file_id]);
				$pach = $pach->result->file_path;
				mkdir("data/".$folder);
				file_put_contents("data/$folder/$file_name", file_get_contents("https://api.telegram.org/file/bot".API_KEY."/".$pach));
				bot('sendMessage', [
				'chat_id' => $from_id,
				'text' => "???? $file_name fayli muvaffaqiyatli ziplashtirildi; Iltimos, keyingi fayllarni yuboring yoki agar fayllar tugagan bo'lsa, (????Tayyor) tugmasini bosing!",
				'reply_markup' => json_encode(['keyboard' => [
				[['text' => "????Tayyor"]],
				[['text' => "????"]]
				], 'resize_keyboard' => true,
				])
				]);
			}
		}
		elseif($type != 'private'){
			bot('LeaveChat', [
			'chat_id' => $chat_id
			]);
		}
		else
		{
			bot('sendMessage', [
			'chat_id' => $from_id,
			'text' => "???Xatolik"
			]);
		}
		unlink('error_log');
//Bu bot kodi @UzkingCoder tomonidan yozilgan va @Bots_Cods Kanali orqali tarqatilgan

$lichka = file_get_contents("lichka.db");
if($type=="private"){
if(stripos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.db","$lichka\n$cid");
}
}

if($tx=="????Statistika"){
$lich = substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"?????????????????? ?????????????????? $lich ta
",
]);
}
?>