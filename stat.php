<?php

$fields = "impressions,reach,inline_link_clicks,spend";

$access_token = "EAAHxQfI1uiIBAEcAqSMhQPE51ZCwVgItvdTfcqiBPI1LUxUINAl7zR0pRqbKaDwZCDfHvSHJZBV1P2avk2unjgwvfk57aREf74rQS1udtKUX2ps2zTGy6Au2yGTKuOrgLcRQ4L2ZBV48Xq73RIwD43PxtXkODzDNZB4LqBScMWwZDZD";

if($curl = curl_init()){

	curl_setopt($curl, CURLOPT_URL, "https://graph.facebook.com/v2.9/".$_POST["company"]."/insights?date_preset=".$_POST["type"]."&fields=".$fields."&access_token=".$access_token);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
	$out = curl_exec($curl);
	
		if (curl_errno($curl)) 
       {
           print curl_error($curl);
           exit;
       } 
       else 
       {
        curl_close($curl);
        }

	$jdecode = json_decode($out, true);
	
	if(!isset($jdecode["data"][0]["reach"])) $jdecode["data"][0]["reach"] = 0;
	if(isset($jdecode["data"][0]["impressions"])==false) $jdecode["data"][0]["impressions"] = 0;
	if(isset($jdecode["data"][0]["inline_link_clicks"])==false) $jdecode["data"][0]["inline_link_clicks"] = 0;
	if(isset($jdecode["data"][0]["spend"])==false) $jdecode["data"][0]["spend"] = 0;
	
	switch ($_POST["type"]) {
    case "last_7d":
        echo "<p style='font-weight: bold;'>Статистика за последние 7 дней для компании с ID = ".$_POST["company"]."</p> <p>Охват: ".$jdecode["data"][0]["reach"]."</p><p> Количество показов: ".$jdecode["data"][0]["impressions"]."</p><p> Количество кликов: ".$jdecode["data"][0]["inline_link_clicks"]."</p><p> Потраченные средства: ".$jdecode["data"][0]["spend"]."</p>";
        break;
    case "last_30d":
        echo "<p style='font-weight: bold;'>Статистика за последние 30 дней для компании с ID = ".$_POST["company"]."</p> <p> Охват: ".$jdecode["data"][0]["reach"]."</p><p> Количество показов: ".$jdecode["data"][0]["impressions"]."</p><p> Количество кликов: ".$jdecode["data"][0]["inline_link_clicks"]."</p><p> Потраченные средства: ".$jdecode["data"][0]["spend"]."</p>";
        break;
    case "last_90d":
        echo "<p style='font-weight: bold;'>Статистика за последние 90 дней для компании с ID = ".$_POST["company"]."</p> <p> Охват: ".$jdecode["data"][0]["reach"]."</p><p> Количество показов: ".$jdecode["data"][0]["impressions"]."</p><p> Количество кликов: ".$jdecode["data"][0]["inline_link_clicks"]."</p><p> Потраченные средства: ".$jdecode["data"][0]["spend"]."</p>";
        break;
	case "lifetime":
        echo "<p style='font-weight: bold;'>Статистика за все время для компании с ID = ".$_POST["company"]."</p> <p> Охват: ".$jdecode["data"][0]["reach"]."</p><p> Количество показов: ".$jdecode["data"][0]["impressions"]."</p><p> Количество кликов: ".$jdecode["data"][0]["inline_link_clicks"]."</p><p> Потраченные средства: ".$jdecode["data"][0]["spend"]."</p>";
        break;
}
echo '	
	<input type="button" onclick="history.back();" value="Назад"/>
';
	
}
else "Ошибка подключения к серверу";
