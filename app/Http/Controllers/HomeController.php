<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function services()
    {
        return view('services');
    }

    public function about()
    {
        return view('about');
    }

    public function contactUs()
    {
        return view('contact_us');
    }

    public function query(){
        $categories = DB::table('categories')->get();

        

        $facebook = DB::table('products')->select('id','name')
        ->where('name','!=','Facebook')->get();

        // select id,name from products where name!='facebook';

        DB::table('products')->insert([
            'name'=>'Github',
            'category_id'=>1,
            'expire_date'=>date('Y-m-d')
        ]);


        DB::table('products')->where('name','Github')->update([
            'name'=>'Gitlab'
        ]);

        $products = DB::table('products')->get();
        
        // resut as array
        // $products = DB::table('products')->get()->toArray();

        $firstProduct = DB::table('products')->first();


        // $results : stdClass or Array
        // stdClass $results->item
        // Array $results['item'] or $results[index] // index 0,1,2,.... length of the array

        if($firstProduct){
            DB::table('products')->where('id',$firstProduct->id)->delete();
        }
        
        dd($firstProduct);
    }
}
