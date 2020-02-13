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
                            <th class="text-center">Title</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">image</th>
                            <th class="text-center">price</th>
                            <th class="text-center">Products</th>
            				<th class="text-center">Created By</th>
                            <th class="text-center">Service Charges</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
            				<th class="text-center">Delete</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($items as $item)
            				<tr>
            					<td>{{ $loop->index+1 }}</td>
                                <td>{{ $item->title }}</td>
            					<td>{{ str_limit($item->description, $limit = 100, $end = '.....') }}</td>
                                <td><img style="width: 30%" src="{{ asset('project-assets/uploaded/images/'.$item->image) }}"></td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->products }}</td>
                                <td>
                                    @foreach($users as $user)
                                    @if($user->id == $item->user_id)
                                    {{ $user->name ? $user->name : "No User Found" }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->service_charges }}</td>
            					<td>
            						<a href="{{ url('/admin/deal/'.$item->id) }}">
            							<i class="fa fa-eye"></i>
            						</a>
            					</td>
            					<td>
            						<a href="{{ url('/admin/deal/'.$item->id.'/edit') }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
            					<td>
            						<form method="post" class="d-inline-block" action="{{ url('admin/deal/'.$item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-simple"><i class="fa fa-trash"></i></button>
                                    </form>
            					</td>
            				</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection