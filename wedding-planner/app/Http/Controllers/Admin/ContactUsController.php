<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\ContactUs;
use Session;
use Mail;
    /**
 * @Description : Contact us page listing
 * author : Meet
 * @date : 7-7-2021
 * @Input : 
 * @OutPut : redirect home page
 */
class ContactUsController extends Controller
{
    
   
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
       $contactus = ContactUs::get();
       // print_r($contactus);exit;
        return view('admin.contactus.index', compact('contactus'));
    }
 

}
