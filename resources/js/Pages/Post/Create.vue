<template>
  <MainLayout>
    <h1 class="text-lg text-center mb-8">Create</h1>
    <form @submit.prevent="store">
      <div class="mb-5 mx-auto">
        <input
          v-model="title"
          class="w-full rounded-xl border-gray-300"
          type="text"
          placeholder="Title"
        />
      </div>
      <div class="mb-5 mx-auto">
        <textarea
          v-model="description"
          class="w-full rounded-xl border-gray-300"
          type="text"
          placeholder="Description"
        ></textarea>
      </div>
      <div class="flex mb-8">
        <button
          class="hover:bg-white hover:text-sky-500 block p-2 w-32 mx-auto bg-sky-500 border border-sky-500 rounded-full text-center text-white"
          type="submit"
        >
          Store
        </button>
        <Link
          :href="route('post.index')"
          class="hover:bg-white hover:text-sky-500 block p-2 w-32 mx-auto bg-sky-500 border border-sky-500 rounded-full text-center text-white"
          >Back</Link
        >
      </div>
    </form>
  </MainLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

// Объявляем реактивные переменные
const title = ref("");
const description = ref("");

const store = () => {
  const form = useForm({ title: title.value, description: description.value });
  form.post("/posts");
};
</script>

<style scoped>
</style>