<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use PDF;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $user = Member::latest()->paginate(5);
  
        if($request->has('download'))
        {
            $pdf = PDF::loadView('index',compact('user'))->setOptions(['defaultFont' => 'sans-serif']);;
            return $pdf->download('pdfview.pdf');
        }

        return view('index',compact('user'));
    }
}
