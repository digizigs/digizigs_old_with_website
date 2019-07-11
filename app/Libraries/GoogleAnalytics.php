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
      /*$data->unique('url')->transform(function($item){
          $item['pageTitle'] = str_replace(' - Laravel News', '', $item['pageTitle']);
          return $item;
      });
      return($data);*/
      return $data->reject(function($item){
      return $item['url'] == '/';
  	  })->unique('url')->transform(function($item){
  	       $item['pageTitle'] = str_replace(' - Laravel News', '', $item['pageTitle']);
  	       return $item;
  	  });

   	}

   	static function pageAndVisitor($days) {

   	}

    static function topBrowsers($days){
      $data = Analytics::fetchTopBrowsers(Period::days($days));
    }

    static function moblileTraffic($days){
      $data = $analyticsData = Analytics::performQuery(
            Period::days($days),
            'ga:sessions',
            [
                'dimensions'=>'ga:mobileDeviceInfo,ga:source',
                'metrics'=>'ga:sessions,ga:pageviews,ga:sessionDuration',
                'segment'=>'gaid::-14'             
            ]
        );

      return $data;
    }

    static function browser_operatuing_system($days){
      $data = $analyticsData = Analytics::performQuery(
            Period::days($days),
            'ga:sessions',
            [
                'dimensions'=>'ga:operatingSystem,ga:operatingSystemVersion,ga:browser,ga:browserVersion',
                'metrics'=>'ga:sessions,ga:pageviews,ga:sessionDuration'        
            ]
        );

      return $data;
    }

    static function traffic_source($days){
      $data = $analyticsData = Analytics::performQuery(
            Period::days($days),
            'ga:sessions',
            [
                'dimensions'=>'ga:source,ga:medium',
                'metrics'=>'ga:sessions,ga:pageviews,ga:sessionDuration,ga:exits',
                'sort'=>'-ga:sessions'
            ]
        );

      return $data;
    }




}