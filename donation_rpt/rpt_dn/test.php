<?php
include("../../inc/mysqli_db_donation.php");
    
    $start = 0;
    $rows_per_page = 3;

    $records = $kty_donate->query("SELECT * FROM trn_dona_tosc_head");
    $nr_of_rows = $records->num_rows;

    $pages = ceil($nr_of_rows / $rows_per_page);

    if(isset($_GET['page-nr'])) {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $rows_per_page;
    }

    $sql_limit = "SELECT * FROM trn_dona_tosc_head  LIMIT $start, $rows_per_page ";
    $result_limit = mysqli_query($kty_donate, $sql_limit);
    $json_array_result = array();
    while($row = mysqli_fetch_object($result_limit))   {

        $json_array_result[] = $row;
    }		
    print(json_encode($json_array_result));

?>

<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <title>Test</title>
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
        /* ********************************************************** */
        .test_limit {
            text-align: center;
            padding: 70px 0 0 100px;
        }
        .item_center {
            display: flex;
            justify-content: center;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: #000;
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
            display: flex;
            justify-content: center;
            margin-top: 60px;
            font-size: 18px;
            font-weight: bold;
        }
        .page_number {
            margin-left: 280px;
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

<?php 
    if(isset($_GET['page-nr'])) {
        $id = $_GET['page-nr'];
    } else {
        $id = 1;
    }
?>
<body id="<?php echo $id ?>">
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
            <div>
                showing 1 of <?php echo $pages ?>
            </div>
            <div class="page_number">
                <?php echo "Page " . $_GET['page-nr'] ?>
            </div>
        </div>
        <div class="item_center">
            <div class="pagination">
                <a href="?page-nr=1"><<</a>
                    <?php
                        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
                            ?>
                                <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>"><</a>
                            <?php
                        } else {
                            ?>
                                <a><</a>
                            <?php
                        }
                    ?>
                    <div class="page-numbers">
                        <?php 
                            for($counter = 1; $counter <= $pages; $counter ++) {
                                ?> 
                                    <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                                <?php   
                            }
                        ?>
                    </div>
                    <?php
                        if(!isset($_GET['page-nr'])) {
                            ?>
                                <a href="?page-nr=2">></a>
                            <?php
                        } else {
                            if($_GET['page-nr'] >= $pages) {
                                ?>
                                    <a>></a>
                                <?php
                            } else {
                                ?>
                                    <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">></a>
                                <?php
                            }
                        }
                    ?>
                <a href="?page-nr=<?php echo $pages ?>">>></a>
            </div>
        </div>
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
    let links = document.querySelectorAll('.page-numbers > a');
    let bodyId = parseInt(document.body.id) - 1;
    links[bodyId].classList.add("active");
</script>