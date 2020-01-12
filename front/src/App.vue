<template>
  <div id="app">
    <header>
      <router-link to="/">Go to Foo</router-link>
      <router-link to="/deposer-une-offre">Déposer une offre</router-link>
    </header>
    <div class="main">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>

export default {
  name: 'app',
}
</script>

<style>
  @import url('https://fonts.googleapis.com/css?family=Roboto:300,300i,700,700i&display=swap');

  *{
    margin:0;
    padding:0;
  }

  body {
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
  }

  .main {
    display: flex;
    margin: 1em auto;
    max-width: 800px;
    width: 95%;
  }

  .hidden {
    display: none;
  }


  .help-text {
    font-size: 14px;
    margin: 5px 0;
    font-style: italic;
  }

  ::placeholder, .multiselect__placeholder {
    color: #97999d;
    font-size: 15px;
    font-style: italic;
    font-weight: bold;
  }

</style>
