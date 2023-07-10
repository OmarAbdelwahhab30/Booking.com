<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class GateDefineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()){
            $permissions = Permission::whereHas("roles",function ($query){
                $query->where("roles.id",auth()->user()->role_id);
            })->get();

            foreach ($permissions as $permission){
                Gate::define($permission->name,fn() => true);
            }
        //return response()->json($permissions);
        }
        return $next($request);
    }
}
