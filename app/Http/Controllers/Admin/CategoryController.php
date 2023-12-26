<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $imagePath = 'storage/images/' . $imageName;
        }
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        $category->image = $imagePath ?? null;
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keywords'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect(route('add.category'))->with('message', 'Category Added Successfully!');
    }
    public function edit($category_id)
    {
        $edit = Category::find($category_id);
        return view('admin.category.edit', compact('edit'));
    }
    public function update(CategoryFormRequest $request, $id)
    {
        $category = Category::find($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $destination = 'storage/images/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $imagePath = 'storage/images/' . $imageName;
        }
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        $category->image = $imagePath ?? null;
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keywords'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect(route('add.category'))->with('message', 'Category Updated Successfully!');
    }
    public function delete(Request $request)
    {
        $category = Category::find($request->category_delete_id);
        if ($category) {
            $destination = 'uploads/category' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->comments()->delete();
            // $category->cart()->delete();
            $category->delete();
            return redirect()->back();
        }
         else {
            return redirect()->back();
        }
    }
}
