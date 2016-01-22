<?php
require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

// Display the resulting pdf in the browser
// by setting the Content-type header to pdf
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');

ob_start();
include './templates/test.html';

$html = ob_get_contents();
ob_end_clean();

$snappy->setOption('margin-top', 0);
$snappy->setOption('margin-bottom', 0);
$snappy->setOption('margin-left', 0);
$snappy->setOption('margin-right', 0);

echo $snappy->getOutputFromHtml(
  $html
);
