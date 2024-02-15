$(document).ready(function() 
{
    const input = document.querySelector('#pw');
    const showBtn = document.querySelector('.eye');

    $("#pw").on("keyup", function toggle()
    {
        if (input.value != "")
        {
            showBtn.style.display = "block";
            $(".eye").on("click", function()
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
        }
        else
        {
            showBtn.style.display = "none";
        }
    })
});

