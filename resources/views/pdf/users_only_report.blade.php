<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>User Report</title>
    </head>
    <style>

        h1 {
            text-align: center;
            font-size: 2rem;
        }

        table,tr,td,th {
            border : 1px solid black;
            border-collapse: collapse
        }

        table {
            width: 100%;
            margin: 1rem;
            text-align: center;
        }

        
        th,td {
            padding: .8rem;
        }

        th {
            font-weight: bold;
        }
    </style>
    <body>
        <h1>User Report</h1>

        <small>Dibuat pada : {{$exportDate}}</small>
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
            @foreach ($users as $index => $user)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->hasilRekomendasi->isNotEmpty())
                            Sudah Memililh
                        @else
                                Belum memilih
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
