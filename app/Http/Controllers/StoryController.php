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
        return redirect('/stories')->with('success', 'Show is successfully saved');
    }


}
