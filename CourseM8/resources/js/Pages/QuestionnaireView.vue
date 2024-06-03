<template>
    <div class="container mt-5">
      <h1>Questionnaire</h1>
      <form method="POST" action="{{ route('questionnaire.store') }}">
        @csrf
        <!-- Basic Information Section -->
        <h2>Section 1: Basic Information</h2>
        <div class="form-group">
          <label for="course"><strong>What course are you currently enrolled in?</strong></label>
          <input type="text" class="form-control" id="course" name="course" required>
        </div>
        <div class="form-group">
          <label for="year_of_study"><strong>What year of study are you in?</strong></label>
          <select class="form-control" id="year_of_study" name="year_of_study" required>
            <option value="First year">First year</option>
            <option value="Second year">Second year</option>
            <option value="Third year">Third year</option>
            <option value="Fourth year or higher">Fourth year or higher</option>
          </select>
        </div>
        <div class="form-group">
          <label for="major"><strong>What is your major or primary field of study?</strong></label>
          <input type="text" class="form-control" id="major" name="major" required>
        </div>
        <div class="form-group">
          <label for="career_aspirations"><strong>What are your future career aspirations?</strong></label>
          <input type="text" class="form-control" id="career_aspirations" name="career_aspirations" required>
        </div>
  
        <!-- Study Preferences Section -->
        <h2>Section 2: Study Preferences</h2>
        <div class="form-group">
          <label for="study_preferences"><strong>When do you prefer to study? (Select all that apply)</strong></label>
          <div>
            <input type="checkbox" id="early_morning" name="study_preferences[]" value="Early Morning">
            <label for="early_morning">Early Morning (6 AM - 9 AM)</label>
          </div>
          <div>
            <input type="checkbox" id="late_morning" name="study_preferences[]" value="Late Morning">
            <label for="late_morning">Late Morning (9 AM - 12 PM)</label>
          </div>
          <div>
            <input type="checkbox" id="afternoon" name="study_preferences[]" value="Afternoon">
            <label for="afternoon">Afternoon (12 PM - 3 PM)</label>
          </div>
          <div>
            <input type="checkbox" id="late_afternoon" name="study_preferences[]" value="Late Afternoon">
            <label for="late_afternoon">Late Afternoon (3 PM - 6 PM)</label>
          </div>
          <div>
            <input type="checkbox" id="evening" name="study_preferences[]" value="Evening">
            <label for="evening">Evening (6 PM - 9 PM)</label>
          </div>
          <div>
            <input type="checkbox" id="night" name="study_preferences[]" value="Night">
            <label for="night">Night (9 PM - 12 AM)</label>
          </div>
          <div>
            <input type="checkbox" id="late_night" name="study_preferences[]" value="Late Night">
            <label for="late_night">Late Night (12 AM - 3 AM)</label>
          </div>
        </div>
  
        <div class="form-group">
          <label for="study_location"><strong>Where do you prefer to study? (Select all that apply)</strong></label>
          <div>
            <input type="checkbox" id="library" name="study_location[]" value="Library">
            <label for="library">Library</label>
          </div>
          <div>
            <input type="checkbox" id="coffee_shop" name="study_location[]" value="Coffee Shop">
            <label for="coffee_shop">Coffee Shop</label>
          </div>
          <div>
            <input type="checkbox" id="home" name="study_location[]" value="Home">
            <label for="home">Home</label>
          </div>
          <div>
            <input type="checkbox" id="outdoors" name="study_location[]" value="Outdoors">
            <label for="outdoors">Outdoors (e.g., park)</label>
          </div>
          <div>
            <input type="checkbox" id="study_room" name="study_location[]" value="Study Room">
            <label for="study_room">Study Room</label>
          </div>
          <div>
            <input type="checkbox" id="classroom" name="study_location[]" value="Classroom">
            <label for="classroom">Classroom</label>
          </div>
          <div>
            <input type="checkbox" id="other_study_location" name="study_location[]" value="Other">
            <label for="other_study_location">Other</label>
          </div>
        </div>
  
        <div class="form-group">
          <label for="study_method"><strong>How do you prefer to study? (Select one)</strong></label>
          <select class="form-control" id="study_method" name="study_method" required>
            <option value="Solo">Solo</option>
            <option value="In a group">In a group</option>
            <option value="A mix of both">A mix of both</option>
          </select>
        </div>
  
        <!-- Learning Style Section -->
        <h2>Section 3: Learning Style</h2>
        <div class="form-group">
          <label for="learning_style"><strong>What is your primary learning style? (Select one)</strong></label>
          <select class="form-control" id="learning_style" name="learning_style" required>
            <option value="Visual">Visual (e.g., diagrams, charts, videos)</option>
            <option value="Auditory">Auditory (e.g., lectures, discussions, podcasts)</option>
            <option value="Reading/Writing">Reading/Writing (e.g., textbooks, notes)</option>
            <option value="Kinesthetic">Kinesthetic (e.g., hands-on activities, experiments, models)</option>
          </select>
        </div>
  
        <div class="form-group">
          <label for="note_taking"><strong>How do you usually take notes? (Select all that apply)</strong></label>
          <div>
            <input type="checkbox" id="digital" name="note_taking[]" value="Digital">
            <label for="digital">Digital (e.g., laptop, tablet)</label>
          </div>
          <div>
            <input type="checkbox" id="paper_pen" name="note_taking[]" value="Paper and Pen">
            <label for="paper_pen">Paper and Pen</label>
          </div>
          <div>
            <input type="checkbox" id="audio_recording" name="note_taking[]" value="Audio Recording">
            <label for="audio_recording">Audio Recording</label>
          </div>
          <div>
            <input type="checkbox" id="mind_maps" name="note_taking[]" value="Mind Maps">
            <label for="mind_maps">Mind Maps</label>
          </div>
          <div>
            <input type="checkbox" id="other_note_taking" name="note_taking[]" value="Other">
            <label for="other_note_taking">Other</label>
          </div>
        </div>
  
        <div class="form-group">
          <label for="review_method"><strong>How do you prefer to review material? (Select all that apply)</strong></label>
          <div>
            <input type="checkbox" id="re_reading_notes" name="review_method[]" value="Re-reading notes">
            <label for="re_reading_notes">Re-reading notes</label>
          </div>
          <div>
            <input type="checkbox" id="watching_videos" name="review_method[]" value="Watching videos">
            <label for="watching_videos">Watching videos</label>
          </div>
          <div>
            <input type="checkbox" id="discussing_with_peers" name="review_method[]" value="Discussing with peers">
            <label for="discussing_with_peers">Discussing with peers</label>
          </div>
          <div>
            <input type="checkbox" id="teaching_someone_else" name="review_method[]" value="Teaching someone else">
            <label for="teaching_someone_else">Teaching someone else</label>
          </div>
          <div>
            <input type="checkbox" id="doing_practice_problems" name="review_method[]" value="Doing practice problems">
            <label for="doing_practice_problems">Doing practice problems</label>
          </div>
          <div>
            <input type="checkbox" id="using_flashcards" name="review_method[]" value="Using flashcards">
            <label for="using_flashcards">Using flashcards</label>
          </div>
          <div>
            <input type="checkbox" id="summarizing_own_words" name="review_method[]" value="Summarizing in own words">
            <label for="summarizing_own_words">Summarizing in own words</label>
          </div>
          <div>
            <input type="checkbox" id="other_review_method" name="review_method[]" value="Other">
            <label for="other_review_method">Other</label>
          </div>
        </div>
  
        <!-- Collaboration Preferences Section -->
        <h2>Section 4: Collaboration Preferences</h2>
        <div class="form-group">
          <label for="group_size"><strong>What is your preferred group size for study sessions? (Select one)</strong></label>
          <select class="form-control" id="group_size" name="group_size" required>
            <option value="One-on-One">One-on-One</option>
            <option value="Small Group">Small Group (3-5 people)</option>
            <option value="Large Group">Large Group (6+ people)</option>
            <option value="Mixed">Mixed</option>
          </select>
        </div>
  
        <div class="form-group">
          <label for="study_frequency"><strong>How often would you like to have study sessions? (Select one)</strong></label>
          <select class="form-control" id="study_frequency" name="study_frequency" required>
            <option value="Daily">Daily</option>
            <option value="Weekly">Weekly</option>
            <option value="Bi-weekly">Bi-weekly</option>
            <option value="Monthly">Monthly</option>
          </select>
        </div>
  
        <div class="form-group">
          <label for="collaboration_tools"><strong>Which collaboration tools do you prefer? (Select all that apply)</strong></label>
          <div>
            <input type="checkbox" id="video_calls" name="collaboration_tools[]" value="Video Calls">
            <label for="video_calls">Video Calls</label>
          </div>
          <div>
            <input type="checkbox" id="chat_messaging" name="collaboration_tools[]" value="Chat/Messaging">
            <label for="chat_messaging">Chat/Messaging</label>
          </div>
          <div>
            <input type="checkbox" id="shared_documents" name="collaboration_tools[]" value="Shared Documents">
            <label for="shared_documents">Shared Documents</label>
          </div>
          <div>
            <input type="checkbox" id="in_person_meetings" name="collaboration_tools[]" value="In-person Meetings">
            <label for="in_person_meetings">In-person Meetings</label>
          </div>
          <div>
            <input type="checkbox" id="online_whiteboards" name="collaboration_tools[]" value="Online Whiteboards">
            <label for="online_whiteboards">Online Whiteboards</label>
          </div>
          <div>
            <input type="checkbox" id="collaborative_note_taking_apps" name="collaboration_tools[]" value="Collaborative Note-taking Apps">
            <label for="collaborative_note_taking_apps">Collaborative Note-taking Apps</label>
          </div>
          <div>
            <input type="checkbox" id="other_collaboration_tools" name="collaboration_tools[]" value="Other">
            <label for="other_collaboration_tools">Other</label>
          </div>
        </div>
  
        <button type="submit" class="btn btn-primary">Submit Questionnaire</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: 'QuestionnaireView'
  };
  </script>
  
  <style scoped>
  /* Add any necessary styles */
  </style>
