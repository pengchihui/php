<?php
echo "文件操作<hr>";
$file="model.txt";
$fh=fopen($file,"r");
//echo fread($fh,filesize($file));

//while(!feof($fh)){//判断是否读到底部
//	echo fgets($fh),"<br>";
//}

//while($str=fgets($fh)){
//	echo $str,"<br>";
//}


	
fclose($fh);	


$arr=file($file);
//var_dump($arr);	
for($i=0;$i<count($arr);$i++){
	echo $arr[$i],"<br>";
}


$fh=fopen($file,"w");
var_dump(fwrite($fh,"666666"));
fclose($fh);

file_put_contents("model.txt", "hhahahah");	



$bool=copy("http://www.baidu.com","ces/test.txt");
var_dump($bool);

var_dump(rename("./ces/test.txt","./ces/baidu.html"));



if(file_exists("ces/01.php")){
	var_dump(unlink("ces/01.php"));
}
if(is_file("test/123")){
	
}





$dir=opendir("ces");
while($str=readdir($dir)){
	echo $str,"<br>";
}
closedir($dir);



$arr=scandir("./wamplangues");
for($i=2;$i<count($arr);$i++){
	echo $arr[$i],"<br>";
}

var_dump(mkdir("test"));
var_dump(rmdir("test"));

//如何删除整个文件目录？



function removedir($val){
	$arr=scandir($val);
	for($i=2;$i<count($arr);$i++){
		if(is_file($val."/".$arr[$i])){
			unlink($val."/".$arr[$i]);//unlink("asd/01.php")
		}else{
			removedir($val."/".$arr[$i]);
		}
	}
	rmdir($val);
}
removedir("qwe");

?>