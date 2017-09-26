<?php

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

//xss対策のためのhtmlエスケープ
function es($data){
  if(is_array($data)){
    return array_map(__METHOD__,$data);
  }else{
    return htmlspecialchars($data,ENT_QUOTES,'UTF-8');
  }
}

function ip_check($ip){
if("13.92.179.223"==$ip){$ip_check='ok';}
elseif("153.156.242.79"==$ip){$ip_check='ok';}
elseif("40.71.45.51"==$ip){$ip_check='ok';}
elseif("40.71.90.92"==$ip){$ip_check='ok';}
else{$ip_check='ng';}

if($ip_check=='ng'){
  echo "ipアドレスがちがいます";
//header('Location:http://mrdoob.com/projects/chromeexperiments/google_gravity/');
exit;
}
}