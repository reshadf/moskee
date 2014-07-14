<?php
/**
 * Created by PhpStorm.
 * User: reshadfarid
 * Date: 11-01-14
 * Time: 16:40
 */

class FrontController extends BaseController {

    public function getIndex() {

        $json_string = json_decode(file_get_contents('http://praytime.info/getprayertimes.php?lat=52.366699&lon=4.650000&gmt=60&m=2&y=2014&school=0', true));

        $officialDate = Carbon::now('Europe/Amsterdam');

        return View::make('index')
            ->with('timetable', $json_string)
            ->with('datum', $officialDate);

    }

} 