function chageView(){
  var signInbox = document.getElementById("signInbox");
  var signUpbox =document.getElementById("signUpbox");

  signInbox.classList.toggle("d-none");
  signUpbox.classList.toggle("d-none");
}

function signUp(){
   // alert("Ok");
  var fname=  document.getElementById("fname");
  var lname= document.getElementById("lname");
  var email=  document.getElementById("email");
  var mobile=  document.getElementById("mobile");
  var uname= document.getElementById("uname");
  var password = document.getElementById("password");

   
 
    var f = new FormData();
    f.append("f",fname.value);
    f.append("l",lname.value);
    f.append("e",email.value);
    f.append("m",mobile.value);
    f.append("u",uname.value);
    f.append("p",password.value);
    
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            //alert(response);
            if(response == "success"){
            document.getElementById("msg1").innerHTML ="Registration Successfull";
            document.getElementById("msg1").className ="alert alert-success";
            document.getElementById("msgDiv1").className =" d-block ";

            fname.value="";
            lname.value="";
            email.value="";
            mobile.value="";
            uname.value="";
            password.value="";
        }else{
           document.getElementById("msg1").innerHTML = response;
           document.getElementById("msgDiv1").className = "d-block";
         }
        }
    };
    request.open("POST","signUpProcess.php",true);
    request.send(f);
}

function signin(){
 // alert("OK");
 var un = document.getElementById("un");
 var pw = document.getElementById("pw");
 var rm = document.getElementById("rm");


 var f = new FormData();
 f.append("u",un.value);
 f.append("p",pw.value);
 f.append("r",rm.checked);

 var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            if(response == "Success"){
              window.location = "index.php";
            }else{
              document.getElementById("msg2").innerHTML = response;
              document.getElementById("msgDiv2").className = "d-block";
            }
          }
        };
          request.open("POST","signInProcess.php",true);
          request.send(f);
      
}

// function change(){
// window.location ="adminSignin.php";
// }

function adminSignIn(){
 
var un = document.getElementById("un");
var pw = document.getElementById("pw"); 

 var f = new FormData();
 f.append("u",un.value);
 f.append("p",pw.value);

 var request = new XMLHttpRequest();
 request.onreadystatechange = function (){
   if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
    //alert(response);
     if(response == "Success"){
       window.location ="adminDashbord.php"
    }else{
      document.getElementById("msg").innerHTML = response;
      document.getElementById("msgDiv").className = "d-block";

    }
   }

  
};

 request.open("POST","adminSignInProcess.php", true);
 request.send(f);
}

function loadUser(){
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if(request.readyState == 4 & request.status == 200){
     var response = request.responseText;
     //alert(response);
     document.getElementById("td").innerHTML = response;
    }
  };

  request.open("POST","lordUserProcess.php",true);
  request.send();
}

// Now
function changeUserStatus(userId) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          // Reload users after status change
          loadUser();
      }
  };

  request.open("POST", "ChangeStatusProcess.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send("userId=" + userId);
}

function changeUserPromote(userId) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          // Reload users after status change
          loadUser();
      }
  };

  request.open("POST", "ChangeUserPromoteProcess.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send("userId=" + userId);
}









// function navibarrelord(){
//   alert("OK;");
// }


function relord(){

  location.reload(); 
}
function brandReg(){

 var brand = document.getElementById("brand");
// alert(brand.value);

var f = new FormData();
f.append("b",brand.value);

var request = new XMLHttpRequest();

request.onreadystatechange = function () {
  if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
   // alert(response);
   if(response =="Success"){
    document.getElementById("msgbrand").innerHTML = "Brand Add Success";
    document.getElementById("msgbrand").className = "alert alert-warning";
    document.getElementById("msgBrand").className = "d-block";
    brand.value ="";

   }else{
    document.getElementById("msgbrand").innerHTML = response;
    document.getElementById("msgBrand").className = "d-block";

   }
  }
};


request.open("POST","brandRegisterProcess.php",true);
request.send(f);
}

function categoryReg(){

 var cat = document.getElementById("category")
 
 var f = new FormData();
 f.append("c",cat.value);

 var request = new XMLHttpRequest();

 request.onreadystatechange = function(){
  if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
    //alert(response);
    if(response =="Success"){
      document.getElementById("msgcategory").innerHTML = "Category Add Success";
      document.getElementById("msgcategory").className = "alert alert-warning";
      document.getElementById("msgCategory").className = "d-block";
      category.value ="";
  
     }else{
      document.getElementById("msgcategory").innerHTML = response;
      document.getElementById("msgCategory").className = "d-block";
  
     }
  }
 };


request.open("POST","categoryRegisterProcess.php",true);
request.send(f);

}

function colorReg(){
//alert("Chandrapala");
var color = document.getElementById("color");
var f = new FormData();

f.append("clr",color.value);

var request = new XMLHttpRequest();

 request.onreadystatechange = function(){
  if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
    //alert(response);
    if(response =="Success"){
      document.getElementById("msgcolor").innerHTML = "color Add Success";
      document.getElementById("msgcolor").className = "alert alert-warning";
      document.getElementById("msgColor").className = "d-block";
      color.value ="";
  
     }else{
      document.getElementById("msgcolor").innerHTML = response;
      document.getElementById("msgColor").className = "d-block";
     }
     }
    };


request.open("POST","colorRegisterProcess.php",true);
request.send(f);

}

function sizeReg(){
var size =  document.getElementById("size");


//alert(size.value);
var f = new FormData();
f.append("s",size.value);

var request = new XMLHttpRequest();
request.onreadystatechange = function (){
  if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;

  //alert(response);
  if(response =="Success"){
    document.getElementById("msgsize").innerHTML = "color Add Success";
    document.getElementById("msgsize").className = "alert alert-warning";
    document.getElementById("msgSize").className = "d-block";
    size.value ="";

   }else{
    document.getElementById("msgsize").innerHTML = response;
    document.getElementById("msgSize").className = "d-block";
   }
  }
}


request.open("POST","sizeRegisterproceee.php",true);
request.send(f);
}


// colorchange


document.addEventListener('DOMContentLoaded', (event) => {
  const themeToggle = document.getElementById('theme-toggle');
  const themeIcon = document.getElementById('theme-icon');
  
  themeToggle.addEventListener('click', () => {
      const currentTheme = document.body.getAttribute('data-bs-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      document.body.setAttribute('data-bs-theme', newTheme);
      themeIcon.classList.toggle('bi-moon');
      themeIcon.classList.toggle('bi-sun');
  });
});


// colorchange

function changeStork(){

  var product = document.getElementById("product");
  var stock = document.getElementById("stock");

  product.classList.toggle("d-none");
  stock.classList.toggle("d-none");

}
function changeStork() {


  var product = document.getElementById("product");
  var stock = document.getElementById("stock");

  product.classList.toggle("d-none");
  stock.classList.toggle("d-none");
}


function regProduct(){
var pname = document.getElementById("pname");
var brand = document.getElementById("brand");
var category = document.getElementById("category");
var color = document.getElementById("color");
var size = document.getElementById("size");
var description = document.getElementById("description");
var file = document.getElementById("file");

var f = new FormData();

f.append("pname",pname.value);
f.append("brand",brand.value);
f.append("category",category.value);
f.append("color",color.value);
f.append("size",size.value);
f.append("description",description.value);
f.append("image",file.files[0]);

var request = new XMLHttpRequest();
request.onreadystatechange = function (){
  if(request.readyState == 4 && request.status == 200){
    var response = request.responseText;
    if(response == "Success"){

      alert("Product Registration Successfully");
      location.reload();
    }else{
      alert(response);
    }
  }
};

request.open("POST","registerProductProcess.php",true);
request.send(f);
}

function updateStock(){
  var pname = document.getElementById("selectProduct");
  var qty = document.getElementById("qty");
  var unitprice = document.getElementById("unitprice");

 // alert(pname.value);

 var f = new FormData();

 f.append("pname",pname.value);
 f.append("qty",qty.value);
 f.append("unitprice",unitprice.value);

var request = new XMLHttpRequest();
request.onreadystatechange = function(){

  if(request.readyState == 4 & request.status == 200){

    var response = request.responseText;
    alert(response);
    //location.reload();
  }
}
 request.open("POST","updateStockProcess.php",true);
 request.send(f);
}

function printDiv(){

//alert("OK");
var fullContent = document.body.innerHTML;
var printArea = document.getElementById("prinArea").innerHTML;

document.body.innerHTML = printArea;

window.print();

document.body.innerHTML = fullContent;

}

function lordProduct(x){


  var page = x;
//alert(x);
var f = new FormData();
f.append("p",page)
 
var request = new XMLHttpRequest();
request.onreadystatechange = function(){
  if (request.readyState == 4 & request.status == 200) {
    var response = request.responseText;
    // alert(response);
    document.getElementById("pid").innerHTML = response;
    
  }
};
request.open("POST","LOADProductProcess.php",true);
request.send(f);

}

function searchProduct(x){

var page = x ;
var product = document.getElementById("product");

var f = new FormData();
f.append("p",product.value);
f.append("pg",page);


var request = new XMLHttpRequest();
request.onreadystatechange = function (){

  if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
   // alert(response)
   document.getElementById("pid").innerHTML = response;
  }
};

request.open("POST","searchProductProcess.php",true);
request.send(f);
}

function openADsearch(){

window.location="advanceSearch.php";

}

function resetad(){
  window.location = "advanceSearch.php";
}
function advancedSearch(x){

var page = x;
var category = document.getElementById("c1");
var brand = document.getElementById("b1");
var size = document.getElementById("s1");
var color = document.getElementById("cl1");
var min = document.getElementById("min");
var max = document.getElementById("max");


var f = new FormData();
   f.append("page",page);
   f.append("category",category.value);
   f.append("brand",brand.value);
   f.append("size",size.value);
   f.append("color",color.value);
   f.append("min",min.value);
   f.append("max",max.value);
   

   var request = new XMLHttpRequest();

   request.onreadystatechange = function (){
      if(request.readyState == 4 && request.status == 200){
         var response = request.responseText;
         document.getElementById("view_area").innerHTML = response;//view_area change as a pid
      }
   }
   request.open("POST", "adavancedSearchProcess.php", true);
   request.send(f);
}

function uplordImage(){

var img = document.getElementById("imgUploader");

var f = new FormData();

f.append('i', img.files[0]);


var request = new XMLHttpRequest();
request.onreadystatechange = function(){
  if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
    if (response == "empty") {
      alert("Please select an image");
  } else {
      document.getElementById('i').src = response;
      img.value = "";
  }
}
};

request.open("POST","profileImageUplordProcess.php",true);
request.send(f);


}


function updataProfile(){

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
 // var uname = document.getElementById("uname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
 // var password = document.getElementById("password");
  var no = document.getElementById("no");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");

  var f = new FormData();
  f.append("fname",fname.value);
  f.append("lname",lname.value);
  f.append("email",email.value);
  f.append("mobile",mobile.value);
  f.append("no",no.value);
  f.append("line1",line1.value);
  f.append("line2",line2.value);


  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if(request.readyState == 4 & request.status == 200){
      var response = request.responseText;
      alert(response);
      relord();

    }

  };

  request.open("POST","updataProfileProcess.php",true);
  request.send(f);


}


function signOut(){
  
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
             alert(response);

           if (response == 'signed out successfully') {
               relord();
           }

      }
  }

  request.open('POST', 'signOutProcess.php', true);
  request.send();


}

function addtoCart(x){

  var stockId = x;
  var qty = document.getElementById("qty");

  if (qty.value > 0 ) {
   // alert("OK")

   var f = new FormData();
   f.append("s",stockId);
   f.append("q",qty.value);

   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
    if(request.readyState == 4 & request.status == 200){
      var response = request.responseText;
      //alert(response);
      swal("Good job!", response, "success");

      qty.value = "";
    }
   };

   request.open("POST","addtoCartProcess.php",true);
   request.send(f);


  } else {
    alert("Please Enter Valid Quntity");
  }

}

function loadCart(){

var request = new XMLHttpRequest();
request.onreadystatechange = function (){
  if (request.readyState == 4 & request.status == 200) {

    var response = request.responseText;
   
    document.getElementById('cartBody').innerHTML = response;

    
  }
};


request.open("POST","LordCartProcess.php",true);
request.send();
}

function incrementQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) + 1;
  // alert(newQty);

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var responce = request.responseText;
      // alert(responce);
      if (responce == "Success") {
        qty.value = parseInt(qty.value) + 1;
        loadCart();
      } else {
        alert(responce);
      }
    }
  };

  request.open("POST", "updateCartQtyProcess.php", true);
  request.send(f);
}

function decrementQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) - 1;
  // alert(newQty);

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  if (newQty > 0) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var responce = request.responseText;
        // alert(responce);
        if (responce == "Success") {
          qty.value = parseInt(qty.value) - 1;
          loadCart();
        } else {
          alert(responce);
        }
      }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);
  }
}



  function removeCart(x) {
    if (confirm("Are you sure deleting this item")) {
        
        var f = new FormData();
        f.append("c",x);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                alert(responce);
                relord();
            }
        }

        request.open("POST","removeCartProcess.php",true);
        request.send(f);

    }

}

function chechOut(){

 var f = new FormData();
 f.append("cart",true);

 var request = new XMLHttpRequest();

 request.onreadystatechange = function(){
  if(request.readyState == 4 & request.status == 200){
    var responce = request.responseText;
    // alert(responce);
    var payment = JSON.parse(responce);
    doCheckout(payment,"checkoutProcess.php");

  }
 };

 request.open("POST","paymentProcess.php",true);
 request.send(f);
  
}


function doCheckout( payment, path){

// Payment completed. It can be a successful failure.
payhere.onCompleted = function onCompleted(orderId) {
  console.log("Payment completed. OrderID:" + orderId);
  // Note: validate the payment and show success or failure page to the customer

  var f = new FormData();
  f.append("payment", JSON.stringify(payment));

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var responce = request.responseText;
          //  alert(responce);

          var order = JSON.parse(responce);

          if (order.resp == "Success") {
             // relord();

            // console.log("Order completed with ID: " + order.order_id);
              window.location = "invoice.php?orderId=" + order.order_id;

           // window.location.href = `/invoice?order_id=${responce.order_id}`;

          } else {
              alert(responce);
          }
      }
  }

  request.open("POST", path, true);
  request.send(f);
};

// Payment window closed
payhere.onDismissed = function onDismissed() {
  // Note: Prompt user to pay again or show an error page
  console.log("Payment dismissed");
};

// Error occurred
payhere.onError = function onError(error) {
  // Note: show an error page
  console.log("Error:"  + error);
};

// Show the payhere.js popup, when "PayHere Pay" is clicked
// document.getElementById('payhere-payment').onclick = function (e) {
  payhere.startPayment(payment);
// };
  
}



function buyNow(stockId){

//alert(stockId);

 var qty = document.getElementById("qty");

 if (qty.value > 0) {
        
  var f = new FormData();
  f.append("cart", false);
  f.append("stockId",stockId);
  f.append("qty",qty.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var responce = request.responseText;
          // alert(responce);
          var payment = JSON.parse(responce);
          payment.stock_id = stockId;
          payment.qty = qty.value;
          doCheckout(payment,"buynowProcess.php");
      }
  }

  request.open("POST","paymentProcess.php",true);
  request.send(f);
  
} else {
  alert("Please enter valid quantity");
}



}

function forgetPassword(){

 // alert("OK");

 var email = document.getElementById("e");

 if (email.value != "") {

  var f = new FormData();
  f.append("e",email.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function (){
    if(request.readyState == 4 & request.status == 200){
      var responce = request.responseText;
     // alert(responce);

     if (responce == "success") {

      document.getElementById("msg").innerHTML = "Email sent! Pleace Check Your mail Box";
      document.getElementById("msg").className = "alert alert-success";
      document.getElementById("msgDiv").className = "d-block";
      
     } else {

      
      document.getElementById("msg").innerHTML = responce;
      document.getElementById("msg").className = "alert alert-danger";
      document.getElementById("msgDiv").className = "d-block";

      
     }


    }


  };


  request.open("POST","forgetPasswordProcess.php",true);
  request.send(f);
  


 } else {
  
  alert("Please Enter Your Valid Email")
 }
}



function resetPassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");
   
    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "signIn.php";
            } else {
              document.getElementById("msg").innerHTML = response;
              document.getElementById("msg").className = "alert alert-danger";
              document.getElementById("msgDiv").className = "d-block";


            }
        }
        
    };

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);
}

function loadChart() {
  // alert("ok");
  var ctx = document.getElementById('myChart');

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var responce = request.responseText;
          //alert(responce);
          var data = JSON.parse(responce);
          new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: data.labels,
                datasets: [{
                  label: '# of Votes',
                  data: data.data,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          
      }
};

request.open("POST","loadChartProcess.php",true);
request.send();
}


function loadChart1() {
  var ctx = document.getElementById('bs');
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          var data = JSON.parse(response);
          new Chart(ctx, {
              type: 'pie',
              data: {
                  labels: data.labels,
                  datasets: [{
                      label: '# of Votes',
                      data: data.data,
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true
                      }
                  }
              }
          });
      }
  };
  request.open("POST", "loadChartBestCustomerProcess.php", true);
  request.send();
}

function addtoWishlist(x){

//alert(x);
var stockId = x;
var f = new FormData();
f.append("s",stockId);

var request = new XMLHttpRequest();
request.onreadystatechange = function(){
if(request.readyState == 4 & request.status == 200){
  var responce = request.responseText;
 // alert(responce);
 swal("Good job!", responce, "success");


}

};

request.open("POST","addwishlistProcess.php",true);
request.send(f);
}


function lordwishlist(){

  //alert("OK");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
    //alert(response);
    document.getElementById('wishlistbody').innerHTML = response;


  }
};

  request.open("POST","loadwishlistProcess.php",true);
  request.send();
  
}


function removeWishlist(wishId){
  if (confirm("Are you sure deleting this item")) {
        
    var f = new FormData();
    f.append("c",wishId);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            alert(responce);
            relord();
        }
    }

    request.open("POST","removeWishlistProcess.php",true);
    request.send(f);

}

}

function Mlogin(){

var Mun = document.getElementById("Mun");
var Mpw = document.getElementById("Mpw"); 

 var f = new FormData();
 f.append("Mun",Mun.value);
 f.append("Mpw",Mpw.value);

 var request = new XMLHttpRequest();
 request.onreadystatechange = function (){
   if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
    //alert(response);
     if(response == "Success"){

       window.location ="MDashbord.php"
       
    }else{
      // document.getElementById("msgM").innerHTML = response;
      // document.getElementById("msgDivM").className = "d-block";
      alert(response);

    }
    }

  
};

 request.open("POST","MSignInProcess.php", true);
 request.send(f);

}

function regProductM(){
  var pname = document.getElementById("pname");
  var brand = document.getElementById("brand");
  var category = document.getElementById("category");
  var color = document.getElementById("color");
  var size = document.getElementById("size");
  var description = document.getElementById("description");
  var file = document.getElementById("file");
  
  
  var f = new FormData();
  
  f.append("pname",pname.value);
  f.append("brand",brand.value);
  f.append("category",category.value);
  f.append("color",color.value);
  f.append("size",size.value);
  f.append("description",description.value);
  f.append("image",file.files[0]);
  
  
  
  var request = new XMLHttpRequest();
  request.onreadystatechange = function (){
    if(request.readyState == 4 & request.status == 200){
      var response = request.responseText;
      if(response == "Success"){
        alert("Product Registration Successfully");
        location.reload();
      }else{
        alert(response);
      }
    }
  };
  
  request.open("POST","MregisterProductProcess.php",true);
  request.send(f);
  }


  // function viewMD(){

  //    window.location ="MDashbord.php"
  // }


  function lordMannager(){

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if(request.readyState == 4 & request.status == 200){
       var response = request.responseText;
       //alert(response);
       document.getElementById("td").innerHTML = response;
      }
    };
  
    request.open("POST","lordMannager.php",true);
    request.send();


  }

  // function loadUser(){
  //   var request = new XMLHttpRequest();
  //   request.onreadystatechange = function () {
  //     if(request.readyState == 4 & request.status == 200){
  //      var response = request.responseText;
  //      //alert(response);
  //      document.getElementById("td").innerHTML = response;
  //     }
  //   };
  
  //   request.open("POST","lordUserProcess.php",true);
  //   request.send();
  // }



