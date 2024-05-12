<?php
// include("../db_con/connect.php");
include ("../../inc/mysqli_db_donation.php");
// mysqli_select_db($db_service);

$search_text = $_POST['search_text'];

if ($search_text != "") {
    $sql_text = "SELECT * FROM food where name LIKE '%$search_text%' ";
}

$query_search_text = mysqli_query($kty_donate, $sql_text) or die(mysqli_error());
$numrow = mysqli_num_rows($query_search_text);

while ($r = mysqli_fetch_assoc($query_search_text)) {
    echo  "<tr>
            <td> $r[id] </td>
            <td> $r[name] </td>
            <td> $r[price] </td>
            <td>
                <a class='btn btn-primary' href='edit.php?id=$r[id]'>PDF</a>
            </td>
        </tr>";
}
?>

<script>
</script>