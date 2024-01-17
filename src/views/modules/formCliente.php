<h1 class="heading hd-1 txt-center">Cadastrar Cliente</h1>
<form class="form" action="#destiny" method="POST">
    <header class="form__header">
        <button class="btn btn--type-text btn-close fa-solid fa-xmark"></button>
        <h3 class="heading hd-3">Create a new account</h3>
        <p class="small-text" >Enter your details to register</p>
    </header>
    <label for="input_name">Full Name</label>
    <input type="text" name="input_name" id="input_name" placeholder="Enter your name" value="">
    <label for="input_email">Email</label>
    <input type="text" name="input_email" id="input_email" placeholder="name@email.com" value="">
    <label for="input_password">Password</label>
    <input type="text" name="input_password" id="input_password" placeholder="123456" value="">
    <div class="msg-input msg--alt msg--error">Must contain 1 uppercase letter, 1 number, min. 8 characters.</div>
    <input class="btn btn--primary" type="submit" value="Sign Up">
    <p class="small-text">By clicking Sign Up, you agree to accept Apex <br> Financial's <a href="#">Terms and Conditions</a></p>
    <footer class="form__footer">
        <p class="small-text">Already a member? <a href="#">Sign In</a></p>
    </footer>
</form>
