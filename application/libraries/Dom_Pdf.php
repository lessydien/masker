<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;

use Dompdf\Options;



class Dom_Pdf
{

    var $domPdf;



    function __construct()
    {

        $this->__init();
    }



    function __init()
    {

        $options = new Options();
        $customPaper = array(0, 0, 609.4488, 935.433);
        $options->set('defaultFont', 'Times New Roman');

        $this->dompdf = new Dompdf($options);

        $this->dompdf->setPaper($customPaper);
    }



    function loadHtml($html)
    {

        $this->dompdf->loadHtml($html);
    }



    function generate($filename = "", $stream=TRUE)
    {

        $this->dompdf->render();

        if($stream){
            $this->dompdf->stream($filename, array('compress' => 1, 'Attachment' => 0));
        }else{
            return $this->dompdf->output();
        }
    }
}
