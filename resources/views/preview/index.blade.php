<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marsa - Instagram</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

        body {
            background-color: #f1f1f1;
            padding-bottom: 40px;
            /* Sesuaikan dengan tinggi footer */
        }

        .container {
            /* background-color: #d3d3d3; */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 80px;
            /* Tambahkan margin bawah lebih besar untuk memberi ruang bagi footer tetap */
        }

        h2,
        h3 {
            font-family: Arial, sans-serif;
            font-weight: normal;
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            width: 50px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h1>Daftar Postingan</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Photo</th>
                    <th>Caption</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            @if ($post->photo && in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ 'storage/' . $post->photo }}" />
                            @else
                                No media available
                            @endif
                        </td>
                        <td>{{ $post->caption }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
