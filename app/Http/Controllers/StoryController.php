<?php

namespace App\Http\Controllers;

use App\Story;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class StoryController
 * @package App\Http\Controllers
 */
class StoryController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $stories = Story::all();
        return view('story.stories', compact('stories'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('story.create');
    }

    /**
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function show ($id) {
        $story = Story::find($id);
        if (!$story) {
            return redirect()->back()->with('error', 'Story not found');
        }
        $data['story'] = $story;
        return view('story.show', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'title' => 'required|max:255',
                'body' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect()->back()->withInput()->with(['error' => $validator->errors()->first()]);
            }
            Story::create([
                'title' => $request->title,
                'body' => $request->body
            ]);
            return redirect(route('story'))->with('success', 'Story is successfully saved');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to create story');
        }

    }

    /**
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function edit($id)
    {
        $story = Story::find($id);
        if (!$story) {
            return redirect()->back()->with('error', 'Story not found');
        }
        $data['story'] = $story;
        return view('story.edit', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        try {
            $rules = [
                'title' => 'required|max:255',
                'body' => 'required|min:255',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect()->back()->withInput()->with(['error' => $validator->errors()->first()]);
            }
            $story = Story::where('id', $request->id)->update([
                'title' => $request->title,
                'body' => $request->body
            ]);
            if (!$story) {
                return back()->with('error', 'Story not found');
            }
            return redirect(route('story'))->with('success', 'Story is successfully saved');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }

    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        try {
            $story = Story::where('id', $id)->delete();
            if (!$story) {
                return back()->with('error', 'Story not found');
            }
            return redirect(route('story'))->with('success', 'Story is successfully deleted');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
}
