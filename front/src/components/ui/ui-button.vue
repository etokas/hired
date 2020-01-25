<template>
    <button @click="e => $emit('click',e)"><slot></slot></button>
</template>

<script>
  export default {
    name: 'ui-button',
    data: () => ({}),
    methods: {},
    computed: {},

  };
</script>

<style scoped>

</style>
