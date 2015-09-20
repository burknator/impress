<?php

namespace Impress\Http\Controllers;

use Impress\Http\Requests;
use Impress\Http\Controllers\Controller;
use Impress\Support\Config;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Create a list of timezones, indexed by their offset and identifier and the ciyt as value.
     *
     * @return array
     */
    protected function createTimezoneList()
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

        return $timezoneList;
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \Impress\Support\Config $userConfig
     * @return Response
     */
    public function index(Config $userConfig)
    {
        $timezoneList = $this->createTimezoneList();
        $userConfig   = $userConfig->loadNested();

        return view('settings.index', compact('timezoneList', 'userConfig'));
    }

    /**
     * @param  Request                 $request
     * @param  \Impress\Support\Config $userConfig
     * @return Response
     */
    public function update(Request $request, Config $userConfig)
    {
        // Currently there is now automatic mapping between field names
        // and actual configuration settings as this might introduce
        // security problems. An attacker could set the value of
        // a setting in a way it's not intended to be.

        $this->validate($request, [
            'timezone'         => 'timezone',
            'autosave-enabled' => 'boolean'
        ]);

        $userConfig->save([
            'app.timezone'         => $request->input('timezone'),
            'app.autosave.enabled' => (bool) $request->input('autosave-enabled', false)
        ]);

        return redirect()->route('i.settings.index');
    }

}
