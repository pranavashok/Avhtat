<?php
require_once 'config.php'; 
session_start();
$hash_full=$_GET['page'];
$tmp = explode('/', $hash_full);
$reg = $tmp[0];
$hash= $tmp[1];
if($hash_full=="register")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:register();">
<div style="float:right">
<a href="#!forgotid" rel="ajax">Forgot Tathva ID?</a><br/><br/>
<a href="#!forgotpass" rel="ajax">Forgot Password?</a>
</div>
<h1>Registration</h1>
<p>Fill in all the required details</p>
<label>Name
<span class="small">Add your name</span>
</label>
<input type="text" name="name" id="name" />

<label>Email
<span class="small">Add a valid address</span>
</label>
<input type="text" name="email" id="email" />

<label>Phone
<span class="small">Add a valid phone number</span>
</label>
<input type="text" name="phone" id="phone" />

<label>Password
<span class="small">Min. size 6 chars</span>
</label>
<input type="password" name="password" id="password" />

<label>Confirm Password
<span class="small">Re-type your password</span>
</label>
<input type="password" name="password2" id="password2" />

<label>Institution Name
<span class="small">Add your institution</span>
</label>
</form>
</div>
<!--            Institution List --><div style="margin:-25px 45px; padding:0px 0px 30px 200px; width:430px; float:right; color:black;  ">&nbsp;&nbsp;&nbsp;
<select id="institution" name="institution" class="chzn-select" data-placeholder="Select an institute" style="margin:-20px 300px; width:200px;  color:black;  ">

<option></option>
<option value="Other">Other</option>
<option value="A.D.Patel Institute of Technology">A.D.Patel Institute of Technology</option>
<option value="A.M.S College of Engineering">A.M.S College of Engineering</option>
<option value="ABV-IIITM, Gwalior">ABV-IIITM, Gwalior</option>
<option value="AMC College of Engineering, Bangalore">AMC College of Engineering, Bangalore</option>
<option value="ANITS,Visakhapatnam">ANITS,Visakhapatnam</option>
<option value="AWH Engineering College, Calicut">AWH Engineering College, Calicut</option>
<option value="Achariya Arts and Science College">Achariya Arts and Science College</option>
<option value="Adam Smith Institute of Management, Bangalore">Adam Smith Institute of Management, Bangalore</option>
<option value="Adi Shankara Institute of Engineering & Technology, Kalady">Adi Shankara Institute of Engineering & Technology, Kalady</option>
<option value="Ajay Binay Institute of Technology">Ajay Binay Institute of Technology</option>
<option value="Al-Farook Educational Center, Calicut">Al-Farook Educational Center, Calicut</option>
<option value="Al-Farook Residential School, Calicut">Al-Farook Residential School, Calicut</option>
<option value="All Saints\' College, Trivandrum">All Saints\' College, Trivandrum</option>
<option value="Alliance Business School, Bangalore">Alliance Business School, Bangalore</option>
<option value="St. Aloysious Institute of Management and IT, Mangalore">St. Aloysious Institute of Management and IT, Mangalore</option>
<option value="Amal Jyothi College of Engineering">Amal Jyothi College of Engineering</option>
<option value="Amrita School of Business">Amrita School of Business</option>
<option value="Amrita School of Engineering, Kollam">Amrita School of Engineering, Kollam</option>
<option value="Amrita Vishwa Vidyapeetham School of Engineering, Coimbatore">Amrita Vishwa Vidyapeetham School of Engineering, Coimbatore</option>
<option value="Andhra University College of Engineering">Andhra University College of Engineering</option>
<option value="Anjalai Ammal Mahalingam Engineering College">Anjalai Ammal Mahalingam Engineering College</option>
<option value="Anjuman College of Engineering & Technology">Anjuman College of Engineering & Technology</option>
<option value="Anna University, Trichy">Anna University, Trichy</option>
<option value="Apeejay Institute of Management, Jalandhar">Apeejay Institute of Management, Jalandhar</option>
<option value="Arizona State University">Arizona State University</option>
<option value="Assam University, Silchar">Assam University, Silchar</option>
<option value="Aurora\'s Engineering College">Aurora\'s Engineering College</option>
<option value="B.M.S College of Engineering, Bangalore">B.M.S College of Engineering, Bangalore</option>
<option value="BITS Pilani">BITS Pilani</option>
<option value="BVBCET">BVBCET</option>
<option value="BVIMR">BVIMR</option>
<option value="BVRIT">BVRIT</option>
<option value="Badruka Institute of Foreign Trade">Badruka Institute of Foreign Trade</option>
<option value="Baithul Izza Arts and Science College">Baithul Izza Arts and Science College</option>
<option value="Banasthali University">Banasthali University</option>
<option value="Bannari Amman Institute of Technology">Bannari Amman Institute of Technology</option>
<option value="Bharathiya Vidya Bhavan Calicut">Bharathiya Vidya Bhavan Calicut</option>
<option value="Bharatiya Vidya Bhavan, Kannur">Bharatiya Vidya Bhavan, Kannur</option>
<option value="Bhilai Institute of Technology">Bhilai Institute of Technology</option>
<option value="Bits Pilani-Goa Campus">Bits Pilani-Goa Campus</option>
<option value="CBIT-Gandipet">CBIT-Gandipet</option>
<option value="College of Engineering Sri Venkateswara University">College of Engineering Sri Venkateswara University</option>
<option value="Chinmaya Mission College">Chinmaya Mission College</option>
<option value="Christ College, Bangalore">Christ College, Bangalore</option>
<option value="Clarence Public School">Clarence Public School</option>
<option value="Co-operative Institute of Technology, Vadakara">Co-operative Institute of Technology, Vadakara</option>
<option value="Cochin University College of Engineering (CUCEK)">Cochin University College of Engineering (CUCEK)</option>
<option value="Coimbatore Institute of Technology">Coimbatore Institute of Technology</option>
<option value="College of Engineering Trikaripur, Cheemeni">College of Engineering Trikaripur, Cheemeni</option>
<option value="College of Engineering, Munnar">College of Engineering, Munnar</option>
<option value="College of Engineering, Guindy, Chennai">College of Engineering, Guindy, Chennai</option>
<option value="College of Engineering, Kidangoor">College of Engineering, Kidangoor</option>
<option value="College of Engineering, Pallipuram">College of Engineering, Pallipuram</option>
<option value="College of Engineering,  Attingal">College of Engineering,  Attingal</option>
<option value="College of Engineering, Kallooppara">College of Engineering, Kallooppara</option>
<option value="College of Engineering, Adoor">College of Engineering, Adoor</option>
<option value="College of Engineering, Chengannur">College of Engineering, Chengannur</option>
<option value="College of Engineering, Pune">College of Engineering, Pune</option>
<option value="College of Engineering, Thalassery">College of Engineering, Thalassery</option>
<option value="College of Engineering, Trivandrum">College of Engineering, Trivandrum</option>
<option value="DA-IICT">DA-IICT</option>
<option value="DJ Sanghvi College of Engineering">DJ Sanghvi College of Engineering</option>
<option value="Don Bosco College">Don Bosco College</option>
<option value="Datta Meghe College of Engineering, Airoli, Navi Mumbai">Datta Meghe College of Engineering, Airoli, Navi Mumbai</option>
<option value="Deccan College of Engineering & Technology">Deccan College of Engineering & Technology</option>
<option value="Delhi College of Engineering.">Delhi College of Engineering.</option>
<option value="Dr. M.G.R. University, Chennai">Dr. M.G.R. University, Chennai</option>
<option value="FISAT, Angamaly">FISAT, Angamaly</option>
<option value="G.B.H.S.S. Parayanchery, Calicut">G.B.H.S.S. Parayanchery, Calicut</option>
<option value="G.H.S.S. Meenangadi">G.H.S.S. Meenangadi</option>
<option value="GEC, Kannur">GEC, Kannur</option>
<option value="GEC Thrissur">GEC Thrissur</option>
<option value="GEC, Barton Hill">GEC, Barton Hill</option>
<option value="GEC, Calicut">GEC, Calicut</option>
<option value="GEC, Idukki">GEC, Idukki</option>
<option value="GITAM,Visakhapatnam">GITAM,Visakhapatnam</option>
<option value="Govt. Vocational Higher Secondary School (THS) Manjeri">Govt. Vocational Higher Secondary School (THS) Manjeri</option>
<option value="GSSIT, Bangalore">GSSIT, Bangalore</option>
<option value="GVPCOE,Visakhapatnam">GVPCOE,Visakhapatnam</option>
<option value="Garden City College, Bangalore">Garden City College, Bangalore</option>
<option value="Geethanjali College of Engineering & Technology">Geethanjali College of Engineering & Technology</option>
<option value="Ghousia College of Engineering">Ghousia College of Engineering</option>
<option value="Global Acedamy of Technology">Global Acedamy of Technology</option>
<option value="Government Engineering College Sreekrishnapuram, Palakkad">Government Engineering College Sreekrishnapuram, Palakkad</option>
<option value="Government College of Technology, Coimbatore">Government College of Technology, Coimbatore</option>
<option value="Government Polytechnic College, Coimbatore">Government Polytechnic College, Coimbatore</option>
<option value="Govt. Engneering College, Wayanad">Govt. Engneering College, Wayanad</option>
<option value="Govt. Rajas Higher Secondary School, Kottakkal">Govt. Rajas Higher Secondary School, Kottakkal</option>
<option value="I.H.R.D">I.H.R.D</option>
<option value="IES College of Engineering, Chittilappilly">IES College of Engineering, Chittilappilly</option>
<option value="IPS Academy, Indore">IPS Academy, Indore</option>
<option value="IFMR, Chennai">IFMR, Chennai</option>
<option value="IIIT Allahabad">IIIT Allahabad</option>
<option value="IIIT Hyderabad">IIIT Hyderabad</option>
<option value="IIM Bangalore">IIM Bangalore</option>
<option value="IIM Calcutta">IIM Calcutta</option>
<option value="IIM Calicut">IIM Calicut</option>
<option value="IIM Indore">IIM Indore</option>
<option value="IIM Lucknow">IIM Lucknow</option>
<option value="IIST, Trivandrum">IIST, Trivandrum</option>
<option value="IISc Bangalore">IISc Bangalore</option>
<option value="IIT Delhi">IIT Delhi</option>
<option value="IIT Kanpur">IIT Kanpur</option>
<option value="IIT Kharagpur">IIT Kharagpur</option>
<option value="IIT Gandhinagar">IIT Gandhinagar</option>
<option value="IIT Madras">IIT Madras</option>
<option value="IIT Roorkee">IIT Roorkee</option>
<option value="IT-BHU">IT-BHU</option>
<option value="Indian Institute of Space Science and Technology">Indian Institute of Space Science and Technology</option>
<option value="Institute of Aeronautical Engineering">Institute of Aeronautical Engineering</option>
<option value="Jawaharlal College of Engineering and Technology">Jawaharlal College of Engineering and Technology</option>
<option value="JHS, Bangalore">JHS, Bangalore</option>
<option value="JNTU, Anantapur">JNTU, Anantapur</option>
<option value="Jeppiaar Engineering College">Jeppiaar Engineering College</option>
<option value="John Cox Engineering College,Trivandrum">John Cox Engineering College,Trivandrum</option>
<option value="Jyothi Engineering College, Thrissur">Jyothi Engineering College, Thrissur</option>
<option value="K L University">K L University</option>
<option value="K V G College of Engineering, Sullia, Mangalore">K V G College of Engineering, Sullia, Mangalore</option>
<option value="K.S.Institute of Technology">K.S.Institute of Technology</option>
<option value="KLN College of Information Technology">KLN College of Information Technology</option>
<option value="KMCT College of Engineering">KMCT College of Engineering</option>
<option value="KSR College of Technology">KSR College of Technology</option>
<option value="Kalasalingam University, Krishnankoil">Kalasalingam University, Krishnankoil</option>
<option value="Kalinga Institute of Industrial Technology">Kalinga Institute of Industrial Technology</option>
<option value="Karunya University, Coimbatore">Karunya University, Coimbatore</option>
<option value="Kendriya Vidyalaya No.2, Calicut">Kendriya Vidyalaya No.2, Calicut</option>
<option value="Kendriya Vidyalaya No.1, Calicut">Kendriya Vidyalaya No.1, Calicut</option>
<option value="Kongu Engineering College, Erode">Kongu Engineering College, Erode</option>
<option value="LBRCE, Mylavaram">LBRCE, Mylavaram</option>
<option value="LBS,Trivandrum">LBS,Trivandrum</option>
<option value="College of Engineering, Kasargode">College of Engineering, Kasargode</option>
<option value="LMCST, Trivandrum">LMCST, Trivandrum</option>
<option value="M A College of Engineering, Kothamangalam">M A College of Engineering, Kothamangalam</option>
<option value="MDI Gurgaon">MDI Gurgaon</option>
<option value="MES College of Engineering, Kuttipuram">MES College of Engineering, Kuttipuram</option>
<option value="MNIT, Jaipur">MNIT, Jaipur</option>
<option value="MNNIT Allahabad">MNNIT Allahabad</option>
<option value="MS Ramaiah Institute of Technology">MS Ramaiah Institute of Technology</option>
<option value="MSIT, New Delhi">MSIT, New Delhi</option>
<option value="Madras Institute of Technology">Madras Institute of Technology</option>
<option value="Malabar Christian College, Calicut">Malabar Christian College, Calicut</option>
<option value="Malabar College of Engineering and Technology, Deshamangalam, Thrissur">Malabar College of Engineering and Technology, Deshamangalam, Thrissur</option>
<option value="Malla Reddy Engineering College">Malla Reddy Engineering College</option>
<option value="Mandsaur Institute of Technology, MP">Mandsaur Institute of Technology, MP</option>
<option value="Manipal Institute of Technology">Manipal Institute of Technology</option>
<option value="Mar Athnesius College of Engineering">Mar Athnesius College of Engineering</option>
<option value="Mar Baselios Christian College of Engineering & Technology, Peermade">Mar Baselios Christian College of Engineering & Technology, Peermade</option>
<option value="Mar Baselios College of Engineering, Trivandrum">Mar Baselios College of Engineering, Trivandrum</option>
<option value="Marian Engineering College, Trivandrum">Marian Engineering College, Trivandrum</option>
<option value="Marygiri Senior Secondary School">Marygiri Senior Secondary School</option>
<option value="Matha College of Technology, Ernakulam">Matha College of Technology, Ernakulam</option>
<option value="Maulana Azad National Institute of Technology, Bhopal">Maulana Azad National Institute of Technology, Bhopal</option>
<option value="Medical College Calicut">Medical College Calicut</option>
<option value="Mepco Schlenk Engineering College">Mepco Schlenk Engineering College</option>
<option value="Model Engineering College, Thrikkakara">Model Engineering College, Thrikkakara</option>
<option value="Mohandas College of Engineering and Technology">Mohandas College of Engineering and Technology</option>
<option value="Muslim Association College of Engineering">Muslim Association College of Engineering</option>
<option value="N.S.S. College of Engineering and Technology, Palakkad">N.S.S. College of Engineering and Technology, Palakkad</option>
<option value="Nimra College of Business Management">Nimra College of Business Management</option>
<option value="NIT Calicut">NIT Calicut</option>
<option value="NIT Durgapur">NIT Durgapur</option>
<option value="NIT Jamshedpur">NIT Jamshedpur</option>
<option value="NIT Kurukshetra">NIT Kurukshetra</option>
<option value="NIT Raipur">NIT Raipur</option>
<option value="NIT Rourkela">NIT Rourkela</option>
<option value="NIT Surathkal">NIT Surathkal</option>
<option value="NIT Trichy">NIT Trichy</option>
<option value="NIT Warangal">NIT Warangal</option>
<option value="NMAMIT, NITTE">NMAMIT, NITTE</option>
<option value="NSIT, Delhi">NSIT, Delhi</option>
<option value="Nanyang Technological University">Nanyang Technological University</option>
<option value="Nehru College of Engineering, Pampady">Nehru College of Engineering, Pampady</option>
<option value="Nirma Institute of Technology">Nirma Institute of Technology</option>
<option value="Noorul Islam College of Engineering">Noorul Islam College of Engineering</option>
<option value="North Carolina State University">North Carolina State University</option>
<option value="Orissa Engineering College, Bhubaneswar">Orissa Engineering College, Bhubaneswar</option>
<option value="P A College of Engineering">P A College of Engineering</option>
<option value="P K M M H S S Edarikode">P K M M H S S Edarikode</option>
<option value="P.D.College Amravati">P.D.College Amravati</option>
<option value="P.V.P Siddhartha Institute of Technology">P.V.P Siddhartha Institute of Technology</option>
<option value="PSG College of Technology Coimbatore">PSG College of Technology Coimbatore</option>
<option value="Periyar Maniammai University, Thanjavur">Periyar Maniammai University, Thanjavur</option>
<option value="Pondicherry Engineering College">Pondicherry Engineering College</option>
<option value="Pragathi Engineering College">Pragathi Engineering College</option>
<option value="R.N.S. Institute of Technology">R.N.S. Institute of Technology</option>
<option value="RAHMANIA .H.S.S, Calicut ">RAHMANIA .H.S.S, Calicut </option>
<option value="RV College of Engineering, Bangalore">RV College of Engineering, Bangalore</option>
<option value="Raja College of Engineering & Technology">Raja College of Engineering & Technology</option>
<option value="Rajagiri School of Engineering & Technology">Rajagiri School of Engineering & Technology</option>
<option value="Rajiv Gandhi Institute of Technology, Kottayam">Rajiv Gandhi Institute of Technology, Kottayam</option>
<option value="SASTRA University, Thanjavur">SASTRA University, Thanjavur</option>
<option value="SBM Jain College of Engineering">SBM Jain College of Engineering</option>
<option value="Science Institute Manjeri">Science Institute Manjeri</option>
<option value="SCT College of Engineering, Trivandrum">SCT College of Engineering, Trivandrum</option>
<option value="SDMCET">SDMCET</option>
<option value="SJB Institute of Technology">SJB Institute of Technology</option>
<option value="SJC Institute of Technology">SJC Institute of Technology</option>
<option value="SN College Chempazhanthy">SN College Chempazhanthy</option>
<option value="SNS College of Engineering">SNS College of Engineering</option>
<option value="SNS College of Technology">SNS College of Technology</option>
<option value="Sree Narayana Gurukulam College, Kolenchery">Sree Narayana Gurukulam College, Kolenchery</option>
<option value="SRM Engineering College Chennai">SRM Engineering College Chennai</option>
<option value="SVMIT, Bharuch">SVMIT, Bharuch</option>
<option value="Saintgits College of Engineering, Kottayam">Saintgits College of Engineering, Kottayam</option>
<option value="Sambhram Institute of Technology Bangalore">Sambhram Institute of Technology Bangalore</option>
<option value="Sathyabama University">Sathyabama University</option>
<option value="School of Engineering CUSAT">School of Engineering CUSAT</option>
<option value="School of Technology & Applied Sciences,M.G.University, Kottayam">School of Technology & Applied Sciences,M.G.University, Kottayam</option>
<option value="Siddaganga Institute of Technology">Siddaganga Institute of Technology</option>
<option value="Sikkim Manipal University">Sikkim Manipal University</option>
<option value="Siliguri Institute of Technology">Siliguri Institute of Technology</option>
<option value="Sona College of Technology, Salem">Sona College of Technology, Salem</option>
<option value="Sree Narayana Guru College of Engineering & Technology, Payyanur">Sree Narayana Guru College of Engineering & Technology, Payyanur</option>
<option value="Sreenidhi Institute of Science and Technology">Sreenidhi Institute of Science and Technology</option>
<option value="Sri Chandrasekharendra Saraswathi Viswa Mahavidyalaya, Kanchipuram(TN)">Sri Chandrasekharendra Saraswathi Viswa Mahavidyalaya, Kanchipuram(TN)</option>
<option value="Sri Kalahasteeswara Institute of Technology">Sri Kalahasteeswara Institute of Technology</option>
<option value="Sri Krishna College of Engineering and Technology">Sri Krishna College of Engineering and Technology</option>
<option value="Sri Nandhanam College of Engineering & Technology">Sri Nandhanam College of Engineering & Technology</option>
<option value="Sri Sairam Engineering College">Sri Sairam Engineering College</option>
<option value="Sri Shakthi Institute of Engineering and Technology">Sri Shakthi Institute of Engineering and Technology</option>
<option value="St. Josephs College of Engineering & Technology, Palai">St. Josephs College of Engineering & Technology, Palai</option>
<option value="TKM College of Engineering, Kollam">TKM College of Engineering, Kollam</option>
<option value="The Oxford College of Engineering">The Oxford College of Engineering</option>
<option value="Thiagarajar School of Management">Thiagarajar School of Management</option>
<option value="Toc H Institute of Science and Technology">Toc H Institute of Science and Technology</option>
<option value="Udaya School of Engineering, Kanyakumari">Udaya School of Engineering, Kanyakumari</option>
<option value="University College of Engineering, Thodupuzha">University College of Engineering, Thodupuzha</option>
<option value="VLB College of Engineering & Technology">VLB College of Engineering & Technology</option>
<option value="VNIT Nagpur">VNIT Nagpur</option>
<option value="VSB Engineering College">VSB Engineering College</option>
<option value="Vathsalya Institute of Science and Technology">Vathsalya Institute of Science and Technology</option>
<option value="Veda Vyasa Institute of Technology">Veda Vyasa Institute of Technology</option>
<option value="Velammal College of Engineering & Technology, Madurai">Velammal College of Engineering & Technology, Madurai</option>
<option value="Velammal Engineering College">Velammal Engineering College</option>
<option value="Vellore Institute of Technology(VIT University)">Vellore Institute of Technology(VIT University)</option>
<option value="Vidya Academy of Science and Technology">Vidya Academy of Science and Technology</option>
<option value="Vimal Jyothi Engineering College Kannur">Vimal Jyothi Engineering College Kannur</option>
<option value="Viswajyothi College of Engineering & Technology, Ernakulam">Viswajyothi College of Engineering & Technology, Ernakulam</option>
<option value="Vivekananda Institute of Technology">Vivekananda Institute of Technology</option>
<option value="XIME, Bangalore">XIME, Bangalore</option>
<option value="YDIT, Bangalore">YDIT, Bangalore</option>
<option value="ZGC, Calicut">ZGC, Calicut</option>
<option value="Calicut University Institute of Engineering and Technology">Calicut University Institute of Engineering and Technology</option>
<option value="Cochin University of Science and Technology">Cochin University of Science and Technology</option>
<option value="College of Applied Science,Thiruvambadi">College of Applied Science,Thiruvambadi</option>
<option value="East Point College of Engineering and Technology">East Point College of Engineering and Technology</option>
<option value="GHSS, Kavanur ">GHSS, Kavanur </option>
<option value="GNDU,Amritsar">GNDU,Amritsar</option>
<option value="IITP">IITP</option>
<option value="Java Stream Technology,Bangalore">Java Stream Technology,Bangalore</option>
<option value="Joginpally Bhaskar Institute of Engineering and Technology">Joginpally Bhaskar Institute of Engineering and Technology</option>
<option value="KMEA Kondappalli">KMEA Kondappalli</option>
<option value="M.M.H.S.S, Thalassery">M.M.H.S.S, Thalassery</option>
<option value="Park College of Engineering and Technology">Park College of Engineering and Technology</option>
<option value="Prestige Public School, Indore">Prestige Public School, Indore</option>
<option value="Purushottam Institute of Engineering & Technology, Rourkela, Orissa">Purushottam Institute of Engineering & Technology, Rourkela, Orissa</option>
<option value="Pydah College of Engineering and Technology, Visakhapatnam">Pydah College of Engineering and Technology, Visakhapatnam</option>
<option value="Sahrdaya College of Engineering & Technology, Thrissur">Sahrdaya College of Engineering & Technology, Thrissur</option>
<option value="Sapthagiri College of Engineering, Dharmapuri">Sapthagiri College of Engineering, Dharmapuri</option>
<option value="School of Architecture and Planning, Anna University, Madras">School of Architecture and Planning, Anna University, Madras</option>
<option value="SDBCT, Indore">SDBCT, Indore</option>
<option value="Sethu Institute of Technology, Virudhunagar, Tamil Nadu">Sethu Institute of Technology, Virudhunagar, Tamil Nadu</option>
<option value="Silver Hills Higher Secondary School, Kozhikode">Silver Hills Higher Secondary School, Kozhikode</option>
<option value="SNES Calicut">SNES Calicut</option>
<option value="Sree Narayana Education Society Calicut ">Sree Narayana Education Society Calicut </option>
<option value="Sri Kalahasteeswara Institute of Technology(skit), Srikalahasti">Sri Kalahasteeswara Institute of Technology(skit), Srikalahasti</option>
<option value="Sri Ramakrishna Engineering College">Sri Ramakrishna Engineering College</option>
<option value="Srinivas College of Engineering ">Srinivas College of Engineering </option>
<option value="Kakatiya University, Kothagudem">Kakatiya University, Kothagudem</option>
<option value="Veda Vyasa Vidhyalayam, Kozhikode">Veda Vyasa Vidhyalayam, Kozhikode</option>
<option value="Velagapudi Ramakrishna Siddhartha Engineering College">Velagapudi Ramakrishna Siddhartha Engineering College</option>
<option value="Vinayaka Mission University, Chennai">Vinayaka Mission University, Chennai</option>
</select><script>$(".chzn-select").chosen({no_results_text: "Choose Other"});
$(".chzn-select").change(function(){
		if($(this).attr("value")=="Other")
			$("#institution2").show();
		else
			$("#institution2").hide();
	});
</script>
</div>
<br/><br/>
<div id="stylized" class="myform" style="margin:30px;">
<br/>
<label> &nbsp;</label><input style="display:none;" type="text" name="institution2" id="institution2" /> <br/>
<!--         End of institution list -->
<form id="form" name="form" method="post" action="javascript:register();">
<button type="submit">Register</button>
<br/><br/>

<div class="spacer"></div>

</form>
</div>';
}
else if($hash_full=="info")
{
echo '<div id="ititle">Information</div>
<div id="imenu">
<ul class = "ilinks">
<li id="0">Registration</li>
<li id="1">Hospitality</li>
</ul>
</div>

<div id="imcs_container">
<div class="icustomScrollBox">
<div class="icontainer">
<div class="icontent">
<div id="isection0" class="isection">
Participants should have a confirmed Tathva ID for participating in any event, attending workshop or to avail accommodation. The online registered Tathva ID should be confirmed at the registration desk for the same. Participants should bring a valid college ID as the proof for identity. All the events for which the participant has registered online will be confirmed once the registration procedure is completed. On the spot registration for Tathva ID as well as Events will be provided at the registration desk. Once registered, participant can take part in any event or free workshop at Tathva. Gaming events registration fees will be separate, and only those with a valid Tathva ID will be able to participate in that. Only those with Tathva ID will be given accomodation. Workshop participants can use their IDs to attend any event at Tathva. Prizes and certificates will be given during de-registration of the participant. For team events, prizes will be handed over to the EVENT TEAM CAPTAIN.<br/><br/>

Registration fees: Rs.200<br/>
Hospitality fees:Rs.50 (refundable at the return of utilities provided)<br/>
Workshops: As per the stipulated fee(No other registration fee required)<br/>
Gaming: As per the stipulated fee(After acquiring a valid Tathva ID)<br/>
<br/>
Note: Online provided Tathva ID becomes valid only when it is confirmed at the Registration  Desk<br/><br/>

Contact<br/>
Anoob Joseph<br/>
Registration Manager<br/>
+91 889 172 5651<br/>
anoob@tathva.org<br/>
</div>

<div id="isection1" class="isection">
Those who require accommodation facility have to pay Rs.50(refundable) at the Registration desk. Receipt of payment so obtained should be produced at Hospitality desk. Utilities will be provided for groups of 3 or 4(Do come in groups for simplifying the process and avoid the delay). One of the participants in each group will be made as the hospitality team captain. THE EVENT TEAM CAPTAIN NEED NOT BE THE SAME AS THE HOSPITALITY TEAM CAPTAIN. Strength of the group may be changed as the participants require.<br/>
All the required utilities for stay for the entire group will be handed over to the respective team captain. Team captain (Hospitality) should return all the utilities provided to his group during de-registration. If the team captain leaves before the other team members please inform us and re edit the team captain.
<br/><br/>
Note: Refunds will be provided on the de-registration of Team Captain only<br/>
<br/>
Contact<br/>
Benevant Mathew<br/>
Hopitality Manager<br/>
+91 980 961 5184<br/>
benevantmathew@tathva.org<br/>
<br/>
Honey Susan Kurian<br/>
Hospitality Manager<br/>
+91 902 034 9934<br/>
honeysusan@tathva.org<br/>

</div>
</div><!--icontent-->
</div><!--icontainer-->
<div class="idragger_container">
<div class="idragger"></div>
</div>
<div id="igrad"></div>
</div><!--icustomScrollBox-->
<a href="#" class="iscrollUpBtn"></a><a href="#" class="iscrollDownBtn"></a>
</div> <!--imcs_container-->';
}

else if($hash_full=="schedule")
{
echo '<div id="ititle">Schedule</div><div id="imcs_container">
<div class="icustomScrollBox">
<div class="icontainer">
<div class="icontent"><div id="isection0" class="isection">Schedule will be put up shortly.</div></div><!--icontent-->
</div><!--icontainer-->
<div class="idragger_container">
<div class="idragger"></div>
</div>
<div id="igrad"></div>
</div><!--icustomScrollBox-->
<a href="#" class="iscrollUpBtn"></a><a href="#" class="iscrollDownBtn"></a>
</div> <!--imcs_container-->';

}
else if($hash_full=="forgotid")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:getid();">
<h1>Forgot Tathva ID?</h1>
<p>Fill in all the required details</p>

<label>Email
<span class="small">Enter your email address</span>
</label>
<input type="text" name="email" id="email" />

<label>Phone
<span class="small">Enter your phone number</span>
</label>
<input type="text" name="phone" id="phone" />

<button type="submit">Retrieve</button>
<br/><br/>
<center><a href="#!forgotpass" rel="ajax">Forgot Password</a></center>
<div class="spacer"></div>

</form>
</div>';
}else if($hash_full=="forgotpass")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:getpass();">
<h1>Forgot Password?</h1>
<p>Fill in all the required details</p>

<label>Email
<span class="small">Enter your email address</span>
</label>
<input type="text" name="email" id="email" />

<label>Phone
<span class="small">Enter your phone number</span>
</label>
<input type="text" name="phone" id="phone" />

<button type="submit">Retrieve</button>
<br/><br/>
<center><a href="#!forgotid" rel="ajax">Forgot Tathva ID</a></center>
<div class="spacer"></div>

</form>
</div>';
}else if($hash_full=="reset")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:resetpass();">
<h1>Password Reset</h1>
<p>Fill in all the required details</p>
<label>Password
<span class="small">Enter new password</span>
</label>
<input type="password" name="password" id="password" />

<label>Confirm Password
<span class="small">Confirm new password</span>
</label>
<input type="password" name="password2" id="password2" />

<button type="submit">Reset</button>
<br/><br/>
<div class="spacer"></div>
</form></div>';
}
else if($hash_full=="sponsors")
{
echo '<div id="ititle">Sponsors</div>
<div id="imcs_container" class="fullwidth">
<div class="icustomScrollBox">
<div class="icontainer">
<div class="icontent">
<div id="sponsorslist"> 
Event Sponsors <br/><br/>
 	  <a href="http://gasotech.com/" target="_blank"><img src="styles/images/sponsors/gasotech.jpg" alt=""/></a> <br/><br/>
 	  <a href="http://www.raritan.com/" target="_blank"><img src="styles/images/sponsors/raritan.jpg" alt=""/></a>  <br/><br/>
 	  <a href="http://www.arbitron.com/" target="_blank"><img src="styles/images/sponsors/arbitron.jpg" alt=""/></a> <br/><br/>
       <a href="http://www.ulcyberpark.com//" target="_blank"><img src="styles/images/sponsors/cyberpark.jpg" alt=""/></a> <br/><br/> 	  
   	  <a href="http://www.arubanetworks.com/" target="_blank"><img src="styles/images/sponsors/aruba.jpg" alt=""/></a> <br/><br/>
     	  <a href="http://nsef-india.org/" target="_blank"><img src="styles/images/sponsors/nsef.jpg" alt=""/></a> <br/><br/>
     	
Adventure Sponsor<br/><br/>
 	  <a href="http://www.treksnrapids.com/" target="_blank"><img src="styles/images/sponsors/treksnrapids.jpg" alt=""/></a> <br/><br/>
 	  
Merchandise Partner<br/><br/>
  	  <a href="http://www.transition-asia.com/" target="_blank"><img src="styles/images/sponsors/transition.jpg" alt=""/></a> <br/><br/>
 
Registration Sponsor<br/><br/>
       <a href="http://www.byjusclasses.com/" target="_blank"><img src="styles/images/sponsors/byjusclasses.jpg" alt=""/></a> <br/><br/>
         
Beverage Sponsor<br/><br/>
	<a href="http://www.coca-cola.com/" target="_blank"><img src="styles/images/sponsors/cocacola.jpg" alt=""/></a><br/><br/>

Gaming Partners<br/><br/>
	<a href="http://www.coolermaster.com/" target="_blank"><img src="styles/images/sponsors/coolermaster.jpg" alt=""/></a><br/><br/>
	<a href="http://www.cmstorm.com/" target="_blank"><img src="styles/images/sponsors/cmstorm.jpg" alt=""/></a><br/><br/>
	<a href="http://www.choiix.com/" target="_blank"><img src="styles/images/sponsors/choiix.jpg" alt=""/></a><br/><br/>

Exhibitions Partner<br/><br/>
	<a href="http://touchmagix.com/" target="_blank"><img src="styles/images/sponsors/touchmagix.jpg" alt=""/></a><br/><br/>

Media Partner<br/><br/>
	  <a href="http://www.thinkdigit.com/" target="_blank"><img src="styles/images/sponsors/thinkdigit.jpg" alt=""/></a><br/><br/>

Education Partner<br/><br/>
	  <a href="http://www.campusfrance.org/en" target="_blank"><img src="styles/images/sponsors/campusfrance.jpg" alt=""/></a><br/><br/>
  	  <a href="http://www.studyinholland.nl/" target="_blank"><img src="styles/images/sponsors/studyinholland.jpg" alt=""/></a><br/><br/>
 	  <a href="http://www.btechguru.com/" target="_blank"><img src="styles/images/sponsors/btechguru.jpg" alt=""/></a><br/><br/>
 	  <a href="http://www.time4education.com/" target="_blank"><img src="styles/images/sponsors/time.jpg" alt=""/></a><br/><br/>

IDP Partner<br/><br/>
	  <a href="http://www.ntpc.co.in/" target="_blank"><img src="styles/images/sponsors/ntpc.jpg" alt=""/></a><br/><br/>
 	  <a href="http://www.greenadd.in/" target="_blank"><img src="styles/images/sponsors/greenadd.jpg" alt=""/></a><br/><br/>
     	  <a href="http://www.facebook.com/archipidia" target="_blank"><img src="styles/images/sponsors/archipidia.jpg" alt=""/></a><br/><br/>

Wokshop Partner<br/><br/>
   	  <a href="http://www.aerotrix.com/" target="_blank"><img src="styles/images/sponsors/aerotrix.jpg" alt=""/></a> <br/><br/>
    	  <a href="http://www.technophilia.co.in/" target="_blank"><img src="styles/images/sponsors/technophilia.jpg" alt=""/></a> <br/><br/>
   	  <a href="http://www.metawing.com/" target="_blank"><img src="styles/images/sponsors/metawing.jpg" alt=""/></a> <br/><br/>

Engineering and Tech Partner<br/><br/>
	  <a href="http://www.faadooengineers.com/" target="_blank"><img src="styles/images/sponsors/fadoo.jpg" alt=""/></a><br/><br/>

Initiative Partner<br/><br/>
       <a href="http://www.amul.com/" target="_blank"><img src="styles/images/sponsors/amul.jpg" alt=""/></a> <br/><br/>
       <a href="http://www.teachforindia.org/" target="_blank"><img src="styles/images/sponsors/teachforindia.jpg" alt="" /></a>
       <a href="http://www.ndtv.com/micro/supportmyschool/default.aspx" target="_blank"><img src="styles/images/sponsors/supportmyschool.jpg" alt=""/></a>  <br/><br/><br/>
   	  
</div></div><!--icontent-->
</div><!--icontainer-->
<div class="idragger_container">
<div class="idragger"></div>
</div>
</div><!--icustomScrollBox-->
<a href="#" class="iscrollUpBtn"></a><a href="#" class="iscrollDownBtn"></a>
</div> <!--imcs_container-->
';
}else if($hash_full=="feedback")
{
echo '<div id="stylized" class="myform">
<form id="form" name="form" method="post" action="javascript:feedback()">
<h1>Feedback</h1>
<p></p>
<br /><br /><br />
<label>Name
<span class="small">Add your name</span>
</label>
<input type="text" name="name" id="name" />

<label>Email
<span class="small">Add a valid address</span>
</label>
<input type="text" name="email" id="email" />

<label>Feedback
<span class="small">Enter feedback here</span>
</label>
<textarea rows="4" cols="30" name="feedback" id="feedback" />


<button type="submit">Submit</button>
<div class="spacer"></div>

</form>
</div>';
}else if($hash_full=="reachus")
{
echo '<div id="stylized" >
<form id="form"name="form" method="post" action="javascript:feedback()">
<h1>Getting There</h1>
<p></p><small><a  href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=nit+calicut&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.273162,79.013672&amp;vpsrc=0&amp;ie=UTF8&amp;hq=nit&amp;hnear=Kozhikode,+Kerala,+India&amp;t=m&amp;cid=14981244607500735704&amp;ll=11.321174,75.935268&amp;spn=0.058912,0.072956&amp;z=13&amp;iwloc=A" style="color:#ccc; float:left; text-decoration:none;text-align:right">View Larger Map</a></small><br/>
<iframe width="400"  style="float:left" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=nit+calicut&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=35.273162,79.013672&amp;vpsrc=0&amp;ie=UTF8&amp;hq=nit&amp;hnear=Kozhikode,+Kerala,+India&amp;t=m&amp;cid=14981244607500735704&amp;ll=11.321174,75.935268&amp;spn=0.058912,0.072956&amp;z=13&amp;iwloc=A&amp;output=embed"></iframe><br />
</form>
<div style="padding:20px 0px 0px 430px;"><b>From Calicut Railway Station </b> (22 kms)<br/><br/>By Bus<br/> <small> <i>Take a 10minute walk or get a rickshaw for a fare of ₹12 to <b>Palayam</b> bus stand  and board a bus to REC / NIT Calicut</i></small><br/><br/>By Rickshaw<br/> <small> <i>Get a rickshaw from the Railway Station to NIT Calicut for a fare of ₹ 300 </i></small><br/><br/>By Taxi<br/> <small> <i>You may get a taxi from the railway station to NIT Calicut for a fare of ₹450. </i></small><br/><br/><br/>
<b>From Calicut Airport </b> <br/><br/> <small> <i>Calicut Airport is located at Karipur, 27 Kms south-east of the city and it is  
45 kms  from NIT Calicut. You can reach NIT Calicut by taxi from the Calicut Airport and the taxi fare is 
approximately ₹ 800. </i></small><br/><br/>
</div>

</div>';
}


else if($hash_full=="eventregister")
{
 if (!isset($_SESSION['tathvaid'])) {
	echo '<div id="stylized" class="myform">
You have not logged in. Please login before registering for an event. 
</div>';
}else {
echo '<iframe id="ifrevent" style="margin-top:-20px;" src="participating_events.php" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';

}
}

else if($hash_full=="workshopregister")
{
if (!isset($_SESSION['tathvaid'])) {
	echo '<div id="stylized" class="myform">
You have not logged in. Please login before registering for a workshop. 
</div>';

}else {
echo '<iframe id="ifrworkshop" style="margin-top:-20px;" src="participating_workshops.php" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';
}
}else if ($hash_full[1]=='='){
	$searchResult = file_get_contents('http://www.tathva.org/2011/search.php?'.$hash_full);
	
	echo $searchResult;
}else if ($reg=="eventregister" && $hash!=""){
 if (!isset($_SESSION['tathvaid'])) {
	echo '<div id="stylized" class="myform">
	You have not logged in. Please login before registering for an event. 
	</div>';
}else {
	echo '<iframe style="margin-top:-20px;" src="participating_events.php?event_hash='.$hash.'" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';
	}
}else if ($reg=="workshopregister" && $hash!=""){
	 if (!isset($_SESSION['tathvaid'])) {
	echo '<div id="stylized" class="myform">
You have not logged in. Please login before registering for a workshop. 
</div>';
}else {
	echo '<iframe style="margin-top:-20px;" src="participating_workshops.php?workshop_hash='.$hash.'" width="100%" height="100%" frameBorder="0" scrolling="no">
</iframe>';
	}
}else if ($hash_full=="myaccount"){
  if (!isset($_SESSION['tathvaid'])) {
	echo '<div id="stylized" class="myform">
  You have not logged in. Please login to see your account. 
  </div>';
  }else {
  	$con = mysql_connect($host, $db_user, $db_password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$db = mysql_select_db($db_name, $con);
	$sql = "SELECT event_id, team_id FROM team WHERE teammember_id LIKE '".$_SESSION['tathvaid']."'";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
	echo '<div id="ititle">Registration Details</div>
<div id="imenu">
<ul class = "ilinks">
<li id="0">Events</li>
<li id="1">Workshops</li>
</ul>
</div>

<div id="imcs_container">
<div class="icustomScrollBox">
<div class="icontainer">
<div class="icontent">
<div id="isection0" class="isection">';
	if (!($row))
		echo 'You have not registered for any events yet.';
	else{
		echo '<table><tr><th>Event</th><th>Event ID</th></tr>';
		while($row){
			$query = "SELECT event_hash, event_name FROM event WHERE event_id LIKE '".$row[0]."'";
			$res = mysql_query($query,$con);
			$row1 = mysql_fetch_row($res);
			echo '<tr><td><a href="#!'.$row1[0].'" rel="ajax">'.$row1[1].'</a></td><td>'.$row[1].'</td></tr>';	
  			$row=mysql_fetch_row($result);
  		}
  		echo '</table>';
  	}
  	echo '</div>
<div id="isection1" class="isection">';
	$sql = "SELECT workshop_id, workshop_team_id FROM team_workshop WHERE tathva_id LIKE '".$_SESSION['tathvaid']."'";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
	if (!($row))
		echo 'You have not registered for any events yet.';
	else{
		echo '<table><tr><th>Workshop</th><th>Workshop ID</th></tr>';
		while($row){
			$query = "SELECT workshop_hash, workshop_name FROM workshop WHERE workshop_id LIKE '".$row[0]."'";
			$res = mysql_query($query,$con);
			$row1 = mysql_fetch_row($res);
			echo '<tr><td><a href="#!'.$row1[0].'" rel="ajax">'.$row1[1].'</a></td><td>'.$row[1].'</td></tr>';
			$row=mysql_fetch_row($result);	
  		}
  		echo '</table>';
  	}
  	echo '</div>
</div><!--icontent-->
</div><!--icontainer-->
<div class="idragger_container">
<div class="idragger"></div>
</div>
<div id="igrad"></div>
</div><!--icustomScrollBox-->
<a href="#" class="iscrollUpBtn"></a><a href="#" class="iscrollDownBtn"></a>
</div> <!--imcs_container-->';
	
  }
}else
{
$con = mysql_connect($host, $db_user, $db_password);
if (!$con) {
	die('Could not connect: ' . mysql_error());
	}
$db = mysql_select_db($db_name, $con);
$sql = "SELECT article_content FROM articles WHERE article_hash='".$hash_full."'";
$result = mysql_query($sql,$con) or die("no content") ;
$row = mysql_fetch_array($result);
if (!($row))
	echo 'This page will be updated soon.';
else
	echo $row['article_content'];
}

?>
