$('#product tbody').on("click", "th", function (event) {
    event.preventDefault();
    var product_id = ($(this).data('product_id'));
    var product_name = $(this).data('product_name');
    var product_type = $(this).data('product_type');
    var product_potent = $(this).data('product_potent');
    var product_amount = $(this).data('product_amount');
    var product_cost = Number($(this).data('product_cost'));
    product_cost = Math.floor(product_cost * 100) / 100;
    var product_price = Number($(this).data('product_price'));
    var product_price_discount = Number($(this).data('product_price_discount'));
    var product_stock = Number($(this).data('product_stock'));
    var product_status = $(this).data('product_status');

    var output = "<form id='form_product_edit' method='post'>" +
        "<div class='p-2'>" +
        "<input type='hidden' name='product_id' id='product_id' value='" + product_id + "'>" +
        "<input type='hidden' name='old_product_name' id='old_product_name' value='" + product_name + "'>" +
        "<input type='hidden' name='old_product_type' id='old_product_type' value='" + product_type + "'>" +
        "<input type='hidden' name='old_product_potent' id='old_product_potent' value='" + product_potent + "'>" +
        "<input type='hidden' name='old_product_amount' id='old_product_amount' value='" + product_amount + "'>" +
        "<input type='hidden' name='old_product_cost' id='old_product_cost' value='" + product_cost + "'>" +
        "<input type='hidden' name='old_product_price' id='old_product_price' value='" + product_price + "'>" +
        "<input type='hidden' name='old_product_price_discount' id='old_product_price_discount' value='" + product_price_discount + "'>" +
        "<input type='hidden' name='old_product_stock' id='old_product_stock' value='" + product_stock + "'>" +
        "<input type='hidden' name='old_product_status' id='old_product_status' value='" + product_status + "'>" +

        "<div class='form-group row'>" +
        "<label for='name' class=' col-sm-3 col-form-label'>ชื่อผลิตภัณฑ์</label>" +
        "<div class='col-sm-6'>" +
        "<input type='text' autocomplete='off' required class='product_name form-control' name='product_name' id='product_name' placeholder='ชื่อผลิตภัณฑ์' pattern='[ก-๏\s]+' title='กรุณากรอกเป็นภาษาไทย' value='" + product_name + "'>" + "<span class='text-danger' style='font-size:0.75em' id='check_name'></span>" +
        "</div>" +
        "</div>" +
        "<fieldset class='form-group'>" +
        "<div class='row'>" +
        " <legend class='col-form-label col-sm-3 pt-0'>ประเภทสินค้า</legend>";
    if (product_type == "ED") {
        output += "<div class='col-sm-9'>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type1' value='ED' checked>" +
            "<label class='form-check-label' for='product_type1'>" +
            "ED" +
            "</label>" +
            "</div>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type2' value='NED'>" +
            "<label class='form-check-label' for='product_type'>" +
            "NED" +
            "</label>" +
            "</div>" +
            "</div>";
    } else if (product_type == "NED") {
        output += "<div class='col-sm-9'>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type1' value='ED'>" +
            "<label class='form-check-label' for='product_type1'>" +
            "ED" +
            "</label>" +
            "</div>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_type' id='product_type2' value='NED' checked>" +
            "<label class='form-check-label' for='product_type'>" +
            "NED" +
            "</label>" +
            "</div>" +
            "</div>";
    }
    output += "</div>" +
        "</fieldset>" +
        "<div class='form-group row'>" +
        "<label for='potent' class=' col-sm-3 col-form-label'>ความแรงยา/ขนาดบรรจุ</label>" +
        "<div class='col-sm-3'>" +
        "<input type='text' autocomplete='off' required class='form-control' name='product_potent' id='product_potent' title='ความแรง' value='" + product_potent + "' placeholder='ความแรง' pattern='[0-9]+[\\s][a-zA-Zก-๏]+$|ระบุไม่ได้' title='กรุณากรอกตามตัวอย่าง เช่น 250 mg หรือ 250 มิลลิกรัม' value='" + product_potent + "'>" +
        "<span class='text-danger' style='font-size:0.75em' id='check_potent'></span>" +
        "</div>" +
        "<div class='col-sm-3'>" +
        "<input type='text' autocomplete='off' required class='form-control' name='product_amount' id='product_amount' title='ขนาดบรรจุ' value='" + product_amount + "' placeholder='ขนาดบรรจุ' pattern='[0-9]+[\\s][a-zA-Zก-๏]+$|ระบุไม่ได้' title='กรุณากรอกตามตัวอย่าง เช่น 50 แคปซูล '>" + "<span class='text-danger' style='font-size:0.75em' id='check_amount'></span>" +
        "</div>" +
        "</div>" +
        "<div class='form-group row'>" +
        "<label for='price' class=' col-sm-3 col-form-label'>ราคา</label>" +
        "<div class='col-sm-3'>" +
        "<input type='number' required step=0.01 min='1' class='form-control' name='product_price' id='product_price' title='ราคาขายปลีก' value='" + product_price + "' placeholder='ราคาขายปลีก'>" +
        "</div>" +
        "<div class='col-sm-3'>" +
        "<input type='number' required step=0.01 min='1' class='form-control' name='product_price_discount' id='product_price_discount' value='" + product_price_discount + "' title='ราคาขาย(ยอด 5,000 ขึ้น)' placeholder='ราคาขาย(ยอด 5,000 ขึ้น)'>" +
        "</div>" +
        "<div class='col-sm-3'>" +
        "<input type='number' required step=0.01 min='1' class='form-control' name='product_cost' id='product_cost' title='ราคาทุน/หน่วย' value='" + product_cost + "' placeholder='ราคาทุน/หน่วย'>" +
        "</div>" +
        "</div>" +
        "<div class='form-group row'>" +
        "<label for='price' class=' col-sm-3 col-form-label'>จำนวนในสต็อก</label>" +
        "<div class='col-sm-3'>" +
        "<input type='number' min='1' onblur='checkStock();' required class='form-control' name='product_stock' id='product_stock' value='" + product_stock + "' placeholder='จำนวนในสต็อก'>" +
        "</div>" +
        "</div>" +
        "<fieldset class='form-group'>" +
        "<div class='row'>" +
        "<legend class='col-form-label col-sm-3 pt-0'>สถานะสินค้า</legend>";
    if (product_status == "ขาย") {
        output += "<div class='col-sm-9'>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_status' id='product_status1' value='ขาย' checked>" +
            "<label class='form-check-label' for='product_status1'>" +
            "ขาย" +
            "</label>" +
            "</div>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_status' id='product_status2' value='เลิกขาย'>" +
            "<label class='form-check-label' for='product_status'>" +
            "เลิกขาย" +
            "</label>" +
            "</div>" +
            "</div>";
    } else if (product_status == "เลิกขาย") {
        output += "<div class='col-sm-9'>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_status' id='product_status1' value='ขาย'>" +
            "<label class='form-check-label' for='product_status1'>" +
            "ขาย" +
            "</label>" +
            "</div>" +
            "<div class='form-check'>" +
            "<input required class='form-check-input' type='radio' name='product_status' id='product_status2' value='เลิกขาย' checked>" +
            "<label class='form-check-label' for='product_status'>" +
            "เลิกขาย" +
            "</label>" +
            "</div>" +
            "</div>";
    }
    output += "</div></fieldset></div>" +
        "</form>";


    $('.show-editModal').html(output);
    $('#editModal').modal('show');
});

// ยืนยันการแก้ไข
$('.edit-footer').on("click", ".edit-button", function (event) {
    event.preventDefault();

    // get old data to show it to user here
    var old_product_name = $('#old_product_name').val();
    var old_product_type = $('#old_product_type').val();
    var old_product_potent = $('#old_product_potent').val();
    var old_product_amount = $('#old_product_amount').val();
    var old_product_cost = $('#old_product_cost').val();
    var old_product_price = $('#old_product_price').val();
    var old_product_price_discount = $('#old_product_price_discount').val();
    var old_product_stock = $('#old_product_stock').val();
    var old_product_status = $('#old_product_status').val();

    var product_id = $('#product_id').val();
    var product_name = $('#product_name').val();

    if (document.getElementById('product_type1').checked) {
        var product_type = $('#product_type1').val();
    } else if (document.getElementById('product_type2').checked) {
        var product_type = $('#product_type2').val();
    }

    var product_potent = $('#product_potent').val();
    var product_amount = $('#product_amount').val();
    var product_cost = Number($('#product_cost').val());
    var product_price = Number($('#product_price').val());
    var product_price_discount = Number($('#product_price_discount').val());
    var product_stock = Number($('#product_stock').val());

    if (document.getElementById('product_status1').checked) {
        var product_status = $('#product_status1').val();
    } else if (document.getElementById('product_status2').checked) {
        var product_status = $('#product_status2').val();
    }


    var text = [];
    if (old_product_name !== product_name) {
        text[0] = "text-success";
    }
    if (old_product_type !== product_type) {
        text[1] = "text-success";
    }
    if (old_product_potent !== product_potent) {
        text[2] = "text-success";
    }
    if (old_product_amount !== product_amount) {
        text[3] = "text-success";
    }
    if (old_product_cost != product_cost) {
        text[4] = "text-success";
    }
    if (old_product_price != product_price) {
        text[5] = "text-success";
    }
    if (old_product_price_discount != product_price_discount) {
        text[6] = "text-success";
    }
    if (old_product_stock != product_stock) {
        text[7] = "text-success";
    }
    if (old_product_status != product_status) {
        text[8] = "text-success";
    }
    Swal.fire({
        title: 'ยืนยันการแก้ไขสินค้า?',
        html: "<pre class='" + text[0] + "'>" + old_product_name + " --> " + product_name + "</pre>" +
            "<pre class='" + text[1] + "'>" + old_product_type + " --> " + product_type + "</pre>" +
            "<pre class='" + text[2] + "'>" + old_product_potent + " --> " + product_potent + "</pre>" +
            "<pre class='" + text[3] + "'>" + old_product_amount + " --> " + product_amount + "</pre>" +
            "<pre class='" + text[4] + "'>" + old_product_cost + " --> " + product_cost + "</pre>" +
            "<pre class='" + text[5] + "'>" + old_product_price + " --> " + product_price + "</pre>" +
            "<pre class='" + text[6] + "'>" + old_product_price_discount + " --> " + product_price_discount + "</pre>" +
            "<pre class='" + text[7] + "'>" + old_product_stock + " --> " + product_stock + "</pre>" +
            "<pre class='" + text[8] + "'>" + old_product_status + " --> " + product_status + "</pre>",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {


            var formData = {
                'product_id': product_id,
                'product_name': product_name,
                'product_type': product_type,
                'product_potent': product_potent,
                'product_amount': product_amount,
                'product_cost': product_cost,
                'product_price': product_price,
                'product_price_discount': product_price_discount,
                'product_stock': product_stock,
                'product_status': product_status
            };

            $.ajax({
                type: 'POST',
                url: './model/model_product_edit.php', // the url where we want to POST
                data: formData, // our data object
            })


            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                title: 'สำเร็จ !',
                text: 'ท่านได้ทำรายการแก้ไขสินค้า ' + product_id,
                type: 'success',
                confirmButtonText: 'ตกลง',
            })
            getListProductTable();
        } else {
            $('#editModal').modal('show');
        }
    })

})

// ajax refresh product table function
function getListProductTable() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tbodyData").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./model/model_product_getListProductTable.php?page=product_edit", true);
    xmlhttp.send();
}

// function checkName() {
//     var product_name = document.querySelector("#product_name");
//     console.log(product_name.checkValidity());
//     if (product_name.checkValidity()) {
//         document.getElementById("product_name").style.backgroundColor = "LimeGreen";
//         document.getElementById("product_name").style.color = "white";
//         document.getElementById("check_name").innerHTML = "";

//         document.getElementById("check_potent").innerHTML = "";
//         if (product_name.checkValidity() && product_potent.checkValidity() && product_amount.checkValidity()) {
//             document.getElementById("footer-submit").style.visibility = "visible";
//         }

//     } else {
//         document.getElementById("product_name").style.backgroundColor = "Tomato";
//         document.getElementById("product_name").style.color = "white";
//         document.getElementById("footer-submit").style.visibility = "hidden";
//         document.getElementById("check_name").innerHTML = "กรุณากรอกเป็นภาษาไทย";

//     }
//     document.getElementById("product_name");
// }

// function checkPotent() {
//     console.log("checkPotent");
//     var product_potent = document.querySelector("#product_potent");
//     console.log(product_potent.value + " " + product_potent.checkValidity());
//     if (product_potent.checkValidity()) {
//         document.getElementById("product_potent").style.backgroundColor = "LimeGreen";
//         document.getElementById("product_potent").style.color = "white";

//         document.getElementById("check_potent").innerHTML = "";
//         if (product_name.checkValidity() && product_potent.checkValidity() && product_amount.checkValidity()) {
//             document.getElementById("footer-submit").style.visibility = "visible";
//         }
//     } else {
//         document.getElementById("product_potent").style.backgroundColor = "Tomato";
//         document.getElementById("product_potent").style.color = "white";
//         document.getElementById("footer-submit").style.visibility = "hidden";
//         document.getElementById("check_potent").innerHTML = "กรุณากรอกตามตัวอย่าง เช่น 250 mg หรือ 250 มิลลิกรัม";

//     }
// }

// function checkAmount() {
//     console.log("checkAmount");

//     var product_amount = document.querySelector("#product_amount");
//     console.log(product_amount.checkValidity());
//     if (product_amount.checkValidity()) {
//         document.getElementById("product_amount").style.backgroundColor = "LimeGreen";
//         document.getElementById("product_amount").style.color = "white";
//         document.getElementById("check_amount").innerHTML = "";

//         document.getElementById("check_amount").innerHTML = "";
//         if (product_name.checkValidity() && product_potent.checkValidity() && product_amount.checkValidity()) {
//             document.getElementById("footer-submit").style.visibility = "visible";
//         }

//     } else {
//         document.getElementById("product_amount").style.backgroundColor = "Tomato";
//         document.getElementById("product_amount").style.color = "white";
//         document.getElementById("footer-submit").style.visibility = "hidden";
//         document.getElementById("check_amount").innerHTML = "กรุณากรอกตามตัวอย่าง เช่น 50 แคปซูล";

//     }
// }

function checkStock() {
    var product_stock = $('#product_stock').val();
    product_stock = parseInt(product_stock);
    $('#product_stock').val(product_stock);
}

// ยืนยันการแก้ไข
$('#modal-delete').on("click", function (event) {
    event.preventDefault();
    var old_product_name = $('#old_product_name').val();
    var product_id = $('#product_id').val();

    Swal.fire({
        title: 'ยืนยันการลบสินค้า?',
        html: "<div>ท่านต้องการจะลบ <span class='text-danger'>[" + product_id + "] " + old_product_name + "</span> ใช่หรือไม่?</div>",
        type: 'warning',
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            var product_id = $('#product_id').val();
            var formData = {
                'product_id': product_id
            };
            $.ajax({
                type: 'POST',
                url: './model/model_product_delete.php', // the url where we want to POST
                data: formData, // our data object,
                success: function (data) {
                    if (data == 2) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            title: 'สำเร็จ !',
                            text: 'ท่านได้ทำรายการลบสินค้า ' + product_id,
                            type: 'success',
                            confirmButtonText: 'ตกลง',
                        })
                    } else if (data == 1) {
                        Swal.fire({
                            type: 'error',
                            title: 'ผิดพลาด',
                            html: '<pre>ไม่สามารถลบรายการสินค้า <span class="text-primary">'+old_product_name+'</span> ได้!</pre><pre>เนื่องจากมีรายการสินค้านี้ในประวัติการซื้อขาย</pre>',
                        })
                    }
                }
            });



            $('#editModal').modal('hide');
            getListProductTable();
        } else {
            $('#editModal').modal('show');
        }
    })

})