<?php
// include ("../../../inc/mysqli_db_donation.php");
include("../../inc/mysqli_db_donation.php");

$sql = "SELECT * FROM food";
$result = mysqli_query($kty_donate, $sql);
$resultCheck = mysqli_num_rows($result);

// if ($resultCheck > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row['id'] . " " . $row['name'] . " " . $row['price'] ."<br>";
//     }
// }

$title = "";
//include ("../menu/menu_head.php");
?>

<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <title>CV Printable A4</title>
</head>
<html>

<head>
    <title>Curriculum Vitae</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Margus Lillemagi - Curriculum Vitae" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

    <style>
        table.dataTable th.dt-type-numeric,
        table.dataTable th.dt-type-date,
        table.dataTable td.dt-type-numeric,
        table.dataTable td.dt-type-date {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="justify-center items-center">
        <div class="mt-5 mb-3 flex justify-center items-center">
            <p class="inline-block space-y-2 border-b border-blue-500 text-xl font-bold">รายการเลือกให้โรงเรียน</p>
        </div>
        <div class="row flex justify-center items-center mb-3">
            <div class="form-group row col-md-10" style="justify-content: center;">
                <div class="form-group col-md-4">
                    <label>รหัสโรงเรียน</label>
                    <input type="text" class="form-control" id="search_text">
                </div>
                <div class="form-group col-md-2">
                    <label></label>
                    <button id="btnSerarch" type="button" class="btn btn-warning btn-md form-control form-border title-search" onclick="search_text();">ค้นหา</button>
                    <!-- <button id="btnSerarch" type="button" class="btn btn-warning btn-md form-control form-border title-search">ค้นหา</button> -->
                </div>
            </div>
        </div>
        <div class="row" style="padding: 30px; margin-top:30px;">
            <table id="search_data" class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อ</th>
                        <th>ราคา</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="result">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo  "<tr>
                                <td> $row[id] </td>
                                <td> $row[name] </td>
                                <td> $row[price] </td>
                                <td>
                                    <a class='btn btn-primary' href='edit.php?id=$row[id]'>PDF</a>
                                </td>
                            </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <!-- <div id="show_data">
        </div> -->
    </div>
</body>
<html>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="../../js_donate/function_pdf.js"></script>
<script>
    const mytableDatatable = $('#search_data').DataTable({
        'searching': false,
        "processing": true,
        "order": [
            [0, "asc"]
        ],
    });
    $('#btnSerarch').click(function() {
        mytableDatatable.draw();
    });
</script>