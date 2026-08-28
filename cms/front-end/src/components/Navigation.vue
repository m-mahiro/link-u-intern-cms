<template>
	<el-menu
		:default-active="activeIndex"
		mode="horizontal"
		background-color="#545c64" text-color="#fff" active-text-color="#ffd04b" @select="move">
		<el-menu-item index="TestList">魚一覧</el-menu-item>
		<el-menu-item index="TestForm">魚編集</el-menu-item>
	</el-menu>
</template>

<script>
export default {
	name: "Navigation",
	props: {
		location: String
	},
	setup(props) {
		const move = (index) => {
			switch (index) {
				case 'TestList':
					window.location = '/table'
					break
				case 'TestForm':
					window.location = '/postForm'
					break			
				default:
					console.log("location error!")
					break
			}
		}
		return{
			activeIndex: props.location,
			move: move
		}
	}
}
</script>