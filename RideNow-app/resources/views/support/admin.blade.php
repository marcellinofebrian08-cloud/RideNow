<!DOCTYPE html>
<html>
<head>
    <title>Manage Support Tickets - Admin</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 20px;
        }
        .container {
            padding: 20px;
        }
        .box {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .btn-back {
            display: inline-block;
            background-color: red;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-resolve {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Support Resolution</h1>
    </div>
    
    <div class="container">
        <a href="/home" class="btn-back">Back to Home</a>

        <div class="box">
            <h3>All User Tickets</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($all_tickets) > 0)
                        @foreach($all_tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->created_at->format('d-M-Y H:i') }}</td>
                            <td>{{ $ticket->user->name ?? 'Deleted User' }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->message }}</td>
                            <td style="color: {{ $ticket->status == 'open' ? 'red' : 'green' }}; font-weight: bold;">
                                {{ strtoupper($ticket->status) }}
                            </td>
                            <td>
                                @if($ticket->status == 'open')
                                    <form action="{{ route('support.resolve', $ticket->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-resolve">Resolve Ticket</button>
                                    </form>
                                @else
                                    <span style="color: gray;">Handled</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" style="text-align: center;">No tickets found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>