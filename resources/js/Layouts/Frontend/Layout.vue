<template>
  <div class="bg-white isolate">
    <Header />
    <main>
      <slot />
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from "../../Components/Frontend/Header.vue";
import Footer from "../../Components/Frontend/Footer.vue";
export default {
  components: {
    Header,
    Footer,
  },
};
</script>
