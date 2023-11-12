<form method="POST" action="{{ route('get-customer-email') }}">  
    @csrf  
    <div>    
        <label for="name">Customer Name:</label>    
        <input type="text" id="name" name="name">  
    </div>  
    <button type="submit">Submit</button> 
</form> 
<div class="pull-right">  
    <a class="btn btn-primary" href="{{ route('get-customer-email') }}"> Back</a> 
</div>