<?php 
session_start();

if (!isset($_SESSION['user_id'])) {

    $_SESSION['user_id']=rand(10000,1000000);
    
}

if (isset($_GET['id'])) {

    is_numeric($_GET['id']) or die('error');
    $id = $_GET['id'];
    include './admin/conn.php';
    $query = "SELECT * FROM user_info where id='$id'";
    $result = $conn->query($query)->fetch_assoc();

    
    # code...
}else{
    exit();
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body id="wp"><div style="background-color: #ededed;">


<meta name="viewport" content="
    height = [pixel_value | device-height] ,
    width = [pixel_value | device-width ] ,
    initial-scale = 0.5 ,
    minimum-scale = float_value ,
    maximum-scale = float_value ,
    user-scalable = [yes | no] ,
  ">

<meta http-equiv="Cache-control" content="no-cache">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content="<?php echo $result['name'];?> - 2016最佳金融分析师网络评选暨颁奖盛典 - 深圳金融商博会">
<meta name="description" content="深圳金融商博会">
<title><?php echo $result['name'];?> - 2016最佳金融分析师网络评选暨颁奖盛典 -深圳金融商博会</title>
<link rel="stylesheet" href="./public/style.css" type="text/css" media="all">
<link rel="stylesheet" href="./public/common.css" type="text/css" media="all">
<link rel="stylesheet" href="./public/style(1).css" type="text/css" media="all">
<script src="./member_files/jquery.min.js" type="text/javascript"></script>
<script language="javascript">var $ = jQuery.noConflict();</script>

<style>
.box{     background-color: #fff;
    border: 1px solid #fff;
       height: 30em;    }
.box	.p15{    padding-top: 10px;
    text-align: center;}
.box .p15 img{    width: 7em;
    height: 7em;
    border-radius: 50%;
    box-shadow: 3px 3px 10px #ccc;}
.box .p2{    color: black;
    font-size: 14px;
    padding-top: 5px;text-align: center;    height: 1.5em;}

.item p{    color: black;}
.box ul li{    width: 50%;
    float: left;}
.box ul{    text-align: center;    margin-top: 5%;}
.box  .ys{color: #fc0101;
    font-weight: bold;}
.box .tp{    background-color: #fc0101;
    margin-top: 6em;
    width: 70%;
    text-align: center;
    margin-left: 15%;
    height: 2em;
    border-radius: 4px;
    padding-top: 8px;}

</style>
<div>        <div class="box">
      <dl class="p15">
               <a href="<?php echo substr($result['photo'],1); ?>"> <img src="<?php echo substr($result['photo'],1); ?>" height="60" exif="文件信息 : 没有图片EXIF信息"> </a>
              </dl>
      <p class="p2"><?php echo $result['name']; ?></p>
        <p style="color: #b8b8b8; text-align:center;    margin: 1%;height: 2em;"></p>
        <p style="overflow: hidden;text-overflow: ellipsis;course: hand;height: 7.7em;margin-top: 5px;width: 90%;margin: auto;    color: #636363"><?php echo $result['summary_own']; ?></p>
        <ul>
 
       <li class="ys">
	   <?php 
       switch ($result['sort']) {
           case 'dazong':
               echo "大宗商品";
               break;
           case 'jinshu':
               echo "贵金属";
               break;
            case 'waihui':
               echo "外汇";
               break;
            case 'jinrong':
               echo "金融科技";
               break;
            case 'qita':
               echo "其他";
               break;
           default:
               # code...
               break;
       }


       ?></li>
       <li class="ys"><?php echo $result['vote']; ?></li>

       <li>分类</li>
       <li>票数</li>
        </ul>
      <div class="tp"><a style="padding: 10px 35%;" href="./admin/vote.php?id=<?php echo $result['id'];?>" class="dialog">投TA一票</a></div>
    </div>
    <a href="http://mp.weixin.qq.com/s?__biz=MzI0MDE5Mjg4OA==&mid=2650858301&idx=1&sn=323ba18bc5ed15e1134d6016d23cb3a5&chksm=f2eadf2ac59d563ce3b709697b96d34079e21e0189ea1b5a51e37dc1528f5f4e14bb4973b8e3&mpshare=1&scene=23&srcid=1020LidNjcAZnNXFgSuK0ci2#rd"><img src="./public/aadd.gif" alt="" style="width:100%;"></a>
    <div class="main view" style=" height:24em;margin-buttom:50px">
 <!-- 多说评论框 start -->
    <div class="ds-thread" style="background-color: #f7ecdd;" data-thread-key="<?php echo $result['id'];?>" data-title="<?php echo $result['name'];?>" data-url="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"ansiontoupiao"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] 
         || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script>
<!-- 多说公共JS代码 end -->
    </div>




</div>
</div><style>
.menu{}

</style>

<div id="mask" style=""><br>
<br>
<br></div>

<div id="qq-sendUrl-btn"></div></body></html>