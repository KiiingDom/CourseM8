<!DOCTYPE html>
<html>
<head>
    <title>Matching Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Matching Results</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Matching Score (%)</th>
                    <th>Common Tags</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matchingResults as $result)
                    <tr>
                        <td>{{ $result['user']->firstName }} {{ $result['user']->lastName }}</td>
                        <td>{{ $result['percentage'] }}%</td>
                        <td>
                            Study Preferences: {{ implode(', ', array_intersect(explode(',', Auth::user()->study_preferences), explode(',', $result['user']->study_preferences))) }}<br>
                            Study Locations: {{ implode(', ', array_intersect(explode(',', Auth::user()->study_location), explode(',', $result['user']->study_location))) }}<br>
                            Note Taking: {{ implode(', ', array_intersect(explode(',', Auth::user()->note_taking), explode(',', $result['user']->note_taking))) }}<br>
                            Review Methods: {{ implode(', ', array_intersect(explode(',', Auth::user()->review_method), explode(',', $result['user']->review_method))) }}<br>
                            Collaboration Tools: {{ implode(', ', array_intersect(explode(',', Auth::user()->collaboration_tools), explode(',', $result['user']->collaboration_tools))) }}<br>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
