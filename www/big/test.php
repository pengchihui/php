<?php ?>  
     <tbody>
		<?php foreach($lines as $value){if(!$value) continue;$cols=explode('|',$value); ?>
		<tr>
			<?php foreach($cols as $ge){ ?>
		         <td><?php echo($ge);?></td>
		    <?php } ?> 
	    </tr>
	   <?php } ?> 
	</tbody>

<?php
    /*数据库根据id查询*/
    if($_SERVER['REQUEST_METHOD']==='GET'){
    	$con=mysqli_connect("localhost","pengroot","123456","test");
		$sql="SELECT `id`, `titile`, `singer`, `picture`, `music` FROM `singer` WHERE id='".$_GET['id']."'";
		$my=mysqli_query($con, $sql);
        if($GLOBALS['result']=mysqli_fetch_assoc($my)){
		   return ;
        }
	   mysqli_free_result($my);  var_dump($result);
	   /*关闭数据库*/
       mysqli_close($con);
	   var_dump($result);
    }
?>