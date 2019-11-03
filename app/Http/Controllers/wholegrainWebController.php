<?php namespace App\Http\Controllers;
 
use App\Http\Requests;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use DB;

class WholegrainWebController extends Controller
{
 
    public function index()
    {
        $data['siteName'] = 'Wholegrain web';
        $data['metaDescription'] = 'Wholegrain web description.....';
        $data['metaKeywords'] = 'Wholegrain, rise, beans, ....';
        $data['metaAuthor'] = 'George Yiannakas';
        $data['currentYear'] = date("Y");
        $data['footerText'] = '©' .$data['currentYear']. ' Copyright. All rights reserved | Developed by ' .$data['metaAuthor'];
        $data['aboutData'] = $this->getContentBySection('about');
 
        return view('index')->with($data);
    }

    public function getContentBySection($section) {
        $html = DB::select('SELECT * FROM contents WHERE active IS True AND section = "'. $section .'" LIMIT 1');
        //TODO Add safeguards here
     
        if($html && $html[0]){
            $content = [ "text" => $html[0]->content, "imageUrl" => $html[0]->image ];
            return $content;
        } 

        return '[[[[[No db records]]]]]';
        
     }
  
}