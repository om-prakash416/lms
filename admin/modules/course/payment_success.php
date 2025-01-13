<?php
session_start();
require 'db_connection.php';

// Simulate successful payment
$user_id = 1; // Assume a logged-in user
$cart = $_SESSION['cart'];
$total_amount = 0;

// Calculate total price
foreach ($cart as $course_id) {
    $query = "SELECT price FROM courses WHERE id = '$course_id'";
    $result = mysqli_query($conn, $query);
    $course = mysqli_fetch_assoc($result);
    $total_amount += $course['price'];
}

// Insert into orders table
$query = "INSERT INTO orders (user_id, course_id, total_amount, payment_status) 
          VALUES ('$user_id', '$course_id', '$total_amount', 'paid')";
mysqli_query($conn, $query);
$order_id = mysqli_insert_id($conn);

// Generate invoice PDF
require('fpdf.php');
$invoice_number = uniqid();
$invoice_pdf = 'invoices/invoice_' . $invoice_number . '.pdf';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(200, 10, 'Invoice ' . $invoice_number, 0, 1, 'C');
$pdf->Output('F', $invoice_pdf);

// Insert into invoices table
$query = "INSERT INTO invoices (order_id, invoice_number, invoice_pdf) 
          VALUES ('$order_id', '$invoice_number', '$invoice_pdf')";
mysqli_query($conn, $query);

// Provide a download link to the user
header("Location: download_invoice.php?invoice_id=$order_id");
?>
