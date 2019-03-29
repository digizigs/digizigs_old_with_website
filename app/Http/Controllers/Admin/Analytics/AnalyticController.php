<?php

namespace App\Http\Controllers\Admin\Analytics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Analytics;
use App\Models\Page;
use Spatie\Analytics\Period;
use App\Libraries\GoogleAnalytics;

class AnalyticController extends Controller
{
    public function index(){

    	//Top Country Clicks	
    	$result = GoogleAnalytics::topCountries();
    	//dd($result);
        $country = $result->pluck('country');
        $country_sessions = $result->pluck('sessions');

        //Pages Views
        $trending = GoogleAnalytics::getPages(7);
        //$trending = $result->pluck('url');

    	$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(180));
    	$ptpv = $analyticsData->pluck('pageTitle','pageViews','date');

    	//Top Browsers
    	$top_browser = Analytics::fetchTopBrowsers(Period::days(180));
    	$browser = $top_browser->pluck('browser');
    	$session = $top_browser->pluck('sessions');

    	//Top Reffers
    	$result = Analytics::fetchTopReferrers(Period::days(180));
    	$reffers = $result->pluck('pageViews','url');

    	//User Type
    	$result = Analytics::fetchUserTypes(Period::days(180));
    	//$usertype = 

        //$most_visited_page = Analytics::fetchMostVisitedPages(Period::days(30));
        //$analytics = Analytics::getAnalyticsService();
        //$pages = Analytics::fetchMostVisitedPages(Period::days(7));
        //$trending = app('App\Services\GoogleAnalytics\TrendingPages')->week(7);

        //dd($session);
        
        return view('admin.pages.analytics.analytics',compact('browser','session','trending','analyticsData','country','country_sessions'));
     
    }
}
