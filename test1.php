<?php

require_once('config/config_global.php');

function rands($len){
    $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $string=time();
    for(;$len>=1;$len--) {
        $position=rands()%strlen($chars);
        $position2=rands()%strlen($string);
        $string=substr_replace($string,substr($chars,$position,1),$position2,0);
    }
    return $string;
}

//$randomber = rands(4);
//
//var_dump($randomber);


function getRandomStr($j){
    $str="";
    $strpool="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max=strlen($strpool)-1;

    for($i=0;$i<$j;$i++){
        $str.=$strpool[mt_rand(0,$max)];
    }

    return $str;
}

//$randomber = getRandomStr(4);
//
//var_dump($randomber);



//$sql = "select * from live_robot";
//$robots = $db->fetch_limit($sql);
//
//    foreach($robots as $key => $val){
//        $rouserids = $val['rouserid'];
//        $rouserid = substr($val['rouserid'],-2);
//        $ronick = '唯美'.$rouserid;
//        var_dump($ronick);
//        $sql = "update live_robot set ronick = '$ronick' where rouserid = $rouserids";
//        $db->query($sql);
//    }

//$nickars = array('椛丶未眠','Always','繁星','仰望月空','对你微笑','独特','步步','子子','轻颂','夏目的猫',
//                '木风','michael','Idiot','OneLife','初见','夕阳','Altair','飞鱼','丶','微末',
//                '李医生','杨医生','郝医生','韩教授','王医生','陈教授','周医生','外科整型','魏医生','石医生',
//                '秦医生','weimei156','沉默','左手倒影','依赖','期盼','临时','淺笑嫣然','再拥友','旧年旋律',
//                '不可弃','花一样开放','惯用的方式','坚强','赵副主任','浅笑','ae','昔年','褐色美瞳片','青柠',
//                '无痕','黄教授','柳医生','吕医生','张主任','线雕','孟医生','林医生','卞医生','何医生',
//                '白医生','邵主任','范医生','顾医生','单医生','季主任','徐医生','梁医生','戴医生','夏副主任');
//
//
//$j=31110;
//for($i=0;$i<70;$i++){
//    $j = $j+1;
//    $t = substr($j,-3);
//    $photo = "http://www.weimeijieyuan.com/uploads/imgrb/20170517" . $t . ".jpg";
//    $nick = $nickars[$i];
//
//    $sql = "insert into live_robot(rouserid, ronick, rophoto) values("
//        . $j . ",'"
//        . $nick . "','"
//        . $photo . "')";
//    $db->query($sql);
//
//}


//$str1 = 'asdfFSDdda';
//$str2 = 'Fs';
////strpos 大小写敏感  stripos大小写不敏感    两个函数都是返回str2 在str1 第一次出现的位置
//if(strpos($str1,$str2) === false){     //使用绝对等于
//    //不包含
//}else{
//    //包含
//}
//$str = '';
//if(isset($str)){
//    echo 1;
//}else{
//    echo 0;
//}


//$todaytime = strtotime('today+1');
//var_dump($todaytime);


//    $todaytime = strtotime('today');
//    if($todaytime == time()) {


//function test($db,$j,$nickars){
//    if(substr(time(),-2) == 00){
//        for($i=0;$i<20;$i++){
//        $j = $j+1;
//        $t = substr($j,-3);
//        $photo = "http://www.weimeijieyuan.com/uploads/imgrb/20170517" . $t . ".jpg";
//        $nick = $nickars[$i];
//
//        $sql = "insert into live_robot(rouserid, ronick, rophoto) values("
//            . $j . ",'"
//            . $nick . "','"
//            . $photo . "')";
//        $db->query($sql);
//        }
//        //执行sql语句
//        sleep(60);
//    }
//    if(false){
//        exit;
//    }
//    test($db,$j,$nickars);
//}
//test($db,$j,$nickars);


function test($a=0,&$result=array())
{
    $a++;
    if ($a < 10) {
        $result[] = $a;
        test($a, $result);
    }
    echo $a;
    return $result;
}

//$date = date('Y-m-d', strtotime('2017-04-26 +7 days'));
//$date = date('Y-m-d 59:59:59', strtotime('-7 days'));
//echo $date;

//$userphoto = 'http://img.weimeijieyuan.com/uploads/imageapp/member_noavatar_man.png';
//$t = strpos($userphoto,'http://');
//if($t !== false){
//    echo 1;
//}else{
//    echo 0;
//}


$liveid = $_GET['liveid'];

$sql = "select * from live_robot";
$rtn = $db->fetch_limit($sql);
if(is_array($rtn) && $rtn) {
    foreach ($rtn as $key => $val) {

        $sql_array[] = "(". $liveid .",". $val['rouserid'] .",'". $val['ronick'] ."','". $val['rophoto'] ."')";
        $sql2 = implode(',',$sql_array);

    }
    $sql = "insert into live_robottest(liveid, rouserid, ronick, rophoto)values". $sql2;
    $db->query($sql);

    var_dump($sql);
}


?>