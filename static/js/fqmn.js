
/**
 * show_pic 
 * 
 * @param obj $obj img对象
 * @param width $width 要适应的高度
 * @param height $height 要适应的宽度
 * @access public
 * @return void
 */
function show_pic(obj, width, height) {
    var t_height = $(obj).height();
    var t_width = $(obj).width();
    var ph = height*1.0/t_height;
    var pw = width*1.0/t_width;
    if(ph < pw) {
        $(obj).height(height);
    } else {
        $(obj).width(width);
    }
}


/**
 * reload_vet_code 
 * 重新加载验证码 
 * @param img $img 
 * @access public
 * @return void
 */
function reload_vet_code(img) {
    $('#'+img).attr("src", "common/vet_code.php?t="+ Date.parse(new Date()));
}

function register() {
    var uname = $('input[name=uname]').val();
    if(! uname.match(/^[a-zA-Z0-9]+$/)) {
        //$('#uname_error').html('用户名只能包含数字和字母');
        alert('用户名不合法');
        return false;
    } else {
        $('#uname_error').html('*');
    }

    var passwd = $('input[name=passwd]').val();
    var passwd2 = $('input[name=passwd2]').val();
    if(passwd == "") {
        //$('#passwd_error').html('密码不能为空');
        alert('密码不能为空');
        return false;
    } else {
        $('#passwd_error').html('*');
    }
    if(passwd != passwd2) {
        alert('两次密码输入不一致');
        //$('#passwd2_error').html('两次密码输入不一致');
        return false;
    } else {
        $('#passwd2_error').html('*');
    }

    var address = $('input[name=address]').val();
    if(address == "") {
        //$('#address_error').html('地址不能为空');
        alert('地址不能为空');
        return false;
    } else {
        $('#address_error').html('*');
    }

    var phone = $('input[name=phone]').val();
    if(phone == "") {
        //$('#phone_error').html('电话不能为空');
        alert('电话不能为空');
        return false;
    } else {
        $('#phone_error').html('*');
    }

    var vetcode = $('input[name=vet_code]').val();
    if( (!$('#register_vet_code').is(':hidden')) && vetcode == "") {
        alert('验证码不能为空');
        //$('#vet_code_error').html('验证码不能为空');
        return false;
    } else {
        $('#vet_code_error').html('*');
    }

    $('#register').ajaxForm(function(data) {
        data = jQuery.parseJSON(data);
        if(data.errno == 0) {//注册成功后，需要条转到登陆页面
            alert(data.error);
            window.location.href = data.url;
        } else {//注册失败，提示失败信息，并且将验证码重置
            alert(data.error);
            reload_vet_code('t');
            $('input[name=vet_code]').val("");
            if(data.show_vet_code) {
                $('#register_vet_code').show();
            }
        }
    }); 
}


function login() {
    $('#login').ajaxForm(function(data){
        data = jQuery.parseJSON(data);
        if(data.errno == 0) {
            window.location.href = data.url;
        } else {
            alert(data.error);
            reload_vet_code('t');
            $('input[name=vet_code]').val("");
            if(data.show_vet_code) {
                $('#login_vet_code').show();
            }
        }
    
    });
    
}

function show_weight(number) {
    min_weight = $('#t_min_weight').val() * number / 1000;
    max_weight = $('#t_max_weight').val() * number / 1000;
    
    $('#r_min_weight').html(min_weight + 'kg');
    $('#r_max_weight').html(max_weight + 'kg');
/*
    min_weight = $('#t_min_weight').val() * number / 500;
    max_weight = $('#t_max_weight').val() * number / 500;
    
    $('#r2_min_weight').html(min_weight + '斤');
    $('#r2_max_weight').html(max_weight + '斤');
*/
}

function weight_minus() {
    number = $('input[sign=number]').val();
    number = parseFloat(number) - 1;
    number = number <= 1 ? 1 : number;
    $('input[sign=number]').val(number);
    show_weight(number);
}

function weight_add() {
    number = $('input[sign=number]').val();
    number = parseFloat(number) + 1;
    number = number <= 1 ? 1 : number;
    $('input[sign=number]').val(number);
    show_weight(number);
}

function weight_minus_by_id(id, sc_id) {
    number = $('#'+id).val();
    number = parseFloat(number) - 1;
    number = number <= 1 ? 1 : number;
    $.getJSON('index.php?s=Home-ShoppingCart-updateNumber&sc_id='+sc_id+'&number=' + number, function(){
        $('#'+id).val(number);
        location.reload();
    });
}

function weight_add_by_id(id, sc_id) {
    number = $('#'+id).val();
    number = parseFloat(number) + 1;
    number = number <= 1 ? 1 : number;
    $.getJSON('index.php?s=Home-ShoppingCart-updateNumber&sc_id='+sc_id+'&number=' + number, function(){
        $('#'+id).val(number);
        location.reload();
    });
}

function delivery_add() {
    $('#basic_info').ajaxForm(function(data){
        data = jQuery.parseJSON(data);
        alert(data.error);
        if(data.errno == 0) {
            window.location.href = data.url;
            return ;
        }
        reload_vet_code('t');
        $('input[name=vet_code]').val("");
    });
}

function edit_password() {
    $('#password').ajaxForm(function(data){
        data = jQuery.parseJSON(data);
        alert(data.error);
        reload_vet_code('t');
        $('input[name=vet_code]').val("");
    });
}

$(function(){
	$(".hmitem").hover(function(){
		$(".hmitem").removeClass('hlh');
		$(this).addClass('hlh');
		$(".hmitemdiv").hide();
		$("#hmitemdiv-" + $(this).attr('divid')).show();
	});
});

function update_send_time() {
    $t = $('#send_time').val();
    $.cookie('send_time', $t);
}

function init_order(allow) {
    if(allow == false) {
        alert('购物车中没有物品，不能结算');
        return ;
    }
    //if($('#send_time').val() == 0) {
    //    alert('请选择配送时间');
    //    return false;
    //}
    //if(!confirm('订单生成后将不可以修改和删除，您确定需要生成吗？')){return false;} 
    window.location.href='index.php?s=Home-Order-generate'; 
    this.onclick='';
}

function toggleHot(obj) {
    $('.hot_1').show();
    $('.hot_2').hide();
    $(obj).hide();
    $(obj).siblings('div').show();
}


/**
 * shopping_cart_add
 * 购物车中增加商品或者增加商品数量
 * 
 * @param goods_id $goods_id 
 * @param goods_number $goods_number 
 * @access public
 * @return void
 */
function shopping_cart_add(goods_id, goods_number) {
    shopping_cart = $.cookie('shopping_cart');
    if(typeof(shopping_cart) == 'undefined') {
        shopping_cart = '{}';
    }
    shopping_cart = JSON.parse(shopping_cart);
    if(goods_id in shopping_cart) {
        goods = shopping_cart[goods_id];
        goods.number = parseInt(goods.number) + parseInt(goods_number);
        shopping_cart = JSON.stringify(shopping_cart);
        $.cookie('shopping_cart', shopping_cart);
    } else {
        goods = {'goods_id':goods_id, 'number': parseInt(goods_number)};
        shopping_cart[goods_id] = goods;
        shopping_cart = JSON.stringify(shopping_cart);
        $.cookie('shopping_cart', shopping_cart);
    }
}

/**
 * shoping_cart_minus 
 * 购物车中减少商品数量或者删除商品
 * @param goods_id $goods_id 
 * @param goods_number $goods_number 
 * @access public
 * @return void
 */
function shopping_cart_minus(goods_id, goods_number) {
    goods_number = parseInt(goods_number);
    shopping_cart = $.cookie('shopping_cart');
    if(typeof(shopping_cart) == 'undefined') {
        shopping_cart = '{}';
        return ;
    }
    shopping_cart = JSON.parse(shopping_cart);
    if(goods_id in shopping_cart) {
        goods = shopping_cart[goods_id];
        tmp = parseInt(goods.number) - parseInt(goods_number);
        if(tmp <= 0) {
            shopping_cart[goods_id] = undefined;
        } else {
            goods.number = tmp;
        }
        shopping_cart = JSON.stringify(shopping_cart);
        $.cookie('shopping_cart', shopping_cart);   
    } else {
        return ;
    }
}

/**
 * shopping_cart_delete
 * 删除商品
 * 
 * @param goods_id $goods_id 
 * @access public
 * @return void
 */
function shopping_cart_delete(goods_id) {
    shopping_cart = $.cookie('shopping_cart');
    if(typeof(shopping_cart) == 'undefined') {
        shopping_cart = '{}';
        return ;
    }
    shopping_cart = JSON.parse(shopping_cart);
    shopping_cart[goods_id] = undefined;
    shopping_cart = JSON.stringify(shopping_cart);
    $.cookie('shopping_cart', shopping_cart);
}

/**
 * shopping_cart_add_animation 
 * 购物车物品添加动画效果 
 * @param from_x $from_x 
 * @param from_y $from_y 
 * @access public
 * @return void
 */
function shopping_cart_add_animation(em_id, add_number) {
    //em_tmp = $('#'+em_id).offset().top;
    em_tmp = $(document).height();
    em_left = $('#'+em_id).offset().left;

    em_top = $('#'+em_id).offset().top - $(window).scrollTop();
    obj = $('#amt').clone();
    $(obj).appendTo('body');
    obj.toggle();
    obj.css({ 
        'position': 'fixed',
        'top': em_top,
        'left': em_left,
        //'height': '100px',
        //'width': '100px',
        'z-index': '555',
    });
    obj.show();
    obj.animate({
        'height': '30px',
        'width': '30px',
        'left': document.body.scrollWidth  - 60,
        'top': '30%',
    }, 800);
    obj.animate({'top': '43%'}, 500, function(){
        obj.removeAttr('style');
        //$('.sc2_number font').html(parseInt($('.sc2_number font').html()) + parseInt(add_number));
        $('.sc2_number font').html('+');
        $('.sc2_number font').animate({
            'font-size': '16px',
            'font-weight': 'bold',
        }, 800, function(){
            $('.sc2_number font').animate({
                'font-weight': 'normal',
                'font-size': '12px',
            }, 800);
        });
        obj.remove();
    });
}

function add_into_shopping_cart() {
    goods_id = $('input[name=goods_id]').val();
    if(typeof($.cookie('shopping_cart')) == 'undefined') {
        shopping_cart = '{}';
    } else {
        shopping_cart = $.cookie('shopping_cart');
    }
    goods_json = JSON.parse(shopping_cart);
    if(goods_id in goods_json) {
        shopping_cart_add_animation('jrg', 0);
    } else {
        shopping_cart_add_animation('jrg', 1);
    }
    shopping_cart_add($('input[name=goods_id]').val(), $('input[name=number]').val());
}

function delete_goods_in_shopping_cart(goods_id, tr_id) {
    //$('#'+tr_id).remove();
    shopping_cart_delete(goods_id);
    location.reload();
}

function add_one_of_goods(goods_id) {
    shopping_cart_add(goods_id, 1);
    location.reload();
}

function delete_one_of_goods(goods_id) {
    shopping_cart_minus(goods_id, 1);
    location.reload();
}
