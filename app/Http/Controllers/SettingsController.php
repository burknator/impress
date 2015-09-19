<?php

namespace Impress\Http\Controllers;

use Illuminate\Http\Request;

use Impress\Http\Requests;
use Impress\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $timezoneIdentifiers = \DateTimeZone::listIdentifiers();
        $utcTime = new \DateTime('now', new \DateTimeZone('UTC'));

        $tempTimezones = array();
        foreach ($timezoneIdentifiers as $timezoneIdentifier) {
            $currentTimezone = new \DateTimeZone($timezoneIdentifier);

            $tempTimezones[] = array(
                'offset' => (int)$currentTimezone->getOffset($utcTime),
                'identifier' => $timezoneIdentifier
            );
        }

        // Sort the array by offset,identifier ascending
        usort($tempTimezones, function($a, $b) {
            return ($a['offset'] == $b['offset'])
                ? strcmp($a['identifier'], $b['identifier'])
                : $a['offset'] - $b['offset'];
        });

        $timezoneList = array();
        foreach ($tempTimezones as $tz) {
            $sign = ($tz['offset'] > 0) ? '+' : '-';
            $offset = gmdate('H:i', abs($tz['offset']));

            $group = $city = $tz['identifier'];
            if (strpos($tz['identifier'], '/') !== false) {
                list($group, $city) = explode('/', $tz['identifier']);
            }

            $city = str_replace('_', ' ', $city);

            if ( ! isset($timezoneList[$sign . $offset])) {
                $timezoneList[$sign . $offset] = [];
            }

            $timezoneList[$sign . $offset][$tz['identifier']] = $city;
        }

        return view('settings.index', compact('timezoneList'));
    }

    /**
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'timezone' => 'required|timezone'
        ]);

        config([
            'app.timezone' => $request->get('timezone')
        ]);

        // TODO Save into config.json
    }

}
