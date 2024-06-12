<template>
  <MainLayout>
    <h1 class="text-lg text-center mb-8">Show</h1>
    <div>
      <Link class="text-gray-500" :href="route('post.index')">Return</Link>
    </div>

    <div v-if="post">
      <div class="mb-4 p-4 border rounded-lg">
        <div>id: {{ post.id }}</div>
        <div>title: {{ post.title }}</div>
        <div>description: {{ post.description }}</div>
        <div class="text-sm text-right">{{ post.date }}</div>      
      </div>
    </div>
    <div v-else>
      <p class="text-center">No post available.</p>
    </div> 
  </MainLayout>
</template>
  
  <script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    post: {
      type: Object,
      required: true
    }
  });
</script>
  
  <style scoped>
</style>