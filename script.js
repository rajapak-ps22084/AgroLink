function validateRegister()
{
    let fullname =
    document.getElementsByName("fullname")[0].value.trim();

    let email =
    document.getElementsByName("email")[0].value.trim();

    let phone =
    document.getElementsByName("phone")[0].value.trim();

    let address =
    document.getElementsByName("address")[0].value.trim();

    let password =
    document.getElementsByName("password")[0].value;

    if(fullname == "")
    {
        alert("Please enter your full name");
        return false;
    }

    if(fullname.length < 3)
    {
        alert("Full name must contain at least 3 characters");
        return false;
    }

    let emailPattern =
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email))
    {
        alert("Please enter a valid email address");
        return false;
    }

    let phonePattern =
    /^[0-9]{10}$/;

    if(!phonePattern.test(phone))
    {
        alert("Phone number must contain 10 digits");
        return false;
    }

    if(address == "")
    {
        alert("Please enter your address");
        return false;
    }

    if(password.length < 6)
    {
        alert("Password must be at least 6 characters");
        return false;
    }

    return true;
}


function validateLogin()
{
    let email =
    document.getElementById("email").value.trim();

    let password =
    document.getElementById("password").value.trim();

    if(email == "")
    {
        alert("Please enter your email");
        return false;
    }

    let emailPattern =
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email))
    {
        alert("Please enter a valid email address");
        return false;
    }

    if(password == "")
    {
        alert("Please enter your password");
        return false;
    }

    if(password.length < 6)
    {
        alert("Password must be at least 6 characters");
        return false;
    }

    return true;
}

function searchProducts()
{
    let input =
    document.getElementById("searchInput")
    .value.toLowerCase();

    let cards =
    document.getElementsByClassName("product-card");

    for(let i=0; i<cards.length; i++)
    {
        let productText =
        cards[i].innerText.toLowerCase();

        if(productText.includes(input))
        {
            cards[i].style.display = "block";
        }
        else
        {
            cards[i].style.display = "none";
        }
    }
}

function validateQuantity(input)
{
    if(input.value < 1)
    {
        alert("Quantity must be at least 1");
        input.value = 1;
    }
}

function previewImage(event)
{
    let preview =
    document.getElementById("preview");

    preview.src =
    URL.createObjectURL(event.target.files[0]);

    preview.style.display="block";
}

function countChars()
{
    let text =
    document.getElementById("review").value;

    document.getElementById("charCount")
    .innerHTML = text.length;
}