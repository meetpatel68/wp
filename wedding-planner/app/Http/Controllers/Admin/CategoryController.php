<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Eventviva\ImageResize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Session;
    /**
 * @Description : Category page ,add,edit,delete and listing
 * author : Meet
 * @date : 7-7-2021
 * @Input : 
 * @OutPut : redirect home page
 */
class CategoryController extends Controller
{
	protected $rules = [
		'name' => 'nullable',
		'description' => 'nullable',
	];


	/**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.category.create');
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
		
		$model = new Category();
		$requestData = $request->all();
		
        $model->fill($requestData);
		$model->save();
		
        Session::flash('success', 'Category added!');
        
        return redirect('admin/category');
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
        $model = Category::findOrFail($id);

        return view('admin.category.show', compact('model'));
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
        $model = Category::findOrFail($id);

        return view('admin.category.edit', compact('model'));
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
        $this->validate($request, $rules);
		
		$model = Category::findOrFail($id);
		$requestData = $request->all();
		$model->fill($requestData);
        $model->save();
		
        Session::flash('success', 'Category updated!');

        return redirect('admin/category');
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
        Category::destroy($id);
		
        Session::flash('success', 'Category deleted!');

        return redirect('admin/category');
    }
	
	/**
	 * any data
	 */
	public function listIndex(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $model = Category::select([
					DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'category.*'
				]);

         $datatables = app('datatables')->of($model)
            ->editColumn('status', function ($model) {
                return $model->getStatusLabel();
            })
            ->addColumn('action', function ($model) {
                return '<a href="category/'.$model->id.'/edit" class="btn btn-xs btn-primary rounded" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a> '
                    . '<a href="#" onclick="modalDelete('.$model->id.')" class="btn btn-xs btn-danger rounded" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a> ';
            });

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

//        if ($range = $datatables->request->get('range')) {
//            $rang = explode(":", $range);
//            if($rang[0] != "Invalid date" && $rang[1] != "Invalid date" && $rang[0] != $rang[1]){
//                $datatables->whereBetween('category.created_at', ["$rang[0] 00:00:00", "$rang[1] 23:59:59"]);
//            }else if($rang[0] != "Invalid date" && $rang[1] != "Invalid date" && $rang[0] == $rang[1]) {
//                $datatables->whereBetween('category.created_at', ["$rang[0] 00:00:00", "$rang[1] 23:59:59"]);
//            }
//        }
		
        return $datatables->make(true);
    }
     
}
