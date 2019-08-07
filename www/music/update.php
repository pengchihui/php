
<?php 
	    @$con=mysqli_connect("localhost","pengroot","123456","test");
	  	@$sql="SELECT `id`, `titile`, `singer`, `picture`, `music` FROM `singer` WHERE id='".$_GET['id']."'";
		  @$my=mysqli_query($con, $sql);
		  @$GLOBALS['result']=mysqli_fetch_assoc($my);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style>
			th {
	         font-size: 16px;
         }
        </style>
		<body>
			<div class="container my-5">
				<h1>音乐列表</h1>
				<p><?php echo isset($error_message)? $error_message:""; ?></p>
				<form action="update.php?id=<?php echo $result['id'];?>" method="post" enctype="multipart/form-data">
					<input type="text" name="id" id="" value="<?php echo isset($result['id']) ? $result['id']:''; ?>" style="display: none;"/>
					<br/><br/> 标题:
					<input type="text" name="title" id="" value="<?php echo isset($result['titile'])? $result['titile']:''; ?>" />
					<br/><br/> 歌手:
					<input type="text" name="singer" id=""  value="<?php echo isset($result['singer']) ? $result['singer']:''; ?>" />
					<br/><br/> 海报:
					<input type="file" name="picture" id="" value="<?php echo isset($result['picture']) ? $result['picture']:''; ?>" />
					<br/><br/> 歌曲:
					<input type="file" name="music" id="" value="<?php echo isset($result['music']) ? $result['music']:''; ?>" />
					<br/><br/>
					<input type="submit" value="修改保存"  id="" />
				</form>
			</div>
		</body>
</html>

<?php 
      if($_SERVER['REQUEST_METHOD']==="POST"){
      @$picture=$_FILES['picture'];
			@$music=$_FILES['music'];
		  @$id=$_POST['id'];
		  @$titile=$_POST['title'];
			@$singer=$_POST['singer'];
			@var_dump(isset($result['picture'])?$result['picture']:"");
			@var_dump(isset($result['music'])?$result['music']:"");
			/*文件上传*/
	   if($picture['error']==4){
   		     @$piPath=$result['picture']?$result['picture']:"";
   	  }else{
   	  		 @$piPath='./uploads/'.time().$picture['name'];
           @move_uploaded_file($picture['tmp_name'],$piPath);
   	  }
	  
	    if($music['error']==4){
   		      @$muPath=$result['music']?$result['music']:"";
   	  }else{
   	  			@$muPath='./uploads/'.time().$music['name'];
            @move_uploaded_file($music['tmp_name'],$muPath);
   	  }
			header("location: http://localhost/music/updatephp.php?id=".$id."&titile=".$titile."&singer=".$singer."&piPath=".$piPath."&muPath=".$muPath);
		  exit;
		  
      } 
      /*关闭查询*/
		  @mysqli_free_result($sql);
		  @mysqli_close($con);
?> 