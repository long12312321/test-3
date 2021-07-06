<template>

    <header>
      <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbar1">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <router-link to="home" class="nav-link">Home</router-link>
            </li>
          </ul>
           <ul class="navbar-nav ml-auto">  
           <ul class="navbar-nav">
                <li class="nav-item active">
                     <router-link to="login"  class="nav-link">Login</router-link>
                </li>
           </ul>
           </ul>
        </div>
      </nav>
    </header>
  
</template>

<script>
export default {
  name:"Navbar",
  mounted() {
    console.log("Component mounted.");
  },
  methods:{
    doLogin(){
      this.$router.push({name: 'login'});
    }
  }
};
</script>

 <style>
body {
  font-family: "Nunito", sans-serif;
}
section {
  float: left;
}
</style>
        

