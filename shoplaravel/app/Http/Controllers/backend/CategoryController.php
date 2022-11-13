<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_category = Category::where('status','!=',0)->orderby('created_at','desc')->search()->paginate(5);
        return view('backend.category.index',compact('list_category'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function trash()
    {
        $list_category = Category::where('status','=',0)->orderby('created_at','desc')->get();
         return view('backend.category.trash',compact('list_category'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_category = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        $html_parent_id = '';
        $html_sort_orders = '';
        foreach($list_category as $item){
            $html_parent_id .= '<option value="' .$item->id . '">' .$item->name . '</option>';
            $html_sort_orders .= '<option value="' .$item->sort_orders . '"> Sau: '.$item->name . '</option>';
        }
        return view('backend.category.create',compact('html_parent_id','html_sort_orders'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = new Category;
        $category->name=$request->name;
        $category->slug= Str::slug($category->name = $request->name, '-');
        $category->metakey=$request->metakey;
        $category->metades=$request->metades;
        $category->parent_id=$request->parent_id;
        $category->sort_orders=$request->sort_orders;
        $category->status=$request->status;
        $category->created_at=date('Y-m-d H:i:s');
        if($request->has('logo_img'))
        {
            $past_dir = "img/category/";
            $file = $request->file('logo_img');
            $extension = $file->getClientOriginalExtension();
            $filename = $category->slug . '.' . $extension;
            $file -> move($past_dir, $filename);
            $category -> logo_img = $filename;
        }
        if($category->save()){
            return redirect()->route('category.index')->with('message',['type'=>'success','msg'=>'Thêm danh mục sản phẩm thành công']);
        }else{
            return redirect()->route('category.index')->with('message',['type'=>'danger','msg'=>'Không thể thêm danh mục sản phẩm thành công']);
        }
        // if($category->save()){
        //     // $link = new Link();
        //     // $link -> slug = $category->slug;
        //     // $link -> table_id = $category->id;
        //     // // $link -> type = 'category';
        //     // $link -> save();
        //     return redirect()->route('category.index');
        // }else{
        //     return redirect()->route('category.index')->with('massege',['type' => 'success', 'msg' => 'Thêm không thành công']);
        // }

    }

    public function show($id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()-> route('category.index');
        }
        else{
                return view('backend.category.show',compact('category'));
        }
        
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $list_category = Category::where('status','!=',0)->orderby('created_at','desc')->get();
        $html_parent_id = '';
        $html_sort_orders = '';
        foreach($list_category as $item){
            $html_parent_id .= '<option value="' .$item->id . '">' .$item->name . '</option>';
            $html_sort_orders .= '<option value="' .$item->sort_orders . '"> Sau: '.$item->name . '</option>';
        }
        return view('backend.category.edit',compact('category','html_parent_id','html_sort_orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        //
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug= Str::slug($category->name = $request->name, '-');
        $category->metakey=$request->metakey;
        $category->metades=$request->metades;
        $category->parent_id=$request->parent_id;
        $category->sort_orders=$request->sort_orders;
        $category->status=$request->status;
        $category->updated_at=date('Y-m-d H:i:s');
        if($request->has('logo_img'))
        {
            $past_dir = "img/category/";
            if( File::exists( public_path ($past_dir . $category->logo_img)));{
                File::delete( public_path ($past_dir . $category->logo_img));
            }
            File::delete( $past_dir . $category->logo_img);
            $file = $request->file('logo_img');
            $extension = $file->getClientOriginalExtension();
            $filename = $category->slug . '.' . $extension;
            $file -> move($past_dir, $filename);
            $category -> logo_img = $filename;
        }
        $category->save();
        return redirect()->route('category.index')->with('message',['type'=>'success','msg'=>'Sửa danh mục sản phẩm thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('category.index')->with('message',['type'=>'danger','msg'=>'Không thể thay đổi trạng thái']);
        }
        else
        {
            $category->status = ($category->status == 1) ? 2 : 1;
            $category -> updated_at = date('Y-m-d H:i:s');
            // $category ->update_by = 1;
            $category ->save();
            return redirect()->route('category.index')->with('message',['type'=>'success','msg'=>'Thay đổi trạng thái thành công']);
     }       
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('category.index')->with('message',['type'=>'danger','msg'=>'Không thể thay đổi trạng thái']);
        }
        else
        {
            $category->status = 0;
            $category -> updated_at = date('Y-m-d H:i:s');
            // $category ->update_by = 1;
            $category ->save();
            return redirect()->route('category.index')->with('message',['type'=>'success','msg'=>'Đã chuyển vào thùng rác']);
        }       
    }
    public function restore($id)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect()->route('category.trash')->with('message',['type'=>'danger','msg'=>'Không thể thay đổi trạng thái']);
        }
        else
        {
            $category->status = 2;
            $category -> updated_at = date('Y-m-d H:i:s');
            // $category ->update_by = 1;
            $category ->save();
            return redirect()->route('category.trash')->with('message',['type'=>'success','msg'=>'Khôi phục thành công']);
        }       
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $past_dir = "img/category/";
        $path_image_delete = public_path ($past_dir . $category->logo_img);
        if($category == null){
            return redirect()->route('category.trash')->with('message',['type'=>'danger','msg'=>'Không thể thay đổi trạng thái']);
        }
        if($category ->delete()){
            $past_dir = "img/category/";
            if( File::exists( $path_image_delete))
            {
                File::delete( $path_image_delete);
            }
            // File::delete( $past_dir . $category->logo_img);
            // $file = $request->file('logo_img');
            // $extension = $file->getClientOriginalExtension();
            // $filename = $category->slug . '.' . $extension;
            // $file -> move($past_dir, $filename);
            // $category -> logo_img = $filename;
            return redirect()->route('category.trash')->with('message',['type'=>'success','msg'=>'Xóa thành công']); 
        }       
    }

}
