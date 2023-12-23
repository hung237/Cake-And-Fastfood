// window.addEventListener("scroll", function () {
//   var header = document.getElementById("header");
//   header.style.boxShadow = "0 0 10px 4px rgba(0, 0, 0, 0.8)";
//   // header.style.backgroundColor = "#06113C";
//   // header.style.color = "#fff";
//   if (window.scrollY == 0) {
//     header.style.boxShadow = "none";
//     // header.style.backgroundColor = "rgba(0,0,0,0)";
//   }
// });
function login() {
  window.location = "./view/components/login.php";
}

function addToCart(id) {
  $.post("../controller/add-to-cart.php", { id: id }, function (data) {
    document.getElementById("qty").innerText = data;
  });
}
function increaseCart(id) {
  $.post(
    "../controller/increase-cart.php",
    { id: id },
    function (data, status) {
      $("#qty").text(data);
      window.scrollTo(0, 0);
      location.reload();
    }
  );
}
function reduceCart(id) {
  $.post("../controller/reduce-cart.php", { id: id }, function (data, status) {
    window.scrollTo(0, 0);
    location.reload();
  });
}
function remove(id) {
  $.post("../controller/remove-cart.php", { id: id }, function (data, status) {
    $("#qty").text(data);
    $("#cartItem" + id).css("display", "none");
    window.scrollTo(0, 0);
    location.reload();
  });
}


function slideNext(){
  let list = document.querySelectorAll('.banner-img-items');
  document.getElementById('slide').prepend(list[list.length - 1]);
  console.log(list)
}
function slidePrev(){
  let list = document.querySelectorAll('.banner-img-items');
  document.getElementById('slide').appendChild(list[0]);
}
let menu = document.querySelectorAll(".nav-category li");
let btnShowMenu = document.getElementById("btn-showmenu");
let indexMenu = 0;
function showmenu(){
  indexMenu ++;
  if(indexMenu == 1){
    let heightMenu = document.getElementById('nav-category');
    heightMenu.style.height = "auto";
    btnShowMenu.style.transform = "rolate(180deg)";
  }
  else{
    let heightMenu = document.getElementById('nav-category');
    heightMenu.style.height = "48px";
    btnShowMenu.style.transform = "rolate(0deg)";
    indexMenu = 0;
  }
}

const avatarInput = document.getElementById("avatar");
const avatarPreview = document.getElementById("avatar-preview");

avatarInput.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            avatarPreview.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    } else {
        avatarPreview.setAttribute("src", "default-avatar.jpg");
    }
});





