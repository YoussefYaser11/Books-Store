<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class RoleMiddleware {
 public function handle(Request $request, Closure $next, string $role) {
   if (!auth()->check()) return redirect()->route($role==='admin'?'admin.login':'login');
   if (auth()->user()->role !== $role) return $role==='admin' ? redirect()->route('admin.login')->with('error','هذا الحساب ليس لديه صلاحية دخول لوحة الإدارة.') : redirect()->route('home');
   return $next($request);
 }
}