let slide = document.querySelector('.slide');



let nurses = [
  {
	nurseName: 'Cosape Dental Clinic',
	profile: 'View location',
	link: 'rutchy.html',
	nurseImage: 'images/pharmacy/dental1.jpg',
},
{
	nurseName: 'Geraldine Dental Clinic',
	profile: 'View location',
	link: 'chinenye.html',
	nurseImage: 'images/pharmacy/clinic2.jpg'
},
// {
// 	nurseName: 'White DentalClinic',
// 	profile: 'View location',
// 	link: 'julie.html',
// 	nurseImage: 'images/pharmacy/clinic3.jpg'
// },
// {
// 	nurseName: 'Hospitals',
// 	profile: 'View location',
// 	link: 'mark.html',
// 	nurseImage: 'images/pharmacy/station1.jpg'
// },
// {
// 	nurseName: 'Hospitals',
// 	profile: 'View location',
// 	link: 'rutchy.html',
// 	nurseImage: 'images/pharmacy/station1.jpg'
// },
// {
// 	nurseName: 'Hospitals',
// 	profile: 'View location',
// 	link: 'sophia.html',
// 	nurseImage: 'images/pharmacy/station1.jpg'
// },

];


let renderNurses = () => {
	nurses.forEach(nurse => {
		slide.innerHTML += `<div class="teamlead animate col-sm-12 col-lg-4 col-md-6">
   		<div class="nurse">
   		<div class="doc-img">
   			<img src="${nurse.nurseImage}">
   		</div>
   			<div class="team-bio">
   			<span class="nn">
   			<span class="namE"><strong>${nurse.nurseName}</strong></span>
   			<!--
   			<span class="specialty">Autopedic</span>
   -->
   		</span>
   		<!--
   			<span class="ss">
   				<span class="patientS "> 2K+ Patients</span>
   				<span class="rating"><i class="fa-sharp fa-solid fa-star"> </i>4.8(500)</span>
   			</span>
   		-->
   		</div>
       <p class="viewProfile">
   				<a href="${nurse.link}" >${nurse.profile}</a>
   			</p>
   		</div>
   		</div>
   		`;
	});
};
	renderNurses();


