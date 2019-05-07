window.onscroll = function()
{
  scrollFunction()
};

function scrollFunction()
{
  if (document.body.scrollTop > 415 || document.documentElement.scrollTop > 415)
  {
    document.getElementById("top_btn").style.display = "block";
  }
  else
  {
    document.getElementById("top_btn").style.display = "none";
  }
}

function topFunction()
{
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
