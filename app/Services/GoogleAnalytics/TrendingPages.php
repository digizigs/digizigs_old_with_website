<?php

namespace App\Services\GoogleAnalytics;

use Analytics;
use Spatie\Analytics\Period;

class TrendingPages
{
   public function week($days,$limit)
   {
       return $this->getResults($days,$limit);
   }

   	protected function getResults($days, $limit)
   	{
       return $data = Analytics::fetchMostVisitedPages(Period::days($days), $limit);
       return $this->parseResults($data);
   	}
	

	//Next, it needs another method to parse the results. As mentioned earlier it needs to remove any duplicates, remove any pages that are not actual posts, and also remove the “ – Laravel News” suffix on titles that Google is reporting on.


   	protected function parseResults($data)
	{
	   return $data->reject(function($item){
	       return $item['url'] == '/' or
	       $item['url'] == '/blog' or
	       starts_with($item['url'], '/category');
	   })->unique('url')->transform(function($item){
	       $item['pageTitle'] = str_replace(' - Laravel News', '', $item['pageTitle']);
	       return $item;
	   });
	}
}