<?php

namespace App\Http\Controllers;

use App\flowermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FlowerController extends Controller
{
    public function index(){
        $flowers = flowermodel::all();
        return view('index');
    }

    public function show($id){
        $flowerKey = 'flower' . $id;
        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.

        if(!Session::has($flowerKey)){
            flowermodel::where('id', $id)->increment('view_count');
            Session::put($flowerKey, 1);
        }

        // Sử dụng Eloquent để lấy ra sản phẩm theo id
        $flower = flowermodel::find($id);

        // Trả về view
        return view('show', compact(['flower']));
    }
}
