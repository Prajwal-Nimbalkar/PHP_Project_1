function disp()
	{
		var ar;
		if(window.XMLHttpRequest)
		{
			ar = new XMLHttpRequest();
		}
		else
		{
			ar = new ActiveXObject("Microsoft.XMLHTTP");
		}
		ar.onreadystatechange = function()
		{
			if(ar.readyState==4 && ar.status==200)
			{
				document.getElementByValue("value").innerHTML = ar.responseText;
			}
		}	
		var km = document.getElementById("km").value;
		ar.open("GET","book.php?km="+km,true);
		ar.send(null);
	}