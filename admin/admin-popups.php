<div class="overlay"></div>
<div class="popup" data-popup="addTeam">
	<header>
		<h3>Добавяне на служител</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent team">
		<form name="insertTeamPerson" >
			<div class="formRow">
				<h2>Име</h2>    
				<input type="text" name="teamName" class="styleInput" placeholder="Въведете име" required>
			</div>
			<div class="formRow">
				<h2>Длъжност</h2>    
				<select name="teamPersonPosition"  class="selD">
					<?php 

					$sql = 'SELECT  id, name_position FROM  position';
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);
					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$posName = $row['name_position'];
						echo '<option value="'.$id.'" >'.$posName.'</option>';
					}
					?>
				</select>
			</div>
			<div class="formRow">
				<h2 data-error="email">Имейл</h2>  
				<input type="email" name="teamEmail" class="styleInput" id= "userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Въведете имейл" required>
			</div>
			<div class="formRow">
				<h2>Фейсбук</h2>    
				<input type="text" name="facebook" class="styleInput" placeholder="Въведете фейсбук" required>
			</div>
			<div class="formRow">
				<h2>Снимка</h2>    
				<input type="file" name="teamPicture" class="styleInput" required>
			</div>
			<div class="formRow">
				<h2>Телефон</h2>    
				<input type="tel" name="teamPhone" class="styleInput" pattern="^\d{4}\d{3}\d{3}$" required>
			</div>
			<div class="formRow">
				<h2>Пол</h2>
				<label>Мъж<input type="radio" name="sex" value="мъж" required></label>
				<label>Жена<input type="radio" name="sex" value="жена"></label>
			</div>
			<div class="formRow popupActions">			
				<input type="submit" id="addTeam" class="popupBtn submit" value="Добави">
			</div>
		</form>	
	</div>
</div>
<div class="popup" data-popup="addProc">
	<header>
		<h3>Добавяне на процедура</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent proced">
		<form name="frmAddProcedure" >
			<div class="formRow">
				<h2>Категория</h2>    				
				<select name="category"  class="selD">
					<?php 

					$sql = 'SELECT  id, types FROM  category';
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);
					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$catName = $row['types'];
						echo '<option value="'.$id.'" >'.$catName.'</option>';
					}
					?>
				</select>	
			</div>	
			<div class="formRow">
				<h2>Процедура</h2>    				
				<input type="text" name="procedure" class="styleInput" required>		
			</div>			
			<div class="formRow">
				<h2>Съдържание</h2>    
				<input type="text" name="descriptionProc" class="styleInput" placeholder="Въведете информация" required>
			</div>
			<div class="formRow">
				<h2>Продължителност</h2>    
				<input type="text" name="timeEstimate" placeholder="50" class="styleInput" id="procTime" required>	
			</div>
			<div class="formRow">
				<h2>Цена</h2>    				
				<input type="text" name="price" class="styleInput" required>		
			</div>
			<div class="formRow">
				<h2>Снимка</h2>    				
				<input type="file" name="procPicture" class="styleInput" required>		
			</div>
			<div class="formRow">
				<h2>Видео</h2>    				
				<input type="text" name="video" class="styleInput" required>		
			</div>			
			<div class="formRow popupActions">			
				<input type="submit" id="addProc" class="popupBtn submit" value="Добави">
			</div>
			<p class="numbersOnly">Въведете коректна продължителност в минути!</p>
		</form>	
	</div>
</div>
<div class="popup" data-popup="addPromo">
	<header>
		<h3>Добавяне на промоция</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent promo">
		<form name="frmAddPromotion" >
			<div class="formRow">
				<h2>От</h2>    				
				<input type="text" name="datepicker" class="styleInput datepicker" id="startDateProm" required>		
			</div>			
			<div class="formRow">
				<h2>Тема</h2>    
				<input type="text" name="theme" class="styleInput" placeholder="Въведете тема" required>
			</div>
			<div class="formRow">
				<h2>Съдържание</h2>    
				<textarea name="description" class="styleInput" placeholder="Въведете съдържание" required ></textarea>
			</div>
			<div class="formRow">
				<h2>До</h2>    				
				<input type="text" name="datepicker" class="styleInput datepicker" id="endDateProm" required>		
			</div>			
			<div class="formRow popupActions">			
				<input type="submit" id="addProm" class="popupBtn submit" value="Добави">
			</div>
		</form>	
	</div>
</div>

<div class="popup" data-popup="editTeam">
	<header>
		<h3>Промяна на служител</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent team">
		<form name="editTeamPerson" >
			<div class="formRow">
				<h2>Име</h2>    
				<input type="text" name="editTeamName" class="styleInput" placeholder="Въведете име" required>
			</div>
			<div class="formRow">
				<h2>Длъжност</h2>    
				<select name="editTeamPersonPosition"  class="selDynamicDecorator">
					<?php 

					$sql = 'SELECT  id, name_position FROM  position';
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);
					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$posName = $row['name_position'];
						echo '<option value="'.$id.'" >'.$posName.'</option>';
					}
					?>
				</select>
			</div>
			<div class="formRow">
				<h2 data-error="email">Имейл</h2>  
				<input type="email" name="editTeamEmail" class="styleInput" id= "userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Въведете имейл" required>
			</div>
			<div class="formRow">
				<h2>Фейсбук</h2>    
				<input type="text" name="editFacebook" class="styleInput" placeholder="Въведете фейсбук" required>
			</div>
			<div class="formRow">
				<h2>Снимка</h2>    
				<input type="file" name="editTeamPicture" class="styleInput" required>
			</div>
			<div class="formRow">
				<h2>Телефон</h2>    
				<input type="text" name="editTeamPhone" class="styleInput" pattern="^\d{4}\d{3}\d{3}$" required>
			</div>
			<div class="formRow">
				<h2>Пол</h2>
				<label>Мъж<input type="radio" name="editSex" value="мъж" required></label>
				<label>Жена<input type="radio" name="editSex" value="жена"></label>
			</div>
			<div class="formRow popupActions">			
				<input type="submit" id="editTeam" class="popupBtn submit" value="Добави">
			</div>
		</form>	
	</div>
</div>

<div class="popup" data-popup="editProcedures">
	<header>
		<h3>Промяна на процедура</h3>
		<span class="iconClose"></span>
	</header>
	<div class="popupContent procedure">
		<form name="editProcedure" >
			<div class="formRow">
				<h2>Категория</h2>    				
				<select name="editCategory"  class="selD">
					<?php 

					$sql = 'SELECT  id, types FROM  category';
					$result = $connection->query($sql) or die ( $connection->error.__LINE__);
					while ($row = $result->fetch_assoc() ) {
						$id = $row['id'];
						$catName = $row['types'];
						echo '<option value="'.$id.'" >'.$catName.'</option>';
					}
					?>
				</select>	
			</div>	
			<div class="formRow">
				<h2>Процедура</h2>    				
				<input type="text" name="editProcedure" class="styleInput" required>		
			</div>			
			<div class="formRow">
				<h2>Съдържание</h2>    
				<input type="text" name="editDescriptionProc" class="styleInput" placeholder="Въведете информация" required>
			</div>
			<div class="formRow">
				<h2>Продължителност</h2>    
				<input type="text" name="editTimeEstimate" placeholder="50" class="styleInput" id="procTime" required>	
			</div>
			<div class="formRow">
				<h2>Цена</h2>    				
				<input type="text" name="editPrice" class="styleInput" required>		
			</div>
			<div class="formRow">
				<h2>Снимка</h2>    				
				<input type="file" name="editProcPicture" class="styleInput" required>		
			</div>
			<div class="formRow">
				<h2>Видео</h2>    				
				<input type="text" name="editVideo" class="styleInput" required>		
			</div>			
			<div class="formRow popupActions">			
				<input type="submit" id="editProcedure" class="popupBtn submit" value="Добави">
			</div>
		</form>	
	</div>
</div>