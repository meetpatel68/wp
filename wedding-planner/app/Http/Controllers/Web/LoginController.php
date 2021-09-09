<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Vendor;
use App\City;
use App\VendorPhotos;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Category;
use App\VendorInquiry;
use App\User;
use Session;
use Mail;
 /**
     * @Description : Login page
     * author : Meet
     * @date : 10-7-2021
     * @Input : 
     * @OutPut : List Enquiry page 
     */
class LoginController extends Controller
{
    
    protected $rules = [
    'category' => 'required',
    'vendor_name' => 'required',
    'business_name' => 'required',
    'email' => 'required|email|unique:users',
    'file' => 'required|file|min:1|max:50000|image',
    'address' => 'required',
    'phone' => 'required',
    'website' => 'required',
    'instagram' => 'required',
  ];
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
      
    }
    //login
    public function user_login()
    {

      return view('web.login.user_login');
    }
   
    /**
     * @Description : Check user exist or not Login page
     * author : Meet
     * @date : 10-7-2021
     * @Input : 
     * @OutPut : verify user
     */
    public function do_login(Request $request)
    {
        //$this->validate($request, $this->rules);
        
        $requestData = $request->all();
        $requestData['email'] = trim($requestData['email']);
        $checkuser = User::where('email',$requestData['email'])->first();

        if(!empty($checkuser))
        {
            $fourRandomDigit = rand(1000,9999);
            $userdata = array(
                'verification_code' =>$fourRandomDigit
            );
             User::where('email',$requestData['email'])
            ->update($userdata);
            $user_id = $checkuser->id;
            $maildata['verification_code'] = $fourRandomDigit;
            $maildata['email'] = $requestData['email'];
                Mail::send('web.login.mail', $maildata, function($message) use ($maildata) {
                
                  $message->to($maildata['email']);
                  $message->subject('User Login Verification Code');
                  });

        }   
        else
        {
             $userdata = array(
                'email' => $requestData['email'],
                'role' => '3'
            );
            $user = User::create($userdata);
            $user_id = $user->id;
            $requestData['user_id'] =  $user->id;
                     
        }     
       
         $sessiondata = array(               
                'email' => $requestData['email'],
                'role' => '3',
                'user_id' => $user_id
            );
        Session::put('user', $userdata);
        
        return redirect('verify-user/'.$user_id);
    }
     //login
    public function vendor_login()
    {

      return view('web.login.vendor_login');
    }
   
    /**
     * @Description : Check vendor exist or not Login page
     * author : Meet
     * @date : 10-7-2021
     * @Input : 
     * @OutPut : verify user
     */
    public function vendor_do_login(Request $request)
    {
        //$this->validate($request, $this->rules);
        
        $requestData = $request->all();
        $requestData['email'] = trim($requestData['email']);
        $checkuser = Vendor::where('email',$requestData['email'])->first();
        if(!empty($checkuser))
        {
            $fourRandomDigit = rand(1000,9999);
            $userdata = array(
                'verification_code' =>$fourRandomDigit
            );

             Vendor::where('email',$requestData['email'])
            ->update($userdata);
            $user_id = $checkuser->id;
            $maildata['verification_code'] = $fourRandomDigit;
            $maildata['email'] = $requestData['email'];
                Mail::send('web.login.mail', $maildata, function($message) use ($maildata) {
                
                  $message->to($maildata['email']);
                  $message->subject('User Login Verification Code');
                  });
                  $sessiondata = array(         
                      'email' => $requestData['email'],
                      'name' =>  $checkuser->vendor_name,
                      'user_id' => $user_id
                  );
              Session::put('vendor', $userdata);
              
              return redirect('verify-vendor/'.$user_id);

        }   
         else
        {
            Session::flash('error', 'Invalid email.Please do register first.');
            return redirect()->back();
                     
        }  
       

    }
    public function verify_user($id)
    {
        return view('web.login.verify_code', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function check_vefication_code(Request $request)
    {
        //$this->validate($request, $this->rules);
        
        $requestData = $request->all();
        $requestData['verification_code'] = trim($requestData['verification_code']);
        $user_id = trim($requestData['user_id']);
        $checkuser = User::where('verification_code',$requestData['verification_code'])->first();
        if(!empty($checkuser))
        {
             $userdata = array(
                'verification_code' =>NULL
                );
                 User::where('id',$user_id)
                ->update($userdata);
            $sessiondata = array(
                'name' => $checkuser->name,
                'email' => $checkuser->email,
                'phone' => $checkuser->phone,
                'role' => '3',
                'user_id' => $user_id
            );
            Session::put('user', $sessiondata);
            
            return redirect('/');

        }   
        else
        {
            Session::flash('error', 'Invalid verification code');
            return redirect()->back();
                     
        }     
       
      
        
    }
    public function verify_vendor($id)
    {
        return view('web.login.verify_vendor_code', compact('id'));
    }
    public function check_vendor_vefication_code(Request $request)
    {
        //$this->validate($request, $this->rules);
        
        $requestData = $request->all();
        $requestData['verification_code'] = trim($requestData['verification_code']);
        $user_id = trim($requestData['user_id']);
        $checkuser = Vendor::where('verification_code',$requestData['verification_code'])->first();
        if(!empty($checkuser))
        {
             $userdata = array(
                'verification_code' =>NULL
                );
                 Vendor::where('id',$user_id)
                ->update($userdata);
            $sessiondata = array(
                'name' => $checkuser->vendor_name,
                'email' => $checkuser->email,
                'phone' => $checkuser->phone,
                'role' => '3',
                'user_id' => $user_id
            );
            Session::put('vendor', $sessiondata);
            
            return redirect('/');

        }   
        else
        {
            Session::flash('error', 'Invalid verification code');
            return redirect()->back();
                     
        }     
       
      
        
    }
    /**
     * @Description : vendor register
     * author : Meet
     * @date : 12-7-2021
     * @Input : 
     * @OutPut : verify user
     */
    public function vendor_register()
    {

        $categories = Category::where('status','1')->get();
        $cities = City::where('status','1')->get();

        return view('web.login.vendor_register', compact('categories','cities'));
      
    }
    public function do_register(Request $request)
    {
        $this->validate($request, $this->rules);
    
    $model = new Vendor();
    $requestData = $request->all();
    
    $model->fill($requestData);
        $filename = null;
    if (isset($request->file)) {
      $files = $request->file('file');
      $filename = $model->generateFilename($files->getClientOriginalExtension());
      $files->move($model->getPath(), $filename);
           
      $model->file = $filename;
    }
        
    
    $model->save();
        $id = $model->id;
        if(isset($request->images))
        {
            $images = $request->file('images');
            if(!empty($images))
            {
                foreach ($images as $img) {
                    $filename = $model->generateFilename($img->getClientOriginalExtension());
                    $img->move($model->getPath(), $filename);  
                    $vendorPhotos['image_name']=  $filename;
                    $vendorPhotos['vendor_id']=  $id;
                    VendorPhotos::create($vendorPhotos);       
                }
                
            }
            
        }
        Session::flash('success', 'Registration succesfully!');
        $fourRandomDigit = rand(1000,9999);
            $userdata = array(
                'verification_code' =>$fourRandomDigit
            );
             Vendor::where('email',$requestData['email'])
            ->update($userdata);
        //$user_id = $checkuser->id;
        $maildata['verification_code'] = $fourRandomDigit;
        $maildata['email'] = $requestData['email'];
            Mail::send('web.login.mail', $maildata, function($message) use ($maildata) {
            
              $message->to($maildata['email']);
              $message->subject('User Login Verification Code');
              });
        /* $sessiondata = array(               
                'email' => $requestData['email'],
                'role' => '3',
                'user_id' => $user_id
            );
        Session::put('user', $userdata);*/
        
        return redirect('verify-vendor/'.$id);
    }
    /**
     * @Description : User logout
     * author : Meet
     * @date : 10-7-2021
     * @Input : 
     * @OutPut : verify user
     */
    public function user_logout()
    {

       Session::forget('user');
       if(!Session::has('user'))
       {
         return redirect('/');
       }
      
    }
     /**
     * @Description : Vendor logout
     * author : Meet
     * @date : 10-7-2021
     * @Input : 
     * @OutPut : verify user
     */
    public function vendor_logout()
    {

       Session::forget('vendor');
       if(!Session::has('vendor'))
       {
         return redirect('/');
       }
      
    }

}
