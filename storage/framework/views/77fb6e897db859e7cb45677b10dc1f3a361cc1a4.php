
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Conversations</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item active">Chat</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<input type="hidden" name="" id="csrf_token" value="<?php echo e(csrf_token()); ?>">
<!-- <input type="hidden" name="" id="user_id" value="<?php echo e(Auth::User()->id); ?>"> -->
<div class="container-fluid">
	<div class="row">
		<div class="col call-chat-sidebar col-sm-12">
			<div class="card">
				<div class="card-body chat-body">
					<div class="chat-box">
						<!-- Chat left side Start-->
						<div class="chat-left-aside">
							<div class="media">
								<img class="rounded-circle user-image" src="/storage/<?php echo e(@Auth::User()->profile->image); ?>" alt="<?php echo e(asset('assets/images/user/12.png')); ?>" alt="">
								<div class="about">
									<div class="name f-w-600"><?php echo e(Auth::User()->name); ?></div>
								</div>
							</div>
							<div class="people-list" id="people-list">
								<div class="search">
									<form class="theme-form">
										<div class="mb-3">
											<input class="form-control" type="text" placeholder="search"><i class="fa fa-search"></i>
										</div>
									</form>
								</div>
								<ul class="list" id="user_list">
									<li class="clearfix">
										<img class="rounded-circle user-image" src="<?php echo e(asset('assets/images/user/1.jpg')); ?>" alt="">
										<div class="status-circle away"></div>
										<div class="about">
											<div class="name">Vincent Porter</div>
											<div class="status">Hello Name</div>
										</div>
									</li>
					
								</ul>
							</div>
						</div>
						<!-- Chat left side Ends-->
					</div>
				</div>
			</div>
		</div>
		<div class="col call-chat-body">
			<div class="card">
				<div class="card-body p-0">
					<div class="row chat-box">
						<!-- Chat right side start-->
						<div class="col pe-0 chat-right-aside">
							<!-- chat start-->
							<div class="chat">
								<!-- chat-header start-->
								<div class="chat-header clearfix">
									<img class="rounded-circle" id="chat_image" src="<?php echo e(asset('assets/images/user/8.jpg')); ?>" alt="">
									<div class="about">
										<div class="name" id="chat_name">Kori Thomas  <span class="font-primary f-12"  id="typing"></span></div>
										<div class="status" id="chat_status"></div>
									</div>
									<ul class="list-inline float-start float-sm-end chat-menu-icons">
										<li class="list-inline-item"><a href="#"><i class="icon-search"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="icon-clip"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="icon-headphone-alt"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="icon-video-camera"></i></a></li>
										<li class="list-inline-item toogle-bar"><a href="#"><i class="icon-menu"></i></a></li>
									</ul>
								</div>
								<!-- chat-header end-->
								<div class="chat-history chat-msg-box custom-scrollbar">
									<ul id="msg_list">
										<!-- <li>
											<div class="message my-message">
												<img class="rounded-circle float-start chat-user-img img-30" src="<?php echo e(asset('assets/images/user/3.png')); ?>" alt="">
												<div class="message-data text-end"><span class="message-data-time">10:12 am</span></div>
												Are we meeting today? Project has been already finished and I have results to show you.
											</div>
										</li>
										<li class="clearfix">
											<div class="message other-message pull-right">
												<img class="rounded-circle float-end chat-user-img img-30" src="<?php echo e(asset('assets/images/user/12.png')); ?>" alt="">
												<div class="message-data"><span class="message-data-time">10:14 am</span></div>
												Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so?
											</div>
										</li>
										<li class="clearfix">
											<div class="message other-message pull-right">
												<img class="rounded-circle float-end chat-user-img img-30" src="<?php echo e(asset('assets/images/user/12.png')); ?>" alt="">
												<div class="message-data"><span class="message-data-time">10:14 am</span></div>
												Well I am not sure. The rest of the team
											</div>
										</li>
										<li>
											<div class="message my-message mb-0">
												<img class="rounded-circle float-start chat-user-img img-30" src="<?php echo e(asset('assets/images/user/3.png')); ?>" alt="">
												<div class="message-data text-end"><span class="message-data-time">10:20 am</span></div>
												Actually everything was fine. I'm very excited to show this to our team.
											</div>
										</li> -->
									</ul>
								</div>
								<!-- end chat-history-->
								<div class="chat-message clearfix">
									<div class="row">
										<div class="col-xl-12 d-flex">
											<div class="smiley-box bg-primary">
												<div class="picker"><img src="<?php echo e(asset('assets/images/smiley.png')); ?>" alt=""></div>
											</div>
											<div class="input-group text-box">
												<input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message......">
												<button class="input-group-text btn btn-primary" type="button" onclick="sendMessage(document.getElementById('message-to-send').value)">SEND</button>
											</div>
										</div>
									</div>
								</div>
								<!-- end chat-message-->
								<!-- chat end-->
								<!-- Chat right side ends-->
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/fullscreen.js')); ?>"></script>
<script>
	 
    const thisUser = document.getElementById("user_id").value;
	

   
    const userBox =  (user) => $(`
    <li class="clearfix user_info" id="user_info_${user.id}" data-user_id = "${user.id}" role="button">
    	<img class="rounded-circle user-image" src="/storage/${user.profile ? user.profile.image : ""  }" alt="<?php echo e(asset('assets/images/user/1.jpg')); ?>">
										<div class="status-circle online"></div>
										<div class="about">
											<div class="name">${user.name}</div>											
										</div>
									</li>`)
	const myMessage = (message,time) => $(`<li class="clearfix"><div class="message my-message pull-right bg-light mb-0">
												<img class="rounded-circle float-start chat-user-img img-30" src="/storage/<?php echo e(@Auth::User()->profile->image); ?>" alt="">
												<div class="message-data text-end"><span class="message-data-time">${time}</span></div>
												${message}
											</div></li>`)
	const otherMessage = (message,time) => $(`<li >
											<div class="message other-message ">
												<img class="rounded-circle float-end chat-user-img img-30" src="<?php echo e(asset('assets/images/user/12.png')); ?>" alt="">
												<div class="message-data"><span class="message-data-time">${time}</span></div>
												${message}
											</div>
										</li>`)
	const sendMessage = async (message) => { 
		$("#message-to-send").val("");
		Date.prototype.timeNow = function () {
     return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
         }
		// console.log("my-message",message)
		var newDate = new Date();

		let time = newDate.timeNow();
		let form = new FormData();
		form.append("_token",$("#csrf_token").val())
		form.append("key","25b4d478f2181f36ae88")
		form.append("secret","f8e5f1ec72df481e3d9d")
		form.append("appId","1495690")
		form.append("channel","chat")
		form.append("event","App\\Events\\sendChat")
		form.append("data",JSON.stringify({"message":message,"user":thisUser,"time":time}));
		
	                   await  	$.ajax({   
							    url: "/laravel-websockets/event",
                                type: 'post',
                                data:form,
								processData: false,
                                contentType: false,    
                                statusCode: {
                                    400: function() {
                                        $.notify({
                                            message:"Something went wrong"
											
                                        }, {
                                            type: 'danger',
                                            z_index: 10000,
                                            timer: 2000,
                                        });
                                    },
                                    500: function(){
                                        $.notify({
                                            message:"Something went wrong"
                                        }, {
                                            type: 'danger',
                                            z_index: 10000,
                                            timer: 2000,
                                        });
                                    },
									422: function(){
                                        $.notify({
                                            message:"Invalid server creds"
                                        }, {
                                            type: 'danger',
                                            z_index: 10000,
                                            timer: 2000,
                                        });
                                    }
                                }

                            }).done(function(response) {
                         
                            });
							$("#msg_list").append(myMessage(message,time))
							$(".chat-history").animate({ scrollTop: $('.chat-history').prop("scrollHeight")}, 1000);
		
		// let echo  = Echo.join("chat")
		// console.log(echo)
	// let sender =	echo.pusher.global_emitter.emit("App\\Events\\sendChat",{ "message":message },"moredata")
	// console.log(sender)
	// Echo.connector.socket.emit('\App\Events\sendChat', 'chat', { "message":message }); /laravel-websockets/event
		
	}
	
    setTimeout(()=>{
        let other_users = online_users.filter(elem => elem.id != thisUser)
        // console.log("others",other_users)
        let rows = other_users.map((user)=>{
               return userBox(user)
           })
        $("#user_list").html(rows)
		// console.log("echo",Echo)
    },3000)
	Echo.channel('chat')
        .listen('sendChat', (data) => {
            // var data = JSON.parse(e);
			if (data.user != thisUser) {
			$("#msg_list").append(otherMessage(data.message,data.time))
			$(".chat-history").animate({ scrollTop: $('.chat-history').prop("scrollHeight")}, 1000);
			}
			
		})

	$("#user_list").on("click",".user_info",function(e){
		let user_id = $(this).data("user_id")
		let img_src = $(this).find(".user-image").prop("src")
		let name = $(this).find(".name").html()
		let status = $(this).find(".status-circle").clone();

		$("#chat_name").html(name)
		$("#user_status").html(status)
		$("#chat_image").prop("src",img_src)
	})	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/adminpanel/chats/chat.blade.php ENDPATH**/ ?>