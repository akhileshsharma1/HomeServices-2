<div>
    <style>
        .dashboard-title-sp {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .service-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 100px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .service-table th,
        .service-table td {
            padding: 15px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        .service-table th {
            background-color: #f8f9fa;
            color: #333;
        }

        .service-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .service-table tr:hover {
            background-color: #e9ecef;
        }

        .action-buttons button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .action-buttons button.accept {
            background-color: #28a745;
            color: #fff;
        }

        .action-buttons button.reject {
            background-color: #dc3545;
            color: #fff;
        }

        .action-buttons button:hover {
            filter: brightness(1.1);
        }
    </style>
<div class="dashboard-container">
        <h2 class="dashboard-title-sp">Service Provider Dashboard</h2>
        <table class="service-table">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Customer</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($bookings)
                @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->service_name }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->description }}</td>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->time }}</td>
                            <td class="action-buttons">
                                @if ($booking->status == 'Pending')
                                    <button class="accept" wire:click="acceptBooking({{ $booking->id }})">Accept</button>
                                    <button class="reject" wire:click="rejectBooking({{ $booking->id }})">Reject</button>
                                @else
                                    {{ $booking->status }}
                                @endif
                            </td>
                        </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
