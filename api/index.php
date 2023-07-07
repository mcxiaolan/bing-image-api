<?php
date_default_timezone_set('Asia/Shanghai');
//判断是否随机调用
if ($_GET['rand']==='true') {
  $gettime = rand(-1,7);
}else{
//若不为随机调用则判断是否指定日期
  $gettimebase = $_GET['day'];
  if (empty($gettimebase)) {
    $gettime = 0;
  }else{
    $gettime = $gettimebase;
  }
}
//判断是否指定格式
$getformatbase = $_GET['format'];
if (empty($getformatbase)) {
  $getformat = "jpg";
}else{
  $getformat = $getformatbase;
}
//获取Bing Json信息
$json_string = file_get_contents('https://cn.bing.com/HPImageArchive.aspx?format=js&idx='.$gettime.'&n=1');
//转换为PHP数组
$data = json_decode($json_string);
//提取基础url
$imgurlbase = "https://cn.bing.com".$data->{"images"}[0]->{"urlbase"};
//判断是否指定图片大小
$imgsizebase = $_GET['size'];
if (empty($imgsizebase)){
  $imgsize = "1920x1080";
}else{
  $imgsize = $imgsizebase;
}
//建立完整url
$imgurl = $imgurlbase."_".$imgsize.".".$getformat."";
//获取其他信息
$imgtime = $data->{"images"}[0]->{"startdate"};
$imgtitle = $data->{"images"}[0]->{"copyright"};
$imglink = $data->{"images"}[0]->{"copyrightlink"};
//判断是否只获取图片信息
if ($_GET['info']==='true') {
  echo "{title:".$imgtitle.",url:".$imgurl.",link:".$imglink.",time:".$imgtime."}";
}else{
  //若不是则跳转url
  header("Location: $imgurl");
}
