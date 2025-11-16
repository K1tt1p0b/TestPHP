<?php require ("helpers/db.php"); ?>
<?php 

function getColor($connection){

    $sql = "SELECT * FROM color"; // ตัวอย่างคำสั่ง SQL
            if (isset($_GET["search"])) { // ตรวจสอบว่ามีการส่งค่าค้นหามาหรือไม่
                $search = mysqli_real_escape_string($connection, $_GET["search"]); // ป้องกัน SQL Injection
                $sql .= " WHERE title LIKE '%$search%' "; // เพิ่มเงื่อนไขการค้นหา
            }
            $sql .= " ORDER BY id DESC"; // เรียงลำดับข้อมูลจาก id มากไปน้อย
            $result = mysqli_query($connection, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC); // ดึงข้อมูลทั้งหมดจากผลลัพธ์
            
}
    $searchTitle = "";
    $searchValue = "";
    if (isset($_GET["search"])) {
        $searchTitle = "ค้นหา \"$_GET[search]\" | ";
        $searchValue = $_GET["search"];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require ("html-components/head.php"); ?>
    <title><?php echo $searchTitle; ?>Colorfull 09AF</title>
</head>
<body>

    <?php require ("html-components/header.php"); ?>

    <section class="section">
        <div class="container">

        <?php $rows = getColor($connection); ?>

        <form>
            <p>
                <input type="search" name="search" placeholder="ค้นหาสี..." value="<?php echo ($searchValue); ?>">
                <button type="submit">ค้นหา</button>
            </p>
        </form>

        <h3>พบสี <?php echo count($rows); ?> รายการ</h3>

        <?php foreach ($rows as $row): ?>
            <div class="color-item" style="border-color: <?php echo $row["code"]; ?>;">
                <h4><?php echo $row['title']?></h4>
                <h4><?php echo $row['code']?></h4>
            </div>
        <?php endforeach; ?>

    </div>
    </section>
    
</body>
</html>

<?php mysqli_close($connection); ?>