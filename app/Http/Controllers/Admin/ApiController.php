<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;
//Auth facade
use Auth;

class ApiController extends Controller
{

    //API Functions only
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
            'content' => $request->content,
            'section' => $request->section,
            'image' => $request->image,
            'active' =>  $request->active,
           
        ]);

        $files = $request->file('uploads');
        if(!empty($files)) {
           foreach($files as $file) {
                $photo = $file->getClientOriginalName();
                $destination = base_path() . '/public/assets/images';
                $file->move($destination, $photo);
            }
        }

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
    public function delete($id) {
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
