<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Carbon\Carbon;



class CategoryController extends Controller
{

   public  function __construct(){
          $this->middleware('auth');
    }

        
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category=category::all();
        return view('category.index',compact('all_category'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/category.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['category_name'=> 'required', ]);
         echo $category_name = Str::lower($request->category_name);
        
        if(Category::Where('category_name','=',$category_name)->doesntExist()){
            Category::insert([
                'category_name'=>$category_name,
                'created_at'=> Carbon::now(),
                'added_by' => Auth::user()->id,
            ]);
           
        }
        else{
            return back()->with('InsErr','Already inserted !');

        }
     return back()->with('Insdone','inserted successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_category=category::find($id);
        return view('/category.edit',compact('all_category'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatecategory=category::find($id);
        $updatecategory->category_name=$request->category_name;
        $updatecategory->save();
        return redirect('/category/index');

        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delte= category::find($id);
      $delte->delete();
      return back();

    }
    public function deletedcategory(){

        $all_trushed=Category::onlyTrashed()->get();
        return view('category.trush',compact('all_trushed'));
    }
    
    public function restore($id){
        Category::withTrashed()->find($id)->restore();
        return back()->with('Insdone','Restore successfully !');
    }
    public function delete($id){
        $data=Category::Where('id',$id);
        $data->forceDelete();
        return back()->with('Insdone','Delete successfully !');


    }
}
