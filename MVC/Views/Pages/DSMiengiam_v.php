<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý miễn giảm sinh viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/button.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/styleDT.css">
    <style>
        .btn_cn {
            display: flex;
            margin: 0;
        }
    </style>
</head>

<body>
    <form method="post" action="<?php echo BASE_URL; ?>DSMiengiam/timkiem"></form>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Quản lý miễn giảm </h1>
           
            <div class="input-group">
                <form action="<?php echo BASE_URL; ?>DSMiengiam/timkiem" method="post">
                    <input type="search" placeholder="Mã sinh viên" name="txtTKMasinhvien" value="<?php if (isset($data['ma_sinh_vien'])) echo $data['ma_sinh_vien']?>">
                
            </div>
            <div class="input-group">
                <form action="<?php echo BASE_URL; ?>DSMiengiam/timkiem" method="post">
                    <input type="search" placeholder="Loại miễn giảm" name="txtTKLoaimiengiam" value="<?php if (isset($data['loai_mien_giam'])) echo $data['loai_mien_giam']?>">
                
            </div>
            <button style="border: none; background: transparent;" type="submit" name="btnTimkiem"><i class="fa fa-search" ></i></button>
            </form>
            <div class="Insert">
                <form action="<?php echo BASE_URL; ?>DSMiengiam/themmoi" method="post">
                    <button class="button-85" role="button">Thêm miễn giảm</button>
                </form>
            </div>

        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Mã miễn giảm <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Mã sinh viên <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Mức tiền <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Loại miễn giảm <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Ghi chú <span class="icon-arrow">&UpArrow;</span></th>

                        <th style="padding-left:50px"> Chức năng <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                        while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                            ?>
                            <tr>
                                <td><?php echo $row['ma_mien_giam'] ?></td>
                                <td><?php echo $row['ma_sinh_vien'] ?></td>
                                <td><?php echo $row['muc_tien'] ?></td>
                                <td><?php echo $row['loai_mien_giam'] ?></td>
                                <td><?php echo $row['ghi_chu'] ?></td>
                                <td class="btn_cn">
                                    <form action="<?php echo BASE_URL; ?>DSMiengiam/sua/<?php echo $row['ma_mien_giam']; ?>" method="post">
                                        <button class="button-85" role="button">Sửa</button>
                                    </form>
                                    <form action="<?php echo BASE_URL; ?>DSMiengiam/xoa/<?php echo $row['ma_mien_giam']; ?>" method="post">
                                        <button class="button-85" onclick="return confirm('Bạn có chắc muốn xóa?')" role="button">Xóa</button>
                                    </form>
                                </td>
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
