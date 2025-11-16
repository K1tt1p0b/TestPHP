<?php require ("helpers/db.php"); ?>
<?php 
function createColor($connection) {

                $code = mysqli_real_escape_string($connection, $_POST["code"]);
                $title = mysqli_real_escape_string($connection, $_POST["title"]);
                $sql = "INSERT INTO color (title, code) VALUES ('$title', '$code')";
                return mysqli_query($connection, $sql);
                   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require ("html-components/head.php"); ?>
    <title>เพิ่มสี | Colorfull 09AF</title>
</head>

<body>
    <?php require ("html-components/header.php"); ?>

    <section class="section">

        <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <?php
                $result = createColor($connection);
            ?>
            <?php if($result): ?>
                <h3>เพิ่มสีเรียบร้อยแล้ว</h3>
                <p>
                    <a href="./index.php">หน้าหลัก</a>
                </p>
            <?php else: ?>
                <h3>เกิดข้อผิดพลาดในการเพิ่มสี</h3>
                <p>
                    <a href="./new_color.php">ลองอีกครั้ง</a>
                </p>
            <?php endif; ?>
        <?php else: ?>
        <form method="POST">
            <p>
                <label>โค้ดสี </label>
                <input type="color" name="code">
            </p>
            <p>
                <label>ชื่อสี </label>
                <input type="text" name="title">
            </p>
            <p>
                <button type="submit">บันทึกสี</button>
            </p>
        </form>
        <?php endif; ?>
        </div>

    </section>
    
</body>
</html>

<?php mysqli_close($connection); ?>



