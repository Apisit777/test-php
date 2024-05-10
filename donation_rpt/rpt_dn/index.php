<?php
include ("../../../inc/mysqli_db_donation.php");
//  include("../../../inc/connect.php");

$sql = "SELECT * FROM food";
$result = mysqli_query($kty_donate, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['name'] . "<br>";
    }
}
$title = "รายการรออนุมัติ";
//include ("../menu/menu_head.php");
?>

<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <title>CV Printable A4</title>
</head>

<body>
<!-- partial:index.partial.html -->
<html lang="et">

<head>
    <title>Curriculum Vitae</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Margus Lillemagi - Curriculum Vitae" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700|Lato:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
    </style>
</head>
<body id="top">
    <!--Page 1-->
    <!-- <page size="A4">
        <div id="button" class="no-print">
            <button type="button" onclick="myFunction()"><span class="button-txt"><i class="fa fa-print"
                        aria-hidden="true"></i>
                    &nbsp;Print</span></button>
            <script>
                function myFunction() {
                    window.print();
                }
            </script>
        </div>
        <div class="pdf-page size-a4">
            <div class="pdf-header-center">
                Center
            </div>
            <div class="test-pdf">
                <span>11111</span>
                <span>22222</span>
                <span>33333</span>
            </div>
            <div class="pdf-header">
                <span class="company-logo">
                    Blauer See Delikatessen
                </span>
                <span class="invoice-number">
                    Invoice #23543
                </span>
            </div>

            <table class="table table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        ลำดับ
                    </th>
                    <th class="text-center" style="font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        รายละเอียด
                    </th>
                    <th class="text-center" style="width: 100px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        จำนวนที่ซื้อ
                    </th>
                    <th class="text-center" style="width: 120px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        ราคา / หน่วย(บาท)
                    </th>
                    <th class="text-center" style="width: 100px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        จำนวนเงิน(บาท)
                    </th>
                </tr>
            </thead>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table class="table table-bordered border-primary">
                <thead>
                   <th>#</th>
                   <th>First</th>
                   <th>First</th>
                   <th>First</th>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        ...
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2" class="table-active">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 3px;">( Apisit Ngaosri )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: -20px;">
                        ผู้จัดทำ
                    </span>
                </div>
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">( .................................................... )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: -20px;">
                        ผู้รับมอบอำนาจ
                    </span>
                </div>
            </div>
        </div>
    </page> -->

    <div class="row" style="padding: 15px;">
        <div class="col-sm-6 col-md-3">
        </div>
        <div class="col-sm-6 col-md-2">
            <input type="text" class="form-control" id="search_text">
        </div>
        <div class="col-sm-6 col-md-2">
            <button type="button" class="btn btn-info" onclick="search_text();">ค้นหา</button>
        </div>
        <div class="col-sm-6 col-md-3">
        </div>
    </div>
    <div id="show_data">
        <!-- Test -->
    </div>
</div>
</body>
<html>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="../../js_donate/function_pdf.js"></script>
<script>

</script>

