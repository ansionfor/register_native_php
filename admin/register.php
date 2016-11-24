<?php 
exit;
session_start();
header("content-type:text/html;charset=utf-8");

$session_id = $_SESSION['user_id'];

include 'conn.php';
include 'resize.php';
$post = $_POST;
$file = $_FILES['photo'];


foreach ($post as $key => $value) {
	if ($value=='') {
		echo "<script>alert('请填写完整');history.go(-1);</script>";
		exit;
	}
}

if($_FILES){  
	 foreach( $_FILES as $key => $_value ) 
	 { 
	  	$_FILES[$key]['type'] =$_value['type'];   
	 } 
	 if(substr($_FILES[$key]['type'],0,6) !='image/') 
	 { 
	 	echo "<script>alert('请上传正确头像');history.go(-1);</script>";
	  	exit; 
	 } 
}

if (!empty($file['name'])) {


	$name = htmlspecialchars($post['title']);
	$sort = htmlspecialchars($post['Ccph6']);
	$sex = htmlspecialchars($post['pa2RG']);
	$tel = htmlspecialchars($post['OSYBL']);
/*	$verify = htmlspecialchars($post['code']);*/
	$qq = htmlspecialchars($post['Qc6Z4']);
	$company = htmlspecialchars($post['mAjFK']);
	/*$summary_company = htmlspecialchars($post['OntQ6']);*/
	$summary_own = htmlspecialchars($post['field_3']);
	
	$pos = strrpos($file['name'], '.');
	$file_name = substr($file['name'], $pos);
	$time = time();
	$rand = time().rand(100,10000);
	$path = '../uploads/'.$rand.$file_name;
	$path1 = '../uploads1/'.$rand.$file_name;

	if ($file['size']>50000) {
		$status = move_uploaded_file($file['tmp_name'], $path1);
		resize($path1);
	}else{
		$status = move_uploaded_file($file['tmp_name'], $path);
	}

	
	if ($status) {
		$stmt = $conn->prepare("INSERT INTO `user_info` (name, tel, sex, sort, photo, qq, company, summary_own, time) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssissi", $name, $tel, $sex, $sort, $path, $qq, $company, $summary_own, $time);

		$status1 = $stmt->execute();
		
		if ($status1) {
			
			echo "<script>alert('报名成功,请等待审核');location.href='../vote.php';</script>";
		}else{
			echo "<script>alert('姓名可能已存在,请重试!');location.href='../vote.php';</script>";
		}

	}

}else{
	echo "<script>alert('请上传头像');history.go(-1);</script>";
	exit;
}






