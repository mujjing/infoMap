<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MapController extends Controller
{
    public function __construct(MapLogic $mapLogic)
    {
        $this->mapLogic = $mapLogic;
    }

    public function index()
    {
        $data = $this->mapLogic->indexData();
        return view('map/index', compact('data'));
    }

    public function list()
    {
        $data = $this->mapLogic->indexData();
        return view('map/list', compact('data'));
    }

    public function detail($id)
    {
        return view('map/detail', compact('id'));
    }

    public function mobileSearch()
    {
        $data = $this->mapLogic->indexData();
        return view('map/mobile_search', compact('data'));
    }

    public function search(Request $request)
    {
        $searchData = $request->only(['search_list', 'search']);
        $searchListCode = $searchData['search_list'];
        $keyword = $searchData['search'];
        $list = $this->mapLogic->searchCode($searchListCode);
        $data = $this->mapLogic->searchData($list, $keyword);
        $count_search = $this->mapLogic->countSearch($data, $keyword);

        return view('map/search', compact('data', 'count_search', 'searchListCode', 'keyword'));
    }

    public function mobileSearchResult(Request $request)
    {
        $searchData = $request->only(['search_list', 'search']);
        $searchListCode = $searchData['search_list'];
        $keyword = $searchData['search'];
        $list = $this->mapLogic->searchCode($searchListCode);
        $data = $this->mapLogic->searchData($list, $keyword);
        $count_search = $this->mapLogic->countSearch($data, $keyword);

        return view('map/mobile_search_result', compact('data', 'count_search', 'searchListCode', 'keyword'));
    }
}
