<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

// State to determine if the user is authenticated
const isAuthenticated = ref(false);
const userId = ref(localStorage.getItem('user_id'));
const router = useRouter();
const route = useRoute();

// Check authentication state when component is mounted
onMounted(() => {
  isAuthenticated.value = !!localStorage.getItem('jwt_token');
  window.addEventListener('storage', updateUserId);
});

// Remove event listener when component is unmounted
onUnmounted(() => {
  window.removeEventListener('storage', updateUserId);
});

// Function to update userId when it changes in localStorage
function updateUserId(event) {
  if (event.key === 'user_id') {
    userId.value = event.newValue;
  }
}

// Logout method
function logout() {
  const token = localStorage.getItem('jwt_token');
  
  if (token) {
    fetch('/api/v1/logout', {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${token}`,
        'Accept': 'application/json'
      }
    })
    .then(response => {
      if (!response.ok) throw new Error('Logout failed');
      return response.json();
    })
    .then(() => {
      localStorage.removeItem('jwt_token');
      isAuthenticated.value = false;
      router.push('/login'); // Redirect to login page after logout
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
}
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../../images/Screenshot 2024-05-01 222249.png" alt="CourseM8 Logo" width="30" height="30" class="d-inline-block align-text-top">
        CourseM8
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <RouterLink class="nav-link" :class="{ active: $route.path === '/'}" to="/">Home</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" :class="{ active: $route.path === '/about'}" to="/about">About</RouterLink>
          </li>
          <li class="nav-item" v-if="!isAuthenticated">
            <router-link class="nav-link" :class="{ active: $route.path === '/users/create'}" to="/users/create">Sign Up</router-link>
          </li>
          <li class="nav-item" v-if="isAuthenticated">
            <RouterLink class="nav-link" :to="{ name: 'UserView', params: { user_id: userId }}">My Profile</RouterLink>
          </li>
          <li class="nav-item">
            <router-link v-if="!isAuthenticated" to="/login" class="nav-link">Login</router-link>
            <button v-else @click="logout" class="btn btn-link nav-link">Logout</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
/* Add your scoped styles here */
</style>
