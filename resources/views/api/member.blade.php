<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API </title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <form action="{{route('APImemberSearch')}}" method="post">
        @csrf
    <input type="text"  class="form-control" placeholder="Search" name="searchTerm" />
    <input type="submit" value='Search'>
    </form>
<table clas="text-left">
    <thead>
        <tr>
            <th class="p-10">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Action</th>
        </tr>
    </thead>
    <tbody> 
        @forelse ( $members as $data)
        <tr class="">
            <td class="p-3">{{$data['name']}}</td>
            <td class="p-3">{{$data['email']}}</td>
            <td>
                <a class="hover:bg-cool-gray-600 hover:text-yellow-400" href="{{route('APImemberUpdate',$data['id'])}}">Edit</a>
            </td>
        </tr>
        @empty
            <tr>
                <td>No Records Available</td>
            </tr>
        @endforelse
        
    </tbody>
</table>
</body>
</html>