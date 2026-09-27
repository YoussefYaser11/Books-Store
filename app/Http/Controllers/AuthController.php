<?php
namespace App\Http\Controllers;
use App\Models\User; use App\Services\StoreService; use Illuminate\Http\Request; use Illuminate\Support\Facades\Hash; use Illuminate\Validation\Rule;
class AuthController extends Controller {
 public function login(){if(auth()->check())return redirect()->route('home'); return view('auth.login');}
 public function authenticate(Request $r){$data=$r->validate(['email'=>'required|email','password'=>'required']);$u=User::where('email',$data['email'])->first();if(!$u||!Hash::check($data['password'],$u->password))return back()->withInput($r->only('email'))->with('error','البريد الإلكتروني أو كلمة المرور غير صحيحة.');auth()->login($u);$r->session()->regenerate();return redirect()->intended(route('home'));}
 public function register(){if(auth()->check())return redirect()->route('home');return view('auth.register');}
 public function storeRegister(Request $r){$d=$r->validate(['name'=>'required','email'=>'required|email|unique:users,email','password'=>'required|min:6|confirmed']);$u=User::create($d);StoreService::awardPoints($u->id,'registration',100,'إنشاء حساب جديد');return redirect()->route('login')->with('success','تم إنشاء الحساب. يمكنك تسجيل الدخول الآن.');}
 public function logout(Request $r){auth()->logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route('home');}
 public function profile(){return view('profile',['user'=>auth()->user()]);}
 public function updateProfile(Request $r){$u=auth()->user();$d=$r->validate(['name'=>'required','email'=>['required','email',Rule::unique('users')->ignore($u->id)],'password'=>'nullable|min:6|confirmed']);$u->name=$d['name'];$u->email=$d['email'];if(!empty($d['password']))$u->password=Hash::make($d['password']);$u->save();return back()->with('success','تم تحديث بيانات حسابك بنجاح.');}
}