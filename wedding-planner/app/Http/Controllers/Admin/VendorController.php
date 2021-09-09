<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vendor;
use App\City;
use App\VendorPhotos;
use DB;
use Eventviva\ImageResize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Category;
use Session;
    /**
 * @Description : Vendor page ,add,edit,delete and listing
 * author : Meet
 * @date : 10-7-2021
 * @Input : 
 * @OutPut : redirect home page
 */
class VendorController extends Controller
{
	protected $rules = [
        'category' => 'required',
		'vendor_name' => 'required',
        'email' => 'required|email|unique:users',
        'business_name' => 'required',
        'file' => 'required|file|min:1|max:50000|image',
		'status' => 'required',
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
        $categories = Category::where('status','1')->get();
        return view('admin.vendor.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = Category::where('status','1')->get();
        $cities = City::where('status','1')->get();

        return view('admin.vendor.create', compact('categories','cities'));
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

        $model = Vendor::select('vendor.*','category.name as category_name','city.city_name')
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
            /*$img = new ImageResize($model->getPath() . $filename);
            $img->resizeToWidth(1280);
            $img->save($model->getPath() . $filename);*/
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
