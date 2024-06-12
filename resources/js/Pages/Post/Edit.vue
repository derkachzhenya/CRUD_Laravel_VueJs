<template>
  <MainLayout>
    <h1 class="text-lg text-center mb-8">Edit</h1>
    <form @submit.prevent="update">
      <div class="mb-5 mx-auto">
        <input
          v-model="form.title"
          class="w-full rounded-xl border-gray-300"
          type="text"
          placeholder="Title"
        />
      </div>
      <div class="mb-5 mx-auto">
        <textarea
          v-model="form.description"
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
          Update
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


// Объявляем props
const props = defineProps({
  post: {
    type: Object,
    required: true,
  },
});

// Инициализируем форму с данными поста
const form = useForm({
  title: props.post.title,
  description: props.post.description,
});

// Обновляем функцию отправки данных
const update = () => {
  form.put(route("post.update", props.post.id), {
    onError: (errors) => {
      console.log(errors); // Отладочный вывод ошибок
    },
    onSuccess: () => {
      // Дополнительные действия после успешного обновления, например, перенаправление
      console.log("Post updated successfully");
    },
  });
};
</script>
  
  <style scoped>
</style>