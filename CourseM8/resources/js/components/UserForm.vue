<script setup>
import { ref } from 'vue';

const firstName = ref('');
const lastName = ref('');
const email = ref('');
const bio = ref('');
const age = ref('');
const studyAreas = ref('');
const message = ref(null);

const saveUser = async () => {
  try {
    const token = localStorage.getItem('jwt_token');
    const formData = new FormData();
    formData.append('firstName', firstName.value);
    formData.append('lastName', lastName.value);
    formData.append('email', email.value);
    formData.append('bio', bio.value);
    formData.append('age', age.value);
    formData.append('studyAreas', studyAreas.value);

    const response = await fetch('/api/v1/auth/signup', {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json',
        'Authorization': `Bearer ${token}`,
      },
    });

    if (response.ok) {
      const data = await response.json();
      console.log(data);
      const token = data.jwt_token; // Assuming the token key is 'jwt_token' in the response
      localStorage.setItem('jwt_token', token);
      message.value = { type: 'success', text: 'User added successfully' };
      window.location.href = '/dashboard'; // Redirect to the dashboard or any other authenticated page
      // Display a success message or perform other actions
    } else {
      message.value = { type: 'error', text: 'Failed to add user' };
    }
  } catch (error) {
    message.value = { type: 'error', text: 'Failed to add user' };
    console.error(error);
    // Handle error, display an error message, etc.
  }
};


</script>

<template>
  <div class="container mt-5">
    <h2>Add New User</h2>

        <div v-if="message" :class="['alert', message.type === 'success' ? 'alert-success' : 'alert-danger']">{{ message.text }}</div>

    <form id="userForm" @submit.prevent="saveUser" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="firstName" class="form-label">First Name:</label>
        <input type="text" id="firstName" v-model="firstName" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="lastName" class="form-label">Last Name:</label>
        <input type="text" id="lastName" v-model="lastName" class="form-control" required>
      </div>
      
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" v-model="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="bio" class="form-label">Bio:</label>
        <textarea id="bio" v-model="bio" class="form-control" required></textarea>
      </div>

      <div class="mb-3">
        <label for="age" class="form-label">Age:</label>
        <input type="number" id="age" v-model="age" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="cars">Choose your Country:</label><br>
<select name="Location" id="location">
  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
  <option value="Jamaica">Jamaica</option>
  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
  <option value="Barbados">Barbados</option>
</select class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="Study Style">Choose your Study Style:</label><br>
<select name="LocationStudy" id="locationStudy">
  <option value="In person">In person</option>
  <option value="Virtual">Virtual</option>
</select class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="Preferred Study Time">Choose your Optimum Studying Time:</label><br>
<select name="Time" id="Time">
  <option value="Morning">Morning (Early Worm)</option>
  <option value="Afternoon">Afternoon (Sun Sparrow)</option>
  <option value="Night">Night (Night Owl)</option>
</select class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="studyAreas" class="form-label">Study Area:</label>
        <textarea id="studyAreas" v-model="studyAreas" class="form-control" required multiple></textarea>
      </div>

      <div>
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
    </form>
  </div>
</template>
