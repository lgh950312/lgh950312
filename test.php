<?php

require_once ('image.class.php');


function myGetImageSize($url, $type, $isGetFilesize = true)
{

    $handle = fopen($url, 'rb');

    $result = array();

    // 是否获取图片体积大小
    if ($isGetFilesize) {
        // 获取文件数据流信息
        $meta = stream_get_meta_data($handle);
        // nginx 的信息保存在 headers 里，apache 则直接在 wrapper_data
        $dataInfo = isset($meta['wrapper_data']['headers']) ? $meta['wrapper_data']['headers'] : $meta['wrapper_data'];

        foreach ($dataInfo as $va) {
            if ( preg_match('/length/iU', $va)) {
                $ts = explode(':', $va);
                $result['size'] = trim(array_pop($ts));
                break;
            }
        }
    }

    if ($type == 'fread') fclose($handle);

    return $result;
}

$src = "http://img.weimeijieyuan.com/uploads/image2/20170504/201705041321150.jpeg";
$result = myGetImageSize($src, 'fread');



if($result >= 112942){
    $image = new Image($src);
    $image->percent = 112942/$result;
    $image->openImage();
    $image->thumpImage();
    $image->showImage();
    $image->saveImage('201705041321150');
}


?>