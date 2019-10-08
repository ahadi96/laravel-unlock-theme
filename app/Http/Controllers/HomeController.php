<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Client;
use App\ClientDetail;
use App\Product;
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

    public function category(){
        $firstCategory = Category::first();
    
        $products = Product::where('category_id',$firstCategory->id)->get();

        $addProduct = Product::create([
            'name'=>'Pipsi',
            'category_id'=>2,
            'expire_date'=>date('Y-m-d'),
            'test'=>'islam',
            
        ]);

        dd($products);
    }

    public function client($id){
        $client = Client::find($id);
        if($client){
            dd($client->clientAddresses);
        }

        return 'error';
    }

    public function clientDetails(){
        $clientDetails = ClientDetail::with('client')->where('nationality','ks')->first();
        //dd($clientDetails);
        dd($clientDetails->client->first_name);
    }

    public function clientAddresses(){
        $address = Address::where('city','gaza')->first();
        dd($address->client);
    }
}
