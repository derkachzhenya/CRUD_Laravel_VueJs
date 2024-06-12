<template>
  <header></header>

  <main>
    <div class="w-96 mx-auto pt-8">
      <h1 class="text-xl mb-8">My post side</h1>

      <slot></slot>
    </div>
  </main>

  <footer></footer>
</template>

<script>
export default {
  name: "MainLayout",
};
</script>

<style>
</style>
