let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);

const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;
const fn = id("fn");
const ln = id("ln");
const mail = id("mail");
const phone = id("phone");
const dob = id("dob");
const gender = id("gender");
const user = id("user");
const pass = id("pass");
const passconf = id("passconf");
const check = classes("success-icon");
const fail = classes("failure-icon");
const eror = classes("error");

nextBtnFirst.addEventListener("click", (e) => {
  if (fn.value !== "" && ln.value !== "") {
    e.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    eror[1].innerHTML = "";
    ln.style.border = "2px solid green";
    fail[1].style.opacity = "0";
    check[1].style.opacity = "1";
    eror[0].innerHTML = "";
    fn.style.border = "2px solid green";
    fail[0].style.opacity = "0";
    check[0].style.opacity = "1";
  } else {
    if (fn.value === "") {
    //   slidePage.style.marginLeft = "0%";
    //   eror[0].innerHTML = "Fisrt name can't be empty";
    //   fn.style.border = "2px solid red";
    //   fail[0].style.opacity = "1";
    //   check[0].style.opacity = "0";
    } else {
      eror[0].innerHTML = "";
      fn.style.border = "2px solid green";
      fail[0].style.opacity = "0";
      check[0].style.opacity = "1";
    }
    if (ln.value === "") {
    //   slidePage.style.marginLeft = "0%";
    //   eror[1].innerHTML = "Last name can't be empty";
    //   ln.style.border = "2px solid red";
    //   fail[1].style.opacity = "1";
    //   check[1].style.opacity = "0";
    } else {
      eror[1].innerHTML = "";
      ln.style.border = "2px solid green";
      fail[1].style.opacity = "0";
      check[1].style.opacity = "1";
    }
  }
});
nextBtnSec.addEventListener("click", (e) => {
  if (mail.value !== "" && phone.value !== "") {
    e.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
    eror[2].innerHTML = "";
    mail.style.border = "2px solid green";
    fail[2].style.opacity = "0";
    check[2].style.opacity = "1";
    eror[3].innerHTML = "";
    phone.style.border = "2px solid green";
    fail[3].style.opacity = "0";
    check[3].style.opacity = "1";
  } else {
    if (mail.value === "") {
    //   slidePage.style.marginLeft = "-25%";
    //   eror[2].innerHTML = "E-Mail can't be empty";
    //   mail.style.border = "2px solid red";
    //   fail[2].style.opacity = "1";
    //   check[2].style.opacity = "0";
    } else {
      eror[2].innerHTML = "";
      mail.style.border = "2px solid green";
      fail[2].style.opacity = "0";
      check[2].style.opacity = "1";
    }
    if (phone.value === "") {
    //   slidePage.style.marginLeft = "-25%";
    //   eror[3].innerHTML = "You Must Enter A Phone Number";
    //   phone.style.border = "2px solid red";
    //   fail[3].style.opacity = "1";
    //   check[3].style.opacity = "0";
    } else {
      eror[3].innerHTML = "";
      phone.style.border = "2px solid green";
      fail[3].style.opacity = "0";
      check[3].style.opacity = "1";
    }
  }
});
nextBtnThird.addEventListener("click", (e) => {
  if (dob.value !== "" && gender.value !== "") {
    if (dob.value < 18) {
    //   slidePage.style.marginLeft = "-50%";
    //   eror[4].innerHTML = "You Must Be 18 Or Older";
    //   dob.style.border = "2px solid red";
    //   fail[4].style.opacity = "1";
    //   check[4].style.opacity = "0";
    } else {
      e.preventDefault();
      slidePage.style.marginLeft = "-75%";
      bullet[current - 1].classList.add("active");
      progressCheck[current - 1].classList.add("active");
      progressText[current - 1].classList.add("active");
      current += 1;
      eror[4].innerHTML = "";
      dob.style.border = "2px solid green";
      fail[4].style.opacity = "0";
      check[4].style.opacity = "1";
    }
  } else {
    if (dob.value === "") {
    //   slidePage.style.marginLeft = "-50%";
    //   eror[4].innerHTML = "Date Of Birth Cannot be empty";
    //   dob.style.border = "2px solid red";
    //   fail[4].style.opacity = "1";
    //   check[4].style.opacity = "0";
    } else {
      eror[4].innerHTML = "";
      fn.style.border = "2px solid green";
      fail[4].style.opacity = "0";
      check[4].style.opacity = "1";
    }
  }
});
submitBtn.addEventListener("click", function () {
  if (user.value !== "" && pass.value !== "" && passconf.value !== "") {
    if (pass.value !== passconf.value) {
    //   slidePage.style.marginLeft = "-75%";
    //   eror[6].innerHTML = "Password dowsn't Match";
    //   eror[7].innerHTML = "Password dowsn't Match";
    //   passconf.style.border = "2px solid red";
    //   pass.style.border = "2px solid red";
    //   fail[6].style.opacity = "1";
    //   fail[7].style.opacity = "1";
    //   check[6].style.opacity = "0";
    //   check[7].style.opacity = "0";
    } else {
      eror[7].innerHTML = "";
      passconf.style.border = "2px solid green";
      fail[7].style.opacity = "0";
      check[7].style.opacity = "1";
      eror[6].innerHTML = "";
      pass.style.border = "2px solid green";
      fail[6].style.opacity = "0";
      check[6].style.opacity = "1";
      bullet[current - 1].classList.add("active");
      progressCheck[current - 1].classList.add("active");
      progressText[current - 1].classList.add("active");
      current += 1;
      eror[5].innerHTML = "";
      user.style.border = "2px solid green";
      fail[5].style.opacity = "0";
      check[5].style.opacity = "1";
      window.location.href="./html/home.html";
    }
  } else {
    if (user.value === "") {
    //   slidePage.style.marginLeft = "-75%";
    //   eror[5].innerHTML = "Username Cannot be empty";
    //   user.style.border = "2px solid red";
    //   fail[5].style.opacity = "1";
    //   check[5].style.opacity = "0";
    } else {
      eror[5].innerHTML = "";
      user.style.border = "2px solid green";
      fail[5].style.opacity = "0";
      check[5].style.opacity = "1";
    }
    if (pass.value === "") {
    //   slidePage.style.marginLeft = "-75%";
    //   eror[6].innerHTML = "passsword Cannot be empty";
    //   pass.style.border = "2px solid red";
    //   fail[6].style.opacity = "1";
    //   check[6].style.opacity = "0";
    } else {
      eror[6].innerHTML = "";
      pass.style.border = "2px solid green";
      fail[6].style.opacity = "0";
      check[6].style.opacity = "1";
    }
    if (passconf.value === "") {
    //   slidePage.style.marginLeft = "-75%";
    //   eror[7].innerHTML = "Passsword Confirmation Cannot be empty";
    //   passconf.style.border = "2px solid red";
    //   fail[7].style.opacity = "1";
    //   check[7].style.opacity = "0";
    } else {
      eror[7].innerHTML = "";
      passconf.style.border = "2px solid green";
      fail[7].style.opacity = "0";
      check[7].style.opacity = "1";
    }
  }
});

prevBtnSec.addEventListener("click", (e) => {
  e.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", (e) => {
  e.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", (e) => {
  e.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});