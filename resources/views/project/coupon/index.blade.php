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
                            <th class="text-center">Created By</th>
                            <th class="text-center">coupon_type</th>
                            <th class="text-center">coupon_value</th>
                            <th class="text-center">status</th>
                            <th class="text-center">extra_field</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
            				<th class="text-center">Delete</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($items as $item)
            				<tr>
            					<td>{{ $loop->index+1 }}</td>
                                <td>
                                    @foreach($users as $user)
                                    @if($user->id == $item->created_by)
                                        {{ $user->name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->coupon_type }}</td>
                                <td>{{ $item->coupon_value }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->extra_field }}</td>
            					<td>
            						<a href="{{ url('/admin/coupon/'.$item->id) }}">
            							<i class="fa fa-eye"></i>
            						</a>
            					</td>
            					<td>
            						<a href="{{ url('/admin/coupon/'.$item->id.'/edit') }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
            					<td>
            						<form method="post" class="d-inline-block" action="{{ url('admin/coupon/'.$item->id) }}">
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