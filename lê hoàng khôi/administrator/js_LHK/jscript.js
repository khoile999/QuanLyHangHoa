
$(document).ready(function () {
    // exjs 1
    $('p').mouseenter(function () {
       $(this).css(
          "color", "#0f0"
       )
    })
    $('p').mouseleave(function () {
       $(this).css(
          "color", "red"
       )
    })
    // Truy cap doi uong class
    $('.cls01').mouseenter(function () {
       $(this).css(
          "color", "blue"
       )
    })
    $('.cls01').mouseleave(function () {
       $(this).css(
          "color", "black"
       )
    })
    // Truy cap doi uong id
    $('#id01').mouseenter(function () {
       $(this).css(
          "color", "#A0B",
          "font-weight", "700"
       )
       $(this).css(
          "font-weight", "700"
       )
    })
    $('#id01').mouseleave(function () {
       $(this).css(
          "color", "#B00"
       )
       $(this).css(
          "fontWeight", "normal"
       )
    })
    // exjs 2
    $(".itemOrther").hide();
    $(".cateOrther").click(function () {
       $(this).next().slideDown();
    })
    $(".itemOrther").mouseleave(function () {
       $(this).slideUp();
    })
    // anh
    $(".imgCls").click(function () {
       var s = $(this).attr('src');
       $("#imgView").attr('src', s);
    })
    var s = $("#divList").children();
    var l = s.lenght;
    var i = 0;
    setInterval(function () {
       if (i === 1) {
          i = 0;
          var p = $(s[i]).attr('src');
          $("#imgView").attr('src', p);
          i++;
       }
    }, 3000)
    // exjs 3
    $(".linkMenu").click(function () {
       var v = $(this).attr('value');
       $("#getContent").load('.page_LHK/' + v + '.php');
    })
    // Form
    $("formReg").submit(function () {
       var userName = $("input[name *= 'userName']").val();
       if (userName.lenght === 0 || userName.lenght < 6) {
          $("input[name *= 'userName']").focus();
          $('notForm').html("Tên đăng nhập không không hợp lệ!");
          return false;
       }
       var userPassword = $("input[name *= 'userPassword']").val();
       if (userPassword.lenght === 0 || userPassword.lenght < 6) {
          $("input[name *= 'userPassword']").focus();
          $('notForm').html("Mật khẩu không hợp lệ!");
          return false;
       }
       var fullName = $("input[name *= 'fullName']").val();
       if (fullName.lenght === 0 || fullName.lenght < 6) {
          $("input[name *= 'fullName']").focus();
          $('notForm').html("Họ tên không hợp lệ!");
          return false;
       }
       var dayOfBirth = $("input[name *= 'dayOfBirth']").val();
       if (dayOfBirth.lenght === 0) {
          $("input[name *= 'dayOfBirth']").focus();
          $('notForm').html("Ngày sinh không hợp lệ!");
          return false;
       }
       var address = $("input[name *= 'address']").val();
       if (address.lenght === 0) {
          $("input[name *= 'address']").focus();
          $('notForm').html("Địa chỉ không hợp lệ!");
          return false;
       }
       var phone = $("input[name *= 'phone']").val();
       if (address.lenght === 0) {
          $("input[name *= 'phone']").focus();
          $('notForm').html("Số điện thoại không hợp lệ!");
          return false;
       }
       return true;
    })
 })

 //update loai hang dung ajax + new layer
 $(document).ready(function() {
   $("#w_update").hide();
   
   // Click vào class nút update để mở lên
   $(".w_update_btn_open").click(function (e) {
       e.preventDefault();
       // Lấy toạ độ dựa vào super parameter e
       $("#w_update").css("left", e.pageX + 5);
       $("#w_update").css("top", e.pageY + 5);
       $("#w_update").show();

       // Load nội dung form cập nhật bằng AJAX
       var idLoaihang = $(this).data("id");
       $("#w_update_form").load("./element_LHK/mLoaihang/loaihangUpdata.php?idloaihang=" + idLoaihang);
   });
   
   // Xử lý đóng
   $("#w_close_btn").click(function (e) {
       e.preventDefault();
       $("#w_update").hide();
   });
});

// update hàng hóa
$(document).ready(function() {
   $("#w_update_hh").hide();
  
   // Click vào class nút update để mở lên
   $(".w_update_btn_open_hh").click(function (e) {
       e.preventDefault();
       // Lấy toạ độ dựa vào super parameter e
       $("#w_update_hh").css("left", e.pageX + 5);
       $("#w_update_hh").css("top", e.pageY + 5);
       $("#w_update_hh").show();

       // Load nội dung form cập nhật bằng AJAX
       var idHanghoa = $(this).data("id");
       $("#w_update_form_hh").load("./element_LHK/mHanghoa/hanghoaUpdate.php?idhanghoa=" + idHanghoa);
   });
  
   // Xử lý đóng
   $("#w_close_btn_hh").click(function (e) {
       e.preventDefault();
       $("#w_update_hh").hide();
   });
});

// update nhân viên
$(document).ready(function() {
   $("#w_update_nv").hide();
  
   // Click vào class nút update để mở lên
   $(".w_update_btn_open_nv").click(function (e) {
       e.preventDefault();
       // Lấy toạ độ dựa vào super parameter e
       $("#w_update_nv").css("left", e.pageX + 5);
       $("#w_update_nv").css("top", e.pageY + 5);
       $("#w_update_nv").show();

       // Load nội dung form cập nhật bằng AJAX
       var idNhanvien = $(this).data("id");
       $("#w_update_form_nv").load("./element_LHK/mnhanvien/nhanvienUpdate.php?idnhanvien=" + idNhanvien);
   });
  
   // Xử lý đóng
   $("#w_close_btn_nv").click(function (e) {
       e.preventDefault();
       $("#w_update_nv").hide();
   });
});

// update khách hàng
$(document).ready(function() {
   $("#w_update_kh").hide();
  
   // Click vào class nút update để mở lên
   $(".w_update_btn_open_kh").click(function (e) {
       e.preventDefault();
       // Lấy toạ độ dựa vào vị trí của con trỏ chuột
       $("#w_update_kh").css("left", e.pageX + 5);
       $("#w_update_kh").css("top", e.pageY + 5);
       $("#w_update_kh").show();

       // Load nội dung form cập nhật bằng AJAX
       var idKhachhang = $(this).data("id");
       $("#w_update_form_kh").load("./element_LHK/mkhachhang/khachhangUpdate.php?idkhachhang=" + idKhachhang);
   });
  
   // Xử lý đóng
   $("#w_close_btn_kh").click(function (e) {
       e.preventDefault();
       $("#w_update_kh").hide();
   });
});
// update thương hiệu
$(document).ready(function() {
   $("#w_update_th").hide();
  
   // Click vào class nút update để mở lên
   $(".w_update_btn_open_th").click(function (e) {
       e.preventDefault();
      //  alert("OK")
       // Lấy toạ độ dựa vào vị trí của con trỏ chuột
       $("#w_update_th").css("left", e.pageX + 5);
       $("#w_update_th").css("top", e.pageY + 5);
       $("#w_update_th").show();

       // Load nội dung form cập nhật bằng AJAX
       var idThuonghieu = $(this).data("id");
       $("#w_update_form_th").load("./element_LHK/mthuonghieu/thuonghieuUpdate.php?idthuonghieu=" + idThuonghieu);
   });
  
   // Xử lý đóng
   $("#w_close_btn_th").click(function (e) {
       e.preventDefault();
       $("#w_update_th").hide();
   });
});


// update thuộc tính
$(document).ready(function() {
   $("#w_update_tt").hide();
  
   // Click vào class nút update để mở lên
   $(".w_update_btn_open_tt").click(function (e) {
       e.preventDefault();
       // Lấy toạ độ dựa vào vị trí của con trỏ chuột
       $("#w_update_tt").css("left", e.pageX + 5);
       $("#w_update_tt").css("top", e.pageY + 5);
       $("#w_update_tt").show();

       // Load nội dung form cập nhật bằng AJAX
       var idThuoctinh = $(this).data("id");
       $("#w_update_form_tt").load("./element_LHK/mthuoctinh/thuoctinhUpdate.php?idthuoctinh=" + idThuoctinh);
   });
  
   // Xử lý đóng
   $("#w_close_btn_tt").click(function (e) {
       e.preventDefault();
       $("#w_update_tt").hide();
   });
});


// update tthh
$(document).ready(function() {
   $("#w_update_tthh").hide();
  
   // Click vào class nút update để mở lên
   $(".w_update_btn_open_tthh").click(function (e) {
       e.preventDefault();
       // Lấy toạ độ dựa vào vị trí của con trỏ chuột
       $("#w_update_tthh").css("left", e.pageX + 5);
       $("#w_update_tthh").css("top", e.pageY + 5);
       $("#w_update_tthh").show();

       // Load nội dung form cập nhật bằng AJAX
       var idtthh = $(this).data("id");
       $("#w_update_form_tthh").load("./element_LHK/mtthh/tthhUpdate.php?idtthh=" + idtthh);
   });
  
   // Xử lý đóng
   $("#w_close_btn_tthh").click(function (e) {
       e.preventDefault();
       $("#w_update_tthh").hide();
   });
});



// update don gia
$(document).ready(function() {
   $("#w_update_dg").hide();
  
   // Click vào class nút update để mở lên
   $(".w_update_btn_open_dg").click(function (e) {
       e.preventDefault();
       // Lấy toạ độ dựa vào vị trí của con trỏ chuột
       $("#w_update_dg").css("left", e.pageX + 5);
       $("#w_update_dg").css("top", e.pageY + 5);
       $("#w_update_dg").show();

       // Load nội dung form cập nhật bằng AJAX
       var idDongia = $(this).data("id");
     
       $("#w_update_form_dg").load("./element_LHK/mdongia/dongiaUpdate.php?iddongia=" + idDongia);
   });
  
   // Xử lý đóng
   $("#w_close_btn_dg").click(function (e) {
       e.preventDefault();
       $("#w_update_dg").hide();
   });
});
