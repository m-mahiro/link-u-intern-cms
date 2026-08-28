<script>

import TestList from './components/TestList.vue'
import TestForm from './components/TestForm.vue'

export default {
  name: 'App',
  components: {
    TestList: TestList,
    TestForm: TestForm,
  },
  setup() {
    return {
      Component: window.data.component_name,
      fishData: window.data.component_data,
      formData: window.data.form_data
    }
  }
}
</script>

<template>
  <div>
    <TestList
      v-if="Component === `TestList`"
      v-bind:fish_data="fishData"
    ></TestList>

    <TestForm
      v-if="Component === `TestForm`"
      v-bind:formData="formData"
    ></TestForm>

  </div>
</template>