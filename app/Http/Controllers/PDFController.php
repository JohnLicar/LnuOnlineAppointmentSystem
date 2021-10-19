<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    // function to display preview
    public function preview()
    {
        return view('pdf');
    }

    public function generatePDF()
    {
        // $pdf = PDF::loadView('pdf')->setOptions(['defaultFont' => 'sans-serif']);;
        // return $pdf->download('demo.pdf');
    }
}
