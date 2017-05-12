<?php

namespace App\Http\Controllers; // กำหนดที่อยู่ของ Controller

use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class testController extends Controller {

    public function getShow() {
        $show = false;
        $text = 'Search Album';
        $shows = false;
        return view('webpage', array('show' => $show, 'text' => $text,'shows' => $shows));
    }

    public function getEnter() {
        $name = Input::get('name');
        $qry = DB::table('album')->where('name_album', $name)->get();
        $qry = DB::table('album')
                ->leftJoin('artist', 'album.ssn', '=', 'artist.id_art')
                ->where('album.name_album', '=', $name)
                ->select('artist.*','album.*')
                ->get();

        $num = count($qry);
        $text = 'Success';
        $show = true;
        $shows = false;
        
        if ($num == 0) {
            $show = FALSE;
            $text = 'Not Find Album Name';
        }

        return view('webpage', array("qry" => $qry, "show" => $show, "num" => $num, "text" => $text, "name" => $name, "shows" => $shows));
    }
    
    public function getShows() {        
        $name = Input::get('name');
        $q = DB::table('artist')->where('name_art', $name)->first();
        $qry = DB::table('artist')
                ->leftJoin('album','artist.id_art', '=', 'album.ssn' )
                ->where('album.ssn', '=', $q->id_art)
                ->select('artist.*','album.*')
                ->get();

        $num = count($qry);
        $text = 'Success';
        $shows = true;
        $show = false;
        if ($num == 0) {
            $shows = FALSE;
            $text = 'Not Find Album From '.$name;
        }

        return view('webpage', array("qry" => $qry, "show" => $show, "num" => $num, "text" => $text, "name" => $name, "shows" => $shows ));
    }

    public function getInsert() {
        return view('insert');
    }
    public function getDelete1() {
        $id = Input::get('id');
        $name = Input::get('name');
        DB::table('album')->where('id_album', '=', $id)->delete();
        return self::getShow($name);   
    }
    public function getDelete2() {
        $id = Input::get('id');
        $name = Input::get('name');
        DB::table('album')->where('id_album', '=', $id)->delete();
        return self::getShows($name);   
    }

    public function getUpdate() {
        $id = Input::get('id');
        $name = Input::get('name_album');
        $cost = Input::get('cost');
        $price = Input::get('price');
        $count = Input::get('count');
        echo 's';
        if($name!==null){
            DB::table('album')
            ->where('id_album', $id)
            ->update(['name_album' => $name]);
        }
        if ($cost!==null) {
         DB::table('album')
            ->where('id_album', $id)
            ->update(['cost' => $cost]);
        }
        if ($price!==null) {
         DB::table('album')
            ->where('id_album', $id)
            ->update(['price' => $price]);
        }
        if ($count!==null) {
         DB::table('album')
            ->where('id_album', $id)
            ->update(['count' => $count]);
        }
       
        return self::getSelect();
    }
    public function getEdit() {
        $id = Input::get('album');
        $qry = "test";
        $album = DB::table('album')->where('id_album', $id)->first();
        $check = false;
        return view('edit',array("qry" => $qry,"check"=>$check,"album"=>$album));
    }
    
    public function getSelect() {
        /* select  form database table fund */
        $check = true;
        $qry = "Select";
        $album = DB::table('album')->pluck('name_album', 'id_album')->toArray();
        return view('edit', compact('album', $album),array("qry" => $qry,"check"=>$check));
    }

    public function getSelectArt() {
        
        $art = DB::table('artist')->pluck('name_art', 'id_art')->toArray();
        return view('insert', compact('art', $art));
    }

    

    public function getSave() {
        $qry = array();
        $art = Input::get('name_art');
        
        $name = Input::get('name_album');
        $cost = Input::get('cost');
        $price = Input::get('price');
        $count = Input::get('count');
        $qry = DB::table('artist')->where('name_art', $art)->first();
        $num = count($qry);        
        if($num==0){
            self::getAddArt($num,$art);
            return self::getAddAlbum($name,$cost,$price,$count,$art);
        }
        else{
            return self::getAddAlbum($name,$cost,$price,$count,$art);
        }
                     
    }
    public function qryData($art) {
        echo 'a';
        $qry = DB::table('artist')->where('id_art', $art)->first();
        return $qry;
    }

    public function getAddArt($num,$art) {       

            DB::table('artist')->insert(
                    ['name_art' => $art]
            );
            $num++;
        
        
    }
    public function getAddAlbum($name,$cost,$price,$count,$art) {
        $qry = DB::table('artist')->where('name_art', $art)->first();
        DB::table('album')->insert(
                ['name_album' => $name, 'cost' => $cost, 'price' => $price, 'count' => $count, 'ssn' => $qry->id_art]
        );
        return self::getSelectArt();
    }

}
