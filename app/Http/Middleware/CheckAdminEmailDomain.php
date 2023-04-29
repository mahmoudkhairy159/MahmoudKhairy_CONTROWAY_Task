<?php

namespace App\Http\Middleware;

use App\Traits\CheckDomain;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminEmailDomain
{
    use CheckDomain;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $emailDomain = $this->getEmailDomain($request->email);
        $emailDomainIsExist = $this->checkAdminDomain($emailDomain);
        if ($emailDomainIsExist  || $emailDomain == 'gmail') {

            session()->flash('error', 'the domain is exist before or domain equals gmail , please insert a unique domain');
            return redirect()->back();
        }
        $request->merge(['emailDomain' => $emailDomain]);

        return $next($request);
    }
}
