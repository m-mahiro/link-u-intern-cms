<script setup>
import { ref } from 'vue'
import heroImg from '../assets/hero.png'
import viteLogo from '../assets/vite.svg'
import vueLogo from '../assets/vue.svg'

const data = window.data.component_data;

</script>

<template>
  <el-button>{{ data }}</el-button>
</template>
