<template>
  <input type="text" :value="value" @input="$event => $emit('input',$event)">
</template>

<script>
  export default {
    name: 'ui-input',
    data: () => ({}),
    props: {
      value: {
        required: true
      }
    },
    methods: {},
    computed: {},
  };
</script>

<style scoped>

</style>
