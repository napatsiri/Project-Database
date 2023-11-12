<table>  
    <thead>    
        <tr>      
            <th>Customer Name</th>    
        </tr>  
    </thead>  
    <tbody>    
        @foreach ($customers as $customer)    
        <tr>      
            <td>{{ $customer->name }}</td>    
        </tr>    @endforeach  
    </tbody> 
</table>