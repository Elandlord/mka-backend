<template>
<div>
	<a
		class=" 
			space-inside-sides-md space-inside-sm 
			block
			bg-hover-main
			transition-fast 
			outline-none
			text-color-accent text-hover-light text-bold-hover text-bold font-sm"

	 	:href="id"> 

		<!-- icon -->
	 	<i  class="material-icons font-lg space-inside-right-sm">{{ icon }}</i>

		<span style="position: relative; bottom: 3px;"><slot></slot> </span>
	</a>

</div>
</template>

<script type="text/javascript">
	export default {
		props: {
			id: null,
			icon: null,
		}, 
		data(){
			return {
				url: this.getUrl(),
				innerId: this.setInnerId(this.id),
			}
		},

		mounted() {
			this.getUrl();
		},
		methods: {
			getUrl() {
				this.url = window.location.pathname.substring(1, window.location.pathname.length);
			},
			setInnerId(id) {

				if(id !== '') {
					return '/'; 
				}
				return '/';
			}
		}
	}
</script>