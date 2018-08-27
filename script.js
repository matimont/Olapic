var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "https://api.olapic.com/media/2899395330?auth_token=0a40a13fd9d531110b4d6515ef0d6c529acdb59e81194132356a1b8903790c18&version=v2.2", true);


xmlhttp.onload = function () {
	if (this.readyState == 4 && this.status == 200) {
		var myObj = JSON.parse(this.responseText);
		
		const widget_container = document.getElementById('tease--image-wrapper');
	
		//const image_header_div = document.createElement('div');
      //	image_header_div.setAttribute('class', 'image_header');
		
		const avatar = document.createElement('img');
		avatar.src=myObj.data._embedded.uploader.avatar_url;
		
				//User who uploaded the image
		const user = document.createElement('h3');
		user.textContent = myObj.data._embedded.uploader.username;
				//Avatar
	//widget_container.appendChild(image_header_div);	
	 
		const main_image = document.createElement('img');
		main_image.src = myObj.data.images.normal;
		
		const dateP = document.createElement('h3');
		dateP.textContent = myObj.data.date_published;
		
		widget_container.appendChild(avatar);
		widget_container.appendChild(user);
		widget_container.appendChild(main_image);
		widget_container.appendChild(dateP);
		
		
	
		
		
	}
};
xmlhttp.send();

