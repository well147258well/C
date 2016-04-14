<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
請輸入名稱:<input type="text" name="name"><br>
請輸入網址:<input type="text" name="url"><br>
<input type="submit">
<input type="reset">
短網址
<a href="<?php echo $url;?>"><input type="text" name="textfield" id="textfield" value="<?php echo $shortadd;?>"/> </a>
</form>

<?php
function getTinyUrl($url) 
{ 
	return file_get_contents("http://tinyurl.com/api-create.php?url=".$url); 
}

if(isset($_POST["name"])){
	$name=$_POST["name"];
	$url=$_POST["url"];
	$shortadd=getTinyUrl($url);
	$number=0;
date_default_timezone_set('Asia/Taipei');
$datetime = date ("Y- m - d / H : i : s"); 
//新增資料
$Link=mysqli_connect("localhost","root","well987654well","well");
$add="INSERT INTO uploadurl(name,address,shortadd,time,num) VALUES('$name','$url','$shortadd','$datetime','$num')";
mysqli_query($Link,$add);
}


?>

</body>
</html>