<?php


  
//字符转换
//type = 1表示字符转编码
function _String($string,$type = 1){
	if($type==1){
		$string = str_replace('"',"&quot;",$string);
	}else{
		$string = str_replace('&quot;','"',$string);
	}
	return $string;
}

function _Json($data = array()){
	echo json_encode($data);
	exit;
}

function _RandStr($length = 8){
	$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$len = strlen($str)-1;
	$randstr = '';
	for ($i=0;$i<$length;$i++) {
		$num=mt_rand(0,$len);
		$randstr .= $str[$num];
	}
	return $randstr;
}


function _geturl($url,$code = 0){
	
	$preg = "/^http(s)?:\\/\\/.+/";
	$ssl = "http";
	if(preg_match($preg,$url)){
		$ssl = "https";
	}else{
		$ssl = "http";
	}
	$curl  =  curl_init();  //初始化
	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');  //在HTTP请求中包含一个”User-Agent: “头的字符串。
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30); //在发起连接前等待的时间，如果设置为0，则无限等待。
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);  //设置cURL允许执行的最长秒数。
	curl_setopt($curl , CURLOPT_URL , $url);  //设置抓取的url
	curl_setopt($curl , CURLOPT_HEADER ,0);  //设置头文件的信息作为数据流输出
	curl_setopt($curl , CURLOPT_RETURNTRANSFER ,1);  //设置获取的信息以文件流的形式返回，而不是直接输出。

	if ($ssl == "https") {
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
	}
	$data  =  curl_exec($curl);   //执行命令
	$httpCode = curl_getinfo($curl,CURLINFO_HTTP_CODE); //返回状态码
	curl_close($curl);  //关闭URL请求
     //显示获得的数据
	if($code == 0){
		return $data;
	}else{
		return $httpCode;
	}
}

//域名处理，分割域名
function domain($domain){
	$domains = array();
	$domain = str_replace("www.","",$domain);
	$domain = explode(".",$domain);
	$count  = count($domain);
	$domains[0] = $domain[0];
	if($count == 2){
		$domains[1] = $domain[1];
	}elseif($count == 3){
		$domains[1] = $domain[1].".".$domain[2];
	}elseif($count == 4){
		$domains[1] = $domain[1].".".$domain[2].".".$domain[3];
	}
	return $domains;
}
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
    	$ckey_length = 4;
    	$key = md5($key);
    	$keya = md5(substr($key, 0, 16));
    	$keyb = md5(substr($key, 16, 16));
    	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
    	$cryptkey = $keya.md5($keya.$keyc);
    	$key_length = strlen($cryptkey);
    	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    	$string_length = strlen($string);
    	$result = '';
    	$box = range(0, 255);
    	$rndkey = array();
    	for($i = 0; $i <= 255; $i++) {
    		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
    	}
    	for($j = $i = 0; $i < 256; $i++) {
    		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
    		$tmp = $box[$i];
    		$box[$i] = $box[$j];
    		$box[$j] = $tmp;
    	}
    	for($a = $j = $i = 0; $i < $string_length; $i++) {
    		$a = ($a + 1) % 256;
    		$j = ($j + $box[$a]) % 256;
    		$tmp = $box[$a];
    		$box[$a] = $box[$j];
    		$box[$j] = $tmp;
    		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    	}
    	if($operation == 'DECODE') {
    		if(((int)substr($result, 0, 10) == 0 || (int)substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
    			return substr($result, 26);
    		} else {
    			return '';
    		}
    	} else {
    		return $keyc.str_replace('=', '', base64_encode($result));
    	}
    }
    function encrypt($string, $key) {
        $iv = random_bytes(16); // Generate a new random IV each time
        $encrypted = openssl_encrypt($string, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($iv . $encrypted); // Concatenate IV and encrypted data
    }
    
    function decrypt($encryptedString, $key) {
        $encryptedData = base64_decode($encryptedString);
        $iv = substr($encryptedData, 0, 16); // Extract IV from encrypted data
        $encryptedPayload = substr($encryptedData, 16);
        $decrypted = openssl_decrypt($encryptedPayload, 'aes-256-cbc', $key, 0, $iv);
        return $decrypted;
    }
    function sysmsg($msg) {
    die('
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>站点提示信息</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" />
        <style type="text/css">
            *{box-sizing:border-box;margin:0;padding:0;font-family:Lantinghei SC,Open Sans,Arial,Hiragino Sans GB,Microsoft YaHei,"微软雅黑",STHeiti,WenQuanYi Micro Hei,SimSun,sans-serif;-webkit-font-smoothing:antialiased}
            body{padding:70px 0;background:#edf1f4;font-weight:400;font-size:1pc;-webkit-text-size-adjust:none;color:#333}
            a{outline:0;color:#3498db;text-decoration:none;cursor:pointer}
            .system-message{margin:20px 5%;padding:40px 20px;background:#fff;box-shadow:1px 1px 1px hsla(0,0%,39%,.1);text-align:center}
            .system-message h1{margin:0;margin-bottom:9pt;color:#444;font-weight:400;font-size:40px}
            .system-message .jump,.system-message .image{margin:20px 0;padding:0;padding:10px 0;font-weight:400}
            .system-message .jump{font-size:14px}
            .system-message .jump a{color:#333}
            .system-message p{font-size:9pt;line-height:20px}
            .system-message .btn{display:inline-block;margin-right:10px;width:138px;height:2pc;border:1px solid #44a0e8;border-radius:30px;color:#44a0e8;text-align:center;font-size:1pc;line-height:2pc;margin-bottom:5px;}
            .success .btn{border-color:#69bf4e;color:#69bf4e}
            .error .btn{border-color:#69bf4e;color:#69bf4e}
            .info .btn{border-color:#3498db;color:#3498db}
            .copyright p{width:100%;color:#919191;text-align:center;font-size:10px}
            .system-message .btn-grey{border-color:#bbb;color:#bbb}
            .clearfix:after{clear:both;display:block;visibility:hidden;height:0;content:"."}
            @media (max-width:768px){body {padding:20px 0;}}
            @media (max-width:480px){.system-message h1{font-size:30px;}}
        </style>
    </head>
    <body>
    <div class="system-message error">
    <div class="image">
    <img src="../template/static/images/error.svg" alt="" width="150" />
    </div>
    <h2>站点提示信息</h2>
    </br> '. $msg .' </div>
    <div class="copyright">
    <p>Copyright © '. date("Y") .' <a href=""></a></p>
    </body>
    </html>');
    }
function get_app ($dir=null) {
    if (!$dir) {
        $dir = dirname(__FILE__);
    }
    $filename = scandir($dir);
    foreach ($filename as $v) {
        if ($v == 'thinkphp') {
            return $dir;
        }
    }
    
}

?>