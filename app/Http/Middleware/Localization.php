<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class Localization
{

    private function getRequestLang($httpAcceptedLang) {
        $languages = explode(",", $httpAcceptedLang);
        $local = explode(";", $languages[0]);
        $lang = explode("-", $local[0]);
        return $lang[0];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if ($locale && in_array($locale, ['en', 'de'])) {
            App::setLocale($locale);
            return $next($request);
        } else {
            if ($request->server('HTTP_ACCEPT_LANGUAGE')) {
                $lang = $this->getRequestLang($request->server('HTTP_ACCEPT_LANGUAGE'));
                if (in_array($lang, ['de', 'en'])) {
                    App::setLocale($locale);
                    return redirect($lang . '/' . $request->path());
                } else {
                    return redirect(App::getLocale() . '/' . $request->path());
                }
            } else {
                return redirect(App::getLocale() . '/' . $request->path());
            }
        }
    }
}
