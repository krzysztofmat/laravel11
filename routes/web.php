<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// index
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer')->latest()->paginate(3)
    ]);
});

// create
Route::get('/jobs/create', function() {
    return view('jobs.create');
});

// show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job
    ]);
});

// store
Route::post('/jobs', function(){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    // Validation ...
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', [
        'job' => $job
    ]);
});

// store
Route::post('/jobs', function(){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    // Validation ...
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// update
Route::patch('/jobs/{id}', function ($id) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    $job = Job::findOrFail($id);
    // authorize (on hold...)
    // update
    /*
    $job->title = request('title');
    $job->salary = request('salary');
    $job->save();
    */
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    // persist
    // redirect

    return redirect('/jobs/' . $job->id);
});

// destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize (On hold ...)

    // delete the job
    $job = Job::findOrFail($id)->delete();

    // redirect
    return redirect('jobs');
});

Route::get('/contact', function () {
    return view("contact");
});
