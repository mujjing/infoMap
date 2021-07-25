<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapLogic
{

    public function searchCode($searchListCode) {

        if ($searchListCode == 1) {
            $list = "Address";
        } elseif ($searchListCode == 2) {
            $list = "Location";
        }
        return $list;
    }

    public function countSearch($keyword)
    {
        $count = count($keyword);
        return $count;
    }

    public function indexData()
    {
        $result = DB::table('map')->orderBy('id', 'DESC')->get();
        return $result;
    }

    public function searchData($list, $keyword)
    {
        $result = DB::table('map')
                ->where($list, 'like', "%{$keyword}%")
                ->get();
        return $result;
    }
}