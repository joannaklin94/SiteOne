<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something gre*/

/* Authentication */
Auth::routes();

Route::get('/home', 'HomeController@index');  // WTF ???


/*Part without logging*/
Route::get('/', 'HomeController@index');

Route::get('/downloads', function () {
    return view('before_auth.download'); });

Route::get('/info', function () {
    return view('before_auth.info'); });

Route::get('/topics', function () {
    return view('before_auth.topics'); });

Route::get('/topic/{id}', 'TopicsController@show');

Route::get('/topics','TopicsController@index');


/*After logging - user: admin*/
Route::group(['middleware' => 'admin', 'auth'], function () {
    Route::get('/admin', function () {
        echo 'u have access'; });

    Route::get('/admin2', function () {
        echo 'u have access another'; });

    Route::get('/home0', function () {
        return view('/admin.home'); });

});


/*After logging - user: prof*/
Route::group(['middleware' => 'prof', 'auth'], function () {

    Route::get('/home1', function () {
        return view('/prof.home'); });

    Route::get('/prof_students','ProfstudentsController@index');
    Route::get('/prof_students/workspace/{id}','ProfstudentsController@show_workspace');
    Route::get('/prof_students/student/{id}','ProfstudentsController@show_student');

    Route::get('/prof_topics','Prof_topicsController@index');
    Route::get('/prof_topics/create','Prof_topicsController@create');
    Route::get('/prof_topics/edit/{id}','Prof_topicsController@edit');
    Route::get('/prof_topics/delete/{id}','Prof_topicsController@delete');
    Route::post('/prof_topics','Prof_topicsController@store');
    Route::post('/prof_topics/{id}','Prof_topicsController@restore');
    Route::get('/prof_topics/{id}','Prof_topicsController@show');

    Route::get('/prof_ads','Prof_adsController@index');
    Route::get('/prof_ads/create','Prof_adsController@create');
    Route::get('/prof_ads/edit/{id}','Prof_adsController@edit');
    Route::get('/prof_ads/delete/{id}','Prof_adsController@delete');
    Route::post('/prof_ads','Prof_adsController@store');
    Route::post('/prof_ads/{id}','Prof_adsController@restore');
    Route::get('/prof_ads/{id}','Prof_topicsController@show');

    Route::get('/profile1','Profile1Controller@index');
    Route::get('/profile1e','Profile1Controller@edit');
    Route::post('/profile1','Profile1Controller@store');
    Route::post('/profile1a','Profile1Controller@upload_avatar');

});
/*After logging - user: student*/
Route::group(['middleware' => 'student', 'auth'], function () {

    Route::get('/home2','Home2Controller@index');

    Route::get('/workspace2', function () {
        return view('/student.workspace'); });

    Route::get('/profile2','Profile2Controller@index');
    Route::get('/profile2e','Profile2Controller@edit');
    Route::post('/profile2','Profile2Controller@store');
    Route::post('/profile2a','Profile2Controller@upload_avatar');

    Route::get('/profile2/topic','Student_topicController@edit');
    Route::post('/profile2/topic1','Student_topicController@store');
    Route::get('/student_topic/{id}','Student_topicController@show_topic');
    Route::get('/student_professor/{id}','Student_topicController@show_prof');

});






//Route::get('/admin', function () {
//    echo 'u have access'; })->middleware('admin');

//Route::get('/home2', function () {   //tylko do prob bo takto mozna wejsc z zewnatrz
//    return view('/home2'); });

Route::get('/my_register', 'RegisterController@index');  //popraw w innych miejscach to delete
Route::get('studentsExercise', 'StudentsController@index');  //{id}/my_students
Route::get('studentsExercise/create', 'StudentsController@create');   //kolejnosc!!  to nie tu
Route::get('studentsExercise/{id}', 'StudentsController@show');






