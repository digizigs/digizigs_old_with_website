<template>
    <div class="avatar">
        <span v-if="!hasImage" class="avatar-initial rounded-circle bg-indigo"  v-bind:style="style1">
            {{initials}}
        </span>
        <span v-else class="avatar-initial rounded-circle"  v-bind:style="style2">
            
        </span>
    </div>
</template>


<script type="text/javascript">
	export default{
		props: {
		    fullname: { type: String, default: '##' },
		    size: { type: Number, default: 35 },
		    radius: { type: Number, default: 50, validator: (value) => value >= 0 && value <= 50 },
		    color: { type: String, default: '' },
		    image: { type: String, default: '' }
		},
		data(){
			return{
                
			}
		},
		watch:{
			
		},
		computed:{
            style1 () {
                var fontSize = this.initials.length > 2 ? this.size / 3 : this.size / 2
                return {
                    
                    'background-color': this.color === '' ? this.toColor(this.fullname) : this.color,
					'height':this.size + 'px',
					'width':this.size + 'px'
                }
            },
            style2 () {
                var fontSize = this.initials.length > 2 ? this.size / 3 : this.size / 2
                return {
                    'background-size': 'cover',
                    'background-color': this.color === '' ? this.toColor(this.fullname) : this.color,
					'background-image': this.hasImage ? 'url(' + this.image + ')' : 'none',
					'height':this.size + 'px',
					'width':this.size + 'px'
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
		        if (intls.length > 1) {
		          intls = intls.slice(0,2)
		        }
		        return intls
            }
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
	
	
</style>