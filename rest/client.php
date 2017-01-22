<?php
function httpGet() {
    $url = 'http://localhost/test/rest/server.php';
    //$url = 'http://www.baidu.com';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);    //表示需要response header
    curl_setopt($ch, CURLOPT_NOBODY, FALSE); //表示需要response body
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    //curl_setopt($ch, CURLOPT_NOPROGRESS, 100);
    //curl_setopt($ch, CURLOPT_HEADER, "Accept:application/text;version=1.0");
    $result = curl_exec($ch);

    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
        return $result;
    }

    return NULL;
}

echo httpGet();