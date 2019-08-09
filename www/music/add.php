<?php
 /*处理步骤    验证   持久化  响应*/
 /*请求方式*/

	if($_SERVER['REQUEST_METHOD']==='POST'){
		add_music();
	}
 
 function add_music(){
 	 /*字段不为空*/
 	 if(empty($_POST['title'])){
 	 	 $GLOBALS['error_message'] = "请输入标题";
		 return;
 	 }
	 if(empty($_POST['singer'])){
 	 	 $GLOBALS['error_message'] = "请输入歌手名字";
		 return;
 	 }
 	 if(empty($_FILES['picture'])){
 	 	 $GLOBALS['error_message'] = "请选择图片";
		 return;
 	 }
	 if(empty($_FILES['music'])){
 	 	 $GLOBALS['error_message'] = "请选择音乐";
		 return;
 	 }
     /*文件状态*/
	$picture=$_FILES['picture'];
	$music=$_FILES['music'];
	
	if(!$picture['error']==0){
		 $GLOBALS['error_message'] = "请上传正确的图片";
		 return;
	}
	if(!$music['error']==0){
		 $GLOBALS['error_message'] = "请上传正确的音乐文件";
		 return;
	}
	
	/*文件大小*/
     if($picture['size']> 1*1024*1024){
     	 $GLOBALS['error_message'] = "图片过大";
		 return;
     }
     if($music['size'] > 8*1024*1024){
     	 $GLOBALS['error_message'] = "音乐文件太大";
		 return;
     }
	/*文件格式*/
	$picu=array('image/jpg','image/png','image/gif','image/jpeg');
	$musi=array('audio/mp3','audio/wma','audio/midi');
	var_dump($music['type']);
	var_dump(in_array($picture['type'], $picu));
	// $picu=["image/jpg","image/png","image/jpeg","image/exr","image/tif"];
	// $musi=["audio/mp3","audio/midi","audio/wma","audio/vqf","audio/amr"];
	if(!in_array($picture['type'],$picu)){
		$GLOBALS['error_message']="图片格式不对";
		return;
	}
	if(!in_array($music['type'],$musi)){
		$GLOBALS['error_message']="音乐格式不对";
		return;
	}
    $id=uniqid("123");
   	$title=$_POST['title'];
	$singer=$_POST['singer'];
	@$piPath='./uploads/'.time().Math.rand(1, 10).$picture['name'];
	@$muPath='./uploads/'.time().Math.rand(10, 20).$music['name'];
    @$piPath=iconv('utf-8','gb2312',$piPath); 
    @$muPath=iconv('utf-8','gb2312',$muPath);
    /*文件上传*/   
	if(!move_uploaded_file($picture['tmp_name'],$piPath)){
		 $GLOBALS['error_message'] = "图片上传失败";
		 return;
    }
	if(!move_uploaded_file($music['tmp_name'],$muPath)){
		 $GLOBALS['error_message'] = "音乐上传失败";
		 return;
	}
	
	if(trim($error_message)==""||trim($error_message)==null){
		 header("location: addphp.php?id=".$id."&title=".$title."&singer=".$singer."&piPath=".$piPath."&muPath=".$muPath);
	    return;
	}else{
		 $GLOBALS['error_message'] = "音乐上传失败";
		 return;
	}
	
 }

 
?>
<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style>th {
	font-size: 16px;
}</style>

		<body>
			<div class="container my-5">
				<h1>音乐列表</h1>
				<p><?php echo isset($error_message)?$error_message:""; ?></p>
				<form action="add.php" method="post" enctype="multipart/form-data">
					<br/><br/> 标题:
					<input type="text" name="title" id=""  autocomplete="off"/>
					<br/><br/> 歌手:
					<input type="text" name="singer" id=""  autocomplete="off"/>
					<br/><br/> 海报:
					<input type="file" name="picture" id="" autocomplete="on" />
					<br/><br/> 歌曲:
					<input type="file" name="music" id=""  autocomplete="on"/>
					<br/><br/>
					<input type="submit" value="保存" />
				</form>
			</div>
		</body>
</html>