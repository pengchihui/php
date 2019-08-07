<?php

//$arr=["name"=>"张三","age"=>18];	
//$str=json_encode($arr,JSON_UNESCAPED_UNICODE);	
//@print($arr);

//$arr=$GLOBALS;
//var_dump($arr);
	
//$arr=$_POST;
//var_dump($arr);	
//$str=json_encode($arr,JSON_UNESCAPED_UNICODE);
//print($str);
//file_put_contents("user.txt",$str);


//$arr=$_FILES;
//var_dump($arr);
//
//$url="file/".time().$_FILES["pic"]["name"];
//echo $url;
//$url=iconv('utf-8','gb2312',$url);
//echo $url;
//$bool=move_uploaded_file($_FILES["pic"]["tmp_name"],$url);
//var_dump($bool);



//echo md5("123456");
//echo "<br>";
//echo md5("123456");
//echo "<br>";
//echo uniqid("123.jpg");


//header('Location: ajax.html');

$arr=$_POST;
$str=json_encode($arr,JSON_UNESCAPED_UNICODE);
print($str);


?>
