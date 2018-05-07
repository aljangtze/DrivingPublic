<?php

namespace App\Http\Middleware;

use Closure;

class telMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!session()->has("Teluser")) {
            $a = $request->route("nickname"); //获取路由中的值
//                        session()->set("zhi",$a);
//            session(["zhi" => $a]);
            return redirect("tel/login".'/'.$a);
        }
        return $next($request);
    }

}
