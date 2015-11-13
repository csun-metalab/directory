<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'WelcomeController@index');

// all API data routes are prefixed with /api
$app->group(['prefix' => 'api', 'namespace' => 'App\Http\Controllers'], function($app) {

	// academic department information
	// Example: /api/departments/189/people
	$app->get('departments/{dept_id}/people', 'DepartmentController@showPeople');

	// committee information
	// Example: /api/committees/atc/people
	$app->get('committees/{committee_id}/people', 'CommitteeController@showPeople');

});


//begin new REST-ful API


	// academic department information
	// Example: /academic_departments/
$app->group(['prefix' => 'academic_departments', 'namespace' => 'App\Http\Controllers'], function($app){
	$app->get('/', 'AcademicDepartmentController@showAcademicDepartments');
	$app->get('/{dept_id}', 'AcademicDepartmentController@showAcademicDepartment');
	$app->get('/{dept_id}/members', 'AcademicDepartmentController@showPeople');
//access contact info by email addresses
	$app->get('/{dept_id}/members/{email}','AcademicDepartmentController@showDeptSpecificPerson');
	$app->get('/members/{email}','AcademicDepartmentController@showPerson');
	$app->get('/mid/{member_id}', 'AcademicDepartmentController@showPersonByMID');
});

$app->get('/members/{email}','AcademicDepartmentController@showPerson');

$app->group(['prefix' => 'administrative_departments', 'namespace' => 'App\Http\Controllers'], function($app){
	//note: there is currently no generic information for a single department, so when
	//a single department is specified, the API simply shows ALL members in the department
	$app->get('/','AdministrativeDepartmentController@showAdministrativeDepartments');
	$app->get('/{dept_id}','AdministrativeDepartmentController@showPeople');
	$app->get('/{dept_id}/members/{email}','AdministrativeDepartmentController@showDeptSpecificPerson');
	$app->get('/mid/{member_id}', 'AdministrativeDepartmentController@showPersonByMID');
});

$app->group(['prefix' => 'committees', 'namespace' => 'App\Http\Controllers'], function($app){
	// committee information
	// Example: /committees/atc/people
	$app->get('/', 'CommitteeController@showCommittees');
	$app->get('/{committee_id}', 'CommitteeController@showCommitteeMembers');
	$app->get('/mid/{member_id}','CommitteeController@showCommitteesByPerson');

});

$app->group(['prefix' => 'colleges', 'namespace' => 'App\Http\Controllers'], function($app){
	$app->get('/','AcademicGroupController@showColleges');
	$app->get('/{college_id}','AcademicGroupController@showDepartments');
	$app->get('/{college_id}/{$dept_id','AcademicGroupController@showDepartments');
});




