@extends('project.index')
@section('content')
<form method="post" action="{{ url('admin/invoice/'.$item->id) }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	@method('put')
	<select required="required" name="invoice_status" class="form-control" style="float: left; width: 70%;">
		<option value="">Please Select</option>
		@if($item->invoice_status == "Processing")
		<option value="Processing" selected="selected">Processing</option>
		<option value="Pending">Pending</option>
		<option value="Complete">Complete</option>
		<option value="Cancelled">Cancelled</option>
		@elseif($item->invoice_status == "Pending")
		<option value="Processing">Processing</option>
		<option value="Pending" selected="selected">Pending</option>
		<option value="Complete">Complete</option>
		<option value="Cancelled">Cancelled</option>
		@elseif($item->invoice_status == "Complete")
		<option value="Processing">Processing</option>
		<option value="Pending">Pending</option>
		<option value="Complete" selected="selected">Complete</option>
		<option value="Cancelled">Cancelled</option>
		@elseif($item->invoice_status == "Cancelled")
		<option value="Processing">Processing</option>
		<option value="Pending">Pending</option>
		<option value="Complete">Complete</option>
		<option value="Cancelled" selected="selected">Cancelled</option>
		@endif
	</select>
	<button type="submit" class="btn btn-primary" style="float: left; width: 30%;">Update</button>
</form>
@endsection