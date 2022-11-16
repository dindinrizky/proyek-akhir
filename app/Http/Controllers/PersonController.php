<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    //Membuat attribute Name (seharusnya di model)
    private $name = "Dindin Rizky";
    private $nrp = "200914007";
    private $course;
    private $task;
    private $quiz;
    private $mid_term;
    private $final;
    private $grade;

    //Membuat Method Index
    public function index() {
        //Mengembalikan nilai attribute name
        return view('person.index');
    }

    public function sendData() {
        //Merubah Attribute name
        $nrp = $this->nrp;
        $name = $this->name;

        return view("person.send-data", compact("nrp", "name"));
    }

    public function myCourse($course, $task, $quiz, $mid_term, $final) {
        $this->course = $course;
        $this->task = $task;
        $this->quiz = $quiz;
        $this->mid_term = $mid_term;
        $this->final = $final;
        $grade = $this->calculateGrade();

        return view("person.my-course", compact('course', 'task', 'quiz', 'mid_term', 'final', 'grade'));
    }

    private function calculateGrade(){
        $grade = (($this->task * 0.1) + ($this->task * 0.1) + ($this->mid_term * 0.3) + ($this->final * 0.5));
        return $grade;
    }

    public function create(){
        return view('person.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email'
        ]);
        $person = $request;
        return view('person.print', compact('person'));
    }

}
