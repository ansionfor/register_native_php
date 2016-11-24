<?php 
session_start();
if (!isset($_SESSION['user_id'])) {

    $_SESSION['user_id']=rand(10000,1000000);
    
}
 

include './admin/conn.php';

//访问数自动增加
$str = "UPDATE vote_index set visits=visits+1";
$conn->query($str);

//投票人数票数信息
$query = "SELECT * from vote_index limit 1";
$result = $conn->query($query);
$vote = $result->fetch_assoc();

//投票会员列表
$query2 = "SELECT id, name, vote, photo from user_info where is_delete=0 and status=1 order by vote desc";
$result2 = $conn->query($query2);
$list = Array();

while($row = $result2->fetch_assoc()){
    $list[] = $row;
}

//分类列出候选人:大宗商品、贵金属、外汇、金融科技、自媒体

/**
 * 大宗商品
 */
if (isset($_GET['sort'])) {

    unset($list);
    $list = Array();

    switch ($_GET['sort']) {
        case 'dazong':
            $dazong = "SELECT id, name, vote, photo from user_info where is_delete=0 and status=1 and sort='dazong' order by vote desc";
            $result_dz = $conn->query($dazong);
            while($row = $result_dz->fetch_assoc()){
                $list[] = $row;
            }

            break;
        case 'jinshu':
            $jinshu = "SELECT id, name, vote, photo from user_info where is_delete=0 and status=1  and sort='jinshu' order by vote desc";
            $result_js = $conn->query($jinshu);
            while($row = $result_js->fetch_assoc()){
                $list[] = $row;
            }

            break;
        case 'waihui':
            $waihui = "SELECT id, name, vote, photo from user_info where is_delete=0 and status=1  and sort='waihui' order by vote desc";
            $result_wh = $conn->query($waihui);
            while($row = $result_wh->fetch_assoc()){
                $list[] = $row;
            }

            break;
        case 'jinrong':
            $jinrong = "SELECT id, name, vote, photo from user_info where is_delete=0 and status=1  and sort='jinrong' order by vote desc";
            $result_jr = $conn->query($jinrong);
            while($row = $result_jr->fetch_assoc()){
                $list[] = $row;
            }

            break;
        case 'qita':
            $qita = "SELECT id, name, vote, photo from user_info where is_delete=0 and status=1  and sort='qita' order by vote desc";
            $result_qt = $conn->query($qita);
            while($row = $result_qt->fetch_assoc()){
                $list[] = $row;
            }

            break;
        default:
            # code...
            break;
    }
}

if (isset($_GET['keyword'])) {
    unset($list);
    $list = Array();
    $id = $_GET['keyword'];
    is_numeric($id) or die('error');
    $search = "SELECT id, name, vote, photo from user_info where is_delete=0 and id='$id' limit 1";
    $list[0] = $conn->query($search)->fetch_assoc();


}


?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<meta name="keywords" content="">
<meta name="description" content="深圳金融商博会">
<title>2016最佳金融分析师网络评选暨颁奖盛典 -深圳金融商博会</title>
<link rel="shortcut icon" href="./public/123.ico">
<link rel="stylesheet" href="./public/style.css" type="text/css" media="all">
<link rel="stylesheet" href="./public/common.css" type="text/css" media="all">
<link rel="stylesheet" href="./public/style(1).css" type="text/css" media="all">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<script language="javascript">var $ = jQuery.noConflict();</script>
<script src="./public/common.js" type="text/javascript" charset="utf-8"></script>
<script src="./public/fingerprint2.min.js" type="text/javascript"></script>
<script src="./public/public.js" type="text/javascript" charset="utf-8"></script>
<script src="./public/slide.js" type="text/javascript"></script>
<script>

</script>
</head>
<body id="wp">

<div style='display:none;'>
<img src='./public/123.jpg' />
</div>
<header> 
     
  <div class="scroll s_6">
    <div id="slider" style="overflow: hidden; visibility: visible;">
      <ul style="list-style: none; margin: 0px; width: 100%; transition-duration: 300ms; transform: translate3d(0px, 0px, 0px);">
         
                <li style="width: 100%; display: table-cell; vertical-align: top;"><img src="./vote_files/ABS-GROUP.png" width="100%"></li>
         
       

              </ul>
    </div>
    <div class="pp"></div>
  </div>
  
  
   

</header>
<style>
.filter li a { font-weight: normal;font-size:13px;padding-right: 5px;padding-left: 5px;height: 25px;line-height: 25px;display: inline-block;color: #c30d23;float:left;}
.span1 a.a {border: 1px solid #f5bf1c;background-color: #f5bf1c;border-radius: 4px;padding: 4px;}
.span1{ font-size:14px}
.filter {overflow: hidden;background-color: #ea9075;border-radius: 10px 10px 0px 0px;height: 110px;margin-top: 20px;}
.zb a.a {background-color: #1686f1;border-radius: 4px;color: #f5bf1c;border: 1px solid #1686f1;padding-right: 5px;padding-left: 5px;}
    </style>
<div class="simple">
<div class="list1">
  <div id="Timeline">

    <ul class="sjz">
      <li class="ty">
        <dl>
          <p>报名时间</p>
          <p class="t"></p>
          <p style="">10月1日</p>
          <p style="margin-top: -10px;">|</p>
          <p style="margin-top: -12px;">10月23日</p>
          <span style="position:relative;color:#f5bf1c;bottom:23px;right:-42px;font-size:8px">18:00</span>

        </dl>
      </li>
      <li>
        <dl>
          <p>投票时间</p>
          <p class="t"></p>
          <p>10月1日</p>
          <p style="margin-top: -10px;">|</p>
          <p style="margin-top: -10px;">10月27日</p>
          <span style="position:relative;color:#f5bf1c;bottom:25px;right:-42px;font-size:8px">18:00</span>
        </dl>
      </li>
      <li class="ty">
        <dl>
           <p>颁奖时间</p>
          <p class="t"></p>
          <p>10月28日</p>
          <p style="margin-top: -12px;">&nbsp;</p>
          <p style="margin-top: -12px;">14:00</p>
        </dl>
      </li>
      <li>
        <dl>
          <p>颁奖地点</p>
          <p class="t"></p>
          <p>深圳大中华国际交易广场</p>
        </dl>
      </li>
    </ul>

  </div>
  </div>
<div class="main1"> 
 
  
    <div class="topd">
    <ul>
      <li><?php echo $vote['people']; ?><p>报名人数</p></li>
      <li class="zhong"><?php echo $vote['votes']; ?><p>总投票数</p></li>
      <li><?php echo $vote['visits']; ?><p>总访问数</p></li>
    
    </ul>
  </div> 
  
  </div>
  <div>
     <dl class="search">
     <form action="vote.php" method="get" class="s">
       <input name="keyword" type="text" value="" class="text1" placeholder="请输入编号">
       <input name="submit" type="submit" value="搜索" class="submit1">
     </form>
         </dl>
    </div>
    <div>

</div>
<div class="cytp"> 
 
<div class="pszj2"><span class="pszj3">参与投票</span></div>
<span class="span1">

      </span>
             <div class="cytpbj">       
           <div class="box p11">
           <div>                 
        <ul class="filter">

            	<li><a href="vote.php" class="<?php if(!isset($_GET['sort'])){echo 'a';} ?>">全部</a></li>
                <li><a href="vote.php?sort=dazong" class="<?php if(isset($_GET['sort'])&&$_GET['sort']=='dazong'){echo 'a';} ?>">大宗商品</a></li>
                <li><a href="vote.php?sort=jinshu" class="<?php if(isset($_GET['sort'])&&$_GET['sort']=='jinshu'){echo 'a';} ?>">贵金属</a></li>
                <li><a href="vote.php?sort=waihui" class="<?php if(isset($_GET['sort'])&&$_GET['sort']=='waihui'){echo 'a';} ?>">外汇</a></li>
                <li><a href="vote.php?sort=jinrong" class="<?php if(isset($_GET['sort'])&&$_GET['sort']=='jinrong'){echo 'a';} ?>">金融科技</a></li>
                <li><a href="vote.php?sort=qita" class="<?php if(isset($_GET['sort'])&&$_GET['sort']=='qita'){echo 'a';} ?>">其他</a></li>

        </ul>
        </div>
  </div>
     
    
   <div class="box">
    <div class="applylist" id="applylist">   


    <?php 
    foreach ($list as $key => $value) {
       
    

     ?>       
    <div class="item">
        <dl class="p5">  
           <a class="imgs" href="member.php?id=<?php echo $value['id']; ?>"> 
           <img src="<?php echo substr($value['photo'],1); ?>"></a>
          <div class="bx"> 
          <p class="mark"><?php echo $value['name']; ?></p>
          <div class="info p5"> 
              <p class="an"><span style="color: #ecb17e; margin-left: 5px;"><span style="color:#efad2f"><?php echo $value['vote']; ?></span> 票</span></p> 
              <p class="tp"><a href="./admin/vote.php?id=<?php echo $value['id']; ?>" class="dialog"> 
              <span class="wttp">为<?php echo $value['id']; ?>号投票</span></a></p>
            </div>
                    
          </div>                       
        </dl>
      </div>
       <?php 
   }
        ?>
    </div>
  </div>


    
  </div>
</div>

<br>
<br>
<br>
<style>
.menu{}

</style>
<div id="mask" style="display:none;"></div>

<div id="qq-sendUrl-btn"></div></body></html>