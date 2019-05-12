<template>
	<div class="card card-about-me">
        <div class="header">
            <h2>ABOUT ME</h2>
        </div>
        <div class="body">
            <ul>
                <li>
                    <div class="title">
                        <i class="material-icons">library_books</i>
                        Education
                    </div>
                    <div class="content">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </div>
                </li>
                <li>
                    <div class="title">
                        <i class="material-icons">location_on</i>
                        Location
                    </div>
                    <div class="content">
                        Malibu, California
                    </div>
                </li>
                <li>
                    <div class="title">
                        <i class="material-icons">edit</i>
                        Skills
                    </div>
                    <div class="content">
                        <span class="label bg-red">UI Design</span>
                        <span class="label bg-teal">JavaScript</span>
                        <span class="label bg-blue">PHP</span>
                        <span class="label bg-amber">Node.js</span>
                    </div>
                </li>
                <li>
                    <div class="title">
                        <i class="material-icons">notes</i>
                        Description
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
		prop:['profile'],
		data(){
			return{
			
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>
	.card-about-me{
	    padding: 10px;
	    .header{
	        text-align: center;
	    }
	    .body ul {
	        margin: 0;
	        padding: 0;
	        list-style: none;
	        li {
	            border-bottom: 1px solid #eee;
	            margin-bottom: 10px;
	            padding-bottom: 15px;

	            .title {
	                font-weight: bold;
	                color: #666;

	                i {
	                    margin-right: 2px;
	                    position: relative;
	                    top: 7px; 
	                } 
	            }
	            .content {
	                margin-top: 10px;
	                color: #999;
	                font-size: 13px; 
	            } 
	        }
	        li:last-child {
	            border: none;
	            margin-bottom: 0;
	            padding-bottom: 0; 
	        } 
	    }
	}

</style>