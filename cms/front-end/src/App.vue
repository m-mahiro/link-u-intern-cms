<script>

import TestList from './components/TestList.vue'
import TestForm from './components/TestForm.vue'
import Navigation from './components/Navigation.vue'

export default {
  name: 'App',
  components: {
    TestList: TestList,
    TestForm: TestForm,
    Navigation,
  },
  setup() {
    return {
      Component: window.data.component_name,
      ComponentData: window.data.component_data,
    }
  }
}
</script>

<template>
  <div>
    <Navigation :location="Component"/>
    <TestList v-if="Component === `TestList`" :fish_data="ComponentData" />
    <TestForm v-if="Component === `TestForm`" :formData="ComponentData"/>
  </div>
</template>