<?php

namespace Impress\Http\Controllers;

use Impress\Http\Requests;
use Impress\Http\Controllers\Controller;
use Impress\Support\Config;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Create a sorted list of timezones from PHP's \DateTimeZone::listIdentifiers().
     *
     * @return array
     */
    protected function rawTimezoneList()
    {
        $utcTime = new \DateTime('now', new \DateTimeZone('UTC'));

        $timezones = [];
        foreach (\DateTimeZone::listIdentifiers() as $timezoneIdentifier) {
            $currentTimezone = new \DateTimeZone($timezoneIdentifier);

            $timezones[] = [
                'offset' => (int) $currentTimezone->getOffset($utcTime),
                'identifier' => $timezoneIdentifier
            ];
        }

        // Sort the timezones by offset, identifier ascending
        usort($timezones, function($a, $b) {
            return ($a['offset'] == $b['offset'])
                ? strcmp($a['identifier'], $b['identifier'])
                : $a['offset'] - $b['offset'];
        });
    }

    /**
     * Create a list of timezones, indexed by their offset and identifier and the city as value.
     *
     * @return array
     */
    protected function timezoneList()
    {
        $timezoneList = [];
        foreach ($this->rawTimezoneList() as $timezone) {
            $sign = ($timezone['offset'] > 0) ? '+' : '-';
            $offset = $sign . gmdate('H:i', abs($timezone['offset']));

            $group = null;
            $city = $timezone['identifier'];
            if (strpos($timezone['identifier'], '/') !== false) {
                list($group, $city) = explode('/', $timezone['identifier']);
            }

            $city = str_replace('_', ' ', $city);

            if ( ! isset($timezoneList[$offset])) {
                $timezoneList[$offset] = [];
            }

            $timezoneList[$offset][$timezone['identifier']] = $city;
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
        $timezoneList = $this->timezoneList();
        $userConfig = $userConfig->loadNested();

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
            'timezone' => 'timezone',
            'autosave-enabled' => 'boolean'
        ]);

        $userConfig->save([
            'app.timezone' => $request->input('timezone'),
            'app.autosave.enabled' => (bool) $request->input('autosave-enabled', false)
        ]);

        return redirect()->route('i.settings.index');
    }

}
