<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//Auth facade
use Auth;

class ApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contentsGrouped = Content::all()->sortBy('id', SORT_REGULAR, true)->groupBy('section');
        return view('admin.dashboard.index', compact('contentsGrouped'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = $this->getSections();
        return view('admin.dashboard.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $content = new Content([
            'title' => $request->get('title'),
            'section' => $request->get('section'),
            'content' => $request->get('content'),
            'image' => $request->get('image'),
            'active' =>  $request->has('active'),
           
        ]);

        $content->save();
        return redirect('/admin/content')->with('success','Post saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sections = $this->getSections();
        $content = Content::find($id);
        return view('admin.dashboard.edit', compact('content', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $content = Content::find($id);
        $content->title = $request->get('title');
        $content->section = $request->get('section');
        $content->content = $request->get('content');
        $content->image = $request->get('image');
        $isActive = $request->has('active');
        $content->active = $isActive;

        $content->save();
        return redirect('/admin/content')->with('success','Post updated.');
    }

    public function updateStatus(Request $request)
    {
        $content = Content::find($request->get('id'));
        $content->title = $content->title;
        $content->content = $content->content;
        $content->active =  $request->get('status');

        $content->save();
        return response()->json([
            'success' => true,
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $content = Content::find($id);
        $content->delete();

        return redirect('/admin/content')->with('success', 'Post deleted.');
    }

    private function getSections() {
        return ['about', 'services', 'products','contact','map'];
    }

    //API
    public function get($id) {  

        if (Content::where('id', $id)->exists()) {
            $content = Content::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($content, 200);
          } else {
            return response()->json([
              "message" => "Post not found"
            ], 404);
          }
      }

    public function post(Request $request) {

         //
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $content = new Content([
            'title' => $request->title,
            'section' => $request->title,
            'content' => $request->title,
            'image' => $request->title,
            'active' =>  $request->title,
           
        ]);

        $content->save();
    
        return response()->json([
            "message" => "Post record created"
        ], 201);
    }
   
    public function put(Request $request, $id) {

        if (Content::where('id', $id)->exists()) {
           
            $content = Content::find($id);
            $content->title = is_null($request->title) ? $content->title : $request->title;
            $content->section = is_null($request->section) ? $content->section : $request->section;
            $content->content = is_null($request->content) ? $content->content : $request->content;
            $content->image = is_null($request->image) ? $content->image : $request->image;
            $content->active = is_null($request->active) ? $content->active : $request->active;

            $content->save();
    
            return response()->json([
                "message" => "Post updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Post not found"
            ], 404);
            
        }

    }
    public function delete(Request $id) {
        if(Content::where('id', $id)->exists()) {
            $content = Content::find($id);
            $content->delete();
    
            return response()->json([
              "message" => "Post deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Post not found"
            ], 404);
          }
    }
}
