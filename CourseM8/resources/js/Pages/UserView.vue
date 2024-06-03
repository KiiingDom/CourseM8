<script setup>

import  { ref, onMounted, computed } from 'vue';

const props = defineProps({
  user_id: String,
});

const user = ref({});
//const token = localStorage.getItem('jwt_token'); //might belong in following scope

function fetchUserInfo () {
  fetch(`/users/${props.user_id}`, 
{
  method: 'GET',
  headers: 
  {
    'Content-Type': 'application/json',
    'Authorization': 'Bearer ' + localStorage.getItem('token')    
  }
})
.then(response => {
  if (!response.ok) {
    // Print the response text when an error occurs
    response.text().then(text => {
      console.error(`Error response text: ${text}`);
    });
    throw new Error(`HTTP error! status: ${response.status}`);
  }
  return response.json();
})
.then(data => {
  console.log(data);
  user.value = data.user;
})
.catch(error => {
  console.error("There was an error fetching the user details:", error);
});

    };

    const formattedCreatedAt = computed(() => {
  if (user.value.created_at) {
    const date = new Date(user.value.created_at);
    return date.toLocaleDateString(undefined, {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  } else {
    return '';
  }
});

onMounted(() => { fetchUserInfo();
                });


</script>

<template style>
  <div>

  <div class = "container col-md-10">
  <div v-if="user" class="user-profile card" style ="margin:auto;">
    <div class="row g-0">
      <div class="col-md-2">
        <!-- <div class="profile-picture img-fluid">
          <img :src ="user.photo" alt="Please Work">
          <img src="..\..\images\McLaren.jpg" alt="Please Work">
          <img :src="user.profilePictureUrl" alt="Profile Picture">
        </div> -->
      </div>
      <div class="col-md-10">
        <div class="profile-details row">
          <h2>{{ user.firstName }} {{ user.lastName }}</h2>
          <div class = "username-and-bio">
          <p>{{ user.bio }}</p>
          </div>
          <div class ="title-headings col-md-2">
          <p>Email: <br> Study Areas:<br> Date Joined:</p>
          </div>
          <div class ="title-sub-headings col-md-7">
          <p> {{ user.email }} <br> {{ user.studyAreas }} <br> {{ formattedCreatedAt }} </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div v-else>
    User not found
  </div>

</div>

</div>
</template>


<style scoped>


.user-profile {
  display: flex;
  align-items: flex-start;
  padding: 50px;
}

.profile-picture {
  margin-right: 20px;
  max-width:175px;
}

.profile-picture img {
  width: 100%;
  height: auto;
  border-radius: 50%;
}

.profile-details {
  flex: 1;
}

.profile-details .username-and-bio{
  color:grey;
}
.profile-details .title-headings{
  color:grey;
  font-weight:bold;
}

.profile-details .title-sub-headings{
  font-weight:600;
}

.favorited-cars {
  margin-top: 20px;
}

.favorited-cars .car-holder ul {
  list-style-type: none;
  padding: 0;
}

.favorited-cars .car-holder li {
  margin-bottom: 5px;
}
.favorited-cars .car-holder li img {
  height:50px;
  width:50px;
}
.favorited-cars .car-holder li {
  margin-bottom: 5px;
}

.year-price 
{
  padding:5px;
}

.rounded-green {
    background-color: #34db55;
    border-radius: 5px;
    color:white;
}

.card-img-top 
{
  width:1000px;
  height:1000px;
}
</style>
