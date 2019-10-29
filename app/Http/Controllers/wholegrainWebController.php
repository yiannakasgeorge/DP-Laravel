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
        $data['aboutText'] = $this->getContent('about');
 
        return view('index')->with($data);
    }

    public function getContent($section) {
        $html = DB::select('SELECT content FROM contents WHERE active IS True LIMIT 1');
        //TODO Add safeguards here
        if($html && $html[0]){
            return $html[0]->content;
        } 

        return '[[[[[No db records]]]]]';
        
     }
  
}