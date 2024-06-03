<template>
    <div class="container mt-5">
      <h1>Matching Results</h1>
      <div v-if="successMessage" class="alert alert-success">
        {{ successMessage }}
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Matching Score (%)</th>
            <th>Common Tags</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="result in matchingResults" :key="result.user.id">
            <td>{{ result.user.firstName }} {{ result.user.lastName }}</td>
            <td>{{ result.percentage }}%</td>
            <td>
              Study Preferences: {{ result.commonTags.studyPreferences.join(', ') }}<br>
              Study Locations: {{ result.commonTags.studyLocations.join(', ') }}<br>
              Note Taking: {{ result.commonTags.noteTaking.join(', ') }}<br>
              Review Methods: {{ result.commonTags.reviewMethods.join(', ') }}<br>
              Collaboration Tools: {{ result.commonTags.collaborationTools.join(', ') }}<br>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        successMessage: null,
        matchingResults: []
      };
    },
    created() {
      this.successMessage = this.$route.query.success;
      // Fetch matching results from API
      fetch('/api/matching-results')
        .then(response => response.json())
        .then(data => {
          this.matchingResults = data;
        });
    }
  };
  </script>
  
  <style scoped>
  /* Add any necessary styles */
  </style>
  