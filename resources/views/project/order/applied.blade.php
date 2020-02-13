@extends('project.index')
@section('content')
<div id="wrapper-content">
    <!-- PAGE WRAPPER-->
    @if(Session::has('item_unbanned'))
    <div class="alert alert-success">
        {{ Session::get('item_unbanned') }}
    </div>
    @elseif(Session::has('deleted'))
    <div class="alert alert-danger">
        {{ Session::get('deleted') }}
    </div>
    @elseif(Session::has('updated'))
    <div class="alert alert-success">
        {{ Session::get('updated') }}
    </div>
    @elseif(Session::has('added'))
    <div class="alert alert-success">
        {{ Session::get('added') }}
    </div>
    @elseif(Session::has('error'))
    <div class="alert alert-warning">
        {{ Session::get('error') }}
    </div>
    @endif
    <div id="page-wrapper">
        <!-- MAIN CONTENT-->
        <div class="main-content text-center">
            <!-- CONTENT-->
            <div class="content">
            	@if(is_object(Auth::user()))
            		<h1>{{ Auth::user()->name }}</h1>
            	@endif
            	<h3 class="text-left">Total items = {{ $items_total }}</h3>
            	<table class="table" id="item-table">
            		<thead>
            			<tr>
            				<th class="text-center">ID</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Image</th>
                            <!-- <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
            				<th class="text-center">Delete</th> -->
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($items as $item)
            				<tr>
            					<td>{{ $loop->index+1 }}</td>
                                <td>
                                    @foreach($users as $user)
                                    @if($user->id == $item->user_id)
                                        {{ $user->name }}
                                    @endif
                                    @endforeach
                                </td>
            					<td>
                                    {{ $item->message }}
                                </td>
                                <td>
                                    <img class="img-responsives col-xs-12 col-sm-6 col-md-5 col-lg-4" src="{{ asset('/project-assets/uploaded/images/'.$item->file) }}">
                                </td>
            					<!-- <td>
            						<a href="{{ url('/admin/order/'.$item->id) }}">
            							<i class="fa fa-eye"></i>
            						</a>
            					</td>
            					<td>
            						<a href="{{ url('/admin/order/'.$item->id.'/edit') }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
            					<td>
            						<form method="post" class="d-inline-block" action="{{ url('admin/order/'.$item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-simple"><i class="fa fa-trash"></i></button>
                                    </form>
            					</td> -->
            				</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection