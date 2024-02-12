<script setup>
defineProps({ Users:Array })

</script>

<template>
  <tr v-for="user in users" :key="user.id">
    <td>{{ user.id }}</td>
    <td>{{ user.nickname }}</td>
  </tr>
</template>
