<!DOCTYPE html>
<html>
<head>
    <title>Questionnaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Questionnaire</h1>
        <form method="POST" action="{{ route('questionnaire.store') }}">
            @csrf
            <!-- Basic Information Section -->
            <h2>Section 1: Basic Information</h2>
            <div class="form-group">
                <label for="course">What course are you currently enrolled in?</label>
                <select class="form-control" id="course" name="course" required>
                    <option value="Course A">Course A</option>
                    <option value="Course B">Course B</option>
                    <option value="Course C">Course C</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="year_of_study">What year of study are you in?</label>
                <select class="form-control" id="year_of_study" name="year_of_study" required>
                    <option value="First year">First year</option>
                    <option value="Second year">Second year</option>
                    <option value="Third year">Third year</option>
                    <option value="Fourth year or higher">Fourth year or higher</option>
                </select>
            </div>
            <div class="form-group">
                <label for="major">What is your major or primary field of study?</label>
                <select class="form-control" id="major" name="major" required>
                    <option value="Major A">Major A</option>
                    <option value="Major B">Major B</option>
                    <option value="Major C">Major C</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="career_aspirations">What are your future career aspirations?</label>
                <select class="form-control" id="career_aspirations" name="career_aspirations" required>
                    <option value="Career A">Career A</option>
                    <option value="Career B">Career B</option>
                    <option value="Career C">Career C</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <!-- Study Preferences Section -->
            <h2>Section 2: Study Preferences</h2>
            <div class="form-group">
                <label for="study_preferences">When do you prefer to study? (Select all that apply)</label>
                <select multiple class="form-control" id="study_preferences" name="study_preferences[]" required>
                    <option value="Early Morning">Early Morning (6 AM - 9 AM)</option>
                    <option value="Late Morning">Late Morning (9 AM - 12 PM)</option>
                    <option value="Afternoon">Afternoon (12 PM - 3 PM)</option>
                    <option value="Late Afternoon">Late Afternoon (3 PM - 6 PM)</option>
                    <option value="Evening">Evening (6 PM - 9 PM)</option>
                    <option value="Night">Night (9 PM - 12 AM)</option>
                    <option value="Late Night">Late Night (12 AM - 3 AM)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="study_location">Where do you prefer to study? (Select all that apply)</label>
                <select multiple class="form-control" id="study_location" name="study_location[]" required>
                    <option value="Library">Library</option>
                    <option value="Coffee Shop">Coffee Shop</option>
                    <option value="Home">Home</option>
                    <option value="Outdoors">Outdoors (e.g., park)</option>
                    <option value="Study Room">Study Room</option>
                    <option value="Classroom">Classroom</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="study_method">How do you prefer to study? (Select one)</label>
                <select class="form-control" id="study_method" name="study_method" required>
                    <option value="Solo">Solo</option>
                    <option value="In a group">In a group</option>
                    <option value="A mix of both">A mix of both</option>
                </select>
            </div>

            <!-- Learning Style Section -->
            <h2>Section 3: Learning Style</h2>
            <div class="form-group">
                <label for="learning_style">What is your primary learning style? (Select one)</label>
                <select class="form-control" id="learning_style" name="learning_style" required>
                    <option value="Visual">Visual (e.g., diagrams, charts, videos)</option>
                    <option value="Auditory">Auditory (e.g., lectures, discussions, podcasts)</option>
                    <option value="Reading/Writing">Reading/Writing (e.g., textbooks, notes)</option>
                    <option value="Kinesthetic">Kinesthetic (e.g., hands-on activities, experiments, models)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="note_taking">How do you usually take notes? (Select all that apply)</label>
                <select multiple class="form-control" id="note_taking" name="note_taking[]" required>
                    <option value="Digital">Digital (e.g., laptop, tablet)</option>
                    <option value="Paper and Pen">Paper and Pen</option>
                    <option value="Audio Recording">Audio Recording</option>
                    <option value="Mind Maps">Mind Maps</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="review_method">How do you prefer to review material? (Select all that apply)</label>
                <select multiple class="form-control" id="review_method" name="review_method[]" required>
                    <option value="Re-reading notes">Re-reading notes</option>
                    <option value="Watching videos">Watching videos</option>
                    <option value="Discussing with peers">Discussing with peers</option>
                    <option value="Teaching someone else">Teaching someone else</option>
                    <option value="Doing practice problems">Doing practice problems</option>
                    <option value="Using flashcards">Using flashcards</option>
                    <option value="Summarizing in own words">Summarizing in own words</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Collaboration Preferences Section -->
            <h2>Section 4: Collaboration Preferences</h2>
            <div class="form-group">
                <label for="group_size">What is your preferred group size for study sessions? (Select one)</label>
                <select class="form-control" id="group_size" name="group_size" required>
                    <option value="One-on-One">One-on-One</option>
                    <option value="Small Group">Small Group (3-5 people)</option>
                    <option value="Large Group">Large Group (6+ people)</option>
                    <option value="Mixed">Mixed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="study_frequency">How often would you like to have study sessions? (Select one)</label>
                <select class="form-control" id="study_frequency" name="study_frequency" required>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Bi-weekly">Bi-weekly</option>
                    <option value="Monthly">Monthly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="collaboration_tools">Which collaboration tools do you prefer? (Select all that apply)</label>
                <select multiple class="form-control" id="collaboration_tools" name="collaboration_tools[]" required>
                    <option value="Video Calls">Video Calls</option>
                    <option value="Chat/Messaging">Chat/Messaging</option>
                    <option value="Shared Documents">Shared Documents</option>
                    <option value="In-person Meetings">In-person Meetings</option>
                    <option value="Online Whiteboards">Online Whiteboards</option>
                    <option value="Collaborative Note-taking Apps">Collaborative Note-taking Apps</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Questionnaire</button>
        </form>
    </div>
</body>
</html>
