<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User balance and history</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/get_balance">
                    @csrf <!-- {{ csrf_field() }} -->
                        <div class="input-group">
                            <label  for="user_id" class="input-group-prepend input-group-text">User ID:</label>
                            <input type="text" class="form-control" name="user_id" value="">
                        </div>
                        <div class="input-group">
                            <label for="limit"  class="input-group-prepend input-group-text">Limit</label>
                            <input type="text" name="limit" value="50" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success" value="Get balance">
                </form>
            </div>
        </div>

        @isset($error_message)
                <div class="alert alert-danger">{{ $error_message }}</div>
        @endisset

        @isset($user_id)
            <h3>Balance for UserIDs {{ $user_id }} is {{ $balance }}</h3>

            <h3>Last {{ $limit }} records.</h3>
            <table class="table table-small table-striped">
                <th>#</th>
                <th>Value</th>
                <th>Balance</th>
                <th>Timestamp</th>
        @foreach ($records as $record)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $record->value }}</td>
                <td>{{ $record->balance }}</td>
                <td>{{ $record->created_at }}</td>
            </tr>
        @endforeach
            </table>
        @endisset

    </div>
</body>
</html>
