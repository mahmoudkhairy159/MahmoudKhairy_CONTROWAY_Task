<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\User;

trait CheckDomain
{
    public function getEmailDomain($email)
    {
        $start = strPos($email, '@') + 1;
        $emailLength = strlen($email);
        $end =  $emailLength - strPos($email, '.') + 1;
        $emailDomain = substr($email, $start, $end);
        return $emailDomain;
    }
    public function checkUserDomain($emailDomain)
    {

        $domainIsExist = User::where('email_domain', $emailDomain)->exists();
        //dd($domainIsExist);
        if ($domainIsExist) {
            return true;
        }
        return false;
    }
    public function checkAdminDomain($emailDomain)
    {

        $domainIsExist = Admin::where('email_domain', $emailDomain)->exists();
        //dd($domainIsExist);
        if ($domainIsExist) {
            return true;
        }
        return false;
    }
}
