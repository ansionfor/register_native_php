<?php


function resize($src) {
	$temp=pathinfo($src);
	$name=$temp["basename"];//文件基本名
	$savepath="../uploads/{$name}";//缩略图保存路径
	//获取图片的基本信息
	$info=getimagesize($src);
	$width=$info[0];//获取图片宽度
	$height=$info[1];//获取图片高度
	$w = 500;//压缩后图片的宽度
	$h = intval($w * $height / $width);//等比缩放图片高度 变整型
	 
	$temp_img=imagecreatetruecolor($w,$h);//创建画布
	$im=create($src);
	imagecopyresampled($temp_img,$im,0,0,0,0,$w,$h,$width,$height);//将图片复制到画布中
	imagejpeg($temp_img,$savepath, 65);
	imagedestroy($im);
	 
	return $savepath;
}
 
/**
* 创建图片，返回资源类型
* @param string $src 图片路径
* @return resource $im 返回资源类型
* **/
function create($src) {
	$info=getimagesize($src);
	switch ($info[2]) {
	case 1:
	$im=imagecreatefromgif($src);
	break;
	case 2:
	$im=imagecreatefromjpeg($src);
	break;
	case 3:
	$im=imagecreatefrompng($src);
	break;
	}
	return $im;
}




