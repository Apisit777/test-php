<?php
// include ("../../../inc/mysqli_db_donation.php");
include("../../inc/mysqli_db_donation.php");

$id = '';
$name = '';
$price = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // if ( !isset($_GET["id"]) ) {
    //     header("location: /donation_rpt/rpt_dn/index.php");
    //     exit;
    // }

    $id = $_GET["id"];

    $sql = "SELECT * FROM food WHERE id = $id";
    $result = mysqli_query($kty_donate, $sql);
    $row = $result->fetch_assoc();

    // if (!$row) {
    //     header("location: /donation_rpt/rpt_dn/index.php");
    //     exit;
    // }

    $name = $row["name"];
    $price = $row["price"];
} else {
}

$title = "";
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,700|Lato:400,300' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: rgb(204, 204, 204);
        }

        page {
            background: #fff;
            display: block;
            margin: 0 auto;
            margin-bottom: 5mm;
            margin-top: 5mm;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }

        @page {
            size: 210mm 297mm;
            margin: 0;
        }

        @media print {

            /* Print settings */
            html,
            body,
            page {
                width: 210mm;
                height: 100%;
                margin: 0 !important;
                padding: 0 !important;
                overflow: hidden;
            }

            .no-overflow {
                overflow: hidden;
            }

            #Header,
            #Footer {
                display: none !important;
            }

            button {
                display: none;
            }

            size: A4 portrait;
            /* ... the rest of the rules ... */
        }

        button {
            background-color: black;
            width: 245px;
            border: none;
            outline: 0;
            color: #fff;
            font-family: 'Oswald', Helvetica, Arial, sans-serif;
            font-size: 20px;
            font-weight: bold;
            padding: 8px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 0px 550px;
            cursor: pointer;
            text-transform: uppercase
        }

        button:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
            color: #da2d2d;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        #button {
            width: 200mm;
            height: 40px;
            position: fixed;
            z-index: 10;
            /* background: #da2d2d;
            border-bottom: solid #da2d2d 6px; */
            /* background: #000000;
            border-bottom: solid #000000 6px; */
            top: 19px;
            right: 45px
        }

        #back {
            width: 200mm;
            position: fixed;
            top: 19px;
            left: 3px;
            z-index: 10;
        }
        /* ***************************************************************** */
        .size-a4 {
            width: 8.3in;
            height: 11.7in;
        }

        .pdf-header-center {
            padding: 50px 0 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .test-pdf {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .pdf-header {
            position: absolute;
            top: 1in;
            height: .6in;
            left: .5in;
            right: .5in;
            border-bottom: 1px solid #e5e5e5;
        }

        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, .3);
            color: #333;
            position: relative;

            /* background image add */
            /* background:#fff url(http://www.arabianhsr.com/en/images/footer.gif) bottom center no-repeat; */
            background-size: contain;

            /* background-color: #fff; */
        }

        .company-logo {
            /* font-size: 30px; */
            font-weight: bold;
            padding: 20px 0 0 0;
            /* color: #3aabf0; */
        }

        .invoice-number {
            padding-top: .17in;
            float: right;
        }
    </style>
</head>

<body id="top">
    <!-- <div class="justify-center items-center">
        <div class="mt-5 mb-3 flex justify-center items-center">
            <p class="inline-block space-y-2 border-b border-blue-500 text-xl font-bold">รายระเอียดโรงเรียน</p>
        </div>
        <div class="row flex justify-center items-center mb-3">
            <div class="form-group row col-md-10" style="justify-content: center;">
                <form action="">
                    <input type="hidden" value="">
                    <div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <!--Page 1-->
    <page size="A4">
        <div id="button" class="no-print">
            <button type="button" onclick="myFunction()"><span class="button-txt"><i class="fa fa-print" aria-hidden="true"></i>
                    &nbsp;Print</span></button>
            <script>
                function myFunction() {
                    window.print();
                }
            </script>
        </div>
        <div id="back" class="no-print">
            <a class='btn btn-dark' href='index.php'><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
        </div>
        <div class="pdf-page size-a4">
            <div class="pdf-header-center fw-bold">
                รายละเอียดบิล
            </div>
            <div class="test-pdf">
            </div>
            <div class="pdf-header">
                <span class="company-logo">
                    ชื่อโรงเรียน Test
                </span>
                <span class="invoice-number fw-bold">
                    Invoice No.12345
                </span>
            </div>

            <!-- <table class="table table-bordered" style="margin-top: 20px;">
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
            </thead> -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row" style="padding: 58px; margin-top:30px;">
                <table class="table table-bordered border-dark">
                    <thead>
                        <th>ลำดับ</th>
                        <th>รายละเอียด</th>
                        <th>จำนวนที่ซื้อ</th>
                    </thead>
                    <tbody>
                        <tr class="table-active">
                            <td>1.</td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $price ?></td>
                        </tr>
                        <tr>
                            <td scope="row" class="table-active">รวม</td>
                            <td colspan="2" class="table-active"><?php echo $price ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 3px;">( Apisit Ngaosri )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: -20px;">
                        <!-- Prepared By -->
                        ผู้จัดทำ
                    </span>
                </div>
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">( .................................................... )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: -20px;">
                        <!-- Authorized by -->
                        ผู้รับมอบอำนาจ
                    </span>
                </div>
            </div>
        </div>
    </page>
</body>
<html>

<!-- <script src="https://cdn.tailwindcss.com"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="../../js_donate/function_pdf.js"></script>
<script>
</script>