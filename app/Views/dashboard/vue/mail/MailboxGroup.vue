<template>
	<div class="mail-group">

    <div class="mail-group-header">
      <i data-feather="search"></i>
      <div class="search-form">
        <input type="search" class="form-control" placeholder="Search mail">
      </div><!-- search-form -->
    </div><!-- mail-group-header -->

    <div class="mail-group-body">
      
      <div class="pd-y-15 pd-x-20 d-flex justify-content-between align-items-center">
        <h6 class="tx-uppercase tx-semibold mg-b-0">Inbox</h6>
        <div class="dropdown tx-13">
          <span class="tx-color-03">Sort:</span> <a href="" class="dropdown-link link-02">Date</a>
        </div><!-- dropdown -->
      </div>

      <label class="mail-group-label">Today</label>
      <ul class="list-unstyled media-list mg-b-0">
        <li v-for="mail in mails" v-bind:key="mail.id" class="media unread" @click="viewmail(mail)">
          <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo">d</span></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Dyanne Aceron</span>
              <span class="tx-11">1:20pm</span>
            </div>
            <h6 class="tx-13">Just asking questions</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
          </div><!-- media-body -->
        </li>
      </ul>

      <label class="mail-group-label">Yesterday</label>
      <ul class="list-unstyled media-list mg-b-0">
        <li class="media">
          <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Yassi Pressman</span>
              <span class="tx-11">8:20pm</span>
            </div>
            <h6 class="tx-13">Envato Contributor Payment</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
          </div><!-- media-body -->
        </li>
        <li class="media unread">
          <div class="avatar"><span class="avatar-initial rounded-circle bg-teal">i</span></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Isidore Dilao</span>
              <span class="tx-11">06:42pm</span>
            </div>
            <h6 class="tx-13">America's Best Dance Cruise</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
          </div><!-- media-body -->
        </li>
      </ul>

      <label class="mail-group-label">January 20</label>
      <ul class="list-unstyled media-list mg-b-0">
        <li class="media">
          <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Dexter Dela Cruz</span>
              <span class="tx-11">4:18pm</span>
            </div>
            <h6 class="tx-13">A Flaming Pile of Garbage</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
          </div><!-- media-body -->
        </li>
        <li class="media">
          <div class="avatar"><span class="avatar-initial rounded-circle bg-primary">a</span></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Adrian Monino</span>
              <span class="tx-11">06:42pm</span>
            </div>
            <h6 class="tx-13">America's Best Dance Cruise</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
          </div><!-- media-body -->
        </li>
      </ul>

      <label class="mail-group-label">January 18</label>
      <ul class="list-unstyled media-list mg-b-0">
        <li class="media">
          <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Annie Christensen</span>
              <span class="tx-11">7:26pm</span>
            </div>
            <h6 class="tx-13">Just asking questions</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
          </div><!-- media-body -->
        </li>
        <li class="media">
          <div class="avatar"><span class="avatar-initial rounded-circle bg-primary">a</span></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Adrian Monino</span>
              <span class="tx-11">06:42pm</span>
            </div>
            <h6 class="tx-13">Watch, Listen and Play Longer</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
          </div><!-- media-body -->
        </li>
        <li class="media">
          <div class="avatar"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Robert Restificar</span>
              <span class="tx-11">12:01pm</span>
            </div>
            <h6 class="tx-13">Envato Contributor Payment</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
          </div><!-- media-body -->
        </li>
        <li class="media">
          <div class="avatar"><span class="avatar-initial rounded-circle bg-purple">r</span></div>
          <div class="media-body mg-l-15">
            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
              <span class="tx-12">Raymart Serencio</span>
              <span class="tx-11">10:13am</span>
            </div>
            <h6 class="tx-13">Sale: Javascript Beginners</h6>
            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
          </div><!-- media-body -->
        </li>
      </ul>

      <div class="pd-t-1 pd-b-5 pd-x-5">
        <a href="" class="btn btn-xs btn-block btn-light bd-0 tx-uppercase tx-10 tx-spacing-1 tx-medium mn-ht-0">Load more</a>
      </div>

    </div><!-- mail-group-body -->
  </div><!-- mail-group -->
</template>

<script type="text/javascript">
	export default{
		props:['mails'],
		data(){
			return{
				
			}
		},
		watch:{

		},
		methods:{
			viewmail:function(mail){
				//console.log(mail)
        //this.mail = mail
        this.$emit('mailclick', mail)
        
				$('.mail-group .selected').removeClass('selected');

				$(this).addClass('selected');
				$(this).removeClass('unread');

				$('.mail-content-header').removeClass('d-none');
				$('.mail-content-body').removeClass('d-none');
        $('body').addClass('mail-content-show');
        console.log('Mail group body clicked')
        
				if(window.matchMedia('(max-width: 1199px)').matches) {
				  $('body').addClass('mail-content-show');
				}

				if(window.matchMedia('(min-width: 768px)').matches) {
				  $('#Sidebar').removeClass('d-md-none');
				  $('#mainMenuOpen').removeClass('d-md-flex');
				}
			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>

.modal-backdrop {
  z-index: -1;
}

</style>