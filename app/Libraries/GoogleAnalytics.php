<?php

namespace App\Libraries;

use Analytics;
use Spatie\Analytics\Period;


class GoogleAnalytics{

    static function topCountries() {
        $country = Analytics::performQuery(Period::days(30),'ga:sessions',  ['dimensions'=>'ga:country','sort'=>'-ga:sessions']);
        $result= collect($country['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country' =>  $dateRow[0],
                'sessions' => (int) $dateRow[1],
            ];
        });
        //dd($country);
        return $result;
    }

    static function getPages($days) {
       return $data = Analytics::fetchMostVisitedPages(Period::days($days));
       //return $this->parseResults($data);

       return $data->reject(function($item){
	       return $item['url'] == '/' or
	       $item['url'] == '/blog' or
	       starts_with($item['url'], '/category');
	   })->unique('url')->transform(function($item){
	       $item['pageTitle'] = str_replace(' - Laravel News', '', $item['pageTitle']);
	       return $item;
	   });

   	}

   	static function pageAndVisitor($days) {

   	}

    static function topBrowsers()
    {
        //
    }

}