<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý khoản thu sinh viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/button.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>Public/CSS/styleDT.css">
    <style>
        .btn_cn {
            display: flex;
            margin: 0;
        }
    </style>
</head>

<body>
    <form method="post" action="<?php echo BASE_URL; ?>DSKhoanthu/timkiem"></form>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Khoản thu sinh viên</h1>

            <div class="input-group">
                <form action="<?php echo BASE_URL; ?>DSKhoanthusv/Timkiem" method="post">
                    <input type="search" placeholder="Mã sinh viên" name="txtTKMaSV" value="<?php if (isset($data['ma_sinh_vien'])) echo $data['ma_sinh_vien']; ?>">
               
            </div>
            <div class="input-group">
                <form action="<?php echo BASE_URL; ?>DSKhoanthusv/Timkiem" method="post">
                    <input type="search" placeholder="Tên khoản thu" name="txtTKTenKhoanThu" value="<?php if (isset($data['ten_khoan_thu'])) echo $data['ten_khoan_thu']; ?>">
               
            </div>
                    <label for="txtTKTrangThai">Trạng thái thanh toán:</label>
            <select name="txtTKTrangThai" id="txtTKTrangthai">
            <option value="" <?= isset($data['trang_thai_thanh_toan']) && $data['trang_thai_thanh_toan'] === '' ? 'selected' : '' ?>>Tất cả</option>
            <option value="Đã thanh toán" <?= isset($data['trang_thai_thanh_toan']) && $data['trang_thai_thanh_toan'] === 'Đã thanh toán' ? 'selected' : '' ?>>Đã thanh toán</option>
            <option value="Chưa thanh toán" <?= isset($data['trang_thai_thanh_toan']) && $data['trang_thai_thanh_toan'] === 'Chưa thanh toán' ? 'selected' : '' ?>>Chưa thanh toán</option>
            </select>

            <button style="border: none; background: transparent;" type="submit" name="btnTimkiem"><i class="fa fa-search"></i></button>
            </form>          

            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"><img src="./Public/Picture/export.png" alt="" width="20"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <form action="<?php echo BASE_URL; ?>DSKhoanthusv/exportExcel" method="post">
                           <!-- Truyền dữ liệu tìm kiếm hiện tại vào form xuất Excel -->
                    <input type="hidden" name="txtTKMaSV" value="<?= isset($data['ma_sinh_vien']) ? $data['ma_sinh_vien'] : '' ?>">
                    <input type="hidden" name="txtTKTenKhoanThu" value="<?= isset($data['ten_khoan_thu']) ? $data['ten_khoan_thu'] : '' ?>">
                    <input type="hidden" name="txtTKTrangThai" value="<?= isset($data['trang_thai_thanh_toan']) ? $data['trang_thai_thanh_toan'] : '' ?>">

                        <button style="width: 176px;" name="btnXuatExcel"><label for="export-file" id="toEXCEL">EXCEL</label></button>
                    </form>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Tên khoản thu<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Mã sinh viên <span class="icon-arrow">&uparrow;</span></th>
                        <th> Số tiền ban đầu <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Số tiền miễn giảm <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Số tiền phải nộp <span class="icon-arrow">&UpArrow;</span></th>
                        
                        <th> Trạng thái  <span class="icon-arrow">&UpArrow;</span></th>
                        <th style="padding-left:50px"> Chức năng <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($data['dulieu'])) {

                            ?>
                            <tr>
                                <td><?php echo $row['ten_khoan_thu'] ?></td>
                                <td><?php echo $row['ma_sinh_vien'] ?></td>
                                <td> <?php echo $row['so_tien_ban_dau'] ?> </td>
                                <td> <?php echo $row['so_tien_mien_giam'] ?> </td>
                                <td> <?php echo $row['so_tien_phai_nop'] ?> </td>
                               
                                <td> <?php echo $row['trang_thai_thanh_toan'] ?> </td>
                                <?php

                                // Hiển thị nút Sửa
                                echo '<td class="btn_cn">';
                                echo '<form action="' . BASE_URL . 'DSKhoanthusv/sua" method="post">';
                                echo '<input type="hidden" name="ma_khoan_thu" value="' . $row['ma_khoan_thu'] . '">';
                                echo '<input type="hidden" name="ma_sinh_vien" value="' . $row['ma_sinh_vien'] . '">';
                                echo '<button class="button-85" role="button">Sửa</button>  ';
                                echo '</form>';

                                // Hiển thị nút Xóa
                                echo '<form action="' . BASE_URL . 'DSKhoanthusv/xoa" method="post">';
                                echo '<input type="hidden" name="ma_khoan_thu" value="' . $row['ma_khoan_thu'] . '">';
                                echo '<input type="hidden" name="ma_sinh_vien" value="' . $row['ma_sinh_vien'] . '">';
                                echo '<button class="button-85" onclick="return confirm(\'Bạn có chắc muốn xóa\')" role="button">Xóa</button>';
                                echo '</form>';
                                echo '</td>';

                                ?>


                            </tr>
                    <?php

                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>


</body>

</html>
