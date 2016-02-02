<div class="overlay"></div>
<div class="popup" data-popup="time">
	<header>
		<h3>Работно време </h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent time">
		<div class="formRow">
			<h2>Понеделник - Събота</h2>
			<p>09:00 часа - 18:00 часа</p>
		</div>
		<div class="formRow">
			<H2>Неделя</H2>
			<p>Почивен ден</p>
		</div>
	</div>
</div>
<div class="popup" data-popup="reservation">
	<header>
		<h3>Резервация</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent">
		<form id="formReservation">
			<div class="formRow">
				<h2>Процедура</h2>	
				<select name= "choiseProcedure" class="selDynamicProcedures" id="procedures">
				</select>
			</div>
			<div class="formRow">
				<h2>Пол на специалиста</h2>	
				<label><input type="radio" name="sex" value="none" checked>Без значение</label>
				<label><input type="radio" name="sex" value="мъж">Мъж</label>
				<label><input type="radio" name="sex" value="жена">Жена</label>
			</div>
			<div class="formRow" data-element="nameSpecialist">
				<h2>Име на специалиста</h2>	
			</div>
			<div class="formRow">
				<h2>Дата</h2>	
				<input type="text" name="datepicker" class="datepicker" id="reservDate" required>		
			</div>
			<div class="formRow">
				<h2>Час</h2>	
				<input type="text" name="timepicker" class="timepicker" id="reservTime" required>	
			</div>
			<div class="formRow popupActions">
				<input type="submit" id="subRezv" class="popupBtn submit" value="Резервирай">
			</div>
			<p class="notLogged">Моля, влезте в профила си, за да направите резервация! </p>
			<p class="reservComplite">Вашата резервация е успешна!</p>
			<p class="employeeAvailable">Служителят е зает тогава, моля изберете друг час!</p>
		</form>
	</div>
</div>
<div class="popup" data-popup="map">
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<header>
		<h3>Къде да ни намерите </h3>
		<span class="iconClose"></span>

	</header>
	<div id="map-canvas"></div>
	<div class="popupContent">
		<h2>Адрес</h2>
		<p>Варна, ул. Димитър Икономов №32</p>
		<H2>контакти</H2>
		<aside>
			<p><img src="img/icons/phone.png"/>0883 533 575</p>
		</aside>
		<aside>
			<p><img src="img/icons/mail.png"/>madlen.jordanova@gmail.com</p>
		</aside>	
	</div>
</div>
<div class="popup" data-popup="logInUp">
	<header>
		<h3>Вход</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent">
		<form name="loginForm" method="post">
			<figure>
				<img src="img/icons/login.png"/>
			</figure>
			<div class="formRow">
				<h2>Имейл</h2>	
				<input type="email" name="userEmail" class="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Въведете име" required>
			</div>
			<div class="formRow">
				<h2>Парола</h2>	
				<input type="password" name="userPass" class="password" placeholder="**********" required>		
			</div>
			<div class="g-recaptcha" data-sitekey="6Ld58wgTAAAAAIMxITySYys4_U8OSb3Ddkn7FBuc"></div>
			<div class="formRow popupActions">
				<input type="submit" id="log" name="userLogin" class="popupBtn log" value="Вход">
				<input type="button" id="registerOpen" name="" data-open="register" class="popupBtn register" value="Регистрация">
			</div>
			<p><span id="forgotPass" data-open="forgotPass">Забравена парола?</span></p>
			<!-- <h2 class="logSoc">Вход чрез:</h2>
			<nav class="socialLog">
				<a href="facebook"><img src="img/icons/fb.png"></a>
				<a href="gmail"><img src="img/icons/gml.png"></a>
			</nav> -->
			<p class="wrongUserDetails">Грешна парола или имейл!</p>
			<p class="fillCaptcha">Моля потвърди, че не си робот!</p>
		</form>
	</div>
</div>
<div class="popup" data-popup="forgotPass">
	<header>
		<h3>Възстановяване на парола</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent">
		<form name="restorePassForm" method="post">			
			<div class="formRow">
				<h2>Имейл</h2>	
				<input type="email" name="restoreEmail" class="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Въведете имейл" required>
			</div>	
			<input type="submit" id="sendForgotPass" class="popupBtn log" value="Изпрати">				
		</form>
		<p class="sendPassToEmail">Паролата е изпратена на имейла!</p>
	</div>
</div>
<div class="popup" data-popup="register">
	<header>
		<h3>Регистрация</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent">   
		<form name="regForm">
			<figure>
				<img src="img/icons/login.png"/>
			</figure>
			<div class="formRow">
				<h2>Име</h2>    
				<input type="text" name="firstName" class="firstName" placeholder="Въведете име" required>
			</div>
			<div class="formRow">
				<h2>Фамилия</h2>    
				<input type="text" name="lastName" class="lastName" placeholder="Въведете фамилия" required>
			</div>
			<div class="formRow">
				<h2 data-error="email">Имейл</h2>  
				<input type="email" name="regUserEmail" class="userEmail" id= "userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Въведете имейл" required>
			</div>
			<div class="formRow">
				<h2>Парола</h2> 
				<input type="password" name="userPassReg" class="regPass" placeholder="**********" required>       
			</div> 
			<div class="formRow">
				<h2>Повтори паролата</h2>   
				<input type="password" name="userPassSecond" class="regPass" placeholder="**********" required>     
			</div>  
			<div class="formRow">
				<h2>Дата на раждане</h2>    
				<input type="text" name="datepicker" class="birthdayDatepicker" id="birthday" required>       
			</div>      
			<div class="formRow popupActions">          
				<input type="submit" id="registerSend" name="" class="popupBtn register" value="Регистрация">
			</div> 
			<p class="passNotMatch">Паролите не съвпадат!</p>
			<p class="passNotComplex">Паролата трябва да е минимум 6 символа и да съдържа малка, голяма буква и число!</p>
			<p class="regComplite">Вашата регистрация е успешна!</p>
		</form>
	</div>
</div> 
<div class="popup" data-popup="editUser">
	<header>
		<h3>Настройки на профила</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent">   
		<form name="editForm">			
			<div class="formRow">
				<h2>Име</h2>    
				<input type="text" name="edit-fName" class="inputStyle" placeholder="Въведете име">
			</div>
			<div class="formRow">
				<h2>Фамилия</h2>    
				<input type="text" name="edit-lName" class="inputStyle" placeholder="Въведете фамилия">
			</div>			
			<div class="formRow">
				<h2>Нова паролата</h2>   
				<input type="password" name="edit-userPassNew" class="inputStyle" placeholder="**********">     
			</div>  			 
			<div class="formRow">
				<h2>Телефон</h2>    
				<input type="tel" pattern="^\d{4}\d{3}\d{3}$" name="edit-telNum" class="inputStyle" placeholder="Въведете телефонния си номер">
			</div>  
			<div class="formRow">
				<h2>Фейсбук</h2>    
				<input type="text" name="edit-facebook" class="inputStyle" placeholder="Въведете фейсбука си">
			</div>  
			<div class="formRow">
				<h2>Дата на раждане</h2>    
				<input type="text" name="edit-datepicker" class="birthdayDatepicker" id="birthday">       
			</div>   
			<div class="formRow popupActions">          
				<input type="submit" id="editProfile" name="" class="popupBtn editPrf" value="Редактирай">
			</div> 
			<p class="passNotComplex">Паролата трябва да е минимум 6 символа и да съдържа малка, голяма буква и число!</p>
			<p class="editComplete">Вие успешно редактирахте профила си!</p>
		</form>
	</div>
</div> 