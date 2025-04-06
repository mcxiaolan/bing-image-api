<?php
date_default_timezone_set('Asia/Shanghai');

// 使用 null 合并运算符获取参数，避免 undefined index 警告
$randParam   = $_GET['rand']   ?? '';
$dayParam    = $_GET['day']    ?? '';
$formatParam = $_GET['format'] ?? '';
$sizeParam   = $_GET['size']   ?? '';
$infoParam   = $_GET['info']   ?? '';

// 判断是否随机调用
if ($randParam === 'true') {
  $gettime = rand(-1, 7);
} else {
  // 若不为随机调用则判断是否指定日期
  $gettime = empty($dayParam) ? 0 : $dayParam;
}

// 判断是否指定格式
$getformat = empty($formatParam) ? "jpg" : $formatParam;

// 获取Bing Json信息
$json_string = file_get_contents('https://cn.bing.com/HPImageArchive.aspx?format=js&idx=' . $gettime . '&n=1');
// 转换为PHP对象
$data = json_decode($json_string);
// 提取基础url
$imgurlbase = "https://cn.bing.com" . $data->images[0]->urlbase;

// 判断是否指定图片大小
$imgsize = empty($sizeParam) ? "1920x1080" : $sizeParam;

// 建立完整url
$imgurl = $imgurlbase . "_" . $imgsize . "." . $getformat;

// 获取其他信息
$imgtime  = $data->images[0]->startdate;
$imgtitle = $data->images[0]->copyright;
$imglink  = $data->images[0]->copyrightlink;

// 判断是否只获取图片信息
if ($infoParam === 'true') {
  echo "{title:" . $imgtitle . ",url:" . $imgurl . ",link:" . $imglink . ",time:" . $imgtime . "}";
} else {
  // 若不是则跳转url
  header("Location: $imgurl");
}
?>
