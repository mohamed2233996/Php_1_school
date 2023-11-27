<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=Kaushan+Script&family=Marhey:wght@300;400;500;600;700&family=Open+Sans:ital,wght@0,300;0,400;0,700;0,800;1,400;1,600;1,700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;700&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Young+Serif&display=swap" rel="stylesheet">
    <title>بيانات الطلاب</title>
</head>

<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'students';
    // Create connection
    $conn = mysqli_connect($host, $user, $pass, $db_name);
    $res = mysqli_query($conn, "SELECT * FROM student");

    //variable
    $id = "";
    $name = "";
    $address = "";

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    $sqls ='';
    if (isset($_POST['add'])) {
        $sqls= "INSERT INTO `student` (`ID`, `Name`, `Address`) VALUES ('$id', '$name','$address')";
        mysqli_query($conn, $sqls);
        echo "<script>alert('تم إضافة البيانات');window.location.href='Home
        .php';</script>";
        header("location:Home.php");
    };
    if (isset($_POST['del'])) {
        $sqls = "DELETE FROM `student` WHERE ID=$id";
        mysqli_query($conn, $sqls);
        echo "<script>alert('تم حذف البيانات');window.location.href='Home.php
        ';</script>";
        header("location:Home.php");
    };
    ?>

    <div class="container-fluid" id="mother">
        <form class="row" method="POST" action="">
            <aside class="col-md-5 d-flex flex-column flex-nowrap align-items-center">
                <div class="logo">
                    <img src="./img/logo.png" alt="لوجو الموقع">
                </div>
                <h2 class="mainh2">لوحة التحكم</h2>
                <p class="mainp">ادخل بياناتك للدخول</p>
                <div class="inputs d-flex flex-column flex-nowrap align-items-center">
                    <input type="number" placeholder="رقم الطالب" name="id" id="id" />
                    <input type="text" placeholder="اسم الطالب" name="name" id="name" />
                    <input type="text" placeholder="عنوان الطالب" name="address" id="address" />
                    <div class="btns">
                        <button name="add" class="add btn btn-primary">اضافه الطالب</button>
                        <button name="del" class="del btn btn-danger">حذف الطالب</button>
                    </div>
                </div>
            </aside>
            <main class="col-md-7">
                <table class="table">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>".$row['ID']."</td>";
                        echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['Address']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>

</html>