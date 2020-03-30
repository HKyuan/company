<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Member</title>
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <table class="table table-hover text-center mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">email</th>
                    <th scope="col">name</th>
                    <th scope="col">phone</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <th>{{ $member->id }}</th>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>
                        <form action="{{route('member.update',$member->id)}}" method="post">
                            @csrf
                            @method('put')
                            <input type="submit" class="btn btn-warning" value="修改">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('member.delete',$member->id)}}" method="post" class="delete">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="刪除">
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
    {
        const destroy = document.querySelectorAll('.delete');
        destroy.forEach(response => {
            console.log(response);
            response.addEventListener('submit', function(event) {
                event.preventDefault();
                console.log(event);
                confirm('確定要刪除嗎?') ? response.submit() : [];
            })
        });

    }
    </script>
</body>

</html>