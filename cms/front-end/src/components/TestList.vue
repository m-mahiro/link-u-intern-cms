<template>
  <div>
    <h1>魚リスト</h1>
    <el-table :data="fishList" @row-click="onRowClick" style="cursor: pointer;">
        <el-table-column prop="id" label="ID"></el-table-column>
        <el-table-column prop="name" label="名前"></el-table-column>
        <el-table-column prop="comment" label="コメント"></el-table-column>
    </el-table>
  </div>
</template>

<script>
export default {
  name: "TestList",
  props: {
    fish_data: Array,
  },
  setup(props) {
    const onRowClick = (row) => {
      window.location.href = `/postForm?id=${row.id}`
    }
    return {
      fishList: props.fish_data,
      onRowClick,
    };
  },
};
</script>