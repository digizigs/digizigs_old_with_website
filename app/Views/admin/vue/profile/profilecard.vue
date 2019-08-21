<template>
	 <div class="card profile-card">
        <div class="profile-header">&nbsp;</div>
        <div class="profile-body">
            <div class="image-area">
                <avatar :fullname="fullname" :image="image" :size="180"></avatar>
            </div>                                       
            <div class="content-area">
                <h3>{{user.name}}</h3>
                <p>{{user.designation}}</p>
                <span v-for="role in roles" class="label label-info label-many">{{role}}</span>
            </div>

            <div class="body description-area">
                <ul>                  
                    <li>
                        <div class="title">
                            <i class="material-icons">grade</i>
                            Skills
                        </div>
                        <div class="content">
                            {{profile.skills}}
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">notes</i>
                            Description
                        </div>
                        <div class="content">
                            {{profile.description}}
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
        props:['user','roles','profile'],
		data(){
			return{
              initial:'',
              url:'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg6AbD1GNiwzJwmG5vl2V8QwDyfjae_ygW-Q5KrJLAe0uffm4tEw',
              fullname:'',
              image:''
			}
		},
		watch:{
            user(){
                this.fullname = this.user.name
            },
            profile(){
                this.image = this.profile.avatar_url
            }
		},
        computed: {
          // compute initials from fullname
          
        },  
		methods:{
		  noimageurl(){
            this.user.avatar_url ='/digizigs/public/uploads/avatars/avatar.png' 
          }
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
                //background: #f9f9f9;
                width: 180px;
                height: 180px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                //-webkit-box-pack: center;
                //-ms-flex-pack: center;
                //justify-content: center;
                border-radius:50%;
                margin: 0 auto;
                margin-top: -50px;
                
                img {
                    //border: 2px solid #ad1455;
                    //padding: 2px;
                    //margin: 2px;
                    //-webkit-border-radius: 50%;
                    //-moz-border-radius: 50%;
                    //-ms-border-radius: 50%;
                    border-radius: 50%;
                    height: 100%;
                    width: 100%;
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

            .body.description-area{
                padding: 20px;
                ul{
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