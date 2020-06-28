<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class CategoryController extends Controller
{   
    //admin category
    public function categories(){
        $cate = Category::all();
        return view('admin.category.categories', compact('cate'));
    }

    //user category
    public function category(){
        $product = Product::all();
        return view('users.product.category', compact('product'));
    }
    
    //user search category
    public function search(Request $request){    
        $inEar = $request->input('CateInEar');
        $onEar = $request->input('CateOnEar');
        $trueWireless = $request->input(('CateTrueWire'));
        $sony = $request->input('BrandSony');
        $jbl = $request->input('BrandJBL');
        $westone = $request->input('BrandWestone');
        $beats = $request->input('BrandBeats');
        $bang = $request->input('BrandBang');
        $orderByPrice = $orderByName = 'asc';

        if($request->input('SortBy') == 2  ){
            $orderByPrice = 'desc';
        }
        if($request->input('SortBy') == 4  ){
            $orderByName = 'desc';
        }
        $fromPrice = $request->input('fromPrice');
        $toPrice = $request->input('toPrice');
    if(isset($inEar) || isset($onEar) || isset($trueWireless) || isset($sony) || isset($jbl) || isset($westone) || isset($beats) || isset($bang)){           
                $product= Product::join('brand','product.brand_id','=','brand.id')
                ->join('category','product.category_id','=','category.id')  
                ->orWhereIn('category.category_name',[$inEar,$onEar,$trueWireless])   
                ->orWhereIn('brand.brand_name',[$sony,$jbl,$westone,$beats,$bang])
                ->whereBetween('product.price' , [$fromPrice,$toPrice])  
                ->orderBy('product.price',$orderByPrice)
                ->orderBy('product.product_title', $orderByName)
                ->select('product.*', 'brand.brand_name', 'category.category_name')
                ->get();

            if($fromPrice > $toPrice){
            $message = 'Price is invalid';
            return view('users.product.category', compact('message','product'));
            } 
            if($product->count() > 0 )
            return view('users.product.category', compact('product'));

            $message = 'Not Found';
            return view('users.product.category', compact('product','message'));    
    }else{
        $product= Product::join('brand','product.brand_id','=','brand.id')
                            ->join('category','product.category_id','=','category.id')                                                         
                            ->whereBetween('product.price' , [$fromPrice,$toPrice])  
                            ->orderBy('product.price',$orderByPrice)
                            ->orderBy('product.product_title', $orderByName)
                            ->select('product.*', 'brand.brand_name', 'category.category_name') 
                            ->get();
        if($fromPrice > $toPrice){
            $message = 'Price is invalid';
            return view('users.product.category', compact('message','product'));
        } 
        if($product->count() > 0 )
            return view('users.product.category', compact('product'));

        $message = 'Not Found';
                return view('users.product.category', compact('product','message'));    
    }
    }
}
