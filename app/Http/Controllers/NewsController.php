<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class NewsController extends Controller
{
    //
    public function addNews(Request $req){ 
          $newNewsName = time(). '-'. $req->newsTitle . '.'. $req->newsPhoto->extension();
          $req->newsPhoto->move(public_path('images/news/'), $newNewsName );
          $news = new news;
          $news->newsTitle = $req->newsTitle;
          $news->newsPhoto = $newNewsName;
          $news->newsDate  = $req->newsDate;
          $news->newsDescription = $req->newsDescription;
          $news->save();
          return redirect('view-news')->with('success', 'News added successfully');
    }
    function showNews(){
        $news = news::latest()->paginate(6);
        return view('news.view-news', compact('news'));
    }
    function newsEdit($id){
        $news = news::where('newsID', '=', $id)->get();
        return view('news.edit-news', ['news'=>$news]);
    }
     function newsDelete($id){
        $news = news::where('newsID', '=', $id)->first();
        $news->delete();
        return redirect('view-news')->with('success', 'News deleted successfully');
    }
    function newsUpdate(Request $req){
        $newNewsName = time(). '-'. $req->newsTitle . '.'. $req->newsPhoto->extension();
        $req->newsPhoto->move(public_path('images/news/'), $newNewsName );

          $news = news::find($req->newsID);
          $news->newsTitle=$req->newsTitle;
          $news->newsPhoto= $newNewsName;
          $news->newsDate=$req->newsDate;
          $news->newsDescription=$req->newsDescription;
          $news->save();
          return redirect('/view-news')->with('success', 'News updated successfully');
    }
    function viewNews($id){
        $data = news::where('newsID', '=', $id)->get();
        return view('news.showNews', ['data'=>$data]);
    }
    
}
