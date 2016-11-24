<?php 
session_start();

if (!isset($_SESSION['user_id'])) {

    $_SESSION['user_id']=rand(10000,1000000);
    
}

include './admin/conn.php';

$str = "UPDATE vote_index set visits=visits+1";
$conn->query($str);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="Cache-control" content="no-cache">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content="">
<meta name="description" content=",深圳金融商博会">
<title>2016最佳金融分析师网络评选暨颁奖盛典 -深圳金融商博会</title>

<link rel="stylesheet" href="./public/style.css" type="text/css" media="all">
<link rel="stylesheet" href="./public/common.css" type="text/css" media="all">
<link rel="stylesheet" href="./public/style(1).css" type="text/css" media="all">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<script language="javascript">var $ = jQuery.noConflict();</script>
<script type="text/javascript"></script>
<script src="./public/common.js" type="text/javascript" charset="utf-8"></script>
<script src="./public/fingerprint2.min.js" type="text/javascript"></script>
<script src="./public/public.js" type="text/javascript" charset="utf-8"></script>
<script src="./public/slide.js" type="text/javascript"></script>
<script src="http://libs.baidu.com/jquerymobile/1.3.0/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
<script>

</script></head>
<body id="wp" class="ui-mobile-viewport ui-overlay-c"><div data-role="page" data-url="/plugin.php?id=polls:home&amp;actid=5&amp;mobile=2" tabindex="0" class="ui-page ui-body-c ui-page-active" style="min-height: 680px;">
<header> 
  
  <script type="text/javascript">
     var em = '';
     li = document.getElementById('slider').getElementsByTagName('li');
     for(i=0;i<li.length;i++){
     if(i==0){
         em += '<em class="on"></em>';
     }else{
     em += '<em class=""></em>';
     }
 }
 document.getElementById('position').innerHTML = em;
var slider = new Swipe(document.getElementById('slider'), {
      callback: function(e, pos) {
        var i = bullets.length;
        while (i--) {
          bullets[i].className = '';
        }
        bullets[pos].className = 'on';
      }
    }),
    bullets = document.getElementById('position').getElementsByTagName('em');
</script> 

   

</header>
<style type="text/css">
.main { background-image:url(./public/sytp.jpg); background-size:100% 100%; }
.zbdw { text-align: center; color: white; font-size: 20px; margin-top: -1em; }
.time { text-align: center; width: 80%; margin: auto; height: 65px; background-color: rgba(0, 0, 0, 0.29); color: white; padding-top: 4%; font-size: 16px; }
.time span { font-weight:bold }
.main .hdjs h1:after, .main .hdjs h1:before { content: ''; height: 1px; background-color: #FFF; display: inline-block; position: relative; top: -5px; margin: 0 5px; width: 35%; }
.anniu { text-align: center; margin-top: 20px; }
.hdjs { padding-top: 10%; text-align: center; color: white; }
.hdjs1 { width: 85%; margin: auto; border-radius: 4px; padding: 10px 10px; font-size: 14px; background-color: rgba(255, 239, 215, 0.13); text-align:left; margin-top: 10px; }
.main .tyjb h1:after, .main .tyjb h1:before { content: ''; height: 1px; background-color: #FFF; display: inline-block; position: relative; top: -5px; margin: 0 5px; width: 35%; }
.main .pxgz h1:after, .main .pxgz h1:before { content: ''; height: 1px; background-color: #FFF; display: inline-block; position: relative; top: -5px; margin: 0 5px; width: 35%; }
.tyjb { padding-top: 10%; text-align: center; color: white; }
.tyjb li { width: 29%; float: left; position: relative; margin-top: -10px; margin-right: 4%; height: 140px; }
.tyjb1 a img { border: 3px solid #00bce8; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; margin-bottom: 5px; }
.tyjb1 { width: 85%; margin: auto; border-radius: 4px; font-size: 14px; background-color: rgba(255, 239, 215, 0.13); text-align: center; margin-top: 10px; height: 380px; padding-left: 10px; }
.tyjb .name { background-color: #ff4242; border-radius: 4px; width: 70px; color:#fff; margin: auto; margin-top: 5px; }
.pxgz { padding-top: 5%; text-align: center; color: white; }
.pxgz1 { width: 85%; margin: auto; border-radius: 4px; font-size: 14px; background-color: rgba(255, 239, 215, 0.13); text-align: left; margin-top: 5px; padding-left: 10px;padding-right: 10px; height:19.4em; }
.pxgz2 { width: 85%; margin: auto; border-radius: 4px; font-size: 14px; background-color: rgba(255, 239, 215, 0.13); text-align: left; margin-top: 10px; padding-left: 8px; padding-right: 5px; padding-bottom: 5px; }
.pxgz3 { width: 85%; margin: auto; border-radius: 4px; font-size: 14px; background-color: rgba(5, 32, 53, 0.83); text-align:left; margin-top: 10px; padding: 10px; }
.pxgz1 p { height:70px; }
.fmt { height:10em }
.pxgz2 img { width:32%; margin-top: 5px; height: 37px; }
</style>

<div class="main"> 

  <img style="margin-top: 0em;" src="./index_files/fmt.jpg" width="100%">

<div class="time" style="height:122px">
    <p><span>报名时间：</span>10月1日－10月23日</p>
    <p><span>投票时间：</span>10月1日－10月27日</p>
    <p><span>颁奖时间：</span>10月28日14:00</p>
    <p><span>颁奖地点：</span>深圳大中华国际交易广场</p>
</div>
<div class="anniu">
<!--   <a href="register.php" rel="external" class="ui-link">
  <img src="./index_files/baoming.png" height="30px"></a> -->
  <a href="vote.php" rel="external" class="ui-link">
  <img src="./index_files/toupiao.png" height="30px"></a> 
</div>
  <div class="hdjs">
    <h1 style="font-size: 14px;">活动介绍</h1>
    <div class="hdjs1"> 2016最佳金融分析师网络评选是深圳金融商博会的同期活动之一。此评选完全是依靠网络投票选出，无任何人工行为，公平公开公正。我们乐于与广大分析师结盟，同聚鹏城，共谋发展。深圳金融商博会将评选出前200名网络票数最多的分析师，颁发奖杯，证书并获赠大会免费酒水券一张。后期将与各媒体合作，协助200名分析师免费进驻媒体分析师栏目，以实现更大的宣传。</div>
  </div>
  <div class="tyjb">
    <h1 style="font-size: 14px;">奖励内容</h1>
    <div class="tyjb1" style=" font-size:18px;padding-top: 25px;height:158px">
      <p><span style="float:left">☆</span>&nbsp;个人荣誉奖杯及证书<br>
<span style="float:left">☆</span>&nbsp;官方微信将曝光获奖信息<br>
<span style="float:left">☆</span>&nbsp;现场媒体报道<br>
<span style="float:left">☆</span>&nbsp;网络直播过万观众<br>
<span style="float:left">☆</span>&nbsp;免费酒水招待</p>
    </div>
    <div style="margin-top: 10px;font-size: 14px;"></div>
  </div>
  <div class="pxgz">
    <h1 style="font-size: 14px;">评选规则</h1>
    <div class="pxgz1"> 
      <p style="padding-top:15px;">①网络报名,评选对象可通过官网、QQ、微信、电话报名参选！</p>
      <p style="padding-top:2px;height:47px;">②以10月27日18点时的投票统计为最终投票结果。</p>
      <p style="padding-top:3px;">③报名人数不够200名则全部入选，前50名则有数量不等的现金红包。</p>
      <p style="padding-top:3px;">④入围者必须确认10月28日下午2点现场领奖，否则获奖名额将取消。</p>
    </div>
  </div>
  <div class="pxgz">
    <h1 style="font-size: 14px;margin-bottom:5px">奖项评选</h1>
    <div class="pxgz2" style="padding:0px;margin-top: 0px;">
    <img src="./public/jiangxiang.png" style="height:645px;width:100%;margin-top: 0px;" alt="">
  </div>
  </div>
  <div class="pxgz">
    <h1 style="font-size: 14px;">报名方式：</h1>
    <div class="pxgz3">
      <p>电话热线：&nbsp;&nbsp;<a href="tel:021-31261015" class="ui-link">021-3126 1015(点击拨打)</a></p>
      <p>QQ:&nbsp;&nbsp;<a class="ui-link">2245087239</a></p>
      <p>微信:&nbsp;&nbsp;<a class="ui-link">iapple168</a></p>
      <p>官网:&nbsp;&nbsp;<a href="http://www.chinaforexexpo.com" class="ui-link">www.chinaforexexpo.com</a></p>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="./public/qrcode.jpg" alt="" style="width:35%;height:35%;margin:0 auto">
      <p>长按二微码可加公众号登记免费参加活动</p>
      <p>本次活动解释权归深圳金融商博会所有!</p>
      <br>
     <br>
    </div>
  </div>
</div>

<style>
.menu{}

</style>
<div id="mask" style="display:none;"></div>
<footer>


      <div class="menu" id="menu">
     
    <a href="index.php" style="width:50%;" rel="external" class="curr ui-link"><dl style="margin-top: 5px;"><img src="./index_files/home_1.png" zsrc="source/plugin/polls/static/images/mobile/home_1.png" style="display: inline; visibility: visible;"><span style="font-size:16px">首页</span></dl></a>
     
    <a href="vote.php" style="width:50%;" rel="external" class="ui-link"><dl style="margin-top: 5px;"><img src="./index_files/list_1.png" zsrc="source/plugin/polls/static/images/mobile/list_1.png" style="display: inline; visibility: visible;"><span style="font-size:16px">投票</span></dl></a>
  
      </div>
<script type="text/javascript">

</script> 
 
</footer>
</div><div class="ui-loader ui-corner-all ui-body-a ui-loader-default ui-loader-fakefix" style="top: 341px;"><span class="ui-icon ui-icon-loading"></span><h1>loading</h1></div><div id="qq-sendUrl-btn"></div><div style="display: none;"><script type="text/javascript" src="./index_files/z_stat.php"></script></div></body></html>