<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Appointments</title>
</head>
<body>


<h1>Appointments List</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Therapist</th>
        <th>Service</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
    </tr>

    @forelse($appointments as $appointment)
    <tr>
        <td>{{ $appointment->id }}</td>
        <td>{{ $appointment->customer->name ?? 'N/A' }}</td>
        <td>{{ $appointment->therapist->name ?? 'N/A' }}</td>
        <td>{{ $appointment->service->service_name ?? 'N/A' }}</td>
        <td>{{ $appointment->appointment_date }}</td>
        <td>{{ $appointment->appointment_time }}</td>
        <td>{{ $appointment->status }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="7">No appointments found</td>
    </tr>
    @endforelse

</table>

<br>

{{ $appointments->links() }}

</body>
</html>
