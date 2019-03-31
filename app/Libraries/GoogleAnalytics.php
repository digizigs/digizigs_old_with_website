<?php

namespace App\Libraries;

use Analytics;
use Spatie\Analytics\Period;


class GoogleAnalytics{

    static function topCountries($days) {
      $country = Analytics::performQuery(Period::days($days),'ga:sessions',  ['dimensions'=>'ga:country','sort'=>'-ga:sessions']);
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
      $data = Analytics::fetchMostVisitedPages(Period::days(20));
      //return $ff = $this->parseResults($data);
      //return($data);

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

    static function topBrowsers(){
      $data = Analytics::fetchTopBrowsers(Period::days($days));
    }

}