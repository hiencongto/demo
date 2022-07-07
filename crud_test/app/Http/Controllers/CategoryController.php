<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function viewAdd()
    {
        return view('categories.add');
    }

    public function create(Request $request)
    {
        $data = [
          'name' => $request->name,
          'description' => $request->description,
          'status' => $request->status
        ];

        if (! Category::create($data)) {
            return view('categories.add')->with('msg', 'fail');
        }

        return view('categories.add')->with('msg', 'success');
    }

    public function list()
    {
        $categories = Category::all();
//        $msg = Session::get('msg');

        return view('categories.list', [
            'categories' => $categories,
            'msg' => Session::get('msg')
        ]);
    }

    public function destroy(int $id)
    {
        $category = Category::find($id);
        if (! $category) {
            return redirect()->route('list')->with('msg', 'fail');
        }
        if (! $category->delete()) {
            return redirect()->route('list')->with('msg', 'fail');
        }

        return redirect()->route('list')->with('msg', 'success');
    }

    public function show(int $id)
    {
        $category = Category::find($id);
        if (! $category) {
            return view('categories.edit', [
                'msg' => 'fail'
            ]);
        }

        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(int $id, Request $request)
    {
//        $category = Category::find($id);
//        if (! $category) {
//            return view('categories.edit', [
//                'msg' => 'fail'
//            ]);
//        }
//        $category->name = $request->name;
//        $category->description = $request->description;
//        $category->status = $request->status;
//        if (! $category->save()) {
//            return redirect()->route('list')->with('msg', 'fail');
//        }
//
//        return redirect()->route('list')->with('msg', 'success');

        //Cach 2

        $category = Category::find($id);
        if (! $category) {
            return view('categories.edit', [
                'msg' => 'fail'
            ]);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ];
        Category::where('id', $id)->update($data);

        return redirect()->route('list')->with('msg', 'success');
    }
}
