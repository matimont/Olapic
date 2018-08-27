var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "https://api.olapic.com/media/2899395330?auth_token=0a40a13fd9d531110b4d6515ef0d6c529acdb59e81194132356a1b8903790c18&version=v2.2", true);


xmlhttp.onload = function () {
	if (this.readyState == 4 && this.status == 200) {
		var myObj = JSON.parse(this.responseText);
		
		const widget_container = document.getElementsByClassName('tease--image-wrapper')[0];
	
		const div_6_1 = document.createElement('div');
		div_6_1.setAttribute('style', 'width:48px; float:left');
				
		const avatar = document.createElement('img');
		avatar.src=myObj.data._embedded.uploader.avatar_url;
		
        const div_6_2 = document.createElement('div');
		div_6_2.setAttribute('style', 'float:left; padding-top:15px');

		const user = document.createElement('h5');
		user.textContent = myObj.data._embedded.uploader.username;

	 
		const main_image = document.createElement('img');
		main_image.src = myObj.data.images.normal;
		
		const dateP = document.createElement('h5');
		var Dpublished = new Date(myObj.data.date_published);
		var month = Dpublished.getMonth();
		var day = Dpublished.getDay();
		var year = Dpublished.getFullYear();
		
		dateP.textContent = month+ '-' + day + '-' + year;
		
		
		div_6_1.appendChild(avatar);
		div_6_2.appendChild(user);
		widget_container.appendChild(div_6_1);
		widget_container.appendChild(div_6_2);
		//widget_container.appendChild(user);
		widget_container.appendChild(main_image);
		widget_container.appendChild(dateP);
		
		
	
		
		
	}
};
xmlhttp.send();

