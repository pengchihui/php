<?php
    /*测试*/
	/*数据库展示*/
	$con=mysqli_connect("localhost","sfydb_6313663","Kaiweili.9","sfydb_6313663");
	//出错了
	//	if($con){
	//	    $GLOBALS['error_message']='连接成功';
	//		return;
	//	}else{
	//		$GLOBALS['error_message']=mysqli_connect_error();
	//		return;
	$sql="SELECT `id`, `titile`, `singer`, `picture`, `music` FROM `1` WHERE 1";
	$my=mysqli_query($con, $sql);
	/*把数据库查询的结果转成php结构*/
	/*文本文件展示*/
//	function testShow(){
//		/*json数组对象*/
//		$mi=json_decode(file_get_contents("music.txt"),true);
//		for($i=0;$i<count($mi);$i++){
//			var_dump($mi[$i]["title"]);
//		}
//      /*对象类型*/
//		$mi=json_decode(file_get_contents("music.txt"));
//		for($i=0;$i<count($mi);$i++){
//			var_dump($mi[$i]->music);
//	    }
//	}
	   
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style>
			.table tr th,
			.table tr td {
				vertical-align: middle;
			}
			img{
				width: 30px;
				height: 20px;
			}
			th {
				font-size: 16px;
			}
			button{
				margin-right: 10px;
			}
		</style>

		<body>
			<div class="container my-5">
				<h1>音乐列表</h1>
				<br />
				<?php if(isset($error_message)): ?>
		            <p><?php echo $error_message; ?></p>
	     		<?php endif ?>
				<br />
				<a href="add.php" class="btn btn-info">添加</a>
				<br /><br />
				<table class="table table-striped table-bordered table-hover">
					<thead class="thead-dark text-center">
						<tr>
							<th>标题</th>
							<th>歌手</th>
							<th>海报</th>
							<th>音乐</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php while($result=mysqli_fetch_assoc($my)){ ?>
						<tr>
							<th><?php echo $result["titile"]?></th>
							<th><?php echo $result["singer"]?></th>
							<th><img src="<?php echo $result["picture"]?>" alt="" /></th>
							<th>
								<audio src="<?php echo $result["music"]?>" controls></audio>
							</th>
							<th>
								<a href="delete.php?id=<?php echo $result["id"]?>"><button class="btn btn-success" >删除</button></a>
								<a href="update.php?id=<?php echo $result["id"]?>"><button  class="btn btn-warning" >修改</button></a>
							</th>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</body>
</html>
<?php 
     /*释放查询占用的内存*/
     mysqli_free_result($my);
	 /*关闭数据库*/
     mysqli_close($con);
?>