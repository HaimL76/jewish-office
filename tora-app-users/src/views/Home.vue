<template>
  <MainMenu msg="Welcome to Your Vue.js App" />
</template>

<script>
export default {
  name: "Home",
  props: {
    msg: String
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
