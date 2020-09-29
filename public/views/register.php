<form action="<?php  echo $address."validRegister"?>" method="post">
	Login: <input type="text" name="login"  class="register_form" required>
	Hasło: <input type="password" name="password" class="register_form" required>
	Powtórz hasło: <input type="password" name="password2" class="register_form" required>
	Imie: <input type="text" name="name" class="register_form" required>
	Nazwisko: <input type="text" name="lastName" class="register_form" required>
	Płeć: <select name="sex" class="register_form" required>
		<option value="Mężczyzna">Mężczyzna</option>
		<option value="Kobieta">Kobieta</option>
	</select>
	<input type="submit" value="Zarejestruj">
</form>
