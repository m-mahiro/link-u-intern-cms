<script setup>

import {ref, watch, toRaw} from 'vue'
import axios from 'axios'

// propsの定義（親コンポーネントから受け取るデータ）
const props = defineProps({
    formData: {
        type: Object,
        default: () => ({name: '', comment: ''})
    }
})

// リアクティブなフォームデータを作成（props未定義の場合もデフォルト値を保証）
const inputForm = ref(props.formData ?? {name: '', comment: ''})

// // emitsの定義（親コンポーネントへイベントを通知する）
// const emit = defineEmits(['update:formData'])

// // inputFormの変化を監視して親に通知
// watch (inputForm, (newVal) => {
//     emit('update:formData', newVal)
// }, {deep: true})

// 保存処理
const save = async () => {
    const data = toRaw(inputForm.value)
    const path = 'http://localhost:8080/Controller/TestFormPostController.php'
    try {
        await axios.post(path, data).then((response) => {
            console.log(response);
        })
        console.log('保存しました!')
    } catch (e) {
        console.log('保存に失敗しました。')
        console.error(e);
    }
}
</script>

<template>
    <div>
        <el-input v-model="inputForm.name" placeholder="名前"/>
        <el-input v-model="inputForm.comment" placeholder="コメント"/>
        <button @click="save">保存</button>
    </div>
</template>
