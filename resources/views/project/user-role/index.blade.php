@extends('project.index')
@section('content')
<div id="wrapper-content">
    <!-- PAGE WRAPPER-->
    <div id="page-wrapper">
        <!-- MAIN CONTENT-->
        <div class="main-content text-center">
            <!-- CONTENT-->
            <div class="content">
            	@if(is_object(Auth::user()))
            		<h1>{{ Auth::user()->name }}</h1>
            	@endif
            	<table class="table" id="data-table">
            		<thead>
            			<tr>
            				<th class="text-center">ID</th>
            				<th class="text-center">Name</th>
            				<th class="text-center">Email</th>
                            <th class="text-center">Super Admin</th>
            				<th class="text-center">Admin</th>
            				<th class="text-center">rider</th>
                            <th class="text-center">service_provider</th>
            				<th class="text-center">customer</th>
                            <th class="text-center">Assign New Role</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($users as $user)
            				<tr>
            					<form method="post" action="{{ route('assign.roles') }}">
            						@csrf
	            					<td>{{ $loop->index+1 }}</td>
	            					<td>{{ $user->name }}</td>
	            					<td>{{ $user->email }}
	            						<input type="hidden" name="email" value="{{ $user->email }}">
	            					</td>
	            					<td>
	            						<input type="checkbox" {{ $user->hasRole('super admin') ? 'checked' : '' }} name="super_admin">
	            					</td>
                                    <td>
                                        <input type="checkbox" {{ $user->hasRole('admin') ? 'checked' : '' }} name="admin">
                                    </td>
	            					<td>
	            						<input type="checkbox" {{ $user->hasRole('rider') ? 'checked' : '' }} name="rider">
	            					</td>
	            					<td>
	            						<input type="checkbox" {{ $user->hasRole('Service Provider') ? 'checked' : '' }} name="service_provider">
	            					</td>
                                    <td>
                                        <input type="checkbox" {{ $user->hasRole('customer') ? 'checked' : '' }} name="customer">
                                    </td>
	            					<td>
	            						<button type="submit" class="btn btn-blue btn-bold">
	            							<span>Assign Role</span>
	            						</button>
	            					</td>
            					</form>
            				</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection