<?php
// include ("../../../inc/mysqli_db_donation.php");
include("../../inc/mysqli_db_donation.php");

$id = '';
$school_id = '';
$school_name = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // if ( !isset($_GET["id"]) ) {
    //     header("location: /donation_rpt/rpt_dn/index.php");
    //     exit;
    // }

    $id = $_GET["id"];
    $doc_no = $_GET["doc_no"];

    // $sql = "SELECT * FROM mas_school WHERE id = $id";
    // $perpage = 20;
    // $offset = (($page-1)*$perpage);

    $sql = "SELECT trn_dona_tosc_head.doc_no AS doc_no, trn_dona_tosc_head.school_id AS school_id, mas_school.school_name AS school_name, trn_dona_tosc_list.product_id AS product_id, trn_dona_tosc_list.doc_datetime AS doc_datetime, trn_dona_tosc_head.do_reedem, SUM(do_reedem) AS do_reedem
            FROM trn_dona_tosc_head
            LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
            LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
            WHERE trn_dona_tosc_list.doc_no = '$doc_no'
            GROUP BY trn_dona_tosc_head.doc_no, mas_school.school_name, trn_dona_tosc_list.product_id; ";

    // if($page != 9999){
    //     $sql_district .= " LIMIT $offset,$perpage  ";
    // }

    $sql_sum = "SELECT SUM(do_reedem) AS total
            FROM trn_dona_tosc_head
            LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
            LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
            WHERE trn_dona_tosc_list.doc_no = '$doc_no' ";

    $sql_do_reedem = "SELECT SUM(do_reedem) AS do_reedem
                        FROM trn_dona_tosc_head
                        LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
                        LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
                        WHERE trn_dona_tosc_list.doc_no = '$doc_no'
                        GROUP BY trn_dona_tosc_head.doc_no, mas_school.school_name, trn_dona_tosc_list.product_id; ";

    $result = mysqli_query($kty_donate, $sql);
    $result_sum = mysqli_query($kty_donate, $sql_sum);

    // $result_sum_do_reedem = mysqli_query($kty_donate, $sql_do_reedem);
    // $resultCheck = mysqli_num_rows($result_sum_do_reedem);

    $row = $result->fetch_assoc();
    $row_sum = $result_sum->fetch_assoc();

    $product_id = $row["product_id"];
    $total = $row_sum["total"];

    $school_name = $row["school_name"];
    $school_id = $row["school_id"];
    $doc_datetime = $row["doc_datetime"];
    $explode_doc_datetime = explode(" ", $doc_datetime);
    $explode_doc_datetime = strtotime($explode_doc_datetime[0]);
    $explode_doc_datetime = date('d-m-Y', $explode_doc_datetime);
    function DateThai($explode_doc_datetime)
        {
            $strYear = date("Y",strtotime($explode_doc_datetime))+543;
            $strMonth= date("n",strtotime($explode_doc_datetime));
            $strDay= date("j",strtotime($explode_doc_datetime));
            $strHour= date("H",strtotime($explode_doc_datetime));
            $strMinute= date("i",strtotime($explode_doc_datetime));
            $strSeconds= date("s",strtotime($explode_doc_datetime));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai = $strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
            // return "$strDay $strMonthThai $strYear, $strHour:$strMinute:$strSeconds";
        }
        // echo "ThaiCreate.Com Time now : ".DateThai($explode_doc_datetime);

    // $do_reedem = $row["do_reedem"];
    // $numbers = [1, 2, 3000, 4000, 5000];

    // foreach ($numbers as $key => $value) {
    //     print(json_encode(number_format($value, 2)));
    // }
    
    $start = 0;
    $rows_per_page = 5;

    $records = "SELECT * FROM trn_dona_tosc_head";
    $nr_of_rows = $records->num_rows;

    $pages = ceil($nr_of_rows / $rows_per_page);

    if(isset($_GET['page-nr'])) {
        $_GET['page-nr'] - 1;
        $start = $page * $rows_per_page;
    }

    $sql_limit = "SELECT * FROM trn_dona_tosc_head  LIMIT $start, $rows_per_page ";
    $result_limit = mysqli_query($kty_donate, $sql_limit);

} else {
}

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
            /* background-image: url("https://www.ssup.co.th/wp-content/uploads/2022/11/site-logo-g.png"); */
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

        .invoice-number1 {
            padding-top: .25in;
            float: right;
        }
        .invoice-number2 {
            /* padding-top: .17in; */
            float: right;
        }
        /* ********************************************************** */
        .test_limit {
            padding: 70px 0 0 100px;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border: thin solid #555;
            font-size: 18px;
        }
        a.active {
            background-color: #0d81cd;
            color:  #fff;
            border: thin solid #0d81cd;
        }
        a:focus {
            border: 1px solid #00ff00;
        }
        .page-info {
            margin-top: 90px;
            font-size: 18px;
            font-weight: bold;
        }
        .pagination {
            margin-top: 20px;
        }
        .content p {
            margin-bottom: 25px;
        }
        .page-numbers {
            display: inline-block;
        }
    </style>
</head>

<body id="top">
    <div class="test_limit content">
        <?php 
            while($row = $result_limit->fetch_assoc()) {
                ?>
                    <p>
                        <?php echo $row['id'] ?> - <?php  echo $row['doc_no']?>
                    </p>
                <?php 
            }
        ?>

        <div class="page-info">
                showing 1 of <?php echo $pages ?>
        </div>

        <div class="pagination">
                <a href="?page-nr=1">First</a>
                <?php
                    if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
                        ?>
                            <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                        <?php
                    } else {
                        ?>
                            <a>Previous</a>
                        <?php
                    }
                ?>
                <div class="page-numbers">
                    <a href="">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a href="">4</a>
                    <a href="">5</a>
                </div>
                <?php
                    if(isset($_GET['page-nr'])) {
                        ?>
                            <a href="?page-nr=2">Next</a>
                        <?php
                    } else {
                        if($_GET['page-nr'] >= $pages) {
                            ?>
                                <a>Next</a>
                            <?php
                        } else {
                            ?>
                                <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                            <?php
                        }
                    }
                ?>
                <a href="?page-nr=<?php echo $pages ?>">Last</a>
        </div>
    </div>

    
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
            <a class='btn btn-dark' href='index.php'><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <div class="pdf-page size-a4">
            <!-- <div class="d-flex flex-row" style="width: 100%;">
                <div style="margin-top: 28px; margin-right: 133px; margin-left: 50px;">
                    <img src="https://www.ssup.co.th/wp-content/uploads/2022/11/site-logo-g.png" style="width: 140px;">
                </div>
                <div class="pdf-header-center fw-bold">
                    รายการมอบให้โรงเรียน
                </div>
            </div> -->
            <div class="pdf-header-center fw-bold" style="font-size: 18px; font-weight: 500; color: #1E988A;">
                รายการมอบให้โรงเรียน
            </div>

            <div class="row" style="margin-top: 30px; padding: 0 50px 0 50px">
                <div class="col d-flex flex-row-reverse 2" style="margin-right: 85px;">
                    <div>
                        <div class="row" style="width: 470px;">
                            <div style="width: 118px">
                                <span style="font-size: 12px;">
                                    เลขที่รายการสินค้า                 
                                </span>
                            </div>
                            <div class="col" style="">
                                <span style="font-size: 12px;">
                                    <?php echo $product_id ?>
                                </span>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div style="width: 118px;">
                                <span style="font-size: 12px;">
                                    ชื่อโครงการ                  
                                </span>
                            </div>
                            <div class="col" style="width: 80px;">
                                <span style="font-size: 12px;">
                                    กตัญญู
                                    <!-- <?php echo $school_name ?> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex flex-row-reverse 2" style="width: 150px;margin-right: 14px;">
                    <div>
                        <div class="row" style="width: 200px;">
                            <div style="width: 70px;">
                                <span style="font-size: 12px;">
                                    วันที่                    
                                </span>
                            </div>
                            <div class="col text-center" style="border-bottom: 1px solid black;">
                                <span style="font-size: 12px;">
                                    <?php echo DateThai($explode_doc_datetime); ?>
                                </span>
                            </div>
                        </div>
                        <!-- <div class="row" style="margin-top: 10px;">
                            <div style="width: 70px;">
                                <span style="font-size: 12px;">
                                    วันที่                    </span>
                            </div>
                            <div class="col" style="width: 80px;border-bottom: 1px solid black;">
                                <span style="font-size: 12px;">08 พฤษภาคม 2567</span>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row" style="position: relative; padding: 70px 58px 0 58px;">
                <table class="table table-bordered border-dark">
                    <thead class="table-active">
                        <th class='text-center'>ลำดับ</th>
                        <th class='text-center'>เลขที่เอกสาร</th>
                        <th class='text-center'>ชื่อโรงเรียน</th>
                        <th class='text-center'>ยอดเงิน(บาท)</th>
                        <!-- <th>หมายเหตุ</th> -->
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    while ($row = mysqli_fetch_object($result)) 
                    {
                    ?>
                        <tr>
                            <td class='text-center' style='font-size: 14px;'> <?php echo $x++; ?></td>
                            <td class='text-center' style='font-size: 14px;'> <?php echo $row->doc_no; ?></td>
                            <td style='font-size: 14px;'> <?php echo $row->school_name; ?></td>
                            <td class='text-end' style='font-size: 14px;'> <?php echo number_format($row->do_reedem, 2); ?></td>
                            <!-- <td style='font-size: 14px;'></td> -->
                        </tr>
                    <?php } ?>
                        <tr>
                            <td scope="row" class="text-center">รวม</td>
                            <td colspan="4" class="text-end">฿ <?php echo number_format($total, 2); ?> บาท</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" style="top-100px; padding: 0 58px 10px 58px;">
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 10px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 9px;margin-top: 3px;">( <?php echo $school_name ?> )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 10px;margin-top: -20px;">
                        ผู้ได้รับบริจาค
                    </span>
                </div>
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 10px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 10px;margin-top: 5px;">( .................................................... )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 10px;margin-top: -20px;">
                        ผู้บริจาค
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
<script src="../js_donate/function_pdf.js"></script>
<script>
</script>