<?php
function file_get_contents_ex($url, $timeout = 6)
{
    $ctx = stream_context_create(array (
        'http' => array (
            'timeout' => $timeout 
        ) 
    ));
    return file_get_contents($url, 0, $ctx);
}

function sendWeixin($id = 69720240, $content = '天枢——test'){
    file_get_contents_ex('http://gochat.duapp.com/api/weixin/send/?id=' . $id . '&content=' . $content);
}