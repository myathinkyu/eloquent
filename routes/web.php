<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\City;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}/comment', function($id){
    $user = User::find($id);

    foreach($user->comments as $comment){
        echo $comment->content;
    }
});

Route::get('/post/{id}/comment', function($id){
    $post = Post::find($id);

    foreach($post->comments as $comment){
        echo $comment->content;
    }
});

Route::get('/city/{id}/post', function($id){
    $city = City::find($id);
    echo $city->name;

    foreach($city->posts as $post){
        echo $post->title;
    }
});

Route::get('/user/{id}/role', function($id){
    $user = User::find($id);
    echo $user->name;

    foreach($user->roles as $role){
    echo $role->rank;
    };
});

Route::get('/user/{id}/city', function($id){
    $user = User::where('id', $id)->FirstOrFail();

    echo $user->name . "<br><strong>"  ;
    echo $user->city->name ."</strong>";
});

Route::get('/user/{id}/post', function($id){
    $user = User::where('id',$id)->FirstOrFail();
    echo $user->name . "<br>";

    foreach($user->posts as $post){
        echo $post->title. "<br>";
    }
});

Route::get('/post/{id}/show', function($id){
    $posts = Post::find($id);
    echo $posts->title. "<br>";

    echo $posts->user->email;
});

Route::get('/read', function () {
    $posts = Post::all();
    foreach($posts as $post){
        echo $post->title . "<br>";
        echo $post->content . "<hr>";
    }
});

Route::get('post/insert', function(){
    Post::create(['user_id'=>1,'title'=>'Laravel','content'=>'Laravel is a web application framework with expressive, elegant syntax.']);
    //Post::create(['user_id'=>2,'title'=>'React','content'=>'React is a good fit for projects with multiple state changes that are intertwined and dependent on each other.']);
});

Route::get('user/insert', function(){
    // $user =  new User();

    // $user->name = 'Yolando';
    // $user->email = 'yolando@gmail.com';
    // $user->password = Hash::make("123123");

    // $user->save();

    $pass = Hash::make("123123");
    User::create(['name'=>'Annie', 'email'=>'annie@gmail.com', 'password'=>$pass]);
});


