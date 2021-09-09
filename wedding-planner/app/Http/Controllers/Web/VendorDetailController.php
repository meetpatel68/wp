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

class VendorDetailController extends Controller
{
	
/**
     * @Description : Vendor main listing page 
     * author : Meet
     * @date : 15-7-2021
     * @Input : 
     * @OutPut : Vendor main listing page 
     */
    public function index()
    {
        $categories = Category::where('status','1')->get();
        $cities = City::where('status','1')->get();
        return view('web.vendor.index', compact('categories','cities'));
    }

    /**
     * @Description : Vendor category page
     * author : Meet
     * @date : 15-7-2021
     * @Input : 
     * @OutPut : Vendor main listing page 
     */
    public function vendor_category($slug,$id)
    {
        $vendor = Vendor::select('vendor.*','category.name as category_name','city.city_name')
        ->leftJoin('category', 'category.id', '=', 'vendor.category')
        ->leftJoin('city', 'city.id', '=', 'vendor.city_id')
        ->where('category',$id)
        ->paginate(20);

        $categories = Category::where('id',$id)->first();
        $cities = City::where('status','1')->get();

        return view('web.vendor.vendor_category', compact('vendor','categories','cities'));
    }
    /**
     * @Description : Vendor category ajax page
     * author : Meet
     * @date : 15-7-2021
     * @Input : 
     * @OutPut : Vendor main listing page 
     */
     function vendor_category_fetch(Request $request)
    {
     if($request->ajax())
     {
        $sort_by = $request->get('sortby');
        $id = $request->get('id');
        $city_id = $request->get('city_id');
        $sort_type = $request->get('sorttype');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
         $status_query ='category = '.$id;
        if(!empty($city_id))
        {
            $status_query .=' and city_id = '.$city_id;
        }
         
         
         $vendor = Vendor::select('vendor.*','category.name as category_name','city.city_name')
        ->leftJoin('category', 'category.id', '=', 'vendor.category')
        ->leftJoin('city', 'city.id', '=', 'vendor.city_id')
        ->whereRaw($status_query.' and (business_name like "%'.$query.'%" or vendor_name like "%'.$query.'%" or price like "%'.$query.'%")')
        ->paginate(20);

        $categories = Category::where('id',$id)->first();
        $cities = City::where('status','1')->get();

      return view('web.vendor.vendor_category_ajax_data',compact('vendor','categories','cities'))->render();
     }
    }
   
    /**
     * @Description : Vendor detail page
     * author : Meet
     * @date : 15-7-2021
     * @Input : 
     * @OutPut : Vendor detail page 
     */
    public function vendor_detail($id)
    {
        $model = Vendor::select('vendor.*','category.name as category_name','city.city_name')
        ->leftJoin('category', 'category.id', '=', 'vendor.category')
        ->leftJoin('city', 'city.id', '=', 'vendor.city_id')
        ->findOrFail($id);
        $categories = Category::where('status','1')->get();
        $cities = City::where('status','1')->get();
        $vendorImages = VendorPhotos::where('vendor_id',$id)->get();
        return view('web.vendor.vendor_detail', compact('categories','cities','model','vendorImages'));
    }
    /**
     * @Description : Vendor inquiry page
     * author : Meet
     * @date : 15-7-2021
     * @Input : 
     * @OutPut : Vendor inquiry page 
     */
    public function vendor_inquiry($id)
    {
        $model = Vendor::select('vendor.*','category.name as category_name','city.city_name')
        ->leftJoin('category', 'category.id', '=', 'vendor.category')
        ->leftJoin('city', 'city.id', '=', 'vendor.city_id')
        ->findOrFail($id);
        $categories = Category::where('status','1')->get();
        $cities = City::where('status','1')->get();

        return view('web.vendor.vendor_inquiry', compact('categories','cities','model','id'));
    }
    /**
     * @Description : Vendor inquiry insert page
     * author : Meet
     * @date : 15-7-2021
     * @Input : 
     * @OutPut : Vendor inquiry insert page 
     */
     public function insert_inquiry(Request $request)
    {
        //$this->validate($request, $this->rules);
        
        $model = new VendorInquiry();
        $requestData = $request->all();
        $requestData['email'] = trim($requestData['email']);
        $requestData['name'] = trim($requestData['name']);
        $requestData['event_date'] = date('Y-m-d',strtotime($requestData['event_date']));
        $checkuser = User::where('email',$requestData['email'])->first();
        if(!empty($checkuser))
        {
            $userdata = array(
                'name' => $checkuser->name,
                'phone' => $checkuser->phone_number,
            );
             User::where('email',$requestData['email'])
            ->update($userdata);
            $user_id = $checkuser->id;
            $requestData['user_id'] = $user_id;
            //update inquiry
           unset($requestData['_token']);

            $model->fill($requestData);
             
            $model->save();
            $id = $model->id;   
        }   
        else
        {
            $userdata = array(
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'phone' => $requestData['phone_number'],
                'role' => '3'
            );
            $user = User::create($userdata);
            $user_id = $user->id;
            $requestData['user_id'] =  $user->id;
            //insert inquiry
            $model->fill($requestData);
             
            $model->save();
            $id = $model->id;         
        }     
        
        $sessiondata = array(
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'phone' => $requestData['phone_number'],
                'role' => '3',
                'user_id' => $user_id
            );
        Session::put('user', $sessiondata);
        
        return redirect('thankyou');
    }
    public function thankyou()
    {
        return view('web.vendor.thankyou');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
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
            $img = new ImageResize($model->getPath() . $filename);
            $img->resizeToWidth(1280);
            $img->save($model->getPath() . $filename);
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
        Session::flash('success', 'Vendor added!');
        
        return redirect('admin/vendor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *Bank
     * @return View
     */
    public function show($id)
    {

        $model = Vendor::select('vendor.*','category.name','city.city_name')
        ->leftJoin('category', 'category.id', '=', 'vendor.category')
        ->leftJoin('city', 'city.id', '=', 'vendor.city_id')
        ->findOrFail($id);

        return view('admin.vendor.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function edit($id)
    {
        $model = Vendor::findOrFail($id);
        $categories = Category::where('status','1')->get();
        $cities = City::where('status','1')->get();
        $vendorImages = VendorPhotos::where('vendor_id',$id)->get();
        return view('admin.vendor.edit', compact('model','categories','vendorImages','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update($id, Request $request)
    {
		$rules = $this->rules;
        $rules['file'] = 'file|min:1|max:20000|image';
        $rules['image'] = 'images|image';
        $this->validate($request, $rules);
		
		$model = Vendor::findOrFail($id);

		
        $requestData = $request->all();
		//prd($requestData);
		$model->fill($requestData);
        $oldFile = $model->file;
        $filename = null;
		if (isset($request->file)) {

			$files = $request->file('file');
            $model->deleteFile($oldFile);
            $filename = $model->generateFilename($files->getClientOriginalExtension());
            $files->move($model->getPath(), $filename);
            $img = new ImageResize($model->getPath() . $filename);
            $img->resizeToWidth(1280);
            $img->save($model->getPath() . $filename);
            $model->file = $filename;
		}
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
        
		/*if (isset($request->thumbnail_file)) {
			$files = $request->file('thumbnail_file');
            $model->deleteThumbFile($oldFile);
			$files->move($model->getThumbPath(), $filename);
            $img = new ImageResize($model->getThumbPath() . $filename);
            $img->resizeToWidth(480);
            $img->save($model->getThumbPath() . $filename);
		}*/
		$model->save();
		
        Session::flash('success', 'Vendor updated!');

        return redirect('admin/vendor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $model = Vendor::findOrFail($id);
        $model->deleteAllFiles();
        $model->delete();
        
        Session::flash('success', 'Vendor deleted!');

        return redirect('admin/vendor');
    }
	
	/**
	 * any data
	 */
	public function listIndex(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $model = Vendor::select([
					DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'vendor.*'
				]);

         $datatables = app('datatables')->of($model)
            ->editColumn('status', function ($model) {
                return $model->getStatusLabel();
            })
            ->editColumn('file', function ($model) {
                return $model->getFileThumbImg();
            })
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
