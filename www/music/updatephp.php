<?php
/*持久化到数据库*/
	$con=mysqli_connect("localhost","pengroot","123456","test");
	if($con){
	   /*增加到数据库*/
	    $sql="UPDATE `singer` SET `titile`='".$_GET['titile']."',`singer`='".$_GET['singer']."',`picture`='".$_GET['piPath']."',`music`='".$_GET['muPath']."' WHERE id='".$_GET['id']."'";
	    $show=mysqli_query($con, $sql);
//		var_dump($show);
//		var_dump($sql);
	    header('location: http://localhost/music/shows.php');
	    return;
	}else{
		$GLOBALS['error_message']=mysqli_connect_error();
		return;
	}
	/*持久化到几记事本*/
    function book(){
	    $arry=json_decode(file_get_contents("music.txt"),true); 
		$new=[
		  "id"=>"$id",
		  "title"=>"$title",
		  "singer"=>"$singer",
		  "picture"=>"$piPath",
		  "music"=>"$muPath"
		];
		array_push($arry,$new);
		$result=json_encode($arry,JSON_UNESCAPED_UNICODE);
		file_put_contents("music.txt", "$result");
	    }
	   mysqli_close($con);
?>