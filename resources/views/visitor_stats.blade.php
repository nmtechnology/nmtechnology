@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Visitor Statistics</h1>
    <p>Total Visits: <strong>{{ $totalVisits }}</strong></p>
    <p>Unique Visitors: <strong>{{ $uniqueVisitors }}</strong></p>
    <h2 class="text-xl font-semibold mt-6 mb-2">Recent Visitors</h2>
    <table class="table-auto w-full mb-8">
        <thead>
            <tr>
                <th class="px-4 py-2">IP Address</th>
                <th class="px-4 py-2">Location</th>
                <th class="px-4 py-2">Visits</th>
                <th class="px-4 py-2">Last Visited</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats as $stat)
            <tr>
                <td class="border px-4 py-2">{{ $stat->ip }}</td>
                <td class="border px-4 py-2">{{ $stat->location }}</td>
                <td class="border px-4 py-2">{{ $stat->visits }}</td>
                <td class="border px-4 py-2">{{ $stat->last_visited }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2 class="text-xl font-semibold mb-2">Visitor Locations</h2>
    <ul>
        @foreach($locations as $location)
        <li>{{ $location }}</li>
        @endforeach
    </ul>
</div>
@endsection
