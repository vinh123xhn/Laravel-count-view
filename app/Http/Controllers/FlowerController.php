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

    public function addCart(Request $request, $id){

            $flowers = flowermodel::find($id);

            $cart = Session::get('cart');

            $cart[$flowers->id] = [
                'id' => $flowers->id,
                'name' => $flowers->name,
                'price' => $flowers->price,
                'soluong' => 1,
            ];

            $request->session()->put('cart', $cart);

        // Trả về view
        return redirect()->route('cart');

    }

    public function delete(Request $request, $key){
        $request->session()->get('cart');

        $request->session()->forget("cart.$key");
        return redirect()->route('cart');
    }

    public function cart()
    {
        return view('cart');
    }
}
