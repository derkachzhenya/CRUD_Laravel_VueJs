<template>
  <MainLayout>
    <h1 class="text-lg text-center mb-8">Posts</h1>
    <div class="mb-8">
      <Link
        :href="route('post.create')"
        class="hover:bg-white hover:text-sky-500 block p-2 w-32 mx-auto bg-sky-500 border border-sky-500 rounded-full text-center text-white"
        >Add post</Link
      >
    </div>

    <div v-if="posts && posts.length">
      <div
        v-for="post in posts"
        :key="post.id"
        class="mb-4 p-4 border rounded-lg"
      >
        <div>id: {{ post.id }}</div>
        <div>title:{{ post.title }}</div>
        <div>description: {{ post.description }}</div>
        <div class="text-sm text-right">{{ post.date }}</div>
        <div>
          <Link class="text-sky-500" :href="route('post.show', post.id)"
            >Show</Link
          >
        </div>
        <div>
          <Link class="text-sky-500" :href="route('post.edit', post.id)"
            >Edit</Link
          >
        </div>
        <div>
          <p
            @click="deletePost(post.id)"
            class="cursor-pointer text-red-500 hover:text-red-700"
          >
            Delete
          </p>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import { router } from '@inertiajs/vue3'

const props = defineProps({
  posts: {
    type: Object,
    required: true,
  },
});


const deletePost = (id) => {
  if (confirm("Are you sure you want to delete this post?")) {
    Inertia.delete(`/posts/${id}`);
  }
};



</script>


<style>
</style>