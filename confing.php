<?php
ob_start();
define('API_KEY','1779852517:AAENgUdrbQeZ_y0D7J-Rrhy0j3GFXlVe57k'); 
ini_set("log_errors" , "off");
//-----------------------------------------------------------------------------------------
//فانکشن botevoobot :
function botevoobot($method,$data){
  
  $url = "https://api.telegram.org/bot".API_KEY."/".$method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, count($data));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
 }
//-----------------------------------------------------------------------------------------
//متغیر ها :
$Dev = array("1487061355","",""); 
@$usernamebot = "SuperAnti_bot"; 
@$idbot = "1462654876"; 
@$channel = "superDig_dev"; 
@$idchannel ="-1001176649032";
@$nemechannel = "کانال ما ™️";
@$web = "https://mon-dark.ir/zedelink"; 
@$linkgrop = "https://t.me/superDig_dev"; 
@$token = API_KEY;
//-----------------------------------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
@$message = $update->message;
@$from_id = $message->from->id;
@$chat_id = $message->chat->id;
@$message_id = $message->message_id;
@$first_name = $message->from->first_name;
@$last_name = $message->from->last_name;
@$username = $message->from->username;
@$textmassage = $message->text;
@$firstname = $update->callback_query->from->first_name;
@$usernames = $update->callback_query->from->username;
@$chatid = $update->callback_query->message->chat->id;
@$fromid = $update->callback_query->from->id;
@$membercall = $update->callback_query->id;
@$reply = $update->message->reply_to_message->forward_from->id;
//------------------------------------------------------------------------
@$data = $update->callback_query->data;
@$messageid = $update->callback_query->message->message_id;
@$tc = $update->message->chat->type;
@$gpname = $update->callback_query->message->chat->title;
@$namegroup = $update->message->chat->title;
@$text = $update->inline_qurey->qurey;
//------------------------------------------------------------------------
@$newchatmemberid = $update->message->new_chat_member->id;
@$newchatmemberu = $update->message->new_chat_member->username;
@$rt = $update->message->reply_to_message;
@$replyid = $update->message->reply_to_message->message_id;
@$tedadmsg = $update->message->message_id;
@$edit = $update->edited_message->text;
@$re_id = $update->message->reply_to_message->from->id;
@$re_user = $update->message->reply_to_message->from->username;
@$re_name = $update->message->reply_to_message->from->first_name;
@$re_msgid = $update->message->reply_to_message->message_id;
@$re_chatid = $update->message->reply_to_message->chat->id;
@$message_edit_id = $update->edited_message->message_id;
@$chat_edit_id = $update->edited_message->chat->id;
@$edit_for_id = $update->edited_message->from->id;
@$edit_chatid = $update->callback_query->edited_message->chat->id;
@$caption = $update->message->caption;
//------------------------------------------------------------------------
@$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$from_id),true);
@$status = $statjson['result']['status'];
@$statjsonrt = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$re_id),true);
@$statusrt = $statjsonrt['result']['status'];
@$statjsonq = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chatid&user_id=".$fromid),true);
@$statusq = $statjsonq['result']['status'];
@$info = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_edit_id&user_id=".$edit_for_id),true);
@$you = $info['result']['status'];
@$forchannel = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$from_id));
@$tch = $forchannel->result->status;
@$forchannelq = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$channel."&user_id=".$fromid));
@$tchq = $forchannelq->result->status;
//-----------------------------------------------------------------------------------------
@$settings = json_decode(file_get_contents("data/$chat_id.json"),true);
@$settings2 = json_decode(file_get_contents("data/$chatid.json"),true);
@$editgetsettings = json_decode(file_get_contents("data/$chat_edit_id.json"),true);
@$user = json_decode(file_get_contents("data/user.json"),true);
@$filterget = $settings["filterlist"];
//=========================================================================
//فانکشن ها :
function SendMessage($chat_id, $text){
botevoobot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
 function Forward($berekoja,$azchejaei,$kodompayam)
{
botevoobot('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function  getUserProfilePhotos($token,$from_id) {
  @$url = 'https://api.telegram.org/bot'.$token.'/getUserProfilePhotos?user_id='.$from_id;
  @$result = file_get_contents($url);
  @$result = json_decode ($result);
  @$result = $result->result;
  return $result;
}
function check_filter($str){
	global $filterget;
	foreach($filterget as $d){
		if (mb_strpos($str, $d) !== false) {
			return true;
		}
	}
}
//=========================================================================
// dokmezer
@$inlinebutton = json_encode([
    'inline_keyboard'=>[
           [
         ['text'=>"$nemechannel",'url'=>"https://telegram.me/$channel"]
     ],
   ]
   ]);
?>