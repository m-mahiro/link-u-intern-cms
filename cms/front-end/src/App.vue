<script>
import TestList from './components/TestList.vue'
export default {
  name: 'App',
  components: {
    TestList: TestList,
  },
  setup() {
    return {
      fishData: window.data.component_data
    }
  }
}
</script>

<template>
	<TestList
	 :fish_data = "fishData"
  ></TestList>
</template>