
@if($user && $travelHistory)
    <div class="ticket-container">
        <div class="ticket-header">
            <h2>Transportation Mangement System</h2>
        </div>
        <div class="ticket-details">
            <p><strong>Name: {{ $user->name }}</strong> </p>
            <p><strong>Email: {{ $user->email }}</strong> </p>
            <p><strong>Contact: {{ $user->contact }}</strong> </p>
            <p><strong>NID: {{ $user->nid }}</strong> </p>
            <p><strong>Passport: {{ $user->passport }}</strong> </p>
            <p><strong>Travel Date: {{ \Carbon\Carbon::parse($travelHistory->created_at)->format('Y-m-d') }}</strong></p>
        </div>
        <div class="ticket-footer">
            <p><strong>Final Price: {{ $travelHistory->final_price }}</strong> </p>
        </div>
            <p>Thank you for using our website!</p>
        </div>
@else
    <p>Unable to retrieve user or travel history information.</p>
@endif
