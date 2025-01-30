//nurse CLINTON PROFILE
let Sophia = {
	name: 'Hospicare MD',
	img: 'images/pharmacy/hospicare.jpg',
	Fdescrip: `Sophia loves helping people of 
	all ages and prides herself on being a caring 
	and diligent nurse. He particularly enjoys
	 relating to her patients and working with them 
	 to achieve their best health outcomes.`,
	Sdescrip: `Outside work, Sophia enjoys spending 
	time with her young family .She also enjoys playing tennis .`,
};
let SophiaPro = document.querySelector('.Sophia');
let renderSophia = () => {
	SophiaPro.innerHTML = `<div class="row container-fluid dr">
  		<div class="col-sm-12 col-lg-5 col-md-12 animate drImage">
  			<img src="${Sophia.img}">
  		</div>
  		<div class="col-sm-12 animate col-lg-5 col-md-12 drDescript">
  			<p class="drName">${Sophia.name}</p>
  			<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1225.8529934615483!2d120.5794925067452!3d16.392221160339258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a134511a3577%3A0x6d37f8c26ff521a4!2sHospicare%20MD!5e1!3m2!1sen!2sph!4v1733976042615!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
  			
  			
  			</div>
  		</div>
  	</div>`
};
renderSophia();
