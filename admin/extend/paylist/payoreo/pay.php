<?php

class Pay_payoreo{
	
	public $dates = array(); //用于保存外部传进去的参数
	public $orderid = ""; //订单号
	public $money   = "";//订单价格
	public $title   = "";
	public $wxgid   = "";
	public $domain  = "";
	

	public function index()
	{
		$appid_array     = explode("-",$this->dates['su_pl_content_1']);
		$appsecret_array = explode("-",$this->dates['su_pl_content_2']);
		$zfurl_array = explode("-",$this->dates['su_pl_content_3']);
		$rand_count = array_rand($appid_array,1);
		$zfurl      = $zfurl_array[$rand_count];
		$appid      = $appid_array[$rand_count];
		$appsecret  = $appsecret_array[$rand_count];
		$jinepanduan = explode("-",$this->dates['jine']);
		
		
		$string = json_encode($jinepanduan);
		
		if (($string)=='["2"]') {   /*如果变量$string等于2则执行下面的 代码*/
		    
		    $money=$this->money;  /*原始金额*/
		    
		} else {   /*如果不等于2则执行这里的*/
		    
		    // 生成一个随机浮点数，范围在-0.9到0.9之间
		    $randomNumber = mt_rand(-5, 5) / 10;
		    $zfjine=$this->money;  /*原始金额*/
		    $money=$zfjine+$randomNumber;  /*得到浮点数和原来的金额换算 得到最后的金额 赋值给$money 这个$money是一个变量*/
		    
		    
		}
		
		$return_url   = "https://".$this->domain."/group.php/index/successok/id/".$this->wxgid.".html";
		$notify_url   = "https://".$this->domain."/group.php/index/notify/orderid/".$this->orderid."/id/".$this->wxgid.".html";
		$type=$_POST['type'];
        $array = [
            'pid'          => $appid,
            'type'         => $_POST['type'],
            'out_trade_no' => $this->orderid,//商户订单号
            'notify_url'   => $notify_url,
            'return_url'   => $return_url,
            'name'         => $this->title,
            'money'        => $money,
        ];
        
        require_once("EpayCore.class.php");
        
        $epay = new EpayCore($zfurl,$appid,$appsecret);
        $html_text = $epay->getPayLink($array);
        return ['status'=>1,'msg'=>$html_text];
        //echo $html_text;
       /* ksort($array);

        $url = $this->ToUrlParams($array);
        $sign = md5($url.$appsecret);
        $array['sign'] = $sign;

        $pay_url = $this->curl_post_ssl("http://pay.takepay.cn/.cn/submit.php",$array);
        //print_r($pay_url);
        //exit;
        $pay_url = trim($pay_url);
        $pay_url_array = explode("\n",$pay_url);
        
        $pay_url_array[0] = str_ireplace( "<script>window.location.href='", "",$pay_url_array[0]);
        $pay_url_array[0] = str_ireplace( ";</script>", "",$pay_url_array[0]);
        $pay_url_array[0] = str_ireplace( "'", "",$pay_url_array[0]);
        
        $pay_array = explode("./pay/",$pay_url_array[0]);
		return ['status'=>1,'msg'=>"http://pay.takepay.cn/pay/".$pay_array[1]];*/
		
	}
	
	
	public function ToUrlParams($data){
		$buff = "";
		foreach ($data as $k => $v)
		{
			if($k != "sign" && $v != "" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}
		$buff = trim($buff, "&");
		return $buff;
	}
	
	
	protected function curl_post_ssl($url, $xmldata, $second=30,$aHeader=array()){
		$ch = curl_init();
		$curlVersion = curl_version();
		//$ua = "WXPaySDK/".self::$VERSION." (".PHP_OS.") PHP/".PHP_VERSION." CURL/".$curlVersion['version']." ".$config->GetMerchantId();

		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $second);
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,TRUE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);//严格校验
		//curl_setopt($ch,CURLOPT_USERAGENT, $ua); 
		//设置header
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//post提交方式
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xmldata);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//运行curl
		$data = curl_exec($ch);
		//返回结果
		if($data){
			curl_close($ch);
			return $data;
		} else { 
			$error = curl_errno($ch);
			curl_close($ch);
			return ("curl出错，错误码:$error");
		}
	}
	
}