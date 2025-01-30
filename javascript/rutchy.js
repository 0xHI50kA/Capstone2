//nurse Rutchy PROFILE
let Rutchy = {
	name: 'Cosape Dental Clinic',
	img: 'images/pharmacy/dental1.jpg',
	Fdescrip: `Rutchy loves helping people of 
	all ages and prides himself on being a caring 
	and diligent nurse. She particularly enjoys
	 relating to her patients and working with them 
	 to achieve their best health outcomes.`,
	Sdescrip: `Outside work, Rutchy enjoys spending 
	time with her  family at USA including trips to the 
	Zoo and all things Lego .`,
};
let RutchyPro = document.querySelector('.Rutchy');
let renderRutchy = () => {
	RutchyPro.innerHTML = `<div class="row container-fluid dr">
  		<div class="col-sm-12 col-lg-5 col-md-12 animate drImage">
  			<img src="${Rutchy.img}">
  		</div>
  		<div class="col-sm-12 animate col-lg-5 col-md-12 drDescript">
  			<p class="drName">${Rutchy.name}</p>
  			<p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1457.8161459929468!2d120.575041!3d16.389142!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a1bcc239bddb%3A0xfa67532d8ada1384!2sCosape-Badongen%20Dental%20Clinic!5e1!3m2!1sen!2sph!4v1733976669888!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
  			
  			</div>
  		</div>
  	</div>`
};
renderRutchy();
