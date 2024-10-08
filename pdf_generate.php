<?php
//composer require dompdf/dompdf
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
// Initialize Dompdf
$options = new Options();
$options->set('defaultFont', 'Arial'); // You can change the default font if needed
$dompdf = new Dompdf($options);

// Capture the HTML content
ob_start(); // Start output buffering


?>
<html>

<head></head>

<body>
    <h1>Welcome To our Pdf Generate</h1>
</body>

</html>
<?php
$html = ob_get_clean(); // Get the content and clean the buffer
$dompdf->loadHtml($html); // Load the HTML content
$dompdf->setPaper('A4', 'portrait'); // Set paper size and orientation
$dompdf->render(); // Render the PDF
$dompdf->stream("participation_certificate.pdf", array("Attachment" => false)); // Output the PDF to browser
exit();
?>