<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donation report</title>
    <style>
        .container {
            margin-left: auto;
            margin-right: auto;
            padding: 16px;
        }

        .text-2xl {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #e2e8f0;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #e2e8f0;
        }
    </style>
</head>

<body class="bg-opacity-50">
    <div class="container mx-auto p-4">
        {{-- <img src="{{'rbc.png'}}" alt="" width="400" height="200"> --}}
        <center>
            <h2 class="text-2xl font-semibold mb-4">List of all donations made</h2>
        </center>
        <table style="width: 100%" class="w-full table-auto border border-collapse">
            <thead>
                <tr>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Date
                    </th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Donor
                    </th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Phone
                    </th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Email
                    </th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">
                        Blood type
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $donation)
                <tr>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$donation->created_at}}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$donation->user->name}}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$donation->user->phone}}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$donation->user->email}}
                    </td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">
                        {{$donation->user->details->blood_type}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>