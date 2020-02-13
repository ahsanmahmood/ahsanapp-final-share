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
        <div class="main-content text-letf">
            <!-- CONTENT-->
            <div class="content">
            	<form method="post" action="{{ url('admin/admin-order-action') }}">
                    @csrf
                    <div class="form-group">
                        <label>Select User</label>
                        <select name="user_id" class="form-control">
                            <option value="">Please Select</option>
                            @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->id }}: {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection