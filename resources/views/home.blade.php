@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="px-3 py-4 mb-4 text-sm text-green-700 bg-green-100 border border-t-8 border-green-600 rounded" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

            <header class="px-6 py-5 font-semibold text-gray-700 bg-gray-200 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <table class="min-w-full bg-white ">
                    <thead class="text-white bg-gray-800">
                        <tr>
                            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Total Members</th>
                            <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Total Books</th>
                            <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Total Issued Books</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr>
                            <td class="w-1/3 px-4 py-3 text-left">{{$members}}</td>
                            <td class="w-1/3 px-4 py-3 text-left">{{$books}}</td>
                            <td class="w-1/3 px-4 py-3 text-left">{{$issuedbooks}}</td>
                        </tr>
                
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>
@endsection
