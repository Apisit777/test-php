<?php
// include("../db_con/connect.php");
// include ("../../../inc/mysqli_db_donation.php");
// mysqli_select_db($db_service);

$server_service="localhost";
$user_service="root";
$pass_service="";
$db_service="basic-laravel-search-school";

$kty_donate = new mysqli($server_service, $user_service, $pass_service, $db_service) or die(mysqli_error());
$search_text = $_GET['search_text'];

if ($search_text != "") {
    $sql_search = "SELECT * FROM food where name LIKE '%$search_text%' ";
}

$query_search = mysqli_query($kty_donate, $sql_search) or die(mysqli_error());
$numrow = mysqli_num_rows($query_search);
// echo "numrow : ".$numrow;

?>

<div class="row" style="padding: 30px; margin-top:30px;">
    <table id="search_data" class="table table-dark table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($query_search))
                {
                    echo  "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
    $('#search_data').DataTable( {
    "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
     "searching": false,
     "lengthChange": false
    } );
    } );
</script>