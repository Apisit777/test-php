<?php
include("../../inc/mysqli_db_donation.php");

$sql = "SELECT * FROM mas_school";
$result = mysqli_query($kty_donate, $sql);
$resultCheck = mysqli_num_rows($result);

// $sql = "SELECT trn_dona_tosc_head.doc_no, mas_school.school_name, trn_dona_tosc_list.product_id, trn_dona_tosc_head.do_reedem, SUM(do_reedem)
// FROM trn_dona_tosc_head
// LEFT JOIN mas_school ON trn_dona_tosc_head.school_id =  mas_school.school_id
// LEFT JOIN trn_dona_tosc_list ON  trn_dona_tosc_head.doc_no = trn_dona_tosc_head.doc_no
// WHERE trn_dona_tosc_list.product_id = 'P001'";

$sql = "SELECT trn_dona_tosc_head.id AS id, trn_dona_tosc_head.doc_no AS doc_no, trn_dona_tosc_head.school_id AS school_id
        FROM trn_dona_tosc_head";

$result = mysqli_query($kty_donate, $sql) or die(mysqli_error($kty_donate));
$resultCheck = mysqli_num_rows($result);
$json_array = array();

// if ($resultCheck > 0) {
//     while($row = mysqli_fetch_assoc($result))   {

//         $json_array[] = $row;
//     }		
//         print(json_encode($json_array));

//         // echo "<pre>";
//         // print_r($json_array);
//         // echo "</pre>";
// }  

// $loanDebts = DB::table('pgs')
//     ->select("id", "code", "fullname")
//     ->get();

// foreach ($loanDebts as $loanDebt) {
//     $dataarray_code = [];
//     $item_code = LoanDebt::select("code")
//         ->where('code', '=', $loanDebt->code)
//         ->get();
        
//     foreach ($item_code as $dataitem_code) {
//         $dataarray_code[] = $dataitem_code->code;
//     }
//     $loanDebt->dataarray_code = $dataarray_code;
// }
// return response()->json($loanDebts);

// Passing multiple variables between pages
// <a class='btn btn-sm btn-success' href='edit.php?id=$row[id]&doc_no=$[doc_no]'><i class='fa fa-print' aria-hidden='true'></i> PDF</a>

$title = "";
?>

<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <title>PDF</title>
</head>
<html>

<head>
    <title>Curriculum Vitae</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Margus Lillemagi - Curriculum Vitae" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/datatables.min.css">

    <style>
        table.dataTable th.dt-type-numeric,
        table.dataTable th.dt-type-date,
        table.dataTable td.dt-type-numeric,
        table.dataTable td.dt-type-date {
            text-align: left;
        }
        .page-item.active .page-link {
            color: #fff !important;
            background: #1F2226 !important;
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
                    <label>เลขที่เอกสาร</label>
                    <input type="text" class="form-control" id="search_text" onkeyup="checkSearch()">
                </div>
                <div class="form-group col-md-2">
                    <label></label>
                    <button id="btnSerarch" type="button" class="btn btn-warning btn-md form-control form-border title-search" onclick="search_text();">ค้นหา</button>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 30px;">
            <table id="search_data" class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>เลขที่เอกสาร</th>
                        <!-- <th>ชื่อโรงเรียน</th> -->
                        <th class='text-center'>Action</th>
                    </tr>
                </thead>
                <tbody id="result">
                <?php
                    if($resultCheck > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo  "<tr>
                                    <td> $row[id] </td>
                                    <td> $row[doc_no] </td>
                                    <td class='text-center'>
                                        <a class='btn btn-sm btn-success' href='edit.php?id=$row[id]&school_id=$row[school_id]'><i class='fa fa-print' aria-hidden='true'></i> PDF</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr>
                            <td class='text-center' colspan='4'>No data</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<html>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="../../js_donate/function_pdf.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        const mytableDatatable = $('#search_data').DataTable({
            'searching': false,
            // "serverSide": true,
            "processing": true,
            "order": [
                [0, "asc"]
            ],
        });
        // $('#btnSerarch').click(function() {
        //     mytableDatatable.draw();
        // });
    });
</script>
<script>
    document.getElementById('btnSerarch').disabled = true
    const checkSearch = ()=> {
        let btn = document.getElementById('btnSerarch')
        let search_text = document.getElementById('search_text').value
        console.log("search_text", search_text);

        if(!search_text == '') {
            btn.disabled = false
        } else {
            btn.disabled = true
        }
    }
</script>
