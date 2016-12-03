<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!--File Normalize ==> Nice Reset -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!--Flie My Style -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" /><!-- Google Web Font-->

    </head>
    <body>
    <form class="myForm" action="index.php" method="post">
       اسم المشترك : <input type="text" name="name_shared"   >
       عنوان الدورة :<input type="text" name="title_course"  >
       اسم المدرب :  <input type="text" name="name_training" >
      حالة اليوم (مساءا\ظهرا ..) <input type="text" name="status_day"  >
      اليوم  :    <input type="text" name="day">
      التاريخ:  <input type="text" name="history" >
      عدد الساعات : <input type="text" name="number_hours">
     ضمن فعاليات : <input type="text" name="activety">
      الفئة : <input type="text" name="members">

       <input type="submit" name="name" value="  موافق   ">
    </form>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
</body>
</html>
