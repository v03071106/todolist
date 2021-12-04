<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Services\TodoListService;

class TodoListController extends Controller
{
    private $service;

    public function __construct(TodoListService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = $this->service->getLists();
        return view('index', compact('lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $input = $request->only(['content']);
        $result = $this->service->createTodo($input);
        if (false === $result) {
            return redirect()
                ->back()
                ->withErrors(['帳號不存在或密碼錯誤.']);
        } else {
            return redirect()
                ->route('index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->deleteTodo($id);
        return redirect()
            ->route('index');
    }
}
