<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\WorkerStoreRequest;
use App\Http\Requests\Worker\WorkerUpdateRequest;
use App\Models\Company;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('worker.list',['workers'=>Worker::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('worker.create',['worker' => new Worker()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerStoreRequest $request)
    {
        $new_worker = new Worker();
        $new_worker->fill($request->all());

        $new_worker->save();

        return redirect(route('worker.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Worker $worker)
    {
        return view('worker.show',['worker' => $worker ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Worker $worker)
    {
        return view('worker.create',['worker' => $worker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(WorkerUpdateRequest $request, Worker $worker)
    {
        $worker->fill($request->all());

        $worker->save();

        return redirect(route('worker.show',$worker));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Worker $worker)
    {

        $worker->delete();
        if ($worker->company){
            return redirect(route('companies.show',$worker->company));
        }else{
            return redirect(route('worker.index'));
        }

    }
}
