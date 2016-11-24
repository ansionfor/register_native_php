<?php 
session_start();
header("content-type:text/html;charset=utf-8");

$session_id = $_SESSION['user_id'];



if (isset($session_id)) {

	$id = $_GET['id'];
	//$ip = $_SERVER["HTTP_CLIENT_IP"];
	$session_id = $_SESSION['user_id'];
	include 'conn.php';


	//将投票者信息存进数据库
	$query1 = "SELECT vote_for from vote_ip where session_id=$session_id";
	$result1 = $conn->query($query1)->fetch_assoc();
	$data = explode(',', $result1['vote_for']);

	foreach ($data as $key => $value) {
		if ($value == $id) {
			echo "<script>alert('不能重复投票');history.go(-1);</script>";
			exit;
		}
	}

	$query = "UPDATE user_info set vote=vote+1 where id = $id";
	$conn->query($query);

	if ($result1==null) {
		$vote_forId = $id;
	}else{
		$vote_forId = $result1['vote_for'].",".$id;
	}

	$query2 = "INSERT INTO vote_ip (`session_id`, `vote_for`) values ('$session_id', '$vote_forId')";

	$result2 = $conn->query($query2);

	if ($result2) {
		echo "<script>alert('投票成功');location.href='../vote.php';</script>";
	}else{
		$query4 = "UPDATE `vote_ip` set `vote_for` = '$vote_forId' where `session_id` = '$session_id'";
		//var_dump($query4);
		$result4 = $conn->query($query4);

		if ($result4) {
			echo "<script>alert('投票成功');location.href='../vote.php';</script>";
		}
	}


}else{
	exit;
}
