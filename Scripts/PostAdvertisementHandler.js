var pform = document.getElementById("pform");

var address = document.getElementById("address");
var locations = document.getElementById("locations");
var key1 = key2 = key3 = key4 = 0;
var format = /[^a-zA-Z0-9 ]/;
var format2 = /^[0-9]*\.?[0-9]*$/;

document.getElementById("PostAd").disabled = true;
document.getElementById("PostAd").style.backgroundColor = "grey";

function reSet(x)
{
    if(x.value == 'Enter Address') 
    { 
        x.value = ''; 
    }
    else if(x.value == '')
    {
        x.value = 'Enter Address';
    }
}

function change()
{
    if(locations.value=="")
    {
        address.style.display = "none";
        document.getElementById("locErr").innerHTML = "Please Select A Location!";
        document.getElementById("locErr").color = "red";
        key1 = 0;
        validate();
    }
    else
    {
        address.style.display = "inline-block";
        document.getElementById("locErr").innerHTML = "";
        key1 = 1;
        validate();
    }
}

function err(x)
{
    if(x.value=="")
    {
        if(x.name=="name")
        {
            document.getElementById("nameErr").innerHTML = "Flat Name Cannot Be Empty!";
            document.getElementById("nameErr").style.color = "red";
            key2 = 0;
            validate();
        }
        else if(x.name=="rent")
        {
            document.getElementById("rentErr").innerHTML = "Please Provide Rent Amount!";
            document.getElementById("rentErr").style.color = "red";
            key3 = 0;
            validate();
        }
        else if(x.name=="description")
        {
            document.getElementById("descriptionErr").innerHTML = "Please Add A Description!";
            document.getElementById("descriptionErr").style.color = "red";
            key4 = 0;
            validate();
        }
    }
    else if(x.name=="name" && (format.test(x.value)))
    {
        document.getElementById("nameErr").innerHTML = "Please Don't Use Special Characters!";
        document.getElementById("nameErr").style.color = "red";
        key2 = 0;
        validate();
    }
    else if(x.name=="rent" && (!format2.test(x.value)))
    {
        document.getElementById("rentErr").innerHTML = "Please Enter A Numeric Value!";
        document.getElementById("rentErr").style.color = "red";
        key3 = 0;
        validate();
    }
    else
    {
        if(x.name=="name")
        {
            document.getElementById("nameErr").innerHTML = "\u2713";
            document.getElementById("nameErr").style.color = "green";
            key2 = 1;
            validate();
        }
        else if(x.name=="rent")
        {
            document.getElementById("rentErr").innerHTML = "\u2713";
            document.getElementById("rentErr").style.color = "green";
            key3 = 1;
            validate();
        }
        else if(x.name=="description")
        {
            document.getElementById("descriptionErr").innerHTML = "\u2713";
            document.getElementById("descriptionErr").style.color = "green";
            key4 = 1;
            validate();
        }
    }
}

function validate()
{
    if(key1 == 0 || key2 == 0 || key3 == 0 || key4 == 0)
    {
        document.getElementById("PostAd").disabled = true;
        document.getElementById("PostAd").style.backgroundColor = "grey";
    }
    else
    {
        document.getElementById("PostAd").disabled = false;
        document.getElementById("PostAd").style.backgroundColor = "rgb(58, 58, 156)";
    }
}