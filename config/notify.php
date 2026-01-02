<?php
function whatsappNotify($msg){
  $num = WHATSAPP_NUMBER;
  $url = "https://wa.me/$num?text=".urlencode($msg);
  file_get_contents($url);
}
