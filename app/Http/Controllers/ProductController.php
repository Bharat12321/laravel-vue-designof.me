<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

use App\Http\Resources\UserCollection;
use App\Product;
use App\User;
use Auth;
use Intervention\Image\Facades\Image as Image;
use Iyzipay\Model\InstallmentInfo;
use Iyzipay\Model\Locale;


class ProductController extends Controller
{
    public function index() {
        return response()->json(User::all());
    }

    public function addproduct(Request $request) {
        $userid ="";
        if($request->post('username')){

            $userid = User::where('username',$request->post('username'))->first()['id'];
        }

        if($userid !=""){
            $price = $request->post('price');
            $time ="";
            if($request->get('time')){
                $time = $request->post('time');
            }
            $logo = base64_decode($request->post('logo'));
            $png_url = "product-".time().".png";
            $path = public_path().'/images/designs/' . $png_url;
            Image::make(file_get_contents($request->post('logo')))->save($path);     
            
            $product_key = str_random(64);
            $random_product_key = $product_key;

            $product = new Product([
                'user_id' => $userid,
                'image' => $png_url,
                'price' => $request->get('price'),
                'time' => $time,
                'type' => $request->get('type'),
                'key' => $random_product_key,
            ]);        

            if($product->save()) {
                return response()
                    ->json([
                        'status' => 'success',
                        'product_id' =>request()->getSchemeAndHttpHost().'/'.$request->post('username').'/'.$product->id,
                        'product_image' => request()->getSchemeAndHttpHost().'/images/designs/'.$png_url,
                        'message' => "Product added successfully",
                    ]);
            }else{
                return response()
                    ->json([
                        'status' => 'failed',
                        'message' => 'Product not successfully',
                    ]);
                
            }
        }else{
                return response()
                    ->json([
                        'status' => 'failed',
                        'message' => 'Product not successfully',
                        'userid' =>$userid 
                    ]);

        }

    }

    public function siginin(Request $request) {
        $username = $request->get('email');
        $password = md5($request->get('password'));
        $user = User::where('email', $username)->where('password', $password)->first();
        if (!$user) {
            $user = User::where('username', $username)->where('password', $password)->first();
        }
        if (!$user) {
            return response()->json([
                'status' => 'failed'
            ]);
        } else {
            $username = $user->username;
            $token = Str::random(30);
            return response()
                ->json([
                    'status' => 'success',
                    'name' => $username,
                    'token' => $token
                ])
                ->cookie('token', $token, 60);
        }
    }

    public function signup(Request $request) {
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'username' => $request->get('username'),
            'password' => md5($request->get('password'))
        ]);

        if($user->save()) {
            $token = Str::random(30);
            return response()
                ->json([
                    'status' => 'success',
                    'name' => $user->username,
                    'token' => $token
                ])
                ->cookie('token', $token, 60);
        }
        else
            return response()->json('failed');

    }

    public function getproduct(Request $request) {
        $key = $request->get('id');
        $product = Product::where('id', $key)->first();
        if ($product){
            return response()->json([
                'data'=>$product
            ]);
        }
        else {
            return response()->json('failed');
        }
    }    
}
