<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionResourceCollection;
use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class QuestionController extends BackEndController
{
    public function __construct(Question $model)
    {
        parent::__construct($model);
    }

    /**
     * @overwrite to
     * construct the json response for index method
     */
    protected function responsePartialContent($rows){
        $error_message = (sizeof($rows) == 0) ? 'Empty List' : 'partial content';
        return (new QuestionResourceCollection($rows))
            ->additional(['success' => true, 'code' => 206, 'message' => $error_message])
            ->response()->setStatusCode(206);
    }

    /**
     * Display a listing of the resource.
     * @return QuestionResourceCollection|\Illuminate\Http\Response
     */
//    public function index():QuestionResourceCollection
//    {
//        return new QuestionResourceCollection(Question::paginate());
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return QuestionResource|\Illuminate\Http\Response
     */
//    public function store(Request $request):QuestionResource
//    {
//        $request->validate([
//            'body' => 'required',
//        ]);
//
//        $question = Question::create($request->all());
//        return new QuestionResource($question);
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question $question
.idea/workspace.xml
.idea/php.xml
.idea/HR-Bot-Backend.iml
     * @return QuestionResource|\Illuminate\Http\Response
     */
//    public function show(Question $question):QuestionResource
//    {
//        return new QuestionResource(Question::firstWhere('id', $question->id));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Question $question
     * @return QuestionResource|\Illuminate\Http\Response
     */
//    public function update(Request $request, Question $question):QuestionResource
//    {
//        $question->update($request->all());
//
//        return new QuestionResource($question);
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Question $question)
//    {
//        $question->delete();
//
//        return response()->json();
//    }
}
