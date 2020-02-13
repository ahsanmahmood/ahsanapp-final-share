@extends('adminlte::login')
@if(Session::has('login_user_require'))
<div class="alert alert-warning text-center">
	{{ Session::get('login_user_require') }}
</div>
@endif