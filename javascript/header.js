let header = document.querySelector('.headin');

function renderHeader(argument) {
	header.innerHTML = `<!--logo-->
	<div class="logo">
		<a href="index.html"><i class="fa-solid fa-notes-medical"></i> SymptoAid</a>
	</div>
	<!--nav links-->
	<div class="links">
		<ul> <li class="home1"><a href="index.html">Home</a></li> 
		<li class="home2" ><a   href="../atabs_Health_Care/Admin2/news-report.php">News</a> </i>
			<li><a href="AAtabHealthCare/Eventss/Event1.html">Events</a></li>
			<li ><a class="subnav" href="AAtabHealthCare/Servicess/services.html">Services </a> </i>
				<!-- <ul class="drp">
					<li><a href="Immunisation.html">Immunization</a></li>
					<li><a href="Surgery.html">Consultations</a></li>
					<li><a href="Skin.html">Dental Check-up</a></li>
					<li><a href="Fitnes.html">Breast Screening</a></li>
					<li><a href="travel_vaccine.html">TB DOTS</a></li>
					
					<li><a href="Antenatal.html"> Saturday</a></li>
					<li><a href="Antenatal.html"> Sunday</a></li>
					
				</ul> -->
				
				</li> 
				<li><a href="AAtabHealthCare/SymptomAI/AboutAI.html">Symptom checker</a></li>
				
			<li class="home3"  class="drop abt" ><a class="subnav" href="nearby.html">Nearby Healthcare</a></i>
    <!--  <ul class="sub">
		<li><a href="Doctors.html"></a></li>
		<li><a href="Nurses.html"></a></li>
		<li><a href="Management.html">< Our Management</a></li>
      </ul> -->
			</li>

			
    <!--  <ul class="subb">
		<li><a href="../atabs_Health_Care/Admin2/news-report.php">Health News</a></li> -->


		
      </ul>
			</li>
		</ul>
	</div>
	<!--	<span class="sun">
<i class="fa-solid fa-sun "></i>
</span>
<span class="moon">
<i class="fa-solid fa-moon "></i>
</span>
	-->
	<!--accounts-->
	<div class="acct" style="position: absolute; z-index: -1; backgroud-color:white;">
		
</div>
	
	
	<div class="bars">
    <i id="open" class="menu-icon">☰</i> <!-- Open Button (Hamburger) -->
    <i id="close" class="menu-icon">✖</i> <!-- Close Button (X) -->
</div>`;
};

renderHeader();