var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		var myObj = JSON.parse(this.responseText);
		
		const display_image = document.getElementById('mybox');
		//document.getElementById("test").innerHTML = myObj.data.images.normal;
		//console.log(myObj.data.date_published);
		const imagen = document.createElement('img');
		imagen.src = myObj.data.images.normal;
		display_image.appendChild(imagen);
		const dateP = document.getElementById('published_date');
		const h4 = document.createElement('h4');
		var date = myObj.data.date_published;
  h4.textContent = date;
		dateP.appendChild(h4);
		
		const avatar = document.createElement('img');
		avatar.src=myObj.data._embedded.uploader.avatar_url;

		
		const Uploader = document.getElementById('user_name');
		const Uploader_avatar = document.getElementById('user_avatar');
		const h3 = document.createElement('h3');
		var UserName = myObj.data._embedded.uploader.username;
  		h3.textContent = UserName;
		Uploader_avatar.appendChild(avatar);
		Uploader.appendChild(h3);
		
		Uploader.appendChild(h3);
		
		
	}
};
xmlhttp.open("GET", "https://api.olapic.com/media/2899395330?auth_token=0a40a13fd9d531110b4d6515ef0d6c529acdb59e81194132356a1b8903790c18&version=v2.2", true);
xmlhttp.send();
