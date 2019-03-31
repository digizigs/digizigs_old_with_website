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
    	$top_countries = GoogleAnalytics::topCountries(20);
    	//dd($top_countries);
        $country = $top_countries->pluck('country');
        $country_sessions = $top_countries->pluck('sessions');
        //dd($result);
        //Pages Views
        $trending = GoogleAnalytics::getPages(7);
        //$trending = $result->pluck('url');
        //dd($trending);
        //dd(Analytics::fetchMostVisitedPages(Period::days(10)));

    	$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(180));
    	$ptpv = $analyticsData->pluck('pageTitle','pageViews','date');

        $totalvisitor = Analytics::fetchTotalVisitorsAndPageViews(Period::days(10));
        $ww = $totalvisitor->pluck('date');
        //dd($ww);
    	//Top Browsers
    	$top_browser = Analytics::fetchTopBrowsers(Period::days(180));
    	$browser = $top_browser->pluck('browser');
    	$session = $top_browser->pluck('sessions');
        //dd($top_browser);

    	//Top Reffers
    	$result = Analytics::fetchTopReferrers(Period::days(180));
    	$reffers = $result->pluck('pageViews','url');

    	//User Type
    	$visitor_type = Analytics::fetchUserTypes(Period::days(180));
    	//dd($user_type);

        //$most_visited_page = Analytics::fetchMostVisitedPages(Period::days(30));
        //$analytics = Analytics::getAnalyticsService();
        //$pages = Analytics::fetchMostVisitedPages(Period::days(7));
        //$trending = app('App\Services\GoogleAnalytics\TrendingPages')->week(7);

        //dd($session);
        
        return view('admin.pages.analytics.analytics',
                    compact('browser','session','top_browser',
                            'visitor_type','trending','analyticsData','country','country_sessions','top_countries'));
     
    }
}
