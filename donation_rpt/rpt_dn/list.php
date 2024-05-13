<?php
include ("../../inc/mysqli_db_donation.php");
// mysqli_select_db($db_service);

$search_text = $_POST['search_text'];

if ($search_text != "") {
    $sql_text = "SELECT * FROM mas_school where school_id LIKE '%$search_text%' ";
}

$query_search_text = mysqli_query($kty_donate, $sql_text) or die(mysqli_error());
$resultCheck = mysqli_num_rows($query_search_text);

if ($resultCheck > 0) {
    while ($r = mysqli_fetch_assoc($query_search_text)) {
        echo "<tr>
                <td> $r[id] </td>
                <td> $r[school_id] </td>
                <td> $r[school_name] </td>
                <td class='text-center'>
                    <a class='btn btn-sm btn-success' href='edit.php?id=$r[id]'><i class='fa fa-print' aria-hidden='true'></i> PDF</a>
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