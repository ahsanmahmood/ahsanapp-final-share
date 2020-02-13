<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\UserDetails;
use App\Models\GoogleMap;

class UserLatLngController extends Controller
{

    public function getLatLngDistance(Request $request)
    {
        // dd($request->toArray());
        $map = GoogleMap::where('id', 1)->first();
        // $latFrom = $map->lat;
        // $longFrom = $map->long;
        // $latFrom = '31.5257410178921';
        // $longFrom = '74.39041443939209';

        // $latTo = '31.5257410178921';
        // $longTo = '74.39041443939209';

        //formula
        // $theta = $latFrom - $latTo;
        // $dist = sin(deg2rad($latFrom)) * sin(deg2rad($latTo)) * cos(deg2rad($latFrom)) * cos(deg2rad($latTo)) * cos(deg2rad($theta));
        // $dist = acos($dist);
        // $dist = rad2deg($dist);
        // $miles = $dist * 60 * 1.1515;
        // $distance = ($miles * 1.609344). ' Km';
        // preg_match_all('!\d+!', $distance, $matches);
        // $result = $map->distance > $matches[0][0];
        // dd($distance, $matches, $matches[0], $matches[0][0], $result);
        if (!($request->lat) && !($request->long)) {
            return response()->json(['data' => 'User Lat,Long Required'], 200);
        }
        else {
            $lat1 = $map->lat;
            $lon1 = $map->long;
            $lat2 = $request->lat;
            $lon2 = $request->long;
            $unit = 'K';
            $result = 0;
            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                return response()->json(['data' => ($map->distance > $result)], 200);
            }
            else {
                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);
                if ($unit == "K") {
                  $result = ($miles * 1.609344);
                } else if ($unit == "N") {
                  $result = ($miles * 0.8684);
                } else {
                  $result = $miles;
                }
            }
            return response()->json(['data' => ($map->distance > $result)], 200);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
