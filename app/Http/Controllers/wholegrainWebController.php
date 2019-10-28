<?php namespace App\Http\Controllers;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
 
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
        
 
        return view('index')->with($data);
    }
  
}