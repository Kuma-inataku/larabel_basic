<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HelloRequest;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        return view('hello.index', ['msg' => 'フォームを入力：']);
    }

    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg' => '正しく入力されました。']);
    }
 
    public function add(Request $request)
    {
        return view('hello.add');
    }
 
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello');
    }
 }