<?php

namespace App\Http\Controllers;

use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function getCategorieID($id) {
        $categories = \App\Categorie::all();
        $subcategories = \App\Subcategorie::all();
        return view('frontend/category', compact('categories', 'subcategories')) ->with('id', $id);
    }

    public function getSubcategorieID($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();
        return view('frontend/subcategory', compact('sets', 'languages', 'subcategories', 'users')) ->with('id', $id);
    }

    public function getSetID($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();

        return view('frontend/set', compact('sets', 'languages', 'subcategories', 'users')) ->with('id', $id);
    }

    public function setContent($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();
        return view('frontend/setContent', compact('sets', 'languages', 'subcategories', 'users')) ->with('id', $id);
    }

    public function setExam($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();
        return view('frontend/setExam', compact('sets', 'languages', 'subcategories', 'users')) ->with('id', $id);
    }

    public function exam1($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();

        return view('frontend/exam1', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
    }

    public function exam2($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();

        return view('frontend/exam2', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
    }

    public function study1($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();

        return view('frontend/study1', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
    }

    public function study2($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();

        return view('frontend/study2', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
    }


    public function study4($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();

        return view('frontend/study4', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
    }

    public function study5($id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();

        return view('frontend/study5', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
    }

    public function score(Request $request, $id) {
        $sets=\App\Set::find($id);
        $score = 0;
        $numberOfWords = 0;

        foreach(explode("\n", $sets->words) as $line) :
            $numberOfWords++;
        $word = explode(";", $line);
        $fieldName = $word[0];
        $fieldName=trim($fieldName);

        $fieldValue = $word[1];
        $fieldValue=trim($fieldValue);

        $userValue = $request ->$fieldName;
        $userValue=trim($userValue);
        if($userValue == $fieldValue ):
            $score++;
            endif;

        endforeach;


        return view('frontend/score') -> with('score', $score) -> with('numberOfWords', $numberOfWords);
    }

    public function score2(Request $request, $id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();
        $set=\App\Set::find($id);
        $score = 0;
        $numberOfWords = 0;

        foreach(explode("\n", $set->words) as $line) :
            $numberOfWords++;
            $word = explode(";", $line);
            $fieldName = $word[0];
            $fieldName=trim($fieldName);

            $fieldValue = $word[1];
            $fieldValue=trim($fieldValue);

            $userValue = $request ->$fieldName;
            $userValue=trim($userValue);
            if($userValue == $fieldValue ):
                $score++;
            endif;

        endforeach;

if($score == $numberOfWords)
        return view('frontend/score') -> with('score', $score) -> with('numberOfWords', $numberOfWords);
else
{
    return view('frontend/study2', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
}
    }



    public function score4(Request $request, $id) {
        $sets=\App\Set::find($id);
        $score = 0;
        $numberOfWords = 0;

        foreach(explode("\n", $sets->words) as $line) :
            $numberOfWords++;
            $word = explode(";", $line);
            $fieldName = $word[1];
            $fieldName=trim($fieldName);

            $fieldValue = $word[0];
            $fieldValue=trim($fieldValue);

            $userValue = $request ->$fieldName;
            $userValue=trim($userValue);
            if($userValue == $fieldValue ):
                $score++;
            endif;

        endforeach;


        return view('frontend/score') -> with('score', $score) -> with('numberOfWords', $numberOfWords);
    }

    public function score5(Request $request, $id) {
        $sets=\App\Set::all();
        $languages = \App\Language::all();
        $subcategories = \App\Subcategorie::all();
        $users = \App\User::all();
        $set=\App\Set::find($id);
        $score = 0;
        $numberOfWords = 0;

        foreach(explode("\n", $set->words) as $line) :
            $numberOfWords++;
            $word = explode(";", $line);
            $fieldName = $word[1];
            $fieldName=trim($fieldName);

            $fieldValue = $word[0];
            $fieldValue=trim($fieldValue);

            $userValue = $request ->$fieldName;
            $userValue=trim($userValue);
            if($userValue == $fieldValue ):
                $score++;
            endif;

        endforeach;

        if($score == $numberOfWords)
            return view('frontend/score') -> with('score', $score) -> with('numberOfWords', $numberOfWords);
        else
        {
            return view('frontend/study5', compact('sets', 'languages', 'subcategories', 'users', 'line')) ->with('id', $id);
        }
    }

    public function scoreExam1(Request $request, $id) {
        $sets=\App\Set::find($id);
        $score = 0;
        $numberOfWords = 0;

        foreach(explode("\n", $sets->words) as $line) :
            $numberOfWords++;
            $word = explode(";", $line);
            $fieldName = $word[0];
            $fieldName=trim($fieldName);

            $fieldValue = $word[1];
            $fieldValue=trim($fieldValue);

            $userValue = $request ->$fieldName;
            $userValue=trim($userValue);
            if($userValue == $fieldValue ):
                $score++;
            endif;

        endforeach;


        if($user = Auth::user()):


        $dt = new DateTime();
        $dt->format('Y-m-d H:i:s');
        $dt->add(new DateInterval('PT1H'));
        $percent = $score / $numberOfWords * 100;


        $result= new \App\Result([
            'sets_id' => $id,
            'users_id'=> auth()->user()->id,
            'date'=> $dt,
            'percent'=> $percent
        ]);

        $result->save();
        endif;


        return view('frontend/scoreExam1') -> with('score', $score) -> with('numberOfWords', $numberOfWords);
    }

    public function scoreExam2(Request $request, $id) {
        $sets=\App\Set::find($id);
        $score = 0;
        $numberOfWords = 0;

        foreach(explode("\n", $sets->words) as $line) :
            $numberOfWords++;
            $word = explode(";", $line);
            $fieldName = $word[1];
            $fieldName=trim($fieldName);

            $fieldValue = $word[0];
            $fieldValue=trim($fieldValue);

            $userValue = $request ->$fieldName;
            $userValue=trim($userValue);
            if($userValue == $fieldValue ):
                $score++;
            endif;

        endforeach;

        if($user = Auth::user()):


        $dt = new DateTime();
        $dt->format('Y-m-d H:i:s');
        $dt->add(new DateInterval('PT1H'));
        $percent = $score / $numberOfWords * 100;


        $result= new \App\Result([
            'sets_id' => $id,
            'users_id'=> auth()->user()->id,
            'date'=> $dt,
            'percent'=> $percent
        ]);

        $result->save();
        endif;




        return view('frontend/scoreExam2') -> with('score', $score) -> with('numberOfWords', $numberOfWords);
    }

    public function result($id)
    {
        $sets=\App\Set::all();
        $results=\App\Result::all();

        return view('frontend/result', compact('results','sets')) ->with('id', $id);
    }
}
