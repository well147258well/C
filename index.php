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
</form>

<?php
function getTinyUrl($url) 
{ 
	return file_get_contents("http://tinyurl.com/api-create.php?url=".$url); 
}

if(isset($_POST["name"])){
	$name=$_POST["name"];
	$url=$_POST["url"];
	$number=0;
date_default_timezone_set('Asia/Taipei');
$datetime = date ("Y- m - d / H : i : s"); 
//新增資料
$Link=mysqli_connect("localhost","root","well987654well","well");
$add="INSERT INTO uploadurl(name,address,shortadd,time,num) VALUES('$name','$url','$shortadd','$datetime','$num')";
mysqli_query($Link,$add);
//讀取資料
$read="SELECT * FROM uploadurl";
$readresult=mysqli_query($Link,$read);
	echo "<table border='1'>";
	echo "<tr><td>原始網址</td><td>短網址</td><td>點擊率</td><td>上傳時間</td>";
while($result=mysqli_fetch_array($readresult)){
	echo "<tr>";
	echo "<td><a href=".$result[1]."></td>";
	echo "<td><a href=".$result[2]."></td>";
	echo "<td>".$result[4]."</td><td>".$result[3]."</td>";
	echo "</tr>";
}
	echo "</table>";
}


?>

</body>
</html>