<?php
$invoice_id = $_GET['invoice_id'];
require 'db_connection.php';

$query = "SELECT * FROM invoices WHERE order_id = '$invoice_id'";
$result = mysqli_query($conn, $query);
$invoice = mysqli_fetch_assoc($result);
$invoice_pdf = $invoice['invoice_pdf'];

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . basename($invoice_pdf) . '"');
readfile($invoice_pdf);
?>
