<?php

$arr=array(1,43,54,62,21,66,32,78,36,76,39);

//冒泡排序
function bubbleSort($arr)
{
    $len=count($arr);
    //该层循环控制 需要冒泡的轮数
    for($i=1;$i<$len;$i++)
    { //该层循环用来控制每轮 冒出一个数 需要比较的次数
        for($k=0;$k<$len-$i;$k++)
        {
            if($arr[$k]>$arr[$k+1])
            {
                $tmp=$arr[$k+1];
                $arr[$k+1]=$arr[$k];
                $arr[$k]=$tmp;
            }
        }
    }
    return $arr;
}

//选择排序
function selectSort($arr) {
//双重循环完成，外层控制轮数，内层控制比较次数
    $len=count($arr);
    for($i=0; $i<$len-1; $i++) {
        //先假设最小的值的位置
        $p = $i;

        for($j=$i+1; $j<$len; $j++) {
            //$arr[$p] 是当前已知的最小值
            if($arr[$p] > $arr[$j]) {
                //比较，发现更小的,记录下最小值的位置；并且在下次比较时采用已知的最小值进行比较。
                $p = $j;
            }
        }
        //已经确定了当前的最小值的位置，保存到$p中。如果发现最小值的位置与当前假设的位置$i不同，则位置互换即可。
        if($p != $i) {
            $tmp = $arr[$p];
            $arr[$p] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    //返回最终结果
    return $arr;
}

//插入排序
function insertSort($arr) {
    $len=count($arr);
    for($i=1;$i<$len;$i++) {
        $tmp = $arr[$i];
        //内层循环控制，比较并插入
        for($j=$i-1;$j>=0;$j--) {
            if($tmp < $arr[$j]) {
                //发现插入的元素要小，交换位置，将后边的元素与前面的元素互换
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素，由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    return $arr;
}

//快速排序
function quickSort($arr) {
    //先判断是否需要继续进行
    $length = count($arr);
    if($length <= 1) {
        return $arr;
    }
    //选择第一个元素作为基准
    $base_num = $arr[0];
    //遍历除了标尺外的所有元素，按照大小关系放入两个数组内
    //初始化两个数组
    $left_array = array();  //小于基准的
    $right_array = array();  //大于基准的
    for($i=1; $i<$length; $i++) {
        if($base_num > $arr[$i]) {
            //放入左边数组
            $left_array[] = $arr[$i];
        } else {
            //放入右边
            $right_array[] = $arr[$i];
        }
    }
    //再分别对左边和右边的数组进行相同的排序处理方式递归调用这个函数
    $left_array = quick_sort($left_array);
    $right_array = quick_sort($right_array);
    //合并
    return array_merge($left_array, array($base_num), $right_array);
}

function Sorting($cars)
{
    ksort($cars);
    return $cars;
}

//遍历某个目录下的所有文件和子文件夹
function read_all_dir ( $dir )
{
    $result = array();
    $handle = opendir($dir);
    if ( $handle )
    {
        while ( ( $file = readdir ( $handle ) ) !== false )
        {
            if ( $file != '.' && $file != '..')
            {
                $cur_path = $dir . DIRECTORY_SEPARATOR . $file;
                if ( is_dir ( $cur_path ) )
                {
                    $result['dir'][$cur_path] = read_all_dir ( $cur_path );
                }
                else
                {
                    $result['file'][] = $cur_path;
                }
            }
        }
        closedir($handle);
    }
    return $result;
}

//遍历某个目录下的所有文件和子文件夹
function getfiles1($path){
    foreach(scandir($path) as $afile)
    {
        if($afile=='.'||$afile=='..') continue;
        if(is_dir($path.'/'.$afile))
        {
            getfiles1($path.'/'.$afile);
        } else {
            echo $path.'/'.$afile.'<br />';
        }
    }
}
//遍历某个目录下的所有文件和子文件夹(可以只查询后缀名为XXX的)
function getfiles2($path){
    foreach(glob($path) as $afile){
        if($afile=='.'||$afile=='..') continue;
        if(is_dir($afile))
        {
            getfiles2($afile.'/*.png');
        } else {
            echo $afile.'<br />';
        }
    }
}
//对象转数组
function object_array($array) {
    if(is_object($array)) {
        $array = (array)$array;
    }
    if(is_array($array)) {
        foreach($array as $key=>$value) {
            $array[$key] = object_array($value);
        }
    }
    return $array;
}

//echo '1'.print_r(8)+3;
//echo '1'.print('2')+3;
//echo '1' . (print '2') + 3;

//echo "<pre>";print_r($a);echo "<pre>";

//$modate = date('Y-m-d',strtotime("+1 year"));
//date_default_timezone_set("Asia/Shanghai");
//echo strtotime($modate);

//上个星期此时时间
//echo date("Y-m-d",strtotime("-1 week"));
//echo date("Y-m-d");


//$a='a1';
//if($a!=0){
//    echo 'qqqq';
//}else {
//    echo 'pppp';
//}


//$rtn = array(1=>"5", 4=>"10");
//
//$ret = $rtn['2'];
//var_dump($ret);


//function getStr($a = '123',$b){
//    return "get $a$b\n";
//}
//echo (getStr('123'));

function a($n,$m){
    $r = 0;
    for($i=2;$i<=$n;$i++){
        $r = ($r+$m)%$i;
    }
    return $r+1;
}
//
//echo a(6,8);

//$d2 = strtotime(date('Y-m-d'));//当前日期
//$d1 = strtotime('2017-07-04');
//if ($d1 != $d2) {
//    $td = round(($d2 - $d1) / 3600 / 24);
//}
//
//echo $td;

//$mmp = 666;
//$wtf = 333;

//$wkz = <<<kw
//wkzbc666{$mmp} or {$wtf}
//kw;



//echo date('Y-m-d H:i:s',strtotime('-1 day',time()));



//echo 5%100;

?>