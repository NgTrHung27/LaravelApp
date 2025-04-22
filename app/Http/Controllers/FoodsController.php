<?php

namespace App\Http\Controllers;

use App\Models\Food;

use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        //Fillter
        //$foods = Food::where('name', '=', 'sushi')->get();
        // dd($food);
        return view('foods.index', [
            'foods' => $foods,
        ]);
    }

    public function create()
    {
        //insert new food
        return view('foods.create');
    }

    public function store(Request $request)
    {
        // Logic để lưu thực phẩm mới
        return redirect()->route('foods.index');
    }

    public function show($id)
    {
        // Logic để hiển thị thực phẩm có ID cụ thể
        return view('foods.show', compact('id'));
    }

    public function edit($id)
    {
        // Logic để hiển thị form chỉnh sửa
        return view('foods.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic để cập nhật thực phẩm
        return redirect()->route('foods.index');
    }

    public function destroy($id)
    {
        // Logic để xóa thực phẩm
        return redirect()->route('foods.index');
    }
}
