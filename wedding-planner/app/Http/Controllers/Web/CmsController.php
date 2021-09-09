<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;
use App\Page;
    /**
 * @Description : CMS page 
 * author : Meet
 * @date : 7-7-2021
 * @Input : 
 * @OutPut : redirect home page
 */
class CmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $content = Page::where('category','2')->get();
        return view('web.cms.about', compact('content'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactus()
    {
        return view('web.cms.contactus');
    }
    
     public function insert_contact_us(Request $request)
    {
        //$this->validate($request, $this->rules);
        
        $model = new ContactUs();
        $requestData = $request->all();
        $requestData['email'] = trim($requestData['email']);
        $requestData['name'] = trim($requestData['name']);
        $requestData['message'] = $requestData['message'];
        $model->fill($requestData);
             
        $model->save();
        $id = $model->id;  
        
        return redirect('thankyou');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        return view('web.cms.services');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function testimonials()
    {
        return view('web.cms.testimonials');
    }
}
