<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cadastro;
use Excel;

class ProductController extends Controller
{

    public function list(){
        $products = Cadastro::get();
        return view('products', compact('products'));
    }

    public function productsImport(Request $request){
        if($request->hasFile('products')){
            $path = $request->file('products')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){

                foreach ($data as $key => $value) {
                    //print_r($value);
                    $product_list[] = ['codigo' => $value->codigo, 'descripcion' => $value->descripcion, 'ubicacion' => $value->ubicacion];
                }
                if(!empty($product_list)){
                    Cadastro::insert($product_list);
                    \Session::flash('success','File improted successfully.');
                }
            }
        }else{
        	\Session::flash('warnning','There is no file to import');
        }
        return Redirect::back();
    }




}
