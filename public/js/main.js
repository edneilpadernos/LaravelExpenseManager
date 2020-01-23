$(function() {
	let id=0;
	//all about expenses
	$('#deleteexpensenow').on('click',function(){
		$.ajax({
			url:"/deleteExpense",
			data:{"id":id},success:function(result){
			  if(result=="deleted"){
				$('#notifsuccessexpenseupdate').fadeIn('fast');
				setTimeout(function(){
				  $('#notifsuccessexpenseupdate').fadeOut('fast');
				  document.location="http://127.0.0.1:8000/expenses";
				},1500);
				 
			  }
			}
		  })

	})

	$('#updateexpensenow').click(function(){
		if ($.trim($('#expenseamountupdate').val())=="" || $.trim($('#expensedateupdate').val())=="" ){
			$('#notiferrorexpenseupdate').fadeIn('fast');
			setTimeout(function(){
			$('#notiferrorexpenseupdate').fadeOut('fast')
			},1500)
		}
		else if(!/^[0-9\.]+$/.test($.trim($('#expenseamountupdate').val()))){
			$('#notifsuccessexpensenumberupdate').fadeIn('fast');
			setTimeout(function(){
			  $('#notifsuccessexpensenumberupdate').fadeOut('fast')
			},1500)
		  }
		else{
			$.ajax({
				url:"/updateExpenses",
				data:{"selectedcategoryexpenseupdate":$.trim($('#selectedcategoryexpenseupdate').val()),"id":id,"expenseamountupdate":$.trim($('#expenseamountupdate').val()),"expensedateupdate":$.trim($('#expensedateupdate').val())},success:function(result){
				  if(result=="saved"){
					$('#notifsuccessexpenseupdate').fadeIn('fast');
					setTimeout(function(){
					  $('#notifsuccessexpenseupdate').fadeOut('fast');
					  document.location="http://127.0.0.1:8000/expenses";
					},1500);
					 
				  }
				}
			  })
		}
	})

	$('.expense_item').mouseover(function(){
		id= $(this).attr('id');
		$('#'+id).click(function(){
		  $('#expenseamountupdate').val($.trim($('#expamount'+id).html()))
		  $('#expensedateupdate').val($.trim($('#expdate'+id).html()))
		  $('#updateExpenseModal').modal('toggle');
		  let expenseid = $.trim($('#expenseidcat'+id).val());
			$('#selectedcategoryexpenseupdate').val(expenseid);
		})
	  })


	$('#expensesave').on('click',function(){
		if ($.trim($('#expenseamount').val())=="" || $.trim($('#expensedate').val())=="" ){
			$('#notiferrorexpense').fadeIn('fast');
			setTimeout(function(){
			  $('#notiferrorexpense').fadeOut('fast')
			},1500)
		  }
		  
		  else if(!/^[0-9\.]+$/.test($.trim($('#expenseamount').val()))){
			$('#notifsuccessexpensenumber').fadeIn('fast');
			setTimeout(function(){
			  $('#notifsuccessexpensenumber').fadeOut('fast')
			},1500)
		  }
		  else{
			  
			$.ajax({
			  url:"/addexpenses",
			  data:{"selectedcategoryexpense":$.trim($('#selectedcategoryexpense').val()),"expenseamount":$.trim($('#expenseamount').val()),"expensedate":$.trim($('#expensedate').val())},success:function(result){
				
				if(result=="saved"){
				  $('#notifsuccessexpense').fadeIn('fast');
				  setTimeout(function(){
					$('#notifsuccessexpense').fadeOut('fast');
					document.location="http://127.0.0.1:8000/expenses";
				  },1500);
				   
				}
			  }
			})
		}
	});

	//all about categories
	$('#deletecatnow').on('click',function(){
		$.ajax({
			url:"/deletecategory",
			data:{"id":id},success:function(result){
			  if(result=="deleted"){
				$('#notifsuccesscatupdate').fadeIn('fast');
				setTimeout(function(){
				  $('#notifsuccesscatupdate').fadeOut('fast');
				  document.location="http://127.0.0.1:8000/expensescategory";
				},1500);
				 
			  }
			}
		  })

	})

	$('#updatecatnow').click(function(){
		if ($.trim($('#excatnameupdate').val())=="" || $.trim($('#excatdescupdate').val())=="" ){
			$('#notiferrorcatupdate').fadeIn('fast');
			setTimeout(function(){
			$('#notiferrorcatupdate').fadeOut('fast')
			},1500)
		}
		else{
			$.ajax({
				url:"/updatecategory",
				data:{"id":id,"excatnameupdate":$.trim($('#excatnameupdate').val()),"excatdescupdate":$.trim($('#excatdescupdate').val())},success:function(result){
				  if(result=="saved"){
					$('#notifsuccesscatupdate').fadeIn('fast');
					setTimeout(function(){
					  $('#notifsuccesscatupdate').fadeOut('fast');
					  document.location="http://127.0.0.1:8000/expensescategory";
					},1500);
					 
				  }
				}
			  })
		}
	})

	$('.excat_item').mouseover(function(){
		id= $(this).attr('id');
		$('#'+id).click(function(){
		  $('#excatnameupdate').val($.trim($('#catname'+id).html()))
		  $('#excatdescupdate').val($.trim($('#catdesc'+id).html()))
		  $('#updatecategoryModal').modal('toggle');
		 
		})
	  })

	$('#savecat').on('click',function(){
		if ($.trim($('#addcatname').val())=="" || $.trim($('#addcatdesc').val())=="" ){
			$('#notiferrorcat').fadeIn('fast');
			setTimeout(function(){
			  $('#notiferrorcat').fadeOut('fast')
			},1500)
		  }
		  else{
			$.ajax({
			  url:"/addcategory",
			  data:{"addcatname":$.trim($('#addcatname').val()),"addcatdesc":$.trim($('#addcatdesc').val())},success:function(result){
				
				if(result=="saved"){
				  $('#notifsuccesscat').fadeIn('fast');
				  setTimeout(function(){
					$('#notifsuccesscat').fadeOut('fast');
					document.location="http://127.0.0.1:8000/expensescategory";
				  },1500);
				   
				}
			  }
			})
		}
	});


	//all about users
	$('#deleteusernow').click(function(){
		$.ajax({
			url:"/deleteuser",
			data:{"id":id},success:function(result){
			  if(result=="deleted"){
				$('#notifsuccessuserupdate').fadeIn('fast');
				setTimeout(function(){
				  $('#notifsuccessuserupdate').fadeOut('fast');
				  document.location="http://127.0.0.1:8000/users";
				},1500);
				 
			  }
			}
		  })
	
	})
	$('#updateusernow').click(function(){
		if ($.trim($('#updateusername').val())=="" || $.trim($('#updateemail').val())=="" ){
			$('#notiferroruserupdate').fadeIn('fast');
			setTimeout(function(){
			$('#notiferroruserupdate').fadeOut('fast')
			},1500)
		}
		else{
			$.ajax({
				url:"/updateuser",
				data:{"selecteduserRoleupdate":$.trim($('#selecteduserRoleupdate').val()),"id":id,"updateusername":$.trim($('#updateusername').val()),"updateemail":$.trim($('#updateemail').val()),},success:function(result){
				  if(result=="saved"){
					$('#notifsuccessuserupdate').fadeIn('fast');
					setTimeout(function(){
					  $('#notifsuccessuserupdate').fadeOut('fast');
					  document.location="http://127.0.0.1:8000/users";
					},1500);
					 
				  }
				}
			  })
		}
	})

	$('#usersave').click(function(){
		if ($.trim($('#username').val())=="" || $.trim($('#userpassword').val())=="" || $.trim($('#useremail').val())=="" ){
			$('#notiferroruser').fadeIn('fast');
			setTimeout(function(){
			  $('#notiferroruser').fadeOut('fast')
			},1500)
		  }
		  else{
			$.ajax({
			  url:"/adduser",
			  data:{"userpassword":$.trim($('#userpassword').val()),"userselectedrole":$.trim($('#userselectedrole').val()),"username":$.trim($('#username').val()),"useremail":$.trim($('#useremail').val()),},success:function(result){
				
				if(result=="saved"){
				  $('#notifsuccessuser').fadeIn('fast');
				  setTimeout(function(){
					$('#notifsuccessuser').fadeOut('fast');
					document.location="http://127.0.0.1:8000/users";
				  },1500);
				   
				}
			  }
			})
		}
	})

	$('.user_item').mouseover(function(){
		id= $(this).attr('id');
		$('#'+id).click(function(){
		  $('#updateusername').val($.trim($('#username'+id).html()))
		  $('#updateemail').val($.trim($('#useremail'+id).html()))
		  $('#updateuserModal').modal('toggle');
		  let roleselectedupdate = $.trim($('#role'+id).val());
		 // alert(roleselectedupdate)
		  if(roleselectedupdate==1){
			
			  $('#selecteduserRoleupdate').val(roleselectedupdate);
			  $('#updateusernow').css('display','none');
			  $('#deleteusernow').css('display','none');
			  $('#updateusername').attr('disabled',true);
			  $('#updateemail').attr('disabled',true);
			  $('#selecteduserRoleupdate').attr('disabled',true);
			  $('.cancel').css('marginLeft','100px');
		  }
		  else{
			$('#selecteduserRoleupdate').val(roleselectedupdate);
			$('#updateusernow').css('display','block');
			  $('#deleteusernow').css('display','block');
			  $('#updateusername').attr('disabled',false);
			  $('#updateemail').attr('disabled',false);
			  $('#selecteduserRoleupdate').attr('disabled',false);
			  $('.cancel').css('marginLeft','0');
		  }
		})
	  })


	//all about roles
	$('#deleterolenow').click(function(){
			$.ajax({
				url:"/deleterole",
				data:{"id":id},success:function(result){
				  if(result=="deleted"){
					$('#notifsuccessupdate').fadeIn('fast');
					setTimeout(function(){
					  $('#notifsuccessupdate').fadeOut('fast');
					  document.location="http://127.0.0.1:8000/roles";
					},1500);
					 
				  }
				}
			  })
		
	})

	$('#updaterolenow').click(function(){
		if ($.trim($('#updatename').val())=="" || $.trim($('#updatedesc').val())=="" ){
			$('#notiferrorupdate').fadeIn('fast');
			setTimeout(function(){
			$('#notiferrorupdate').fadeOut('fast')
			},1500)
		}
		else{
			$.ajax({
				url:"/updaterole",
				data:{"id":id,"updatename":$.trim($('#updatename').val()),"updatedesc":$.trim($('#updatedesc').val()),},success:function(result){
				  if(result=="saved"){
					$('#notifsuccessupdate').fadeIn('fast');
					setTimeout(function(){
					  $('#notifsuccessupdate').fadeOut('fast');
					  document.location="http://127.0.0.1:8000/roles";
					},1500);
					 
				  }
				}
			  })
		}
	})
	$('.role_item').mouseover(function(){
		id= $(this).attr('id');
		$('#'+id).click(function(){
		  $('#updatename').val($.trim($('#dname'+id).html()))
		  $('#updatedesc').val($.trim($('#ddesc'+id).html()))
		  $('#updateRoleModal').modal('toggle');
		  if(id==1){
			  $('#updaterolenow').css('display','none');
			  $('#deleterolenow').css('display','none');
			  $('#updatename').attr('disabled',true);
			  $('#updatedesc').attr('disabled',true);
			  $('.cancel').css('marginLeft','100px');
		  }
		  else{
			  $('#updatename').attr('disabled',false);
			  $('#updatedesc').attr('disabled',false);
			  $('#updaterolenow').css('display','block');
			  $('#deleterolenow').css('display','block');
			  $('.cancel').css('marginLeft','0');
		  }
		})
	  })

	 $('#saveaddrole').on('click',function(){
	  if ($.trim($('#add_role_name').val())=="" || $.trim($('#add_role_desc').val())=="" ){
		$('#notiferror').fadeIn('fast');
		setTimeout(function(){
		  $('#notiferror').fadeOut('fast')
		},1500)
	  }
	  else{
		$.ajax({
		  url:"/addrole",
		  data:{"add_role_name":$.trim($('#add_role_name').val()),"add_role_desc":$.trim($('#add_role_desc').val()),},success:function(result){
			if(result=="saved"){
			  $('#notifsuccess').fadeIn('fast');
			  setTimeout(function(){
				$('#notifsuccess').fadeOut('fast');
				document.location="http://127.0.0.1:8000/roles";
			  },1500);
			   
			}
		  }
		})
	  }
	})
  
	  $("#menu-toggle").click(function(e) {
	   
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	  });
	



});