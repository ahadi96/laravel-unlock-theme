<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Client;
use App\ClientDetail;
use App\Country;
use App\Course;
use App\Image;
use App\Page;
use App\Post;
use App\Product;
use App\StudentClass;
use App\Teacher;
use App\Trainer;
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

    public function query()
    {
        $categories = DB::table('categories')->get();



        $facebook = DB::table('products')->select('id', 'name')
            ->where('name', '!=', 'Facebook')->get();

        // select id,name from products where name!='facebook';

        DB::table('products')->insert([
            'name' => 'Github',
            'category_id' => 1,
            'expire_date' => date('Y-m-d')
        ]);


        DB::table('products')->where('name', 'Github')->update([
            'name' => 'Gitlab'
        ]);

        $products = DB::table('products')->get();

        // resut as array
        // $products = DB::table('products')->get()->toArray();

        $firstProduct = DB::table('products')->first();


        // $results : stdClass or Array
        // stdClass $results->item
        // Array $results['item'] or $results[index] // index 0,1,2,.... length of the array

        if ($firstProduct) {
            DB::table('products')->where('id', $firstProduct->id)->delete();
        }

        dd($firstProduct);
    }

    public function category()
    {
        $firstCategory = Category::first();

        $products = Product::where('category_id', $firstCategory->id)->get();

        $addProduct = Product::create([
            'name' => 'Pipsi',
            'category_id' => 2,
            'expire_date' => date('Y-m-d'),
            'test' => 'islam',

        ]);

        dd($products);
    }

    public function client($id)
    {
        $client = Client::find($id);
        if ($client) {
            dd($client->clientAddresses);
        }

        return 'error';
    }

    public function clientDetails()
    {
        $clientDetails = ClientDetail::with('client')->where('nationality', 'ks')->first();
        //dd($clientDetails);
        dd($clientDetails->client->first_name);
    }

    public function clientAddresses()
    {
        $address = Address::where('city', 'gaza')->first();
        dd($address->client);
    }

    public function addClient()
    {

        // create a new client
        $client = Client::create([
            'first_name' => 'Ismail',
            'last_name' => 'Hassan',
            'mobile_number' => '0566666',
        ]);

        // to get the client id: $client->id

        // // save client details object
        // $details = new ClientDetail([
        //     'nationality'=>'de',
        //     'identity_number'=>'444444',
        //     'dob'=>date('Y-m-d')
        // ]);

        // // insert client details object to related client 
        // $client->details()->save($details);

        // create client details object
        $client->details()->create([
            'nationality' => 'de',
            'identity_number' => '444444',
            'dob' => date('Y-m-d')
        ]);

        dd($client);
    }

    // many-many relations
    public function teachers()
    {
        // return all teachers
        $teachers = Teacher::all();

        // return all classes
        $classes = StudentClass::all();

        // return the first teacher

        $firstTeacher = Teacher::where('id', 2)->with('classes')->first();
        foreach ($firstTeacher->classes as $class) {
            echo $class->class_name;
            echo '<br>';
        }
    }

    // many-many relations
    public function trainers($id)
    {
        // return all trainers
        $trainers = Trainer::all();

        // return all courses
        $courses = Course::all();

        // return the selected trainer
        $trainer = Trainer::find($id);
        if ($trainer) {
            foreach ($trainer->courses as $course) {
                echo $trainer->name . ' - ' . $course->name;
                echo '<br>';
            }
        } else {
            return 'no trainer selected';
        }
    }

    public function createTrainerCourse()
    {
        // create new trainer 
        $trainer = new Trainer;
        $trainer->name = 'Saeed ' . rand();
        $trainer->save();

        // create new course

        $course = new Course;
        $course->name = 'Laravel ' . rand();
        $course->save();

        // return last three courses
        $lastThreeCourses = $course::orderBy('created_at', 'desc')->take(3)->get();

        // attach/add courses to trainer
        $trainer->courses()->attach($lastThreeCourses);

        // un-assign course from trainer
        $trainer->courses()->detach($course->id);

        // using sync 

        /*
        trainer = 1
        trianer courses = [1,2,3]

        course_trainer 
        1 - 1
        1 - 2
        1 - 3

        trainer->courses()->sync([1,4,3]);
        no change
        1 - 1
        1 - 3

        add 
        1 - 4

        remove 
        1 - 2
        */



        $trainer->courses()->sync([1, 3, 5]);
        dd($lastThreeCourses);

        // select last three courses 

        // assign/attach last 3 courses to the new teacher
    }

    public function createPost()
    {
        // create a new post
        $post = Post::create(['title' => rand() . ' post ']);

        // create a new image
        $image = new Image(
            [
                'image' => 'test/path/to/image_' . $post->id
            ]
        );

        // assign the new image to the new post 
        $post->image()->save($image);

        // the first image drived form the relation name 
        // the second image drived from the coulmn name from polymorph table 
        dd($post->image->image);
        //dd(Post::where('id',$post->id)->with('image')->get());
        //dd($post);
    }

    public function createPage()
    {
        // create a new post
        $page = Page::create(['title' => rand() . ' Page ']);

        // create a new image
        $image = new Image(
            [
                'image' => 'test/path/to/page_image_' . $page->id
            ]
        );

        // assign the new image to the new post 
        $page->image()->save($image);

        // the first image drived form the relation name 
        // the second image drived from the coulmn name from polymorph table 
        dd($page->image->image);
        //dd(Post::where('id',$post->id)->with('image')->get());
        //dd($post);
    }

    public function postsByCountry()
    {
        // return the country posts
        $firstCountry = Country::first();

        dd($firstCountry->posts);
    }
}
