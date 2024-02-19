<?php
require_once __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    if (!empty($content)) {
        // Create mPDF instance
        $mpdf = new \Mpdf\Mpdf();


        $header = '<h1>This is the header</h1>';
        $footer = '<p>This is the footer</p>';

        // Generate HTML content with dynamic styling
        $html = '
            <style>
                p { color: blue; } /* Example CSS */
            </style>
            <p>This is a paragraph</p>
            <p>This is another paragraph</p>';

        // Write HTML content to PDF
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($html);

        // Output PDF
        $mpdf->Output(__DIR__ . '/output.pdf', 'F');

        echo 'PDF generated successfully! <a href="output.pdf" target="_blank">View PDF</a>';
        exit;
    }
}

echo 'Error: Content is empty.';
