<template>
		

		<div class="avatar" v-bind:style="style">
			
			<table>
			  <tbody>
				<tr>
				  <td v-if="!hasImage">{{initials}}</td>
				</tr>
			  </tbody>
			</table>
			
		</div>
		
	
</template>

<script type="text/javascript">
	export default{
		props: {
		    fullname: { type: String, default: '##' },
		    size: { type: Number, default: 48 },
		    radius: { type: Number, default: 50, validator: (value) => value >= 0 && value <= 50 },
		    color: { type: String, default: '' },
		    image: { type: String, default: '' }
		},
		data(){
			return{
				url:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg6AbD1GNiwzJwmG5vl2V8QwDyfjae_ygW-Q5KrJLAe0uffm4tEw'

			}
		},
		watch:{
			user () {
				if(this.user.profile !==null){
					console.log(this.user.profile)
				}
		        //return (this.user.profile !== '')
		    }
		},
		computed:{
			style () {
		        var fontSize = this.initials.length > 2 ? this.size / 3 : this.size / 2
		        return {
		          'width': this.size + 'px',
		          'height': this.size + 'px',
		          'border-radius': this.radius + '%',
		          'font-size': fontSize + 'px',
		          'background-color': this.color === '' ? this.toColor(this.fullname) : this.color,
		          'background-image': this.hasImage ? 'url(' + this.image + ')' : 'none'
		        }
		    },
		    hasImage () {
		        return (this.image !== '')
		    },
		    initials () {
		        var words = this.fullname.split(/[\s-]+/)
		        var intls = ''
		        for (var i = 0; i < words.length; i++) {
		          intls += words[i].substr(0, 1).toUpperCase()
		        }
		        if (intls.length > 3) {
		          intls = intls.substr(0, 3)
		        }
		        return intls
		    },
		},
		methods:{
			toColor (str) {
		        var hash = 0
		        var len = str.length
		        if (len === 0) return 'white'
		        for (var i = 0; i < len; i++) {
		          hash = ((hash << 8) - hash) + str.charCodeAt(i)
		          hash |= 0
		        }
		        hash = Math.abs(hash)
		        return '#' + hash.toString(16).substr(0, 6)
		      }
		},
		created(){
		
		}
	};

</script>

<style lang="scss" scoped>
	
	.avatar {
		display: inline-block;
		background-color: black;
		color: white;
		width: 48px;
		height: 48px;
		font-size: 12px;
		border-radius: 50%;
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-image: none;
	}
	  
	.avatar table {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
	}
	  
	.avatar table td{
		text-align: center !important;
		vertical-align: middle !important;
		fontSize:500px;
	}
	.avatar img {
		width: 100%;
		overflow: hidden;
	}
  
  
</style>