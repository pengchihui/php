<?php
    /*处理步骤    验证   持久化  响应*/
    /*持久化到数据库*/
	$con=mysqli_connect("127.0.0.1","sfydb_6313663","Kaiweili.9","sfydb_6313663");
	if($con){
	   /*增加到数据库*/
	    $sql="INSERT INTO `1`(`id`, `titile`, `singer`, `picture`, `music`) VALUES ('".$_GET['id']."','".$_GET['title']."','".$_GET['singer']."','".$_GET['piPath']."','".$_GET['muPath']."')";
	    mysqli_query($con, $sql);
		var_dump($sql);
	    var_dump(mysqli_query($con, $sql));
//	    header('location: shows.php');
	    return;
	}else{
		$GLOBALS['error_message']=mysqli_connect_error();
		return;
	}
	/*持久化到几记事本*/
//  function book(){
//	    $arry=json_decode(file_get_contents("music.txt"),true); 
//		$new=array(
//		  "id"=>"$id",
//		  "title"=>"$title",
//		  "singer"=>"$singer",
//		  "picture"=>"$piPath",
//		  "music"=>"$muPath"
//		);
//		array_push($arry,$new);
//		$result=json_encode($arry,JSON_UNESCAPED_UNICODE);
//		file_put_contents("music.txt", "$result");
//	    }
	   mysqli_close($con);
?>