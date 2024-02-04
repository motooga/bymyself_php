<script setup>

defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
  <div class="card">
    
    <div class="card-body">
        <a class="link-opacity-25-hover" href="#">
          <h5 class=" card-title">{{ value }}</h5>
        </a>
        <p class="card-text">{{ value }}</p>
    </div>
  </div>
</template>


