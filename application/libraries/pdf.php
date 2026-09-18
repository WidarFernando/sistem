<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Pdf extends Dompdf {
    public function __construct($options = null)
    {
        parent::__construct($options);
    }
}
