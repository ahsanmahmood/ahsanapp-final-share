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
            	<table class="table" id="user-table">
            		<thead>
            			<tr>
            				<th class="text-center">ID</th>
            				<th class="text-center">Name</th>
            				<th class="text-center">Email</th>
                            <th class="text-center">Ban User</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($users as $user)
                        @if($user->roles[0]->id === 2)
            				<tr>
            					<td>{{ $loop->index+1 }}</td>
            					<td>{{ $user->name }}</td>
            					<td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ url('/admin/users/'.$user->id.'/ban') }}">
                                        <i class="fa fa-lock"></i>
                                    </a>
                                </td>
            					<td>
            						<a href="{{ url('/admin/users/'.$user->id) }}">
            							<i class="fa fa-eye"></i>
            						</a>
            					</td>
            					<td>
            						<a href="{{ url('/admin/users/'.$user->id.'/edit') }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
                                <td>
                                    <form method="post" class="d-inline-block" action="{{ url('admin/users/'.$user->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-simple"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
            				</tr>
                            @endif
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection