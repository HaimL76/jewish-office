<template>
  <div class="topnav">
    <a class="active" href="#home">דף הבית</a>
    <a href="#news">חידושי תורה</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <!--<router-link to='/'> Home</router-link>-->
    <!--<router-link to='/contact'>Contact </router-link>-->
  </div>
</template>

<script>
export default {
  name: "MainMenu",
  props: {
    msg: String
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4caf50;
  color: white;
}
</style>
