<?php
require('../fpdf.php');
require '../../vendor/autoload.php';

// $pdf=new FPDF();
// var_dump(get_class_methods($pdf));

//$methods = array();
$pdf=new FPDF();
$class_methods = get_class_methods(new FPDF());

foreach ($class_methods as $method_name) {
    echo "$method_name\n";
    echo '<br>';
}


    echo '<br>';
    echo '<br>';
    echo '<br>';

$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
$str=base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128));
echo '<img src="data:image/png;base64,'.$str.'">';

    echo '<br>';
    echo '<br>';
    echo '<br>';

echo $str;

$s='data:image/png;base64,'.$str;

   echo '<br>';
    echo '<br>';
    echo '<br>';

    echo $s;


    echo '<img src="hel.png">';
?>