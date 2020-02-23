<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

/**
 * Class StoryController
 * @package App\Http\Controllers
 */
class StoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $stories =  Story::all();
        return view('stories')->with($stories);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create () {
        return view('create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        Story::create($request->all());
        return redirect('/stories')->with('success', 'Story is successfully saved');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit ($id) {
        $story = Story::find($id);
        return view('edit')->with($story);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update (Request $request,$id) {
        Story::whereId($id)->update($request->all());
        return redirect('/stories')->with('success', 'Story is successfully saved');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        $story = Story::findOrfail($id);
        $story->delete();
        return redirect('/stories')->with('success', 'Story is successfully deleted');
    }

}
