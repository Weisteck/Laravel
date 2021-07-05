<template>
  <div id="app">
    {{data}}
  </div>
</template>

<script>
import {api} from "./api/config";

export default {
  name: 'App',
  data(){
    return{
      data:[]
    }
  },
  methods: {
    async getData() {
      try {
        const response = await api.get('/organisations')
        console.log(response)
        this.data = response.data
      } catch (e) {
        console.error(e)
      }
    }
  },
  created() {
    this.getData()
  }
}
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
