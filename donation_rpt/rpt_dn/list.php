<?php
include ("../../inc/mysqli_db_donation.php");
// mysqli_select_db($db_service);

$search_text = $_POST['search_text'];

if ($search_text != "") {
    $sql_text = "SELECT * FROM trn_dona_tosc_head where doc_no LIKE '%$search_text%' ";
}

$query_search_text = mysqli_query($kty_donate, $sql_text) or die(mysqli_error());
$resultCheck = mysqli_num_rows($query_search_text);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($query_search_text)) {
        echo "<tr>
                <td> $row[id] </td>
                <td> $row[doc_no] </td>
                <td class='text-center'>
                <a class='btn btn-sm btn-success' href='edit.php?id=$row[id]&doc_no=$row[doc_no]'><i class='fa fa-print' aria-hidden='true'></i> PDF</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr>
        <td class='text-center' colspan='4'>No data</td>
    </tr>";
}
?>

<script>
</script>