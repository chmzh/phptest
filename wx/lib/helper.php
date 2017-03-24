<?php

/**
 * GET 请求
 * @param string $url
 */
function http_get($url){
    $oCurl = curl_init();
    if(stripos($url,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
    }
    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($oCurl, CURLOPT_VERBOSE, 1);
    curl_setopt($oCurl, CURLOPT_HEADER, 1);

    // $sContent = curl_exec($oCurl);
    // $aStatus = curl_getinfo($oCurl);
    $sContent = execCURL($oCurl);
    curl_close($oCurl);

    return $sContent;
}
/**
 * POST 请求
 * @param string $url
 * @param array $param
 * @param boolean $post_file 是否文件上传
 * @return string content
 */
function http_post($url,$param,$post_file=false){
    $oCurl = curl_init();

    if(stripos($url,"https://")!==FALSE){
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
    }
    if(PHP_VERSION_ID >= 50500 && class_exists('\CURLFile')){
        $is_curlFile = true;
    }else {
        $is_curlFile = false;
        if (defined('CURLOPT_SAFE_UPLOAD')) {
            curl_setopt($oCurl, CURLOPT_SAFE_UPLOAD, false);
        }
    }
    
    if($post_file) {
        if($is_curlFile) {
            foreach ($param as $key => $val) {                     
                if(isset($val["tmp_name"])){
                    $param[$key] = new \CURLFile(realpath($val["tmp_name"]),$val["type"],$val["name"]);
                }else if(substr($val, 0, 1) == '@'){
                    $param[$key] = new \CURLFile(realpath(substr($val,1)));                
                }                           
            }
        }                
        $strPOST = $param;
    }else{
        $strPOST = json_encode($param);
    } 
    
    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($oCurl, CURLOPT_POST,true);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST);
    curl_setopt($oCurl, CURLOPT_VERBOSE, 1);
    curl_setopt($oCurl, CURLOPT_HEADER, 1);

    // $sContent = curl_exec($oCurl);
    // $aStatus  = curl_getinfo($oCurl);

    $sContent = execCURL($oCurl);
    curl_close($oCurl);

    return $sContent;
}

/**
 * 执行CURL请求，并封装返回对象
 */
function execCURL($ch){
    $response = curl_exec($ch);
    $error    = curl_error($ch);
    $result   = array( 'header' => '', 
                     'content' => '', 
                     'curl_error' => '', 
                     'http_code' => '',
                     'last_url' => '');
    
    if ($error != ""){
        $result['curl_error'] = $error;
        return $result;
    }

    $header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);
    $result['header'] = str_replace(array("\r\n", "\r", "\n"), "<br/>", substr($response, 0, $header_size));
    $result['content'] = substr( $response, $header_size );
    $result['http_code'] = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    $result['last_url'] = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL);
    $result["base_resp"] = array();
    $result["base_resp"]["ret"] = $result['http_code'] == 200 ? 0 : $result['http_code'];
    $result["base_resp"]["err_msg"] = $result['http_code'] == 200 ? "ok" : $result["curl_error"];

    return $result;
}

//给URL地址追加参数
function appendParamter($url,$key,$value){  
    return strrpos($url,"?",0) > -1 ? "$url&$key=$value" : "$url?$key=$value";
}

//生成指定长度的随机字符串
function createNonceStr($length = 16) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $str = "";
  for ($i = 0; $i < $length; $i++) {
    $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
  }
  return $str;
}

//读取本地文件
function get_php_file($filename) {
    //echo $filename;
    return trim(substr(file_get_contents($filename), 15));
}

//写入本地文件
function set_php_file($filename, $content) {
    $fp = fopen($filename, "w");
    fwrite($fp, "<?php exit();?>" . $content);
    fclose($fp);
}

//加载本地的应用配置文件
function loadConfig(){
    return json_decode(get_php_file("/Users/chenmingzhou/Zend/workspaces/phptest/wx/config.php"));
}

//根据应用ID获取应用配置
function getConfigByAgentId($id){
    $configs = loadConfig();
    
    foreach ($configs->AppsConfig as $key => $value) {                
        if($value->AgentId == $id){
            $config = $value;
            break;
        }
    }

    return $config;
}

function _authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	
	$ckey_length = 4;

	$key = md5($key ? $key : 'KGENGJ39499#$jf');
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
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}
}


function showMsg($type='MSG', $message) {
	$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	$html .= '<html xmlns="http://www.w3.org/1999/xhtml">';
	$html .= '<head>';
	$html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$html .= '<link type="text/css"  rel="stylesheet" href="css/v1.css">';
	$html .= '</head>';
	$html .= '<div class="error-page">';
    $html .= '<div class="error-page-container">';
    $html .= '<div class="error-page-main">';
	if( $type == 'MSG' ) {
		$html .= '<h3>提示：</h3>';
	} else {
		$html .= '<h3>错误：</h3>';
	}
    
    $html .= '<div class="error-page-actions">';
    $html .= '<div>'.$message.'</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
	$html .= '</div>';
	echo $html;
}
