<?php
//mysql
$k=file_get_contents("music.txt"); 
var_dump($k);



$con=mysqli_connect("localhost","pengroot","123456","test");

if($con){
	echo "连接成功";
}else{
	echo mysqli_connect_error();
}


$str="UPDATE `people` SET `name`='小张三' WHERE `id`='2'";
mysqli_query($con, $str);



$str="DELETE FROM `people` WHERE `id`='1'";
mysqli_query($con, $str);


$user=[
	[	"name"=>"张三",	"age"=>"19",	"sex"=>"男",	"id"=>"1"],
	[	"name"=>"李四",	"age"=>"20",	"sex"=>"男",	"id"=>"3"],
	[	"name"=>"王五",	"age"=>"21",	"sex"=>"男",	"id"=>"4"],
	[	"name"=>"赵六",	"age"=>"22",	"sex"=>"男",	"id"=>"5"]
];

for($i=0;$i<count($user);$i++){
$str="INSERT INTO `people`(`id`, `name`, `age`, `alive`) VALUES ('".$user[$i]["id"]."','".$user[$i]["name"]."','".$user[$i]["age"]."','1')";
mysqli_query($con, $str);
}


$str="SELECT `id`, `name`, `age`, `alive` FROM `people` WHERE `alive`='0'";
$asd=mysqli_query($con, $str);
while($sql=mysqli_fetch_assoc($asd)){
	var_dump($sql);
}
mysqli_free_result($asd);





mysqli_close($con);






?>