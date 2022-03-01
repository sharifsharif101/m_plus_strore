<?php 

include ("../partials/connect.php");

// ../ 
// الفكرة من النقطتين ديل انو يبحث عن الفلودر المطلوب مش في نفس المكان لا يبحث عنها في الرووت فلودر

$email=$_POST['email'];
$msg=$_POST['msg'];

// الان سوف نقوم بإرسال الداتا القادمة من الدتابيز بعد ان خزناهم في المتغيرات الفوق ديل  سوف نقوم بإرسالهم الى الداتا بيز

$sql = "INSERT INTO contact (email,msg) VALUES ('$email','$msg')";
$connect->query($sql);

// $connect 
// المتغير دا جاي من الانكلود دي 
// include ("partials/connect.php");

?>