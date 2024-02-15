$(document).ready(function() {

const indicator = document.querySelector(".indicator");
const input= document.querySelector("#pw");
const input1 = document.querySelector("#pwco");
const weak = document.querySelector(".weak");
const medium = document.querySelector(".medium");
const strong = document.querySelector(".strong");
const text = document.querySelector(".message");
const showBtn = document.querySelector(".eye");
const showbtn = document.querySelector(".eye1");




let rgeExWeak = /[a-z]/;
let rgeExMedium = /\d+/;
let rgeExStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;


$("#pw").on("keyup", function trigger() 
{
 
  if (input.value != "") 
  {
    indicator.style.display = "block";
    indicator.style.display = "flex";

    if (
      input.value.length <= 3 &&
      (input.value.match(rgeExWeak) ||
      input.value.match(rgeExMedium) ||
      input.value.match(rgeExStrong))
    )
      no = 1;
    if (
      input.value.length >= 6 &&
      (input.value.match(rgeExWeak) ||
      input.value.match(rgeExMedium) ||
      input.value.match(rgeExStrong))
    )
      no = 2;
    if (
      input.value.length >= 8 &&
      (input.value.match(rgeExWeak) ||
      input.value.match(rgeExMedium) ||
      input.value.match(rgeExStrong))
    )
      no = 3;

    if (no == 1) 
    {
      weak.classList.add("active");
      text.style.display = "block";
      text.textContent = "Your password is too weak";
      text.classList.add("weak");
    }
    if (no == 2) 
    {
      medium.classList.add("active");
      text.textContent = "Your password is medium";
      text.classList.add("medium");
    } 
    else 
    {
      medium.classList.remove("active");
      text.classList.remove("medium");
    }
    if (no == 3) 
    {
      weak.classList.add("active");
      medium.classList.add("active");
      strong.classList.add("active");
      text.textContent = "Your password is strong";
      text.classList.add("strong");
    } 
    else 
    {
      strong.classList.remove("active");
      text.classList.remove("strong");
    }
      showBtn.style.display = "block";
      $(".eye").on("click", function ()  
    {
      if (input.type == "password") 
      {
        input.type = "text";
        $(".eye").attr('name', "low-vision");
        showBtn.style.color = "#000";
      }
      else
      {
        input.type = "password";
        $(".eye").attr('name', "show-alt");
        showBtn.style.color = "#000";
      }  
    });

    showbtn.style.display = "block";
    $(".eye1").on("click", function ()  
    {
      if (input1.type == "password") 
      {
        input1.type ="text";
        $(".eye1").attr('name', "low-vision");
        showbtn.style.color = "#000";
      }
      else
      {
        input1.type = "password";
        $(".eye1").attr('name', "show-alt");
        showbtn.style.color = "#000";
      }
    });
  } 
  else 
  {
    indicator.style.display = "none";
    text.style.display = "none";
    showBtn.style.display = "none";
    showbtn.style.display = "none";
  }
  });
});