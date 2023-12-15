<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $data['todos'] = Todo::all();
        return view('welcome', $data);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required'
            ]
        );

        $data = [
            'title'         => $request->title,
            'description'   => $request->description,
            'date'          => $request->date,
            'created_at'    => now(),
            'updated_at'    => now()
        ];

        $data = DB::table('todos')->insert($data);
        return redirect('todo/')->with('message');
    }

    public function edit($id)
    {
        $todos['todo'] = DB::table('todos')->where('id', $id)->first();
        return view('editTodo', $todos);
    }

    public function update(Request $request, $id)
    {

        $this->validate(
            $request,
            [
                'title'         => 'required',
                'isDone'        => 'required'
            ]
        );

        $data = [
            'title'         => $request->title,
            'description'   => $request->description,
            'date'          => $request->date,
            'isDone'        => $request->isDone,
            'created_at'    => now(),
            'updated_at'    => now()
        ];
        DB::table('todos')->where('id', $id)->update($data);

        return redirect('todo');
    }

    public function destroy($id)
    {
        DB::table('todos')->delete($id);
        return redirect('todo/');
    }
}
