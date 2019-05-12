<template>
	 <div class="card profile-card">
        <div class="profile-header">&nbsp;</div>
        <div class="profile-body">
            <div class="image-area">
                <img :src=profile.avatar_url />
            </div>                                       
            <div class="content-area">
                <h3>{{user.firstname}} {{user.lastname}}</h3>
                <p>{{profile.designation}}</p>
                <span v-for="role in roles" class="label label-info label-many">{{role}}</span>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
        props:['user','profile','roles'],
		data(){
			return{
               
			}
		},
		watch:{

		},
		methods:{
		
		},
		mounted(){
		    
		}
	};

</script>

<style lang="scss">
    .profile-card{
        .profile-header {
            background-color: #ad1455;
            padding: 42px 0; 
        }

        .profile-body{

            .image-area {
                text-align: center;
                margin-top: -64px;
                border-radius: 50%;
                
                img {
                    border: 2px solid #ad1455;
                    padding: 2px;
                    margin: 2px;
                    -webkit-border-radius: 50%;
                    -moz-border-radius: 50%;
                    -ms-border-radius: 50%;
                    border-radius: 50%;
                    height: 200px;
                    width: 200px; 
                } 
            }

            .content-area {
                text-align: center;
                border-bottom: 1px solid #ddd;
                padding-bottom: 15px;

                p {
                    font-weight: 600;
                    color: #ad1455;
                    margin-top: 5px;  
                }
                p:last-child {
                    font-weight: 600;
                    color: #ad1455;
                    margin-top: 5px; 
                }
                span{
                    font-weight: 600;
                    margin-bottom: 2px;
                }
                .label-many{
                    margin-right: 5px;
                } 
            }
        }

        .profile-footer {
            padding: 15px;
            ul {
                margin: 0;
                padding: 0;
                list-style: none;

                li {
                    border-bottom: 1px solid #eee;
                    padding: 10px 0;

                    span:first-child {
                        font-weight: bold; 
                    }
                    span:last-child {
                        float: right; 
                    } 
                }
                li:last-child {
                    border-bottom: none;
                    margin-bottom: 15px; 
                }

                
            }
        }
    }
</style>