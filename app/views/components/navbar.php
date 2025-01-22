<!-- views/components/navbar.php -->
<link rel="stylesheet" href="/NoticiasPHP/public/css/navbar.css">
<script src="/NoticiasPHP/public/js/app.js"></script>
<nav class="nav-container">
    <ul>
        
        <li><a href="/NoticiasPHP/public/home">Inicio</a></li>
        <li><a href="/NoticiasPHP/public/news">Noticias</a></li>
        <li><a href="/NoticiasPHP/public/users">Usuarios</a></li>
        <li><button onclick="toggleIniciar()">Iniciar sesion</button></li>
    </ul>
</nav>
<!-- Aqui pondremos en hidden el popout de iniciar sesion -->

<div class="create-container login-container display-none" id="loginPopOut">
        <h2>Iniciar Usuario</h2>
        <form action="/NoticiasPHP/public/users/login" method="post">
            <label for="email">Email: </label>
            <input name="email" type="email">

            <label for="password">Contraseña: </label>
            <input name="password" type="password">

            <button type="submit">Iniciar</button>
        </form>
    </div>