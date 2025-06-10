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
Route::get('/jobs/{job}', function (Job $job) {
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
Route::get('/jobs/{job}/edit', function (Job $job) {
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
Route::patch('/jobs/{job}', function (Job $job) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
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
Route::delete('/jobs/{job}', function (Job $job) {
    // authorize (On hold ...)

    // delete the job
    $job->delete();

    // redirect
    return redirect('jobs');
});

Route::get('/contact', function () {
    return view("contact");
});
