<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    /**
     * 세션 정보를 사용하기 위해 web 미들웨어 그룹 지정.
     *
     * @return void
     */
    public function __construct() //1
    {
        $this->middleware('web');
    }

    /**
     * 사이트 웰컴 화면
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  //2
    {
        $userCount = User::count(); // 1
        $projectCount= Project::count();    //2
        $taskCount= Task::count();  //3

        $total = [ 'user' => $userCount,
            'project' => $projectCount,
            'task' => $taskCount,
        ];
        return view('welcome')->with('total', $total);
    }
}
