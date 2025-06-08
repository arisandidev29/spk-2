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

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
            margin: 1rem;
            text-align: center;
        }

        th,
        td {
            padding: 0.8rem;
        }

        th {
            font-weight: bold;
        }
    </style>
    <body>
        <h1>User hasil SPK Report</h1>

        <small>Dibuat pada : {{ $exportDate }}</small>

        @foreach ($userSpk as $user)
            <div>
                <p>User : {{$user->name}}</p>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Alterantive</th>
                        <th>rangking</th>
                    </tr>
                    @foreach ($user->HasilRekomendasi->sortBy("rangking")->values() as $index => $hasil)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $hasil->alternative->name }}</td>
                            <td>{{ $hasil->rangking }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endforeach
    </body>
</html>
