<?php
/*
 * Dasturchi: Elbek Khamdullaev (https://t.me/KhamdullaevUz)
 */

$token = "API_TOKEN";
define('API_KEY',$token); 

$admin = "ADMIN_ID";

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

function send($chid, $tx){
	bot('sendMessage',[
    'chat_id'=>$chid,
    'text'=>$tx
	]);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$nick = $message->from->first_name;
$fnick = $message->from->last_name;
$user_id = $message->from->id;


if ($text == "/start"){
    bot('sendMessage',[
    'chat_id' => $chat_id,
    'text' => "👋 Salom *$nick $fnick* botimizga xush kelibsiz!\nSiz bizning botimizda 16 xil nick yasay olasiz.",
    'parse_mode'=>'markdown'
    ]);
}

if(isset($text) and $text !== "/start"){
$text = str_replace("q", "𝐪", $text);
$text = str_replace("w", "𝐰", $text);
$text = str_replace("e", "𝐞", $text);
$text = str_replace("r", "𝐫", $text);
$text = str_replace("t", "𝐭", $text);
$text = str_replace("y", "𝐲", $text);
$text = str_replace("u", "𝐮", $text);
$text = str_replace("i", "𝐢", $text);
$text = str_replace("o", "𝐨", $text);
$text = str_replace("p", "𝐩", $text);
$text = str_replace("a", "𝐚", $text);
$text = str_replace("s", "𝐬", $text);
$text = str_replace("d", "𝐝", $text);
$text = str_replace("f", "𝐟", $text);
$text = str_replace("g", "𝐠", $text);
$text = str_replace("h", "𝐡", $text);
$text = str_replace("j", "𝐣", $text);
$text = str_replace("k", "𝐤", $text);
$text = str_replace("l", "𝐥", $text);
$text = str_replace("z", "𝐳", $text);
$text = str_replace("x", "𝐱", $text);
$text = str_replace("c", "𝐜", $text);
$text = str_replace("v", "𝐯", $text);
$text = str_replace("b", "𝐛", $text);
$text = str_replace("n", "𝐧", $text);
$text = str_replace("m", "𝐦", $text);

$text = str_replace("Q", "𝐐", $text);
$text = str_replace("W", "𝐖", $text);
$text = str_replace("E", "𝐄", $text);
$text = str_replace("R", "𝐑", $text);
$text = str_replace("T", "𝐓", $text);
$text = str_replace("Y", "𝐘", $text);
$text = str_replace("U", "𝐔", $text);
$text = str_replace("I", "𝐈", $text);
$text = str_replace("O", "𝐎", $text);
$text = str_replace("P", "𝐏", $text);
$text = str_replace("A", "𝐀", $text);
$text = str_replace("S", "𝐒", $text);
$text = str_replace("D", "𝐃", $text);
$text = str_replace("F", "𝐅", $text);
$text = str_replace("G", "𝐆", $text);
$text = str_replace("H", "𝐇", $text);
$text = str_replace("J", "𝐉", $text);
$text = str_replace("K", "𝐊", $text);
$text = str_replace("L", "𝐋", $text);
$text = str_replace("Z", "𝐙", $text);
$text = str_replace("X", "𝐗", $text);
$text = str_replace("C", "𝐂", $text);
$text = str_replace("V", "𝐕", $text);
$text = str_replace("B", "𝐁", $text);
$text = str_replace("N", "𝐍", $text);
$text = str_replace("M", "𝐌", $text);

send($chat_id, $text);
$text = $message->text;

################

$text = str_replace('a', 'ᗩ', $text);
$text = str_replace('b', 'ᗷ', $text);
$text = str_replace('c', 'ᑕ', $text);
$text = str_replace('d', 'ᗪ', $text);
$text = str_replace('e', 'E', $text);
$text = str_replace('f', 'ᖴ', $text);
$text = str_replace('g', 'G', $text);
$text = str_replace('h', 'ᕼ', $text);
$text = str_replace('i', 'I', $text);
$text = str_replace('j', 'ᒍ', $text);
$text = str_replace('k', 'K', $text);
$text = str_replace('l', 'ᒪ', $text);
$text = str_replace('m', 'ᗰ', $text);
$text = str_replace('n', 'ᑎ', $text);
$text = str_replace('o', 'O', $text);
$text = str_replace('p', 'ᑭ', $text);
$text = str_replace('q', 'ᑫ', $text);
$text = str_replace('r', 'ᖇ', $text);
$text = str_replace('s', 'ᔕ', $text);
$text = str_replace('t', 'T', $text);
$text = str_replace('u', 'ᑌ', $text);
$text = str_replace('v', 'ᐯ', $text);
$text = str_replace('w', 'ᗯ', $text);
$text = str_replace('x', '᙭', $text);
$text = str_replace('y', 'Y', $text);
$text = str_replace('z', 'ᘔ', $text); 

$text = str_replace('A', 'ᗩ', $text);
$text = str_replace('B', 'ᗷ', $text);
$text = str_replace('C', 'ᑕ', $text);
$text = str_replace('D', 'ᗪ', $text);
$text = str_replace('E', 'E', $text);
$text = str_replace('F', 'ᖴ', $text);
$text = str_replace('G', 'G', $text);
$text = str_replace('H', 'ᕼ', $text);
$text = str_replace('I', 'I', $text);
$text = str_replace('J', 'ᒍ', $text);
$text = str_replace('K', 'K', $text);
$text = str_replace('L', 'ᒪ', $text);
$text = str_replace('M', 'ᗰ', $text);
$text = str_replace('N', 'ᑎ', $text);
$text = str_replace('O', 'O', $text);
$text = str_replace('P', 'ᑭ', $text);
$text = str_replace('Q', 'ᑫ', $text);
$text = str_replace('R', 'ᖇ', $text);
$text = str_replace('S', 'ᔕ', $text);
$text = str_replace('T', 'T', $text);
$text = str_replace('U', 'ᑌ', $text);
$text = str_replace('V', 'ᐯ', $text);
$text = str_replace('W', 'ᗯ', $text);
$text = str_replace('X', '᙭', $text);
$text = str_replace('Y', 'Y', $text);
$text = str_replace('Z', 'ᘔ', $text);

send($chat_id, $text);
$text = $message->text;

###################

$text = str_replace('a', '𝕒', $text);
$text = str_replace('b', '𝕓', $text);
$text = str_replace('c', '𝕔', $text);
$text = str_replace('d', '𝕕', $text);
$text = str_replace('e', '𝕖', $text);
$text = str_replace('f', '𝕗', $text);
$text = str_replace('g', '𝕘', $text);
$text = str_replace('h', '𝕙', $text);
$text = str_replace('i', '𝕚', $text);
$text = str_replace('j', '𝕛', $text);
$text = str_replace('k', '𝕜', $text);
$text = str_replace('l', '𝕝', $text);
$text = str_replace('m', '𝕞', $text);
$text = str_replace('n', '𝕟', $text);
$text = str_replace('o', '𝕠', $text);
$text = str_replace('p', '𝕡', $text);
$text = str_replace('q', '𝕢', $text);
$text = str_replace('r', '𝕣', $text);
$text = str_replace('s', '𝕤', $text);
$text = str_replace('t', '𝕥', $text);
$text = str_replace('u', '𝕦', $text);
$text = str_replace('v', '𝕧', $text);
$text = str_replace('w', '𝕨', $text);
$text = str_replace('x', '𝕩', $text);
$text = str_replace('y', '𝕪', $text);
$text = str_replace('z', '𝕫', $text); 

$text = str_replace('A', '𝔸', $text);
$text = str_replace('B', '𝔹', $text);
$text = str_replace('C', 'ℂ', $text);
$text = str_replace('D', '𝔻', $text);
$text = str_replace('E', '𝔼', $text);
$text = str_replace('F', '𝔽', $text);
$text = str_replace('G', '𝔾', $text);
$text = str_replace('H', 'ℍ', $text);
$text = str_replace('I', '𝕀', $text);
$text = str_replace('J', '𝕁', $text);
$text = str_replace('K', '𝕂', $text);
$text = str_replace('L', '𝕃', $text);
$text = str_replace('M', '𝕄', $text);
$text = str_replace('N', 'ℕ', $text);
$text = str_replace('O', '𝕆', $text);
$text = str_replace('P', 'ℙ', $text);
$text = str_replace('Q', 'ℚ', $text);
$text = str_replace('R', 'ℝ', $text);
$text = str_replace('S', '𝕊', $text);
$text = str_replace('T', '𝕋', $text);
$text = str_replace('U', '𝕌', $text);
$text = str_replace('V', '𝕍', $text);
$text = str_replace('W', '𝕎', $text);
$text = str_replace('X', '𝕏', $text);
$text = str_replace('Y', '𝕐', $text);
$text = str_replace('Z', 'ℤ', $text); 

send($chat_id, $text);
$text = $message->text;

##################

$text = str_replace('a', '𝓪', $text);
$text = str_replace('b', '𝓫', $text);
$text = str_replace('c', '𝓬', $text);
$text = str_replace('d', '𝓭', $text);
$text = str_replace('e', '𝓮', $text);
$text = str_replace('f', '𝓯', $text);
$text = str_replace('g', '𝓰', $text);
$text = str_replace('h', '𝓱', $text);
$text = str_replace('i', '𝓲', $text);
$text = str_replace('j', '𝓳', $text);
$text = str_replace('k', '𝓴', $text);
$text = str_replace('l', '𝓵', $text);
$text = str_replace('m', '𝓶', $text);
$text = str_replace('n', '𝓷', $text);
$text = str_replace('o', '𝓸', $text);
$text = str_replace('p', '𝓹', $text);
$text = str_replace('q', '𝓺', $text);
$text = str_replace('r', '𝓻', $text);
$text = str_replace('s', '𝓼', $text);
$text = str_replace('t', '𝓽', $text);
$text = str_replace('u', '𝓾', $text);
$text = str_replace('v', '𝓿', $text);
$text = str_replace('w', '𝔀', $text);
$text = str_replace('x', '𝔁', $text);
$text = str_replace('y', '𝔂', $text);
$text = str_replace('z', '𝔃', $text); 

$text = str_replace('A', '𝓐', $text);
$text = str_replace('B', '𝓑', $text);
$text = str_replace('C', '𝓒', $text);
$text = str_replace('D', '𝓓', $text);
$text = str_replace('E', '𝓔', $text);
$text = str_replace('F', '𝓕', $text);
$text = str_replace('G', '𝓖', $text);
$text = str_replace('H', '𝓗', $text);
$text = str_replace('I', '𝓘', $text);
$text = str_replace('J', '𝓙', $text);
$text = str_replace('K', '𝓚', $text);
$text = str_replace('L', '𝓛', $text);
$text = str_replace('M', '𝓜', $text);
$text = str_replace('N', '𝓝', $text);
$text = str_replace('O', '𝓞', $text);
$text = str_replace('P', '𝓟', $text);
$text = str_replace('Q', '𝓠', $text);
$text = str_replace('R', '𝓡', $text);
$text = str_replace('S', '𝓢', $text);
$text = str_replace('T', '𝓣', $text);
$text = str_replace('U', '𝓤', $text);
$text = str_replace('V', '𝓥', $text);
$text = str_replace('W', '𝓦', $text);
$text = str_replace('X', '𝓧', $text);
$text = str_replace('Y', '𝓨', $text);
$text = str_replace('Z', '𝓩', $text); 

send($chat_id, $text);
$text = $message->text;

##################

$text = str_replace('a', '𝚊', $text);
$text = str_replace('b', '𝚋', $text);
$text = str_replace('c', '𝚌', $text);
$text = str_replace('d', '𝚍', $text);
$text = str_replace('e', '𝚎', $text);
$text = str_replace('f', '𝚏', $text);
$text = str_replace('g', '𝚐', $text);
$text = str_replace('h', '𝚑', $text);
$text = str_replace('i', '𝚒', $text);
$text = str_replace('j', '𝚓', $text);
$text = str_replace('k', '𝚔', $text);
$text = str_replace('l', '𝚕', $text);
$text = str_replace('m', '𝚖', $text);
$text = str_replace('n', '𝚗', $text);
$text = str_replace('o', '𝚘', $text);
$text = str_replace('p', '𝚙', $text);
$text = str_replace('q', '𝚚', $text);
$text = str_replace('r', '𝚛', $text);
$text = str_replace('s', '𝚜', $text);
$text = str_replace('t', '𝚝', $text);
$text = str_replace('u', '𝚞', $text);
$text = str_replace('v', '𝚟', $text);
$text = str_replace('w', '𝚠', $text);
$text = str_replace('x', '𝚡', $text);
$text = str_replace('y', '𝚢', $text);
$text = str_replace('z', '𝚣', $text); 

$text = str_replace('A', '𝙰', $text);
$text = str_replace('B', '𝙱', $text);
$text = str_replace('C', '𝙲', $text);
$text = str_replace('D', '𝙳', $text);
$text = str_replace('E', '𝙴', $text);
$text = str_replace('F', '𝙵', $text);
$text = str_replace('G', '𝙶', $text);
$text = str_replace('H', '𝙷', $text);
$text = str_replace('I', '𝙸', $text);
$text = str_replace('J', '𝙹', $text);
$text = str_replace('K', '𝙺', $text);
$text = str_replace('L', '𝙻', $text);
$text = str_replace('M', '𝙼', $text);
$text = str_replace('N', '𝙽', $text);
$text = str_replace('O', '𝙾', $text);
$text = str_replace('P', '𝙿', $text);
$text = str_replace('Q', '𝚀', $text);
$text = str_replace('R', '𝚁', $text);
$text = str_replace('S', '𝚂', $text);
$text = str_replace('T', '𝚃', $text);
$text = str_replace('U', '𝚄', $text);
$text = str_replace('V', '𝚅', $text);
$text = str_replace('W', '𝚆', $text);
$text = str_replace('X', '𝚇', $text);
$text = str_replace('Y', '𝚈', $text);
$text = str_replace('Z', '𝚉', $text); 

send($chat_id, $text);
$text = $message->text;

################

$text = str_replace("q", "𝙦", $text);
$text = str_replace("w", "𝙬", $text);
$text = str_replace("e", "𝙚", $text);
$text = str_replace("r", "𝙧", $text);
$text = str_replace("t", "𝙩", $text);
$text = str_replace("y", "𝙮", $text);
$text = str_replace("u", "𝙪", $text);
$text = str_replace("i", "𝙞", $text);
$text = str_replace("o", "𝙤", $text);
$text = str_replace("p", "𝙥", $text);
$text = str_replace("a", "𝙖", $text);
$text = str_replace("s", "𝙨", $text);
$text = str_replace("d", "𝙙", $text);
$text = str_replace("f", "𝙛", $text);
$text = str_replace("g", "𝙜", $text);
$text = str_replace("h", "𝙝", $text);
$text = str_replace("j", "𝙟", $text);
$text = str_replace("k", "𝙠", $text);
$text = str_replace("l", "𝙡", $text);
$text = str_replace("z", "𝙯", $text);
$text = str_replace("x", "𝙭", $text);
$text = str_replace("c", "𝙘", $text);
$text = str_replace("v", "𝙫", $text);
$text = str_replace("b", "𝙗", $text);
$text = str_replace("n", "𝙣", $text);
$text = str_replace("m", "𝙢", $text);

$text = str_replace("Q", "𝙌", $text);
$text = str_replace("W", "𝙒", $text);
$text = str_replace("E", "𝙀", $text);
$text = str_replace("R", "𝙍", $text);
$text = str_replace("T", "𝙏", $text);
$text = str_replace("Y", "𝙔", $text);
$text = str_replace("U", "𝙐", $text);
$text = str_replace("I", "𝙄", $text);
$text = str_replace("O", "𝙊", $text);
$text = str_replace("P", "𝙋", $text);
$text = str_replace("A", "𝘼", $text);
$text = str_replace("S", "𝙎", $text);
$text = str_replace("D", "𝘿", $text);
$text = str_replace("F", "𝙁", $text);
$text = str_replace("G", "𝙂", $text);
$text = str_replace("H", "𝙃", $text);
$text = str_replace("J", "𝙅", $text);
$text = str_replace("K", "𝙆", $text);
$text = str_replace("L", "𝙇", $text);
$text = str_replace("Z", "𝙕", $text);
$text = str_replace("X", "𝙓", $text);
$text = str_replace("C", "𝘾", $text);
$text = str_replace("V", "𝙑", $text);
$text = str_replace("B", "𝘽", $text);
$text = str_replace("N", "𝙉", $text);
$text = str_replace("M", "𝙈", $text);

send($chat_id, $text);
$text = $message->text;

#################

$text = str_replace("q", "𝖖", $text);
$text = str_replace("w", "𝖜", $text);
$text = str_replace("e", "𝖊", $text);
$text = str_replace("r", "𝖗", $text);
$text = str_replace("t", "𝖙", $text);
$text = str_replace("y", "𝖞", $text);
$text = str_replace("u", "𝖚", $text);
$text = str_replace("i", "𝖎", $text);
$text = str_replace("o", "𝖔", $text);
$text = str_replace("p", "𝖕", $text);
$text = str_replace("a", "𝖆", $text);
$text = str_replace("s", "𝖘", $text);
$text = str_replace("d", "𝖉", $text);
$text = str_replace("f", "𝖋", $text);
$text = str_replace("g", "𝖌", $text);
$text = str_replace("h", "𝖍", $text);
$text = str_replace("j", "𝖏", $text);
$text = str_replace("k", "𝖐", $text);
$text = str_replace("l", "𝖑", $text);
$text = str_replace("z", "𝖟", $text);
$text = str_replace("x", "𝖝", $text);
$text = str_replace("c", "𝖈", $text);
$text = str_replace("v", "𝖛", $text);
$text = str_replace("b", "𝖇", $text);
$text = str_replace("n", "𝖓", $text);
$text = str_replace("m", "𝖒", $text);

$text = str_replace("Q", "𝕼", $text);
$text = str_replace("W", "𝖂", $text);
$text = str_replace("E", "𝕰", $text);
$text = str_replace("R", "𝕽", $text);
$text = str_replace("T", "𝕿", $text);
$text = str_replace("Y", "𝖄", $text);
$text = str_replace("U", "𝖀", $text);
$text = str_replace("I", "𝕴", $text);
$text = str_replace("O", "𝕺", $text);
$text = str_replace("P", "𝕻", $text);
$text = str_replace("A", "𝕬", $text);
$text = str_replace("S", "𝕾", $text);
$text = str_replace("D", "𝕯", $text);
$text = str_replace("F", "𝕱", $text);
$text = str_replace("G", "𝕲", $text);
$text = str_replace("H", "𝕳", $text);
$text = str_replace("J", "𝕵", $text);
$text = str_replace("K", "𝕶", $text);
$text = str_replace("L", "𝕷", $text);
$text = str_replace("Z", "𝖅", $text);
$text = str_replace("X", "𝖃", $text);
$text = str_replace("C", "𝕮", $text);
$text = str_replace("V", "𝖁", $text);
$text = str_replace("B", "𝕭", $text);
$text = str_replace("N", "𝕹", $text);
$text = str_replace("M", "𝕸", $text);

send($chat_id, $text);
$text = $message->text;

#################

$text = str_replace("q", "ⓠ", $text);
$text = str_replace("w", "ⓦ", $text);
$text = str_replace("e", "ⓔ", $text);
$text = str_replace("r", "ⓡ", $text);
$text = str_replace("t", "ⓣ", $text);
$text = str_replace("y", "ⓨ", $text);
$text = str_replace("u", "ⓤ", $text);
$text = str_replace("i", "ⓘ", $text);
$text = str_replace("o", "ⓞ", $text);
$text = str_replace("p", "ⓟ", $text);
$text = str_replace("a", "ⓐ", $text);
$text = str_replace("s", "ⓢ", $text);
$text = str_replace("d", "ⓓ", $text);
$text = str_replace("f", "ⓕ", $text);
$text = str_replace("g", "ⓖ", $text);
$text = str_replace("h", "ⓗ", $text);
$text = str_replace("j", "ⓙ", $text);
$text = str_replace("k", "ⓚ", $text);
$text = str_replace("l", "ⓛ", $text);
$text = str_replace("z", "ⓩ", $text);
$text = str_replace("x", "ⓧ", $text);
$text = str_replace("c", "ⓒ", $text);
$text = str_replace("v", "ⓥ", $text);
$text = str_replace("b", "ⓑ", $text);
$text = str_replace("n", "ⓝ", $text);
$text = str_replace("m", "ⓜ", $text);

$text = str_replace("Q", "Ⓠ", $text);
$text = str_replace("W", "Ⓦ", $text);
$text = str_replace("E", "Ⓔ", $text);
$text = str_replace("R", "Ⓡ", $text);
$text = str_replace("T", "Ⓣ", $text);
$text = str_replace("Y", "Ⓨ", $text);
$text = str_replace("U", "Ⓤ", $text);
$text = str_replace("I", "Ⓘ", $text);
$text = str_replace("O", "Ⓞ", $text);
$text = str_replace("P", "Ⓟ", $text);
$text = str_replace("A", "Ⓐ", $text);
$text = str_replace("S", "Ⓢ", $text);
$text = str_replace("D", "Ⓓ", $text);
$text = str_replace("F", "Ⓕ", $text);
$text = str_replace("G", "Ⓖ", $text);
$text = str_replace("H", "Ⓗ", $text);
$text = str_replace("J", "Ⓙ", $text);
$text = str_replace("K", "Ⓚ", $text);
$text = str_replace("L", "Ⓛ", $text);
$text = str_replace("Z", "Ⓩ", $text);
$text = str_replace("X", "Ⓧ", $text);
$text = str_replace("C", "Ⓒ", $text);
$text = str_replace("V", "Ⓥ", $text);
$text = str_replace("B", "Ⓑ", $text);
$text = str_replace("N", "Ⓝ", $text);
$text = str_replace("M", "Ⓜ", $text);

send($chat_id, $text);
$text = $message->text;

################

$text = str_replace("q", "q҉", $text);
$text = str_replace("w", "w҉", $text);
$text = str_replace("e", "e҉", $text);
$text = str_replace("r", "r҉", $text);
$text = str_replace("t", "t҉", $text);
$text = str_replace("y", "y҉", $text);
$text = str_replace("u", "u҉", $text);
$text = str_replace("i", "i҉", $text);
$text = str_replace("o", "o҉", $text);
$text = str_replace("p", "p҉", $text);
$text = str_replace("a", "a҉", $text);
$text = str_replace("s", "s҉", $text);
$text = str_replace("d", "d҉", $text);
$text = str_replace("f", "f҉", $text);
$text = str_replace("g", "g҉", $text);
$text = str_replace("h", "h҉", $text);
$text = str_replace("j", "j҉", $text);
$text = str_replace("k", "k҉", $text);
$text = str_replace("l", "l҉", $text);
$text = str_replace("z", "z҉", $text);
$text = str_replace("x", "x҉", $text);
$text = str_replace("c", "c҉", $text);
$text = str_replace("v", "v҉", $text);
$text = str_replace("b", "b҉", $text);
$text = str_replace("n", "n҉", $text);
$text = str_replace("m", "m҉", $text);

$text = str_replace("Q", "Q҉", $text);
$text = str_replace("W", "W҉", $text);
$text = str_replace("E", "E҉", $text);
$text = str_replace("R", "R҉", $text);
$text = str_replace("T", "T҉", $text);
$text = str_replace("Y", "Y҉", $text);
$text = str_replace("U", "U҉", $text);
$text = str_replace("I", "I҉", $text);
$text = str_replace("O", "O҉", $text);
$text = str_replace("P", "P҉", $text);
$text = str_replace("A", "A҉", $text);
$text = str_replace("S", "S҉", $text);
$text = str_replace("D", "D҉", $text);
$text = str_replace("F", "F҉", $text);
$text = str_replace("G", "G҉", $text);
$text = str_replace("H", "H҉", $text);
$text = str_replace("J", "J҉", $text);
$text = str_replace("K", "K҉", $text);
$text = str_replace("L", "L҉", $text);
$text = str_replace("Z", "Z҉", $text);
$text = str_replace("X", "X҉", $text);
$text = str_replace("C", "C҉", $text);
$text = str_replace("V", "V҉", $text);
$text = str_replace("B", "B҉", $text);
$text = str_replace("N", "N҉", $text);
$text = str_replace("M", "M҉", $text);

send($chat_id, $text);
$text = $message->text;

################

$text = str_replace("q", "🆀", $text);
$text = str_replace("w", "🆆", $text);
$text = str_replace("e", "🅴", $text);
$text = str_replace("r", "🆁", $text);
$text = str_replace("t", "🆃", $text);
$text = str_replace("y", "🆈", $text);
$text = str_replace("u", "🆄", $text);
$text = str_replace("i", "🅸", $text);
$text = str_replace("o", "🅾", $text);
$text = str_replace("p", "🅿", $text);
$text = str_replace("a", "🅰", $text);
$text = str_replace("s", "🆂", $text);
$text = str_replace("d", "🅳", $text);
$text = str_replace("f", "🅵", $text);
$text = str_replace("g", "🅶", $text);
$text = str_replace("h", "🅷", $text);
$text = str_replace("j", "🅹", $text);
$text = str_replace("k", "🅺", $text);
$text = str_replace("l", "🅻", $text);
$text = str_replace("z", "🆉", $text);
$text = str_replace("x", "🆇", $text);
$text = str_replace("c", "🅲", $text);
$text = str_replace("v", "🆅", $text);
$text = str_replace("b", "🅱", $text);
$text = str_replace("n", "🅽", $text);
$text = str_replace("m", "🅼", $text);

$text = str_replace("Q", "🆀", $text);
$text = str_replace("W", "🆆", $text);
$text = str_replace("E", "🅴", $text);
$text = str_replace("R", "🆁", $text);
$text = str_replace("T", "🆃", $text);
$text = str_replace("Y", "🆈", $text);
$text = str_replace("U", "🆄", $text);
$text = str_replace("I", "🅸", $text);
$text = str_replace("O", "🅾", $text);
$text = str_replace("P", "🅿", $text);
$text = str_replace("A", "🅰", $text);
$text = str_replace("S", "🆂", $text);
$text = str_replace("D", "🅳", $text);
$text = str_replace("F", "🅵", $text);
$text = str_replace("G", "🅶", $text);
$text = str_replace("H", "🅷", $text);
$text = str_replace("J", "🅹", $text);
$text = str_replace("K", "🅺", $text);
$text = str_replace("L", "🅻", $text);
$text = str_replace("Z", "🆉", $text);
$text = str_replace("X", "🆇", $text);
$text = str_replace("C", "🅲", $text);
$text = str_replace("V", "🆅", $text);
$text = str_replace("B", "🅱", $text);
$text = str_replace("N", "🅽", $text);
$text = str_replace("M", "🅼", $text);

send($chat_id, $text);
$text = $message->text;

################

$text = str_replace("q", "ǫ", $text);
$text = str_replace("w", "ᴡ", $text);
$text = str_replace("e", "ᴇ", $text);
$text = str_replace("r", "ʀ", $text);
$text = str_replace("t", "ᴛ", $text);
$text = str_replace("y", "ʏ", $text);
$text = str_replace("u", "ᴜ", $text);
$text = str_replace("i", "ɪ", $text);
$text = str_replace("o", "ᴏ", $text);
$text = str_replace("p", "ᴘ", $text);
$text = str_replace("a", "ᴀ", $text);
$text = str_replace("s", "s", $text);
$text = str_replace("d", "ᴅ", $text);
$text = str_replace("f", "ꜰ", $text);
$text = str_replace("g", "ɢ", $text);
$text = str_replace("h", "ʜ", $text);
$text = str_replace("j", "ᴊ", $text);
$text = str_replace("k", "ᴋ", $text);
$text = str_replace("l", "ʟ", $text);
$text = str_replace("z", "ᴢ", $text);
$text = str_replace("x", "x", $text);
$text = str_replace("c", "ᴄ", $text);
$text = str_replace("v", "ᴠ", $text);
$text = str_replace("b", "ʙ", $text);
$text = str_replace("n", "ɴ", $text);
$text = str_replace("m", "ᴍ", $text);

$text = str_replace("Q", "ǫ", $text);
$text = str_replace("W", "ᴡ", $text);
$text = str_replace("E", "ᴇ", $text);
$text = str_replace("R", "ʀ", $text);
$text = str_replace("T", "ᴛ", $text);
$text = str_replace("Y", "ʏ", $text);
$text = str_replace("U", "ᴜ", $text);
$text = str_replace("I", "ɪ", $text);
$text = str_replace("O", "ᴏ", $text);
$text = str_replace("P", "ᴘ", $text);
$text = str_replace("A", "ᴀ", $text);
$text = str_replace("S", "s", $text);
$text = str_replace("D", "ᴅ", $text);
$text = str_replace("F", "ꜰ", $text);
$text = str_replace("G", "ɢ", $text);
$text = str_replace("G", "ʜ", $text);
$text = str_replace("J", "ᴊ", $text);
$text = str_replace("K", "ᴋ", $text);
$text = str_replace("L", "ʟ", $text);
$text = str_replace("Z", "ᴢ", $text);
$text = str_replace("X", "x", $text);
$text = str_replace("C", "ᴄ", $text);
$text = str_replace("V", "ᴠ", $text);
$text = str_replace("B", "ʙ", $text);
$text = str_replace("N", "ɴ", $text);
$text = str_replace("M", "ᴍ", $text);

send($chat_id, $text);
$text = $message->text;

################

$text = str_replace("q", "🅠", $text);
$text = str_replace("w", "🅦", $text);
$text = str_replace("e", "🅔", $text);
$text = str_replace("r", "🅡", $text);
$text = str_replace("t", "🅣", $text);
$text = str_replace("y", "🅨", $text);
$text = str_replace("u", "🅤", $text);
$text = str_replace("i", "🅘", $text);
$text = str_replace("o", "🅞", $text);
$text = str_replace("p", "🅟", $text);
$text = str_replace("a", "🅐", $text);
$text = str_replace("s", "🅢", $text);
$text = str_replace("d", "🅓", $text);
$text = str_replace("f", "🅕", $text);
$text = str_replace("g", "🅖", $text);
$text = str_replace("h", "🅗", $text);
$text = str_replace("j", "🅙", $text);
$text = str_replace("k", "🅚", $text);
$text = str_replace("l", "🅛", $text);
$text = str_replace("z", "🅩", $text);
$text = str_replace("x", "🅧", $text);
$text = str_replace("c", "🅒", $text);
$text = str_replace("v", "🅥", $text);
$text = str_replace("b", "🅑", $text);
$text = str_replace("n", "🅝", $text);
$text = str_replace("m", "🅜", $text);

$text = str_replace("Q", "🅠", $text);
$text = str_replace("W", "🅦", $text);
$text = str_replace("E", "🅔", $text);
$text = str_replace("R", "🅡", $text);
$text = str_replace("T", "🅣", $text);
$text = str_replace("Y", "🅨", $text);
$text = str_replace("U", "🅤", $text);
$text = str_replace("I", "🅘", $text);
$text = str_replace("O", "🅞", $text);
$text = str_replace("P", "🅟", $text);
$text = str_replace("A", "🅐", $text);
$text = str_replace("S", "🅢", $text);
$text = str_replace("D", "🅓", $text);
$text = str_replace("F", "🅕", $text);
$text = str_replace("G", "🅖", $text);
$text = str_replace("H", "🅗", $text);
$text = str_replace("J", "🅙", $text);
$text = str_replace("K", "🅚", $text);
$text = str_replace("L", "🅛", $text);
$text = str_replace("Z", "🅩", $text);
$text = str_replace("X", "🅧", $text);
$text = str_replace("C", "🅒", $text);
$text = str_replace("V", "🅥", $text);
$text = str_replace("B", "🅑", $text);
$text = str_replace("N", "🅝", $text);
$text = str_replace("M", "🅜", $text);

send($chat_id, $text);
$text = $message->text;

################

$text = str_replace("q", "b", $text);
$text = str_replace("w", "ʍ", $text);
$text = str_replace("e", "ǝ", $text);
$text = str_replace("r", "ɹ", $text);
$text = str_replace("t", "ʇ", $text);
$text = str_replace("y", "ʎ", $text);
$text = str_replace("u", "n", $text);
$text = str_replace("i", "ı", $text);
$text = str_replace("o", "o", $text);
$text = str_replace("p", "d", $text);
$text = str_replace("a", "ɐ", $text);
$text = str_replace("s", "s", $text);
$text = str_replace("d", "p", $text);
$text = str_replace("f", "ɟ", $text);
$text = str_replace("g", "ƃ", $text);
$text = str_replace("h", "ɥ", $text);
$text = str_replace("j", "ɾ", $text);
$text = str_replace("k", "ʞ", $text);
$text = str_replace("l", "ן", $text);
$text = str_replace("z", "z", $text);
$text = str_replace("x", "x", $text);
$text = str_replace("c", "ɔ", $text);
$text = str_replace("v", "𐌡", $text);
$text = str_replace("b", "q", $text);
$text = str_replace("n", "u", $text);
$text = str_replace("m", "ɯ", $text);

$text = str_replace("Q", "b", $text);
$text = str_replace("W", "ʍ", $text);
$text = str_replace("E", "ǝ", $text);
$text = str_replace("R", "ɹ", $text);
$text = str_replace("T", "ʇ", $text);
$text = str_replace("Y", "ʎ", $text);
$text = str_replace("U", "n", $text);
$text = str_replace("I", "ı", $text);
$text = str_replace("O", "o", $text);
$text = str_replace("P", "d", $text);
$text = str_replace("A", "ɐ", $text);
$text = str_replace("S", "s", $text);
$text = str_replace("D", "p", $text);
$text = str_replace("F", "ɟ", $text);
$text = str_replace("G", "ƃ", $text);
$text = str_replace("H", "ɥ", $text);
$text = str_replace("J", "ɾ", $text);
$text = str_replace("K", "ʞ", $text);
$text = str_replace("L", "ן", $text);
$text = str_replace("Z", "z", $text);
$text = str_replace("X", "x", $text);
$text = str_replace("C", "ɔ", $text);
$text = str_replace("V", "𐌡", $text);
$text = str_replace("B", "q", $text);
$text = str_replace("N", "u", $text);
$text = str_replace("M", "ɯ", $text);

send($chat_id, $text);
$text = $message->text;

####################

$text = strrev($text);

$text = str_replace("q", "b", $text);
$text = str_replace("w", "ʍ", $text);
$text = str_replace("e", "ǝ", $text);
$text = str_replace("r", "ɹ", $text);
$text = str_replace("t", "ʇ", $text);
$text = str_replace("y", "ʎ", $text);
$text = str_replace("u", "n", $text);
$text = str_replace("i", "ı", $text);
$text = str_replace("o", "o", $text);
$text = str_replace("p", "d", $text);
$text = str_replace("a", "ɐ", $text);
$text = str_replace("s", "s", $text);
$text = str_replace("d", "p", $text);
$text = str_replace("f", "ɟ", $text);
$text = str_replace("g", "ƃ", $text);
$text = str_replace("h", "ɥ", $text);
$text = str_replace("j", "ɾ", $text);
$text = str_replace("k", "ʞ", $text);
$text = str_replace("l", "ן", $text);
$text = str_replace("z", "z", $text);
$text = str_replace("x", "x", $text);
$text = str_replace("c", "ɔ", $text);
$text = str_replace("v", "𐌡", $text);
$text = str_replace("b", "q", $text);
$text = str_replace("n", "u", $text);
$text = str_replace("m", "ɯ", $text);

$text = str_replace("Q", "b", $text);
$text = str_replace("W", "ʍ", $text);
$text = str_replace("E", "ǝ", $text);
$text = str_replace("R", "ɹ", $text);
$text = str_replace("T", "ʇ", $text);
$text = str_replace("Y", "ʎ", $text);
$text = str_replace("U", "n", $text);
$text = str_replace("I", "ı", $text);
$text = str_replace("O", "o", $text);
$text = str_replace("P", "d", $text);
$text = str_replace("A", "ɐ", $text);
$text = str_replace("S", "s", $text);
$text = str_replace("D", "p", $text);
$text = str_replace("F", "ɟ", $text);
$text = str_replace("G", "ƃ", $text);
$text = str_replace("H", "ɥ", $text);
$text = str_replace("J", "ɾ", $text);
$text = str_replace("K", "ʞ", $text);
$text = str_replace("L", "ן", $text);
$text = str_replace("Z", "z", $text);
$text = str_replace("X", "x", $text);
$text = str_replace("C", "ɔ", $text);
$text = str_replace("V", "𐌡", $text);
$text = str_replace("B", "q", $text);
$text = str_replace("N", "u", $text);
$text = str_replace("M", "ɯ", $text);

send($chat_id, $text);
$text = $message->text;

####################

$text = str_replace("q", "🇶 ", $text);
$text = str_replace("w", "🇼 ", $text);
$text = str_replace("e", "🇪 ", $text);
$text = str_replace("r", "🇷 ", $text);
$text = str_replace("t", "🇹 ", $text);
$text = str_replace("y", "🇾 ", $text);
$text = str_replace("u", "🇺 ", $text);
$text = str_replace("i", "🇮 ", $text);
$text = str_replace("o", "🇴 ", $text);
$text = str_replace("p", "🇵 ", $text);
$text = str_replace("a", "🇦 ", $text);
$text = str_replace("s", "🇸 ", $text);
$text = str_replace("d", "🇩 ", $text);
$text = str_replace("f", "🇫 ", $text);
$text = str_replace("g", "🇬 ", $text);
$text = str_replace("h", "🇭 ", $text);
$text = str_replace("j", "🇯 ", $text);
$text = str_replace("k", "🇰 ", $text);
$text = str_replace("l", "🇱 ", $text);
$text = str_replace("z", "🇿 ", $text);
$text = str_replace("x", "🇽 ", $text);
$text = str_replace("c", "🇨 ", $text);
$text = str_replace("v", "🇻 ", $text);
$text = str_replace("b", "🇧 ", $text);
$text = str_replace("n", "🇳 ", $text);
$text = str_replace("m", "🇲 ", $text);

$text = str_replace("Q", "🇶 ", $text);
$text = str_replace("W", "🇼 ", $text);
$text = str_replace("E", "🇪 ", $text);
$text = str_replace("R", "🇷 ", $text);
$text = str_replace("T", "🇹 ", $text);
$text = str_replace("Y", "🇾 ", $text);
$text = str_replace("U", "🇺 ", $text);
$text = str_replace("I", "🇮 ", $text);
$text = str_replace("O", "🇴 ", $text);
$text = str_replace("P", "🇵 ", $text);
$text = str_replace("A", "🇦 ", $text);
$text = str_replace("S", "🇸 ", $text);
$text = str_replace("D", "🇩 ", $text);
$text = str_replace("F", "🇫 ", $text);
$text = str_replace("G", "🇬 ", $text);
$text = str_replace("H", "🇭 ", $text);
$text = str_replace("J", "🇯 ", $text);
$text = str_replace("K", "🇰 ", $text);
$text = str_replace("L", "🇱 ", $text);
$text = str_replace("Z", "🇿 ", $text);
$text = str_replace("X", "🇽 ", $text);
$text = str_replace("C", "🇨 ", $text);
$text = str_replace("V", "🇻 ", $text);
$text = str_replace("B", "🇧 ", $text);
$text = str_replace("N", "🇳 ", $text);
$text = str_replace("M", "🇲 ", $text);

send($chat_id, $text);
$text = $message->text;

#######################

$text = strrev($text);

send($chat_id, $text);
}