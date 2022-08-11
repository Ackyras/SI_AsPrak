<template>
  <footer class="block py-4">
    <div class="container mx-auto px-4">
      <hr class="mb-4 border-b-2 border-gray-400" />
      <div class="flex flex-wrap items-center justify-center">
        <div class="w-full md:w-4/12 px-4">
          <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
            Copyright © {{ date }} Lab. MM ITERA
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>
<script>
export default {
  data() {
    return {
      date: new Date().getFullYear(),
    };
  },
};
</script>
