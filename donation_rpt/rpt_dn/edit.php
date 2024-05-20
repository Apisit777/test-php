<?php
// include ("../../../inc/mysqli_db_donation.php");
include("../../inc/mysqli_db_donation.php");

$id = '';
$school_id = '';
$school_name = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET["id"];
    $doc_no = $_GET["doc_no"];

    $start = 0;
    $rows_per_page = 8;

    $records = $kty_donate->query("SELECT * 
                                   FROM trn_dona_tosc_head
                                   ");
    // $records = $kty_donate->query("SELECT trn_dona_tosc_list.id AS id, trn_dona_tosc_head.doc_no AS doc_no, trn_dona_tosc_head.school_id AS school_id, mas_school.school_name AS school_name, trn_dona_tosc_list.product_id AS product_id, trn_dona_tosc_list.doc_datetime AS doc_datetime, trn_dona_tosc_head.do_reedem, SUM(do_reedem) AS do_reedem
    //                             FROM trn_dona_tosc_head
    //                             INNER JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
    //                             INNER JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
    //                             WHERE trn_dona_tosc_list.doc_no = '$doc_no'
    //                             GROUP BY trn_dona_tosc_head.doc_no, mas_school.school_name, trn_dona_tosc_list.product_id");

    $nr_of_rows = $records->num_rows;

    $pages = ceil($nr_of_rows / $rows_per_page);

    if(isset($_GET['page-nr'])) {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $rows_per_page;
    }

    $sql_limit = "SELECT trn_dona_tosc_list.id AS id, trn_dona_tosc_head.doc_no AS doc_no, trn_dona_tosc_head.school_id AS school_id, mas_school.school_name AS school_name, trn_dona_tosc_list.product_id AS product_id, trn_dona_tosc_list.doc_datetime AS doc_datetime, trn_dona_tosc_head.do_reedem, SUM(do_reedem) AS do_reedem
                  FROM trn_dona_tosc_head
                  LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
                  LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
                  WHERE trn_dona_tosc_list.doc_no = '$doc_no'
                  GROUP BY trn_dona_tosc_head.doc_no, mas_school.school_name, trn_dona_tosc_list.product_id
                  LIMIT $start, $rows_per_page";

    $sql = "SELECT trn_dona_tosc_list.id AS id, trn_dona_tosc_head.doc_no AS doc_no, trn_dona_tosc_head.school_id AS school_id, mas_school.school_name AS school_name, trn_dona_tosc_list.product_id AS product_id, trn_dona_tosc_list.doc_datetime AS doc_datetime, trn_dona_tosc_head.do_reedem, SUM(do_reedem) AS do_reedem
            FROM trn_dona_tosc_head
            LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
            LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
            WHERE trn_dona_tosc_list.doc_no = '$doc_no'
            GROUP BY trn_dona_tosc_head.doc_no, mas_school.school_name, trn_dona_tosc_list.product_id";

    $sql_sum = "SELECT SUM(do_reedem) AS total
                FROM trn_dona_tosc_head
                LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
                LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
                WHERE trn_dona_tosc_list.doc_no = '$doc_no' ";

    $sql_text = "SELECT trn_dona_tosc_list.product_id AS product_id, trn_dona_tosc_list.doc_datetime AS doc_datetime
                FROM trn_dona_tosc_head
                LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
                LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
                WHERE trn_dona_tosc_list.doc_no = '$doc_no'";

    $result = mysqli_query($kty_donate, $sql) or die(mysqli_error($kty_donate));
    $result_text = mysqli_query($kty_donate, $sql_text) or die(mysqli_error($kty_donate));
    $json_array_result = array();
    // $json_array_result[] = $result;

    while($row = mysqli_fetch_object($result))   {

        $json_array_result[] = $row;
    }		
    // print(json_encode(count($json_array_result)));
    // print(json_encode($json_array_result));

    $result_sum = mysqli_query($kty_donate, $sql_sum);
    // $result_sum_do_reedem = mysqli_query($kty_donate, $sql_do_reedem);
    // $resultCheck = mysqli_num_rows($result_sum_do_reedem);

    // $row = $result->fetch_assoc();
    $row_text = $result_text->fetch_assoc();
    $row_sum = $result_sum->fetch_assoc();

    $product_id = $row_text["product_id"];
    $total = $row_sum["total"];

    // $school_name = $row["school_name"];
    // $school_id = $row["school_id"];
    $doc_datetime = $row_text["doc_datetime"];
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
        .background_img {
            background-image: url("https://www.ssup.co.th/wp-content/uploads/2022/11/site-logo-g.png");
            z-index: 1;
            position: absolute;
            width: 200%;
            height: 200%;
            left: -433px;
            transform: rotate(25deg);
        }

        @page {
            size: 210mm 297mm;
            margin: 0;
        }

        @media print {

            /* Print settings */
            body {
                margin-left: 0 !important;
            }

            page {
                width: 210mm;
                height: 100%;
                margin: 0 !important;
                padding: 0 !important;
                overflow: hidden;
            }
            .print_page_number{
                right: -70 !important;
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

            #print_page{
                width: auto !important;
                height: auto !important;
                overflow: visible !important;
                display: block !important;
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
            /* box-shadow: 0 5px 10px 0 rgba(0, 0, 0, .3); */
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

<body id="top <?php echo $id ?>">
    <div id="print_page">
        <div id="button" class="no-print">
            <button type="button" onclick="myFunction()"><span class="button-txt"><i class="fa fa-print" aria-hidden="true"></i>
                    &nbsp;Print</span></button>
        </div>
        <div id="back" class="no-print">
            <a class='btn btn-dark' href='index.php'><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <?php $arr = range(1, $pages);
            foreach($arr as $page_key=> $value): 
                ?>
                    <!--Page -->
                    <page size="A4" style="position: relative; overflow: hidden;">
                        <!-- <div class="background_img">
                        </div>                            -->
                        <span class="print_page_number" style="position: absolute; top: 15px; right: 25px">
                            <?php echo $page_key + 1; ?>
                        </span>
                        <?php 
                            if($page_key == 0) {
                                ?>
                                    <!-- <div class="d-flex flex-row" style="width: 100%;">
                                        <div style="margin-top: 28px; margin-right: 133px; margin-left: 50px;">
                                            <img src="https://www.ssup.co.th/wp-content/uploads/2022/11/site-logo-g.png" style="width: 140px;">
                                        </div>
                                        <div class="pdf-header-center fw-bold" style="font-size: 18px; font-weight: 500; color: #1E988A;">
                                            รายการมอบให้โรงเรียน
                                        </div>
                                    </div> -->
                                    <div class="pdf-header-center fw-bold" style="font-size: 18px; font-weight: 500; color: #1E988A;">
                                        รายการมอบให้โรงเรียน
                                    </div>
                                    <div class="row" style="margin-top: 30px; padding: 0 50px 0px 50px">
                                        <div class="col d-flex flex-row-reverse 2" style="margin-right: 80px;">
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
                                <?php
                            }
                        ?>
                        <div class="pdf-page size-a4" style="padding-bottom: 175px; display: flex; flex-direction: column; justify-content: space-between;">
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
                                        $data_slice = array_slice($json_array_result, $page_key * $rows_per_page, $rows_per_page);
                                        foreach($data_slice as $key => $row): 
                                            ?>
                                                <tr>
                                                    <td class='text-center' style='font-size: 14px;'> 
                                                        <?php
                                                            $x = $key+1+($rows_per_page * $page_key);
                                                            echo $x; 
                                                        ?>
                                                    </td>
                                                    <td class='text-center' style='font-size: 14px;'> <?php echo $row->doc_no; ?></td>
                                                    <td style='font-size: 14px;'> <?php echo $row->school_name; ?></td>
                                                    <td class='text-end' style='font-size: 14px;'> <?php echo number_format($row->do_reedem, 2); ?></td>
                                                </tr>
                                            <?php 
                                        endforeach;
                                    ?>
                                    <?php 
                                        if($page_key == count($arr) - 1 ) {
                                            ?>
                                                <tr>
                                                    <td scope="row" class="text-center">รวม</td>
                                                    <td colspan="4" class="text-end">฿ <?php echo number_format($total, 2); ?> บาท</td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php 
                                if($page_key == count($arr) - 1 ) {
                                    ?>
                                        <div class="row" style="top: 100px; padding: 0 58px 10px 58px;">
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
                                    <?php
                                }
                            ?>
                        </div>
                    </page>
                <?php 
            endforeach; 
        ?>
    </div>
</body>
<html>

<!-- <script src="https://cdn.tailwindcss.com"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="../js_donate/function_pdf.js"></script>
<script>
    function myFunction() {
        window.print();
    }
</script>