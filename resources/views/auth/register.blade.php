@extends('layouts.app') @section('content')
<section class="section"><div class="container"><div class="form-shell"><p class="eyebrow">ابدأ رحلتك</p><h1>إنشاء حساب</h1>@if($errors->any())<div class="alert">{{ $errors->first() }}</div>@endif
<form method="post" action="{{ route('register.post') }}" class="entity-form">@csrf<label>الاسم<input name="name" value="{{ old('name') }}" required></label><label>البريد الإلكتروني<input type="email" name="email" value="{{ old('email') }}" required></label><label>كلمة المرور<input type="password" name="password" required></label><label>تأكيد كلمة المرور<input type="password" name="password_confirmation" required></label><button class="button button-primary">إنشاء الحساب</button></form></div></div></section>
@endsection
