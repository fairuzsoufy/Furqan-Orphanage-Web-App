<?php
require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;

// For example, in windows use the wkhtmltopdf executable file


class pdfGenerator
{ 
    public $snappy;
    public $url;
    public $html;
    function generate()
    {
        $snappy = new Pdf('"D:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"');
        // generete from

        $date = new DateTime();
        $filepath= "test" . $date->format('Y-m-d His') . ".pdf";
        if(file_exists($filepath))
        unlink($filepath);
        
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename= '.$filepath);
        $snappy->generateFromHtml($this->html, $filepath);
        
        readfile(__DIR__.'/'.$filepath);
        if(file_exists($filepath))
             unlink($filepath);
        
    }
}

?>