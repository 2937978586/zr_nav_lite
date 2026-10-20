<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : inc/webdata.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

//是否为域名
function domain($domain) {
	if (preg_match("/^([0-9a-z-]{1,}.)?[0-9a-z-]{2,}.([0-9a-z-]{2,}.)?[a-z]{2,}$/i", $domain)) {
		return true;
	} else {
		return false;
	}
}
/** 获取指定URL内容 */
function get_url_content($url) {
	if (empty($url)) {
    	return false;
	}
	
	if (substr($url, 0, 7) != 'http://') {
		$url = 'http://'.$url;
	}
	
	$timeout = 30;
    $data = '';
    for ($i = 0; $i < 5 && empty($data); $i++) {
		if (function_exists('curl_init')) {
			$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
			
        	$data = curl_exec($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($http_code != '200') {
				return false;
			}
        } elseif (function_exists('fsockopen')) {
			$params = parse_url($url);
			$host = $params['host'];
			$path = $params['path'];
			$query = $params['query'];
			$fp = @fsockopen($host, 80, $errno, $errstr, $timeout);
			if (!$fp) {
				return false;
			} else {
				$result = '';
				$out = "GET /" . $path . '?' . $query . " HTTP/1.0\r\n";
				$out .= "Host: $host\r\n";
				$out .= "Connection: Close\r\n\r\n";
				@fwrite($fp, $out);
				$http_200 = preg_match('/HTTP.*200/', @fgets($fp, 1024));
				if (!$http_200) {
					return false;
				}

				while (!@feof($fp)) {
                if ($get_info) {
                    $data .= @fread($fp, 1024);
                } else {
                    if (@fgets($fp, 1024) == "\r\n") {
                        $get_info = true;
                    }
                }
            }
            @fclose($fp);
        }
        } elseif (function_exists( 'file_get_contents')) {
			if (!get_cfg_var('allow_url_fopen')) {
				return false;
			}
            $context = stream_context_create(
				array('http' => array('timeout' => $timeout))
			);
            $data = @file_get_contents($url, false, $context);
        } else {
			return false; 
		}
	}
	
	if (!$data) {
		return false;
    } else {
		$encode = mb_detect_encoding($data, array('ascii', 'gb2312', 'utf-8', 'gbk'));
		if ($encode == 'EUC-CN' || $encode == 'CP936') {
			$data = @mb_convert_encoding($data, 'utf-8', 'gb2312');
		}
		
        return $data;
	}
}

//
function get_url_contents($url) {
    if (ini_get("allow_url_fopen") == "1")
        return file_get_contents($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}
//
function get_domain($url) {
	if (preg_match("/^(http:\/\/|https:\/\/)?([^\/]+)/i", $url, $domain)) {
		return $domain[2];
	} else {
		return false;
	}
}
//
function format_url($url) {
	if ($url != "") {
		$url_parts = parse_url($url);
		$scheme = $url_parts['scheme'];
		$host = $url_parts['host'];
		$path = $url_parts['path'];
		$port = !empty($url_parts['port']) ? ':'.$url_parts['port'] : '';
		$url = (!empty($scheme) ? $scheme.'://'.$host : (!empty($host) ? 'http://'.$host : 'http://'.$path)).$port.'/';
		
		return $url;
	}
}


/** 获取META信息 */
function get_sitemeta($url) {
	$url = format_url($url);
	$data = get_url_content($url);
		
	$meta = array();
	$meta['data'] = $data;
	if (!empty($data)) {
		#Title
		preg_match('/<TITLE>([\w\W]*?)<\/TITLE>/si', $data, $matches);
		if (!empty($matches[1])) {
			$meta['title'] = $matches[1];
		}
		
		#Keywords
		preg_match('/<META\s+name="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);		
		if (empty($matches[1])) {
			preg_match("/<META\s+name='keywords'\s+content='([\w\W]*?)'/si", $data, $matches);			
		}
		if (empty($matches[1])) {
			preg_match('/<META\s+content="([\w\W]*?)"\s+name="keywords"/si', $data, $matches);			
		}
		if (empty($matches[1])) {
			preg_match('/<META\s+http-equiv="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);			
		}
		if (!empty($matches[1])) {
			$meta['keywords'] = $matches[1];
		}
		
		#Description
		preg_match('/<META\s+name="description"\s+content="([\w\W]*?)"/si', $data, $matches);		
		if (empty($matches[1])) {
			preg_match("/<META\s+name='description'\s+content='([\w\W]*?)'/si", $data, $matches);			
		}
		if (empty($matches[1])) {
			preg_match('/<META\s+content="([\w\W]*?)"\s+name="description"/si', $data, $matches);					
		}
		if (empty($matches[1])) {
			preg_match('/<META\s+http-equiv="description"\s+content="([\w\W]*?)"/si', $data, $matches);			
		}
		if (!empty($matches[1])) {
			$meta['description'] = $matches[1];
		}
	}

	return $meta; 
}

/** Server IP */
function get_serverip($url) {
	$domain = get_domain($url);
	if ($domain) {
		$ip = gethostbyname($domain);
	} else {
		$ip = 0;
	}
	
	return $ip;
}

/** Baidu Pagerank */
function get_baidurank($url) {
	$data = get_url_content("http://www.aizhan.com/getbr.php?url=$url&style=1");
	if (preg_match('/<a(.*?)>(\d+)<\/a>/i', $data, $matches)) {
		$rank = intval($matches[2]);
	} else {
		$rank = 0;
	}
	return $rank;
}

/** Sogou Pagerank */
function get_sogourank($url) {
	$data = get_url_content("http://rank.ie.sogou.com/sogourank.php?ur=$url");
	if (preg_match('/sogourank=(\d+)/i', $data, $matches)) {
		$rank = intval($matches[1]);
	} else {
		$rank = 0;
	}
	return $rank;
}

/** Alexa Rank */
function get_alexarank($url) {
	$data = get_url_content("http://xml.alexa.com/data?cli=10&dat=nsa&ver=quirk-searchstatus&url=$url");
	if (preg_match('/<POPULARITY[^>]*URL[^>]*TEXT[^>]*\"([0-9]+)\"/i', $data, $matches)) {
		$rank = strip_tags($matches[1]);
	} else {
		$rank = 0;
	}
	return $rank;
}
?>