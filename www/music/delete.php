<?php
//      $GLOBALS['id']=$_GET['id'];
		/*删除原有的文件*/
//		function remodir($val){
//			    $bb=mysqli_connect("localhost", "pengroot","123456","test");
//			    $sq="SELECT `id`, `titile`, `singer`, `picture`, `music` FROM `singer` WHERE id='".$id."'";
//				$myy=mysqli_query($bb, $sq);
//			    $GLOBALS['result']=mysqli_fetch_assoc($myy);
//			    $scan=@scandir($val);
//				for($i=2;$i<count($scan);$i++){
//					var_dump($result['picture']);
//		            var_dump($result['music']);
//						if(@is_file($val."/".$scan[$i])){
//							$path="./".$val."/".$scan[$i];
//							 var_dump($path);
//							 if($path==@$result['picture']){
//							 	var_dump("图片路劲相同");
//								unlink($path);
//								return;
//					          }else	if($path==@$result['music']){
//					          	var_dump("音频路劲相同");
//								unlink($path);
//								return;
//					          }else{
//					          	return;
//					          }
//						}else{
//						     remodir($val."/".$val[$i]);
//						}
//				}
//		    } 
//	  remodir("uploads");
//	  mysqli_free_result($myy);
   
  
   $id=$_GET['id'];
    /*文件删除*/
	$con=mysqli_connect("localhost", "pengroot","123456","test");
	$sq="SELECT `picture`, `music` FROM `singer` WHERE id='".$id."'";
	$aaa=mysqli_query($con, $sq);
	$bbb=mysqli_fetch_assoc($aaa);
	unlink($bbb["picture"]);
	unlink($bbb["music"]);
	mysqli_free_result($aaa);
   
   //*数据库删除*/
   $str="DELETE FROM `singer` WHERE id='".$id."'";
   $GLOBALS['error_message']=mysqli_connect_error();
   if($l=@mysqli_query($con,$str)){
   	    //*重定向*/
	    header('location: http://localhost/music/shows.php');
	    return;
   }else{
   	  $GLOBALS['error_message'] = "删除失败";
		 return;
   }
   mysqli_close($con);
   /*文本文档删除*/
   function delete(){
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
   }
  
?>