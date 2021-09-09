<?php

namespace App\Http\Controllers\Admin;

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
 * @Description :Enquiry listing
 * author : Meet
 * @date : 7-7-2021
 * @Input : 
 * @OutPut : redirect home page
 */
class EnquiryController extends Controller
{
    
   
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
       $enquiry = VendorInquiry::select('vendor_inquiry.*','city.city_name','vendor.vendor_name','vendor.phone','user.email as user_email')
        ->leftJoin('city', 'city.id', '=', 'vendor_inquiry.city_id')
        ->leftJoin('vendor', 'vendor.id', '=', 'vendor_inquiry.vendor_id')
        ->leftJoin('user', 'user.id', '=', 'vendor_inquiry.user_id')
        ->get();
       // print_r($enquiry);exit;
        return view('admin.enquiry.index', compact('enquiry'));
    }
   
  /**
   * any data
   */
  public function listIndex(Request $request)
    {
      $vendor=Session::get('vendor'); 
        DB::statement(DB::raw('set @rownum=0'));
        $model = VendorInquiry::select([
          DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'vendor.*'
        ])->where('vendor_id',$vendor['user_id']);

         $datatables = app('datatables')->of($model)
           
            ->addColumn('action', function ($model) {
                return '<a href="'.route('vendor.show', ['id'=>$model->id]).'" class="btn btn-xs btn-success rounded" data-toggle="tooltip" title="" data-original-title="'. trans('systems.edit') .'"><i class="fa fa-eye"></i></a> '
            . '<a href="'.route('vendor.edit', ['id'=>$model->id]).'" class="btn btn-xs btn-primary rounded" data-toggle="tooltip" title="" data-original-title="'. trans('systems.edit') .'"><i class="fa fa-pencil"></i></a> '
            . '<a onclick="modalDelete('.$model->id.')" href="javascript:;" class="btn btn-xs btn-danger rounded" data-toggle="tooltip" title="" data-original-title="'. trans('systems.delete') .'"><i class="fa fa-trash"></i></a>';
            });

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

//        if ($range = $datatables->request->get('range')) {
//            $rang = explode(":", $range);
//            if($rang[0] != "Invalid date" && $rang[1] != "Invalid date" && $rang[0] != $rang[1]){
//                $datatables->whereBetween('vendor.created_at', ["$rang[0] 00:00:00", "$rang[1] 23:59:59"]);
//            }else if($rang[0] != "Invalid date" && $rang[1] != "Invalid date" && $rang[0] == $rang[1]) {
//                $datatables->whereBetween('vendor.created_at', ["$rang[0] 00:00:00", "$rang[1] 23:59:59"]);
//            }
//        }
    
        return $datatables->make(true);
    }

}
