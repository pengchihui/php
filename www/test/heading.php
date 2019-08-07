<?php
/*测试*/

$fi=file("json.txt");
$str=null;
for($i=0;$i<count($fi);$i++){
	echo $fi[$i];
//	echo count($fi);
//	$str=$str.$fi[$i];
//	if($i==4){
//		$str=$str."{'name':'走着','age':998},\n";
//	}else{
//		$str=$str.$fi[$i];
//	}
}
file_put_contents("json.txt",$str);

/*修改数据并保存*/
//$wr=fopen("json.txt","w");

?>