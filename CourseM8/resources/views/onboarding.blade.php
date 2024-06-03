<!DOCTYPE html>
<html>
<head>
    <title>Onboarding</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Onboarding</h1>
        <form method="POST" action="{{ route('onboarding.store') }}">
            @csrf
            <div class="form-group">
                <label for="study_time">Study Time:</label>
                <select name="study_time" id="study_time" class="form-control">
                    <option value="Early Morning">Early Morning</option>
                    <option value="Late Morning">Late Morning</option>
                    <option value="Afternoon">Afternoon</option>
                    <option value="Evening">Evening</option>
                </select>
            </div>
            <div class="form-group">
                <label for="study_location">Study Location:</label>
                <select name="study_location" id="study_location" class="form-control">
                    <option value="Library">Library</option>
                    <option value="Coffee Shop">Coffee Shop</option>
                    <option value="Home">Home</option>
                </select>
            </div>
            <!-- Add other fields as necessary -->
            <button type="submit" class="btn btn-primary">Save Profile</button>
        </form>
    </div>
</body>
</html>
