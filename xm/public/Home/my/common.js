var isMobileRegex = /^1\d{10}$/;
var isPasswordRegex = /^[0-9a-zA-Z]{6,16}$/;
var isNameRegex = /^[0-9a-zA-Z\u4e00-\u9fa5]{2,12}$/;
var isEmailRegex = /^([\w-_~`!#$%^&*{}.+]{3,20})+(\.[\w-]+)*@[\w-_]+((\.){1}([\w-_]+)+)+$/;
var isCaptchaRegx = /^([0-9a-zA-Z\u4e00-\u9fa5])+$/;
var isVercodeRegex = /^([0-9a-zA-Z])+$/;
var isMibaoRegex = /^[0-9a-zA-Z\u4e00-\u9fa5]{2,20}$/;

var k= 0,len,cookieList;
window.load_status = 1;
var xt1 = null;

var u=(function getData(){
    var url=window.location.href;
    if (url.indexOf("?") != -1) {
        var url_info=url.split("?")[1];
        var arr_info=url_info.split("&");
        var url_obj={};
        for(var i=0;i<arr_info.length;i++){
            url_obj[arr_info[i].split("=")[0]]=arr_info[i].split("=")[1];
        }
        return url_obj;
    }else{
        return {};
    }
})()



function showinfo(id, message, color) {
	var val = $("#" + id);
	if (color == 1) {
		val.html(message).css("color", "#ff5656");
	}else if (color == 2) {
		val.html(message).css("color", "#878b8a");
	}else {
		val.html(message).css("color", "#666666");
	}
}

/***模拟placeholder**/
function focus_func(obj,str){
	$(obj).next(".placeholder").css("display","none");
	var id = obj.getAttribute("id");
	showinfo("info_"+id, str, 2);
	$(obj).parentsUntil(".pop_dlg").find(".error_tip1").html("");
}
function blur_func(obj,str){
	if ($(obj).val() == ""){
		$(obj).next(".placeholder").css("display","block");
		var id = obj.getAttribute("id");
		showinfo("info_"+id, str, 1);
	}
}


/**弹框展示**/
function showDiv(obj){
	obj.css({
		"top":$(window).height()/2-obj.height()/2+$(window.document).scrollTop()+"px",
		"margin-left":$(window).width()/2-obj.width()/2+$(window.document).scrollLeft()+"px",
		"display":"block"
	});
	$(".mask").css({"height":$(document).height(),"width":$(document).width()}).show();
	$("#dlg_id").val(obj.attr("id"));
}

function hideDiv(obj){
	obj.find("input[type='text']").val("");
	obj.find("input[type='password']").val("");
	obj.find(".placeholder").show();
	obj.find(".error_tip").html("");
	obj.find(".error_tip1").html("");
	obj.hide();
	$("#dlg_id").val("");
	$(".mask").hide();
}
$(".ico_close").click(function(){
	var obj = $(this).parent();
	hideDiv(obj);
})


$("#timeout_btn").click(function(){
	hideDiv($("#timeout_dlg"));
})


$("#timeout_dlg1 .ico_close").click(function(){
	 window.location.href = $("#loginUrl").val();
})


$("#expired_dlg .ico_close").click(function(){
	window.location.href = $("#loginUrl").val();
})

/**气泡**/
function showToast(obj,str){
	$("#toast_content").html(str);
	showDiv(obj);
	obj.fadeOut(3000);
	$("#mask").fadeOut(3000);
	window.location.href= window.location.href;
}
//获取积分总额
window.onload = function () {
    $.ajax({
        type : 'GET',
        url : '../credits/balance',
        cache : false,
        contentType: "application/json; charset=utf-8",   //内容类型
        dataType: "json",     //类型
        data : '{}',
        beforeSend : function() {
        },
        success : function(res) {
            if (res.success) {
                $('#total_amount').text(res.data.balance)
            }
        },
        complete : function(req) {
        },
        error : function(data) {
        }
    });
};

$('#detail_credit').on('click',function () {
    location.href='../static/credit.html';
});
//邮箱找回密码
//邮箱重置密码js
$("#reset_form").find(".login_button").click(function(){
	var pwd = $("#newpwd").val();
	var pwd2 = $("#repwd").val();
	if (pwd.length == 0 || ($.trim(pwd)).length == 0){
		showinfo("info_newpwd","请输入密码",1);
		return false;
	}
	if (pwd2.length == 0 || ($.trim(pwd2)).length == 0){
		showinfo("info_repwd","请再次输入密码",1);
		return false;
	}

	if (!pwd.match(isPasswordRegex)){
		showinfo("info_newpwd","密码格式错误",1);
		return false;
	}

	if (!pwd2.match(isPasswordRegex)){
		showinfo("info_repwd","密码格式错误",1);
		return false;
	}

	if (pwd!=pwd2){
		showinfo("info_repwd","两次密码不一致",1);
		return false;
	}

	var password = $.md5(pwd);
	$.ajax({
		type : 'POST',
		url : 'findMe',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey").val()+'","password":"'+ password +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			if (redata.resultCode!=1001){
				if (redata.resultCode == 30001){
					showinfo("info_reset_form", "新旧密码不能相同", 1);
				}else{
					if (redata.resultCode == 4010){
						showDiv($("#timeout_dlg1"))
					}else{
						showinfo("info_reset_form", redata.resultMsg, 1);
					}
				}
				return;
			}
			window.location.href="reset_success.jsp?type=1";

		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
})






//已登录首页
//修改用户名
$(".ico_edit").click(function(){
	if ($("#third_status").val()=='1'){
		showDiv($("#safe_dlg1"));
		$("#auth_code_mobile3").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
		return;
	}
	showDiv($("#modify_username"));
});


$("#newname").focus(function(){
	focus_func(this,"用户名为2-12位字母、数字或汉字");
});


$("#newname").blur(function(){
	if ($(this).val() == ""){
		$(this).next(".placeholder").css("display", "block");
	}
});


$("#modify_username .confirm_btn").click(function(){
	var newname = $.trim($("#newname").val());
	if (newname.length == 0){
		showinfo("info_newname","请输入用户名",1);
		return false;
	}


	if (!newname.match(isNameRegex)){
		showinfo("info_newname","用户名格式错误",1);
		return false;
	}

	if (newname.match(/^\d+$/)){
		showinfo("info_newname","不可为纯数字",1);
		return false;
	}


	$.ajax({
		type : 'POST',
		url : '../modifyUserName',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"userName" :"'+ newname +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
            var code = redata.resultCode;
			if (code != 1001){
				switch (code){
					case 2004:
					case 3002:
						showinfo("info_newname", redata.resultDesc, 1);
						break;
					case 3009:
						hideDiv($("#modify_username"));
						showinfo("info_newname","用户名为2-12位字母、数字或汉字",2);
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#modify_username"));
						showinfo("info_newname","用户名为2-12位字母、数字或汉字",2);
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_modify_username", redata.resultDesc, 1);
						break;

				}

				return;
			}
			hideDiv($("#modify_username"));
			showinfo("info_newname","用户名为2-12位字母、数字或汉字",2);
			showToast($("#success_toast"),"已成功设置用户名");
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});




});


$("#modify_username .cancel_btn").click(function(){
	hideDiv($("#modify_username"));
	showinfo("info_newname","用户名为2-12位字母、数字或汉字",2);

})

$("#modify_username .ico_close").click(function(){
	showinfo("info_newname","用户名为2-12位字母、数字或汉字",2);
})


//修改密码
$("#repwd1, #repwd,#resafepwd").focus(function(){
	focus_func(this,"密码包含6-16位字母、数字");
});

$("#repwd1, #repwd,#resafepwd").blur(function(){
	if ($(this).val() == "") {
		$(this).next(".placeholder").css("display", "block");
	}
});




$(".answer, .vercode,  #newpwd1, #oldpwd, #pwd, #new_mobile, #new_email, #newpwd,#safe_mobile,#safepwd").focus(function(){
	focus_func(this,"");
});
$(".answer, .vercode,  #newpwd1, #oldpwd, #pwd, #new_mobile, #new_email, #newpwd,#safe_mobile,#safepwd").blur(function(){
	blur_func(this,"");
})


//根据目前操作类型跳转下一步
function judgeType(){
	switch ($("#securityType").val()){
		case "bindMobile":
		case "reBindMobile":
			showDiv($("#mobile_dlg1"));
			$("#auth_code_mobile1").attr("src",$("#captchaUrl").val()+"?vertion="+ Math.random());
			break;
		case "reBindEmail":
		case "bindEmail":
			showDiv($("#email_dlg1"));
			$("#auth_code_email1").attr("src",$("#captchaUrl").val()+"?vertion="+ Math.random());
			break;
		case "createProblem":
		case "modifyProblem":
			showDiv($("#mibao_dlg"));
			break;
	}
}


$("#modify_pwd .ico_close").click(function(){
	showinfo("info_repwd1","密码包含6-16位字母、数字",2);
})

$("#modify_pwd .cancel_btn").click(function(){
	hideDiv($("#modify_pwd"));
	showinfo("info_repwd1","密码包含6-16位字母、数字",2);

});


//重新登录弹框倒计时
var xh_relogin;
function time_relogin(){
	var t = $("#time_span").html();
	t--;
	$("#time_span").html(t);
	xh_relogin = setTimeout(function() {
		time_relogin();
	}, 1000);
	if (t < 1) {
		clearTimeout(xh_relogin);
		window.location.href = $("#loginUrl").val();
	}
}

$("#relogin_dlg .ico_close").click(function(){
	if (xh_relogin != null){
		clearTimeout(xh_relogin);
	}
	window.location.href = $("#loginUrl").val();
})
$("#relogin_btn").click(function(){
	if (xh_relogin != null){
		clearTimeout(xh_relogin);
	}

	window.location.href = $("#loginUrl").val();
})


$("#modify_pwd .confirm_btn").click(function(){
	var oldpwd = $("#oldpwd").val();
	var pwd = $("#newpwd1").val();
	var pwd2 = $("#repwd1").val();

	if (oldpwd.length == 0 || ($.trim(oldpwd)).length == 0){
		showinfo("info_oldpwd","请输入原密码",1);
		return false;
	}


	if (pwd.length == 0 || ($.trim(pwd)).length == 0){
		showinfo("info_newpwd1","请输入新密码",1);
		return false;
	}
	if (pwd2.length == 0 || ($.trim(pwd2)).length == 0){
		showinfo("info_repwd1","请再次输入新密码",1);
		return false;
	}

	if (!oldpwd.match(isPasswordRegex)){
		showinfo("info_oldpwd","密码格式错误",1);
		return false;
	}

	if (!pwd.match(isPasswordRegex)){
		showinfo("info_newpwd1","密码格式错误",1);
		return false;
	}

	if (!pwd2.match(isPasswordRegex)){
		showinfo("info_repwd1","密码格式错误",1);
		return false;
	}

	if (pwd!=pwd2){
		showinfo("info_repwd1","新密码两次输入不一致",1);
		return false;
	}

	if (oldpwd == pwd){
		showinfo("info_repwd1","新旧密码不能相同",1);
		return false;
	}

	$.ajax({
		type : 'POST',
		url : '../modifyPassWord',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"passwordOriginal" :"'+ $.md5(oldpwd) +'","password":"'+ $.md5(pwd) +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code!=1001){
				switch (code){
					case 3008:
						showinfo("info_oldpwd", "原密码错误", 1);
						break;
					case 3009:
						hideDiv($("#modify_pwd"));
						showinfo("info_repwd1","密码包含6-16位字母、数字",2);
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#modify_pwd"));
						showinfo("info_repwd1","密码包含6-16位字母、数字",2);
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_modify_pwd", redata.resultDesc, 1);
						break;
				}
				return;
			}

			hideDiv($("#modify_pwd"));
			showinfo("info_repwd1","密码包含6-16位字母、数字",2);
			showDiv($("#relogin_dlg"));
			time_relogin();
			//showToast($("#success_toast"),"已成功重置密码");
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

});




$("#changepwd .modify_btn").click(function(){
	if ($("#third_status").val()=='1'){
		showDiv($("#safe_dlg1"));
		$("#auth_code_mobile3").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
		return;
	}
	showDiv($("#modify_pwd"));
});

//添加紧急联系人
$('#changeemergency').on('click', '#add', function () {
    var a = $("#username").val();
    $.ajax({
        type: "POST",
        url: "../account/getSafetyStatus",
        cache: false,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: '{"identify" :"' + a + '","securityType":"' + "bindEmergency" + '"}',
        beforeSend: function () {
        },
        success: function (d) {
            if (d.resultCode != 1001) {
                if (d.resultCode == 3009) {
                    showDiv($("#expired_dlg"))
                } else {
                    if (d.resultCode == 4010) {
                        showDiv($("#timeout_dlg"))
                    }
                }
            } else {
                window.localStorage.setItem('response', JSON.stringify(d.data));
                window.localStorage.setItem('process', '');
                window.localStorage.setItem('createBy', 'add');
                location.href = '../static/verifyIdentity.html';
            }
        },
        complete: function (b) {
        },
        error: function (b) {
        }
    })
});
// 查看紧急联系人
$('#changeemergency').on('click', '#del', function () {
    var a = $("#username").val();
    $.ajax({
        type: "POST",
        url: "../account/getSafetyStatus",
        cache: false,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: '{"identify" :"' + a + '","securityType":"' + "searchEmergency" + '"}',
        beforeSend: function () {
        },
        success: function (d) {
            if (d.resultCode != 1001) {
                if (d.resultCode == 3009) {
                    showDiv($("#expired_dlg"))
                } else {
                    if (d.resultCode == 4010) {
                        showDiv($("#timeout_dlg"))
                    }
                }
            } else {
                window.localStorage.setItem('response', JSON.stringify(d.data));
                window.localStorage.setItem('process', '');
                location.href = '../static/showEmergency.html';
            }
        },
        complete: function (b) {
        },
        error: function (b) {
        }
    })
});

$("#changemibao .modify_btn").click(function(){
	$("#securityType").val($(this).attr("link"));
	var username = $("#username").val();
	$.ajax({
		type : 'POST',
		url : '../account/getSafetyStatus',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"identify" :"'+ username+ '","securityType":"'+ $("#securityType").val()+'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			if (redata.resultCode!=1001){
               if (redata.resultCode == 3009){
				   showDiv($("#expired_dlg"));
			   }else{
				   if (redata.resultCode == 4010){
					   showDiv($("#timeout_dlg"));
				   }
			   }
				return;
			}
			var status =redata.data;
			var protections = status.protections;

			$("#requestKey_0").val(status.requestKey);

			if (protections != null &&  protections.length > 0){
				$("#question0").html(status.protections[0]);
				$("#question1").html(status.protections[1]);
				$("#question2").html(status.protections[2]);
				showDiv($("#yz_mibao_dlg"));
			}


		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
});

$("#yz_mibao_dlg").find(".login_button").click(function(){
	var answer0 = $.trim($("#answer0").val());
	var answer1 = $.trim($("#answer1").val());
	var answer2 = $.trim($("#answer2").val());

	if (answer0.length == 0) {
		showinfo("info_answer0", "请输入答案", 1);
		return false;
	}

	if (!answer0.match(isMibaoRegex)){
		showinfo("info_answer0", "答案格式错误", 1);
		return false;
	}

	if (answer1.length == 0) {
		showinfo("info_answer1", "请输入答案", 1);
		return false;
	}
	if (!answer1.match(isMibaoRegex)){
		showinfo("info_answer1", "答案格式错误", 1);
		return false;
	}

	if (answer2.length == 0) {
		showinfo("info_answer2", "请输入答案", 1);
		return false;
	}

	if (!answer2.match(isMibaoRegex)){
		showinfo("info_answer2", "答案格式错误", 1);
		return false;
	}

	$.ajax({
		type : 'POST',
		url : '../account/checkByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_0").val()+'","answer0":"'+answer0 +'","answer1":"'+answer1 +'","answer2":"'+answer2 +'","channelId":"3","securityType":"'+ $("#securityType").val()+'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code != 1001){
				switch (code){
					case 3016:
						showinfo("info_yz_mibao_dlg", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_yz_mibao_dlg", "今日验证身份次数达到上限", 1);
						break;
					case 3009:
						hideDiv($("#yz_mibao_dlg"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#yz_mibao_dlg"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_yz_mibao_dlg", redata.resultDesc, 1);
						break;
				}
				return;
			}

			$("#requestKey_2").val(redata.data.requestKey);
			hideDiv($("#yz_mibao_dlg"));

			judgeType();

		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

});

$("#activate_btn").click(function(){
	$.ajax({
		type: 'POST',
		url: 'account/reSendMail',
		cache: false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型

		beforeSend: function () {
		},
		success: function (redata) {
			if (redata.resultCode != 1001) {
				return;
			}
			showToast($("#success_toast"),"已发送验证邮件至您的邮箱，请于24小时内前往邮箱进行操作");
		}
	})
})
//获取安全状态js
$("#changemobile .row_right,#changeemail .set_btn, #changeemail .modify_btn ,#changemibao .set_btn").click(function(){
	if ($("#third_status").val()=='1'){
		showDiv($("#safe_dlg1"));
		$("#auth_code_mobile3").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
		return;
	}
     $("#securityType").val($(this).attr("link"));
	 var username = $("#username").val();
		$.ajax({
			type : 'POST',
			url : '../account/getSafetyStatus',
			cache : false,
			contentType: "application/json; charset=utf-8",   //内容类型
			dataType: "json",     //类型
			data : '{"identify" :"'+ username + '","securityType":"'+ $("#securityType").val()+'"}',
			beforeSend : function() {
			},
			success : function(redata) {
				if (redata.resultCode!=1001){
					if (redata.resultCode == 3009){
						showDiv($("#expired_dlg"));
					}else{
						if (redata.resultCode == 4010){
							showDiv($("#timeout_dlg"));
						}
					}
					return;
				}
				var status =redata.data;
				var id = status.userId;
				var mobile = status.mobile;
				var email = status.email;

				var protections = status.protections;
				$("#requestKey_0").val(status.requestKey);

				if (mobile !== null){
					$("#phoneNum").html(mobile);
					$("#phoneNum1").html(mobile);
					$("#yz_email_dlg").find(".other_way").eq(0).show();
					if (email == null){
						$("#yz_sms_dlg").find(".other_way").eq(0).hide();
					}else{
						$("#yz_sms_dlg").find(".other_way").eq(0).show();
						$("#email").html(email);
						$("#email1").html(email);
					}

					if (protections == null || protections.length == 0){
						$("#yz_sms_dlg").find(".other_way").eq(1).hide();
						$("#yz_email_dlg").find(".other_way").eq(1).hide();
					}else{
						$("#yz_sms_dlg").find(".other_way").eq(1).show();
						$("#yz_email_dlg").find(".other_way").eq(1).show();


						$("#question0").html(status.protections[0]);
						$("#question1").html(status.protections[1]);
						$("#question2").html(status.protections[2]);
					}

					showDiv($("#yz_sms_dlg"));

				}else{
					$("#yz_email_dlg").find(".other_way").eq(0).hide();
					if (email!== null){
						$("#email").html(email);
						$("#email1").html(email);
						if (protections == null || protections.length == 0){
							$("#yz_email_dlg").find(".other_way").eq(1).hide();
						}else{
							$("#yz_email_dlg").find(".other_way").eq(1).show();

							$("#question0").html(status.protections[0]);
							$("#question1").html(status.protections[1]);
							$("#question2").html(status.protections[2]);
						}
						showDiv($("#yz_email_dlg"));
					}else{

						if (protections != null &&  protections.length > 0){
							$("#question0").html(status.protections[0]);
							$("#question1").html(status.protections[1]);
							$("#question2").html(status.protections[2]);
							showDiv($("#yz_mibao_dlg"));
						}else{
							//通过密码验证
							showDiv($("#yz_pwd_dlg"));
						}
					}
				}


			},
			complete : function(req) {
			},
			error : function(data) {
			}
		});

})





//验证js
//密码验证
$("#yz_pwd_dlg .login_button").click(function(){
	var password = $("#pwd").val();
	if (password.length == 0 || $.trim(password).length == 0){
		showinfo("info_pwd","请输入密码",1);
		return false;
	}

	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_0").val()+'","channelId":"4","securityType":"'+ $("#securityType").val() +'","password":"' + $.md5(password) +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (redata.resultCode!=1001){
				switch (code){
					case 3008:
					case 2008:
						showinfo("info_pwd", redata.resultDesc, 1);
						break;
					case 3016:
						showinfo("info_yz_pwd_dlg", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_yz_pwd_dlg", "今日验证身份次数达到上限", 1);
						break;
					case 3009:
						hideDiv($("#yz_pwd_dlg"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#yz_pwd_dlg"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_yz_pwd_dlg", redata.resultDesc, 1);
						break;
				}
				return;
			}
			$("#requestKey_2").val(redata.data.requestKey);
			hideDiv($("#yz_pwd_dlg"));
			judgeType();

		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

})




//短信验证
$("#yz_sms_dlg").find(".login_button").click(function(){
	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_0").val()+'","channelId":"1","securityType":"'+ $("#securityType").val()+'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code != 1001){
				switch (code){
					case 3017:
						showinfo("info_yz_sms_dlg", "今日发送短信次数达到上限", 1);
						break;
					case 3016:
						showinfo("info_yz_sms_dlg","验证时间间隔太短", 1);
						break;
					case 3009:
						hideDiv($("#yz_sms_dlg"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#yz_sms_dlg"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_yz_sms_dlg", redata.resultDesc, 1);
						break;
				}
				return;
			}
			$("#requestKey_1").val(redata.data.requestKey);
			hideDiv($("#yz_sms_dlg"));
			showDiv($("#yz_sms_dlg1"));
			time_mobile1();
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
})

//短信验证输入验证码
$("#yz_sms_dlg1").find(".login_button").click(function() {
	var vercode = $("#vercode2").val();
	if (vercode.length == 0 || ($.trim(vercode)).length == 0) {
		showinfo("info_vercode2", "请输入验证码", 1);
		return false;
	}

	if (!vercode.match(isVercodeRegex)){
		showinfo("info_vercode2", "验证码错误", 1);
		return false;
	}
	$.ajax({
		type : 'POST',
		url : '../account/checkByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_1").val()+'","activationCode":"'+vercode +'","channelId":"1"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code != 1001){
				switch (code){
					case 2009:
						showinfo("info_vercode2","验证码错误", 1);
						break;
					case 3016:
						showinfo("info_yz_sms_dlg1", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_yz_sms_dlg1", "今日发送邮件次数达到上限", 1);
						break;
					case 3009:
						document.getElementById("btn_verify_mobile1").innerHTML = "<span id='time_mobile1'>60</span>S";
						document.getElementById("btn_verify_mobile1").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile1").setAttribute("onclick", "");
						if (xh_mobile1 != null){
							clearTimeout(xh_mobile1);
						}
						hideDiv($("#yz_sms_dlg1"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						document.getElementById("btn_verify_mobile1").innerHTML = "<span id='time_mobile1'>60</span>S";
						document.getElementById("btn_verify_mobile1").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile1").setAttribute("onclick", "");
						if (xh_mobile1 != null){
							clearTimeout(xh_mobile1);
						}
						hideDiv($("#yz_sms_dlg1"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_yz_sms_dlg1", redata.resultDesc, 1);
						break;

				}
				return;
			}

			$("#requestKey_2").val(redata.data.requestKey);
			document.getElementById("btn_verify_mobile1").innerHTML = "<span id='time_mobile1'>60</span>S";
			document.getElementById("btn_verify_mobile1").className = "btn_verify_unedit";
			document.getElementById("btn_verify_mobile1").setAttribute("onclick", "");
			if (xh_mobile1 != null){
				clearTimeout(xh_mobile1);
			}
			hideDiv($("#yz_sms_dlg1"));
			 judgeType();
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

})



//邮箱验证身份
$("#yz_email_dlg").find(".login_button").click(function(){
	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_0").val()+'","channelId":"2","securityType":"'+ $("#securityType").val()+'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code != 1001){
				switch (code){
					case 3016:
						showinfo("info_yz_email_dlg", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_yz_email_dlg", "今日发送邮件次数达到上限", 1);
						break;
					case 3009:
						hideDiv($("#yz_email_dlg"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#yz_email_dlg"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_yz_email_dlg", redata.resultDesc, 1);
						break;

				}
				return;
			}
			$("#requestKey_1").val(redata.data.requestKey);
			hideDiv($("#yz_email_dlg"));
			showDiv($("#yz_email_dlg1"));
			time_email1();
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
})





$("#yz_email_dlg1").find(".login_button").click(function() {
	var vercode = $.trim($("#vercode3").val());
	if (vercode.length == 0) {
		showinfo("info_vercode3", "请输入验证码", 1);
		return false;
	}

	if (!vercode.match(isVercodeRegex)){
		showinfo("info_vercode3", "验证码错误", 1);
		return false;
	}
	$.ajax({
		type : 'POST',
		url : '../account/checkByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_1").val()+'","activationCode":"'+vercode +'","channelId":"2"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code != 1001){
				switch (code){
					case 2009:
						showinfo("info_vercode3","验证码错误", 1);
						break;
					case 3016:
						showinfo("info_yz_email_dlg1", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_yz_email_dlg1", "今日发送邮件次数达到上限", 1);
						break;
					case 3009:
						document.getElementById("btn_verify_email1").innerHTML = "<span id='time_email1'>60</span>S";
						document.getElementById("btn_verify_email1").className = "btn_verify_unedit";
						document.getElementById("btn_verify_email1").setAttribute("onclick", "");
						if (xh_email1 != null){
							clearTimeout(xh_email1);
						}

						hideDiv($("#yz_email_dlg1"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						document.getElementById("btn_verify_email1").innerHTML = "<span id='time_email1'>60</span>S";
						document.getElementById("btn_verify_email1").className = "btn_verify_unedit";
						document.getElementById("btn_verify_email1").setAttribute("onclick", "");
						if (xh_email1 != null){
							clearTimeout(xh_email1);
						}

						hideDiv($("#yz_email_dlg1"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_yz_email_dlg1", redata.resultDesc, 1);
						break;

				}
				return;
			}
			$("#requestKey_2").val(redata.data.requestKey);

			document.getElementById("btn_verify_email1").innerHTML = "<span id='time_email1'>60</span>S";
			document.getElementById("btn_verify_email1").className = "btn_verify_unedit";
			document.getElementById("btn_verify_email1").setAttribute("onclick", "");
			if (xh_email1 != null){
				clearTimeout(xh_email1);
			}

			hideDiv($("#yz_email_dlg1"));

			judgeType();

		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

})


//再次获取验证码
function get_code_mobile1() {
	$("#auth_code_mobile1").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
}

function get_code_email1() {
	$("#auth_code_email1").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
}
$(document).on("click","#auth_code_mobile1",function(){
	get_code_mobile1();
});

$(document).on("click","#auth_code_email1",function(){
	get_code_email1();
});

$(document).on("click","#auth_code_mobile3",function(){
	$("#auth_code_mobile3").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
});


//倒计时
var xh_mobile1;
var xh_email1;
var xh_mobile2;
//手机号码验证身份倒计时
function time_mobile1() {
	var t = $("#time_mobile1").html();
	t--;
	$("#time_mobile1").html(t);
	xh_mobile1 = setTimeout(function() {
		time_mobile1();
	}, 1000);
	if (t < 1) {
		clearTimeout(xh_mobile1);
		$("#btn_verify_mobile1").html("重新获取");
		document.getElementById("btn_verify_mobile1").className = "btn_verify";
		document.getElementById("btn_verify_mobile1").setAttribute("onclick","send_verify_mobile1()");
	}
}

$("#yz_sms_dlg1 .ico_close").click(function(){
	document.getElementById("btn_verify_mobile1").innerHTML = "<span id='time_mobile1'>60</span>S";
	document.getElementById("btn_verify_mobile1").className = "btn_verify_unedit";
	document.getElementById("btn_verify_mobile1").setAttribute("onclick", "");
	if (xh_mobile1 != null){
		clearTimeout(xh_mobile1);
	}
})




function send_verify_mobile1(){
	showinfo("info_yz_sms_dlg1", "", 1);
	document.getElementById("btn_verify_mobile1").innerHTML = "<span id='time_mobile1'>60</span>S";
	document.getElementById("btn_verify_mobile1").className = "btn_verify_unedit";
	document.getElementById("btn_verify_mobile1").setAttribute("onclick", "");
	time_mobile1();
	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_0").val()+'","channelId":"1","securityType":"'+ $("#securityType").val()+'"}',
		beforeSend : function() {
		},
		success : function(redata) {
            var code = redata.resultCode;
			if (code !=1001){
				switch (code){
					case 2009:
						showinfo("info_yz_sms_dlg1", "验证码错误", 1);
						break;
					case 3016:
						showinfo("info_yz_sms_dlg1", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_yz_sms_dlg1", "今日发送短信次数达到上限", 1);
						break;
					case 3009:
						document.getElementById("btn_verify_mobile1").innerHTML = "<span id='time_mobile1'>60</span>S";
						document.getElementById("btn_verify_mobile1").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile1").setAttribute("onclick", "");
						if (xh_mobile1 != null){
							clearTimeout(xh_mobile1);
						}
						hideDiv($("#yz_sms_dlg1"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						document.getElementById("btn_verify_mobile1").innerHTML = "<span id='time_mobile1'>60</span>S";
						document.getElementById("btn_verify_mobile1").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile1").setAttribute("onclick", "");
						if (xh_mobile1 != null){
							clearTimeout(xh_mobile1);
						}

						hideDiv($("#yz_sms_dlg1"));
						showDiv($("#timeout_dlg"));
						break;

					default:
						showinfo("info_yz_sms_dlg1", redata.resultDesc, 1);
						break;
				}
				return;
			}

			$("#requestKey_1").val(redata.data.requestKey);
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
}


function time_mobile2() {
	var t = $("#time_mobile2").html();
	t--;
	$("#time_mobile2").html(t);
	xh_mobile2 = setTimeout(function() {
		time_mobile2();
	}, 1000);
	if (t < 1) {
		clearTimeout(xh_mobile2);
		$("#btn_verify_mobile2").html("重新获取");
		document.getElementById("btn_verify_mobile2").className = "btn_verify";
		document.getElementById("btn_verify_mobile2").setAttribute("onclick","send_verify_mobile2()");
	}
}

$("#mobile_dlg2 .ico_close").click(function(){
	document.getElementById("btn_verify_mobile2").innerHTML = "<span id='time_mobile2'>60</span>S";
	document.getElementById("btn_verify_mobile2").className = "btn_verify_unedit";
	document.getElementById("btn_verify_mobile2").setAttribute("onclick", "");

	if (xh_mobile2 != null){
		clearTimeout(xh_mobile2);
	}
})




function send_verify_mobile2(){
	showinfo("info_mobile_dlg2", "", 1);
	document.getElementById("btn_verify_mobile2").innerHTML = "<span id='time_mobile2'>60</span>S";
	document.getElementById("btn_verify_mobile2").className = "btn_verify_unedit";
	document.getElementById("btn_verify_mobile2").setAttribute("onclick", "");
	time_mobile2();
	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_2").val()+'","mobile" :"'+ $("#new_phoneNum").html() + '","channelId":"1","securityType":"'+ $("#securityType").val()+'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code !=1001){
				switch (code){
					case 2009:
						showinfo("info_mobile_dlg2", "验证码错误", 1);
						break;
					case 3016:
						showinfo("info_mobile_dlg2", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_mobile_dlg2", "今日发送短信次数达到上限", 1);
						break;
					case 3009:
						document.getElementById("btn_verify_mobile2").innerHTML = "<span id='time_mobile2'>60</span>S";
						document.getElementById("btn_verify_mobile2").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile2").setAttribute("onclick", "");
						if (xh_mobile2!= null){
							clearTimeout(xh_mobile2);
						}
						hideDiv($("#mobile_dlg2"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						document.getElementById("btn_verify_mobile2").innerHTML = "<span id='time_mobile2'>60</span>S";
						document.getElementById("btn_verify_mobile2").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile2").setAttribute("onclick", "");
						if (xh_mobile2!= null){
							clearTimeout(xh_mobile2);
						}

						hideDiv($("#mobile_dlg2"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_mobile_dlg2", redata.resultDesc, 1);
						break;
				}
				return;
			}
			$("#requestKey_3").val(redata.data.requestKey);
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
}




//邮箱验证身份倒计时
function time_email1() {
	var t = $("#time_email1").html();
	t--;
	$("#time_email1").html(t);
	xh_email1 = setTimeout(function() {
		time_email1();
	}, 1000);
	if (t < 1) {
		clearTimeout(xh_email1);
		$("#btn_verify_email1").html("重新获取");
		document.getElementById("btn_verify_email1").className = "btn_verify";
		document.getElementById("btn_verify_email1").setAttribute("onclick","send_verify_email1()");
	}
}



$("#yz_email_dlg1 .ico_close").click(function(){
	document.getElementById("btn_verify_email1").innerHTML = "<span id='time_email1'>60</span>S";
	document.getElementById("btn_verify_email1").className = "btn_verify_unedit";
	document.getElementById("btn_verify_email1").setAttribute("onclick", "");
	if (xh_email1 != null){
		clearTimeout(xh_email1);
	}
})


function send_verify_email1() {
	showinfo("info_yz_email_dlg1","",1);
	document.getElementById("btn_verify_email1").innerHTML = "<span id='time_email1'>60</span>S";
	document.getElementById("btn_verify_email1").className = "btn_verify_unedit";
	document.getElementById("btn_verify_email1").setAttribute("onclick", "");
	time_email1();
	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_0").val()+'","channelId":"2","securityType":"'+ $("#securityType").val()+'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			if (redata.resultCode!=1001){
              if (redata.resultCode == 3009){
				  document.getElementById("btn_verify_email1").innerHTML = "<span id='time_email1'>60</span>S";
				  document.getElementById("btn_verify_email1").className = "btn_verify_unedit";
				  document.getElementById("btn_verify_email1").setAttribute("onclick", "");
				  if (xh_email1 != null){
					  clearTimeout(xh_email1);
				  }
				  hideDiv($("#yz_email_dlg1"));
				  showDiv($("#expired_dlg"));
				  return;
			  }else{
				  if (redata.resultCode == 4010) {
					  document.getElementById("btn_verify_email1").innerHTML = "<span id='time_email1'>60</span>S";
					  document.getElementById("btn_verify_email1").className = "btn_verify_unedit";
					  document.getElementById("btn_verify_email1").setAttribute("onclick", "");
					  if (xh_email1 != null) {
						  clearTimeout(xh_email1);
					  }
					  hideDiv($("#yz_email_dlg1"));
					  showDiv($("#timeout_dlg"));
					  return;
				  }
			  }
				showinfo("info_yz_email_dlg1", redata.resultDesc, 1);
				return;
			}
			$("#requestKey_1").val(redata.data.requestKey);
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
}



//绑定重绑手机
$("#mobile_dlg1 .login_button").click(function(){
	var new_mobile = $("#new_mobile").val();
	var vercode = $("#vercode_mobile1").val();
	if (new_mobile.length == 0 || ($.trim(new_mobile)).length == 0) {
		showinfo("info_new_mobile", "请输入手机号码", 1);
		return false;
	}

	if (!new_mobile.match(isMobileRegex)){
		showinfo("info_new_mobile","手机号码格式错误",1);
		return false;
	}


	if (vercode.length == 0 || ($.trim(vercode)).length == 0) {
		showinfo("info_vercode_mobile1", "请输入验证码", 1);
		return false;
	}

	if (!vercode.match(isCaptchaRegx)){
		showinfo("info_vercode_mobile1", "验证码错误", 1);
		return false;
	}
	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_2").val()+'","channelId":"1","securityType":"'+ $("#securityType").val()+'","mobile" :"'+ new_mobile+'","activationCode" :"'+ vercode +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code!=1001){
				switch (code){
					case 2009:
						showinfo("info_vercode_mobile1", "验证码错误", 1);
						break;
					case 3004:
						showinfo("info_new_mobile", "此手机号已被绑定", 1);
						break;
					case 3016:
						showinfo("info_mobile_dlg1", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_mobile_dlg1", "今日发送短信次数达到上限", 1);
						break;
					case 3009:
						hideDiv($("#mobile_dlg1"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#mobile_dlg1"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_mobile_dlg1", redata.resultDesc, 1);
						break;
				}
				$("#auth_code_mobile1").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
				return;
			}
			$("#requestKey_3").val(redata.data.requestKey);
			hideDiv($("#mobile_dlg1"));

			$("#new_phoneNum").html($.trim(new_mobile));
			showDiv($("#mobile_dlg2"));
			time_mobile2();
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

})


$("#mobile_dlg2 .login_button").click(function(){
	var activationCode = $("#vercode_mobile2").val();
	if(activationCode.length == 0 || $.trim(activationCode).length == 0){
		showinfo("info_vercode_mobile2", "请输入验证码", 1);
		return false;
	}
	if(!activationCode.match(isVercodeRegex)){
		showinfo("info_vercode_mobile2", "验证码错误", 1);
		return false;
	}

	$.ajax({
		type : 'POST',
		url : '../bind/changeBindMobile',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_3").val()+'","activationCode" :"'+ activationCode +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
           	var code = redata.resultCode;
			if (code !=1001){
				switch (code){
					case 2009:
						showinfo("info_vercode_mobile2", "验证码错误", 1);
						break;
					case 3016:
						showinfo("info_mobile_dlg2", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_mobile_dlg2", "今日发送短信次数达到上限", 1);
						break;
					case 3009:
						document.getElementById("btn_verify_mobile2").innerHTML = "<span id='time_mobile2'>60</span>S";
						document.getElementById("btn_verify_mobile2").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile2").setAttribute("onclick", "");
						if (xh_mobile2 != null){
							clearTimeout(xh_mobile2);
						}

						hideDiv($("#mobile_dlg2"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						document.getElementById("btn_verify_mobile2").innerHTML = "<span id='time_mobile2'>60</span>S";
						document.getElementById("btn_verify_mobile2").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile2").setAttribute("onclick", "");
						if (xh_mobile2 != null){
							clearTimeout(xh_mobile2);
						}

						hideDiv($("#mobile_dlg2"));
						showDiv($("#timeout_dlg"));
						break;

					default:
						showinfo("info_mobile_dlg2", redata.resultDesc, 1);
						break;
				}
				return;
			}

			document.getElementById("btn_verify_mobile2").innerHTML = "<span id='time_mobile2'>60</span>S";
			document.getElementById("btn_verify_mobile2").className = "btn_verify_unedit";
			document.getElementById("btn_verify_mobile2").setAttribute("onclick", "");
			if (xh_mobile2 != null){
				clearTimeout(xh_mobile2);
			}
			hideDiv($("#mobile_dlg2"));

			showToast($("#success_toast"),"已成功绑定安全手机");
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

})



//绑定/重绑邮箱
$("#email_dlg1").find(".login_button").click(function() {
    var email  = $("#new_email").val();
	if (email.length == 0 || $.trim(email).length == 0){
		showinfo("info_new_email","请输入邮箱地址",1);
		return false;
	}

	if (!email.match(isEmailRegex)){
		showinfo("info_new_email","邮箱格式错误",1);
		return false;
	}

	var vercode = $("#vercode_email1").val();
	if (vercode.length == 0 || ($.trim(vercode)).length == 0) {
		showinfo("info_vercode_email1", "请输入验证码", 1);
		return false;
	}

	if (!vercode.match(isCaptchaRegx)){
		showinfo("info_vercode_email1", "验证码错误", 1);
		return false;
	}
	$.ajax({
		type : 'POST',
		url : '../account/verifyByChannel',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_2").val()+'","channelId":"5","securityType":"'+ $("#securityType").val()+'","email" :"'+ email+'","activationCode" :"'+ vercode +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code!=1001){
				switch (code){
					case 2009:
						showinfo("info_vercode_email1", "验证码错误", 1);
						break;
					case 3003:
						showinfo("info_new_email", "此邮箱已被绑定", 1);
						break;
					case 3016:
						showinfo("info_email_dlg1", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_email_dlg1", "今日发送邮件次数已达上限", 1);
						break;
					case 3009:
						hideDiv($("#email_dlg1"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#email_dlg1"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_email_dlg1", redata.resultDesc, 1);
						break;
				}
				$("#auth_code_email1").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
				return;
			}


			$("#requestKey_3").val(redata.data.requestKey);
			hideDiv($("#email_dlg1"));
			showDiv($("#email_dlg2"));
		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

});



$("#email_dlg2").find(".login_button").click(function(){
	hideDiv($("#email_dlg2"));
});


//处理回车事件
$("#pwd").keypress(function(e){
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#yz_pwd_dlg .login_button").click();
	}
})



/*$("#oldpwd,#newpwd1,#repwd1").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#modify_pwd .confirm_btn").click();
	}
});
*/

$("#new_mobile,#vercode_mobile1").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#mobile_dlg1 .login_button").click();
	}
});


$("#vercode_mobile2").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#mobile_dlg2 .login_button").click();
	}
});


$("#new_email,#vercode_email1").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#email_dlg1 .login_button").click();
	}
});


$("#vercode_email2").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#email_dlg2 .login_button").click();
	}
});


$("#setanswer0,#setanswer1,#setanswer2").keypress(function(e){
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#mibao_dlg .login_button").click();
	}
});




$("#yz_sms_dlg1 #vercode2").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#yz_sms_dlg1 .login_button").click();
	}

});


$("#yz_email_dlg1 #vercode3").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();

		$("#yz_email_dlg1 .login_button").click();
	}

});

$("#yz_mibao_dlg #answer0, #yz_mibao_dlg #answer1, #yz_mibao_dlg #answer2").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();

		$("#yz_mibao_dlg .login_button").click();
	}

});



$("#set_pwd_dlg  #newpwd, #set_pwd_dlg #repwd").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#set_pwd_dlg .confirm_btn").click();
	}

});




$("#modify_pwd  #newpwd1, #modify_pwd #repwd1, #modify_pwd #oldpwd").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#modify_pwd .confirm_btn").click();
	}
});


$("#reset_form  #newpwd, #reset_form #repwd").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#reset_form .login_button").click();
	}

});


$("#modify_username  #newname").keypress(function(e) {
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#modify_username .confirm_btn").click();
	}

});

$("#safe_mobile,#vercode_mobile3").keypress(function(e){
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#safe_dlg1 .login_button").click();
 	}
})


$("#vercode_mobile4").keypress(function(e){
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#safe_dlg2 .login_button").click();
	}
})

$("#safepwd,#resafepwd").keypress(function(e){
	var key =  e.which;
	if (key === 13) {
		e.preventDefault();
		$("#safe_dlg3 .login_button").click();
	}
})


//重设密保
$("#mibao_dlg .login_button").click(function(){
	 if ($("#new_question0").html() == "选择密保问题一"){
		 showinfo("info_setanswer0", "选择密保问题", 1);
		 return false;
	 }
	 if ($("#new_question1").html() == "选择密保问题二"){
		 showinfo("info_setanswer1", "选择密保问题", 1);
		 return false;
	 }
	 if ($("#new_question2").html() == "选择密保问题三"){
		showinfo("info_setanswer2", "选择密保问题", 1);
		return false;
	 }

	 var answer0 = $.trim($("#setanswer0").val());
	 var answer1 = $.trim($("#setanswer1").val());
	 var answer2 = $.trim($("#setanswer2").val());
	 if (answer0.length == 0 ){
		 showinfo("info_setanswer0", "请输入答案", 1);
		 return false;
	 }
	 if(!answer0.match(isMibaoRegex)){
		 showinfo("info_setanswer0", "答案格式错误", 1);
		 return false;
	 }
	 if (answer1.length == 0){
		 showinfo("info_setanswer1", "请输入答案", 1);
		 return false;
	 }
	if(!answer1.match(isMibaoRegex)){
		showinfo("info_setanswer1", "答案格式错误", 1);
		return false;
	}

	if (answer2.length == 0){
		showinfo("info_setanswer2", "请输入答案", 1);
		return false;
	}
	if(!answer2.match(isMibaoRegex)){
		showinfo("info_setanswer2", "答案格式错误", 1);
		return false;
	}

	var  request_url = "";
	if ($("#securityType").val() == "modifyProblem"){
		request_url = "modifyProblem";
	}else{
		request_url = "createProblem";
	}

	$.ajax({
		type : 'POST',
		url : '../' + request_url,
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data : '{"requestKey" :"'+ $("#requestKey_2").val()+'","question0" :"'+ $("#new_question0").html() + '","question1" :"'+ $("#new_question1").html() + '","question2" :"'+ $("#new_question2").html()
			+ '","answer0" :"'+  answer0 + '","answer1" :"'+  answer1 + '","answer2" :"'+ answer2 +'"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code != 1001){
				switch (code){
					case 3016:
						showinfo("info_mibao_dlg", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_mibao_dlg", "今日验证身份次数达到上限", 1);
						break;
					case 3009:
						hideDiv($("#mibao_dlg"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#mibao_dlg"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_mibao_dlg", redata.resultDesc, 1);
						break;
				}
				return;
			}


			hideDiv($("#mibao_dlg"));
			if ($("#securityType").val() == "modifyProblem"){
				showToast($("#success_toast"),"已成功修改密保");
			}else{
				showToast($("#success_toast"),"已成功设置密保");
			}

		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});

})


$("#mibao_dlg .ico_close").click(function(){
	$("#new_question0").html("选择密保问题一");
	$("#new_question1").html("选择密保问题二");
	$("#new_question2").html("选择密保问题三");
	$("#question_list li").show();
	document.getElementById("question_list").scrollTop=0;
	$("#question_list").hide();
	$("#new_question0").attr("index","");
	$("#new_question1").attr("index","");
	$("#new_question2").attr("index","");
})


window.onresize = function(){
	$(".mask").css({"height":$(document).height(),"width":$(document).width()});
	var dlg_id= $("#dlg_id").val();
	if (dlg_id != ''){
		var obj = $("#"+dlg_id);
		obj.css({
			"top":$(window).height()/2-obj.height()/2+$(window.document).scrollTop()+"px",
			"margin-left":$(window).width()/2-220+$(window.document).scrollLeft()+"px"
		});
	}


	if (document.getElementById("question_list") && document.getElementById("question_list").style.display == "block"){
		var question_id = $("#question_id").val();
		document.getElementById("question_list").style.top=$("#"+question_id).offset().top+45+"px";
	}

}



//退出帐号
$(".quit_link").click(function(){
	$.ajax({
		type: 'POST',
		url: '../logout',
		cache: false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		beforeSend: function () {
		},
		success: function (redata) {
			if (redata.resultCode != 1001) {
				return;
			}
			//setCookie
			  if (redata.data!=null &&  redata.data.length > 0) {
			 	 showDiv($("#quit_toast"));
                len=redata.data.length;
                cookieList = redata.data;
                var url= cookieList[k++]+"&jsonpCallback=logoutCallback&_="+new Date().getTime();
                var script=document.createElement("img");
                script.src=url;
                document.getElementsByTagName("head")[0].appendChild(script);
               //加载完成执行logoutCallback
        		imgLoad(script, function() {
        		    logoutCallback();
        		})

                if (xt1!=null){
                    clearTimeout(xt1);
                }
                xt1 = setTimeout(function() {
                    notResponse();
                }, 5000);
                window.load_status=0;
            }else{
                 //根据回调跳转
                 if (u.callback){
                 	window.location.href = decodeURIComponent(u.callback);
                 }else{
               	 	window.location.href = $("#loginUrl").val();
                }
            }			
		}
	})
})


// function imgLoad(img, callback) {
// 	var timer = setInterval(function() {
// 		if (img.complete) {
// 			callback(img)
// 			clearInterval(timer)
// 		}
// 	}, 50)
// }

// function imgLoad(img, callback) {
//
// 	var timer = setInterval(function() {
//
// 		if(document.all){
//
// 			if(img.readyState == "complete"){callback(img);clearInterval(timer);}
//
// 		}else{
//
// 			if(img.complete){callback(img);clearInterval(timer);}
//
// 		}
//
// 	}, 50)
//
// }

function imgLoad(img, callback) {
	function a(){
		if((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
			// alert(img.readyState)
			// if(img.readyState == "complete"){
			callback(img);
			clearInterval(timer);
			// }
		}else{
			if(img.complete){callback(img);clearInterval(timer);}
		}
	}
	var timer = setInterval(a, 50)
}

function setCookie(){
     if (k<len){
            var url= cookieList[k++]+"&jsonpCallback=logoutCallback&_="+new Date().getTime();
            var script=document.createElement("img");
            script.src=url;
            document.getElementsByTagName("head")[0].appendChild(script);
            //加载完成执行logoutCallback
               //加载完成执行logoutCallback
        		imgLoad(script, function() {
        		    logoutCallback();
        		})
             if (xt1!=null){
                    clearTimeout(xt1);
                }
                xt1 = setTimeout(function() {
                    notResponse();
                }, 5000);
                window.load_status=0;
    }else{
        //根据回调跳转
        if (xt1!=null){
             clearTimeout(xt1);
        }

 		if (u.callback){
           window.location.href = decodeURIComponent(u.callback);
        }else{
            window.location.href = $("#loginUrl").val();
        }
     } 
}

function  notResponse(){  
    clearTimeout(xt1);
    if (window.load_status==0){
        window.load_status=1;
       setCookie();                
    }
}


function logoutCallback(redata){
	window.load_status=1;
    setCookie();
}

//绑定安全信息
var xh_mobile4;
//手机号码验证身份倒计时
function time_mobile4() {
	var t = $("#time_mobile4").html();
	t--;
	$("#time_mobile4").html(t);
	xh_mobile4 = setTimeout(function() {
		time_mobile4();
	}, 1000);
	if (t < 1) {
		clearTimeout(xh_mobile4);
		$("#btn_verify_mobile4").html("重新获取");
		document.getElementById("btn_verify_mobile4").className = "btn_verify";
		document.getElementById("btn_verify_mobile4").setAttribute("onclick","send_verify_mobile4()");
	}
}

$("#safe_dlg2 .ico_close").click(function(){
	document.getElementById("btn_verify_mobile4").innerHTML = "<span id='time_mobile4'>60</span>S";
	document.getElementById("btn_verify_mobile4").className = "btn_verify_unedit";
	document.getElementById("btn_verify_mobile4").setAttribute("onclick", "");
	if (xh_mobile4 != null){
		clearTimeout(xh_mobile4);
	}
})


function send_verify_mobile4(){
	showinfo("info_safe_dlg2", "", 1);
	document.getElementById("btn_verify_mobile4").innerHTML = "<span id='time_mobile4'>60</span>S";
	document.getElementById("btn_verify_mobile4").className = "btn_verify_unedit";
	document.getElementById("btn_verify_mobile4").setAttribute("onclick", "");
	time_mobile4();
	$.ajax({
		type : 'POST',
		url : '../bind/retrySms',
		cache : false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型

		data : '{"requestKey" :"' + $("#requestKey").val()  +'","mobile" :"'+ $("#safe_phoneNum").html() + '","channelId":"1"}',
		beforeSend : function() {
		},
		success : function(redata) {
			var code = redata.resultCode;
			if (code !=1001){
				switch (code){
					case 2009:
						showinfo("info_vercode_mobile4", "验证码错误", 1);
						break;
					case 3016:
						showinfo("info_safe_dlg2", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_safe_dlg2", "今日发送短信次数达到上限", 1);
						break;
					case 3009:
						document.getElementById("btn_verify_mobile4").innerHTML = "<span id='time_mobile4'>60</span>S";
						document.getElementById("btn_verify_mobile4").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile4").setAttribute("onclick", "");
						if (xh_mobile4 != null){
							clearTimeout(xh_mobile4);
						}
						hideDiv($("#safe_dlg2"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						document.getElementById("btn_verify_mobile4").innerHTML = "<span id='time_mobile4'>60</span>S";
						document.getElementById("btn_verify_mobile4").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile4").setAttribute("onclick", "");
						if (xh_mobile4 != null){
							clearTimeout(xh_mobile4);
						}

						hideDiv($("#safe_dlg2"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_safe_dlg2", redata.resultMsg, 1);
						break;
				}
				return;
			}


		},
		complete : function(req) {
		},
		error : function(data) {
		}
	});
}




$("#safe_dlg1 .login_button").click(function(){
	var mobile  = $.trim($("#safe_mobile").val());
	if (mobile.length == 0 ){
		showinfo("info_safe_mobile","请输入手机号码",1);
		return false;
	}

	if (!mobile.match(isMobileRegex)){
		showinfo("info_safe_mobile","手机号码格式错误",1);
		return false;
	}
	var captcha = $.trim($("#vercode_mobile3").val());
	if (captcha.length == 0) {
		showinfo("info_vercode_mobile3", "请输入验证码", 1);
		return false;
	}

	if (!captcha.match(isCaptchaRegx)){
		showinfo("info_vercode_mobile3", "验证码错误", 1);
		return false;
	}

	$.ajax({
		type: 'POST',
		url: '../bind/sms',
		cache: false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data: '{"mobile" :"' + mobile + '","captcha":"' + captcha + '"}',
		beforeSend: function () {
		},
		success: function (redata) {
			var code = redata.resultCode;
			var  errMsg = redata.resultMsg;
			if (code!= 1001) {
				switch (code) {
					case 2009:
						showinfo("info_vercode_mobile3", "验证码错误", 1);
						break;
					case 3004:
						showinfo("info_safe_mobile", "手机号已注册", 1);
						break;
					case 3016:
						showinfo("info_vercode_mobile3", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_vercode_mobile3", "今日验证次数已达上限", 1);
						break;
					case 3009:
						hideDiv($("#safe_dlg1"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#safe_dlg1"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_safe_dlg1", errMsg, 1);
						break;
				}
				$("#auth_code_mobile3").attr("src", $("#captchaUrl").val()+"?vertion="+ Math.random());
				return;
			}

			$("#safe_phoneNum").html(mobile);
			var status =redata.data;
			$("#requestKey").val(status.requestKey);
			time_mobile4();
			hideDiv($("#safe_dlg1"));
			showDiv($("#safe_dlg2"));
		}
	})
})


$("#safe_dlg2 .login_button").click(function(){
	var authcode = $.trim($("#vercode_mobile4").val());
	if (authcode.length == 0) {
		showinfo("info_vercode_mobile4", "请输入验证码", 1);
		return false;
	}

	if (!authcode.match(isVercodeRegex)){
		showinfo("info_vercode_mobile4", "验证码错误", 1);
		return false
	}

	$.ajax({
		type: 'POST',
		url: '../bind/validate',
		cache: false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data: '{"mobile" :"' + $("#safe_phoneNum").html()  + '","authCode":"' + authcode + '","requestKey":"' + $("#requestKey").val()  +'"}',
		beforeSend: function () {
		},
		success: function (redata) {
			var code = redata.resultCode;
			if (code!= 1001) {
				switch (code) {
					case 2009:
						showinfo("info_vercode_mobile4", "验证码错误", 1);
						break;
					case 3016:
						showinfo("info_safe_dlg2", "验证时间间隔太短", 1);
						break;
					case 3017:
						showinfo("info_safe_dlg2", "今日验证次数已达上限", 1);
						break;
					case 3009:
						document.getElementById("btn_verify_mobile4").innerHTML = "<span id='time_mobile4'>60</span>S";
						document.getElementById("btn_verify_mobile4").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile4").setAttribute("onclick", "");
						if (xh_mobile4 != null){
							clearTimeout(xh_mobile4);
						}
						hideDiv($("#safe_dlg2"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						document.getElementById("btn_verify_mobile4").innerHTML = "<span id='time_mobile4'>60</span>S";
						document.getElementById("btn_verify_mobile4").className = "btn_verify_unedit";
						document.getElementById("btn_verify_mobile4").setAttribute("onclick", "");
						if (xh_mobile4 != null){
							clearTimeout(xh_mobile4);
						}
						hideDiv($("#safe_dlg2"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_safe_dlg2",redata.resultMsg, 1);
						break;
				}
				return;
			}
			document.getElementById("btn_verify_mobile4").innerHTML = "<span id='time_mobile4'>60</span>S";
			document.getElementById("btn_verify_mobile4").className = "btn_verify_unedit";
			document.getElementById("btn_verify_mobile4").setAttribute("onclick", "");
			if (xh_mobile4 != null){
				clearTimeout(xh_mobile4);
			}
			hideDiv($("#safe_dlg2"));
			showDiv($("#safe_dlg3"));
		}
	})
})


$("#safe_dlg3 .login_button").click(function(){
	var pwd = $.trim($("#safepwd").val());
	var pwd2 = $.trim($("#resafepwd").val());

	if (pwd.length == 0){
		showinfo("info_safepwd","请输入新密码",1);
		return false;
	}
	if (pwd2.length == 0){
		showinfo("info_resafepwd","请再次输入新密码",1);
		return false;
	}


	if (!pwd.match(isPasswordRegex)){
		showinfo("info_safepwd","密码格式错误",1);
		return false;
	}

	if (!pwd2.match(isPasswordRegex)){
		showinfo("info_resafepwd","密码格式错误",1);
		return false;
	}

	if (pwd!=pwd2){
		showinfo("info_resafepwd","新密码两次输入不一致",1);
		return false;
	}

	var url = '{"mobile" :"' + $("#new_phoneNum").html()  + '","password":"' +$.md5(pwd) + '","confirmPassword":"' +$.md5(pwd2) + '","requestKey":"' + $("#requestKey").val() + '","type":"1","style":"1"}';
	$.ajax({
		type: 'POST',
		url: '../bind/bind',
		cache: false,
		contentType: "application/json; charset=utf-8",   //内容类型
		dataType: "json",     //类型
		data: url,
		beforeSend: function () {
		},
		success: function (redata) {
			var code = redata.resultCode;
			if (code != 1001) {
				switch (code) {
					case 3009:
						hideDiv($("#safe_dlg3"));
						showDiv($("#expired_dlg"));
						break;
					case 4010:
						hideDiv($("#safe_dlg3"));
						showDiv($("#timeout_dlg"));
						break;
					default:
						showinfo("info_safe_dlg3", redata.resultMsg, 1);
						break;
				}
				return;
			}
			hideDiv($("#safe_dlg3"));
			showinfo("info_safe_dlg3","密码包含6-16位字母、数字",2);
			showToast($("#success_toast"),"已成功绑定安全信息");
		}

	})
})


