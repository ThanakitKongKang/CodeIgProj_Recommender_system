// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart2 = (function () {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];

  // Constructor
  function Item(product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, count) {
    this.product_id = product_id;
    this.product_name = product_name;
    this.product_type = product_type;
    this.product_potent = product_potent;
    this.product_amount = product_amount;
    this.product_cost = product_cost;
    this.product_price = product_price;
    this.product_price_discount = product_price_discount;
    this.product_stock = product_stock;
    this.count = count;
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart2', JSON.stringify(cart));
  }

  // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart2'));
  }
  if (sessionStorage.getItem("shoppingCart2") != null) {
    loadCart();
  }

  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // cart array length
  obj.cartLength = function () {
    var cartArray = shoppingCart2.listCart();
    return cartArray.length;
  }

  // Add to cart
  obj.addItemToCart = function (product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, count) {
    for (var item in cart) {
      if (cart[item].product_id === product_id) {
        cart[item].count++;
        saveCart();
        return;
      }
    }
    var item = new Item(product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, count);
    cart.push(item);
    saveCart();

  }
  // Set count from item
  obj.setCountForItem = function (product_id, count) {
    for (var i in cart) {
      if (cart[i].product_id === product_id) {
        if (count === 0 || count < 0) {
          cart.splice(item, 1);
          saveCart();
          if (shoppingCart2.totalCount() === 0) {
            $('#cart').modal('hide');
          }
          return;
        }
        cart[i].count = count;
        break;

      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function (product_id) {
    for (var item in cart) {
      if (cart[item].product_id === product_id) {
        cart[item].count--;
        if (cart[item].count === 0) {
          cart.splice(item, 1);
          if (shoppingCart2.totalCount() === 0) {
            $('#cart').modal('hide');
          }
        }

        break;
      }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function (product_id) {
    for (var item in cart) {
      if (cart[item].product_id === product_id) {
        cart.splice(item, 1);
        if (shoppingCart2.totalCount() === 0) {
          $('#cart').modal('hide');
        }
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function () {
    cart = [];
    saveCart();

  }

  // Count cart 
  obj.totalCount = function () {
    var totalCount = 0;
    for (var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function () {
    var totalCart = 0;
    for (var item in cart) {
      totalCart += cart[item].product_price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function () {
    var cartCopy = [];
    for (i in cart) {
      item = cart[i];
      itemCopy = {};
      for (p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.product_price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
// $('.add-to-cart').on("click", function (event) {
//   event.preventDefault();
//   var product_id = Number($(this).data('product_id'));
//   var product_name = $(this).data('product_name');
//   var product_type = $(this).data('product_type');
//   var product_potent = $(this).data('product_potent');
//   var product_amount = $(this).data('product_amount');
//   var product_cost = Number($(this).data('product_cost'));
//   var product_price = Number($(this).data('product_price'));
//   var product_price_discount = Number($(this).data('product_price_discount'));
//   var product_stock = Number($(this).data('product_stock'));

//   shoppingCart2.addItemToCart(product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, 1);
//   // shoppingCart2.addItemToCart(product_id, product_name, product_price, 1);
//   displayCart();
// });

$('#product tbody').on("click", "th", function (event) {
  event.preventDefault();
  window.scrollTo(0,document.body.scrollHeight);
  var product_id = ($(this).data('product_id'));
  var product_name = $(this).data('product_name');
  var product_type = $(this).data('product_type');
  var product_potent = $(this).data('product_potent');
  var product_amount = $(this).data('product_amount');
  var product_cost = Number($(this).data('product_cost'));
  var product_price = Number($(this).data('product_price'));
  var product_price_discount = Number($(this).data('product_price_discount'));
  var product_stock = Number($(this).data('product_stock'));

  shoppingCart2.addItemToCart(product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, 1);
  // shoppingCart2.addItemToCart(product_id, product_name, product_price, 1);
  displayCart();

});


// Clear items
$('.clear-cart').click(function () {
  shoppingCart2.clearCart();
  displayCart();
});

// แสดงตะกร้า
function displayCart() {
  var cartArray = shoppingCart2.listCart();
  var output = "<tr><th>รหัสสินค้า</th><th>ชื่อ</th><th>ราคา</th><th class='text-center'>จำนวน</th><th></th></tr>";
  for (var i in cartArray) {
    output += "<tr>" +
      "<td name='product_id'>" + cartArray[i].product_id + "</td>" +
      "<td name='name'>" + cartArray[i].product_name + "</td>" +
      "<td name='price'>" + cartArray[i].product_price + "</td>" +
      "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-product_id=" + cartArray[i].product_id + ">-</button>" +
      "<input type='number' min='1' max='100000' class='item-count form-control' data-product_id='" + cartArray[i].product_id + "'data-product_stock='" + cartArray[i].product_stock + "' value='" + cartArray[i].count + "'>" +
      "<button class='plus-item btn btn-primary input-group-addon' data-product_id=" + cartArray[i].product_id + ">+</button></div></td>" +
      "<td><button class='delete-item btn btn-danger' data-product_id=" + cartArray[i].product_id + ">X</button></td>" +
      "</tr>";
  }
  if (shoppingCart2.totalCount() > 0) {
    var cart_clickable = "<button type='button' style='float:right' class='display-cart btn btn-success btn-lg' data-toggle='modal' data-target='#cart' title='คลิกเพื่อแสดงตะกร้าสินค้า'><i class='fas fa-shopping-cart'></i> " + shoppingCart2.cartLength() + " รายการ (" + shoppingCart2.totalCount() + " ชิ้น)</button>";
    $('.cart-clickable').html(cart_clickable);

    var cart_clear_clickable = "<button style='float:right' class='btn btn-danger mx-1 btn-lg' title='ยกเลิกรายการสินค้าทั้งหมดที่เลือกไว้ในตะกร้า'><i class='far fa-window-close'></i> ยกเลิก</button>";
    $('.cart-clear-clickable').html(cart_clear_clickable);
  } else if (shoppingCart2.totalCount() === 0) {
    var cart_clickable = "";
    $('.cart-clickable').html(cart_clickable);

    var cart_clear_clickable = "";
    $('.cart-clear-clickable').html(cart_clear_clickable);
  }

  $('.show-cart').html(output);

  // $('.total-count').html(shoppingCart2.totalCount());

  // console.log(cartArray);
  // console.dir(cartArray);
}

// คิดเงิน ตัดสต็อก รีเฟรชตารางสินค้า ส่งข้อมูลให้ bill.php
$('.cart-button').on("click", ".calculate-cart", function (event) {
  Swal.fire({
    title: 'ยืนยันการทำรายการและอัปเดตสต็อก?',
    // text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ยืนยัน',
    cancelButtonText: 'ยกเลิก'
  }).then((result) => {
    if (result.value) {
      var cartArray = shoppingCart2.listCart();
      for (var i in cartArray) {
        var formData = {
          'product_id': cartArray[i].product_id,
          'count': cartArray[i].count,
          'product_stock': cartArray[i].product_stock
        };
        $.ajax({
          type: 'POST',
          url: './model/model_addstock_detail_make.php', // the url where we want to POST
          data: formData, // our data object
        })

      }
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        title: 'สำเร็จ !',
        text: 'รายการนำสินค้าเข้า ถูกบันทึกในฐานข้อมูล!',
        type: 'success',
        confirmButtonText: 'ตกลง',
      })
      shoppingCart2.clearCart();
      displayCart();
      getListProductTable();
    }
    else {
      $('#cart').modal('show');
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
  xmlhttp.open("GET", "./model/model_product_getListProductTable.php?page=product_add_stock", true);
  xmlhttp.send();
}


// -1
$('.show-cart').on("click", ".minus-item", function (event) {
  var product_id = ($(this).data('product_id'));
  shoppingCart2.removeItemFromCart(product_id);
  // console.log("call success minus");

  displayCart();

})
// +1
$('.show-cart').on("click", ".plus-item", function (event) {
  var product_id = ($(this).data('product_id'));
  shoppingCart2.addItemToCart(product_id);
  // console.log("call success plus");

  displayCart();

})

// Delete item button

$('.show-cart').on("click", ".delete-item", function (event) {
  var product_id = ($(this).data('product_id'))
  shoppingCart2.removeItemFromCartAll(product_id);
  // console.log("call success delete");

  displayCart();

})

// Item count input
$('.show-cart').on("change", ".item-count", function (event) {
  var product_id = ($(this).data('product_id'));
  var count = Number($(this).val());
  shoppingCart2.setCountForItem(product_id, count);

  displayCart();

});

displayCart();