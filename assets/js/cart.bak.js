// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];
    
    // Constructor
    function Item(product_id, product_name,product_price,product_price_discount,product_stock, count) {
      this.product_id = product_id;
      this.product_name = product_name;
      this.product_price = product_price;
      this.product_price_discount = product_price_discount;
      this.product_stock = product_stock;
      this.count = count;
    }
    
    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }
    
      // Load cart
    function loadCart() {
      cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
      loadCart();
    }
    
  
    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};
    
    // Add to cart
    obj.addItemToCart = function(product_id, product_name,product_price,product_price_discount,product_stock, count) {
      for(var item in cart) {
        if(cart[item].product_id === product_id) {
          cart[item].count ++;
          saveCart();
          return;
        }
      }
      var item = new Item(product_id, product_name,product_price,product_price_discount,product_stock, count);
      cart.push(item);
      saveCart();
    }
    // Set count from item
    obj.setCountForItem = function(product_id, count) {
      for(var i in cart) {
        if (cart[i].product_id === product_id) {
          cart[i].count = count;
          break;
        }
      }
    };
    // Remove item from cart
    obj.removeItemFromCart = function(product_id) {
        for(var item in cart) {
          if(cart[item].product_id === product_id) {
            cart[item].count --;
            if(cart[item].count === 0) {
              cart.splice(item, 1);
            }
            break;
          }
      }
      saveCart();
    }
  
    // Remove all items from cart
    obj.removeItemFromCartAll = function(product_id) {
      for(var item in cart) {
        if(cart[item].product_id === product_id) {
          cart.splice(item, 1);
          break;
        }
      }
      saveCart();
    }
  
    // Clear cart
    obj.clearCart = function() {
      cart = [];
      saveCart();
    }
  
    // Count cart 
    obj.totalCount = function() {
      var totalCount = 0;
      for(var item in cart) {
        totalCount += cart[item].count;
      }
      return totalCount;
    }
  
    // Total cart
    obj.totalCart = function() {
      var totalCart = 0;
      for(var item in cart) {
        totalCart += cart[item].product_price * cart[item].count;
      }
      return Number(totalCart.toFixed(2));
    }
  
    // List cart
    obj.listCart = function() {
      var cartCopy = [];
      for(i in cart) {
        item = cart[i];
        itemCopy = {};
        for(p in item) {
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
  $('.add-to-cart').click(function(event) {
    event.preventDefault();
    var product_id = $(this).data('product_id');
    var product_name = $(this).data('product_name');
    var product_price = Number($(this).data('product_price'));
    var product_price_discount = Number($(this).data('product_price_discount'));
    var product_stock = Number($(this).data('product_stock'));
    shoppingCart.addItemToCart(product_id, product_name,product_price,product_price_discount,product_stock, 1);
    displayCart();
  });
  
  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
  });
  
  
  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
      output += "<tr>"
        + "<td>" + cartArray[i].product_name + "</td>" 
        + "<td>(" + cartArray[i].product_price + ")</td>"
        + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-product_id=" + cartArray[i].product_id + ">-</button>"
        + "<input type='number' class='item-count form-control' data-product_id='" + cartArray[i].product_id + "' value='" + cartArray[i].count + "'>"
        + "<button class='plus-item btn btn-primary input-group-addon' data-product_id=" + cartArray[i].product_id + ">+</button></div></td>"
        + "<td><button class='delete-item btn btn-danger' data-product_id=" + cartArray[i].product_id + ">X</button></td>"
        + " = " 
        + "<td>" + cartArray[i].total + "</td>" 
        +  "</tr>";
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
  }
  
  // Delete item button
  
  $('.show-cart').on("click", ".delete-item", function(event) {
    var product_id = $(this).data('product_id')
    shoppingCart.removeItemFromCartAll(product_id);
    displayCart();
  })
  
  
  // -1
  $('.show-cart').on("click", ".minus-item", function(event) {
    var product_id = $(this).data('product_id')
    shoppingCart.removeItemFromCart(product_id);
    displayCart();
  })
  // +1
  $('.show-cart').on("click", ".plus-item", function(event) {
    var product_id = $(this).data('product_id')
    shoppingCart.addItemToCart(product_id);
    displayCart();
  })
  
  // Item count input
  $('.show-cart').on("change", ".item-count", function(event) {
     var product_id = $(this).data('product_id');
     var count = Number($(this).val());
    shoppingCart.setCountForItem(product_id, count);
    displayCart();
  });
  
  displayCart();
  