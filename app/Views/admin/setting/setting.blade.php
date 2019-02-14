
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

	<div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>App Setting <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              

              

              	<div class="clearfix"></div>

                @if(Session::has('message'))
                  <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('deleted'))
                  <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                @endif

              	<div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">

	                  

	                  <div class="x_content">




                    <div class="setting-page-tab" role="tabpanel" data-example-id="togglable-tabs">
	                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	                        <li role="" class="active">
	                        	<a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cog"> </i> General</a>
	                        </li>
	                        <li role="" class="">
	                        	<a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Reading</a>
	                        </li>
	                        <li role="" class="">
	                        	<a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Writing</a>
	                        </li>
	                        <li role="" class="">
	                        	<a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Media</a>
	                        </li>                      
	                    </ul>
                      	<div id="myTabContent" class="tab-content">





	                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1">
	                         	
								<div class="wrap">
									<h1>General Settings</h1>
									<form method="post" action="options.php" >
										
										<table class="form-table">
											<tbody>
												<tr>
													<th scope="row"><label for="blogname">Site Title</label></th>
													<td>
														<input name="blogname" type="text" id="blogname" value="" class="regular-text">
													</td>
												</tr>
												<tr>
													<th scope="row"><label for="blogdescription">Tagline</label></th>
													<td>
														<input name="blogdescription" type="text"  aria-describedby="tagline-description" value="" class="regular-text">
														<p class="description" id="tagline-description">In a few words, explain what this site is about.</p>
													</td>
												</tr>
												<tr>
													<th scope="row"><label for="siteurl">WordPress Address (URL)</label></th>
													<td>
														<input name="siteurl" type="text" id="siteurl" value="" class="regular-text code">
													</td>
												</tr>
												<tr>
													<th scope="row"><label for="home">Site Address (URL)</label></th>
													<td>
														<input name="home" type="text" id="home" aria-describedby="home-description" value="">
														<p class="description" id="home-description">Enter the address here if you <a href="https://codex.wordpress.org/Giving_WordPress_Its_Own_Directory">want your site home page to be different from your WordPress installation directory</a>.</p>
													</td>
												</tr>
												<tr>
													<th scope="row"><label for="new_admin_email">Email Address</label></th>
													<td><input name="new_admin_email" type="email" id="new_admin_email" aria-describedby="new-admin-email-description" value="" class="regular-text ltr">
													<p class="description" >
														This address is used for admin purposes. If you change this we will send you an email at your new address to confirm it. 
														<strong>
															The new address will not become active until confirmed.
														</strong>
													</p>
													</td>
												</tr>
												<tr>
													<th scope="row">Membership</th>
													<td> 
														<fieldset>
															<legend class="screen-reader-text">
																<span>Membership</span>
															</legend>
															<label for="users_can_register">
																<input name="users_can_register" type="checkbox" id="users_can_register" value="1">
																	Anyone can register
															</label>
														</fieldset>
													</td>
												</tr>
												<tr>
												<th scope="row"><label for="default_role">New User Default Role</label></th>
												<td>
													<select name="default_role" id="default_role">
														<option selected="selected" value="subscriber">Subscriber</option>
														<option value="contributor">Contributor</option>
														<option value="author">Author</option>
														<option value="editor">Editor</option>
														<option value="administrator">Administrator</option>
													</select>
													</td>
												</tr>

												<tr>
												<th scope="row"><label for="start_of_week">Week Starts On</label></th>
												<td><select name="start_of_week" id="start_of_week">
													<option value="0">Sunday</option>
													<option value="1" selected="selected">Monday</option>
													<option value="2">Tuesday</option>
													<option value="3">Wednesday</option>
													<option value="4">Thursday</option>
													<option value="5">Friday</option>
													<option value="6">Saturday</option></select></td>
												</tr>
											</tbody>
										</table>
										<p class="submit">											
											<button class="btn btn-dark btn-sm">Save</button>
										</p>
										
									</form>
								</div>							
	                        </div>

	                        <div role="tabpanel" class="tab-pane fade" id="tab_content2">
								<div class="wrap">
									<h1>Reading Settings</h1>

									<form method="post" action="options.php">										
										<table class="form-table">
											<tbody>
												<tr>
													<th scope="row">Your homepage displays</th>
													<td id="front-static-pages">
														<fieldset>
															<legend class="screen-reader-text">
																<span>Your homepage displays</span>
															</legend>
															<p>
																<label>
																	<input name="show_on_front" type="radio" value="posts" class="tog" checked="checked">
																		Your latest posts	
																</label>
															</p>
															<p><label>
																<input name="show_on_front" type="radio" value="page" class="tog">
																	A <a href="edit.php?post_type=page">static page</a> (select below)	
																</label>
															</p>
															<ul>
																<li>
																	<label for="page_on_front">Homepage: 
																		<select name="page_on_front" id="page_on_front">
																			<option value="0">— Select —</option>
																			<option class="level-0" value="2">Sample Page</option>
																		</select>

																	</label>
																</li>
																<li>
																	<label for="page_for_posts">Posts page: 
																		<select name="page_for_posts" id="page_for_posts">
																			<option value="0">— Select —</option>
																			<option class="level-0" value="2">Sample Page</option>
																		</select>
																	</label>
																</li>
															</ul>
														</fieldset>
													</td>
												</tr>
												<tr>
													<th scope="row"><label for="posts_per_page">Blog pages show at most</label></th>
													<td>
														<input name="posts_per_page" type="number" step="1" min="1" id="posts_per_page" value="10" class="small-text"> posts
													</td>
												</tr>
												<tr>
													<th scope="row"><label for="posts_per_rss">Syndication feeds show the most recent</label></th>
													<td>
														<input name="posts_per_rss" type="number" step="1" min="1" id="posts_per_rss" value="10" class="small-text"> items
													</td>
												</tr>
												<tr>
													<th scope="row">For each article in a feed, show </th>
													<td>
														<fieldset>
															<legend class="screen-reader-text">
																<span>For each article in a feed, show </span>
															</legend>
															<p>
																<label>
																	<input name="rss_use_excerpt" type="radio" value="0" checked="checked"> Full text
																</label><br>
																<label>
																	<input name="rss_use_excerpt" type="radio" value="1"> Summary</label>
																</p>
														</fieldset>
													</td>
												</tr>
												
											</tbody>
										</table>
										<p class="submit">
											
											<button class="btn btn-dark btn-sm">Save</button>
										</p></form>
								</div>
	                        </div>

	                        <div role="tabpanel" class="tab-pane fade" id="tab_content3">
								<div class="wrap">
									<h1>Writing Settings</h1>
									<form method="post" action="options.php">
										<input type="hidden" name="option_page" value="writing"><input type="hidden" name="action" value="update"><input type="hidden" id="_wpnonce" name="_wpnonce" value="c239322d6b"><input type="hidden" name="_wp_http_referer" value="/wordpress/wp-admin/options-writing.php">
										<table class="form-table">
											<tbody><tr>
												<th scope="row"><label for="default_category">Default Post Category</label></th>
												<td>
													<select name="default_category" id="default_category" class="postform">
														<option class="level-0" value="1" selected="selected">Uncategorized</option>
													</select>
												</td>
											</tr>
											<tr>
												<th scope="row"><label for="default_post_format">Default Post Format</label></th>
												<td>
													<select name="default_post_format" id="default_post_format">
														<option value="0">Standard</option>
														<option value="aside">Aside</option>
														<option value="chat">Chat</option>
														<option value="gallery">Gallery</option>
														<option value="link">Link</option>
														<option value="image">Image</option>
														<option value="quote">Quote</option>
														<option value="status">Status</option>
														<option value="video">Video</option>
														<option value="audio">Audio</option>
													</select>
												</td>
											</tr>
										</tbody></table>
										<h2 class="title">Post via email</h2>
										<p>To post to WordPress by email you must set up a secret email account with POP3 access. Any mail received at this address will be posted, so it’s a good idea to keep this address very secret. Here are three random strings you could use: <kbd>xbAJLv0L</kbd>, <kbd>2TPVsGvT</kbd>, <kbd>d1PqebsO</kbd>.</p>
										<table class="form-table">
											<tbody><tr>
												<th scope="row"><label for="mailserver_url">Mail Server</label></th>
												<td><input name="mailserver_url" type="text" id="mailserver_url" value="mail.example.com" class="regular-text code">
												<label for="mailserver_port">Port</label>
												<input name="mailserver_port" type="text" id="mailserver_port" value="110" class="small-text">
											</td>
										</tr>
										<tr>
											<th scope="row"><label for="mailserver_login">Login Name</label></th>
											<td><input name="mailserver_login" type="text" id="mailserver_login" value="login@example.com" class="regular-text ltr"></td>
										</tr>
										<tr>
											<th scope="row"><label for="mailserver_pass">Password</label></th>
											<td>
												<input name="mailserver_pass" type="text" id="mailserver_pass" value="password" class="regular-text ltr">
											</td>
										</tr>
										<tr>
											<th scope="row"><label for="default_email_category">Default Mail Category</label></th>
											<td>
												<select name="default_email_category" id="default_email_category" class="postform">
													<option class="level-0" value="1" selected="selected">Uncategorized</option>
												</select>
											</td>
										</tr>
									</tbody></table>
									<h2 class="title">Update Services</h2>
									<p><label for="ping_sites">When you publish a new post, WordPress automatically notifies the following site update services. For more about this, see <a href="https://codex.wordpress.org/Update_Services">Update Services</a> on the Codex. Separate multiple service URLs with line breaks.</label></p>
									<textarea name="ping_sites" id="ping_sites" class="large-text code" rows="3">http://rpc.pingomatic.com/</textarea>
									<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>
								</div>
	                        </div>

	                        <div role="tabpanel" class="tab-pane fade" id="tab_content4">
								<div class="wrap">
									<h1>Media Settings</h1>
									<form action="options.php" method="post">
										<input type="hidden" name="option_page" value="media"><input type="hidden" name="action" value="update"><input type="hidden" id="_wpnonce" name="_wpnonce" value="91db30165f"><input type="hidden" name="_wp_http_referer" value="/wordpress/wp-admin/options-media.php">
										<h2 class="title">Image sizes</h2>
										<p>The sizes listed below determine the maximum dimensions in pixels to use when adding an image to the Media Library.</p>
										<table class="form-table">
											<tbody><tr>
												<th scope="row">Thumbnail size</th>
												<td><fieldset><legend class="screen-reader-text"><span>Thumbnail size</span></legend>
												<label for="thumbnail_size_w">Width</label>
												<input name="thumbnail_size_w" type="number" step="1" min="0" id="thumbnail_size_w" value="150" class="small-text">
												<br>
												<label for="thumbnail_size_h">Height</label>
												<input name="thumbnail_size_h" type="number" step="1" min="0" id="thumbnail_size_h" value="150" class="small-text">
											</fieldset>
											<input name="thumbnail_crop" type="checkbox" id="thumbnail_crop" value="1" checked="checked">
											<label for="thumbnail_crop">Crop thumbnail to exact dimensions (normally thumbnails are proportional)</label>
										</td>
									</tr>
									<tr>
										<th scope="row">Medium size</th>
										<td><fieldset><legend class="screen-reader-text"><span>Medium size</span></legend>
										<label for="medium_size_w">Max Width</label>
										<input name="medium_size_w" type="number" step="1" min="0" id="medium_size_w" value="300" class="small-text">
										<br>
										<label for="medium_size_h">Max Height</label>
										<input name="medium_size_h" type="number" step="1" min="0" id="medium_size_h" value="300" class="small-text">
									</fieldset></td>
								</tr>
								<tr>
									<th scope="row">Large size</th>
									<td><fieldset><legend class="screen-reader-text"><span>Large size</span></legend>
									<label for="large_size_w">Max Width</label>
									<input name="large_size_w" type="number" step="1" min="0" id="large_size_w" value="1024" class="small-text">
									<br>
									<label for="large_size_h">Max Height</label>
									<input name="large_size_h" type="number" step="1" min="0" id="large_size_h" value="1024" class="small-text">
								</fieldset></td>
								</tr>
								</tbody></table>
								<h2 class="title">Uploading Files</h2>
								<table class="form-table">
								<tbody><tr>
								<td class="td-full">
									<label for="uploads_use_yearmonth_folders">
										<input name="uploads_use_yearmonth_folders" type="checkbox" id="uploads_use_yearmonth_folders" value="1" checked="checked">
									Organize my uploads into month- and year-based folders</label>
								</td>
								</tr>
								</tbody></table>
								<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
								</form>
								</div>
	                        </div>


                      	</div>
                    </div>








                 

	                    <form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form">
					        {!! csrf_field() !!}
								   

								<div class="panel-group col-md-12 col-xs-12" id="accordion">
									@if(count(config('setting_fields', [])) )
					            		@foreach(config('setting_fields') as $section => $fields)
									  <div class=" panel panel-default in">
									    <div class="panel-heading">
									      <h5 class="panel-titls">
									        <a data-toggle="collapse" data-parent="#accordion" href="#{{ $fields['title'] }}">
									        	<i class="{{ array_get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
						                        {{ $fields['title'] }}						                        
									    	</a>
									    	<small><i>{{ $fields['desc'] }}</i></small>
									      </h5>
									    </div>
									    <div id="{{ $fields['title'] }}" class="panel-collapse collapse">
									      	<div class="panel-body">									      		
									      		<div class="row">
						                            <div class="col-md-8 col-xs-12  col-md-offset-2">
						                                @foreach($fields['elements'] as $field) 
						                                    @includeIf('admin.setting.fields.' . $field['type'] )
						                                @endforeach
						                            </div>
						                        </div>
									  		</div>
									    </div>
									  </div>

									

									    @endforeach
					        		@endif  
								</div>
					        

					        <div class="row m-b-md">
					            <div class="col-md-12">
					                <button class="btn-dark btn btn-sm">
					                    Save Settings
					                </button>
					            </div>
					        </div>
					    </form>
								      
                      	



                       
							     
	                  </div>
	                </div>
              	</div>
            </div>
          </div>
  </div>



    
@endsection
