<?php
   $id=$_GET['id'];
    /*文件删除*/
	$con=mysqli_connect("localhost","sfydb_6313663","Kaiweili.9","sfydb_6313663");
	$sq="SELECT `picture`, `music` FROM `1` WHERE id='".$id."'";
	$aaa=mysqli_query($con, $sq);
	$bbb=mysqli_fetch_assoc($aaa);
	unlink($bbb["picture"]);
	unlink($bbb["music"]);
	mysqli_free_result($aaa);
   
   //*数据库删除*/
   $str="DELETE FROM `1` WHERE id='".$id."'";
   $GLOBALS['error_message']=mysqli_connect_error();
   if($l=@mysqli_query($con,$str)){
   	    //*重定向*/
	    header('location: shows.php');
	    return;
   }else{
   	  $GLOBALS['error_message'] = "删除失败";
		 return;
   }
   mysqli_close($con);
   /*文本文档删除*/
   // function delete(){
//	   $lo=json_decode(file_get_contents("music.txt"),true);
//	   for($i=0;$i<count($lo);$i++){
//	        if(trim($lo[$i]['id'])==trim("6487")){
//	         array_splice($lo, $i,1);	
//	        }else{
//	        	echo "删除失败";
//	        }
//	   }
//	   $str=json_encode($lo,JSON_UNESCAPED_UNICODE);
//	   file_put_contents("music.txt", $str);
   // }
  
?>