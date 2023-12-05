<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="profile.js"></script>
    <link rel="stylesheet" href="All.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <title>Thông tin khách hàng</title>
</head>
<?php
ob_start();
include("ketnoi.php");
require("header.php");
require("dangki.php");
require("dangnhap.php");
if (isset($_GET["MA_KH"])) {

    $MA_KH = $_GET["MA_KH"];

    $sql_edit = "SELECT * FROM khachhang WHERE MA_KH = '$MA_KH' ";

    $result_edit = $conn->query($sql_edit);

    $row_edit = $result_edit->fetch_array();
} else {
    header("Location:webbansach.php");
}
$sql = "SELECT * FROM khachhang WHERE 1=1";
$res = $conn->query($sql);

$error_message = "";
if (isset($_POST["change_comfirm"])) {
    $MA_KH = $_POST["MA_KH"];
    $HO_TEN = $_POST["HO_TEN"];
    $MAT_KHAU = $_POST["MAT_KHAU"];
    $EMAIL = $_POST["EMAIL"];
    $DIA_CHI = $_POST["DIA_CHI"];
    $NGAY_SINH = $_POST["NGAY_SINH"];
    $GIOI_TINH = $_POST["GIOI_TINH"];

    $sql_update = "UPDATE khachhang SET ";
    $sql_update .= "HO_TEN = '$HO_TEN', ";
    $sql_update .= "MAT_KHAU = '$MAT_KHAU', ";
    $sql_update .= "EMAIL = '$EMAIL', ";
    $sql_update .= "DIA_CHI = '$DIA_CHI', ";
    $sql_update .= "NGAY_SINH = '$NGAY_SINH', ";
    $sql_update .= "GIOI_TINH = '$GIOI_TINH', ";
    $sql_update .= "NGAY_CAP_NHAT = NOW() ";
    $sql_update .= "WHERE MA_KH = '$MA_KH'";


    if ($conn->query($sql_update)) {
        header("Location:data-table-user.php");
    } else {
        $error_message = "Lỗi sửa dữ liệu!" . mysqli_errno($conn);
    }
}
?>

<body>

    <form action="" method="post">
        <div class="profile-show">
            <div>
                <div class="profile-content">
                    <h2 class="titleProfile">Thông tin cá nhân</h2>
                    <div class="change nameChange">
                        <label for="">Mã khách hàng</label><input class="inputInFor" readonly type="text" name="MA_KH" id="MA_KH" value="<?php echo $row_edit["MA_KH"]; ?>">
                    </div>
                    <div class="change nameChange">
                        <label for="">Họ và Tên</label><input class="inputInFor" type="text" name="HO_TEN" id="HO_TEN" value="<?php echo $row_edit["HO_TEN"]; ?>">
                    </div>
                    <div class="change passwordChange">
                        <label for="">Mật khẩu</label><input type="password" class="inputInFor" name="MAT_KHAU" id="MAT_KHAU" value="<?php echo $row_edit["MAT_KHAU"] ?>" required>
                    </div>
                    <div class="change phoneChange">
                        <label for="">Số điện thoại</label><input type="text" class="inputInFor" name="DIEN_THOAI" id="DIEN_THOAI" value="<?php echo $row_edit["DIEN_THOAI"] ?>" required>
                    </div>
                    <div class="change emailChange">
                        <label for="">Email</label>
                        <input type="email" class="inputInFor" name="EMAIL" id="EMAIL" value=" <?php echo $row_edit["EMAIL"] ?>" required>
                    </div>
                    <div class="change borndateChange">
                        <label for="">Ngày Sinh</label><input type="date" class="inputInFor " name="NGAY_SINH" id="NGAY_SINH" value="<?php echo $row_edit["NGAY_SINH"] ?>" required>
                    </div>
                    <div class="change genderChange">
                        <label for="">Giới tính</label>

                        <input type="radio" name="GIOI_TINH" value="1" <?php echo ($row_edit["GIOI_TINH"] ?? null) == 1 ? "checked" : ""; ?>>Nam
                        <input type="radio" name="GIOI_TINH" value="0" <?php echo ($row_edit["GIOI_TINH"] ?? null) == 0 ? "checked" : ""; ?>>Nữ
                    </div>

                    <div class="change_btn">
                        <button type="submit" class="change_comfirm_btn" name="change_comfirm" value="Lưu">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
<?php
ob_end_flush();
?>

</html>