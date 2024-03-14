<template>
  <div>
    <Navbar />
    <!-- <h1>CinemaVilla</h1> -->
    <!-- <nav>
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </nav> -->
    <router-view />
    <Footer />
    
  </div>
</template>

<script setup>
  import Navbar from './components/navbar.vue';
  import Footer from './components/footer.vue';
</script>