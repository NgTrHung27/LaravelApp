<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index()
    {
        //Query Buiders

        //Cách dùng 1: Lấy tất cả dữ liệu bảng post id = 3
        // $post = DB::select(
        //     "SELECT * FROM posts WHERE id = :id;",
        //     [
        //         'id' => 3
        //     ]
        // );

        //Cách dùng 2       

        $post = DB::table("posts");
        // ->where('id', '=', 5)
        // ->delete(); // xóa record
        // ->where('id', '=', 5)
        // ->update([
        //     'title' => 'haha title'
        // ]); //Update trường dữ liệu // UPDATE post SET title='...',body='...' WHERE id=5
        //     ->insert([
        //         'title' => 'haha',
        //         'body' => 'A new Post Hahah'
        //     ]); // Thêm record // INFSERT INTO post(title, body) VALUES ('haha', 'A new..');
        // ->avg('id'); //Tính trung ID
        // ->sum('id'); // Sum các id
        //  ->max('id'); //ID lớn nhất - min
        //  -> count(); //Đếm bao nhiêu record //SELECT COUNT(*) FROM posts
        //  ->find(3); //Tìm theo ID - Find by id // SELECT * FROM posts WHERE id = :3;
        //  ->latest() // cuối dùng
        //  ->oldest() // cũ nhất
        //  ->whereNotNull("body") // body của bảng có dữ liệu whereNotNull // SELECT * FROM posts WHERE body is NOT NULL....;"
        //  ->orderBy('id', 'desc') // sắp xếp orderBy id theo giảm dần
        //  ->whereBetween("id", [1, 3]) //id trong khoảng 1 -> 3
        //  ->where("created_at", ">", now()->subDay()) //Lấy dựa điều kiện ngày trong bảng
        //  ->orWhere('id', ">", 2) // 1 trong các ĐKien thỏa mãn
        //  ->where("id", 1) 
        //  ->select('title') //Lấy title bảng id = 1  // SQL: "SELECT title FROM posts WHERE id = 1;"
        //->get();
        // dd($post);
        // return view('posts.index');
    }
}
