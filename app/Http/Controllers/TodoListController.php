<?php

namespace App\Http\Controllers;

use App\Services\TodoListService;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\DeleteSelectRequest;

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
     * @param \App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $input = $request->only(['content']);
        $this->service->createTodo($input);
        return redirect()
            ->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->service->deleteTodo($id);
        return redirect()
            ->route('index');
    }

    /**
     * 批次刪除選中
     *
     * @param \App\Http\Requests\DeleteSelectRequest $request
     */
    public function deleteSelect(DeleteSelectRequest $request)
    {
        $inputIds = $request->id;
        $this->service->deleteSelected($inputIds);
        return redirect()
            ->route('index');
    }
}
