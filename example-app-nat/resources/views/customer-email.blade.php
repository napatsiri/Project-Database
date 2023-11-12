<!-- resources/views/customer-email.blade.php --> 
<h1>Customer Email</h1> 
@if ($customer) 
<p>Name: {{ $customer->name }}</p> 
<p>Email: {{ $customer->email }}</p> 
@else 
<p>No customer found with that name.</p> 
@endif 
<div class="pull-right"> 
    <a class="btn btn-primary" href="{{ route('request-customer-email') }}"> Back</a> 
</div>