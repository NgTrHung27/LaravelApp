<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;

use Illuminate\Http\Request;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

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
        //With để truyền tham số xuống
        $categories = Category::all();
        return view('foods.create')->with('categories', $categories);
    }

    // public function store(Request $request)
    // {
    //     // Logic để lưu thực phẩm mới
    //     // return redirect()->route('foods.index');

    //     //dd('This is store funtion');

    //     // $food = new Food();
    //     // $food->name = $request->input('name');
    //     // $food->count = $request->input('count');
    //     // $food->description = $request->input('description');

    //     //Validate data
    //     $request->validate([
    //         //'name' => 'required|unique:food',
    //         'name' => new Uppercase, //Dùng của PHP
    //         'count' => 'required|integer|min:0|max:1000', //Cách validate nhiều option
    //         'category_id' => 'required',
    //     ]);
    //     //if the validation is PASS => Come here!
    //     //Otherwise it will throw an exception(ValidationException)
    //     $food = Food::create([
    //         'name' => $request->input('name'),
    //         'count' => $request->input('count'),
    //         'description' => $request->input('description') ?? '',
    //         'category_id' => $request->input('category_id'),
    //     ]);

    //     //save to Database
    //     $food->save();
    //     return redirect('/foods');
    // }
    public function store(CreateValidationRequest $request)
    {
        // dd($request->file('image')->guessExtension()); //-> jpg / png
        // dd($request->file('image')->getMimeType()); //-> image/jpg /image/png
        // dd($request->file('image')->getClientMimeType());//-> sashimi.jpg
        // dd($request->file('image')->getSize()); //-> 2375 (kb) 

        $request->validate([
            'name' => new Uppercase, //Dùng của PHP
            'count' => 'required|integer|min:0|max:1000', //Cách validate nhiều option
            'description' => 'required',
            'category_id' => 'required',
            'image' =>  'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $generatedImageName = 'image' . time() . '-'
            . $request->name
            . '.'
            . $request->image->extension(); //image1652661671-ewew.jpg (image->timestamp-> - 'nameFood' -> 'jgp')
        $request->image->move(public_path('images'), $generatedImageName);
        //Validate data
        //$request->validated();

        //if the validation is PASS => Come here!
        //Otherwise it will throw an exception(ValidationException)
        $food = Food::create([
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'description' => $request->input('description') ?? '',
            'category_id' => $request->input('category_id'),
            'image_path' => $generatedImageName,
        ]);

        //save to Database
        $food->save();
        return redirect('/foods');
    }

    public function show($id)
    {
        // Logic để hiển thị thực phẩm có ID cụ thể
        $food = Food::find($id);
        //$category = $food->category();
        $category = Category::find($food->category_id);
        //dd($category);
        $food->category = $category;
        //dd($food);
        //dd($food);
        return view('foods.show', compact('id'))->with('food', $food);
    }

    public function edit($id)
    {
        // Logic để hiển thị form chỉnh sửa
        $food = Food::find($id)->first();
        //dd($food);
        return view('foods.edit', compact('id'))->with('food', $food);
    }

    public function update(CreateValidationRequest $request, $id)
    {
        //Validate data
        $request->validated();
        // Logic để cập nhật thực phẩm
        $food = Food::where('id', $id)->update(['name' => $request->input('name'), 'count' => $request->input('count'), 'description' => $request->input('description')]);
        return redirect('/foods');
    }

    public function destroy($id)
    {
        // Logic để xóa thực phẩm
        $food = Food::find($id);
        $food->delete();

        return redirect()->route('foods.index');
    }
}
