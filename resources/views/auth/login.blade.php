@extends('layouts.app') @section('content')
<section class="section"><div class="container"><div class="form-shell"><p class="eyebrow">حسابك</p><h1>تسجيل الدخول</h1>@if(session('error'))<div class="alert">{{ session('error') }}</div>@endif @if(session('success'))<div class="success-alert">{{ session('success') }}</div>@endif
<form method="post" action="{{ route('login.post') }}" class="entity-form">@csrf<label>البريد الإلكتروني<input type="email" name="email" value="{{ old('email') }}" required></label><label>كلمة المرور<input type="password" name="password" required></label><button class="button button-primary">تسجيل الدخول</button></form><p class="form-note">ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب</a></p></div></div></section>
@endsection
